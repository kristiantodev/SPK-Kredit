-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 05:59 AM
-- Server version: 5.7.21-log
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
  `id_alternatif` int(11) NOT NULL,
  `nama_nasabah` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_nasabah`, `nik`, `ttl`, `alamat`, `no_tlp`) VALUES
(1, 'Khotimah', 'oke', '2020-02-10', 'ok', 'ok'),
(2, 'Ulfi', '3809403758497', '2021-07-21', 'oke', '0939838');

-- --------------------------------------------------------

--
-- Table structure for table `kredit`
--

CREATE TABLE `kredit` (
  `id_kredit` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `tgl_kredit` date NOT NULL,
  `c1` varchar(30) NOT NULL,
  `c2` varchar(30) NOT NULL,
  `c3` varchar(30) NOT NULL,
  `c4` varchar(30) NOT NULL,
  `c5` varchar(30) NOT NULL,
  `vektor` float DEFAULT NULL,
  `keputusan` varchar(50) DEFAULT NULL,
  `aproved` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kredit`
--

INSERT INTO `kredit` (`id_kredit`, `id_alternatif`, `tgl_kredit`, `c1`, `c2`, `c3`, `c4`, `c5`, `vektor`, `keputusan`, `aproved`) VALUES
(1, 1, '2021-07-14', 'SK11', 'SK22', 'SK31', 'SK42', 'SK53', 0.201, 'Layak', 'no'),
(2, 2, '2021-07-21', 'SK11', 'SK23', 'SK33', 'SK45', 'SK54', 0.21, 'Layak', 'no'),
(3, 1, '2021-07-20', 'SK12', 'SK25', 'SK34', 'SK43', 'SK53', 0.206, 'Layak', 'no'),
(4, 2, '2021-07-21', 'SK12', 'SK24', 'SK32', 'SK42', 'SK55', 0.182, 'Tidak Layak', 'no'),
(5, 1, '2021-07-05', 'SK12', 'SK22', 'SK32', 'SK43', 'SK52', 0.2, 'Layak', 'no');

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
('K4', 'Besar Pinjaman', 'Cost', 2),
('K5', 'Riwayat Nasabah', 'Benefit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_sub` varchar(5) NOT NULL,
  `nama_kriteria` varchar(225) NOT NULL,
  `nama_sub` varchar(225) NOT NULL,
  `bobot_sub` float NOT NULL,
  `bobot_global` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `nama_kriteria`, `nama_sub`, `bobot_sub`, `bobot_global`) VALUES
('SK11', 'Usia', '< 50', 5, 0.148),
('SK12', 'Usia', '50 < x  ≤  80', 4, 0.119),
('SK21', 'Tanggungan', '1', 5, 0.067),
('SK22', 'Tanggungan', '2', 4, 0.053),
('SK23', 'Tanggungan', '3', 3, 0.04),
('SK24', 'Tanggungan', '4', 2, 0.027),
('SK25', 'Tanggungan', '≥5', 1, 0.013),
('SK31', 'Besar Gaji', '≤ 3 juta', 2, 0.048),
('SK32', 'Besar Gaji', '3 < x  ≤  4 juta', 3, 0.071),
('SK33', 'Besar Gaji', '4 < x ≤ 5 juta', 4, 0.095),
('SK34', 'Besar Gaji', '5 < x ≤ 6 juta', 5, 0.119),
('SK41', 'Besar Pinjaman', '≤ 10 juta', 5, -0.035),
('SK42', 'Besar Pinjaman', '10< x ≤ 30 juta', 4, -0.028),
('SK43', 'Besar Pinjaman', '30< x ≤ 50 juta', 3, -0.021),
('SK44', 'Besar Pinjaman', '50< X≤ 70 juta', 2, -0.014),
('SK45', 'Besar Pinjaman', '70< x ≤ 100 juta', 5, -0.035),
('SK51', 'Riwayat Nasabah', 'Kredit Lancar', 5, 0.022),
('SK52', 'Riwayat Nasabah', 'Kredit DPK (Dalam Perhatian Khusus)', 4, 0.018),
('SK53', 'Riwayat Nasabah', 'Kredit Tidak Lancar', 3, 0.013),
('SK54', 'Riwayat Nasabah', 'Kredit Diragukan', 2, 0.009),
('SK55', 'Riwayat Nasabah', 'Kredit Macet', 1, 0.004);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `level` enum('bagiankredit','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_pengguna`, `level`) VALUES
(1, 'bagiankredit', '$2y$10$gULCedUyIy0vjPr9mJWHAOE6tcGdIzJwy9h8XDt0nOB4BHJIhNIeS', 'Ulfiyatul Khotimah', 'bagiankredit'),
(2, 'pimpinan', '$2y$10$gULCedUyIy0vjPr9mJWHAOE6tcGdIzJwy9h8XDt0nOB4BHJIhNIeS', 'Chandra Lukita', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kredit`
--
ALTER TABLE `kredit`
  ADD PRIMARY KEY (`id_kredit`);

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
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kredit`
--
ALTER TABLE `kredit`
  MODIFY `id_kredit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
