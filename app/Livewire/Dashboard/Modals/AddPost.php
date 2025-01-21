<?php

namespace App\Livewire\Dashboard\Modals;

use Livewire\Component;
use App\Livewire\Forms\Dashboard\Post\StoreForm;
use Livewire\WithFileUploads;

class AddPost extends Component
{
  use WithFileUploads;
  public StoreForm $storeFrom;

  public function save()
  {
    $post = $this->storeFrom->store();
    $this->dispatch('close-modal', 'create-post');
    $this->dispatch('added-post', $post->id);
  }

  public function render()
  {
    return view('livewire.dashboard.modals.add-post');
  }
}
