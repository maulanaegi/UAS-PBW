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
            <h1 class="col-12">Pangrango</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 3.020 m (9.908 kaki)</li>
                <li>Ketinggian: 427 m</li>
                <li>Ribuan kategori: Sangat Tinggi</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Gunung Agung</li>
                <li>Letusan: 1747-48, 1761, 1832, 1840, 1843, 1845, 1847-48, 1852-53, 1866, 1870, 1886-88, 1891, 1899, 1909, 1947-49, 1956-57</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Pangrango,_West_Java 1.png" alt="Gunung Pangrango" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Gunung ini merupakan salah satu dari dua puncak yang menjadi bagian dari Taman Nasional Gede Pangrango yang terkenal. Gunung ini hanya berjarak 
              50 km dari ibu kota Indonesia, Jakarta, dan merupakan salah satu tujuan wisata terpopuler di "The Puncak , yang merupakan area antara Cisarua dan 
              Cibodas. Karena letaknya yang dekat dengan Jakarta dan Bandung, gunung ini dikunjungi oleh lebih dari 50.000 pengunjung per tahun dan sebenarnya 
              ada batasan jumlah pendaki yang diizinkan untuk mendaki setiap harinya. Titik awal yang paling umum adalah di pintu masuk Kebun Raya Cibodas yang 
              megah, tempat kantor Taman Gede Pangrango berada (untuk perizinan, pemandu, porter, dan peta dasar)
            </p>
            <p>
              Sebagian besar tujuan pendaki di Taman Nasional Gede-Pangrango sebenarnya adalah Gunung Gede (2.962 m), dapat dimengerti karena pendakian ke 
              puncak Gede di sekitar tebing kawah yang menjulang tinggi adalah pengalaman hiking yang luar biasa, dan menawarkan pemandangan luas Pangrango, 
              Salak , daerah Bandung dan pada hari yang cerah Anda dapat melihat Gunung Karang di Provinsi Banten, Jakarta, dan garis pantai Jawa Barat. Anda dapat 
              melihat Sumatra jika Anda beruntung. Pangrango sendiri adalah gunung berapi yang tidak aktif dengan puncak berhutan, namun untuk pendaki yang bugar, 
              perjalanan ke kedua puncak dapat dilakukan dalam akhir pekan dengan hanya berkemah satu malam. Seorang Alfred Russel Wallace tentu saja terkesan, 
              menulis bahwa 'sejauh ini insiden paling menarik dalam kunjungan saya ke Jawa adalah perjalanan ke puncak Pangrango dan Gunung Gede'
            </p>
          </div>

          <div class="mt-5">
            <h1>Rute Cibodas</h1>
            <p>
              Dari Kantor Taman Nasional di Cibodas (1.250 m), ikuti jalur di sisi lapangan golf kebun raya hingga ke pos gerbang tempat petugas taman 
              memeriksa apakah Anda memiliki izin dan pemandu atau porter (1.367 m). Setelah 30 menit dari sini, di sepanjang jalur di ketinggian 1.575 m, 
              terdapat Telaga Biru yang terletak di sebelah kiri jalan setapak.</p>
            <p>
              Setelah 15 menit, Anda akan sampai di daerah rawa besar yang memiliki jalan setapak dari kayu dan beton di atasnya. Rawa ini dikenal 
              sebagai Rawa Gayonggong dan merupakan tempat yang bagus untuk mengambil foto Pangrango saat cuaca cerah. Setelah itu, ada gubuk kayu 
              dan papan petunjuk yang dikenal sebagai Rawa Panyangcangan (1.654 m) tepat sebelum air terjun Cibeureum (yang sebenarnya tidak berada di 
              jalur utama tetapi merupakan jalan memutar kecil yang menyenangkan)</p>
            <p>
              Dari sini, dibutuhkan waktu 60-90 menit melalui shelter Rawa Denok 1 (1.802 m) dan 2 (1.896 m) serta Batu Kukus 1 (1.950 m) dan 2 (2.048 m) 
              menuju air terjun aliran air panas yang fantastis (2.165 m), yang dapat Anda lewati dengan menggunakan tali dan tongkat untuk berpegangan. 
              Airnya sangat panas meskipun telah mengalir cukup jauh dari kawah. Tepat di seberang air panas tersebut terdapat gubuk semen yang kurang 
              menarik dan aliran air panas lainnya.
            </p>
            <p>
              Dari sumber air panas, dibutuhkan waktu sekitar 15 menit untuk mencapai area perkemahan Kandang Batu (2.181 m), yang merupakan pilihan 
              berkemah hanya bagi mereka yang merupakan pendaki pemula. Tempat ini memiliki sumber air, tetapi Anda harus mendaki selama 30 hingga 
              45 menit lagi – melalui air terjun kecil yang mengesankan bernama Panca Weuleuh – ke lokasi perkemahan Kandang Badak (2.406 m), yang 
              merupakan kawasan hutan yang relatif datar di antara Pangrango (barat laut) dan Gede (Tenggara). Ini adalah area perkemahan yang paling 
              populer, karena menawarkan pilihan untuk mendaki kedua puncak dan memiliki sumber air yang baik. Kadang-kadang bahkan ada warung 
              kecil (warung makanan ringan) di sini. Total waktu pendakian sejauh ini sekitar 3 jam untuk pendaki yang bugar, tetapi mungkin 4 atau 5 jam 
              bagi mereka yang bukan pendaki rutin.
            </p>
            <p>
              Pilihan yang disarankan jika Anda ingin mendaki kedua puncak dalam satu akhir pekan adalah mendirikan tenda di sini, dan kemudian langsung 
              melanjutkan pendakian Pangrango. Anda dapat meninggalkan porter atau pemandu untuk menjaga tenda Anda, meskipun kemungkinan besar 
              tidak ada masalah keamanan. Diperlukan waktu sekitar 3 jam perjalanan pulang pergi untuk mendaki Pangrango dari Kandang Badak. Hanya 
              beberapa menit di jalan setapak di atas perkemahan Kandang Badak, Anda akan mencapai pertigaan (2.441m) dengan jalan setapak antara 
              Gede dan Pangrango dan sebuah rambu (kanan untuk Pangrango, kiri untuk Gede). Belok kanan dan ikuti jalan setapak berhutan yang curam 
              hingga ke puncak Pangrango (3.020m). Jalan setapak dilintasi oleh beberapa pohon besar yang tumbang dan jalan setapak menjadi berlubang 
              dan lebih mudah untuk menapaki jalan setapak dengan gradien yang lebih rendah daripada mengambil semua jalan pintas
            </p>
            <p>
              Dari rambu-rambu tersebut, dibutuhkan waktu sekitar 1,5 hingga 2 jam untuk mencapai puncak, di mana terdapat struktur kayu dan pilar 
              semen di puncaknya serta beberapa pemandangan yang cukup bagus melalui cabang-cabang pohon ke kawah Gede. Pada ketinggian 3.020 m, 
              Pangrango hanya 58 meter lebih tinggi dari Gunung Gede di dekatnya. Pilar tersebut berasal dari era kolonial Belanda dan dibangun sebagai 
              bagian dari upaya awal untuk memetakan Jawa dan pulau-pulau lainnya dengan benar. Jika Anda melihat bagian belakangnya, Anda akan 
              melihat penanda bernomor – 142. Tempat terbaik untuk berkemah di Pangrango hanya berjarak lima menit di luar titik tertinggi di area 
              berumput terbuka yang indah yang disebut Alun-alun Mandalawangi, tetapi tidak ada sumber air. Alasan utama untuk berkemah di sini adalah 
              untuk mendapatkan kedamaian dan ketenangan relatif karena kebanyakan orang lebih suka berkemah di Kandang Badak atau di Gede.
            </p>
            <p>
              Setelah bermalam di Kandang Badak, Anda harus bangun pagi dan menyelesaikan pendakian yang jauh lebih mudah ke bibir kawah dan 
              puncak Gunung Gede (2.962 m). Dari Kandang Badak, ikuti rute yang sudah jelas ke bahu Gunung Gede. Anda seharusnya tidak mengalami 
              masalah jika tetap berada di jalur pendakian karena ini adalah jalur pendakian yang sangat populer dan akan ada banyak pendaki lain di 
              sekitar. Saat Anda mulai mendaki lebih tinggi di hutan, Anda akan mencapai titik di mana terdapat beberapa tiang logam dengan kawat yang 
              diikat di antaranya karena jalur pendakian menjadi jauh lebih curam di atas tonjolan batu. Mudah untuk mendaki bagian awal ini, tetapi di 
              atasnya lereng batu sangat curam dan beberapa orang mungkin tidak nyaman mendaki bagian yang curam ini. Jika Anda tidak ingin 
              melakukannya, tepat saat Anda mencapai awal jeruji dan tali logam, ada jalan setapak di selokan dalam yang berbelok ke kiri jalur pendakian. 
              Ambil rute ini karena merupakan rute alternatif yang mudah dan aman. Paling tidak, perhatikan rute ini saat Anda turun.
            </p>
            <p>
              Bau belerang semakin kuat dan jalan setapak mendekati tepi kawah (di sebelah kiri jalan setapak). Saat Anda keluar dari hutan, Anda mendaki 
              dengan lembut di sepanjang tepi kawah dan pemandangan semakin indah saat Anda mendaki. Berhati-hatilah untuk tidak melewati jalan 
              setapak yang diikat tali karena tebing tepi kawah tinggi dan terjal. Ada bendera di puncak dan pemandangan fantastis ke segala arah – Gede 
              adalah titik pandang yang jauh lebih baik daripada puncak Pangrango yang berhutan. Banyak orang berkemah di dan sekitar puncak Gede, dan 
              setidaknya tidak ada pendakian untuk melihat matahari terbit, tetapi juga tidak ada sumber air. Dari puncak ke selatan terdapat padang 
              rumput Surya Kencana yang indah dan penuh suasana (2.750m, kurang dari satu jam setelah puncak Gede), yang merupakan tempat yang 
              bagus untuk berkemah malam kedua jika Anda punya waktu (atau malam pertama Anda jika Anda tidak repot-repot mendaki Pangrango). Di 
              sisi lain padang rumput terdapat Gunung Gumuruh yang berhutan, dengan ketinggian 2.927m, puncak tertinggi ketiga di daerah tersebut.
              Dari Surya Kencana, Anda dapat mengikuti jalan setapak yang panjang dan terkikis hingga ke desa Gunung Putri (1.553 m) dan naik ojek 
              kembali ke Cibodas. Luangkan waktu 4-5 jam untuk mencapai Gunung Putri dari Surya Kencana. Tentu saja, alternatifnya adalah kembali 
              dengan cara yang sama
            </p>
            <p>

            </p>
          </div>

          <div class="mt-5">
            <h1>Rute Gunung Putri</h1>
            <p>
              Ada juga akses ke Gede-Pangrango dari selatan di Pondok Halimun (1.111 m), Selabintana – dekat Sukabumi. Karena lebih jauh dari Jakarta, ini 
              adalah rute yang paling tidak populer dari ketiga rute tersebut dan karena itu lebih sedikit orang yang menggunakan jalur tersebut.
            </p>
            <p>
              Jalan setapak sepanjang 11 km dari kantor Taman Nasional ke area perkemahan Surya Kencana di bawah puncak Gede dan terdapat banyak 
              lintah di bagian bawah jalan setapak ini! Jalan setapak ini sangat cocok jika Anda tidak keberatan berkendara sedikit lebih jauh ke Sukabumi 
              dan juga jika Anda ingin lebih menyendiri
            </p>
            <p>
              Jalan setapak sepanjang 11 km dari kantor Taman Nasional ke area perkemahan Surya Kencana di bawah puncak Gede dan terdapat banyak 
              lintah di bagian bawah jalan setapak ini! Jalan setapak ini sangat cocok jika Anda tidak keberatan berkendara sedikit lebih jauh ke Sukabumi 
              dan juga jika Anda ingin lebih menyendiri
            </p>

            <div class="mt-5">
              <h1>Pendakian harian</h1>
            <p>
              Secara teknis, pendakian Gede atau Pangrango dapat dilakukan dalam satu hari dari pintu masuk Cibodas mulai pukul 6 pagi, dan banyak 
              orang yang melakukannya, meskipun legalitasnya masih abu-abu. Banyak penduduk setempat mengunjungi air terjun Cibeureum sebagai 
              bagian dari perjalanan setengah hari, dan karena perjalanan ini ditempuh dalam waktu satu jam di sepanjang jalur yang sama dengan puncak 
              gunung, maka Anda dapat melanjutkan perjalanan ke atas gunung. Namun, pilihan ini tidak disebutkan di situs web Taman Nasional yang 
              hanya menyebutkan pilihan berkemah selama 2 hari dan 1 malam. Anda dapat mencoba menanyakan hal ini terlebih dahulu melalui email, 
              karena datang pada hari itu dapat membuat Anda kecewa jika mereka memberi tahu Anda bahwa hal itu tidak diperbolehkan (meskipun 
              beberapa pendaki hanya mengatakan bahwa mereka ingin mengunjungi air terjun).
            </p>
            <p>
              Pada tahun 2018, tiket satu hari tidak dibeli di kantor utama tempat Anda mendaftar untuk pendakian 2 hari (lihat di bawah) tetapi sedikit 
              lebih jauh di loket tiket di ketinggian 1.400 m. Agak aneh, kantor taman utama untuk tiket 2 hari tidak buka sampai jam 8 pagi, tetapi loket 
              tiket satu hari buka jam 6 pagi. Harga tiket sekitar Rp12.000 untuk penduduk setempat atau pemegang KITAS/KITAP (Rp18.500 pada hari libur 
              nasional atau akhir pekan) atau Rp150.000 untuk orang asing (Rp240.000 pada hari libur/akhir pekan).
            </p>
            <p>
              Informasi Bagging oleh Daniel Quinn dan Andy Dean, (diperbarui September 2018).
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-gede-pangrango 1.png"
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
