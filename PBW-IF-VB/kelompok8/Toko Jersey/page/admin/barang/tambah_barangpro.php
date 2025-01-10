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
  }

  .article td input {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f8f8f8;
    transition: background-color 0.3s ease, border 0.3s ease;
  }

  .article td input:focus {
    background-color: #fff;
    border-color: #4CAF50;
    outline: none;
  }

  /* Button styling */
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

  /* Red button (Close) styling */
  .tombol-merah {
    text-decoration: none;
    color: #fff;
    background-color: #f44336;
    padding: 15px 20px;
    border-radius: 5px;
    margin-top: 10px;
    width: 100%;
    text-align: center;
    display: inline-block;
    transition: background-color 0.3s ease;
  }

  .tombol-merah:hover {
    background-color: #e53935;
  }

  /* Input Hover effect */
  .article td input:hover {
    background-color: #e9e9e9;
  }

  /* Animation for buttons */
  .tombol-biru, .tombol-merah {
    animation: buttonHover 0.4s ease-in-out;
  }

  @keyframes buttonHover {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
    100% {
      transform: scale(1);
    }
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 90%;
    }

    h1, .box-title p {
      font-size: 24px;
    }

    .article td input {
      font-size: 14px;
    }

    .tombol-biru, .tombol-merah {
      width: 100%;
    }
  }
</style>
