<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\SectionShelf;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ShelfForm extends Form
{
  public $shelfId;

  #[Validate('required|min:3|max:255', as: 'اسم الرف')]
  public $title = '';
  #[Validate('required|integer', as: 'رقم الرف')]
  public $number = 0;
  #[Validate('required|exists:sections,id', as: 'اسم الوحده')]
  public $section;


  public function save()
  {
    $this->validate();

    $this->validate([
      'title' => 'unique:section_shelves,title',
    ]);
    SectionShelf::create([
      'title' => $this->title,
      'number' => $this->number,
      'section_id' => $this->section
    ]);
  }

  public function update()
  {
    $this->validate();

    $shelf = SectionShelf::findOrFail($this->shelfId);

    $this->validate([
      'title' => 'unique:sections,title,' . $this->shelfId,
    ]);

    $shelf->update([
      'title' => $this->title,
      'number' => $this->number,
      'section_id' => $this->section
    ]);
  }

  public function setAttrbiutes($id, $title, $number, $section)
  {
    $this->shelfId = $id;
    $this->title = $title;
    $this->number = $number;
    $this->section = $section;
  }


  public function removeAttrbiutes()
  {
    $this->reset();
  }
}
