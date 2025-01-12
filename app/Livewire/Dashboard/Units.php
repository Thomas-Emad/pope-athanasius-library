<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

use App\Livewire\Forms\ShelfForm;
use App\Livewire\Forms\UnitForm;
use App\Models\{Unit, UnitShelf};
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('أقسام الكتب')]
#[Layout('layouts.dashboard')]
class Units extends Component
{
    use WithPagination;
    public UnitForm $unit;
    public ShelfForm $shelf;
    public $shelfs = [];
    public $search = '';


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
        $this->dispatch('close-modal', 'show-shelfs');
        $this->dispatch('open-modal', 'edit-shelf');
    }
    public function updateShelf()
    {
        $this->shelf->update();
        $this->dispatch('close-modal', 'edit-shelf');
        $this->dispatch('open-modal', 'show-shelfs');
        $this->shelf->removeAttrbiutes();
    }
    public function showShelfs($id)
    {
        $this->shelfs = UnitShelf::where('unit_id', $id)->get();
        $this->dispatch('open-modal', 'show-shelfs');
    }

    public function render()
    {
        return view('livewire.dashboard.units', [
            'units' => Unit::withCount(['shelfs', 'books'])
                ->where('title', "like", "%$this->search%")
                ->latest()
                ->paginate(10),
            'shelfs' => $this->shelfs
        ]);
    }
}
