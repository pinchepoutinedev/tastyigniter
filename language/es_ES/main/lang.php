<?php
return [
    'site_title' => '%s - %s',
    'site_copyright' => '&copy; %s %s - ',

    'text_free' => 'Gratis',
    'text_equals' => ' = ',
    'text_plus' => '+',
    'text_minus' => '-',
    'text_minutes' => 'minutos',
    'text_min' => 'min',
    'text_my_account' => 'Mi Cuenta',
    'text_information' => 'Información',
    'text_follow_us' => 'Síguenos en',

    'text_maintenance_enabled' => 'Mantenimiento habilitado',

    'menu_home' => 'Inicio',
    'menu_menu' => 'Ver el menú',
    'menu_reservation' => 'Reserva',
    'menu_login' => 'Iniciar sesión',
    'menu_logout' => 'Cerrar sesión',
    'menu_register' => 'Registrarse',
    'menu_my_account' => 'Mi cuenta',
    'menu_account' => 'Principal',
    'menu_detail' => 'Editar detalles',
    'menu_address' => 'Agenda de direcciones',
    'menu_recent_order' => 'Pedidos recientes',
    'menu_recent_reservation' => 'Reservas recientes',
    'menu_locations' => 'Nuestras ubicaciones',
    'menu_contact' => 'Contáctenos',
    'menu_admin' => 'Administrador',

    'alert_success' => '%s Éxitosamente.',
    'alert_error' => 'Se produjo un error, %s.',
    'alert_error_nothing' => 'Se produjo un error, %s.',
    'alert_error_try_again' => 'Se ha producido un error, por favor vuelva a intentarlo.',
    'alert_warning_confirm' => 'Esta acción no se puede deshacer. ¿Está seguro de continuar?',
    'alert_custom_error' => 'Algo salió mal y no se puede mostrar la página',

    'alert_no_search_query' => 'Por favor, introduce una dirección/código postal para comprobar si podemos entregar tu pedido.',
    'alert_info_outdated_browser' => 'Está utilizando un navegador desactualizado. <a href="http://browsehappy.com/">Actualice su navegador hoy</a> o <a href="http://www.google.com/chromeframe/?redirect=true">instale Google Chrome Frame</a> para experimentar mejor este sitio.',

    'components' => [
        'button_new' => 'Añadir componente',
        'button_edit' => 'Editar componente',
        'button_delete' => 'Eliminar componente',
    ],

    'media_manager' => [
        'text_title' => 'Gestor de Contenidos',
        'text_heading' => 'Gestor de Contenidos',
        'text_empty' => 'No se han encontrado archivos.',
        'text_read_only' => 'Solo lectura',
        'text_read_write' => 'Lectura y escritura',
        'text_footer_note' => '%s elementos seleccionados, %s',
        'text_no_access' => 'Sin acceso',
        'text_items' => 'Artículos',
        'text_choose' => 'Elegir',
        'text_attach' => 'Adjuntar',
        'text_sort_by' => 'Ordenar por',
        'text_filter_search' => 'Buscar archivos y carpetas...',
        'text_new_folder' => 'Nueva Carpeta',
        'text_rename_folder' => 'Renombrar Carpeta',
        'text_delete_folder' => 'Borrar carpeta',
        'text_move_folder' => 'Mover carpeta',
        'text_items_selected' => 'Elementos seleccionados',
        'text_folder_name' => 'Nombre de la carpeta',
        'text_file_name' => 'Nombre del archivo',
        'text_destination_folder' => 'Carpeta de destino',

        'button_upload' => 'Subir',
        'button_preview' => 'Vista previa',
        'button_rename' => 'Renombrar',
        'button_move' => 'Mover',
        'button_copy' => 'Copiar',
        'button_delete' => 'Eliminar',
        'button_cancel' => 'Cancelar',

        'label_name' => 'Nombre',
        'label_date' => 'Fecha',
        'label_size' => 'Tamaño',
        'label_type' => 'Tipo',
        'label_path' => 'Ruta',
        'label_url' => 'URL',
        'label_dimension' => 'Dimensión',
        'label_modified_date' => 'Fecha de modificación',
        'label_extension' => 'Extensión',
        'label_permission' => 'Permisos',

        'label_attachment_title' => 'Título',
        'label_attachment_description' => 'Descripción',
        'label_attachment_properties' => 'Propiedades personalizadas',
        'label_attachment_property_key' => 'Clave',
        'label_attachment_property_value' => 'Valor',

        'help_existing_files' => 'El archivo/carpeta existente no será reemplazado',
        'help_attachment_config' => 'Añadir propiedades personalizadas para este adjunto',

        'alert_file_name_required' => 'Por favor, introduzca su nuevo nombre de archivo/carpeta.',
        'alert_invalid_file_name' => 'Nombre de archivo/carpeta inválido',
        'alert_invalid_new_file_name' => 'Nuevo nombre de archivo/carpeta no válido',
        'alert_file_exists' => 'El archivo/carpeta ya existe',
        'alert_file_not_writable' => 'Permiso denegado: El archivo no tiene permisos de escritura.',
        'alert_file_not_found' => 'Permiso denegado o no encontrado',
        'alert_extension_not_allowed' => 'Extensión de archivo no permitida.',
        'alert_permission' => 'Advertencia: No tiene permiso para %s, póngase en contacto con el administrador del sistema.',
        'alert_new_folder_disabled' => 'La creación de una nueva carpeta está desactivada, compruebe la configuración del administrador de imágenes/medios.',
        'alert_rename_disabled' => 'El nombre de archivo/carpeta está deshabilitado, compruebe la configuración del administrador de imágenes/medios.',
        'alert_success_new_folder' => 'Carpeta creada correctamente',
        'alert_success_rename' => 'Archivo/Carpeta renombrado correctamente',
        'alert_error_upload' => 'Algo salió mal al guardar el archivo, por favor inténtelo de nuevo.',
        'alert_success_upload' => 'Subido con éxito',
        'alert_upload_disabled' => 'La carga está desactivada, compruebe la configuración del administrador de imágenes/medios.',
        'alert_invalid_path' => 'Ruta de subida especificada no válida',
        'alert_copy_disabled' => 'La copia de archivo/carpeta está desactivada, compruebe la configuración del administrador de imágenes/medios.',
        'alert_select_copy_folder' => 'Por favor, seleccione el destino, el origen y el archivo/carpeta que desea copiar.',
        'alert_select_copy_file' => 'Por favor, seleccione el archivo/carpeta que desea copiar.',
        'alert_select_move_folder' => 'Por favor, seleccione el destino, el origen y el archivo/carpeta que desea mover.',
        'alert_select_move_file' => 'Por favor, seleccione el archivo/carpeta que desea mover.',
        'alert_success_copy' => 'Archivo/Carpeta copiado correctamente',
        'alert_move_disabled' => 'Mover archivo/carpeta está deshabilitado, compruebe la configuración del administrador de imágenes/medios.',
        'alert_success_move' => 'Archivo/Carpeta movida correctamente',
        'alert_delete_disabled' => 'La eliminación de archivo/carpeta está desactivada, compruebe la configuración del administrador de imágenes/medios.',
        'alert_select_delete_file' => 'Por favor, seleccione el archivo/carpeta que desea eliminar.',
        'alert_success_delete' => 'Archivo eliminado correctamente',
    ],

    'home' => [
        'title' => 'Pedido en línea!',
        'text_step_one' => 'Buscar',
        'text_step_two' => 'Elegir',
        'text_step_three' => 'Pagar en efectivo o tarjeta',
        'text_step_four' => '¡Disfruta!',
        'text_step_search' => 'Buscar y seleccionar el restaurante que entregará su pedido introduciendo su código postal o su dirección.',
        'text_step_choose' => 'Buscar en nuestros menús para encontrar la comida que te gusta.',
        'text_step_pay' => 'Es rápido, fácil y seguro. Paga por PayPal o cuando te lo entreguemos.',
        'text_step_enjoy' => 'Tu comida es preparada & entregada en la puerta de tu casa o estará lista para recoger en el restaurante.',
    ],

    'local' => [
        'text_tab_menu' => 'Menú',
        'text_tab_review' => 'Comentarios',
        'text_tab_info' => 'Información',
        'text_tab_gallery' => 'Galería',

        'menus' => [
            'title' => 'Menú',
        ],
        'info' => [
            'title' => 'Información',
        ],
        'gallery' => [
            'title' => 'Galería',
        ],
        'reviews' => [
            'title' => 'Comentarios',
        ],
    ],

    'checkout' => [
        'title' => 'Pagar Cuenta',
        'success' => [
            'title' => 'Confirmación de pago',
        ],
    ],

    'reservation' => [
        'title' => 'Reserva',
        'success' => [
            'title' => 'Confirmación de la Reserva',
        ],
    ],

    'cart' => [
        'title' => 'Carrito',
    ],

    'locations' => [
        'title' => 'Ubicaciones',
    ],

    'contact' => [
        'title' => 'Contacto',
    ],

    'pages' => [
        'title' => 'Páginas',
        'text_theme_page' => 'Página del tema',
    ],

    'permissions' => [
        'name' => 'Interfaz',
        'media_manager' => 'Subir y administrar contenidos multimedia',
        'themes' => 'Activar, desactivar, configurar y modificar los temas del front-end',
    ],

    'account' => [
        'title' => 'Cuenta',

        'login' => [
            'title' => 'Identificarse',
            'text_login' => 'Iniciar sesión',
            'text_register' => 'Por favor regístrese <small>es fácil y siempre lo será.</small>',
            'text_forgot' => '¿Olvido su contraseña?',
            'text_login_register' => '¿Ya estas registrado? <a href="%s"> Inicia sesión</a>',

            'button_login' => 'Identificarse',
            'button_register' => 'Registrarse',
        ],

        'register' => [
            'title' => 'Registrarse',
        ],

        'address' => [
            'title' => 'Cuenta',
        ],

        'settings' => [
            'title' => 'Configuración',
        ],

        'orders' => [
            'title' => 'Pedidos',
        ],

        'reservations' => [
            'title' => 'Reservas',
        ],

        'reviews' => [
            'title' => 'Comentarios',
        ],

        'inbox' => [
            'title' => 'Bandeja de entrada',
        ],

        'reset' => [
            'title' => 'Restablecer contraseña',
            'text_heading' => 'Restablecer contraseña',
        ],
    ],

    'not_found' => [
        'layout_name' => 'Diseño [%s] no encontrado',
        'page_label' => 'Pagina no encontrada',
        'page_message' => 'No se puede encontrar la página solicitada',
        'active_theme' => 'No se puede cargar el tema activo',
        'controller_action' => 'La acción [%s] no se encuentra en el controlador [%s]',
        'layout' => 'El diseño [%s] no se encuentra.',
        'component' => 'El componente [%s] no se encuentra.',
        'partial' => 'No se ha encontrado la parte [%s].',
        'content' => 'El contenido [%s] no se encuentra.',
        'method' => 'El método [:method] no se encuentra en [:name].',
        'ajax_handler' => 'El controlador Ajax [%s] no se encuentra.',
    ],

    'settings' => [
        'text_tab_media_manager' => 'Medios',
        'text_tab_desc_media_manager' => 'Configurar subidas de medios, copiar, renombrar la configuración.',
    ],
];
