<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrabajosController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Grupo de rutas protegidas con middleware de autenticación
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('trabajos', 'App\Http\Controllers\TrabajosController');
    Route::get('/trabajos/descargar/{id}', 'App\Http\Controllers\TrabajosController@descargarArchivo')->name('trabajos.descargar');
    Route::get('/pasantias', [TrabajosController::class, 'pasantiasIndex'])->name('trabajos.pasantiasIndex');
    Route::get('/investigacion', [TrabajosController::class, 'investigacionIndex'])->name('trabajos.investigacionIndex');
    Route::get('/tesis', [TrabajosController::class, 'tesisIndex'])->name('trabajos.tesisIndex');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});











