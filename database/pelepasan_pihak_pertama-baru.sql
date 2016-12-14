-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2016 pada 10.52
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pertanahandb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelepasan_pihak_pertama`
--

CREATE TABLE IF NOT EXISTS `pelepasan_pihak_pertama` (
`id` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `warga_negara` varchar(100) DEFAULT NULL,
  `status_kawin` char(5) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jk` char(20) DEFAULT NULL,
  `id_desa` char(13) DEFAULT NULL,
  `id_kecamatan` char(13) DEFAULT NULL,
  `temp_id_surat` char(32) DEFAULT NULL,
  `tgl_ktp` char(12) DEFAULT NULL,
  `tgl_berlaku_ktp` varchar(100) DEFAULT NULL,
  `id_surat` int(11) NOT NULL,
  `nama_pasangan` varchar(100) NOT NULL,
  `id_provinsi` varchar(15) NOT NULL,
  `id_kota` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `pelepasan_pihak_pertama`
--

INSERT INTO `pelepasan_pihak_pertama` (`id`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `umur`, `warga_negara`, `status_kawin`, `pekerjaan`, `alamat`, `jk`, `id_desa`, `id_kecamatan`, `temp_id_surat`, `tgl_ktp`, `tgl_berlaku_ktp`, `id_surat`, `nama_pasangan`, `id_provinsi`, `id_kota`) VALUES
(9, '2132131231231234223', 'Amir', 'SUMBAWA', '1974-06-20', 42, 'WNI', 'k', 'MAHASISWA', 'JLAN. OSAP SIO', 'p', '36_72_2_1001', '36_72_2', '', '12-13-1993', '2016', 11, 'Sri Hastuti', '31', '31_73'),
(12, '123123123', 'Siti Aisyah', 'Sumbawa', '1964-06-16', 52, 'WNI', 'tk', 'MAHASISWA', 'sadasdasd', 'l', '31_73_2_1004', '31_73_2', '', 'asdasdasd', 'sadasdasd', 11, 'Imran', '31', '31_73');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelepasan_pihak_pertama`
--
ALTER TABLE `pelepasan_pihak_pertama`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelepasan_pihak_pertama`
--
ALTER TABLE `pelepasan_pihak_pertama`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
