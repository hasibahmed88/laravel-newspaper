<?php

use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TagsController;
use GuzzleHttp\Psr7\Request;
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

// ===== Sub Categories ========||
Route::get('/category/manage-subcategory/', [App\Http\Controllers\Admin\SubCategoryController::class, 'manageSubcategory'])->name('manage-subcategory');
Route::post('/category/new-subcategory/', [App\Http\Controllers\Admin\SubCategoryController::class, 'newSubcategory'])->name('new-subcategory');
Route::get('/category/edit-subcategory/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'editSubcategory'])->name('edit-subcategory');
Route::post('/category/update-subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'updateSubcategory'])->name('update-subcategory');
// publish & unpublish
Route::get('/category/unpublish-subcategory/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'unpublishSubcategory'])->name('unpublish-subcategory');
Route::get('/category/publish-subcategory/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'publishSubcategory'])->name('publish-subcategory');
Route::post('/category/delete-subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'deleteSubcategory'])->name('delete-subcategory');
// Trashed subcategory
Route::get('/category/trash-subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'trashSubcategory'])->name('trash-subcategory');
Route::get('/category/restore-subcategory/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'restoreSubcategory'])->name('restore-subcategory');
Route::post('/category/permanent-delete-subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'permanentDeleteSubcategory'])->name('permanent-delete-subcategory');


// ===== News ========||
Route::get('/news/add-news', [App\Http\Controllers\Admin\NewsController::class, 'addNews'])->name('add-news');
Route::get('/news/manage-news', [App\Http\Controllers\Admin\NewsController::class, 'manageNews'])->name('manage-news');
Route::get('/news/trashed-news', [App\Http\Controllers\Admin\NewsController::class, 'trashedNews'])->name('trashed-news');
Route::post('/news/new-news', [App\Http\Controllers\Admin\NewsController::class, 'newNews'])->name('new-news');
Route::get('/news/view-news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'viewNews'])->name('view-news');
Route::get('/news/edit-news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'editNews'])->name('edit-news');
Route::post('/news/update-news', [App\Http\Controllers\Admin\NewsController::class, 'updateNews'])->name('update-news');
// PUblish & unpublish
Route::get('/news/publish-news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'publishNews'])->name('publish-news');
Route::get('/news/unpublish-news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'unpublishNews'])->name('unpublish-news');
// Trash news
Route::post('/news/delete-news', [App\Http\Controllers\Admin\NewsController::class, 'deleteNews'])->name('delete-news');
Route::get('/news/restore-news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'restoreNews'])->name('restore-news');
Route::post('/news/permanent-delete-news', [App\Http\Controllers\Admin\NewsController::class, 'permanentDeleteNews'])->name('permanent-delete-news');


