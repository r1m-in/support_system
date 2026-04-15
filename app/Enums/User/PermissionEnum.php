<?php

namespace App\Enums\User;

enum PermissionEnum: string
{
    case USER_VIEW = 'user_view';
    case USER_CREATE = 'user_create';
    case USER_EDIT = 'user_edit'; 
    case USER_DELETE = 'user_delete';  
 
} 