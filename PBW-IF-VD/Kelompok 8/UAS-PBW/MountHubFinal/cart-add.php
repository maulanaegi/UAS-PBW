<?php
session_start();
require 'config.php'; // Koneksi database

// Cek apakah ID produk ada dalam query string
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'] ?? null;

    // Pastikan pengguna login
    if ($user_id) {
        // Tambahkan produk ke keranjang pengguna
        $query = "INSERT INTO users_products (user_id, product_id, status) VALUES (:user_id, :product_id, 'Added To Cart')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    }

    // Ambil kategori produk untuk pengalihan
    $query = "SELECT category FROM products WHERE id = :product_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $category = $product['category'];
        // Alihkan ke halaman kategori yang sesuai (misalnya Ransel Gunung)
        header("Location: products.php?category=" . urlencode($category));
        exit();
    } else {
        // Produk tidak ditemukan
        echo "Produk tidak ditemukan!";
    }
} else {
    echo "ID produk tidak valid!";
}
?>
