<?php

namespace App\Livewire\Dashboard\Modals;

use Livewire\Component;
use App\Livewire\Forms\Dashboard\PublisherForm;

class AddPublisher extends Component
{
    public PublisherForm $publisher;

    public function savePublisher()
    {
        $publisher = $this->publisher->save();
        $this->dispatch('close-modal', 'publisher');
        $this->dispatch('added-publisher', $publisher->id);
    }

    public function render()
    {
        return view('livewire.dashboard.modals.add-publisher');
    }
}
