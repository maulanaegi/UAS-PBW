<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>

<div id="box">

  <h1>Barang Jualan Ubah</h1>

  
  <?php
    include 'lib/koneksi.php';

    $id = $_POST['id_barang'];
    $desk = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $name_image = $_FILES['gambar']['name'];
    $loc_image = $_FILES['gambar']['tmp_name'];
    $type_image = $_FILES['gambar']['type'];

    $date = date('Ymd');

    $cek = array('png','jpg','jpeg','gif');
    $x = explode('.',$name_image);
    $extension = strtolower(end($x));
    $size_image = $_FILES['gambar']['size'];

    if ($loc_image != "") {

        if (in_array($extension, $cek) === TRUE) {
            if ($size_image < 5044070) {
                $query = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang =:id ");
                $query->bindparam(':id', $id);
                $query->execute();
                $row = $query->fetch(PDO::FETCH_OBJ);

                if ($row->nama_image)
                    unlink("img/jersey/$row->nama_image");

                move_uploaded_file($loc_image,"img/jersey/$name_image");

                try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $pdo = $conn->prepare('UPDATE tbl_barang SET
                                          deskripsi = :deskripsi,
                                          harga = :harga,
                                          stok = :stok,
                                          created = :created,
                                          nama_image = :nama_image,
                                          type_image = :type_image,
                                          size_image = :size_image
                                          WHERE id_barang = :id_barang');

                    $updatedata = array(':deskripsi' => $desk, ':harga' => $harga, ':stok' => $stok, 'created' => $date, ':nama_image' => $name_image,
                                        ':type_image' => $type_image, ':size_image' => $size_image, ':id_barang' => $id);

                    $pdo->execute($updatedata);

                    echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
                    echo "<center><b>Data barang berhasil diubah</b></center>";
                    echo "</br>";
                    echo"<meta http-equiv='refresh' content='1;url=?page=barang'>";

                } catch (PDOexception $e) {
                    print "Insert data gagal: " . $e->getMessage() . "<br/>";
                    die();
                }
            } else {
                echo "<center><img src='img/icons/cancel.png' width='60'></center>";
                echo "<center><b>Ukuran file gambar terlalu besar</b></center>";
                echo "<center><a href='?page=barang'>Kembali</a></center>";
                echo "</br>";
            }
        } else {
            echo "<center><img src='img/icons/cancel.png' width='60'></center>";
            echo "<center><b>Ekstensi file tidak sesuai</b></center>";
            echo "<center><a href='?page=barang'>Kembali</a></center>";
            echo "</br>";
        }
    } else {
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo = $conn->prepare('UPDATE tbl_barang SET
                                    deskripsi = :deskripsi,
                                    harga = :harga,
                                    stok = :stok,
                                    created = :created
                                    WHERE id_barang = :id_barang');

            $updatedata = array(':deskripsi' => $desk, ':harga' => $harga, ':stok' => $stok, 'created' => $date, ':id_barang' => $id);
            $pdo->execute($updatedata);

            echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
            echo "<center><b>Data barang berhasil diubah</b></center>";
            echo "</br>";
            echo"<meta http-equiv='refresh' content='1;url=?page=barang'>";

        } catch (PDOexception $e) {
            print "Insert data gagal: " . $e->getMessage() . "<br/>";
            die();
        }
    }
  ?>

</div>

<!-- CSS for Styling -->
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
    border: 1px solid #ccc;
    border-radius: 5px;
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
