<?php

namespace App\Livewire\Forms\Dashboard;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
  public $id, $name, $permissions = [];

  public function rules()
  {
    return [
      'name' => 'required|min:3|max:255',
      'permissions' => 'required|array',
    ];
  }

  public function save()
  {
    $this->validate(
      $this->rules(),
      [],
      [
        'name' => 'اسم الدور',
        'permissions' => 'الاذونات'
      ]
    );
    $role =  Role::create(['name' => $this->name]);
    $permissionIds = array_map('intval', $this->permissions);
    $role->syncPermissions($permissionIds);
    $this->reset(['id', 'role', 'permissions']);
  }
}
