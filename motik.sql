-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 06:31 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `idDokter` tinyint(5) UNSIGNED NOT NULL,
  `poli_idPoli` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `no_hp_dokter` varchar(15) DEFAULT NULL,
  `alamat_dokter` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`idDokter`, `poli_idPoli`, `username`, `password`, `nama_dokter`, `no_hp_dokter`, `alamat_dokter`) VALUES
(1, 2, 'drg. Muflih', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'drg. Muflih', '087878451245', 'dimana saja'),
(2, 2, 'drg. Deby', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'drg. Deby', '085750355687', 'dimana mana hatiku senang'),
(3, 1, 'dr. Danti', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'dr. Danti', '089693956879', 'siantan sanak sikit'),
(4, 1, 'dr. Akmal', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'dr. Akmal', '085432121345', 'ha dimane bosss'),
(5, 1, 'dr. Sahlan', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'dr. Sahlan', '08565632897', 'Ayoo dimana ayooo'),
(6, 3, 'dr. Indah', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'dr. Indah', '0865325784512', 'Eh KEPO'),
(7, 3, 'dr.Kusnadi', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'dr.Kusnadi', '069325487513', 'cieeeee'),
(9, 2, 'drg. Gina', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'drg. Gina', '085454878794', 'Jalan Budi Utomo'),
(10, 2, 'drg. Ijaa Madhani', '$2y$10$mcRB56.y1oQZ57hQRvZPjeVf0EkACR00fAUKgM8Cfdzxzl4KE10rG', 'drg. Ijaa Madhani', '08545487978', 'JAOHH BOOYY');

-- --------------------------------------------------------

--
-- Table structure for table `dokter_has_hari`
--

CREATE TABLE `dokter_has_hari` (
  `dokter_idDokter` tinyint(5) UNSIGNED NOT NULL,
  `hari_idHari` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter_has_hari`
--

INSERT INTO `dokter_has_hari` (`dokter_idDokter`, `hari_idHari`) VALUES
(1, 2),
(1, 3),
(1, 6),
(2, 4),
(2, 5),
(2, 7),
(3, 2),
(3, 3),
(3, 6),
(4, 4),
(4, 5),
(4, 7),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 6),
(6, 7),
(7, 5),
(7, 7),
(9, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `idHari` tinyint(2) NOT NULL,
  `nama_hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`idHari`, `nama_hari`) VALUES
