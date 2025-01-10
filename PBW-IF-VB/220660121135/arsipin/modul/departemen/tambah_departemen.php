<?php
include "../../config/koneksi.php";

// Uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {
    $nama_departemen = $_POST['nama_departemen'];
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen (nama_departemen) VALUES ('$nama_departemen')");

    if ($simpan) {
        echo "<script>
                alert('Simpan Data Sukses');
                document.location='http://localhost/UAS%20PBW/arsipin/admin.php?halaman=departemen';
              </script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');</script>";
    }
    
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-black text-center" style="background-color: #FFEA3C;">
                    <h4 class="mb-0">Tambah Data Departemen</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group mb-4">
                            <label for="nama_departemen" class="form-label">Nama Departemen</label>
                            <input type="text" class="form-control form-control-lg" id="nama_departemen" name="nama_departemen" placeholder="Masukkan nama departemen" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" name="bsimpan" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle"></i> Simpan
                            </button>
                            <a href="../../admin.php?halaman=departemen" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center text-muted">
                    <small>&copy; <?= date('Y') ?> Kelompok 3</small>
                </div>
            </div>
        </div>
    </div>
</div>
