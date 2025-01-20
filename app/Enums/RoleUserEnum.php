<?php

namespace App\Enums;

enum RoleUserEnum: string
{
  case OWNER  = 'owner';
  case ADMIN  = 'admin';
  case USER   = 'user';

  public function label(): string
  {
    return match ($this) {
      static::OWNER => 'الامين',
      static::ADMIN => 'خادم',
      static::USER => 'مستخدم'
    };
  }
}
