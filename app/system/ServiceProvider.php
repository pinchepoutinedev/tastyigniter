<?php

namespace System;

use Admin\Classes\Location;
use Admin\Classes\Navigation;
use Admin\Classes\PermissionManager;
use Admin\Classes\Template;
use Admin\Classes\User;
use Admin\Helpers\Admin as AdminHelper;
use Igniter\Flame\ActivityLog\ActivityLogServiceProvider;
use Igniter\Flame\Currency\CurrencyServiceProvider;
use Igniter\Flame\Foundation\Providers\AppServiceProvider;
use Igniter\Flame\Geolite\GeoliteServiceProvider;
use Igniter\Flame\Pagic\Cache\FileSystem as FileCache;
use Igniter\Flame\Pagic\Environment;
use Igniter\Flame\Pagic\Loader;
use Igniter\Flame\Pagic\PagicServiceProvider;
use Igniter\Flame\Pagic\Parsers\FileParser;
use Igniter\Flame\Setting\Facades\Setting;
use Igniter\Flame\Support\Facades\File;
use Igniter\Flame\Support\HelperServiceProvider;
use Igniter\Flame\Translation\Drivers\Database;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Main\Classes\Customer;
use System\Classes\ErrorHandler;
use System\Classes\ExtensionManager;
use System\Classes\MailManager;
use System\Models\Settings_model;
use System\Template\Extension\BladeExtension;

