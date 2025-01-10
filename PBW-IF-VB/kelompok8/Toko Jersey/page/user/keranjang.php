<?php
include 'lib/koneksi.php';

if (isset($_SESSION['username'])) $user = $_SESSION['username'];
$ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
$ambiluser->bindparam(':user', $user);
$ambiluser->execute();
$data = $ambiluser->fetch(PDO::FETCH_OBJ);
if (isset($_SESSION['username'])) $id = $data->id_user;

$query = $conn->prepare("SELECT id, deskripsi, harga, ukuran, qty, kurir, total
                        FROM tbl_keranjang
                        JOIN tbl_barang ON tbl_keranjang.id_barang = tbl_barang.id_barang
                        WHERE tbl_keranjang.id_user = :id
                        GROUP BY tbl_keranjang.id");
$query->bindparam(':id', $id);
$query->execute();
$data = $query->fetchAll();
$count = $query->rowCount();
?>

<!-- Styling CSS -->
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f1f3f6;
    margin: 0;
    padding: 0;
  }

  .keranjang-title {
    background : linear-gradient(45deg, #2980b9, #16a085);
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    border-radius: 8px;
  }

  .keranjang-title a {
    background-color: #2ecc71;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
  }

  #keranjang {
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 95%;
    max-width: 1200px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 1rem;
  }

  th {
    background-color: #f1f1f1;
    color: #333;
  }

  tr:hover {
    background-color: #f9f9f9;
  }

  .tombol-biru {
    background-color: #3498db;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
  }

  .tombol-biru:hover {
    background-color: #2980b9;
  }

  .tombol-merah {
    background-color: #e74c3c;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
  }

  .tombol-merah:hover {
    background-color: #c0392b;
  }

  .total-payment {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    text-align: right;
    margin-top: 20px;
  }

  .proceed-text {
    font-size: 16px;
    color: #555;
    text-align: center;
    margin-top: 15px;
  }

  .proceed-text b {
    color: #2ecc71;
  }

  /* Add responsive design */
  @media screen and (max-width: 768px) {
    table {
      font-size: 14px;
    }

    .keranjang-title {
      font-size: 20px;
    }
  }
</style>

<!-- HTML Table Display -->
<div class="keranjang-title">
  <p>Keranjang Belanja: <a class="tombol-biru"><?php echo $count; ?></a></p>
</div>

<div id="keranjang">
  <table class="news">
    <tr>
      <th>No</th>
      <th>Id Pesanan</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Ukuran</th>
      <th>Qty</th>
      <th>Kurir</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $jumlah = 0;
    foreach ($data as $value): ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['deskripsi'] ?></td>
        <td><?php echo "Rp. " . number_format($value['harga'], 0, ',', '.'); ?></td>
        <td><?php echo $value['ukuran'] ?></td>
        <td><?php echo $value['qty'] ?></td>
        <td><?php echo $value['kurir'] ?></td>
        <td><?php echo "Rp. " . number_format($value['total'], 0, ',', '.'); ?></td>
        <td>
          <a class="tombol-merah" href="?page=keranjang_hapus&id=<?php echo $value['id']; ?>">Hapus</a>
        </td>
      </tr>
    <?php
    $no++;
    $jumlah += $value['total'];
    endforeach;
    ?>
    <tr>
      <td colspan="7"><b>Total Pembayaran</b></td>
      <td colspan="2"><b><?php echo "Rp. " . number_format($jumlah, 0, ',', '.'); ?></b></td>
    </tr>

    <?php if ($count > 0) { ?>
    <tr>
      <td colspan="7" class="proceed-text">
        Anda dapat <b>menghapus</b> barang dalam keranjang jika ada perubahan. Jika tidak ada perubahan lagi, Anda dapat melanjutkan <b>Pemesanan</b> dengan memilih tombol <b>Proses</b>.
      </td>
      <td colspan="2">
        <a class="tombol-biru" href="?page=pesanan&id=<?php echo $id ?>&jum=<?php echo $jumlah ?>">Proses</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>
