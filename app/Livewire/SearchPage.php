<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

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
  ];



  public function updatedFilters()
  {
    $this->resetPage();
  }

  public function submit()
  {
    $this->resetPage();
  }

  private function queryBooks()
  {
    return Book::query()
      ->when($this->filters['book'], fn($query) =>
      $query->orWhere('title', 'like', "%{$this->search}%"))
      ->when($this->filters['code'], fn($query) =>
      $query->orWhere('code', $this->search))
      ->when($this->filters['author'], fn($query) =>
      $query->orWhereHas('author', fn($subQuery) =>
      $subQuery->where('name', 'like', "%{$this->search}%")))
      ->when($this->filters['publisher'], fn($query) =>
      $query->orWhereHas('publisher', fn($subQuery) =>
      $subQuery->where('name', 'like', "%{$this->search}%")))
      ->when($this->filters['section'], fn($query) =>
      $query->orWhereHas('section', fn($subQuery) =>
      $subQuery->where('title', 'like', "%{$this->search}%")
        ->orWhere('number', $this->search)))
      ->when($this->filters['shelf'], fn($query) =>
      $query->orWhereHas('shelf', fn($subQuery) =>
      $subQuery->where('title', 'like', "%{$this->search}%")
        ->orWhere('number', $this->search)))
      ->orderBooksBy($this->orderBy);
  }

  public function render()
  {
    return view('livewire.search-page', [
      'books' => $this->queryBooks()->paginate(10),
    ]);
  }
}
