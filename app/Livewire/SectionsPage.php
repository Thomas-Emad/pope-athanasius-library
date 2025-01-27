<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Section, SectionShelf};
use Livewire\Attributes\Title;
use App\Livewire\Forms\Dashboard\{SectionForm, ShelfForm};

#[Title('أقسام الكتب')]
class SectionsPage extends Component
{
  public SectionForm $section;
  public ShelfForm $shelf;


  public function saveSection()
  {
    $this->section->save();
    $this->dispatch('close-modal', 'sections-shelfs');
  }

  public function saveShelf()
  {
    $this->shelf->save();
    $this->dispatch('close-modal', 'sections-shelfs');
  }

  public function editSection($id)
  {
    $section = Section::findOrFail($id);
    $this->section->setAttrbiutes($id, $section->title, $section->number);
    $this->dispatch('open-modal', 'edit-sections');
  }
  public function updateSection()
  {
    $this->section->update();
    $this->dispatch('close-modal', 'edit-sections');
    $this->section->removeAttrbiutes();
  }

  public function editShelf($id)
  {
    $shelf = SectionShelf::findOrFail($id);
    $this->shelf->setAttrbiutes($id, $shelf->title, $shelf->number, $shelf->section_id);
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
      'sections' => Section::with('shelfs')->get()
    ]);
  }
}
