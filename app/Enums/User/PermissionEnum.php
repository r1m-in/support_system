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
    case APP_DRIVER_TICKETS = 'app_driver_tickets';

    case TICKETS = 'tickets';
}
