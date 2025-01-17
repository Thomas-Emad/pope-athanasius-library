<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Author;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AuthorForm extends Form
{
    public $id;

    #[Validate("required|min:3|max:255", as: 'اسم مؤلف')]
    public $name = '';

    public function save()
    {
        $this->validate();
        $this->validate([
            'name' => 'unique:authors,name',
        ]);
        $author = Author::create([
            'name' => $this->name,
        ]);
        $this->removeAttrbiutes();
        return $author;
    }

    public function update()
    {
        $this->validate();

        $author = Author::findOrFail($this->id);
        $this->validate([
            'name' => 'unique:authors,name,' . $this->id,
        ]);
        $author->update([
            'name' => $this->name,
        ]);
    }

    public function setAttrbiutes($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function removeAttrbiutes()
    {
        $this->reset();
    }
}
