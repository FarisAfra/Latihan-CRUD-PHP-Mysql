-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 13.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `email`, `password`) VALUES
(1, 'farisafra', 'diafan74@gmail.com', '12345678'),
(2, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `domisili` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldivisi`
--

CREATE TABLE `tbldivisi` (
  `Kode_Divisi` varchar(5) NOT NULL,
  `Nama_Divisi` varchar(25) NOT NULL,
  `Pimpinan_Divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbldivisi`
--

INSERT INTO `tbldivisi` (`Kode_Divisi`, `Nama_Divisi`, `Pimpinan_Divisi`) VALUES
('S1', 'Gudang', 'ABCD'),
('S2', 'Produksi', 'EFGH'),
('S3', 'HRD', 'IJKL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpegawai`
--

CREATE TABLE `tblpegawai` (
  `NIP` int(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Kode Divisi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpegawai`
--

INSERT INTO `tblpegawai` (`NIP`, `Nama`, `Alamat`, `Tanggal_Lahir`, `Kode Divisi`) VALUES
(123, 'Faris Afra', 'Sempur', '2003-05-10', 'S1'),
(456, 'Afra Faris', 'Cirebon', '2023-05-10', 'S2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpresensi`
--

CREATE TABLE `tblpresensi` (
  `Tanggal` date NOT NULL,
  `NIP` int(10) NOT NULL,
  `Jam_Masuk` time NOT NULL,
  `Jam_Pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpresensi`
--

INSERT INTO `tblpresensi` (`Tanggal`, `NIP`, `Jam_Masuk`, `Jam_Pulang`) VALUES
('2024-06-10', 123, '16:30:00', '18:30:00'),
('2024-06-18', 456, '10:00:00', '12:00:00'),
('2024-06-10', 123, '16:30:00', '18:30:00'),
('2024-06-18', 456, '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `tes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tes`
--

INSERT INTO `tes` (`id`, `tes`) VALUES
(1, 'SELECT pg.NIP, pg.Nama, COUNT(p.Tanggal) AS Jumlah_Presensi\nFROM TblPresensi p\nJOIN TblPegawai pg ON p.NIP = pg.NIP\nWHERE p.Tanggal BETWEEN \'2018-01-01\' AND \'2018-01-31\'\nGROUP BY pg.NIP, pg.Nama;\n'),
(2, 'SELECT pg.NIP, pg.Nama, pg.Alamat, pg.Tanggal_lahir, pg.Kode_Divisi\r\nFROM TblPegawai pg\r\nWHERE MONTH(pg.Tanggal_lahir) = 11;\r\n'),
(3, 'SELECT d.Nama_divisi, COUNT(pg.NIP) AS Jumlah_Pegawai\r\nFROM TblPegawai pg\r\nJOIN TblDivisi d ON pg.Kode_Divisi = d.Kode_divisi\r\nGROUP BY d.Nama_divisi;\r\n'),
(4, 'SELECT pg.NIP, pg.Nama, pg.Alamat, pg.Tanggal_lahir, pg.Kode_Divisi\r\nFROM TblPegawai pg\r\nWHERE pg.Alamat LIKE \'%Bogor%\';\r\n'),
(5, 'SELECT pg.NIP, pg.Nama, pg.Alamat, pg.Tanggal_lahir, pg.Kode_Divisi\r\nFROM TblPegawai pg\r\nLEFT JOIN TblPresensi p ON pg.NIP = p.NIP AND p.Tanggal BETWEEN \'2018-01-01\' AND \'2018-01-31\'\r\nWHERE p.NIP IS N'),
(6, 'SELECT pg.NIP, pg.Nama, COALESCE(COUNT(p.Tanggal), 0) AS Jumlah_Presensi\r\nFROM TblPegawai pg\r\nLEFT JOIN TblPresensi p ON pg.NIP = p.NIP AND p.Tanggal BETWEEN \'2018-01-01\' AND \'2018-01-31\'\r\nGROUP BY pg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbldivisi`
--
ALTER TABLE `tbldivisi`
  ADD PRIMARY KEY (`Kode_Divisi`);

--
-- Indeks untuk tabel `tblpegawai`
--
ALTER TABLE `tblpegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `Kode Divisi` (`Kode Divisi`);

--
-- Indeks untuk tabel `tblpresensi`
--
ALTER TABLE `tblpresensi`
  ADD KEY `NIP` (`NIP`);

--
-- Indeks untuk tabel `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblpegawai`
--
ALTER TABLE `tblpegawai`
  MODIFY `NIP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT untuk tabel `tes`
--
ALTER TABLE `tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblpegawai`
--
ALTER TABLE `tblpegawai`
  ADD CONSTRAINT `tblpegawai_ibfk_1` FOREIGN KEY (`Kode Divisi`) REFERENCES `tbldivisi` (`Kode_Divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tblpresensi`
--
ALTER TABLE `tblpresensi`
  ADD CONSTRAINT `tblpresensi_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tblpegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
