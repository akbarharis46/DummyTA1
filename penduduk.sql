-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 03:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penduduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartupenduduk`
--

CREATE TABLE `kartupenduduk` (
  `id_penduduk` int(11) NOT NULL,
  `no_kk` bigint(50) NOT NULL,
  `nik` bigint(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_perkawinan` enum('kawin','belum kawin') NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `berlaku` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartupenduduk`
--

INSERT INTO `kartupenduduk` (`id_penduduk`, `no_kk`, `nik`, `nama`, `ttl`, `jenis_kelamin`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `berlaku`, `image`) VALUES
(4, 3574042709870009, 992898272121212, 'dianaa', '2021-02-16', 'P', 'jlnhsa', 'islam', 'belum kawin', 'mahasiswa', 'WNI', 'seumur hidup', ''),
(5, 3574042709878003, 992898272121212, 'dianaa', '2021-02-16', 'P', 'kembang turi', 'islam', 'belum kawin', 'mahasiswa', 'WNI', 'seumur hidup', 'IMG_4315-removebg.png'),
(8, 3574042709870009, 992898272121212, 'dianaa', '2021-02-17', 'L', 'kembang turi', 'islam', '', 'mahasiswa', 'WNI', 'seumur hidup', 'IMG_4315-removebg.png'),
(10, 3574042709878003, 992898272121212, 'ade', '2021-02-15', 'L', 'kembang turi', 'islam', '', 'as', 'WNI', 'seumur hidup', 'IMG_4315.JPG'),
(11, 3574042709870009, 992898272121212, 'dianaa', '2021-02-15', 'L', 'jlnhsa', 'islam', '', 'mahasiswa', 'WNI', 'seumur hidup', 'IMG_43153.JPG'),
(12, 3574042709870009, 992898272121212, 'didin', '2021-02-15', 'L', 'kembang turi', 'islam', 'belum kawin', 'mahasiswa', 'WNI', 'seumur hidup', 'caketum_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kk` int(11) NOT NULL,
  `no_kk` bigint(50) NOT NULL,
  `nama_keluarga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kk`, `no_kk`, `nama_keluarga`) VALUES
(1, 3574042709878003, 'Jauhar1'),
(2, 3574042709870009, 'Dharma'),
(3, 3574042709878003, 'Jauhar'),
(4, 3574042709870009, 'Dharma'),
(6, 350988700980002, 'Shofa2');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('admin','user','kosong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`, `level`) VALUES
(9, 'samsul', 'samsul', 'betha', 'admin'),
(10, 'ade123', 'ade', 'ade', 'user'),
(11, 'betha', 'beta', 'beta', 'user'),
(12, 'asd', 'asd', 'asd', 'user'),
(13, 'yoga', 'yoga', 'yoga', 'user'),
(14, 'nand', 'nanda', 'nanda', 'user'),
(16, 'Samsul Islam Badrisshofa', 'magang', '123456', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartupenduduk`
--
ALTER TABLE `kartupenduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartupenduduk`
--
ALTER TABLE `kartupenduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
