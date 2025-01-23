<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $roles = [
      ['name' => 'الامين'],
      ['name' => 'خادم'],
      ['name' => 'مستخدم']
    ];

    foreach ($roles as $role) {
      $role = Role::create($role);

      $permissionsAsRole = match ($role->name) {
        'الامين' => [
          PermissionEnum::CONTROLR_DASHBOARD->value,
          PermissionEnum::BOOK->value,
          PermissionEnum::DELETE_BOOK->value,
          PermissionEnum::SECTIONS_BOOK->value,
          PermissionEnum::PUBLISHERS->value,
          PermissionEnum::AUTHORS->value,
          PermissionEnum::POSTS->value,
          PermissionEnum::USERS->value,
          PermissionEnum::WORD_TODAY->value,
        ],
        'خادم' => [
          PermissionEnum::CONTROLR_DASHBOARD->value,
          PermissionEnum::SECTIONS_BOOK->value,
          PermissionEnum::BOOK->value,
          PermissionEnum::PUBLISHERS->value,
          PermissionEnum::AUTHORS->value,
        ],
        'مستخدم' => [],
        $role->name => abort(404)
      };
      $role->givePermissionTo($permissionsAsRole);
    }
  }
}
