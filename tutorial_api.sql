-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2020 pada 02.24
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial_api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `registerpasien`
--

CREATE TABLE `registerpasien` (
  `id_pasien` int(11) NOT NULL,
  `nomedrek` int(6) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registerpasien`
--

INSERT INTO `registerpasien` (`id_pasien`, `nomedrek`, `nama`) VALUES
(1, 123456, 'Dani Purnama'),
(2, 654321, 'Danil Kardia'),
(3, 123564, 'Abdul Rohman'),
(4, 13941, 'Aril Noah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `registerpasien`
--
ALTER TABLE `registerpasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `registerpasien`
--
ALTER TABLE `registerpasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
