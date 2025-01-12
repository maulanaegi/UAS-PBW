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
          <div class="row mb-4">
            <h1 class="col-12 text-center">Tangkuban Parahu</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2,086 m (6,848 ft)</li>
                <li>Ketinggian: 709 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
                <li>Letusan: 1826, 1829, 1842, 1846, 1896, 1910, 1926, 1929, 1952, 1957, 1961, 1965, 1967, 1969, 1983, 2013, 2019</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Gunung_Tangkuban Parahu_sfw2503 1.png" alt="Gunung Tangkuban Parahu" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung berapi yang terdiri dari banyak kawah aktif ini merupakan salah satu objek wisata utama di Jawa Barat – terutama karena tempat ini dapat dicapai dengan perjalanan sehari yang mudah dari Bandung dan terdapat jalan menuju tempat parkir mobil Jaya Giri di tepi kawah Kawah Ratu pada ketinggian 1.832 m!
            </p>

            <p>
                Kios-kios berjejer di pagar yang menghadap ke kawah dan suara azan, angkot, dan ojek bergema di udara. Namun, ini adalah sudut pandang yang mengesankan, dan sebenarnya ada beberapa pendakian yang sangat liar yang dapat dilakukan melintasi pegunungan meskipun banyak tiang yang memahkotai punggungan puncak yang panjang.</p>
<p>
    Tiga kawah utama, dari timur ke barat, adalah Kawah Domas , Kawah Ratu (jangan disamakan dengan kawah dengan nama yang sama di Gunung Salak), dan Kawah Upas . Ada banyak lubang belerang di Kawah Ratu dan beberapa aktivitas letusan serius dalam beberapa tahun terakhir termasuk pada tahun 2019. Diperkirakan bahwa beberapa ribu tahun yang lalu dataran Bandung yang luas adalah sebuah danau yang sangat besar, yang terbentuk oleh letusan kuat yang sering terjadi di daerah ini. Nama 'perahu terbalik' itu sendiri berasal dari legenda Sunda setempat dan dari kota Bandung garis besar gunung itu memang menyerupai perahu terbalik.</p>
<p>
    Transportasi umum menuju kawah gunung ini mudah dari Bandung – naik angkot ke Lembang dan naik lagi ke kawah – tetapi berhati-hatilah dengan pengemudi angkot yang menawarkan untuk mengantar Anda langsung ke puncak (dengan biaya yang sangat mahal) atau setidaknya pastikan Anda menyepakati harga terlebih dahulu. Taksi seharusnya tidak lebih dari Rp150.000 sekali jalan tetapi jika Anda ingin pengemudi menunggu selama beberapa jam, kemungkinan besar akan menjadi Rp350.000 atau Rp400.000. Sayangnya, pada bulan Maret 2019, tiket masuk ke area tersebut adalah Rp200.000 yang sangat mahal untuk non-Indonesia (Rp300.000 pada akhir pekan dan hari libur nasional) dan ini mungkin membuat Anda merasa ditipu terutama ketika Anda mengetahui bahwa penduduk setempat membayar sepersepuluh dari harga tersebut.
</p>
<p>
    Dari tepi kawah, dibutuhkan waktu sekitar 3 setengah jam untuk mengelilingi dua kawah puncak – Kawah Ratu dan Kawah Upas – termasuk mengunjungi titik tertinggi yang berada di punggungan hutan yang luas dan datar di sisi paling kanan dari dua kawah yang lebih jauh, Kawah Upas. Untuk mencapai titik tertinggi, arah berlawanan arah jarum jam jauh lebih pendek, tetapi pendakian terbaik dengan pemandangan terbaik adalah searah jarum jam, mengikuti pagar kayu di sisi kiri Kawah Ratu dan mengikuti jalan setapak yang terkadang curam dan berlumpur hingga ke kompleks tiang radio pertama di mana terdapat warung kecil yang menjual minuman dan makanan ringan dan terkadang stroberi lokal.</p>
