<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</head>
<body>

    <div class="container mt-5">
        <h1>Mis Vehículos</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matrícula</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->marca }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->matricula }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>
                            <form method="POST" action="{{ route('select_vehicle') }}">
                                @csrf
                                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                <button type="submit" class="btn btn-primary">Seleccionar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
