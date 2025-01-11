<?php
session_start();  // Pastikan session dimulai

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, arahkan ke halaman login
    header('Location: index.php');
    exit();  // Pastikan tidak ada kode lain yang dieksekusi setelah redirect
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mounthub</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="src/style.css" />
    <style>
      .navbar-nav {
        margin-left: auto;
        margin-right: 5px;
      }

      .navbar {
        justify-content: center;
      }

      /* Optional: Margin adjustments for specific items to better center the content */
      .nav-item {
        margin-left: -5px;
        margin-right: 10px;
      }

      /* Menentukan posisi profile container di navbar */
      .profile-container {
        display: flex;
        align-items: center;
        justify-content: flex-start; /* Untuk menempatkan icon dan tombol di kiri */
        margin-left: 1px; /* Menjauhkan dari sisi kiri */
       
      }

      /* Memberikan jarak antara icon profil dan tombol logout */
      .profile-icon {
        margin-right: 1px; /* Memberikan ruang antara icon profil dan tombol logout */
        
      }


    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand fw-medium" href="#">
          MountHub
          <p class="fs-6 fw-light">Climbing the Mountains of West Java</p>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                About
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="src/about/info-mounthub.php">Apa itu MountHub!</a>
                </li>
                <li><a class="dropdown-item" href="src/about/donasi.php">Donasi</a></li>
                <li><a class="dropdown-item" href="src/about/hubungi.php">Hubungi</a></li>
                <li><a class="dropdown-item" href="src/about/privacy.php">Privacy Police</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Ribu Categories
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-sangattinggi/list-gunung-st.php"
                  >
                    Sangat Tinggi
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-tinggisedang/list-gunung-ts.php"
                  >
                    Tinggi Sedang
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-kurangtinggi/list-gunung-kt.php"
                  >
                    Kurang Tinggi
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-special/list-gunung-s.php"
                  >
                    Special
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-special/ls-speecial.php"
                  >
                  
                  </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              Produk
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a
                    class="dropdown-item"
                    href="products.php"
                  >
                  Tenda
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="Sepatu Gunung.php"
                  >
                  Sepatu Gunung
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="Ransel Gunung.php"
                  >
                  Ransel Gunung
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="Jaket Gunung.php"
                  >
                  Jaket Gunung
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="src/ls-special/list-gunung-s.php"
                  >
                  </a>
                </li>
              </ul>
            </li>
            <div style="display: flex; justify-content: flex-end; align-items: center;">
  <a href="logout.php">
    <button type="button" class="btn btn-dark" style="background: transparent; border: none; color: #000; display: flex; align-items: center;">
      <img src="loggout-logo.png" alt="Logout Icon" style="width: 16px; height: 16px; margin-right: 3px; margin-top: 4px;">
      Logout
    </button>
  </a>
</div>



<!-- Profil Icon -->
<div class="profile-container d-flex align-items-center" style="position: relative; margin-top: -1px;">
  <div class="profile-icon" style="cursor: pointer;">
    &#128100; <!-- Ikon Profil (ukuran tidak diubah) -->
    <!-- Tooltip untuk Email -->
    <div style="
      display: none;
      position: absolute;
      top: 110%; /* Geser tooltip di bawah ikon */
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(135deg,rgb(90, 105, 122),rgb(102, 121, 131)); /* Gradien warna biru */
      color: #fff;
      padding: 8px 12px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      white-space: nowrap;
      font-size: 14px;
      font-family: Arial, sans-serif;
      z-index: 999;
      transition: opacity 0.3s ease-in-out;
    " id="emailTooltip">
      <?php echo $_SESSION['user']['email']; ?> <!-- Email dari sesi login -->
      <!-- Segitiga (Arrow) -->
      <div style="
        position: absolute;
        top: -6px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #0077B6; /* Warna sama dengan background tooltip */
      "></div>
    </div>
  </div>
</div>

<script>
  // Menampilkan dan menyembunyikan tooltip saat ikon di-hover
  const profileIcon = document.querySelector('.profile-icon');
  const emailTooltip = document.getElementById('emailTooltip');

  profileIcon.addEventListener('mouseover', () => {
    emailTooltip.style.display = 'block';
    emailTooltip.style.opacity = '1';
  });

  profileIcon.addEventListener('mouseout', () => {
    emailTooltip.style.opacity = '0';
    setTimeout(() => emailTooltip.style.display = 'none', 300); // Delay untuk transisi
  });
</script>











            </a>
          </ul>
        </div>
      </div>
    </nav>
   

    

    <!-- Home Section -->
    <!-- Home Section -->
<section class="home bg-dark text-light py-5" id="home">
  <div class="container">
    <h1 class="display-4 fw-medium" style="font-family: 'Libre Baskerville', serif; font-size: 5rem;">Climb</h1>
    <h1 class="display-4 fw-medium" style="font-family: 'Libre Baskerville', serif; font-size: 5rem;">Higher Feel</h1>
    <h1 class="display-4 fw-medium" style="font-family: 'Libre Baskerville', serif; font-size: 5rem;">
      The <span class="text-warning">Adventure</span>
    </h1>
        <a href="src/about/info-mounthub.php">
          <button type="button" class="btn btn-outline-light mt-3">Apa itu MountHub!</button>
        </a>
      </div>
    </section>

    <!-- Hero Section -->
    <section class="hero py-5" id="hero">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="assets/img/Rectangle 3.png" alt="" class="img-fluid" />
          </div>
          <div class="col-md-6 text-center text-md-start">
            <h1 class="display-6 fw-medium">Batas langkah seseorang itu seperti apa?</h1>
            <p class="pt-3">
              Mereka yang berani melangkah terlalu jauh yang mungkin dapat mengetahui sejauh mana
              seseorang dapat melangkah.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Info Tinggi Section -->
    <section class="info-tinggi py-5 bg-light" id="info-tinggi">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-3 col-6 mb-4">
            <img src="assets/img/Image.png" alt="" class="img-fluid" />
            <h2 class="fs-5 pt-3 fw-bold">Sangat Tinggi</h2>
            <p class="fs-6">(Very High) Over 3000 m elevation</p>
          </div>
          <div class="col-md-3 col-6 mb-4">
            <img src="assets/img/Image.png" alt="" class="img-fluid" />
            <h2 class="fs-5 pt-3 fw-bold">Sedang Tinggi</h2>
            <p class="fs-6">(Fairly High) 2000 to 3000 m elevation</p>
          </div>
          <div class="col-md-3 col-6 mb-4">
            <img src="assets/img/Image.png" alt="" class="img-fluid" />
            <h2 class="fs-5 pt-3 fw-bold">Kurang Tinggi</h2>
            <p class="fs-6">(Less High) Below 2000 m elevation</p>
          </div>
          <div class="col-md-3 col-6 mb-4">
            <img src="assets/img/Image.png" alt="" class="img-fluid" />
            <h2 class="fs-5 pt-3 fw-bold">Special</h2>
            <p class="fs-6">(Non-Ribu) A special reason to bag it</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
      <div class="container">
        <h1 class="fs-1 display-4 fw-medium" style="font-family: 'Libre Baskerville', serif;">Gunung,<br />Petualangan Tanpa Batas.</h1>
        <div class="d-flex justify-content-center align-items-center mt-3">
          <img src="assets/img/OIP__2_-removebg-preview 1.png" alt="" class="img-fluid" style="width: 20px; height: 20px;" />
          <div class="container">
          <h2 class="fs-6 ms-0 mt-2">hubmountaint@gmail.com</h2>
        </div>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
