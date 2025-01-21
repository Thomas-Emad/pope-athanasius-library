<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

use App\Livewire\Forms\Dashboard\{SectionForm, ShelfForm};
use App\Models\{Section, SectionShelf};
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('أقسام الكتب')]
#[Layout('layouts.dashboard')]
class Sections extends Component
{
  use WithPagination;
  public SectionForm $section;
  public ShelfForm $shelf;
  public $shelfs = [];
  public $search = '';


  public function saveSection()
  {
    $this->section->save();
    $this->dispatch('close-modal', 'add-sections');
  }

  public function saveShelf()
  {
    $this->shelf->save();
    $this->dispatch('close-modal', 'add-sections');
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
    $this->shelfs = SectionShelf::where('section_id', $id)->get();
    $this->dispatch('open-modal', 'show-shelfs');
  }

  public function render()
  {
    return view('livewire.dashboard.sections', [
      'sections' => Section::withCount(['shelfs', 'books'])
        ->where('title', "like", "%$this->search%")
        ->latest()
        ->paginate(10),
      'shelfs' => $this->shelfs
    ]);
  }
}
