<?php

return [
    'text_this_payment' => 'este método de pago',
    'text_save_card_profile' => 'Guardar los detalles de la tarjeta para más adelante.',
    'text_refund_title' => 'Reembolso: %s',
    'text_refund_full' => 'Reembolso completo',
    'text_refund_partial' => 'Reembolso parcial',

    'label_order_fee_type' => 'Tipo de tarifa adicional',
    'label_order_fee' => 'Tarifa adicional',
    'label_order_total' => 'Total Mínimo',
    'label_order_status' => 'Estado del pedido',
    'label_refund_type' => 'Tipo de reembolso',
    'label_refund_amount' => 'Reembolso de importe parcial',

    'button_delete_card' => 'Eliminar y usar una tarjeta diferente.',
    'button_refund' => 'Reembolso',

    'alert_min_total' => 'El total del pedido es inferior al mínimo de %s.',
    'alert_min_order_total' => 'Necesitas gastar %s o más para pagar con %s.',
    'alert_order_fee' => 'Hay una cuota adicional de %s cuando pagas con %s.',
    'alert_missing_applicable_fee' => 'Falta cuota adicional para el pago de %s.',

    'help_order_total' => 'El importe total que debe alcanzar el pedido antes de que el método de pago se active',
    'help_order_fee' => 'Cargo extra al total del pedido cuando esta pasarela de pago se activa',
    'help_order_status' => 'Estado del pedido por defecto cuando se utiliza este método de pago.',

    'cod' => [
        'text_tab_general' => 'Configuración',
        'text_payment_title' => 'Entrega Contra-reembolso',
        'text_payment_desc' => 'Aceptar efectivo a la entrega durante el Pago',

        'label_title' => 'Título',
        'label_status' => 'Estado',
        'label_priority' => 'Prioridad',
    ],

    'paypal' => [
        'text_tab_general' => 'Configuración',
        'text_payment_title' => 'PayPal Express',
        'text_payment_desc' => 'Permite a sus clientes realizar el pago mediante PayPal',

        'text_sandbox' => 'Entorno de pruebas',
        'text_go_live' => '¡Ir en vivo!',
        'text_sale' => 'VENTA',
        'text_authorization' => 'AUTORIZACIÓN',

        'label_title' => 'Título',
        'label_api_user' => 'Nombre de usuario de la API',
        'label_api_pass' => 'Contraseña para la API',
        'label_api_signature' => 'Firma de la API',
        'label_api_mode' => 'Modo',
        'label_api_action' => 'Proceso de pago',
        'label_priority' => 'Prioridad',
        'label_status' => 'Estado',

        'alert_error_server' => '<p class="alert-danger">Lo sentimos, ha ocurrido un error, por favor inténtelo de nuevo</p>',
    ],

    'authorize_net_aim' => [
        'text_payment_title' => 'Authorize.Net (AIM)',
        'text_payment_desc' => 'Aceptar pagos con tarjeta de crédito a través de Authorize.Net',
        'text_go_live' => '¡Ir en vivo!',
        'text_test' => 'Prueba',
        'text_test_live' => 'Prueba en vivo',
        'text_sale' => 'VENTA',
        'text_auth_only' => 'Sólo autorización',
        'text_auth_capture' => 'Autorización y captura',
        'text_visa' => 'Visa',
        'text_mastercard' => 'Mastercard',
        'text_american_express' => 'American Express',
        'text_jcb' => 'JCB',
        'text_diners_club' => 'Diners Club',

        'label_title' => 'Título',
        'label_api_login_id' => 'ID de acceso a la API',
        'label_client_key' => 'Clave de cliente',
        'label_transaction_key' => 'Clave de transacción',
        'label_transaction_mode' => 'Modo de transacción',
        'label_transaction_type' => 'Tipo de transacción',
        'label_accepted_cards' => 'Tarjetas aceptadas',
        'label_priority' => 'Prioridad',
        'label_status' => 'Estado',

        'alert_acceptable_cards' => 'Sólo aceptamos %s',
    ],

    'stripe' => [
        'text_tab_general' => 'Configuración',
        'text_payment_title' => 'Pagos con Stripe',
        'text_payment_desc' => 'Aceptar pagos con tarjeta de crédito usando Stripe',
        'text_credit_or_debit' => 'Tarjeta de crédito o débito',

        'text_auth_only' => 'Sólo autorización',
        'text_auth_capture' => 'Autorización y captura',
        'text_description' => 'Pagar con tarjeta de crédito usando Stripe',
        'text_live' => 'Real',
        'text_test' => 'Prueba',
        'text_stripe_charge_description' => '%s Cargo por %s',
        'text_payment_status' => 'Pago %s (%s)',

        'label_title' => 'Título',
        'label_description' => 'Descripción',
        'label_transaction_mode' => 'Modo de transacción',
        'label_transaction_type' => 'Tipo de transacción',
        'label_test_secret_key' => 'Prueba Clave secreta',
        'label_test_publishable_key' => 'Prueba Clave Publicable',
        'label_live_secret_key' => 'Real Clave secreta',
        'label_live_publishable_key' => 'Real Clave Publicable',
        'label_priority' => 'Prioridad',
        'label_status' => 'Estado',
    ],

    'mollie' => [
        'text_payment_title' => 'Pago Mollie',
        'text_payment_desc' => 'Aceptar pagos con tarjeta de crédito usando la API Mollie',

        'text_live' => 'Real',
        'text_test' => 'Prueba',
        'text_description' => 'Pagar con tarjeta de crédito usando Mollie',
        'text_payment_status' => 'Pago %s (%s)',

        'label_transaction_mode' => 'Modo de transacción',
        'label_test_api_key' => 'Probar clave API',
        'label_live_api_key' => 'Llave API en vivo',
    ],

    'square' => [
        'text_payment_title' => 'Pagos con Square',
        'text_payment_desc' => 'Aceptar pagos con tarjeta de crédito usando Square',

        'text_description' => 'Pagar con tarjeta de crédito usando Square',
        'text_live' => 'En vivo',
        'text_test' => 'Prueba',
        'text_payment_status' => 'Pago %s (%s)',

        'label_title' => 'Título',
        'label_description' => 'Descripción',
        'label_transaction_mode' => 'Modo de transacción',
        'label_test_app_id' => 'Probar ID de aplicación',
        'label_test_access_token' => 'Token de acceso en Prueba',
        'label_test_location_id' => 'Probar ID de ubicación',
        'label_live_app_id' => 'ID de aplicación en vivo',
        'label_live_access_token' => 'Token de acceso en vivo',
        'label_live_location_id' => 'ID de ubicación en vivo',

        'help_square' => 'Obtén las claves API de Square de <a href="https://developer.squareup.com">aquí</a>',
    ],
];
