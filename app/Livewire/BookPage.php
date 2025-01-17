<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookPage extends Component
{
    public $book;
    public function mount($code)
    {
        $this->book = Book::where('code', $code)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.book-page')->title($this->book->title);
    }
}
