<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Pengunjung Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css') <!-- Laravel Vite CSS -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('visitors.index') }}">Pengunjung Wisata</a>
        </div>
    </nav>

    <!-- Kontainer Konten -->
    <div class="container mt-4">
        <!-- Blade Content -->
        @yield('content')

        <!-- Vue App -->
        <div id="app"></div>
    </div>

    <!-- Laravel Vite JS -->
    @vite('resources/js/app.js')
</body>
</html>
