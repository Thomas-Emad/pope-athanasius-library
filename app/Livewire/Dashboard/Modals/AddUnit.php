<?php

namespace App\Livewire\Dashboard\Modals;

use Livewire\Component;
use App\Livewire\Forms\Dashboard\UnitForm;

class AddUnit extends Component
{
    public UnitForm $unit;

    public function saveUnit()
    {
        $unit =   $this->unit->save();
        $this->dispatch('close-modal', 'add-units');
        $this->dispatch('added-unit', $unit->id);
    }

    public function render()
    {
        return view('livewire.dashboard.modals.add-unit');
    }
}
