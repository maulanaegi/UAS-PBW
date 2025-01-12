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
            <h1 class="col-12">Gunung Tampomas</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 1.684 m (5.525 kaki)</li>
                <li>Prominensi: 1.106 m</li>
                <li>Ribuan Kategori: Kurang Tinggi</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Disebut 'Tampo Omas' dalam aksara Bujangga Manik kuno</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Gunungtampomas 1.png"
                alt="Gunung Tampomas"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Gunung Tampomas terletak di timur laut Sumedang (480 meter di atas permukaan laut) – kota yang terkenal dengan tahu gorengnya yang lezat – dan 
              mudah diakses dengan transportasi umum dari Bandung. Meskipun tidak terlalu tinggi dari segi ketinggian, Tampomas merupakan pendakian yang mudah 
              dan menyenangkan – cocok untuk pendakian pertama musim ini atau sebagai pemanasan untuk sesuatu yang lebih menantang – dan ada pemandangan 
              yang sangat indah dari puncak ke sebagian besar puncak utama di Jawa Barat.
            </p>
            <P>
              Selain dari kemungkinan asal usul nama gunung yang diberikan di bagian bawah artikel, beberapa orang mengatakan bahwa nama itu berasal dari 
              'gunung tanpa emas' atau 'tampah emas' yang berarti 'gunung tanpa emas'. Bahkan jika Gunung Tampomas tidak memiliki emas, lereng bawahnya di sisi 
              selatan di Cibeureum Kulon sudah pasti sedang ditambang untuk diambil batunya.
            </P>
            <P>
              Inilah salah satu alasan mengapa rute Narimbang (dari timur laut) lebih menyenangkan daripada rute Cibeureum (dari selatan), tetapi hal terbaik yang 
              dapat dilakukan adalah naik di satu sisi dan turun di sisi yang lain, dengan harapan sudah ada transportasi yang menjemput Anda di sisi yang lain. Kedua 
              rute tersebut membutuhkan waktu sekitar 3 jam untuk naik dan 2 jam untuk turun.
            </P>

            <div class="mt-5">
              <h1>Rute dari Narimbang</h1>
            <p>
              Rute dari Narimbang dimulai di dekat desa Conggeang di Air Terjun Ciputra Wangi (599m) ​yang merupakan Pos 1. Dari rambu-rambu, warung, dan loket 
              tiket, jalan setapak menuju puncak mengarah ke kiri dan berkelok-kelok menaiki lereng bukit. Ada bagian jalan setapak yang terbuka dan datar (945m) 
              sebelum mencapai warung yang menyenangkan di Pos 2 (Pasir Seleh, 1.029m). Anda seharusnya hanya membutuhkan waktu lebih dari 1 jam untuk 
              mencapai titik ini. Jika cuaca cerah, ini adalah tempat yang bagus untuk minum kopi dan menikmati camilan dan Anda bahkan mungkin dapat melihat 
              sesekali pesawat mendarat di Bandara Internasional Jawa Barat yang baru tidak jauh dari Majalengka. Pasangan yang tinggal di sini menanam pisang, 
              bawang, cabai, dan pepaya di sini.
            </p>
            <p>
              Lebih jauh di atas jalan setapak, Anda bisa melihat sekilas melalui pepohonan di sisi kanan jalan setapak puncak Tampomas yang datar – masih cukup jauh. 
              Dalam kondisi hujan, Anda mungkin bertemu satu atau dua lintah di bagian gunung ini, tetapi mereka tidak terlalu umum. Pos 3 (1.209m) adalah tengara 
              berikutnya dan diberi nama Batu Kukus, mungkin karena gugusan batu terbesar samar-samar menyerupai pengukus nasi. Dalam cuaca buruk, batu ini 
              tentu akan memberikan perlindungan dari hujan. Pada bulan Maret 2019, 3 pendaki remaja dari daerah Indramayu meninggal di daerah ini dalam cuaca 
              buruk – sebuah tragedi yang mudah dicegah, terutama mengingat betapa pendeknya kedua jalur mendaki gunung tersebut.
            </p>
            <P>
              Pos 4 (1.491 m) adalah Awi Kereteg dan merupakan persimpangan antara jalur Narimbang dan Cibeureum yang merupakan titik yang sangat penting. Ada 
              juga cukup banyak ruang di sini bagi mereka yang memilih untuk berkemah di bawah puncak itu sendiri. Anda seharusnya membutuhkan waktu sekitar 2 
              atau 2 setengah jam untuk mencapai titik ini, belum termasuk waktu yang Anda habiskan di warung di Pos 2. Meskipun navigasinya cukup mudah, penting 
              untuk memeriksa secara mental kedua jalur di sini sehingga Anda tidak berakhir di jalur yang salah saat turun.
            </P>
            <P>
              Jalan setapak menjadi lebih curam dan berbatu dari titik ini dan ada beberapa tempat di mana Anda perlu berhati-hati di bebatuan yang curam dan 
              terkadang licin. Batuan ini jelas berasal dari gunung berapi. Landmark berikutnya adalah permukaan batu kecil di Sangyheang Lawang (1.548m) – juga 
              disebut Watu Gede ('batu besar'). Dulunya ada gubuk sederhana di sini tetapi hilang pada tahun 2019. Jika Anda melihat kembali ke bawah jalan setapak, 
              Anda mungkin melihat Gunung Ciremai – puncak tertinggi di Jawa Barat – di kejauhan. Tak lama setelah ini adalah Sangyheang Tikoro (1.604m), titik kecil 
              di jalan setapak saat Anda mendekati puncak. Area puncak Tampomas, yang dikenal sebagai Sangyheang Taraje (atau Pasarean), berjarak kurang dari 10 
              menit lebih jauh dan dari Pos 4 ke puncak seharusnya memakan waktu tidak lebih dari 45 menit secara total. Tepat sebelum puncak ada celah gelap yang 
              dalam di sebelah kanan jalan setapak, yang tampaknya merupakan sisa-sisa kawah kuno.
            </P>
            <P>
              Pemandangan dari puncak yang dipenuhi batu-batu besar ini terbuka lebar dan sangat menyenangkan – ke arah barat menuju Bukittunggul dan bukitbukit di sekitarnya dan ke arah selatan menuju banyak puncak di dekat Garut – Gunung Guntur, Cikuray, Papandayan. Ada cukup ruang untuk sedikitnya 
              delapan tenda di area ini, dan jika Anda menghabiskan Sabtu malam di sini, Anda tidak akan sendirian. Titik tertinggi gunung tersebut tampaknya adalah 
              batu besar tepat di sebelah utara pilar buatan manusia tersebut.
            </P>
            <P>
              Sekitar 100 meter di sebelah utara titik tertinggi terdapat dua area makam kuno, yang dikenal sebagai Pasarean, yang tentunya patut dikunjungi. Ini 
              tampaknya adalah makam dari kerajaan Sunda kuno Pajajaran (yang ada hingga sekitar 500 tahun yang lalu dan beragama Hindu). Puncak kecil ini 
              tampaknya hanya satu atau dua meter di bawah puncak titik pandang, jadi para petualang disarankan untuk mengunjungi keduanya untuk berjaga-jaga! 

              Kembali ke Ciputra Wangi atau Cibeureum akan memakan waktu sekitar 2 jam, belum termasuk istirahat.
            </P>

            <div class="mt-5">
              <h1>Rute dari Cibeureum dekat Sumedang</h1>
            <p>
              Ikuti jalan dari Sumedang menuju Cirebon sejauh sekitar 6 km, melewati desa Cimalaka dan menuju daerah yang dikenal sebagai Desa Cibeureum Kulon. 
              Belok kiri di jalan sempit di seberang Masjid Al-Bashir dan di sebelah ATM Bank Mandiri (sebelumnya di papan bertuliskan Lokasi TPA ). Ikuti jalan yang 
              bergelombang dan berbatu menuju tambang pasir. Mungkin akan ada banyak truk pengangkut pasir berwarna kuning yang datang dari arah berlawanan.
            </p>
            <p>
              Teruslah menanjak lereng bukit, abaikan belokan kiri lalu belok kanan. Setelah sekitar 3 km, Anda akan mencapai tikungan tajam – parkir mobil Anda 
              sebelum titik ini. Hanya satu menit setelah tikungan tajam, ambil jalan setapak di sebelah kiri yang mengarah ke atas melalui lahan pertanian (793 m). Lima 
              menit kemudian, belok kiri di jalur pertanian dan masuk ke hutan pinus. Tak lama setelah ini, Anda akan mencapai gubuk kayu (862 m). Anda seharusnya 
              tidak memerlukan waktu lebih dari 15 menit untuk mencapai tempat ini (atau satu jam jika Anda berjalan kaki dari jalan utama).
            </p>
            <p>
              Tepat di luar pondok terdapat persimpangan (873m) menuju puncak kecil yang disebut Gunung Karang. Tentu saja ini bukan gunung di Banten, 
              melainkan Gunung Karang lain (dengan ketinggian 1.011m) yang dikenal secara lokal sebagai Anak Gunung Tampomas. Letaknya tidak terlalu 
              jauh dari persimpangan dengan jalur utama Cibeureum dan memiliki tonjolan batu di puncaknya.
            </p>
            <p>
              Dari titik ini, ada banyak rambu yang diharapkan dapat memastikan bahwa Anda berada di jalur yang benar! Jalan setapak ini akan membawa Anda 
              melewati lebih banyak hutan pinus – kebanyakan pohon memiliki batok kelapa kecil yang menempel di batangnya untuk menampung getah. 
              Persimpangan penting berikutnya berada di ketinggian sekitar 981 m. Belok kiri di sini, keluar dari jalur hutan yang lebar dan masuk ke hutan yang 
              sebenarnya. Anda dapat menyebut tempat ini 'pintu rimba' atau 'pintu masuk hutan'. Dari sini, jalurnya mudah diikuti karena mengarah ke lereng gunung 
              dan melalui 3 Pos, yang tidak satu pun ideal untuk berkemah tetapi dapat digunakan jika benar-benar diperlukan. Pos 1 berada di ketinggian 1.180 m, Pos 
              2 di ketinggian 1.307 m, dan Pos 3 di ketinggian 1.406 m.
            </p>
            <P>
              Jalan setapak mulai menanjak dan vegetasinya menjadi lebih menyerupai hutan alami. Menurut departemen kehutanan setempat, hutan Tampomas adalah 
              rumah bagi kancil, lutung, dan babi hutan. Setelah total sekitar 2 jam (atau 3 jam jika Anda berjalan kaki dari jalan utama), Anda seharusnya sudah 
              mencapai Pos 4 (Awi Kereteg, 1.491 m) di mana jalan setapak tersebut menyatu dengan rute pendakian lainnya dari Narimbang. Tempat ini menawarkan 
              cukup ruang untuk 5 tenda atau lebih. Jarak tempuh dari sini ke puncak kurang dari satu jam dan pendaki yang bugar mungkin dapat mencapainya dalam 
              waktu lebih dari 30 menit – lihat deskripsi rute di atas.
            </P>
            <P>
              Kembali dengan cara yang sama dari puncak ke jalan aspal dan tambang di Cibeureum memakan waktu kurang dari dua jam. Anda mungkin dapat 
              menumpang truk tambang ke jalan utama dan naik angkot kembali ke Sumedang. Sebaiknya sisihkan waktu satu jam tambahan untuk berjaga-jaga jika 
              Anda tidak dapat menemukan tumpangan – tidak ada desa di daerah ini dan hanya sepeda motor sesekali. Jika Anda turun melalui jalur Narimbang, 
              sisihkan waktu sekitar dua jam untuk kembali turun, tetapi sebaiknya atur penjemputan di air terjun Ciputra Wangi terlebih dahulu jika memungkinkan, 
              atau sisihkan waktu tambahan 30 menit untuk berjalan kaki ke jalan utama dan mencari angkutan umum.
            </P>
            <P>
              Kembali ke Sumedang, ada beberapa tempat wisata terkait bukit yang layak dikunjungi jika Anda punya waktu luang. Pertama-tama, Bukit Toga (sekitar 
              700 m di atas permukaan laut), yang merupakan titik pandang yang bagus di atas kota dan ke arah Tampomas. Kedua, Gunung Kunci ('gunung kunci', 
              awalnya dieja Koentji), benteng dan penjara Belanda kuno yang dibangun pada tahun 1914. Gunung Kunci (514 m) berada di sebelah timur Gunung 
              Palasari (643 m) yang merupakan hutan pinus dengan menara telekomunikasi di atau dekat puncaknya.
              Di Sumedang utara terdapat puncak yang menarik bernama Gunung Kecapi (656 m). Puncak ini sedikit menyerupai Arthur s Seat di Edinburgh, 
              Skotlandia, tetapi tidak jelas apakah ada jalan menuju puncak berbatu tersebut.
            </P>
          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-tampomas 1.png"
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
