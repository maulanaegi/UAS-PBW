<?php
session_start();
require 'config.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Ambil ID order dari URL
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;

if ($order_id == 0) {
    echo "Invalid order ID.";
    exit();
}

// Ambil informasi pesanan dari database
$query = "SELECT * FROM orders WHERE id = :order_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo "Order not found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="home.php">MountHub</a>
    </div>
</nav>

<!-- Main Content -->
<div class="container my-5">
    <h2 class="text-center">Payment Successful</h2>
    <p class="text-center">Your payment has been processed successfully!</p>
    <p class="text-center">Order ID: <?= htmlspecialchars($order['id']); ?></p>
    <p class="text-center">Amount Paid: Rp <?= number_format($order['total_amount'], 2, ',', '.'); ?></p>
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3">
    <p>&copy; 2024 MountHub. All rights reserved.</p>
</footer>

</body>
</html>
