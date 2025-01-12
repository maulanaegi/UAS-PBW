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
            <h1 class="fs-4">Hubungi Kami</h1>
            <p>
                Jika Anda memiliki pertanyaan, komentar, atau ingin memberikan informasi tambahan tentang gunung yang terdaftar di Mount Hub, 
                kami akan dengan senang hati mendengarnya! Anda juga dapat
            </p>
            <ul>
                <li>Memberikan informasi terbaru tentang rute pendakian atau kondisi gunung</li>
                <li>Merekomendasikan pemandu lokal terpercaya</li>
                <li>Mendukung situs ini melalui donasi untuk membantu kami menyediakan konten yang lebih baik</li>
                <li>Mengiklankan layanan terkait pendakian atau akomodasi lokal Anda</li>
              </ul>

                <p>Silakan lengkapi formulir di bawah ini, dan kami akan menghubungi Anda secepat mungkin. Terima kasih atas dukungan dan minat Anda 
                terhadap pelestarian gunung dan eksplorasi bertanggung jawab!</p>
                <p>Mount Hub adalah proyek independen yang bertujuan untuk berbagi informasi seputar dunia pendakian gunung. Semua dana yang 
                diterima digunakan untuk mendukung operasional situs, termasuk pembaruan konten, biaya hosting, dan pengembangan fitur baru.</p>
                <p>Dengan melanjutkan, Anda setuju bahwa Anda telah membaca dan memahami <a href="#">kebijakan privasi</a>kami </p>

                <form class="mt-5" action="https://formspree.io/f/xdkovolr" method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama Anda (Wajib diisi)</label>
                      <input type="text" name="name" class="form-control mt-2" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="form-group mt-4">
                        <label for="exampleFormControlInput1">Alamat Email Anda (Wajib diisi)</label>
                        <input type="email" name="email" class="form-control mt-2" id="exampleFormControlInput1" placeholder="">
                      </div>

                      <div class="form-group mt-4">
                        <label for="exampleFormControlInput1">Subjek Email Anda (Wajib diisi)</label>
                        <input type="text" name="subjek" class="form-control mt-2" id="exampleFormControlInput1" placeholder="">
                      </div>
                    
                    <div class="form-group mt-4">
                      <label for="exampleFormControlTextarea1">Pesan Anda</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark mt-3 ps-3 btn-submit">Kirim</button>
                  </form>
        
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
