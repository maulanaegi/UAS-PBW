<?php

    require_once "config/database.php";

    if (isset($_POST['simpan'])) {
        if (isset($_POST['id'])) {

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

            if (empty($nama_file)) {

                $update = mysqli_query($db, "UPDATE tbl_barang SET
                                            nama            = '$nama',
                                            jenis           = '$jenis',
                                            merk            = '$merk',
                                            harga           = '$harga',
                                            tgl_masuk       = '$tanggal',
                                            deskripsi       = '$deskripsi',
                                            stok            = '$stok'
                                            WHERE id        = '$id'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($db));
            
                if ($update) {
                    header("location: halaman_admin.php?alert=2");
                    }
                }
            
            else {
                if(move_uploaded_file($tmp_file, $path)) {
                    
                    $update = mysqli_query($db, "UPDATE tbl_barang SET
                                                nama            = '$nama',
                                                jenis           = '$jenis',
                                                merk            = '$merk',
                                                harga           = '$harga',
                                                tgl_masuk       = '$tanggal',
                                                deskripsi       = '$deskripsi',
                                                stok            = '$stok',
                                                foto            = '$nama_file'
                                                WHERE id        = '$id'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($db));
                    if ($update) {
                        header("location: halaman_admin.php?alert=2");
                    }
                }
            }
        }
    }
mysqli_close($db);
?>