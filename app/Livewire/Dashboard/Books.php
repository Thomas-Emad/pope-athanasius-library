<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('الكتب')]
#[Layout('layouts.dashboard')]
class Books extends Component
{
    public function render()
    {
        return view('livewire.dashboard.books');
    }
}
