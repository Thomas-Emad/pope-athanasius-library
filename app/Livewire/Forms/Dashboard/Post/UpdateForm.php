<?php

namespace App\Livewire\Forms\Dashboard\Post;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Traits\UpdateAttachmentTrait;

class UpdateForm extends Form
{
  use UpdateAttachmentTrait;

  public $id, $user_id, $oldPhoto;

  #[Validate('required|min:3|max:255|string', 'عنوان المنشور')]
  public $title;

  #[Validate('required|min:10|max:2500|string', 'المحتوي')]
  public $content;

  #[Validate('nullable|image|max:2048', 'الغلاف')]
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
    $this->oldPhoto = $post->photo;
  }

  /**
   * Update the existing post in the database.
   */
  public function updatePost()
  {
    $this->validate();
    Post::where('id', $this->id)->update([
      'user_id' => Auth::id(),
      'title' => $this->title,
      'content' => $this->content,
      'photo' => $this->photo ? $this->uploadAttachment($this->oldPhoto, $this->photo, 'posts') : null,
    ]);
  }
}
