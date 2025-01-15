<?php

namespace App\Livewire\Dashboard;


use App\Livewire\Forms\PublisherForm;
use App\Models\Publisher;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\{WithPagination, WithFileUploads};

#[Title('الناشرين')]
#[Layout('layouts.dashboard')]
class Publishers extends Component
{
    use WithPagination, WithFileUploads;

    public PublisherForm $publisher;

    public $search = '';



    public function savepublisher()
    {
        $this->publisher->save();
        $this->dispatch('close-modal', 'publisher');
    }

    public function editpublisher($id)
    {
        $publisher = Publisher::findOrFail($id);
        $this->publisher->setAttrbiutes($id, $publisher->name);
        $this->dispatch('open-modal', 'publisher');
    }
    public function updatepublisher()
    {
        $this->publisher->update();
        $this->dispatch('close-modal', 'publisher');
        $this->publisher->removeAttrbiutes();
    }

    public function render()
    {
        return view('livewire.dashboard.publishers', [
            'publishers' => Publisher::withCount('books')
                ->where('name', "like", "%$this->search%")
                ->latest()
                ->paginate(10)
        ]);
    }
}
