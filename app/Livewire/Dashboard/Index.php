<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Book;

#[Title('لوحة التحكم')]
#[Layout('layouts.dashboard')]
class Index extends Component
{
  public function render()
  {
    return view('livewire.dashboard.index', [
      'books' => Book::with('author:id,name')
        ->select('id', 'code', 'views', 'photo', 'title', 'author_id')
        ->orderBy('views', 'desc')
        ->limit(4)->get(),
    ]);
  }
}
