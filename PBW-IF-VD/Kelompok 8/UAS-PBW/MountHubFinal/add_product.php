<?php
session_start();
require 'config.php';  // Koneksi database

// Pastikan pengguna adalah admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php'); // Jika bukan admin, alihkan ke halaman login
    exit();
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category']; // Kategori produk

    // Validasi kategori (pastikan kategori valid)
    $validCategories = ['Tenda', 'Sepatu Gunung', 'Ransel Gunung', 'Jaket Gunung'];
    if (!in_array($category, $validCategories)) {
        $errorMessage = "Invalid category!";
    }

    // Validasi form (pastikan data tidak kosong)
    if ($name && $price && $category && isset($_FILES['image'])) {
        // Menangani unggahan gambar
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageError = $image['error'];

        // Memeriksa apakah ada error dalam unggahan file
        if ($imageError === 0) {
            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageExtension = strtolower($imageExtension);

            // Validasi ekstensi file
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($imageExtension, $allowedExtensions)) {
                // Validasi ukuran file (maksimal 2MB)
                if ($imageSize < 2000000) {
                    // Menentukan nama file baru
                    $newImageName = uniqid('', true) . "." . $imageExtension;
                    $imageDestination = 'uploads/' . $newImageName;

                    // Memindahkan file ke folder 'uploads'
                    move_uploaded_file($imageTmpName, $imageDestination);

                    // Masukkan data produk ke dalam database
                    $query = "INSERT INTO products (name, price, image_url, category) VALUES (:name, :price, :image_url, :category)";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':image_url', $imageDestination); // Menyimpan path file
                    $stmt->bindParam(':category', $category);

                    if ($stmt->execute()) {
                        $successMessage = "Product added successfully!";
                    } else {
                        $errorMessage = "Failed to add product.";
                    }
                } else {
                    $errorMessage = "File is too large! Maximum size is 2MB.";
                }
            } else {
                $errorMessage = "Invalid file type! Only JPG, JPEG, PNG, and GIF are allowed.";
            }
        } else {
            $errorMessage = "Error uploading file!";
        }
    } else {
        $errorMessage = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
    <!-- Form untuk menambahkan produk -->
    <div class="container my-5">
        <h2>Add New Product</h2>
        <?php if (isset($successMessage)) echo "<div class='alert alert-success'>$successMessage</div>"; ?>
        <?php if (isset($errorMessage)) echo "<div class='alert alert-danger'>$errorMessage</div>"; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="Tenda">Tenda</option>
                    <option value="Sepatu Gunung">Sepatu Gunung</option>
                    <option value="Ransel Gunung">Ransel Gunung</option>
                    <option value="Jaket Gunung">Jaket Gunung</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

     <!-- Footer -->
 <footer class="bg-dark text-light py-4">
      <div class="container">
        <h1 class="fs-1 display-4 fw-medium" style="font-family: 'Libre Baskerville', serif;">Gunung,<br />Petualangan Tanpa Batas.</h1>
        <div class="d-flex justify-content-center align-items-center mt-3">
        <img src="assets/img/OIP__2_-removebg-preview 1.png" alt="" class="img-fluid" 
     style="width: 20px; height: 20px; margin-top: 2px;" />

          <div class="container">
          <h2 class="fs-6 ms-0 mt-2">hubmountaint@gmail.com</h2>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
