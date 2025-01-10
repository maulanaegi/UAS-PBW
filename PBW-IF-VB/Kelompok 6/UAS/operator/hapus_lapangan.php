<?php
// Start session
session_start();
include '../includes/db_connection.php';

// Cek apakah operator sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'operator') {
    header('Location: ../login.php');
    exit();
}

$operator_id = $_SESSION['user_id']; 

// Periksa apakah ada parameter 'id' lapangan
if (isset($_GET['id'])) {
    $lapangan_id = $_GET['id'];

    // Cek apakah lapangan yang ingin dihapus milik operator yang sedang login
    $sql_check = "SELECT * FROM lapangan WHERE id = '$lapangan_id' AND operator_id = '$operator_id'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Hapus lapangan
        $sql_delete = "DELETE FROM lapangan WHERE id = '$lapangan_id'";
        
        if ($conn->query($sql_delete) === TRUE) {
            // Redirect ke dashboard setelah berhasil menghapus
            header('Location: profile.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Lapangan ini tidak ditemukan atau Anda tidak memiliki hak untuk menghapusnya.";
    }
} else {
    echo "ID lapangan tidak tersedia.";
}