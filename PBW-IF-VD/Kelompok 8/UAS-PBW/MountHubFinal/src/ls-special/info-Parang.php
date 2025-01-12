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
    <title>Bootstrap demo</title>
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
                <li><a class="dropdown-item" href="../about/info-mounthub.php">Apa itu MountHub!</a></li>
                <li><a class="dropdown-item" href="../about/donasi.php">Donasi</a></li>
                <li><a class="dropdown-item" href="../about/hubungi.php">Hubungi</a></li>
                <li><a class="dropdown-item" href="../about/privacy.php">Privacy Police</a></li>
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
          </ul>
        </div>
      </div>
    </nav>



    <section class="info-gunung pt-5">
      <div class="container custom-bg">
        <div class="infoin p-5">
          <div class="row">
            <h1 class="col-12">Parang</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 930 m (3.051 kaki)</li>
                <li>Ketinggian: 369 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Mount_Parang 1.png" alt="Mount Parang" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung Parang adalah salah satu destinasi mendaki paling menarik di Jawa Barat. Letaknya yang strategis di dekat waduk Jatiluhur membuatnya mudah 
                diakses, meski sebelumnya hanya dikenal oleh para pendaki tebing. Gunung ini memiliki kesamaan dengan gunung Suilven di Skotlandia karena 
                bentuknya yang unik. Sejak 2017, popularitasnya meningkat dan kini menjadi tujuan favorit bagi para petualang.
            </p>
          
            <p>
                Perjalanan menuju Gunung Parang dimulai dari desa Pasangrahan, sekitar satu jam perjalanan dari Purwakarta. Dari sini, jalur pendakian yang terawat baik 
                membawa Anda ke puncak. Desa ini juga menjadi titik registrasi sebelum memulai pendakian. Gunung tetangga seperti Gunung Bongkok turut 
                melengkapi keindahan panorama di sekitar area.</p>
            <p>
                Kedua puncak tersebut terletak di sebelah timur waduk Jatiluhur yang besar di dekat Purwakarta. Titik awal Gunung Bongkok adalah Sukamulya (atau lebih 
                dikenal dengan Cisarua), yang paling mudah diakses melalui Plered karena jalan pertanian kecil dari Purwakarta sangat bergelombang dan berbatu dan 
                akan memakan waktu setidaknya 20 menit hanya untuk sampai dari Pasangrahan (titik awal Parang) ke Sukamulya atau Cisarua. Jalan lokal telah diperbaiki 
                dalam beberapa tahun terakhir dan sekarang hanya membutuhkan waktu sekitar 1 jam dari Purwakarta.
Rute Sukamulya</p>
            <p>
              
                Perjalanan menuju Gunung Parang dimulai dari desa Pasangrahan, sekitar satu jam perjalanan dari Purwakarta. Dari sini, jalur pendakian 
                yang terawat baik membawa Anda ke puncak. Desa ini juga menjadi titik registrasi sebelum memulai pendakian. Gunung tetangga seperti 
                Gunung Bongkok turut melengkapi keindahan panorama di sekitar area.
            </p>
            <p>
                Perjalanan menuju Gunung Parang dimulai dari desa Pasangrahan, sekitar satu jam perjalanan dari Purwakarta. Dari sini, jalur pendakian yang terawat baik 
                membawa Anda ke puncak. Desa ini juga menjadi titik registrasi sebelum memulai pendakian. Gunung tetangga seperti Gunung Bongkok turut 
                melengkapi keindahan panorama di sekitar area.
            </p>
            <p>
                Pendakian menuju punggungan Gunung Parang memakan waktu sekitar satu jam lebih dengan jalur yang curam. Di sepanjang rute, terdapat beberapa 
                pos istirahat dan rumah pohon yang menawarkan pemandangan spektakuler, termasuk waduk Jatiluhur dan gunung-gunung lain di sekitarnya. Bagi 
                pendaki yang belum terbiasa, pemandu lokal direkomendasikan untuk membantu perjalanan.
            </p>
            <p>
                Di puncak Parang, Anda dapat menikmati pemandangan luar biasa dari "Tower 1" atau menjelajah lebih jauh ke titik tertinggi yang jarang dikunjungi. 
                Meski hanya berjarak pendek, menuju puncak sebenarnya memerlukan usaha ekstra karena medan yang tertutup semak belukar. Keindahan panoramanya 
                menjadikan pengalaman mendaki Gunung Parang sangat memuaskan. </p>
