<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>

<div id="box">
  <h1>Barang Jualan Hapus</h1>

  <?php
    include('lib/koneksi.php');

    $id = $_GET['id'];
    
    
    $query = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang =:id");
    $query->bindparam(':id', $id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    unlink("img/jersey/$row->nama_image");

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo = $conn->prepare("DELETE FROM tbl_barang WHERE id_barang = :id");
        $deletedata = array(':id' => $id);

        $pdo->execute($deletedata);

        echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
        echo "<center><b>Data barang berhasil dihapus</b></center>";
        echo "</br>";
        echo "<meta http-equiv='refresh' content='1;url=?page=barang'>";
    } catch (PDOexception $e) {
        print "Hapus data gagal: " . $e->getMessage() . "<br/>";
        die();
    }
  ?>
</div>

<!-- CSS Styling -->
<style>
  #box {
    width: 80%;
    margin: 20px auto;
    background-color: #f9f9f9;
    padding: 30px;
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

  center {
    font-size: 18px;
    color: #333;
    font-weight: bold;
    margin-top: 20px;
  }

  img {
    margin: 20px 0;
  }

  /* Add styles for the success message */
  .success-message {
    font-size: 20px;
    color: #28a745;
    font-weight: bold;
    margin-top: 20px;
  }

  /* Styling for the page refresh meta tag */
  .meta-refresh {
    font-size: 18px;
    color: #ff6347;
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
