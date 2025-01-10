<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda - Produk Jualan</title>
  <style>
    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f8f9fa;
      color: #333;
    }

    .box-title {
      background: linear-gradient(45deg, #2980b9, #16a085);
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 8px 8px 0 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .box-title b {
      font-weight: bold;
    }

    #box {
      padding: 20px;
    }

    .pesan {
      background-color: #f8d7da;
      color: #721c24;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .pesan a {
      color: #155724;
      font-weight: bold;
      text-decoration: none;
    }

    .pesan a:hover {
      text-decoration: underline;
    }

    .product-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .product-item {
      width: 23%;
      text-align: center;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .product-item:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .product-item img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      transition: transform 0.2s ease-in-out;
    }

    .product-item img:hover {
      transform: scale(1.1);
    }

    .product-item button {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.9rem;
      margin-top: 10px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .product-item button:disabled {
      background-color: #6c757d;
    }

    .product-item button:hover:not(:disabled) {
      background-color: #218838;
      transform: scale(1.1);
    }

    .link {
      text-decoration: none;
      color: #007bff;
      padding: 10px;
      background-color: #f8f9fa;
      border: 1px solid #007bff;
      border-radius: 5px;
      margin-top: 10px;
      display: inline-block;
      transition: background-color 0.3s, color 0.3s, transform 0.2s;
    }

    .link:hover {
      background-color: #007bff;
      color: white;
      transform: scale(1.1);
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .product-item {
        width: 48%;
      }

      .product-item img {
        width: 80px;
        height: 80px;
      }
    }
  </style>
</head>

<body>
  <div class="box-title bg-info">
    <p>Beranda / <b>Produk Jualan</b></p>
  </div>
  <div id="box">

    <?php
    if (isset ($_SESSION['username']) == ""){ ?>
      <div class="pesan">
        <p>Masuk dengan <b>akun</b> terlebih dahulu sebelum mulai belanja, belum punya akun? 
        <a href="page/daftar.php" class="tombol-biru">Daftar</a></p>
      </div>
    <?php } ?>

    <div class="product-grid">
      <?php
      include 'lib/koneksi.php';
      $query = $conn->prepare("SELECT * FROM tbl_barang");
      $query->execute();

      $data = $query->fetchAll();

      foreach ($data as $value) { ?>
        <div class="product-item">
          <img src="img/jersey/<?php echo $value['nama_image']; ?>" alt="<?php echo $value['deskripsi']; ?>">
          <p><?php echo $value['deskripsi']; ?></p>
          <p><b><?php echo "Rp.".$value['harga']; ?></b></p>
          <?php

          $id = $value['id_barang'];
          $query = $conn->prepare("SELECT SUM(qty) AS jumlah FROM tbl_pesanan WHERE id_barang=:id");
          $query->bindParam(':id', $id);
          $query->execute();
          $data = $query->fetch(PDO::FETCH_OBJ);
          $hasil = $data->jumlah;

          $stok = $value['stok'];
          $sisa = ($stok - $hasil);
          ?>
          <button type="button" <?php echo ($sisa <= 0) ? 'disabled' : ''; ?>>Stok: <?php echo ($sisa > 0) ? $sisa : "Habis"; ?></button>
          <?php
          if ($sisa > 0){
            if (isset ($_SESSION['username']) != ""){ ?>
              <a class="link" href="?page=belanja_detail&id=<?php echo $value['id_barang']; ?>&st=<?php echo $sisa; ?>">Beli</a>
            <?php }} ?>
        </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>