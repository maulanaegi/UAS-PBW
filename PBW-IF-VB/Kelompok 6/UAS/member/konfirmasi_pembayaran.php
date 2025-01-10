<?php
include '../includes/session.php';
include '../includes/db_connection.php';

// Pastikan ID booking tersedia di URL
if (isset($_GET['id_booking'])) {
    if (!empty($_GET['id_booking'])) {
        $id_booking = $_GET['id_booking'];

        // Ambil detail booking berdasarkan ID booking
        $sql = "SELECT booking.id, booking.lapangan_id, booking.member_id, booking.tanggal, booking.jam, 
                booking.total_harga, lapangan.nama_lapangan
                FROM booking
                JOIN lapangan ON booking.lapangan_id = lapangan.id 
                WHERE booking.id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo "Failed to prepare statement.<br>";
            exit;
        }
        $stmt->bind_param("s", $id_booking);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            echo "Failed to execute query.<br>";
            exit;
        }

        // Cek apakah booking ditemukan
        if ($result->num_rows > 0) {
            $booking = $result->fetch_assoc();
        } else {
            echo "Booking tidak ditemukan.<br>";
            exit;
        }
    } else {
        echo "ID booking is empty.<br>";
        exit;
    }
} else {
    echo "ID booking tidak tersedia.<br>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function updateBankDetails() {
            const bankDetails = {
                BCA: "1234567890 (BCA)",
                Mandiri: "0987654321 (Mandiri)",
                BRI: "1122334455 (BRI)"
            };

            const selectedBank = document.getElementById("bank").value;
            const bankInfo = bankDetails[selectedBank] || "Pilih bank untuk melihat nomor rekening.";
            document.getElementById("bankDetails").textContent = bankInfo;
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Konfirmasi Pembayaran</h2>
        <div class="card shadow-lg">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">Detail Booking</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID Booking:</strong> <?php echo htmlspecialchars($booking['id']); ?></li>
                    <li class="list-group-item"><strong>Nama Lapangan:</strong> <?php echo htmlspecialchars($booking['nama_lapangan']); ?></li>
                    <li class="list-group-item"><strong>Tanggal:</strong> <?php echo date("d M Y", strtotime($booking['tanggal'])); ?></li>
                    <li class="list-group-item"><strong>Jam:</strong> <?php echo htmlspecialchars($booking['jam']); ?></li>
                    <li class="list-group-item"><strong>Total Harga:</strong> Rp<?php echo number_format($booking['total_harga'], 0, ',', '.'); ?></li>
                </ul>

                <hr class="my-4">

                <h5 class="card-title text-center mb-3">Metode Pembayaran</h5>
                <form action="konfimasi_pembayaran_sukses.php" method="GET">
                    <input type="hidden" name="id_booking" value="<?php echo urlencode($booking['id']); ?>">

                    <div class="mb-3">
                        <label for="bank" class="form-label">Pilih Bank</label>
                        <select class="form-select" id="bank" name="bank" onchange="updateBankDetails()" required>
                            <option value="" disabled selected>Pilih Bank</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BRI">BRI</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening Tujuan</label>
                        <p id="bankDetails" class="text-primary fw-bold">Pilih bank untuk melihat nomor rekening.</p>
                    </div>

                    <div class="mb-3">
                        <label for="no_rekening_pengirim" class="form-label">Nomor Rekening Pengirim</label>
                        <input type="text" class="form-control" id="no_rekening_pengirim" name="no_rekening_pengirim" placeholder="Masukkan nomor rekening Anda" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
