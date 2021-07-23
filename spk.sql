-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 08:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(10) NOT NULL,
  `nama_nasabah` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `Type` enum('Benefit','Cost') DEFAULT NULL,
  `bobot_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `Type`, `bobot_kriteria`) VALUES
('K1', 'Usia', 'Benefit', 4),
('K2', 'Tanggungan', 'Benefit', 3),
('K3', 'Besar Gaji', 'Benefit', 5),
('K4', 'Besar Pinjaman', 'Cost', 5),
('K5', 'Riwayat Nasabah', 'Benefit', 5),
('K9', 'Hjshdjw', 'Cost', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_sub` varchar(5) NOT NULL,
  `nama_kriteria` varchar(225) NOT NULL,
  `nama_sub` varchar(225) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `nama_kriteria`, `nama_sub`, `bobot_sub`) VALUES
('SK11', 'Usia', '< 50', 5),
('SK12', 'Usia', '50 < x  ≤  80', 4),
('SK21', 'Tanggungan', '1', 5),
('SK22', 'Tanggungan', '2', 4),
('SK23', 'Tanggungan', '3', 3),
('SK24', 'Tanggungan', '4', 2),
('SK25', 'Tanggungan', '≥5', 1),
('SK31', 'Besar Gaji', '≤ 3 juta', 2),
('SK32', 'Besar Gaji', '3 < x  ≤  4 juta', 3),
('SK33', 'Besar Gaji', '4 < x ≤ 5 juta', 4),
('SK34', 'Besar Gaji', '5 < x ≤ 6 juta', 5),
('SK41', 'Besar Pinjaman', '≤ 10 juta', 5),
('SK42', 'Besar Pinjaman', '10< x ≤ 30 juta', 4),
('SK43', 'Besar Pinjaman', '30< x ≤ 50 juta', 3),
('SK44', 'Besar Pinjaman', '50< X≤ 70 juta', 2),
('SK45', 'Besar Pinjaman', '70< x ≤ 100 juta', 5),
('SK51', 'Riwayat Nasabah', 'Kredit Lancar', 5),
('SK52', 'Riwayat Nasabah', 'Kredit DPK (Dalam Perhatian Khusus)', 4),
('SK53', 'Riwayat Nasabah', 'Kredit Tidak Lancar', 3),
('SK54', 'Riwayat Nasabah', 'Kredit Diragukan', 2),
('SK55', 'Riwayat Nasabah', 'Kredit Macet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `level` enum('bagiankredit','pimpinan') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
