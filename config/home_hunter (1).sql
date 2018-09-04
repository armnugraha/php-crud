-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jul 2018 pada 14.40
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_hunter`
--
CREATE DATABASE IF NOT EXISTS `home_hunter` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `home_hunter`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `tahun_dibangun` int(11) NOT NULL,
  `jml_lantai` int(11) NOT NULL,
  `jml_watt` int(11) NOT NULL,
  `description` text NOT NULL,
  `sertifikat` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `jml_garasi` int(11) NOT NULL,
  `jml_kmr_mandi` int(11) NOT NULL,
  `jml_kmr_tdr` int(11) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `sumber_air` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiredate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buildings`
--

INSERT INTO `buildings` (`id`, `user_id`, `title`, `luas_bangunan`, `luas_tanah`, `tahun_dibangun`, `jml_lantai`, `jml_watt`, `description`, `sertifikat`, `city`, `province`, `address`, `type`, `jml_garasi`, `jml_kmr_mandi`, `jml_kmr_tdr`, `fasilitas`, `price`, `sumber_air`, `img`, `created_at`, `updated_at`, `expiredate`) VALUES
(1, 1, 'Sewa Rumah', 100, 100, 2001, 1, 900, 'Sewa Kost Putra-Putri harga Rp250.000/bulan atau Rp2.700.000/tahun ', 'Hak Ibu Kost', 'Cimahi', 'Jawa Barat', 'Jalan Cipatoew no.88', 'sewa', 0, 1, 1, 'TV, Lemari, AC, Meja, Kasur Single, Kursi, Karpet', 250000, 'PDAM', 'teras-belakang-rumah-minimalis.jpg', '2018-07-08 07:43:54', '2018-07-08 07:43:54', '2018-07-29 07:43:54'),
(2, 2, 'RUMAH HITUNG TANAH BERADA DI BANDUNG TIMUR, Ujungberung, Bandung', 500, 875, 2016, 1, 900, 'DIJUAL RUMAH HITUNG TANAH BERADA DI BANDUNG TIMUR \r\nLOKASI STRATEGIS COCOK UNTUK BANK, KOSAN, KANTOR, TOKO\r\n\r\nSPESIFIKASI \r\nLuas Tanah 	:875m2\r\nLuas Bangunan	:500m2\r\nStatus	:SHM\r\nLantai	:1\r\nKamar Tidur	:4\r\nKamar Mandi	:4\r\nGarasi	:5\r\nCarport	:5\r\nHadap	:Utara\r\n\r\nFASILITAS\r\n- Izin Mendirikan Bangunan (IMB)\r\n- PBB\r\n- Taman \r\n- Listrik 900 watt\r\n- Air ( Jet Pump )\r\n\r\nSTRATEGIS \r\n- Tanah berada persis di mainroad Jl A.H Nasution\r\n- Lokasi tanah rapat atau menempel ke rencana pembangunan RS Santosa\r\n- Dekat dengan Fasilitas Pendidikan dan Universitas.\r\n- Dekat dengan Pusat Perbelanjaan dan Pusat Kuliner.\r\n\r\nHARGA : Rp.11.000.000/m2 \r\n\r\nBisa dibantu proses KPR. \r\n\r\nMore info call	: \r\nDEDI ARAB\r\n(081214468077)\r\nREAL ESTATE BANDUNG', 'SHM', 'Bandung', 'Jawa Barat', 'Ujungberung, Bandung', 'jual', 5, 4, 4, 'Izin Mendirikan Bangunan (IMB), PBB, Taman, Listrik 900 watt, Air ( Jet Pump )', 11000000, 'Jet Pump', '10.-Desain-rumah-minimalis-yang-menarik.jpg', '2018-07-08 08:05:45', '2018-07-08 08:05:45', '2018-07-29 07:43:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `building_files`
--

CREATE TABLE `building_files` (
  `id` int(11) NOT NULL,
  `path` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `building_files`
--

INSERT INTO `building_files` (`id`, `path`, `name`, `building_id`, `created_at`, `updated_at`) VALUES
(1, 'assets/building_files/2/desain-rumah-asri-nyaman.png', 'desain-rumah-asri-nyaman.png', 2, '2018-07-08 08:05:46', '2018-07-08 08:05:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-07-07 03:05:53', '0000-00-00 00:00:00'),
(2, 'user', '2018-07-07 03:05:53', '0000-00-00 00:00:00'),
(3, 'superuser', '2018-07-08 02:36:19', '2018-07-08 02:36:19'),
(4, 'mahasiswa', '2018-07-08 02:36:58', '2018-07-08 02:36:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postcode` int(8) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `contact`, `address`, `city`, `province`, `postcode`, `img`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@apphome.com', '66059a527018b32e4597dd27574929f6', '087822516625', 'Bandung', 'Bandung', 'Jawa Barat', 40625, NULL, 1, '2018-07-07 15:49:21', '2018-07-07 15:49:21'),
(2, 'arman nugraha', 'aar', 'armannugraha85@gmail.com', '66059a527018b32e4597dd27574929f6', '087822516625', 'Bandung', 'Bandung', 'Jawa Barat', 40625, NULL, 2, '2018-07-07 15:49:21', '2018-07-07 15:49:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_files`
--
ALTER TABLE `building_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `building_files`
--
ALTER TABLE `building_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
