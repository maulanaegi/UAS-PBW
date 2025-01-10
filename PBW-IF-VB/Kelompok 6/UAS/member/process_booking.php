<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_booking = $_POST['id_booking']; // ID Booking
    $lapangan_id = $_POST['lapangan_id']; // ID Lapangan
    $member_id = $_SESSION['user_id']; // ID Member
    $tanggal = $_POST['tanggal']; // Tanggal Booking
    $jam = $_POST['jam']; // Jam Booking
    $total_harga = $_POST['total_harga_hidden']; // Ambil total_harga dari input tersembunyi
    
    $durasi = $_POST['durasi']; // Durasi Bermain (hanya untuk menghitung total, tidak disimpan ke DB)

    // Pastikan durasi bukan 0
    if ($durasi == 0) {
        die("Durasi tidak valid.");
    }

    // Query untuk menyimpan booking ke database
    $sql = "INSERT INTO booking (id, lapangan_id, member_id, tanggal, jam, total_harga, status) 
            VALUES (?, ?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisss", $id_booking, $lapangan_id, $member_id, $tanggal, $jam, $total_harga);

    if ($stmt->execute()) {
        // Booking berhasil, arahkan pengguna ke halaman konfirmasi pembayaran
        header("Location: konfirmasi_pembayaran.php?id_booking=$id_booking");
        exit;
    } else {
        // Gagal memasukkan data
        echo "Gagal melakukan booking. Silakan coba lagi.";
    }
}
?>
