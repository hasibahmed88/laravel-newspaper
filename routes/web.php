<?php

use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TagsController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ===== Front route ========||

Route::get('/', [App\Http\Controllers\Front\ProjectController::class, 'index'])->name('/');

// ===== Visitor ========||
Route::get('/visitor-register', [App\Http\Controllers\Front\VisitorController::class, 'visitorRegister'])->name('visitor-register');
Route::get('/visitor-login', [App\Http\Controllers\Front\VisitorController::class, 'visitorLogin'])->name('visitor-login');
Route::post('/new-visitor', [App\Http\Controllers\Front\VisitorController::class, 'newVisitor'])->name('new-visitor');
Route::post('/new-visitor-login', [App\Http\Controllers\Front\VisitorController::class, 'newVisitorLogin'])->name('new-visitor-login');
Route::get('/visitor-log-out/{ip}', [App\Http\Controllers\Front\VisitorController::class, 'visitorLogout'])->name('visitor-log-out');
Route::get('/check-email/{email}', [App\Http\Controllers\Front\VisitorController::class, 'checkEmail'])->name('check-email');
Route::get('/login-check-email/{email}', [App\Http\Controllers\Front\VisitorController::class, 'loginCheckEmail'])->name('login-check-email');

// Latest news
Route::get('news/latest', [App\Http\Controllers\Front\ProjectController::class, 'latestNews'])->name('latest-news');
Route::get('news/{name}', [App\Http\Controllers\Front\ProjectController::class, 'categoryNews'])->name('category-news');

// ===== Auth Class ========||
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ===== Admin route ========||
Route::get('/home', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('home');


// ===== Categories ========||
Route::get('/category/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'addCategory'])->name('add-category');
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
Route::get('/category/add-subcategory/', [App\Http\Controllers\Admin\SubCategoryController::class, 'addSubcategory'])->name('add-subcategory');
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


// ===== Ads ========||

Route::get('/ads/add-ads', [App\Http\Controllers\Admin\AdsController::class, 'addAds'])->name('add-ads');
Route::get('/ads/manage-ads', [App\Http\Controllers\Admin\AdsController::class, 'manageAds'])->name('manage-ads');
Route::get('/ads/trashed-ads', [App\Http\Controllers\Admin\AdsController::class, 'trashedAds'])->name('trashed-ads');
Route::post('/ads/new-ads', [App\Http\Controllers\Admin\AdsController::class, 'newAds'])->name('new-ads');
Route::get('/ads/edit-ads/{id}', [App\Http\Controllers\Admin\AdsController::class, 'editAds'])->name('edit-ads');
Route::post('/ads/update-ads', [App\Http\Controllers\Admin\AdsController::class, 'updateAds'])->name('update-ads');
Route::get('/ads/view-ads/{id}', [App\Http\Controllers\Admin\AdsController::class, 'viewAds'])->name('view-ads');
Route::post('/ads/delete-ads', [App\Http\Controllers\Admin\AdsController::class, 'deleteAds'])->name('delete-ads');
// publish & unpublish
Route::get('/ads/publish-ads/{id}', [App\Http\Controllers\Admin\AdsController::class, 'publishAds'])->name('publish-ads');
Route::get('/ads/unpublish-ads/{id}', [App\Http\Controllers\Admin\AdsController::class, 'unpublishAds'])->name('unpublish-ads');
// prestore & permanent delete
Route::get('/ads/restore-ads/{id}', [App\Http\Controllers\Admin\AdsController::class, 'restoreAds'])->name('restore-ads');
Route::post('/ads/permanent-delete-ads', [App\Http\Controllers\Admin\AdsController::class, 'permanentDeleteAds'])->name('permanent-delete-ads');


// ===== Visitor ========||

Route::get('/visitors/manage-visitor', [App\Http\Controllers\Admin\VisitorController::class, 'manageVisitor'])->name('manage-visitor');
Route::post('/visitors/delete-visitor', [App\Http\Controllers\Admin\VisitorController::class, 'deleteVisitor'])->name('delete-visitor');
Route::get('/visitors/visitor-logout/{ip}', [App\Http\Controllers\Admin\VisitorController::class, 'visitorLogout'])->name('visitor-logout');


