<?php
session_start();
require 'config.php';

// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php'); // Redirect jika bukan admin
    exit();
}

// Ambil data pesanan dari database
try {
    $query = "
        SELECT 
            orders.id AS order_id,
            users.name AS user_name,
            orders.total_price,
            orders.address,
            orders.payment_method,
            orders.created_at
        FROM orders
        JOIN users ON orders.user_id = users.id
        ORDER BY orders.created_at DESC
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p class='text-danger'>Error loading orders: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Info Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">MountHub - Admin</a>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Daftar Pesanan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Total Harga</th>
                    <th>Alamat</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pesanan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($index + 1); ?></td>
                            <td><?= htmlspecialchars($order['user_name']); ?></td>
                            <td>Rp <?= number_format($order['total_price'], 2, ',', '.'); ?></td>
                            <td><?= htmlspecialchars($order['address']); ?></td>
                            <td><?= htmlspecialchars($order['payment_method']); ?></td>
                            <td><?= htmlspecialchars($order['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 MountHub. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
