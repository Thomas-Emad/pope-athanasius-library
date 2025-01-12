<?php

use App\Livewire\HomePage;
use App\Livewire\SectionsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\{Index, Books, Units};

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', HomePage::class)->name('home');
Route::get('/sections', SectionsPage::class)->name('sections');

Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('/', Index::class)->name('index');
    Route::get('/books', Books::class)->name('books');
    Route::get('/units', Units::class)->name('units');
});



require __DIR__ . '/auth.php';
