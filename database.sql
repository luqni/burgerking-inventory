-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2021 at 02:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id`, `kode`, `item_name`, `id_kategori`) VALUES
(1, 'BK400900', 'CUP COLD 16oz (ea)', 1),
(2, 'Bk401000', 'CUP COLD 22oz MED', 1),
(3, 'BK401100', 'COLD LID 16/22 (ea)', 1),
(4, 'BK401200', 'CUP COLD 12OZ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(30) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `tmp_lahir_siswa` varchar(45) NOT NULL,
  `tgl_lahir_siswa` date NOT NULL,
  `alamat_siswa` text NOT NULL,
  `anak_ke` int(5) NOT NULL,
  `saudara_kandung` varchar(45) NOT NULL,
  `nama_ayah` varchar(45) NOT NULL,
  `tmp_lahir_ayah` varchar(45) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `pendidikan_tinggi_ayah` varchar(45) NOT NULL,
  `pekerjaan_ayah` varchar(45) NOT NULL,
  `nomor_hp_ayah` varchar(20) NOT NULL,
  `nama_ibu` varchar(45) NOT NULL,
  `tmp_lahir_ibu` varchar(45) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `pendidikan_tertinggi_ibu` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(40) NOT NULL,
  `nomor_hp_ibu` varchar(20) NOT NULL,
  `kelompok` varchar(40) NOT NULL,
  `tahun_ajar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nis`, `nisn`, `nama_siswa`, `tmp_lahir_siswa`, `tgl_lahir_siswa`, `alamat_siswa`, `anak_ke`, `saudara_kandung`, `nama_ayah`, `tmp_lahir_ayah`, `tgl_lahir_ayah`, `pendidikan_tinggi_ayah`, `pekerjaan_ayah`, `nomor_hp_ayah`, `nama_ibu`, `tmp_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_tertinggi_ibu`, `pekerjaan_ibu`, `nomor_hp_ibu`, `kelompok`, `tahun_ajar`) VALUES
(1, '19200001', '56795769', 'Nabhan Zulfadli	', 'Klaten', '2020-12-28', 'Rawajati Barat I No.55, RT 008/004, Pancoran, Jakarta Selatan\r\n', 2, '1', 'Abu Nabhan	', 'Jakarta', '1980-09-12', 'SMK', 'Wirausaha', '081235578857', 'Ummu Nabhan', 'Klaten', '1981-07-26', 'D3', 'IRT', '085768097867', 'TK A1', '2019/2020'),
(5, '123', '1234', 'Abdullah', 'Jakarta', '0000-00-00', '', 1, '3', 'Fulan', 'Jakarta', '2020-12-01', 'SMA', 'Wirausaha', '+62830037', 'Fulannah', 'Jakarta', '2020-12-09', 'SMA', 'IRT', '+6283667', 'TK A2', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `cv` int(100) NOT NULL,
  `pack` int(100) NOT NULL,
  `ea` int(100) NOT NULL,
  `stok_op_name` int(100) NOT NULL,
  `transfer` int(100) NOT NULL,
  `endmonthly` int(100) NOT NULL,
  `actual` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `id_barang`, `cv`, `pack`, `ea`, `stok_op_name`, `transfer`, `endmonthly`, `actual`, `date`) VALUES
(1, 1, 1, 1, 1, 100, 0, 300, 800, '2021-01-30'),
(2, 2, 1, 5, 1, 100, 0, 300, 800, '2021-01-28'),
(3, 3, 1, 1, 1, 100, 0, 300, 800, '2021-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama`) VALUES
(1, 'PLASTIC PRODUCT'),
(2, 'PAPER PRODUCT'),
(3, 'CLEANING PRODUCT'),
(4, 'CONDIMENT PAPER'),
(5, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'dian', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'dian@petanikode.com', 'Ahmad Muhardian', '08123456789', 'admin', '2020-12-26 05:36:56', 'user_no_image.jpg', '2019-12-10 15:46:40', 1),
(2, 'user', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'user@email.com', 'Administrator', '08123456789', 'admin', '2021-02-06 00:37:38', 'user_no_image.jpg', '2019-12-10 15:46:40', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
