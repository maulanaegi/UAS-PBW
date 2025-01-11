<?php
session_start();
require 'config.php';  // Koneksi database

// Ambil kategori dari URL (misalnya 'tenda', 'sepatu-gunung', dll.)
$category = isset($_GET['category']) ? $_GET['category'] : 'Tenda'; // Default kategori Tenda

// Ambil data produk dari database sesuai kategori
$query = "SELECT * FROM products WHERE category = :category";
$stmt = $conn->prepare($query);
$stmt->bindParam(':category', $category);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pastikan pengguna adalah admin
$isAdmin = isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin';

// Periksa jumlah item di keranjang
$user_id = $_SESSION['user']['id'] ?? null; // Ambil ID pengguna dari sesi
$cart_count = 0;

if ($user_id) {
    // Query untuk menghitung jumlah item di keranjang pengguna
    $cartQuery = "SELECT COUNT(*) as count FROM users_products WHERE user_id = :user_id AND status = 'Added To Cart'";
    $cartStmt = $conn->prepare($cartQuery);
    $cartStmt->bindParam(':user_id', $user_id);
    $cartStmt->execute();
    $cartCountResult = $cartStmt->fetch(PDO::FETCH_ASSOC);
    $cart_count = $cartCountResult['count']; // Jumlah item di keranjang
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mounthub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Styling untuk Navbar, Jumbotron, dan Card */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color:rgb(241, 241, 241);
            height: 50px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: white;
            font-size: 16px;
            text-decoration: none;
            position: relative;
            top: -27px;
        }
        .navbar-nav {
            margin-left: auto;
            display: flex;
            gap: 15px;
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: black !important;
        }
        .navbar .nav-link:hover {
            color: gray;
        }
        .jumbotron {
            background: #1E1F26;
            color: white;
            padding: 40px 0;
            border-radius: 10px;
            margin-top: 80px;
            margin-bottom: 30px;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .jumbotron h1 {
            font-size: 2.5em;
            font-weight: normal;
        }
        .jumbotron p {
            font-size: 1.1em;
            font-weight: 400;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-body {
            text-align: center;
            padding: 20px;
        }
        .card-title {
            font-size: 1.5em;
            font-weight: bold;
        }
        .card-text {
            font-size: 1.25em;
            color: #00b894;
        }
        .btn-warning, .btn-primary, .btn-danger {
            width: 100px;
            margin: 5px;
        }
        .container {
            margin-top: 50px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Styling untuk tombol */
        .btn-warning {
            width: 100%; /* Tombol "Add to Cart" lebar 100% */
            padding: 10px 0;
        }

        .card-body .d-flex {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .card-body .btn-group {
            width: 100%;
        }

        .card-body .btn {
            width: 48%; /* Membuat tombol sedikit lebih kecil agar tidak terlalu penuh */
        }

        .card-body .card-text {
            font-weight: bold;
            font-size: 1.2em;
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <!-- MountHub dengan ukuran lebih besar -->
        <a class="navbar-brand text-dark fs-5" href="home.php">MountHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <?php if ($isAdmin): ?>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="add_product.php">
                        <i class="bi bi-plus-circle"></i> Tambah Produk
                    </a>
                </li>
                <?php endif; ?>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <?php if ($isAdmin): ?>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="info-order.php">
                        <i class="bi bi-plus-circle"></i> info pesanan
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Produk
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?category=Tenda">Tenda</a></li>
                        <li><a class="dropdown-item" href="?category=Sepatu Gunung">Sepatu Gunung</a></li>
                        <li><a class="dropdown-item" href="?category=Ransel Gunung">Ransel Gunung</a></li>
                        <li><a class="dropdown-item" href="?category=Jaket Gunung">Jaket Gunung</a></li>
                    </ul>
                </li>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                About
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="src/about/info-mounthub.php">Apa itu MountHub!</a>
                </li>
                <li><a class="dropdown-item" href="src/about/donasi.php">Donasi</a></li>
                <li><a class="dropdown-item" href="src/about/hubungi.php">Hubungi</a></li>
                <li><a class="dropdown-item" href="src/about/privacy.php">Privacy Police</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Ribu Categories
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-sangattinggi/list-gunung-st.php"
                  >
                    Sangat Tinggi
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-tinggisedang/list-gunung-ts.php"
                  >
                    Tinggi Sedang
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-kurangtinggi/list-gunung-kt.php"
                  >
                    Kurang Tinggi
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-special/list-gunung-s.php"
                  >
                    Special
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-special/ls-speecial.php"
                  >
                  
                  </ul>
            </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="cart.php">
                        <i class="bi bi-cart"></i> Keranjang(<?= $cart_count ?>)
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="font-family: 'Libre Baskerville', serif;">">
        
        <h1>Welcome to MountHub!</h1>
        <p>Kami memiliki berbagai macam produk untuk Anda. Tidak perlu mencari-cari, kami memiliki semuanya di satu tempat</p>
    </div>

    <div class="container">
        <h2>Produk Kami: <?= htmlspecialchars($category); ?></h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text">Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="cart-add.php?id=<?= $product['id']; ?>" class="btn btn-warning">Add to Cart</a>

                                <!-- Menu Edit dan Delete hanya untuk Admin -->
                                <?php if ($isAdmin): ?>
                                    <a href="edit_product.php?id=<?= $product['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete_product.php?id=<?= $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 <!-- Footer -->
 <footer class="bg-dark text-light py-4">
      <div class="container">
        <h1 class="fs-1 display-4 fw-medium" style="font-family: 'Libre Baskerville', serif;">Gunung,<br />Petualangan Tanpa Batas.</h1>
        <div class="d-flex justify-content-center align-items-center mt-3">
        <img src="assets/img/OIP__2_-removebg-preview 1.png" alt="" class="img-fluid" 
     style="width: 20px; height: 20px; margin-top: 50px;" />

          <div class="container">
          <h2 class="fs-6 ms-0 mt-2">hubmountaint@gmail.com</h2>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
