<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscripción</title>
    <!-- Agrega enlaces a Bootstrap CSS si no los has incluido aún -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Editar Inscripción</h1>

        <form method="POST" action="{{ route('inscripciones.update', ['inscripcion' => $inscripcion->id]) }}">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $inscripcion->id }}" readonly>
            </div>

            <!-- Otros campos del formulario -->
            <div class="mb-3">
                <label for="fecha_inscripcion" class="form-label">Fecha de Inscripción</label>
                <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion"
                    value="{{ $inscripcion->fecha_inscripcion }}">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('inscripciones.index', ['inscripcion' => $inscripcion->id]) }}"
                    class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Agrega enlaces a Bootstrap JS y Popper.js si no los has incluido aún -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
