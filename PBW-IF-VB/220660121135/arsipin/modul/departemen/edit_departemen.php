<?php
include "../../config/koneksi.php";

// Periksa apakah ID ada di URL
if (!isset($_GET['id'])) {
    echo "<script>
            alert('ID tidak ditemukan!');
            document.location='admin.php?halaman=departemen';
          </script>";
    exit;
}

// Ambil data berdasarkan ID
$id_departemen = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen WHERE id_departemen='$id_departemen'");
$data = mysqli_fetch_array($tampil);

if (!$data) {
    echo "<script>
            alert('Data tidak ditemukan!');
            document.location='admin.php?halaman=departemen';
          </script>";
    exit;
}

// Uji jika tombol simpan di klik
if (isset($_POST['bupdate'])) {
    $nama_departemen = $_POST['nama_departemen'];
    $ubah = mysqli_query($koneksi, "UPDATE tbl_departemen SET nama_departemen='$nama_departemen' WHERE id_departemen='$id_departemen'");

    if ($ubah) {
        echo "<script>
                alert('Ubah Data Sukses');
                document.location='http://localhost/UAS%20PBW/arsipin/admin.php?halaman=departemen';
              </script>";
    } else {
        echo "<script>
                alert('Ubah Data Gagal');
              </script>";
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-black" style="background-color: #FFE828;">
                    <h4 class="mb-0 text-center">Ubah Data Departemen</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group mb-3">
                            <label for="nama_departemen" class="form-label">Nama Departemen</label>
                            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" value="<?= htmlspecialchars($data['nama_departemen']) ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="bupdate" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Update
                            </button>
                            <a href="admin.php?halaman=departemen" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
