<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CARRERAS</title>
</head>

<body>
    <div class="container">
        <h1>Listado de carreras</h1>
        <a href="{{ route('carreras.create') }}" class="btn btn-success">Añadir carrera</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Duración (años)</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $carrera)
                    <tr>
                        <th scope="row">{{ $carrera->id }}</th>
                        <td>{{ $carrera->nombre }}</td>
                        <td>{{ $carrera->descripcion }}</td>
                        <td>{{ $carrera->duracion_anios }}</td>
                        <td>
                            <!-- Botón para Editar -->
                            <a href="{{ route('carreras.edit', $carrera->id) }}" class="btn btn-primary">Editar</a>

                            <!-- Botón para Eliminar (puedes mostrar un modal de confirmación) -->
                            <form action="{{ route('carreras.destroy', ['carrera' => $carrera->id]) }}"
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
