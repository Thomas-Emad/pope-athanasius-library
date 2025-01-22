<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\User;
use Livewire\Form;
use App\Enums\RoleUserEnum;
use Illuminate\Support\Facades\Auth;

class UserForm extends Form
{
  public $id, $username, $email, $role, $phone, $created_at;

  public function get($id)
  {
    $user = User::findOrFail($id);
    $this->setAttributes($user);
  }

  public function updateRole()
  {
    if (Auth::user()->id === $this->id) {
      $thereIsAnyAnotherOwner = User::where('role', RoleUserEnum::OWNER)->count();
      if ($thereIsAnyAnotherOwner < 3) {
        return null;
      }
    }
    User::where('id', $this->id)->update([
      'role' => $this->role
    ]);
    $this->resetAttributes();
  }

  private function setAttributes($user)
  {
    $this->id = $user->id;
    $this->username = $user->name;
    $this->email = $user->email;
    $this->role = $user->role;
    $this->phone = $user->phone;
    $this->created_at = $user->created_at->format("Y-m-d");
  }

  private function resetAttributes()
  {
    $this->reset(['id', 'username', 'email', 'role']);
  }
}
