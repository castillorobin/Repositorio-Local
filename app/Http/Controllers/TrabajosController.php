<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Exports\InformeExport;

use Maatwebsite\Excel\Facades\Excel;



class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    return view('trabajos.index');
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
        'Licenciatura en administracion de empresas - semipresencial',
        'Maestría en Seguridad Informática',
        'Licenciatura en Ciencias de la Educación Especialidad en Matemática (Ingreso solo por equivalencias)',
        'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)',
        'Maestría en Asesoría Educativa'
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
    
        
    public function search(Request $request, $tipo) {
    $searchTerm = $request->input('search');
    
    // Realizar la búsqueda en la base de datos según el término de búsqueda y el tipo de trabajo
    if ($searchTerm) {
        $trabajo = Trabajos::where(function ($query) use ($searchTerm) {
            $query->where('titulo', 'like', '%' . $searchTerm . '%')
                  ->orWhere('autor', 'like', '%' . $searchTerm . '%')
                  ->orWhere('facultad', 'like', '%' . $searchTerm . '%')
                  ->orWhere('carrera', 'like', '%' . $searchTerm . '%');
        })
        ->where('tipo', $tipo) // Agregar esta condición para filtrar por tipo de trabajo
        ->get();
    } else {
        // Si no se ha ingresado un término de búsqueda, obtener todos los trabajos del tipo especificado
        $trabajo = Trabajos::where('tipo', $tipo)->get();
    }

    // Retornar una colección de resultados
    return $trabajo;
}

    public function pasantiasIndex(Request $request)
    {
        // Llamar a la función de búsqueda con el tipo 'pasantia'
        $tipo = 'pasantia';
        $trabajo = $this->search($request, $tipo);
    
        // Renderizar la vista de pasantias con los resultados y el tipo
        return view('trabajos.pasantias', compact('trabajo', 'tipo'));
    }
    
    public function investigacionIndex(Request $request)
    {
        // Llamar a la función de búsqueda con el tipo 'investigacion'
        $tipo = 'investigacion';
        $trabajo = $this->search($request, $tipo);
    
        // Renderizar la vista de investigacion con los resultados y el tipo
        return view('trabajos.investigacion', compact('trabajo', 'tipo'));
    }
    
    public function tesisIndex(Request $request)
    {
        // Llamar a la función de búsqueda con el tipo 'tesis'
        $tipo = 'tesis';
        $trabajo = $this->search($request, $tipo);
    
        // Renderizar la vista de tesis con los resultados y el tipo
        return view('trabajos.tesis', compact('trabajo', 'tipo'));
    }

    public function proyectoIndex(Request $request)
    {
       
        $tipo = 'proyecto';
        $trabajo = $this->search($request, $tipo);
    

        return view('trabajos.proyecto', compact('trabajo', 'tipo'));
    }
    
    public function monografiaIndex(Request $request)
    {

        $tipo = 'monografia';
        $trabajo = $this->search($request, $tipo);
    
        return view('trabajos.monografia', compact('trabajo', 'tipo'));
    }

    public function mostrarInformes(Request $request)
    {
        // Definir un valor predeterminado para $tipo y $anio
        $tipo = $request->input('tipo', '');
        $anio = $request->input('anio', '');

        if ($request->isMethod('post')) {
            // Procesar los filtros y obtener los resultados
            $facultad = $request->input('facultad');
            $carrera = $request->input('carrera');

            // Aquí debemos utilizar Eloquent para construir la consulta
            // y aplicar los filtros según los valores seleccionados

            $query = Trabajos::query();

            if ($tipo) {
                $query->where('tipo', $tipo);
            }

            if ($anio) {
                $query->where('año', $anio);
            }

            if ($facultad) {
                $query->where('facultad', $facultad);
            }

            if ($carrera) {
                $query->where('carrera', $carrera);
            }

            // Obtener los resultados filtrados
            $informe = $query->get();

            // Obtener los años, facultades y carreras disponibles de los resultados filtrados sin duplicados
            $anios = $informe->pluck('año')->unique()->sort(function ($a, $b) {
                return $a - $b; // Esto ordenará los años de forma ascendente
            });
            
            $facultades = $informe->pluck('facultad')->unique();
            $carreras = $informe->pluck('carrera')->unique();

            // Retornar la vista de informes con los resultados y los años, facultades y carreras disponibles
            return view('trabajos.informes', [
                'informe' => $informe,
                'anios' => $anios,
                'facultades' => $facultades,
                'carreras' => $carreras,
                'tipo' => $tipo,
                'anio' => $anio,
                'selectedFacultad' => $facultad,
                'selectedCarrera' => $carrera
            ]);
        }

        // Si la solicitud no es POST, simplemente mostrar el formulario
        $anios = Trabajos::distinct()->pluck('año');
        $facultades = Trabajos::distinct()->pluck('facultad');
        $carreras = Trabajos::distinct()->pluck('carrera');
        return view('trabajos.informes', [
            'anios' => $anios,
            'facultades' => $facultades,
            'carreras' => $carreras,
            'tipo' => $tipo,
            'anio' => $anio,
            'selectedFacultad' => null, // Si no hay filtro por facultad, puedes establecerla como null o un valor predeterminado
            'selectedCarrera' => null
        ]);
    }

   public function descargarExcel(Request $request)
{
    // Obtener los filtros seleccionados del formulario
    $tipo = $request->input('tipo', '');
    $anio = $request->input('anio', '');
    $facultad = $request->input('facultad', '');
    $carrera = $request->input('carrera', '');

    // Aquí debes aplicar la misma lógica de filtrado que utilizaste para mostrar los resultados
    $informe = $this->mostrarInformes($request);

    // Luego, puedes exportar los datos a Excel usando la clase InformeExport
    return Excel::download(new InformeExport($tipo, $anio, $facultad, $carrera), 'informe.xlsx');
}
    
    
    
    
    
    
}