-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 05:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geratisin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa_perusahaan`
--

CREATE TABLE `beasiswa_perusahaan` (
  `id_beasiswa_perusahaan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama_beasiswa` varchar(20) NOT NULL,
  `deskripsi_beasiswa` text NOT NULL,
  `tanggal_terakhir` date NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa_publik`
--

CREATE TABLE `beasiswa_publik` (
  `id_beasiswa_publik` int(11) NOT NULL,
  `nama_beasiswa` varchar(20) NOT NULL,
  `deskripsi_beasiswa` text NOT NULL,
  `tanggal_terakhir` date NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_perusahaan`
--

CREATE TABLE `komentar_perusahaan` (
  `id_komentar_perusahaan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_publik`
--

CREATE TABLE `komentar_publik` (
  `id_komentar_publik` int(11) NOT NULL,
  `id_publik` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(20) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `id_pengguna` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `contact_person` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publik`
--

CREATE TABLE `publik` (
  `id_publik` int(11) NOT NULL,
  `id_pengguna` varchar(20) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_perusahaan`
--

CREATE TABLE `rating_perusahaan` (
  `id_rating` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nilai_rating` float NOT NULL,
  `jumlah_pemberi_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_beasiswa_publik`
--

CREATE TABLE `upload_beasiswa_publik` (
  `id_upload` int(11) NOT NULL,
  `id_publik` int(11) NOT NULL,
  `id_beasiswa_publik` int(11) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `beasiswa_perusahaan`
--
ALTER TABLE `beasiswa_perusahaan`
  ADD PRIMARY KEY (`id_beasiswa_perusahaan`),
  ADD UNIQUE KEY `idx_beasiswa_perusahaan` (`id_beasiswa_perusahaan`),
  ADD KEY `fk_beasiswa_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `beasiswa_publik`
--
ALTER TABLE `beasiswa_publik`
  ADD PRIMARY KEY (`id_beasiswa_publik`);

--
-- Indexes for table `komentar_perusahaan`
--
ALTER TABLE `komentar_perusahaan`
  ADD PRIMARY KEY (`id_komentar_perusahaan`),
  ADD UNIQUE KEY `idx_komentar_perusahaan` (`id_komentar_perusahaan`),
  ADD KEY `fk_komentar_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `komentar_publik`
--
ALTER TABLE `komentar_publik`
  ADD PRIMARY KEY (`id_komentar_publik`),
  ADD UNIQUE KEY `idx_komentar_publik` (`id_komentar_publik`),
  ADD KEY `fk_komentar_publik` (`id_publik`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `idx_pengguna` (`id_pengguna`),
  ADD KEY `fk_pengguna` (`id_admin`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD UNIQUE KEY `idx_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_perusahaan` (`id_pengguna`);

--
-- Indexes for table `publik`
--
ALTER TABLE `publik`
  ADD PRIMARY KEY (`id_publik`),
  ADD UNIQUE KEY `idx_publik` (`id_publik`),
  ADD KEY `fk_publik` (`id_pengguna`);

--
-- Indexes for table `rating_perusahaan`
--
ALTER TABLE `rating_perusahaan`
  ADD PRIMARY KEY (`id_rating`),
  ADD UNIQUE KEY `idx_rating` (`id_rating`),
  ADD KEY `fk_rating_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `upload_beasiswa_publik`
--
ALTER TABLE `upload_beasiswa_publik`
  ADD PRIMARY KEY (`id_upload`),
  ADD UNIQUE KEY `idx_beasiswa_publik` (`id_upload`),
  ADD KEY `fk_beasiswa_publik` (`id_publik`),
  ADD KEY `fk_beasiswa_publik_2` (`id_beasiswa_publik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa_perusahaan`
--
ALTER TABLE `beasiswa_perusahaan`
  MODIFY `id_beasiswa_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beasiswa_publik`
--
ALTER TABLE `beasiswa_publik`
  MODIFY `id_beasiswa_publik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_perusahaan`
--
ALTER TABLE `komentar_perusahaan`
  MODIFY `id_komentar_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_publik`
--
ALTER TABLE `komentar_publik`
  MODIFY `id_komentar_publik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publik`
--
ALTER TABLE `publik`
  MODIFY `id_publik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_perusahaan`
--
ALTER TABLE `rating_perusahaan`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_beasiswa_publik`
--
ALTER TABLE `upload_beasiswa_publik`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beasiswa_perusahaan`
--
ALTER TABLE `beasiswa_perusahaan`
  ADD CONSTRAINT `fk_beasiswa_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `komentar_perusahaan`
--
ALTER TABLE `komentar_perusahaan`
  ADD CONSTRAINT `fk_komentar_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `komentar_publik`
--
ALTER TABLE `komentar_publik`
  ADD CONSTRAINT `fk_komentar_publik` FOREIGN KEY (`id_publik`) REFERENCES `publik` (`id_publik`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `fk_perusahaan` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `publik`
--
ALTER TABLE `publik`
  ADD CONSTRAINT `fk_publik` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `rating_perusahaan`
--
ALTER TABLE `rating_perusahaan`
  ADD CONSTRAINT `fk_rating_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `upload_beasiswa_publik`
--
ALTER TABLE `upload_beasiswa_publik`
  ADD CONSTRAINT `fk_beasiswa_publik` FOREIGN KEY (`id_publik`) REFERENCES `publik` (`id_publik`),
  ADD CONSTRAINT `fk_beasiswa_publik_2` FOREIGN KEY (`id_beasiswa_publik`) REFERENCES `beasiswa_publik` (`id_beasiswa_publik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
