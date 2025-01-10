<?php

require_once "config/database.php";

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi Pengelolaan Data Stok Barang dengan PHP 7, MySQLi, dan Bootstrap 4">
        <meta name="keywords" content="Aplikasi Pengelolaan Data Stok Barang dengan PHP 7, MySQLi, dan Bootstrap 4">
        <meta name="author" content="Kelompok6">

        <link rel="shortcut icon" href="assets/img/favicon.png">

        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.2-web/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <title> Data Stok Barang </title>
        <style>
            body {
                background-image: url('assets/img/gd1.jpg'); /* Ganti dengan path gambar Anda */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            .table-background {
                background-color: rgba(255, 255, 255, 0.8); /* Warna background tabel dengan transparansi */
                border-radius: 10px; /* Sudut melengkung */
                padding: 20px; /* Padding di dalam tabel */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan */
            }
        </style>
    </head>
<body><br>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal"><i class="fas fa-home title-icon"></i>Data Stok Barang Toko</h5>
        </div>
    </div>

    <div class="container-fluid">
        <div class="table-background">
            <table class="custom-table">
                <!-- Isi tabel -->
            </table>
            <?php
                if (empty($_GET["page"])){
                    include "tampil_data.php";
                }
                elseif ($_GET['page']=='tambah'){
                    include "form_tambah.php";
                }
                elseif ($_GET['page']=='ubah'){
                    include "form_ubah.php";
                }
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <footer class="pt-4 my-md-4 pt-md-3 border-top">
            <div class="row">
                <div class="col-12 col-md center">
                    &copy; 2025 - <a class="text-info" href="#">Gudang Toko</a>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.2-web/js/all.min.js"></script>
    <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function getkey(e) {
            if (window.event)
                return window.event.keyCode;
            else if (e)
                return e.which;
            else
                return null;
        }

        function goodchars(e, goods, field) {
            var key, keychar;
            key = getkey(e);
            if (key == null) return true;
            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();

            if (goods.indexOf(keychar) != -1)
                return true;

            if ( key==null || key==0 || key==8 || key==9 || key==27 )
                return true;
        }
    </script>
</body>
</html>