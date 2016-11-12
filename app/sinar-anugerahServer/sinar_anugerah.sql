-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2016 pada 04.25
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sinar_anugerah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('a1cf82ed4a35e2b1676da0f6b1c9b5d6', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452849769, 'a:7:{s:9:"user_data";s:0:"";s:2:"ID";s:5:"Pg011";s:8:"USERNAME";s:11:"pergudangan";s:4:"PASS";s:32:"3115b2701a9679f3bfcc97db3772cc2e";s:4:"NAME";s:18:"Divisi Pergudangan";s:5:"LEVEL";s:6:"gudang";s:12:"login_status";b:1;}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `kd_supplier` varchar(5) NOT NULL,
  `stok` int(10) NOT NULL,
  `rusak` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `id_jenis_barang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nm_barang`, `kd_supplier`, `stok`, `rusak`, `harga`, `id_jenis_barang`) VALUES
('Br001', 'Djarum Super Black', 'Sp002', 90, 0, 39000, 'Jb004'),
('Br002', 'Djarum Super Mentol', 'Sp002', 99, 0, 54000, 'Jb004'),
('Br003', 'Yakult', 'Sp003', 179, 0, 39000, 'Jb003'),
('Br004', 'Kipas', 'Sp001', 175, 0, 80000, 'Jb002'),
('Br005', 'Flasdisk Sandisk 8 Gb', 'Sp001', 199, 0, 78000, 'Jb002'),
('Br006', 'Headset Samsung', 'Sp001', 139, 0, 40000, 'Jb002'),
('Br007', 'Flasdisk Sandisk 4 Gb', 'Sp001', 177, 0, 49000, 'Jb002'),
('Br008', 'Sound Advance Mini', 'Sp001', 74, 0, 79000, 'Jb002'),
('Br009', 'Balsem Otot Geliga', 'Sp003', 90, 0, 3000, 'Jb004'),
('Br010', 'Pepsi 300ml', 'Sp003', 145, 0, 3000, 'Jb003'),
('Br011', 'Floridina Orange 360ml', 'Sp003', 719, 0, 3500, 'Jb003'),
('Br012', 'Djarum Super Mild', 'Sp002', 460, 0, 64000, 'Jb004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE IF NOT EXISTS `tbl_barang_masuk` (
  `kd_barang_masuk` varchar(30) NOT NULL,
  `kd_pegawai` varchar(5) NOT NULL,
  `kd_supplier` varchar(5) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`kd_barang_masuk`, `kd_pegawai`, `kd_supplier`, `tanggal_masuk`) VALUES
