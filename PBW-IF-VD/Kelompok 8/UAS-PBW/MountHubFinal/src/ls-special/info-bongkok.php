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
            <h1 class="col-12">BONGKOK</h1>
          </div>

          <div class="row">
            <div class="col-lg-6 col-12 mt-5 me-5">
              <h1>Fakta</h1>
              <ul>
                <li>Ketinggian: 985 m (3,232 ft)</li>
                <li>Ketinggian: 717 m</li>
                <li>Ribuan kategori : Spesial</li>
                <li>Provinsi : Jawa Barat (West Java)</li>
                <li>Google Earth : kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>
            <div class="col-lg-5 col-12">
              <img src="../../assets/img/Gunung_sanggabuana_sfw2503 1.png" alt="" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung Bongkok yang terjal dan mengagumkan (kadang-kadang salah dieja menjadi 'Bangkok') terletak di sebelah selatan Gunung Parang yang sama-
                sama megah . Keduanya sangat menarik bagi para pemanjat tebing karena terdapat berbagai permukaan batu vertikal di lerengnya. Daerah yang indah ini 
                dapat dengan mudah dijelajahi dalam perjalanan sehari dari Jakarta.
            </p>
          
            <p>
                Pada tahun-tahun sebelumnya, Bongkok maupun Parang tidak sering dikunjungi kecuali oleh penduduk desa setempat dan pendaki mahasiswa sesekali, 
                tetapi pada tahun 2020 keduanya menjadi tempat populer untuk perjalanan akhir pekan dan bahkan ada rambu-rambu pariwisata lokal dari jarak beberapa 
                kilometer. Kedua puncak itu menakjubkan, dan prediksi saya pada tahun 2011 bahwa hanya masalah waktu sebelum gunung-gunung ini menjadi lebih 
                terkenal telah menjadi kenyataan.</p>
            <p>
                Kedua puncak tersebut terletak di sebelah timur waduk Jatiluhur yang besar di dekat Purwakarta. Titik awal Gunung Bongkok adalah Sukamulya (atau lebih 
                dikenal dengan Cisarua), yang paling mudah diakses melalui Plered karena jalan pertanian kecil dari Purwakarta sangat bergelombang dan berbatu dan 
                akan memakan waktu setidaknya 20 menit hanya untuk sampai dari Pasangrahan (titik awal Parang) ke Sukamulya atau Cisarua. Jalan lokal telah diperbaiki 
                dalam beberapa tahun terakhir dan sekarang hanya membutuhkan waktu sekitar 1 jam dari Purwakarta.
Rute Sukamulya</p>
            <p>
              
                Jalur Sukamulya dimulai di ujung jalan setelah SMPN 2 Tegalwaru. Pada tahun 2020, sudah ada 2 warung yang menjual minuman dan makanan ringan, 
                toilet umum sederhana, dan sedang dilakukan pembangunan gedung baru. Pemandangan di jalan menuju Gunung Parang sangat mengagumkan dan titik 
                awal jalur pendakian berada di ketinggian 625 m di atas permukaan laut. Hanya sekitar 360 meter pendakian untuk mencapai puncak yang membutuhkan 
                waktu sekitar 1 jam hingga 90 menit bagi sebagian besar pendaki untuk mencapai puncak dan waktu yang sama untuk turun lagi.
Ikuti jalan setapak berbatu yang mengarah ke atas lereng bukit. Anda akan segera mencapai punggung bukit di Pos 2 (659 m) yang merupakan area yang 
sangat menyenangkan dengan bangunan kecil yang indah dan jalur setapak bambu yang menghadap ke ujung selatan waduk Jatiluhur di sisi lain gunung. 
Anda juga dapat melihat jalur yang kurang populer yang muncul dari sisi lain di Cisarua (lihat di bawah untuk detailnya).
            </p>
            <p>
                Dari Pos 2, belok kanan. Daerah ini dipenuhi bambu dan batu-batu besar. Beberapa batu besar ini akan menjadi tempat berteduh jika terjadi hujan lebat. 
                Jalan setapak akan segera menjadi jauh lebih curam dan ada beberapa tempat yang agak sulit di mana Anda harus menggunakan kedua tangan untuk naik/
                turun batu besar (764m) dan daerah berlumpur yang curam. Untungnya ada tali yang akan membantu Anda dalam hal ini. Setelah 770m bambu akan 
                berganti menjadi tumbuhan lain. Tidak banyak pemandangan di sini karena pepohonan, tetapi anggaplah ini sebagai berkah karena akan sangat panas di 
                luar tempat teduh.
            </p>
            <p>
                Tak lama lagi Anda akan mencapai punggungan puncak sesungguhnya (957m), di sana Anda akan berbelok ke kiri, melewati lokasi kuburan kuno (terlihat 
                pada tahun 2011, tetapi tidak pada tahun 2020), lalu akhirnya melihat bongkahan batu puncak gunung yang luar biasa ini.
