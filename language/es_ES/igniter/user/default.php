<?php

return [
    'text_title' => 'Mi Cuenta',

    'text_heading' => 'Cuenta',
    'text_account' => 'Mi Cuenta',
    'text_edit_details' => 'Editar Mis Datos',
    'text_address' => 'Libreta de Direcciones',
    'text_orders' => 'Pedidos Recientes',
    'text_reservations' => 'Reservaciones Recientes',
    'text_inbox' => 'Mi Bandeja de Entrada',
    'text_welcome' => '¡Bienvenido %s!',
    'text_cart_summary' => 'Tienes %s elementos: %s',
    'text_change_password' => 'Cambiar Contraseña',
    'text_order' => 'HACER PEDIDO',
    'text_checkout' => 'PAGAR AHORA',
    'text_edit' => 'EDITAR',
    'text_set_default' => 'HACERLO PREDETERMINADO',
    'text_default_address' => 'Mi Dirección Predeterminada',
    'text_no_default_address' => 'No tienes una dirección predeterminada',
    'text_no_orders' => 'No hay pedidos disponibles para mostrar.',
    'text_no_reservations' => 'No hay reservass disponibles para mostrar.',
    'text_no_inbox' => 'No hay mensajes disponibles para mostrar',
    'text_no_cart_items' => 'No hay menús añadidos en su carrito.',

    'text_logout' => 'Salir',
    'text_logged_in' => '¿Ya tienes una cuenta?<a href="%s">Acceda aquí</a>
',
    'text_logged_out' => 'Bienvenido de nuevo <b>%s</b>, ¿No eres tú? <a href="javascript:;" data-request="%s">Cerrar sesión</a>',

    'label_heading' => 'Encabezado:',
    'label_template' => 'Plantillas de correo',
    'label_send_to' => 'Enviar a',
    'label_send_to_staff_group' => 'Enviar a Grupo de empleados',
    'label_send_to_custom' => 'Enviar a la dirección de correo',

    'column_date' => 'Fecha/Hora',
    'column_subject' => 'Asunto',

    'alert_logout_success' => 'Su sesión se ha cerrado correctamente.',

    'text_send_to_restaurant' => 'Dirección de correo del restaurante',
    'text_send_to_location' => 'Correo electrónico de la ubicación (si está disponible)',
    'text_send_to_staff_email' => 'Dirección de correo del personal (si está disponible)',
    'text_send_to_customer_email' => 'Dirección de correo electrónico del cliente (si está disponible)',
    'text_send_to_custom' => 'Email específico',
    'text_send_to_staff_group' => 'Grupo de personal',

    'login' => [
        'label_password' => 'Contraseña',
        'label_password_confirm' => 'Confirmar contraseña',
        'label_remember' => 'Recuérdame',
        'label_activation' => 'Código de Activación',
        'label_newsletter' => 'Manténganme informado con ofertas por correo electrónico.',
        'label_terms' => 'Haciendo clic en Registro, usted acepta los <a target="_blank" href="%s">Términos y Condiciones</a> establecidos por este sitio, incluyendo nuestro <a target="_blank" href="#">Uso de Cookies</a>.',
        'label_i_agree' => 'Estoy de Acuerdo',
        'label_subscribe' => 'Subscribirse',

        'button_terms_agree' => 'Estoy de Acuerdo',
        'button_subscribe' => 'Subscribirse',
        'button_login' => 'Inicio de sesión',
        'button_register' => 'Registrarse',

        'error_email_exist' => 'La dirección de correo electrónico ya tiene una cuenta, por favor inicie sesión',

        'alert_logout_success' => 'Su sesión se ha cerrado correctamente.',
        'alert_expired_login' => 'La sesión expiró. Por favor inicie sesión de nuevo.',
        'alert_invalid_login' => 'Usuario y contraseña no encontrados!',
        'alert_account_created' => 'Cuenta creada con éxito, inicia sesión a continuación!',
        'alert_account_activation' => 'Se ha enviado un correo de confirmación a tu dirección de email.',
        'alert_registration_disabled' => 'El administrador del sitio ha deshabilitado el registro.',

        'activity_registered_account_title' => 'Cliente registrado',
        'activity_registered_account' => '<b>:properties.full_name</b> creó una cuenta.',
    ],

    'session' => [
        'component_title' => 'Componente de sesión',
        'component_desc' => 'Añade sesión de autenticación a la página y restringe el acceso a ella.',
    ],

    'account' => [
        'component_title' => 'Componente de cuenta',
        'component_desc' => 'Mostrar panel de cuentas',
        'text_heading' => 'Libreta de Direcciones',
        'text_my_account' => 'Mi Cuenta',
        'text_edit_heading' => 'Editar Libreta de Direcciones',
        'text_no_address' => 'No tienes ningúna direccion guardada',
        'text_edit' => 'EDITAR',
        'text_delete' => 'ELIMINAR',

        'button_back' => 'Atras',
        'button_add' => 'Agregar nueva dirección',
        'button_update' => 'Actualizar dirección',

        'label_address_1' => 'Dirección 1',
        'label_address_2' => 'Dirección 2',
        'label_city' => 'Ciudad',
        'label_state' => 'Estado/Provincia',
        'label_postcode' => 'Código postal',
        'label_country' => 'País',

        'alert_updated_success' => 'Dirección añadida/actualizada correctamente.',
        'alert_deleted_success' => 'Dirección eliminada con éxito.',
    ],
    'reset' => [
        'component_title' => 'Componente Restablecer Contraseña',
        'component_desc' => 'Formulario de restablecimiento de contraseña',

        'text_heading' => 'Restablecer contraseña de la cuenta',
        'text_summary' => 'Dirección de correo electrónico que utilizas para iniciar sesión. Te enviaremos un correo electrónico con una nueva contraseña.',

        'label_email' => 'Dirección de correo electrónico',
        'label_password' => 'Contraseña',
        'label_password_confirm' => 'Confirmar Contraseña',
        'label_code' => 'Restablecer código',

        'button_login' => 'Inicio de sesión',
        'button_reset' => 'Restablecer contraseña',

        'alert_reset_success' => 'Contraseña restablecida con éxito',
        'alert_reset_request_success' => 'Solicitud de restablecimiento de contraseña con éxito, por favor revisa tu correo electrónico sobre cómo continuar.',
        'alert_reset_error' => 'Error al restablecer la contraseña, no se ha encontrado el correo electrónico o se han introducido datos incorrectos.',
        'alert_reset_failed' => 'Error al restablecer la contraseña. El código de restablecimiento no es válido o ha caducado.',
        'alert_activation_failed' => 'Error al activar la cuenta. Vuelve a intentarlo.',
        'alert_no_email_match' => 'No existe esa dirección de correo electrónico',
    ],
    'addressbook' => [
        'component_title' => 'Componente de la libreta de direcciones',
        'component_desc' => 'Muestra y administra la libreta de direcciones ',
    ],
    'settings' => [
        'component_title' => 'Componente de configuración de la cuenta',
        'component_desc' => 'Administrar configuración de cuenta',
        'text_heading' => 'Mis Datos',
        'text_details' => 'Editar tus datos',
        'text_password_heading' => 'Cambiar contraseña',

        'button_subscribe' => 'Suscríbete',
        'button_back' => 'Atrás',
        'button_save' => 'Guardar Datos',

        'label_first_name' => 'Nombre',
        'label_last_name' => 'Apellido',
        'label_email' => 'Correo Electrónico',
        'label_password' => 'Nueva Contraseña',
        'label_password_confirm' => 'Confirmar Nueva Contraseña',
        'label_old_password' => 'Contraseña Antigua',
        'label_telephone' => 'Teléfono',
        'label_s_question' => 'Pregunta de Seguridad',
        'label_s_answer' => 'Respuesta de Seguridad',
        'label_newsletter' => 'Mantenerme actualizado con ofertas por correo electrónico.',

        'error_password' => 'El %s que introducido no coincide.',

        'alert_updated_success' => 'Datos actualizados correctamente.',
    ],
];
