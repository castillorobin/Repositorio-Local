@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Agregar Diario Oficial</h1>

        <form method="POST" action="{{ route('diarios.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="numero_diario">Número de Diario:</label>
                <input type="text" class="form-control" id="numero_diario" name="numero_diario" required>
            </div>
            <div class="form-group">
                <label for="tomo">Tomo:</label>
                <input type="text" class="form-control" id="tomo" name="tomo" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="anio">Año:</label>
                <input type="text" class="form-control" id="anio" name="anio" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="archivo">Archivo:</label>
                <input type="file" class="form-control-file" id="archivo" name="archivo">
            </div>
            
            <!-- Agregar campo oculto para capturar el nombre del usuario autenticado -->
            <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
            
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
@endsection
