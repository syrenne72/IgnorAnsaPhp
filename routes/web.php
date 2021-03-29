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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('journal.home');

Auth::routes();

Route::get('/journal/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('journal.home');
Route::get('/journal/salute', ['uses' => '\App\Http\Controllers\HomeController@salute']);
Route::get('/journal/{news}', [\App\Http\Controllers\HomeController::class, 'show']);

/**
 * Controller per le news
 * Posizionare prima i nomi e poi le uri con le {variabili}
 */
Route::get('/n/create', [App\Http\Controllers\NewsController::class, 'create']);
Route::post('/n', [App\Http\Controllers\NewsController::class, 'store']);
Route::get('/n/{news}/edit', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
Route::patch('/n/{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
Route::get('/n/{news}', [App\Http\Controllers\NewsController::class, 'show']);
Route::delete('/n/{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');

/**
 * Controller per i profili amministratore
 * Posizionare prima i nomi e poi le uri con le {variabili}
 */
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
