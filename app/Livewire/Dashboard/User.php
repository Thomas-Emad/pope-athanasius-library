<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\Dashboard\UserForm;
use Livewire\Component;
use App\Models\User as UserModel;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Title('المستخدمين')]
#[Layout('layouts.dashboard')]
class User extends Component
{
  use  WithPagination;
  #[Url()]
  public ?string $search = '';
  public bool $showOnlyMain = false;
  public UserForm $user;

  public function changeRoleUser($id)
  {
    $this->user->get($id);
    $this->dispatch('open-modal', 'change-role');
  }

  public function showUser($id)
  {
    $this->user->get($id);
    $this->dispatch('open-modal', 'show-user');
  }

  public function update()
  {
    $this->user->updateRole();
    $this->dispatch('close-modal', 'change-role');
  }
  public function render()
  {
    return view('livewire.dashboard.user', [
      'users' => UserModel::select('id', 'name', 'email', 'phone', 'photo', 'brith_day', 'role', 'created_at')
        ->when($this->showOnlyMain, function ($query) {
          $query->whereHas('roles', function ($query) {
            $query->whereIn('id', [1, 2]);
          });
        })
        ->where(function ($query) {
          $query->where('name', 'like', "%$this->search%")
            ->orWhere('email', 'like', "%$this->search%");
        })
        ->with('roles')
        ->orderBy(function ($query) {
          $query->select('id')
            ->from('roles')
            ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->whereColumn('model_has_roles.model_id', 'users.id')
            ->limit(1);
        })
        ->latest()
        ->paginate(10),
      'roles' => Role::get()
    ]);
  }
}
