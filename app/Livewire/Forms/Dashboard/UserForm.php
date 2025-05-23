<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\User;
use Livewire\Form;

class UserForm extends Form
{
  public $id, $username, $email, $role, $phone, $created_at, $photo;

  public function get($id)
  {
    $user = User::findOrFail($id);
    $this->setAttributes($user);
  }

  public function updateRole()
  {
    $user = User::where('id', $this->id)->firstOrFail();
    $user->syncRoles($this->role);
    $this->resetAttributes();
  }

  private function setAttributes($user)
  {
    $this->id = $user->id;
    $this->username = $user->name;
    $this->email = $user->email;
    $this->role = $user->getRoleNames()->first();
    $this->phone = $user->phone;
    $this->created_at = $user->created_at->format("Y-m-d");
    $this->photo = $user->photo;
  }

  private function resetAttributes()
  {
    $this->reset(['id', 'username', 'email', 'role']);
  }
}
