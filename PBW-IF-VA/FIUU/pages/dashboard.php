<?php
include '../config/db.php';

// Ambil data jumlah produk per kategori
$sql = "SELECT category, COUNT(*) as product_count FROM products GROUP BY category";
$result = $conn->query($sql);

$categories = [];
$product_counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
        $product_counts[] = $row['product_count'];
    }
} else {
    $categories = ['No Data'];
    $product_counts = [0];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../global.css">
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <?php include('../components/sidebar.php'); ?>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <h2 class="text-3xl font-bold mb-6">Dashboard Utama</h2>

        <!-- Product Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded shadow-box flex items-center">
                <span class="text-4xl mr-4">📦</span>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jumlah Produk</h3>
                    <p class="text-2xl font-bold"><?php echo array_sum($product_counts); ?> Produk</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded shadow-box flex items-center">
                <span class="text-4xl mr-4">📊</span>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jumlah Kategori</h3>
                    <p class="text-2xl font-bold"><?php echo count($categories); ?> Kategori</p>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white p-6 rounded shadow-box">
            <h3 class="text-xl font-semibold mb-4">Jumlah Produk per Kategori</h3>
            <canvas id="categoryChart"></canvas>
        </div>
    </div>

    <script>
    // Data for Chart.js
    var ctx = document.getElementById('categoryChart').getContext('2d');
    var categoryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($categories); ?>,
            datasets: [{
                label: 'Jumlah Produk',
                data: <?php echo json_encode($product_counts); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                hoverBackgroundColor: 'rgba(75, 192, 192, 0.4)',
                hoverBorderColor: 'rgba(75, 192, 192, 1)',
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 1500, // Set duration of animation
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)', // Adding grid lines
                    },
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
            },
        }
    });
    </script>
</body>

</html>