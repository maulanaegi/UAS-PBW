<?php
// Memulai session dan koneksi DB
session_start();
include '../includes/db_connection.php';
include 'navbar.php';

// Cek apakah pengguna sudah login dan memiliki peran 'operator'
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'operator') {
    header('Location: login.php');
    exit();
}

// Ambil data profil operator berdasarkan session
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Ambil daftar lapangan yang dimiliki oleh operator
$lapangan_sql = "SELECT * FROM lapangan WHERE operator_id = ?";
$lapangan_stmt = $conn->prepare($lapangan_sql);
$lapangan_stmt->bind_param("i", $user_id);
$lapangan_stmt->execute();
$lapangan_result = $lapangan_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Operator - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff; /* Mengubah background menjadi putih */
            color: #333; /* Mengubah warna teks menjadi gelap agar kontras dengan latar belakang putih */
        }

        .card {
            background-color: #f8f9fa; /* Mengubah latar belakang card menjadi warna putih terang */
            color: #333; /* Warna teks pada card menjadi gelap */
            border-radius: 8px;
        }

        .card-header {
            background-color: #e9ecef; /* Warna latar belakang header lebih terang */
            color: #333;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .container {
            background-color: #f1f3f5; /* Memberikan sedikit shade pada container agar tidak terlalu terang */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1, h4 {
            color: #333; /* Warna teks heading gelap agar kontras dengan latar belakang putih */
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <h1 class="text-start mb-4">Profil Operator</h1>

    <div class="row">
        <!-- Kolom Kiri: Informasi Profil -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Nama:</strong> <?php echo htmlspecialchars($user['username']); ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Daftar Lapangan yang Dikelola -->
        <div class="col-md-8 mt-4 mt-md-0">
            <h4>Daftar Lapangan yang Anda Kelola</h4>
            <?php if ($lapangan_result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lapangan</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($lapangan = $lapangan_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($lapangan['nama_lapangan']); ?></td>
                                <td><?php echo htmlspecialchars($lapangan['lokasi']); ?></td>
                                <td>Rp <?php echo number_format($lapangan['harga'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="edit_lapangan.php?id=<?php echo $lapangan['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_lapangan.php?id=<?php echo $lapangan['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lapangan ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Anda belum menambahkan lapangan apapun.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tombol untuk menambahkan lapangan baru -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <a href="add_lapangan.php" class="btn btn-primary">Tambah Lapangan Baru</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
