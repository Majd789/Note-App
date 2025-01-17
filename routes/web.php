<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard',function(){
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[\App\Http\Controllers\NoteController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
//    Route::get('/notes', [\App\Http\Controllers\NoteController::class, 'index'])->name('note.index');
    Route::get('/note/create',[\App\Http\Controllers\NoteController::class, 'create'])->name('note.create');
    Route::post('/note/store',[\App\Http\Controllers\NoteController::class, 'store'])->name('note.store');
    Route::get('/note/show/{id}',[\App\Http\Controllers\NoteController::class, 'show'])->name('note.show');
    Route::get('/note/edit/{id}',[\App\Http\Controllers\NoteController::class, 'edit'])->name('note.edit');
    Route::put('/note/update/{id}',[\App\Http\Controllers\NoteController::class, 'update'])->name('note.update');
    Route::delete('/note/delete/{id}',[\App\Http\Controllers\NoteController::class, 'destroy'])->name('note.delete');
    Route::get('/note/{note_id}/add_to/folder/{folder_id}',[\App\Http\Controllers\NoteController::class, 'addToFolder'])->name('add.to.folder');
    Route::get('/note/{id}/add/favorite' ,[\App\Http\Controllers\NoteController::class ,'add_To_Favorite'])->name('note.favorite');

});


Route::middleware('auth')->group(function () {
    Route::get('/folders', [\App\Http\Controllers\FolderController::class, 'index'])->name('folder.index');
    Route::get('/folder/create',[\App\Http\Controllers\FolderController::class, 'create'])->name('folder.create');
    Route::post('/folder/store',[\App\Http\Controllers\FolderController::class, 'store'])->name('folder.store');
    Route::get('/folder/show/{id}',[\App\Http\Controllers\FolderController::class, 'show'])->name('folder.show');
    Route::get('/folder/edit/{id}',[\App\Http\Controllers\FolderController::class, 'edit'])->name('folder.edit');
    Route::put('/folder/update/{id}',[\App\Http\Controllers\FolderController::class, 'update'])->name('folder.update');
    Route::delete('/folder/delete/{id}',[\App\Http\Controllers\FolderController::class, 'destroy'])->name('folder.delete');
    Route::get('/folder/{id}/notes' ,[\App\Http\Controllers\FolderController::class ,'folder_content'])->name('folder.content');
});

Route::middleware('auth')->group(function () {
    Route::get('/favorites', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favorite.index');

});


Route::middleware('auth')->group(function () {
    Route::get('/favorites', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favorite.index');
// عرض نموذج الاتصال
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// إرسال نموذج الاتصال
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});



require __DIR__.'/auth.php';
