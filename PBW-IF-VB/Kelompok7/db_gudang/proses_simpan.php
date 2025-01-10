<?php

    require_once "config/database.php";

    if (isset($_POST['simpan'])) {

        $id             = mysqli_real_escape_string($db, trim($_POST['id']));
        $nama           = mysqli_real_escape_string($db, trim($_POST['nama']));
        $jenis          = mysqli_real_escape_string($db, trim($_POST['jenis']));
        $merk           = mysqli_real_escape_string($db, trim($_POST['merk']));
        $harga          = mysqli_real_escape_string($db, trim($_POST['harga']));
        $tanggal        = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['tanggal_masuk']))));
        $deskripsi      = mysqli_real_escape_string($db, trim($_POST['deskripsi']));
        $stok           = mysqli_real_escape_string($db, trim($_POST['stok']));
        $nama_file      = $_FILES['foto']['name'];
        $tmp_file       = $_FILES['foto']['tmp_name'];

        $path           ="foto/".$nama_file;

        $query = mysqli_query($db, "SELECT id FROM tbl_barang WHERE id='$id'")
                                    or die('Ada kesalahan pada query tampil data kode barang: '.mysqli_error($db));
        $rows = mysqli_num_rows($query);

        if ($rows > 0) {
            
            header("location: halaman_admin.php?alert=4&id=$id");
        }

        else {

            if (move_uploaded_file($tmp_file, $path)) {
                $insert = mysqli_query($db, "INSERT INTO tbl_barang(id,nama,jenis,merk,
                                            harga,tgl_masuk,deskripsi,stok,foto)
                                            VALUES('$id','$nama','$jenis','$merk',
                                            '$harga','$tanggal','$deskripsi','$stok','$nama_file')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($db));
                
                if ($insert) {
                    header("location: halaman_admin.php?alert=1");
                }
            }
        }
    }
mysqli_close($db);
?>