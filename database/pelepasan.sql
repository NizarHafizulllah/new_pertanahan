-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2016 pada 23.11
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
-- Struktur dari tabel `pelepasan`
--
drop table pelepasan; 


CREATE TABLE IF NOT EXISTS `pelepasan` (
`id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `propinsi` varchar(15) NOT NULL,
  `kabupaten` varchar(15) NOT NULL,
  `kecamatan` varchar(15) NOT NULL,
  `desa` varchar(15) NOT NULL,
  `wilayah` text NOT NULL,
  `panjang_batas_utara` varchar(100) NOT NULL,
  `panjang_batas_timur` varchar(100) NOT NULL,
  `panjang_batas_barat` varchar(100) NOT NULL,
  `panjang_batas_selatan` varchar(100) NOT NULL,
  `nama_batas_utara` varchar(100) NOT NULL,
  `nama_batas_timur` varchar(100) NOT NULL,
  `nama_batas_selatan` varchar(100) NOT NULL,
  `nama_batas_barat` varchar(100) NOT NULL,
  `biaya_ganti_rugi` double(10,2) NOT NULL,
  `nama_pihak_pertama` varchar(100) NOT NULL,
  `umur_pihak_pertama` int(3) NOT NULL,
  `wn_pihak_pertama` varchar(50) NOT NULL,
  `jenis_kelamin_pihak_pertama` varchar(2) NOT NULL,
  `status_kawin_pihak_pertama` varchar(2) NOT NULL,
  `pekerjaan_pihak_pertama` varchar(100) NOT NULL,
  `alamat_pihak_pertama` text NOT NULL,
  `desa_pihak_pertama` varchar(15) NOT NULL,
  `kecamatan_pihak_pertama` varchar(15) NOT NULL,
  `kabupaten_pihak_pertama` varchar(15) NOT NULL,
  `tgl_lahir_pihak_pertama` date NOT NULL,
  `nama_pasangan_pihak_pertama` varchar(100) NOT NULL,
  `nama_pihak_kedua` varchar(100) NOT NULL,
  `umur_pihak_kedua` int(3) NOT NULL,
  `wn_pihak_kedua` varchar(50) NOT NULL,
  `pekerjaan_pihak_kedua` varchar(100) NOT NULL,
  `alamat_pihak_kedua` text NOT NULL,
  `desa_pihak_kedua` varchar(15) NOT NULL,
  `kecamatan_pihak_kedua` varchar(15) NOT NULL,
  `kabupaten_pihak_kedua` varchar(15) NOT NULL,
  `tgl_lahir_pihak_kedua` date NOT NULL,
  `nama_camat` varchar(100) NOT NULL,
  `jabatan_camat` varchar(50) NOT NULL,
  `nip_camat` varchar(50) NOT NULL,
  `provinsi_pihak_pertama` varchar(15) NOT NULL,
  `provinsi_pihak_kedua` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `nama_kades` varchar(100) NOT NULL,
  `jabatan_kades` varchar(50) NOT NULL,
  `pengukur` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `pelepasan`
--

INSERT INTO `pelepasan` (`id`, `no_surat`, `tanggal`, `propinsi`, `kabupaten`, `kecamatan`, `desa`, `wilayah`, `panjang_batas_utara`, `panjang_batas_timur`, `panjang_batas_barat`, `panjang_batas_selatan`, `nama_batas_utara`, `nama_batas_timur`, `nama_batas_selatan`, `nama_batas_barat`, `biaya_ganti_rugi`, `nama_pihak_pertama`, `umur_pihak_pertama`, `wn_pihak_pertama`, `jenis_kelamin_pihak_pertama`, `status_kawin_pihak_pertama`, `pekerjaan_pihak_pertama`, `alamat_pihak_pertama`, `desa_pihak_pertama`, `kecamatan_pihak_pertama`, `kabupaten_pihak_pertama`, `tgl_lahir_pihak_pertama`, `nama_pasangan_pihak_pertama`, `nama_pihak_kedua`, `umur_pihak_kedua`, `wn_pihak_kedua`, `pekerjaan_pihak_kedua`, `alamat_pihak_kedua`, `desa_pihak_kedua`, `kecamatan_pihak_kedua`, `kabupaten_pihak_kedua`, `tgl_lahir_pihak_kedua`, `nama_camat`, `jabatan_camat`, `nip_camat`, `provinsi_pihak_pertama`, `provinsi_pihak_kedua`, `status`, `nama_kades`, `jabatan_kades`, `pengukur`) VALUES
(10, '592.23/3/LEG/01/2016', '2016-12-15', '19', '19_5', '', '19_5_1_1001', 'Jlan. Osap Sio Gg. III', '± 100 meter, ± 75 meter, ± 30,50 meter, ± 51,31 meter', '± 105 meter', '± 100 meter, ± 75 meter, ± 30,50 meter, ± 51,31 meter', '± 160 meter', 'tanah M.Yamin', 'tanah Alm. M.Saleh', 'tanah Riswandi Setiabudi', 'M.Yamin dan tanah Syaiful', 5000000.00, '', 0, '', '', '', '', '', '', '', '', '0000-00-00', '', 'THEN LAN TJIN', 42, 'Indonesia', 'Mengurus Rumah Tangga', 'Jlan. Osap Sio III', '64_74_2_1002', '64_74_2', '64_74', '0000-00-00', '', '', '', '', '64', 0, '', '', 'VICKO ANDRIANUS'),
(11, '592.23/3/LEG/01/2016', '2016-12-15', '19', '19_5', '19_5_1', '19_5_1_1001', 'Jlan. Osap Sio Gg. III', '± 100 meter, ± 75 meter, ± 30,50 meter, ± 51,31 meter', '± 105 meter', '± 100 meter, ± 75 meter, ± 30,50 meter, ± 51,31 meter', '± 160 meter', 'tanah M.Yamin', 'tanah Alm. M.Saleh', 'tanah Riswandi Setiabudi', 'M.Yamin dan tanah Syaiful', 8000000.00, '', 0, '', '', '', '', '', '', '', '', '0000-00-00', '', 'Maulana', 42, 'Indonesia', 'Mengurus Rumah Tangga', 'Jlan. Osap Sio III', '64_74_2_1002', '64_74_2', '64_74', '0000-00-00', 'Nizar Hafizullah', 'Pembina I ', '1133234324', '', '64', 0, '', '', 'VICKO ANDRIANUS'),
(12, '592.23/4/LEG/01/2016', '2016-12-28', '19', '19_5', '19_5_1', '19_5_1_1001', 'sdfsdfsdfsdfsdfsd', 'sdfdsfsdf', 'sdfsdfsdfsd', '12312efsfsdf', 'sdfsdfsdf', 'sdfsdfsdfs', 'sdfsdfsdfs', 'sdfsdfsdfs', 'sdfsdfsdfsd', 8000000.00, '', 0, '', '', '', '', '', '', '', '', '0000-00-00', '', 'Evendi', 45, 'Indonesia', 'Wiraswasta', 'Jlan. Osap Sio III', '32_74_5_1005', '32_74_5', '32_74', '0000-00-00', 'Nizar Hafizullah', 'Pembina I ', '1133234324', '', '32', 0, 'ADHIAN ZULHAJJANY EL P, S. STP', 'PLT. LURAH TANJUNG', 'VICKO ANDRIANUS'),
(13, '592.23/5/LEG/01/2016', '2016-12-21', '19', '19_5', '19_5_1', '19_5_1_1001', 'fmkdknfjsndfns', 'nfjndjnjdn', 'jfjsnfjndjfnjn', 'iansjdnsj', 'fndvnsljdnnj', 'jnfjdnjfnd', 'nvjdnjvsjdjn', 'nfjdnjfn', 'njfjsnfjsnjn', 8000000.00, '', 0, '', '', '', '', '', '', '', '', '0000-00-00', '', 'M. Sandy Tyas ', 20, 'Indonesia', 'Mahasiswa', 'Jln. Pagesangan', '52_71_2_1001', '52_71_2', '52_71', '0000-00-00', 'Nizar Hafizullah', 'Pembina I ', '1133234324', '', '52', 0, 'ADHIAN ZULHAJJANY EL P, S. STP', 'PLT. LURAH TANJUNG', 'VICKO ANDRIANUS'),
(14, '592.23/6/LEG/01/2016', '2016-12-20', '19', '19_5', '19_5_1', '19_5_1_1001', 'Jln. Osap Sio III', '± 100 meter, ± 75 meter, ± 30,50 meter, ± 51,31 meter', '± 12,50 Meter', '± 100 meter, ± 75 meter, ± 30,50 meter, ± 51,31 meter', '± 160 meter', 'Kebun Anton dan Hutan', 'tanah Alm. M.Saleh', 'tanah Riswandi Setiabudi', 'M.Yamin dan tanah Syaiful', 5000000.00, '', 0, '', '', '', '', '', '', '', '', '0000-00-00', '', 'THEN LAN TJIN', 42, 'Indonesia', 'Mengurus Rumah Tangga', 'sdasfgsdfsd sdfsdfsdf', '36_2_18_2014', '36_2_18', '36_2', '0000-00-00', 'Nizar Hafizullah', 'Pembina I ', '1133234324', '', '36', 0, 'ADHIAN ZULHAJJANY EL P, S. STP', 'PLT. LURAH TANJUNG', 'VICKO ANDRIANUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelepasan`
--
ALTER TABLE `pelepasan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelepasan`
--
ALTER TABLE `pelepasan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
