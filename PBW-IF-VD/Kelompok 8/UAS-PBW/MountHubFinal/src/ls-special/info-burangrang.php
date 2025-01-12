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
            <h1 class="col-12">BURANGRANG</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mt-5 me-5">
              <h1>Fakta</h1>
              <ul>
                <li>Ketinggian: 2.064 m (6.772 kaki)</li>
                <li>Ketinggian: 425 m</li>
                <li>Ribuan kategori : Spesial</li>
                <li>Provinsi : Jawa Barat (West Java)</li>
                <li>Google Earth : kml</li>
                <li>Nama Lain: tidak ada</li>
              </ul>
            </div>
            <div class="col-12 col-md-5">
              <img src="../../assets/img/Gunung_Burangrang_sfw2503 1.png" alt="" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Burangrang adalah puncak paling barat dari puncak-puncak setinggi 2000 meter di utara Bandung. Bersama dengan Tangkuban Parahu dan Bukittunggul, gunung ini merupakan sisa-sisa Gunung Sunda kuno. Burangrang merupakan jalur pendakian yang sangat bagus dan merupakan gunung yang sangat populer mengingat kedekatannya dengan kota Bandung. Di beberapa tempat, gunung ini juga cukup menantang. Ada dua rute utama untuk mencapai punggung bukit – dari timur di col yang dikenal sebagai Pintu Angin dan dari selatan di desa kecil Legok Haji. Pada ketinggian lebih dari 1.500 m di atas permukaan laut, Pintu Angin memisahkan Burangrang dari Tangkuban Parahu di dekatnya. Ada jalur berbatu yang mengarah dari Parompong hingga ke col dan seterusnya ke danau Situ Lembang yang indah. Sayangnya, area ini digunakan untuk latihan militer dan sering ditutup. Bahkan pendaki yang ingin mendaki Burangrang sekarang diminta untuk meminta 'izin' dari Pasukan Khusus Indonesia terlebih dahulu. Oleh karena itu, jauh lebih baik mendaki dari arah selatan di Legok Haji dan turun melalui jalur yang sama atau pura-pura tidak tahu saja di depan bangunan kecil saat turun ke Pintu Angin!
            </p>

            <p>
                Untuk mencapai Legok Haji (1.235 m), sebaiknya Anda naik ojek untuk perjalanan singkat sejauh 3 atau 4 km dari Cisarua. Jalan setapak dimulai di ujung jalur desa dan mengarah ke kanan melewati beberapa makam dan naik di sepanjang punggung bukit berumput yang indah yang menawarkan panorama menakjubkan ke segala arah. Penduduk desa yang ramah akan menunjukkan arah jika Anda tersesat. Setelah kurang dari satu jam, Anda akan memasuki hutan (sekitar 1.450 m) dan menemukan beberapa bagian jalan setapak yang curam dan berlumpur yang memerlukan penggunaan tangan. Ada beberapa daerah datar yang cocok untuk berkemah (Pos 1 – 1.618 m, dan Pos 2 – 1.742 m), tetapi tidak banyak gunanya mengingat jalan setapak ini mengarah langsung ke titik tertinggi punggung bukit Burangrang dan Anda dapat mencapai puncak dalam waktu total 2-3 jam. Tepat sebelum puncak adalah daerah tanah longsor baru-baru ini. Berhati-hatilah di sini dan di punggung bukit itu sendiri karena penurunannya sering kali mencapai beberapa ratus meter!</p>
<p>
    Akhirnya Anda akan mencapai puncak berumput yang dimahkotai dengan salah satu pilar puncak terbesar di Indonesia. Panoramanya luar biasa – Kawah Sunda Purba (kawah Gunung Sunda purba) di sebelah utara, danau Situ Lembang yang terlihat di Timur Laut dan pinggiran kota Bandung di sebelah selatan. Ada cukup ruang untuk satu tenda di sebelah pilar puncak tetapi tempat yang lebih baik hanya tiga menit berjalan kaki ke arah timur di sepanjang punggung bukit tepat sebelum sebuah tugu peringatan kecil, mungkin untuk pendaki lokal. Tempat kedua ini cukup besar untuk 2 atau 3 tenda dan menawarkan pemandangan danau Situ Lembang yang lebih indah.<p>
    Transportasi umum menuju kawah gunung ini mudah dari Bandung – naik angkot ke Lembang dan naik lagi ke kawah – tetapi berhati-hatilah dengan pengemudi angkot yang menawarkan untuk mengantar Anda langsung ke puncak (dengan biaya yang sangat mahal) atau setidaknya pastikan Anda menyepakati harga terlebih dahulu. Taksi seharusnya tidak lebih dari Rp150.000 sekali jalan tetapi jika Anda ingin pengemudi menunggu selama beberapa jam, kemungkinan besar akan menjadi Rp350.000 atau Rp400.000. Sayangnya, pada bulan Maret 2019, tiket masuk ke area tersebut adalah Rp200.000 yang sangat mahal untuk non-Indonesia (Rp300.000 pada akhir pekan dan hari libur nasional) dan ini mungkin membuat Anda merasa ditipu terutama ketika Anda mengetahui bahwa penduduk setempat membayar sepersepuluh dari harga tersebut.
</p>
<p>
    Anda dapat kembali ke Legok Haji dalam dua jam atau jika Anda merasa petualang, Anda dapat menjelajahi bagian timur punggungan Burangrang dan turun ke Pintu Angin. Namun perlu diketahui bahwa mendapatkan ojek dari Pintu Angin hampir tidak mungkin dan Anda harus berjalan selama satu jam lagi ke pos ojek di ujung jalur berbatu di Parompong. Setelah batu peringatan kecil, punggungan menurun tajam dan tiba-tiba dan bahkan ada bagian pendek di mana Anda dapat menggunakan tali tipis untuk membantu Anda. Pemandangan di sini luar biasa - penurunan tajam di sisi utara menawarkan pemandangan puncak-puncak kecil lainnya yang merupakan bagian dari pegunungan yang sama. Di luar bagian tali, jalan setapak menanjak ke puncak timur Burangrang (sekitar 2.033m), meskipun jalur utama sebenarnya mengelilinginya.<p>
    
<p>
    Setelah puncak timur, jalan setapaknya curam dan berlumpur saat Anda menuruni beberapa puncak kecil hingga akhirnya menemukan diri Anda di hutan pinus (1.606 m) di kaki gunung. Dari sini, pergilah ke jalur berbatu di Pintu Angin (1.533 m) dan berjalanlah ke arah Parompong di mana Anda akan dapat menemukan ojek kembali ke Bandung.<p>
    
<p>
    Informasi pengemasan oleh Daniel Quinn (November 2011)</p>
            

          
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-burangrang.jpg"
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
