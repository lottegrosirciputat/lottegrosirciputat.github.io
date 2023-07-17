-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2023 pada 02.01
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
-- Struktur dari tabel `db_sgm_patrol`
--

CREATE TABLE `db_sgm_patrol` (
  `id` varchar(18) NOT NULL,
  `division` enum('NF','DF','FF') NOT NULL,
  `temuan` varchar(100) NOT NULL,
  `progress` varchar(22) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_sgm_patrol`
--

INSERT INTO `db_sgm_patrol` (`id`, `division`, `temuan`, `progress`, `date`, `time`) VALUES
('230705_000343.jpg', 'NF', 'Display berantakan', '230705_000343_ACT.jpg', '2023-07-05', '00:03:43'),
('230705_000401.jpeg', 'NF', 'Display berantakan Display berantakan Display berantakan', '230705_000401_ACT.jpg', '2023-07-05', '00:04:01'),
('230705_000439.jpg', 'NF', 'test', '230705_000439_ACT.jpg', '2023-07-05', '00:04:39'),
('230705_000502.jpg', 'DF', 'test', '', '2023-07-05', '00:05:02'),
('230705_051040.jpg', 'DF', 'rapihkan', '', '2023-07-05', '05:10:40'),
('230705_051054.jpg', 'NF', 'rapihkan', '', '2023-07-05', '05:10:54'),
('230705_051108.jpg', 'NF', 'railcard', '', '2023-07-05', '05:11:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_sgm_patrol`
--
ALTER TABLE `db_sgm_patrol`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
