-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Sep 2019 pada 18.30
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tentoru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `Id_user` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `Matakuliah` varchar(50) NOT NULL,
  `Jadwal` date NOT NULL,
  `Id_registrasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`Id_user`, `Nama`, `Jurusan`, `Matakuliah`, `Jadwal`, `Id_registrasi`) VALUES
('U-0001', 'Ambar', 'Informatika', 'Fisika Dasar', '2019-09-25', 'R-0001'),
('U-0002', 'Ferninda', 'IF', 'DAP', '2019-09-24', 'R-0002'),
('U-0003', 'Gilda', 'Teknik Industri', 'Kalkulus', '2019-09-19', 'R-0003'),
('U-0004', 'Della', 'Teknik Elektro', 'Kalkulus', '2019-09-10', 'R-0004'),
('U-0005', 'Ryan', 'Informatika', 'APPL', '2019-09-04', 'R-0005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`Id_registrasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
