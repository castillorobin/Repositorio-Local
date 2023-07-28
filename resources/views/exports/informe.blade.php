<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Informe</h1>

    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Año</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Facultad</th>
                <th>Carrera</th>
                <th>Archivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($informe as $trabajo)
            <tr>
                <td>{{ ucfirst($trabajo->tipo) }}</td>
                <td>{{ $trabajo->año }}</td>
                <td>{{ $trabajo->titulo }}</td>
                <td>{{ $trabajo->autor }}</td>
                <td>{{ $trabajo->facultad }}</td>
                <td>{{ $trabajo->carrera }}</td>
                <td>{{ $trabajo->archivo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
