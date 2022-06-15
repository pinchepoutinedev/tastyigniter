<?php

namespace System\Classes;

use Carbon\Carbon;
use Igniter\Flame\Exception\ApplicationException;
use Igniter\Flame\Mail\Markdown;
use Igniter\Flame\Support\Facades\File;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Main\Classes\ThemeManager;
use System\Models\Extensions_model;
use System\Models\Themes_model;
use ZipArchive;

/**
 * TastyIgniter Updates Manager Class
 */
class UpdateManager
{
    use \Igniter\Flame\Traits\Singleton;

    protected $logs = [];

    /**
     * The output interface implementation.
     *
     * @var \Illuminate\Console\OutputStyle
     */
    protected $logsOutput;

    protected $baseDirectory;

    protected $tempDirectory;

    protected $logFile;

    protected $updatedFiles;

    protected $installedItems;

    /**
     * @var ThemeManager
     */
    protected $themeManager;

    /**
     * @var HubManager
     */
    protected $hubManager;

    /**
     * @var ExtensionManager
     */
    protected $extensionManager;

    /**
     * @var \Igniter\Flame\Database\Migrations\Migrator
     */
    protected $migrator;

    /**
     * @var \Igniter\Flame\Database\Migrations\DatabaseMigrationRepository
     */
    protected $repository;

    protected $disableCoreUpdates;

    public function initialize()
    {
        $this->hubManager = HubManager::instance();
        $this->themeManager = ThemeManager::instance();
        $this->extensionManager = ExtensionManager::instance();

        $this->tempDirectory = temp_path();
        $this->baseDirectory = base_path();
        $this->disableCoreUpdates = config('system.disableCoreUpdates', false);

        $this->bindContainerObjects();
    }

    public function bindContainerObjects()
    {
        $this->migrator = App::make('migrator');
        $this->repository = App::make('migration.repository');
    }

    /**
     * Set the output implementation that should be used by the console.
     *
     * @param \Illuminate\Console\OutputStyle $output
     * @return $this
     */
    public function setLogsOutput($output)
    {
        $this->logsOutput = $output;
        $this->migrator->setOutput($output);

        return $this;
    }

    public function log($message)
    {
        if (!is_null($this->logsOutput))
            $this->logsOutput->writeln($message);

        $this->logs[] = $message;

        return $this;
    }

    /**
     * @return \System\Classes\UpdateManager $this
     */
    public function resetLogs()
    {
        $this->logs = [];

        return $this;
    }

    public function getLogs()
    {
        return $this->logs;
    }

    //
    //
    //

    public function down()
    {
        // Rollback extensions
        $extensions = $this->extensionManager->getExtensions();
        foreach ($extensions as $code => $extension) {
            $this->purgeExtension($code);
        }

        // Rollback app
        $modules = array_reverse(Config::get('system.modules', []));
        foreach ($modules as $module) {
            $path = $this->getMigrationPath($module);
            $this->migrator->rollbackAll([$module => $path]);
            $this->log("<info>Rolled back app $module</info>");
        }

        $this->repository->deleteRepository();

        return $this;
    }

    public function update()
    {
        $wasPreviouslyMigrated = $this->prepareDatabase();

        // Update app
        $modules = Config::get('system.modules', []);
        foreach ($modules as $module) {
            $this->migrateApp($module);
        }

        // Seed app
        if (!$wasPreviouslyMigrated) {
            foreach ($modules as $module) {
                $this->seedApp($module);
            }
        }

        // Update extensions
        $extensions = $this->extensionManager->listByDependencies();
        foreach ($extensions as $extension) {
            $this->migrateExtension($extension);
        }

        return $this;
    }

    public function setCoreVersion($version = null, $hash = null)
    {
        params()->set('ti_version', $version ?? $this->getHubManager()->applyCoreVersion());

        if (strlen($hash))
            params()->set('sys_hash', $hash);

        params()->save();
    }

    protected function prepareDatabase()
    {
        $migrationTable = Config::get('database.migrations', 'migrations');

        if ($hasColumn = Schema::hasColumns($migrationTable, ['group', 'batch'])) {
            $this->log('Migration table already exists');

            return true;
        }

        $this->repository->createRepository();

        $action = $hasColumn ? 'updated' : 'created';
        $this->log("Migration table {$action}");
    }

    public function migrateApp($name)
    {
        $path = $this->getMigrationPath($name);

        $this->migrator->run([$name => $path]);

        $this->log("<info>Migrated app $name</info>");

        return $this;
    }

