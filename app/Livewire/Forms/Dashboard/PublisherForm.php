<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Publisher;
use Livewire\Form;
use Illuminate\Validation\Rule;

class PublisherForm extends Form
{
  public $id;
  public $name = '';

  public function rules(): array
  {
    return [
      'name' => [
        "required",
        "min:3",
        "max:255",
        Rule::unique('publishers', 'name')->ignore($this->id)
      ],
    ];
  }
  public function attributeRules(): array
  {
    return [
      'name' => "اسم الناشر",
    ];
  }

  public function save()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );

    $publisher = Publisher::create([
      'name' => $this->name,
    ]);
    $this->removeAttrbiutes();
    return $publisher;
  }

  public function update()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );

    $publisher = Publisher::findOrFail($this->id);
    $publisher->update([
      'name' => $this->name,
    ]);
    $this->removeAttrbiutes();
  }

  public function setAttrbiutes($id, $name)
  {
    $this->id = $id;
    $this->name = $name;
  }

  public function removeAttrbiutes()
  {
    $this->reset(['id', 'name']);
  }
}
