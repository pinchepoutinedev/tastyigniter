<?php

namespace Igniter\Reservation\AutomationRules\Events;

use Admin\Models\Reservations_model;
use Igniter\Automation\Classes\BaseEvent;

class NewReservationStatus extends BaseEvent
{
    public function eventDetails()
    {
        return [
            'name' => 'Reservation Status Update Event',
            'description' => 'When a reservation status is updated',
            'group' => 'reservation',
        ];
    }

    public static function makeParamsFromEvent(array $args, $eventName = null)
    {
        $params = [];
        $reservation = array_get($args, 0);
        $status = array_get($args, 1);
        if ($reservation instanceof Reservations_model)
            $params = $reservation->mailGetData();

        $params['status'] = $status;

        return $params;
    }
}
