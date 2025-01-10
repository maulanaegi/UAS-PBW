<?php
// Memulai sesi
session_start();

// Menghapus semua data dalam sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Mengalihkan pengguna ke halaman login
header('Location: ../index.php');  // Sesuaikan path sesuai struktur direktori
exit;
?>
