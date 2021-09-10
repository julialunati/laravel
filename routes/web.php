<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestNotificationController;
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
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is.admin']
], function () {
    Route::view('/', 'admin.index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::get('/parse', ParserController::class);
});


Route::get('/init/{driver}', [SocialController::class, 'init'])
    ->name('social.init');
Route::get('/callback/{driver}', [SocialController::class, 'callback'])
    ->name('social.callback');


Route::get('/home', function () {
    return view('home');
})->middleware('auth', 'is.admin')->name('home');


Route::get('/account', function () {
    return view('account');
})->name('account');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//notification test
Route::get('/notify', [TestNotificationController::class, 'sendTestNotification'])->name('notify');