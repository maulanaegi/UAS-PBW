<?php
session_start();
require 'config.php'; // Koneksi ke database

// Pastikan pengguna adalah admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php'); // Jika bukan admin, alihkan ke halaman login
    exit();
}

// Ambil ID produk dari URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Ambil data produk dari database
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Product not found.");
    }

    // Proses update produk
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        if ($name && $price) {
            $imageUrl = $product['image_url']; // Default image URL

            // Menangani upload gambar jika ada
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $_FILES['image'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

                if (in_array($image['type'], $allowedTypes) && $image['size'] <= 2 * 1024 * 1024) {
                    $uploadDir = 'uploads/';
                    $imageName = time() . '_' . basename($image['name']);
                    $uploadPath = $uploadDir . $imageName;

                    if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
                        $imageUrl = $uploadPath;
                    } else {
                        $errorMessage = "Failed to upload image.";
                    }
                } else {
                    $errorMessage = "Invalid image format or file size.";
                }
            }

            // Update data produk
            $updateQuery = "UPDATE products SET name = :name, price = :price, image_url = :image_url WHERE id = :id";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image_url', $imageUrl);
            $stmt->bindParam(':id', $productId);

            if ($stmt->execute()) {
                // Jika pembaruan produk berhasil, perbarui harga di keranjang belanja
                $updateCartQuery = "UPDATE users_products SET price = :price WHERE item_id = :item_id";
                $updateCartStmt = $conn->prepare($updateCartQuery);
                $updateCartStmt->bindParam(':price', $price);
                $updateCartStmt->bindParam(':item_id', $productId);
                $updateCartStmt->execute();

                $successMessage = "Product updated successfully!";
            } else {
                $errorMessage = "Failed to update product.";
            }
        } else {
            $errorMessage = "All fields are required!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* CSS untuk gambar */
        .current-image {
            max-width: 100%; /* Gambar mengisi lebar maksimum kontainer */
            max-height: 150px; /* Maksimum tinggi gambar */
            object-fit: contain; /* Gambar akan mempertahankan proporsi */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">MountHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- About Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="src/about/info-mounthub.php">Apa itu MountHub?</a></li>
                            <li><a class="dropdown-item" href="src/about/donasi.php">Donasi</a></li>
                            <li><a class="dropdown-item" href="src/about/hubungi.php">Hubungi</a></li>
                            <li><a class="dropdown-item" href="src/about/privacy.php">Privacy Police</a></li>
                        </ul>
                    </li>
                    <!-- Products Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="products.php">Tenda</a></li>
                            <li><a class="dropdown-item" href="Sepatu Gunung.php">Sepatu Gunung</a></li>
                            <li><a class="dropdown-item" href="Ransel Gunung.php">Ransel Gunung</a></li>
                            <li><a class="dropdown-item" href="Jaket Gunung.php">Jaket Gunung</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <h2>Edit Product</h2>
        <?php if (isset($successMessage)) echo "<div class='alert alert-success'>$successMessage</div>"; ?>
        <?php if (isset($errorMessage)) echo "<div class='alert alert-danger'>$errorMessage</div>"; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/jpeg, image/png, image/gif">
                <p>Current Image:</p>
                <img src="<?= htmlspecialchars($product['image_url']); ?>" class="current-image" alt="Product Image">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
