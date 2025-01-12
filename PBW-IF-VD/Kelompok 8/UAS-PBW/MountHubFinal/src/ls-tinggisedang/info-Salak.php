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
            <h1 class="col-12">Gunung Salak</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2,211 m (7,254 ft)</li>
                <li>Prominensi: 1,679 m</li>
                <li>Ribuan Kategori: Tinggi Sedang</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Tidak ada</li>
                <li>Letusan: 1698-99, 1780, 1902-03, 1919, 1935, 1938</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Gunung_salak.png"
                alt="Gunung Salak"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Salak adalah salah satu gunung berapi yang paling mudah diakses dari Jakarta, tetapi belum meletus sejak tahun 1938. Ada berbagai rute di pegunungan 
              tersebut dan meskipun berhutan dan umumnya kurang memiliki pemandangan (kecuali pada rute Cidahu menuju Salak 1), ada banyak sekali variasi yang 
              dapat ditemukan di lerengnya – kawah, satwa liar, tanaman, dan banyak puncak gunung. Ini adalah jenis gunung yang tidak dapat dijelajahi sepenuhnya 
              dalam satu pendakian – Anda perlu mencoba berbagai rute untuk menemukan karakter gunung secara keseluruhan. Pegunungan ini terkenal sebagai 
              lokasi banyak kecelakaan pesawat, yang paling terkenal adalah Sukhoi Superjet yang secara tragis menabrak Gunung Salak pada tahun 2012.
            </p>

            <div class="mt-5">
              <h1>Cidahu ke Bajuri</h1>
            <p>
              Gerbang masuk dan pusat informasi (895m) berjarak 2 kilometer sebelum ujung jalan di Javana Spa dan di sinilah Anda membeli tiket Taman Nasional. 
              Mintalah peta/brosur dan jika mereka memilikinya, mereka akan memberi Anda satu. Sekitar 30 menit berjalan kaki menyusuri jalan melalui kios Lembah 
              Damar dan tempat berkemah ke titik awal yang sebenarnya. Sekitar satu kilometer sebelum Javana Spa, jalan melintasi sungai dan ada gedung perkantoran 
              kecil tapi tampaknya sekarang tidak digunakan lagi (Pos Kancil) di awal jalan setapak (1.108m) ke Kawah Ratu dan puncak Salak 1. Jalan setapak ini dikenal 
              sebagai rute Cangkuang. Jalan lama yang sekarang tidak digunakan lagi itu dihiasi dengan penanda kayu bernomor yang sangat berguna setiap seratus 
              meter (HM = hektometer), seperti yang ditunjukkan pada peta resmi, tetapi jalan setapak baru di dekatnya hingga Bajuri tidak memilikinya (pada tahun 
              2018). Penanda tersebut hanya terlihat di bagian antara Bajuri dan puncak Salak 1.
            </p>
            <p>
              Kawah Ratu cukup mudah dijangkau sejauh 5 km dari Pos Kancil dan karena tidak banyak tanjakan, pendaki cepat akan dapat sampai di sana dan kembali 
              dalam waktu 3 atau 4 jam. Dengan kecepatan yang wajar, dibutuhkan waktu sekitar 2 jam untuk mencapai kawah. Pendaki yang santai mungkin 
              memerlukan waktu setengah hari. Landmark pertama yang jelas setelah sekitar 60-90 menit dari jalan adalah Bajuri (1.375 m, kurang dikenal sebagai 
              Cukang Batu), yang terdiri dari beberapa tempat berumput yang jelas digunakan untuk berkemah secara teratur. Yang perlu Anda lakukan di sini adalah 
              tetap di kiri dan ikuti jalur berbatu menuju Kawah Ratu atau, jika menuju puncak Salak 1, belok kanan sebentar, seberangi sungai kecil di Bajuri lalu belok 
              tajam ke kiri di tanda logam tua dengan tulisan “Puncak Salak 1 – 5 km” di atasnya.
            </p>

            <div class="mt-5">
              <h1>Puncak Bajuri ke Salak 1</h1>
            <p>
              Selebaran Taman Nasional menyarankan total waktu pendakian 8 jam dari Cidahu ke puncak Salak 1. Kami akan mengatakan antara 6 dan 8 jam, tergantung 
              pada kecepatan Anda, atau antara 4 dan 6 dari Bajuri. Bagian jalan setapak ini adalah rute umum yang paling menantang di pegunungan, tetapi juga yang 
              paling memuaskan karena ada pemandangan Kawah Ratu yang indah dari atas. Anda juga akan memiliki pemandangan indah dari gumpalan fumarol 
              Kiaraberes-Gagak di kejauhan di sebelah barat. Penanda hektometer sebagian besar masih utuh di lereng yang lebih tinggi dan ada tanda-tanda logam 
              yang menyertainya di pohon-pohon di beberapa tempat juga. Penomoran dimulai dari nol di Bajuri dan puncaknya harus sekitar HM50 mengingat jaraknya 
              5 kilometer secara total.
            </p>
            <p>
              Bagian pertama jalur setelah Bajuri cukup datar dan berawa, dengan beberapa bagian lumpur yang dalam untuk dilalui. Begitu jalur mulai menanjak, 
              situasinya membaik. Dari sekitar 1.500 m Anda akan dapat mendengar kawah di bawah dan ada beberapa bagian jalur sempit yang bagus dengan 
              pemandangan ke bawah di sebelah kiri punggungan Kawah Ratu, terutama di sekitar HM16, 27, dan 31. Ini mungkin bagian jalur terbaik di seluruh Gunung 
              Salak.
            </p>
            <p>
              Ada banyak bagian jalan setapak pendek yang diikatkan tali sederhana di sekitar pohon untuk membantu pendakian di bagian yang curam, berlumpur, atau 
              berbatu. Sebagian besar bagian ini mudah, tetapi pendaki yang kurang percaya diri mungkin mengalami kesulitan di beberapa tempat dan mungkin 
              memerlukan bantuan. Dari sekitar 1.920 m, ada tanaman kantong semar yang tumbuh di punggung bukit. Carilah tanaman itu ( Nepenthes gymnamphora , 
              menurut Alastair Robinson).
            </p>
            <p>
              Setelah sekitar 3 atau 4 jam dari Bajuri, Anda seharusnya sudah mencapai Pos Bayangan (2.000 m). Di sinilah banyak pendaki berkemah jika mereka tidak 
              punya cukup waktu untuk mencapai puncak sebelum gelap. Ada cukup tempat untuk 3 atau 4 tenda, tetapi entah bagaimana pendaki lokal tampaknya 
              berhasil menampung setidaknya dua kali lipat jumlah itu.
            </p>

            <div class="mt-5">
              <h1>Pendakian satu hari ke puncak Salak 1 dari Cimelati (konon jalur ini akan diresmikan pada tahun 2020!)</h1>
            <p>
              Titik awal terbaik bagi mereka yang ingin mencapai puncak tertinggi dari tujuh puncak Salak hanya dalam satu hari adalah dari stasiun pertanian dekat 
              Cimelati (800m) tepat di luar Portibi Farms (c700m) – ada rambu jalan di mana Anda belok kanan dekat Cicurug. Cimelati berada di tenggara puncak. 
              Diperlukan waktu antara 4 dan 6 jam untuk mencapai puncak yang, seperti disebutkan di atas, memiliki rambu yang menonjol, batu nisan, dan tempat 
              berteduh. Ini adalah pendakian yang curam tetapi mudah melalui hutan ke Salak 1, dan hutan sedikit menipis saat Anda mendekati puncak. Jalan setapak 
              mengarah melalui Pos 1 (1.091m), Pos 2 (1.289m), Pos 3, Pos 4 (1.596m), Pos 5 (1.941m) dan Pos 6 (2.005m). Tempat terakhir untuk air adalah Pos 3 sekitar 
              1.300m. Anda mungkin beruntung bisa melihat Luak Jawa yang sulit ditemukan di lereng atas. Meskipun puncaknya tertutup hutan, Anda akan dihadiahi 
              pemandangan ke puncak Salak lainnya yang lebih rendah, pegunungan Gede-Pangrango , dan pinggiran kota Bogor di bawahnya.
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-salak.png"
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
