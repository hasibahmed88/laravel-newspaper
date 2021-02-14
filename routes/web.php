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


// ===== Categories ========||
Route::get('/category/manage-category', [App\Http\Controllers\Admin\CategoryController::class, 'manageCategory'])->name('manage-category');
Route::post('/category/new-category', [App\Http\Controllers\Admin\CategoryController::class, 'newCategory'])->name('new-category');
Route::get('/category/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('/category/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('update-category');
// publish & unpublish
Route::get('/category/publish-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'publishCategory'])->name('publish-category');
Route::get('/category/unpublish-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'unpublishCategory'])->name('unpublish-category');
// Soft delete category
Route::post('/category/delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('delete-category');
//trash
Route::get('/category/trash-category', [App\Http\Controllers\Admin\CategoryController::class, 'trashCategory'])->name('trash-category');
Route::get('/category/restore-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'restoreCategory'])->name('restore-category');
Route::post('/category/permanent-delete-category/', [App\Http\Controllers\Admin\CategoryController::class, 'permanentDeleteCategory'])->name('permanent-delete-category');



