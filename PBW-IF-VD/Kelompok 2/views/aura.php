<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Aura Rahayu Aksa Radiana</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
    /* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

header {
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

header nav ul {
    list-style: none;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin: 0;
    padding: 0;
}

header nav ul li {
    margin-left: 20px;
}

header nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
    transition: color 0.3s ease;
}

header nav ul li a:hover {
    color: #64421a;
}

header nav ul li .btn {
    padding: 8px 15px;
    background-color: #64421a;
    color: #fff;
    border-radius: 5px;
    font-weight: 700;
}

header nav ul li .btn:hover {
    background-color: #64421a;
}

/* Hero Section */
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px 20px;
    max-width: 1200px;
    margin: 0 auto;
    gap: 20px;
}

.intro {
    max-width: 600px;
}

.intro .subtitle {
    font-size: 18px;
    font-weight: 600;
    color: #555;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.intro h1 {
    font-size: 48px;
    margin: 0;
    font-weight: 700;
    color: #333;
}

.intro h1 span {
    color: #64421a;
}

.intro .description {
    font-size: 16px;
    color: #666;
    margin-top: 20px;
}

.profile-image img {
    width: 300px;
    height: auto;
    border-radius: 10px;
}

/* Footer */
footer {
    text-align: center;
    padding: 20px 0;
    background-color: #fff;
    color: #666;
    font-size: 14px;
    border-top: 1px solid #ddd;
}

/* Services Section */
.services {
    padding: 50px 20px;
    background-color: #f3f3f3;
    text-align: center;
    margin-top: 30px;
}

.services h2 {
    font-size: 36px;
    color: #333;
    font-weight: 700;
    margin-bottom: 10px;
}

.services p {
    font-size: 16px;
    color: #555;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.service-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.service-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.service-card h3 {
    font-size: 24px;
    color: #64421a;
    margin-bottom: 10px;
}

