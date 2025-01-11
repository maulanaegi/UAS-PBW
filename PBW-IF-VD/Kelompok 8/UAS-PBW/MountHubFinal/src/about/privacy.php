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
            <h1 class="fs-4">Tanggal Efektif: 7 Desember 2024</h1>
            <p>
                Mount Hub menghormati privasi Anda dan berkomitmen untuk melindungi data pribadi Anda. Kebijakan Privasi ini menjelaskan 
                bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi yang Anda berikan kepada kami melalui situs web Mount 
                Hub (selanjutnya disebut "Situs")
            </p>
            <h1 class="fs-4">Informasi yang Kami Kumpulkan</h1>
            <ol>
                <li>Informasi Pribadi yang Anda Berikan:</li>
                <ul>
                    <li> Nama, alamat email, atau informasi lain yang Anda berikan saat menghubungi kami melalui formulir kontak atau mendaftar 
                        layanan tertentu.</li>
                </ul>
                <li>Informasi yang Dikumpulkan Secara Otomatis:</li>
                <ul>
                    <li>Alamat IP, jenis perangkat, browser, data lokasi, dan aktivitas pengguna di Situs</li>
                    <li>Data ini dikumpulkan menggunakan teknologi seperti cookies dan alat pelacakan lainnya</li>
                </ul>
            </ol>
            <h1 class="fs-4">Cara Kami Menggunakan Informasi Anda</h1>
            <p>Kami menggunakan informasi yang dikumpulkan untuk:</p>
            <ul>
                <li>Memberikan informasi dan layanan yang Anda minta</li>
                <li>Meningkatkan pengalaman pengguna di Situs</li>
                <li>Mengelola Situs, termasuk analisis statistik dan penyelesaian masalah teknis</li>
                <li>Mengirimkan pembaruan terkait layanan kami (dengan persetujuan Anda)</li>
              </ul>

              <h1 class="fs-4">Berbagi Informasi Anda</h1>
              <p>Mount Hub tidak menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga. Namun, kami dapat membagikan informasi 
                Anda dalam situasi berikut:</p>
              <ul>
                  <li>Untuk mematuhi hukum atau permintaan resmi dari pihak berwenang</li>
                  <li> Dengan penyedia layanan tepercaya yang membantu mengoperasikan Situs (misalnya, layanan hosting atau analitik)</li>
              </ul>

              <h1 class="fs-4">Keamanan Data</h1>
              <p>Kami mengambil langkah-langkah teknis dan organisasi yang wajar untuk melindungi informasi pribadi Anda dari akses, penggunaan, 
                atau pengungkapan yang tidak sah. Namun, tidak ada metode transmisi data melalui internet yang 100% aman, sehingga kami tidak 
                dapat menjamin keamanan mutlak data Anda.</p>
              

              <h1 class="fs-4">Hak Anda</h1>
              <p>Anda memiliki hak berikut terkait informasi pribadi Anda:</p>
              <ul>
                  <li>Mengakses, memperbarui, atau menghapus informasi Anda</li>
                  <li>Menolak penggunaan data Anda untuk pemasaran</li>
                  <li>Meminta salinan informasi yang kami simpan tentang Anda.</li>
              </ul>
              <p>Untuk menggunakan hak ini, silakan hubungi kami melalui formulir kontak di Situs.</p>

              <h1 class="fs-4">Kebijakan Cookies</h1>
              <p>Situs kami menggunakan cookies untuk meningkatkan pengalaman pengguna. Anda dapat mengelola preferensi cookies melalui 
                pengaturan browser Anda</p>

                <h1 class="fs-4">Hubungi Kami</h1>
              <p>Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini atau ingin melaporkan masalah privasi, Anda dapat menghubungi kami 
                melalui formulir kontak di Situs.</p>
                <p>Dengan mengakses dan menggunakan Situs Mount Hub, Anda menyetujui ketentuan Kebijakan Privasi ini.</p>
              



                
        
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
