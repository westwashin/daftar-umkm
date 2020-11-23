-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2020 pada 10.26
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempendukung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `kd_beasiswa` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`kd_beasiswa`, `nama`) VALUES
(1, 'Beasiswa PPA'),
(2, 'Beasiswa BBP PPA'),
(3, 'Beasiswa BIDIKMISI'),
(5, 'Beasiswa BNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kd_hasil` int(11) NOT NULL,
  `kd_beasiswa` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `nilai` float DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`kd_hasil`, `kd_beasiswa`, `nim`, `nilai`, `tahun`) VALUES
(1, 1, '125610036', 0.95, '2017'),
(2, 1, '125610080', 0.6, '2017'),
(3, 1, '125610076', 0.566667, '2017'),
(4, 2, '125610036', 0.95, '2017'),
(5, 2, '125610080', 0.666667, '2017'),
(6, 2, '125610076', 0.5, '2017'),
(7, 3, '125610036', 0.866667, '2017'),
(8, 3, '125610076', 0.733333, '2017'),
(9, 3, '125610080', 0.533333, '2017'),
(13, 5, '125610036', 0.925, '2017'),
(14, 5, '125610080', 0.65, '2017'),
(15, 5, '125610076', 0.55, '2017'),
(16, 1, '125610098', 0.866667, '2017'),
(17, 2, '125610098', 0.733333, '2017'),
(18, 3, '125610098', 0.6, '2017'),
(20, 5, '125610098', 0.9, '2017'),
(21, 3, '125610036', 0.866667, '2020'),
(22, 3, '125610076', 0.733333, '2020'),
(23, 3, '125610098', 0.6, '2020'),
(24, 3, '125610080', 0.533333, '2020'),
(25, 1, '111111112', 0.85, '2020'),
(26, 1, '125610036', 0.7, '2020'),
(27, 1, '125610098', 0.65, '2020'),
(28, 1, '125610080', 0.475, '2020'),
(29, 1, '125610076', 0.425, '2020'),
(30, 2, '125610036', 0.95, '2020'),
(31, 2, '125610098', 0.733333, '2020'),
(32, 2, '125610080', 0.666667, '2020'),
(33, 2, '125610076', 0.5, '2020'),
(34, 5, '125610036', 0.925, '2020'),
(35, 5, '125610098', 0.9, '2020'),
(36, 5, '125610080', 0.65, '2020'),
(37, 5, '125610076', 0.55, '2020'),
(38, 2, '111111112', 0.85, '2020'),
(39, 3, '111111112', 0.933333, '2020'),
(40, 5, '111111112', 0.775, '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` int(11) NOT NULL,
  `kd_beasiswa` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sifat` enum('min','max') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `kd_beasiswa`, `nama`, `sifat`) VALUES
(1, 1, 'IPK', 'max'),
(2, 1, 'Semester', 'max'),
(3, 1, 'Penghasilan Orangtua', 'min'),
(4, 2, 'IPK', 'max'),
(5, 2, 'Semester', 'max'),
(6, 2, 'Penghasilan Orangtua', 'min'),
(7, 3, 'Semester', 'min'),
(8, 3, 'Penghasilan Orang Tua', 'min'),
(9, 3, 'Tanggungan Orang Tua', 'max'),
(14, 5, 'IPK', 'max'),
(15, 5, 'Semester', 'max'),
(16, 5, 'Penghasilan Orang Tua', 'min');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tahun_mengajukan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jenis_kelamin`, `tahun_mengajukan`) VALUES
('111111112', 'M Fadil Mardiansyah', 'Palembang', 'Laki-laki', '2020'),
('125610036', 'Alrifky Prayoga', 'Jogja', 'Laki-laki', '2020'),
('125610076', 'Annisa', 'palembang', 'Perempuan', '2020'),
('125610080', 'Syuja Zhafran', 'RIau', 'Laki-laki', '2020'),
('125610098', 'Angga Riski', 'Kudus', 'Laki-laki', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE `model` (
  `kd_model` int(11) NOT NULL,
  `kd_beasiswa` int(11) NOT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `bobot` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model`
--

INSERT INTO `model` (`kd_model`, `kd_beasiswa`, `kd_kriteria`, `bobot`) VALUES
(1, 1, 1, '0.50'),
(2, 1, 2, '0.20'),
(3, 1, 3, '0.30'),
(4, 2, 4, '0.40'),
(5, 2, 5, '0.20'),
(6, 2, 6, '0.40'),
(7, 3, 7, '0.40'),
(8, 3, 8, '0.40'),
(9, 3, 9, '0.20'),
(14, 5, 14, '0.40'),
(15, 5, 15, '0.30'),
(16, 5, 16, '0.30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `kd_beasiswa` int(11) DEFAULT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_beasiswa`, `kd_kriteria`, `nim`, `nilai`) VALUES
(1, 1, 1, '125610036', 2),
(2, 1, 2, '125610036', 3),
(3, 1, 3, '125610036', 2),
(4, 1, 1, '125610080', 1),
(5, 1, 2, '125610080', 4),
(6, 1, 3, '125610080', 4),
(7, 1, 1, '125610076', 1),
(8, 1, 2, '125610076', 2),
(9, 2, 4, '125610036', 3),
(10, 1, 3, '125610076', 3),
(11, 2, 5, '125610036', 3),
(12, 2, 6, '125610036', 2),
(13, 2, 4, '125610080', 2),
(14, 2, 5, '125610080', 4),
(15, 2, 6, '125610080', 4),
(16, 2, 4, '125610076', 1),
(17, 2, 5, '125610076', 2),
(18, 2, 6, '125610076', 3),
(19, 3, 7, '125610036', 3),
(20, 3, 8, '125610036', 2),
(21, 3, 9, '125610036', 3),
(22, 3, 7, '125610080', 4),
(23, 3, 8, '125610080', 4),
(24, 3, 9, '125610080', 2),
(25, 3, 7, '125610076', 2),
(26, 3, 8, '125610076', 3),
(27, 3, 9, '125610076', 1),
(40, 5, 14, '125610036', 2),
(41, 5, 15, '125610036', 3),
(42, 5, 16, '125610036', 2),
(43, 5, 14, '125610080', 1),
(44, 5, 15, '125610080', 4),
(45, 5, 16, '125610080', 4),
(46, 5, 14, '125610076', 1),
(47, 5, 15, '125610076', 2),
(48, 5, 16, '125610076', 3),
(49, 1, 1, '125610098', 2),
(50, 1, 2, '125610098', 4),
(51, 1, 3, '125610098', 3),
(52, 2, 4, '125610098', 2),
(53, 2, 5, '125610098', 4),
(54, 2, 6, '125610098', 3),
(55, 3, 7, '125610098', 4),
(56, 3, 8, '125610098', 3),
(57, 3, 9, '125610098', 2),
(62, 5, 14, '125610098', 2),
(63, 5, 15, '125610098', 4),
(64, 5, 16, '125610098', 3),
(84, 1, 1, '111111112', 4),
(85, 1, 2, '111111112', 1),
(86, 1, 3, '111111112', 2),
(87, 2, 4, '111111112', 4),
(88, 2, 5, '111111112', 1),
(89, 2, 6, '111111112', 2),
(90, 3, 7, '111111112', 1),
(91, 3, 8, '111111112', 2),
(92, 3, 9, '111111112', 2),
(93, 5, 14, '111111112', 4),
(94, 5, 15, '111111112', 1),
(95, 5, 16, '111111112', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `kd_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` enum('petugas','puket','mahasiswa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kd_pengguna`, `username`, `password`, `status`) VALUES
(1, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas'),
(2, 'puket', 'b679a71646e932b7c4647a081ee2a148', 'puket'),
(3, 'fadil', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas'),
(4, 'syuja', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(5, 'yoga', '827ccb0eea8a706c4c34a16891f84e7b', 'puket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` int(11) NOT NULL,
  `kd_beasiswa` int(11) DEFAULT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `bobot` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `kd_beasiswa`, `kd_kriteria`, `keterangan`, `bobot`) VALUES
(1, 1, 1, '3.00 - 3.20', 1),
(2, 1, 1, '3.21 - 3.40', 2),
(3, 1, 1, '3.41 - 3.50', 3),
(4, 1, 1, '>= 3.51', 4),
(5, 1, 2, '2 - 3', 1),
(6, 1, 2, '4 - 5', 2),
(7, 1, 2, '6 - 7', 3),
(8, 1, 2, '8', 4),
(9, 1, 3, '<= 500000', 1),
(10, 1, 3, '600000 - 1500000', 2),
(11, 1, 3, '1600000 - 2500000', 3),
(12, 1, 3, '>= 2600000', 4),
(13, 2, 4, '2.75 - 3.00', 1),
(14, 2, 4, '3.10 - 3.35', 2),
(15, 2, 4, '3.36 - 3.60', 3),
(16, 2, 4, '>= 3.61', 4),
(17, 2, 5, '2 - 3', 1),
(18, 2, 5, '4 - 5', 2),
(19, 2, 5, '6 - 7', 3),
(20, 2, 5, '8', 4),
(21, 2, 6, '<= 500000', 1),
(22, 2, 6, '600000 - 1500000', 2),
(23, 2, 6, '1600000 - 2500000', 3),
(24, 2, 6, '>= 2600000', 4),
(25, 3, 7, '2 - 3', 1),
(26, 3, 7, '4 - 5', 2),
(27, 3, 7, '6 - 7', 3),
(28, 3, 7, '8', 4),
(29, 3, 8, '<= 500000', 1),
(30, 3, 8, '600000 - 1500000', 2),
(31, 3, 8, '1600000 - 2500000', 3),
(32, 3, 8, '>= 2600000', 4),
(33, 3, 9, '1 - 2', 1),
(34, 3, 9, '3 - 4', 2),
(35, 3, 9, '5 - 6', 3),
(36, 3, 9, '>= 7', 4),
(51, 5, 14, '3.00 - 3.20', 1),
(52, 5, 14, '3.21 - 3.40', 2),
(53, 5, 14, '3.41 - 3.40', 3),
(54, 5, 14, '>= 3.61', 4),
(55, 5, 15, '2 - 3', 1),
(56, 5, 15, '4 - 5', 2),
(57, 5, 15, '6 - 7', 3),
(58, 5, 15, '8', 4),
(59, 5, 16, '<= 500000', 1),
(60, 5, 16, '600000 - 1500000', 2),
(61, 5, 16, '1600000 - 2500000', 3),
(62, 5, 16, '>= 2600000', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`kd_beasiswa`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kd_hasil`),
  ADD KEY `fk_mahasiswa` (`nim`),
  ADD KEY `fk_beasiswa` (`kd_beasiswa`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_beasiswa_2` (`kd_beasiswa`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`kd_model`),
  ADD KEY `fk_kriteria` (`kd_kriteria`),
  ADD KEY `fk_beasiswa` (`kd_beasiswa`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `fk_kriteria` (`kd_kriteria`),
  ADD KEY `fk_mahasiswa` (`nim`),
  ADD KEY `fk_beasiswa` (`kd_beasiswa`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `fk_kriteria` (`kd_kriteria`),
  ADD KEY `fk_beasiswa` (`kd_beasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `kd_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kd_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `model`
--
ALTER TABLE `model`
  MODIFY `kd_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kd_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kd_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`kd_beasiswa`) REFERENCES `beasiswa` (`kd_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `fk_beasiswa` FOREIGN KEY (`kd_beasiswa`) REFERENCES `beasiswa` (`kd_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`kd_beasiswa`) REFERENCES `beasiswa` (`kd_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kd_beasiswa`) REFERENCES `beasiswa` (`kd_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`kd_beasiswa`) REFERENCES `beasiswa` (`kd_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
