<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Exports\InformeExport;
use Illuminate\Support\Facades\Auth;
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
    
        // Agregar asignación del usuario autenticado
        $trabajo['usuario'] = Auth::user()->name;
    
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
            'Licenciatura en Administración de Empresas',
            'Licenciatura en Administración de Empresas (Semipresencial)',
            'Licenciatura en Sistemas Informáticos Administrativos',
            'Licenciatura en Contaduría Pública',
            'Licenciatura en Mercadeo y Negocios Internacionales',
            'Licenciatura en Gestión y Desarrollo Turístico',
            'Licenciatura en Gestión de Negocios Digitales',
            'Licenciatura en Relaciones Internacionales y Comercio Exterior',
            'Doctorado en Medicina',
            'Licenciatura en Enfermería',
            'Técnico en Enfermería',
            'Licenciatura en Nutrición y Dietética',
            'Ingeniería Química',
            'Ingeniería Mecánica',
            'Ingeniería en Desarrollo de Software',
            'Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)',
            'Ingeniería en Telecomunicaciones y Redes',
            'Arquitectura',
            'Ingeniería Civil',
            'Ingeniería en Sistemas Informáticos',
            'Ingeniería Agronómica',
            'Ingeniería Industrial',
            'Ingeniería Eléctrica',
            'Ingeniería en procesos textiles',
            'Técnico en textiles',
            'Licenciatura en Diseño Gráfico Publicitario',
            'Licenciatura en Ciencias Jurídicas',
            'Licenciatura en Periodismo y Comunicación Audiovisual',
            'Licenciatura en Idioma Inglés',
            'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica',
            'Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia',
            'Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés',
            'Licenciatura en Ciencias Religiosas',
            'Licenciatura en Idioma Inglés (Semi presencial)',
            'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)',
            'Licenciatura en Ciencias de la Educación Especialidad en Matemática',
            'Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)',
            'Maestría en Asesoría Educativa',
            'Maestría en Dirección Estratégica de Empresas',
            'Maestría en Gerencia y Gestión Ambiental',
            'Maestría en Investigación Educativa',
            'Maestría en Seguridad Informática',
            'Maestría en Atención Integral de la Primera Infancia',
            'Doctorado en Educación',
            'Técnico en Lácteos y Cárnicos',
            'Técnico en Gestión y Desarrollo Turístico'
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
    $facultad = $request->input('facultad', ''); // Agrega esto para las facultades
    $carrera = $request->input('carrera', ''); // Agrega esto para las carreras

    // Obtener todos los años disponibles sin aplicar filtros
    $allAnios = Trabajos::distinct()->pluck('año');

    if ($request->isMethod('post')) {
        // Procesar los filtros y obtener los resultados

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
            return $a - $b;
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
    $facultades = Trabajos::distinct()->pluck('facultad');
    $carreras = Trabajos::distinct()->pluck('carrera');
    return view('trabajos.informes', [
        'anios' => $allAnios,
        'facultades' => $facultades,
        'carreras' => $carreras,
        'tipo' => $tipo,
        'anio' => $anio,
        'selectedFacultad' => null,
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