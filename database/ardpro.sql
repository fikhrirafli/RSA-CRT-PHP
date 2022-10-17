-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 04:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ardpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataenkripsi`
--

CREATE TABLE `dataenkripsi` (
  `enkfaktur` varchar(100) NOT NULL,
  `enktanngal` varchar(100) NOT NULL,
  `enkclient` varchar(100) NOT NULL,
  `enkalamat` varchar(100) NOT NULL,
  `enkuang` varchar(100) NOT NULL,
  `enkketerangan` varchar(100) NOT NULL,
  `private_key` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataenkripsi`
--

INSERT INTO `dataenkripsi` (`enkfaktur`, `enktanngal`, `enkclient`, `enkalamat`, `enkuang`, `enkketerangan`, `private_key`) VALUES
('638 531', '13/Oct/2022', '2003 709 1046 637 1828 1513 1141 1493 1338', '1774 709 240 382 829 709 240 1058 1493', '1846 894 894 894 894 894 894 894', '1058 709 957 709 829', 527);

-- --------------------------------------------------------

--
-- Table structure for table `datainvoice`
--

CREATE TABLE `datainvoice` (
  `nofaktur` varchar(50) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `client` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `uang` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `public_e` int(10) NOT NULL,
  `public_n` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datainvoice`
--

INSERT INTO `datainvoice` (`nofaktur`, `tanggal`, `client`, `alamat`, `uang`, `keterangan`, `public_e`, `public_n`) VALUES
('15', '13/Oct/2022', 'Bank Aceh', 'Namorambe', '40000000', 'bayar', 11, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`) VALUES
(0, 'Rafli', 'rafli123', 'e10adc3949ba59abbe56e057f20f883e'),
(1, 'Fikhri', 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datainvoice`
--
ALTER TABLE `datainvoice`
  ADD PRIMARY KEY (`nofaktur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
