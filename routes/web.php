<?php

use App\Livewire\HomePage;
use App\Livewire\BookPage;
use App\Livewire\SectionsPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\{Index, Sections, Authors, Post, Publishers, Roles, User, WordDaily};
use App\Livewire\Dashboard\Books\{Books, Operations};
use App\Livewire\PostPage;
use App\Livewire\SearchPage;


Route::view('profile/{id?}', 'profile')
  ->middleware(['auth'])
  ->name('profile');

Route::get('/', HomePage::class)->name('home');
Route::get('/sections', SectionsPage::class)->name('sections');
Route::get('/book/{book:code}', BookPage::class)->name('book.show');
Route::get('/search', SearchPage::class)->name('search');
Route::get('/posts', PostPage::class)->name('posts');

Route::middleware(['auth', 'permission:control_dashboard', 'verified'])
  ->prefix('dashboard')
  ->as('dashboard.')
  ->group(function () {
    Route::get('/', Index::class)->name('index')->middleware('permission:control_dashboard');
    Route::get('/sections', Sections::class)->name('sections')->middleware('permission:sections_book');
    Route::get('/authors', Authors::class)->name('authors')->middleware('permission:authors');
    Route::get('/books', Books::class)->name('books')->middleware('permission:books');
    Route::get('/books/create', Operations::class)->name('books.create')->middleware('permission:books');
    Route::get('/books/edit/{id}', Operations::class)->name('books.edit')->middleware('permission:books');
    Route::get('/publishers', Publishers::class)->name('publishers')->middleware('permission:publishers');
    Route::get('/word-daily', WordDaily::class)->name('words')->middleware('permission:word_today');
    Route::get('/posts', Post::class)->name('posts')->middleware('permission:posts');
    Route::get('/users', User::class)->name('users')->middleware('permission:users');
    Route::get('/roles', Roles::class)->name('roles')->middleware('permission:users');
  });



require __DIR__ . '/auth.php';
