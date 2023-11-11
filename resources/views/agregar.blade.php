@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Repositorio Local de Trabajos de Graduación</h1>
    <br>

    <div class="row justify-content-center"> <!-- Agregamos 'justify-content-center' para centrar las columnas -->
        <div class="col-md-4"> <!-- Reducimos el ancho de las columnas a col-md-4 -->
            <div class="card">
                <div class="card-body">
                    <img src="imagenes/news.jpg" class="logo" alt="" width="100" style="margin: 0 auto;"> <!-- Reducimos el ancho de la imagen -->
                    <h5 class="card-title text-center">Agregar Diarios Oficiales</h5>
                    <div class="text-center">
                        <a href="{{ route('diarios.create') }}" class="btn">Agregar Diarios</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4"> <!-- Reducimos el ancho de las columnas a col-md-4 -->
            <div class="card">
                <div class="card-body">
                    <img src="imagenes/gra.jpg" class="logo" alt="" width="100" style="margin: 0 auto;"> <!-- Reducimos el ancho de la imagen -->
                    <h5 class="card-title text-center">Agregar Trabajos de Graduación</h5>
                    <div class="text-center">
                        <a href="{{ route('trabajos.create') }}" class="btn">Agregar Trabajos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"> <!-- Reducimos el ancho de las columnas a col-md-4 -->
            <div class="card">
                <div class="card-body">
                    <img src="imagenes/plan.jpg" class="logo" alt="" width="100" style="margin: 0 auto;"> <!-- Reducimos el ancho de la imagen -->
                    <h5 class="card-title text-center">Agregar Planes de trabajo</h5>
                    <div class="text-center">
                        <a href="{{ route('planes.create') }}" class="btn">Agregar plan de Trabajo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos para los paneles de agregar */
    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .logo {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .card-body {
        padding: 12px;
    }

    .card-title {
        font-size: 1rem; 
        font-weight: bold;
        margin-bottom: 10px; 
    }

    .text-center {
        text-align: center;
    }

    .card .btn {
    background-color: #F6C03D;
    color: #9D2720;
    border: none;
    padding: 10px 20px; /* Aumenta el padding para hacer el botón más grande */
    margin-top: 10px; 
    border-radius: 20px;
    text-decoration: none;
    font-size: 16px; /* Aumenta el tamaño del texto */
    font-weight: bold;
    transition: background-color 0.3s ease;
}

    .card .btn:hover {
        background-color: #9D2720;
        color: #F6C03D;
    }
</style>
@endsection
