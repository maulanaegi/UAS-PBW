<?php
// Tangkap parameter 'page' dari URL, default ke 'beranda'
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';

// Sertakan header global
include 'header.php';
?>
<section id="main-content">
  <section class="wrapper">
    <?php
    // Tentukan halaman yang akan dimuat
    switch ($page) {
        case 'beranda':
            include 'beranda.php'; // Halaman Beranda
            break;
        case 'produk':
            include 'produk.php'; // Contoh halaman Produk (opsional)
            break;
        default:
            echo "<h3>Halaman tidak ditemukan</h3>";
            break;
    }
    ?>
  </section>
</section>
<?php
// Sertakan footer global jika ada (opsional)
?>
