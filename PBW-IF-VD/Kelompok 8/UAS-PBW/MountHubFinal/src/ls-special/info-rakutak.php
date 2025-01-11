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
            <h1 class="col-12">Rakutak</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 1,959 m (6,427 ft)</li>
                <li>Ketinggian: 380 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/gunung rakutak.png" alt="Gunung Rakutak" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Rakutak adalah salah satu gunung yang kurang dikenal di daerah Bandung, tetapi menawarkan pemandangan yang sangat indah di seluruh wilayah dan merupakan salah satu jalur pendakian terbaik di Jawa. Jalur ini dapat ditempuh dengan mudah dalam perjalanan sehari dari Bandung, hanya memerlukan waktu sekitar 3 jam untuk mendaki dan 2 jam untuk menuruni. Gunung ini tampak sangat mengesankan saat berada di jalan Pacet di selatan Ciparay yang membentang antara Gunung Rakutak (timur, kiri) dan Gunung Malabar (barat, kanan).
            </p>

            <p>
                Sejak 2016, Rakutak menjadi bagian dari Cagar Alam Kawah Kamojang dan akses bagi pendaki menjadi lebih rumit. Secara teknis, puncak gunung ditutup untuk pendaki dan siapa pun kecuali mereka yang melakukan penelitian ilmiah atau yang serupa.</p>
<p>
    Anda dapat mencoba untuk mendapatkan izin untuk berkunjung, tetapi izin tersebut mungkin tidak diberikan. Namun, Anda tetap dipersilakan untuk menikmati suasana tempat awal pendakian tradisional dimulai di desa Sukarame yang ramah (966 m) tepat di luar kota Pacet dan setidaknya mengambil beberapa foto gunung meskipun Anda tidak bisa mendapatkan izin untuk mendakinya.</p>
<p>
    Jika situasi berubah dan akses yang bertanggung jawab diizinkan, informasi di bawah ini dari perjalanan tahun 2012 dengan sedikit pembaruan mungkin masih relevan:
</p>
<p>
    “Sepeda motor dapat ditinggal di warung (toko desa) terutama jika Anda membeli air dan makanan ringan di sana dan ini adalah awal yang ideal karena jalur pendakian dimulai di seberang toko. Ada tiga rute pendakian terpisah, dua di antaranya dimulai di desa dan satu dimulai sekitar satu kilometer lebih jauh ke selatan. Dua adalah jalur punggung bukit dan yang ketiga adalah yang paling populer dan paling timur mengikuti sungai (satu-satunya sumber air di salah satu rute potensial pendakian dan kering selama musim kemarau) sebelum mendaki punggung bukit.
</p>
<p>
    Pemandu sangat penting karena bagian awal dari jalur paling populer ini menanjak di jalan setapak semen yang licin di desa sebelum melintasi ladang pertanian dan kemudian memasuki naungan bambu (1.015 m). Jalur ini mengikuti dan melintasi sungai yang kering selama bulan-bulan musim panas tetapi pasti akan ada tetesan air selama musim hujan. Sebuah tempat berteduh berada di sebelah kanan sekitar 1.113 m dan tempat terakhir untuk mendapatkan air selama musim hujan berada di 1.111 m saat jalur ini melintasi sungai sekali lagi. Bagian berikutnya menawarkan pemandangan sekilas pegunungan di utara Bandung – Burangrang, Tangkuban Parahu, dan Bukittunggul.
</p>
<p>
    Dari titik ini jalur menjadi sedikit lebih sulit dan kurang jelas saat memasuki rerumputan dan semak yang lebih panjang, beberapa di antaranya mungkin perlu dibersihkan. Mengingat tidak banyak pendaki yang datang ke sini kecuali penggemar lokal dari Bandung, hampir tidak ada sampah yang terlihat di antara pohon pinus yang tersebar. Sekitar 1.420 m terdapat tempat berteduh lain yang setelahnya jalur memasuki hutan yang sebenarnya dan sangat jelas sekali lagi. Tegla Alun (1.726 m) akan segera tercapai dan di sinilah jalur paling timur bertemu dengan jalur tengah yang menanjak di punggung bukit yang berbeda.
</p>
<p>
    Setelah kurang dari satu jam di hutan, Puncak 1 (1.865 m) akan menjadi tempat jalur ketiga (paling barat) bertemu dari barat. Di sini panoramanya luar biasa. Di sebelah utara adalah Bandung dan perbukitan di sebelah utara kota. Di sebelah barat adalah pegunungan liar Malabar yang luas. Di sebelah selatan adalah Gunung Kendang, Papandayan, Cikuray, dan Wayang-Windu. Di sebelah timur adalah punggung bukit sempit yang mengarah sejauh satu kilometer ke dua puncak lainnya, yang terakhir adalah yang tertinggi. Di luar punggung bukit Rakutak itu sendiri adalah pegunungan Guntur yang lebih tinggi.            </p>
<p>
    Di sebelah tenggara Anda akan melihat sebuah danau kecil yang terletak di celah antara punggung bukit Rakutak dan punggung bukit yang lebih kecil di sebelah selatan. Ini adalah Situ Ciharus (sekitar 1.530m) dan bagi mereka yang ingin menghabiskan akhir pekan penuh untuk mendaki, danau ini akan menjadi tambahan yang bagus untuk pendakian harian biasa meskipun sekarang ditutup untuk umum. Perlu dicatat bahwa danau ini mungkin dikenal sebagai Danau Pangkalan di peta tertentu. Di masa lalu, Anda dapat melakukan lintas alam di gunung ini.
</p>
<p>
    Dari Puncak 1, punggungan sempit menurun sedikit sebelum menuju puncak kedua (Puncak 2, pada ketinggian 1.922m) yang merupakan tempat terbaik untuk berkemah karena relatif datar dan besar. Anda mungkin dapat memasang 3 atau 4 tenda di sini. Sekali lagi punggungan berlanjut ke arah timur melalui beberapa hutan yang sedikit lebih lebat dan tempat berkemah yang konon berangin sebelum naik ke titik tertinggi sekitar 1.959m. Ini adalah puncaknya dan dikenal oleh beberapa penggemar hiking sebagai Puncak 3. Pemandu kami menceritakan kisah menarik tentang bagaimana, menjelang akhir era kolonial, kaum republiken setempat mendaki Rakutak untuk melarikan diri dari pasukan Belanda yang kemudian menembakinya dalam upaya untuk membunuh mereka.
</p>
<p>
    Anda mungkin melihat monyet-monyet berkeliaran di lereng bawah gunung dan, seperti banyak puncak di Indonesia, ada banyak bukti nyata babi hutan ('babi hutan') meskipun mereka sangat jarang terlihat. Dari puncak dibutuhkan waktu sekitar 30 menit untuk kembali ke Puncak 1, di mana Anda harus memilih antara menelusuri kembali langkah Anda dari mana Anda datang atau mengambil belokan kiri menuruni punggung bukit yang sedikit lebih ke barat. Yang terakhir direkomendasikan karena sama-sama jelas
</p>
<p>
    Mengantongi informasi oleh Dan Quinn, November 2012.</p>
<p>
    Dinominasikan sebagai Spesial oleh Jang Yudi.
</p>
          
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-rakutak.png"
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
