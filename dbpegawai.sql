-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 13.23
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
-- Database: `dbpegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldivisi`
--

CREATE TABLE `tbldivisi` (
  `Kode_divisi` varchar(10) NOT NULL,
  `Nama_divisi` varchar(255) DEFAULT NULL,
  `Pimpinan_divisi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbldivisi`
--

INSERT INTO `tbldivisi` (`Kode_divisi`, `Nama_divisi`, `Pimpinan_divisi`) VALUES
('S1', 'Gudang', 'Beni Permana, SE'),
('S2', 'Produksi', 'Syaiful Bachri, ST'),
('S3', 'HRD', 'Dr. Anggit Darmawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpegawai`
--

CREATE TABLE `tblpegawai` (
  `NIP` int(11) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Tanggal_lahir` date DEFAULT NULL,
  `Kode_Divisi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpegawai`
--

INSERT INTO `tblpegawai` (`NIP`, `Nama`, `Alamat`, `Tanggal_lahir`, `Kode_Divisi`) VALUES
(11234, 'Arini Nikita', 'Jl. Dedali Putih 5A Tangerang', '1988-01-02', 'S1'),
(11235, 'Toni Purana', 'Jl. Temenggung 21B Jakarta Selatan', '1983-04-04', 'S2'),
(11236, 'Gigih Prayitno', 'Jl. Sidopekso 65 Bandung', '1985-11-08', 'S3'),
(11237, 'Hilda Rahmawa', 'Jl. Mendut 12 Bogor', '1986-11-01', 'S2'),
(11238, 'Miftachul Fauza', 'Jl. Borobudur 1 Bogor', '1984-09-05', 'S1'),
(11239, 'Katirlia Tirta', 'Jl. Kenanga 21 Jakarta Timur', '1984-07-05', 'S1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpresensi`
--

CREATE TABLE `tblpresensi` (
  `Tanggal` date DEFAULT NULL,
  `NIP` int(11) DEFAULT NULL,
  `Jam_Masuk` time DEFAULT NULL,
  `Jam_Pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpresensi`
--

INSERT INTO `tblpresensi` (`Tanggal`, `NIP`, `Jam_Masuk`, `Jam_Pulang`) VALUES
('2018-01-02', 11234, '08:10:00', '17:40:00'),
('2018-01-02', 11235, '08:00:00', '17:07:00'),
('2018-01-02', 11236, '08:05:00', '16:30:00'),
('2018-01-03', 11234, '07:45:00', '16:20:00'),
('2018-01-03', 11235, '07:50:00', '17:45:00'),
('2018-01-03', 11236, '07:55:00', '16:35:00'),
('2018-01-05', 11234, '07:20:00', '16:20:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbldivisi`
--
ALTER TABLE `tbldivisi`
  ADD PRIMARY KEY (`Kode_divisi`);

--
-- Indeks untuk tabel `tblpegawai`
--
ALTER TABLE `tblpegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `Kode_Divisi` (`Kode_Divisi`);

--
-- Indeks untuk tabel `tblpresensi`
--
ALTER TABLE `tblpresensi`
  ADD KEY `NIP` (`NIP`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblpegawai`
--
ALTER TABLE `tblpegawai`
  ADD CONSTRAINT `tblpegawai_ibfk_1` FOREIGN KEY (`Kode_Divisi`) REFERENCES `tbldivisi` (`Kode_divisi`);

--
-- Ketidakleluasaan untuk tabel `tblpresensi`
--
ALTER TABLE `tblpresensi`
  ADD CONSTRAINT `tblpresensi_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tblpegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
