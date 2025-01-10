<?php ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio Pribadi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box: sizing 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #eaeaea;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        img {
            width: 150px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 3px solid #2980b9;
        }

        h2 {
            color: #2980b9;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 5px;
        }

        blockquote {
            font-style: italic;
            margin: 10px 0 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-left: 5px solid #2980b9;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        ul,
        ol {
            margin: 10px 0 20px 20px;
        }

        audio {
            display: block;
            margin: 20px auto;
        }

        a {
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin: 40px 0;
            font-size: 0.9em;
            color: #777;
        }

        .audio-embed {
            height: 228px;
            width: 600px;
            margin: 20px auto;
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
    <div class="container">
        <!-- Judul Halaman -->
        <h1 class="text-center">Portofolio Pribadi</h1>

        <!-- Gambar Profil -->
        <div class="text-center">
            <img src="https://i.pinimg.com/474x/0c/0a/64/0c0a64774d312b5e3686f37e56ada5fa.jpg" alt="Gambar Profil" />
        </div>

        <!-- Tentang Saya -->
        <h2 class="text-center">Tentang Saya</h2>
        <p class="text-center">
            Selamat datang di portofolio saya! Saya adalah seorang mahasiswa
            Fakultas teknologi Informasi semangat.
        </p>
        <blockquote class="text-center">
            "Orang yang diam bukan berarti tidak tahu apa-apa,tetapi karna tahu
            segalanya lebih baik diam ."
        </blockquote>

        <!-- Pengalaman Organisasi -->
        <h2 class="text-center">Pengalaman Organisasi</h2>
        <table>
            <tr>
                <th>Nama Organisasi</th>
                <th>Jabatan</th>
                <th>Tahun</th>
            </tr>
            <tr>
                <td>Hima Informatika</td>
                <td>Anggota</td>
                <td>2023-2024</td>
            </tr>
        </table>

        <!-- Hobi -->
        <h2>Hobi Saya</h2>
        <ul>
            <li>Memasak</li>
            <li>Membaca</li>
            <li>Mendengarkan Musik</li>
        </ul>
        <ol>
            <li>Menyanyi</li>
            <li>Bercerita</li>
            <li>Memasak</li>
        </ol>

        <!-- Audio -->
        <h2>Lagu Favorit</h2>
        <audio controls>
            <source src="musik.mp3" type="audio/mpeg" />
            Browser Anda tidak mendukung pemutar audio.
        </audio>

        <!-- Video -->
        <h2>Video Karya</h2>
        <iframe width="640" height="360" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0"
            allowfullscreen></iframe>

        <!-- Link ke Media Sosial -->
        <h2 class="text-center">Ikuti Saya</h2>
        <p class="text-center">
            <a href="https://www.instagram.com/ayuniiasr20?igsh=MTBjdjZlOTJmemV3Zw==" target="_blank">Instagram</a>
            |
            <a href="https://www.tiktok.com/@asri.ayuni?_t=8r2C4LnMWzC&_r=1" target="_blank">tiktok</a>
        </p>

        <!-- Footer -->
        <footer>&copy; 2024 Portofolio Pribadi. Semua hak dilindungi.</footer>
    </div>
    <script>
        // Smooth scroll ke bagian tertentu
        function scrollToSection(sectionId) {
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: "smooth"
                });
            }
        }

        // Animasi Progress Bar
        document.addEventListener("DOMContentLoaded", () => {
            const progressBars = document.querySelectorAll(".progress-bar div");
            progressBars.forEach((bar) => {
                const width = bar.style.width;
                bar.style.width = "0"; // Set awal ke 0 untuk animasi

                setTimeout(() => {
                    bar.style.width = width; // Jalankan animasi
                }, 300);
            });
        });

        // Validasi Form Kontak
        const contactForm = document.getElementById("contactForm");
        contactForm.addEventListener("submit", function(e) {
            e.preventDefault(); // Mencegah reload halaman

            const nama = contactForm.nama.value.trim();
            const email = contactForm.email.value.trim();
            const pesan = contactForm.pesan.value.trim();

            if (nama === "" || email === "" || pesan === "") {
                alert("Harap isi semua kolom!");
            } else if (!validateEmail(email)) {
                alert("Email tidak valid!");
            } else {
                alert("Pesan berhasil dikirim! Terima kasih sudah menghubungi saya.");
                contactForm.reset(); // Reset form setelah submit
            }
        });

        // Fungsi Validasi Email
        function validateEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        // Menampilkan pesan selamat datang saat halaman selesai dimuat
        window.addEventListener("load", () => {
            alert("Selamat datang di Portofolio Asriayuni! ");
        });
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