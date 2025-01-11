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
            <h1 class="fs-4">Dukung Mount Hub: Bersama Kita Melestarikan Keindahan Alam</h1>
            <p>
              Sejak diluncurkan, Mount Hub telah menerima dukungan dari banyak pihak yang percaya akan pentingnya menjaga keajaiban alam di 
              Asia Tenggara. Dukungan Anda sangat berarti dalam membantu kami terus menyediakan sumber daya bagi pendaki gunung, pecinta 
              alam, dan komunitas lokal, serta mempromosikan pariwisata yang berkelanjutan.
            </p>

            <h1 class="fs-4">Mengapa Donasi Anda Penting?</h1>
            <p>
              Mount Hub didedikasikan untuk memberikan informasi lengkap tentang gunung-gunung di Asia Tenggara. Dengan dukungan Anda, 
              kami dapat:
            </p>

            <ul>
              <li><b>Memperbarui Informasi Akurat:</b> Menyediakan data terkini tentang rute pendakian, keunikan alam, dan status ekosistem gunung.</li>
              <li><b>Melestarikan Warisan Alam:</b> Mendukung inisiatif lokal yang melindungi keanekaragaman hayati di kawasan pegunungan.</li>
              <li><b>Menginspirasi Komunitas Pecinta Alam:</b> Membantu pendaki dan wisatawan memahami pentingnya menjaga lingkungan saat 
                  menjelajahi gunung.</li>
              <li><b>Mengembangkan Platform Digital yang Lebih Baik:</b> Memastikan bahwa situs ini tetap menjadi sumber terpercaya bagi siapa pun 
                  yang ingin mengeksplorasi gunung secara bertanggung jawab.</li>
            </ul>

            <p>
              Dengan berdonasi, Anda menjadi bagian dari upaya kami untuk tidak hanya menyediakan informasi, tetapi juga mempromosikan cinta 
              dan penghormatan terhadap alam. <b><a href="http://lynk.id/payme/mounthub" target="_blank" class="text-primary">Donasikan sekarang melalui lynk</a></b>, 
              atau <a href="hubungi.html" class="text-primary">hubungi kami</a> jika ada pertanyaan terkait peluang ini. Terima kasih.
            </p>
          </div>
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
