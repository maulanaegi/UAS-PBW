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
            <h1 class="col-12">Wayang Windu</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2.198 m (7.211 kaki)</li>
                <li>Ketinggian: 389 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/COLLECTIE_TROPENMUSEUM_Gezicht_op_de_Gunung_Wayang_en_de_Gunung_Windu_vanaf_kina-_en_theeplantage_Lodaja_TMnr_60016822 1.png" alt="Gunung Wayang Windu" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Wayang-Windu merupakan gunung berapi kembar yang terdiri dari Gunung Wayang (2.198 m) dan Gunung Windu (2.147 m). Keduanya terletak di sebelah timur kota Pangalengan yang dikelilingi oleh salah satu perkebunan teh terbesar di Jawa dan merupakan daerah yang sangat indah. Pangalengan sendiri berada pada ketinggian sekitar 1.500 meter di atas permukaan laut sehingga suhunya menyenangkan di siang hari dan sangat dingin di malam hari.
            </p>
            <p>
                Mata air panas tersebar di wilayah ini – beberapa di antaranya komersial dan beberapa bahkan hampir tidak dikenal oleh penduduk setempat. Daerah ini merupakan proyek panas bumi yang aktif dan Pembangkit Listrik Tenaga Panas Bumi Wayang-Windu menyemburkan awan gas putih bersih ke langit dan membuat daerah ini memiliki suasana yang mirip dengan dataran tinggi Dieng di Jawa Tengah. Sebagian besar penduduk setempat bekerja sebagai pemetik teh di hamparan perkebunan teh Malabar yang luas . 
            </p>
            <p>
                Gunung Wayang merupakan puncak tertinggi dari kedua puncak tersebut dan lebih menarik karena tiga alasan utama. Pertama, meskipun Gunung Windu juga memiliki kawah samping, kawah Wayang adalah yang terbesar (750m versus 350m). Kedua, legenda mengatakan bahwa seorang kaisar dari kerajaan Sunda kuno Pajajaran dimakamkan di puncak tengah Wayang. Terakhir, punggungan utara Gunung Wayang menawarkan beberapa medan pendakian yang paling menantang (dan pemandangan yang paling menakjubkan) di seluruh Jawa Barat. Memang, jika Anda ingin mencapai puncak melalui punggungan utara, itu tentu bukan perjalanan keluarga dan hanya kelompok yang berpengalaman yang harus mencoba pendakian yang sangat sulit dan terbuka di banyak tempat.
            </p>
            <p>
                Titik awal pendakian ke kawah aktif Wayang berada di dekat Pembangkit Listrik Tenaga Panas Bumi Wayang-Windu. Anda akan melihat awan putih yang keluar dari pembangkit listrik tersebut, tetapi hampir pasti Anda harus meminta petunjuk arah dari penduduk setempat karena jalannya sangat berliku-liku. Jalan berkerikil yang melewati perkebunan teh melebar di titik tertentu di dekat dua kolam kecil (1.773 m) dan menawarkan pemandangan indah kembali ke Pangalengan. Ini berada di tenggara pembangkit listrik dan Anda akan melihat sedikit asap mengepul dari kawah Wayang di lereng bukit, tetapi jika ragu, tanyakan saja kepada penduduk setempat tentang titik awal 'kawah'.
            </p>
            <p>
                Jalur pertanian berlumpur tipis mengarah lurus ke atas melalui ladang tomat dan sayuran lainnya menuju kawah samping (1.907 m). Ini adalah perjalanan mudah yang seharusnya memakan waktu tidak lebih dari 20 menit. Begitu sampai di kawah, yang tampaknya memiliki empat kelompok fumarol terpisah, lihat kembali ke bawah ke arah Pangalengan dan seterusnya ke pegunungan Patuha dekat Ciwidey. Ini adalah pemandangan yang luar biasa dan Anda bahkan mungkin cukup beruntung untuk melihat Gede-Pangrango di kejauhan jika Anda memulai pendakian cukup awal dan dalam cuaca yang baik.
