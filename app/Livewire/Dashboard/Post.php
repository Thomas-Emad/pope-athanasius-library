<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\Dashboard\PostFrom;
use Livewire\Component;
use App\Models\Post as PostModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Livewire\Forms\Dashboard\Post\UpdateForm;

#[Title('المنشورات')]
#[Layout('layouts.dashboard')]
class Post extends Component
{
  use WithFileUploads, WithPagination;

  #[Url]
  public string $search = '';
  public bool $showOnlyMarkup = false;
  public PostFrom $post;
  public UpdateForm $update;


  // Method to clear validation errors
  public function removeValidation()
  {
    $this->resetErrorBag();
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
      'posts' => PostModel::when($this->showOnlyMarkup, function ($query) {
        $query->where('markup', true);
      })
        ->where('title', 'like', "%" . $this->search . "%")
        ->OrWhereHas('user', fn($query) => $query->where('name', 'like', "%$this->search%"))
        ->latest()
        ->paginate(10)
    ]);
  }
}
