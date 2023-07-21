@extends('layouts.app')

@section('content')
<h1 class="text-center">Agregar un Nuevo Trabajo</h1>
<div class="container">

<form method="POST" action="{{ route('trabajos.store') }}" role="form" enctype="multipart/form-data">
@csrf

<br>
  <div class="col-6 p-0">
  <label for="ano" class="form-label">Tipo</label>
  <br>
<select name="tipo" class="form-select form-select-lg" aria-label="Default select example">
  <option selected>Pasantia</option>
  <option value="Investigacion">Investigacion</option>
  <option value="Tesis">Tesis</option>
</select>
  </div >
  <br>

<div class="mb-3">
<label for="titulo" class="form-label">Título</label>
  <input type="text" name="titulo" class="form-control"  placeholder="">
  </div>

  <div class="mb-3">
<label for="autor" class="form-label">Autor</label>
  <input type="text" name="autor" class="form-control"  placeholder="">
  </div >

  <div class="col-3 p-0">
<label for="año" class="form-label">Año</label>
  <input type="number" name="año" class="form-control"  placeholder="">
  </div>
<br>
  <div class="col-6 p-0">
  <label for="facultad" class="form-label">Facultad</label>
  <br>
<select name="facultad" class="form-select form-select-lg" aria-label="Default select example">
  <option selected>Facultad de Ingeniería y Arquitectura</option>
  <option value="Facultad de Ciencias y Humanidades">Facultad de Ciencias y Humanidades</option>
  <option value="Facultad de Ciencias de la Salud">Facultad de Ciencias de la Salud</option>
  <option value="Facultad de Ciencias Empresariales">Facultad de Ciencias Empresariales</option>
</select>
  </div >
  <br>
  
<div class="col-6 p-0">
<label for="carrera" class="form-label">Carrera</label>
<br>
<select name="carrera"  class="form-select form-select-lg" aria-label="Default select example">
  <option selected>Licenciatura en idioma ingles</option>
  <option value="Licenciatura en idioma ingles">Licenciatura en idioma ingles</option>
  <option value="Licenciatura en ciencias juridicas">Licenciatura en ciencias juridicas</option>
  <option value="Ingenieria industrial">Ingenieria industrial</option>
</select>
  </div >
<br>
<div class="col-4 p-0">
<label for="archivo" class="form-label">Archivo</label>
  <input type="file" name="archivo" class="form-control"  placeholder="">
  </div>
  <br>
  
  <div class="col-3 p-0">
    <div class="d-flex">
        <input type="submit" class="flex-grow-1 me-1 mr-2 form-control btn btn-primary" value="Guardar">
        <a href="{{ url('trabajos') }}" class="flex-grow-1 ms-1 ml-2 btn btn-secondary">Regresar</a>
    </div>
</div>
  </div>  
  </form>
  </div>
@endsection