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
            <h1 class="col-12">Sangga Buana</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 1,300 m (4,265 ft)</li>
                <li>Ketinggian: 829 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Gunung_sanggabuana_sfw2503 1.png" alt="Gunung Sangga Buana" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung Sangga Buana adalah gunung kecil yang terletak 32 km di selatan Karawang, populer di kalangan penduduk desa setempat yang sering berdoa di 
                lerengnya. Bahkan ada papan petunjuk untuk gunung tersebut tepat di bawah Jembatan Badami (satu jam dari Jakarta dengan rute bus dari Kampung 
                Rambutan ke Karawang).
Jalan desa yang bergelombang membentang di sepanjang tepian sungai Badami, melewati desa-desa kecil, pedesaan Jawa Barat yang semakin indah, dan 
akhirnya menanjak ke perbukitan. Salah satu puncak yang paling menarik adalah Rungking kecil yang berbatu (630 m) di sebelah kanan jalan, yang terlihat 
beberapa kilometer sebelum jalan setapak.
Sama seperti pegunungan di dekatnya di sebelah timur waduk Jatiluhur, daerah ini menarik dan sangat jarang diketahui mengingat betapa dekatnya 
dengan Jakarta. Sangga Buana bukanlah satu-satunya objek wisata di daerah ini – ada banyak air terjun dan banyak pelajar lokal Indonesia datang untuk 
mengunjungi air terjun yang lebih mudah diakses di akhir pekan. Curug Cikoealngkak (juga dikenal sebagai Curug Bandung) dan Curug Cigentis sangat 
populer sehingga pagi-pagi sekali atau hari kerja adalah waktu terbaik untuk menghindari keramaian.
            </p>
          
            <p>
                Pada tahun 2010, Sangga Buana memiliki basecamp sendiri (141m) di Kampung Cipeuteuy. Dulunya, tempat ini menjadi tempat untuk mendaftar dan 
                mencari pemandu sebelum memulai pendakian, tetapi pada tahun 2020, loket tiket dan tempat pendaftaran berada di tengah jalur pendakian!
Dari Kampung Cipeuteuy, jalan yang baru diaspal mengarah beberapa kilometer lagi ke kaki pegunungan menuju Desa Mekar Buana (381 m). Di sinilah 
tempat untuk meninggalkan sepeda motor Anda dan memulai pendakian, karena melanjutkan perjalanan akan membawa Anda lebih dekat ke air terjun 
Curug Cigeuntis</p>
            <p>
                Dari Mekar Buana, ikuti petunjuk jalan setapak di sebelah kanan melewati bangunan desa dan menuju jalur pertanian. Anda akan segera melihat sungai di 
                bawah Anda di sebelah kanan. Jalan setapak tersebut mengarah ke jalan setapak yang sering dilalui melalui ladang dan hanya ada sedikit tempat berteduh, 
                jadi pastikan Anda memulainya di pagi hari atau tutupi tubuh Anda dengan cukup dan gunakan tabir surya.
Ada banyak bangunan kayu di bagian awal jalur ini, mulai dari gubuk yang sangat sederhana hingga rumah-rumah kecil yang agak berhias. Banyak di 
antaranya yang menjual minuman dan makanan ringan kepada para pendaki dan peziarah, terutama di akhir pekan. Gubuk pertama dan kedua berada di 
ketinggian 440 m dan 464 m, diikuti oleh beberapa penyeberangan sungai kecil.
Bangunan ketiga dan keempat menyusul pada ketinggian 475m dan 492m sebelum semakin tinggi di ladang Anda mencapai bangunan pintu masuk yang 
tepat (503m) di mana Anda dapat membeli tiket (Rp10.000 per pendaki pada tahun 2020), melihat peta jalur yang dibuat pada tahun 2018, dan mungkin 
ditawari kopi atau makanan ringan!</p>
            <p>
              
                Jalan setapak kemudian melintasi padang terbuka lain dan warung lain (651m) sebelum memasuki hutan (669m). Akhirnya ada tempat teduh! Tak lama 
                kemudian jalan setapak melewati beberapa batu besar dan area berkemah yang jelas di dekat sungai kecil (688m) lengkap dengan warung lain dan 
                beberapa toilet sederhana. Anda juga bisa mandi di sungai. Ini adalah F9 pada peta dan diberi label Pancuran Kejayaan dan Perkemahan. 
                Dari sini Anda dapat memilih dari dua jalur yang bertemu lebih tinggi sebelum mencapai puncak. Jalur yang jarang digunakan dan lebih sempit mengarah 
                langsung ke belakang bangunan area perkemahan dan kurang diminati dibandingkan jalur yang lebih lebar dan landai yang berkelok-kelok di lereng bukit 
                lebih jauh ke barat, tepat di luar aliran sungai dan area pemandian.
                Dengan asumsi Anda mengikuti jalur populer yang lebih ke arah barat, Anda akan melewati bagian yang curam dengan beberapa tempat kecil yang cocok 
                untuk satu tenda (pada ketinggian 836 m dan 1.039 m). Kemudian tibalah bagian yang paling menyenangkan dari perjalanan ini – punggung bukit yang 
                indah untuk dijelajahi di hutan yang indah dan pada suhu yang hampir sempurna
            </p>
            <p>
                Selanjutnya, ada tempat istirahat dengan tempat berteduh dari bambu yang sudah rusak di ketinggian 1.137 m (tetap di kiri sini) dan kemudian tempat 
                berteduh yang diberi label F10 di peta di ketinggian 1.194 m. F10 dikenal sebagai Makom 2 (Eyang Jagaraksa) karena tempat berteduh ini memiliki dua 
                makam. Di sinilah jalur yang kurang populer dari perkemahan bergabung dengan jalur utama, tetapi mungkin tidak mudah untuk melihatnya kecuali jika 
                jalur tersebut baru saja dilalui.
