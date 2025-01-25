<?php

namespace App\Livewire\Dashboard\Books;

use App\Livewire\Forms\Dashboard\MoreFeaturesBookForm;
use App\Models\Book;
use App\Services\SyncWebsite\SyncDatabaseService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Title('الكتب')]
#[Layout('layouts.dashboard')]
class Books extends Component
{
  use WithFileUploads, WithPagination;
  public $search;
  public MoreFeaturesBookForm $features;
  public $getMarkUpBooks = false;
  public $is_sync_books = false;

  public function editBook($id)
  {
    return $this->redirectRoute('dashboard.books.edit', ['id' => $id], navigate: true);
  }

  public function export()
  {
    return $this->features->export();
  }

  public function import()
  {
    $this->features->import();
    $this->dispatch("close-modal", 'import-excel');
    $this->dispatch("open-modal", 'success-excel');
  }

  public function sync()
  {
    $this->dispatch("close-modal", 'more');
    $this->dispatch("open-modal", 'loading-sync');
    $this->dispatch("start-sync");
  }

  #[On("start-sync")]
  public function startSync()
  {
    $response = (new SyncDatabaseService)->sync();
    $this->dispatch("close-modal", 'loading-sync');
    if ($response['status'] == 'success') {
      $this->dispatch("open-modal", 'success-sync');
    } else {
      $this->dispatch("open-modal", 'fail-sync');
    }
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
        ->latest()
        ->paginate(10)
    ]);
  }
}
