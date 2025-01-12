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
            <h1 class="col-12">GUNTUR</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2,249 m (7,379 ft)</li>
                <li>Ketinggian: 758 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: tidak ada</li>
                <li>Letusan: 1690, 1777, 1780, 1800, 1803, 1807, 1809, 1815-16, 1818, 1825, 1827-29, 1832-36, 1840-41, 1843, 1847</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Gunung_guntur_sfw2503 1.png" alt="Gunung Guntur" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Pegunungan vulkanik yang luas ini menjulang tinggi di atas tujuan wisata akhir pekan yang populer di Cipanas, dekat Garut. Tidak seperti kebanyakan gunung di Jawa, sebagian besar pegunungan Guntur sangat gundul, setidaknya pada pandangan pertama dari Cipanas. Pegunungan itu sendiri sangat kompleks, dengan serangkaian puncak yang berbeda dari Gunung Cipanas di atas Cipanas hingga puncak tertinggi yang ditutupi vegetasi di Gunung Masigit. Ada tiga kawah yang sangat berbeda di seluruh pegunungan - kawah yang dalam dan dipenuhi vegetasi di ujung Cipanas, kawah yang aktif dan berbahaya, dan kawah tua seperti mangkuk dangkal yang keduanya berada di ujung Masigit. Mengingat kompleksitas pegunungan tersebut, ada dua pendekatan utama - dari sisi Cipanas (Cipanas atau Kampung Citiis) atau dari Tanjung Karya dekat daerah panas bumi Kamojang di barat daya pegunungan. Pendekatan terbaik mungkin menggabungkan keduanya, tetapi bagi mereka yang tidak memiliki mobil, akan memakan waktu lama untuk mencapai sisi Karya dengan transportasi umum. Kedua rute tersebut memerlukan hari yang sangat panjang untuk benar-benar menjelajahi semua yang ditawarkan pegunungan tersebut, jadi berkemah sepadan dengan beban ekstra di pundak Anda.
            </p>

            <p>
             Citiis (822m) dekat Cipanas merupakan titik awal yang paling mudah diakses karena daerah tersebut memiliki banyak hotel dan terletak hanya 3 km dari jalan utama dari Jakarta ke Garut. Kata 'guntur' berarti 'guntur' dan memang benar bahwa kondisi cuaca di daerah ini bisa berubah-ubah. Aktivitas vulkanik yang terjadi di dalam gunung telah menyediakan air panas alami bagi Cipanas selama beberapa dekade. Kota kecil ini, yang sebagian besar terdiri dari hotel-hotel sederhana untuk penduduk setempat menginap selama akhir pekan, terletak di kaki gunung dan air hangat yang menyenangkan mengalir begitu saja.</p>
<p>
    Dari Kampung Citiis, tempat terdapat setidaknya satu basecamp, terdapat jalan setapak melalui air terjun lokal Curug Citiis (1.154 m). Medan berumput dan terbuka menjadikannya pendakian yang tidak biasa menurut standar Indonesia tropis dan Anda harus ekstra hati-hati untuk menutupi tubuh dan membawa banyak air.</p>
<p>
    Memang sangat sedikit tempat berteduh, jadi sebaiknya mulai sebelum fajar jika memungkinkan. Diperlukan waktu sekitar 3 jam untuk mencapai kawah pertama (yang kebanyakan orang anggap sebagai tujuan pendakian), tetapi titik tertinggi gunung dan kawah lainnya berjarak hampir 2 jam lebih jauh di sepanjang punggung bukit. Jarang ada air di rute dari Citiis, jadi bawalah air secukupnya.
Tak lama kemudian, Anda akan dapat mengagumi kerucut besar Gunung Cikuray yang tidak aktif di dekatnya , gunung berapi Papandayan yang berasap , dan di kejauhan gunung besar Galunggung (Beuticanar) .</p>
<p>
    Kawah pertama adalah Gunung Cipanas (1.935 m) yang dalam dan mengesankan, yang oleh sebagian besar penduduk setempat dikenal sebagai 'Gunung Guntur'. Selain sedikit asap belerang di sisi utara tepian, area tersebut tampak cukup tenang – dasar kawah dipenuhi dengan tumbuhan yang lebat. 
Di atas kawah, Anda akan melihat apa yang tampak seperti area puncak berumput tempat banyak anak muda setempat berkemah. Untuk mencapainya, ikuti tepi kawah (berlawanan arah jarum jam) dan naik ke puncak (2.059 m). Ada tiga monumen di sini ditambah lubang kecil dengan bebatuan vulkanik panas. Ini adalah sejauh yang ditempuh sebagian besar pendaki dan dianggap sebagai 'puncak' oleh sebagian besar pemandu lokal.
Namun, pada cuaca cerah, titik tertinggi terlihat jelas berada jauh di luar sana. Turunlah ke celah antara puncak kawah dan kemudian naik ke puncak berumput kedua (2.135 m dan dikenal sebagai Puncak 2). Puncak kedua ini lebih jelas aktif daripada area kawah – tanahnya panas dan ada sejumlah besar gas sulfur yang melayang di atas – jadi berhati-hatilah di sini. Di balik puncak ini ada penurunan lain yang lebih curam dan pendakian lain ke tanah yang lebih tinggi.</p>
<p>
    Titik ini (2.170 m) adalah titik awal Gunung Masigit. Bagian pertama berupa bebatuan yang sangat datar – sisa-sisa kubah lava kuno. Ada juga beberapa makam di area tersebut meskipun tidak ada yang tahu pasti berapa usianya. Di balik bebatuan datar tersebut terdapat tepi hutan, tetapi di luar sini sekarang ditetapkan sebagai Cagar Alam yang berarti Anda sekarang memerlukan izin khusus untuk melewatinya.
