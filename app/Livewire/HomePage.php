<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\{Author, Unit, Book};
use Illuminate\Support\Facades\Cache;

#[Title('الصفحة الرئيسية')]
class HomePage extends Component
{
    public $book = '';
    public function search()
    {
        $this->redirectRoute('search', ['search' => $this->book], navigate: true);
    }

    private function getCounter()
    {
        return Cache::remember('counter', now()->addHours(5), function () {
            return [
                'books' => Book::count(),
                'authors' => Author::count(),
            ];
        });
    }

    public function render()
    {
        return view('livewire.home-page', [
            'units' => Unit::withCount('books')->orderBy('books_count', 'desc')->get(),
            'books' => Book::with('author:id,name')
                ->select('id', 'code', 'photo', 'title', 'author_id')
                ->where('markup', true)->limit(10)->get(),
            'counter' => $this->getCounter()
        ]);
    }
}