('1', 'Pg001', 'Sp003', '2016-01-15'),
('12', 'Pg001', 'Sp002', '2016-01-15'),
('Jk0', 'Pg001', 'Sp003', '2016-01-15'),
('Jk092', 'Pg001', 'Sp002', '2016-01-15'),
('Jk0928', 'Pg001', 'Sp001', '2016-01-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_barang_masuk_detail` (
  `kd_barang_masuk` varchar(30) NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `d_rusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang_masuk_detail`
--

INSERT INTO `tbl_barang_masuk_detail` (`kd_barang_masuk`, `kd_barang`, `qty`, `d_rusak`) VALUES
('Jk0928', 'Br004', 89, 11),
('Jk0928', 'Br005', 88, 12),
('Jk0928', 'Br006', 78, 1),
('Jk0928', 'Br007', 90, 10),
('Jk092', 'Br002', 56, 12),
('Jk092', 'Br012', 90, 1),
('Jk092', 'Br001', 99, 12),
('1', 'Br009', 313, 2),
('1', 'Br010', 31, 1),
('1', 'Br011', 411, 2),
('1', 'Br003', 99, 1),
('12', 'Br001', 32, 1),
('12', 'Br012', 321, 3),
('Jk0', 'Br009', 32, 1),
('Jk0', 'Br011', 222, 1),
('Jk0', 'Br010', 32, 2);

--
-- Trigger `tbl_barang_masuk_detail`
--
DELIMITER //
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `tbl_barang_masuk_detail`
 FOR EACH ROW update tbl_barang set stok = stok + new.qty, rusak = rusak + new.d_rusak
    where kd_barang = new.kd_barang
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `barang_masuk_cancel` AFTER DELETE ON `tbl_barang_masuk_detail`
 FOR EACH ROW update tbl_barang set stok = stok - old.qty, rusak = rusak - old.d_rusak
where kd_barang = old.kd_barang
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_confirm_rusak`
--

CREATE TABLE IF NOT EXISTS `tbl_confirm_rusak` (
`id2` int(11) NOT NULL,
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `d_rusak` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `tbl_confirm_rusak`
--

INSERT INTO `tbl_confirm_rusak` (`id2`, `kd_penjualan`, `kd_barang`, `d_rusak`, `ket`) VALUES
(5, 'Pn004', 'Br012', 12, 'kardus penyok'),
(6, 'Pn004', 'Br006', 1, 'kardus penyok'),
(7, 'Pn003', 'Br006', 6, 'kardus penyok'),
(8, 'Pn003', 'Br011', 3, 'kardus penyok'),
(9, 'Pn003', 'Br003', 1, 'kardus penyok'),
(10, 'Pn002', 'Br007', 1, 'kardus penyok'),
(11, 'Pn002', 'Br006', 1, 'Rusak di jalan'),
(12, 'Pn003', 'Br009', 1, 'kardus penyok'),
(13, 'Pn001', 'Br002', 1, 'kardus penyok'),
(14, 'Pn007', 'Br001', 1, 'kardus penyok');

--
-- Trigger `tbl_confirm_rusak`
--
DELIMITER //
CREATE TRIGGER `laporan` BEFORE DELETE ON `tbl_confirm_rusak`
 FOR EACH ROW insert into tbl_laporan_rusak (kd_barang,kd_penjualan,l_rusak,l_ket,tanggal_rs)
values (old.kd_barang, old.kd_penjualan,old.d_rusak,old.ket,sysdate())
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `terima` BEFORE INSERT ON `tbl_confirm_rusak`
 FOR EACH ROW update tbl_barang set stok = stok - new.d_rusak, rusak = rusak + new.d_rusak
where kd_barang = new.kd_barang
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`id` int(1) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'Sinar Anugerah', 'Lampung', '083894774443', 'dieabra@gmail.com', 'http://sinar-anugerah', 'Wahyuri', 'Supplier Barang ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_jenis_barang` (
  `id_jenis_barang` varchar(5) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_barang`
--

INSERT INTO `tbl_jenis_barang` (`id_jenis_barang`, `jenis_barang`) VALUES
('Jb001', 'Makanan'),
('Jb002', 'Elektronik'),
('Jb003', 'Minuman'),
('Jb004', 'Lain Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_rusak`
--

CREATE TABLE IF NOT EXISTS `tbl_laporan_rusak` (
`id` int(5) NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `kd_penjualan` varchar(5) NOT NULL,
  `l_rusak` int(11) NOT NULL,
  `l_ket` varchar(200) NOT NULL,
  `tanggal_rs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level_akses`
--

CREATE TABLE IF NOT EXISTS `tbl_level_akses` (
`id` int(20) NOT NULL,
  `level` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_level_akses`
--

INSERT INTO `tbl_level_akses` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'pegawai gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `kd_pegawai` varchar(5) NOT NULL DEFAULT '0',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('pegawai','admin','gudang') DEFAULT 'pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `username`, `password`, `nama`, `level`) VALUES
('Pg001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Aldy Muldani', 'admin'),
('Pg002', 'saiful', '4eeccab0e8c08e16a1d08296265e38fa', 'Saiful', 'gudang'),
('Pg003', 'roni', 'd78b154c99fe7f06ebc02ebd63d1c87c', 'Roni', 'pegawai'),
('Pg004', 'angga', '8479c86c7afcb56631104f5ce5d6de62', 'Angga', 'gudang'),
('Pg005', 'agus', 'fdf169558242ee051cca1479770ebac3', 'Agus', 'gudang'),
('Pg006', 'wahyuri', 'eec6aa4436c073d2c997c581ecc49791', 'Wahyuri', 'admin'),
('Pg007', 'alldie', '65f8625018f1f6b85231dcef88373557', 'Aldy Muldani', ''),
('Pg010', 'penjualan', '13bf2c8effae21d17a277520aa9b9277', 'Divisi Sales', 'pegawai'),
('Pg011', 'pergudangan', '3115b2701a9679f3bfcc97db3772cc2e', 'Divisi Pergudangan', 'gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `kd_pelanggan` varchar(5) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`kd_pelanggan`, `nm_pelanggan`, `alamat`, `email`) VALUES
('P-001', 'Toko Lenteng', 'Jl Sinar Mas no 12', '089132675238'),
('P-002', 'Toko Sinar Agung', 'Jl Merdeka Selatan no 15 gang ', '089635461324');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_detail` (
`id` int(20) NOT NULL,
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `rusak` int(10) NOT NULL,
  `return_dt` varchar(5) NOT NULL,
  `status` enum('proses','diterima','ditolak') NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`id`, `kd_penjualan`, `kd_barang`, `qty`, `rusak`, `return_dt`, `status`, `ket`) VALUES
(36, 'Pn001', 'Br001', 12, 1, 'yes', 'ditolak', 'kardus penyok'),
(37, 'Pn001', 'Br002', 12, 1, 'yes', 'diterima', 'kardus penyok'),
(38, 'Pn001', 'Br004', 22, 0, '', 'proses', ''),
(39, 'Pn002', 'Br007', 21, 1, 'yes', 'diterima', 'kardus penyok'),
(40, 'Pn002', 'Br006', 21, 1, 'yes', 'diterima', 'Rusak di jalan'),
(41, 'Pn002', 'Br011', 12, 0, '', 'proses', ''),
(42, 'Pn003', 'Br008', 21, 0, '', 'proses', ''),
(43, 'Pn003', 'Br010', 21, 0, '', 'proses', ''),
(44, 'Pn003', 'Br006', 14, 6, 'yes', 'diterima', 'kardus penyok'),
(45, 'Pn003', 'Br003', 21, 1, 'yes', 'diterima', 'kardus penyok'),
(46, 'Pn003', 'Br007', 2, 0, '', 'proses', ''),
(47, 'Pn003', 'Br009', 21, 1, 'yes', 'diterima', 'kardus penyok'),
(48, 'Pn003', 'Br011', 2, 3, 'yes', 'diterima', 'kardus penyok'),
(49, 'Pn004', 'Br006', 5, 1, 'yes', 'diterima', 'kardus penyok'),
(50, 'Pn004', 'Br008', 5, 0, '', 'proses', ''),
(51, 'Pn004', 'Br012', 55, 12, 'yes', 'diterima', 'kardus penyok'),
(52, 'Pn004', 'Br002', 3, 1, 'yes', 'ditolak', 'kardus penyok'),
(53, 'Pn004', 'Br011', 3, 0, '', 'proses', ''),
(54, 'Pn005', 'Br002', 20, 1, 'yes', 'ditolak', 'kardus penyok'),
(55, 'Pn006', 'Br001', 34, 0, '', 'proses', ''),
(56, 'Pn006', 'Br002', 34, 0, '', 'proses', ''),
(57, 'Pn007', 'Br001', 10, 1, 'yes', 'diterima', 'kardus penyok'),
(58, 'Pn007', 'Br009', 10, 0, '', 'proses', '');

--
-- Trigger `tbl_penjualan_detail`
--
DELIMITER //
CREATE TRIGGER `cancel_penjualan` BEFORE DELETE ON `tbl_penjualan_detail`
 FOR EACH ROW update tbl_barang set stok = stok + old.qty 
where kd_barang = old.kd_barang
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `masuk_jual` AFTER INSERT ON `tbl_penjualan_detail`
 FOR EACH ROW update tbl_barang set stok = stok - new.qty
    where kd_barang = new.kd_barang
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_header`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_header` (
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `kd_pegawai` varchar(5) DEFAULT NULL,
  `dt_return` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan_header`
--

INSERT INTO `tbl_penjualan_header` (`kd_penjualan`, `kd_pelanggan`, `total_harga`, `tanggal_penjualan`, `kd_pegawai`, `dt_return`) VALUES
('Pn001', 'P-001', 2876000, '2016-01-15', 'Pg001', 'yes'),
('Pn002', 'P-001', 1911000, '2016-01-15', 'Pg001', 'yes'),
('Pn003', 'P-001', 3269000, '2016-01-15', 'Pg001', 'yes'),
('Pn004', 'P-001', 4287500, '2016-01-15', 'Pg001', 'yes'),
('Pn005', '', 1080000, '2016-01-15', 'Pg003', 'yes'),
('Pn006', 'P-001', 3162000, '2016-01-15', 'Pg001', ''),
('Pn007', 'P-002', 420000, '2016-01-15', 'Pg001', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `kd_supplier` varchar(5) NOT NULL,
  `nm_supplier` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `email`) VALUES
('Sp001', 'PT Surya Kencana', 'Jl Kecapi Selatan no 15 gang B', 'sljf@sdflk.com'),
('Sp002', 'PT Djarum Super tbk', 'Lampung Tengah', 'djarum_super@gmail.com'),
('Sp003', 'PT Serambi Mekkah', 'Jl Merdeka Selatan no 10', '089132675238');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
 ADD PRIMARY KEY (`kd_barang`), ADD KEY `tbl_barang_ibfk_2` (`kd_supplier`), ADD KEY `tbl_barang_ibfk_1` (`id_jenis_barang`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
 ADD PRIMARY KEY (`kd_barang_masuk`), ADD KEY `kd_pegawai` (`kd_pegawai`), ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `tbl_barang_masuk_detail`
--
ALTER TABLE `tbl_barang_masuk_detail`
 ADD KEY `tbl_barang_masuk_detail_ibfk_2` (`kd_barang`), ADD KEY `kd_barang_masuk` (`kd_barang_masuk`);

--
-- Indexes for table `tbl_confirm_rusak`
--
ALTER TABLE `tbl_confirm_rusak`
 ADD PRIMARY KEY (`id2`), ADD KEY `tbl_confirm_rusak_ibfk_1` (`kd_penjualan`), ADD KEY `tbl_confirm_rusak_ibfk_2` (`kd_barang`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_barang`
--
ALTER TABLE `tbl_jenis_barang`
 ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `tbl_laporan_rusak`
--
ALTER TABLE `tbl_laporan_rusak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level_akses`
--
ALTER TABLE `tbl_level_akses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
 ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
 ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `tbl_penjualan_detail_ibfk_1` (`kd_penjualan`), ADD KEY `tbl_penjualan_detail_ibfk_2` (`kd_barang`);

--
-- Indexes for table `tbl_penjualan_header`
--
ALTER TABLE `tbl_penjualan_header`
 ADD PRIMARY KEY (`kd_penjualan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
 ADD PRIMARY KEY (`kd_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_confirm_rusak`
--
ALTER TABLE `tbl_confirm_rusak`
MODIFY `id2` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_laporan_rusak`
--
ALTER TABLE `tbl_laporan_rusak`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_level_akses`
--
ALTER TABLE `tbl_level_akses`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_jenis_barang`) REFERENCES `tbl_jenis_barang` (`id_jenis_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`kd_supplier`) REFERENCES `tb_supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
ADD CONSTRAINT `tbl_barang_masuk_ibfk_2` FOREIGN KEY (`kd_pegawai`) REFERENCES `tbl_pegawai` (`kd_pegawai`),
ADD CONSTRAINT `tbl_barang_masuk_ibfk_3` FOREIGN KEY (`kd_supplier`) REFERENCES `tb_supplier` (`kd_supplier`),
ADD CONSTRAINT `tbl_barang_masuk_ibfk_4` FOREIGN KEY (`kd_pegawai`) REFERENCES `tbl_pegawai` (`kd_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_barang_masuk_ibfk_5` FOREIGN KEY (`kd_supplier`) REFERENCES `tb_supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_barang_masuk_detail`
--
ALTER TABLE `tbl_barang_masuk_detail`
ADD CONSTRAINT `tbl_barang_masuk_detail_ibfk_1` FOREIGN KEY (`kd_barang_masuk`) REFERENCES `tbl_barang_masuk` (`kd_barang_masuk`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_barang_masuk_detail_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tbl_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_barang_masuk_detail_ibfk_3` FOREIGN KEY (`kd_barang_masuk`) REFERENCES `tbl_barang_masuk` (`kd_barang_masuk`);

--
-- Ketidakleluasaan untuk tabel `tbl_confirm_rusak`
--
ALTER TABLE `tbl_confirm_rusak`
ADD CONSTRAINT `tbl_confirm_rusak_ibfk_1` FOREIGN KEY (`kd_penjualan`) REFERENCES `tbl_penjualan_detail` (`kd_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_confirm_rusak_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tbl_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
ADD CONSTRAINT `tbl_penjualan_detail_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tbl_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
