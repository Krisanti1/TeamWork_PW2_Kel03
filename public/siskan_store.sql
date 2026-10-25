-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2026 at 05:29 AM
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
-- Database: `siskan_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `kategori`, `harga`, `deskripsi`, `gambar`, `created_at`) VALUES
(2, 'Tahu Goreng Crispy', 'Cemilan', 5000, 'Tahu goreng renyah gurih disajikan hangat dengan sambal kecap.', '/uploads/f45db35dffc4a899bea269319613dd48.jpg', '2026-10-25 04:02:00'),
(3, 'Nasi Goreng Spesial', 'Makanan', 15000, 'Nasi goreng dengan bumbu khas, telur dadar, dan kerupuk renyah.', '/uploads/07af8edb928793da46f54be484fbaa97.jpg', '2026-10-25 04:03:00'),
(4, 'Ayam Geprek Sambal Korek Ayam', 'Makanan', 15000, 'krispi digeprek dengan sambal korek pedas mantap + nasi.', '/uploads/2d46099daa199b5313c2c0a9a07d1626.jpg', '2026-10-25 04:04:08'),
(5, 'Mie Goreng Kantin', 'Makanan', 10000, 'Mie goreng lezat dengan pilihan telur ceplok atau dadar.', '/uploads/609bc6c80c34080141986d75ebb0fb36.jpg', '2026-10-25 04:15:47'),
(6, 'Bakso Kuah Sapi Bakso', 'Makanan', 12000, 'daging sapi kenyal dengan kuah kaldu hangat dan bihun.', '/uploads/ef930376b259e3e9205191264391a043.jpg', '2026-10-25 04:16:37'),
(7, 'Soto Ayam Madura', 'Makanan', 15000, 'Soto ayam berkuah kuning gurih segar lengkap dengan koya dan nasi.', '/uploads/11c1c3bd26a8bc44957a492f86535b0e.jpg', '2026-10-25 04:17:39'),
(8, 'Es Teh Manis', 'Minuman', 5000, 'Es teh segar dingin pelepas dahaga setelah kuliah.', '/uploads/17fd8b0c76ed5a7655676e2f7ddf7cbb.jpg', '2026-10-25 04:18:40'),
(9, 'Es Jeruk Peras', 'Minuman', 7000, 'Sari jeruk asli peras kaya vitamin C, asam manis segar.', '/uploads/c067e138096ae64e17ab425e1401dde4.jpg', '2026-10-25 04:19:43'),
(10, 'Kopi Hitam / Susu', 'Minuman', 10000, 'Seduhan kopi nikmat penahan kantuk saat nugas.', '/uploads/7c836e7a41dfd459cd977f6bbc9d1e65.jpg', '2026-10-25 04:20:32'),
(11, 'Matcha Latte Ice', 'Minuman', 8000, 'Minuman matcha hijau creamy dan manis dingin penambah semangat.', '/uploads/c04d2eb45fb80e5e91d140c237af3b5c.jpg', '2026-10-25 04:21:20'),
(12, 'Roti Bakar Cokelat Keju', 'Cemilan', 10000, 'Roti bakar empuk isi topping cokelat lumer dan parutan keju.', '/uploads/68b3f8836e20205c92ee10224b9559ad.jpg', '2026-10-25 04:22:14'),
(13, 'Pisang Cokelat Lumer', 'Cemilan', 8000, 'Pisang cokelat goreng crispy dengan keju dan saus cokelat.', '/uploads/6be5f4a54a67338bab82f3052fa78313.jpg', '2026-10-25 04:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `created_at`) VALUES
(2, 'Administrator', 'admin', '$2y$10$wN1Sg4JjB4gHwL4.7GzS.uC3a0uC6Y2dY0a9M3b4c5d6e7f8g9h0i', 'admin', '2026-10-24 07:15:56'),
(3, 'Admin Kantin', 'Admin Yuli', '$2y$10$7WxpIvj2DaRE9LeTd1aHDO1TufFc8V7kmG2MVMutjqlY3YHxPl6XS', 'admin', '2026-10-24 07:18:52'),
(4, 'putri', 'ri', '$2y$10$LEcKPiGkXSwm/ZLSR78Hj.PI3ujH6AQi.QdB5is7XnlIWGhzgASJu', 'user', '2026-10-24 07:30:03');

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
