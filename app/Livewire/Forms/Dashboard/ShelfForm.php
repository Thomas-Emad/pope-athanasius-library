<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\UnitShelf;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ShelfForm extends Form
{
    public $shelfId;

    #[Validate('required|min:3|max:255', as: 'اسم الرف')]
    public $title = '';
    #[Validate('required|integer', as: 'رقم الرف')]
    public $number = 0;
    #[Validate('required|exists:units,id', as: 'اسم الوحده')]
    public $unit;


    public function save()
    {
        $this->validate();

        $this->validate([
            'title' => 'unique:units,title',
            'number' => 'unique:unit_shelves,number'
        ]);
        UnitShelf::create([
            'title' => $this->title,
            'number' => $this->number,
            'unit_id' => $this->unit
        ]);
    }

    public function update()
    {
        $this->validate();

        $shelf = UnitShelf::findOrFail($this->shelfId);

        $this->validate([
            'title' => 'unique:units,title,' . $this->shelfId,
            'number' => 'unique:units,number,' . $this->shelfId
        ]);

        $shelf->update([
            'title' => $this->title,
            'number' => $this->number,
            'unit_id' => $this->unit
        ]);
    }

    public function setAttrbiutes($id, $title, $number, $unit)
    {
        $this->shelfId = $id;
        $this->title = $title;
        $this->number = $number;
        $this->unit = $unit;
    }


    public function removeAttrbiutes()
    {
        $this->reset();
    }
}
