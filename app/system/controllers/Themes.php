<?php

namespace System\Controllers;

use Admin\Facades\AdminMenu;
use Admin\Facades\Template;
use Admin\Traits\WidgetMaker;
use Exception;
use Igniter\Flame\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Main\Classes\ThemeManager;
use System\Facades\Assets;
use System\Helpers\CacheHelper;
use System\Libraries\Assets as AssetsManager;
use System\Models\Themes_model;
use System\Traits\ConfigMaker;
use System\Traits\ManagesUpdates;
use System\Traits\SessionMaker;

class Themes extends \Admin\Classes\AdminController
{
    use WidgetMaker;
    use ConfigMaker;
    use SessionMaker;
    use ManagesUpdates;

    public $implement = [
        'Admin\Actions\ListController',
        'Admin\Actions\FormController',
    ];

    public $listConfig = [
        'list' => [
            'model' => 'System\Models\Themes_model',
            'title' => 'lang:system::lang.themes.text_title',
            'emptyMessage' => 'lang:system::lang.themes.text_empty',
            'defaultSort' => ['theme_id', 'DESC'],
            'configFile' => 'themes_model',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:system::lang.themes.text_form_name',
        'model' => 'System\Models\Themes_model',
        'request' => 'System\Requests\Theme',
        'edit' => [
            'title' => 'system::lang.themes.text_edit_title',
            'redirect' => 'themes/edit/{code}',
            'redirectClose' => 'themes',
        ],
        'source' => [
            'title' => 'system::lang.themes.text_source_title',
            'redirect' => 'themes/source/{code}',
            'redirectClose' => 'themes',
        ],
        'delete' => [
            'redirect' => 'themes',
        ],
        'configFile' => 'themes_model',
    ];

    protected $requiredPermissions = 'Site.Themes';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('themes', 'design');
    }

    public function index()
    {
        Themes_model::syncAll();

        $this->initUpdate('theme');

        $this->asExtension('ListController')->index();
    }

    public function edit($context, $themeCode = null)
    {
        if (!ThemeManager::instance()->isActive($themeCode)) {
            flash()->error(lang('system::lang.themes.alert_customize_not_active'));

            return $this->redirect('themes');
        }

        if (ThemeManager::instance()->isLocked($themeCode)) {
            Template::setButton(lang('system::lang.themes.button_child'), [
                'class' => 'btn btn-default pull-right',
                'data-request' => 'onCreateChild',
            ]);
        }

        Template::setButton(lang('system::lang.themes.button_source'), [
            'class' => 'btn btn-default pull-right mr-3',
            'href' => admin_url('themes/source/'.$themeCode),
        ]);

        $this->asExtension('FormController')->edit($context, $themeCode);
    }

    public function source($context, $themeCode = null)
    {
        if (ThemeManager::instance()->isLocked($themeCode)) {
            Template::setButton(lang('system::lang.themes.button_child'), [
                'class' => 'btn btn-default pull-right',
                'data-request' => 'onCreateChild',
            ]);
        }

        $theme = ThemeManager::instance()->findTheme($themeCode);
        if ($theme && $theme->hasCustomData()) {
            Template::setButton(lang('system::lang.themes.button_customize'), [
                'class' => 'btn btn-default pull-right mr-3',
                'href' => admin_url('themes/edit/'.$themeCode),
            ]);
        }

        $this->asExtension('FormController')->edit($context, $themeCode);
    }

    public function delete($context, $themeCode = null)
    {
        try {
            $pageTitle = lang('system::lang.themes.text_delete_title');
            Template::setTitle($pageTitle);
            Template::setHeading($pageTitle);

            $themeManager = ThemeManager::instance();
            $theme = $themeManager->findTheme($themeCode);
            $model = Themes_model::whereCode($themeCode)->first();
            $activeThemeCode = params()->get('default_themes.main');

            // Theme must be disabled before it can be deleted
            if ($model && $model->code == $activeThemeCode) {
                flash()->warning(sprintf(
                    lang('admin::lang.alert_error_nothing'),
                    lang('admin::lang.text_deleted').lang('system::lang.themes.text_theme_is_active')
                ));

                return $this->redirectBack();
            }

            // Theme not found in filesystem
            // so delete from database
            if (!$theme) {
                Themes_model::deleteTheme($themeCode, true);
                flash()->success(sprintf(lang('admin::lang.alert_success'), 'Theme deleted '));

                return $this->redirectBack();
            }

            // Lets display a delete confirmation screen
            // with list of files to be deleted
            $this->vars['themeModel'] = $model;
            $this->vars['themeObj'] = $theme;
            $this->vars['themeData'] = $model->data;
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }
    }

    public function index_onSetDefault()
    {
        $themeName = post('code');
        if ($theme = Themes_model::activateTheme($themeName)) {
            CacheHelper::instance()->clearView();

            flash()->success(sprintf(lang('admin::lang.alert_success'), 'Theme ['.$theme->name.'] set as default '));
        }

        return $this->redirectBack();
    }

