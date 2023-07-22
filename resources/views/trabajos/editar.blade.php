@extends('layouts.app')

@section('content')
<h1 class="text-center">Editar Trabajo</h1>
<div class="container">

    <form method="POST" action="{{ route('trabajos.update', ['trabajo' => $trabajo->id]) }}" role="form" enctype="multipart/form-data">
        @method("PUT")
        @csrf

        <br>
        <div class="col-6 p-0">
            <label for="ano" class="form-label">Tipo</label>
            <br>
            <select name="tipo" class="form-select form-select-lg" aria-label="Default select example">
                <option value="Pasantia" {{ $trabajo->tipo === 'Pasantia' ? 'selected' : '' }}>Pasantia</option>
                <option value="Investigacion" {{ $trabajo->tipo === 'Investigacion' ? 'selected' : '' }}>Investigacion</option>
                <option value="Tesis" {{ $trabajo->tipo === 'Tesis' ? 'selected' : '' }}>Tesis</option>
            </select>
        </div>
        <br>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $trabajo->titulo }}" placeholder="">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ $trabajo->autor }}" placeholder="">
        </div>

        <div class="col-3 p-0">
            <label for="año" class="form-label">Año</label>
            <input type="number" name="año" class="form-control" value="{{ $trabajo->año }}" placeholder="">
        </div>
        <br>

        <div class="col-6 p-0">
    <label for="facultad" class="form-label">Facultad</label>
    <br>
    <select name="facultad" class="form-select form-select-lg" aria-label="Default select example">
        @foreach ($facultades as $facultad)
            <option value="{{ $facultad }}" {{ $trabajo->facultad === $facultad ? 'selected' : '' }}>{{ $facultad }}</option>
        @endforeach
    </select>
</div>
<br>

<div class="col-6 p-0">
    <label for="carrera" class="form-label">Carrera</label>
    <br>
    <select name="carrera" class="form-select form-select-lg" aria-label="Default select example">
        @foreach ($carreras as $carrera)
            <option value="{{ $carrera }}" {{ $trabajo->carrera === $carrera ? 'selected' : '' }}>{{ $carrera }}</option>
        @endforeach
    </select>
</div>
<br>

        <br>

        <div class="col-4 p-0">
            <label for="archivo" class="form-label">Archivo</label>
            @if ($trabajo->archivo)
                <p>Archivo actual: {{ $trabajo->archivo }}</p>
            @else
                <p>No hay archivo actual.</p>
            @endif
            <input type="file" name="archivo" class="form-control" placeholder="">
        </div>
        <br>
        
         
        <div class="col-3 p-0">
            <div class="d-flex">
            <button type="submit" id="guardarBtn" class="flex-grow-1 me-1 mr-2 form-control btn btn-primary">Guardar</button>
            <a href="{{ url('trabajos') }}" class="flex-grow-1 ms-1 ml-2 btn btn-secondary">Regresar</a>
            </div>
        </div>

</div>
@endsection