<?php

namespace App\Enums\User;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case STAFF = 'staff';
    case MANAGER = 'manager';
}
