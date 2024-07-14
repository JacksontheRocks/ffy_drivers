<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <style>
        .custom-container {
            max-width: 400px;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="custom-container text-center">
            @if (Auth::check())
                <h1 class="mb-5">Rincón del conductor</h1>
                <div class="alert alert-success" role="alert">
                    Bienvenido a Furgofy, {{ Auth::user()->name }}!
                </div>
                <p>Ya estás logueado, escoge un vehículo y podrás empezar a recibir pedidos</p>

                <h2 class="mt-5">Selecciona un vehículo</h2>
                <form method="POST" action="{{ route('select_vehicle') }}">
                    @csrf
                    <div class="form-group">
                       
                        <select id="vehicle" name="vehicle" class="form-control" required>
                            <option value="" disabled selected>Elige tu vehículo</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->marca }} {{ $vehicle->model }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Seleccionar</button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="mt-5">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @else
                <h1 class="mb-5">Driver Login</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nif_cif">NIF</label>
                        <input id="nif_cif" name="nif_cif" type="text" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
            @endif
        </div>
    </div>
</body>
</html>