    public function seedApp($name)
    {
        $className = '\\'.$name.'\Database\Seeds\DatabaseSeeder';
        if (!class_exists($className))
            return false;

        $seeder = App::make($className);
        $seeder->run();

        $this->log(sprintf('<info>Seeded %s</info> ', $name));

        return $this;
    }

    public function migrateExtension($name)
    {
        if (!$this->extensionManager->findExtension($name)) {
            $this->log('<error>Unable to find:</error> '.$name);

            return false;
        }

        $this->log("<info>Migrating extension $name</info>");

        $path = $this->getMigrationPath($this->extensionManager->getNamePath($name));
        $this->migrator->run([$name => $path]);

        $this->log("<info>Migrated extension $name</info>");

        return $this;
    }

    public function purgeExtension($name)
    {
        if (!$this->extensionManager->findExtension($name)) {
            $this->log('<error>Unable to find:</error> '.$name);

            return false;
        }

        $path = $this->getMigrationPath($this->extensionManager->getNamePath($name));
        $this->migrator->rollbackAll([$name => $path]);

        $this->log("<info>Purged extension $name</info>");

        return $this;
    }

    public function rollbackExtension($name, array $options = [])
    {
        if (!$this->extensionManager->findExtension($name)) {
            $this->log('<error>Unable to find:</error> '.$name);

            return false;
        }

        $path = $this->getMigrationPath($this->extensionManager->getNamePath($name));
        $this->migrator->rollbackAll([$name => $path], $options);

        $this->log("<info>Rolled back extension $name</info>");

        return $this;
    }

