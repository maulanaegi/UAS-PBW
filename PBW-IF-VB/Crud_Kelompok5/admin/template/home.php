<?php
// Include file konfigurasi database atau fungsi lainnya jika diperlukan
include('config.php'); // Sesuaikan dengan file konfigurasi Anda
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <style>
        /* Mengatur latar belakang gambar untuk bagian utama */
        #main-content {
            background-image: url('Baground/Tampilan_utama.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 20px;
            color: #fff;
        }

        /* Panel gaya */
        .panel {
            background-color: rgba(255, 255, 255, 0); /* Latar belakang putih dengan transparansi */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgb(0, 0, 0);
        }

        .panel-heading {
            font-weight: bold;
            font-size: 16px;
        }

        .panel-footer a {
            text-decoration: none;
            color: #007bff;
        }

        .panel-footer a:hover {
            text-decoration: underline;
        }

        /* Kalender */
        #my-calendar {
            background-color: rgba(255, 255, 255, 0); /* Latar belakang putih semi-transparan */
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .panel.green-panel {
            background-color: rgba(0, 128, 0, 0.8); /* Warna hijau semi-transparan */
            color: #fff;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row" style="margin-left: 1pc; margin-right: 1pc;">
                        <h1>DASHBOARD</h1>
                        <hr>
                        
                        <?php 
                        $sql = "SELECT * FROM barang WHERE stok <= 3";
                        $row = $config->prepare($sql);
                        $row->execute();
                        $r = $row->rowCount();
                        if ($r > 0) {
                            echo "
                            <div class='alert alert-warning'>
                                <span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. Silahkan pesan lagi !!
                                <span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
                            </div>
                            ";	
                        }
                        ?>
                        
                        <?php $hasil_barang = $lihat->barang_row(); ?>
                        <?php $hasil_kategori = $lihat->kategori_row(); ?>
                        <?php $stok = $lihat->barang_stok_row(); ?>
                        <?php $jual = $lihat->jual_row(); ?>

                        <div class="row">
                            <!-- Status Panels -->
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h5><i class="fa fa-desktop"></i> Nama Barang</h5>
                                    </div>
                                    <div class="panel-body">
                                        <center><h1><?php echo number_format($hasil_barang); ?></h1></center>
                                    </div>
                                    <div class="panel-footer">
                                        <h4><a href='index.php?page=barang'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h5><i class="fa fa-desktop"></i> Stok Barang</h5>
                                    </div>
                                    <div class="panel-body">
                                        <center><h1><?php echo number_format($stok['jml']); ?></h1></center>
                                    </div>
                                    <div class="panel-footer">
                                        <h4><a href='index.php?page=barang'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h5><i class="fa fa-desktop"></i> Telah Terjual</h5>
                                    </div>
                                    <div class="panel-body">
                                        <center><h1><?php echo number_format($jual['stok']); ?></h1></center>
                                    </div>
                                    <div class="panel-footer">
                                        <h4><a href='index.php?page=laporan'>Tabel Laporan <i class='fa fa-angle-double-right'></i></a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h5><i class="fa fa-desktop"></i> Kategori Barang</h5>
                                    </div>
                                    <div class="panel-body">
                                        <center><h1><?php echo number_format($hasil_kategori); ?></h1></center>
                                    </div>
                                    <div class="panel-footer">
                                        <h4><a href='index.php?page=kategori'>Tabel Kategori <i class='fa fa-angle-double-right'></i></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 ds">
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix" style="padding-top: 18%;"></div>
        </section>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
