<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pemesanan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light position-relative" style="background-color: #ffffff; border-bottom: 1px solid rgba(0, 0, 0, 0.1); color: #000000; z-index: 1030;">
        <div class="container-fluid ">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('dashboard') }}">
                <img src="{{ asset('logo/ticket.png') }}" class="navbar-logo" alt="Logo">
            </a>

            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- ms-auto untuk menggeser ke kanan -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <!-- Ikon User -->
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 2rem; color: #000;"></i>
                        </a>
                        <!-- Dropdown -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profil</a></li>
                            <li>
                                <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        .navbar-logo {
            width: 150px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
        }
        .navbar {
            max-height: 80px; /* Adjust as needed */
        }
        .dropdown-menu {
            z-index: 1050; /* Ensure dropdown is above other elements */
        }
    </style>

    @include('komponen.pesan')
    @yield('konten')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
