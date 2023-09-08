@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Copia y pega el estilo CSS aquí desde el formulario de agregar */
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
            margin-bottom: 20px;
        }

        .form-control:focus {
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
    </style>

    <h1 class="text-center">Editar Diario Oficial</h1>

    <!-- Inicia el formulario -->
    <form method="POST" action="{{ route('diarios.update', $diario->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tus campos de formulario van aquí, sin cambios en su estructura -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $diario->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="numero_diario">Número de Diario:</label>
            <input type="text" class="form-control" id="numero_diario" name="numero_diario" value="{{ $diario->numero_diario }}" required>
        </div>

        <div class="form-group">
            <label for="tomo">Tomo:</label>
            <input type="text" class="form-control" id="tomo" name="tomo" value="{{ $diario->tomo }}" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $diario->fecha }}" required>
        </div>

        <div class="form-group">
            <label for="anio">Año:</label>
            <input type="text" class="form-control" id="anio" name="anio" value="{{ $diario->anio }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $diario->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="archivo" class="form-label">Archivo</label>
            @if ($diario->archivo)
            <p class="file-info">Archivo actual: {{ asset('storage/archivos_diarios/' . $diario->archivo) }}</p>

            @else
                <p class="file-info">No hay archivo actual.</p>
            @endif
            <input type="file" name="archivo" class="form-control">
        </div>

        <!-- Campo oculto para usuario -->
        <input type="hidden" name="usuario" value="{{ $diario->usuario }}">

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
