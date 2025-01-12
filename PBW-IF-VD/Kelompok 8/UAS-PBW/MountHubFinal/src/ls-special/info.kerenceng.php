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
            <h1 class="col-12">Kerenceng</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 1.742 m (5.715 kaki)</li>
                <li>Ketinggian: 863 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Gunung_Kerenceng_sfw2503 1.png" alt="Gunung Kerenceng" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung Kerenceng merupakan permata tersembunyi yang terletak sangat dekat dengan Bandung tetapi kurang dikenal di luar klub pendakian lokal Jawa
                Barat. Gunung ini dapat didaki dengan mudah sebagai pendakian sehari, dengan waktu tempuh tidak lebih dari 2-3 jam untuk naik dan 2 jam untuk turun. 
                Area puncaknya merupakan segitiga sama sisi kecil dengan sisi hanya 3 meter dan merupakan tempat pertemuan tiga punggung gunung yang sempit. 
                Kerenceng sangat mudah diakses tetapi pemandangan dari puncaknya dapat dengan mudah menipu Anda sehingga mengira Anda berada di daerah yang 
                jauh lebih terpencil.
            </p>
          
            <p>
                Bagi mereka yang senang melakukan perjalanan singkat akhir pekan dari Bandung atau Jakarta, ini adalah gunung yang sempurna. Bahkan, Anda dapat 
                melakukannya sebagai perjalanan sehari (panjang) dari Jakarta. Tempat menginap terdekat adalah Pondok Wisata Aki & Enin (850 m) yang modern dan 
                memiliki papan petunjuk yang jelas, tempat yang populer di kalangan kelas menengah Bandung di akhir pekan. Perlu dicatat bahwa tidak banyak kamar 
                sehingga Anda perlu memesan jauh-jauh hari. Jika tidak, Anda harus berkemah atau menginap di rumah pohon di ujung jalan di kawasan konservasi 
                Gunung Masigit Kareumbi (1.200 m) atau cukup menginap di Bandung saja.</p>
            <p>
                Dari jalan pintas Cicalengka, dibutuhkan waktu sekitar 15 menit untuk mencapai Aki & Enin dan 20 menit lagi untuk mencapai kawasan konservasi di ujung 
                jalan. Kawasan ini populer di akhir pekan karena air terjun Curug Sindulang yang mengesankan yang berada di sisi kiri jalan sekitar setengah jalan antara 
                Aki & Enin dan bangunan kawasan konservasi.
                Pemandu tersedia di kawasan konservasi dan dengan senang hati akan membawa Anda ke puncak Kerenceng (titik tertinggi di kawasan konservasi) kapan 
                pun Anda mau. Ada beberapa jalur pendakian, dengan jalur pendakian Sindulang paling timur (1.146 m) menjadi yang paling dekat dengan kawasan 
                konservasi.</p>
            <p>
              
Jalur ini sebenarnya dimulai agak jauh di belakang jalan di desa terakhir dan mengarah ke ladang sayur milik penduduk desa termasuk kubis, kacang, dan 
cabai. Puncak kecil yang terlihat di sebelah kanan adalah Gunung Buleud (1.423 m). Seperti semua jalur semacam ini, ada banyak persimpangan antara 
petak pertanian sehingga pemandu sangat penting.
Setelah kurang dari satu jam dari desa terakhir, Anda akan melewati ladang pertanian terakhir dan memasuki hutan pinus. Punggung bukit mendatar untuk 
sementara dan pemandangan ke segala arah mulai terbuka. Setelah turun ke celah kecil dan kemudian kembali naik lagi, punggung bukit semakin 
menyempit dan pohon pinus semakin sedikit jumlahnya. Pada titik ini, Anda akan melihat area puncak kecil di depan Anda di ujung punggung bukit. Saat 
Anda semakin dekat ke puncak, Anda harus lebih berhati-hati karena terpeleset di sini benar-benar akan berakibat fatal. Mereka yang takut ketinggian 
mungkin mengalami kesulitan di bagian terakhir pendakian ke puncak kecil.
Begitu sampai di puncak kecil, 
Anda akan dihadiahi banyak hal untuk pendakian yang sangat mudah dengan panorama yang cemerlang dari daerah-daerah 
liar Jawa Barat. Jika Anda merasa rute pendakian sulit, pertimbangkan betapa lebih sulitnya jika Anda melewati salah satu dari dua punggung bukit lainnya 
yang bertemu di puncak Kerenceng. Di sebelah kiri (barat) adalah punggung bukit tajam yang mengarah ke puncak tanpa nama dengan ketinggian 1.709 m 
dan di sebelah kanan (timur laut) adalah punggung bukit bergerigi yang mengarah ke puncak tanpa nama dengan ketinggian 1.610 m dan Gunung 
Pangukusan di sekitarnya. Yang terakhir ini adalah rute alternatif bagi mereka yang mendekati gunung dari sisi Sumedang. Tepat di depan Anda adalah 
penurunan besar yang hampir vertikal ke daerah hutan terpencil yang tampaknya penuh dengan kehidupan burung. Jika Anda beruntung, Anda akan 
dikelilingi oleh burung layang-layang saat mereka menukik di sekitar puncak yang sejuk. Gunung Kareumbi (1.685 m) terletak kurang dari 2 kilometer ke 
barat.
            </p>
            <p>
                Setelah mengagumi pemandangan yang indah, kembalilah ke jalan yang sama menuju desa dan jalan utama di lereng gunung. Tidak akan memakan waktu 
                lebih dari 90 menit untuk turun ke jalan di mana terdapat banyak penduduk desa yang dengan senang hati mengantar Anda kembali ke jalan pintas di 
                Cicalengka dengan biaya hanya Rp20.000 atau Rp30.000, di mana Anda dapat memanggil bus Primajasa dan kembali ke Jakarta dalam waktu singkat. 
                Namun, Anda mungkin ingin mampir di air terjun Sindulang sebelum pulang.
Rute lainnya adalah sebagai berikut (dari timur ke barat): Dari titik awal pendakian Tanjung Wangi (1.110 m) ada jalan setapak yang mengarah ke atas 
melalui ladang-ladang pertanian dan ke punggung bukit tempat terdapat tempat berkemah (1.725 m). Di sinilah jalur lain bergabung dari titik awal 
pendakian Tegalmanggung (1.010 m). Di luar tempat berkemah, jalur tersebut mencapai punggung bukit di persimpangan (1.720 m). Belok kanan di sini 
untuk mencapai puncak dalam waktu kurang dari dua puluh menit dan temui jalur pendakian dari Sindulang.
Jika Anda belok kiri di persimpangan punggungan, Anda dapat mengikuti punggungan utama yang sangat sempit ke arah barat melalui Puncak Batu (1.625 
m) yang merupakan daerah berbatu dan mencapai puncak Gunung Kareumbi (1.685 m). Dari sini, jalan setapak menurun ke barat dan turun 
ke Cimanggung (1.030 m) yang merupakan titik awal keempat dan terakhir yang digunakan oleh pendaki lokal.
            </p>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-kerenceng.jpg"
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
