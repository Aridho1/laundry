-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 08:38 AM
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
(13, 'Duta', '6200000000013'),
(14, 'Dani', '6200000000014'),
(15, 'Bintang', '6200000000015'),
(16, 'Jessica', '6200000000016'),
(17, 'Cantika', '6200000000017'),
(18, 'Herman', '6200000000018'),
(19, 'Udin', '6200000000019'),
(20, 'Mia', '6283800000020'),
(21, 'Kokom', '628380000021'),
(22, 'Budi', '6283800000022');

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
(1, '00AOqJab01', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '10', '30000', 'DiAmbil'),
(2, 'JJShUE0002', '2024-05-16', 'Yasir', '6200000000002', 'Kilat', '7000', '4', '28000', 'Selesai'),
(3, 'dFXNlz0002', '2024-05-16', 'Yasir', '6200000000002', 'Kilat', '7000', '3', '21000', 'DiAmbil'),
(5, 'PRIAQj0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Selesai'),
(6, 'fYuUeH0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'DiAmbil'),
(7, 'PcNHUx0002', '2024-05-16', 'Yasir', '6200000000002', 'Cepat', '5000', '3', '15000', 'Selesai'),
(8, 'jRTroB0003', '2024-05-16', 'Rossy', '6200000000003', 'Kilat', '7000', '1', '7000', 'Progress'),
(9, 'ONWiLB0004', '2024-05-16', 'Rossy', '6200000000003', 'Kilat', '7000', '1', '7000', 'DiAmbil'),
(10, 'EiJLRj0005', '2024-05-16', 'Firzi', '6200000000004', 'Kilat', '7000', '2', '14000', 'DiAmbil'),
(11, 'uyIiCB0006', '2024-05-16', 'Firzi', '6200000000004', 'Cepat', '5000', '2', '10000', 'DiAmbil'),
(12, 'vcSxFL0007', '2024-05-16', 'Firzi', '6200000000004', 'Cepat', '5000', '2', '10000', 'DiAmbil'),
(13, 'ohUvRX0008', '2024-05-16', 'Firzi', '6200000000004', 'Cepat', '5000', '2', '10000', 'Progress'),
(14, 'sqdYxf0009', '2024-05-16', 'Firzi', '6200000000004', 'Kilat', '7000', '2', '14000', 'Progress'),
(15, 'NWqzDM0009', '2024-05-16', 'Ahmad', '6200000000005', 'Biasa', '3000', '6', '18000', 'Progress'),
(16, 'hfCqbK0009', '2024-05-16', 'Juni', '6200000000006', 'Biasa', '3000', '1', '3000', 'Progress'),
(17, 'YOdEpE0017', '2024-05-16', 'Juni', '6200000000006', 'Biasa', '3000', '1', '3000', 'Progress'),
(18, 'SUHgvv0018', '2024-05-16', 'Oci', '6200000000007', 'Kilat', '3000', '9', '', 'Progress'),
(19, 'vibesd0019', '2024-05-16', 'Akbar', '6200000000008', 'Kilat', '7000', '1', '7000', 'Progress'),
(20, 'BbSNeZ0020', '2024-05-16', 'Faazaa', '6200000000009', 'Cepat', '5000', '10', '50000', 'Progress'),
(21, 'pMdgPd0021', '2024-05-16', 'Yasir', '6200000000002', 'Biasa', '3000', '1', '3000', 'Selesai'),
(22, 'YWiCmw0022', '2024-05-16', 'Juni', '6200000000006', 'Biasa', '3000', '7', '21000', 'Progress'),
(23, 'xOzUgx0023', '2024-05-16', 'Yasir', '6200000000002', 'Kilat', '7000', '1', '7000', 'Progress'),
(24, 'PRgXgE0024', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '3', '9000', 'Progress'),
(25, 'DEzsvJ0025', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '4', '12000', 'Progress'),
(26, 'BukFBW0026', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '5', '15000', 'Progress'),
(27, 'nWcNuF0027', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '7', '21000', 'Progress'),
(28, 'fbvpyQ0028', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '8', '24000', 'Progress'),
(29, 'eKsIMr0029', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '8', '24000', 'Progress'),
(30, 'RxOqnE0030', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '9', '27000', 'Progress'),
(31, 'cokIHS0031', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '9', '27000', 'Progress'),
(32, 'JiIrkD0032', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '9', '27000', 'Selesai'),
(33, 'BFyQUb0033', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '9', '27000', 'Progress'),
(34, 'avzFgk0034', '2024-05-16', 'Brando', '6200000000012', 'Biasa', '3000', '9', '27000', 'Selesai'),
(35, 'CSDloH0035', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '1', '3000', 'Selesai'),
(36, 'YGTEeR0036', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '2', '6000', 'Selesai'),
(37, 'EyZsja0037', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '11', '33000', 'Selesai'),
(38, 'akNuBq0038', '2024-05-16', 'Rossy', '6200000000003', 'Biasa', '3000', '12', '36000', 'Progress'),
(39, 'xfQAIN0039', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '1', '3000', 'Selesai'),
(40, 'FlNVJP0040', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '1', '3000', 'Progress'),
(41, 'ZbjeSS0041', '2024-05-16', 'Yasir', '6200000000002', 'Biasa', '3000', '5', '15000', 'Progress'),
(42, 'vFcdfR0042', '2024-05-16', 'Oci', '6200000000007', 'Kilat', '7000', '5', '35000', 'Progress'),
(43, 'vKRrNz0043', '2024-05-16', 'Akbar', '6200000000008', 'Cepat', '5000', '5', '25000', 'Progress'),
(44, 'nEAMit0044', '2024-05-16', 'Juni', '6200000000006', 'Kilat', '7000', '2', '14000', 'Progress'),
(45, 'YbuZir0045', '2024-05-16', 'Akbar', '6200000000008', 'Biasa', '3000', '1', '3000', 'Progress'),
(46, 'eIUKkD0046', '2024-05-16', 'Budi', '6200000000001', 'Biasa', '3000', '2', '6000', 'DiAmbil'),
(49, 'AJLlQm0049', '2024-05-21', 'Akbar', '6200000000008', 'Biasa', '3000', '1', '3000', 'Progress'),
(51, 'iiyGiH0051', '2024-05-24', 'Udin', '6200000000019', 'Cepat', '5000', '9', '45000', 'Progress'),
(54, 'iSiymn0054', '2024-05-30', 'Budi', '6200000000001', 'Biasa', '3000', '6', '18000', 'Progress'),
(55, 'cbnInq0055', '2024-05-30', 'Mia', '6283800000020', 'Biasa', '3000', '1', '3000', 'Progress'),
(56, 'hheRKS0056', '2024-05-30', 'Mia', '6283800000020', 'Biasa', '3000', '1', '3000', 'Progress'),
(65, '2024-05-kTPzmo-57', '2024-05-30', 'Kokom', '628380000021', 'Biasa', '3000', '1', '3000', 'Progress'),
(66, '2024-05-BzcIlw-58', '2024-05-30', 'Kokom', '628380000021', 'Biasa', '3000', '10', '30000', 'Progress'),
(68, '2024-05-RDFiUM-60', '2024-05-30', 'Kokom', '628380000021', 'Biasa', '3000', '3', '9000', 'Progress'),
(69, '2024-05-tzkhoR-61', '2024-05-30', 'Cantika', '6200000000017', 'Biasa', '3000', '1', '3000', 'Progress');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `user_level`) VALUES
('admin', '1234', '1'),
('special_user', 'special_user', '2');

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
(1, 62);

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
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `total_pemesanan`
--
ALTER TABLE `total_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
