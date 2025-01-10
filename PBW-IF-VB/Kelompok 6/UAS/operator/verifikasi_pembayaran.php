<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan ID booking tersedia di URL
if (isset($_GET['id_booking']) && !empty($_GET['id_booking'])) {
    $id_booking = $_GET['id_booking'];

    // Ambil detail booking berdasarkan ID booking
    $sql = "SELECT * FROM booking WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_booking);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if (!$booking) {
        $_SESSION['error'] = "Booking tidak ditemukan.";
        header("Location: index.php");
        exit;
    }
}

// Proses verifikasi pembayaran
if (isset($_POST['verifikasi'])) {
    $status_verifikasi = $_POST['status_verifikasi']; // 'confirmed' or 'canceled'

    $sql_update = "UPDATE booking SET status = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ss", $status_verifikasi, $id_booking);

    if ($stmt_update->execute()) {
        $_SESSION['success'] = "Status booking berhasil diperbarui.";
        header("Location: verifikasi_pembayaran.php?id_booking=$id_booking");
        exit;
    } else {
        $_SESSION['error'] = "Gagal memperbarui status booking.";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Verifikasi Pembayaran</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Detail Booking</h5>
                <p><strong>ID Booking:</strong> <?php echo htmlspecialchars($booking['id']); ?></p>
                <p><strong>Nama Lapangan:</strong> <?php echo htmlspecialchars($booking['lapangan_id']); ?></p>
                <p><strong>Tanggal:</strong> <?php echo date("d M Y", strtotime($booking['tanggal'])); ?></p>
                <p><strong>Jam:</strong> <?php echo htmlspecialchars($booking['jam']); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($booking['status']); ?></p>
                <p><strong>Bukti Pembayaran:</strong><br>
                    <?php if ($booking['bukti_pembayaran']): ?>
                        <a href="<?php echo htmlspecialchars($booking['bukti_pembayaran']); ?>" target="_blank">Lihat Bukti Pembayaran</a>
                    <?php else: ?>
                        Bukti pembayaran belum diupload.
                    <?php endif; ?>
                </p>

                <!-- Form untuk konfirmasi verifikasi -->
                <form method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="status_verifikasi">Verifikasi Pembayaran:</label>
                        <select class="form-select" id="status_verifikasi" name="status_verifikasi" required>
                            <option value="confirmed" <?php echo $booking['status'] == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="canceled" <?php echo $booking['status'] == 'canceled' ? 'selected' : ''; ?>>Canceled</option>
                        </select>
                    </div>
                    <button type="submit" name="verifikasi" class="btn btn-primary mt-3">Perbarui Status</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
