@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informes</h1>

    <!-- Filtro por tipo, año, facultad y carrera -->
    <form action="{{ route('informes') }}" method="POST">
        @csrf
        <label for="tipo">Filtrar por tipo:</label>
        <select name="tipo" id="tipo">
            <option value="">Todos</option>
            <option value="pasantia" @if($tipo === 'pasantia') selected @endif>Pasantía</option>
            <option value="investigacion" @if($tipo === 'investigacion') selected @endif>Investigación</option>
            <option value="tesis" @if($tipo === 'tesis') selected @endif>Tesis</option>
        </select>

        <label for="anio">Filtrar por año:</label>
        <select name="anio" id="anio">
            <option value="">Todos</option>
            @foreach($anios as $a)
                <option value="{{ $a }}" @if($anio == $a) selected @endif>{{ $a }}</option>
            @endforeach
        </select>

        <label for="facultad">Filtrar por facultad:</label>
        <select name="facultad" id="facultad">
            <option value="">Todos</option>
            @foreach($facultades as $f)
                <option value="{{ $f }}" @if($selectedFacultad == $f) selected @endif>{{ $f }}</option>
            @endforeach
        </select>

        <label for="carrera">Filtrar por carrera:</label>
        <select name="carrera" id="carrera">
            <option value="">Todos</option>
            @foreach($carreras as $c)
                <option value="{{ $c }}" @if($selectedCarrera == $c) selected @endif>{{ $c }}</option>
            @endforeach
        </select>

        <button type="submit">Filtrar</button>
    </form>

    <!-- Mostrar el informe resultante -->
    @if(isset($informe) && count($informe) > 0)
        <a href="{{ route('trabajos.descargarExcel', ['tipo' => $tipo, 'anio' => $anio, 'facultad' => $selectedFacultad, 'carrera' => $selectedCarrera]) }}" class="btn btn-success">Exportar a Excel</a>
        <h2 style="margin-top: 30px;">Informe Resultante @if($tipo) por {{ ucfirst($tipo) }} @endif @if($anio) del año {{ $anio }} @endif @if($selectedFacultad) de la Facultad {{ $selectedFacultad }} @endif @if($selectedCarrera) de la Carrera {{ $selectedCarrera }} @endif</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #9D2720; color: white;">
                    <th style="padding: 10px;">Tipo</th>
                    <th style="padding: 10px;">Año</th>
                    <th style="padding: 10px;">Titulo</th>
                    <th style="padding: 10px;">Autor</th>
                    <th style="padding: 10px;">Facultad</th>
                    <th style="padding: 10px;">Carrera</th>
                    <th style="padding: 10px;">Documento</th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach($informe as $trabajo)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ ucfirst($trabajo->tipo) }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $trabajo->año }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $trabajo->titulo }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $trabajo->autor }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $trabajo->facultad }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $trabajo->carrera }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $trabajo->documento }}</td>
                        <!-- Agrega más celdas según tus necesidades -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($informe) && count($informe) == 0)
        <p style="margin-top: 30px;">No se encontraron resultados para los filtros seleccionados.</p>
    @endif
</div>
@endsection
