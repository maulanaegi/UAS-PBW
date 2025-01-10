<?php
// Start session
session_start();
include 'includes/db_connection.php';
include 'includes/navbar.php';
?>

<div class="container mt-5">
    <h1>Kontak Kami</h1>
    <p>Jika Anda memiliki pertanyaan atau ingin memberikan umpan balik, Anda dapat menghubungi kami melalui WhatsApp di bawah ini. Klik tombol di bawah untuk langsung mengirim pesan ke admin!</p>

    <h3>Hubungi Kami</h3>
    <p>Untuk informasi lebih lanjut atau bantuan, silakan klik tombol di bawah ini untuk menghubungi kami langsung melalui WhatsApp:</p>

    <!-- Tautan WhatsApp ke admin -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20memiliki%20pertanyaan" class="btn btn-success" target="_blank">
        Hubungi Admin via WhatsApp
    </a>

    <h3>Follow Us</h3>
    <p>Temukan kami di media sosial untuk pembaruan dan informasi lebih lanjut:</p>
    <ul>
        <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
        <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
        <li><a href="https://youtube.com" target="_blank">YouTube</a></li>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
