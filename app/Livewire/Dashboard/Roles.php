<?php

namespace App\Livewire\Dashboard;

use App\Enums\PermissionEnum;
use App\Livewire\Forms\Dashboard\Role\AddRoleForm;
use App\Livewire\Forms\Dashboard\Role\UpdateRoleForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

#[Title("الاذونات")]
#[Layout('layouts.dashboard')]
class Roles extends Component
{
  use WithPagination;
  public AddRoleForm $store;
  public UpdateRoleForm $update;

  public function save()
  {
    $this->store->save();
    $this->dispatch('close-modal', 'add-role');
  }

  public function edit($id)
  {
    $this->update->get($id);
    $this->dispatch('open-modal', 'edit-role');
  }

  public function updateForm()
  {
    $this->update->update();
    $this->dispatch('close-modal', 'edit-role');
  }

  public function getForDelete($id)
  {
    $this->update->get($id);
    $this->dispatch('open-modal', 'delete-role');
  }

  public function delete()
  {
    $this->update->delete();
    $this->dispatch('close-modal', 'delete-role');
  }

  public function permissions()
  {
    $translatedPermissions = Permission::get()->map(function ($permission) {
      $permissionEnum = PermissionEnum::from($permission->name);
      return (object) [
        'id' => $permission->id,
        'name' => $permissionEnum->label(),
      ];
    });
    return   $translatedPermissions;
  }

  public function render()
  {
    return view('livewire.dashboard.roles', [
      'roles' => Role::withCount(['permissions', 'users'])
        ->paginate(10),
      'permissions' => $this->permissions()
    ]);
  }
}
