<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\WordDaily;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WordDailyForm extends Form
{
    // Public Properties
    public $wordId;

    #[Validate("required|min:3|max:255", as: 'القائله')]
    public $said = '';

    #[Validate("required|min:3", as: 'المقوله')]
    public $content = '';

    #[Validate("required|integer", as: 'ترتيب الكلمه')]
    public $number_show = '';

    // Public Methods

    public function save()
    {
        $this->validate();
        $this->validate([
            'number_show' => 'unique:word_dailies,number_show'
        ], [
            'unique' => 'يبدوا ان هناك مقوله موضوعه لهذا اليوم سابقا'
        ]);

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
