<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\PermissionEnum;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;

class BooksListComponent extends Component
{
    use WithFileUploads, WithPagination, WithoutUrlPagination;
    public $search = null,  $id = null, $user = null;
    public $getMarkUpBooks = false, $hasPermissionBook = false;

    public function mount($id = null)
    {
        $this->user = isset($id) ? User::findOrFail($id) : Auth::user();
        $this->hasPermissionBook = $this->user->hasPermissionTo(PermissionEnum::BOOK);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getBooksProperty()
    {
        return $this->user->books()->with([
            'author:id,name',
            'publisher:id,name',
            'section:id,title',
            'shelf:id,title',
        ])
            ->where(function ($query) {
                $query->filterSearch(null, $this->search);
            })
            ->when($this->getMarkUpBooks, function ($query) {
                $query->where('markup', true);
            })
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.profile.books-list-component', [
            'books' => $this->books
        ]);
    }
}