Setelah menjelajahi celah besar berbatu dan berasap yang merupakan kawah Wayang, langsung menuju sisi kawah itu sendiri (pada jalan setapak yang samar) yang mengarah curam ke sisi gunung. Dalam waktu sekitar 20 menit atau lebih Anda akan mencapai punggungan berbatu (2.035 m) dan akan dapat mengagumi pemandangan ke arah timur menuju Rakutak dan ke utara ke puncak Gunung Bedil (2.086 m), Bukit Anjing ('bukit anjing') dan seterusnya ke hutan pegunungan Malabar.
            </p>
            <p>
                Di sinilah Anda harus memutuskan apakah akan melanjutkan perjalanan di sepanjang punggung bukit yang menantang dan berbahaya hingga ke puncak atau sekadar puas dengan pemandangan menakjubkan di segala arah. Punggung bukit berbatu mengarah ke selatan hingga ke puncak paling utara dari tiga puncak Gunung Wayang. Medannya sangat sulit dan akan sangat bodoh untuk mencoba ini sendirian atau dengan siapa pun yang tidak berpengalaman dalam pendakian yang cukup sulit. Ini jelas bukan sesuatu yang harus dicoba saat hujan tampaknya akan turun. Mungkin diperlukan waktu satu jam negosiasi yang sulit untuk mencapai puncak utara dan melibatkan banyak bagian yang terbuka, pecahan batu besar, tanah yang tidak stabil, lubang dalam di antara batu-batu besar dan puncak-puncak mini dengan jurang yang sangat dalam di semua sisi. Jika Anda percaya diri dalam lingkungan seperti itu maka Anda akan menyukai tantangan dan menikmati pemandangan yang benar-benar luar biasa yang hanya diketahui oleh sedikit orang. Ajaklah teman-teman yang Anda percaya, karena Anda mungkin perlu mengandalkan mereka untuk benar-benar membantu Anda di beberapa titik di mana hanya ada sedikit pegangan kecuali tanah yang sangat gembur, batu, dan dedaunan. Anda kemungkinan besar akan berakhir sangat berlumpur dan sangat mungkin dengan beberapa luka dan memar.
            </p>
            <p>
                Setelah satu jam memacu adrenalin, Anda diharapkan berhasil mencapai puncak utara (2.170 m) Gunung Wayang dengan selamat. Sebuah pohon tua yang sudah mati berdiri tepat di tepi tebing dan kemungkinan besar akan tumbang di tepi tebing menjelang akhir musim hujan 2012-2013. Teruskan perjalanan ke selatan, ikuti jalan setapak yang samar melalui hutan yang cukup lebat dan jarang dikunjungi saat menurun sebelum mendaki lagi ke puncak tengah tertinggi (2.198 m menurut Bakosurtanal) Gunung Wayang. Pertama-tama Anda akan menemukan sekumpulan batu besar yang tampak seperti telah disusun oleh manusia sejak lama sekali.
Semenit kemudian Anda akan melihat tumpukan batu yang mengelilingi pangkal sekumpulan pohon. Konon, tempat ini merupakan tempat peristirahatan terakhir seorang tokoh penting, mungkin seorang kaisar, dari kerajaan Sunda kuno Pajajaran. Pakuan Pajajaran merupakan ibu kota kerajaan dan mengingat bahwa tempat ini dihancurkan oleh Kesultanan Banten pada tahun 1579, maka jika cerita tersebut benar, maka situs makam yang jarang dikunjungi ini memang sudah sangat tua.
            </p>
            <p>
                Puncak yang agak biasa-biasa saja di sebelah barat daya sedikit lebih rendah pada ketinggian 2.190 m menurut peta Bakosurtanal (meskipun perangkat GPS kami menunjukkan bahwa ini adalah puncak tertinggi di punggung bukit pada tahun 2012, dengan ketinggian lebih dari 2.200 m). Mungkin sulit untuk menemukan jalan setapak di sini, pastikan Anda tetap di sebelah kanan dekat tepi punggung bukit dan sebaiknya Anda membawa sarung tangan untuk menghindari banyak tanaman berduri yang menghalangi jalan. Dari puncak pertama hingga puncak ketiga, di barat daya, akan memakan waktu setidaknya satu jam, dengan asumsi Anda tidak tersesat.
            </p>
            <p>
                Turunan dari puncak selatan Gunung Wayang kembali ke jalur perkebunan teh pendek, tetapi curam, licin, dan berlumpur. Pada bulan Desember 2012 penduduk setempat baru-baru ini naik ke jalan ini dan meninggalkan pita merah yang diikatkan ke cabang-cabang pohon, tetapi meskipun demikian 'jalan setapak' itu hampir tidak dapat digambarkan sebagai 'jalan setapak' yang sebenarnya. Anda akan benar-benar berjuang melawan semak belukar. Sekali lagi, tetaplah di sebelah kanan saat jalan setapak menurun tajam hingga Anda mencapai pipa air putih tipis di dekat tepi ladang pertanian. Pilih jalan Anda melalui ladang pertanian melewati satu atau dua gubuk dan turun ke jalur kerikil (1.790m) hanya 500 meter selatan dari titik awal. Total waktu tempuhnya seharusnya antara 4 dan 5 jam.
            </p>
            <p>
                Pendakian yang spektakuler, jarang diketahui, menantang, dan terkadang berbahaya di Jawa Barat. Agak sulit dipercaya, daerah yang indah ini juga merupakan sumber Sungai Citarum yang merupakan salah satu sungai paling tercemar di dunia!
Jika Anda punya waktu, pastikan untuk mengunjungi salah satu sumber air panas di daerah tersebut – yang ideal untuk membersihkan duri dan lumpur dari anggota tubuh Anda. Ada pemandian air panas lokal kecil yang dikenal sebagai 'cipanas' yang hanya berjarak sepuluh menit berkendara dari titik awal (sekali lagi, Anda perlu bertanya arah) tetapi kebanyakan orang lebih suka mengunjungi Pemandian Air Panas Cibolang di mana Anda dapat bersantai di kolam renang air panas di kaki Gunung Windu (tepat di bawah kawah Windu, di sisi barat daya). Diperlukan waktu sekitar 20 hingga 30 menit berkendara ke Cibolang dari titik awal pendakian Wayang.
            </p>
            
          </div>
    

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-wayang-windu 1.png"
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
