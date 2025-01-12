<?php
session_start();
require 'config.php'; // Sertakan file koneksi database

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Ambil user ID dari sesi
$user_id = $_SESSION['user']['id'];

// Ambil data alamat dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'];

    // Proses pembayaran menggunakan Dana (contoh sederhana)
    // Simulasi pembayaran berhasil
    $status = 'Payment Successful'; // Anda bisa mengganti ini dengan proses API Dana nyata

    // Simpan status pembayaran dan alamat ke database
    try {
        $query = "INSERT INTO orders (user_id, address, total, status) VALUES (:user_id, :address, :total, :status)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':total', $_GET['sum']);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        // Redirect ke halaman konfirmasi
        header('Location: order-confirmation.php');
    } catch (PDOException $e) {
        echo "<p class='text-danger'>Error processing checkout: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
