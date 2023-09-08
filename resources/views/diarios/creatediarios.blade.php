@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Agregar Diario Oficial</h1>

    <form method="POST" action="{{ route('diarios.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="numero_diario" class="form-label">Número de Diario:</label>
            <input type="text" class="form-control" id="numero_diario" name="numero_diario" required>
        </div>

        <div class="form-group">
            <label for="tomo" class="form-label">Tomo:</label>
            <input type="text" class="form-control" id="tomo" name="tomo" required>
        </div>

        <div class="form-group">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>

        <div class="form-group">
            <label for="anio" class="form-label">Año:</label>
            <input type="text" class="form-control" id="anio" name="anio" required>
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="archivo" class="form-label">Archivo:</label>
            <input type="file" class="form-control-file" id="archivo" name="archivo">
        </div>

        <!-- Agregar campo oculto para capturar el nombre del usuario autenticado -->
        <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">

        <div class="d-flex justify-content-center">
            <button type="submit" id="guardarBtn" class="me-1 form-btn">Agregar</button>
        </div>
    </form>
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

</div>
@endsection
