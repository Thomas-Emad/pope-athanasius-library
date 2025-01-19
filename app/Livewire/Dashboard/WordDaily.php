<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\WordDaily as WordDailyModel;
use App\Livewire\Forms\Dashboard\WordDailyForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('كلمة اليوم')]
#[Layout('layouts.dashboard')]
class WordDaily extends Component
{
    use WithPagination, WithFileUploads;

    public WordDailyForm $word;
    public ?string $search = '';
    public bool $showWordToday = false;

    // Public Methods

    public function saveWordDaily()
    {
        $this->word->save();
        $this->dispatch('close-modal', 'word-daily');
    }

    public function editWordDaily($id)
    {
        $wordDaily = WordDailyModel::findOrFail($id);
        $this->word->setAttributes($id, $wordDaily->said, $wordDaily->content, $wordDaily->number_show);
        $this->dispatch('open-modal', 'word-daily');
    }

    public function updateWordDaily()
    {
        $this->word->update();
        $this->dispatch('close-modal', 'word-daily');
        $this->word->resetAttributes();
    }

    public function deleteWordDaily($id)
    {
        $this->word->delete($id);
        $this->dispatch('close-modal', 'delete-word-daily');
    }

    public function resetForm()
    {
        $this->reset(['word.said', 'word.content', 'word.number_show']);
        $this->resetErrorBag();
    }

    public function setWordToDay($id)
    {
        $this->word->newWordtoDay($id);
    }

    // Render Method

    public function render()
    {
        return view('livewire.dashboard.word-daily', [
            'words' => WordDailyModel::where('said', "like", "%$this->search%")
                ->when($this->showWordToday, function ($query) {
                    $query->where('is_today', true);
                })
                ->latest()
                ->paginate(10)
        ]);
    }
}
