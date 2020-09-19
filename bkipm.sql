-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 02:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkipm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cs` int(11) NOT NULL,
  `nama_cs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cs`, `nama_cs`) VALUES
(1, 'pt surya');

-- --------------------------------------------------------

--
-- Table structure for table `pengujian`
--

CREATE TABLE `pengujian` (
  `id_uji` int(11) NOT NULL,
  `pengujian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengujian`
--

INSERT INTO `pengujian` (`id_uji`, `pengujian`) VALUES
(0, 'Temperatur'),
(1, 'vst'),
(2, 'salinitas'),
(3, 'WSSV'),
(4, 'TSV'),
(5, 'IMNV'),
(6, 'KHV'),
(7, 'VNNV'),
(8, 'IHHNV'),
(9, 'MBV'),
(10, 'Kimia'),
(11, 'Organoleptik'),
(12, 'Salinitas'),
(13, 'Temperatur');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_ptgs` int(11) NOT NULL,
  `nama_ptgs` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_ptgs`, `nama_ptgs`) VALUES
(1, 'Fadilah nuralya'),
(2, 'Euis srimulyani'),
(3, 'Yeni Eka'),
(6, 'Saipul'),
(7, 'Kusnedi'),
(8, 'Rini'),
(9, 'Abdullah'),
(10, 'Nadiarita');

-- --------------------------------------------------------

--
-- Table structure for table `pps`
--

CREATE TABLE `pps` (
  `id_pps` int(11) NOT NULL,
  `no_pps` int(11) NOT NULL,
  `nama_cs` varchar(128) NOT NULL,
  `person` varchar(128) NOT NULL,
  `phone` int(12) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `id_sampel` int(11) NOT NULL,
  `jum_sampel` int(10) NOT NULL,
  `desk_sampel` varchar(128) DEFAULT NULL,
  `bentuk` varchar(128) NOT NULL,
  `berat_isi` varchar(128) DEFAULT NULL,
  `wadah` varchar(128) NOT NULL,
  `tgl_permo` date NOT NULL,
  `id_uji` int(11) NOT NULL,
  `status` enum('diterima','ditolak','pending') NOT NULL,
  `id_ptgs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pps`
--

INSERT INTO `pps` (`id_pps`, `no_pps`, `nama_cs`, `person`, `phone`, `alamat`, `id_sampel`, `jum_sampel`, `desk_sampel`, `bentuk`, `berat_isi`, `wadah`, `tgl_permo`, `id_uji`, `status`, `id_ptgs`) VALUES
(3, 111, 'Pt Srirejeki', 'Euis', 98754, 'jl perintis', 1, 1, NULL, 'beku', NULL, 'kantong plastik', '2020-09-14', 1, 'diterima', 2),
(6, 0, 'ewe', 'sas', 1, '', 1, 1, 'ds', 'sds', 'wq', 'dw', '2020-09-22', 1, '', 1),
(7, 0, 'asa', 'dsds', 22, '', 1, 1, 'dsd', 'dsds', 'dsds', 'dsd', '2020-09-10', 1, '', 1),
(8, 0, 'oke', 'satui', 2121, 'dds', 1, 0, 'dsd', 'ds', '2', 'dsd', '2020-09-24', 1, '', 1),
(9, 0, 'satu', 'oke', 67, 'kn', 1, 9, 'sa', 'nm', 'k', 'ds', '2020-10-03', 1, '', 1),
(10, 0, 'saya', 'oke1233', 32, '32', 1, 2, 'sa', 'sa', '1', 'ds', '2020-08-30', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pps_uji`
--

CREATE TABLE `pps_uji` (
  `id` int(11) NOT NULL,
  `id_pps` int(11) NOT NULL,
  `id_uji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pps_uji`
--

INSERT INTO `pps_uji` (`id`, `id_pps`, `id_uji`) VALUES
(1, 10, 1),
(2, 10, 2),
(3, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sampel`
--

CREATE TABLE `sampel` (
  `id_sampel` int(11) NOT NULL,
  `jns_sampel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sampel`
--

INSERT INTO `sampel` (`id_sampel`, `jns_sampel`) VALUES
(1, 'Frozen Shrimp'),
(2, 'Squid Liver Oil'),
(3, 'Sargassum'),
(4, 'oill');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'euis srimulyani', 'euis6923@gmail.com', 'default.jpg', '$2y$10$a6O2b5A3N8P9QY/7CE9Ai.ciUzdFfr43OiCGgzakwmsCaIbgXi7PO', 1, 1, '2020-09-05'),
(2, 'euis', 'euis@gmail.com', 'default.jpg', '$2y$10$a6O2b5A3N8P9QY/7CE9Ai.ciUzdFfr43OiCGgzakwmsCaIbgXi7PO', 2, 1, '2020-09-05'),
(3, 'Manager Teknik', 'manager@gmail.com', 'default.jpg', '$2y$10$a6O2b5A3N8P9QY/7CE9Ai.ciUzdFfr43OiCGgzakwmsCaIbgXi7PO', 3, 1, '2020-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_accessmenu`
--

CREATE TABLE `user_accessmenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accessmenu`
--

INSERT INTO `user_accessmenu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'User'),
(4, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Tabel PPS', 'Menu', 'fas fa-fw fa-table', 1),
(3, 2, 'Tabel Sampel', 'Menu/Sampel', 'fas fa-fw fa-table', 1),
(4, 2, 'Tabel Petugas', 'Menu/Petugas', 'fas fa-fw fa-table', 1),
(5, 2, 'Tabel Pengujian', 'Menu/Pengujian', 'fas fa-fw fa-table', 1),
(6, 3, 'Form PPS', 'user', 'fas fa-fw fa-table', 1),
(7, 4, 'Laporan Data PPS', 'manager', 'fas fa-fw fa-table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indexes for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id_uji`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_ptgs`);

--
-- Indexes for table `pps`
--
ALTER TABLE `pps`
  ADD PRIMARY KEY (`id_pps`),
  ADD KEY `id_sampel` (`id_sampel`),
  ADD KEY `id_ptgs` (`id_ptgs`),
  ADD KEY `id_uji` (`id_uji`);

--
-- Indexes for table `pps_uji`
--
ALTER TABLE `pps_uji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampel`
--
ALTER TABLE `sampel`
  ADD PRIMARY KEY (`id_sampel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_accessmenu`
--
ALTER TABLE `user_accessmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_ptgs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pps`
--
ALTER TABLE `pps`
  MODIFY `id_pps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pps_uji`
--
ALTER TABLE `pps_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sampel`
--
ALTER TABLE `sampel`
  MODIFY `id_sampel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_accessmenu`
--
ALTER TABLE `user_accessmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pps`
--
ALTER TABLE `pps`
  ADD CONSTRAINT `pps_ibfk_2` FOREIGN KEY (`id_sampel`) REFERENCES `sampel` (`id_sampel`),
  ADD CONSTRAINT `pps_ibfk_3` FOREIGN KEY (`id_ptgs`) REFERENCES `petugas` (`id_ptgs`),
  ADD CONSTRAINT `pps_ibfk_4` FOREIGN KEY (`id_uji`) REFERENCES `pengujian` (`id_uji`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_accessmenu`
--
ALTER TABLE `user_accessmenu`
  ADD CONSTRAINT `user_accessmenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`),
  ADD CONSTRAINT `user_accessmenu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD CONSTRAINT `user_submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
