<div class="box-title">
    <p>Transaksi / <b>Transaksi Pembelian Barang</b></p>
</div>

<div id="box">
  <h1>Transaksi Pembelian Barang</h1>

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

  <table class="transaction-table">
    <thead>
      <tr>
        <th>Id Pesanan</th>
        <th>Pemesan</th>
        <th>Barang</th>
        <th>Ukuran</th>
        <th>Qty</th>
        <th>Kurir</th>
        <th>Tanggal Masuk</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
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
              <td><?php echo "Rp. ".$value['total'] ?></td>
              <td>
                <a class="btn-status-success">Sukses</a><br><br>
                <a class="btn-detail" href="?page=transaksi_detail&id=<?php echo $value['id_pesanan']; ?>">Detail</a>
              </td>
          </tr>
      <?php
      endforeach;
       ?>
    </tbody>
  </table>
  <br>
  <?php
  if ($count == 0){
    echo "<center><p class='no-order-message'>-- Belum ada pesanan barang --</p></center>";
    echo "<br>";
  }
   ?>

</div>

<!-- CSS Styling -->
<style>
  /* General Box Styling */
  #box {
    width: 95%;
    margin: 20px auto;
    padding: 30px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
  }

  /* Box Title Styling */
  .box-title p {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
  }

  /* Heading Styling */
  h1 {
    font-size: 32px;
    color: #4CAF50;
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
  }

  /* Table Styling */
  .transaction-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .transaction-table th,
  .transaction-table td {
    padding: 15px;
    text-align: left;
    font-size: 16px;
  }

  .transaction-table th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }

  .transaction-table td {
    color: #555;
    border-bottom: 1px solid #ddd;
  }

  .transaction-table tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .transaction-table tr:hover {
    background-color: #e2e2e2;
  }

  /* Button Styling for Status and Detail */
  .btn-status-success {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .btn-status-success:hover {
    background-color: #218838;
  }

  .btn-detail {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .btn-detail:hover {
    background-color: #0056b3;
  }

  /* No Order Message Styling */
  .no-order-message {
    color: #888;
    font-size: 18px;
    font-style: italic;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 100%;
      padding: 15px;
    }

    .transaction-table th,
    .transaction-table td {
      font-size: 14px;
      padding: 10px;
    }

    .btn-status-success,
    .btn-detail {
      font-size: 14px;
      padding: 8px 15px;
    }

    h1 {
      font-size: 28px;
    }
  }
</style>
