-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jan 2018 pada 15.28
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `properti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tanah`
--

CREATE TABLE IF NOT EXISTS `detail_tanah` (
  `id_wilayah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tanah` varchar(100) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `luas_sisa` varchar(100) NOT NULL,
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `detail_tanah`
--

INSERT INTO `detail_tanah` (`id_wilayah`, `nama_tanah`, `lokasi`, `luas`, `jenis`, `luas_sisa`) VALUES
(1, 'Tanah Kalijati Subang', 'Jalan Kalijati Subang', '80000', 'Kebun', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_tanah`
--

CREATE TABLE IF NOT EXISTS `pemakaian_tanah` (
  `id_pemakaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `nama_proyek` varchar(200) NOT NULL,
  `luas_dipakai` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pemakaian`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_tanah`
--

CREATE TABLE IF NOT EXISTS `pembelian_tanah` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `pemilik` varchar(200) NOT NULL,
  `luas` varchar(200) NOT NULL,
  `harga_beli` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rab_jumlah_unit`
--

CREATE TABLE IF NOT EXISTS `rab_jumlah_unit` (
  `id_jumlah_unit` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `persen_tanah` varchar(20) NOT NULL,
  `luas` int(20) NOT NULL,
  `tanah` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  PRIMARY KEY (`id_jumlah_unit`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rab_land_used`
--

CREATE TABLE IF NOT EXISTS `rab_land_used` (
  `id_rab_land_used` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `land_used` int(20) NOT NULL,
  `per_luas_tanah` int(20) NOT NULL,
  `luas` int(20) NOT NULL,
  `per_luas_tanah_1` int(20) NOT NULL,
  `luas1` int(20) NOT NULL,
  PRIMARY KEY (`id_rab_land_used`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat_tanah`
--

CREATE TABLE IF NOT EXISTS `sertifikat_tanah` (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `nama_sertifikat` varchar(300) NOT NULL,
  `berkas_sertifikat` varchar(200) NOT NULL,
  PRIMARY KEY (`id_sertifikat`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `jabatan`, `telpon`, `photo`) VALUES
(1, 'developer', '123', 'Datun', 'Developer', '0813', '1516786954525.jpg'),
(2, 'bendahara', '123', 'Restu', 'Bendahara', '0812', '');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemakaian_tanah`
--
ALTER TABLE `pemakaian_tanah`
  ADD CONSTRAINT `pemakaian_tanah_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `detail_tanah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_tanah`
--
ALTER TABLE `pembelian_tanah`
  ADD CONSTRAINT `pembelian_tanah_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `detail_tanah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD CONSTRAINT `sertifikat_tanah_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `detail_tanah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
