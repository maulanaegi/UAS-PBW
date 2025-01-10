<?php
// Start session
session_start();
include 'includes/db_connection.php';
include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Futsal Hub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(209, 209, 209); /* Warna background abu-abu ringan */
        }
        .about-container {
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            background-color: #ffffff; /* Background putih */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan */
            border-radius: 8px; /* Sudut melengkung */
        }
        .whatsapp-link {
            color: #25D366; /* Warna hijau WhatsApp */
            font-weight: bold;
            text-decoration: none;
        }
        .whatsapp-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="about-container col-lg-8">
        <h1 class="mb-4">Tentang Kami</h1>
        <p class="mb-3">Futsal Hub adalah platform web inovatif yang mempermudah Anda dalam melakukan booking lapangan futsal secara online. Kami hadir untuk memberikan solusi cepat, nyaman, dan praktis bagi Anda yang ingin bermain futsal.</p>

        <h3 class="mb-3">Visi Kami</h3>
        <p>Menjadi platform terkemuka dalam menyediakan layanan pemesanan lapangan futsal yang mudah, cepat, dan terpercaya di Indonesia.</p>

        <h3 class="mb-3">Misi Kami</h3>
        <ul class="list-unstyled">
            <li>- Memberikan akses mudah untuk mencari lapangan futsal.</li>
            <li>- Menyediakan pilihan lapangan dengan jadwal real-time.</li>
            <li>- Mempermudah pembayaran dengan sistem yang aman.</li>
        </ul>

        <p class="mt-4">Jika Anda memiliki pertanyaan lebih lanjut, hubungi kami melalui WhatsApp:</p>
        <a href="https://wa.me/628995254010" class="whatsapp-link">0899-5254-010</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
