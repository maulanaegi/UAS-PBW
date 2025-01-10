<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan ID booking tersedia di URL
if (isset($_GET['id_booking']) && !empty($_GET['id_booking'])) {
    $id_booking = $_GET['id_booking'];

    // Debugging tambahan (hapus jika sudah tidak perlu)
    echo "ID Booking yang diterima: " . htmlspecialchars($id_booking) . "<br>";

    // Ambil detail booking berdasarkan ID booking
    $sql = "SELECT booking.id, booking.lapangan_id, booking.member_id, booking.tanggal, booking.jam, 
            booking.total_harga, booking.metode_pembayaran, booking.bank, booking.no_rekening, lapangan.nama_lapangan
            FROM booking
            JOIN lapangan ON booking.lapangan_id = lapangan.id 
            WHERE booking.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_booking);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $booking = $result->fetch_assoc();
    } else {
        echo "Booking tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Booking tidak tersedia.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2>Konfirmasi Pembayaran Sukses</h2>
    <p><strong>ID Booking:</strong> <?php echo $booking['id']; ?></p>
    <p><strong>Nama Lapangan:</strong> <?php echo $booking['nama_lapangan']; ?></p>
    <p><strong>Tanggal Booking:</strong> <?php echo $booking['tanggal']; ?></p>
    <p><strong>Jam Booking:</strong> <?php echo $booking['jam']; ?></p>
    <p><strong>Total Harga:</strong> Rp. <?php echo number_format($booking['total_harga'], 0, ',', '.'); ?></p>
    <p><strong>Metode Pembayaran:</strong> <?php echo ucfirst($booking['metode_pembayaran']); ?></p>
    <?php if ($booking['metode_pembayaran'] == 'transfer') : ?>
        <p><strong>Bank:</strong> <?php echo $booking['bank']; ?></p>
        <p><strong>Nomor Rekening:</strong> <?php echo $booking['no_rekening']; ?></p>
    <?php endif; ?>

    <!-- Form untuk upload bukti pembayaran -->
    <form action="upload_bukti_pembayaran.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_booking" value="<?php echo $booking['id']; ?>">
        <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
            <input type="file" class="form-control" name="bukti_pembayaran" required>
        </div>
        <button type="submit" class="btn btn-success">Upload Bukti Pembayaran</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
