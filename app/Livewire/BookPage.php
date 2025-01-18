<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\RateLimiter;

class BookPage extends Component
{
    public $book;
    public function mount($code)
    {
        $this->book = Book::where('code', $code)->firstOrFail();
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

    public function render()
    {
        return view('livewire.book-page')->title($this->book->title);
    }
}
