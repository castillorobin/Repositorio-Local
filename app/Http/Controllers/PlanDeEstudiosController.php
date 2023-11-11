<?php

namespace App\Http\Controllers;
use App\Models\PlanDeEstudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PlanDeEstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // PlanDeEstudiosController.php

   public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        
        $planesQuery = PlanDeEstudio::query();
        
        if ($searchTerm) {
            $planesQuery->where('tipo', 'like', '%' . $searchTerm . '%')
                        ->orWhere('facultad', 'like', '%' . $searchTerm . '%')
                        ->orWhere('carrera', 'like', '%' . $searchTerm . '%')
                        ->orWhere('modalidad', 'like', '%' . $searchTerm . '%')
                        ->orWhere('periodo', 'like', '%' . $searchTerm . '%');
        }
        $planes = $planesQuery->paginate(25); 

        return view('planes.index', compact('planes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
     public function store(Request $request)
     {
         $planData = $request->except('_token');
     
         if ($request->hasFile('archivo')) {
             $planData['archivo'] = $request->file('archivo')->getClientOriginalName();
             $request->file('archivo')->storeAs('archivosplanes', $planData['archivo']);
         }
     
         PlanDeEstudio::create($planData);
     
         return redirect()->route('planes.index');
     }
     
     
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = PlanDeEstudio::findOrFail($id);
        return view('planes.edit', compact('plan'));
    }   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // PlanDeEstudiosController.php
   public function update(Request $request, $id)
{
    $request->validate([
        // Puedes agregar aquí las reglas de validación según tus necesidades
    ]);

    $plan = PlanDeEstudio::findOrFail($id);

    // Verificar si se proporciona un nuevo archivo
    if ($request->hasFile('archivo')) {
        // Eliminar el archivo original si existe
        if ($plan->archivo && Storage::exists('archivosplanes/' . $plan->archivo)) {
            Storage::delete('archivosplanes/' . $plan->archivo);
        }

        // Almacenar el nuevo archivo con un nombre único en la carpeta "archivosplanes"
        $nombreArchivo = $request->file('archivo')->getClientOriginalName();
        $request->file('archivo')->storeAs('archivosplanes', $nombreArchivo);

        // Actualizar el nombre del archivo en el modelo
        $plan->archivo = $nombreArchivo;
    }

    // Actualizar otros campos del modelo
    $plan->update($request->except('archivo'));

    return redirect()->route('planes.index')->with('success', 'Plan de estudio actualizado correctamente');
}

    public function descargarArchivo($id)
    {
        $plan = PlanDeEstudio::find($id);

        if (!$plan) {
            abort(404);
        }

        $nombreArchivo = $plan->archivo;
        $rutaArchivo = storage_path('app/archivosplanes/' . $nombreArchivo);

        if (Storage::exists('archivosplanes/' . $nombreArchivo)) {
            return response()->download($rutaArchivo, $nombreArchivo);
        } else {
            abort(404);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
