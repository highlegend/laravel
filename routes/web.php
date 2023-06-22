<?php

use App\Http\Controllers\EtudientController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
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




Auth::routes();
Route::get('/', function () {
    return Redirect::to('login');
});
Route::get('logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

// Routes for logged-in users
Route::group(['middleware' => ['auth']], function () {

    Route::get('lang/{locale}', [HomeController::class, 'change'])->name('changeLang');

    Route::resource('etudients', EtudientController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('villes', VilleController::class);
    Route::get('get/{file_name}', [DocumentController::class, 'downloadFile'])->name('downloadFile');

});
