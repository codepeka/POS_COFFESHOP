-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 11:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `bahan_baku` text NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `bahan_baku`, `total_harga`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 'Es Batu  = 10.000, Jas jus = 10.000, telur = 23.000', 43000, '2021-03-08 10:16:44', '2021-03-08 09:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_log` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL,
  `tipe` char(16) NOT NULL,
  `description` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_log`, `tanggal`, `id_user`, `tipe`, `description`) VALUES
(1, '2020-11-07 06:31:28', 130, 'Login', 'Login LaPesen'),
(2, '2020-11-07 00:34:10', 130, 'Update', 'Ubah Nama Toko'),
(3, '2020-11-07 05:08:05', 130, 'Login', 'Login LaPesen'),
(4, '2020-11-07 05:40:19', 130, 'Login', 'Login LaPesen'),
(5, '2020-11-07 05:57:19', 130, 'Update', 'Ubah Nama Toko'),
(6, '2020-11-07 05:57:21', 130, 'Update', 'Ubah Nama Toko'),
(7, '2020-11-07 07:23:14', 130, 'Login', 'Login LaPesen'),
(8, '2020-11-25 02:14:16', 132, 'Login', 'Login LaPesen'),
(9, '2020-11-27 05:15:45', 132, 'Login', 'Login LaPesen'),
(10, '2020-11-29 21:36:14', 132, 'Login', 'Login LaPesen'),
(11, '2020-12-31 04:38:56', 132, 'Login', 'Login LaPesen'),
(12, '2020-12-31 08:36:42', 132, 'Login', 'Login LaPesen'),
(13, '2021-01-04 00:30:37', 132, 'Login', 'Login LaPesen'),
(14, '2021-01-04 00:32:26', 0, 'Logout', 'Logout LaPesen'),
(15, '2021-01-04 00:35:18', 0, 'Logout', 'Logout LaPesen'),
(16, '2021-01-26 00:11:16', 0, 'Logout', 'Logout LaPesen'),
(17, '2021-02-19 10:38:47', 130, 'Login', 'Login LaPesen'),
(18, '2021-02-19 10:51:53', 132, 'Update', 'Ubah Data Profile'),
(19, '2021-02-19 10:53:27', 132, 'Update', 'Ubah Data Profile'),
(20, '2021-02-19 10:55:42', 132, 'Update', 'Ubah Data Profile'),
(21, '2021-02-19 10:56:06', 132, 'Update', 'Ubah Data Profile'),
(22, '2021-02-19 10:57:45', 132, 'Update', 'Ubah Data Profile'),
(23, '2021-02-20 09:35:41', 130, 'Login', 'Login LaPesen'),
(24, '2021-02-20 09:40:05', 130, 'Logout', 'Logout LaPesen'),
(25, '2021-02-20 09:40:17', 132, 'Login', 'Login LaPesen'),
(26, '2021-02-24 05:20:32', 132, 'Login', 'Login LaPesen'),
(27, '2021-03-05 21:28:04', 130, 'Login', 'Login LaPesen'),
(28, '2021-03-07 07:11:55', 130, 'Login', 'Login LaPesen'),
(29, '2021-03-07 07:20:13', 130, 'Update', 'Ubah Data User / Pengguna'),
(30, '2021-03-07 07:26:14', 130, 'Update', 'Ubah Data User / Pengguna'),
(31, '2021-03-07 07:37:09', 130, 'Logout', 'Logout LaPesen'),
(32, '2021-03-07 07:37:57', 132, 'Login', 'Login LaPesen'),
(33, '2021-03-07 09:41:17', 132, 'Login', 'Login LaPesen'),
(34, '2021-03-07 09:49:18', 132, 'Logout', 'Logout LaPesen'),
(35, '2021-03-07 09:49:29', 130, 'Login', 'Login LaPesen'),
(36, '2021-03-07 10:34:05', 130, 'Logout', 'Logout LaPesen'),
(37, '2021-03-07 10:36:11', 130, 'Login', 'Login LaPesen'),
(38, '2021-03-07 10:36:22', 130, 'Logout', 'Logout LaPesen'),
(39, '2021-03-07 10:36:32', 132, 'Login', 'Login LaPesen'),
(40, '2021-03-07 10:47:32', 132, 'Logout', 'Logout LaPesen'),
(41, '2021-03-07 10:48:14', 130, 'Login', 'Login LaPesen'),
(42, '2021-03-07 14:55:31', 132, 'Login', 'Login LaPesen'),
(43, '2021-03-07 14:55:41', 132, 'Logout', 'Logout LaPesen'),
(44, '2021-03-07 14:55:59', 130, 'Login', 'Login LaPesen'),
(45, '2021-03-08 01:03:38', 130, 'Login', 'Login LaPesen'),
(46, '2021-03-08 01:21:47', 130, 'Login', 'Login LaPesen'),
(47, '2021-03-08 01:22:20', 130, 'Update', 'Ubah Data Menu'),
(48, '2021-03-08 01:23:16', 130, 'Add', 'Tambah Data Menu'),
(49, '2021-03-08 01:23:33', 130, 'Update', 'Ubah Data Menu'),
(50, '2021-03-08 01:23:45', 130, 'Update', 'Ubah Data Menu'),
(51, '2021-03-08 01:24:07', 130, 'Update', 'Ubah Data Menu'),
(52, '2021-03-08 01:40:34', 130, 'Add', 'Tambah Data Menu'),
(53, '2021-03-08 03:16:44', 130, 'Add', 'Tambah Data Bahan Baku'),
(54, '2021-03-08 03:30:06', 130, 'Update', 'Ubah Data Bahan Baku'),
(55, '2021-03-08 03:30:19', 130, 'Add', 'Tambah Data Bahan Baku'),
(56, '2021-03-08 03:30:23', 130, 'Delete', 'Hapus Data Bahan Baku'),
(57, '2021-03-08 11:44:49', 130, 'Logout', 'Logout LaPesen'),
(58, '2021-03-08 11:45:01', 132, 'Login', 'Login LaPesen'),
(59, '2021-03-08 12:35:58', 132, 'Login', 'Login LaPesen'),
(60, '2021-03-09 23:40:57', 130, 'Login', 'Login LaPesen'),
(61, '2021-03-10 01:44:14', 130, 'Add', 'Tambah Data Menu'),
(62, '2021-03-10 01:46:22', 130, 'Add', 'Tambah Data Menu'),
(63, '2021-03-10 01:52:34', 130, 'Add', 'Tambah Data Menu'),
(64, '2021-03-10 02:08:00', 130, 'Add', 'Tambah Data Menu'),
(65, '2021-03-10 02:09:45', 130, 'Add', 'Tambah Data Menu'),
(66, '2021-03-10 02:13:18', 130, 'Add', 'Tambah Data Menu'),
(67, '2021-03-10 02:32:18', 130, 'Add', 'Tambah Data Menu'),
(68, '2021-03-10 03:08:09', 130, 'Login', 'Login LaPesen'),
(69, '2021-03-10 03:24:57', 130, 'Update', 'Ubah Data Menu'),
(70, '2021-03-10 03:25:56', 130, 'Update', 'Ubah Data Menu'),
(71, '2021-03-10 03:27:35', 130, 'Update', 'Ubah Data Menu'),
(72, '2021-03-10 03:27:59', 130, 'Update', 'Ubah Data Menu'),
(73, '2021-03-10 03:28:57', 130, 'Update', 'Ubah Data Menu'),
(74, '2021-03-10 03:31:09', 130, 'Delete', 'Hapus Data Menu'),
(75, '2021-03-10 03:31:20', 130, 'Delete', 'Hapus Data Menu'),
(76, '2021-03-10 03:34:40', 130, 'Delete', 'Hapus Data Menu'),
(77, '2021-03-10 03:34:45', 130, 'Delete', 'Hapus Data Menu'),
(78, '2021-03-10 03:34:49', 130, 'Delete', 'Hapus Data Menu'),
(79, '2021-03-10 03:34:54', 130, 'Delete', 'Hapus Data Menu'),
(80, '2021-03-10 03:34:59', 130, 'Delete', 'Hapus Data Menu'),
(81, '2021-03-10 03:37:18', 130, 'Logout', 'Logout LaPesen'),
(82, '2021-03-10 03:38:47', 132, 'Login', 'Login LaPesen'),
(83, '2021-03-10 04:02:42', 130, 'Login', 'Login LaPesen'),
(84, '2021-03-10 04:05:19', 130, 'Update', 'Ubah Data Menu'),
(85, '2021-03-13 04:11:25', 130, 'Login', 'Login LaPesen'),
(86, '2021-03-13 04:14:09', 130, 'Logout', 'Logout LaPesen');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(45) NOT NULL,
  `kategori` enum('makanan','minuman') NOT NULL,
  `foto` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `foto`, `harga_jual`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 'Tora Coffeein', 'makanan', '', 10000, '2020-10-05 02:11:11', '2021-03-08 07:22:20'),
(2, 'Indomie Goreng', 'makanan', '', 2500, '2020-10-05 16:45:23', '2021-03-07 19:37:08'),
(3, 'Green Tea', 'minuman', '', 1000, '2020-10-05 16:29:22', '2021-03-07 19:37:14'),
(4, 'Milk Shake', 'minuman', '', 1000, '2020-10-05 16:29:37', '2021-03-07 19:37:20'),
(5, 'Dimsum', 'makanan', '', 2500, '2020-10-05 16:45:09', '2021-03-07 19:37:28'),
(7, 'Salad', 'makanan', '', 2500, '2020-10-05 17:39:17', '2021-03-07 19:37:40'),
(8, 'Orange Jus', 'minuman', '', 12000, '2020-10-07 04:47:32', '2021-03-07 19:37:47'),
(9, 'Nasi Goreng', 'makanan', '', 4500, '2020-10-08 16:41:12', '2021-03-07 19:37:53'),
(12, 'Martabok', 'makanan', '', 15000, '2021-03-08 08:23:16', '2021-03-08 07:24:06'),
(13, 'Burger Double Deluxe', 'makanan', '1615370719703.jpg', 20000, '2021-03-08 08:40:34', '2021-03-10 10:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `alamat` varchar(65) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `total_harga`, `diskon`, `status`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 132, 13000, 1000, 1, '2020-10-20 19:57:47', '2020-11-02 14:35:10'),
(2, 132, 100000, 5000, 1, '2020-10-27 13:50:43', '2020-11-02 14:35:14'),
(3, 132, 78000, 3000, 1, '2021-01-04 09:43:52', '2021-01-09 15:30:15'),
(4, 132, 1000, 0, 1, '2021-01-09 16:28:19', '2021-02-10 10:17:35'),
(5, 132, 20000, 0, 1, '2021-01-19 14:58:06', '2021-02-10 11:01:06'),
(6, 132, 1000, 0, 1, '2021-02-10 11:21:17', '2021-02-10 11:01:23'),
(7, 132, 210500, 22000, 1, '2021-02-10 11:48:23', '2021-03-08 18:21:35'),
(8, 132, 0, 0, 0, '2021-03-08 19:21:37', '2021-03-08 18:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanan_detail` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `harga_asli` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanan_detail`, `id_pemesanan`, `id_menu`, `id_pembeli`, `harga_asli`, `jumlah_menu`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 1, 8, 0, 12000, 1, '2020-10-20 20:27:21', '2020-10-20 13:27:21'),
(2, 1, 3, 0, 1000, 1, '2020-10-20 20:29:48', '2020-10-20 13:29:48'),
(3, 2, 8, 0, 96000, 8, '2020-10-27 15:46:59', '2020-10-27 08:46:59'),
(4, 2, 3, 0, 1000, 1, '2020-10-27 15:48:32', '2020-10-27 08:48:32'),
(5, 2, 1, 0, 2000, 2, '2020-10-27 15:49:47', '2020-10-27 08:49:47'),
(6, 2, 4, 0, 1000, 1, '2020-10-27 15:49:47', '2020-10-27 08:49:47'),
(13, 3, 3, 0, 1000, 16, '0000-00-00 00:00:00', '2021-01-08 18:57:50'),
(17, 3, 2, 0, 2500, 1, '0000-00-00 00:00:00', '2021-01-08 14:40:02'),
(18, 3, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-01-08 15:03:31'),
(20, 3, 8, 0, 12000, 1, '0000-00-00 00:00:00', '2021-01-08 15:06:53'),
(22, 3, 5, 0, 2500, 1, '0000-00-00 00:00:00', '2021-01-08 15:07:13'),
(23, 3, 1, 0, 1000, 1, '0000-00-00 00:00:00', '2021-01-08 15:07:15'),
(24, 3, 7, 0, 2500, 1, '0000-00-00 00:00:00', '2021-01-08 15:45:14'),
(29, 3, 9, 0, 4500, 9, '0000-00-00 00:00:00', '2021-01-09 13:18:28'),
(30, 5, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-01-26 05:09:38'),
(34, 5, 3, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-05 09:44:16'),
(36, 5, 2, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-05 10:44:58'),
(37, 5, 1, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-05 11:53:00'),
(38, 5, 8, 0, 12000, 1, '0000-00-00 00:00:00', '2021-02-05 11:53:05'),
(39, 5, 7, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-05 11:54:11'),
(40, 4, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-10 10:17:32'),
(41, 6, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-10 10:46:31'),
(42, 7, 8, 0, 12000, 15, '0000-00-00 00:00:00', '2021-03-07 15:47:39'),
(43, 7, 7, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-11 07:49:09'),
(44, 7, 2, 0, 2500, 1, '0000-00-00 00:00:00', '2021-02-11 07:49:11'),
(47, 7, 4, 0, 1000, 1, '0000-00-00 00:00:00', '2021-02-19 13:29:08'),
(48, 7, 9, 0, 4500, 1, '0000-00-00 00:00:00', '2021-02-19 13:35:38'),
(50, 7, 13, 0, 20000, 1, '0000-00-00 00:00:00', '2021-03-08 18:21:01'),
(51, 8, 4, 0, 1000, 5, '0000-00-00 00:00:00', '2021-03-08 18:24:13'),
(52, 8, 13, 0, 20000, 1, '0000-00-00 00:00:00', '2021-03-10 10:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_toko` varchar(35) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_toko`, `tgl_buat`, `tgl_ubah`) VALUES
(1, 'TOKO \"OTONG PUTRA JAYA 69\"', '2020-11-04 20:03:48', '2020-11-07 06:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` char(45) NOT NULL,
  `username` char(45) NOT NULL,
  `password` char(125) NOT NULL,
  `hak` enum('admin','owner','karyawan') NOT NULL,
  `owner_is` tinyint(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `hak`, `owner_is`, `tgl_buat`, `tgl_ubah`) VALUES
(130, 'Ustman Bin Affan', 'ustman', 'ec9177f059582671a13e1f2a360da127', 'owner', 0, '2020-10-06 12:02:48', '2021-03-07 13:26:14'),
(132, 'Muhammad Al Fatih', 'alfatih', 'a30539711badb1099dc5db24c63cadc2', 'karyawan', 0, '2020-10-06 12:04:40', '2021-03-07 13:20:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`),
  ADD KEY `relasi_ke_pemesan` (`id_pemesanan`),
  ADD KEY `relasi_ke_menu` (`id_menu`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

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
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD CONSTRAINT `relasi_ke_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `relasi_ke_pemesan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
