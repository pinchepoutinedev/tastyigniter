<?php

return [
    'text_title' => 'Visitas a la página',

    'text_online' => 'En línea',
    'text_all' => 'Todos',
    'text_filter_search' => 'Buscar por ip, cliente o navegador.',
    'text_filter_access' => 'Ver todos los accesos',
    'text_filter_date' => 'Ver todas las fechas',
    'text_filter_online' => 'Ver recientemente en línea',
    'text_empty' => 'No hay páginas visitadas.',
    'text_guest' => 'Invitado',
    'text_private' => 'Privado',
    'text_browser' => 'Navegador',
    'text_mobile' => 'Teléfono',
    'text_tablet' => 'Tablet',
    'text_computer' => 'Ordenador',
    'text_robot' => 'Robot',

    'text_never_delete' => 'No eliminar nunca',
    'text_1_month' => '1 mes',
    'text_3_months' => '3 meses',
    'text_6_months' => '6 meses',
    'text_12_months' => '12 meses',
    'text_maxmind' => 'Maxmind GeoLite2',
    'text_ipstack' => 'Ipstack',

    'button_settings' => 'Configuración',
    'button_update' => 'Actualizar Base de Datos GeoIp',
    'button_page_views' => 'Páginas Vistas',
    'button_page_visits' => 'Visitas a la página',
    'button_view_all' => 'Ver previamente en línea',

    'label_status' => 'Estado rastreador',
    'label_track_robots' => 'Rastrear Robots',
    'label_exclude_routes' => 'Excluir rutas (separadas por nueva línea)',
    'label_exclude_paths' => 'Excluir rutas (separadas por nueva línea)',
    'label_exclude_ips' => 'Excluir direcciones IP (separadas por comas)',
    'label_online_time_out' => 'Tiempo de espera',
    'label_archive_time_out' => 'Tiempo de espera del Archivo de Historial',
    'label_geoip_reader' => 'Lector GeoIP',
    'label_geoip_reader_ipstack_access_key' => 'Clave de acceso de IP Stack',
    'label_geoip_reader_maxmind_account_id' => 'ID de cuenta Maxmind',
    'label_geoip_reader_maxmind_license_key' => 'Clave de licencia Maxmind',

    'column_id' => 'ID',
    'column_ip' => 'IP',
    'column_customer' => 'Cliente',
    'column_access' => 'Acceso',
    'column_browser' => 'Navegador',
    'column_views' => 'Páginas Vistas',
    'column_platform' => 'Dispositivo',
    'column_agent' => 'Agente de usuario',
    'column_request_uri' => 'Última solicitud de URL',
    'column_referrer_url' => 'Última URL referente',
    'column_last_activity' => 'Última Actividad',

    'help_customer_online' => 'El número de minutos que un cliente aparecerá en línea.',
    'help_customer_online_archive' => 'Eliminar todo informe de cliente en línea más antiguos',
    'help_geoip_reader_ipstack' => 'Puedes <a target="_blank" href="https://ipstack.com/signup/free">registrarte aquí</a> para tu cuenta de iptstack.',
    'help_geoip_reader_maxmind' => 'Puedes <a target="_blank" href="https://www.maxmind.com/en/geolite2/signup/">registrarte aquí</a> en tu cuenta de MaxMind.',

    'views' => [
        'text_title' => 'Páginas Vistas',
        'text_empty' => 'No hay páginas visitadas.',
    ],

    'dashboard' => [
        'text_page_views_chart' => 'Páginas Vistas',
    ],
];