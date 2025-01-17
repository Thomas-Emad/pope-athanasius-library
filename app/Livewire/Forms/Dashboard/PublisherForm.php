<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Publisher;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PublisherForm extends Form
{
    public $id;

    #[Validate("required|min:3|max:255", as: 'اسم الناشر')]
    public $name = '';

    public function save()
    {
        $this->validate();
        $this->validate([
            'name' => 'unique:publishers,name',
        ]);
        return Publisher::create([
            'name' => $this->name,
        ]);
    }

    public function update()
    {
        $this->validate();

        $publisher = Publisher::findOrFail($this->id);
        $this->validate([
            'name' => 'unique:publishers,name,' . $this->id,
        ]);
        $publisher->update([
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
