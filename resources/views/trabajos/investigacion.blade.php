@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Repositorio Local de Trabajos de Graduación de Investigación</h1>
    <br>
    <div class="row justify-content-end">
        <div class="col-md-4">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="txtSearch" name="search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Título</th>
                            <th class="text-center">Título</th>
                            <th class="text-center">Autor</th>
                            <th class="text-center">Año</th>
                            <th class="text-center">Facultad</th>
                            <th class="text-center">Carrera</th>
                            <th class="text-center">Archivo</th>
                            <th class="text-center">Acciones</th>
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
                                    <a href="{{ route('trabajos.descargar', ['id' => $traba->id, 'timestamp' => time()]) }}" class="btn btn-success navbar-button">Descargar</a>
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('trabajos.edit', ['trabajo' => $traba->id]) }}" class="btn btn-primary navbar-button">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
    @if ($trabajo->onFirstPage())
        <span class="btn btn-primary navbar-button">« Previous</span>
    @else
        <a href="{{ $trabajo->previousPageUrl() }}" class="btn btn-primary navbar-button">« Previous</a>
    @endif
    <span class="mx-3">
        @php
            $start = max($trabajo->currentPage() - 5, 1);
            $end = min($start + 9, $trabajo->lastPage());

            if ($end - $start < 9) {
                $start = max($end - 9, 1);
            }
        @endphp

        @if ($start > 1)
            <a href="{{ $trabajo->url(1) }}" class="btn btn-secondary navbar-button">1</a>
            <span class="navbar-button">...</span>
        @endif

        @foreach ($trabajo->getUrlRange($start, $end) as $page => $url)
            <a href="{{ $url }}" class="btn {{ $page == $trabajo->currentPage() ? 'btn-primary navbar-button' : 'btn-secondary navbar-button' }}">{{ $page }}</a>
        @endforeach

        @if ($end < $trabajo->lastPage())
            <span class="navbar-button">...</span>
            <a href="{{ $trabajo->url($trabajo->lastPage()) }}" class="btn btn-secondary navbar-button">{{ $trabajo->lastPage() }}</a>
        @endif
    </span>

    @if ($trabajo->hasMorePages())
        <a href="{{ $trabajo->nextPageUrl() }}" class="btn btn-secondary navbar-button">Next »</a>
    @else
        <span class="btn btn-secondary navbar-button">Next »</span>
    @endif
</div>
</div>

<style>
    .bottom-left-buttons {
        position: fixed;
        bottom: 10px;
        right: 5px;
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

<div class="bottom-left-buttons">
    <a href="{{ route('trabajos.index') }}" class="custom-button">Listado</a>
    <button class="custom-button" onclick="window.scrollTo(0, 0)">InicioPag</button>
</div>
@endsection

