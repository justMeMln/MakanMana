-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 10:35 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makan_mana_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin_rizwan', 'e524a61fab5015a2563cbc5cf6ee926e', '2024-11-25 09:56:17', '2024-11-25 09:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `kategori_menu` enum('makanan berat','makanan ringan','minuman') NOT NULL,
  `url_gambar_menu` text DEFAULT NULL,
  `id_restoran` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `kategori_menu`, `url_gambar_menu`, `id_restoran`, `review`, `created_at`, `updated_at`) VALUES
(1, 'Rawon suhat', 12000, 'makanan ringan', 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/19/rawon-cak-wot-kumis-malang-772318276.jpg', 1, NULL, '2024-11-25 09:03:06', '2024-11-25 10:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` varchar(255) NOT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `nama_restoran`, `provinsi`, `kota`, `kecamatan`, `desa`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'RM Roda Baru', 'Jawa Timur', 'Malang', 'Lowokwaru', 'Sumbersari', 'Jl. Bendungan Sutami No.53, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', '2024-11-25 09:01:36', '2024-11-25 09:01:36'),
(3, 'Rawon Cak Wot', NULL, NULL, NULL, NULL, 'Jl. Soekarno Hatta No.9-21, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '2024-11-25 10:00:49', '2024-11-25 10:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `preferensi_menu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
