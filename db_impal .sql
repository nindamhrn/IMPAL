-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 04:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_impal`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_mk`
--

CREATE TABLE `daftar_mk` (
  `id_mk` int(11) NOT NULL,
  `nama_mk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_mk`
--

INSERT INTO `daftar_mk` (`id_mk`, `nama_mk`) VALUES
(2, 'Fisika Dasar'),
(3, 'Kalkulus I'),
(4, 'Kalkulus II'),
(5, 'Bahasa Inggris I'),
(6, 'Bahasa Inggris II'),
(20, 'Jarkom');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ngajar`
--

CREATE TABLE `daftar_ngajar` (
  `id_pn` int(11) NOT NULL,
  `nama_pk` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `namap` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ngajar`
--

INSERT INTO `daftar_ngajar` (`id_pn`, `nama_pk`, `username`, `namap`, `status`, `waktu`) VALUES
(1, 'Fisika Dasar', 'ferninda01', 'Ferninda', 'Kosong', '-');

-- --------------------------------------------------------

--
-- Table structure for table `d_pengguna`
--

CREATE TABLE `d_pengguna` (
  `id` int(15) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `e_saldo` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_pengguna`
--

INSERT INTO `d_pengguna` (`id`, `nama_pengguna`, `nohp`, `username`, `password`, `level`, `e_saldo`, `last_login`) VALUES
(1, 'Ambar', '088806312245', 'ambar22', 'kosong123', 'Admin', '0', '22 October 2019 - 09 : 03'),
(2, 'Ferninda', '08222921902', 'ferninda01', 'qwerty123', 'Pengajar', '0', '22 October 2019'),
(3, 'Gilda', '08139201022', 'gilda02', 'gilda123', 'Member', '100000', '22 October 2019 - 09 : 02');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(11) NOT NULL,
  `informasi` text NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_info`, `informasi`, `tanggal`) VALUES
(1, 'Selamat datang, Belajar  Pintar bersama kami.', '22 October 2019 - 09 : 03 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_web`
--

CREATE TABLE `pemasukan_web` (
  `id_tx` int(15) NOT NULL,
  `kodeUnikDepo` varchar(255) NOT NULL,
  `totalDeposit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktuDepo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan_web`
--

INSERT INTO `pemasukan_web` (`id_tx`, `kodeUnikDepo`, `totalDeposit`, `status`, `waktuDepo`, `username`, `jenis`) VALUES
(1, '#TENTU-46176-TARIK-97284', '100000', 'Berhasil', '22 October 2019 - 09 : 01 WIB', 'gilda02', 'DEPOSIT');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_semua`
--

CREATE TABLE `riwayat_semua` (
  `id_rs` int(11) NOT NULL,
  `tgl_psn` text NOT NULL,
  `matkul` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `diterima` varchar(255) NOT NULL,
  `tgl_diterima` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_semua`
--

INSERT INTO `riwayat_semua` (`id_rs`, `tgl_psn`, `matkul`, `username`, `status`, `diterima`, `tgl_diterima`) VALUES
(1, '22 October 2019 - 09 : 06', 'Fisika Dasar', 'gilda02', 'PENDING', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_mk`
--
ALTER TABLE `daftar_mk`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `daftar_ngajar`
--
ALTER TABLE `daftar_ngajar`
  ADD PRIMARY KEY (`id_pn`);

--
-- Indexes for table `d_pengguna`
--
ALTER TABLE `d_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `pemasukan_web`
--
ALTER TABLE `pemasukan_web`
  ADD PRIMARY KEY (`id_tx`);

--
-- Indexes for table `riwayat_semua`
--
ALTER TABLE `riwayat_semua`
  ADD PRIMARY KEY (`id_rs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_mk`
--
ALTER TABLE `daftar_mk`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `daftar_ngajar`
--
ALTER TABLE `daftar_ngajar`
  MODIFY `id_pn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `d_pengguna`
--
ALTER TABLE `d_pengguna`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemasukan_web`
--
ALTER TABLE `pemasukan_web`
  MODIFY `id_tx` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_semua`
--
ALTER TABLE `riwayat_semua`
  MODIFY `id_rs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
