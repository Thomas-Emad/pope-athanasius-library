<?php

namespace App\Enums;

enum RoleUserEnum: string
{
    case OWNER  = 'owner';
    case ADMIN  = 'admin';
    case USER   = 'user';
}
