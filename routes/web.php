<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TestController;
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

Route::group(['prefix' => app()->getLocale()], function () {
});

Route::get('language/{locale}/change',  [LocalizationController::class, 'index'])->name('language.switch');
Route::get('images/{name}/{ext}', [ImageController::class, 'index'])->name('imagepath');
Route::resources([
    'tests' => TestController::class,
]);
