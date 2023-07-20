@extends('layouts.app')

@section('content')

<h1 class="text-center">Repositorio Local de Trabajos de Graduación</h1>
<p></p>
<br>
<div class="container">
<div class="row justify-content-end">
    <div class="col-4 ">
<form class="d-flex ">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      </div>
</div>   
<div class="row">

   
    <table class="table table-hover table-striped"> 
    <tr>`
        <th>Tipo</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Año</th>
        <th>Facultad</th>
        <th>Carrera</th>
        <th>Archivo</th>
    </tr>
    <tr>
        @foreach ($trabajo as $traba)
        <td>{{$traba->tipo}}</td>
        <td>{{$traba->titulo}}</td>
        <td>{{$traba->autor}}</td>
        <td>{{$traba->año}}</td>
        <td>{{$traba->facultad}}</td>
        <td>{{$traba->carrera}}</td>
        <td><button type="button" class="btn btn-success">Descargar</button></td>
    </tr>
    @endforeach
    </table>

    </div>
</div>
@endsection