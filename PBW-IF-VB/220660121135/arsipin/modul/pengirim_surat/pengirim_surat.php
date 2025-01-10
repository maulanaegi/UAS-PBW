<?php
// Uji jika tombol Simpan di klik
if (isset($_POST['bsimpan'])) {
    // Pengujian apakah data akan di edit atau simpan baru
    if (@$_GET['hal'] == "edit") {
        // Perintah edit data
        $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
            nama_pengirim = '$_POST[nama_pengirim]', 
            alamat = '$_POST[alamat]', 
            no_hp = '$_POST[no_hp]', 
            email = '$_POST[email]' 
            WHERE id_pengirim_surat = '$_GET[id]'");
        if ($ubah) {
            echo "<script>
                    alert('Ubah Data Sukses'); 
                    document.location='?halaman=pengirim_surat';
                  </script>";
        } else {
            echo "<script>
                    alert('Ubah Data Gagal'); 
                    document.location='?halaman=pengirim_surat';
                  </script>";
        }
    } else {
        // Perintah simpan data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat VALUES (
            '', 
            '$_POST[nama_pengirim]', 
            '$_POST[alamat]', 
            '$_POST[no_hp]', 
            '$_POST[email]')");
        if ($simpan) {
            echo "<script>
                    alert('Simpan Data Sukses'); 
                    document.location='?halaman=pengirim_surat';
                  </script>";
        } else {
            echo "<script>
                    alert('Simpan Data Gagal!'); 
                    document.location='?halaman=pengirim_surat';
                  </script>";
        }
    }
}

// Uji jika tombol edit/hapus di klik
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        // Tampilkan data yang akan di edit
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat WHERE id_pengirim_surat='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            // Jika data ditemukan, maka data ditampung ke dalam variabel
            $nama_pengirim = $data['nama_pengirim'];
            $alamat = $data['alamat'];
            $no_hp = $data['no_hp'];
            $email = $data['email'];
        }
    } else {
        // Perintah hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengirim_surat WHERE id_pengirim_surat='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                    alert('Hapus Data Sukses'); 
                    document.location='?halaman=pengirim_surat';
                  </script>";
        }
    }
}
?>

<!-- Tombol untuk menambah data baru -->
<div class="card mt-3">
    
    <div class="card-header text-black" style="background-color: rgb(255, 233, 39);">
        Daftar Data Pengirim Surat
    </div>
    <div class="card-body">
    <div class="mb-3">
    <a href="modul/pengirim_surat/tambah_pengirim_surat.php" class="btn btn-primary">Tambah Data</a>
    </div>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Nomor</th>
                <th>Nama Pengirim Surat</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat ORDER BY id_pengirim_surat DESC");
                $no = 1;
                while ($data = mysqli_fetch_array($tampil)) :
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data['nama_pengirim']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['no_hp']?></td>
                <td><?=$data['email']?></td>
                <td>
                    <a href="modul/pengirim_surat/edit_pengirim_surat.php?id=<?=$data['id_pengirim_surat']?>" class="btn btn-success">
                        Edit
                    </a>
                    <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim_surat']?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
