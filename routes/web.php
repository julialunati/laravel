<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{option}', [NewsController::class, 'categorize'])->name('news.categorize');
Route::get('/news/{option}/{id}', [NewsController::class, 'detalize'])->where('id', '\d+')->name('news.detalize');

//admin
// Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
//     Route::resource('categories', CategoryController::class);
//     Route::resource('news', AdminNewsController::class);
// });


Route::prefix('admin')->group(function () {
    Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
});
