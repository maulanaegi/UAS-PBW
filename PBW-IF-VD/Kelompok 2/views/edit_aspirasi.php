<?php
// Pastikan $row sudah ada dan berisi data aspirasi yang ingin diedit
if (isset($row)) {
    $judul = htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8');
    $nama = htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8');
    $jenis_kelamin = $row['jenis_kelamin'];
    $isi_aspirasi = htmlspecialchars($row['isi_aspirasi'], ENT_QUOTES, 'UTF-8');
}

// Cek apakah form telah disubmit dan lakukan update aspirasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']); // Pastikan id adalah integer
    $judul = trim(htmlspecialchars($_POST['judul'], ENT_QUOTES, 'UTF-8'));
    $nama = !empty($_POST['nama']) ? trim(htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8')) : 'Anonim';
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $isi_aspirasi = trim(htmlspecialchars($_POST['isi_aspirasi'], ENT_QUOTES, 'UTF-8'));

    // Validasi input
    if (empty($judul) || empty($isi_aspirasi)) {
        echo "<div class='alert alert-danger'>Judul dan isi aspirasi wajib diisi.</div>";
    } else {
        try {
            // Memperbarui aspirasi di database
            $updateResult = $this->aspirasiModel->updateAspirasi($id, $judul, $nama, $jenis_kelamin, $isi_aspirasi);
            
            if ($updateResult) {
                // Redirect ke halaman utama setelah sukses update
                echo "<script>
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Aspirasi telah berhasil diperbarui.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php'; // Redirect ke halaman index setelah OK
                            }
                        });
                      </script>";
            } else {
                echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aspirasi</title>
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Pastikan ini dimuat di sini -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-control,
        .form-select,
        .textarea {
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        footer {
            margin-top: 40px;
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        footer a {
            text-decoration: none;
            color: #007bff;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Aspirasi</h1>
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="judul" class="form-label">Judul Aspirasi:</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $judul ?>" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama (Opsional):</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Tidak dipilih" <?= $jenis_kelamin == 'Tidak dipilih' ? 'selected' : '' ?>>Tidak dipilih</option>
                            <option value="Laki-laki" <?= $jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="isi_aspirasi" class="form-label">Isi Aspirasi:</label>
                        <textarea class="form-control" id="isi_aspirasi" name="isi_aspirasi" rows="5" required><?= $isi_aspirasi ?></textarea>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary w-100 mt-3">Update Aspirasi</button>
                </form>
            </div>
        </div>

        <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Daftar Aspirasi</a>

    </div>

    <footer>
    <?php $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <a href="<?php echo $base_url; ?>/views/tentangkami.php">Tentang Kami</a> <br> 
    </footer>

    <!-- Tambahkan JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Pastikan ini dimuat setelah pustaka lainnya -->

    <script>
        // Menangani notifikasi SweetAlert setelah form di-submit
        <?php if (isset($updateResult) && $updateResult): ?>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Aspirasi telah berhasil diperbarui.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Redirect ke halaman index setelah OK
                }
            });
        <?php endif; ?>
    </script>

</body>
</html>
