<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi</title>
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card-text {
            white-space: pre-wrap;
            /* Agar Isi Aspirasi bisa multiline */
        }

        .card-body {
            padding-bottom: 20px;
            /* Memberikan jarak bawah untuk card */
        }

        .card-columns {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .card {
            flex: 1 1 calc(33% - 1rem);
            /* Membuat kartu fleksibel dengan ukuran 33% */
            box-sizing: border-box;
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


        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 1rem);
                /* Mengubah ukuran kartu menjadi 50% pada layar kecil */
            }
        }

        @media (max-width: 576px) {
            .card {
                flex: 1 1 100%;
                /* Mengubah ukuran kartu menjadi 100% pada layar sangat kecil */
            }
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Form Aspirasi</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama (Opsional):</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                        <option value="Tidak dipilih">Tidak dipilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="isi_aspirasi" class="form-label">Isi Aspirasi:</label>
                    <textarea name="isi_aspirasi" id="isi_aspirasi" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>

    <?php if (isset($_GET['edit'])): ?>
        <?php
        // Ambil data dari database berdasarkan ID yang dipilih
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM aspirasi WHERE id = $id");
        $row = $result->fetch_assoc();
        ?>

        <h1 class="text-center mb-4">Edit Aspirasi</h1>
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul:</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?= $row['judul'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama (Opsional):</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $row['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="Tidak dipilih" <?= $row['jenis_kelamin'] == 'Tidak dipilih' ? 'selected' : '' ?>>Tidak dipilih</option>
                            <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_aspirasi" class="form-label">Isi Aspirasi:</label>
                        <textarea name="isi_aspirasi" id="isi_aspirasi" class="form-control" rows="4" required><?= $row['isi_aspirasi'] ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

        <h2 class="text-center mt-5">Daftar Aspirasi</h2>
<div class="card-columns">
<?php while ($row = $result->fetch_assoc()) : ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title"><?= $row['judul'] ?></h5>
            <div class="mb-2">
                <strong>Tanggal:</strong> <?= $row['tanggal'] ?>
            </div>
            <div class="mb-2">
                <strong>Nama:</strong> <?= $row['nama'] ?>
            </div>
            <div class="mb-2">
                <strong>Jenis Kelamin:</strong> <?= $row['jenis_kelamin'] ?>
            </div>
            <br>
            <p class="card-text"><?= nl2br($row['isi_aspirasi']) ?></p>

            <!-- Tombol Like hanya ditampilkan jika pengguna belum memberi like -->
            <?php if (!isset($_COOKIE['liked_' . $row['id']])): ?>
                <div>
                    <span><strong>Like: </strong><?= $row['like_count'] ?></span>
                    <a href="?like=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm ms-2">
                        <i class="fas fa-thumbs-up"></i> 
                    </a>
                </div>
            <?php else: ?>
                <div>
                    <span><strong>Like: </strong><?= $row['like_count'] ?></span>
                    <span class="text-muted ms-2">Kamu sudah menyukai ini.</span>
                </div>
            <?php endif; ?>

            <!-- Tombol Hapus dengan Ikon Tong Sampah -->
            <a href="#" class="btn btn-danger btn-sm delete-btn ms-2" data-id="<?= $row['id'] ?>">
                <i class="fas fa-trash-alt"></i> 
            </a>
            <!-- Tombol Edit dengan Ikon Pensil -->
<a href="?edit=<?= $row['id'] ?>" class="btn btn-warning btn-sm ms-2">
    <i class="fas fa-edit"></i> 
</a>
        </div>
    </div>
<?php endwhile; ?>
</div>
    <!-- Footer -->
    <?php
$base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
?>
<footer>
    <a href="<?php echo $base_url; ?>/views/tentangkami.php">Tentang Kami</a>
</footer>



        <!-- Tambahkan JavaScript Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Menangani klik tombol hapus dengan SweetAlert2
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const aspirasiId = this.getAttribute('data-id'); // Mendapatkan ID dari atribut data-id

                    // Menampilkan SweetAlert2 konfirmasi
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Aspirasi ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika konfirmasi hapus, lakukan penghapusan
                            window.location.href = '?delete=' + aspirasiId; // Mengarahkan ke URL dengan ID yang akan dihapus
                        }
                    });
                });
            });
        </script>

</body>

</html>