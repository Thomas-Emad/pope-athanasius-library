<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Section;
use Livewire\Form;
use Illuminate\Validation\Rule;

class SectionForm extends Form
{
  public $sectionId;
  public $title = '';
  public $number = 0;

  public function rules(): array
  {
    return [
      'title' => [
        "required",
        "min:3",
        "max:255",
        Rule::unique('sections', 'title')->ignore($this->sectionId)
      ],
      'number' => [
        "required",
        "min:1",
        "integer",
        Rule::unique('sections', 'number')->ignore($this->sectionId)
      ]
    ];
  }

  public function attributeRules(): array
  {
    return [
      'title' => "اسم الوحده",
      'number' => "رقم الوحده"
    ];
  }

  public function save()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );

    $section =  Section::create([
      'title' => $this->title,
      'number' => $this->number
    ]);
    $this->removeAttrbiutes();
    return $section;
  }

  public function update()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );

    $section = Section::findOrFail($this->sectionId);

    $this->validate([
      'title' => 'unique:sections,title,' . $this->sectionId,
      'number' => 'unique:sections,number,' . $this->sectionId
    ]);

    $section->update([
      'title' => $this->title,
      'number' => $this->number
    ]);
    $this->removeAttrbiutes();
  }

  public function setAttrbiutes($id, $title, $number)
  {
    $this->sectionId = $id;
    $this->title = $title;
    $this->number = $number;
  }

  public function removeAttrbiutes()
  {
    $this->reset(['id', 'title', 'number']);
  }
}
