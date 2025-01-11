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
            <h1 class="col-12">Gunung Galunggung</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2.240 m (7.439 kaki)</li>
                <li>Prominensi: 1.262 m</li>
                <li>Ribuan Kategori: Tinggi Sedang</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
                <li>Letusan: 1822, 1894, 1918, 1982-1984</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Gunung_Galunggu.png"
                alt="Gunung Galunggung"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Ribu ini merupakan pegunungan besar dan kompleks yang terdiri dari danau Talaga Bodas dan kawah kering Kawah Saat di utara, kawah Galunggung di 
              selatan, dan puncak tertinggi, Gunung Beuticanar, yang terletak di antaranya, di antara punggungan puncak hutan yang panjang. Letusan dahsyat pada 
              tahun 1822 menyebabkan banyak korban jiwa dan letusan besar terakhir terjadi pada tahun 1982 ketika sebuah pesawat terpaksa melakukan pendaratan 
              darurat setelah mesinnya terisi abu. Namun, saat ini kawah Galunggung tampak relatif tenang tentu saja dibandingkan dengan Papandayan yang ramai di 
              dekatnya.
            </p>

            <div class="mt-5">
              <h1>Kawah Galunggung</h1>
            <p>
              Kawah Galunggung (hanya 1.200 m di atas permukaan laut) dekat dengan kota besar Tasikmalaya dan populer serta memiliki rambu yang jelas. Ada dua 
              pendekatan dari Singaparna dan dari Indihiang (keduanya berada di selatan gunung berapi). Dari Singaparna, ambil jalan yang mengarah ke utara dekat 
              kantor polisi kecil. Setelah melewati gerbang masuk utama, jalan terbagi menjadi dua jalan kiri tampaknya lebih curam dan membawa Anda ke Area Parkir 
              510 tempat untuk memarkir mobil atau sepeda motor Anda sebelum menaiki anak tangga semen 510.
            </p>
            <p>
              Jalan yang sedikit kurang curam yang lurus dari gerbang masuk utama membawa Anda ke area parkir yang berbeda (Area Parkir 620) di bawah apa yang 
              disebut oleh rambu-rambu baru sebagai tangga kuning (1.070 m di atas permukaan laut) 620 anak tangga semen hingga ke tepi kawah. Untuk kedua 
              anak tangga tersebut (keduanya memerlukan pendakian vertikal sekitar 130-150 meter) luangkan waktu 45 menit untuk mencapai area parkir dari 
              Tasikmalaya dengan mobil atau sepeda motor, dan minimal tambahan waktu 15-20 menit untuk menaiki anak tangga ke tepi kawah.
            </p>
            <p>
              Di tepian terdapat beberapa warung (tidak selalu buka) dan banyak monumen. Yang lebih penting, terdapat pemandangan indah ke danau kawah besar di 
              bawah dan dekat dinding tebing vertikal di luarnya. Pemandangan kembali ke Tasikmalaya biasanya sangat bagus saat matahari terbit (05:30 pagi), jadi 
              sebaiknya Anda meninggalkan hotel paling lambat pukul 04:00 pagi! Berhati-hatilah terhadap monyet pemulung di tepian. Ada dua rute menuju danau 
              kawah (di paling kiri jalan setapak tepian dan menuruni set tangga semen ketiga, atau di sebelah kanan menuruni jalan setapak berlumpur) tetapi pada 
              tahun 2017 kedua rute ini secara resmi ditutup karena masalah tanah longsor.
            </p>
            <p>
              Kawah Galunggung tidak terlihat dari sini, tetapi ada beberapa anak tangga putih yang terlihat samar-samar di kejauhan di sisi utara area kawah 
              Galunggung ini ditambah puncak lebih jauh ke selatan (Gunung Galunggung dikenal sebagai Gunung Guntur di peta Bako) tepat di atas dinding kawah 
              Galunggung yang curam. Setelah letusan tahun 1982, pandangan tidak lagi terbatas karena banyak tumbuhan yang hancur, tetapi sejak itu tumbuhan 
              tinggi telah tumbuh kembali dan area tersebut tetap tidak terganggu oleh manusia maupun letusan gunung berapi! Jejak samar terlihat menuruni 
              punggung bukit ke tenggara menuju Tasikmalaya, tetapi ini adalah rute yang jauh lebih banyak ditumbuhi tanaman daripada perjalanan singkat dari 
              Talagabodas.
            </p>
            <p>
              Pejalan kaki yang kuat hanya membutuhkan waktu 3 jam untuk turun ke Talagabodas dan menikmati mandi di kolam air panas, tetapi puncaknya adalah 
              tempat yang bagus untuk berkemah di malam hari dan menikmati matahari terbit melalui pepohonan di pagi hari dan sebagian besar pemandu akan 
              merekomendasikannya. Diharapkan jika cukup banyak orang menggunakan jalan setapak itu, jalan setapak itu akan tetap jelas, bebas dari vegetasi yang 
              berlebihan, dan tetap dapat dilalui tanpa perlu parang. Setelah Anda menemukan jalur yang benar, itu adalah pendakian yang benar-benar menyenangkan 
              dan memuaskan.
            </p>

            <div class="mt-5">
              <h1>Puncak Dindingari (2.057m)</h1>
            <p>
              Tercatat pada bulan Januari 2020 bahwa kini ada jalur pendakian resmi menuju punggungan yang menghadap ke kawah Galunggung. Mereka 
              menyebutnya Puncak Dindingari, dan memang ada Gunung Dindingari (1.688 m) di peta Bakosurtanal di punggungan atas barat daya yang membentuk 
              dinding kawah. Lebih jauh ke utara di sepanjang punggungan/tepi terdapat puncak-puncak yang lebih tinggi termasuk 1.804 m dan 2.114 m sebelum 
              Gunung Guntur (2.188 m) tercapai.
            </p>
            <p>
              Gunung Guntur ini (bukan pegunungan yang lebih terkenal di dekat Garut) terletak sekitar 1,5 kilometer barat daya Beuticanar dan merupakan puncak 
              tertinggi di atas dinding kawah Galunggung, tetapi menghubungkan semua puncak ini kemungkinan akan sangat sulit karena jarang dilakukan sehingga 
              vegetasinya kemungkinan besar lebat. Untuk punggungan Dindingari, sebenarnya ada 3 rute pendakian dan satu terpisah dari 2 lainnya dan masih belum 
              resmi dan jarang digunakan.
            </p>
            <p>
              Dua basecamp utama berada di area Cidugaleun (800m) di barat daya. Keduanya melewati Pasir Geber, Ciberecek sebelum mencapai titik pandang yang 
              fantastis di atas kawah Galunggung. Puncak ini dikenal secara lokal sebagai Dindingari, tetapi pada peta Bakosurtanal tidak diberi label, hanya bagian dari 
              tepian yang luas di selatan puncak 2.114m yang tidak disebutkan namanya. Jalur yang paling populer dari kedua jalur tersebut dimulai di bagian bawah 
              jalan desa, di balik gerbang masuk logam.
            </p>
            <p>
              Rute kedua, Tonyong Panyang, lebih jauh di jalan utama dan bertemu dengan jalur lain tepat sebelum Pasir Geber. Kedua rute ini dapat digabungkan 
              karena titik awal jalur tidak terlalu jauh, tetapi Anda tetap memerlukan ojek untuk mencapai titik awal jika Anda meninggalkan sepeda Anda di sana. Setiap 
              rute membutuhkan waktu sekitar 5 jam dan pendaki lokal mengatakan pemandangan pagi terbaik adalah antara tanggal 5 dan 14 setiap bulan. 
            </p>
            <p>
              Rute Tonyong Panyang dimulai pada ketinggian 819 m, sebelum Pasirpari, dan tentunya sebelum objek wisata Curug Ciparaya (air terjun Ciparay). 
              Basecamp adalah rumah desa di sisi kanan jalan utama desa dengan stiker pendakian di jendela. Jalan setapak menurun melalui perkebunan desa ke 
              Jembatan Cekdam (695 m), jembatan bambu yang dibangun pada tahun 2018 di atas sungai Ciparay. Ada beberapa sungai kecil di sini, beberapa mungkin 
              digunakan untuk irigasi. Ini adalah daerah di mana pencarian rute sulit, jadi sebaiknya bersiaplah untuk meminta bantuan penduduk setempat atau lebih 
              baik lagi bawa pemandu lokal bersama Anda.
            </p>

            <div class="mt-5">
              <h1>Puncak Sagara (2.171m)</h1>
            <p>
              Titik pandang lain yang luar biasa di pegunungan ini adalah Puncak Sagara. Sungguh, tempat ini sangat indah saat matahari terbit sehingga Anda dapat 
              menyebutnya sebagai titik pandang terbaik di seluruh Jawa Barat, sama ikoniknya dengan Gunung Prau di Jawa Tengah di Dataran Tinggi Dieng. Dengan 
              asumsi popularitasnya terus meningkat, Anda disarankan untuk menghindari akhir pekan jika Anda ingin sedikit menyendiri.
            </p>
            <p>
              Jika Dindingari paling mudah diakses dari Tasikmalaya dan memiliki pemandangan Kawah Galunggung yang indah, Puncak Sagara diakses melalui Garut 
              dan memiliki pemandangan Talaga Bodas yang indah.
            </p>
            <p>
              Ada dua basecamp yang sangat berdekatan (satu di Tajur Kidul pada ketinggian sekitar 1.250 mdpl dan satu lagi, yang tampaknya asli, berada di Kampung 
              Sagara pada ketinggian 1.075 mdpl di selatan titik awal Tajur Kidul). Tidak seperti Dindingari, hanya butuh waktu sekitar 3 jam untuk mencapai puncak, dan 
              sejak tahun 2020, rute Kampung Sagara bahkan lebih mudah, karena sepeda motor dapat ditinggal di Pos 1 (1.403 mdpl). Tidak heran tempat ini sangat 
              populer!.
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gununung-galunggu.png"
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
