-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mout hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `created_at`) VALUES
(2, 'yygyg', 'hidayatreno085@gmail.com', '2024-12-21 05:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_date` datetime DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `payment_method`, `total_price`, `total`, `status`, `created_at`, `order_date`, `customer_id`) VALUES
(1, 51, 'cimalaka', '', 0.00, 749000.00, 'Payment Pending', '2024-12-21 02:11:50', '2024-12-21 04:40:28', 0),
(2, 51, 'cimalaka', '', 0.00, 749000.00, 'Payment Pending', '2024-12-21 02:12:09', '2024-12-21 04:40:28', 0),
(3, 51, '', '', 0.00, 749000.00, 'Pending', '2024-12-21 02:20:12', '2024-12-21 04:40:28', 0),
(4, 51, '', '', 0.00, 2948000.00, 'Pending', '2024-12-21 02:25:08', '2024-12-21 04:40:28', 0),
(5, 51, '', '', 0.00, 2948000.00, 'Pending', '2024-12-21 02:31:49', '2024-12-21 04:40:28', 0),
(6, 51, '', '', 0.00, 5848000.00, 'Pending', '2024-12-21 02:45:36', '2024-12-21 04:40:28', 0),
(7, 51, '', '', 0.00, 749000.00, 'Pending', '2024-12-21 02:49:04', '2024-12-21 04:40:28', 0),
(8, 56, 'iiii', 'Dana', 2199000.00, 0.00, '', '2024-12-21 05:58:24', '2024-12-21 05:58:24', 0),
(9, 56, 'wdwdw', 'Dana', 749000.00, 0.00, '', '2024-12-21 05:59:32', '2024-12-21 05:59:32', 0),
(10, 56, 'wdwd', 'Dana', 749000.00, 0.00, '', '2024-12-21 06:15:36', '2024-12-21 06:15:36', 0),
(11, 56, 'wwffwfw', 'Dana', 749000.00, 0.00, '', '2024-12-21 06:16:20', '2024-12-21 06:16:20', 0),
(12, 56, 'cimalaka', 'Dana', 569000.00, 0.00, '', '2024-12-21 06:24:02', '2024-12-21 06:24:02', 0),
(13, 56, 'sumedang', 'OVO', 130000.00, 0.00, '', '2024-12-21 06:26:14', '2024-12-21 06:26:14', 0),
(14, 48, 'cimalaka', 'Dana', 1318000.00, 0.00, '', '2024-12-21 07:42:46', '2024-12-21 07:42:46', 0),
(15, 59, 'wwww', 'Dana', 749000.00, 0.00, '', '2025-01-03 09:02:51', '2025-01-03 16:02:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `payment_method`, `amount`, `payment_date`) VALUES
(1, 51, 'dana', 4028450.00, '2024-12-21 02:55:26'),
(2, 51, 'dana', 2199000.00, '2024-12-21 03:02:19'),
(3, 51, 'dana', 2199000.00, '2024-12-21 03:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` int(20) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image_url`, `description`, `category`) VALUES
(1, 'Guess ', 30000, '/MountHubFinal/images/sp1.jpg\n', 'keren', NULL),
(2, 'Guest Watch', 25, 'uploads/1734673071_images.png', 'k', NULL),
(3, 'Panerai Watch', 3500, NULL, NULL, NULL),
(4, 'Nonos Watch', 1800, NULL, NULL, NULL),
(5, 'Levis', 1800, NULL, NULL, NULL),
(6, 'louis philippe t-shirt', 2500, NULL, NULL, NULL),
(7, 'Highlander t-shirt', 500, NULL, NULL, NULL),
(8, 'GUCCI White t-Shirt', 2300, NULL, NULL, NULL),
(9, 'Nike White Sneaker', 8000, NULL, NULL, NULL),
(11, 'Nike Yellow Sneaker', 7000, NULL, NULL, NULL),
(12, 'Nike Brown Sneaker', 6000, NULL, NULL, NULL),
(13, 'Beats Headphone', 22500, NULL, NULL, NULL),
(31, 'EIGER X-Berganoa 1P Tent', 749000, 'uploads/67657bcd619324.82837643.jpg', NULL, 'Tenda'),
(32, 'EIGER Shipton 3P Tent', 2199000, 'uploads/67657f7ef0a997.90914819.jpg', NULL, 'Tenda'),
(33, 'EIGER Strover 4P Ten', 2249000, 'uploads/1734706358_WhatsApp Image 2024-12-20 at 14.52.06.jpeg', NULL, 'Tenda'),
(34, 'EIGER Creek 5P Tent', 1899000, 'uploads/676585b5983540.70726726.png', NULL, 'Tenda'),
(35, 'EIGER X-Casuarina 6P Tent', 1459000, 'uploads/67658652d7ded6.69547515.png', NULL, 'Tenda'),
(36, 'EIGER Guardian 8P Tent', 3649000, 'uploads/676586aed32602.94843727.jpg', NULL, 'Tenda'),
(37, 'EIGER Flash 2P Tent', 1379000, 'uploads/1734707133_dd.PNG', NULL, 'Tenda'),
(38, 'EIGER Lone Bivy 1P Tent', 949000, 'uploads/6765881d5993c3.57590714.jpg', NULL, 'Tenda'),
(39, 'Naturehike Tenda Professional ', 1579000, 'uploads/676588b61f02b5.02677707.jpeg', NULL, 'Tenda'),
(40, 'Consina Magnum 4 Tenda Dome Gu', 1232000, 'uploads/67658975968866.51883119.jpg', NULL, 'Tenda'),
(41, 'Dhaulagiri DH Terra Pro 4', 1360000, 'uploads/67658a29c13b39.58312008.png', NULL, 'Tenda'),
(42, 'Speeds Tenda Kemping Kemah Bes', 1560000, 'uploads/67658ac8d2c874.40639404.png', NULL, 'Tenda'),
(43, ' Tenda Camping Tenda Kemah 3 O', 288888, 'uploads/67658ba045c039.90134490.png', NULL, 'Tenda'),
(44, 'Arei Tenda Eliot', 1199000, 'uploads/67658bf7915326.72869471.jpeg', NULL, 'Tenda'),
(45, 'ss', 2199000, 'uploads/67658cbdf19215.93508540.png', NULL, 'Tenda'),
(46, 'Mercure Low Boots Boot', 251000, 'uploads/67658d9808e560.68895306.jpg', NULL, 'Sepatu Gunung'),
(48, 'Safety Boots Cuvier High Warna', 569000, 'uploads/67658eb4dbfff3.74948330.png', NULL, 'Sepatu Gunung'),
(49, 'Sepatu Gunung Hiking Outdoor S', 169000, 'uploads/67658f2619c968.69616576.jpg', NULL, 'Sepatu Gunung'),
(50, 'Sepatu Hoka ATR 7 ', 155000, 'uploads/67659ab0446006.40432804.jpg', NULL, 'Sepatu Gunung'),
(51, 'ORI BOOT touring Beckam paramo', 130000, 'uploads/67659b375808b6.83364723.jpg', NULL, 'Sepatu Gunung'),
(52, 'RUBTRACK Sepatu Hiking Trackin', 239520, 'uploads/67659b95da7172.98295784.jpg', NULL, 'Sepatu Gunung'),
(53, 'Sepatu Boots Hiking Anti Slip ', 60000, 'uploads/67659c30e1dfb7.71534011.jpg', NULL, 'Sepatu Gunung'),
(54, 'Sepatu Boots Safety Tactical D', 200000, 'uploads/67659cb8c66338.61712857.jpg', NULL, 'Sepatu Gunung'),
(55, 'SEPATU GUNUNG KARIMOR SAFETY B', 95000, 'uploads/67659d1c118b14.07986794.jpg', NULL, 'Sepatu Gunung'),
(56, 'Sepatu Gunung SNTA 501 Black G', 349000, 'uploads/67659d8d151f25.14028896.jpg', NULL, 'Sepatu Gunung'),
(57, 'Sepatu Hiking, Trekking, outdo', 130000, 'uploads/67659de6a6c6a5.03907945.jpg', NULL, 'Sepatu Gunung'),
(58, 'Sepatu Boots Safety Ujung Besi', 250, 'uploads/67659e7b60ee73.45316957.jpg', NULL, 'Sepatu Gunung'),
(59, 'Hipzo M032 boots Original', 133000, 'uploads/67659ee6122068.66407701.jpg', NULL, 'Sepatu Gunung'),
(60, 'Karrimore Hiking Ujung Besi', 95000, 'uploads/67659f6cec45c3.03127765.jpg', NULL, 'Sepatu Gunung'),
(61, 'Hiking Adventure Outdoor Anti ', 187000, 'uploads/67659fc04f72a0.03813293.jpg', NULL, 'Sepatu Gunung'),
(62, 'TAS RANSEL SEMI CARRIER 40 Ltr', 95095, 'uploads/6765a29d869458.09893370.png', NULL, 'Ransel Gunung'),
(63, 'Straight Vision - Diablo Water', 246450, 'uploads/6765a2f972e697.12711067.jpeg', NULL, 'Ransel Gunung'),
(64, 'Tas Ransel Gunung 60Liter / Ta', 125000, 'uploads/6765a340ef80a8.95828186.jpeg', NULL, 'Ransel Gunung'),
(65, 'Tas Ransel Gunung Carrier 30L ', 165000, 'uploads/6765f3fb3ff161.77804446.png', NULL, 'Ransel Gunung'),
(66, 'Tas Ransel Gunung Carrier 35L ', 225000, 'uploads/6765f464445854.93669008.png', NULL, 'Ransel Gunung'),
(67, 'DRY BAG BACKPACK WATERPROOF 25', 175000, 'uploads/6765f4d7e53351.91795853.png', NULL, 'Ransel Gunung'),
(68, 'Tas Ransel Gunung Carrier 35L ', 225000, 'uploads/6765f53f2f40e0.15347883.png', NULL, 'Ransel Gunung'),
(69, 'Osprey Exos 58L Ultralight Bac', 2840000, 'uploads/6765f5fe96f228.89530205.png', NULL, 'Ransel Gunung'),
(70, 'Tas Carrier Rei Ramelu 60+5L T', 135000, 'uploads/6765f682102b49.07213326.png', NULL, 'Ransel Gunung'),
(71, 'Ransel Army 3 in1 besar 60L-Ta', 297000, 'uploads/6765f6efbd6d35.89910194.png', NULL, 'Ransel Gunung'),
(72, 'Tas Travel Jumbo / Tas Pakaian', 180000, 'uploads/6765f738910022.28701592.png', NULL, 'Ransel Gunung'),
(73, 'Baepack Tas Gunung kamping Tra', 125000, 'uploads/6765f7af62b323.64928886.png', NULL, 'Ransel Gunung'),
(74, 'Baepack Tas Gunung Traveling C', 125000, 'uploads/6765f8152e35a3.89187991.png', NULL, 'Ransel Gunung'),
(75, 'Baepack Tas Gunung Traveling C', 130000, 'uploads/6765f8814c57a7.52305155.png', NULL, 'Ransel Gunung'),
(76, 'tas gunung carrier arei papand', 135000, 'uploads/6765f8f9038d77.48443922.png', NULL, 'Ransel Gunung'),
(77, 'Antarestar Official - Jacket S', 399000, 'uploads/6765f9721cb6f8.91407732.png', NULL, 'Jaket Gunung'),
(78, 'AVTECH -Windbreaker  Abu, L ', 370450, 'uploads/6765f9cb09ec74.82583329.jpg', NULL, 'Jaket Gunung'),
(79, 'Consina Blackburn Jaket Gunung', 425000, 'uploads/6765f9ff212e62.47253588.jpg', NULL, 'Jaket Gunung'),
(80, 'Consina Manaslu Jaket Gunung O', 288000, 'uploads/6765fa2b391372.55424274.jpg', NULL, 'Jaket Gunung'),
(81, 'CREDIFOX Jaket Gunung Gorpcore', 225000, 'uploads/6765fa660c9f16.44201484.png', NULL, 'Jaket Gunung'),
(82, 'ELEVEN OUTDOOR - JAKET SPYKER ', 259000, 'uploads/6765fa942b2da2.31720729.jpg', NULL, 'Jaket Gunung'),
(83, 'JAKET DOWN COLLARLESS NATUREHI', 923000, 'uploads/6765fac0549534.35652080.jpg', NULL, 'Jaket Gunung'),
(84, 'Jaket Gunung BIG SIZE Waterpro', 260500, 'uploads/6765faea94ef30.63678466.jpg', NULL, 'Jaket Gunung'),
(85, 'Jaket gunung bulang goose down', 449000, 'uploads/6765fb1c6f1549.06955790.jpg', NULL, 'Jaket Gunung'),
(86, 'Jaket Gunung Eiger Cordial Ano', 494000, 'uploads/6765fb4b101417.77685714.jpg', NULL, 'Jaket Gunung'),
(87, 'Jaket Gunung Pria Arei Outdoor', 449000, 'uploads/6765fb801b0313.74276184.jpg', NULL, 'Jaket Gunung'),
(88, 'Jaket Gunung Pria Softshell Ci', 429000, 'uploads/6765fbac61dd36.45739455.jpg', NULL, 'Jaket Gunung'),
(89, 'Jaket Gunung Zarventure Puffer', 153900, 'uploads/6765fbd25c3d49.14570958.jpg', NULL, 'Jaket Gunung'),
(90, 'Markicabs - Chayi Windbreaker ', 487000, 'uploads/6765fbffd09f53.67690868.jpg', NULL, 'Jaket Gunung'),
(91, 'Markicabs - Deet V-Limeted Dac', 407000, 'uploads/6765fc490fe5f0.61354617.jpg', NULL, 'Jaket Gunung'),
(93, 'jaket gunung', 200000, 'uploads/6766725ef40876.16528156.jpg', NULL, 'Jaket Gunung');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `oauth_provider` enum('local','google') DEFAULT 'local',
  `profile_picture` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `info` text DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `oauth_provider`, `profile_picture`, `bio`, `info`, `role`, `address`, `phone`, `city`, `postal_code`) VALUES
(44, 'M. Reno Hidayat', 'hidayatreno085@gmail.com', '$2y$12$DaTi91cZV7.Jsu385/lL3OEGTc3Nfs5PTG5YpHWshJsNHjrLfuyPy', 'google', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(47, 'Ren Hy', 'onerhidayat@gmail.com', NULL, 'google', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(48, 'reno', 'reno@gmail.com', '$2y$12$SfQNnjDmW92J3SjqV29ITuJ9gBaBGoqPZTEON9qMCiwwHSMQQrcMK', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(49, 'poke', 'reno11@gmail.com', '$2y$12$nhV/iVIrh0c9wKdzTZsHGe6SuYaX8KfiTuaMPVHXJjsGb9grNEvsm', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(50, 'zzzz', 'janak@gmail.com', '$2y$12$7C51OXVTrYLjnnWlC8dXXu3/fqqO9RY9igP2v.8S/WSCo8pndhuSi', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(51, 'M. Reno Hidayat', '220660121005@student.unsap.ac.id', NULL, 'google', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(52, 'Admin User', 'admin@gmail.com', 'hashed_password', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(54, 'renoadmin', 'adminreno@gmail.com', '$2y$12$lmfYb4pjPsAF30aFDX00AeQe4waL1AXyPlYh1QZL5uq4CNZyCxcE2', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(55, 'Reno', 'adminreno1@gmail.com', '$2y$12$R1kBbpUOniUmM9UMRrxxuuvatvnuOeVggcB70ygyK7CUWNU4gkQTW', 'local', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL),
(56, 'heyreno', 'yogi@gmail.com', '$2y$10$FYB5b6Mudv1uZbirz1M5C.qSyQwemCQ9vHiysOutiHuD4klg/ez3.', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(57, 'osewa', 'osewa@gmail.com', '$2y$12$Tsnv8CsAvbgA41W49NE4SOCmRtQvaPoGSDc7WRXHQXe5sa.tYo1wq', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(58, 'joko', 'hidayatw@gmail.com', '$2y$10$Rik3oZD6nwmGyBvqdGEpqOjGuy6mXJvXV8W5Bw2cG.NArmzbg6PFS', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(59, 'joko', 'hidayatq@gmail.com', '$2y$10$HmZNK8ZbYY21Hgiy39/ry.RI1amW/n8okvoYj4KVugxwhHDlm2hcK', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL),
(60, 'kimay', 'soktau@gmail.com', '$2y$10$mfZed3u/MnggNWpJHZ2LSe6ZaCL/TW.lFxTEh1s7CDnqQDCCMKYdi', 'local', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `status` enum('Added To Cart','Confirmed') NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_products`
--

INSERT INTO `users_products` (`id`, `user_id`, `item_id`, `status`, `price`, `quantity`, `product_id`) VALUES
(11, 67, 6, 'Confirmed', NULL, 1, 0),
(17, 67, 1, 'Confirmed', NULL, 1, 0),
(18, 67, 5, 'Confirmed', NULL, 1, 0),
(19, 67, 6, 'Confirmed', NULL, 1, 0),
(20, 67, 1, 'Confirmed', NULL, 1, 0),
(23, 67, 1, 'Confirmed', NULL, 1, 0),
(24, 67, 2, 'Confirmed', 25.00, 1, 0),
(25, 67, 9, 'Confirmed', NULL, 1, 0),
(27, 48, 1, 'Confirmed', NULL, 1, 0),
(32, 48, 2, 'Confirmed', 25.00, 1, 0),
(33, 48, 8, 'Confirmed', NULL, 1, 0),
(34, 48, 16, 'Confirmed', NULL, 1, 0),
(35, 2147483647, 1, 'Added To Cart', NULL, 1, 0),
(36, 2147483647, 2, 'Added To Cart', 25.00, 1, 0),
(37, 2147483647, 4, 'Added To Cart', NULL, 1, 0),
(38, 2147483647, 2, 'Added To Cart', 25.00, 1, 0),
(39, 2147483647, 15, 'Added To Cart', NULL, 1, 0),
(40, 50, 1, 'Confirmed', NULL, 1, 0),
(41, 48, 1, 'Confirmed', NULL, 1, 0),
(42, 48, 4, 'Confirmed', NULL, 1, 0),
(45, 48, 1, 'Confirmed', NULL, 1, 0),
(47, 44, 5, 'Confirmed', NULL, 1, 0),
(48, 44, 3, 'Confirmed', NULL, 1, 0),
(49, 44, 2, 'Confirmed', 25.00, 1, 0),
(51, 51, 13, 'Confirmed', NULL, 1, 0),
(52, 48, 11, 'Confirmed', NULL, 1, 0),
(53, 48, 1, 'Confirmed', NULL, 1, 0),
(54, 55, 17, 'Confirmed', NULL, 1, 0),
(58, 55, 21, 'Confirmed', 311802.00, 1, 0),
(59, 55, 29, 'Confirmed', 22222.00, 1, 0),
(65, 48, 25, 'Confirmed', NULL, 1, 0),
(67, 48, NULL, 'Confirmed', NULL, 1, 28),
(68, 48, NULL, 'Confirmed', NULL, 1, 28),
(69, 48, NULL, 'Confirmed', NULL, 1, 29),
(70, 48, NULL, 'Confirmed', NULL, 1, 29),
(71, 48, NULL, 'Confirmed', NULL, 1, 29),
(72, 48, NULL, 'Confirmed', NULL, 1, 29),
(73, 48, NULL, 'Confirmed', NULL, 1, 29),
(74, 48, NULL, 'Confirmed', NULL, 1, 29),
(75, 48, NULL, 'Confirmed', NULL, 1, 29),
(86, 44, NULL, 'Confirmed', NULL, 1, 25),
(87, 44, NULL, 'Confirmed', NULL, 1, 30),
(88, 44, NULL, 'Confirmed', NULL, 1, 29),
(99, 48, NULL, 'Confirmed', NULL, 1, 45),
(100, 48, NULL, 'Confirmed', NULL, 1, 57),
(101, 48, NULL, 'Confirmed', NULL, 1, 64),
(103, 51, NULL, 'Confirmed', NULL, 1, 75),
(104, 51, NULL, 'Confirmed', NULL, 1, 75),
(105, 51, NULL, 'Confirmed', NULL, 1, 77),
(106, 51, NULL, 'Confirmed', NULL, 1, 33),
(107, 51, NULL, '', NULL, 1, 31),
(108, 51, NULL, '', NULL, 1, 31),
(109, 51, NULL, '', NULL, 1, 32),
(110, 51, NULL, '', NULL, 1, 36),
(111, 51, NULL, '', NULL, 1, 32),
(112, 51, NULL, '', NULL, 1, 31),
(116, 51, NULL, 'Confirmed', NULL, 1, 82),
(117, 48, NULL, 'Confirmed', NULL, 1, 38),
(118, 48, NULL, 'Confirmed', NULL, 1, 32),
(120, 55, NULL, 'Confirmed', NULL, 1, 46),
(121, 55, NULL, 'Confirmed', NULL, 1, 48),
(122, 44, NULL, 'Confirmed', NULL, 1, 46),
(123, 44, NULL, 'Confirmed', NULL, 1, 48),
(124, 55, NULL, 'Added To Cart', NULL, 1, 32),
(125, 56, NULL, 'Confirmed', NULL, 1, 62),
(126, 56, NULL, 'Confirmed', NULL, 1, 63),
(127, 56, NULL, 'Confirmed', NULL, 1, 49),
(128, 56, NULL, '', NULL, 1, 32),
(129, 56, NULL, 'Confirmed', NULL, 1, 31),
(130, 56, NULL, '', NULL, 1, 31),
(131, 56, NULL, '', NULL, 1, 31),
(132, 56, NULL, '', NULL, 1, 31),
(133, 56, NULL, '', NULL, 1, 48),
(134, 56, NULL, '', NULL, 1, 51),
(135, 48, NULL, '', NULL, 1, 31),
(136, 48, NULL, '', NULL, 1, 48),
(139, 59, NULL, '', NULL, 1, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
