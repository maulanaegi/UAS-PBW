<!DOCTYPE html>
<?php
session_start();  // Pastikan session dimulai

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum login, arahkan ke halaman login
    header('Location: ../../index.php');
    exit();  // Pastikan tidak ada kode lain yang dieksekusi setelah redirect
}

?>

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
            <h1 class="col-12">Gunung Bukit Tunggul</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2,215 m (7,267 ft)</li>
                <li>Prominensi: 1,351 m</li>
                <li>Ribuan Kategori: Tinggi Sedang</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Gunung_Bukit-Tunggul.png"
                alt="Gunung Bukit Tunggul"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              
            </p>

            <div class="mt-5">
              <h1>Kawah Galunggung</h1>
            <p>
              Gunung Bukittunggul adalah puncak tertinggi di daerah pegunungan di utara kota Bandung, lebih tinggi dari Tangkuban Perahu dan Burangrang yang 
              terletak lebih jauh di sebelah barat. Gunung ini merupakan tengara utama jika dilihat dari bukit-bukit lain di daerah Bandung dan dapat dicapai dan didaki 
              dengan mudah sebagai perjalanan sehari dari Bandung atau bahkan Jakarta. Bukittunggul hanya berjarak sekitar 2,2 km dalam garis lurus dari desa 
              terdekat, jadi jika Anda berangkat dari Bandung sebelum fajar, Anda dapat kembali ke Dago tepat pada waktunya untuk makan siang. Meskipun tidak ada 
              pemandangan yang dapat dilihat di puncak hutan, pendakian ini belum sepopuler sebagian besar puncak penting lainnya di sekitar Bandung, jadi jika 
              Anda mencari tempat yang relatif sunyi, ini adalah pilihan yang tepat.
            </p>

            <div class="mt-5">
              <h1>Rute 1: Dari Kampung Pasir Angling.</h1>
            <p>
              Untuk mencapai titik awal pendakian paling populer di Kampung Pasir Angling (tidak ada hubungannya dengan memancing dalam arti bahasa Inggris) 
              dibutuhkan waktu sekitar satu jam dengan mobil atau sepeda motor dalam kondisi lalu lintas yang baik dari pusat kota Bandung. Jika menggunakan 
              transportasi umum dari Bandung, ada berbagai angkot dari stasiun kereta api ke Lembang dan kemudian ke Cibodas, Maribaya dan Suntenjaya. Ada 
              sebuah gapura di persimpangan jalan kecil (di sebelah kiri) di luar Suntenjaya yang ditandai dengan jelas sebagai jalan menuju Pasir Angling. Awalnya 
              curam lalu berbatu dan sempit, tetapi sebagian besar mobil dan sepeda motor seharusnya dapat mencapai warung (1.439m) dengan puncak hutan 
              Bukittunggul terlihat jelas tepat di depan di timur laut. Sepeda motor adalah ide yang lebih baik karena tidak banyak ruang untuk parkir mobil di sini.
            </p>
            <p>
              Dari warung di Pasir Angling, ikuti jalan yang menanjak ke arah hutan. Ada pemandangan indah kembali ke punggung bukit Palasari yang panjang. Di ujung 
              jalan setapak, jalan setapak terus lurus, meskipun tidak ada rambu jalan. Bagian bawah jalan setapak yang lebar dan berlumpur digunakan (dan diaduk) oleh 
              pengendara motor-cross lokal, tetapi untungnya ada rute sempit alternatif untuk pejalan kaki yang juga merupakan jalan pintas ke atas lereng bukit. Jalan 
              setapak menanjak sebelum mendatar di punggung pohon pinus yang indah. Kemudian jalan setapak menanjak cukup jauh setelah memasuki hutan asli 
              yang asli dan Anda perlu menggunakan tangan di bagian-bagian tertentu (terutama selama musim hujan).
            </p>
            <p>
              Saat ini (2017) tidak ada pos/pos di jalur ini dan bahkan selama akhir pekan Anda tidak mungkin bertemu banyak pendaki lain atau melihat banyak sampah. 
              Pendaki sedang seharusnya membutuhkan waktu tidak lebih dari 2 atau 2 setengah jam untuk mencapai puncak. Puncaknya sendiri biasa-biasa saja – 
              beberapa area datar yang cocok untuk berkemah, beberapa tanaman raspberry liar, dan tidak banyak pemandangan! Ada dua tanda kuning terpisah dan 
              pohon di sebelah yang kedua (lebih tinggi) memiliki tangga kayu yang sangat ramping dan sederhana yang mungkin ingin dinaiki orang-orang kecil dan 
              ringan di sebagian jalan untuk mencoba melihat puncak pepohonan. Rupanya ada sisa-sisa fondasi candi Sunda kuno di sini dan, seperti halnya Tangkuban 
              Parahu, gunung itu seharusnya sangat penting dalam legenda Sangkuriang.
            </p>
            <p>
              Kembali ke desa akan memakan waktu kurang dari 2 jam bagi pendaki yang bugar, atau Anda dapat melanjutkan perjalanan melewati titik tertinggi gunung 
              dan menuruni lereng tenggara menuju perkebunan Bukittunggul yang luas, di mana terdapat danau kecil atau kolam besar yang disebut Bukittunggul. Baca 
              terus untuk laporan perjalanan dari sisi perkebunan Bukittunggul.
            </p>

            <div class="mt-5">
              <h1>Rute 2: Perkebunan Bukittunggul.</h1>
            <p>
              Jalan menuju perkebunan Bukittungul berakhir sekitar 2 km setelah Cibodas di sebuah rambu Bukkittungul dari logam merah besar dan sebuah 
              warung kecil. Dari warung dan rambu tersebut, yang cukup untuk memarkir dua kendaraan, sebuah jalur pertanian mengarah lurus ke atas bukit – Anda 
              juga dapat mengambil jalur di sebelah kiri dan bergabung dengan jalur tersebut sejauh seratus meter. Jangan mengambil jalur yang mengarah ke kanan 
              menuju sebuah desa kecil. Jika ragu, tanyakan kepada warung. Jalur pertanian ini cocok untuk kendaraan roda empat dan sepeda motor, jadi jika Anda 
              dapat menemukan ojek, Anda akan dapat menghemat waktu lebih dari satu jam berjalan kaki melalui jalur perkebunan. Kemungkinan besar ada banyak 
              pekerja pertanian yang dapat Anda minta bantuan. Dengan asumsi Anda tidak memiliki ojek untuk melewati perkebunan, akan memakan waktu lebih dari 2 
              jam untuk mencapai titik di mana Anda meninggalkan jalur pertanian dan menapaki jalan setapak yang curam dan ditumbuhi tanaman liar menuju puncak 
              Bukittunggul.
            </p>
            <p>
              Namun, pertama-tama, mari kita bahas deskripsi jalur pertanian itu sendiri. Jalur ini berkelok-kelok melalui perkebunan dari warung yang menanjak 
              perlahan di lereng. Tiang telegraf mengikuti jalur tersebut untuk jarak yang pendek (menghubungkan berbagai desa terpencil di lereng bukit) dan puncak 
              yang lebih kecil di sebelah kanan jalur adalah Gunung Palasari yang lebih rendah (yang menurut beberapa pekerja perkebunan merupakan sudut pandang 
              yang cukup bagus). Setelah sekitar 30 menit, Anda akan berjalan di bawah tiang gerbang Bukittunggul hijau yang tampak indah dan melewati gedung “Pos 
              Satpam”. Jalur tersebut kemudian berkelok-kelok menaiki lereng bukit melalui sebuah kampung besar dengan sebuah masjid. Jika cuacanya bagus, Anda 
              akan dapat melihat puncak Bukittunggul yang berhutan di depan Anda. Terus ikuti jalur tersebut saat melewati warung kecil lain dan masjid lain serta papan 
              nama dengan tulisan “Flamboyan” di atasnya.
            </p>
            <p>
              Jalur tersebut kemudian menurun dan kembali menanjak di lereng bukit dekat tempat berteduh kecil dengan atap terpal biru dan menuju desa Pangli 
              (Panglipurgalih). Tak lama setelah ini, saat Anda hampir mencapai titik tertinggi di jalur pertanian, Anda harus belok kiri dan mendaki lereng bukit yang 
              curam. Anda mungkin harus meminta bantuan untuk menemukan titik yang tepat untuk meninggalkan jalur pertanian dan mencapai puncak karena tidak 
              ada rambu atau jalur yang jelas. Butuh sekitar 90 menit untuk mencapai puncak. Ada jalan setapak yang sempit dan ditumbuhi tanaman liar di sebagian 
              besar rute menuju puncak, tetapi di beberapa titik jalan setapak itu tampak benar-benar hilang!
              
              Diperlukan waktu sekitar 3 jam untuk berjalan kaki kembali dari puncak ke titik awal di warung. Namun, Anda mungkin berkesempatan untuk menumpang 
              truk pertanian atau sepeda motor.
            </p>
            <p>
              Meski Ribu ini mungkin yang paling tidak menarik di Jawa Barat, perjalanan melalui perkebunan dan desa-desa kecil di lereng bukit cukup menyenangkan 
dan jika Anda meminta bantuan dari penduduk setempat maka Anda tidak akan mengalami kesulitan untuk mencapai puncak.

Informasi pengemasan disediakan oleh Daniel Quinn (rute Pasir Angling diperbarui November 2017).
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-bukit-tunngul.jpg.png"
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
