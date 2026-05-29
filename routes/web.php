<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth',)->controller(DashboardController::class)->group(function() {
    Route::get('/dashboard', 'index')->name('dashboard'); 

    // route todo
    Route::post('/dashboard/todo', 'store')->name('todo.store');
    Route::delete('/dashboard/delete/{id}', 'destroy')->name('todo.destroy');

    // route event
    Route::post('/dashboard/events', 'eventStore')->name('events.store');
    Route::delete('/dashboard/events/{id}', 'eventDestroy')->name('events.destroy');
});

Route::middleware('auth')->controller(NotesController::class)->group(function ()  {
    Route::get('/notes', 'index')->name('notes.index');
    Route::get('/notes/create', 'create')->name('notes.create');
    Route::post('/notes', 'store')->name('notes.store');
    Route::get('/notes/{note}', 'show')->name('notes.show');
    Route::get('/notes/{note}/edit', 'edit')->name('notes.edit');
    Route::put('/notes/{note}', 'update')->name('notes.update');
    Route::delete('/notes/{note}', 'destroy')->name('notes.destroy');
});

Route::middleware('auth')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('notes.index');
    Route::post('/categories/store', 'store')->name('categories.store');
    Route::put('/categories/update/{id}', 'update')->name('categories.update');
    Route::delete('/categories/destroy/{id}', 'destroy')->name('categories.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
