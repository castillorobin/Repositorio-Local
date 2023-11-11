@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Planes de Estudio</h1>
        <br>
        <div class="row justify-content-end">
            <div class="col-md-4">
                <form action="{{ route('planes.index') }}" class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="txtSearch" name="search">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </form>
            </div>
        </div>
        <br>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>Modalidad</th>
                    <th>Periodo</th>
                    <th>Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planes as $plan)
                    <tr>
                        <td>{{ $plan->tipo }}</td>
                        <td>{{ $plan->facultad }}</td>
                        <td>{{ $plan->carrera }}</td>
                        <td>{{ $plan->modalidad }}</td>
                        <td>{{ $plan->periodo }}</td>
                        <td>
                            @if ($plan->archivo)
                                <a href="{{ route('planes.descargar', ['id' => $plan->id]) }}" class="btn btn-primary navbar-button">
                                    <i class="fas fa-download"></i> Descargar
                                </a>
                            @else
                                <span class="text-muted">No disponible</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-primary navbar-button">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <!-- Puedes agregar un enlace de eliminación si es necesario -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            @if ($planes->onFirstPage())
                <span class="btn btn-primary navbar-button" aria-disabled="true">« Anterior</span>
            @else
                <a href="{{ $planes->previousPageUrl() }}" class="btn btn-primary navbar-button">« Anterior</a>
            @endif

            <span class="mx-3">
                @foreach ($planes->getUrlRange(1, $planes->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="btn {{ $page == $planes->currentPage() ? 'btn btn-primary navbar-button' : 'btn btn-primary navbar-button' }}">{{ $page }}</a>
                @endforeach
            </span>

            @if ($planes->hasMorePages())
                <a href="{{ $planes->nextPageUrl() }}" class="btn btn-primary navbar-button">Siguiente »</a>
            @else
                <span class="btn btn-primary navbar-button" aria-disabled="true">Siguiente »</span>
            @endif
        </div>

    </div>
@endsection
