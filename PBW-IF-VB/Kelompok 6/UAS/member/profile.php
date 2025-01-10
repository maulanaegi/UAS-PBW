<?php
// Start session
session_start();
include '../includes/db_connection.php';
include 'navbar.php';

// Cek apakah user sudah login dan memiliki role 'member'
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'member') {
    header('Location: ../login.php');
    exit();
}

// Cek apakah 'user_id' ada di session
if (!isset($_SESSION['user_id'])) {
    echo "User ID tidak ditemukan, silakan login.";
    exit();
}

// Ambil data user yang sedang login dengan prepared statement
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);  // Mengikat parameter untuk id pengguna
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Ambil riwayat booking member dengan informasi nama lapangan
$booking_sql = "
    SELECT booking.id, booking.tanggal, booking.jam, booking.total_harga, lapangan.nama_lapangan
    FROM booking
    INNER JOIN lapangan ON booking.lapangan_id = lapangan.id
    WHERE booking.member_id = ?
";
$booking_stmt = $conn->prepare($booking_sql);
$booking_stmt->bind_param("i", $user_id);
$booking_stmt->execute();
$booking_result = $booking_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Member - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Profil Member</h1>

    <div class="row">
        <!-- Kolom Kiri: Informasi Profil -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nama:</strong> <?php echo htmlspecialchars($user['username']); ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                        <li class="list-group-item"><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Riwayat Booking -->
        <div class="col-md-8 mt-4 mt-md-0">
            <h4>Riwayat Booking Anda</h4>
            <?php if ($booking_result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Booking</th>
                            <th>Nama Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($booking = $booking_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($booking['id']); ?></td>
                                <td><?php echo htmlspecialchars($booking['nama_lapangan']); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($booking['tanggal'])); ?></td>
                                <td><?php echo date('H:i', strtotime($booking['jam'])); ?></td>
                                <td>Rp <?php echo number_format($booking['total_harga'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Anda belum melakukan booking apapun.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
