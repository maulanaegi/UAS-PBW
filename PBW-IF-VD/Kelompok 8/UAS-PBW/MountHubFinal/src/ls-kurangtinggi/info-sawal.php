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
            <h1 class="col-12">Gunung Sawal</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 1.764 m (5.787 kaki)</li>
                <li>Prominensi: 1.041 m</li>
                <li>Ribuan Kategori: Kurang Tinggi</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Karantenan adalah nama puncak tertinggi</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Gunung_sawal 1.png"
                alt="Gunung Sawal"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
             Gunung Sawal merupakan pegunungan besar dengan ketinggian sedang yang setidaknya sama populernya di kalangan peneliti satwa liar dan peziarah 
             seperti halnya di kalangan pendaki biasa. Terdapat populasi macan tutul jawa ('macan tutul') di hutan-hutan di sini, bersama dengan situs-situs kuno yang 
             memiliki signifikansi yang cukup besar secara lokal, sehingga semua peneliti konservasi dan penggemar sejarah akan berharap bahwa kunjungan ke sini 
             tidak akan pernah menjadi seperti pengalaman trekking komersial yang Anda temukan di gunung-gunung lain.
            </p>

            <div class="mt-5">
              <h1>Karantenan – puncak sebenarnya dari pegunungan Sawal</h1>
            <p>
              Gunung Karantenan (1.764 mdpl) di jajaran Pegunungan Sawal dapat dicapai melalui Desa Tembong (938 m) di utara puncak, beberapa kilometer dari 
              Panjalu dan danau Situ Lengkong. Pendaki wajib mendaftar di rumah Abah Ading, penjaga tradisional gunung ini, sebelum memulai pendakian. 
              Disarankan untuk membawa pemandu dari desa agar tidak tersesat dan mendapatkan informasi tentang lokasi menarik di sepanjang jalur.
              Pendakian dimulai dari perkebunan kopi yang berlanjut ke hutan pinus dengan pemandangan indah Gunung Ciremai dan Tampomas. Di beberapa titik, 
              terdapat tanda logam seperti Pintu Gerbang 1 (1.115 m) hingga batas perkebunan kopi di Dadatar Akhir Kebon Kopi (1.245 m). Batu Datar (1.425 m) 
              menjadi tempat istirahat strategis sebelum berlanjut ke Curug Putri Dewi Haryani Ningsih di jalur samping, serta Tunggul Pohon Besar dan Pohon 
              Kembar menuju puncak.
            </p>
            <p>
              Di puncak, terdapat kolam air yang dipercaya sebagai situs suci, dengan legenda airnya berasal dari kendi Mekkah. Area berumput dengan penanda 
              geodesi kecil menandai titik tertinggi. Tempat ini juga menjadi lokasi penelitian satwa liar seperti macan tutul. Gunung Karantenan memiliki arti spiritual 
              dan budaya bagi masyarakat setempat, menarik peziarah untuk berdoa dan mandi di kolam suci ini.
            </p>
            <P>
              Pendekatan terbaik adalah melalui Desa Tembong karena rute lain, seperti dari Tabraya, memiliki jalur yang lebih sulit dan rumit. Gunung ini juga 
              menawarkan pemandangan jajaran puncak kecil lainnya di Pegunungan Sawal, seperti Gunung Bongkok (1.429 m), yang lebih sering dikunjungi oleh 
              pendaki.
            </P>

            <div class="mt-5">
              <h1>Gunung Bongkok (1.429m)</h1>
            <p>
              Jangan sampai tertukar dengan gunung dengan nama yang sama di dekat Gunung Parang dan Waduk Jatiluhur, Gunung Bongkok Sawal adalah puncak 
              yang curam di tepi barat daya pegunungan, yang mudah diakses dari Tasikmalaya. Jalur pendakian dimulai di desa Palasari, Sukahurip (675 m), yang juga 
              merupakan titik awal menuju Curug Salosin (air terjun Salosin).
            </p>
            <p>
              Penduduk desa sangat antusias dengan filosofi bebas plastik dan bebas sampah yang sangat terpuji. Mencari rute agak sulit di awal, jadi sebaiknya ajak 
              seseorang dari desa bersama Anda. Tepat di seberang jembatan di atas sungai kecil, Anda perlu memanjat ke kiri ke punggung bukit kecil sebelum turun 
              ke beberapa ladang lalu ke vegetasi dan awal hutan.
            </p>
            <p>
              Pos 1 (895m) akan segera tercapai dan merupakan tempat yang bagus dan cocok untuk berkemah. Dua pilar semen (1.018m) menandai awal hutan yang 
              sebenarnya dan Pos 2 akan segera menyusul (1.038m). Ini adalah pilihan lain yang cukup masuk akal bagi para berkemah yang memulai pendakian 
              terlalu siang untuk mencapai puncak.
            </p>
            <p>
              Setelah ini ada bagian yang lebih curam yang dikenal sebagai Tanjakan Asoy Geboy (1.082 m). Pos 3 (1.180 m) tidak cocok untuk berkemah karena 
              tanahnya kurang datar, tetapi di sebelah kiri terdapat sumber air utama di jalan setapak. Setelah Pos 3, ada banyak bambu raksasa (1.300 m) di sekitar 
              jalan setapak dan jalan ini bisa sedikit licin di beberapa tempat. Carilah tanaman kantong semar ('kantong semar') yang pasti tumbuh di lereng yang 
              lebih tinggi di gunung ini.
            </p>
            <P>
              Puncaknya adalah daerah berumput terbuka dengan cukup ruang datar untuk beberapa tenda dan pada cuaca baik, pemandangan yang sangat indah 
              dari pegunungan Sawal yang lebih tinggi dan hingga ke kota Tasikmalaya.
            </P>
            <P>
              Kebanyakan pendaki akan sampai di sini dalam waktu sekitar 2 jam dan butuh waktu sedikit lebih sedikit untuk turun.
            </P>

            <div class="mt-5">
              <h1>Gunung Bongkok (1.429m)</h1>
            <p>
              Gunung Cakrabuana (1.732 mdpl), meski kurang dikenal, menawarkan pengalaman pendakian yang menantang dengan berbagai jalur, seperti dari 
              Bunar, Pangkalan, Cakrawati, dan Kebun Teh Cipasung Lemahsugih. Rute Pangkalan kerap menjadi favorit karena lebih landai, dengan jalur dimulai dari 
              desa kecil ramah di dekat Curug Panyusupan. Pendaki disarankan membawa pemandu lokal untuk menghindari tersesat di jalur bercabang dan curam 
              yang kadang bertemu dengan lintah, ciri khas hutan gunung ini.
            </p>
            <P>
              Di tengah perjalanan, Bayangan (1.391 m) menjadi titik penting sebelum menuju punggung bukit, yang memiliki pemandangan indah dari batu besar 
              dan kolam kecil. Pos 4 (1.490 m) dikenal sebagai tempat perkemahan terbaik, yang juga merupakan persimpangan menuju berbagai rute seperti dari 
              Kebun Teh Cipasung atau melanjutkan ke puncak tertinggi di sepanjang punggung bukit. Selain lintah, kantong semar adalah keunikan alam lain yang 
              sering dijumpai di jalur ini.
            </P>
            <P>
              Puncak Sanghyang Wenang (1.726 m) menjadi daya tarik utama, dengan tumpukan batu kecil dan makna spiritual bagi penduduk setempat. Namun, 
              puncak sebenarnya menurut peta Bakosurtanal terletak sekitar satu kilometer lebih jauh ke barat laut, dengan jalur yang semakin menantang dan jarang 
              dilalui. Pendaki perlu berhati-hati karena medannya yang rapuh dan licin, meski beberapa kelompok mahasiswa dilaporkan pernah mengeksplorasi area 
              ini.
            </P>
            <P>
              Untuk rute turun dari Sanghyang Wenang ke Cakrawati, waktu tempuh sekitar 90 menit hingga 2 jam dengan jalur yang stabil. Jalur sebaliknya dari 
              Cakrawati menawarkan pengalaman mendaki yang beragam, melewati sungai, pohon besar, dan pos pendakian seperti Pos 2 dan Pos terakhir (1.625 m) 
              sebelum mencapai Sanghyang Wenang. Pendaki disarankan memperhatikan jalur menuju desa jika mencari transportasi untuk kembali.
            </P>
            <P>
              Gunung Cakrabuana merupakan tujuan menarik bagi pendaki yang mencari tantangan dan keindahan alam. Keberadaan lintah, kantong semar, dan 
              jalur-jalur tersembunyi menambah daya tarik gunung ini, menjadikannya destinasi unik bagi petualangan di Jawa Barat.
            </P>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-sawal 1.png"
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
