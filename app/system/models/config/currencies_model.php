<?php
$config['list']['filter'] = [
    'search' => [
        'prompt' => 'lang:system::lang.currencies.text_filter_search',
        'mode' => 'all', // or any, exact
    ],
    'scopes' => [
        'status' => [
            'label' => 'lang:admin::lang.text_filter_status',
            'type' => 'switch',
            'conditions' => 'currency_status = :filtered',
        ],
    ],
];

$config['list']['toolbar'] = [
    'buttons' => [
        'create' => [
            'label' => 'lang:admin::lang.button_new',
            'class' => 'btn btn-primary',
            'href' => 'currencies/create',
        ],
    ],
];

$config['list']['bulkActions'] = [
    'status' => [
        'label' => 'lang:admin::lang.list.actions.label_status',
        'type' => 'dropdown',
        'class' => 'btn btn-light',
        'statusColumn' => 'currency_status',
        'menuItems' => [
            'enable' => [
                'label' => 'lang:admin::lang.list.actions.label_enable',
                'type' => 'button',
                'class' => 'dropdown-item',
            ],
            'disable' => [
                'label' => 'lang:admin::lang.list.actions.label_disable',
                'type' => 'button',
                'class' => 'dropdown-item text-danger',
            ],
        ],
    ],
    'delete' => [
        'label' => 'lang:admin::lang.button_delete',
        'class' => 'btn btn-light text-danger',
        'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
    ],
];

$config['list']['columns'] = [
    'edit' => [
        'type' => 'button',
        'iconCssClass' => 'fa fa-pencil',
        'attributes' => [
            'class' => 'btn btn-edit',
            'href' => 'currencies/edit/{currency_id}',
        ],
    ],
    'currency_name' => [
        'label' => 'lang:admin::lang.label_name',
        'type' => 'text',
        'searchable' => true,
    ],
    'currency_code' => [
        'label' => 'lang:system::lang.currencies.column_code',
        'type' => 'text',
        'searchable' => true,
    ],
    'currency_symbol' => [
        'label' => 'lang:system::lang.currencies.column_symbol',
        'type' => 'text',
    ],
    'country_name' => [
        'label' => 'lang:system::lang.currencies.column_country',
        'relation' => 'country',
        'select' => 'country_name',
        'searchable' => true,
    ],
    'currency_rate' => [
        'label' => 'lang:system::lang.currencies.column_rate',
        'type' => 'number',
        'invisible' => true,
    ],
    'currency_status' => [
        'label' => 'lang:system::lang.currencies.column_status',
        'type' => 'switch',
    ],
    'currency_id' => [
        'label' => 'lang:admin::lang.column_id',
        'invisible' => true,
    ],
    'created_at' => [
        'label' => 'lang:admin::lang.column_date_added',
        'invisible' => true,
        'type' => 'timesense',
    ],
    'updated_at' => [
        'label' => 'lang:admin::lang.column_date_updated',
        'invisible' => true,
        'type' => 'timesense',
    ],
];

$config['form']['toolbar'] = [
    'buttons' => [
        'back' => [
            'label' => 'lang:admin::lang.button_icon_back',
            'class' => 'btn btn-outline-secondary',
            'href' => 'currencies',
        ],
        'save' => [
            'label' => 'lang:admin::lang.button_save',
            'context' => ['create', 'edit'],
            'partial' => 'form/toolbar_save_button',
            'class' => 'btn btn-primary',
            'data-request' => 'onSave',
            'data-progress-indicator' => 'admin::lang.text_saving',
        ],
        'delete' => [
            'label' => 'lang:admin::lang.button_icon_delete',
            'class' => 'btn btn-danger',
            'data-request' => 'onDelete',
            'data-request-data' => "_method:'DELETE'",
            'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
            'data-progress-indicator' => 'admin::lang.text_deleting',
            'context' => ['edit'],
        ],
    ],
];

$config['form']['fields'] = [
    'currency_name' => [
        'label' => 'lang:system::lang.currencies.label_title',
        'type' => 'text',
        'span' => 'left',
    ],
    'currency_code' => [
        'label' => 'lang:system::lang.currencies.label_code',
        'type' => 'text',
        'span' => 'right',
        'comment' => 'lang:system::lang.currencies.help_iso',
    ],
    'country_id' => [
        'label' => 'lang:system::lang.currencies.label_country',
        'type' => 'relation',
        'relationFrom' => 'country',
        'nameFrom' => 'country_name',
        'span' => 'left',
        'placeholder' => 'lang:admin::lang.text_please_select',
    ],
    'currency_rate' => [
        'label' => 'lang:system::lang.currencies.label_rate',
        'type' => 'number',
        'span' => 'right',
    ],
    'symbol_position' => [
        'label' => 'lang:system::lang.currencies.label_symbol_position',
        'type' => 'radiotoggle',
        'span' => 'left',
        'options' => [
            'lang:system::lang.currencies.text_left',
            'lang:system::lang.currencies.text_right',
        ],
    ],
    'currency_symbol' => [
        'label' => 'lang:system::lang.currencies.label_symbol',
        'type' => 'text',
        'span' => 'right',
    ],
    'thousand_sign' => [
        'label' => 'lang:system::lang.currencies.label_thousand_sign',
        'type' => 'text',
        'span' => 'left',
    ],
    'decimal_sign' => [
        'label' => 'lang:system::lang.currencies.label_decimal_sign',
        'type' => 'text',
        'span' => 'right',
    ],
    'decimal_position' => [
        'label' => 'lang:system::lang.currencies.label_decimal_position',
        'type' => 'number',
        'span' => 'left',
    ],
    'currency_status' => [
        'label' => 'lang:admin::lang.label_status',
        'type' => 'switch',
        'span' => 'right',
        'default' => true,
    ],
];

return $config;
