@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Inicio') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="background: #e0e9eb;">
                        <h1 style="text-align: center; margin-bottom: 30px;">Puntos a tomar en cuenta al subir un trabajo de graduación</h1>
                        <div style="background: #bccfcf; padding: 10px;">
                            <h3>Nombre del archivo:</h3>
                            <p>El archivo debe tener obligatoriamente el nombre estandarizado: Tipo de trabajo + apellidos del primer autor + 5 primeras palabras del tema del trabajo + año (ejemplo: Pasantía-CastilloSaavedra-ManualdeSistemasOperativospara-2020.pdf)</p>
                        </div>
                        <br>
                        <div style="background: #bccfcf; padding: 10px; margin-top: 20px;">
                            <h3>Favor revisar la estructura del trabajo de graduación con el siguiente listado y luego enviar (Si está completo)</h3>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-4">
                                    <h4>Investigaciones</h4>
                                    <ul>
                                        <li>Portada</li>
                                        <li>Autoridades académicas de la Universidad</li>
                                        <li>Índice</li>
                                        <li>Introducción</li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <h4>Pasantías</h4>
                                    <ul>
                                        <li>Portada</li>
                                        <li>Autoridades académicas de la Universidad</li>
                                        <li>Índice</li>
                                        <li>Introducción</li>
                                        <li>Antecedentes de la empresa o institución</li>
                                        <li>Descripción de actividades desarrolladas</li>
                                        <li>Conclusiones</li>
                                        <li>Anexos (Incluir carta de aprobación)</li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <h4>Proyectos</h4>
                                    <ul>
                                        <li>Portada</li>
                                        <li>Autoridades académicas de la Universidad</li>
                                        <li>Índice</li>
                                        <li>Descripción de contribución científica y técnica que el estudiante aportará por medio del proyecto</li>
                                        <li>Justificación</li>
                                        <li>Objetivos</li>
                                        <li>Descripción detallada de actividades</li>
                                        <li>Cronograma</li>
                                        <li>Recursos</li>
                                        <li>Bibliografía</li>
                                        <li>Anexos</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <h4>Nota: Al enviar el registro, acepta haber revisado la estructura del trabajo asegurándose de que está completa según el listado anterior y haber cambiado el nombre del archivo según el estándar que se indica.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
