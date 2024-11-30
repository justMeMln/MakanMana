-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Nov 2024 pada 08.22
-- Versi server: 11.5.2-MariaDB
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin_rizwan', 'e524a61fab5015a2563cbc5cf6ee926e', '2024-11-25 09:56:17', '2024-11-25 09:57:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
); ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `kategori_menu`, `url_gambar_menu`, `id_restoran`, `review`, `created_at`, `updated_at`) VALUES
(4, 'Rawon suhat', 12000, 'makanan berat', 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/19/rawon-cak-wot-kumis-malang-772318276.jpg', 3, NULL, '2024-11-25 13:59:47', '2024-11-25 13:59:47'),
(5, 'Ayam Neraka', 20000, 'makanan berat', 'https://blogunik.com/wp-content/uploads/2018/12/Suicide-Chicken.jpg', 5, NULL, '2024-11-27 16:11:10', '2024-11-27 16:11:46'),
(7, 'Es Teler Durian Large', 25000, 'minuman', 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/52b2b565-2462-4de9-a5dd-fbd567a9d422_Go-Biz_20240110_191649.jpeg', 6, NULL, '2024-11-27 18:05:35', '2024-11-28 13:25:04'),
(8, 'Mie Hompimpa', 10000, 'makanan ringan', 'https://cdn.antaranews.com/cache/1200x800/2024/07/12/mie-gacoan.jpg', 7, NULL, '2024-11-27 18:22:34', '2024-11-27 18:22:34'),
(9, 'Udang Rambutan', 9500, 'makanan ringan', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//104/MTA-91882454/brd-44261_mie-gacoan_full09.jpg', 7, NULL, '2024-11-27 18:23:51', '2024-11-27 18:23:51'),
(10, 'Kawa-Kawa Anggur Hijau', 77000, 'minuman', 'https://down-id.img.susercontent.com/file/7d171f6fc2613c4e16970bb15144dbf1', 8, NULL, '2024-11-27 18:32:25', '2024-11-28 13:24:53'),
(11, 'Pancong Lumer', 13000, 'makanan ringan', 'https://cdn.idntimes.com/content-images/post/20221206/screenshot-616-6960b8ee2966dd22b86e90e2dfe9fd57_600x400.png', 6, NULL, '2024-11-28 14:53:19', '2024-11-28 14:53:19'),
(12, 'Rice bowl', 15000, 'makanan berat', 'https://th.bing.com/th/id/OIP.sSAiNiit7tfQLFVrHEGsggHaJQ?rs=1&pid=ImgDetMain', 3, NULL, '2024-11-28 14:53:58', '2024-11-28 14:53:58'),
(13, 'Es Pisang Ijo', 15000, 'minuman', 'https://img.freepik.com/premium-photo/es-pisang-ijo-traditional-dessert-from-makassar-south-sulawesi-indonesia-made-from-banana_583400-949.jpg', 8, NULL, '2024-11-28 14:54:51', '2024-11-29 07:46:39'),
(14, 'Bakso tanpa tepung', 25000, 'makanan berat', 'https://th.bing.com/th/id/OIP.nvIGCSnyGhtZywZ_Ni_wBwHaEv?rs=1&pid=ImgDetMain', 5, NULL, '2024-11-28 14:55:41', '2024-11-28 14:55:41'),
(15, 'Dimsum', 25000, 'makanan ringan', 'https://th.bing.com/th/id/OIP.n_smBgZ4k1wMEbln-1yingAAAA?w=320&h=240&rs=1&pid=ImgDetMain', 7, NULL, '2024-11-28 15:16:44', '2024-11-28 15:16:44'),
(16, 'Siomay & Batagor', 10000, 'makanan ringan', 'https://th.bing.com/th/id/OIP.vwa3PdK8y3NxQiyzx5HivQHaEE?rs=1&pid=ImgDetMain', 3, NULL, '2024-11-28 15:18:09', '2024-11-28 15:18:09'),
(17, 'Es Teh Jumbo', 3000, 'minuman', 'https://th.bing.com/th/id/OIP.M3qEwsSH7ngMrPC0gwgPDgHaHa?rs=1&pid=ImgDetMain', 7, NULL, '2024-11-28 15:19:44', '2024-11-28 15:19:44'),
(18, 'eee', 2323, 'makanan ringan', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXttoXGaDe_99pd5l2hDcMVLzwY-51WNFmiw&s', 7, NULL, '2024-11-29 10:50:04', '2024-11-29 10:50:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `link_maps` text NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `nama_restoran`, `alamat`, `link_maps`) VALUES
(3, 'Rawon Cak Wot', 'Jl. Soekarno Hatta No.9-21, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 'https://maps.app.goo.gl/ZrNjyjmc3T5D2XEy6'),
(5, 'Ayam Gepuk Pak Gembus - Sigura', 'Jl. Sigura - Gura No.2A, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 'https://maps.app.goo.gl/7tCq5WHrCb5iiNBr6'),
(6, 'Es Teler Sempat Sayang', 'Jl. Soekarno Hatta No.3, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 'https://maps.app.goo.gl/PPvJ5zauWLuZBzPK8'),
(7, 'Mie Gacoan - Jl. Jakarta', 'Jl. Jakarta No.16, RW.3, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113', 'https://maps.app.goo.gl/GykS5VprZzM4snwq9'),
(8, 'Nusantara Bar', 'Ruko Taman Niaga, Jl. Soekarno Hatta, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 'https://maps.app.goo.gl/1gvmxow7tZfyxVW8A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `preferensi_menu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `preferensi_menu`, `created_at`, `updated_at`) VALUES
(2, '12345', '1f32aa4c9a1d2ea010adcf2348166a04', 'Aurora Nisa Kusyanto', 'pancong', '2024-11-25 13:28:55', '2024-11-25 13:32:15'),
(3, 'maulana1', '$2y$12$SHa43CuqLnl294CQOHa.4e1zj7iVq6IIYgrpHqDTuwfyTNbrGhkIe', 'Panggil Saja Lana', NULL, '2024-11-27 09:42:11', '2024-11-29 07:26:11'),
(4, 'admin_T123', '$2y$12$V7QTf/0MK2JlVChRT7QaL.16OxbCOf8o75TIlOMB2dyGekBEs9TXq', 'King Barley', NULL, '2024-11-29 00:50:21', '2024-11-29 00:50:21'),
(5, 'admin_rorawr', '$2y$12$aaiC8lZJteQdLHRWUt8jpe6AQtE5bjf5Xm.dNUjM9I/BShxbqpIKy', 'Aurora Nisa Kusyanto', NULL, '2024-11-29 01:55:40', '2024-11-29 01:55:40'),
(6, 'rizwanganteng', '$2y$12$twZm.CxbEE3XEznMq/DoueE1TdtLN38XtcmZqBrhK6ecyxhrjvGRy', 'Rizwanda Keysha Cahya Putra', NULL, '2024-11-29 03:46:26', '2024-11-29 03:46:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
