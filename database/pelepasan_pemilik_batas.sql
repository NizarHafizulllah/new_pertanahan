-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2016 pada 23.12
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
-- Struktur dari tabel `pelepasan_pemilik_batas`
--

CREATE TABLE IF NOT EXISTS `pelepasan_pemilik_batas` (
`id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `temp_id_surat` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `sebagai` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `pelepasan_pemilik_batas`
--

INSERT INTO `pelepasan_pemilik_batas` (`id`, `id_surat`, `temp_id_surat`, `nama`, `jenis`, `sebagai`) VALUES
(5, 14, '9d9fa1308273b36ba82ca4db0170c4a9', 'SYIMIN', 'p', 'Ketua RT.001 kel.Sungaibaru '),
(6, 14, '9d9fa1308273b36ba82ca4db0170c4a9', 'Kasan', 't', ''),
(7, 14, '9d9fa1308273b36ba82ca4db0170c4a9', 'Fitrah Arisandi', 'p', 'Ketua RW 2'),
(8, 14, '9d9fa1308273b36ba82ca4db0170c4a9', 'Akbar Maulana', 't', ''),
(9, 12, '0027679ccb62b94563ef1d70529e376d', 'RIKARDUS', 'p', 'RT. 001 Kel. Sungai Daeng'),
(10, 12, '0027679ccb62b94563ef1d70529e376d', 'weqweqwe', 't', ''),
(11, 12, '0027679ccb62b94563ef1d70529e376d', 'sdafsdfsdfsd', 't', ''),
(12, 12, '0027679ccb62b94563ef1d70529e376d', 'sdfsdfsdfsd', 't', ''),
(13, 13, 'b396b62034c1ed3c20a4ee2dc7f0a723', 'RIKARDUS', 't', ''),
(14, 13, 'b396b62034c1ed3c20a4ee2dc7f0a723', 'sdfsdfsdfsdfsd', 't', ''),
(15, 13, 'b396b62034c1ed3c20a4ee2dc7f0a723', 'fsdfsdfsdf', 't', ''),
(16, 13, 'b396b62034c1ed3c20a4ee2dc7f0a723', 'sdfsdfsdfsdf', 't', ''),
(17, 13, 'b396b62034c1ed3c20a4ee2dc7f0a723', 'sdfsdfwefsdfds', 'p', 'Ketua RT. 001 Kel. Pagesangan'),
(18, 11, '', 'dfsdfsdfs', 't', 'sdfsdfsd'),
(19, 10, '', 'Akbar Maulana', 'p', 'hghghjhjiji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelepasan_pemilik_batas`
--
ALTER TABLE `pelepasan_pemilik_batas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelepasan_pemilik_batas`
--
ALTER TABLE `pelepasan_pemilik_batas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
