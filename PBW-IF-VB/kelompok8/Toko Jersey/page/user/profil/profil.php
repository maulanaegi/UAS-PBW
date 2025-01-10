<div class="box-title">
    <p>Profil / <b>Detail User</b></p>
</div>

<div id="box">
  <h1>Profil</h1>

  <?php
  include 'lib/koneksi.php';

  $user = $_SESSION['username'];
  $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
  $ambiluser->bindparam(':user', $user);
  $ambiluser->execute();
  $data = $ambiluser->fetch(PDO::FETCH_OBJ);
  ?>

  <table class="profile-table">
    <tr>
      <td>ID User</td>
      <td><input type="button" value="<?php echo $data->id_user; ?>" disabled></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><?php echo $data->nama_lengkap; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data->email; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?php echo $data->alamat; ?></td>
    </tr>
    <tr>
      <td>No HP</td>
      <td><?php echo $data->no_hp; ?></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><?php echo $data->username; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" value="<?php echo $data->password; ?>" disabled></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <a class="btn-blue" href="?page=profil_ubah">Ubah</a>
        <a class="btn-red" href="?page=beranda">Kembali</a>
      </td>
    </tr>
  </table>
  <br>
</div>

<!-- CSS Styling -->
<style>
  /* General Box Styling */
  #box {
    width: 80%;
    margin: 30px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    text-align: left;
  }

  /* Box Title Styling */
  .box-title p {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
  }

  /* Heading Styling */
  h1 {
    font-size: 32px;
    color: #007bff;
    font-weight: bold;
    margin-bottom: 30px;
  }

  /* Profile Table Styling */
  .profile-table {
    width: 100%;
    border-spacing: 15px;
    font-size: 16px;
    margin-top: 20px;
    color: #333;
  }

  .profile-table td {
    padding: 12px;
  }

  .profile-table input[type="button"],
  .profile-table input[type="password"] {
    padding: 10px;
    font-size: 14px;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f8f9fa;
    color: #495057;
  }

  .profile-table input[type="password"]:disabled {
    background-color: #e9ecef;
    color: #6c757d;
  }

  /* Button Styling */
  .btn-blue,
  .btn-red {
    display: inline-block;
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    transition: background-color 0.3s ease;
  }

  .btn-blue {
    background-color: #007bff;
  }

  .btn-blue:hover {
    background-color: #0056b3;
  }

  .btn-red {
    background-color: #dc3545;
  }

  .btn-red:hover {
    background-color: #c82333;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    #box {
      width: 90%;
      padding: 20px;
    }

    h1 {
      font-size: 28px;
    }

    .profile-table {
      font-size: 14px;
    }

    .profile-table td {
      padding: 10px;
    }

    .profile-table input[type="button"],
    .profile-table input[type="password"] {
      font-size: 12px;
      padding: 8px;
    }

    .btn-blue,
    .btn-red {
      font-size: 14px;
      padding: 10px 15px;
    }
  }
</style>
