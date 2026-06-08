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
}
