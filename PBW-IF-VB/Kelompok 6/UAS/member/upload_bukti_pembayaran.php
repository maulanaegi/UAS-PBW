<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan ID booking tersedia di POST
if (isset($_POST['id_booking']) && !empty($_POST['id_booking']) && isset($_FILES['bukti_pembayaran'])) {
    $id_booking = $_POST['id_booking'];
    $bukti_pembayaran = $_FILES['bukti_pembayaran'];

    // Validasi file
    if ($bukti_pembayaran['error'] == 0) {
        $upload_dir = '../upload/bukti_pembayaran/';
        $file_name = $bukti_pembayaran['name'];
        $file_tmp = $bukti_pembayaran['tmp_name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Cek apakah file adalah gambar atau dokumen yang valid
        $valid_extensions = ['jpg', 'jpeg', 'png', 'pdf'];
        if (in_array($file_extension, $valid_extensions)) {
            $file_path = $upload_dir . uniqid() . '.' . $file_extension;
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Update status pembayaran dan simpan path bukti pembayaran
                $sql = "UPDATE booking SET bukti_pembayaran = ?, status = 'Menunggu Verifikasi' WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $file_path, $id_booking);

                if ($stmt->execute()) {
                    // Simpan bukti pembayaran dan informasi booking di session
                    $_SESSION['bukti_pembayaran'] = $file_path; // Path bukti pembayaran
                    $_SESSION['id_booking'] = $id_booking; // ID booking
                    $_SESSION['success'] = "Bukti pembayaran berhasil diupload. Silakan menunggu verifikasi.";
                    
                    // Redirect ke halaman bukti pembayaran sukses
                    header("Location: bukti_pembayaran_sukses.php");
                    exit;
                } else {
                    $_SESSION['error'] = "Gagal mengupload bukti pembayaran.";
                }
            } else {
                $_SESSION['error'] = "Gagal mengupload file.";
            }
        } else {
            $_SESSION['error'] = "Format file tidak valid.";
        }
    } else {
        $_SESSION['error'] = "Terjadi kesalahan dalam pengunggahan file.";
    }

    // Jika gagal, redirect kembali ke halaman konfirmasi pembayaran
    header("Location: konfirmasi_pembayaran_sukses.php?id_booking=$id_booking");
    exit;
} else {
    $_SESSION['error'] = "Data tidak lengkap.";
    header("Location: konfirmasi_pembayaran_sukses.php?id_booking=$id_booking");
    exit;
}
?>
