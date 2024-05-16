-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 11:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_hp`) VALUES
(1, 'Budi', '6200000000001'),
(2, 'Yasir', '6200000000002'),
(3, 'Rossy', '6200000000003'),
(4, 'Firzi', '6200000000004'),
(5, 'Ahmad', '6200000000005'),
(6, 'Juni', '6200000000006'),
(7, 'Oci', '6200000000007'),
(8, 'Akbar', '6200000000008'),
(9, 'Faazaa', '6200000000009'),
(10, 'Bambang', '62000000000010'),
(11, 'wow', '123'),
(12, 'Brando', '6200000000012'),
(13, 'Duta', '6200000000013');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `kode_pemesanan` varchar(25) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `total_harga` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode_pemesanan`, `tanggal`, `nama`, `no_hp`, `paket`, `harga`, `berat`, `total_harga`, `status`) VALUES
(1, '00AOqJab01', '16/05/2024', 'Budi', '6200000000001', 'Biasa', '3000', '2', '6000', 'Progress'),
(2, 'JJShUE0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Progress'),
(3, 'dFXNlz0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Progress'),
(4, 'VwgHfq0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Progress'),
(5, 'PRIAQj0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Progress'),
(6, 'fYuUeH0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Progress'),
(7, 'PcNHUx0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Progress'),
(8, 'jRTroB0003', '2024-05-16', 'Rossy', '6200000000003', 'Kilat', '7000', '1', '7000', 'Progress'),
(9, 'ONWiLB0004', '2024-05-16', 'Rossy', '6200000000003', 'Kilat', '7000', '1', '7000', 'Progress'),
(10, 'EiJLRj0005', '2024-05-16', 'Firzi', '6200000000004', 'Kilat', '7000', '2', '14000', 'Progress'),
(11, 'uyIiCB0006', '2024-05-16', 'Firzi', '6200000000004', 'Cepat', '5000', '2', '10000', 'Progress'),
(12, 'vcSxFL0007', '2024-05-16', 'Firzi', '6200000000004', 'Cepat', '5000', '2', '10000', 'Progress'),
(13, 'ohUvRX0008', '2024-05-16', 'Firzi', '6200000000004', 'Cepat', '5000', '2', '10000', 'Progress'),
(14, 'sqdYxf0009', '2024-05-16', 'Firzi', '6200000000004', 'Kilat', '7000', '2', '14000', 'Progress'),
(15, 'NWqzDM0009', '2024-05-16', 'Ahmad', '6200000000005', 'Biasa', '3000', '6', '18000', 'Progress'),
(16, 'hfCqbK0009', '2024-05-16', 'Juni', '6200000000006', 'Biasa', '3000', '1', '3000', 'Progress'),
(17, 'YOdEpE0017', '2024-05-16', 'Juni', '6200000000006', 'Biasa', '3000', '1', '3000', 'Progress'),
(18, 'SUHgvv0018', '2024-05-16', 'Oci', '6200000000007', 'Kilat', '3000', '9', '', 'Progress'),
(19, 'vibesd0019', '2024-05-16', 'Akbar', '6200000000008', 'Kilat', '7000', '1', '7000', 'Progress'),
(20, 'BbSNeZ0020', '2024-05-16', 'Faazaa', '6200000000009', 'Cepat', '5000', '10', '50000', 'Progress'),
(21, 'pMdgPd0021', '2024-05-16', 'Yasir', '6200000000002', 'Biasa', '3000', '1', '3000', 'Progress'),
(22, 'YWiCmw0022', '2024-05-16', 'Juni', '6200000000006', 'Biasa', '3000', '7', '21000', 'Progress'),
(23, 'xOzUgx0023', '2024-05-16', 'Yasir', '6200000000002', 'Kilat', '7000', '1', '7000', 'Progress');

-- --------------------------------------------------------

--
-- Table structure for table `total_pemesanan`
--

CREATE TABLE `total_pemesanan` (
  `id` int(11) NOT NULL,
  `angka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_pemesanan`
--

INSERT INTO `total_pemesanan` (`id`, `angka`) VALUES
(1, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_pemesanan`
--
ALTER TABLE `total_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `total_pemesanan`
--
ALTER TABLE `total_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
