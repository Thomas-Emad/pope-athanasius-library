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
        ])->where('user_id', $this->user->id)
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%")

                    ->orWhere('code', 'like', "%{$this->search}%")

                    ->orWhereHas('author', fn ($subQuery) =>
                    $subQuery->where('name', 'like', "%{$this->search}%"))

                    ->orWhereHas('publisher', fn ($subQuery) =>
                    $subQuery->where('name', 'like', "%{$this->search}%"))

                    ->orWhere('series', 'like', "%{$this->search}%")

                    ->orWhereHas('section', fn ($subQuery) =>
                    $subQuery->where('title', 'like', "%{$this->search}%")
                        ->orWhere('number', $this->search))

                    ->orWhereHas('shelf', fn ($subQuery) =>
                    $subQuery->where('title', 'like', "%{$this->search}%")
                        ->orWhere('number', $this->search));
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
