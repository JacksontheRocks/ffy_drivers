<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Login</title>
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
    <div class="container d-flex justify-content-center">
        <div class="custom-container text-center">
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
        </div>
    </div>
</body>
</html>

