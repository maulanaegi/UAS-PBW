-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 04:06 PM
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
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stok` int(5) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama`, `jenis`, `merk`, `harga`, `tgl_masuk`, `deskripsi`, `stok`, `foto`) VALUES
('BR001', 'Kopi Hitam', 'Minuman', 'Kapal Api', '17,500', '2024-12-25', 'Ready', 40, 'kopihitam.jpeg'),
('BR002', 'Gula Pasir', 'Bahan Pokok', 'Gulaku', '20.000', '2025-01-30', 'Ready', 200, 'gulaku.jpeg'),
('BR003', 'Terigu', 'Bahan Pokok', 'Segitiga Biru', '20.000', '2025-01-02', 'Ready', 140, 'Terigu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nim` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nim`, `username`, `email`, `password`, `name`, `foto`) VALUES
('220660121096', 'raka', 'raka@gmail.com', 'raka', 'raka', 'default.svg'),
('-', 'Admin', 'admin@gmail.com', 'admin', 'Admin Stok', 'default.svg'),
('220660121073', 'refan', 'refan@gmail.com', 'refan', 'refan', 'default.svg'),
('220660121002', 'reza', 'reza@gmail.com', 'reza', 'reza', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
