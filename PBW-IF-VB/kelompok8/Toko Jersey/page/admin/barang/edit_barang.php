<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>

<div id="box">

 
  <?php
    include "lib/koneksi.php";

    $id = $_GET['id'];
    $result = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang =:id");
    $result->bindparam(':id', $id);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_OBJ);
  ?>

  <h1>Barang Jualan Ubah</h1>

  
  <form name="edit" method="post" action="?page=edit_barangpro" enctype="multipart/form-data">
    <table class="table table-bordered table-striped">
      <tr>
        <td>Gambar</td>
        <td>
          <input type="hidden" name="id_barang" value="<?php echo $row->id_barang ?>">
          <img src="img/jersey/<?php echo $row->nama_image ?>" width="100"><br><br>
          <input type="file" name="gambar">
        </td>
      </tr>
      <tr>
        <td>Deskripsi Jersey</td>
        <td>
          <input type="text" name="deskripsi" size="50" value="<?php echo $row->deskripsi ?>" required>
        </td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>
          <input type="text" name="harga" size="50" value="<?php echo $row->harga ?>" required>
        </td>
      </tr>
      <tr>
        <td>Stok Jersey</td>
        <td>
          <input type="text" name="stok" size="50" value="<?php echo $row->stok ?>" required>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input class="tombol-biru" type="submit" name="edit" value="Ubah & Simpan">
          <a class="tombol-merah" href="?page=barang">Tutup</a>
        </td>
      </tr>
    </table>
  </form>

</div>

<!-- CSS for Styling -->
<style>
  #box {
    width: 80%;
    margin: 20px auto;
    background-color: #f9f9f9;
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
    margin-bottom: 20px;
    text-align: center;
  }

  table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }

  td {
    padding: 10px;
    text-align: left;
    vertical-align: middle;
  }

  input[type="text"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="file"] {
    padding: 5px;
  }

  .tombol-biru, .tombol-merah {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-top: 10px;
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

  .table-bordered {
    border: 1px solid #ddd;
  }

  .table-bordered td {
    border: 1px solid #ddd;
  }

  .table-striped tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 95%;
    }

    td {
      font-size: 14px;
    }

    input[type="text"] {
      width: 100%;
    }
  }
</style>

<!-- JavaScript for Form Validation -->
<script>
  // Optional JavaScript to enhance user experience
  document.querySelector('form[name="edit"]').addEventListener('submit', function(event) {
    let hargaInput = document.querySelector('input[name="harga"]');
    let stokInput = document.querySelector('input[name="stok"]');

    // Validate Harga
    if (isNaN(hargaInput.value) || hargaInput.value <= 0) {
      alert("Harga harus berupa angka yang valid!");
      event.preventDefault();
      return;
    }

    // Validate Stok
    if (isNaN(stokInput.value) || stokInput.value < 0) {
      alert("Stok tidak boleh negatif!");
      event.preventDefault();
      return;
    }
  });
</script>
