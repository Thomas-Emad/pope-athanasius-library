<?php

namespace App\Livewire;

use App\Livewire\Forms\ShelfForm;
use App\Livewire\Forms\UnitForm;
use Livewire\Component;
use App\Models\{Unit, UnitShelf};
use Livewire\Attributes\Title;

#[Title('أقسام الكتب')]
class SectionsPage extends Component
{
    public UnitForm $unit;
    public ShelfForm $shelf;


    public function saveUnit()
    {
        $this->unit->save();
        $this->dispatch('close-modal', 'add-units');
    }

    public function saveShelf()
    {
        $this->shelf->save();
        $this->dispatch('close-modal', 'add-units');
    }

    public function editUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $this->unit->setAttrbiutes($id, $unit->title, $unit->number);
        $this->dispatch('open-modal', 'edit-units');
    }
    public function updateUnit()
    {
        $this->unit->update();
        $this->dispatch('close-modal', 'edit-units');
        $this->unit->removeAttrbiutes();
    }

    public function editShelf($id)
    {
        $shelf = UnitShelf::findOrFail($id);
        $this->shelf->setAttrbiutes($id, $shelf->title, $shelf->number, $shelf->unit_id);
        $this->dispatch('open-modal', 'edit-shelf');
    }
    public function updateShelf()
    {
        $this->shelf->update();
        $this->dispatch('close-modal', 'edit-shelf');
        $this->shelf->removeAttrbiutes();
    }

    public function render()
    {
        return view('livewire.sections-page', [
            'units' => Unit::with('shelfs')->get()
        ]);
    }
}
