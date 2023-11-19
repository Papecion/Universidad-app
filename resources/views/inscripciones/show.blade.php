<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Inscripción</title>
    <!-- Agrega enlaces a Bootstrap CSS si no los has incluido aún -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Detalles de la Inscripción</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Información de la Inscripción</h2>
                <p><strong>ID:</strong> {{ $inscripcion->id }}</p>
                <p><strong>Estudiante:</strong> {{ $inscripcion->estudiante_nombre }} {{ $inscripcion->estudiante_apellido }}</p>
                <p><strong>Carrera:</strong> {{ $inscripcion->carrera_nombre }}</p>
                <p><strong>Fecha de Inscripción:</strong> {{ $inscripcion->fecha_inscripcion }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('inscripciones.index') }}" class="btn btn-primary">Volver a la lista de inscripciones</a>
        </div>
    </div>

    <!-- Agrega enlaces a Bootstrap JS y Popper.js si no los has incluido aún -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
