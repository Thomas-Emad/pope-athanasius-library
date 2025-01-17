<?php

namespace App\Livewire\Dashboard\Books;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('الكتب')]
#[Layout('layouts.dashboard')]
class Books extends Component
{
    public $search;

    public function editBook($id)
    {
        return $this->redirectRoute('dashboard.books.edit', ['id' => $id], navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.books.index', [
            'books' => Book::with([
                'user:id,name',
                'author:id,name',
                'publisher:id,name',
                'unit:id,title'
            ])->where('title', 'like', "%$this->search%")
                ->orWhere('code', 'like', "%$this->search%")
                ->paginate(10)
        ]);
    }
}
