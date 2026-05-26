<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
});
