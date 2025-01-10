<?php
session_start();
include '../includes/db_connection.php';
include 'navbar.php';

// Cek apakah user sudah login dan memiliki role 'operator'
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'operator') {
    header('Location: /login.php');
    exit();
}

// Ambil ID lapangan yang ingin diubah
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: profile.php');
    exit();
}

$lapangan_id = $_GET['id'];

// Ambil data lapangan dari database
$stmt = $conn->prepare("SELECT * FROM lapangan WHERE id = ?");
$stmt->bind_param("i", $lapangan_id);
$stmt->execute();
$result = $stmt->get_result();
$lapangan = $result->fetch_assoc();
$stmt->close();

// Proses update lapangan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $nama = $_POST['nama_lapangan'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $foto_path = $lapangan['foto']; // Gunakan foto lama jika tidak diubah

    // Proses upload foto jika ada file baru
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file foto
        if (getimagesize($_FILES["foto"]["tmp_name"]) && $_FILES["foto"]["size"] <= 5242880 && in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $foto_path = basename($_FILES["foto"]["name"]);
            } else {
                $message = "Gagal mengupload file foto.";
            }
        } else {
            $message = "Foto tidak valid. Pastikan formatnya JPG, JPEG, atau PNG dan ukurannya kurang dari 5 MB.";
        }
    }

    // Validasi input
    if (!empty($nama) && !empty($harga) && !empty($lokasi) && !empty($deskripsi)) {
        $stmt = $conn->prepare("UPDATE lapangan SET nama_lapangan = ?, harga = ?, lokasi = ?, deskripsi = ?, foto = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $nama, $harga, $lokasi, $deskripsi, $foto_path, $lapangan_id);

        if ($stmt->execute()) {
            $message = "Lapangan berhasil diubah.";
        } else {
            $message = "Gagal mengubah lapangan: " . $stmt->error;
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
    <title>Edit Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Edit Lapangan</h1>

    <?php if (isset($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="edit_lapangan.php?id=<?php echo $lapangan['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lapangan</label>
            <input type="text" class="form-control" id="nama" name="nama_lapangan" value="<?php echo htmlspecialchars($lapangan['nama_lapangan']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Jam</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($lapangan['harga']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo htmlspecialchars($lapangan['lokasi']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo htmlspecialchars($lapangan['deskripsi']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Lapangan</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <small class="form-text text-muted">
                Format yang diterima: JPG, PNG, JPEG. Maksimum 5 MB.
            </small>
            <?php if (!empty($lapangan['foto'])): ?>
                <div class="mt-2">
                    <img src="../upload/<?php echo $lapangan['foto']; ?>" alt="Foto Lapangan" class="img-thumbnail" style="max-height: 150px;">
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" name="submit" class="btn btn-warning w-100">Ubah Lapangan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
