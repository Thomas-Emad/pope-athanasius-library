<?php

namespace App\Livewire\Forms\Dashboard\Role;

use Livewire\Form;
use Spatie\Permission\Models\Role;


class UpdateRoleForm extends Form
{
  public $id, $name, $permissions = [];

  public function rules()
  {
    return [
      'name' => 'required|min:3|max:255',
      'permissions' => 'required|array',
    ];
  }
  public function get($id)
  {
    $role = Role::with('permissions')->where('id', $id)->firstOrFail();
    $this->setAttributes($role);
  }

  public function setAttributes($role)
  {
    $this->id = $role->id;
    $this->name = $role->name;
    $this->permissions = $role->permissions->pluck('id');
  }

  public function update()
  {
    $this->validate(
      $this->rules(),
      [],
      [
        'name' => 'اسم الدور',
        'permissions' => 'الاذونات'
      ]
    );

    $role = Role::where('id', $this->id)->firstOrFail();
    $role->name = $this->name;
    $role->save();

    $permissionIds = array_map('intval', $this->permissions->toArray());
    $role->syncPermissions($permissionIds);
  }

  public function delete()
  {
    if ($this->id > 3) {
      $role = Role::where('id', $this->id)->firstOrFail();
      $role->delete();
    }
  }
}
