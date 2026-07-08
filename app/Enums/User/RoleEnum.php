<?php

namespace App\Enums\User;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case STAFF = 'staff';
    case SENIOR_STAFF = 'senior-staff';
    case MANAGER = 'manager';
    case TEAM_LEADER = 'team-leader';


    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::USER => 'User',
            self::STAFF => 'Staff',
            self::SENIOR_STAFF => 'Senior Staff',
            self::MANAGER => 'Manager',
            self::TEAM_LEADER => 'Team Leader',
        };
    }
}
