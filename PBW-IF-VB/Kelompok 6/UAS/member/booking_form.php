<?php include '../includes/session.php'; ?>
<?php include '../includes/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2>Form Booking Lapangan</h2>
    
    <?php
    if (isset($_GET['lapangan_id']) && !empty($_GET['lapangan_id'])) {
        $lapangan_id = $_GET['lapangan_id'];

        $sql = "SELECT * FROM lapangan WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $lapangan_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $lapangan = $result->fetch_assoc();
        } else {
            echo "Lapangan tidak ditemukan.";
            exit;
        }
    } else {
        echo "Lapangan ID tidak ditemukan.";
        exit;
    }

    // Mendapatkan ID Booking terbaru (auto increment)
    $sql_id = "SELECT MAX(id) AS max_id FROM booking";
    $result_id = $conn->query($sql_id);
    $row = $result_id->fetch_assoc();
    $max_id = $row['max_id'];

    $next_id_number = 1;
    if ($max_id) {
        $next_id_number = (int)substr($max_id, 2) + 1;
    }

    $next_id = "KB" . str_pad($next_id_number, 4, "0", STR_PAD_LEFT);
    ?>

    <form action="process_booking.php" method="POST">
        <div class="mb-3">
            <label for="id_booking" class="form-label">ID Booking</label>
            <input type="text" class="form-control" name="id_booking" value="<?php echo $next_id; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_futsal" class="form-label">Nama Futsal</label>
            <input type="text" class="form-control" name="nama_futsal" value="<?php echo $lapangan['nama_lapangan']; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="lapangan_id" class="form-label">ID Lapangan</label>
            <input type="text" class="form-control" name="lapangan_id" value="<?php echo $lapangan['id']; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Per Jam</label>
            <input type="text" class="form-control" name="harga" value="Rp. <?php echo number_format($lapangan['harga'], 0, ',', '.'); ?>,00" readonly>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Booking</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="jam" class="form-label">Jam Booking</label>
            <input type="time" class="form-control" id="jam" name="jam" required>
        </div>

        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi Bermain</label>
            <select class="form-control" name="durasi" id="durasi" required onchange="calculateTotal()">
                <option value="0">Pilih Jam</option>
                <option value="1">1 Jam</option>
                <option value="2">2 Jam</option>
                <option value="3">3 Jam</option>
                <option value="4">4 Jam</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" value="0" readonly>
        </div>

        <!-- Hidden input untuk total_harga -->
        <input type="hidden" name="total_harga_hidden" id="total_harga_hidden">

        <button type="submit" class="btn btn-primary">Lanjutkan</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<script>
// Fungsi untuk menghitung total harga
function calculateTotal() {
    var harga = <?php echo $lapangan['harga']; ?>;
    var durasi = document.getElementById("durasi").value;
    var totalHarga = harga * durasi;

    document.getElementById("total_harga").value = "Rp. " + totalHarga.toLocaleString() + ",00"; // Format sebagai Rupiah

    // Set hidden input untuk total harga
    document.getElementById("total_harga_hidden").value = totalHarga;
}
</script>

</body>
</html>
