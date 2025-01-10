-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 07:34 AM
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
-- Database: `futsal_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` varchar(10) NOT NULL,
  `lapangan_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` enum('pending','confirmed','canceled') DEFAULT 'pending',
  `total_harga` double DEFAULT NULL,
  `metode_pembayaran` enum('transfer') NOT NULL DEFAULT 'transfer',
  `bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `lapangan_id`, `member_id`, `tanggal`, `jam`, `status`, `total_harga`, `metode_pembayaran`, `bank`, `no_rekening`, `bukti_pembayaran`, `created_at`) VALUES
('KB0001', 12, 1, '2025-01-21', '18:30:00', 'pending', 0, 'transfer', '', '', NULL, '2025-01-08 13:45:26'),
('KB0002', 12, 1, '2025-01-15', '16:00:00', 'pending', 0, 'transfer', '', '', NULL, '2025-01-08 14:02:47'),
('KB0003', 12, 1, '2025-01-15', '16:00:00', 'pending', 0, 'transfer', '', '', NULL, '2025-01-08 14:02:58'),
('KB0004', 14, 4, '2025-01-21', '16:00:00', 'pending', 0, 'transfer', '', '', NULL, '2025-01-08 15:04:14'),
('KB0005', 13, 4, '2025-01-29', '16:40:00', 'pending', 0, 'transfer', '', '', NULL, '2025-01-08 15:22:25'),
('KB0006', 14, 4, '2025-01-15', '14:25:00', 'pending', 0, 'transfer', '', '', NULL, '2025-01-08 15:23:11'),
('KB0007', 13, 4, '2025-01-14', '00:10:00', 'pending', 110000, 'transfer', '', '', NULL, '2025-01-08 15:26:56'),
('KB0008', 13, 4, '2025-01-15', '02:20:00', 'pending', 110000, 'transfer', '', '', NULL, '2025-01-08 15:35:52'),
('KB0009', 14, 4, '2025-01-15', '02:45:00', 'pending', 135000, 'transfer', '', '', NULL, '2025-01-08 15:41:10'),
('KB0010', 14, 4, '2025-01-13', '04:45:00', 'pending', 45000, 'transfer', '', '', NULL, '2025-01-08 15:43:35'),
('KB0011', 13, 4, '2025-01-13', '11:50:00', 'pending', 110000, 'transfer', '', '', NULL, '2025-01-08 23:51:49'),
('KB0012', 13, 4, '2025-01-15', '11:00:00', 'pending', 55000, 'transfer', '', '', NULL, '2025-01-08 23:55:22'),
('KB0013', 14, 4, '2025-02-05', '13:00:00', 'pending', 90000, 'transfer', '', '', NULL, '2025-01-09 00:04:56'),
('KB0014', 13, 4, '2025-01-16', '13:08:00', 'pending', 55000, 'transfer', '', '', NULL, '2025-01-09 00:08:18'),
('KB0015', 13, 4, '2025-01-14', '13:19:00', 'pending', 110000, 'transfer', '', '', NULL, '2025-01-09 00:14:03'),
('KB0016', 13, 4, '2025-02-12', '13:22:00', 'pending', 55000, 'transfer', '', '', NULL, '2025-01-09 00:17:07'),
('KB0017', 13, 4, '2025-02-12', '10:21:00', 'pending', 55000, 'transfer', '', '', NULL, '2025-01-09 00:18:42'),
('KB0018', 14, 4, '2025-01-31', '12:26:00', 'pending', 90000, 'transfer', '', '', NULL, '2025-01-09 00:21:49'),
('KB0019', 13, 4, '2025-02-05', '10:25:00', 'pending', 110000, 'transfer', '', '', NULL, '2025-01-09 00:22:31'),
('KB0020', 15, 1, '2025-01-10', '09:00:00', 'pending', 100000, 'transfer', '', '', NULL, '2025-01-09 12:41:11'),
('KB0021', 15, 1, '2025-01-11', '09:00:00', 'pending', 100000, 'transfer', '', '', NULL, '2025-01-09 12:43:07'),
('KB0022', 15, 1, '2025-01-10', '09:00:00', 'pending', 100000, 'transfer', '', '', NULL, '2025-01-09 13:08:23'),
('KB0023', 15, 1, '2025-01-10', '10:00:00', '', 100000, 'transfer', '', '', '../upload/bukti_pembayaran/677ff02b06a68.png', '2025-01-09 13:10:11'),
('KB0024', 15, 1, '2025-01-16', '13:00:00', '', 100000, 'transfer', '', '', '../upload/bukti_pembayaran/677fec7a438df.jpg', '2025-01-09 15:28:43'),
('KB0025', 15, 1, '2025-01-12', '13:05:00', '', 200000, 'transfer', '', '', '../upload/bukti_pembayaran/677ff48c8e013.png', '2025-01-09 16:02:01'),
('KB0026', 15, 1, '2025-01-14', '17:00:00', '', 200000, 'transfer', '', '', '../upload/bukti_pembayaran/677ffea0c2806.png', '2025-01-09 16:17:23'),
('KB0027', 15, 8, '2025-01-18', '17:00:00', '', 200000, 'transfer', '', '', '../upload/bukti_pembayaran/678000ff47e56.jpg', '2025-01-09 17:01:30'),
('KB0028', 15, 8, '2025-01-14', '02:07:00', '', 400000, 'transfer', '', '', '../upload/bukti_pembayaran/6780018c9d42f.jpg', '2025-01-09 17:03:42'),
('KB0029', 15, 1, '2025-01-12', '10:05:00', '', 300000, 'transfer', '', '', '../upload/bukti_pembayaran/678064539137f.jpg', '2025-01-10 00:03:04'),
('KB0030', 18, 1, '2025-01-11', '09:00:00', '', 10000, 'transfer', '', '', '../upload/bukti_pembayaran/6780913470201.jpg', '2025-01-10 03:16:46'),
('KB0031', 18, 1, '2025-01-16', '11:43:00', '', 30000, 'transfer', '', '', '../upload/bukti_pembayaran/678097529930d.jpg', '2025-01-10 03:42:55'),
('KB0032', 16, 13, '2025-01-11', '09:00:00', '', 85000, 'transfer', '', '', '../upload/bukti_pembayaran/67809a4e93c71.jpg', '2025-01-10 03:55:36'),
('KB0033', 16, 1, '2025-01-11', '09:00:00', '', 85000, 'transfer', '', '', '../upload/bukti_pembayaran/6780b8558d0e1.jpg', '2025-01-10 06:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `tanggal_tambah` timestamp NOT NULL DEFAULT current_timestamp(),
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama_lapangan`, `lokasi`, `harga`, `operator_id`, `tanggal_tambah`, `deskripsi`, `foto`) VALUES
(15, 'OKI FUTSAL FIELD', 'Sumedang Angkrek', 100000.00, 3, '2025-01-09 11:23:53', 'Fasilitas : lapang indoor interlock sintetis, kamar mandi, kantin, jaring baru, standar internasional WA : 089912361521', 'gorMs.jpg'),
(16, 'ADI FUTSAL FIELD', 'Cimalaka, Sumedang', 85000.00, 2, '2025-01-09 17:10:54', 'Fasilitas : lapang rumput sintetis, kamar mandi, kantin, jaring baru, Lapang standar internasional         WA : 082117615234', 'gorGending.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('member','operator','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `foto`) VALUES
(1, 'budi', 'budi00@gmail.com', '$2y$10$jBl9m/EBwqM5hq4021Tb2.d7wlx7MLkmUoEF6vL1ca6CXai0rhMv.', 'member', '2025-01-06 12:46:26', NULL),
(2, 'adi', 'adi@gmail.com', '$2y$10$wvCyso0T7oSla7lmlou04uaiEXmbMI2E3VXqNjau1L0E.KqQHd9aO', 'operator', '2025-01-06 13:45:23', NULL),
(3, 'oki', 'oki@gmail.com', '$2y$10$sm30z72bb7xt8y9NjYytIOGWoCPHKcGGBJGrkAm/GGqbFi4AFCIZa', 'operator', '2025-01-06 14:05:07', NULL),
(4, 'agus', 'agus@gmail.com', '$2y$10$4uUrz/3rB9aLH8/Y5puTBuG03GwBLiJsSCbVknVj6d43keJ1M3mta', 'member', '2025-01-08 14:18:27', NULL),
(5, 'udin', 'waludin@gmail.com', '$2y$10$DkiiCAxLwW2kl5uyVG7p.OKtRjBKeAs9yhHvRaqyRiFdVyTTu7aa2', 'admin', '2025-01-09 00:47:29', NULL),
(7, 'opik', 'opik@gmail.com', '$2y$10$K6M0DMeDlS9LkM9I1ZtvP.Ll/9da8J5tqlfCwhsvDfR2.xgyB1AhC', 'admin', '2025-01-09 15:42:26', NULL),
(8, 'Dafa', 'dafa@gmail.com', '$2y$10$3s1SEMytOLZ7oNQg0Rkvj.4S3qRNmTFiGFlMLGkeSivFTR3NGtarG', 'member', '2025-01-09 17:00:05', NULL),
(10, 'oke', 'oke@gmail.com', '$2y$10$rh37zQAqrwmppO8Pfhc5Aelfo8P9w5HM0yCN2qdMcxlmGPKvxemoC', 'operator', '2025-01-10 00:18:21', NULL),
(12, 'fajar', 'fajar@gmail.com', '$2y$10$xI3/6gqLPIOr3CCUS4raYeCNi5CiBATEYjZinib6o0ioIb3s3G2u.', 'operator', '2025-01-10 03:52:14', NULL),
(13, 'uqi', 'uqi@gmail.com', '$2y$10$zpYIWrDBP1lnFbxGETMHUOLZR2u6HhNLkB93oIotKGktpfB1MLFPe', 'member', '2025-01-10 03:53:18', NULL),
(14, 'jj', 'jj@gmail.com', '$2y$10$4ekvpIhMAYUEl1ed8TTqPOmkOKdm9NlXwD9hZ7b6mij6hzKlMu05S', 'member', '2025-01-10 06:08:03', NULL),
(15, 'aa', 'aa@gmail.com', '$2y$10$f4IT5gKukj1XGv4itL.Xb./JvLqc2Ypi0OjrPuyBh6VtLAtchVFwi', 'member', '2025-01-10 06:12:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operator_id` (`operator_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
