<?php

namespace App\Http\Controllers;

use App\Models\Trabajos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajo = Trabajos::all();
        return view('trabajos.index', compact('trabajo') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $trabajo = $request->except('_token');
    if ($request->hasFile('archivo')) {
        $trabajo['archivo'] = $request->file('archivo')->getClientOriginalName();
        $request->file('archivo')->storeAs('archivosPDF', $trabajo['archivo']);
    }
    Trabajos::insert($trabajo);
    return redirect()->route('trabajos.index');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajos $trabajos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $trabajo = Trabajos::find($id);
    $facultades = ['Facultad de Ingeniería y Arquitectura', 'Facultad de Ciencias y Humanidades', 'Facultad de Ciencias de la Salud', 'Facultad de Ciencias Empresariales', 'Escuela de Posgrados'];
    $carreras = [
        'Licenciatura en Idioma Ingles',
        'Licenciatura en periodismo y comunicación audiovisual',
        'Licenciatura en enfermeria',
        'Tecnico en enfermeria',
        'Licenciatura en ciencias de la educacion con especialidad en idioma inglés',
        'Doctorado en medicina',
        'Licenciatura en ciencias de la educacion con especialidad en educacion basica',
        'Profesorado en educacion basica para primero y segundo ciclo',
        'Profesorado en educación parvularia',
        'Licenciatura en ciencias religiosas',
        'Licenciatura en ciencias de la educacion con especialidad en educacion parvularia',
        'Licenciatura en educacion inicial y parvularia',
        'Licenciatura en ciencias de la educacion especialidad en matematica semipresencial',
        'Licenciatura en ciencias de la educacion especialidad en direccion y administracion escolar - semipresencial',
        'Licenciatura en ciencias de la educacion especialidad en educacion basica semipresencial',
        'Licenciatura en idioma ingles (semipresencial)',
        'Profesorado en educacion basica para primero y segundo ciclos',
        'Profesorado y licenciatura en educacion inicial y parvularia',
        'Licenciatura en idioma ingles',
        'Licenciatura en diseño grafico publicitario',
        'Ingenieria en tecnologia y procesamiento de alimentos',
        'Licenciatura en ciencias juridicas',
        'Licenciatura en sistemas informaticos administrativos',
        'Ingenieria industrial',
        'Arquitectura',
        'Ingenieria civil',
        'Ingenieria civil saneamiento ambiental',
        'Ingenieria en sistemas informaticos',
        'Ingenieria agronomica',
        'Ingenieria en telecomunicaciones y redes',
        'Ingenieria en desarrollo de software',
        'Curso ccna academia de redes cisco unicaes',
        'Licenciatura en administracion de empresas',
        'Licenciatura en mercadeo y negocios internacionales',
        'Licenciatura en gestion y desarrollo turistico',
        'Licenciatura en contaduria publica',
        'Postgrado en estrategias para la competitividad',
        'Maestria en direccion estrategica de empresas',
        'Maestria en asesoria educativa',
        'Maestria en atencion integral de la primera infancia',
        'Maestria en gerencia y gestion ambiental',
        'Maestria en gestion y desarrollo turistico',
        'Curso de formacion pedagica para profesionales',
        'Licenciatura en administracion de empresas - semipresencial'
    ];

    return view('trabajos.editar', compact('trabajo', 'facultades', 'carreras'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trabajo = Trabajos::find($id);
    
        if (!$trabajo) {
            abort(404); // Manejar el caso cuando no se encuentra el trabajo
        }
    
        $trabajoData = $request->except('_token');
    
        if ($request->hasFile('archivo')) {
            // Eliminar el archivo original si existe
            if ($trabajo->archivo && Storage::exists('archivosPDF/' . $trabajo->archivo)) {
                Storage::delete('archivosPDF/' . $trabajo->archivo);
            }
    
            // Almacenar el nuevo archivo con un nombre único
            $trabajoData['archivo'] = $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('archivosPDF', $trabajoData['archivo']);
        }
    
        $trabajo->update($trabajoData);
    
        // Redirigir a la página de trabajos después de la actualización
        return redirect()->route('trabajos.index');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajos $trabajos)
    {
        //
    }

    public function descargarArchivo($id)
    {
        $trabajo = Trabajos::find($id);
    
        if (!$trabajo) {
            abort(404);
        }
    
        $nombreArchivo = $trabajo->archivo;
        $rutaArchivo = storage_path('app/archivosPDF/' . $nombreArchivo);
    
        if (Storage::exists('archivosPDF/' . $nombreArchivo)) {
            return response()->download($rutaArchivo, $nombreArchivo);
        } else {
            abort(404);
        }
    }
    


}
