<?php
session_start();  // Pastikan session dimulai

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, arahkan ke halaman login
    header('Location: ../../index.php');
    exit();  // Pastikan tidak ada kode lain yang dieksekusi setelah redirect
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MountHub</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="../../home.php">MountHub</a>
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
          <ul class="navbar-nav ms-auto">
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
                <li><a class="dropdown-item" href="info-mounthub.php">Apa itu MountHub!</a></li>
                <li><a class="dropdown-item" href="donasi.php">Donasi</a></li>
                <li><a class="dropdown-item" href="hubungi.php">Hubungi</a></li>
                <li><a class="dropdown-item" href="privacy.php">Privacy Police</a></li>
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
                <li><a class="dropdown-item" href="../ls-sangattinggi/list-gunung-st.php">Sangat Tinggi</a></li>
                <li><a class="dropdown-item" href="../ls-tinggisedang/list-gunung-ts.php">Tinggi Sedang</a></li>
                <li><a class="dropdown-item" href="../ls-kurangtinggi/list-gunung-kt.php">Kurang Tinggi</a></li>
                <li><a class="dropdown-item" href="../ls-special/list-gunung-s.php">Special</a></li>
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
                    href="../../products.php"
                  >
                  Tenda
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="../../Sepatu Gunung.php"
                  >
                  Sepatu Gunung
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="../../Ransel Gunung.php"
                  >
                  Ransel Gunung
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="../../Jaket Gunung.php"
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
          </ul>
        </div>
      </div>
    </nav>

    <section class="info-gunung pt-5">
      <div class="container custom-bg">
        <div class="infoin p-5">
        <div class="mt-5">
            <h1 class="fs-4">Apa itu MountHub?</h1>
            <p>
            MountHub adalah platform berbasis web yang dirancang khusus untuk mempermudah para pecinta alam dalam merencanakan pendakian gunung. Dengan tampilan antarmuka yang sederhana namun intuitif, MountHub menyediakan berbagai fitur untuk memastikan pengalaman mendaki yang aman dan terorganisir. Selain itu, MountHub juga menawarkan layanan e-commerce yang menjual perlengkapan mendaki berkualitas seperti tenda, sepatu gunung, jaket gunung, dan ransel gunung. Semua produk dipilih dengan cermat untuk memenuhi kebutuhan para pendaki, memastikan kenyamanan dan keamanan selama perjalanan.

            </p>

            <div class="mt-5">
              <h1 class="fs-4">Apa itu Ribu?</h1>
            <p>
                Istilah ini berasal dari bahasa Indonesia, di mana "ribu" berarti seribu. Dengan keunggulan topografi minimal 1.000 meter, gununggunung ini menjadi ikon penting dalam dunia pendakian, baik di Indonesia maupun di negara-negara tetangga seperti Malaysia dan 
                Timor Timur
            </p>
        
            <div class="mt-5">
              <h1 class="fs-4">MountHub di Jawa Barat</h1>
            <p>
                Di Jawa Barat, gunung-gunung seperti Gunung Ciremai, Gunung Gede, dan Gunung Papandayan adalah contoh Ribu yang sangat 
                populer. Setiap gunung menawarkan keindahan alam yang luar biasa, mulai dari kawah aktif, hutan tropis, hingga panorama puncak yang 
                memukau.
            </p>
            <p>Mount Hub membagi gunung-gunung ini ke dalam beberapa kategori</p>

            <section class="info-tinggi" id="info-tinggi">
                <div class="container text-center">
                  <div class="row">
                    <div class="col">
                      <img src="../../assets/img/Image.png" alt="" />
                      <h1 class="fs-5 pt-3 fw-bold">Sangat Tinggi</h1>
                      <p class="fs-6">(Very High) Over 3000 m elevation</p>
                      <h1 class="fs-6">Learn More</h1>
                    </div>
                    <div class="col">
                      <img src="../../assets/img/Image.png" alt="" />
                      <h1 class="fs-5 pt-3 fw-bold">Sedang Tinggi</h1>
                      <p class="fs-6">(Fairly High) 2000 to 3000 m elevation</p>
                      <h1 class="fs-6">Learn More</h1>
                    </div>
                    <div class="col">
                      <img src="../../assets/img/Image.png" alt="" />
                      <h1 class="fs-5 pt-3 fw-bold">Kurang Tinggi</h1>
                      <p class="fs-6">(Less High) Below 2000 m elevation</p>
                      <h1 class="fs-6">Learn More</h1>
                    </div>
                    <div class="col">
                      <img src="../../assets/img/Image.png" alt="" />
                      <h1 class="fs-5 pt-3 fw-bold">Special</h1>
                      <p class="fs-6">(Non-Ribu) A special reason to bag it</p>
                      <h1 class="fs-6">Learn More</h1>
                    </div>
                  </div>
                </div>
              </section>

              <p>Dengan Mount Hub, Anda dapat mengeksplorasi informasi lengkap tentang gunung-gunung di Jawa Barat dan sekitarnya, termasuk rute 
pendakian, peta, dan tips perjalanan. Jadikan Mount Hub sahabat Anda untuk menjelajahi keindahan alam yang tak terlupakan</p>
        </div>
      </div>
    </section>

    
    <footer>
      <div class="container mt-5">
        <h1 class="text-light" style="font-family: 'Libre Baskerville', serif;">
          Siap mendaki?
          <br />
          Mulailah petualangan
          <br />
          Anda bersama <span class="text-warning">Mount Hub!</span>
        </h1>
  
          <div class="email">
            <img
              class="img-fluid"
              src="../../assets/img/OIP__2_-removebg-preview 1.png"
              alt=""
            />
            <h2 class="text-light fs-5 pt-1 ps-2">hubmountaint@gmail.com</h2>
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
