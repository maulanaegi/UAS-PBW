<?php ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title><?php echo "Tentang Kami"; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
        h1 {
            color: #000000;
            text-align: center;
        }
        p {
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        .team {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }
        .team-member {
            text-align: center;
            padding: 1rem;
            background: #f0f0f0;
            border-radius: 8px;
            width: calc(33.33% - 1rem);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .team-member img {
    width: 100%; /* Lebar gambar mengikuti ukuran container */
    height: auto; /* Tinggi disesuaikan dengan lebar gambar */
    object-fit: contain; /* Memastikan gambar tidak terpotong, tetapi tetap mempertahankan rasio */
    margin-bottom: 0.5rem;
    transition: transform 0.3s ease;
}
        .team-member img:hover {
            transform: scale(1.1);
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

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .team-member {
                width: calc(50% - 1rem); /* Dua kolom pada layar lebih kecil */
            }
        }

        /* Responsif untuk layar sangat kecil (misalnya ponsel) */
        @media (max-width: 480px) {
            .team-member {
                width: 100%; /* Satu kolom pada layar ponsel */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1> Tentang Kami</h1>
    </header>
    <main>
        <section>
            <h2>Visi Kami</h2>
            <p>Website Aspirasi Fakultas Rahasia bertujuan menjadi platform utama yang menjembatani komunikasi antara mahasiswa dan pihak fakultas. Kami ingin menciptakan lingkungan kampus yang lebih terbuka, transparan, dan inklusif, di mana setiap aspirasi didengar dan dihargai.</p>
        </section>

        <section>
            <h2>Misi Kami</h2>
            <ul>
                <li>Menjadi Wadah Aspirasi Mahasiswa: Memfasilitasi mahasiswa untuk menyampaikan ide, keluhan, atau saran dengan mudah.</li>
                <li>Meningkatkan Transparansi: Menghadirkan sistem yang memungkinkan mahasiswa dan fakultas saling berinteraksi dengan jelas dan akuntabel.</li>
                <li>Mendukung Partisipasi Aktif: Mendorong mahasiswa untuk aktif berpartisipasi dalam pengembangan kampus melalui fitur yang interaktif dan ramah pengguna.</li>
                <li>Mengelola Aspirasi Secara Efisien: Menyediakan sistem berbasis teknologi untuk pengolahan data aspirasi yang terstruktur dan dapat ditindaklanjuti.</li>
            </ul>
        </section>

        <section>
            <h2>Tim Kami</h2>
            <div class="team">
                <div class="team-member">
                    <img src="https://i.pinimg.com/474x/f3/8b/4c/f38b4c773e6d6b2f4a1c966846078c6e.jpg" alt="Fadhil Ahmad Fathoni">
                    <h3>Fadhil Ahmad Fathoni</h3>
                    <p>Ketua</p>
                    <?php
        $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <a href="<?php echo $base_url; ?>/views/fadhil.php">selengkapnya</a> <br>
                </div>
                <div class="team-member">
                    <img src="https://i.pinimg.com/474x/c0/b7/53/c0b753c9d904bdb41f7833324a552469.jpg" alt="Aura Rahayu Aksa Radiana">
                    <h3>Aura Rahayu Aksa Radiana</h3>
                    <p>Anggota</p>
                    <?php
        $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <a href="<?php echo $base_url; ?>/views/aura.php">selengkapnya</a> <br>
                </div>
                <div class="team-member">
                    <img src="https://i.pinimg.com/474x/0c/0a/64/0c0a64774d312b5e3686f37e56ada5fa.jpg" alt="Asri Ayuni">
                    <h3>Asri Ayuni</h3>
                    <p>Anggota</p>
                    <?php
        $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <a href="<?php echo $base_url; ?>/views/asri.php">selengkapnya</a> <br>

                </div>
            </div>
        </section>
    </main>
    <footer>
    <?php
        $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <?php
        $base_url = "/UAS"; // Ganti sesuai dengan folder proyek Anda
        ?>
        <a href="<?php echo $base_url; ?>/index.php">Aspirasi</a> <br>
    </footer>
</body>
</html>
