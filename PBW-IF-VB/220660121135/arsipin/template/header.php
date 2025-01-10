<?php
session_start();
// Mengatasi jika user menggunakan link tanpa login
if (empty($_SESSION['id_user']) || empty($_SESSION['username'])) {
    echo "<script>
            alert('Maaf, untuk mengakses halaman ini, silakan login terlebih dahulu');
            document.location='index.php';
          </script>";
}

// Ambil parameter halaman dari URL
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Arsip In | Tahungoding</title>
</head>
<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <a class="navbar-brand" href="?" style="font-weight: bold; display: flex; align-items: center;">
                <img src="assets/tahu.png" alt="Logo" style="width: 30px; height: 30px; margin-right: 10px;">
                ARSIP IN
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $halaman == '' ? 'active' : '' ?>" href="?">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $halaman == 'departemen' ? 'active' : '' ?>" href="?halaman=departemen">Data Departemen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $halaman == 'pengirim_surat' ? 'active' : '' ?>" href="?halaman=pengirim_surat">Data Pengirim Surat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $halaman == 'arsip_surat' ? 'active' : '' ?>" href="?halaman=arsip_surat">Data Arsip Surat</a>
                    </li>
                </ul>
            </div>
        </div>
        <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Awal Container -->
    <div class="container">
