@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Diarios Oficiales</h1>
    <br>
    <div class="row justify-content-end">
    <div class="col-md-4">
        <form class="d-flex" method="GET">
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
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Número de Diario</th>
                            <th class="text-center">Tomo</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Año</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Archivo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diarios as $diario)
                        <tr>
                            <td>{{ $diario->nombre }}</td>
                            <td>{{ $diario->numero_diario }}</td>
                            <td>{{ $diario->tomo }}</td>
                            <td>{{ $diario->fecha }}</td>
                            <td>{{ $diario->anio }}</td>
                            <td>{{ $diario->descripcion }}</td>
                            <td>
                                @if ($diario->archivo)
                                <a href="{{ route('diarios.descargar', ['id' => $diario->id]) }}" class="btn btn-success navbar-button">Descargar</a>

                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('diarios.edit', ['diario' => $diario->id]) }}"  class="btn btn-primary navbar-button">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
            @if ($diarios->onFirstPage())
                <span class="btn btn-primary navbar-button">« Previous</span>
            @else
                <a href="{{ $diarios->previousPageUrl() }}" class="btn btn-primary navbar-button">« Previous</a>
            @endif

            <span class="mx-3">
                @foreach ($diarios->getUrlRange(1, $diarios->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="btn {{ $page == $diarios->currentPage() ? 'btn-primary navbar-button' : 'btn-secondary navbar-button' }}">{{ $page }}</a>
                @endforeach
            </span>

            @if ($diarios->hasMorePages())
                <a href="{{ $diarios->nextPageUrl() }}" class="btn btn-primary navbar-button">Next »</a>
            @else
                <span class="btn btn-primary navbar-button">Next »</span>
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
</div>
@endsection
