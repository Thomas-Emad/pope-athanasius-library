<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Unit;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UnitForm extends Form
{
    public $unitId;

    #[Validate("required|min:3|max:255", as: 'اسم الوحده')]
    public $title = '';

    #[Validate('required|min:1|integer', as: 'رقم الوحده')]
    public $number = 0;

    public function save()
    {
        $this->validate();

        $this->validate([
            'title' => 'unique:units,title',
            'number' => 'unique:units,number'
        ]);
        return   Unit::create([
            'title' => $this->title,
            'number' => $this->number
        ]);
    }

    public function update()
    {
        $this->validate();

        $unit = Unit::findOrFail($this->unitId);

        $this->validate([
            'title' => 'unique:units,title,' . $this->unitId,
            'number' => 'unique:units,number,' . $this->unitId
        ]);

        $unit->update([
            'title' => $this->title,
            'number' => $this->number
        ]);
    }

    public function setAttrbiutes($id, $title, $number)
    {
        $this->unitId = $id;
        $this->title = $title;
        $this->number = $number;
    }


    public function removeAttrbiutes()
    {
        $this->reset();
    }
}
