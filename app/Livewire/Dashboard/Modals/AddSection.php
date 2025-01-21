<?php

namespace App\Livewire\Dashboard\Modals;

use App\Livewire\Forms\Dashboard\SectionForm;
use Livewire\Component;

class AddSection extends Component
{
  public SectionForm $section;

  public function saveUnit()
  {
    $section =   $this->section->save();
    $this->dispatch('close-modal', 'add-sections');
    $this->dispatch('added-section', $section->id);
  }

  public function render()
  {
    return view('livewire.dashboard.modals.add-section');
  }
}
