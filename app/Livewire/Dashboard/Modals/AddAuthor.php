<?php

namespace App\Livewire\Dashboard\Modals;

use Livewire\Component;
use App\Livewire\Forms\Dashboard\AuthorForm;

class AddAuthor extends Component
{
    public AuthorForm $author;

    public function saveAuthor()
    {
        $author =  $this->author->save();
        $this->dispatch('close-modal', 'author');
        $this->dispatch('added-author', $author->id);
    }

    public function render()
    {
        return view('livewire.dashboard.modals.add-author');
    }
}
