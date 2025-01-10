-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 04:14 AM
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
-- Database: `tokojersey`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `created` date NOT NULL,
  `nama_image` varchar(50) NOT NULL,
  `type_image` varchar(50) NOT NULL,
  `size_image` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `deskripsi`, `harga`, `stok`, `created`, `nama_image`, `type_image`, `size_image`) VALUES
(1, 'Jersey Mars Fc 24/25', 200000, 10, '2025-01-09', 'Mars Fc.png', 'image/png', 197461),
(2, 'Jersey FTI 23/24', 135000, 50, '2025-01-10', 'Informatika Hitam.png', 'image/png', 80986),
(3, 'Jersey Perses 22/23', 120000, 50, '2025-01-10', 'Perses.png', 'image/png', 72217),
(4, 'Jersey Sauyunan 23/24', 135000, 100, '2025-01-10', 'sauyunan.png', 'image/png', 226471),
(5, 'Jersey FTI 22/23', 130000, 50, '2025-01-10', 'Informatika Kuning.png', 'image/png', 119062),
(6, 'Jersey Sauyunan 22/23', 145000, 100, '2025-01-10', 'Putih_Hitam.png', 'image/png', 99827),
(7, 'Jersey Persib 24/25', 130000, 50, '2025-01-10', 'PERSIB_JERSEY_.png', 'image/png', 259116),
(9, 'Jersey Keeper Sauyunan', 135000, 50, '2025-01-10', 'Keeper_Sauyunan.png', 'image/png', 204315);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `qty` int(50) NOT NULL,
  `kurir` varchar(15) NOT NULL,
  `date_in` date NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `qty` int(50) NOT NULL,
  `kurir` varchar(15) NOT NULL,
  `date_in` date NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_user`, `id_barang`, `ukuran`, `qty`, `kurir`, `date_in`, `total`) VALUES
(16, 4, 5, 'L', 1, 'JNE', '2018-01-01', 130000),
(17, 4, 6, 'M', 1, 'TIKI', '2018-01-01', 145000),
(19, 2, 9, 'M', 2, 'JNE', '2018-01-01', 270000),
(20, 3, 7, 'M', 2, 'KILAT', '2018-01-02', 260000),
(21, 5, 7, 'XL', 3, 'JNE', '2018-01-02', 390000),
(22, 5, 2, 'L', 2, 'SICEPAT', '2018-01-02', 270000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(100) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(6) NOT NULL,
  `password` varchar(6) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` text NOT NULL,
  `title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nama_lengkap`, `email`, `username`, `password`, `alamat`, `no_hp`, `title`) VALUES
(1, 'Admin Well', 'wellkeun9@gmail.com', 'admin', 'admin', 'Unsap', '08266757446', 'admin'),
(2, 'Wildan Taufik', 'idanwell@gmail.com', 'Idan', 'pookie', 'Darmaraja', '082177654231', 'user'),
(3, 'Syauqi zn', 'syauqithea@gmail.com', 'Dople', 'rxking', 'Cimalaka', '088008800880', 'user'),
(4, 'Radhi R', 'radigaming@gmail.com', 'Azril', 'barber', 'Bendungan', '086232145423', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
