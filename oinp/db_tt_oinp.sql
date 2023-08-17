-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2023 pada 20.15
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsi06`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_tt_oinp`
--

CREATE TABLE `db_tt_oinp` (
  `reg` varchar(12) NOT NULL,
  `amount` int(11) NOT NULL,
  `giver` varchar(100) NOT NULL,
  `utilities` varchar(100) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `submitter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_tt_oinp`
--

INSERT INTO `db_tt_oinp` (`reg`, `amount`, `giver`, `utilities`, `floor`, `buyer`, `submitter`) VALUES
('230817231512', 27538500, 'Dimsum Pertok', 'Sewa Tenant', 'lorem', 'ipsum', 'm. bagus dewantara'),
('230818001215', 2200000, 'PT. Lorem Ipsum', 'Sewa Tenant', 'lorem', 'ipsum', 'm. bagus dewantara');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_tt_oinp`
--
ALTER TABLE `db_tt_oinp`
  ADD PRIMARY KEY (`reg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
