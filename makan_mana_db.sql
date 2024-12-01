CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Des 2024 pada 04.36
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
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `kategori_menu` enum('makanan berat','makanan ringan','minuman') NOT NULL,
  `url_gambar_menu` text DEFAULT NULL,
  `id_restoran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `kategori_menu`, `url_gambar_menu`, `id_restoran`) VALUES
(5, 'Ayam Neraka', 20005, 'makanan berat', 'https://blogunik.com/wp-content/uploads/2018/12/Suicide-Chicken.jpg', 5),
(7, 'Es Teler Durian Large', 25000, 'minuman', 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/52b2b565-2462-4de9-a5dd-fbd567a9d422_Go-Biz_20240110_191649.jpeg', 6),
(8, 'Mie Hompimpa', 10000, 'makanan ringan', 'https://cdn.antaranews.com/cache/1200x800/2024/07/12/mie-gacoan.jpg', 7),
(9, 'Udang Rambutan', 9500, 'makanan ringan', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//104/MTA-91882454/brd-44261_mie-gacoan_full09.jpg', 7),
(11, 'Pancong Lumer', 13000, 'makanan ringan', 'https://cdn.idntimes.com/content-images/post/20221206/screenshot-616-6960b8ee2966dd22b86e90e2dfe9fd57_600x400.png', 6),
(13, 'Es Pisang Ijo', 15000, 'minuman', 'https://img.freepik.com/premium-photo/es-pisang-ijo-traditional-dessert-from-makassar-south-sulawesi-indonesia-made-from-banana_583400-949.jpg', 8),
(14, 'Bakso tanpa tepung', 25000, 'makanan berat', 'https://th.bing.com/th/id/OIP.nvIGCSnyGhtZywZ_Ni_wBwHaEv?rs=1&pid=ImgDetMain', 5),
(15, 'Dimsum', 25000, 'makanan ringan', 'https://th.bing.com/th/id/OIP.n_smBgZ4k1wMEbln-1yingAAAA?w=320&h=240&rs=1&pid=ImgDetMain', 7),
(16, 'Siomay & Batagor', 10000, 'makanan ringan', 'https://th.bing.com/th/id/OIP.vwa3PdK8y3NxQiyzx5HivQHaEE?rs=1&pid=ImgDetMain', 3),
(17, 'Es Teh Jumbo', 3000, 'minuman', 'https://th.bing.com/th/id/OIP.M3qEwsSH7ngMrPC0gwgPDgHaHa?rs=1&pid=ImgDetMain', 7),
(18, 'eee', 2323, 'makanan ringan', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXttoXGaDe_99pd5l2hDcMVLzwY-51WNFmiw&s', 7),
(19, 'jj', 99, 'minuman', 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/19/rawon-cak-wot-kumis-malang-772318276.jpg', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `link_maps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`) VALUES
(3, 'maulana1', '$2y$12$SHa43CuqLnl294CQOHa.4e1zj7iVq6IIYgrpHqDTuwfyTNbrGhkIe', 'Panggil Saja Lana'),
(5, 'admin_rorawr', '$2y$12$aaiC8lZJteQdLHRWUt8jpe6AQtE5bjf5Xm.dNUjM9I/BShxbqpIKy', 'Aurora Nisa Kusyanto'),
(6, 'rizwanganteng', '$2y$12$twZm.CxbEE3XEznMq/DoueE1TdtLN38XtcmZqBrhK6ecyxhrjvGRy', 'Rizwanda Keysha Cahya Putra'),
(7, 'kunkunasu', '$2y$12$JTjfulZtv2RS5.dq8afUROaCFMvxNHf.P2AkeNz6GSRzYv1UOv5jC', 'Maulana Kunjati');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
