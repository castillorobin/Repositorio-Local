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
    Route::get('/proyecto', [TrabajosController::class, 'proyectoIndex'])->name('trabajos.proyectoIndex');


    // Rutas para mostrar la vista de informes y procesar los filtros
    Route::match(['get', 'post'], '/informes', [TrabajosController::class, 'mostrarInformes'])->name('informes');

    // Ruta para descargar el archivo Excel
    Route::get('/descargar-excel', 'App\Http\Controllers\TrabajosController@descargarExcel')->name('trabajos.descargarExcel');


    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
