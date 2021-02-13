<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ===== Auth Class ========||
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ===== Admin route ========||
Route::get('/home', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('home');




