<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan ID booking tersedia di sesi
if (isset($_SESSION['id_booking'])) {
    $id_booking = $_SESSION['id_booking']; // ID booking yang sudah ada di sesi

    // Ambil detail booking dari database
    $sql = "SELECT b.id, b.tanggal, b.jam, b.total_harga, l.nama_lapangan, m.username, b.bukti_pembayaran
            FROM booking b 
            JOIN lapangan l ON b.lapangan_id = l.id 
            JOIN users m ON b.member_id = m.id 
            WHERE b.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_booking);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $booking = $result->fetch_assoc();
    } else {
        echo "<script>alert('Data booking tidak ditemukan.'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID booking tidak ditemukan.'); window.location.href='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">Bukti Pembayaran Telah Selesai!</h4>
            <p>CATATAN!!!</p>
            <p>DIWAJIBKAN UNTUK SCREENSHOOT STRUK LAPORAN INI UNTUK DI KIRIMKAN KE WA OPERATOR GOR YANG TERSEDIA DI DESKRIPSI DAN BILAMANA HENDAK DATANG KE LOKASI GOR TUNJUKAN SCREENSHOOT UNTUK BUKTI PEMBAYARAN</p>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Detail Booking Anda</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama Lapangan:</strong> <?php echo htmlspecialchars($booking['nama_lapangan']); ?></p>
                <p><strong>Tanggal Booking:</strong> <?php echo htmlspecialchars($booking['tanggal']); ?></p>
                <p><strong>Waktu Booking:</strong> <?php echo htmlspecialchars($booking['jam']); ?></p>
                <p><strong>Total Harga:</strong> Rp <?php echo number_format($booking['total_harga'], 0, ',', '.'); ?></p>
                <p><strong>Nama Pemesan:</strong> <?php echo htmlspecialchars($booking['username']); ?></p>

                <div class="mt-4">
                    <p><strong>Bukti Pembayaran:</strong></p>
                    <?php if (!empty($booking['bukti_pembayaran'])): ?>
                        <img src="../upload/bukti_pembayaran/<?php echo htmlspecialchars(basename($booking['bukti_pembayaran'])); ?>" alt="Bukti Pembayaran" class="img-fluid" style="max-width: 100%; height: auto;">
                    <?php else: ?>
                        <p>Belum ada bukti pembayaran yang diupload.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
