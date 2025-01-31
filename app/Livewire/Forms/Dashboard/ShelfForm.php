<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\SectionShelf;
use Livewire\Form;
use Illuminate\Validation\Rule;

class ShelfForm extends Form
{
  public $shelfId;
  public $title = '';
  public $number = 0;
  public $section;

  public function rules(): array
  {
    return [
      'title' => [
        "required",
        "min:3",
        "max:255",
        Rule::unique('section_shelves', 'title')->ignore($this->shelfId)
      ],
      'number' => [
        "required",
        "integer",
      ],
      'section' => [
        "required",
        "integer",
        "exists:sections,id",
      ]
    ];
  }

  public function attributeRules(): array
  {
    return [
      'title' => "اسم الرف",
      'number' => 'رقم الرف',
      'section' => "اسم الوحده"
    ];
  }

  public function save()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );
    $shelf = SectionShelf::create([
      'title' => $this->title,
      'number' => $this->number,
      'section_id' => $this->section
    ]);
    $this->removeAttrbiutes();
    return $shelf;
  }

  public function update()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );

    $shelf = SectionShelf::findOrFail($this->shelfId);

    $shelf->update([
      'title' => $this->title,
      'number' => $this->number,
      'section_id' => $this->section
    ]);

    $this->removeAttrbiutes();
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
    $this->reset(['id', 'title', 'number', 'section']);
  }
}
