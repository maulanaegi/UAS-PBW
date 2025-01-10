<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran</title>
  <style>
    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7f6;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 30px auto;
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .box-title {
      background-color: #007bff;
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 8px 8px 0 0;
    }

    h1 {
      text-align: center;
      color: #007bff;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .article {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    .article td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    .article tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .article th {
      background-color: #007bff;
      color: white;
      padding: 10px;
    }

    .tombol-biru {
      background-color: #007bff;
      color: white;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 4px;
      display: inline-block;
    }

    .tombol-biru:hover {
      background-color: #0056b3;
    }

    .link {
      color: #007bff;
      text-decoration: none;
    }

    .link:hover {
      text-decoration: underline;
    }

    .form-container {
      margin-top: 20px;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .article td, .article th {
        padding: 8px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="box-title">
      <p>Beranda / <b>Produk Jualan</b></p>
    </div>

    <h1>Pembayaran</h1>

    <?php

    include 'lib/koneksi.php';


    $total = $_GET['jum'];
    $id = $_GET['id'];
    try {
      $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $insert = $conn->prepare("INSERT INTO tbl_pesanan (id_user,id_barang,ukuran,qty,kurir,date_in,total) SELECT id_user,id_barang,ukuran,qty,kurir,date_in,total FROM tbl_keranjang WHERE id_user=:id");
      $insert->bindparam(':id', $id);
      $insert->execute();

      $delete = $conn->prepare("DELETE FROM tbl_keranjang WHERE id_user=:id");
      $delete->bindparam(':id', $id);
      $delete->execute();
    ?>
    <table class="article">
      <tr>
        <td>Status</td>
        <td><a class="tombol-biru">Pesanan Berhasil</a></td>
      </tr>
      <tr>
        <td>Jumlah Pembayaran</td>
        <td><b><?php echo "Rp. ".$total; ?></b></td>
      </tr>
      <tr>
        <td>Deskripsi</td>
        <td>
          Lakukan pembayaran dengan mentransfer nominal <b>Jumlah Pembayaran</b> pada rekening :<br>
          BANK MANDIRI<br>
          Rekening : 118-000-972525-9<br>
          A.N : Muh Iriansyah<br>
          Referensi : bayar/id user/jersey <b>contoh : bayar/<?php echo $id."/jersey"; ?></b>
        </td>
      </tr>
      <tr>
        <td>Lanjutan</td>
        <td>
          Jika sudah melakukan pembayaran, segera <b>Konfirmasi Pembayaran</b> dengan mengirimkan bukti pembayaran di : <br>
          <b>WA</b> : 082248080870 <br>
          <b>LINE</b> : ryanpace11
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          Terima kasih telah membeli jersey di website kami <br>
          anda dapat melihat <a class="link" href="?page=belanja">Detail Pesanan</a>
        </td>
      </tr>
    </table>

    <?php
    } catch (PDOexception $e) {
      print "Added data failed: " . $e->getMessage() . "<br/>";
      die();
    }
    // code by muh iriansyah putra pratama
    ?>

  </div>

</body>

</html>