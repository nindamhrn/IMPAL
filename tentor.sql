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
-- Struktur dari tabel `tentor`
--

CREATE TABLE `tentor` (
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `No Hp` char(12) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Matakuliah` varchar(20) NOT NULL,
  `Deskripsi` varchar(360) NOT NULL,
  `Kode Tentor` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentor`
--

INSERT INTO `tentor` (`Nama`, `Alamat`, `No Hp`, `Status`, `Matakuliah`, `Deskripsi`, `Kode Tentor`) VALUES
('Tama', 'PGA', '08298887666', 'Mahasiswa', 'PBO', 'Mahir membuat program dengan bahasa pemrograman java', 'TR-01'),
('Lula', 'Sukarno Hatta', '087665432345', 'Mahasiswa', 'Kalkulus', 'Menguasai Kalkulus IA dan IIB', 'TR-02'),
('Wira', 'Ciganitri', '088765456548', 'Sarjana', 'APPL', 'Seorang Design Analis', 'TR-03'),
('Anvaq', 'Sukabirus', '081233454555', 'Mahasiswa', 'DAP', 'Mahir dalam membuat program menggunakan bahasa pemrograman pascal', 'TR-04'),
('Haydar', 'Bandung', '082224447665', 'Mahasiswa', 'Fisika Dasar', 'Menguasai materi fisika dasar ', 'TR-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`Kode Tentor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
