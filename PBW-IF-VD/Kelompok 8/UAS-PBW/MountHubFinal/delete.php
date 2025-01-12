<?php
session_start();
require 'config.php'; // Koneksi ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses penghapusan akun
    try {
        $deleteQuery = $conn->prepare("DELETE FROM users WHERE id = :id");
        $deleteQuery->bindParam(':id', $user_id);

        if ($deleteQuery->execute()) {
            // Hapus sesi dan arahkan ke halaman login
            session_unset();
            session_destroy();
            header('Location: index.php');
            exit();
        } else {
            $error_message = "Failed to delete account. Please try again later.";
        }
    } catch (Exception $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Delete Account</h2>

        <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>

        <p>Are you sure you want to delete your account? This action cannot be undone.</p>

        <form method="POST" action="">
            <button type="submit" name="confirm_delete">Delete My Account</button>
            <a href="home.php" class="button">Cancel</a>
        </form>
    </div>
</body>
</html>
