<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Enums\PermissionEnum;

class PermissionSeeder extends Seeder
{
  protected $permissions = [
    PermissionEnum::CONTROLR_DASHBOARD->value,
    PermissionEnum::BOOK->value,
    PermissionEnum::DELETE_BOOK->value,
    PermissionEnum::SECTIONS_BOOK->value,
    PermissionEnum::POSTS->value,
    PermissionEnum::USERS->value,
    PermissionEnum::PUBLISHERS->value,
    PermissionEnum::AUTHORS->value,
    PermissionEnum::WORD_TODAY->value,
    PermissionEnum::UPDATE_PASSWORD->value,
  ];
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    foreach ($this->permissions as $per) {
      Permission::create([
        'name' => $per
      ]);
    }
  }
}
