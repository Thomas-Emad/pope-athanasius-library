<?php

namespace App\Livewire\Dashboard\Modals;

use App\Livewire\Forms\Dashboard\{SectionForm, ShelfForm};
use App\Models\Section;
use Livewire\Attributes\On;
use Livewire\Component;

class SectionShelf extends Component
{
  public SectionForm $section;
  public ShelfForm $shelf;

  #[On('add-modal-selected-section')]
  public function selectedSection($id)
  {
    $this->shelf->section = $id;
  }

  public function saveSection()
  {
    $section =   $this->section->save();
    $this->dispatch('close-modal', 'sections-shelfs');
    $this->dispatch('added-section', $section->id);
  }

  public function saveShelf()
  {
    $shelf = $this->shelf->save();
    $this->dispatch('close-modal', 'sections-shelfs');
    $this->dispatch('added-shelf', $shelf->id);
  }

  public function render()
  {
    return view(
      'livewire.dashboard.modals.section-shelf',
      [
        'sections' => Section::get()
      ]
    );
  }
}
