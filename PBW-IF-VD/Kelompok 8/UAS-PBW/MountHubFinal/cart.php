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

// Ambil data produk dari database untuk navbar
try {
    $query = "SELECT id, name FROM products"; // Query untuk mendapatkan semua produk
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Tangani kesalahan jika gagal mengambil data produk
    echo "<p class='text-danger'>Error loading products: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang Belanja</title>
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

        <!-- Navbar About -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="src/about/info-mounthub.php">Apa itu MountHub?</a></li>
            <li><a class="dropdown-item" href="src/about/donasi.php">Donasi</a></li>
            <li><a class="dropdown-item" href="src/about/hubungi.php">Hubungi</a></li>
            <li><a class="dropdown-item" href="src/about/privacy.php">Privacy Policy</a></li>
          </ul>
        </li>

        <!-- Navbar Products -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="products.php">Tenda</a></li>
            <li><a class="dropdown-item" href="Sepatu Gunung.php">Sepatu Gunung</a></li>
            <li><a class="dropdown-item" href="Ransel Gunung.php">Ransel Gunung</a></li>
            <li><a class="dropdown-item" href="Jaket Gunung.php">Jaket Gunung</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
  <a 
    class="nav-link dropdown-toggle" 
    href="#" 
    id="navbarDropdownRibuCategories" 
    role="button" 
    data-toggle="dropdown" 
    aria-haspopup="true" 
    aria-expanded="false"
  >
    Ribu Categories
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdownRibuCategories">
    <li>
      <a class="dropdown-item" href="src/ls-sangattinggi/list-gunung-st.php">Sangat Tinggi</a>
    </li>
    <li>
      <a class="dropdown-item" href="src/ls-tinggisedang/list-gunung-ts.php">Tinggi Sedang</a>
    </li>
    <li>
      <a class="dropdown-item" href="src/ls-kurangtinggi/list-gunung-kt.php">Kurang Tinggi</a>
    </li>
    <li>
      <a class="dropdown-item" href="src/ls-special/list-gunung-s.php">Special</a>
    </li>
  </ul>
</li>


      </ul>
    </div>
  </div>
</nav>


<!-- Main Content -->
<div class="container my-5">
    <h2 class="text-center">Your Cart</h2>
    <?php
    $sum = 0;

    try {
        // Query untuk mendapatkan produk di keranjang
        $query = "SELECT products.price AS Price, products.id, products.name AS Name 
                  FROM users_products 
                  JOIN products ON users_products.product_id = products.id 
                  WHERE users_products.user_id = :user_id AND users_products.status = 'Added To Cart'";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Cek apakah ada produk di keranjang
        if ($stmt->rowCount() > 0) {
            ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Item Number</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>#<?= htmlspecialchars($row['id']); ?></td>
                            <td><?= htmlspecialchars($row['Name']); ?></td>
                            <td>Rp <?= number_format($row['Price'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="cart-remove.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    <?php 
                        $sum += $row['Price'];
                    } ?>
                    <!-- Menampilkan total harga -->
                    <tr>
                        <td colspan="2" class="text-right"><strong>Total</strong></td>
                        <td>Rp <?= number_format($sum, 2, ',', '.'); ?></td>
                        <!-- Tombol Confirm Order -->
                        <td>
                            <a href="checkout.php" class="btn btn-success btn-sm">Confirm Order</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php
        } else {
            // Jika keranjang kosong
            echo "<div class='text-center'>
                    <img src='images/emptycart.png' alt='Empty Cart' width='150'>
                    <p class='h5 mt-3'>Your cart is empty. Add items to your cart first!</p>
                  </div>";
        }
    } catch (PDOException $e) {
        // Tangani kesalahan database
        echo "<p class='text-danger'>Error loading cart: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    ?>
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3">
  <p>&copy; 2024 MountHub. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
