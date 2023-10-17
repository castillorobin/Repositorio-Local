@extends('layouts.app')

@section('content')


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #007BFF;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .form-select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: #f8f8f8;
    }

    .form-control:focus,
    .form-select:focus {
        outline: none;
        border-color: #007BFF;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-btn {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        color: #fff;
        background-color: #007BFF;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-btn:hover {
        background-color: #0056b3;
    }

    .form-btn-secondary {
        background-color: #6c757d;
    }

    .form-btn-secondary:hover {
        background-color: #4b545c;
    }

    .d-flex {
        display: flex;
    }

    .flex-grow-1 {
        flex-grow: 1;
    }

    .me-1 {
        margin-right: 5px;
    }

    .mr-2 {
        margin-right: 10px;
    }

    .ms-1 {
        margin-left: 5px;
    }

    .ml-2 {
        margin-left: 10px;
    }
</style>

<h1 class="text-center">Agregar un Nuevo Trabajo</h1>
<div class="container">
    <form method="POST" action="{{ route('trabajos.store') }}" role="form" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-select">
                <option selected>Pasantia</option>
                <option value="Investigacion">Investigacion</option>
                <option value="Tesis">Tesis</option>
                <option value="proyecto">Proyecto</option>
                <option value="Monografia">Monografia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" placeholder="">
        </div>

        <div class="form-group">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" placeholder="">
        </div>

        <div class="d-flex">
            <div class="flex-grow-1 me-1">
                <label for="año" class="form-label">Año</label>
                <input type="number" name="año" class="form-control" placeholder="">
            </div>
            <div class="flex-grow-1 ms-1">
                <label for="facultad" class="form-label">Facultad</label>
                <select name="facultad" class="form-select">
                <option selected>Facultad de Ingeniería y Arquitectura</option>
                <option value="Facultad de Ciencias y Humanidades">Facultad de Ciencias y Humanidades</option>
                <option value="Facultad de Ciencias de la Salud">Facultad de Ciencias de la Salud</option>
                <option value="Facultad de Ciencias Empresariales">Facultad de Ciencias Empresariales</option>
                <option value="Escuela de Posgrados">Escuela de Posgrados</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="carrera" class="form-label">Carrera</label>
            <select name="carrera" class="form-select">
            
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
             <option value="Licenciatura en Ciencias de la Educación con Especialidad Direccion y Administracion Escolar">Licenciatura en Ciencias de la Educación con Especialidad en s</option>
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
            <label for="archivo" class="form-label">Archivo</label>
            <input type="file" name="archivo" class="form-control" placeholder="">
        </div>

        <!-- Agregar campo para capturar el nombre del usuario autenticado -->
        <div class="form-group">     
            <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" id="guardarBtn" class="me-1 form-btn text-center">Guardar</button>
            <a href="{{ url('trabajos') }}" class="ms-1 form-btn form-btn-secondary text-center">Regresar</a>
        </div>
    </form>
</div>

@endsection