<p>
    Sungguh mengejutkan betapa liarnya daerah ini setelah Anda berjalan-jalan selama 30 menit dari tempat parkir mobil dan kios-kios. Namun perlu dicatat bahwa pada tahun 2020 akses ke titik tertinggi gunung tersebut masih merupakan area abu-abu, seperti halnya banyak puncak di Jawa Barat, jadi Anda mungkin perlu puas hanya dengan melakukan perjalanan keliling Kawah Ratu dan berjalan-jalan sebentar ke titik pandang Kawah Upas.
Sebagian besar pendaki mengambil jalan belok kanan di warung untuk berjalan menuruni punggung bukit di antara dua kawah dan kembali ke tempat parkir mobil Jaya Giri. Ini adalah rute yang bagus saat cuaca cerah, tetapi berhati-hatilah karena mungkin ada banyak gas belerang di Kawah Ratu, navigasi bisa jadi sulit saat kondisi berawan dan ada sedikit pendakian yang harus dilakukan. Namun, untuk mencapai titik pandang terbaik, Anda harus terus berjalan lurus di sepanjang puncak gunung yang datar (ada kabel listrik hitam di pepohonan di atas).
Anda akan segera mencapai titik pandang yang indah di tepi kawah di sisi terjauh Kawah Upas (2.072 m). Ini adalah tempat terbaik untuk duduk dan mengagumi pemandangan serta beristirahat sejenak. Dari sini, ada jalan setapak kecil ke arah barat (kiri jika Anda melakukan putaran searah jarum jam) yang mengarah ke perkebunan teh dan lembah danau Situ Lembang (lihat di bawah).</p>
<p>
    Dari titik pandang, ada jalan setapak yang lebih rimbun yang berlanjut di sepanjang tepi kawah Kawah Upas, tetapi sulit untuk mencapai titik tertinggi gunung dengan mengikuti jalan setapak ini karena ada jurang dangkal yang rimbun di antara tepi dan bagian tertinggi gunung. Lebih baik mengikuti jalan setapak yang disebutkan sebelumnya di sebelah kiri dari titik pandang dan ikuti jalur kendaraan berputar dan tetap di sebelah kanan untuk menyelesaikan putaran penuh kembali ke tempat parkir mobil. Anda mungkin beruntung dan melihat beberapa satwa liar yang menarik karena hutan di dekat puncak adalah rumah bagi sejumlah besar monyet. Berhati-hatilah karena mudah tersesat di area ini.</p>
<p>
    Rute yang lebih mudah dari tempat parkir mobil untuk mencapai puncak adalah arah berlawanan jarum jam, yang melibatkan pendakian singkat naik-turun dengan pemandangan terbatas. Perjalanan pulang hanya memakan waktu 2 jam – ikuti jalan setapak di dekat kios-kios hingga Anda mencapai tanda Kawah Upas dan Air Keramat Cikahuripan (Air Suci, 1.881 m). Lanjutkan perjalanan ke Air Keramat di mana terdapat monumen semen dan beberapa gubuk tempat Anda dapat mandi di 'air suci'. Hanya butuh waktu 30 menit untuk mencapai tempat ini dari tempat parkir mobil utama Jaya Giri. Di belakang gubuk-gubuk tersebut, jalan setapak yang samar mengarah ke atas ke kanan, melewati area tanah longsor baru-baru ini, sebelum bergabung dengan jalan setapak yang sempit namun jelas di punggungan puncak utama. Belok kiri di sini dan teruslah menyusuri jalan setapak mengikuti puncak punggungan. Ada beberapa pemandangan indah melalui pepohonan ke kedua kawah, dan puncak-puncak Jawa Barat lainnya di kejauhan. Tak lama kemudian Anda akan mencapai titik tertinggi yang tidak bertanda dari gunung Tangkuban Parahu. Mungkin sebaiknya kembali dengan cara yang sama.</p>
