<?php

namespace App\Livewire\Forms\Dashboard;

use Livewire\Form;
use App\Models\Post;
use App\Traits\UpdateAttachmentTrait;
use Illuminate\Support\Facades\Storage;

class PostForm extends Form
{
  use UpdateAttachmentTrait;

  public $id;
  public $title;
  public $content;
  public $photo;

  /**
   * Get Post From Database
   */
  public function get($id)
  {
    $post = Post::findOrFail($id);
    $this->setAllAttributes($post);
  }

  /**
   * Set the form's attributes from the provided post.
   */
  public function setAllAttributes($post)
  {
    $this->id = $post->id;
    $this->title = $post->title;
    $this->content = $post->content;
    $this->photo = $post->photo;
  }

  /**
   * Delete Post From Database
   */
  public function destory()
  {
    $post = Post::where('id', $this->id)->select('photo')->first();
    if ($post && !is_null($post?->photo) && Storage::exists($post->photo)) {
      Storage::delete($post->photo);
    }
    Post::where('id', $this->id)->delete();
  }

  public function markup($id)
  {
    $post =  Post::where('id', $id)->first();
    $post->update([
      'markup' => !$post->markup
    ]);
  }
}
