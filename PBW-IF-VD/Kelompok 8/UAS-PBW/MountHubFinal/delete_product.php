<?php
session_start();
require 'config.php'; // Koneksi ke database

// Pastikan pengguna adalah admin
$isAdmin = isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin';

if (!$isAdmin) {
    // Jika bukan admin, redirect ke halaman utama atau halaman error
    header('Location: index.php');
    exit;
}

// Ambil ID produk dari query parameter
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Hapus produk dari database
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $product_id);

    if ($stmt->execute()) {
        // Jika berhasil menghapus, redirect ke halaman produk dengan pesan sukses
        header('Location: products.php?message=Product deleted successfully');
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: Unable to delete product.";
    }
} else {
    // Jika ID produk tidak ada, redirect ke halaman utama
    header('Location: index.php');
}
?>
