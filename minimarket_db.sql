-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2023 pada 09.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimarket_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_barang` int(11) NOT NULL,
  `Nama_Barang` varchar(20) NOT NULL,
  `Satuan` char(20) NOT NULL,
  `HargaSatuan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_barang`, `Nama_Barang`, `Satuan`, `HargaSatuan`) VALUES
(1, 'sabun', 'kg', 1000),
(2, 'minyak', 'L', 10000),
(6, 'shampo', 'sachet', 2000),
(7, 'tepung', 'kg', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `ID_Penjualan` int(11) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `Kuantitas` smallint(6) NOT NULL,
  `HargaSatuan` float NOT NULL,
  `Sub_Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `ID_Kasir` int(11) NOT NULL,
  `Username` char(10) NOT NULL,
  `NamaKasir` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `NomorHP` char(15) NOT NULL,
  `NomorKTP` char(20) NOT NULL,
  `Password` char(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`ID_Kasir`, `Username`, `NamaKasir`, `Alamat`, `NomorHP`, `NomorKTP`, `Password`) VALUES
(1, 'kasir', 'pawit wahib', 'ciputat', '08992824822', '3308171602970003', '$2y$10$iA3uC7fHmZCwpceH/MJ2kO8L2.LvqGrBvDc8lB8JRkaHms4RngVci'),
(2, 'pawit', 'pawit wahib', 'pondok kacang timur', '08992824823', '1836918123213', 'pawit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_Penjualan` int(11) NOT NULL,
  `WaktuTransaksi` datetime NOT NULL,
  `Total` float NOT NULL,
  `ID_Shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `ID_Shift` int(11) NOT NULL,
  `ID_Kasir` int(11) DEFAULT NULL,
  `WaktuBuka` datetime DEFAULT NULL,
  `SaldoAwal` double DEFAULT NULL,
  `JumlahPenjualan` double DEFAULT NULL,
  `SaldoAkhir` double DEFAULT NULL,
  `WaktuTutup` datetime DEFAULT NULL,
  `Status` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`ID_Shift`, `ID_Kasir`, `WaktuBuka`, `SaldoAwal`, `JumlahPenjualan`, `SaldoAkhir`, `WaktuTutup`, `Status`) VALUES
(5, 1, '2023-07-26 08:47:36', 100000, NULL, NULL, NULL, 'BUKA'),
(6, 1, '2023-07-26 08:50:09', 20000, NULL, NULL, NULL, 'BUKA'),
(7, 1, '2023-07-26 08:57:50', 10000, NULL, NULL, NULL, 'BUKA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`ID_Penjualan`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`ID_Kasir`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_Penjualan`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`ID_Shift`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `ID_Penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `ID_Kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_Penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `ID_Shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
