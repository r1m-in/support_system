<?php

namespace App\Enums\User;

enum PermissionEnum: string
{
    case APP_USER_VIEW = 'app_user_view';
    case APP_USER_MOBILE = 'app_user_mobile';
    case APP_USER_RIDES = 'app_user_rides';
    case APP_USER_TICKETS = 'app_user_tickets';

    case APP_DRIVER_VIEW = 'app_driver_view';
    case APP_DRIVER_MOBILE = 'app_driver_mobile';
    case APP_DRIVER_RIDES = 'app_driver_rides';
    case APP_DRIVER_TRANSACTIONS = 'app_driver_transactions';
    case APP_DRIVER_CASHBACK = 'app_driver_cashback';
    case APP_DRIVER_TICKETS = 'app_driver_tickets';

    case APP_VEHICLE_VIEW = 'app_vehicle_view';

    case APP_CASHBACK_VIEW = 'app_cashback_view';

    case TICKETS = 'tickets';

    case ABCD = 'abcd';

    public function label(): string
    {
        return match ($this) {
            self::APP_USER_VIEW => 'View',
            self::APP_USER_MOBILE => 'Mobile',
            self::APP_USER_RIDES => 'Rides',
            self::APP_USER_TICKETS => 'Tickets',
            self::APP_DRIVER_VIEW => 'View',
            self::APP_DRIVER_MOBILE => 'Mobile',
            self::APP_DRIVER_RIDES => 'Rides',
            self::APP_DRIVER_TICKETS => 'Tickets',
            self::APP_DRIVER_TRANSACTIONS => 'Transacions',
            self::APP_DRIVER_CASHBACK => 'Cashback',
            self::APP_VEHICLE_VIEW => 'View',
            self::APP_CASHBACK_VIEW => 'All',
            self::TICKETS => 'All',
        };
    }

    public static function grouped(): array
    {
        return [
            'App Users' => [
                self::APP_USER_VIEW,
                self::APP_USER_MOBILE,
                self::APP_USER_RIDES,
                self::APP_USER_TICKETS
            ],
            'App Drivers' => [
                self::APP_DRIVER_VIEW,
                self::APP_DRIVER_MOBILE,
                self::APP_DRIVER_RIDES,
                self::APP_DRIVER_TICKETS,
                self::APP_DRIVER_TRANSACTIONS,
                self::APP_DRIVER_CASHBACK,
            ],
            'App Driver Cashback' => [
                self::APP_CASHBACK_VIEW
            ],
            'App Vehicles' => [
                self::APP_VEHICLE_VIEW
            ],
            'Tickets' => [
                self::TICKETS,
            ]
        ];
    }
}
