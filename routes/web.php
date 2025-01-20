<?php

use App\Livewire\BookPage;
use App\Livewire\HomePage;
use App\Livewire\SectionsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\{Index, Units, Authors, Publishers, User, WordDaily};
use App\Livewire\Dashboard\Books\{Books, Operations};
use App\Livewire\SearchPage;
use Illuminate\Support\Facades\Storage;


Route::view('profile', 'profile')
  ->middleware(['auth'])
  ->name('profile');

Route::get('/', HomePage::class)->name('home');
Route::get('/sections', SectionsPage::class)->name('sections');
Route::get('/book/{code}', BookPage::class)->name('book.show');
Route::get('/search', SearchPage::class)->name('search');


Route::middleware(['auth', 'canAccess:owner,admin'])->prefix('dashboard')->as('dashboard.')->group(function () {
  Route::get('/', Index::class)->name('index');
  Route::get('/units', Units::class)->name('units');
  Route::get('/authors', Authors::class)->name('authors');
  Route::get('/books', Books::class)->name('books');
  Route::get('/books/create', Operations::class)->name('books.create');
  Route::get('/books/edit/{id}', Operations::class)->name('books.edit');
  Route::middleware('canAccess:owner')->group(function () {
    Route::get('/publishers', Publishers::class)->name('publishers');
    Route::get('/word-daily', WordDaily::class)->name('words');
    Route::get('/users', User::class)->name('users');
  });
});



require __DIR__ . '/auth.php';
