<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Arsip In -Login</title>  

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    
<form class="form-signin" method="post" action="cek_login.php">
  <div class="text-center mb-4">
    <img class="mb-4" src="assets/tahu.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">
      <span style="color: black;">Selamat Datang di </span>
      <span style="color: rgb(255, 233, 39); font-weight: bold;">Arsip In</span>
    </h1>
    <p>Silakan masukan username dan password Anda, sebelum masuk ke dalam sistem Arsip In.</p>
    </div>

  <div class="form-label-group">
    <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
    <label for="username">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <label for="password">Password</label>
  </div>

  <button class="btn btn-lg text-black btn-block" type="submit" style="background-color: rgb(255, 233, 39);">
    Sign in
  </button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; <?=date('Y')?> | Development by Kelompok 3</p>
</form> 
  </body>
</html>