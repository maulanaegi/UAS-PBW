<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Sistem Penjualan Barang Berbasis Web</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <!-- jQuery dan Bootstrap -->
  <script src="assets/js/jquery-2.2.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/datatables/jquery.dataTables.js"></script>
  <script src="assets/datatables/dataTables.bootstrap.js"></script>

  <style>
    .header { background: #00008B; color: #fff; }
    #main-content { background: #fff; }
    .logo-dropdown {
      position: absolute;
      top: 5px; /* Menaikkan posisi logo */
      right: 20px;
      text-align: right;
    }
    .logo-dropdown a {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      display: flex;
      align-items: center;
    }
    .logo-dropdown img {
      width: 50px;
      height: 50px;
      margin-right: 15px;
      border-radius: 50%;
    }
    .logo-dropdown .dropdown-menu {
      min-width: 150px;
    }

    /* Tambahan untuk animasi teks SELAMAT DATANG */
    .welcome-text {
      font-size: 30px;
      font-weight: bold;
      color: rgb(255, 255, 255);
      text-align: center;
      position: absolute;
      top: 10%;
      left: 30%;
      transform: translateX(-50%);
      overflow: hidden;
      white-space: nowrap;
      animation: slide 20s linear infinite;
    }

    /* Animasi teks bergerak */
    @keyframes slide {
      0% {
        transform: translateX(-90%);
      }
      50% {
        transform: translateX(0%);
      }
      100% {
        transform: translateX(100%);
      }
    }
  </style>
</head>
<body>
  <section id="container">
    <!-- Header Section -->
    <header class="header black-bg">
      <!-- Sidebar Toggle -->
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>

      <!-- Welcome Text -->
      <div>
        <div class="welcome-text">SELAMAT DATANG</div>
      </div>

      <!-- Logo Dropdown -->
      <div class="logo-dropdown">
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="assets/img/Leptop.jpg" alt="Logo">
            <b>TOKO KOMPUTER</b>
          </a>
          <ul class="dropdown-menu pull-right">
            <li><a href="index.php?page=user">Profil Pengguna</a></li>
          </ul>
        </div>
      </div>
    </header>
  </section>
</body>
</html>
