<div class="box-title">
    <p>Transaksi / <b>Transaksi Pembelian Barang</b></p>
</div>
<div id="box">
  <h1>Detail</h1>

  <?php

  include 'lib/koneksi.php';
  $id = $_GET['id'];
  $query = $conn->prepare("SELECT * FROM tbl_pesanan
                          JOIN tbl_barang ON tbl_pesanan.id_barang=tbl_barang.id_barang
                          JOIN tbl_users ON tbl_pesanan.id_user=tbl_users.id_user
                          WHERE tbl_pesanan.id_pesanan=:id");
  $query->bindparam(':id', $id);
  $query->execute();
  $data = $query->fetch(PDO::FETCH_OBJ);

   ?>
   <table class="article">
     <tr>
        <td>Id Pesanan</td>
        <td><?php echo $data->id_pesanan; ?></td>
     </tr>
     <tr>
        <td>Barang</td>
        <td><?php echo "[".$data->id_barang."] ".$data->deskripsi; ?></td>
     </tr>
     <tr>
        <td>Harga</td>
        <td><?php echo "Rp. ".$data->harga; ?></td>
     </tr>
     <tr>
        <td>Total Pembayaran</td>
        <td><?php echo "Rp. ".$data->total; ?></td>
     </tr>
     <tr>
        <td>Ukuran</td>
        <td><?php echo $data->ukuran; ?></td>
     </tr>
     <tr>
        <td>Qty</td>
        <td><?php echo $data->qty; ?></td>
     </tr>
     <tr>
        <td>Pemesan</td>
        <td><?php echo "[".$data->id_user."] ".$data->nama_lengkap; ?></td>
     </tr>
     <tr>
        <td>Email</td>
        <td><?php echo $data->email; ?></td>
     </tr>
     <tr>
        <td>No HP</td>
        <td><?php echo $data->no_hp; ?></td>
     </tr>
     <tr>
        <td>Alamat</td><div class="box-title">
    <p>Transaksi / <b>Transaksi Pembelian Barang</b></p>
</div>

<div id="box">
  <h1>Detail</h1>

  <?php

  include 'lib/koneksi.php';
  $id = $_GET['id'];
  $query = $conn->prepare("SELECT * FROM tbl_pesanan
                          JOIN tbl_barang ON tbl_pesanan.id_barang=tbl_barang.id_barang
                          JOIN tbl_users ON tbl_pesanan.id_user=tbl_users.id_user
                          WHERE tbl_pesanan.id_pesanan=:id");
  $query->bindparam(':id', $id);
  $query->execute();
  $data = $query->fetch(PDO::FETCH_OBJ);

   ?>
   <table class="article">
     <tr>
        <td>Id Pesanan</td>
        <td><?php echo $data->id_pesanan; ?></td>
     </tr>
     <tr>
        <td>Barang</td>
        <td><?php echo "[".$data->id_barang."] ".$data->deskripsi; ?></td>
     </tr>
     <tr>
        <td>Harga</td>
        <td><?php echo "Rp. ".$data->harga; ?></td>
     </tr>
     <tr>
        <td>Total Pembayaran</td>
        <td><?php echo "Rp. ".$data->total; ?></td>
     </tr>
     <tr>
        <td>Ukuran</td>
        <td><?php echo $data->ukuran; ?></td>
     </tr>
     <tr>
        <td>Qty</td>
        <td><?php echo $data->qty; ?></td>
     </tr>
     <tr>
        <td>Pemesan</td>
        <td><?php echo "[".$data->id_user."] ".$data->nama_lengkap; ?></td>
     </tr>
     <tr>
        <td>Email</td>
        <td><?php echo $data->email; ?></td>
     </tr>
     <tr>
        <td>No HP</td>
        <td><?php echo $data->no_hp; ?></td>
     </tr>
     <tr>
        <td>Alamat</td>
        <td><?php echo $data->alamat; ?></td>
     </tr>
     <tr>
       <td></td>
       <td>
         <a class="tombol-biru" href="?page=transaksi">Kembali</a>
       </td>
     </tr>
   </table>
<br>
</div>

<!-- CSS Styling -->
<style>
  /* Styling for the box */
  #box {
    width: 80%;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    font-family: 'Roboto', sans-serif;
  }

  /* Styling for the box title */
  .box-title p {
    font-size: 26px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
  }

  /* Header styling */
  h1 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
  }

  /* Styling for the table */
  .article {
    width: 100%;
    margin-bottom: 30px;
    border-collapse: collapse;
  }

  .article td {
    padding: 15px;
    vertical-align: middle;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
  }

  .article td:first-child {
    font-weight: bold;
  }

  .article td a {
    text-decoration: none;
    color: white;
    background-color: #4CAF50;
    padding: 10px 15px;
    border-radius: 5px;
    display: inline-block;
    text-align: center;
    transition: background-color 0.3s ease;
  }

  .article td a:hover {
    background-color: #45a049;
  }

  /* Styling for the buttons */
  .tombol-biru {
    background-color: #4CAF50;
    color: white;
    padding: 15px 20px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
    transition: background-color 0.3s ease;
  }

  .tombol-biru:hover {
    background-color: #45a049;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 90%;
    }

    h1, .box-title p {
      font-size: 24px;
    }

    .article td {
      font-size: 14px;
    }

    .tombol-biru {
      width: 100%;
    }
  }

</style>