<p>
    Selain itu, wisatawan juga dapat mengeksplorasi Gunung Lembu dan menikmati keindahan waduk Jatiluhur di sekitar area. Perjalanan ke Gunung Parang 
    menjadi petualangan tak terlupakan, terutama jika dimulai pagi hari untuk menghindari panasnya terik matahari. Kombinasi antara keindahan alam dan 
    tantangan pendakian membuat Gunung Parang layak dijadikan tujuan wisata.
</p>
<div class="mt-5">
    <h1>Gunung Lembu (692m).</h1>
<p>
    Salah satu bukit yang lebih menonjol yang dapat Anda lihat dari puncak Parang dan Bongkok adalah Gunung Lembu, puncak ketiga yang paling menarik 
    di daerah tersebut. Tidak mengherankan pemandangan dari Lembu ke Parang dan Bongkok sangat bagus. Itu membuat setengah hari yang layak dari 
    Jakarta (jika Anda berangkat cukup pagi untuk menghindari masalah lalu lintas yang biasa). Ikuti petunjuk seperti di bawah ini untuk Parang tetapi alih-alih 
    berbelok ke kiri untuk menuju Parang dan Bongkok teruslah sejauh satu kilometer ke desa Panyindangan (359m). Ada tempat parkir mobil (Rp10.000) di 
    seberang basecamp yang layak. Tiket masuk adalah Rp10.000. Pendakian itu sendiri dapat diselesaikan dalam total sekitar 3 jam, termasuk banyak waktu 
    untuk mengambil foto dan beristirahat, dll. Pendaki yang cepat dapat mencapai puncak dalam waktu kurang dari satu jam. Pemandu tidak diperlukan 
    karena sangat populer di kalangan penduduk setempat yang berkemah di sana dalam jumlah besar.
</p>
<p>
    Dari basecamp dibutuhkan waktu sekitar 15 menit untuk sampai ke Lapang Kapal (485m) di mana terdapat beberapa warung dan bangunan bambu yang 
    dapat Anda panjat untuk mendapatkan pemandangan yang indah. Warung lain mengikuti di 500m sebelum Anda mencapai awal punggungan di sebuah 
    makam di 591m. Ada lagi warung di sekitar 621m dan sebuah makam kuno sebelum punggungan menurun sebelum naik kembali ke Pos 3 (655m) setelah 
    sebuah batu dan pemandangan ke kanan. Puncak (692m) adalah batu besar di sebelah kiri jalan setapak dan dekat dengan tempat berkemah yang 
    populer. Berhati-hatilah di batu besar ini! Abaikan tanda-tanda yang mengatakan ketinggian sebenarnya adalah 792m – ini tidak benar.
</p>
<p>
    Mungkin bagian terbaik dari pendakian ini sebenarnya berada di balik puncak. Turun sekitar 70m (5 menit atau lebih) melewati batu besar dan beberapa 
    tempat berteduh dari bambu menuju 'Batu Lembu' (621m) – batu yang sangat besar yang menawarkan pemandangan indah ke hampir semua arah 
    (termasuk ke Waduk Jatiluhur dan ke Parang dan Bongkok). Ada pagar logam sederhana di sekeliling batu dan tali untuk turun ke batu, tetapi berhati-
    hatilah. Waspadalah terhadap banyaknya monyet yang mencari makan di sini!
</p>
          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-parang (1) 1.png"
                  alt=""
                  class="img-fluid"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
