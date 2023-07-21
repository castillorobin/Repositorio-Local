@extends('layouts.app')

@section('content')
<h1 class="text-center">Agregar un Nuevo Trabajo</h1>
<div class="container">

    <form method="POST" action="{{ route('trabajos.store') }}" role="form" enctype="multipart/form-data">
        @csrf

        <br>
        <div class="col-6 p-0">
            <label for="ano" class="form-label">Tipo</label>
            <br>
            <select name="tipo" class="form-select form-select-lg" aria-label="Default select example">
                <option selected>Pasantia</option>
                <option value="Investigacion">Investigacion</option>
                <option value="Tesis">Tesis</option>
            </select>
        </div>
        <br>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" placeholder="">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" placeholder="">
        </div>

        <div class="col-3 p-0">
            <label for="año" class="form-label">Año</label>
            <input type="number" name="año" class="form-control" placeholder="">
        </div>
        <br>
        <div class="col-6 p-0">
            <label for="facultad" class="form-label">Facultad</label>
            <br>
            <select name="facultad" class="form-select form-select-lg" aria-label="Default select example">
            <option selected>Facultad de Ingeniería y Arquitectura</option>
            <option value="Facultad de Ciencias y Humanidades">Facultad de Ciencias y Humanidades</option>
            <option value="Facultad de Ciencias de la Salud">Facultad de Ciencias de la Salud</option>
            <option value="Facultad de Ciencias Empresariales">Facultad de Ciencias Empresariales</option>
            <option value="Escuela de Posgrados">Escuela de Posgrados</option>
            </select>
        </div>
        <br>

        <div class="col-6 p-0">
            <label for="carrera" class="form-label">Carrera</label>
            <br>
            <select name="carrera" class="form-select form-select-lg" aria-label="Default select example">
            <option selected>Licenciatura en Idioma Ingles</option>
            <option value="Licenciatura en periodismo y comunicación audiovisual">Licenciatura en periodismo y comunicación audiovisual</option>
            <option value="Licenciatura en enfermeria">Licenciatura en enfermeria</option>
            <option value="Tecnico en enfermeria">Tecnico en enfermeria</option>
            <option value="Licenciatura en ciencias de la educacion con especialidad en idioma inglés">Licenciatura en ciencias de la educacion con especialidad en idioma inglés</option>
            <option value="Doctorado en medicina">Doctorado en medicina</option>
            <option value="Licenciatura en ciencias de la educacion con especialidad en educacion basica">Licenciatura en ciencias de la educacion con especialidad en educacion basica</option>
            <option value="Profesorado en educacion basica para primero y segundo ciclo">Profesorado en educacion basica para primero y segundo ciclo</option>
            <option value="Profesorado en educación parvularia">Profesorado en educación parvularia</option>
            <option value="Licenciatura en ciencias religiosas">Licenciatura en ciencias religiosas</option>
            <option value="Licenciatura en ciencias de la educacion con especialidad en educacion parvularia">Licenciatura en ciencias de la educacion con especialidad en educacion parvularia</option>
            <option value="Licenciatura en educacion inicial y  parvularia">Licenciatura en educacion inicial y  parvularia</option>
            <option value="Licenciatura en ciencias de la educacion especialidad en matematica semipresencial">Licenciatura en ciencias de la educacion especialidad en matematica semipresencial</option>
            <option value="Licenciatura en ciencias de la educacion especialidad en direccion y administracion escolar - semipresencial">Licenciatura en ciencias de la educacion especialidad en direccion y administracion escolar - semipresencial</option>
            <option value="Licenciatura en ciencias de la educacion especialidad en educacion basica semipresencial">Licenciatura en ciencias de la educacion especialidad en educacion basica semipresencial</option>
            <option value="Licenciatura en idioma ingles (semipresencial)">Licenciatura en idioma ingles (semipresencial)</option>
            <option value="Profesorado en educacion  basica para primero y segundo ciclos">Profesorado en educacion  basica para primero y segundo ciclos</option>
            <option value="Profesorado y licenciatura en educacion inicial y parvularia">Profesorado y licenciatura en educacion inicial y parvularia</option>
            <option value="Licenciatura en idioma ingles">Licenciatura en idioma ingles</option>
            <option value="Licenciatura en diseño grafico publicitario">Licenciatura en diseño grafico publicitario</option>
            <option value="Ingenieria en tecnologia y procesamiento de alimentos">Ingenieria en tecnologia y procesamiento de alimentos</option>
            <option value="Licenciatura en ciencias juridicas">Licenciatura en ciencias juridicas</option>
            <option value="Licenciatura en sistemas informaticos administrativos">Licenciatura en sistemas informaticos administrativos</option>
            <option value="Ingenieria industrial">Ingenieria industrial</option>
            <option value="Arquitectura">Arquitectura</option>
            <option value="Ingenieria civil">Ingenieria civil</option>
            <option value="Ingenieria civil saneamiento ambiental">Ingenieria civil saneamiento ambiental</option>
            <option value="Ingenieria en sistemas informaticos">Ingenieria en sistemas informaticos</option>
            <option value="Ingenieria agronomica">Ingenieria agronomica</option>
            <option value="Ingenieria en telecomunicaciones y redes">Ingenieria en telecomunicaciones y redes</option>
            <option value="Ingenieria en desarrollo de software">Ingenieria en desarrollo de software</option>
            <option value="Curso ccna academia de redes cisco unicaes">Curso ccna academia de redes cisco unicaes</option>
            <option value="Curso ccna academia de redes cisco unicaes">Curso ccna academia de redes cisco unicaes</option>
            <option value="Licenciatura en administracion de empresas">Licenciatura en administracion de empresas</option>
            <option value="Licenciatura en mercadeo y negocios internacionales">Licenciatura en mercadeo y negocios internacionales</option>
            <option value="Licenciatura en gestion y desarrollo turistico">Licenciatura en gestion y desarrollo turistico</option>
            <option value="Licenciatura en contaduria publica">Licenciatura en contaduria publica</option>
            <option value="Postgrado en estrategias para la competitividad">Postgrado en estrategias para la competitividad</option>
            <option value="Maestria en direccion estrategica de empresas">Maestria en direccion estrategica de empresas</option>
            <option value="Maestria en asesoria educativa">Maestria en asesoria educativa</option>
            <option value="Maestria en atencion integral de la primera infancia">Maestria en atencion integral de la primera infancia</option>
            <option value="Maestria en gerencia y gestion ambiental">Maestria en gerencia y gestion ambiental</option>
            <option value="Maestria en gestion y desarrollo turistico">Maestria en gestion y desarrollo turistico</option>
            <option value="Curso de formacion pedagica para profesionales">Curso de formacion pedagica para profesionales</option>
            <option value="Licenciatura en administracion de empresas - semipresencial">Licenciatura en administracion de empresas - semipresencial</option>
            </select>
        </div>
        <br>
        <div class="col-4 p-0">
            <label for="archivo" class="form-label">Archivo</label>
            <input type="file" name="archivo" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-3 p-0">
            <div class="d-flex">
                <button type="submit" class="flex-grow-1 me-1 mr-2 form-control btn btn-primary">Guardar</button>
                <a href="{{ url('trabajos') }}" class="flex-grow-1 ms-1 ml-2 btn btn-secondary">Regresar</a>
            </div>
        </div>
    </form>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe automáticamente

        Swal.fire({
            title: "¡Registro Guardado Exitosamente!",
            text: "Presiona el botón para regresar al listado de trabajos.",
            icon: "success",
            confirmButtonText: "Regresar al listado",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ url('trabajos') }}"; // Redirecciona al listado de trabajos
            } else {
                form.submit(); // Envía el formulario si el usuario confirma la acción
            }
        });
    });
});
</script>
@endsection
