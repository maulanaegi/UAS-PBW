<?php
    //uji jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
        //pengujian apakah data akan di edit atau simpan baru
        if($_GET['hal'] == "edit"){
            //perintah edit data
            //ubah data
            $ubah = mysqli_query($koneksi, "UPDATE tbl_departemen SET nama_departemen = '$_POST[nama_departemen]' where id_departemen = '$_GET[id]'");
            if($ubah)
            {
                echo "<script> 
                        alert('Ubah Data Sukses'); 
                        document.location='?halaman=departemen';
                        </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            //simpan data
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen VALUES ('', '$_POST[nama_departemen]')");
            if($simpan)
            {
                echo "<script> 
                        alert('Simpan Data Sukses'); 
                        document.location='?halaman=departemen';
                        </script>";
            }
        }
            
    }

    //uji jika tombol edit/hapus di klik
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "edit")
        {
                //tampilkan data yang akan di edit
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen where id_departemen='$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung ke dalam variabel
                $nama_departemen = $data['nama_departemen'];
            }
        } else{
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_departemen where id_departemen='$_GET[id]'");
            if($hapus){
                echo "<script> 
                        alert('Hapus Data Sukses'); 
                        document.location='?halaman=departemen';
                        </script>";
            }
        }
        
    }
?>

    <div class="card mt-3">
    <div class="card-header text-black" style="background-color: rgb(255, 233, 39);">
    Form Data Departemen
  </div>
  <div class="card-body">
        <a href="modul/departemen/tambah_departemen.php" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    <table class="table table-bordered table-hovered table-striped">
        <tr>
            <th>Nomor</th>
            <th>Nama Departemen</th>
            <th>Aksi</th>
        </tr>
        <?php 
            $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by id_departemen desc");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama_departemen']?></td>
            <td>
    <a href="modul/departemen/edit_departemen.php?id=<?=$data['id_departemen']?>" class="btn btn-success">Edit</a>
    <a href="?halaman=departemen&hal=hapus&id=<?=$data['id_departemen']?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
            </td>

        </tr>
        <?php endwhile; ?>
    </table>
  </div>
</div>