(1, 'Minggu'),
(2, 'Senin'),
(3, 'Selasa'),
(4, 'Rabu'),
(5, 'Kamis'),
(6, 'Jumat'),
(7, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `idKota` int(10) UNSIGNED NOT NULL,
  `nama_kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`idKota`, `nama_kota`) VALUES
(3314, 'KABUPATEN SRAGEN'),
(3315, 'KABUPATEN GROBOGAN'),
(3316, 'KABUPATEN BLORA'),
(3317, 'KABUPATEN REMBANG'),
(3318, 'KABUPATEN PATI'),
(3319, 'KABUPATEN KUDUS'),
(3320, 'KABUPATEN JEPARA'),
(3321, 'KABUPATEN DEMAK'),
(3322, 'KABUPATEN SEMARANG'),
(3323, 'KABUPATEN TEMANGGUNG'),
(3324, 'KABUPATEN KENDAL'),
(3325, 'KABUPATEN BATANG'),
(3326, 'KABUPATEN PEKALONGAN'),
(3327, 'KABUPATEN PEMALANG'),
(3328, 'KABUPATEN TEGAL'),
(3329, 'KABUPATEN BREBES'),
(3371, 'KOTA MAGELANG'),
(3372, 'KOTA SURAKARTA'),
(3373, 'KOTA SALATIGA'),
(3374, 'KOTA SEMARANG'),
(3375, 'KOTA PEKALONGAN'),
(3376, 'KOTA TEGAL'),
(3401, 'KABUPATEN KULON PROGO'),
(3402, 'KABUPATEN BANTUL'),
(3403, 'KABUPATEN GUNUNG KIDUL'),
(3404, 'KABUPATEN SLEMAN'),
(3471, 'KOTA YOGYAKARTA'),
(3501, 'KABUPATEN PACITAN'),
(3502, 'KABUPATEN PONOROGO'),
(3503, 'KABUPATEN TRENGGALEK'),
(3504, 'KABUPATEN TULUNGAGUNG'),
(3505, 'KABUPATEN BLITAR'),
(3506, 'KABUPATEN KEDIRI'),
(3507, 'KABUPATEN MALANG'),
(3508, 'KABUPATEN LUMAJANG'),
(3509, 'KABUPATEN JEMBER'),
(3510, 'KABUPATEN BANYUWANGI'),
(3511, 'KABUPATEN BONDOWOSO'),
(3512, 'KABUPATEN SITUBONDO'),
(3513, 'KABUPATEN PROBOLINGGO'),
(3514, 'KABUPATEN PASURUAN'),
(3515, 'KABUPATEN SIDOARJO'),
(3516, 'KABUPATEN MOJOKERTO'),
(3517, 'KABUPATEN JOMBANG'),
(3518, 'KABUPATEN NGANJUK'),
(3519, 'KABUPATEN MADIUN'),
(3520, 'KABUPATEN MAGETAN'),
(3521, 'KABUPATEN NGAWI'),
(3522, 'KABUPATEN BOJONEGORO'),
(3523, 'KABUPATEN TUBAN');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kota_idKota` int(10) UNSIGNED NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `no_hp` varchar(17) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `daftar` datetime NOT NULL DEFAULT '2011-01-26 14:30:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kota_idKota`, `nama_pasien`, `no_hp`, `tgl_lahir`, `alamat`, `no_ktp`, `daftar`) VALUES
(3319, 'Farhan', '08959587645', '2000-11-14', 'Yogyajarta', '095689585656756', '2022-04-29 08:56:25'),
(3471, 'Egy Ihza Madhani', '0895606068325', '2022-04-18', 'pontianak', '1234567890', '2022-04-14 23:13:50'),
(3471, 'Siti Ayu Pratiwi', '085454879532', '1991-06-26', 'Pontianak', '7896543215487', '2022-04-29 08:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `pasien_has_pemeriksaan`
--

CREATE TABLE `pasien_has_pemeriksaan` (
  `idRiwayat` int(9) UNSIGNED NOT NULL,
  `dokter_idDokter` tinyint(5) UNSIGNED NOT NULL,
  `periksa_idPemeriksaan` int(10) UNSIGNED NOT NULL,
  `nama_Petugas` varchar(35) NOT NULL,
  `pasien_no_ktp` varchar(30) NOT NULL,
  `tanggal_periksa` datetime NOT NULL,
  `diagnosa` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `akses` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `idPemeriksaan` int(10) UNSIGNED NOT NULL,
  `nama_pemeriksaan` varchar(100) DEFAULT NULL,
  `harga` varchar(40) NOT NULL,
  `poli_idPoli` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`idPemeriksaan`, `nama_pemeriksaan`, `harga`, `poli_idPoli`) VALUES
(1, 'Check Up', '10000', 1),
(2, 'Test Urine', '30000', 1),
(3, 'Check Up Gigi', '20000', 2),
(4, 'Cabut dan Tambal Gigi', '100000', 2),
(5, 'Pasang Pagar Gigi', '150000', 2),
(6, 'Cek Kehamilan', '120000', 3),
(7, 'Imunisasi Anak', '65000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `idPetugas` int(10) UNSIGNED NOT NULL,
  `poli_idPoli` tinyint(3) UNSIGNED NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat_petugas` text DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `login_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`idPetugas`, `poli_idPoli`, `nama_petugas`, `no_hp`, `alamat_petugas`, `username`, `password`, `role`, `login_status`) VALUES
(1, 2, 'Dewi Motik Pramono, S.Kom ', '08784811380', NULL, 'motik', '$2y$10$2rHccRvhFWP0TbXH/l/.y.4bRrNyBsjnHlPdhgCb/ZU7xAcJAvJWe', 'supervisor', 1),
(2, 2, 'Egy Ihza Madhani, S.Pd', '0895606068325', 'JAUHNYEEEEE', 'ijaa06', '$2y$10$T.cc7zP.mKVksZ2Vz9OyEOZPJSajo8s1LqQ1NokHLB5rssTHNNIya', 'admin', 0),
(4, 3, 'M. Fikri hanif', '08455781235748', 'Pontianak', 'barunih', 'petugasbaru123', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `idPoli` tinyint(3) UNSIGNED NOT NULL,
  `nama_poli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`idPoli`, `nama_poli`) VALUES
(1, 'Poli Umum'),
(2, 'Poli Gigi'),
(3, 'Poli Ibu dan Anak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`idDokter`),
  ADD UNIQUE KEY `usernameUnique` (`username`),
  ADD KEY `dokter_FKIndex1` (`poli_idPoli`);

--
-- Indexes for table `dokter_has_hari`
--
ALTER TABLE `dokter_has_hari`
  ADD PRIMARY KEY (`dokter_idDokter`,`hari_idHari`),
  ADD KEY `dokter_has_hari_FKIndex1` (`dokter_idDokter`),
  ADD KEY `dokter_has_hari_FKIndex2` (`hari_idHari`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`idHari`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_ktp`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD KEY `pasien_FKIndex1` (`kota_idKota`);

--
-- Indexes for table `pasien_has_pemeriksaan`
--
ALTER TABLE `pasien_has_pemeriksaan`
  ADD PRIMARY KEY (`idRiwayat`,`dokter_idDokter`,`pasien_no_ktp`,`periksa_idPemeriksaan`) USING BTREE,
  ADD KEY `pasien_has_pemeriksaan_FKIndex1` (`pasien_no_ktp`),
  ADD KEY `pasien_has_pemeriksaan_FKIndex4` (`dokter_idDokter`),
  ADD KEY `pasien_has_pemeriksaan_FKIndex2` (`periksa_idPemeriksaan`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`idPemeriksaan`),
  ADD KEY `pemeriksaan_poli` (`poli_idPoli`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idPetugas`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `petugas_FKIndex1` (`poli_idPoli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`idPoli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `idDokter` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `idHari` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `idKota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3524;

--
-- AUTO_INCREMENT for table `pasien_has_pemeriksaan`
--
ALTER TABLE `pasien_has_pemeriksaan`
  MODIFY `idRiwayat` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `idPemeriksaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idPetugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `idPoli` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`poli_idPoli`) REFERENCES `poli` (`idPoli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter_has_hari`
--
ALTER TABLE `dokter_has_hari`
  ADD CONSTRAINT `dokter_has_hari_ibfk_1` FOREIGN KEY (`dokter_idDokter`) REFERENCES `dokter` (`idDokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_has_hari_ibfk_2` FOREIGN KEY (`hari_idHari`) REFERENCES `hari` (`idHari`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`kota_idKota`) REFERENCES `kota` (`idKota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_poli` FOREIGN KEY (`poli_idPoli`) REFERENCES `poli` (`idPoli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`poli_idPoli`) REFERENCES `poli` (`idPoli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
