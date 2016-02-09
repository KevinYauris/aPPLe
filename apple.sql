-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 10:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apple`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `username` varchar(16) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE IF NOT EXISTS `alat` (
  `id_alat` varchar(6) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `ketersediaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `lokasi`, `kondisi`, `kategori`, `ketersediaan`) VALUES
('A00001', 'Proyektor HP 1', '7602', 'Baik', 'Proyektor', 'Y'),
('A00002', 'Mic SHARP 1', '7606', 'Rusak', 'SOUND', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `id_kerusakan` varchar(8) NOT NULL,
  `id_alat` int(6) NOT NULL,
  `start_broken` datetime NOT NULL,
  `start_repair` datetime NOT NULL,
  `finish_repair` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` varchar(6) NOT NULL,
  `id_alat` varchar(6) NOT NULL,
  `no_identitas` int(30) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `kategori_peminjam` varchar(30) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `waktu_peminjaman` datetime NOT NULL,
  `durasi` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_alat`, `no_identitas`, `nama_peminjam`, `kategori_peminjam`, `kegiatan`, `waktu_peminjaman`, `durasi`, `status`) VALUES
('P00001', 'A00001', 13513074, 'Ryan Yonata', 'Mahasiswa', 'HMIF Train In', '2016-02-09 19:00:00', 300, 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
 ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
 ADD PRIMARY KEY (`id_kerusakan`), ADD UNIQUE KEY `id_alat` (`id_alat`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
 ADD PRIMARY KEY (`id_peminjaman`), ADD UNIQUE KEY `id_alat` (`id_alat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