Tak lama kemudian, puncak pertama (1.291 m menurut GPS dan diberi label F11 pada peta) telah tercapai. Seharusnya tidak lebih dari 3 jam untuk 
mencapai titik ini. Puncak pertama (barat) ini sebenarnya merupakan rumah bagi komunitas kecil yang beranggotakan sekitar 15 atau 20 orang dan 
terdapat beberapa warung tempat Anda bisa mendapatkan kopi, air, dan makanan ringan. Ada juga beberapa tumpukan batu dan makam kuno yang 
tersebar di sekitarnya, bersama dengan tiang bendera dan sebuah masjid sederhana.
            </p>
            <p>
                Akan tetapi, titik tertinggi gunung tersebut (hanya sekitar 10 meter saja) sebenarnya adalah puncak timur yang lebih sempit yang memerlukan waktu 15 
                menit lebih jauh untuk dicapai melalui jalan setapak yang memotong lebih banyak perkebunan kopi dan melewati kuburan kuno lain (1.265 m) dan celah 
                (1.246 m) di mana Anda harus tetap di sebelah kanan daripada mengikuti jalan setapak yang lebih lebar karena jalan setapak tersebut semakin menurun.
Puncak timur yang sebenarnya ini dikenal sebagai 'Puncak 1', mungkin karena lebih tinggi dari puncak barat yang terdapat warung-warung di atasnya. 
Sebagian besar pengunjung Gunung Sangga Buana tidak mau repot-repot mengunjungi Puncak 1 sehingga jalan setapak terakhir dari satu puncak ke 
puncak lainnya mungkin sedikit tertutup semak belukar, meskipun jika Anda beruntung dengan kondisi cuaca, Anda mungkin dapat melihat Gunung Gede-
Pangrango di kejauhan dari tengah jalan antara dua puncak.
            </p>
            <p>
                Pada tahun 2010, ada beberapa bangunan yang runtuh di sini, tetapi pada tahun 2020, bangunan ini telah dibersihkan dan menyisakan tempat kecil yang 
                sangat nyaman untuk duduk dan beristirahat selama beberapa menit. Peta Bakosurtanal menunjukkan ketinggian 1.278 m untuk puncak barat dan 1.279 m 
                untuk puncak timur, tetapi keduanya terlalu rendah beberapa meter. Pembacaan GPS menunjukkan ketinggian sekitar 1.300 m untuk Puncak 1. Ada 
                kuburan lain, yang lebih baru, dan tidak kurang dari tiga penanda puncak semen, yang salah satunya menandai batas antara kabupaten Purwakarta dan 
                Bogor. Ada juga satu atau dua tanda klub pendakian di sini.
Setelah minum dan mengobrol di warung-warung di puncak barat, dibutuhkan sekitar 2 jam untuk turun melalui jalur yang sama dari puncak gunung yang 
sangat berkesan.
Informasi pengantongan oleh Daniel Quinn (Juli 2010, diperbarui Juli 2020).
            </p>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-sanggabuana.jpg"
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
