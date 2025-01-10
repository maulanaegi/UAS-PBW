<?php

    if (isset($_POST['cari'])) {
        $cari = $_POST['cari'];
    }

    else {
        $cari = "";
    }
?>

<div class="row">
    <div class="col-md-12">
    <?php

        if (empty($_GET['alert'])) {
            echo "";
        }

        elseif ($_GET['alert'] == 1) { 
    ?>
            <div class ="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i>Sukses!</strong> Data Barang berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }

        elseif ($_GET['alert'] == 2) { 
    ?>
            <div class ="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i>Sukses!</strong> Data Barang berhasil diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }

        elseif ($_GET['alert'] == 3) { 
    ?>
            <div class ="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i>Sukses!</strong> Data Barang berhasil dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }

        elseif ($_GET['alert'] == 4) { 
    ?>
            <div class ="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i>Gagal!</strong> Karena ID <b><?php echo $_GET['id']; ?></b> Sudah ada.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>

        <form class="mr-3" action="halaman_admin.php" method="post">
            <div class="form-row">
                <div class="col-3">
                    <input type="text" class="form-control" name="cari" placeholder="Cari Kode Barang" value="<?php echo $cari; ?>">
                    <br>
                    <a class="btn btn-success" href="?page=tambah" id="button-tambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info" href="cetak_laporan.php" id="button-cetak" role="button"><i class="fas fa-print"></i> Cetak Laporan</a>
                </div>

                <div class="col-8">
                    <button type="submit" class="btn btn-dark" id="button-cari">Cari</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-danger" href="logout.php" id="button-logout" role="button"><i class="fas fa-window-close"></i> Logout</a>
                </div>

                <div class="col-1">
                    
                </div>
            </div>
        </form>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Foto</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Tgl Masuk</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
        
        <tbody>
        <?php
            $batas = 5;

            if(isset($cari)) {
                $query_jumlah = mysqli_query($db, "SELECT  count(id) as jumlah FROM tbl_barang
                WHERE id LIKE '%$cari%' OR nama LIKE '%$cari%'")
                or die('Ada Kesalahan pada query jumlah:'.mysqli_error($db));
            }

            else {
                $query_jumlah = mysqli_query($db, "SELECT count(id) as jumlah FROM tbl_barang")
                or die('Ada Kesalahan pada query jumlah:'.mysqli_error($db));
            }

            $data_jumlah = mysqli_fetch_assoc($query_jumlah);
            $jumlah      = $data_jumlah['jumlah'];
            $halaman     = ceil($jumlah / $batas);
            $page        = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
            $mulai       = ($page - 1) * $batas;

            $no = $mulai + 1;

            if (isset($cari)) {
                $query = mysqli_query($db, "SELECT * FROM tbl_barang WHERE id LIKE '%$cari%' ORDER BY id ASC LIMIT $mulai, $batas")
                or die ('Ada kesalahan pada query barang: '.mysqli_error($db));
            }

            else {
                $query = mysqli_query($db, "SELECT * FROM tbl_barang ORDER BY id ASC LIMIT $mulai, $batas")
                or die('Ada kesalahan pada query barang: '.mysqli_error($db));
            }

            while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td width="30" class="center">  <?php echo $no; ?></td>
                    <td width="110" class="center"> <?php echo $data['id']; ?></td>
                    <td width="180" class="center"> <?php echo $data['nama']; ?></td>
                    <td width="45" class="center">  <img class="foto-thumbnail" src='foto/<?php echo $data['foto']; ?>' alt="Foto Barang"></td>
                    <td width="120" class="center"> <?php echo $data['jenis']; ?></td>
                    <td width="100" class="center"> <?php echo $data['merk']; ?></td>
                    <td width="100" class="center"> <?php echo $data['harga']; ?></td>
                    <td width="100" class="center"> <?php echo $data['tgl_masuk']; ?></td>
                    <td width="100" class="center"> <?php echo $data['deskripsi']; ?></td>
                    <td width="40" class="center">  <?php echo $data['stok']; ?></td>
                    <td width="120" class="center">
                        <a title="Ubah" class="btn btn-outline-warning" href="?page=ubah&id=<?php echo $data['id']; ?>">
                            <i class="fas fa-edit"></i></a>
                        <a title="Hapus" class="btn btn-outline-danger" href="proses_hapus.php?id=<?php echo $data['id']; ?>"
                            onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nama']; ?>?');">
                            <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php
                $no++;
            } ?>
        <tbody>
        </table>

        <?php 

        if (empty($_GET['hal'])) {
            $halaman_aktif = '1';
        }

        else {
            $halaman_aktif = $_GET['hal'];
        }
        ?>

        <div class="row">
            <div class="col">
                <a>Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> - Total <?php echo $jumlah; ?> data </a>
            </div>
            <div class="col">
                <nav aria-label="Page navigation  example">
                <ul class="pagination justify-content-end">
                <?php
                if($halaman_aktif<='1') { ?>
                    <li class="page-item disabled"> <span class="page-link">Sebelumnya</span></li>
                <?php
                }
                else { ?>
                    <li class="page-item"><a class="page-link" href="?hal=<?php echo $page -1 ?>">Sebelumnya</a></li>
                <?php } ?>

                <?php
                for($x=1; $x<=$halaman; $x++) { ?>
                    <li class="page-item"><a class="page-link" href="?hal=<?php echo $x ?>"><?php echo $x ?></a></li>
                <?php } ?>

                <?php
                if ($halaman_aktif>=$halaman) { ?>
                    <li class="page-item disabled"> <span class="page-link">Selanjutnya</span></li>
                <?php
                }
                else { ?>
                    <li class="page-item"><a class="page-link" href="?hal=<?php echo $page +1 ?>">Selanjutnya</a></li>
                <?php } ?>
                </ul>
                </nav>
            </div>
        </div>
    </div>
</div>