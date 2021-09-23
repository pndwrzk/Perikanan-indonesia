-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 06:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perikanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_nota`
--

CREATE TABLE `detail_nota` (
  `id_detail_nota` int(11) NOT NULL,
  `kd_nota` int(11) NOT NULL,
  `id_varian` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_nota`
--

INSERT INTO `detail_nota` (`id_detail_nota`, `kd_nota`, `id_varian`, `jumlah`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 4),
(3, 2, 1, 5),
(4, 2, 3, 4),
(5, 3, 1, 4),
(6, 3, 2, 4),
(7, 3, 4, 3),
(8, 4, 1, 4),
(9, 4, 2, 2),
(10, 4, 4, 5),
(11, 4, 5, 1),
(12, 4, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggan`
--

CREATE TABLE `jenis_pelanggan` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(100) NOT NULL,
  `ppn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pelanggan`
--

INSERT INTO `jenis_pelanggan` (`id_jenis`, `nm_jenis`, `ppn`) VALUES
(1, 'perorangan', 5),
(2, 'perusahaan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `kd_nota` int(11) NOT NULL,
  `kd_pelanggan` int(11) NOT NULL,
  `tgl_nota` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`kd_nota`, `kd_pelanggan`, `tgl_nota`) VALUES
(1, 1, '2021-06-21'),
(2, 4, '2021-06-10'),
(3, 2, '2021-06-11'),
(4, 1, '2021-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` int(11) NOT NULL,
  `nm_pelanggan` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nm_pelanggan`, `id_jenis`, `telepon`) VALUES
(1, 'pandiwa', 2, '085890026519'),
(2, 'mahes', 1, '08967878912'),
(4, 'gibs', 2, '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id_varian` int(11) NOT NULL,
  `nm_varian` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `varian`
--

INSERT INTO `varian` (`id_varian`, `nm_varian`, `harga`) VALUES
(1, 'es balok', 3000),
(2, 'biang es', 1000),
(3, 'es mentah', 1500),
(4, 'es 123', 2500),
(5, 'fgdfg', 546456),
(6, 'fhfghfg', 78678678),
(7, '557', 65767),
(8, 'gibs', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_nota`
--
ALTER TABLE `detail_nota`
  ADD PRIMARY KEY (`id_detail_nota`);

--
-- Indexes for table `jenis_pelanggan`
--
ALTER TABLE `jenis_pelanggan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`kd_nota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_nota`
--
ALTER TABLE `detail_nota`
  MODIFY `id_detail_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_pelanggan`
--
ALTER TABLE `jenis_pelanggan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kd_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
