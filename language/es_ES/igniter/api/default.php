<?php

return [
    'search_prompt' => 'Buscar nombre api',
    'search_tokens_prompt' => 'Buscar tokens',

    'text_tab_general' => 'General',
    'text_tokens_title' => 'Token de acceso',
    'text_token_type_staff' => 'Personal',
    'text_token_type_customer' => 'Cliente',
    'text_guest' => 'Invitados',
    'text_admin' => 'Personal',
    'text_customer' => 'Clientes',
    'text_admin_customer' => 'Personal o clientes',
    'text_all' => 'Todos',
    'text_allow_only' => 'Sólo permitir',

    'button_tokens' => '<i class="fa fa-key"></i>&nbsp;&nbsp;Tokens de acceso',

    'column_api_name' => 'Nombre de la API',
    'column_base_endpoint' => 'Endpoit Base',
    'column_description' => 'Descripción',

    'column_issued_to' => 'Emitido para:',
    'column_token_type' => 'Tipo',
    'column_device_name' => 'Nombre del dispositivo',
    'column_created' => 'Creado en',
    'column_lastused' => 'Última vez usado',

    'label_api_name' => 'Nombre de la API',
    'label_base_endpoint' => 'Endpoit Base',
    'label_description' => 'Descripción',
    'label_api_name_comment' => 'Nombre de tu recurso API',
    'label_description_comment' => 'Describe tu recurso API',
    'label_base_endpoint_comment' => 'https://example.com/api/<b>endpoint</b>',

    'label_controller' => 'Controlador',
    'label_actions' => 'Acciones',
    'help_actions' => 'Dejar en blanco para desactivar el endpoint.',
    'label_require_authorization' => 'Requiere autorización',
    'label_setup' => 'Documentos de referencia',

    'actions' => [
        'text_index' => 'Listar todos los recursos (GET)',
        'text_show' => 'Mostrar un solo recurso (GET)',
        'text_store' => 'Crear un recurso (POST)',
        'text_update' => 'Actualizar un recurso (PUT/PATCH)',
        'text_destroy' => 'Eliminar un recurso (DELETE)',
    ],

    'alert_auth_failed' => 'No se ha proporcionado un token de API válido.',
    'alert_auth_restricted' => 'El token de API no tiene permisos para realizar la solicitud.',
    'alert_token_restricted' => 'El token de API no tiene las habilidades adecuadas para realizar esta acción',
    'alert_validation_failed' => 'Error al validar los parámetros de la solicitud',
];
