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
            <h1 class="col-12">Ciremai</h1>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 3.078 m (10.098 kaki)</li>
                <li>Ketinggian: 2.792 m</li>
                <li>Ribuan kategori: Sangat Tinggi</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Ciremay, Ceremai, Cereme, Careme.</li>
                <li>Letusan: 1698, 1772, 1775, 1805, 1937-38, 1951</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Gunung_Ciremai_sfw2503 1.png" alt="Gunung Ciremai" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Ribu yang merupakan gunung raksasa yang berdiri sendiri ini
              merupakan puncak tertinggi di provinsi Jawa Barat dan salah satu
              jalur pendakian terpopuler di Indonesia. Titik awal pendakian ini
              berjarak 2 hingga 3 jam dengan mobil atau bus umum ke selatan
              Cirebon, yang juga mudah diakses dari Jakarta dengan kereta api.
              Ada tiga titik awal pendakian dan mudah untuk mendaki melalui satu
              jalur dan menuruni jalur lainnya. Jalur Apuy merupakan jalur
              termudah karena dimulai dari ketinggian yang lebih tinggi.
              Kawahnya dalam dan mengesankan, dan satu putaran penuh di tepinya
              dapat ditempuh dalam waktu sekitar satu setengah jam.
            </p>
          </div>

          <div class="mt-5">
            <h1>Rute Apuy</h1>
            <p>
              Naik bus atau mobil ke Maja, dan dari sana lanjutkan perjalanan dengan mobil atau sepeda motor melalui Argapura ke desa Apuy yang indah. Desa 
              tetangga bernama Cibuluh – yang mungkin lebih dikenal. Jalan menanjak tajam dan sedikit kasar saat Anda sampai ke bagian bawah desa Apuy (1.165 m), 
              dan mungkin perlu menyewa ojek lokal untuk 3 hingga 4 kilometer terakhir karena akses mobil mungkin tidak memungkinkan. Ada porter dan pemandu 
              resmi Taman Nasional yang tersedia di Apuy, jika Anda bertanya.</p>
            <p>
              Jalan setapak dari Apuy dalam kondisi baik dan curam, tetapi lebih pendek dan lebih mudah daripada dari Linggarjati yang dimulai hanya beberapa ratus 
              meter di atas permukaan laut. Pendakian akan memakan waktu 5 hingga 7 jam. Setelah mengikuti jalur semen yang berkelok-kelok di lereng bukit di antara 
              ladang bawang dan kentang, Anda akan mencapai pintu masuk Taman Nasional Ciremai yang merupakan tempat berteduh dan warung semen (Berod – 
              1.462 m) di sebelah kolam kecil.</p>
            <p>
              Ada lima pos dan dibutuhkan waktu sekitar satu jam di antara masing-masing pos: Pos I Arban (1.650m) sebuah tempat berteduh dari batu di luar ladang 
              tanaman dan tepat sebelum memasuki hutan, Pos II Simpang Lima (1.935m), Pos III Tegal Masawa (2.150m), Pos IV Tegal Jamuju (2.320m) dan Pos V 
              (Sanghyang Rangkah, 2.560m). Pada 2.820m rute Apuy bergabung dengan rute Palutungan. Pos VI (2.950m) adalah tempat terbaik untuk berkemah, berada 
              tepat di atas kawah kecil yang telah punah yang disebut Goa Walet (Gua Burung Walet) dan hanya 20 menit dari bibir kawah. Anda mungkin menemukan 
              sedikit air di dalam Gua Burung Walet. Ada satu atau dua tempat untuk berkemah di – atau tepat di bawah – bibir itu sendiri tetapi cukup terbuka. Bibir itu sendiri dicapai pada ketinggian sekitar 3.055m
            </p>
          </div>

          <div class="mt-5">
            <h1>Rute Linggarjati (Cibunar)</h1>
            <p>
              Lebih dekat dan mudah diakses dari Cirebon dengan bus ke Kuningan, tetapi memerlukan lebih dari 2.200 meter tanjakan. Pendakian (atau penurunan) 
              yang panjang dan sulit. Turun dari bus di Linggarjati (663 m) lalu naik ojek atau minibus ke titik awal di Pos Cibunar (802).
              Pendakian ini sangat populer, tetapi bisa sangat berdebu sebelum memasuki hutan dan jalan setapaknya sangat terkikis di banyak tempat. Pendakian ini 
              akan memakan waktu 7 atau 8 jam; tersedia porter dan pemandu di Linggarjati. Mengingat aksesibilitas Linggarjati, merupakan pilihan yang baik untuk 
              menuruni rute ini setelah mendaki dari Apuy, meskipun jaraknya cukup jauh
            </p>
            <p>
              Jalurnya melalui Leuweung Datar (1.115m), Kondang Amis (1.180m), Kuburan Kuda (1.430m), Pangalap (1.630m), Tanjakan Seruni (1.780m), Bapa Tere 
              (2.080m), Batu Lingga (2.327m ), Sangga Buana (2.472m), Pangasinan (2.824m) sebelum mencapai tepian di sebelah timur sisi dekat Puncak Panglongokan 
              (3.038m)
            </p>
            <p>
              Mencapai puncak dan/atau melakukan putaran di tepian
              Dengan asumsi Anda mencapai bibir kawah dari rute Apuy atau Palutungan, terdapat pilar semen di bibir kawah hanya seratus meter ke kiri (utara) dan jika 
              Anda mengikuti bibir kawah searah jarum jam, Anda akan mencapai titik tertinggi Ciremai (dan Jawa Barat) hanya dalam waktu lebih dari 20 menit. 
              Beberapa bagian bibir kawah terlalu rimbun atau terlalu sempit (atau keduanya) bagi pendaki untuk dapat mengikuti puncaknya sehingga Anda harus turun 
              di jalan setapak kecil yang ditumbuhi tanaman liar dari waktu ke waktu.
            </p>
            <p>
              Bagian tertinggi dari tepian ditandai dengan sekelompok batu bata merah dan selanjutnya dengan sisa-sisa beberapa jenis peralatan sensor. Satu putaran 
              penuh dari tepian dapat dilakukan dalam waktu sekitar satu setengah jam, tetapi tidak banyak orang yang melakukan ini dan lebih baik melakukannya 
              dengan cara sebaliknya (mencapai puncak mendekati akhir putaran). Beberapa bagian dari jalur tidak menawarkan banyak panorama tetapi sebagian besar 
              pemandangan ke Slamet , pantai utara Jawa dan banyak bukit di Jawa Barat sangat spektakuler.
              Jika Anda ingin menempuh satu putaran penuh, kami sarankan untuk melakukannya berlawanan arah jarum jam, karena separuh jalur pertama sering 
              digunakan karena Anda harus melewati jalur ini untuk mencapai rute Apuy atau Palutungan menuju rute Linggarjati. Poin-poin penting (dalam urutan 
              berlawanan arah jarum jam) adalah sebagai berikut
            </p>
            <p>
              Puncak Sunan Mataram yang merupakan 'puncak selatan' (3.056 m) dan merupakan daerah yang datar dan terbuka dengan ruang untuk 5 atau 6 tenda di 
              tepinya sendiri dan dengan pemandangan indah ke Waduk Darma (Waduk Darma), sepuluh menit lagi dan Anda akan berada di puncak mini dengan 
              pemandangan kawah yang indah. Setelah ini, jalan setapak menjadi lebih lebat dan melewati bagian tertinggi tepian dan melewati beberapa tempat yang 
              cocok untuk satu atau dua tenda dan dengan pemandangan Gunung Slamet yang indah di kejauhan
            </p>
            <p>
              Sepuluh menit lagi dan Anda akan sampai di Puncak Panglongokan (3.038, menurut rambu) yang dekat dengan area tempat Anda turun di rute Linggarjati 
              dan memiliki pilar semen. Lebih jauh di sepanjang tepi jalan setapak semakin kasar dan Anda harus memanjat beberapa cabang pohon yang mati dan di 
              bawah semak-semak rendah. Pemandangan kawah Ciremai di sini sangat bagus. Setelah sedikit menurun ke titik pandang yang luar biasa di tepi tepi jalan 
              setapak, ada bagian yang sangat sempit yang harus Anda waspadai.
            </p>
            <p>
              Setelah ini, jalan setapak yang ditumbuhi tanaman liar mengarah cukup landai ke bagian tertinggi dari tepian. Bagian ini memiliki dua atau tiga titik dengan 
              ketinggian yang sama, yang pertama adalah tempat peralatan yang rusak berada dan yang terakhir adalah tempat batu bata merah berada. Yang terakhir 
              adalah sudut pandang yang jauh, jauh lebih baik, khususnya puncak-puncak lain di Jawa Barat terutama Cikuray yang berbentuk piramida 
              , Papandayan yang mengepul dan puncak-puncak besar di utara dataran Bandung. Beberapa tanjakan dan turunan kecil lainnya dan Anda akan berada di 
              pilar semen tepat di utara tempat rute Apuy dan Palutungan mencapai tepian
            </p>
            <p>
              Informasi pengantongan disediakan oleh Andy Dean (2009), diperbarui berkat John Hargreaves (September 2011), dan Dan Quinn (April 2013).
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-ciremai.jpg.png"
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
