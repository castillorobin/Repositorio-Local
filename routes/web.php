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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('trabajos', 'App\Http\Controllers\TrabajosController');
Route::get('/trabajos/descargar/{id}', 'App\Http\Controllers\TrabajosController@descargarArchivo')->name('trabajos.descargar');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');









