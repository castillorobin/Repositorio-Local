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
//Route::get('/trabajos', [App\Http\Controllers\TrabajosController::class, 'index'])->name('Trabajos');
//Route::get('/trabajos/editar', [App\Http\Controllers\TrabajosController::class, 'edit'])->name('Editar Trabajos');
//Route::get('/trabajos/nuevo', [App\Http\Controllers\TrabajosController::class, 'create'])->name('Agregar Trabajos');
//Route::post('/trabajos/guardar', [App\Http\Controllers\TrabajosController::class, 'store'])->name('Guardar');
Route::resource('trabajos', 'App\Http\Controllers\TrabajosController');
Route::get('/descargar/{id}', 'App\Http\Controllers\TrabajosController@descargarArchivo')->name('trabajos.descargar');




