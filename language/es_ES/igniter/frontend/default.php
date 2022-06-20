<?php

return [

    'text_side_menu' => 'Anuncios y Sliders',

    'banners' => [
        'text_tab_general' => 'General',
        'component_title' => 'Componente de Anuncios',
        'component_desc' => 'Muestra anuncios',
        'text_edit_banner' => 'Editar Anuncio',
        'text_title' => 'Anuncios',
        'text_form_name' => 'Anuncio',
        'text_filter_search' => 'Buscar por nombre, ciudad o estado.',
        'text_empty' => 'No hay anuncios disponibles.',
        'text_image' => 'Imagen',
        'text_custom' => 'Personalizar',

        'column_banner' => 'Anuncio',
        'column_dimension' => 'Dimension (W x H)',
        'column_layout_partial' => 'Diseño - Área parcial',
        'column_status' => 'Estado',
        'column_id' => 'ID',

        'label_banner' => 'Anuncio',
        'label_dimension' => 'Dimensión (W x H)',
        'label_width' => 'Ancho',
        'label_height' => 'Alto',
        'label_status' => 'Estado',
        'label_layout_partial' => 'Diseño - Área parcial',
        'label_type' => 'Tipo',
        'label_click_url' => 'Click URL',
        'label_language' => 'Idioma',
        'label_alt_text' => 'Texto Alternativo',
        'label_image' => 'Imágen',
        'label_custom_code' => 'Código personalizado',

        'button_banners' => 'Añadir Nuevo Anuncio',

        'help_layouts' => 'Elija un diseño para añadir uno o más banner(s).',
        'help_image' => 'Elegir múltiples imágenes para mostrar banner como carrusel',
        'help_click_url' => 'Puede utilizar una URL absoluta o relativa en el sitio',

        'alert_set_banners' => 'Primero debe agregar el módulo de banners a uno o más diseños',
    ],

    'contact' => [
        'component_title' => 'Componente Formulario de Contacto',
        'component_desc' => 'Muestra el formulario de contacto',
        'text_heading' => 'Contacto',
        'text_summary' => 'No dudes en enviar un mensaje',
        'text_find_us' => 'Encuéntrenos en el mapa',
        'text_select_subject' => 'seleccione un asunto',
        'text_contact_us' => 'Contáctenos',
        'text_general_enquiry' => 'Consulta general',
        'text_comment' => 'Comentar',
        'text_technical_issues' => 'Problemas técnicos',

        'label_subject' => 'Asunto:',
        'label_full_name' => 'Nombre completo:',
        'label_email' => 'Email:',
        'label_telephone' => 'Teléfono:',
        'label_comment' => 'Comentar',

        'button_send' => 'ENVIAR',

        'alert_contact_sent' => 'Mensaje enviado con éxito, ¡nos pondremos en contacto contigo en breve!',
    ],

    'slider' => [
        'text_title' => 'Sliders',
        'text_tab_general' => 'General',
        'component_title' => 'Componente Slider',
        'component_desc' => 'Muestra imágenes deslizantes en la página de inicio',
        'text_form_name' => 'Slider',
        'text_empty' => 'No hay sliders disponibles.',

        'text_tab_slides' => 'Slides',

        'column_updated_at' => 'Actualizado',

        'label_code' => 'Código',
        'label_slider' => 'Slider code',
        'label_effect' => 'Efectos',
        'label_interval' => 'Intervalo de retraso entre diapositivas',
        'label_caption' => 'Leyenda',
        'label_images' => 'Imágenes',
        'label_hide_controls' => 'Ocultar controles:',
        'label_hide_indicators' => 'Ocultar indicadores',
        'label_hide_captions' => 'Ocultar leyendas',
    ],

    'newsletter' => [
        'text_tab_general' => 'General',
        'component_title' => 'Newsletter Component',
        'component_desc' => 'Muestra el formulario de suscripción al boletín de noticias',

        'text_subscribe' => 'Suscribirse al boletín',

        'label_status' => 'Estado: ',
        'label_email' => 'Correo electrónico',

        'alert_success_subscribed' => 'Gracias, tu correo electrónico se ha suscrito a nuestras ofertas',
        'alert_success_existing' => 'Gracias, tu correo electrónico ya está suscrito a nuestras ofertas',
    ],

    'featured' => [
        'text_tab_general' => 'General',
        'component_title' => 'Componente de menú destacado',
        'component_desc' => 'Muestra la lista de menús destacados en la tienda',
        'text_subscribe' => 'Suscríbase a nuestro boletín',
        'text_featured_menus' => 'Menú Destacado',

        'column_menu_name' => 'Nombre del menú',
        'column_menu_remove' => 'Borrar',

        'label_title' => 'Título',
        'label_menus' => 'Menús',
        'label_limit' => 'Límite',
        'label_items_per_row' => 'Elementos por Página',
        'label_dimension' => 'Dimensión:',
        'label_dimension_w' => 'Ancho de la dimensión',
        'label_dimension_h' => 'Altura de la dimensión',

        'help_dimension' => '(Ancho x alto)',
        'help_items_per_row' => 'El número de elementos a mostrar por página',
    ],

    'captcha' => [
        'component_title' => 'Componente de Captcha',
        'component_desc' => 'Muestra el widget de reCATPCHA.',

        'label_api_site_key' => 'Clave del sitio',
        'label_api_secret_key' => 'Clave secreta',
        'label_version' => 'Versión',
        'label_version_v2' => 'reCAPTCHA v2',
        'label_version_invisible' => 'reCAPTCHA v2 Invisible',
        'label_version_v3' => 'reCAPTCHA v3',
        'label_lang' => 'Idioma',

        'error_recaptcha' => '¡Por favor, confirma que eres humano!',

        'help_lang' => 'Fuerza al widget a renderizar en un idioma específico. Auto - detecta el idioma del usuario si no se especifica.',
    ],
];
