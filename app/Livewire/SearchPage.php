<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('صفحة البحث')]
class SearchPage extends Component
{
  use WithPagination;

  #[Url]
  public $search = '';
  #[Url]
  public $orderBy = 'new';
  public $filters = [
    'code' => false,
    'book' => true,
    'publisher' => true,
    'author' => true,
    'section' => true,
    'shelf' => true,
    'subjects' => false,
    'series' => false,
  ];

  public function updatedFilters()
  {
    $this->resetPage();
  }

  public function submit()
  {
    $this->resetPage();
  }

  public function getBooksProperty()
  {
    return Book::query()
      ->with('author:id,name')
      ->where(function ($query) {
        $query->filterSearch($this->filters, $this->search);
      })
      ->orderBooksBy($this->orderBy)
      ->paginate(10);
  }

  public function render()
  {
    return view('livewire.search-page', [
      'books' => $this->books,
    ]);
  }
}
