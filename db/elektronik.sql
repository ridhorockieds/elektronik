-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 09:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elektronik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(9) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `id_suplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `harga`, `id_suplier`) VALUES
(9, 'QQD002', 'QLED Quantum Dot 4K UHD TV', 4, '25000000.00', 1),
(10, 'SWP001', 'Single Woofer 12 Inch', 10, '2334000.00', 1),
(11, 'DWP001', 'Double Woofer 10 Inch', 7, '3045000.00', 1),
(12, 'SSP001', 'Speaker Smart Soundbar', 15, '3449000.00', 1),
(20, 'SMGA50', 'Samsung Galaxy A50s', 3, '4200000.00', 5),
(21, 'SMGM13', 'Samsung Galaxy M13', 4, '2700000.00', 5),
(22, 'SAA001', 'Sharp Aquos Android TV 50\" 4K 4T-C50DK1i HDR', 4, '8050000.00', 6),
(23, 'SAC001', 'Sharp AC 2pk AH-A18UCY Turbo Cool', 5, '67650000.00', 6),
(24, 'SMGZ001', 'Samsung Galaxy Z-Flip 128GB', 11, '17500000.00', 5),
(25, 'SMGZ003', 'Samsung Galaxy Z-Flip 256GB', 4, '21100000.00', 5),
(27, 'ACD001', 'Daikin AC 2pk', 4, '3900000.00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(200) NOT NULL,
  `alamat_suplier` varchar(200) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_suplier`
--

INSERT INTO `tb_suplier` (`id_suplier`, `nama_suplier`, `alamat_suplier`, `no_telp`, `email`) VALUES
(1, 'Polytron', 'Jl. Slamet Riyadi No. 408 Solo', '085321005100', 'cs@polytron.co.id'),
(5, 'Samsung', 'Jl. Slamet Riyadi No. 123 Solo', '08000111888', 'cs@samsung.co.id'),
(6, 'Sharp', 'Jl. Samanhudi No. 45 Surakarta', '081111000099', 'cs@sharp.co.id'),
(7, 'Daikin', 'Jl. Ronggowarsito No. 132 Surakarta', '089995555500', 'cs@daikin.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','staff','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(9, 'Taufik Ridho', 'taufik', 'taufik123', 'admin'),
(11, 'Adam Malik', 'adam', 'adam123', 'staff'),
(12, 'User Test', 'tester', 'tester123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE,
  ADD KEY `FK_barang_suplier` (`id_suplier`) USING BTREE;

--
-- Indexes for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`id_suplier`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `FK_barang_suplier` FOREIGN KEY (`id_suplier`) REFERENCES `tb_suplier` (`id_suplier`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
