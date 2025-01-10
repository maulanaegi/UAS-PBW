<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>

<div id="box">
  <h1>Barang Jualan Tambah</h1>
  <form name="add" method="post" action="?page=tambah_barangpro" enctype="multipart/form-data">
   
    <table class="article">
      <tr>
        <td>Gambar</td>
        <td>
          <input type="file" name="gambar" required>
        </td>
      </tr>

      <tr>
        <td>Deskripsi Jersey</td>
        <td>
          <input type="text" name="deskripsi" size="50" placeholder="ex: jersey barcelona away" required>
        </td>
      </tr>

      <tr>
        <td>Harga</td>
        <td>
          <input type="text" name="harga" size="50" placeholder="ex: 130000" required>
        </td>
      </tr>

      <tr>
        <td>Stok Jersey</td>
        <td>
          <input type="text" name="stok" size="50" placeholder="ex: 100" required>
        </td>
      </tr>

      <tr>
        <td></td>
        <td>
          <input class="tombol-biru" type="submit" name="add" value="Tambah & Simpan">
          <a class="tombol-merah" href="?page=barang">Tutup</a>
        </td>
      </tr>
    </table>
    
  </form>

</div>

<!-- CSS Styling -->
<style>
  /* Styling for the box */
  #box {
    width: 80%;
    margin: 20px auto;
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
  }

  /* Styling for the box title */
  .box-title p {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
  }

  /* Header styling */
  h1 {
    font-size: 26px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
  }

  /* Styling for the form */
  .article {
    width: 100%;
    margin-bottom: 20px;
  }

  .article td {
    padding: 10px;
    vertical-align: middle;
  }

  .article input[type="text"], .article input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  .article input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .article input[type="submit"]:hover {
    background-color: #45a049;
  }

  /* Styling for links */
  .tombol-merah {
    text-decoration: none;
    color: #fff;
    background-color: #f44336;
    padding: 10px 20px;
    border-radius: 4px;
    margin-left: 10px;
  }

  .tombol-merah:hover {
    background-color: #e53935;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 95%;
    }

    h1 {
      font-size: 22px;
    }

    .box-title p {
      font-size: 20px;
    }
  }
</style>
