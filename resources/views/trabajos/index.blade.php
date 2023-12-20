@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Repositorio Local de Trabajos de Graduación</h1>
    <br>

    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            display: flex;
            flex-direction: column; /* Alinear elementos verticalmente */
            justify-content: space-between; /* Espacio entre elementos */
            margin-bottom: 20px;
        }

        .logo {
            width: 100%;
            height: auto;
            min-height: 150px;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 16px;
            flex-grow: 1; /* Permitir que el cuerpo de la tarjeta crezca */
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 8px;
            text-align: center; /* Centrar el título */
        }

        .text-center {
            text-align: center; /* Centrar el botón */
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        /* Estilos para los botones de las tarjetas */
        .card .btn {
            background-color: #F6C03D;
            color: #9D2720;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
            text-align: center;
        }

        .card .btn:hover {
            background-color: #9D2720;
            color: #F6C03D;
        }
    </style>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/pasante.jpg" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Pasantia</h5>
                    <a href="{{ route('trabajos.pasantiasIndex') }}" class="btn">Ir a listado pasantia</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/poyecto.png" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Proyectos</h5>
                    <a href="{{ route('trabajos.proyectoIndex') }}" class="btn">Ir a listado proyectos</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/mono.png" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Monografias</h5>
                    <a href="{{ route('trabajos.monografiaIndex') }}" class="btn">Ir a listado Monografias</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/in.jpg" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Investigacion</h5>
                    <a href="{{ route('trabajos.investigacionIndex') }}" class="btn">Ir a listado investigaciones</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/inve.jpg" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Tesis</h5>
                    <a href="{{ route('trabajos.tesisIndex') }}" class="btn">Ir a listado Tesis</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/news.jpg" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Diarios Oficiales</h5>
                    <a href="{{ route('diarios.index') }}" class="btn">Ir a listado de Diarios Oficiales</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/plan.jpg" alt="" class="logo">
                <div class="card-body">
                    <h5 class="card-title">Plan De Estudios</h5>
                    <a href="{{ route('planes.index') }}" class="btn">Ir a listado de Plan de estudios</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
