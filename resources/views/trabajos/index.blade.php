@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Repositorio Local de Trabajos de Graduación</h1>
    <br>

    <style>
  .row {
    display: flex;
    flex-wrap: nowrap; /* Evita que se rompa en varias líneas */
    justify-content: center; 
    
}

    .col-md-3 {
        flex: 0 0 20%;
        max-width: 20%;
        margin-bottom: 20px;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column; /* Alinear elementos verticalmente */
        justify-content: space-between; /* Espacio entre elementos */
    }

    .logo {
        width: 100%;
        height: auto;
        min-height: 150px;
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
            margin-top: 10px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .card .btn:hover {
            background-color: #9D2720;
            color: #F6C03D;
        }

        /* Centrar los elementos dentro de col-md-3 */
        .centered-content {
            display: flex;
            justify-content: space-around;
        }

        .centered-elements {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/pasante.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Pasantia</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.pasantiasIndex') }}" class="btn">Ir a listado pasantia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/poyecto.png" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Proyectos</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.proyectoIndex') }}" class="btn">Ir a listado proyectos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/mono.png" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Monografias</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.monografiaIndex') }}" class="btn">Ir a listado Monografias</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/in.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Investigacion</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.investigacionIndex') }}" class="btn">Ir a listado investigaciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/inve.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Tesis</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.tesisIndex') }}" class="btn">Ir a listado 
                                <br>
                                Tesis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="imagenes/news.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Diarios Oficiales</h5>
                        <div class="text-center">
                            <a href="{{ route('diarios.index') }}" class="btn">Ir a listado de Diarios Oficiales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