<p>
    Bahasa Indonesia: Jika Anda masih memiliki cuaca yang baik dan sedikit energi yang tersisa setelah Anda kembali ke kendaraan Anda, ada kawah lain yang lebih kecil – Kawah Domas – sekitar dua kilometer di jalan kawah yang patut dikunjungi. Jika Anda dapat mengatur untuk dijemput di gerbang masuk Domas, Anda sebenarnya dapat berjalan kaki ke Kawah Domas (1.582m) dari tempat parkir mobil Jaya Giri di jalan setapak yang bagus melalui hutan. Dibutuhkan sekitar setengah jam untuk turun ke kawah, dan setengah jam lagi dari Kawah Domas ke gerbang masuk Domas (1.644m) di jalan utama menanjak gunung. Kawah Domas adalah area besar kolam air panas yang menggelegak dan fumarol belerang kecil. Ada sekitar 5 kolam kecil air hangat dan abu-abu di mana Anda dapat duduk-duduk, bersantai, dan mencuci kaki Anda.</p>
            </p>
<p>
    Bagi pendaki yang berjiwa petualang, atau yang ingin mencoba rute baru, gunung Tangkuban Parahu dapat didaki dari arah barat dari kawah luar Tangkuban Parahu yang jauh lebih tua – dan kini tidak aktif lagi – meski kedua rute tersebut tidak 'resmi'.
Kawah luar selebar 3 km sebenarnya merupakan objek wisata lokal yang populer karena ada danau kecil Situ Lembang yang indah di lembah tersebut. Sayangnya area ini juga sering digunakan oleh militer untuk tujuan pelatihan sehingga ada kemungkinan tidak akan dibuka untuk umum. Pintu masuk ke lembah tersebut dikenal sebagai Pintu Angin tetapi ditandai pada sebagian besar peta sebagai Kertawangi. Dari sini Anda juga dapat mendaki puncak luar yang disebut Gunung Burangrang , pendakian yang curam dan licin tetapi pendek yang membutuhkan kenaikan ketinggian kurang dari 500 meter karena jalan membawa Anda lebih dari 1.500 m di atas permukaan laut. Namun, gunung ini juga dapat ditutup pada waktu-waktu tertentu. Untuk pendakian ke Tangkuban Parahu dari sisi barat ini, ada dua pilihan yang memungkinkan jika Anda memiliki pemandu dan izin.
Hal ini dapat dilakukan dari Bendungan Situ Lembang (1.598m) melalui lintasan yang akhirnya mencapai punggungan puncak di paling utara menara telekomunikasi (2.080m)
</p>
<p>
    Anda juga dapat melakukannya dari perkebunan teh Sukawana (1.510 m) yang lebih jauh ke selatan. Sebaiknya Anda meminta bantuan pemandu lokal karena ada banyak jalur melalui perkebunan teh di dekatnya dan penyeberangan sungai di dekat titik awal terkadang tidak dapat dilalui. Anda bahkan dapat mengunjungi pabrik teh untuk melihat proses pembuatan teh dan mencoba secangkir teh yang jika tidak akan dijual sebagai Teh Lipton.
Setelah melewati labirin jalur perkebunan teh, Anda akan mencapai jalan kerikil lebar yang mengarah ke puncak gunung yang datar dan luas beserta banyak tiang pemancarnya. Saat Anda mencapai persimpangan dengan batu besar di sebelahnya, belok kanan ke arah timur laut hingga ke tepi kawah Kawah Upas dan titik pandang indah yang disebutkan di atas.
</p>
<p>
    Diperlukan waktu 3-4 jam untuk mendaki ke tepi kawah dari titik awal Sukawana/Kertawangi dan Anda dapat melanjutkan ke kiri untuk 'mencapai' titik tertinggi (perlu waktu tambahan satu jam untuk pergi dan kembali) sebelum kembali dengan cara yang sama atau melakukan perjalanan memutar dengan berjalan kaki mengelilingi tepi kedua kawah dan turun ke tempat parkir mobil wisata Kawah Ratu (Jaya Giri). Jika Anda ingin mencapai tempat parkir mobil Jaya Giri di tepi Kawah Ratu secepat mungkin (sekitar 40 menit), ikuti jalan setapak berlawanan arah jarum jam ke warung kecil di persimpangan jalan setapak di dekat kompleks tiang dan lurus ke bawah tepi kawah selatan Kawah Ratu.
Informasi pengemasan oleh Daniel Quinn.
</p>
          
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-tangkuban parahu.jpg"
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
