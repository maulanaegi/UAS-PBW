<?php
session_start();
include '../includes/db_connection.php';

// Pastikan member sudah login
if (!isset($_SESSION['member_id'])) {
    // Jika member belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}

// Dapatkan ID member dari session
$member_id = $_SESSION['member_id'];

// Ambil data booking berdasarkan ID member
$sql = "SELECT booking.id, booking.lapangan_id, booking.tanggal, booking.jam, booking.status, booking.total_harga, lapangan.nama_lapangan 
        FROM booking
        JOIN lapangan ON booking.lapangan_id = lapangan.id 
        WHERE booking.member_id = ? 
        ORDER BY booking.tanggal DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $member_id);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah ada booking yang ditemukan
$booking_data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $booking_data[] = $row;
    }
} else {
    $booking_data = null;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Status Booking Anda</h2>

        <?php if ($booking_data !== null): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Nama Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($booking_data as $booking): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($booking['id']); ?></td>
                            <td><?php echo htmlspecialchars($booking['nama_lapangan']); ?></td>
                            <td><?php echo date("d M Y", strtotime($booking['tanggal'])); ?></td>
                            <td><?php echo htmlspecialchars($booking['jam']); ?></td>
                            <td>
                                <?php 
                                switch ($booking['status']) {
                                    case 'pending':
                                        echo '<span class="badge bg-warning">Pending</span>';
                                        break;
                                    case 'confirmed':
                                        echo '<span class="badge bg-success">Confirmed</span>';
                                        break;
                                    case 'canceled':
                                        echo '<span class="badge bg-danger">Canceled</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-secondary">Unknown</span>';
                                }
                                ?>
                            </td>
                            <td>Rp<?php echo number_format($booking['total_harga'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-info">Anda belum melakukan booking apapun.</p>
        <?php endif; ?>
        
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
