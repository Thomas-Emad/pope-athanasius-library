<?php

namespace App\Livewire\Dashboard;

use App\Models\Author;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Book;
use App\Models\Post;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

#[Title('لوحة التحكم')]
#[Layout('layouts.dashboard')]
class Index extends Component
{
  private function getData()
  {
    return Cache::remember('statices', 60 * 30, function () {
      return (object) [
        'count_users' => User::count(),
        'count_books' => Book::count(),
        'views_book' => Book::sum('views'),
        'count_posts' =>  Post::count(),
        'count_publishers' => Publisher::count(),
        'count_authors' => Author::count()
      ];
    });
  }

  public function render()
  {
    return view('livewire.dashboard.index', [
      'books' => Book::with('author:id,name')
        ->select('id', 'code', 'views', 'photo', 'title', 'author_id')
        ->orderBy('views', 'desc')
        ->limit(4)->get(),
      'statistics' => $this->getData()
    ]);
  }
}
