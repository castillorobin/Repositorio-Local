@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0 text-center">Crear Nuevo Plan de Estudio</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('planes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <input type="text" name="tipo" value="Plan de Estudio" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="facultad">Facultad</label>
                                <select name="facultad" class="form-control">
                                    <option value="  <option value="Facultad de Ingeniería y Arquitectura">Facultad de Ingeniería y Arquitectura</option>
                                    <option value="Facultad de Ciencias y Humanidades">Facultad de Ciencias y Humanidades</option>
                                    <option value="Facultad de Ciencias de la Salud">Facultad de Ciencias de la Salud</option>
                                    <option value="Facultad de Ciencias Empresariales">Facultad de Ciencias Empresariales</option>
                                    <option value="Escuela de Posgrados">Escuela de Posgrados</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <select name="carrera" class="form-control">
                                <option value="Licenciatura en Administración de Empresas">Licenciatura en Administración de Empresas</option>
                                <option value="Licenciatura en Administración de Empresas (Semipresencial)">Licenciatura en Administración de Empresas (Semipresencial)</option>
                                <option value="Licenciatura en Sistemas Informáticos Administrativos">Licenciatura en Sistemas Informáticos Administrativos</option>
                                <option value="Licenciatura en Contaduría Pública">Licenciatura en Contaduría Pública</option>
                                <option value="Licenciatura en Mercadeo y Negocios Internacionales">Licenciatura en Mercadeo y Negocios Internacionales</option>
                                <option value="Licenciatura en Gestión y Desarrollo Turístico">Licenciatura en Gestión y Desarrollo Turístico</option>
                                <option value="Licenciatura en Gestión de Negocios Digitales">Licenciatura en Gestión de Negocios Digitales</option>
                                <option value="Licenciatura en Relaciones Internacionales y Comercio Exterior">Licenciatura en Relaciones Internacionales y Comercio Exterior</option>
                                <option value="Doctorado en Medicina">Doctorado en Medicina</option>
                                <option value="Licenciatura en Enfermería">Licenciatura en Enfermería</option>
                                <option value="Técnico en Enfermería">Técnico en Enfermería</option>
                                <option value="Licenciatura en Nutrición y Dietética">Licenciatura en Nutrición y Dietética</option>
                                <option value="Ingeniería Química">Ingeniería Química</option>
                                <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                                <option value="Ingeniería en Desarrollo de Software">Ingeniería en Desarrollo de Software</option>
                                <option value="Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)">Ingeniería en Tecnología y Procesamiento de Alimentos (Semipresencial)</option>
                                <option value="Ingeniería en Telecomunicaciones y Redes">Ingeniería en Telecomunicaciones y Redes</option>
                                <option value="Arquitectura">Arquitectura</option>
                                <option value="Ingeniería Civil">Ingeniería Civil</option>
                                <option value="Ingeniería en Sistemas Informáticos">Ingeniería en Sistemas Informáticos</option>
                                <option value="Ingeniería Agronómica">Ingeniería Agronómica</option>
                                <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
                                <option value="Ingeniería en procesos textiles">Ingeniería en procesos textiles</option>
                                <option value="Técnico en textiles">Técnico en textiles</option>
                                <option value="Licenciatura en Diseño Gráfico Publicitario">Licenciatura en Diseño Gráfico Publicitario</option>
                                <option value="Licenciatura en Ciencias Jurídicas">Licenciatura en Ciencias Jurídicas</option>
                                <option value="Licenciatura en Periodismo y Comunicación Audiovisual">Licenciatura en Periodismo y Comunicación Audiovisual</option>
                                <option value="Licenciatura en Idioma Inglés">Licenciatura en Idioma Inglés</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica">Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en educacion parvularia">Licenciatura en Ciencias de la Educación con Especialidad en Educación Parvularia</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés">Licenciatura en Ciencias de la Educación con Especialidad en Idioma Inglés</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad Direccion y Administracion Escolar">Licenciatura en Ciencias de la Educación con Especialidad en Direccion y Administracion Escolar</option>
                                <option value="Licenciatura en Ciencias Religiosas">Licenciatura en Ciencias Religiosas</option>
                                <option value="Licenciatura en Idioma Inglés (Semi presencial)">Licenciatura en Idioma Inglés (Semi presencial)</option>
                                <option value="Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)">Licenciatura en Ciencias de la Educación con Especialidad en Educación Básica (Semi presencial)</option>
                                <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática">Licenciatura en Ciencias de la Educación Especialidad en Matemática</option>
                                <option value="Licenciatura en Ciencias de la Educación Especialidad en Matemática">Licenciatura en Ciencias de la Educación Especialidad en Matemática (Semipresencial)</option>
                                <option value="Maestría en Asesoría Educativa">Maestría en Asesoría Educativa</option>
                                <option value="Maestría en Dirección Estratégica de Empresas">Maestría en Dirección Estratégica de Empresas</option>
                                <option value="Maestría en Gerencia y Gestión Ambiental">Maestría en Gerencia y Gestión Ambiental</option>
                                <option value="Maestría en Investigación Educativa">Maestría en Investigación Educativa</option>
                                <option value="Maestría en Seguridad Informática">Maestría en Seguridad Informática</option>
                                <option value="Maestría en Atención Integral de la Primera Infancia">Maestría en Atención Integral de la Primera Infancia</option>
                                <option value="Doctorado en Educación">Doctorado en Educación</option>
                                <option value="Técnico en Lácteos y Cárnicos">Técnico en Lácteos y Cárnicos</option>
                                <option value="Técnico en Gestión y Desarrollo Turístico">Técnico en Gestión y Desarrollo Turístico</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="modalidad">Modalidad</label>
                                <select name="modalidad" class="form-control">
                                    <option value="Presencial">Presencial</option>
                                    <option value="Semi-Presencial">Semi-Presencial</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="periodo">Periodo</label>
                                <input type="text" name="periodo" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="archivo">Archivo</label>
                                <input type="file" name="archivo" id="archivo" class="form-control">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
