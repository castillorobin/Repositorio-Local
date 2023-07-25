<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Rutas protegidas con middleware de autenticación
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('trabajos', 'App\Http\Controllers\TrabajosController');
    Route::get('/trabajos/descargar/{id}', 'App\Http\Controllers\TrabajosController@descargarArchivo')->name('trabajos.descargar');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});

// Si deseas proteger la ruta de descarga, también agrega el middleware de autenticación a esa ruta específica
Route::get('trabajos/descargar/{id}', 'TrabajosController@descargarArchivo')->middleware('auth')->name('trabajos.descargar');










