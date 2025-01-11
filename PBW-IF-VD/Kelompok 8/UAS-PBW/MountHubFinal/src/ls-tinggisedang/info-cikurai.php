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
            <h1 class="col-12">Gunung Cikurai</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2.240 m (7.349 kaki)</li>
                <li>Ketinggian: 2.105 m</li>
                <li>Ribuan kategori: Tinggi Sedang</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Cikurai, Srimaganti, Srimaganten</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Mount_Cikuray_from_Cisurupan 1.png"
                alt="Gunung Cikurai"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Gunung ini merupakan puncak tertinggi di seluruh dataran tinggi Parahyangan/Priangan di Jawa Barat. Puncak ini merupakan kerucut yang indah dan 
              mendominasi pemandangan di dekat Garut. Mengingat ketinggiannya, sebenarnya cukup mudah untuk mencapainya karena di beberapa rute 
              pendakian terdapat ladang pertanian yang menjulang tinggi di lereng gunung. Sekarang ada banyak rute pendakian ke gunung, yang semuanya cukup 
              pendek untuk menjadikannya pendakian harian, meskipun pemandangan terbaik biasanya terlihat saat matahari terbit dan terbenam. Cikuray 
              merupakan gunung yang sangat populer di kalangan pelajar Indonesia, tetapi masih banyak hewan liar di lerengnya yang curam.
            </p>
            <p>
              Puncaknya memiliki tempat berteduh dari semen yang besar dan dalam kondisi cerah, pemandangan ke Ciremai , Guntur , 
              dan Papandayan sangat menakjubkan. Banyaknya pendaki lokal yang berkemah di sini pada akhir pekan berarti bahwa jika Anda menyukai 
              kesunyian, atau bahkan sekadar kedamaian dan ketenangan, maka cobalah untuk pergi pada pertengahan minggu atau selama bulan 
              Ramadhan. Para pekemah harus ingat bahwa ada populasi babi hutan yang besar di dekat puncak yang tidak malu-malu mengacak-acak 
              sisa makanan Anda, jadi tutuplah tenda Anda dengan rapat setiap saat dan, pada malam hari, sebaiknya tinggalkan kantong sampah Anda 
              sejauh mungkin dari tenda Anda dan sebaiknya di atas pohon!
            </p>
          </div>

          <div class="mt-5">
            <h1>3 rute berbeda dari Cikajang dari arah barat daya</h1>
            <p>
              Rute ini juga dikenal sebagai rute Giri Awas. Rute paling selatan dimulai di desa Carik (1.529m). Puncaknya dapat dicapai dalam waktu kurang dari 5 jam 
              (dan kurang dari 3 jam untuk turun). Jalan setapak itu melewati hutan pinus sebelum melewati ladang wortel dan kentang dan akhirnya ladang cabai. Pos 
              1 (1.948m) hanyalah daerah datar kecil yang jaraknya dekat sebelum hutan yang sebenarnya dimulai (2.080m). Setelah Pos 2 (2.381m) tempat jalur Olan 
              bergabung, tengara utama berikutnya adalah Pos Bayangan (2.595m) yang merupakan tempat yang indah dan cerah dengan pepohonan yang keriput 
              (mungkin spesies vaccinium yang sama seperti di Salak 1). Dari sini, Anda hampir dapat melihat kerucut puncak itu sendiri. Ada persimpangan lain di 
              2.744m tempat rute Tapak Geurot bergabung, dan kemudian Anda hanya perlu menempuh perjalanan singkat ke puncak Cikuray</p>
            <p>
              Semua rute berikut dapat digabungkan (misalnya naik dari satu rute dan turun dari jalur lain), tetapi perlu diingat bahwa jika Anda memiliki 
              pemandu, ia mungkin memerlukan uang tambahan untuk kembali ke titik awal lokalnya. Tidak ada titik awal yang berjarak lebih dari 90 
              menit dari Garut dengan mobil, dan beberapa berjarak kurang dari satu jam. Jika kami harus memilih lintasan yang bagus, kami akan 
              merekomendasikan pendakian dari Pemancar dan turun dari salah satu jalur Bayongbong atau Cikajang (di mana transportasi kembali ke 
              Garut mudah ditemukan dari jalan utama), tetapi kami belum mencoba rute Sukamanah</p>
            <p>
              Di sebelah utara Carik terdapat rute dari Olan (1.450 m). Ojek sebenarnya dapat menempuh jarak sejauh 1.680 m di atas desa. Hutan 
              dimulai sekitar 2.000 m. Jalur ini bergabung dengan jalur Carik di Pos 2 (2.385 m) dan memerlukan waktu yang sama untuk naik dan turun.
            </p>

            <div class="mt-5">
              <h1>2 rute berbeda dari Bayongbong dari barat laut</h1>
            <p>
              Pamalayan (1.366 m). Ini adalah rute Bayongbong yang paling mapan. Diperlukan waktu antara 4 dan 6 jam untuk mencapai puncak. Jalan 
              setapak ini melewati ladang kentang, kubis, dan bawang (dan perkebunan kopi dari ketinggian 1.590 m). Sesekali ada tanda panah yang 
              menunjukkan arah yang benar, tetapi biasanya ada pekerja pertanian di dekatnya yang akan meminta bantuan. Pos 2 (1.975 m) adalah 
              bangunan perkebunan dasar, dan para pekerja benar-benar mengendarai sepeda motor sejauh ini sehingga ojek secara teknis mungkin 
              dalam keadaan darurat. Anda seharusnya mencapai Pos 2 dalam waktu kurang dari 2 jam. Ini adalah satu-satunya tempat untuk air, dan 
              itupun air ledeng yang digunakan atas kebijakan penduduk setempat di ladang. Ladang berakhir pada sekitar ketinggian 2.070 m dan hutan 
              yang sebenarnya dimulai pada ketinggian 2.132 m. Dari ketinggian 2.240 m hingga Pos 3 di ketinggian 2.343 m terdapat area terbuka yang 
              luas tempat pepohonan terbakar dalam kebakaran hutan pada tahun 2017. Pos 4 yang kecil menyusul di ketinggian 2.438 m dan Pos 5 di 
              ketinggian 2.550 m. Tak lama setelah Pos 5 terdapat persimpangan (2.581 m) dengan jalur Cintanagara yang setelahnya jalan setapak 
              sedikit mendatar. Hanya beberapa menit sebelum puncak terdapat persimpangan (2.795 m) dengan jalur Cikajang
            </p>

            <div class="mt-5">
              <h1>Sukamanah dari utara</h1>
            <p>
              Ini adalah rute terbaru dari empat rute utama dan juga yang paling dekat dengan Garut. Dengan asumsi bahwa rute ini memiliki banyak hal 
              yang ditawarkan seperti jalur lainnya, kemungkinan besar rute ini akan menjadi sangat populer dalam beberapa tahun ke depan. Rute ini 
              bergabung dengan rute Pemancar di dekat puncak. Ada tanda besar untuk jalur ini di jalan utama Garut-Cikajang sekitar 25 menit di selatan 
              Garut.
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-cikuray 1.png"
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
