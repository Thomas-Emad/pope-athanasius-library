<?php

namespace App\Livewire\Dashboard\Books;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Services\SyncWebsite\SyncDatabaseService;
use App\Livewire\Forms\Dashboard\MoreFeaturesBookForm;

#[Title('الكتب')]
#[Layout('layouts.dashboard')]
class Books extends Component
{
  use WithFileUploads, WithPagination;
  public $search;
  public MoreFeaturesBookForm $features;
  public $getMarkUpBooks = false;
  public $is_sync_books = false;

  public function updatedSearch()
  {
    $this->resetPage();
  }

  public function editBook($id)
  {
    return $this->redirectRoute('dashboard.books.edit', ['id' => $id], navigate: true);
  }

  public function export()
  {
    try {
      return $this->features->export();
    } catch (\Throwable $th) {
      Log::error('error when export excel', ['error' => $th->getMessage()]);
      $this->dispatch("open-modal", 'fail-modal');
    }
  }

  public function exportCodesPDF()
  {
    try {
      $pdf = $this->features->exportCodesAsPdf();

      $this->dispatch("close-modal", 'export-code-pdf');
      $this->dispatch("open-modal", 'success-export');

      return $pdf;
    } catch (ValidationException $ve) {
      throw $ve;
    } catch (\Throwable $th) {
      Log::error('error when export codes pdf', ['error' => $th->getMessage()]);
      $this->dispatch("close-modal", 'export-code-pdf');
      $this->dispatch("open-modal", 'fail-modal');
    }
  }

  public function import()
  {
    try {
      $this->features->import();
      $this->dispatch("close-modal", 'import-excel');
      $this->dispatch("open-modal", 'success-excel');
    } catch (\Throwable $th) {
      Log::error('error when import excel', ['error' => $th->getMessage()]);
      $this->dispatch("close-modal", 'import-excel');
      $this->dispatch("open-modal", 'fail-modal');
    }
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
        'section:id,title',
        'shelf:id,title',
      ])
        ->where(function ($query) {
          $query->filterSearch(null, $this->search);
        })
        ->when($this->getMarkUpBooks, function ($query) {
          $query->where('markup', true);
        })
        ->latest()
        ->paginate(10)
    ]);
  }
}
