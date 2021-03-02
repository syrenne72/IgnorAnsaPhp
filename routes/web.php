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

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

/**
 * Controller per le news
 * Posizionare prima i nomi e poi le uri con le {variabili}
 */
Route::get('/n/create', [App\Http\Controllers\NewsController::class, 'create']);
Route::post('/n', [App\Http\Controllers\NewsController::class, 'store']);
Route::get('/n/{news}', [App\Http\Controllers\NewsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
