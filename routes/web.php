<?php

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

Route::get('/greetings/{name}', function (string $name) {
    return "It's nice to meet you, {$name}!";
});

Route::get('/info/{project}', function (string $project) {
    return " {$project} is a project which carried out individually or collaboratively and possibly involving research or design, that is carefully planned (usually by a project team, but sometimes by a project manager or by a project planner) to achieve a particular aim.";
});

Route::get('/news/{id}', function (int $id) {
    switch ($id) {
        case 1:
            return "Фраза из школы: \"London is the capital of Great Britain and Northern Ireland\" некорректная";
            break;
        case 2:
            return "Great Britain — остров, у которого нет так называемой \"столицы\"";
            break;
        case 3:
            return "United Kingdom состоит из 3+1 частей: Scotland (столица Edinburgh), Wales (столица Cardiff), England (столица London). Все три они находятся на одном острове Great Britain.";
            break;
        case 4:
            return "В United Kingdom входит Northern Ireland (столица Belfast), которая находится на острове Ireland и граничит со страной Ireland, у которой столица Dublin, но которая не входит в UK.";
            break;
        case 5:
            return "Ireland и Northen Ireland — два разных государственных объекта, находящихся на одном острове, который называется Ireland.";
            break;
        default:
            return "Sorry! News with id $id not found!";
    }
});

Route::get('/news/', function () {
    return "Фраза из школы: \"London is the capital of Great Britain and Northern Ireland\" некорректная. 
    Great Britain — остров, у которого нет так называемой \"столицы\". 
    United Kingdom состоит из 3+1 частей: Scotland (столица Edinburgh), Wales (столица Cardiff), England (столица London). 
    Все три они находятся на одном острове Great Britain. 
    В United Kingdom входит Northern Ireland (столица Belfast), которая находится на острове Ireland и граничит со страной Ireland, 
    у которой столица Dublin, но которая не входит в UK. Ireland и Northen Ireland — два разных государственных объекта, 
    находящихся на одном острове, который называется Ireland.";
});
