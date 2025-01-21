<?php

namespace App\Livewire;

use App\Livewire\Forms\Dashboard\PostFrom;
use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('الصفحة المنشورات')]
class PostPage extends Component
{
  use WithPagination;
  public PostFrom $post;

  public function get()
  {
    return Post::select('id', 'title', 'content', 'photo', 'user_id', 'markup', 'created_at')
      ->with([
        'user:id,name,photo'
      ])
      ->orderBy('markup', 'desc')
      ->latest()
      ->paginate(10);
  }

  #[On('added-post')]
  public function addedPost()
  {
    $this->get();
  }
  public function deletePost($id)
  {
    $this->post->get($id);
    $this->dispatch('open-modal', 'delete-post');
  }

  public function delete()
  {
    $this->post->destory();
    $this->dispatch('close-modal', 'delete-post');
  }

  public function markup($id)
  {
    $this->post->markup($id);
  }




  public function render()
  {
    return view('livewire.post-page', [
      'posts' => $this->get()
    ]);
  }
}
