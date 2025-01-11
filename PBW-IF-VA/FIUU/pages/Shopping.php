<?php
include '../config/db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, category, name, price, stock, image FROM products";
$result = $conn->query($sql);

if (!$result) {
    die("Query Error: " . $conn->error);
}

$products = [];
$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
        if (!in_array($row['category'], $categories)) {
            $categories[] = $row['category'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Shopping</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bg-white text-gray-800">
    <?php include '../components/Navbar.php'; ?>

    <section class="relative overflow-hidden rounded-lg shadow-lg">
        <!-- <img src="../images/bg.jpg" alt="Hero" class="w-full h-[200px] object-cover rounded-t-lg">
        <div class="absolute inset-0 bg-black opacity-50 rounded-t-lg"></div>
        <div class="absolute inset-0 flex justify-center items-center text-white">
            <h2 class="text-3xl font-bold">Selamat Datang Di Store SHOPPING SHOP</h2>
        </div> -->
        <?php
    include '../components/HeroSection.php'; 
    ?>


    </section>

    <section class="bg-white py-8" id="product">
        <div class="container mx-auto px-4">
            <h2 class="text-xl font-bold mb-6">SHOP BY CATEGORY</h2>
            <div class="flex space-x-4 mb-6">
                <button onclick="filterCategory('all')"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">See All</button>
                <?php foreach ($categories as $category): ?>
                <button onclick="filterCategory('<?= $category; ?>')"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                    <?= ucfirst($category); ?>
                </button>
                <?php endforeach; ?>
            </div>

            <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <?php foreach ($products as $product): ?>
                <div class="bg-gray-100 p-4 rounded-lg shadow-md product-item"
                    data-category="<?= $product['category']; ?>">
                    <img src="../uploads/<?= $product['image']; ?>" alt="<?= $product['name']; ?>"
                        class="w-full h-48 object-cover rounded-lg">
                    <h3 class="text-lg font-semibold mt-2"><?= $product['name']; ?></h3>
                    <p class="text-gray-600">Category: <?= $product['category']; ?></p>
                    <p class="text-gray-600">Stock: <?= $product['stock']; ?></p>
                    <p class="text-gray-800 font-bold mt-2">Rp <?= number_format($product['price']); ?></p>
                    <button
                        onclick="openModal(<?= $product['id']; ?>, '<?= $product['name']; ?>', <?= $product['stock']; ?>)"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">Beli</button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-96">
            <h2 id="modal-title" class="text-xl font-bold text-gray-800">Checkout</h2>
            <form id="checkout-form" action="checkout.php" method="POST">
                <input type="hidden" name="product_id" id="product-id">
                <p id="modal-stock" class="text-gray-600 mt-2"></p>
                <label for="quantity" class="block text-gray-800 mt-4">Jumlah</label>
                <input type="number" name="quantity" id="quantity" min="1" max="" required
                    class="w-full p-2 mt-2 border rounded-lg">
                <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-green-600">Checkout</button>
            </form>
            <button onclick="closeModal()"
                class="bg-red-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-600">Cancel</button>
        </div>
    </div>


    <?php
    include '../components/Footer.php'; 
    ?>



    <script>
    function filterCategory(category) {
        const productItems = document.querySelectorAll('.product-item');
        productItems.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function openModal(productId, productName, stock) {
        document.getElementById('modal').classList.remove('hidden');
        document.getElementById('product-id').value = productId;
        document.getElementById('modal-title').textContent = `Checkout - ${productName}`;
        document.getElementById('modal-stock').textContent = `Stock available: ${stock}`;
        document.getElementById('quantity').max = stock;
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>