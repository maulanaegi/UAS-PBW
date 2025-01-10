<?php ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fadhil Fathoni</title>
    <style>
        /* Reset default margins and paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #eaeaea;
    color: #333;
    line-height: 1.6;
    padding: 20px;
}

/* Container for layout */
.container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Text center class */
.text-center {
    text-align: center;
}

/* Main title */
h1 {
    color: #2c3e50;
    margin-bottom: 20px;
}

/* Profile image styles */
img {
    width: 1000px;
    height: auto;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 3px solid #2980b9;
}

/* Section headings */
h2 {
    color: #2980b9;
    margin-top: 20px;
    margin-bottom: 10px;
    border-bottom: 2px solid #2980b9;
    padding-bottom: 5px;
}

/* Blockquote styles */
blockquote {
    font-style: italic;
    margin: 10px 0 20px;
    padding: 10px;
    background-color: #f4f4f4;
    border-left: 5px solid #2980b9;
    border-radius: 5px;
}

.container {
    text-align: center; /* Menyelaraskan semua konten dalam container ke tengah */
}

button {
    background-color: #6c63ff; /* Warna ungu */
    color: white; /* Warna teks */
    padding: 12px 24px; /* Jarak dalam */
    border: none; /* Hilangkan border */
    border-radius: 8px; /* Membuat sudut membulat */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Ubah kursor saat di-hover */
    transition: background-color 0.3s ease; /* Animasi transisi */
    margin-top: 20px; /* Jarak atas tombol */
    display: inline-block; /* Membuat tombol mengikuti format text-align */
}

button:hover {
    background-color: #5145d6; /* Warna ungu yang lebih gelap saat di-hover */
}

button:active {
    background-color: #4038b4; /* Warna yang lebih gelap saat diklik */
}



/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}
th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ccc;
}
th {
    background-color: #2980b9;
    color: white;
}

/* List styles */
ul, ol {
    margin: 10px 0 20px 20px; /* Indent lists */
}

/* Audio player styles */
audio {
    display: block;
    margin: 20px auto; /* Center audio player */
}

/* Video iframe styles */
iframe {
    display: block;
    margin: 20px auto; /* Center video */
    border: 2px solid #2980b9;
    border-radius: 5px;
}

/* Link styles */
a {
    color: #2980b9;
    text-decoration: none; /* Remove underline */
}
a:hover {
    text-decoration: underline; /* Underline on hover */
}

/* Footer section */
footer {
    text-align: center;
    margin: 40px 0;
    font-size: 0.9em;
    color: #777;
}

/* Embed audio styles */
.audio-embed {
    height: 228px;
    width: 600px;
    margin: 20px auto;
}
/* Gaya untuk pesan sambutan */
.welcome-message {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #4CAF50;
    color: white;
    padding: 20px 40px;
    font-size: 24px; /* Menambah ukuran font */
    font-weight: bold; /* Membuat teks lebih tebal */
    border-radius: 10px;
    display: none; /* Awalnya tersembunyi */
    z-index: 1000;
    text-align: center; /* Menjadikan teks di tengah */
}
footer {
            background-color: #4CAF50;
            text-align: center;
            padding: 1rem 0;
            color: white;
        }
        footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
    </style>
</head>

<body>
    <div class="welcome-message" id="welcomeMessage">Selamat Datang di Portofolio Fadhil Fathoni</div>
    <div class="container">
        <!-- Judul Halaman -->
        <h1 class="text-center">Portofolio Fadhil Fathoni</h1>

        <!-- Gambar Profil -->
        <div class="text-center">
            <img src="https://i.pinimg.com/474x/f3/8b/4c/f38b4c773e6d6b2f4a1c966846078c6e.jpg" alt="Gambar Profil" style="max-width: 200px; height: 200px;">
        </div>
        

        <!-- Tentang Saya -->
        <h2 class="text-center">Tentang Fadhil Fathoni</h2>
        <p class="text-center">Selamat datang di portofolio saya! Saya adalah seorang yang jago kalkulus.</p>
        <blockquote class="text-center">"Aku ingin cepat lulus." - Fadhil Fathoni
        </blockquote>

        <!-- Pengalaman Kerja -->
        <h2 class="text-center">Pengalaman Kerja</h2>
        <table>
            <tr>
                <th>Posisi</th>
                <th>Perusahaan</th>
                <th>Tahun</th>
            </tr>
            <tr>
                <td>CEO</td>
                <td>Brainpleaser</td>
                <td>2022-2023</td>
            </tr>
            <tr>
                <td>CTO</td>
                <td>Cleanify</td>
                <td>2023-2024</td>
            </tr>
        </table>

        <!-- Hobi -->
        <h2>Hobi Saya</h2>
        <ul>
            <li>Membaca</li>
            <li>Menghafal</li>
            <li>Menghitung</li>
        </ul>
        <ol>
            <li>Belajar Bahasa Sunda</li>
            <li>Belajar Bahasa Indonesia</li>
            <li>Belajar Bahasa Inggris</li>
        </ol>

        <!-- Audio -->
        <h2 class="text-center">Lagu Favorit Fadhil Fathoni</h2>
        <audio controls>
            <source src="yali.mp3" type="audio/mpeg">
            Browser Anda tidak mendukung pemutar audio.
        </audio>

        <!-- Embed Audio -->
        <div class="audio-embed">
            <iframe src="#"
                style="display:block; border-radius: 6px; border: none; height: 204px; width: 600px;"></iframe>
            <a href='#'
                style="text-align: center; display: block; color: #A4ABB6; font-size: 12px; font-family: sans-serif; line-height: 16px; margin-top: 8px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">embed-musik</a>
        </div>

        <!-- Video Karya -->
        <!-- Video Karya -->
<h2 class="text-center">Video Karya</h2>
<iframe width="640" height="360" src="https://www.youtube.com/embed/J3Xy7anfJuU" frameborder="0"
    allowfullscreen></iframe>


        <!-- Link ke Media Sosial -->
        <h2 class="text-center">Ikuti Saya</h2>
        <p class="text-center">
            <a href="https://www.instagram.com/fadhil.fathoni/" target="_blank">Instagram</a> |
            <a href="https://id.linkedin.com/in/fadhil-ahmad-fathoni-532a6627a" target="_blank">LinkedIn</a>
        </p>

        <!-- Footer -->
        <footer>
            &copy; 2024 Portofolio Pribadi. Semua hak dilindungi.
        </footer>
    </div>
    <script>
        // Fungsi untuk menghasilkan warna acak
function generateRandomColor() {
    var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
    return randomColor;
}

// Mengubah warna latar belakang halaman secara acak
function changeBackgroundColor() {
    document.body.style.backgroundColor = generateRandomColor();
}

// Menampilkan pesan sambutan dengan animasi
function showWelcomeMessage() {
    var messageElement = document.getElementById('welcomeMessage');
    messageElement.style.display = 'block'; // Tampilkan pesan
    setTimeout(function() {
        messageElement.style.display = 'none'; // Sembunyikan setelah 5 detik
    }, 5000);
}

// Memanggil fungsi saat halaman dimuat
window.onload = function() {
    changeBackgroundColor();
    showWelcomeMessage();
};

    </script>
<footer>
    <?php
    $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
    ?>
    <a href="<?php echo $base_url; ?>/index.php">Aspirasi</a> <br>
    <?php
        $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <a href="<?php echo $base_url; ?>/views/tentangkami.php">Tentang Kami</a> <br>
</footer>
</body>

</html>