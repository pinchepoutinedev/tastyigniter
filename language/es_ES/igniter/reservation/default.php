<?php

return [
    'text_tab_general' => 'General',
    'text_component_title' => 'Componente de la Reserva',
    'text_component_desc' => 'Muestra el formulario de reserva',

    'text_heading' => 'Reservar una mesa',
    'text_success_heading' => 'Confirmación de la Reserva',
    'text_time_heading' => 'Seleccionar hora',
    'text_reservation' => 'Mi reserva',
    'text_heading_success' => 'Reserva confirmada',
    'text_no_table' => 'No hay mesas disponibles en su restaurante local.',
    'text_find_msg' => 'Por favor utilice el siguiente formulario para encontrar una mesa para reservar',
    'text_time_msg' => 'Horarios de reserva disponibles en %s para %s Personas',
    'text_no_time_slot' => '<span class="text-danger">No hay franja horaria de reserva disponible, por favor vuelve a comprobar los detalles de tu mesa.</span>',
    'text_location_closed' => 'Lo sentimos, pero estamos cerrados, vuelve durante el horario de apertura',
    'text_date_format' => '%D, %M %j, %Y',
    'text_person' => 'persona',
    'text_people' => 'Personas',

    'text_subject' => 'Mesa Reservada - %s!',
    'text_greetings' => 'Gracias %s,',
    'text_success_message' => 'Tu Reserva en %s ha sido Registrada para %s en %s. <br /> Gracias por reservar con nosotros en línea!',

    'label_status' => 'Estado',
    'label_location' => 'Ubicación',
    'label_guest_num' => 'Número de Personas',
    'label_date' => 'Fecha',
    'label_time' => 'Hora',
    'label_occasion' => 'Motivo',
    'label_select' => '- por favor, selecciona -',

    'label_first_name' => 'Nombre',
    'label_last_name' => 'Apellido',
    'label_email' => 'Dirección de correo electrónico',
    'label_confirm_email' => 'Confirmar dirección de correo',
    'label_telephone' => 'Teléfono',
    'label_comment' => 'Peticiones especiales',

    'button_find_table' => 'Buscar mesa',
    'button_select_time' => 'Seleccionar hora',
    'button_change' => 'Modificar mis datos',
    'button_reset' => 'Restablecer',

    'button_find_again' => 'Encontrar mesa otra vez',
    'button_reservation' => 'Completar reserva',

    'error_invalid_location' => 'La ubicación seleccionada no es válida.',
    'error_invalid_date' => 'La fecha debe ser posterior a hoy, sólo puede hacer futuras reservas!',
    'error_invalid_datetime' => 'La fecha de la reserva seleccionada no es válida',
    'error_invalid_time' => '¡El tiempo debe estar entre la hora de apertura del restaurante!',

    'alert_reservation_disabled' => 'La reserva de mesa ha sido desactivada, por favor contacte con el administrador.',
    'alert_no_table_available' => 'No se encontró una Mesa para el número especificado de Personas en el lugar seleccionado.',
    'alert_fully_booked' => 'Estamos completamente reservados para la fecha y hora seleccionada, por favor seleccione una fecha u hora diferente.',

    'activity_reservation_created_title' => 'Nueva reserva.',
    'activity_reservation_created' => '<b>:properties.full_name</b> ha creado una reserva.',

    'reservations' => [
        'component_title' => 'Componente de Reservas de Cuenta',
        'component_desc' => 'Muestra y gestiona las reservas de cuenta',
        'text_heading' => 'Ultimas reservas',
        'text_my_account' => 'Mi Cuenta',
        'text_view_heading' => 'Mis reservas',
        'text_empty' => 'No hay ninguna reserva.',

        'column_id' => 'ID de la reserva',
        'column_status' => 'Estado',
        'column_location' => 'Ubicación',
        'column_date' => 'Hora - Fecha',
        'column_table' => 'Nombre de la Mesa',
        'column_guest' => 'Número de Personas',
        'column_occasion' => 'Motivo',
        'column_telephone' => 'Teléfono',
        'column_comment' => 'Comentar',

        'button_reserve' => 'Hacer Reserva',
        'button_cancel' => 'Cancelar reserva',
        'button_back' => 'Atras',
        'btn_view' => 'Ver',

        'alert_cancel_success' => 'La reserva fué cancelada con éxito.',
        'alert_cancel_failed' => 'No se puede cancelar la reserva, por favor contáctenos.',
    ],
];
