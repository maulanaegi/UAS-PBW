<?php
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu!');
        document.location='index.php';
    </script>";
    exit;
}

$username = $_SESSION['username'];
?>

<!-- Tambahkan link Google Fonts di bagian <head> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Modifikasi jumbotron -->
<div class="jumbotron mt-3 shadow" style="background-color: rgb(255, 255, 255); font-family: 'Poppins', sans-serif;">
<h1 class="display-4" style="font-weight: bold;">Selamat Datang, <?= htmlspecialchars($username) ?>!</h1>
  <p class="lead">Arsip In adalah program yang akan memudahkan Anda dalam mengarsip surat menyurat</p>
  <hr class="my-4">
  <p>Anda dapat menggunakan menu-menu yang ada di atas, terima kasih.</p>
</div>
