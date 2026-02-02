<?php

namespace App\Livewire\Dashboard\Books;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Enums\PermissionEnum;
use Livewire\WithFileUploads;
use App\Traits\RemoveTempFilesTrait;
use App\Livewire\Forms\Dashboard\BookForm;
use App\Models\{Author, Book, Publisher, Section, SectionShelf};

class Operations extends Component
{
  use WithFileUploads, RemoveTempFilesTrait;

  public BookForm $book;
  public $sections, $authors, $publishers, $shelfs = [];
  public $title = '', $type = '';

  public function mount($id = null)
  {
    if ($id) {
      $this->initializeBook($id);
    }
    $this->setMainAttributes();
    $this->loadEntities();
    $this->cleanTempFiles();
  }

  private function initializeBook($id)
  {
    $book = Book::findOrFail($id);
    if (auth()?->user()?->id != $book->user_id && !auth()?->user()?->hasPermissionTo(PermissionEnum::USERS)) {
      return abort(403);
    }

    $this->updatedBooksection($book->section_id);
    $this->book->setAllAttribute($book);
  }

  private function setMainAttributes()
  {
    $this->type = $this->book->id ? 'edit' : 'store';
    $this->title = $this->type === 'store' ? 'أضافه كتاب جديد' : 'التعديل علي هذا الكتاب';
  }

  private function loadEntities()
  {
    $this->sections = Section::get(['id', 'title', 'number']);
    $this->authors = Author::get(['id', 'name']);
    $this->publishers = Publisher::get(['id', 'name']);
  }

  public function updatedBooksection($sectionId)
  {
    $this->shelfs = SectionShelf::where('section_id', $sectionId)->get();
    $this->dispatch('add-modal-selected-section', $sectionId);
  }

  public function save()
  {
    $this->book->store();
    return $this->redirectRoute('dashboard.books', navigate: true);
  }

  public function update()
  {
    $this->book->update();
    return $this->redirectRoute('dashboard.books', navigate: true);
  }
  public function delete()
  {
    $this->book->destory();
    return $this->redirectRoute('dashboard.books', navigate: true);
  }

  #[On('added-author')]
  public function authorAdded($id)
  {
    $this->addEntityToCollection(Author::class, $id, 'authors');
    $this->book->author = $id;
    $this->dispatch('updated-authors', $this->authors);
  }

  #[On('added-publisher')]
  public function publisherAdded($id)
  {
    $this->addEntityToCollection(Publisher::class, $id, 'publishers');
    $this->book->publisher = $id;
    $this->dispatch('updated-publishers',  $this->publishers);
  }

  #[On('added-section')]
  public function sectionAdded($id)
  {
    $this->addEntityToCollection(Section::class, $id, 'sections');
    $this->book->section = $id;
    $this->shelfs = collect();
    $this->dispatch('add-modal-selected-section', $id);
  }

  #[On('added-shelf')]
  public function shelfAdded($id)
  {
    $this->addEntityToCollection(SectionShelf::class, $id, 'shelfs');
    $this->book->shelf = $id;
  }

  private function addEntityToCollection($modelClass, $id, $collection)
  {
    $entity = $modelClass::find($id);
    $this->$collection->push($entity);
  }

  public function deletePdfBook($id)
  {
    $this->book->deletePdf($id);
  }

  public function downloadPdfBook()
  {
    return $this->book->downloadPdf();
  }

  public function render()
  {
    return view('livewire.dashboard.books.operations')->title($this->title);
  }
}
