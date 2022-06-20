<?php

return [
    'text_tab_sms' => 'SMS',
    'text_tab_alert' => 'Alerta (ej. holgazanear )',
    'text_send_to_location_tel' => 'Número de teléfono de ubicación (si está disponible)',
    'text_send_to_customer_tel' => 'Dirección de correo electrónico del cliente (si está disponible)',
    'text_send_to_order_tel' => 'Número de teléfono del pedido (si está disponible)',
    'text_send_to_reservation_tel' => 'Reservation phone number (if available)',
    'text_send_to_custom_tel' => 'Número de teléfono específico',

    'setting_title' => 'Configurar canales SMS',
    'setting_desc' => 'Configurar configuración twilio, plivo, nexmo o clickatell.',

    'label_template' => 'Plantilla de SMS',
    'label_send_to' => 'Enviar a',
    'label_send_to_custom' => 'Enviar a número de teléfono',

    'help_template' => 'Para personalizar plantillas SMS, vaya a Diseño -> Plantillas SMS.',

    'nexmo' => [
        'text_title' => 'Canal SMS Nexmo',
        'text_desc' => 'Enviando notificaciones SMS usando Nexmo.',
    ],

    'twilio' => [
        'text_title' => 'Canal Twilio SMS',
        'text_desc' => 'Enviando notificaciones SMS usando Twilio.',
    ],

    'clickatell' => [
        'text_title' => 'Canal SMS Clickatell',
        'text_desc' => 'Enviar notificaciones SMS usando Clickatell.',
    ],

    'plivo' => [
        'text_title' => 'Canal SMS de Plivo',
        'text_desc' => 'Enviando notificaciones SMS usando Plivo.',
    ],

    'channel' => [
        'text_title' => 'Canales SMS',
        'text_new_title' => 'Canal SMS: Nuevo',
        'text_edit_title' => 'Canal SMS: Actualizar',
        'text_preview_title' => 'Canal SMS: Vista previa',
        'text_form_name' => 'Canal SMS',
        'text_empty' => 'Ningún canal sms añadido',

        'column_label' => 'Etiqueta',
        'column_description' => 'Descripción',
        'column_updated_at' => 'Actualizado el',
        'column_created_at' => 'Creado el',

        'label_channel' => 'Canal',
        'label_label' => 'Etiqueta',
        'label_code' => 'Código',
    ],

    'template' => [
        'text_title' => 'Plantillas SMS',
        'text_new_title' => 'Plantilla SMS: Nuevo',
        'text_edit_title' => 'Plantilla SMS: Actualizar',
        'text_preview_title' => 'Plantilla SMS: Vista previa',
        'text_form_name' => 'Plantilla SMS',
        'text_empty' => 'No hay plantilla sms añadida',
        'text_order_placed' => 'Notificación sms de confirmación de pedido al personal.',
        'text_order_status_changed' => 'El estado del pedido cambió la notificación sms al cliente.',
        'text_order_assigned' => 'Pedido asignado sms notificación al personal.',
        'text_new_reservation' => 'Notificación sms de confirmación de reserva al personal.',
        'text_reservation_status_changed' => 'El estado de la reserva cambió la notificación sms al cliente.',
        'text_reservation_assigned' => 'La reserva asignó la notificación sms al personal.',
        'text_order_confirmed' => 'Notificación sms confirmada del pedido al cliente.',
        'text_reservation_confirmed' => 'Notificación sms confirmada de reserva al cliente.',

        'column_name' => 'Nombre',
        'column_updated_at' => 'Actualizado el',
        'column_created_at' => 'Creado el',

        'label_content' => 'Mensaje',

        'button_test_message' => 'Enviar mensaje de prueba',

        'alert_test_message_sent' => 'Mensaje SMS de prueba enviado con éxito a %s',
    ],
];
