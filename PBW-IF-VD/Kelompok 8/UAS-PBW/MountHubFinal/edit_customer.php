<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

// Ambil data pelanggan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM customers WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$customer) {
        header('Location: manage_customers.php');
        exit();
    }
}

// Update data pelanggan
if (isset($_POST['update_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($name && $email) {
        $query = "UPDATE customers SET name = :name, email = :email WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('Location: manage_customers.php');
            exit();
        } else {
            $errorMessage = "Failed to update customer.";
        }
    } else {
        $errorMessage = "Name and email are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h2>Edit Customer</h2>
    <?php if (isset($errorMessage)) echo "<div class='alert alert-danger'>$errorMessage</div>"; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $customer['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $customer['email'] ?>" required>
        </div>
        <button type="submit" name="update_customer" class="btn btn-primary">Update Customer</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
