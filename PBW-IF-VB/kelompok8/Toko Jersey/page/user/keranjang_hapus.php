<?php
include('lib/koneksi.php');

$id = $_GET['id'];

// code by muh iriansyah putra pratama
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo = $conn->prepare("DELETE FROM tbl_keranjang WHERE id = :id");
    $deletedata = array(':id' => $id);
    $pdo->execute($deletedata);
    
    // code by muh iriansyah putra pratama
    echo "<script>
            alert('Barang dalam keranjang berhasil dihapus');
            window.location='?page=beranda'
          </script>";
    
} catch (PDOexception $e) {
    print "hapus berita gagal: " . $e->getMessage() . "<br/>";
    die();
}
?>

<!-- CSS Styling -->
<style>
  /* General Page Styling */
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    color: #333;
  }

  .notification-box {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.3);
    position: fixed;
    top: 0;
    left: 0;
  }

  .notification-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 80%;
    animation: fadeIn 0.5s ease-in-out;
  }

  .notification-container h1 {
    font-size: 24px;
    color: #007bff;
    margin-bottom: 20px;
  }

  .notification-container p {
    font-size: 18px;
    color: #555;
    margin-bottom: 30px;
  }

  .btn-confirm {
    background-color: #28a745;
    color: white;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
  }

  .btn-confirm:hover {
    background-color: #218838;
  }

  /* Fade In Animation */
  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
</style>

<!-- HTML Structure for Notification -->
<div class="notification-box">
  <div class="notification-container">
    <h1>Penghapusan Sukses!</h1>
    <p>Barang dalam keranjang Anda telah berhasil dihapus.</p>
    <a href="?page=beranda" class="btn-confirm">Kembali ke Beranda</a>
  </div>
</div>
