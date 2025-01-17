<?php

namespace App\Livewire\Dashboard\Books;

use Livewire\Component;
use App\Livewire\Forms\Dashboard\BookForm;
use App\Models\{Author, Book, Publisher, Unit, UnitShelf};
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class Operations extends Component
{
    use WithFileUploads;

    public BookForm $book;
    public $units, $authors, $publishers, $shelfs = [];
    public $title = '', $type = '';

    public function mount($id = null)
    {
        if ($id) {
            $this->initializeBook($id);
        }
        $this->setMainAttributes();
        $this->loadEntities();
    }

    private function initializeBook($id)
    {
        $book = Book::findOrFail($id);
        $this->updatedBookUnit($book->unit_id);
        $this->book->setAllAttribute($book);
    }

    private function setMainAttributes()
    {
        $this->type = $this->book->id ? 'edit' : 'store';
        $this->title = $this->type === 'store' ? 'أضافه كتاب جديد' : 'التعديل علي هذا الكتاب';
    }

    private function loadEntities()
    {
        $this->units = Unit::get(['id', 'title', 'number']);
        $this->authors = Author::get(['id', 'name']);
        $this->publishers = Publisher::get(['id', 'name']);
    }

    public function updatedBookUnit($unitId)
    {
        $this->shelfs = UnitShelf::where('unit_id', $unitId)->get();
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

    #[On('added-author')]
    public function authorAdded($id)
    {
        $this->addEntityToCollection(Author::class, $id, 'authors');
    }

    #[On('added-publisher')]
    public function publisherAdded($id)
    {
        $this->addEntityToCollection(Publisher::class, $id, 'publishers');
    }

    #[On('added-unit')]
    public function unitAdded($id)
    {
        $this->addEntityToCollection(Unit::class, $id, 'units');
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
