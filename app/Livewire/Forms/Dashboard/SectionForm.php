<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Section;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SectionForm extends Form
{
  public $sectionId;

  #[Validate("required|min:3|max:255", as: 'اسم الوحده')]
  public $title = '';

  #[Validate('required|min:1|integer', as: 'رقم الوحده')]
  public $number = 0;

  public function save()
  {
    $this->validate();

    $this->validate([
      'title' => 'unique:sections,title',
      'number' => 'unique:sections,number'
    ]);
    return Section::create([
      'title' => $this->title,
      'number' => $this->number
    ]);
  }

  public function update()
  {
    $this->validate();

    $section = Section::findOrFail($this->sectionId);

    $this->validate([
      'title' => 'unique:sections,title,' . $this->sectionId,
      'number' => 'unique:sections,number,' . $this->sectionId
    ]);

    $section->update([
      'title' => $this->title,
      'number' => $this->number
    ]);
  }

  public function setAttrbiutes($id, $title, $number)
  {
    $this->sectionId = $id;
    $this->title = $title;
    $this->number = $number;
  }


  public function removeAttrbiutes()
  {
    $this->reset();
  }
}
