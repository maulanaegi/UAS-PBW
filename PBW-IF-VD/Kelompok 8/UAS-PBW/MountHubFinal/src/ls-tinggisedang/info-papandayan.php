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
            <h1 class="col-12">Gunung Papandayan</h1>
          </div>

          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h2>Fakta</h2>
              <ul>
                <li>Ketinggian: 2,675 m (8,776 ft)</li>
                <li>Prominensi: 1,329 m</li>
                <li>Ribuan Kategori: Tinggi Sedang</li>
                <li>Provinsi: Jawa Barat (West Java)</li>
                <li>Google Earth: kml</li>
                <li>Nama Lain: Panorama, Vista, Panénjoan</li>
                <li>Letusan: 1772, 1923, 1942, 2002</li>
              </ul>
            </div>
            <div class="col-12 col-md-6 text-center">
              <img
                src="../../assets/img/Gunung_Papandayan.png"
                alt="Gunung Papandayan"
                class="img-fluid rounded"
              />
            </div>
          </div>

          <div class="mt-5">
            <h1>MountHub</h1>
            <p>
              Ribu ini terletak sekitar satu jam perjalanan dari kota Garut dan sebenarnya memiliki tempat parkir mobil di ketinggian lebih dari 2.000 meter di atas 
              permukaan laut di tepi kawah aktif. Ada rute alternatif ke gunung dari Cileuleuy dan Pangalengan tetapi pendekatan dari kawah utama sejauh ini 
              merupakan yang termudah dan paling populer. Pemandangannya merupakan salah satu yang paling spektakuler dan bervariasi di Jawa Barat dan kawah 
              aktif tersebut menarik banyak wisatawan. Dari Garut, ambil jalan yang mengarah melalui Samarang dan Bayongbong ke Cisurupan. Belok kanan di sini, 
              atau naik salah satu dari banyak ojek (taksi sepeda motor, sekitar Rp 30.000 masing-masing), dan ikuti jalan yang kadang-kadang bergelombang sejauh 8 
              kilometer hingga ke tempat parkir mobil yang dikelilingi warung. Biaya masuknya bervariasi, tergantung hari kerja atau akhir pekan, yaitu Rp 
              200.000/300.000 untuk orang asing dan Rp 20.000/30.000 jika Anda orang Indonesia atau memiliki KITAS/KITAP. Biaya parkir dan berkemah tambahan 
              berlaku
            </p>

            <div class="mt-5">
              <h1>Gunung Papandayan</h1>
            <p>
              memiliki beberapa kawah puncak dan sangat aktif, secara vulkanis. Letusan paling dahsyat terjadi pada tahun 1772, tetapi ada letusan yang cukup teratur, 
              yang terakhir terjadi pada tahun 2002. Rupanya gunung itu tingginya lebih dari 3.000 m sebelum letusan abad ke-18 meskipun bagaimana ini diketahui 
              tidak jelas. Menjelajahi kawah aktif dapat dilakukan dengan mudah dalam waktu kurang dari satu jam. Lebih jauh, ada beberapa puncak dengan ketinggian 
              yang tampaknya sama, dua puncak utama dan terluar bernama Papandayan dan Puntang, dengan berbagai puncak kecil di antaranya, salah satunya adalah 
              titik tertinggi yang sangat jarang dikunjungi di pegunungan yang disebut Gunung Malang pada peta Bakosurtanal.
            </p>
            <p>
              Dari tempat parkir mobil di kawah (2.022 meter di atas lereng gunung, yang oleh pendaki lokal disebut sebagai 'Camp David'!) merupakan perjalanan yang 
              menarik melalui pemandangan kawah yang luar biasa (awan belerang, sungai dengan air panas yang mengepul, dan bahkan kolam lumpur panas yang 
              menggelegak di ketinggian 2.190 m). Bagian pendakian ini sangat populer di kalangan wisatawan, beberapa di antaranya tidak berani melangkah lebih 
              jauh. Terkadang ada peringatan yang melarang Anda berjalan melalui kawah (terakhir pada bulan Agustus 2011), tetapi yang mengejutkan adalah beberapa 
              penduduk setempat masih menggunakan jalur tersebut sebagai rute penduduk desa menuju Cileuleuy dan area perkebunan teh yang luas di selatan 
              Pangalengan. Bahkan, Anda mungkin melihat satu atau dua sepeda motor melintas di seberang kawah.</p>
            <p>
              Gunung setinggi 2.623 m yang menjulang tinggi di sebelah selatan/tenggara kawah yang sebenarnya membentuk dinding kawah disebut 'Gunung 
              Papandayan' dan merupakan salah satu puncak tertinggi di jajaran gunung tersebut (banyak yang akan mengatakan bahwa itu adalah yang tertinggi tetapi 
              mereka salah). Perjalanan mendaki yang berat selama 5 jam ke sana melalui berbagai lanskap yang menarik dan bervariasi dan Anda pasti membutuhkan 
              pemandu. Jalur kawah utama menanjak ke arah barat, melewati kolam lumpur yang menggelembung (dan sebelumnya merupakan tanda untuk 'kawah 
              Balagadama'), dan naik ke tepi pemandangan kawah yang masih aktif. Dari sini, ada dua rute yang dapat dipilih. Belok kiri di jalur baru yang sangat 
              menyenangkan (dibangun pada tahun 2017) di antara semak Pohon Suagi yang indah (Vaccinium Valium) dengan buah beri yang dapat dimakan, mengikuti 
              tepi kawah membawa Anda menanjak tajam menuju dataran tinggi kecil pepohonan yang terbakar ('Hutan Mati' 2.335m), menghindari dan tepat melewati 
              area perkemahan yang cukup populer di Pondok Salada (2.321m).</p>
            <p>
              Ini adalah cara tercepat untuk mencapai area tertinggi di jajaran gunung yang dikenal sebagai Tegal Alun (2.512 m) – hanya 2 jam bagi pendaki yang bugar 
              namun dalam beberapa tahun terakhir aksesnya menjadi tidak jelas, ada yang mengatakan tidak diperbolehkan berkemah di sana dan sumber lain 
              menyatakan tidak seorang pun kecuali peneliti yang diperbolehkan mencapai puncak gunung itu.
            </p>
            <p>
              Pilihan lainnya adalah langsung melewati tepi pemandangan kawah aktif di jalan setapak yang akan membawa Anda ke jalur berbatu melalui area vegetasi 
              yang subur dan beberapa area berkemah yang sangat bagus. Tanah longsor besar (yang terjadi pada letusan tahun 2002) menghancurkan satu bagian 
              besar jalur berbatu dan ini berarti Anda harus berbelok ke kanan dan menyeberangi sungai sebelum naik lagi ke jalur berbatu. Saat Anda mencapai pelana, 
              ada area berumput (2.265 m) yang dikenal sebagai 'Ghober Hut'. Dulunya ada beberapa pondok kayu tetapi dihancurkan sekitar awal tahun 2011 meskipun 
              mungkin sekarang sudah diganti.
            </p>
            <p>
              Ini adalah persimpangan yang sangat penting di gunung dan ada tiga pilihan. Lurus di jalur pertanian yang lebar akan membawa Anda sampai ke 
              perkebunan teh yang luas dan indah di dekat Cileuleuy di sisi lain gunung. Ini merupakan rute alternatif yang menarik setelah Anda menyelesaikan 
              pendakian dan jika Anda punya banyak waktu, Anda dapat kembali ke Pangalengan dan Bandung dengan ojek dan minibus. Namun, aksesnya masih belum 
              jelas saat ini karena peraturan cagar alam.
            </p>
            <p>
              Pilihan kedua adalah belok kanan sepanjang jalur yang mengarah ke utara menuju Gunung Puntang, puncak hutan setinggi 2.555 meter. Sayangnya saat ini 
              tidak ada jalur menuju puncak hutan lebat tersebut, tetapi berjalan kaki selama 10 menit ke arah Puntang menawarkan pemandangan Gunung Cikuray yang 
              indah . (Setelah itu, jalur menurun ke hutan yang lebih dalam, mengitari puncak Puntang yang liar itu sendiri. Rupanya sebuah pesawat jatuh di daerah 
              terpencil ini sekitar tahun 1992. Tidak ada sampah di sini karena jalur tersebut jarang digunakan oleh pendaki, tetapi itu juga merupakan daerah yang 
              merupakan bagian dari cagar alam dan oleh karena itu aksesnya mungkin tidak memungkinkan bagi pendaki biasa).
            </p>
            <p>
              Petani dan pemburu setempat terkadang melintasi daerah yang sangat liar ini, yang dihuni oleh sejumlah besar babi hutan, dan turun ke utara menuju 
              daerah luas tanpa pepohonan yang terlihat jelas pada tampilan satelit di Google Earth dan Google Maps yang disebut Tegal Panjang (sekitar 2.069 m – lihat 
              informasi lebih lanjut di bawah) sebelum menuju ke desa-desa setempat. Mungkin pendaki lokal suatu hari nanti akan membuka rute ke puncak Puntang, 
              tetapi untuk saat ini sebagian besar menganggapnya sebagai puncak yang agak misterius.
            </p>
            <p>
              Pilihan ketiga adalah belok kiri menuju Pondok Salada yang populer dan seterusnya ke bagian tertinggi pegunungan. Sebuah jalan setapak di sebelah kiri 
              dua pondok kayu mengarah ke atas lalu ke bawah melalui hutan menuju area berkemah yang menyenangkan yang dikenal sebagai Pondok Salada (2.320 
              m). Dalam perjalanan ke sana, Anda dapat mengagumi pemandangan kembali ke bawah di atas kawah yang masih aktif. Ini adalah tempat yang indah, 
              tetapi perlu diingat bahwa ada banyak hewan liar di area tersebut – babi hutan, anjing liar, dan mungkin bahkan beberapa 'kucing besar' – jadi para 
              pekemah disarankan untuk pergi dalam kelompok besar.
            </p>
            <p>
              Melanjutkan lebih jauh, jika diizinkan untuk melakukannya, di sebelah kiri daerah berawa dan naik melalui daerah berpasir dengan pohon-pohon mati 
              (dekat Hutan Mati, tempat jalan pintas dari kawah aktif bertemu jalan setapak ini), dan curam naik lereng gunung. Kurang dari satu jam di luar Pondok 
              Salada adalah pemandangan yang lebih menakjubkan yang disebut Tegal Alun di mana burung layang-layang menukik dan menyelam. Ini adalah padang 
              rumput yang luas dari daerah kawah yang punah dan memiliki banyak dataran terbuka datar besar (2.512m) yang ideal untuk berkemah (jika prospek 
              binatang buas yang mengintai di semak-semak tidak membuat Anda dan kelompok Anda takut) dan banyak Edelweiss Jawa. Dalam kabut itu adalah tempat 
              yang sangat menakutkan dan ada banyak pohon mati dan kelompok kecil semak. Anda tidak mungkin bertemu pendaki lain di sini dan tempat berkemah 
              resmi kembali di Pondok Salada.

              Titik tertinggi Papandayan (2.675 m) sebenarnya adalah sebuah titik tak bertanda yang dikenal sebagai Gunung Malang dengan vegetasi yang cukup rapat 
              140 meter di atas permukaan barat dataran terbuka yang luas dan mungkin merupakan bagian dari dinding kawah kuno berabad-abad yang lalu. 
              Tampaknya tidak mungkin lebih dari segelintir orang telah mengunjungi puncak sejati ini dalam beberapa dekade terakhir karena ditumbuhi tanaman liar 
              dan sekarang menjadi bagian dari cagar alam.
            </p>
            <p>
              Diperlukan waktu sekitar satu jam dari Tegal Alun untuk mencapai puncak tertinggi (Malang) dan Anda disarankan untuk membawa GPS dan meminta izin 
              resmi dari pihak berwenang terlebih dahulu. Yang terhampar di depan Anda saat pertama kali memasuki Tegal Alun bukanlah puncak yang lebar dan datar 
              dengan banyak batu di atasnya, melainkan salah satu puncak yang lebih jauh ke kanan. Jika Anda berhasil mencapai puncak dan tidak tersesat di antara 
              tumbuhan berduri, Anda dapat kembali ke tempat parkir dari puncak Malang melalui Hutan Mati hanya dalam waktu lebih dari 2 jam.

              Ada juga jalur dari Tegal Alun ke puncak tertinggi kedua yang dikenal sebagai 'Gunung Papandayan' dan secara keliru diasumsikan oleh pemandu lokal 
              sebagai titik tertinggi. Gunung ini adalah gunung yang akan Anda kagumi dari tempat parkir mobil kawah dan terletak di luar Tegal Alun dan di sebelah kiri 
              (timur). Gunung ini juga mungkin terlarang bagi pendaki biasa.

              Pada tahun 2017 ada rambu merah bertuliskan 'Puncak' di Tegal Alun dan dengan tanda panah yang menunjuk ke kiri. 'Puncak' ini merujuk pada Puncak 
              Papandayan, bukan Puncak Malang yang lebih tinggi. Setelah menyusuri sisi kiri Tegal Alun, jalan setapak yang samar menurun sedikit ke daerah rawa kecil. 
              Sangat sulit menemukan jalan setapak tanpa pemandu karena jalan setapak itu berkelok-kelok melewati semak belukar yang tumbuh di antara tunggultunggul pohon yang mati sebelum mendaki punggung gunung yang sebenarnya yang akan Anda lihat sebagai dinding belakang kawah aktif dari belakang 
              tempat parkir mobil.
            </p>
            <p>
              Diperlukan waktu sekitar 90 menit untuk mencapai puncak dari Tegal Alun dan ada beberapa pemandangan menakjubkan kembali ke Tegal Alun, Pondok 
              Salada, kawah aktif di bawahnya, dan banyak gunung lain yang jauh dari bagian punggung bukit yang lebih tinggi. Satu tempat yang akan diketahui oleh 
              pemandu adalah 'Batu Cakup' (2.545 m) yang pada dasarnya merupakan bagian dari jalur pendakian yang terdapat beberapa batu besar. Terkadang Anda 
              dapat melihat pantai selatan Jawa dari sini.

              Puncak Papandayan (2.623 m, tertinggi kedua setelah beberapa bukit di punggung Gunung Malang) ditandai dengan bendera kecil tetapi hanya 
              menawarkan pemandangan terbatas ke kawah aktif di bawahnya. Teruslah mendaki melewati titik tertinggi sejauh 200 meter untuk mendapatkan 
              pemandangan terbaik langsung ke bawah tebing dinding kawah menuju kawah baru (termasuk danau kecil). Anda mungkin akan melihat burung pemangsa 
              di area ini.

              Diperlukan waktu sekitar 3-4 jam untuk turun melalui jalur yang sama kembali melalui pemandangan indah Papandayan, meskipun konon ada jalan pintas 
              kembali ke tempat parkir mobil yang hanya berlanjut melewati titik tertinggi dan mengikuti punggung bukit kembali ke bawah. Rupanya diperlukan waktu 
              sekitar 2 jam untuk turun dari puncak ke tempat parkir mobil jika menggunakan rute ini (jika izin diberikan). Tentu saja, Anda dapat mendaki dengan cara ini 
              untuk memulai tetapi kemudian Anda akan kehilangan semua keindahan Pondok Salada dan Tegal Alun.

              Informasi pengemasan oleh Daniel Quinn (diperbarui Juni 2017).
            </p>
          </div>

          <div class="mt-5">
            <h1>Trail Map</h1>
            <div class="row">
              <div class="col-12">
                <img
                  src="../../assets/img/peta-jalur-pendakian-gunung-papandayan.jpg.png"
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
