@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Diario Oficial</h1>

        <form method="POST" action="{{ route('diarios.update', $diario->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
