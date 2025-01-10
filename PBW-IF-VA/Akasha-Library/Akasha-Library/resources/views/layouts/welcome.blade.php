<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/img/logo.png') }}" rel="icon">
        <title>Akasha Library</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/template/css/ruang-admin.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

        <style>
            body {
                background-color: rgb(255, 255, 255);
                justify-content: center;
            }
            footer {
                background-color: rgb(255, 255, 255); /* Warna footer abu-abu terang */
                text-align: center;
                padding: 20px 0;
                margin-top: 20px;
                width: 100%;
            }
            .welcome-text {
                text-align: center;
                font-size: 120px; /* Memperbesar ukuran font */
                font-weight: 900; /* Membuat font sangat bold */
                margin-top: 40px;
                color: #333;
                text-transform: uppercase; /* Menambahkan efek uppercase */
                line-height: 1.2; /* Menjaga jarak antar baris */
            }
        </style>
    </head>
    <body>
        <div class="welcome-text">
            <p>Selamat Datang</p>
            <img src="{{ asset('/img/logo.png') }}" style="width: 150px; height: auto;">
        </div>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer>
            <p class="mb-0">&copy; 2025 Akasha Library. Semua Hak Dilindungi.</p>
        </footer>
    </body>
</html>
