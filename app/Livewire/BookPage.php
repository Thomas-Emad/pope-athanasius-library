<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

class BookPage extends Component
{
  public Book $book;
  public function mount()
  {
    $this->book->load([
      'section:id,title',
      'shelf:id,title',
      'author:id,name',
      'publisher:id,name',
      'user:id,name',
    ]);
    $this->addNewView();
  }

  private function addNewView()
  {
    $key = "view-{$this->book->id}-" . request()->ip();

    if (RateLimiter::tooManyAttempts($key, 1)) {
      return;
    }
    RateLimiter::hit($key, 60);
    $this->book->increment('views');
  }

  public function downloadPdfBook()
  {
    return Storage::disk('public')->download($this->book->pdf, $this->book->title);
  }

  public function render()
  {
    return view('livewire.book-page')->title($this->book->title);
  }
}
