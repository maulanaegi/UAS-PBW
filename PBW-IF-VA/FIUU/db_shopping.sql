-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 02:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('unpaid','paid') DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `product_id`, `user_id`, `quantity`, `status`, `created_at`) VALUES
(22, 28, 1, 1, 'unpaid', '2025-01-09 13:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `stock`, `image`, `created_at`) VALUES
(15, 'Meja', 'Meja kecil', 90000, '12', '1736428244-th (4).jpeg', '2025-01-09 13:10:44'),
(16, 'Meja', 'Meja Belajar', 200000, '12', '1736428306-th (5).jpeg', '2025-01-09 13:11:46'),
(17, 'Meja', 'Meja Kantor', 1200000, '20', '1736428446-meja.jpeg', '2025-01-09 13:14:06'),
(18, 'Kursi', 'Kursi Kayu Jati', 250000, '10', '1736428499-th (6).jpeg', '2025-01-09 13:14:59'),
(20, 'Kursi', 'Kursi Kantor', 450000, '17', '1736428575-th (8).jpeg', '2025-01-09 13:16:15'),
(21, 'Sofa', 'Sofa Ruang Tamu', 8000000, '4', '1736428680-th (10).jpeg', '2025-01-09 13:18:00'),
(22, 'Sofa', 'Sofa Modren', 10000000, '24', '1736428727-th (9).jpeg', '2025-01-09 13:18:47'),
(23, 'Sofa', 'Sofa tidor', 25000000, '2', '1736428779-th (11).jpeg', '2025-01-09 13:19:39'),
(24, 'Kursi', 'Kursi plastik', 40000, '24', '1736428851-th (7).jpeg', '2025-01-09 13:20:51'),
(27, 'Lemari', 'Lemari Kantor', 700000, '5', '1736429254-th (12).jpeg', '2025-01-09 13:27:34'),
(28, 'Lemari', 'Lemari Baju', 4000000, '16', '1736429292-th (13).jpeg', '2025-01-09 13:28:12'),
(29, 'Lemari', 'Lemari Besi', 5000000, '3', '1736429353-th (14).jpeg', '2025-01-09 13:29:13'),
(30, 'Tidur', 'Tempat Tidur King', 30000000, '23', '1736429451-th (15).jpeg', '2025-01-09 13:30:51'),
(31, 'Tidur', 'Tempat Tidur Tingkat', 3000000, '23', '1736429521-th (16).jpeg', '2025-01-09 13:32:01'),
(32, 'Tidur', 'Tempat tidur anak', 4000000, '6', '1736429568-th (17).jpeg', '2025-01-09 13:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'muhammadrendykrisna@gmail.com', 'Rendy', '$2y$10$i2xPgcm63WGIWmG7D8yinuEp5azXuWZG.iIJ1qbDxjwIOvD/zOVYy', 'user'),
(2, 'admin@gmail.com', 'Rendy2005', '$2y$10$7Pl10WWarBnHhxJNlsN7oODsoOd7I5QiZx.Y3BB3DXky.4lwuRBdu', 'user'),
(3, 'rendyrahma@gmail.com', 'Rendy123', '$2y$10$LMM1LCDKfgeCosCZgT5Fj.Dwsao5jWyiP0xet2J0DYXOSSjM2EEQ2', 'user'),
(4, 'rahmaariani3@gmail.com', 'Rendy', '$2y$10$vGYSutTvCCgMyvTVozeBY.B1ZN3iCIRYAafNjz3fNGcc/CTM/PtCy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `checkouts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
