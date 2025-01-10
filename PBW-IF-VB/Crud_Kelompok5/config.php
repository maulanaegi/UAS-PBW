<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0); // Anda bisa set ke error_reporting(-1) di mode development untuk debugging.

$host    = 'localhost'; // Host server
$user    = 'root';      // Username database
$pass    = '';          // Password database (kosong untuk XAMPP default)
$dbname  = 'db_toko';   // Nama database Anda

try {
    // Inisialisasi koneksi database menggunakan PDO
    $config = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Atur atribut error mode untuk menangani kesalahan dengan lebih baik
    $config->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atur fetch mode default menjadi associative array
    $config->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Anda bisa menambahkan logika atau informasi sukses koneksi jika diperlukan
    // echo 'Koneksi berhasil'; (jangan tampilkan di produksi)
} catch (PDOException $e) {
    // Tangkap error dan tampilkan pesan user-friendly
    die('Terjadi kesalahan saat menghubungkan ke database. Silakan coba lagi nanti.');
}

// Lokasi direktori fungsi view
$view = 'fungsi/view/view.php';
?>