Karena ukuran batu-batu besar tersebut, yang paling tinggi disebut Batu Tumpuk, tidak ada pohon yang dapat tumbuh di puncak gunung tersebut, 
sehingga pemandangannya sungguh menakjubkan – luasnya waduk Jatiluhur di bawahnya, bentuk fenomenal Gunung Parang di dekatnya, jurang vertikal 
yang turun ke desa-desa dan gunung suci Gunung Sangga Buana di sisi lain waduk. Sungguh menakjubkan – mungkin pemandangan terbaik dalam jarak 
100 kilometer dari Jakarta.
            </p>
            <p>
                Batu-batu besar tersebut mudah didaki, jadi – tidak seperti Gunung Parang yang ditumbuhi tanaman lebat – Bongkok dapat dikantongi dengan sangat 
                mudah. ​​Namun, berhati-hatilah karena jika terjatuh di sini, Anda akan jatuh beberapa ratus meter dari permukaan tebing gunung. Ada banyak kehidupan 
                hewan di sini – burung layang-layang suka terbang di sekitar puncak dan saat cuaca cerah, Anda mungkin akan dapat melihat beberapa elang terbang di 
                bawah Anda. Ada juga sejumlah semut terbang, jadi pastikan untuk memeriksanya setiap beberapa menit.
Setelah menikmati satu atau dua jam di bawah naungan batu-batu besar, cukup ikuti jalan setapak kembali ke Sukamulya. Karena beberapa bagian jalan 
setapak yang curam dan sulit, luangkan waktu yang sama untuk turun dan naik.</p>
<p>
    Rute Cisarua

Pada tahun 2020, jalur Sukamulya sejauh ini merupakan yang paling populer, tetapi gunung ini juga dapat didaki dari Cisarua di sisi barat gunung. Di 
Cisarua, terdapat sebuah warung kecil tempat beberapa kendaraan dapat diparkir. Penduduk setempat sangat ramah dan akan dengan senang hati 
memandu Anda ke puncak dengan biaya yang sangat terjangkau. Cisarua berada pada ketinggian sekitar 452 m sehingga hanya perlu mendaki sejauh 520 
meter untuk mencapai puncak, yang dapat ditempuh dengan mudah dalam waktu 2 jam oleh kebanyakan orang yang bugar.
Ada jalur baru yang mengarah dari Cisarua menuju gunung itu sendiri. Dari sini, saat cuaca cerah Anda akan dapat melihat bongkahan batu andesit besar 
berkilau yang menjadi mahkota puncak Bongkok.
</p>
<p>
    Jalan setapak pertanian mengarah ke lereng bukit dan mengikuti hamparan rumput yang indah untuk beberapa jarak. Daerah ini indah – pohon mangga, 
    ternak berkeliaran bebas, dan pemandangan indah kembali ke waduk besar.
Setelah sekitar 30 menit pendakian pertanian dataran tinggi standar, Anda akan mencapai Pos 2 di puncak bukit (665m) dan di sinilah Anda bertemu 
dengan rute yang lebih populer dari Sulkamulya dan di mana Anda harus berbelok kiri ke bahu gunung.
Ikuti uraian di atas untuk mencapai puncak dan tunggu sekitar 2 jam atau kurang untuk turun.
Informasi pengantongan oleh Daniel Quinn (Juni 2011, diperbarui Oktober 2020).
</p>
          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-bongkok.jpg"
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
