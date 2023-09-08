<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Diario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiariosController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        // Realizar la búsqueda en la base de datos según el término de búsqueda
        if ($searchTerm) {
            $diarios = Diario::where(function ($query) use ($searchTerm) {
                $query->where('nombre', 'like', '%' . $searchTerm . '%')
                    ->orWhere('numero_diario', 'like', '%' . $searchTerm . '%')
                    ->orWhere('descripcion', 'like', '%' . $searchTerm . '%')
                    ->orWhere('tomo', 'like', '%' . $searchTerm . '%') // Campo tomo agregado
                    ->orWhere('fecha', 'like', '%' . $searchTerm . '%') // Campo fecha agregado
                    ->orWhere('anio', 'like', '%' . $searchTerm . '%'); // Campo anio agregado
            })->get();  
        } else {
            // Si no se ha ingresado un término de búsqueda, obtener todos los diarios
            $diarios = Diario::paginate(10);
        }

        // Retornar una colección de resultados
        return view('diarios.diarios', compact('diarios'));
    }



    public function create()
    {
        return view('diarios.creatediarios');
    }
    

    public function store(Request $request)
    {
        $diarioData = $request->except('_token');
    
        // Agregar asignación del usuario autenticado
        $diarioData['usuario'] = Auth::user()->name;
    
        if ($request->hasFile('archivo')) {
            $diarioData['archivo'] = $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('archivos', $diarioData['archivo']);
        }
    
        Diario::create($diarioData);
    
        return redirect()->route('trabajos.index'); 
    }

    public function edit($id)
    {
        $diario = Diario::find($id);

        if (!$diario) {
            return redirect()->route('diarios.index')->with('error', 'El diario que intentas editar no existe.');
        }

        return view('diarios.editdiarios', compact('diario')); 
    }

    public function update(Request $request, $id)
    {
        $diario = Diario::find($id);
    
        if (!$diario) {
            return redirect()->route('diarios.index')->with('error', 'El diario que intentas editar no existe.');
        }
    
        $diarioData = $request->except('_token');
    
        if ($request->hasFile('archivo')) {
            // Eliminar el archivo original si existe en la carpeta "archivos"
            if ($diario->archivo && Storage::exists('archivos/' . $diario->archivo)) {
                Storage::delete('archivos/' . $diario->archivo);
            }
    
            // Almacenar el nuevo archivo con un nombre único en la carpeta "archivos"
            $diarioData['archivo'] = $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('archivos', $diarioData['archivo']);
        }
    
        $diario->update($diarioData);
    
        return redirect()->route('diarios.index')->with('success', 'Diario actualizado correctamente.');
    }
    

    public function descargarArchivo($id)
    {
        $diario = Diario::find($id);
    
        if (!$diario) {
            abort(404);
        }
    
        $nombreArchivo = $diario->archivo;
        $rutaArchivo = storage_path('app\archivos/' . $nombreArchivo);
    
        if (Storage::exists('archivos/' . $nombreArchivo)) {
            return response()->download($rutaArchivo, $nombreArchivo);
        } else {
            abort(404);
        }
    }
    
    
    
     
}
