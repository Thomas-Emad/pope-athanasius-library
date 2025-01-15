<?php

use App\Livewire\HomePage;
use App\Livewire\SectionsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\{Index, Units, Authors, Publishers, Books};

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', HomePage::class)->name('home');
Route::get('/sections', SectionsPage::class)->name('sections');

Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('/', Index::class)->name('index');
    Route::get('/units', Units::class)->name('units');
    Route::get('/authors', Authors::class)->name('authors');
    Route::get('/publishers', Publishers::class)->name('publishers');
    Route::get('/books', Books::class)->name('books');
});



require __DIR__ . '/auth.php';
