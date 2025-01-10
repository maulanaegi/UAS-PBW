<?php
session_start();  // Memulai sesi

// Memeriksa dan menghapus sesi berdasarkan role yang ada
if (isset($_SESSION['operator'])) {
    unset($_SESSION['operator']);  // Menghapus sesi untuk operator
} elseif (isset($_SESSION['member'])) {
    unset($_SESSION['member']);  // Menghapus sesi untuk member
} elseif (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);  // Menghapus sesi untuk admin
}

// Menghancurkan sesi untuk membersihkan semua data sesi
session_unset();  // Menghapus semua variabel sesi
session_destroy();  // Menghancurkan sesi

// Menampilkan pesan dan mengarahkan pengguna kembali ke index.php setelah 2 detik
echo "<script>
        alert('Terima kasih, Anda Berhasil Logout');
        window.location.href = 'index.php';
      </script>";
exit();
?>
