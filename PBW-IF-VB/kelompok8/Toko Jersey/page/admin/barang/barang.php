<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>

<div id="box">

  <?php
      include 'lib/koneksi.php';

      $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
      $batas = 5;
      $posisi = ($hal-1) * $batas;
      $query = $conn->prepare("SELECT * FROM tbl_barang LIMIT $posisi, $batas");
      $query->execute();
      $data = $query->fetchAll();
      $count = $query->rowCount();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $nama_image = $_FILES['nama_image']['name'];
          $deskripsi = $_POST['deskripsi'];
          $harga = $_POST['harga'];
          $stok = $_POST['stok'];
          $created = date('Y-m-d H:i:s');

          // Upload file gambar
          if (move_uploaded_file($_FILES['nama_image']['tmp_name'], "img/jersey/" . $nama_image)) {
              $insert = $conn->prepare("INSERT INTO tbl_barang (nama_image, deskripsi, harga, stok, created) VALUES (?, ?, ?, ?, ?)");
              if ($insert->execute([$nama_image, $deskripsi, $harga, $stok, $created])) {
                  echo "<p style='color: green;'>Barang berhasil ditambahkan!</p>";
              } else {
                  echo "<p style='color: red;'>Gagal menambahkan barang: " . implode(' ', $insert->errorInfo()) . "</p>";
              }
          } else {
              echo "<p style='color: red;'>Gagal mengupload gambar.</p>";
          }
      }
  ?>

  <h1>Barang Jualan</h1>
  <button id="tambah-barang-btn" class="tombol-biru">Tambah Barang</button><br><br>

  <!-- Form Tambah Barang -->
  <div id="form-tambah-barang" style="display: none;">
      <form method="POST" enctype="multipart/form-data">
          <label>Gambar:</label><br>
          <input type="file" name="nama_image" required><br><br>
          
          <label>Deskripsi:</label><br>
          <textarea name="deskripsi" required></textarea><br><br>
          
          <label>Harga:</label><br>
          <input type="number" name="harga" required><br><br>
          
          <label>Stok:</label><br>
          <input type="number" name="stok" required><br><br>

          <button type="submit" class="tombol-biru">Simpan</button>
      </form>
  </div>

  <table class="barang-table">
    <thead>
      <tr>
        <th>Id Barang</th>
        <th>Gambar</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Created</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $value): ?>
        <tr>
          <td><?php echo $value['id_barang'] ?></td>
          <td><img src="img/jersey/<?= $value['nama_image'];?>" width="80" class="barang-image"></td>
          <td><?php echo $value['deskripsi'] ?></td>
          <td>Rp. <?php echo number_format($value['harga'], 0, ',', '.'); ?></td>
          <td><?php echo $value['stok'] ?></td>
          <td><?php echo $value['created'] ?></td>
          <td>
            <a class="tombol-biru" href="?page=edit_barang&id=<?php echo $value['id_barang']; ?>">ubah</a><br><br>
            <a class="tombol-merah" href="?page=hapus_barang&id=<?php echo $value['id_barang']; ?>">hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php
    if ($count == 0){
      echo "<center>-- Belum ada data barang --</center>";
    }

    $semua = $conn->prepare("SELECT * FROM tbl_barang");
    $semua->execute();
    $jmldata = $semua->rowCount();
    $jmlhal = ceil($jmldata/$batas);
    $sebelum = $hal - 1;
    $berikut = $hal + 1;

    echo "<div class='paging'>";
    if ($hal > 1){
      echo "<span><a href='?page=barang&hal=1'>&laquo; First</a></span>";
      echo "<span><a href='?page=barang&hal=$sebelum'>Previous</a></span>";
    }else {
      echo "<span>&laquo; First</span>";
      echo "<span>Previous</span>";
    }

    if ($hal < $jmlhal){
      echo "<span><a href='?page=barang&hal=$berikut'>Next</a></span>";
      echo "<span><a href='?page=barang&hal=$jmlhal'>Last &raquo;</a></span>";
    }else {
      echo "<span>Next</span>";
      echo "<span>&raquo; Last</span>";
    }

    echo "</div>";
  ?>

</div>

<!-- CSS for Styling -->
<style>
  #box {
    width: 90%;
    margin: 20px auto;
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
  }

  .box-title p {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
  }

  h1 {
    font-size: 26px;
    color: #333;
    margin-bottom: 15px;
  }

  .tombol-biru, .tombol-merah {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-bottom: 10px;
  }

  .tombol-biru:hover {
    background-color: #0056b3;
  }

  .tombol-merah {
    background-color: #dc3545;
  }

  .tombol-merah:hover {
    background-color: #c82333;
  }

  .barang-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .barang-table th, .barang-table td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
  }

  .barang-table th {
    background-color: #4CAF50;
    color: white;
  }

  .barang-image {
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .paging {
    text-align: center;
    margin-top: 20px;
  }

  .paging span {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    cursor: pointer;
  }

  .paging span a {
    color: white;
    text-decoration: none;
  }

  .paging span:hover {
    background-color: #0056b3;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 95%;
    }

    .barang-table th, .barang-table td {
      padding: 8px;
    }

    .paging span {
      padding: 8px 12px;
    }
  }
</style>

<!-- JavaScript for Toggle Form -->
<script>
  document.getElementById('tambah-barang-btn').addEventListener('click', function() {
      const form = document.getElementById('form-tambah-barang');
      form.style.display = form.style.display === 'none' ? 'block' : 'none';
  });
</script>
