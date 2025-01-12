<?php
session_start();
require 'config.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil ID order dari URL
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;

// Debugging: Periksa seluruh parameter URL
var_dump($_GET);

if ($order_id == 0) {
    echo "Invalid order ID. Please check the URL and try again.";
    // Atau arahkan kembali ke halaman lain
    header("Location: home.php");
    exit();
}


// Ambil ID pengguna dari session
$user_id = $_SESSION['user']['id'];

// Periksa apakah order_id ini milik user yang sedang login
$query = "SELECT * FROM orders WHERE id = :order_id AND user_id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Debugging: Tampilkan hasil query
if ($order) {
    echo "Order found: " . print_r($order, true);
} else {
    echo "Order not found or does not belong to this user. Order ID: $order_id";
}
exit(); // Stop execution for debugging
?>
