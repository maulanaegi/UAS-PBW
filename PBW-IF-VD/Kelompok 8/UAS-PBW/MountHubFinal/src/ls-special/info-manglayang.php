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
            <h1 class="col-12">Manglayang</h1>
          </div>

          <div class="row">
            <!-- Fakta Section -->
            <div class="col-12 col-md-6 mt-5">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 1.835 m (6.020 kaki)</li>
                <li>Ketinggian: 338 m</li>
                <li>Ribuan kategori: Spesial</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
              </ul>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mt-5">
              <img src="../../assets/img/Gunung_Manglayang_sfw2503 1.png" alt="Gunung Manglayang" class="img-fluid" />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
                Gunung Manglayang sangat cocok untuk pendakian di akhir pekan karena Anda dapat mendakinya tanpa harus berkemah semalam. Diperlukan waktu sekitar 2 jam untuk mendaki ke puncak timur yang lebih rendah yang menawarkan pemandangan indah ke dataran Bandung dan hanya kurang dari satu jam lagi ke puncak yang besar dan datar. Jalan setapaknya cukup licin dan curam di awal tetapi hutannya sangat menyenangkan karena Anda akan selalu berjalan di bawah bayang-bayang pepohonan.
            </p>

            <p>
                Bahasa Indonesia: Melihat gunung di Google Earth, jelas bahwa ini dulunya adalah gunung berapi yang kuat dengan dinding kawah yang lebar dan melingkar. Memang, sisa-sisa aliran lava masih dapat dilihat di rute Baru Beureum. Dari ujung jalan tol Bandung di Cileunyi, ikuti rambu jalan menuju Sumedang atau Cirebon dan belok kiri ke atas lereng bukit di Universitas UNPAD di Jatinangor. Ikuti jalan tersebut selama mungkin lima menit. Anda perlu belok kanan tepat sebelum Kawasan Pramuka Jawa Barat Kiarapayung, dan belok kanan kedua sebelum belokan tajam ke kiri di bawah pintu masuk hijau. Dari sini, ada sekitar satu kilometer jalur pertanian yang bergelombang. Awal jalan setapak Baru Beureum dimulai di dekat beberapa bangunan dan sebuah warung yang terletak 1.160 meter di atas permukaan laut dan ada cukup ruang untuk 2 atau 3 mobil untuk parkir. Tepat di belakang warung tersebut terdapat area berkemah berumput besar yang populer di kalangan mahasiswa setempat di akhir pekan.            
            </p>
<p>
    Ikuti jalan setapak di belakang warung, seberangi sungai kecil dan teruslah menapaki jalan setapak yang curam dan licin melalui hutan pinus yang tersebar. Setelah hujan, jalan setapak ini sangat sulit sehingga sebaiknya Anda membawa tongkat jalan dan mungkin beberapa sarung tangan untuk berjaga-jaga. Untungnya, hanya ada sedikit sampah yang terlihat di jalan setapak yang merupakan pertanda baik. Pada ketinggian sekitar 1.395 meter di atas permukaan laut, jalan setapak berubah menjadi batu yang tampaknya merupakan sisa-sisa aliran lava purba dari masa ketika Manglayang merupakan gunung berapi yang meletus dengan dahsyat. Di sekitar titik ini, dengarkan suara monyet di hutan di sebelah kanan jalan setapak.
</p>
<p>
    Bahasa Indonesia: Melihat kembali ke bawah jalan setapak, Anda akan melihat panorama lahan pertanian dan pegunungan yang mengesankan, terutama jajaran Kareumbi ( Gunung Kerenceng ) dan Gunung Geulis kecil di sebelah kanan. Pada ketinggian sekitar 1.548m adalah tempat pertama yang jelas di jalan setapak yang digunakan oleh para berkemah, tetapi jika Anda menghabiskan malam di gunung, yang terbaik adalah terus maju ke puncak timur. Segera Anda akan melihat puncak tertinggi Manglayang di sebelah kanan jalan setapak sebelum mencapai persimpangan di 1.600m tepat di bawah puncak timur. Belok kanan di sini adalah jalan pintas menuju puncak sebenarnya, tetapi jika Anda melewatkan puncak timur, pada dasarnya Anda kehilangan pemandangan terbaik di mana pun yang dapat ditemukan di Manglayang.
</p>
<p>
    Dari persimpangan ini, Anda hanya perlu waktu kurang dari sepuluh menit untuk mencapai puncak timur (1.650 m) di mana Anda mungkin akan bertemu dengan beberapa berkemah lokal yang mengagumi pemandangan indah di ujung timur dataran Bandung dan pegunungan di sekitarnya. Pemandangan kota Bandung juga sangat indah dan Anda mungkin melihat satu atau dua pesawat lepas landas dan mendarat. Di ujung selatan punggungan, jalan setapak mengarah kembali ke Jantinangor melalui jalan setapak yang lebih panjang dan jarang dilalui. Setelah menikmati pemandangan, ikuti punggungan ke arah barat laut menuju puncak hutan Manglayang (1.835 m).</p>
<p>
    Hanya butuh waktu sekitar 30 menit untuk sampai ke puncak yang datar dan besar yang tidak menawarkan pemandangan namun merupakan tempat yang nyaman untuk duduk dan beristirahat. Ada juga makam yang konon sudah tua di puncaknya bersama dengan beberapa tanda puncak di pohon yang dibuat oleh klub pendakian lokal. Anda bahkan mungkin menemukan orang berkemah di sini tetapi mayoritas lebih suka tinggal di dekat pemandangan di puncak timur. Peta Bakosurtanal mencantumkan puncak ini setinggi 1.817 meter, dengan puncak yang lebih tinggi berada 250 meter lebih jauh ke utara (1.824 m). Namun berdasarkan data GPS, ini memang puncaknya yang berada sekitar 1.835 meter.
</p>
<p>
    Dari puncak, jalan setapak mengarah ke kiri ke arah Batukuda ('kuda batu') dan area perkemahan (1.150 m) dan jika Anda lebih suka melakukan perjalanan memutar maka Anda dapat melanjutkan perjalanan ini (perkiraan waktu 3 jam ke peradaban di sisi lain gunung) tetapi sebagian besar akan ingin kembali dengan cara yang sama ke kendaraan mereka di warung yang memakan waktu lebih dari 2 jam. Berhati-hatilah saat menuruni lereng yang curam karena sangat mudah terjatuh, terutama selama musim hujan. Anda dapat mencuci tangan di sungai kecil sebelum menikmati gorengan di warung yang ramah. Kami sarankan Anda membayar sedikit lebih banyak di warung sebagai ucapan terima kasih karena meninggalkan kendaraan di dekatnya.
</p>
<p>
    Rute ketiga dari arah barat dimulai di air terjun Curug Cilengkrang (1.060 m). Rute ini mengarah ke atas melalui punggungan barat yang berbeda dan tidak bertemu dengan dua jalur lainnya hingga mencapai puncak.
<p>
    Informasi pengemasan oleh Gita Saraswati (Maret 2012), diperbarui oleh Dan Quinn (November 2012)
</p>
<p>
    Dinominasikan sebagai Spesial oleh Gita Saraswati.
</p>

          
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-manglayang.jpg"
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
