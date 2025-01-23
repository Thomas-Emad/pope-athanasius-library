<?php

namespace App\Livewire\Dashboard\Books;

use App\Livewire\Forms\Dashboard\MoreFeaturesBookForm;
use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

use Livewire\WithFileUploads;


#[Title('الكتب')]
#[Layout('layouts.dashboard')]
class Books extends Component
{
  use WithFileUploads;
  public $search;
  public MoreFeaturesBookForm $features;
  public $getMarkUpBooks = false;


  public function editBook($id)
  {
    return $this->redirectRoute('dashboard.books.edit', ['id' => $id], navigate: true);
  }

  public function export()
  {
    return $this->featsures->export();
    $this->dispatch("close-modal", 'more');
  }

  public function import()
  {
    $this->features->import();
    $this->dispatch("close-modal", 'import-excel');
    $this->dispatch("open-modal", 'success-excel');
  }


  public function render()
  {
    return view('livewire.dashboard.books.index', [
      'books' => Book::with([
        'user:id,name',
        'author:id,name',
        'publisher:id,name',
        'section:id,title'
      ])
        ->when($this->search, function ($query) {
          $query->where('title', 'like', "%{$this->search}%")
            ->orWhere('code', 'like', "%{$this->search}%");
        })
        ->when($this->getMarkUpBooks, function ($query) {
          $query->where('markup', true);
        })
        ->paginate(10)
    ]);
  }
}