class ServiceProvider extends AppServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->includeHelpers();

        parent::register('system');

        $this->registerProviders();
        $this->registerSingletons();

        // Register all extensions
        ExtensionManager::instance()->registerExtensions();

        $this->registerSchedule();
        $this->registerConsole();
        $this->registerErrorHandler();
        $this->registerPagicParser();
        $this->registerMailer();
        $this->registerPaginator();

        // Register admin and main module providers
        collect(Config::get('system.modules', []))->each(function ($module) {
            if (strtolower(trim($module)) != 'system') {
                $this->app->register('\\'.$module.'\ServiceProvider');
            }
        });

        if (App::runningInAdmin()) {
            $this->registerPermissions();
            $this->registerSystemSettings();
        }
    }

    /**
     * Bootstrap the module events.
     * @return void
     */
    public function boot()
    {
        // Boot extensions
        parent::boot('system');

        $this->defineEloquentMorphMaps();

        ExtensionManager::instance()->bootExtensions();

        $this->updateTimezone();
        $this->setConfiguration();
        $this->extendValidator();
        $this->addTranslationDriver();
        $this->defineQueryMacro();
    }

    /*
     * Include helpers
     */
    protected function includeHelpers()
    {
        foreach (glob(__DIR__.'/helpers/*_helper.php') as $file) {
            include_once $file;
        }
    }

    protected function updateTimezone()
    {
        date_default_timezone_set(Setting::get('timezone', Config::get('app.timezone', 'UTC')));
    }

    /**
     * Register singletons
     */
    protected function registerSingletons()
    {
        App::singleton('admin.helper', function () {
            return new AdminHelper;
        });

        App::singleton('admin.auth', function () {
            return new User;
        });

        App::singleton('auth', function () {
            return new Customer;
        });

        App::singleton('assets', function () {
            return new Libraries\Assets();
        });

        App::singleton('admin.menu', function ($app) {
            return new Navigation('~/app/admin/views/_partials/');
        });

        App::singleton('admin.template', function ($app) {
            return new Template;
        });

        App::singleton('admin.location', function ($app) {
            return new Location;
        });

        App::singleton('country', function ($app) {
            return new Libraries\Country;
        });

        App::instance('path.uploads', base_path(Config::get('system.assets.media.path', 'assets/media/uploads')));
    }

    /**
     * Register command line specifics
     */
    protected function registerConsole()
    {
        // Allow extensions to use the scheduler
        Event::listen('console.schedule', function ($schedule) {
            $extensions = ExtensionManager::instance()->getExtensions();
            foreach ($extensions as $extension) {
                if (method_exists($extension, 'registerSchedule')) {
                    $extension->registerSchedule($schedule);
                }
            }
        });

        // Allow system based cache clearing
        Event::listen('cache:cleared', function () {
            \System\Helpers\CacheHelper::clearInternal();
        });

        foreach (
            [
                'igniter.util' => Console\Commands\IgniterUtil::class,
                'igniter.up' => Console\Commands\IgniterUp::class,
                'igniter.down' => Console\Commands\IgniterDown::class,
                'igniter.install' => Console\Commands\IgniterInstall::class,
                'igniter.update' => Console\Commands\IgniterUpdate::class,
                'igniter.passwd' => Console\Commands\IgniterPasswd::class,
                'extension.install' => Console\Commands\ExtensionInstall::class,
                'extension.refresh' => Console\Commands\ExtensionRefresh::class,
                'extension.remove' => Console\Commands\ExtensionRemove::class,
                'theme.install' => Console\Commands\ThemeInstall::class,
                'theme.remove' => Console\Commands\ThemeRemove::class,
            ] as $command => $class
        ) {
            $this->registerConsoleCommand($command, $class);
        }
    }

    /*
     * Error handling for uncaught Exceptions
     */
    protected function registerErrorHandler()
    {
        Event::listen('exception.beforeRender', function ($exception, $httpCode, $request) {
            $handler = new ErrorHandler;

            return $handler->handleException($exception);
        });
    }

    /**
     * Extends the validator with custom rules
     */
    protected function extendValidator()
    {
        Validator::extend('trim', function ($attribute, $value, $parameters, $validator) {
            return trim($value);
        });

        Validator::extend('valid_date', function ($attribute, $value, $parameters, $validator) {
            return !(!preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value)
                && !preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $value));
        });

        Validator::extend('valid_time', function ($attribute, $value, $parameters, $validator) {
            return !(!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/', $value)
                && !preg_match('/^(1[012]|[1-9]):[0-5][0-9](\s)?(?i)(am|pm)$/', $value));
        });
    }

    protected function registerMailer()
    {
        MailManager::instance()->registerCallback(function (MailManager $manager) {
            $manager->registerMailLayouts([
                'default' => 'system::_mail.layouts.default',
            ]);

            $manager->registerMailPartials([
                'header' => 'system::_mail.partials.header',
                'footer' => 'system::_mail.partials.footer',
                'button' => 'system::_mail.partials.button',
                'panel' => 'system::_mail.partials.panel',
                'table' => 'system::_mail.partials.table',
                'subcopy' => 'system::_mail.partials.subcopy',
                'promotion' => 'system::_mail.partials.promotion',
            ]);

            $manager->registerMailVariables(
                File::getRequire(__DIR__.'/models/config/mail_variables.php')
            );
        });

        Event::listen('mailer.beforeRegister', function () {
            MailManager::instance()->applyMailerConfigValues();
        });

        Event::listen('mailer.beforeAddContent', function ($mailer, $message, $view, $data, $raw, $plain) {
            // When "plain-text only" email is sent, $view is null, this sets the flag appropriately
            $plainOnly = is_null($view);
            $method = is_null($raw) ? 'addContentToMailer' : 'addRawContentToMailer';

            return !MailManager::instance()->$method($message, $raw ?: $view ?: $plain, $data, $plainOnly);
        });
    }

    protected function registerPaginator()
    {
        Paginator::useBootstrap();

        Paginator::defaultView('system::_partials/pagination/default');
        Paginator::defaultSimpleView('system::_partials/pagination/simple_default');

        Paginator::currentPathResolver(function () {
            return url()->current();
        });

        Paginator::currentPageResolver(function ($pageName = 'page') {
            $page = Request::get($pageName);
            if (filter_var($page, FILTER_VALIDATE_INT) !== false && (int)$page >= 1) {
                return $page;
            }

            return 1;
        });
    }

    protected function addTranslationDriver()
    {
        if ($this->app->hasDatabase()) {
            $this->app['translation.loader']->addDriver(Database::class);
        }
    }

    protected function setConfiguration()
    {
        Event::listen('currency.beforeRegister', function () {
            app('config')->set('currency.default', setting('default_currency_code'));
            app('config')->set('currency.converter', setting('currency_converter.api', 'openexchangerates'));
            app('config')->set('currency.converters.openexchangerates.apiKey', setting('currency_converter.oer.apiKey'));
            app('config')->set('currency.converters.fixerio.apiKey', setting('currency_converter.fixerio.apiKey'));
            app('config')->set('currency.ratesCacheDuration', setting('currency_converter.refreshInterval'));
            app('config')->set('currency.model', \System\Models\Currencies_model::class);
        });

        $this->app->resolving('translator.localization', function ($localization, $app) {
            $app['config']->set('localization.locale', setting('default_language', $app['config']['app.locale']));
            $app['config']->set('localization.supportedLocales', setting('supported_languages', []) ?: ['en']);
            $app['config']->set('localization.detectBrowserLocale', (bool)setting('detect_language', false));
        });

        $this->app->resolving('geocoder', function ($geocoder, $app) {
            $app['config']->set('geocoder.default', setting('default_geocoder'));

            $region = $app['country']->getCountryCodeById(setting('country_id'));
            $app['config']->set('geocoder.providers.google.region', $region);
            $app['config']->set('geocoder.providers.nominatim.region', $region);

            $app['config']->set('geocoder.providers.google.apiKey', setting('maps_api_key'));
            $app['config']->set('geocoder.precision', setting('geocoder_boundary_precision', 8));
        });

        Event::listen(CommandStarting::class, function () {
            config()->set('system.activityRecordsTTL', (int)setting('activity_log_timeout', 60));
        });
    }

    protected function defineEloquentMorphMaps()
    {
        Relation::morphMap([
            'activities' => 'System\Models\Activities_model',
            'countries' => 'System\Models\Countries_model',
            'currencies' => 'System\Models\Currencies_model',
            'extensions' => 'System\Models\Extensions_model',
            'languages' => 'System\Models\Languages_model',
            'mail_layouts' => 'System\Models\Mail_layouts_model',
            'mail_templates' => 'System\Models\Mail_templates_model',
            'pages' => 'System\Models\Pages_model',
            'permissions' => 'System\Models\Permissions_model',
            'settings' => 'System\Models\Settings_model',
            'themes' => 'System\Models\Themes_model',
        ]);
    }

    protected function registerProviders()
    {
        $this->app->register(HelperServiceProvider::class);
        $this->app->register(PagicServiceProvider::class);
        $this->app->register(ActivityLogServiceProvider::class);
        $this->app->register(CurrencyServiceProvider::class);
        $this->app->register(GeoliteServiceProvider::class);
    }

    protected function defineQueryMacro()
    {
        \Illuminate\Database\Query\Builder::macro('toRawSql', function () {
            return array_reduce($this->getBindings(), function ($sql, $binding) {
                return preg_replace('/\?/', is_numeric($binding) ? $binding : "'".$binding."'", $sql, 1);
            }, $this->toSql());
        });

        \Illuminate\Database\Eloquent\Builder::macro('toRawSql', function () {
            return $this->getQuery()->toRawSql();
        });
    }

    protected function registerSchedule()
    {
        Event::listen('console.schedule', function (Schedule $schedule) {
            // Check for system updates every 12 hours
            $schedule->call(function () {
                Classes\UpdateManager::instance()->requestUpdateList(true);
            })->name('System Updates Checker')->cron('0 */12 * * *')->evenInMaintenanceMode();

            // Cleanup activity log
            $schedule->command('activitylog:cleanup')->name('Activity Log Cleanup')->daily();
        });
    }

    protected function registerPermissions()
    {
        PermissionManager::instance()->registerCallback(function ($manager) {
            $manager->registerPermissions('System', [
                'Admin.Activities' => [
                    'label' => 'system::lang.permissions.activities', 'group' => 'system::lang.permissions.name',
                ],
                'Admin.Extensions' => [
                    'label' => 'system::lang.permissions.extensions', 'group' => 'system::lang.permissions.name',
                ],
                'Admin.MailTemplates' => [
                    'label' => 'system::lang.permissions.mail_templates', 'group' => 'system::lang.permissions.name',
                ],
                'Site.Countries' => [
                    'label' => 'system::lang.permissions.countries', 'group' => 'system::lang.permissions.name',
                ],
                'Site.Currencies' => [
                    'label' => 'system::lang.permissions.currencies', 'group' => 'system::lang.permissions.name',
                ],
                'Site.Languages' => [
                    'label' => 'system::lang.permissions.languages', 'group' => 'system::lang.permissions.name',
                ],
                'Site.Settings' => [
                    'label' => 'system::lang.permissions.settings', 'group' => 'system::lang.permissions.name',
                ],
                'Site.Updates' => [
                    'label' => 'system::lang.permissions.updates', 'group' => 'system::lang.permissions.name',
                ],
                'Admin.SystemLogs' => [
                    'label' => 'system::lang.permissions.system_logs', 'group' => 'system::lang.permissions.name',
                ],
            ]);
        });
    }

    protected function registerSystemSettings()
    {
        Settings_model::registerCallback(function (Settings_model $manager) {
            $manager->registerSettingItems('core', [
                'general' => [
                    'label' => 'system::lang.settings.text_tab_general',
                    'description' => 'system::lang.settings.text_tab_desc_general',
                    'icon' => 'fa fa-sliders',
                    'priority' => 0,
                    'permission' => ['Site.Settings'],
                    'url' => admin_url('settings/edit/general'),
                    'form' => '~/app/system/models/config/general_settings',
                    'request' => 'System\Requests\GeneralSettings',
                ],
                'site' => [
                    'label' => 'system::lang.settings.text_tab_site',
                    'description' => 'system::lang.settings.text_tab_desc_site',
                    'icon' => 'fa fa-globe',
                    'priority' => 2,
                    'permission' => ['Site.Settings'],
                    'url' => admin_url('settings/edit/site'),
                    'form' => '~/app/system/models/config/site_settings',
                    'request' => 'System\Requests\SiteSettings',
                ],
                'mail' => [
                    'label' => 'lang:system::lang.settings.text_tab_mail',
                    'description' => 'lang:system::lang.settings.text_tab_desc_mail',
                    'icon' => 'fa fa-envelope',
                    'priority' => 4,
                    'permission' => ['Site.Settings'],
                    'url' => admin_url('settings/edit/mail'),
                    'form' => '~/app/system/models/config/mail_settings',
                    'request' => 'System\Requests\MailSettings',
                ],
                'advanced' => [
                    'label' => 'lang:system::lang.settings.text_tab_server',
                    'description' => 'lang:system::lang.settings.text_tab_desc_server',
                    'icon' => 'fa fa-cog',
                    'priority' => 7,
                    'permission' => ['Site.Settings'],
                    'url' => admin_url('settings/edit/advanced'),
                    'form' => '~/app/system/models/config/advanced_settings',
                    'request' => 'System\Requests\AdvancedSettings',
                ],
            ]);
        });
    }

    protected function registerPagicParser()
    {
        FileParser::setCache(new FileCache(config('system.parsedTemplateCachePath')));

        App::singleton('pagic.environment', function () {
            $pagic = new Environment(new Loader, [
                'cache' => new FileCache(config('view.compiled')),
            ]);

            $pagic->addExtension(new BladeExtension());

            return $pagic;
        });
    }
}
