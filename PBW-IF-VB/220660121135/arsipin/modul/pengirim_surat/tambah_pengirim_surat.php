<?php

include "../../config/koneksi.php";
// Proses penyimpanan data
if(isset($_POST['bsimpan'])) {
    // Validasi server-side nomor HP dan email
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    if(!preg_match('/^[0-9]{1,13}$/', $no_hp)) {
        echo "<script>
                alert('Nomor HP hanya boleh angka dan maksimal 13 karakter');
              </script>";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Email tidak valid');
              </script>";
    } else {
        // Simpan data pengirim surat baru
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat VALUES ('', '$_POST[nama_pengirim]', '$_POST[alamat]', '$no_hp', '$email')");
        if($simpan) {
            echo "<script> 
                    alert('Simpan Data Sukses'); 
                    document.location='http://localhost/UAS%20PBW/arsipin/admin.php?halaman=pengirim_surat';
                  </script>";
        } else {
            echo "<script> 
                    alert('Simpan Data Gagal!'); 
                  </script>";
        }
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="card mt-5 mx-auto" style="max-width: 600px;">
  <div class="card-header text-black" style="background-color: rgb(255, 233, 39);">
      Form Data Pengirim Surat
  </div>
  <div class="card-body">
    <form method="post" action="" onsubmit="return validateForm()">
      <div class="form-group mb-3">
        <label for="nama_pengirim">Nama Pengirim Surat</label>
        <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" required>
      </div>
      <div class="form-group mb-3">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" required>
      </div>  
      <div class="form-group mb-3">
        <label for="no_hp">No HP</label>
        <input type="number" class="form-control" id="no_hp" name="no_hp" oninput="limitInput(this)" pattern="[0-9]{1,13}" title="Hanya angka, maksimal 13 karakter" required>
      </div> 
      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div> 
      <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
      <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
    </form>
  </div>
</div>

<script>
function validateForm() {
    const no_hp = document.getElementById("no_hp").value;
    const email = document.getElementById("email").value;

    // Validasi nomor HP
    if (!/^[0-9]{1,13}$/.test(no_hp)) {
        alert("Nomor HP hanya boleh angka dan maksimal 13 karakter");
        return false;
    }

    // Validasi email
    if (!email.includes("@")) {
        alert("Email harus mengandung '@'");
        return false;
    }

    return true;
}
function limitInput(input) {
    const maxLength = 13;
    if (input.value.length > maxLength) {
        input.value = input.value.slice(0, maxLength); // Batasi input hingga maksimal 13 karakter
    }
}
</script>
