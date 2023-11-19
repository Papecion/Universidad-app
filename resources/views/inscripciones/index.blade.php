<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Inscripciones</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Listado de Inscripciones</h1>
        <a href="{{ route('inscripciones.create') }}" class="btn btn-success">Agregar Inscripción</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Fecha de Inscripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscripciones as $inscripcion)
                    <tr>
                        <th scope="row">{{ $inscripcion->id }}</th>
                        <td>{{ $inscripcion->estudiante_nombre }}</td>
                        <td>{{ $inscripcion->carrera_nombre }}</td>
                        <td>{{ $inscripcion->fecha_inscripcion }}</td>
                        <td>
                            <a href="{{ route('inscripciones.show', $inscripcion->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('inscripciones.destroy', ['inscripcion' => $inscripcion->id]) }}"
                                method="POST" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
