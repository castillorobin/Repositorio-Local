@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Repositorio Local de Trabajos de Graduación</h1>
    <br>

    <style>
        .row {
            display: flex;
            justify-content: space-around;
        }

        .col-md-4 {
            flex: 0 0 30%;
            max-width: 30%;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 16px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 8px;
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

        /* Centrar los elementos dentro de col-md-4 */
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
        <div class="col-md-4">
            <div class="card">
                <img src="imagenes/pasante.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Listado De Pasantia</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.pasantiasIndex') }}" class="btn">Ir a listado de pasantia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="imagenes/in.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Listado De Investigacion</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.investigacionIndex') }}" class="btn">Ir a listado de investigaciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 centered-content">
            <div class="card">
                <img src="imagenes/inve.jpg" alt="" class="logo">
                <div class="card-body">
                    <div class="centered-elements">
                        <h5 class="card-title">Listado De Tesis</h5>
                        <div class="text-center">
                            <a href="{{ route('trabajos.tesisIndex') }}" class="btn">Ir a listado de tesis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
