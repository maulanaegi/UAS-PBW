<?php
include "../../config/koneksi.php";

// Validasi ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); document.location='../../admin.php?halaman=pengirim_surat';</script>";
    exit;
}

$id = $_GET['id'];

// Ambil data untuk ditampilkan di form
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat WHERE id_pengirim_surat = '$id'");
if (!$tampil || mysqli_num_rows($tampil) == 0) {
    echo "<script>alert('Data tidak ditemukan!'); document.location='../../admin.php?halaman=pengirim_surat';</script>";
    exit;
}
$data = mysqli_fetch_array($tampil);

// Proses ketika form di-submit
if (isset($_POST['bsimpan'])) {
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    // Validasi server-side
    if (!preg_match('/^[0-9]{1,13}$/', $no_hp)) {
        echo "<script>alert('Nomor HP hanya boleh angka dan maksimal 13 karakter!');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email tidak valid!');</script>";
    } else {
        // Update data pengirim surat
        $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
            nama_pengirim = '$_POST[nama_pengirim]', 
            alamat = '$_POST[alamat]', 
            no_hp = '$no_hp', 
            email = '$email' 
            WHERE id_pengirim_surat = '$id'");

        if ($ubah) {
            echo "<script>
                    alert('Ubah Data Sukses'); 
                    document.location='../../admin.php?halaman=pengirim_surat';
                  </script>";
        } else {
            echo "<script>
                    alert('Ubah Data Gagal: " . mysqli_error($koneksi) . "'); 
                  </script>";
        }
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-black" style="background-color: #FFE927;">
                    <h5 class="mb-0">Form Edit Data Pengirim Surat</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="edit_pengirim_surat.php?id=<?=$id?>" onsubmit="return validateForm()">
                        <div class="form-group mb-3">
                            <label for="nama_pengirim">Nama Pengirim Surat</label>
                            <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" 
                                   value="<?=$data['nama_pengirim']?>" placeholder="Masukkan nama pengirim" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" 
                                   value="<?=$data['alamat']?>" placeholder="Masukkan alamat" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp">No HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" 
                                   value="<?=$data['no_hp']?>" placeholder="Masukkan nomor HP" 
                                   oninput="limitInput(this)" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?=$data['email']?>" placeholder="Masukkan email" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="bsimpan" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="../../admin.php?halaman=pengirim_surat" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function limitInput(input) {
    const maxLength = 13;
    if (input.value.length > maxLength) {
        input.value = input.value.slice(0, maxLength);
    }
}

function validateForm() {
    const no_hp = document.getElementById("no_hp").value;
    const email = document.getElementById("email").value;

    if (!/^[0-9]{1,13}$/.test(no_hp)) {
        alert("Nomor HP hanya boleh angka dan maksimal 13 karakter");
        return false;
    }

    if (!email.includes("@")) {
        alert("Email harus mengandung '@'");
        return false;
    }

    return true;
}
</script>
