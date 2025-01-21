<?php

namespace App\Livewire\Forms\Dashboard\Post;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Traits\UpdateAttachmentTrait;

class StoreForm extends Form
{
  use UpdateAttachmentTrait;

  #[Validate('required|min:3|max:255|string', 'عنوان المنشور')]
  public $title;

  #[Validate('required|min:10|max:2500|string', 'المحتوي')]
  public $content;

  #[Validate('nullable|image|max:2048', 'الغلاف')]
  public $photo;


  /**
   * Store the post in the database.
   */
  public function store()
  {
    $this->validate();
    return Post::create([
      'user_id' => Auth::id(),
      'title' => $this->title,
      'content' => $this->content,
      'photo' => $this->photo ? $this->photo->store('posts', 'public') : null,
    ]);
  }
}