.service-card p {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

/* Portfolio Section */
.portfolio {
    padding: 50px 20px;
    background-color: #ffffff;
    text-align: center;
    margin-top: 30px;
}

.portfolio h2 {
    font-size: 36px;
    color: #333;
    font-weight: 700;
    margin-bottom: 10px;
}

.portfolio p {
    font-size: 16px;
    color: #555;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.portfolio-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.portfolio-card {
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.portfolio-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.portfolio-card img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.portfolio-card h3 {
    font-size: 20px;
    color: #333;
    margin: 15px 0 10px;
}

.portfolio-card p {
    font-size: 14px;
    color: #666;
    padding: 0 15px 15px;
    line-height: 1.6;
}

/* Skills Section */
.skills {
    padding: 50px 20px;
    background-color: #f4f4f4;
    text-align: center;
}

.skills h2 {
    font-size: 36px;
    color: #333;
    font-weight: 700;
    margin-bottom: 10px;
}

.skills p {
    font-size: 16px;
    color: #555;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.skills-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.skill {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.skill h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 15px;
}

.progress-bar {
    background-color: #e0e0e0;
    border-radius: 25px;
    height: 10px;
    width: 100%;
    margin-bottom: 10px;
    overflow: hidden;
}

.progress {
    background-color: #a44a0a;
    height: 100%;
    border-radius: 25px;
}

.skill p {
    font-size: 14px;
    color: #666;
}

/* Media Section */
.media {
    padding: 50px 20px;
    background-color: #f9f9f9;
    display: flex; /* Menggunakan flexbox untuk menata elemen bersebelahan */
    justify-content: space-between; /* Menyebarkan elemen secara merata */
    align-items: center; /* Menyelaraskan elemen secara vertikal */
    gap: 20px; /* Memberikan jarak antara elemen */
    flex-wrap: wrap; /* Agar elemen tetap responsif dan pindah ke baris berikutnya jika layar lebih kecil */
}

.media h2 {
    font-size: 36px;
    color: #333;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: center;
    width: 100%; /* Memastikan heading mengambil lebar penuh */
}

.media .spotify,
.media .youtube {
    width: 48%; /* Setiap elemen mengambil 48% dari lebar kontainer */
    min-width: 300px; /* Set minimum lebar agar tidak terlalu kecil */
}

.media iframe {
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.media .spotify iframe {
    width: 100%; /* Membuat iframe Spotify responsif */
    height: 352px;
}

.media .youtube iframe {
    width: 100%; /* Membuat iframe YouTube responsif */
    height: 352px;
}

/* Contact Section */
.contact {
    padding: 50px 20px;
    background-color: #f9f9f9;
    text-align: center;
}

.contact h2 {
    font-size: 36px;
    color: #333;
    font-weight: 700;
    margin-bottom: 20px;
}

.contact p {
    font-size: 16px;
    color: #555;
    margin-bottom: 30px;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.social-icon {
    display: block;
    width: 40px;
    height: 40px;
    transition: transform 0.3s ease;
}

.social-icon img {
    width: 100%;
    height: 100%;
}

.social-icon:hover {
    transform: scale(1.2);
}

.social-icon.instagram {
    background-color: #E4405F;
    border-radius: 50%;
    padding: 5px;
}

.social-icon.email {
    background-color: #EA4335;
    border-radius: 50%;
    padding: 5px;
}

.social-icon.facebook {
    background-color: #1877F2;
    border-radius: 50%;
    padding: 5px;
}

/* Resume Section */
.resume {
    text-align: center;
    padding: 50px 20px;
    background-color: #f4f4f4;
}

.resume h2 {
    font-size: 36px;
    color: #333;
    font-weight: 700;
    margin-bottom: 20px;
}

.resume p {
    font-size: 18px;
    color: #555;
    margin-bottom: 20px;
}

.resume button {
    background-color: #4d330a;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.resume button:hover {
    background-color: #4d2c15;
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
    <header>
        <nav>
            <ul>
                <li><a href="#services">Services</a></li>
                <li><a href="#education">Education</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#media">Media</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#resume" class="btn">Resume</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="intro">
                <p class="subtitle">My name is</p>
                <h1>Aura Rahayu <span>Aksa Radiana</span></h1>
                <p class="description">
                    Saya adalah Mahasiswa Prodi Informatika di Universitas Sebelas April, Sumedang. 
                    Saya merupakan mahasiswa yang memiliki cukup pemahaman dalam bidang IT, dan masih harus
                    banyak belajar untuk lebih membentuk persepsi agar lebih memiliki banyak pemahaman. Saya 
                    memiliki kemampuan dalam bidang desain dan berusaha untuk mengasah kemampuan saya tersebut
                    di ranah IT.
                </p>
            </div>
            <div class="profile-image">
                <img src="https://i.pinimg.com/474x/c0/b7/53/c0b753c9d904bdb41f7833324a552469.jpg" alt="Aura Rahayu Aksa Radiana">
            </div>
        </section>
        <section id="services" class="services">
            <h2>My Services</h2>
            <p>Berikut adalah kemampuan saya:</p>
            <div class="service-cards">
                <div class="service-card">
                    <h3>Web Development</h3>
                    <p>Membangun website responsif menggunakan teknologi modern seperti HTML, CSS, JavaScript, dan framework.</p>
                </div>
                <div class="service-card">
                    <h3>UI/UX Design</h3>
                    <p>Mendesain antarmuka pengguna yang menarik dan intuitif menggunakan Figma, dengan fokus pada pengalaman pengguna.</p>
                </div>
            </div>
        </section>
        <section id="portfolio" class="portfolio">
            <h2>My Education</h2>
            <p>Berikut adalah riwayat pendidikan saya:</p>
            <div class="portfolio-cards">
                <div class="portfolio-card">
                    <h3>MAN 1 Sumedang</h3>
                    <p>2019-2022.</p>
                </div>
                <div class="portfolio-card">
                    <h3>Universitas Sebelas April</h3>
                    <p>2022-Sekarang.</p>
                </div>
            </div>
        </section>
        <section id="skills" class="skills">
            <h2>My Skills</h2>
            <p>Berikut kemampuan bahasa pemrograman yang saya kuasai:</p>
            <div class="skills-container">
                <div class="skill">
                    <h3>HTML & CSS</h3>
                    <div class="progress-bar">
                        <div class="progress" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <h3>JavaScript</h3>
                    <div class="progress-bar">
                        <div class="progress" style="width: 80%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <h3>Phyton</h3>
                    <div class="progress-bar">
                        <div class="progress" style="width: 75%;"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="media" class="media">
            <h2>My Media</h2>
            
            <!-- Spotify Section -->
            <div class="spotify">
                <h3>My Favorite Song</h3>
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/7F25roCtYi55JouckaayPC?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
            
            <!-- YouTube Section -->
            <div class="youtube">
                <h3>My Favorite Video</h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/V_Ew3Ddyykg?si=VG6LZ-P3pA0_aO6c&amp;start=49" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>
        <section id="contact" class="contact">
            <h2>Contact Me</h2>
            <p>Berikut adalah beberapa link sosial media saya!</p>
            <div class="social-links">
                <a href="https://www.instagram.com/hay.ra299/profilecard/?igsh=MXB1eWVqeWU1c2Uycw==" target="_blank" class="social-icon instagram">
                    <img src="https://i.pinimg.com/736x/73/5d/da/735dda68880a385ce8cc5be4f3c5fcd6.jpg" alt="Instagram">
                </a>
                <a href="https://www.linkedin.com/in/aura-rahayu-aksa-radiana-a311b6291?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="social-icon linkedin">
                    <img src="https://i.pinimg.com/736x/0e/05/4d/0e054d84572f596482c49a555acaf2e3.jpg" alt="Email">
                </a>
                <a href="https://www.facebook.com/share/188cdhKPtK/" target="_blank" class="social-icon facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
                </a>
            </div>
        </section>
        <section id="resume" class="resume">
            <h2>Resume</h2>
            <p>Tekan button dibawah ini untuk melihat resume saya!.</p>
            <button onclick="openResume()">View Resume</button>
        </section>                                             
    </main>

    <footer>
        <p>&copy; 2024 Aura Rahayu Aksa Radiana. All rights reserved.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    console.log("Portofolio dengan fitur tambahan siap digunakan!");
});
function openResume() {
    // Replace 'cv.pdf' with the path to your actual CV file
    window.open('Portofolio\Assets\CV Aura Rahayu.pdf', '_blank');
}

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
