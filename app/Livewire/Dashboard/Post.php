<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\Dashboard\Post\StoreForm;
use App\Models\Post as PostModel;
use App\Livewire\Forms\Dashboard\PostForm;
use App\Livewire\Forms\Dashboard\Post\UpdateForm;
use Livewire\Attributes\{Title, Layout, Url};
use Livewire\{Component, WithFileUploads, WithPagination};
use App\Traits\RemoveTempFilesTrait;

#[Title('المنشورات')]
#[Layout('layouts.dashboard')]
class Post extends Component
{
  use WithFileUploads, WithPagination, RemoveTempFilesTrait;

  #[Url]
  public string $search = '';
  public bool $showOnlyMarkup = false;
  public PostForm $post;
  public StoreForm $store;
  public UpdateForm $update;

  public function mount()
  {
    $this->cleanTempFiles();
  }

  // Method to clear validation errors
  public function removeValidation()
  {
    $this->resetErrorBag();
  }

  public function save()
  {
    $this->store->store();
    $this->dispatch('close-modal', 'create-post');
  }

  public function show($id)
  {
    $this->post->get($id);
    $this->dispatch('open-modal', 'show-post');
  }

  public function edit($id)
  {
    $this->update->get($id);
    $this->dispatch('open-modal', 'edit-post');
  }

  public function updatePost()
  {
    $this->update->updatePost();
    $this->dispatch('close-modal', 'edit-post');
  }

  public function delete()
  {
    $this->post->destory();
    $this->dispatch('close-modal', 'delete-post');
  }

  public function setAsMarkup($id)
  {
    $this->post->markup($id);
  }


  public function render()
  {
    return view('livewire.dashboard.post', [
      'posts' => PostModel::where(function ($query) {
        $query->where('title', 'like', "%" . $this->search . "%")
          ->orWhereHas('user', fn($query) => $query->where('name', 'like', "%$this->search%"));
      })
        ->when($this->showOnlyMarkup, function ($query) {
          $query->where('markup', true);
        })
        ->latest()
        ->paginate(10)
    ]);
  }
}
