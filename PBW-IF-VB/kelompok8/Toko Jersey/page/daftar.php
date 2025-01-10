<!DOCTYPE html>
<html>

<head>
  <title>Daftar Akun</title>
  <style>
    /* Reset default styling */
    body, html {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', Arial, sans-serif;
      background: url('https://source.unsplash.com/random/1920x1080') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    /* Add background overlay */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    /* Daftar container styling */
    .login {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      width: 350px;
      padding: 40px 30px;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    .login-header {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      font-weight: bold;
      text-transform: uppercase;
      color: #fff;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .login-container {
      display: flex;
      flex-direction: column;
    }

    .login-container p {
      margin: 12px 0;
    }

    .login-container input[type="text"],
    .login-container input[type="email"],
    .login-container input[type="password"],
    .login-container input[type="tel"],
    .login-container textarea {
      width: calc(100% - 20px);
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      outline: none;
      background: rgba(255, 255, 255, 0.9);
      color: #333;
      font-size: 16px;
      transition: box-shadow 0.3s ease;
      margin-left: auto;
      margin-right: auto;
    }

    .login-container input[type="text"]:focus,
    .login-container input[type="email"]:focus,
    .login-container input[type="password"]:focus,
    .login-container input[type="tel"]:focus,
    .login-container textarea:focus {
      box-shadow: 0 0 10px rgba(106, 17, 203, 0.5);
    }

    .login-container input[type="submit"] {
      width: calc(100% - 20px);
      padding: 10px;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      border: none;
      border-radius: 8px;
      font-size: 16px;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      margin-left: auto;
      margin-right: auto;
    }

    .login-container input[type="submit"]:hover {
      background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .tombol-merah {
      color: #fff;
      background-color: #e74c3c;
      padding: 5px 10px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .tombol-merah:hover {
      background-color: #c0392b;
    }

    .tombol-biru {
      color: #fff;
      background-color: #3498db;
      padding: 5px 10px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .tombol-biru:hover {
      background-color: #2980b9;
    }

    .login-container a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    .login-container a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .login {
        width: 90%;
      }
    }
  </style>
</head>

<body>
  <div class="login">
    <h2 class="login-header">DAFTAR AKUN</h2>
    <form class="login-container" action="daftar.php" method="post">
      <?php
      include "../lib/koneksi.php";
      session_start();
      
      if (isset($_POST['submit'])) {
        $namalengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $nohp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = 'user';
        
        try {
            // Your database insertion code here
        } catch (Exception $e) {
            echo "<center><a class='tombol-merah'>Pendaftaran Gagal</a></center>";
        }
      }
      ?>
      <p>
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
      </p>
      <p>
        <input type="email" name="email" placeholder="Email" required>
      </p>
      <p>
        <input type="tel" name="no_hp" placeholder="No HP" required>
      </p>
      <p>
        <textarea name="alamat" placeholder="Alamat" required></textarea>
      </p>
      <p>
        <input type="text" name="username" placeholder="Username" required>
      </p>
      <p>
        <input type="password" name="password" placeholder="Password" required>
      </p>
      <p>
        <input type="submit" name="submit" value="Daftar">
      </p>
      <p align="center"><a href="../index.php">kembali</a></p>
    </form>
  </div>
</body>

</html>