    /**
     * Get migration directory path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getMigrationPath($name)
    {
        if (in_array($name, Config::get('system.modules', [])))
            return app_path(strtolower($name).'/database/migrations');

        return extension_path($name.'/database/migrations');
    }

    //
    //
    //

    public function isLastCheckDue()
    {
        $response = $this->requestUpdateList();

        if (isset($response['last_check'])) {
            return strtotime('-7 day') < strtotime($response['last_check']);
        }

        return true;
    }

    public function listItems($itemType)
    {
        $installedItems = $this->getInstalledItems();

        $items = $this->getHubManager()->listItems([
            'browse' => 'recommended',
            'limit' => 12,
            'type' => $itemType,
        ]);

        $installedItems = array_column($installedItems, 'name');
        if (isset($items['data'])) foreach ($items['data'] as &$item) {
            $item['icon'] = generate_extension_icon($item['icon'] ?? []);
            $item['installed'] = in_array($item['code'], $installedItems);
        }

        return $items;
    }

    public function searchItems($itemType, $searchQuery)
    {
        $installedItems = $this->getInstalledItems();

        $items = $this->getHubManager()->listItems([
            'type' => $itemType,
            'search' => $searchQuery,
        ]);

        $installedItems = array_column($installedItems, 'name');
        if (isset($items['data'])) foreach ($items['data'] as &$item) {
            $item['icon'] = generate_extension_icon($item['icon'] ?? []);
            $item['installed'] = in_array($item['code'], $installedItems);
        }

        return $items;
    }

    public function getSiteDetail()
    {
        return params('carte_info');
    }

    public function applySiteDetail($key)
    {
        $info = [];

        $this->setSecurityKey($key, $info);

        $result = $this->getHubManager()->getDetail('site');
        if (isset($result['data']) && is_array($result['data']))
            $info = $result['data'];

        $this->setSecurityKey($key, $info);

        return $info;
    }

    public function requestUpdateList($force = false)
    {
        $installedItems = $this->getInstalledItems();

        $updates = $this->hubManager->applyItemsToUpdate($installedItems, $force);

        if (is_string($updates))
            return $updates;

        $result = $items = $ignoredItems = [];
        $result['last_check'] = $updates['check_time'] ?? Carbon::now()->toDateTimeString();

        $installedItems = collect($installedItems)->keyBy('name')->all();

        $updateCount = 0;
        $hasCoreUpdate = false;
        foreach (array_get($updates, 'data', []) as $update) {
            $updateCount++;
            $update['installedVer'] = array_get(array_get($installedItems, $update['code'], []), 'ver');

            $update = $this->parseTagDescription($update);
            $update['icon'] = generate_extension_icon($update['icon'] ?? []);

            if (array_get($update, 'type') == 'core') {
                $update['installedVer'] = params('ti_version');
                if ($this->disableCoreUpdates)
                    continue;

                $hasCoreUpdate = true;
            }
            else {
                if ($hasCoreUpdate || $this->isMarkedAsIgnored($update['code'])) {
                    $ignoredItems[] = $update;
                    continue;
                }
            }

            $items[] = $update;
        }

        $result['count'] = $updateCount;
        $result['items'] = $items;
        $result['ignoredItems'] = $ignoredItems;

        return $result;
    }

    public function getInstalledItems($type = null)
    {
        if ($this->installedItems)
            return ($type && isset($this->installedItems[$type]))
                ? $this->installedItems[$type] : $this->installedItems;

        $installedItems = [];

        $extensionVersions = Extensions_model::pluck('version', 'name');
        foreach ($extensionVersions as $code => $version) {
            $installedItems['extensions'][] = [
                'name' => $code,
                'ver' => $version,
                'type' => 'extension',
            ];
        }

        $themeVersions = Themes_model::pluck('version', 'code');
        foreach ($themeVersions as $code => $version) {
            $installedItems['themes'][] = [
                'name' => $code,
                'ver' => $version,
                'type' => 'theme',
            ];
        }

        if (!is_null($type))
            return $installedItems[$type] ?? [];

        return $this->installedItems = array_collapse($installedItems);
    }

    public function requestApplyItems($names)
    {
        $applies = $this->getHubManager()->applyItems($names);

        if (isset($applies['data'])) foreach ($applies['data'] as $index => $item) {
            $filterCore = array_get($item, 'type') == 'core' && $this->disableCoreUpdates;
            if ($filterCore || $this->isMarkedAsIgnored($item['code']))
                unset($applies['data'][$index]);
        }

        return $applies;
    }

    public function ignoreUpdates($names)
    {
        $ignoredUpdates = $this->getIgnoredUpdates();

        foreach ($names as $item) {
            if (array_get($item, 'action', 'ignore') == 'remove') {
                unset($ignoredUpdates[$item['name']]);
                continue;
            }

            $ignoredUpdates[$item['name']] = true;
        }

        setting()->set('ignored_updates', $ignoredUpdates);

        return true;
    }

    public function getIgnoredUpdates()
    {
        return array_dot(setting()->get('ignored_updates') ?? []);
    }

    public function isMarkedAsIgnored($code)
    {
        if (!collect($this->getInstalledItems())->firstWhere('name', $code))
            return false;

        return array_get($this->getIgnoredUpdates(), $code, false);
    }

    public function setSecurityKey($key, $info)
    {
        params()->set('carte_key', $key ?: '');

        if ($info && is_array($info))
            params()->set('carte_info', $info);

        params()->save();
    }

    //
    //
    //

    public function downloadFile($fileCode, $fileHash, $params = [])
    {
        $filePath = $this->getFilePath($fileCode);

        if (!is_dir($fileDir = dirname($filePath)))
            mkdir($fileDir, 0777, true);

        return $this->getHubManager()->downloadFile($filePath, $fileHash, $params);
    }

    public function extractCore($fileCode)
    {
        ini_set('max_execution_time', 3600);

        $configDir = base_path('/config');
        $configBackup = base_path('/config-backup');
        File::moveDirectory($configDir, $configBackup);

        $result = $this->extractFile($fileCode);

        File::copyDirectory($configBackup, $configDir);
        File::deleteDirectory($configBackup);

        return $result;
    }

    public function extractFile($fileCode, $extractTo = null)
    {
        $filePath = $this->getFilePath($fileCode);
        if ($extractTo)
            $extractTo .= '/'.str_replace('.', '/', $fileCode);

        if (is_null($extractTo))
            $extractTo = base_path();

        if (!file_exists($extractTo))
            mkdir($extractTo, 0755, true);

        $zip = new ZipArchive();
        if ($zip->open($filePath) === true) {
            $zip->extractTo($extractTo);
            $zip->close();
            @unlink($filePath);

            return true;
        }

        throw new ApplicationException('Failed to extract '.$fileCode.' archive file');
    }

    public function getFilePath($fileCode)
    {
        $fileName = md5($fileCode).'.zip';

        return storage_path("temp/{$fileName}");
    }

    /**
     * @return \System\Classes\HubManager
     */
    protected function getHubManager()
    {
        return $this->hubManager;
    }

    protected function parseTagDescription($update)
    {
        $tags = array_get($update, 'tags.data', []);
        foreach ($tags as &$tag) {
            if (strlen($tag['description']))
                $tag['description'] = Markdown::parse($tag['description'])->toHtml();
        }

        array_set($update, 'tags.data', $tags);

        return $update;
    }
}
