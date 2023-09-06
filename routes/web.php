<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajosController;
use App\Http\Controllers\DiariosController;



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
    Route::get('/monografia', [TrabajosController::class, 'monografiaIndex'])->name('trabajos.monografiaIndex');

    // rutas de Diarios Oficiales.

    Route::get('/diarios', [DiariosController::class, 'index'])->name('diarios.index');

    Route::get('/diarios/create', [DiariosController::class, 'create'])->name('diarios.create');
    Route::post('/diarios', [DiariosController::class, 'store'])->name('diarios.store');
    Route::get('/diarios/{diario}/edit', [DiariosController::class, 'edit'])->name('diarios.edit');
    Route::put('/diarios/{diario}', [DiariosController::class, 'update'])->name('diarios.update');

    Route::view('/agregar', 'diarios.agregar');
    Route::get('/diarios/descargar/{id}', 'App\Http\Controllers\DiariosController@descargarArchivo')->name('diarios.descargar');



    // Rutas para mostrar la vista de informes y procesar los filtros
    Route::match(['get', 'post'], '/informes', [TrabajosController::class, 'mostrarInformes'])->name('informes');

    // Ruta para descargar el archivo Excel
    Route::get('/descargar-excel', 'App\Http\Controllers\TrabajosController@descargarExcel')->name('trabajos.descargarExcel');
    Route::get('/agregar', function () {
        return view('agregar');
    })->name('agregar');
    

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
