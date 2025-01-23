<?php

namespace App\Livewire\Dashboard\Modals;

use Livewire\Component;
use App\Livewire\Forms\Dashboard\Post\StoreForm;
use Livewire\WithFileUploads;
use App\Traits\RemoveTempFilesTrait;


class AddPost extends Component
{
  use WithFileUploads, RemoveTempFilesTrait;
  public StoreForm $storeFrom;


  public function mount()
  {
    $this->cleanTempFiles();
  }

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
