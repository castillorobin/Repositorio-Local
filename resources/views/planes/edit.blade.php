@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0 text-center">Editar Plan de Estudio</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('planes.update', $plan->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <input type="text" name="tipo" value="{{ $plan->tipo }}" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="facultad">Facultad</label>
                                <select name="facultad" class="form-control">
                                    <option value="Facultad de Ingeniería y Arquitectura" {{ $plan->facultad == 'Facultad de Ingeniería y Arquitectura' ? 'selected' : '' }}>Facultad de Ingeniería y Arquitectura</option>
                                    <option value="Facultad de Ciencias y Humanidades" {{ $plan->facultad == 'Facultad de Ciencias y Humanidades' ? 'selected' : '' }}>Facultad de Ciencias y Humanidades</option>
                                    <option value="Facultad de Ciencias de la Salud" {{ $plan->facultad == 'Facultad de Ciencias de la Salud' ? 'selected' : '' }}>Facultad de Ciencias de la Salud</option>
                                    <option value="Facultad de Ciencias Empresariales" {{ $plan->facultad == 'Facultad de Ciencias Empresariales' ? 'selected' : '' }}>Facultad de Ciencias Empresariales</option>
                                    <option value="Escuela de Posgrados" {{ $plan->facultad == 'Escuela de Posgrados' ? 'selected' : '' }}>Escuela de Posgrados</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <select name="carrera" class="form-control">
                                <option value="Licenciatura en Administración de Empresas" {{ $plan->carrera == 'Licenciatura en Administración de Empresas' ? 'selected' : '' }}>Licenciatura en Administración de Empresas</option>
                                <option value="Licenciatura en Gestión de Negocios Digitales" {{ $plan->carrera == 'Licenciatura en Gestión de Negocios Digitales' ? 'selected' : '' }}>Licenciatura en Gestión de Negocios Digitales</option>
                                <option value="Licenciatura en Administración de Empresas" {{ $plan->carrera == 'Licenciatura en Administración de Empresas' ? 'selected' : '' }}>Licenciatura en Administración de Empresas</option>
                                <option value="Licenciatura en Administración de Empresas (Semipresencial)" {{ $plan->carrera == 'Licenciatura en Administración de Empresas (Semipresencial)' ? 'selected' : '' }}>Licenciatura en Administración de Empresas (Semipresencial)</option>
                                <option value="Licenciatura en Sistemas Informáticos Administrativos" {{ $plan->carrera == 'Licenciatura en Sistemas Informáticos Administrativos' ? 'selected' : '' }}>Licenciatura en Sistemas Informáticos Administrativos</option>
                                <option value="Licenciatura en Contaduría Pública" {{ $plan->carrera == 'Licenciatura en Contaduría Pública' ? 'selected' : '' }}>Licenciatura en Contaduría Pública</option>
                                <option value="Licenciatura en Mercadeo y Negocios Internacionales" {{ $plan->carrera == 'Licenciatura en Mercadeo y Negocios Internacionales' ? 'selected' : '' }}>Licenciatura en Mercadeo y Negocios Internacionales</option>
                                <option value="Licenciatura en Gestión y Desarrollo Turístico" {{ $plan->carrera == 'Licenciatura en Gestión y Desarrollo Turístico' ? 'selected' : '' }}>Licenciatura en Gestión y Desarrollo Turístico</option>
                                <option value="Licenciatura en Gestión de Negocios Digitales" {{ $plan->carrera == 'Licenciatura en Gestión de Negocios Digitales' ? 'selected' : '' }}>Licenciatura en Gestión de Negocios Digitales</option>
                                <option value="Licenciatura en Relaciones Internacionales y Comercio Exterior" {{ $plan->carrera == 'Licenciatura en Relaciones Internacionales y Comercio Exterior' ? 'selected' : '' }}>Licenciatura en Relaciones Internacionales y Comercio Exterior</option>
                                <option value="Doctorado en Medicina" {{ $plan->carrera == 'Doctorado en Medicina' ? 'selected' : '' }}>Doctorado en Medicina</option>
                                <option value="Licenciatura en Enfermería" {{ $plan->carrera == 'Licenciatura en Enfermería' ? 'selected' : '' }}>Licenciatura en Enfermería</option>
                                <option value="Técnico en Enfermería" {{ $plan->carrera == 'Técnico en Enfermería' ? 'selected' : '' }}>Técnico en Enfermería</option>
                                <option value="Licenciatura en Nutrición y Dietética" {{ $plan->carrera == 'Licenciatura en Nutrición y Dietética' ? 'selected' : '' }}>Licenciatura en Nutrición y Dietética</option>
                                <option value="Ingeniería Química" {{ $plan->carrera == 'Ingeniería Química' ? 'selected' : '' }}>Ingeniería Química</option>
                                <option value="Ingeniería Mecánica" {{ $plan->carrera == 'Ingeniería Mecánica' ? 'selected' : '' }}>Ingeniería Mecánica</option>
                                <option value="Ingeniería en Desarrollo de Software" {{ $plan->carrera == 'Ingeniería en Desarrollo de Software' ? 'selected' : '' }}>Ingeniería en Desarrollo de Software</option>
                                <option value="Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)" {{ $plan->carrera == 'Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)' ? 'selected' : '' }}>Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)</option>
                                <option value="Ingeniería en Telecomunicaciones y Redes" {{ $plan->carrera == 'Ingeniería en Telecomunicaciones y Redes' ? 'selected' : '' }}>Ingeniería en Telecomunicaciones y Redes</option>
                                <option value="Arquitectura" {{ $plan->carrera == 'Arquitectura' ? 'selected' : '' }}>Arquitectura</option>
                                <option value="Ingeniería Civil" {{ $plan->carrera == 'Ingeniería Civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                                <option value="Ingeniería en Sistemas Informáticos" {{ $plan->carrera == 'Ingeniería en Sistemas Informáticos' ? 'selected' : '' }}>Ingeniería en Sistemas Informáticos</option>
                                <option value="Ingeniería Agronómica" {{ $plan->carrera == 'Ingeniería Agronómica' ? 'selected' : '' }}>Ingeniería Agronómica</option>
                                <option value="Ingeniería Industrial" {{ $plan->carrera == 'Ingeniería Industrial' ? 'selected' : '' }}>Ingeniería Industrial</option>
                                <option value="Ingeniería Eléctrica" {{ $plan->carrera == 'Ingeniería Eléctrica' ? 'selected' : '' }}>Ingeniería Eléctrica</option>
                                <option value="Ingeniería en procesos textiles" {{ $plan->carrera == 'Ingeniería en procesos textiles' ? 'selected' : '' }}>Ingeniería en procesos textiles</option>
                                <option value="Técnico en textiles" {{ $plan->carrera == 'Técnico en textiles' ? 'selected' : '' }}>Técnico en textiles</option>
                                <option value="Licenciatura en Diseño Gráfico Publicitario" {{ $plan->carrera == 'Licenciatura en Diseño Gráfico Publicitario' ? 'selected' : '' }}>Licenciatura en Diseño Gráfico Publicitario</option>
                                <option value="Licenciatura en Ciencias Jurídicas" {{ $plan->carrera == 'Licenciatura en Ciencias Jurídicas' ? 'selected' : '' }}>Licenciatura en Ciencias Jurídicas</option>
                                <option value="Licenciatura en Periodismo y Comunicación Audiovisual" {{ $plan->carrera == 'Licenciatura en Periodismo y Comunicación Audiovisual' ? 'selected' : '' }}>Licenciatura en Periodismo y Comunicación Audiovisual</option>
                                <option value="Licenciatura en Idioma Inglés" {{ $plan->carrera == 'Licenciatura en Idioma Inglés' ? 'selected' : '' }}>Licenciatura en Idioma Inglés</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educacion parvularia" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad Direccion y Administracion Escolar" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Direccion y Administracion Escolar' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Direccion y Administracion Escolar</option>
                                <option value="Licenciatura en Ciencias Religiosas" {{ $plan->carrera == 'Licenciatura en Ciencias Religiosas' ? 'selected' : '' }}>Licenciatura en Ciencias Religiosas</option>
                                <option value="Licenciatura en Idioma Inglés (Semi presencial)" {{ $plan->carrera == 'Licenciatura en Idioma Inglés (Semi presencial)' ? 'selected' : '' }}>Licenciatura en Idioma Inglés (Semi presencial)</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)</option>
                                <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación Especialidad en Matemática' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación Especialidad en Matemática</option>
                                <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)" {{ $plan->carrera == 'Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)' ? 'selected' : '' }}>Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)</option>
                                <option value="Maestría en Asesoría Educativa" {{ $plan->carrera == 'Maestría en Asesoría Educativa' ? 'selected' : '' }}>Maestría en Asesoría Educativa</option>
                                <option value="Maestría en Dirección Estratégica de Empresas" {{ $plan->carrera == 'Maestría en Dirección Estratégica de Empresas' ? 'selected' : '' }}>Maestría en Dirección Estratégica de Empresas</option>
                                <option value="Maestría en Gerencia y Gestión Ambiental" {{ $plan->carrera == 'Maestría en Gerencia y Gestión Ambiental' ? 'selected' : '' }}>Maestría en Gerencia y Gestión Ambiental</option>
                                <option value="Maestría en Investigación Educativa" {{ $plan->carrera == 'Maestría en Investigación Educativa' ? 'selected' : '' }}>Maestría en Investigación Educativa</option>
                                <option value="Maestría en Seguridad Informática" {{ $plan->carrera == 'Maestría en Seguridad Informática' ? 'selected' : '' }}>Maestría en Seguridad Informática</option>
                                <option value="Maestría en Atención Integral de la Primera Infancia" {{ $plan->carrera == 'Maestría en Atención Integral de la Primera Infancia' ? 'selected' : '' }}>Maestría en Atención Integral de la Primera Infancia</option>
                                <option value="Doctorado en Educación" {{ $plan->carrera == 'Doctorado en Educación' ? 'selected' : '' }}>Doctorado en Educación</option>
                                <option value="Técnico en Lácteos y Cárnicos" {{ $plan->carrera == 'Técnico en Lácteos y Cárnicos' ? 'selected' : '' }}>Técnico en Lácteos y Cárnicos</option>
                                <option value="Técnico en Gestión y Desarrollo Turístico" {{ $plan->carrera == 'Técnico en Gestión y Desarrollo Turístico' ? 'selected' : '' }}>Técnico en Gestión y Desarrollo Turístico</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="modalidad">Modalidad</label>
                                <select name="modalidad" class="form-control">
                                    <option value="Presencial" {{ $plan->modalidad == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                    <option value="Semi-Presencial" {{ $plan->modalidad == 'Semi-Presencial' ? 'selected' : '' }}>Semi-Presencial</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="periodo">Periodo</label>
                                <input type="text" name="periodo" value="{{ $plan->periodo }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="archivo">Archivo</label>

                                @if ($plan->archivo)
                                    <p class="file-info">Archivo actual: {{ asset('storage/archivos_planes/' . $plan->archivo) }}</p>
                                @else
                                    <p class="file-info">No hay archivo actual.</p>
                                @endif

                                <input type="file" name="archivo" class="form-control">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
