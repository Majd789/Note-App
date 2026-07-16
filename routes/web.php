<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [NoteController::class, 'index'])->name('home');

    // Notes
    Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('note.store');
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('note.show');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('note.delete');
    Route::post('/notes/{note}/folders/{folder}', [NoteController::class, 'addToFolder'])->name('note.add-to-folder');
    Route::post('/notes/{note}/favorite', [NoteController::class, 'toggleFavorite'])->name('note.favorite');

    // Folders
    Route::get('/folders', [FolderController::class, 'index'])->name('folder.index');
    Route::get('/folders/create', [FolderController::class, 'create'])->name('folder.create');
    Route::post('/folders', [FolderController::class, 'store'])->name('folder.store');
    Route::get('/folders/{folder}', [FolderController::class, 'show'])->name('folder.show');
    Route::get('/folders/{folder}/edit', [FolderController::class, 'edit'])->name('folder.edit');
    Route::put('/folders/{folder}', [FolderController::class, 'update'])->name('folder.update');
    Route::delete('/folders/{folder}', [FolderController::class, 'destroy'])->name('folder.delete');

    // Favorites
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorite.index');

    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
