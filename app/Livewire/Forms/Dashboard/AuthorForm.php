<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Author;
use Illuminate\Validation\Rule;
use Livewire\Form;

class AuthorForm extends Form
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
        Rule::unique('authors', 'name')->ignore($this->id)
      ],
    ];
  }
  public function attributeRules(): array
  {
    return [
      'name' => "اسم مؤلف",
    ];
  }

  public function save()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );
    $author = Author::create([
      'name' => $this->name,
    ]);
    $this->removeAttrbiutes();
    return $author;
  }

  public function update()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );
    $author = Author::findOrFail($this->id);
    $author->update([
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
    $this->reset();
  }
}
