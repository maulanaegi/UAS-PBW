<div class="box-title">
    <p>Transaksi / <b>Transaksi Pembelian Barang</b></p>
</div>

<div id="box">
  <h1>Transaksi</h1>

  <?php
  include 'lib/koneksi.php';
  $query = $conn->prepare("SELECT * FROM tbl_pesanan
                           JOIN tbl_barang ON tbl_pesanan.id_barang=tbl_barang.id_barang
                           JOIN tbl_users ON tbl_pesanan.id_user=tbl_users.id_user
                           ORDER BY date_in DESC");
  $query->execute();
  $data = $query->fetchAll();
  $count = $query->rowCount();
  ?>

  <table class="news">
    <tr>
      <th>Id Pesanan</th>
      <th>Pemesan</th>
      <th>Id Barang</th>
      <th>Ukuran</th>
      <th>Qty</th>
      <th>Kurir</th>
      <th>Tanggal Masuk</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
    <?php
    foreach ($data as $value): ?>
        <tr>
            <td><?php echo $value['id_pesanan'] ?></td>
            <td><?php echo "(".$value['id_user'].") ".$value['nama_lengkap'] ?></td>
            <td><?php echo $value['deskripsi'] ?></td>
            <td><?php echo $value['ukuran'] ?></td>
            <td><?php echo $value['qty'] ?></td>
            <td><?php echo $value['kurir'] ?></td>
            <td><?php echo $value['date_in'] ?></td>
            <td><?php echo $value['total'] ?></td>
            <td>
              <a class="tombol-biru">Sukses</a><br><br>
              <a class="tombol-biru" href="?page=transaksi_detail&id=<?php echo $value['id_pesanan']; ?>">Detail</a>
            </td>
        </tr>
    <?php
    endforeach;
     ?>
  </table>
  <br>
  <?php
  if ($count == 0){
    echo "<center>-- Belum ada pesanan barang --</center>";
    echo "<br>";
  }
   ?>

</div>

<!-- CSS Styling -->
<style>
  /* Box Styling */
  #box {
    width: 90%;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    font-family: 'Roboto', sans-serif;
  }

  /* Box Title */
  .box-title p {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
  }

  /* Header Styling */
  h1 {
    font-size: 30px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
  }

  /* Table Styling */
  .news {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  .news th, .news td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
  }

  .news th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }

  .news td {
    color: #555;
  }

  .news tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  /* Button Styling */
  .tombol-biru {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: inline-block;
    margin: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .tombol-biru:hover {
    background-color: #45a049;
  }

  /* Empty Table Handling */
  .news td {
    text-align: center;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 95%;
    }

    .news th, .news td {
      padding: 10px;
      font-size: 14px;
    }

    .tombol-biru {
      font-size: 12px;
      padding: 8px 16px;
    }
  }
</style>
