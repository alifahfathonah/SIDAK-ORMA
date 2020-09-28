-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 02:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidakorma`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `organisasi_terikat` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `organisasi_terikat`, `nama_lengkap`, `username`, `password`, `email`, `level`) VALUES
(2, 1, 'Azzahra Dinda Shafira', 'azzahradins', '123456', 'azzahradindas@gmail.com', 1),
(3, 1, 'Emily Natagaki', 'emina', '123456', 'emina@gmail.com', 2),
(4, 1, 'Shane Scott', 'shane', '123456', 'shane@gmail.com', 3),
(5, 2, 'Shane Scott', 'shaneDPM', '123456', 'shane@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `authentication_level`
--

CREATE TABLE `authentication_level` (
  `id_level` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication_level`
--

INSERT INTO `authentication_level` (`id_level`, `keterangan`) VALUES
(1, 'Pengurus Inti'),
(2, 'Anggota '),
(3, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_berkas` varchar(50) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `id_organisasi`, `id_jenis`, `nama_berkas`, `tgl_dibuat`, `file`) VALUES
(1, 1, 2, 'Pengajuan Peminjaman Ruangan', '2020-04-21', '1588350116_UTS_LAPORAN.docx'),
(2, 1, 1, 'Surat Proposal Sponsorship By. U', '2020-05-01', '1588350105_Modul13.docx'),
(5, 1, 2, 'Surat Pengajuan Barang', '2020-05-01', '1588347617_prak.docx');

-- --------------------------------------------------------

--
-- Table structure for table `info_organisasi`
--

CREATE TABLE `info_organisasi` (
  `id` int(11) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `inisial` varchar(20) NOT NULL,
  `tujuan` text NOT NULL,
  `visimisi` text NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `dosen_pembina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_organisasi`
--

INSERT INTO `info_organisasi` (`id`, `nama_organisasi`, `logo`, `inisial`, `tujuan`, `visimisi`, `tgl_berdiri`, `dosen_pembina`) VALUES
(1, 'Workshop Riset Informatika', 'img/organisasi/wri.png', 'WRI Polinema', 'Tujuan organisasi\r\n1. bertujuan\r\n2. bersemangat', '1. Bervisi\r\n2. Bermisi', '2020-04-21', 'Dr. Anwar'),
(2, 'Dewan Perwakilan Mahasiswa', 'img/organisasi/logo-dpm.png', 'DPM Polinema', 'Tujuan organisasi\r\n1. bertujuan\r\n2. bersemangat', '1. Bervisi\r\n2. Bermisi', '2020-04-21', 'Drg. Emily Sarista'),
(3, 'Himpunan Mahasiswa Jurusan Mesin', 'img/organisasi/logo-mesin.jpg', 'HMJ Mesin', 'Tujuan organisasi\r\n1. bertujuan\r\n2. bersemangat', '1. Bervisi\r\n2. Bermisi', '2020-04-21', 'Drg. Emily Sarista'),
(4, 'Himpunan Mahasiswa Jurusan Elektro', 'img/organisasi/logo-elektro.png', 'HMJ Elektro', 'Tujuan organisasi\r\n1. bertujuan\r\n2. bersemangat', '1. Bervisi\r\n2. Bermisi', '2020-04-21', 'Drg. Emily Sarista'),
(5, 'Himpunan Mahasiswa Jurusan Teknologi informatika', 'img/organisasi/logo-informatika.jpg', 'HMJ Teknologi Inform', 'Tujuan organisasi\r\n1. bertujuan\r\n2. bersemangat', '1. Bervisi\r\n2. Bermisi', '2020-04-21', 'Drg. Emily Sarista'),
(6, 'Himpunan Mahasiswa Jurusan Akutansi', 'img/organisasi/logo-akutansi.png', 'HMJ Akuntansi', 'Tujuan organisasi\r\n1. bertujuan\r\n2. bersemangat', '1. Bervisi\r\n2. Bermisi', '2020-04-21', 'Drg. Emily Sarista');

--
-- Triggers `info_organisasi`
--
DELIMITER $$
CREATE TRIGGER `after add organisasi` BEFORE INSERT ON `info_organisasi` FOR EACH ROW INSERT INTO keuangan(id_organisasi, level_transparansi, total_uang) VALUES (NEW.id, 3, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_organisasi`
--

CREATE TABLE `jadwal_organisasi` (
  `id` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_organisasi`
--

INSERT INTO `jadwal_organisasi` (`id`, `id_org`, `kegiatan`, `date`, `tempat`) VALUES
(2, 1, 'Sharing Session about Mobile Dev', '2020-05-09', 'RT. 5. Lantai 7 Gedung Sipil'),
(3, 5, 'Malam Keakraban JTI', '2020-05-02', 'Aula Pertamina'),
(5, 1, 'Penanaman Pohon Cantik', '2020-05-01', 'Aula Pertamina'),
(6, 1, 'Open Talk 10', '2020-05-21', 'Gedung Sipil Lt.6'),
(7, 1, 'Sharing Session WRI 6 & 7', '2020-05-21', 'Kelas RT.5');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_berkas`
--

CREATE TABLE `jenis_berkas` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_berkas`
--

INSERT INTO `jenis_berkas` (`id`, `jenis`) VALUES
(1, 'Laporan'),
(2, 'Surat Pengajuan'),
(3, 'Pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `total_uang` int(20) NOT NULL,
  `level_transparansi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `id_organisasi`, `total_uang`, `level_transparansi`) VALUES
(1, 1, 116000, 3),
(2, 5, 0, 3),
(4, 2, 0, 3),
(5, 3, 0, 3),
(6, 4, 0, 3),
(7, 6, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_keluar`
--

CREATE TABLE `keuangan_keluar` (
  `id_transaksi` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `bukti_pengeluaran` text COMMENT 'ini dalam bentuk link gambar nantinya',
  `tgl_keluar` date NOT NULL,
  `keterangan` text NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_keluar`
--

INSERT INTO `keuangan_keluar` (`id_transaksi`, `id_organisasi`, `jml_keluar`, `bukti_pengeluaran`, `tgl_keluar`, `keterangan`, `deskripsi`) VALUES
(6, 1, 35000, '1588182084-PengeluaranDonasi.pdf', '2020-04-30', 'Keterangan donasi dan penjabaran ada di pdf', 'Donasi Bantuan Bencana'),
(17, 1, 4000, NULL, '2020-04-30', 'coba ini dibiarin aja keterangannya', 'biarin aja harusnya'),
(18, 1, 5000, '1588230553_Kelompok_7_business_model_canvas.pdf', '2020-04-29', 'as', 'ada filenya kalo ini');

--
-- Triggers `keuangan_keluar`
--
DELIMITER $$
CREATE TRIGGER `log_after_insert_keuangan_keluar` AFTER INSERT ON `keuangan_keluar` FOR EACH ROW INSERT INTO keuangan_keluar_log(id_pengeluaran, keterangan) 
VALUES (NEW.id_transaksi,                                                                      CONCAT('Penambahan Data : ',IFNULL(NEW.deskripsi,' ')))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_before_update_keuangan_keluar` BEFORE UPDATE ON `keuangan_keluar` FOR EACH ROW INSERT INTO keuangan_keluar_log(id_pengeluaran, keterangan) 
VALUES 
(NEW.id_transaksi, CONCAT('Perubahan Data : ',IFNULL(OLD.deskripsi,' ')))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_after_delete_keuangan_keluar` AFTER DELETE ON `keuangan_keluar` FOR EACH ROW UPDATE keuangan
SET total_uang = total_uang + OLD.jml_keluar
WHERE id_organisasi = OLD.id_organisasi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_after_update_keuangan_keluar` AFTER UPDATE ON `keuangan_keluar` FOR EACH ROW UPDATE keuangan
SET total_uang = total_uang + OLD.jml_keluar - NEW.jml_keluar
WHERE id_organisasi = NEW.id_organisasi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_before_insert_keuangan_keluar` BEFORE INSERT ON `keuangan_keluar` FOR EACH ROW UPDATE keuangan
SET total_uang = total_uang - NEW.jml_keluar
WHERE id_organisasi = NEW.id_organisasi
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_keluar_log`
--

CREATE TABLE `keuangan_keluar_log` (
  `id_transaksi` int(11) NOT NULL,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_keluar_log`
--

INSERT INTO `keuangan_keluar_log` (`id_transaksi`, `id_pengeluaran`, `keterangan`) VALUES
(3, NULL, 'Penambahan Data : Alat bersih-bersih'),
(4, NULL, 'Penambahan Data : Data Pembagian Keuntungan'),
(5, NULL, 'Penambahan Data : Membagikan Donasi'),
(6, 6, 'Penambahan Data : Donasi Bantuan Bencana'),
(7, 6, 'Perubahan Data : Donasi Bantuan Bencana'),
(8, NULL, 'Penambahan Data : Konsumsi Pembicara Opentalk 10'),
(9, NULL, 'Penambahan Data : asda'),
(10, NULL, 'Penambahan Data : das'),
(11, NULL, 'Perubahan Data : Alat bersih-bersih'),
(12, NULL, 'Perubahan Data : Alat Kebersihan'),
(13, NULL, 'Penambahan Data : Bantuan Alat Tulis'),
(14, NULL, 'Perubahan Data : Bantuan Alat Tulis'),
(15, NULL, 'Perubahan Data : '),
(16, NULL, 'Perubahan Data : '),
(17, NULL, 'Perubahan Data : Alat Kerja Keras'),
(18, NULL, 'Perubahan Data : Alat Kerja Keras'),
(19, NULL, 'Penambahan Data : INi ASAL'),
(20, NULL, 'Penambahan Data : ASal'),
(21, NULL, 'Penambahan Data : OK'),
(22, NULL, 'Penambahan Data : AAA'),
(23, NULL, 'Penambahan Data : IDIH'),
(24, NULL, 'Penambahan Data : saa'),
(25, 17, 'Penambahan Data : biarin aja harusnya'),
(26, 18, 'Penambahan Data : ada filenya kalo ini'),
(27, 17, 'Perubahan Data : biarin aja harusnya'),
(28, 18, 'Perubahan Data : ada filenya kalo ini');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_masuk`
--

CREATE TABLE `keuangan_masuk` (
  `id_transaksi` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_masuk`
--

INSERT INTO `keuangan_masuk` (`id_transaksi`, `id_organisasi`, `deskripsi`, `tgl_masuk`, `jml_masuk`, `keterangan`) VALUES
(1, 1, 'Malam Keakraban Kas', '2020-04-27', 5000, 'Kita akan mengadakan malam  bgt'),
(4, 1, 'Kas Opentalk 10', '2020-04-29', 5000, 'Uang Kas'),
(7, 1, 'Uang Sponsor RuangGuru', '2020-04-29', 150000, 'Bantuan sponsor');

--
-- Triggers `keuangan_masuk`
--
DELIMITER $$
CREATE TRIGGER `log_after_insert_keuangan_masuk` AFTER INSERT ON `keuangan_masuk` FOR EACH ROW INSERT INTO keuangan_masuk_log(id_pemasukan, keterangan) 
VALUES (NEW.id_transaksi,                                                                      CONCAT('Penambahan Data : ',IFNULL(NEW.deskripsi,' ')))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_before_update_keuangan_masuk` BEFORE UPDATE ON `keuangan_masuk` FOR EACH ROW INSERT INTO keuangan_masuk_log(id_pemasukan, keterangan) 
VALUES(NEW.id_transaksi, 
CONCAT('Perubahan Data : ',IFNULL(OLD.deskripsi,' ')))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_after_delete_keuangan_masuk` AFTER DELETE ON `keuangan_masuk` FOR EACH ROW UPDATE keuangan
SET total_uang = total_uang - OLD.jml_masuk
WHERE id_organisasi = OLD.id_organisasi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_after_update_keuangan_masuk` AFTER UPDATE ON `keuangan_masuk` FOR EACH ROW UPDATE keuangan
SET total_uang = total_uang - OLD.jml_masuk + NEW.jml_masuk
WHERE id_organisasi = NEW.id_organisasi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_before_insert_keuangan_masuk` BEFORE INSERT ON `keuangan_masuk` FOR EACH ROW UPDATE keuangan
SET total_uang = total_uang + NEW.jml_masuk
WHERE id_organisasi = NEW.id_organisasi
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_masuk_log`
--

CREATE TABLE `keuangan_masuk_log` (
  `id_transaksi` int(11) NOT NULL,
  `id_pemasukan` int(11) DEFAULT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_masuk_log`
--

INSERT INTO `keuangan_masuk_log` (`id_transaksi`, `id_pemasukan`, `Keterangan`) VALUES
(1, 1, 'Penambahan Data : Malam Keakraban Kas'),
(2, NULL, 'Penambahan Data : Kas untuk seminar'),
(4, 4, 'Penambahan Data : Kas Opentalk 10'),
(5, NULL, 'Penambahan Data : Kas Opentalk 10'),
(6, 1, 'Perubahan Data : Malam Keakraban Kas'),
(7, NULL, 'Penambahan Data : Bantuan Kampus'),
(8, NULL, 'Perubahan Data : Kas Opentalk 10'),
(9, 1, 'Perubahan Data : Malam Keakraban Kas'),
(10, 7, 'Penambahan Data : Uang Sponsor RuangGuru');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `wakil` varchar(50) NOT NULL,
  `sekretaris` varchar(50) NOT NULL,
  `bendahara` varchar(50) NOT NULL,
  `tahun_jabatan` varchar(50) NOT NULL,
  `id_organisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `ketua`, `wakil`, `sekretaris`, `bendahara`, `tahun_jabatan`, `id_organisasi`) VALUES
(1, 'Ardan Anjung', 'Abdurasyid', 'Kinanti Permata', 'Azzahra Dinda', '2019/2020', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisasi_terikat` (`organisasi_terikat`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `authentication_level`
--
ALTER TABLE `authentication_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `info_organisasi`
--
ALTER TABLE `info_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_organisasi`
--
ALTER TABLE `jadwal_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_org` (`id_org`);

--
-- Indexes for table `jenis_berkas`
--
ALTER TABLE `jenis_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_organisasi_2` (`id_organisasi`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `level_transparansi` (`level_transparansi`);

--
-- Indexes for table `keuangan_keluar`
--
ALTER TABLE `keuangan_keluar`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `keuangan_keluar_log`
--
ALTER TABLE `keuangan_keluar_log`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengeluaran` (`id_pengeluaran`);

--
-- Indexes for table `keuangan_masuk`
--
ALTER TABLE `keuangan_masuk`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `keuangan_masuk_log`
--
ALTER TABLE `keuangan_masuk_log`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pemasukan` (`id_pemasukan`) USING BTREE;

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_organisasi`
--
ALTER TABLE `info_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_organisasi`
--
ALTER TABLE `jadwal_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_berkas`
--
ALTER TABLE `jenis_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keuangan_keluar`
--
ALTER TABLE `keuangan_keluar`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `keuangan_keluar_log`
--
ALTER TABLE `keuangan_keluar_log`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `keuangan_masuk`
--
ALTER TABLE `keuangan_masuk`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keuangan_masuk_log`
--
ALTER TABLE `keuangan_masuk_log`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`organisasi_terikat`) REFERENCES `info_organisasi` (`id`),
  ADD CONSTRAINT `authentication_ibfk_2` FOREIGN KEY (`level`) REFERENCES `authentication_level` (`id_level`);

--
-- Constraints for table `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_berkas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berkas_ibfk_2` FOREIGN KEY (`id_organisasi`) REFERENCES `info_organisasi` (`id`);

--
-- Constraints for table `jadwal_organisasi`
--
ALTER TABLE `jadwal_organisasi`
  ADD CONSTRAINT `jadwal_organisasi_ibfk_1` FOREIGN KEY (`id_org`) REFERENCES `info_organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`id_organisasi`) REFERENCES `info_organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keuangan_ibfk_2` FOREIGN KEY (`level_transparansi`) REFERENCES `authentication_level` (`id_level`);

--
-- Constraints for table `keuangan_keluar`
--
ALTER TABLE `keuangan_keluar`
  ADD CONSTRAINT `keuangan_keluar_ibfk_1` FOREIGN KEY (`id_organisasi`) REFERENCES `keuangan` (`id_organisasi`);

--
-- Constraints for table `keuangan_keluar_log`
--
ALTER TABLE `keuangan_keluar_log`
  ADD CONSTRAINT `keuangan_keluar_log_ibfk_1` FOREIGN KEY (`id_pengeluaran`) REFERENCES `keuangan_keluar` (`id_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `keuangan_masuk`
--
ALTER TABLE `keuangan_masuk`
  ADD CONSTRAINT `keuangan_masuk_ibfk_1` FOREIGN KEY (`id_organisasi`) REFERENCES `keuangan` (`id_organisasi`);

--
-- Constraints for table `keuangan_masuk_log`
--
ALTER TABLE `keuangan_masuk_log`
  ADD CONSTRAINT `keuangan_masuk_log_ibfk_2` FOREIGN KEY (`id_pemasukan`) REFERENCES `keuangan_masuk` (`id_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD CONSTRAINT `id_organisasi` FOREIGN KEY (`id_organisasi`) REFERENCES `info_organisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
