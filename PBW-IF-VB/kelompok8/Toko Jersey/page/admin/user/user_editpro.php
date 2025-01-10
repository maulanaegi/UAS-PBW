<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Ubah</title>
  <style>
    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7f6;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 30px auto;
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .box-title {
      background-color: #007bff;
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 8px 8px 0 0;
    }

    h1 {
      text-align: center;
      color: #007bff;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .form-container {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 20px;
    }

    .form-container label {
      font-weight: bold;
      text-align: right;
      padding-right: 10px;
      font-size: 1.1rem;
    }

    .form-container input[type="text"],
    .form-container textarea {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
      width: 100%;
      box-sizing: border-box;
    }

    .form-container textarea {
      resize: vertical;
      height: 100px;
    }

    .form-container input[type="submit"],
    .form-container a {
      background-color: #007bff;
      color: white;
      padding: 12px 20px;
      font-size: 1rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 100%;
      text-align: center;
      display: inline-block;
      text-decoration: none;
    }

    .form-container input[type="submit"]:hover,
    .form-container a:hover {
      background-color: #0056b3;
    }

    .form-container .tombol-merah {
      background-color: #dc3545;
    }

    .form-container .tombol-merah:hover {
      background-color: #c82333;
    }

    /* Success message styles */
    .success-message {
      text-align: center;
      font-size: 1.5rem;
      color: green;
      margin-top: 20px;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .form-container {
        grid-template-columns: 1fr;
      }

      .form-container label {
        text-align: left;
        padding-right: 0;
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="box-title">
      <p>User / <b>Manajemen User</b></p>
    </div>

    <h1>User Ubah</h1>

    <?php
    include 'lib/koneksi.php';

    $id = $_POST['id_user'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $alamat = addslashes($_POST['alamat']);
    $nohp = $_POST['no_hp'];
    $username = $_POST['username'];
    $pass = $_POST['password'];

    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo = $conn->prepare('UPDATE tbl_users SET
                                nama_lengkap = :nama_lengkap,
                                email = :email,
                                username = :username,
                                password = :password,
                                alamat = :alamat,
                                no_hp = :no_hp
                                WHERE id_user = :id_user');

      $updatedata = array(':nama_lengkap' => $nama_lengkap, ':email' => $email, ':username' => $username,
        ':password' => $pass, ':alamat' => $alamat, ':no_hp' => $nohp, ':id_user' => $id);

      $pdo->execute($updatedata);

      echo "<div class='success-message'>";
      echo "<img src='img/icons/ceklist.png' width='60'><br>";
      echo "<b>Profil berhasil diubah</b>";
      echo "</div>";
      echo "<meta http-equiv='refresh' content='2; url=?page=user'>";
    } catch (PDOexception $e) {
      echo "<div class='error-message' style='text-align: center; color: red;'>";
      echo "Insert data gagal: " . $e->getMessage() . "<br/>";
      echo "</div>";
      die();
    }
    ?>
  </div>

</body>

</html>