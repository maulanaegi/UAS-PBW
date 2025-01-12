<?php
session_start();
require 'config.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirect jika belum login
    exit();
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user']['id'];

try {
    // Update status produk dari 'Added To Cart' menjadi 'Confirmed'
    $query = "UPDATE users_products 
              SET status = 'Confirmed' 
              WHERE user_id = :user_id AND status = 'Added To Cart'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>
                alert('Order berhasil dikonfirmasi!');
                window.location.href = 'products.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Gagal mengkonfirmasi order!');
                window.location.href = 'cart.php';
              </script>";
        exit();
    }
} catch (PDOException $e) {
    // Tangani kesalahan database
    echo "<script>
            alert('Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "');
            window.location.href = 'cart.php';
          </script>";
    exit();
}
?>
