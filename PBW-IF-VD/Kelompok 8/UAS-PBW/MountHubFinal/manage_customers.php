<?php
session_start();
require 'config.php'; // Koneksi ke database

// Pastikan hanya admin yang dapat mengakses halaman ini
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

// Tambah pelanggan baru
if (isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($name && $email) {
        $query = "INSERT INTO customers (name, email) VALUES (:name, :email)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $successMessage = "Customer added successfully!";
        } else {
            $errorMessage = "Failed to add customer.";
        }
    } else {
        $errorMessage = "Name and email are required!";
    }
}

// Ambil daftar pelanggan
$query = "SELECT * FROM customers ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h2>Manage Customers</h2>
    <?php if (isset($successMessage)) echo "<div class='alert alert-success'>$successMessage</div>"; ?>
    <?php if (isset($errorMessage)) echo "<div class='alert alert-danger'>$errorMessage</div>"; ?>

    <!-- Form Tambah Pelanggan -->
    <form method="POST" action="" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" name="add_customer" class="btn btn-primary">Add Customer</button>
    </form>

    <!-- Tabel Daftar Pelanggan -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['created_at'] ?></td>
                <td>
                    <a href="edit_customer.php?id=<?= $customer['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_customer.php?id=<?= $customer['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