    public function source_onSave($context, $themeCode = null)
    {
        $formController = $this->asExtension('FormController');
        $model = $this->formFindModelObject($themeCode);
        $formController->initForm($model, $context);

        $this->widgets['formTemplate']->onSaveSource();

        flash()->success(
            sprintf(lang('admin::lang.form.edit_success'), lang('lang:system::lang.themes.text_form_name'))
        );

        if ($redirect = $formController->makeRedirect($context, $model)) {
            return $redirect;
        }
    }

    public function onCreateChild($context, $themeCode = null)
    {
        $manager = ThemeManager::instance();

        $model = $this->formFindModelObject($themeCode);

        $childTheme = $manager->createChildTheme($model);

        ThemeManager::forgetInstance();
        $manager = ThemeManager::instance();
        $manager->bootThemes();

        Themes_model::syncAll();
        Themes_model::activateTheme($childTheme->code);

        flash()->success(sprintf(lang('admin::lang.alert_success'), 'Child theme ['.$childTheme->name.'] created '));

        return $this->redirect('themes/source/'.$childTheme->code);
    }

    public function delete_onDelete($context = null, $themeCode = null)
    {
        if (Themes_model::deleteTheme($themeCode, post('delete_data', 1) == 1)) {
            flash()->success(sprintf(lang('admin::lang.alert_success'), 'Theme deleted '));
        }
        else {
            flash()->danger(lang('admin::lang.alert_error_try_again'));
        }

        return $this->redirect('themes');
    }

    public function listOverrideColumnValue($record, $column, $alias = null)
    {
        if ($column->type != 'button' || $column->columnName != 'default')
            return null;

        $attributes = $column->attributes;

        $column->iconCssClass = 'fa fa-star-o';
        if ($record->getTheme() && $record->getTheme()->isActive()) {
            $column->iconCssClass = 'fa fa-star';
            $attributes['title'] = 'lang:system::lang.themes.text_is_default';
            $attributes['data-request'] = null;
        }

        return $attributes;
    }

    public function formExtendConfig(&$formConfig)
    {
        $formConfig['data'] = $formConfig['model']->toArray();

        if ($formConfig['context'] != 'source') {
            $formConfig['tabs']['fields'] = $formConfig['model']->getFieldsConfig();
            $formConfig['data'] = array_merge($formConfig['model']->getFieldValues(), $formConfig['data']);
            $formConfig['arrayName'] .= '[data]';

            return;
        }

        $formConfig['arrayName'] .= '[source]';
    }

    public function formFindModelObject($recordId)
    {
        if (!strlen($recordId)) {
            throw new Exception(lang('admin::lang.form.missing_id'));
        }

        $model = $this->formCreateModelObject();

        // Prepare query and find model record
        $query = $model->newQuery();
        $result = $query->where('code', $recordId)->first();

        if (!$result) {
            throw new Exception(sprintf(lang('admin::lang.form.not_found'), $recordId));
        }

        return $result;
    }

    public function formAfterSave($model)
    {
        if ($this->widgets['form']->context != 'source') {
            $this->buildAssetsBundle($model);
        }
    }

    protected function buildAssetsBundle($model)
    {
        if (!$model->getFieldsConfig())
            return;

        if (!config('system.publishThemeAssetsBundle', true))
            return;

        $loaded = false;
        $theme = $model->getTheme();
        $file = '/_meta/assets.json';

        if (File::exists($path = $theme->path.$file)) {
            Assets::addFromManifest($theme->publicPath.$file);
            $loaded = true;
        }

        if ($theme->hasParent() && File::exists($path = $theme->getParent()->path.$file)) {
            Assets::addFromManifest($theme->getParent()->publicPath.$file);
            $loaded = true;
        }

        if (!$loaded)
            return;

        Event::listen('assets.combiner.beforePrepare', function (AssetsManager $combiner, $assets) use ($theme) {
            ThemeManager::applyAssetVariablesOnCombinerFilters(
                array_flatten($combiner->getFilters()), $theme
            );
        });

        try {
            Artisan::call('igniter:util', ['name' => 'compile scss']);
            Artisan::call('igniter:util', ['name' => 'compile js']);
        }
        catch (Exception $ex) {
            Log::error($ex);
            flash()->error('Building assets bundle error: '.$ex->getMessage())->important();
        }
    }

    public function getTemplateValue($name, $default = null)
    {
        $themeCode = $this->params[0] ?? 'default';
        $cacheKey = $themeCode.'-selected-'.$name;

        return $this->getSession($cacheKey, $default);
    }

    public function setTemplateValue($name, $value)
    {
        $themeCode = $this->params[0] ?? 'default';
        $cacheKey = $themeCode.'-selected-'.$name;
        $this->putSession($cacheKey, $value);
    }
}
