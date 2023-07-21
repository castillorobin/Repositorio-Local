@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Repositorio Local de Trabajos de Graduación</h1>
    <br>
    <div class="row justify-content-end">
        <div class="col-md-4">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Facultad</th>
                        <th>Carrera</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabajo as $traba)
                    <tr>
                        <td>{{$traba->tipo}}</td>
                        <td>{{$traba->titulo}}</td>
                        <td>{{$traba->autor}}</td>
                        <td>{{$traba->año}}</td>
                        <td>{{$traba->facultad}}</td>
                        <td>{{$traba->carrera}}</td>
                        <td>
                            @if ($traba->archivo)
                                <a href="{{ route('trabajos.descargar', ['id' => $traba->id]) }}" class="btn btn-success">Descargar</a>
                            @else
                                No disponible
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('trabajos.edit', ['trabajo' => $traba->id]) }}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
