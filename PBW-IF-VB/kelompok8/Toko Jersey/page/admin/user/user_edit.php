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
      padding: 12px 0px;
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
    include "lib/koneksi.php";

    $id = $_GET['id'];
    $result = $conn->prepare("SELECT * FROM tbl_users WHERE id_user =:id");
    $result->bindparam(':id', $id);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_OBJ);
    ?>

    <form name="edit" method="post" action="?page=user_editpro" enctype="multipart/form-data">
      <div class="form-container">
        <label for="id_user">Id User</label>
        <div>
          <input type="button" name="id_user" value="<?php echo $row->id_user ?>" disabled>
        </div>

        <label for="nama_lengkap">Nama Lengkap</label>
        <div>
          <input type="hidden" name="id_user" value="<?php echo $row->id_user ?>">
          <input type="text" name="nama_lengkap" size="40" value="<?php echo $row->nama_lengkap ?>" required>
        </div>

        <label for="email">Email</label>
        <div>
          <input type="text" name="email" size="30" value="<?php echo $row->email ?>" required>
        </div>

        <label for="alamat">Alamat</label>
        <div>
          <textarea name="alamat" rows="4" cols="40" required><?php echo $row->alamat ?></textarea>
        </div>

        <label for="no_hp">No HP</label>
        <div>
          <input type="text" name="no_hp" value="<?php echo $row->no_hp ?>" required>
        </div>

        <label for="username">Username</label>
        <div>
          <input type="text" name="username" maxlength="6" value="<?php echo $row->username ?>" required>
        </div>

        <label for="password">Password</label>
        <div>
          <input type="text" name="password" maxlength="6" value="<?php echo $row->password ?>" required>
        </div>

        <div>
          <input class="tombol-biru" type="submit" name="edit" value="Ubah & Simpan">
          <a class="tombol-merah" href="?page=user">Tutup</a>
        </div>
      </div>
    </form>
  </div>

</body>

</html>