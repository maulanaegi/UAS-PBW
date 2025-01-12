<?php
require '../config/db.php';
require '../vendor/autoload.php'; // Library Dompdf

use Dompdf\Dompdf;

// Ambil ID user login (contoh hardcoded untuk user ID = 1)
$userId = 1;

// Ambil data checkout yang terkait dengan user
$sql = "SELECT c.id AS checkout_id, p.name, p.price, c.quantity, c.status, p.stock, p.image
        FROM checkouts c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = ? AND c.status = 'unpaid'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$total_price = 0;
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total_price += $row['price'] * $row['quantity'];
}

// Proses cetak PDF
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate_pdf'])) {
    $buyer_name = $_POST['buyer_name'];
    $buyer_email = $_POST['buyer_email'];
    $payment_amount = $_POST['payment_amount'];

    if (empty($buyer_name) || empty($buyer_email) || empty($payment_amount)) {
        header("Location: payment.php?error=1");
        exit;
    }

    // Hitung kembalian
    $change = $payment_amount - $total_price;

    // Buat konten HTML untuk PDF
    $html = "
        <h2>Invoice Pembayaran</h2>
        <p>Nama Pembeli: $buyer_name</p>
        <p>Email: $buyer_email</p>
        <p>Total Pembayaran: Rp " . number_format($total_price, 2, ',', '.') . "</p>
        <p>Jumlah Pembayaran: Rp " . number_format($payment_amount, 2, ',', '.') . "</p>
        <p>Kembalian: Rp " . number_format($change, 2, ',', '.') . "</p>
        <table border='1' cellpadding='5' cellspacing='0'>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>";
    foreach ($cart_items as $item) {
        $html .= "
            <tr>
                <td>{$item['name']}</td>
                <td>Rp " . number_format($item['price'], 2, ',', '.') . "</td>
                <td>{$item['quantity']}</td>
            </tr>";
    }
    $html .= "
            </tbody>
        </table>";

    // Generate PDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("Invoice.pdf", ["Attachment" => false]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                <tr>
                    <td class="border px-4 py-2"><?= $item['name'] ?></td>
                    <td class="border px-4 py-2">Rp <?= number_format($item['price']) ?></td>
                    <td class="border px-4 py-2"><?= $item['quantity'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="mt-4 text-xl font-semibold">Total Harga: Rp <?= number_format($total_price) ?></p>

        <!-- Tombol untuk membuka modal pembayaran -->
        <button onclick="toggleModal('payment-modal')"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            Bayar
        </button>
        <a href="../pages/Shopping.php" class="w-full md:w-auto">
            <button type="submit"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 w-full md:w-auto">Kembali</button>
        </a>
    </div>

    <!-- Modal Pembayaran -->
    <div id="payment-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-96">
            <h3 class="text-xl font-bold mb-4">Masukkan Detail Pembayaran</h3>
            <form action="payment.php" method="POST">
                <div class="mb-4">
                    <label for="buyer_name" class="block text-gray-700">Nama Pembeli</label>
                    <input type="text" name="buyer_name" id="buyer_name" class="w-full border px-4 py-2 rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="buyer_email" class="block text-gray-700">Email</label>
                    <input type="email" name="buyer_email" id="buyer_email" class="w-full border px-4 py-2 rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="payment_amount" class="block text-gray-700">Jumlah Pembayaran</label>
                    <input type="number" name="payment_amount" id="payment_amount"
                        class="w-full border px-4 py-2 rounded-lg">
                </div>
                <div class="flex justify-between">
                    <button type="submit" name="generate_pdf"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Cetak PDF
                    </button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600"
                        onclick="toggleModal('payment-modal')">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Script sederhana untuk mengelola modal
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
    </script>
</body>

</html>