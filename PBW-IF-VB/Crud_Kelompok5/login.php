<?php
    @ob_start();
    session_start();
    if(isset($_POST['proses'])){
        require 'config.php';
            
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);

        $sql = 'select member.*, login.user, login.pass
                from member inner join login on member.id_member = login.id_member
                where user =? and pass = md5(?)';
        $row = $config->prepare($sql);
        $row -> execute(array($user,$pass));
        $jum = $row -> rowCount();
        if($jum > 0){
            $hasil = $row -> fetch();
            $_SESSION['admin'] = $hasil;
            echo '<script>alert("Login Sukses");window.location="index.php"</script>';
        }else{
            echo '<script>alert("Login Gagal");history.go(-1);</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        body {
            background-image: url('Baground/Bg_Leptop2.jpeg');
            background-size: cover;
            background-position: center;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .form-login {
            background:(255, 255, 255, 0.5); /* Transparansi form */
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-login h2 {
            margin-bottom: 20px;
            font-size: 30px;
            color: rgb(0, 0, 0); /* Warna teks hitam */
            font-weight: 900; /* Membuat teks sangat tebal */
        }
        .form-control {
            background: rgba(0, 0, 0, 0); /* Transparansi input */
            border: none;
            color: #fff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0); /* Transparansi placeholder */
        }
        .btn {
            background: rgba(255, 255, 255, 0); /* Transparansi maksimal */
            border: 1px solid rgba(255, 255, 255, 0);
            color: #000; /* Warna teks hitam */
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 900; /* Membuat teks sangat tebal */
            cursor: pointer;
            transition: 0.3s ease;
        }
        .btn:hover {
            background: rgba(255, 255, 255, 0);
        }
        .register-link {
            color: #000; /* Warna teks hitam */
            margin-top: 10px;
            display: block;
            font-size: 14px;
            font-weight: 900; /* Membuat teks sangat tebal */
            text-decoration: none;
            transition: 0.3s ease;
        }
        .register-link:hover {
            color:rgb(0, 2, 2);
        }
    </style>
  </head>

  <body>
      <div class="form-login">
          <form method="POST">
              <h2>Login</h2>
              <input type="text" class="form-control" name="user" placeholder="User ID" autofocus>
              <input type="password" class="form-control" name="pass" placeholder="Password">
              <button class="btn btn-block" name="proses" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          </form>
          <!-- Link ke halaman register -->
          <a href="register.php" class="btn btn-block register-link">Register</a>
      </div>
  </body>
</html>
