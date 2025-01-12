<?php
session_start();
require 'config.php'; // Sertakan file koneksi database

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil order_id dari URL
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    die('Order ID is missing.');
}

$order_id = $_GET['order_id'];
$user_id = $_SESSION['user']['id']; // Ambil ID user dari session

try {
    // Ambil data order dan nama pengguna
    $query = "SELECT orders.*, users.name AS user_name 
              FROM orders 
              JOIN users ON orders.user_id = users.id 
              WHERE orders.id = :order_id AND orders.user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        throw new Exception("Order not found.");
    }

    // Ambil produk dalam order
    $query_products = "SELECT p.name, p.price, op.quantity 
                       FROM order_products op 
                       JOIN products p ON op.product_id = p.id 
                       WHERE op.order_id = :order_id";
    $stmt_products = $conn->prepare($query_products);
    $stmt_products->bindParam(':order_id', $order['id'], PDO::PARAM_INT);
    $stmt_products->execute();
    $products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error processing checkout: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="home.php">MountHub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container my-5">
    <h2 class="text-center">Order Summary</h2>
    <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <td><?= htmlspecialchars($order['id']); ?></td>
        </tr>
        <tr>
            <th>User Name</th>
            <td><?= htmlspecialchars($order['user_name']); ?></td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td>Rp <?= number_format($order['total'], 2, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= htmlspecialchars($order['status']); ?></td>
        </tr>
    </table>

    <h4>Products</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']); ?></td>
                    <td>Rp <?= number_format($product['price'], 2, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($product['quantity']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Formulir pembayaran -->
<h4 class="mt-4">Payment Details</h4>
<form action="process-payment.php" method="POST">
    <!-- Hidden field untuk order_id -->
    <input type="hidden" name="order_id" value="<?= $order_id; ?>" />

    <div class="form-group">
        <label for="payment_method">Payment Method</label>
        <select class="form-control" id="payment_method" name="payment_method" required>
            <option value="dana">Dana</option>
            <!-- Tambahkan opsi lain jika perlu -->
        </select>
    </div>

    <div class="form-group">
        <label for="payment_amount">Amount to Pay</label>
        <input type="text" class="form-control" id="payment_amount" value="Rp <?= number_format($order['total'], 2, ',', '.'); ?>" disabled>
    </div>

    <button type="submit" class="btn btn-success">Confirm Payment</button>
</form>
