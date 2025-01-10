<?php

    require_once "config/database.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = mysqli_query($db, "SELECT foto FROM tbl_barang WHERE id='$id'")
                                    or die('Ada kesalahan pada query tampil data foto :'.mysqli_query($db));
        $data = mysqli_fetch_assoc($query);

        $foto = $data['foto'];

        $hapus_file = unlink("foto/$foto");

            if ($hapus_file) {
                $delete = mysqli_query($db, "DELETE FROM tbl_barang WHERE id='$id'")
                                            or die('Ada kesalahan pada query delete :'.mysql_error($db));
                if ($delete) {
                    header("location: halaman_admin.php?alert=3");
                }
            }
        }
    mysqli_close($db);
?>