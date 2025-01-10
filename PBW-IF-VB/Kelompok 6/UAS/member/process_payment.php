<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan data pembayaran ada di POST
if (isset($_POST['id_booking'], $_POST['metode_pembayaran']) && !empty($_POST['id_booking']) && !empty($_POST['metode_pembayaran'])) {
    $id_booking = $_POST['id_booking'];  // Ambil ID booking dari POST
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $bank = isset($_POST['bank']) ? $_POST['bank'] : null;
    $no_rekening = isset($_POST['no_rekening']) ? $_POST['no_rekening'] : null;
    $no_rekening_pengguna = isset($_POST['no_rekening_pengguna']) ? $_POST['no_rekening_pengguna'] : null;

    // Validasi jika metode pembayaran adalah transfer bank, pastikan bank dan nomor rekening diisi
    if ($metode_pembayaran == 'transfer' && (empty($bank) || empty($no_rekening) || empty($no_rekening_pengguna))) {
        $_SESSION['error'] = "Silakan pilih bank dan masukkan nomor rekening.";
        header("Location: konfirmasi_pembayaran.php?id_booking=$id_booking");
        exit;
    }

    // Update status booking menjadi 'Menunggu Verifikasi' dan simpan metode pembayaran
    $sql = "UPDATE booking SET status = 'Menunggu Verifikasi', metode_pembayaran = ?, bank = ?, no_rekening = ?, no_rekening_pengguna = ?, updated_at = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $metode_pembayaran, $bank, $no_rekening, $no_rekening_pengguna, $id_booking);

    if ($stmt->execute()) {
        // Arahkan pengguna ke halaman konfirmasi sukses
        $_SESSION['success'] = "Pembayaran Anda sedang menunggu verifikasi.";
        header("Location: konfirmasi_pembayaran_sukses.php?id_booking=$id_booking");
        exit;
    } else {
        $_SESSION['error'] = "Gagal mengkonfirmasi pembayaran. Silakan coba lagi.";
        header("Location: konfirmasi_pembayaran.php?id_booking=$id_booking");
        exit;
    }
} else {
    $_SESSION['error'] = "Data tidak lengkap. Silakan coba lagi.";
    header("Location: konfirmasi_pembayaran.php");
    exit;
}
?>
