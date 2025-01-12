<?php
session_start();
require 'config.php'; // Sertakan file koneksi database

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil user ID dari sesi
$user_id = $_SESSION['user']['id'];

// Variabel default
$total_price = 0;

// Ambil data keranjang dan hitung total harga
try {
    $query = "
        SELECT 
            products.id AS product_id,
            products.name AS product_name,
            products.price AS product_price,
            users_products.quantity AS product_quantity,
            (products.price * users_products.quantity) AS sub_total,
            SUM(products.price * users_products.quantity) AS total_price
        FROM users_products
        JOIN products ON users_products.product_id = products.id
        WHERE users_products.user_id = :user_id 
          AND users_products.status = 'Added To Cart'
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Hitung total harga
    if (!empty($cart_items)) {
        $total_price = $cart_items[0]['total_price'] ?? 0;
    }
} catch (PDOException $e) {
    echo "<p class='text-danger'>Error loading cart: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Proses pesanan jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $address = $_POST['address'];
        $payment_method = $_POST['payment_method'];

        // Insert pesanan ke tabel orders
        $order_query = "
            INSERT INTO orders (user_id, total_price, address, payment_method, created_at)
            VALUES (:user_id, :total_price, :address, :payment_method, NOW())
        ";
        $stmt = $conn->prepare($order_query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':total_price', $total_price, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':payment_method', $payment_method, PDO::PARAM_STR);
        $stmt->execute();

        // Ubah status produk di keranjang menjadi 'Ordered'
        $update_query = "
            UPDATE users_products
            SET status = 'Ordered'
            WHERE user_id = :user_id AND status = 'Added To Cart'
        ";
        $stmt = $conn->prepare($update_query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Set session flash message
        $_SESSION['success_message'] = "Pesanan Anda telah berhasil diproses!";
        
        // Redirect ulang ke halaman checkout untuk menampilkan notifikasi
        header('Location: checkout.php');
        exit();
    } catch (PDOException $e) {
        echo "<p class='text-danger'>Error processing order: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<!-- Tambahkan di bagian HTML untuk menampilkan notifikasi -->
<div class="container my-5">
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($_SESSION['success_message']); ?>
        </div>
        <?php unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan ?>
    <?php endif; ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">MountHub</a>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Checkout</h2>
        <div class="row">
            <div class="col-md-8">
                <h4>Keranjang Belanja</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['product_name']); ?></td>
                                <td>Rp <?= number_format($item['product_price'], 2, ',', '.'); ?></td>
                                <td><?= htmlspecialchars($item['product_quantity']); ?></td>
                                <td>Rp <?= number_format($item['sub_total'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total Harga</strong></td>
                            <td>Rp <?= number_format($total_price, 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4>Informasi Pengiriman</h4>
                <form method="POST">
                    <div class="form-group">
                        <label for="address">Alamat Pengiriman</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Metode Pembayaran</label>
                        <select class="form-control" name="payment_method" id="payment_method" required>
                            <option value="Dana">Dana</option>
                            <option value="OVO">OVO</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Proses Pesanan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 MountHub. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
