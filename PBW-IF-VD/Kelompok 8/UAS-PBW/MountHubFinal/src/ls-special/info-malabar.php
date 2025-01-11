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
            <h1 class="col-12">Malabar</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2.343 m (7.687 kaki)</li>
                <li>Ketinggian: 714 m</li>
                <li>Ribuan kategori : Spesial</li>
                <li>Provinsi : Jawa Barat (West Java)</li>
                <li>Google Earth : kml</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/COLLECTIE_TROPENMUSEUM_Landschap_met_gezicht_op_de_Goenoeng_Malabar_TMnr_60011494 1.png" alt="Gunung Malabar" class="img-fluid" />
            </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Daerah pegunungan yang luas ini terletak tepat di sebelah selatan Bandung di lembah Cisangkuy dan dikelilingi oleh perkebunan teh yang luas –
                perkebunan teh terbesar di Jawa Barat. Dulunya terdapat stasiun pemancar Radio Malabar di sini yang terkenal di seluruh dunia pada masa kolonial – yang
                tersisa saat ini hanyalah beberapa dinding batu yang runtuh. Nama gunung ini tampaknya diambil dari pantai Malabar di India dan tradisi serta budaya
                Hindu masih kuat di daerah ini. Puncak tertingginya dikenal sebagai Puncak Besar ('puncak besar') dan sebenarnya sangat mudah dicapai dari 
                Pangalengan (kadang-kadang dieja 'Pengalengan') di sebelah selatan pegunungan.
            </p>
            <p>
                Untuk Puncak Besar, belok kiri di percabangan pertama di jalan sebelum kota itu sendiri. Pangalengan berada di ketinggian lebih dari 1.400 meter di atas
                 permukaan laut dan terdapat jalur perkebunan dan gubuk-gubuk pertanian dan warung-warung sesekali yang mengarah ke lereng bukit menuju Puncak Besar setinggi 1.900 m. Dari desa Cinyiruan (1.590 m) dibutuhkan waktu sekitar tiga jam untuk mencapai puncak tertinggi yang sangat jarang dikunjungi, tidak bertanda, dan ditumbuhi tanaman liar ini dan dua jam untuk turun. Ada banyak ruang untuk memarkir kendaraan di dekat lapangan olahraga. Sebuah tengara penting di dekat awal jalur adalah makam Gerarld Alfred Cup (1.640 m), mungkin seorang Eropa yang memiliki hubungan dengan industri teh lokal. Anda pasti harus meminta bantuan pekerja pertanian untuk menegosiasikan labirin jalur atau, lebih baik lagi, meminta penduduk setempat untuk memandu Anda sampai ke atas. Tanpa pemandu, GPS mutlak diperlukan. Ada beberapa pemandangan indah di lereng bawah, Gunung Tilu di sebelah barat dan di kejauhan Anda mungkin dapat melihat Gunung Gede Pangrango dan Salak dalam kondisi yang sangat jelas. Di lereng yang lebih tinggi, pemandangannya jauh lebih terbatas meskipun ada beberapa tempat di mana Anda dapat melihat sekilas hamparan pegunungan.
            </p>
            <p>
                Untuk Puncak Besar, belok kiri di percabangan pertama di jalan sebelum kota itu sendiri. Pangalengan berada di ketinggian lebih dari 1.400 meter di atas permukaan laut dan terdapat jalur perkebunan dan gubuk-gubuk pertanian dan warung-warung sesekali yang mengarah ke lereng bukit menuju Puncak Besar setinggi 1.900 m. Dari desa Cinyiruan (1.590 m) dibutuhkan waktu sekitar tiga jam untuk mencapai puncak tertinggi yang sangat jarang dikunjungi, tidak bertanda, dan ditumbuhi tanaman liar ini dan dua jam untuk turun. Ada banyak ruang untuk memarkir kendaraan di dekat lapangan olahraga. Sebuah tengara penting di dekat awal jalur adalah makam Gerarld Alfred Cup (1.640 m), mungkin seorang Eropa yang memiliki hubungan dengan industri teh lokal. Anda pasti harus meminta bantuan pekerja pertanian untuk menegosiasikan labirin jalur atau, lebih baik lagi, meminta penduduk setempat untuk memandu Anda sampai ke atas. Tanpa pemandu, GPS mutlak diperlukan. Ada beberapa pemandangan indah di lereng bawah, Gunung Tilu di sebelah barat dan di kejauhan Anda mungkin dapat melihat Gunung Gede Pangrango dan Salak dalam kondisi yang sangat jelas. Di lereng yang lebih tinggi, pemandangannya jauh lebih terbatas meskipun ada beberapa tempat di mana Anda dapat melihat sekilas hamparan pegunungan.
            </p>
            <p>
                Pada akhirnya, mendaki Puncak Besar saja tidak akan cukup untuk menggambarkan betapa liar dan menariknya pegunungan ini. Ada tiga puncak yang dapat didaki secara terpisah – itu jelas merupakan pilihan termudah. ​​Di ujung utara pegunungan ini terdapat dua puncak yang sangat indah dengan pemandangan yang indah dari puncaknya – Puntang (timur laut, 2.222 m) dan Haruman (barat daya, 2.140 m) yang keduanya dapat diakses dari Mekasari dan kawasan wisata Gunung Puntang yang meliputi Curug Siliwangi (air terjun) dan perkemahan Puntang. Pintu masuknya berada pada ketinggian 1.279 m di atas permukaan laut. Selain air terjun, Gunung Puntang sendiri sejauh ini merupakan tujuan pendakian paling populer di sini dan Haruman, sebaliknya, merupakan pendakian yang curam dan berlumpur dengan jalan yang terkadang tidak jelas. Keduanya membutuhkan waktu sekitar 4 jam untuk mencapai puncak.
            </p>
            <p>
                Puncak Gunung Puntang bebas dari pohon-pohon tinggi dan sejauh ini merupakan titik pandang terbaik di seluruh pegunungan. Dalam cuaca cerah, Anda dapat melihat seluruh kota Bandung di dataran Bandung hingga Burangrang , Tangkuban Parahu, dan Bukittunggul di utara kota, dan di luar Gunung Haruman hingga Gunung Tilu dan Gunung Patuha . Anda bahkan mungkin dapat melihat Pangrango di kejauhan. Jalan setapak menuju Gunung Puntang dimulai di area tempat parkir mobil Puntang dan mengarah langsung ke puncak pertama yang lebih kecil, Puncak Mega (1.870m), di mana terdapat reruntuhan yang mirip dengan yang ditemukan di Haruman di sisi lain lembah. Ini tampaknya adalah sisa-sisa menara radio untuk Radio Malabar - reruntuhan utamanya dapat ditemukan dengan berjalan kaki 20 menit ke atas lembah itu sendiri dari tempat parkir mobil. Yang terbaik adalah mengambil pemandu untuk Gunung Puntang karena menemukan jalan setapak di awal bisa sangat membingungkan karena banyaknya jalan setapak kecil. Ada kantor informasi di tempat parkir mobil tempat Anda dapat meminta bantuan. Begitu Anda mencapai setengah jalan ke Gunung Mega, Anda akan melihat dengan jelas saat mengikuti punggung bukit yang mengarah ke Puntang. Luangkan waktu total 7 jam untuk mendaki Puntang dan kembali ke mobil Anda.
            </p>
            <p>
                Lintasan utara-selatan dimungkinkan (dari Mekarsari ke Pangalengan dan sebaliknya) tetapi jarang dilakukan dan navigasi bisa sangat sulit di jalan setapak yang ditumbuhi tanaman liar dan berduri. Ini jelas merupakan salah satu tempat yang mengharuskan Anda mengenakan sarung tangan dan celana panjang untuk menghindari luka. Namun, sisi positifnya, ini adalah salah satu daerah terliar di Jawa Barat dan Anda mungkin akan melihat beberapa satwa liar yang sangat menarik dan langka. Diperlukan waktu seharian penuh, sekitar 8 jam, untuk melakukan lintasan.
            </p>
            <p>
                Jika melakukan perjalanan dari utara ke selatan, lebih baik melalui Haruman karena punggungan barat lebih mudah diikuti daripada jika mendaki dari Puntang yang akan melibatkan perjalanan melalui dataran tinggi hutan yang sangat luas – lihat di Google Earth, tempat yang jelas untuk tersesat. Perangkat GPS sangat penting di medan yang jarang dikunjungi ini. Dari puncak Haruman, cukup jelas bahwa Anda harus mengikuti punggungan ke tenggara menuju Puncak Besar, tetap berada di atau dekat puncak punggungan. Ada beberapa pemandangan indah, terutama dari puncak Haruman, lembah luas di bawah dan Puntang, Mega, dan puncak gunung timur lainnya juga. Ini adalah daerah yang penuh dengan air terjun dan tanah longsor jadi berhati-hatilah!
            </p>
            <p>
                Kesulitan lain dalam melakukan perjalanan dari utara ke selatan adalah menemukan jalur yang benar menuju Puncak Besar. Puncak hutan terlihat sekitar 90 menit setelah Haruman, tetapi menemukan jalur ke puncak (belok kanan) bisa jadi sulit. Ada beberapa jalur yang ditumbuhi tanaman liar menuju selatan menuju Pangalengan, tetapi tidak semuanya menuju Puncak Besar dan, mengingat seberapa lebatnya jalur tersebut, banyak orang akan kesulitan merangkak di bawah dahan yang sangat tajam dan rendah! Tempat ini pasti cocok untuk latihan militer! Jika Anda menuju ke selatan, Anda pasti akan berakhir di jalur pertanian dalam waktu dekat dan kemudian mencapai perkebunan teh di utara Pangalengan, tempat Anda bisa naik ojek ke akomodasi atau bus kembali ke Bandung jika Anda datang cukup pagi!
            </p>
          </div>

          <div class="mt-5">
            <h1>Gunung Tilu (Pangangelan)</h1>
            <p>
                Bahasa Indonesia: Jangan sampai tertukar dengan gunung yang lebih kecil dengan nama yang sama di dekat Kuningan yang memiliki Batu Tulis (batu bertulis) di puncaknya yang disebut Batu Naga ('Batu Naga'), Gunung Tilu adalah puncak yang mengesankan di sebelah barat Pangalengan. 'Tilu' berarti 'tiga' dalam bahasa Sunda jadi tidak mengherankan bahwa Gunung Tilu tampaknya memiliki tiga puncak dari sudut tertentu, meskipun pada sekitar 2.052m (2.056m pada peta Baksurtanal) yang tertinggi dari ketiganya jauh lebih tinggi daripada yang lain. Itu terlihat jelas di sebelah kanan jalan menuju Pangalengan dari Banjaran. Ini adalah rute yang diambil bus dari Bandung ke Pangalengan. Ini juga merupakan pemandangan yang luar biasa dari banyak jalan perkebunan teh di sekitar Pangelangan, terutama di pagi hari dan saat senja (saat cerah).</p>
            <p>
                Jarang didaki dan sekarang menjadi bagian dari kawasan konservasi yang berarti akses jarang diberikan oleh pihak berwenang, Gunung Tilu dapat dijelajahi dari beberapa tempat berbeda tetapi jalur terpendek dan termudah dimulai di perkebunan teh Kebun Pasir Malang di Riunggunung di sebelah selatan puncak itu sendiri dan mengarah melalui perkebunan kopi dan kubis. Dari Riung Gunung (1.500m, tempat parkir di lapangan), dibutuhkan waktu sekitar 2 jam untuk mencapai puncak dan 90 menit untuk turun. Pemandangan terbaik dapat dilihat pada ketinggian 1.640m sebelum memasuki hutan (dengan penanda dengan CA506 di atasnya) turun ke Gunung Wayang (dengan Gunung Kendang sebagian besar tersembunyi di belakangnya) dan Gunung Papandayan di kejauhan, 1.970 ke kiri menuju Gambung dan Ciwidey, dan 2.038m ke kanan di puncak daerah longsor turun ke Situ Cileunca (danau dekat Pangalengan).</p>
            <p>
                Jarang didaki dan sekarang menjadi bagian dari kawasan konservasi yang berarti akses jarang diberikan oleh pihak berwenang, Gunung Tilu dapat dijelajahi dari beberapa tempat berbeda tetapi jalur terpendek dan termudah dimulai di perkebunan teh Kebun Pasir Malang di Riunggunung di sebelah selatan puncak itu sendiri dan mengarah melalui perkebunan kopi dan kubis. Dari Riung Gunung (1.500m, tempat parkir di lapangan), dibutuhkan waktu sekitar 2 jam untuk mencapai puncak dan 90 menit untuk turun. Pemandangan terbaik dapat dilihat pada ketinggian 1.640m sebelum memasuki hutan (dengan penanda dengan CA506 di atasnya) turun ke Gunung Wayang (dengan Gunung Kendang sebagian besar tersembunyi di belakangnya) dan Gunung Papandayan di kejauhan, 1.970 ke kiri menuju Gambung dan Ciwidey, dan 2.038m ke kanan di puncak daerah longsor turun ke Situ Cileunca (danau dekat Pangalengan).
            </p>
            <p>
                Puncaknya tidak menawarkan banyak pemandangan dan merupakan lahan terbuka kecil di tengah hutan. Ada lintah ('pacet') di gunung ini, bahkan dalam kondisi kering. Bahkan jika Anda tidak mendaki Gunung Tilu, jalan yang berkelok-kelok di sekitar bahu gunung dari Pangalengan ke Gambung dan menuju Ciwidey adalah salah satu perjalanan terindah di Jawa Barat. Sebagian besar jalan telah diaspal ulang dan saat ini lalu lintas melalui perkebunan teh dan kopi masih sepi.
            </p>

          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-malabar 1.png"
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
