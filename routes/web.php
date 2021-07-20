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
    // dd(request()->ip()); -- посмотреть ip-adress
    // return redirect()->route('news'); -- ридерект
    // return response()->json([ 
    //     'title' => 'laravel',
    //     'description' => 'framework'
    // ]);
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/contact', [NewsController::class, 'contact'])->name('news.contact');
Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{option}', [NewsController::class, 'categorize'])->name('news.categorize');
Route::get('/news/{option}/{id}', [NewsController::class, 'detalize'])->where('id', '\d+')->name('news.detalize');

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/', 'admin.index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
});
