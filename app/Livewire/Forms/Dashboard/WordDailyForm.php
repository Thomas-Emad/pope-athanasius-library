<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\WordDaily;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;

class WordDailyForm extends Form
{
  // Public Properties
  public $wordId;
  public $said = '';
  public $content = '';
  public $number_show = '';

  public function rules(): array
  {
    return [
      'said' => [
        "required",
        "min:3",
        "max:255",
      ],
      'content' => [
        "required",
        "min:3",
      ],
      'number_show' => [
        "required",
        "min:1",
        "integer",
        Rule::unique('word_dailies', 'number_show')->ignore($this->wordId)
      ]
    ];
  }

  public function attributeRules(): array
  {
    return [
      'said' => "القائله",
      'content' => 'المقوله',
      'number_show' => "ترتيب الكلمه"
    ];
  }

  public function save()
  {
    $this->validate(
      $this->rules(),
      [
        'unique' => 'يبدوا ان هناك مقوله موضوعه لهذا اليوم سابقا'
      ],
      $this->attributeRules()
    );

    $wordDaily = WordDaily::create([
      'said' => $this->said,
      'content' => $this->content,
      'number_show' => $this->number_show,
    ]);

    $this->resetAttributes();
    return $wordDaily;
  }

  public function update()
  {
    $this->validate();

    $wordDaily = WordDaily::findOrFail($this->wordId);
    $this->validate([
      'number_show' => 'unique:word_dailies,number_show,' . $this->wordId,
    ], [
      'unique' => 'يبدوا ان هناك مقوله موضوعه لهذا اليوم سابقا'
    ]);

    $wordDaily->update([
      'said' => $this->said,
      'content' => $this->content,
      'number_show' => $this->number_show,
    ]);

    $this->resetAttributes();
  }

  public function delete($id)
  {
    $wordDaily = WordDaily::findOrFail($id);
    $wordDaily->delete();
  }

  public function newWordtoDay($id)
  {
    $currentWord = WordDaily::where('is_today', true)->first();
    if ($currentWord && $currentWord->id != $id) {
      $currentWord->update([
        'is_today' => false
      ]);
    }
    WordDaily::where('id', $id)->update([
      'is_today' => true
    ]);
  }

  // Helper Methods

  public function setAttributes($id, $said, $content, $number_show)
  {
    $this->wordId = $id;
    $this->said = $said;
    $this->content = $content;
    $this->number_show = $number_show;
  }

  public function resetAttributes()
  {
    $this->reset(['wordId', 'said', 'content', 'number_show']);
  }
}
