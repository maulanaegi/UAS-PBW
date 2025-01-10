<?php
    //panggil fucntion.php untuk upload file
    include "config/function.php";

    //uji jika tombol edit/hapus di klik
    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "edit")
        {
                //tampilkan data yang akan di edit
            $tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp FROM tbl_arsip, tbl_departemen, tbl_pengirim_surat WHERE tbl_arsip.id_departemen = tbl_departemen.id_departemen and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat and tbl_arsip.id_arsip='$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung ke dalam variabel
                $no_surat = $data['no_surat'];
                $tanggal_surat = $data['tanggal_surat'];
                $tanggal_diterima = $data['tanggal_diterima'];
                $perihal = $data['perihal'];
                $vid_departemen = $data['id_departemen'];
                $vnama_departemen = $data['nama_departemen'];
                $vid_pengirim = $data['id_pengirim'];
                $vnama_pengirim = $data['nama_pengirim'];
                $vfile = $data['file'];
            }
        }
        elseif($_GET['hal'] == 'hapus')
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_arsip where id_arsip='$_GET[id]'");
            if($hapus){
                echo "<script> 
                        alert('Hapus Data Sukses'); 
                        document.location='?halaman=arsip_surat';
                        </script>";
            }
        }
        
    }

    //uji jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
        //pengujian apakah data akan di edit atau simpan baru
        if(@$_GET['hal'] == "edit"){
            //perintah edit data
            //ubah data
            
            //cek apakah user pilih file/foto atau tidak
            if($_FILES['file']['error'] === 4){
                $file = $vfile;
            }else{
                $file = upload();
            }

            $ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET no_surat = '$_POST[no_surat]', tanggal_surat = '$_POST[tanggal_surat]', tanggal_diterima = '$_POST[tanggal_diterima]', perihal = '$_POST[perihal]', id_departemen = '$_POST[id_departemen]', id_pengirim = '$_POST[id_pengirim]', file = '$file' where id_arsip = '$_GET[id]' ");
            if($ubah)
            {
                echo "<script> 
                        alert('Ubah Data Sukses'); 
                        document.location='?halaman=arsip_surat';
                        </script>";
            }
            else{
                echo "<script> 
                        alert('Ubah Data Gagal'); 
                        document.location='?halaman=arsip_surat';
                        </script>";
            }
        }
        else
        {
            //perintah simpan data baru
            //simpan data
            $file = upload();
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip VALUES ('', '$_POST[no_surat]', '$_POST[tanggal_surat]', '$_POST[tanggal_diterima]', '$_POST[perihal]', '$_POST[id_departemen]', '$_POST[id_pengirim]', '$file')");
            if($simpan)
            {
                echo "<script> 
                        alert('Simpan Data Sukses'); 
                        document.location='?halaman=arsip_surat';
                        </script>";
            }else{
                echo "<script> 
                        alert('Simpan Data Gagal!'); 
                        document.location='?halaman=arsip_surat';
                        </script>";
            }
        }
            
    }

    
?>

<div class="card mt-3">
    <div class="card-header text-black" style="background-color: rgb(255, 233, 39);">
    Form Data Arsip Surat
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="no_surat">Nomor Surat</label>
        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?=@$no_surat?>">        
    </div>
    <div class="form-group">
        <label for="tanggal_surat">Tanggal Surat</label>
        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?=@$tanggal_surat?>">        
    </div>  
    <div class="form-group">
        <label for="tanggal_diterima">Tanggal Diterima</label>
        <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" value="<?=@$tanggal_diterima?>">        
    </div>
    <div class="form-group">
        <label for="perihal">Perihal</label>
        <input type="text" class="form-control" id="perihal" name="perihal" value="<?=@$perihal?>">        
    </div> 
    <div class="form-group">
        <label for="id_departemen">Departemen/Tujuan</label>
        <select class="form-control" name="id_departemen"><option value="<?=@$vid_departemen?>"><?=@$vnama_departemen?></option>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen order by nama_departemen asc");
            while($data = mysqli_fetch_array($tampil)){
                echo "<option value = '$data[id_departemen]'> $data[nama_departemen]</option>";
            }
        ?>
        </select>        
    </div> 

    <div class="form-group">
        <label for="id_pengirim">Pengirim Surat</label>
        <select class="form-control" name="id_pengirim"><option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat order by nama_pengirim asc");
            while($data = mysqli_fetch_array($tampil)){
                echo "<option value = '$data[id_pengirim_surat]'> $data[nama_pengirim]</option>";
            }
        ?>
        </select>        
    </div> 
    <div class="form-group">
        <label for="file">Pilih File</label>
        <input type="file" class="form-control" id="file" name="file" value="<?=@$file?>">        
    </div>

    <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
    <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
    </form>
  </div>
</div>