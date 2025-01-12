<?php
session_start();
require 'config.php'; // Sertakan koneksi database

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Validasi parameter ID produk
$product_id = $_GET['id'] ?? null;
if (!$product_id || !is_numeric($product_id)) {
    echo "<script>alert('Parameter ID tidak valid!'); window.location.href='cart.php';</script>";
    exit();
}

// Ambil user ID dari sesi
$user_id = $_SESSION['user']['id'];

try {
    // Hapus item dari keranjang berdasarkan user_id dan product_id
    $query = "DELETE FROM users_products WHERE user_id = :user_id AND product_id = :product_id AND status = 'Added To Cart'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman cart setelah penghapusan
        header('Location: cart.php');
        exit();
    } else {
        // Menampilkan pesan jika penghapusan gagal
        echo "<script>alert('Gagal menghapus item dari keranjang!'); window.location.href='cart.php';</script>";
    }
} catch (PDOException $e) {
    // Tangani kesalahan database
    echo "<script>alert('Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "'); window.location.href='cart.php';</script>";
    exit();
}
?>
