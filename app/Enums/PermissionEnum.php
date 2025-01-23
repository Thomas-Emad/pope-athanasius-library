<?php

namespace App\Enums;

enum PermissionEnum: string
{
  case CONTROLR_DASHBOARD  = 'control_dashboard';
  case BOOK  = 'books';
  case DELETE_BOOK   = 'delete_book';
  case SECTIONS_BOOK   = 'sections_book';
  case POSTS   = 'posts';
  case USERS   = 'users';
  case PUBLISHERS   = 'publishers';
  case AUTHORS   = 'authors';
  case WORD_TODAY   = 'word_today';


  public function label(): string
  {

    return match ($this) {
      static::CONTROLR_DASHBOARD =>   'لوحة التحكم',
      static::BOOK =>     'الكتب',
      static::DELETE_BOOK =>    'حذف الكتب',
      static::SECTIONS_BOOK =>    'أقسام الكتب',
      static::POSTS =>     'المنشورات',
      static::USERS =>     'المستخدمين',
      static::PUBLISHERS =>     'الناشرين',
      static::AUTHORS =>     'المؤلفين',
      static::WORD_TODAY =>     'كلمة اليوم',
    };
  }
}
