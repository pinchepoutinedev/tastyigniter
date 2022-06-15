<?php

namespace System\Controllers;

use Admin\Facades\AdminMenu;

class MailLayouts extends \Admin\Classes\AdminController
{
    public $implement = [
        'Admin\Actions\ListController',
        'Admin\Actions\FormController',
    ];

    public $listConfig = [
        'list' => [
            'model' => 'System\Models\Mail_layouts_model',
            'title' => 'lang:system::lang.mail_templates.text_title',
            'emptyMessage' => 'lang:system::lang.mail_templates.text_empty',
            'defaultSort' => ['layout_id', 'DESC'],
            'configFile' => 'mail_layouts_model',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:system::lang.mail_templates.text_form_name',
        'model' => 'System\Models\Mail_layouts_model',
        'request' => 'System\Requests\MailLayout',
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'mail_layouts/edit/{layout_id}',
            'redirectClose' => 'mail_layouts',
            'redirectNew' => 'mail_layouts/create',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'mail_layouts/edit/{layout_id}',
            'redirectClose' => 'mail_layouts',
            'redirectNew' => 'mail_layouts/create',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'mail_layouts',
        ],
        'delete' => [
            'redirect' => 'mail_layouts',
        ],
        'configFile' => 'mail_layouts_model',
    ];

    protected $requiredPermissions = 'Admin.MailTemplates';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('mail_templates', 'design');
    }

    public function formExtendFields($form)
    {
        if ($form->context != 'create') {
            $field = $form->getField('code');
            $field->disabled = true;
        }
    }
}
