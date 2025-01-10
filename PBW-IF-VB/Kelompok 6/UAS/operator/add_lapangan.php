<?php
session_start();
include '../includes/db_connection.php';
include 'navbar.php';

// Cek apakah user sudah login dan memiliki role 'operator'
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'operator') {
    header('Location: /login.php');
    exit();
}

// Proses tambah lapangan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $nama = $_POST['nama_lapangan'];  // Sesuaikan dengan nama input yang benar
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $operator_id = $_SESSION['user_id']; // Ganti 'operator_id' dengan 'user_id'

    // Proses upload foto
    $target_dir = "../upload/";  // Path menuju folder uploads di luar folder operator
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar adalah gambar sungguhan atau tidak
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $message = "File yang di-upload bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        $message = "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Batasi ukuran file
    if ($_FILES["foto"]["size"] > 5242880) {  // 5MB
        $message = "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Hanya izinkan format gambar tertentu (jpg, jpeg, png)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $message = "Maaf, hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Jika semua pengecekan lolos, upload file
    if ($uploadOk == 0) {
        $message = "Maaf, gambar tidak bisa di-upload.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $message = "File " . basename($_FILES["foto"]["name"]) . " telah di-upload.";
            $foto_path = basename($_FILES["foto"]["name"]);  // Simpan nama file untuk disimpan di DB
        } else {
            $message = "Maaf, terjadi kesalahan dalam meng-upload file.";
        }
    }

    // Validasi input dan insert data ke database
    if (!empty($nama) && !empty($harga) && !empty($lokasi)) {
        $stmt = $conn->prepare("INSERT INTO lapangan (nama_lapangan, harga, lokasi, deskripsi, foto, operator_id) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $nama, $harga, $lokasi, $deskripsi, $foto_path, $operator_id);

        if ($stmt->execute()) {
            // Ambil ID yang telah terinsert
            $lapangan_id = $stmt->insert_id;  // Mengambil ID yang baru saja dimasukkan
            $lapangan_id_with_prefix = 'LP' . $lapangan_id;  // Tambahkan prefix 'LP'

            // Menampilkan pesan sukses
            $message = "Lapangan berhasil ditambahkan dengan ID: " . $lapangan_id_with_prefix;
        } else {
            $message = "Gagal menambahkan lapangan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Semua kolom harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lapangan - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-start mb-4 text-dark">Tambah Lapangan Baru</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form action="add_lapangan.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lapangan</label>
                <input type="text" class="form-control" id="nama" name="nama_lapangan" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga per Jam</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Lapangan</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
                <small class="form-text text-muted">
                    Ukuran foto tidak lebih dari 5 MB, dan format yang diterima hanya JPG, PNG, atau JPEG.
                </small>
            </div>

            <button type="submit" name="submit" class="btn btn-success w-100">Tambah Lapangan</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
