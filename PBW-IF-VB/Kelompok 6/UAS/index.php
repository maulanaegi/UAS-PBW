<?php include 'includes/db_connection.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking</title>
    <link rel="icon" href="assets/img/footer-logo.png" sizes="32x32" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<!-- Hero Section / Carousel -->
<div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/img1.jpg" class="d-block w-100" alt="Lapangan Futsal">
        </div>
        <div class="carousel-item">
            <img src="assets/img/img3.jpg" class="d-block w-100" alt="Lapangan Futsal">
        </div>
        <div class="carousel-item">
            <img src="assets/img/img2.jpg" class="d-block w-100" alt="Lapangan Futsal">
        </div>
        <div class="carousel-item">
            <img src="assets/img/img4.jpg" class="d-block w-100" alt="Lapangan Futsal">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Pencarian Lapangan -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Cari Lapangan Futsal</h2>
    <div class="row justify-content-center">
        <form class="form-inline" method="GET" action="index.php">
            <input class="form-control me-2" type="search" name="search" placeholder="Cari lapangan..." aria-label="Search">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
    </div>
</div>

<!-- Daftar Lapangan -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Lapangan</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM lapangan WHERE nama_lapangan LIKE '%$search%'";
        $result = $conn->query($sql);

        while ($lapangan = $result->fetch_assoc()):
        ?>
            <div class="col">
                <div class="card h-100">
                    <img src="upload/<?php echo $lapangan['foto']; ?>" class="card-img-top" alt="Lapangan" style="object-fit: cover; height: 200px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $lapangan['nama_lapangan']; ?></h5>
                        <p class="card-text">Lokasi: <?php echo $lapangan['lokasi']; ?></p>
                        <p class="card-text">Harga: Rp <?php echo number_format($lapangan['harga'], 2, ',', '.'); ?></p>
                        <p class="card-text"><?php echo $lapangan['deskripsi']; ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="javascript:void(0);" class="btn btn-primary booking-btn" data-lapangan-id="<?php echo $lapangan['id']; ?>">Booking</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<script>
// Periksa apakah pengguna sudah login
<?php if (isset($_SESSION['user_id'])): ?>
    var isLoggedIn = true; // Pengguna sudah login
<?php else: ?>
    var isLoggedIn = false; // Pengguna belum login
<?php endif; ?>

// Event listener untuk tombol booking
document.querySelectorAll('.booking-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        if (isLoggedIn) {
            // Jika sudah login, arahkan ke halaman booking dengan ID lapangan
            var lapanganId = button.getAttribute('data-lapangan-id');
            window.location.href = 'member/booking_form.php?lapangan_id=' + lapanganId;
        } else {
            // Jika belum login, tampilkan alert untuk login
            alert('Anda harus login terlebih dahulu!');
        }
    });
});
</script>

</body>
</html>