<?php
// Start session
session_start();
include 'includes/db_connection.php';
include 'includes/navbar.php';
?>

<div class="container mt-5">
    <h1>Panduan Penggunaan</h1>

    <h3>Cara Melakukan Booking Lapangan</h3>
    <p>Ikuti langkah-langkah berikut untuk memesan lapangan futsal:</p>
    <ol>
        <li><strong>Login</strong> ke akun Anda. Jika belum memiliki akun, silakan <a href="register.php">daftar terlebih dahulu</a>.</li>
        <li><strong>Telusuri Lapangan</strong>: Pada halaman utama, pilih lapangan yang Anda inginkan berdasarkan lokasi, harga, atau jenis lapangan.</li>
        <li><strong>Pilih Jam dan Tanggal</strong>: Pilih waktu yang tersedia untuk lapangan yang Anda pilih.</li>
        <li><strong>Isi Detail Pemesanan</strong>: Lengkapi detail pemesanan dengan nama, nomor telepon, dan informasi lainnya yang diperlukan.</li>
        <li><strong>Konfirmasi Pembayaran</strong>: Selesaikan pembayaran untuk menyelesaikan booking.</li>
    </ol>

    <h3>Bagaimana Cara Menjadi Operator?</h3>
    <p>Jika Anda ingin menjadi operator lapangan futsal, Anda dapat mendaftar sebagai operator melalui halaman <a href="register.php">daftar</a> dan memilih role "Operator". Setelah terdaftar, Anda dapat mengelola lapangan Anda dan menerima pemesanan.</p>
</div>

<?php include 'includes/footer.php'; ?>