Ini adalah tempat yang bagus untuk berkemah karena merupakan titik pandang yang bagus untuk melihat matahari terbit. Untuk mencapai titik tertinggi dibutuhkan waktu sekitar 30 menit dari titik di mana jalan setapak memasuki hutan tetapi memerlukan izin khusus seperti untuk melakukan penelitian tentang flora atau fauna. Ada beberapa jalur di titik ini, banyak di antaranya ditandai dengan pita merah, jadi berhati-hatilah jika Anda melanjutkan perjalanan.</p>
<p>
    Jika Anda terus ke kanan, jalan setapak melewati sisa-sisa bangunan semen sebelum menurun ke kanan menuju tebing kawah yang sangat aktif. Ini adalah pemandangan yang tak terduga – setidaknya sebanding dengan versi Kawah Ratu Salak yang lebih kecil – dan sangat layak dikunjungi. Berkemah di sini mungkin bukan ide yang bagus mengingat gas dan kecuraman medannya. Jika cuaca baik, Anda seharusnya dapat melihat titik tertinggi dari jajaran gunung di sisi barat kawah (jangan ikuti jalan setapak melewati kawah yang mengarah ke puncak utara yang jauh dengan tebing curam karena meskipun terlihat mengesankan, ketinggiannya sedikit lebih rendah dan tidak pasti ada jalan setapak untuk mendakinya). Anda tidak dapat mencapai puncak sebenarnya dari sini sehingga Anda harus mendaki kembali ke area kubah lava Masigit lama.
Untuk mencapai puncak sebenarnya dari kubah lava/tepi hutan/kuburan/area perkemahan, ikuti jalan setapak yang menurun sedikit ke kiri menuju area alun-alun berumput kecil. Dari sini, Anda harus mengikuti jalan setapak samar yang mengarah ke kanan ke puncak punggungan puncak (yang memiliki beberapa tonjolan batu kecil di atasnya). Dari puncak punggungan, jalan setapaknya sangat samar tetapi ikuti punggungan tersebut hingga Anda mencapai titik tertinggi.</p>
<p>
    Di sebelah kiri Anda terdapat area kawah berbentuk mangkuk kuno yang tidak aktif, tempat tumbuhnya Edelweiss Jawa. Jika Anda melihat ke kanan punggungan puncak, dan kembali ke kubah lava, Anda akan dihadiahi pemandangan indah ke kawah yang masih aktif dan ke pegunungan lain termasuk Cikuray dan Beuticanar di kejauhan. Vegetasinya tidak terlalu lebat, jadi saat cuaca cerah, tempat ini sangat cocok untuk duduk dan menikmati panorama.
Rute lain yang jarang digunakan menuju pegunungan dimulai di Tanjung Karya, dekat Kamojang, yang jauh lebih sulit dicapai menggunakan transportasi umum. Begitu sampai di desa Kamojang, Anda seharusnya bisa mengatur pemandu (yang diperlukan untuk rute ini) di salah satu warung. Saat Anda berada di sana, berbagai keajaiban geotermal di Kawah Kamojang sangat berharga untuk waktu satu jam Anda. Dari desa Kamojang, sewalah angkot (Rp 50.000) untuk membawa Anda perjalanan 30 menit ke Tanjung Karya (1.063m). Untuk sampai ke Tanjung Karya, belok kiri di bawah lengkungan kuning dan biru di Suka Karya. Dari sini, ikuti jalan setapak perkebunan ke atas lembah. Pegunungan Guntur/Masigit ada di sebelah kiri Anda. Di kejauhan Anda akan dapat melihat sisi gunung yang curam dan gundul. Setelah kurang dari dua jam berjalan santai, Anda akan mencapai dua pondok perkemahan yang dikelilingi oleh kolam dan tempat untuk mandi. Tempat ini adalah Cikahuripan (1.403 m), dan merupakan tempat peristirahatan yang populer bagi kelompok pemuda setempat di akhir pekan. Tempat ini merupakan titik pandang yang bagus untuk melihat Cikuray dan Papandayan serta lembah di antara keduanya.
Dari Cikahuripan, jalan setapak mengarah lurus ke sisi gunung. Awasi elang karena ada banyak elang di daerah ini. Ada juga air terjun di sebelah kiri jalan setapak meskipun tidak dapat dicapai dari jalan setapak. Jalan setapaknya sangat jelas meskipun ada beberapa ratus meter kerikil vulkanik hitam yang bagus untuk turun tetapi melelahkan untuk didaki. Lebih jauh ke atas, jalan setapak memasuki vegetasi yang lebih tinggi, tetapi ada tanda oranye/merah di pohon untuk membantu Anda menavigasi. Akhirnya, Anda akan mencapai area berumput dan terbuka (2.057m) tempat orang sering berkemah dan yang merupakan celah antara Puncak 2 dan kuburan. </p>
<p>
    Ada juga jalan setapak dari Cibeureum (1.602m) yang berada di utara Tanjung Karya, tetapi sekarang jalan setapak ini tidak resmi dan tidak digunakan oleh pendaki.</p>
            </p>
          
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-guntur.jpg"
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
