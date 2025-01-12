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
            <h1 class="col-12">PATUHA</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mt-5 mb-4">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2.450 m (8.038 kaki)</li>
                <li>Ketinggian: 980 m</li>
                <li>Ribuan kategori : Spesial</li>
                <li>Provinsi : Jawa Barat (West Java)</li>
                <li>Google Earth : kml</li>
                <li>Nama Lain: Sepuh, Malaya (nama kuno)</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 mb-4">
              <img src="../../assets/img/GUNUNG PATUHA 1.png" alt="Gunung Patuha" class="img-fluid" />
            </div>
          </div>
          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung Patuha adalah salah satu gunung di Jawa Barat yang terletak sekitar 40 km di sebelah selatan Kota Bandung, tepatnya di kecamatan Pasir Jambu,
                desa Sugih. Gunung ini termasuk dalam dataran tinggi di antara pegunungan Gede-Pangrango dan Garut. Nama "Patuha" sendiri berasal dari istilah "Pak 
                Tua," yang merujuk pada gunung tertua atau paling dihormati di wilayah tersebut. Selain itu, gunung ini juga dikenal dengan sebutan Gunung Sepuh atau 
                Gunung Malaya, yang memperkuat kesan historis dan mitologisnya, terutama bagi masyarakat Sunda kuno.
            </p>
            
          </div>

          <div class="mt-5">
            <h1>Sejarah dan Legenda</h1>
            <p>
                Gunung Patuha memiliki latar belakang sejarah yang erat kaitannya dengan tradisi Sunda. Kawah Putih, salah satu kawah gunung ini, dahulu dipercaya 
                sebagai tempat sakral dan penuh misteri. Menurut legenda lokal, kawah ini menjadi tempat tinggal makhluk halus, sehingga masyarakat menghindari 
                kawasan ini karena dianggap berbahaya. Namun, di sisi lain, beberapa titik di gunung ini digunakan sebagai tempat persembahan dan ritual adat hingga 
                sekarang.</p>
            <p>
                Selain aspek spiritualnya, Gunung Patuha juga memiliki nilai sejarah penting dari masa kolonial. Kawasan kawah digunakan oleh Belanda untuk 
                menambang belerang, yang kemudian dilanjutkan oleh Jepang saat Perang Dunia II. Sisa-sisa aktivitas pertambangan masih dapat ditemukan di area 
                sekitar Kawah Putih, memberikan pandangan sekilas ke masa lalu kawasan ini.</p>
            

            <div class="mt-5">
              <h1>Keistimewaan Gunung Patuha</h1>
            <p>
                Gunung Patuha memiliki dua kawah utama yang menjadi daya tarik utamanya:
            </p>
            <p> 
                1). Kawah Putih 
                Kawah Putih adalah salah satu destinasi wisata alam paling populer di Jawa Barat. Kawah ini dikenal karena warna danau vulkaniknya yang unik, yang 
                berubah dari hijau kebiruan menjadi putih keabu-abuan tergantung kondisi cuaca dan kadar sulfur. Pada tahun 1987, kawasan ini resmi dibuka untuk 
                wisata umum dan sejak itu menarik banyak pengunjung setiap tahunnya. Selain keindahan kawahnya, area ini juga dilengkapi fasilitas wisata seperti area 
                parkir, jalur pejalan kaki, dan spot foto yang tersebar di sekitar kawah.
                </p>
                <p>
                    2). Kawah Saat Berbeda dengan Kawah Putih, Kawah Saat lebih jarang dikunjungi dan dianggap sebagai kawah "tidur." Kawah ini tidak memiliki aktivitas vulkanik yang 
                    mencolok, tetapi menawarkan suasana yang lebih tenang dan alami. Terletak di puncak tertinggi gunung, Kawah Saat menjadi tujuan pendakian favorit
                    bagi pecinta alam yang mencari tantangan dan ketenangan.</p>

            <div class="mt-5">
              <h1>Rute Pendakian Utama</h1>
            <p>
                Gunung Patuha memiliki dua jalur pendakian utama yang masing-masing menawarkan pengalaman berbeda:
            </p>
            <p>
                1). Via Kawah Putih Jalur resmi ini adalah yang paling sering digunakan, terutama oleh wisatawan yang ingin mencapai puncak tanpa terlalu banyak kesulitan. Pendakian
                dimulai dari area parkir Kawah Putih di ketinggian sekitar 2.200 mdpl, dengan waktu tempuh sekitar 2-3 jam hingga puncak. Jalur ini relatif aman dan
                dilengkapi dengan papan penunjuk arah, membuatnya cocok untuk pendaki pemula.
            </p>
            <p>
                2.) Via Desa Cipanganten Bagi yang mencari jalur alternatif, rute melalui Desa Cipanganten menawarkan pengalaman yang lebih menantang. Dimulai dari kawasan perkebunan teh, 
                    jalur ini membutuhkan izin dari penduduk setempat karena medannya yang lebih alami dan belum sepenuhnya dikelola untuk wisata. Namun, 
                    pemandangan hutan dan suasana sepi membuatnya layak untuk dicoba oleh pendaki berpengalaman.
            </p>
          </div>

          <div class="mt-5">
            <h1>Daya Tarik Lain</h1>
            <p>
                Selain kawahnya, Gunung Patuha memiliki sejumlah daya tarik lain, seperti area perkemahan yang cocok untuk bermalam, serta titik-titik strategis untuk 
                menikmati pemandangan. Salah satu spot terkenal adalah Puncak Sunan Ibu Sunrise, yang menjadi favorit untuk menyaksikan matahari terbit dengan latar 
                belakang panorama pegunungan.</p>
            <p>
                Bagi mereka yang menyukai flora dan fauna, kawasan ini juga menjadi habitat berbagai jenis tumbuhan khas dataran tinggi dan burung endemik Jawa 
                Barat. Suhu di sekitar gunung cukup dingin, berkisar antara 10-20°C, menjadikannya tempat ideal untuk melarikan diri dari panasnya kota.</p>

         <div class="mt-5">
            <h1>Tips untuk Pengunjung</h1>
            
                <li>Hindari mengunjungi Kawah Putih pada akhir pekan atau hari libur nasional untuk menghindari keramaian.</li>
                <li>Persiapkan pakaian hangat dan jas hujan karena cuaca di pegunungan cenderung berubah-ubah.</li>
                <li>Jika ingin menjelajahi jalur alternatif, gunakan jasa pemandu lokal untuk keamanan.</li>
                <li>Pastikan membawa cukup bekal, terutama jika Anda berencana mendaki hingga ke puncak.</li>

            <p>
                Gunung Patuha adalah destinasi yang menawarkan perpaduan unik antara keindahan alam, nilai sejarah, dan kekayaan budaya lokal. Dengan banyaknya 
                daya tarik yang dimilikinya, gunung ini menjadi pilihan ideal bagi wisatawan, pendaki, maupun mereka yang ingin mendalami spiritualitas tradisional 
                Sunda.</p>    

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-patuha 1.png"
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
