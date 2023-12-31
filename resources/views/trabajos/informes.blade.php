@extends('layouts.app')

@section('content')
<style>
    /* Estilos generales */
    .container {
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    /* Estilos para el formulario y los filtros */
    form {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        color: #666;
        margin-bottom: 5px;
    }

    /* Cada filtro estará separado */
    .filter-group {
        margin-right: 20px;
    }

    select {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 200px;
        margin-bottom: 10px;
    }

    select option {
        padding: 8px;
    }

    /* Estilo para el botón de filtrar */
    .btn-filter {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px; /* Separación entre botones */
    }

    /* Estilo para el botón de limpiar filtros */
    .btn-clear-filters {
        background-color: #FF5733;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Estilos para la tabla de informes */
    h2 {
        margin-top: 30px;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #9D2720;
        color: white;
    }

    /* Estilos para el botón de exportar */
    .btn-export {
        display: inline-block;
        background-color: #337ab7;
        color: white;
        padding: 10px 20px;
        margin-top: 10px;
        text-decoration: none;
        border-radius: 5px;
    }

    /* Estilos para el mensaje de resultados no encontrados */
    .no-results-message {
        margin-top: 30px;
        color: #666;
    }

    .filter-group {
        margin-top: 10px; /* Ajusta según necesites */
    }

    .bottom-left-buttons {
        position: fixed;
        bottom: 10px;
        right: 5px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .custom-button {
        background-color: #9D2720;
        color: #F6C03D;
        border: none;
        padding: 8px 16px;
        margin: 5px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }

    .custom-button:hover {
        background-color: #F6C03D;
        color: #9D2720;
        transition: 0.3s;
    }
</style>

<div class="container">
    <h1>Informes</h1>

    <!-- Filtro por tipo, año, facultad y carrera -->
    <form action="{{ route('informes') }}" method="POST">
        @csrf
        <div class="filter-group">
            <label for="tipo">Filtrar por tipo:</label>
            <select name="tipo" id="tipo">
                <option value="">Todos</option>
                <option value="pasantia" @if($tipo === 'pasantia') selected @endif>Pasantía</option>
                <option value="investigacion" @if($tipo === 'investigacion') selected @endif>Investigación</option>
                <option value="tesis" @if($tipo === 'tesis') selected @endif>Tesis</option>
                <option value="proyecto" @if($tipo === 'proyecto') selected @endif>Proyecto</option>
                <option value="monografia" @if($tipo === 'monografia') selected @endif>monografia</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="anio">Filtrar por año:</label>
            <select name="anio" id="anio">
                <option value="">Todos</option>
                @foreach($anios as $a)
                <option value="{{ $a }}" @if($anio == $a) selected @endif>{{ $a }}</option>
                @endforeach
            </select>
        </div>


        <div class="filter-group">
            <label for="facultad">Filtrar por facultad:</label>
            <select name="facultad" id="facultad">
                <option value="">Todos</option>
                @foreach($facultades as $f)
                <option value="{{ $f }}" @if($selectedFacultad == $f) selected @endif>{{ $f }}</option>
                @endforeach
            </select>
        </div>

        <div class="filter-group">
            <label for="carrera">Filtrar por carrera:</label>
            <select name="carrera" id="carrera">
                <option value="">Todos</option>
                @foreach($carreras as $c)
                <option value="{{ $c }}" @if($selectedCarrera == $c) selected @endif>{{ $c }}</option>
                @endforeach
            </select>
        </div>

        <!-- Estilo para el botón de filtrar -->
        <button type="submit" class="btn-filter">Filtrar</button>
        <button type="button" class="btn-clear-filters" id="btn-clear-filters">Limpiar Filtros</button>

    </form>

    <!-- Mostrar el informe resultante -->
    @if(isset($informe) && count($informe) > 0)
    <a href="{{ route('trabajos.descargarExcel', ['tipo' => $tipo, 'anio' => $anio, 'facultad' => $selectedFacultad, 'carrera' => $selectedCarrera]) }}" class="btn-export">Exportar a Excel</a>
    <h2>Informe Resultante @if($tipo) por {{ ucfirst($tipo) }} @endif @if($anio) del año {{ $anio }} @endif @if($selectedFacultad) de la Facultad {{ $selectedFacultad }} @endif @if($selectedCarrera) de la Carrera {{ $selectedCarrera }} @endif</h2>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Año</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Facultad</th>
                <th>Carrera</th>
                <th>Archivo</th>
                <!-- Agrega más columnas según tus necesidades -->
            </tr>
        </thead>
        <tbody>
            @foreach($informe as $trabajo)
            <tr>
                <td>{{ ucfirst($trabajo->tipo) }}</td>
                <td>{{ $trabajo->año }}</td>
                <td>{{ $trabajo->titulo }}</td>
                <td>{{ $trabajo->autor }}</td>
                <td>{{ $trabajo->facultad }}</td>
                <td>{{ $trabajo->carrera }}</td>
                <td>{{ $trabajo->archivo }}</td>
                <!-- Agrega más celdas según tus necesidades -->
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($informe) && count($informe) == 0)
    <p class="no-results-message">No se encontraron resultados para los filtros seleccionados.</p>
    @endif
    
</div>
<div class="bottom-left-buttons">
    <a href="{{ route('trabajos.index') }}" class="custom-button">Listado</a>
    <button class="custom-button" onclick="window.scrollTo(0, 0)">InicioPag</button>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const clearFiltersButton = document.getElementById("btn-clear-filters");

        clearFiltersButton.addEventListener("click", function () {
            // Resetear los valores de los selectores de filtro a sus valores iniciales
            document.getElementById("tipo").value = "";
            document.getElementById("anio").value = "";
            document.getElementById("facultad").value = "";
            document.getElementById("carrera").value = "";
            
            // Redirigir a la ruta 'informes'
            window.location.href = "{{ route('informes') }}";
        });
    });
</script>

@endsection
