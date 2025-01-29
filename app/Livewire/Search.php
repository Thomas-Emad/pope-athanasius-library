<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
  public $options;
  public $type = '';
  public $selectedSection;

  public function selectedSectionUpdated()
  {
    $this->dispatch('update-option' . ['type' => $this->type, 'value' => $this->selectedSection]);
  }

  public function render()
  {
    return view('livewire.search');
  }
}
