-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 04:45 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kiostix`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(22) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `cetakan` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `id_penulis` int(22) NOT NULL,
  `id_kategori` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `cetakan`, `penerbit`, `id_penulis`, `id_kategori`) VALUES
(1, 'Kambing dan Hujan', '2018', 'Gramedia', 1, 5),
(4, '123', '2000', 'Erlanga', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ketegori`
--

CREATE TABLE `ketegori` (
  `id_ketegori` int(22) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketegori`
--

INSERT INTO `ketegori` (`id_ketegori`, `nama_kategori`) VALUES
(3, 'Bahasa'),
(5, 'Fiksi'),
(7, 'Non-fiksi'),
(8, 'Sastra');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(22) NOT NULL,
  `nama_penulis` varchar(200) NOT NULL,
  `alamat_penulis` varchar(200) NOT NULL,
  `kontak_penulis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `alamat_penulis`, `kontak_penulis`) VALUES
(1, 'Mahfud Ikhwan', 'Jakarta', '0822123456'),
(2, 'Ahmad Fuadi', 'Bandungw', '0987654321'),
(5, 'R Toni', 'Jawa Tengah', '022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `ketegori`
--
ALTER TABLE `ketegori`
  ADD PRIMARY KEY (`id_ketegori`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ketegori`
--
ALTER TABLE `ketegori`
  MODIFY `id_ketegori` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `ketegori` (`id_ketegori`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
