<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\AuthorForm;
use App\Models\Author;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\{WithPagination, WithFileUploads};

#[Title('المؤلفين')]
#[Layout('layouts.dashboard')]
class Authors extends Component
{
    use WithPagination, WithFileUploads;

    public AuthorForm $author;

    public $search = '';



    public function saveAuthor()
    {
        $this->author->save();
        $this->dispatch('close-modal', 'author');
    }

    public function editAuthor($id)
    {
        $author = Author::findOrFail($id);
        $this->author->setAttrbiutes($id, $author->name);
        $this->dispatch('open-modal', 'author');
    }
    public function updateAuthor()
    {
        $this->author->update();
        $this->dispatch('close-modal', 'author');
        $this->author->removeAttrbiutes();
    }



    public function render()
    {
        return view('livewire.dashboard.authors', [
            'authors' => Author::withCount('books')
                ->where('name', "like", "%$this->search%")
                ->latest()
                ->paginate(10)
        ]);
    }
}
