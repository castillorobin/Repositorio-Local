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
        color: #fff;
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

    .file-info {
        font-size: 14px;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <h1>Editar Trabajo</h1>
    <form method="POST" action="{{ route('trabajos.update', ['trabajo' => $trabajo->id]) }}" role="form" enctype="multipart/form-data">
        @method("PUT")
        @csrf

        <div class="form-group">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-select">
                <option value="Pasantia" {{ $trabajo->tipo === 'Pasantia' ? 'selected' : '' }}>Pasantia</option>
                <option value="Investigacion" {{ $trabajo->tipo === 'Investigacion' ? 'selected' : '' }}>Investigacion</option>
                <option value="Tesis" {{ $trabajo->tipo === 'Tesis' ? 'selected' : '' }}>Tesis</option>
                <option value="Proyecto" {{ $trabajo->tipo === 'Proyecto' ? 'selected' : '' }}>Proyecto</option>
                <option value="monografia" {{ $trabajo->tipo === 'Monografia' ? 'selected' : '' }}>Monografia</option>
                
            </select>
        </div>

        <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $trabajo->titulo }}" placeholder="">
        </div>

        <div class="form-group">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ $trabajo->autor }}" placeholder="">
        </div>

        <div class="d-flex">
            <div class="flex-grow-1 me-1">
                <label for="año" class="form-label">Año</label>
                <input type="number" name="año" class="form-control" value="{{ $trabajo->año }}" placeholder="">
            </div>
            <div class="flex-grow-1 ms-1">
                <label for="facultad" class="form-label">Facultad</label>
                <select name="facultad" class="form-select">
                    @foreach ($facultades as $facultad)
                    <option value="{{ $facultad }}" {{ $trabajo->facultad === $facultad ? 'selected' : '' }}>{{ $facultad }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="carrera" class="form-label">Carrera</label>
            <select name="carrera" class="form-select">
                @foreach ($carreras as $carrera)
                <option value="{{ $carrera }}" {{ $trabajo->carrera === $carrera ? 'selected' : '' }}>{{ $carrera }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="archivo" class="form-label">Archivo</label>
            @if ($trabajo->archivo)
            <p class="file-info">Archivo actual: {{ $trabajo->archivo }}</p>
            @else
            <p class="file-info">No hay archivo actual.</p>
            @endif
            <input type="file" name="archivo" class="form-control" placeholder="">
        </div>

        <div class="d-flex justify-content-center"> <!-- Agregamos "justify-content-center" para centrar el contenido -->
            <button type="submit" id="guardarBtn" class="me-1 form-btn text-center">Guardar</button>
            <a href="{{ url('trabajos') }}" class="ms-1 form-btn form-btn-secondary text-center">Regresar</a>
        </div>
    </form>
</div>


@endsection
