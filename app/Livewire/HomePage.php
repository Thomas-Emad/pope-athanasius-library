<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\{Unit, Book};

#[Title('الصفحة الرئيسية')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'units' => Unit::withCount('books')->orderBy('books_count', 'desc')->get(),
            'books' => Book::with('author:id,name')
                ->select('id', 'code', 'photo', 'title', 'author_id')
                ->where('markup', true)->limit(10)->get(),
        ]);
    }
}
