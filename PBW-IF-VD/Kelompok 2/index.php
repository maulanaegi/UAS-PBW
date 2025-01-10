<?php
include_once 'controllers/Controller.php';
$controller = new Controller();

// Menambah aspirasi
$controller->tambahAspirasi();

// Menambah like aspirasi
$controller->likeAspirasi();

// Menghapus aspirasi
$controller->hapusAspirasi();

// Mengecek apakah ada permintaan edit aspirasi
if (isset($_GET['edit'])) {
    $controller->editAspirasi(); // Menangani proses edit
} else {
    // Menampilkan semua aspirasi
    $result = $controller->getAspirasi(); // Ambil semua aspirasi
    include_once 'views/aspirasi.php'; // Tampilkan halaman daftar aspirasi
}
?>
