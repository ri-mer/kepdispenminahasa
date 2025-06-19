-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 08:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `hukuman`
--

CREATE TABLE `hukuman` (
  `id_hukuman` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_hukuman` date NOT NULL,
  `nm_hukuman` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(20) NOT NULL,
  `nm_jabatan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
('JAB001', 'SD sekelabat'),
('JAB002', 'Manager'),
('JAB003', 'Supervisor'),
('JAB004', 'Staff'),
('JAB005', 'Coordinator'),
('JAB006', 'Presiden ');

-- --------------------------------------------------------

--
-- Table structure for table `jjg`
--

CREATE TABLE `jjg` (
  `id` int(10) NOT NULL,
  `nm_jjg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jjg`
--

INSERT INTO `jjg` (`id`, `nm_jjg`) VALUES
(1, 'SD'),
(2, 'SDIT'),
(3, 'SMP'),
(4, 'MTs'),
(5, 'SMA'),
(6, 'SMK'),
(7, 'MAN'),
(8, 'D-2'),
(9, 'D-3'),
(10, 'D-4'),
(11, 'S-1'),
(12, 'S-2'),
(13, 'S-3');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_krj`
--

CREATE TABLE `lokasi_krj` (
  `id_lokasi` varchar(20) NOT NULL,
  `nm_lokasi` varchar(32) NOT NULL,
  `alamat_lokasi` varchar(128) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_krj`
--

INSERT INTO `lokasi_krj` (`id_lokasi`, `nm_lokasi`, `alamat_lokasi`, `no_hp`) VALUES
('LOK001', 'Tondano', 'Jalan-Jalan', '+62'),
('LOK002', 'Tompaso', 'Jalan-Jalan', '+62'),
('LOK003', 'Langowan', 'Jalan-Jalan', '+62');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `ID` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID`, `nama`, `jurusan`, `email`) VALUES
(4, 'Susilo rahmawati', 'TI', 'xxxsusilo@yahoo.com'),
(9, 'testoke', 'Akuntansi', 'testoke3'),
(10, 'okelah xx', 'Akuntansi', 'begituxx'),
(18, 'painem', 'TK', 'Email@Emal.com'),
(26, 'norman', 'TI', 'email@emal.com'),
(27, 'Hogna', 'TI', 'email2');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` varchar(20) NOT NULL,
  `nm_pangkat` varchar(32) NOT NULL,
  `gaji` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nm_pangkat`, `gaji`) VALUES
('PKT001', '1A', 1700000),
('PKT002', '1B', 2000000),
('PKT003', '1C', 2200000),
('PKT004', '1D', 2300000),
('PKT005', '2A', 2600000),
('PKT006', '2B', 3400000),
('PKT007', '2C', 3500000),
('PKT008', '2D', 3700000),
('PKT009', '3A', 3600000),
('PKT010', '3B', 3700000),
('PKT011', '3C', 3900000),
('PKT012', '3D', 4000000),
('PKT013', '4A', 4200000),
('PKT014', '4B', 4300000),
('PKT015', '4C', 4500000),
('PKT016', '4D', 4700000),
('PKT017', '4E', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nm_pegawai` varchar(32) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tpt_lhr` varchar(32) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `tgl_msk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nm_pegawai`, `jk`, `tpt_lhr`, `tgl_lhr`, `agama`, `no_hp`, `email`, `alamat`, `tgl_msk`) VALUES
('1234353415', 'Alex Gordonnn', 'Laki-laki', 'Settle', '2021-11-16', 'Pilih Agama', '080808', 'SMP 5 LANGOWAN', 'Kampung Jawa Tondano, Lingkungan IV', '2021-11-15'),
('12345098', 'Santo', 'Laki-laki', 'Kaimana', '2021-11-17', 'Kristen Katolik', '-1098', 'SMP 5 LANGOWAN', 'Tataaran', '2021-11-16'),
('196111041983032041', 'MARIANA N.SALAKI', 'Perempuan', '', '1961-11-04', 'Pilih Agama', '', 'TK KEC. TOMBARIRI TIMUR', '', '2021-11-16'),
('196202271984032006', 'HELLY MALONDA', 'Perempuan', '', '1962-02-27', 'Pilih Agama', '', 'TK. KECAMATAN KAWANGKOAN', '', '2021-11-16'),
('196206081986032013', 'MEISKE S. NANGOY', 'Perempuan', '', '1962-06-08', 'Pilih Agama', '', 'TK KAKAS', '', '2021-11-16'),
('196206301988032007', 'ELLEN YULIEN POLUAN', 'Laki-laki', '', '1962-06-30', 'Pilih Agama', '', 'TK LANGOWAN SELATAN', '', '2021-11-16'),
('23456', 'Santo Sanchez', 'Laki-laki', 'Settle', '2021-11-16', 'Pilih Agama', '09090', 'SMP 5 LANGOWAN TIMUR', 'oikj', '2021-11-15'),
('4890354735', 'ALEX GORDON', 'Laki-laki', 'Settle', '2013-03-01', 'Pilih Agama', '08474239', 'SMP 5 LANGOWAN TIMUR', 'Testing Alamat', '2017-06-01'),
('999999999', 'Santo Sanchez', 'Laki-laki', 'Barcelona', '2021-11-15', 'Pilih Agama', '0980980890', 'SMP 5 LANGOWAN TIMUR', 'retdfg', '2021-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pend` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `thn_pend` varchar(10) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `nm_pendidikan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pend`, `nip`, `thn_pend`, `jenjang`, `nm_pendidikan`) VALUES
(58, '1234353415', '', '', ''),
(59, '1234353415', '', '', ''),
(60, '1234353415', '', '', ''),
(61, '23456', '', '', ''),
(62, '23456', '', '', ''),
(63, '23456', '', '', ''),
(64, '999999999', '', '', ''),
(65, '999999999', '', '', ''),
(66, '999999999', '', '', ''),
(67, '196111041983032041', '', '', ''),
(68, '196111041983032041', '', '', ''),
(69, '196111041983032041', '', '', ''),
(70, '196202271984032006', '', '', ''),
(71, '196202271984032006', '', '', ''),
(72, '196202271984032006', '', '', ''),
(73, '196206081986032013', '', '', ''),
(74, '196206081986032013', '', '', ''),
(75, '196206081986032013', '', '', ''),
(76, '196206301988032007', '', '', ''),
(77, '196206301988032007', '', '', ''),
(78, '196206301988032007', '', '', ''),
(79, '12345098', '', '', ''),
(80, '12345098', '', '', ''),
(81, '12345098', '', '', ''),
(82, '4890354735', '', '', ''),
(83, '4890354735', '', '', ''),
(84, '4890354735', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_krj`
--

CREATE TABLE `pengalaman_krj` (
  `id_peng_krj` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `thn_krj` varchar(10) NOT NULL,
  `nm_krj` varchar(32) NOT NULL,
  `nm_pt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengalaman_krj`
--

INSERT INTO `pengalaman_krj` (`id_peng_krj`, `nip`, `thn_krj`, `nm_krj`, `nm_pt`) VALUES
(20, '1234353415', '', '', ''),
(21, '23456', '', '', ''),
(22, '999999999', '', '', ''),
(23, '196111041983032041', '', '', ''),
(24, '196202271984032006', '', '', ''),
(25, '196206081986032013', '', '', ''),
(26, '196206301988032007', '', '', ''),
(27, '12345098', '', '', ''),
(28, '4890354735', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_prestasi` date NOT NULL,
  `nm_prestasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_krj`
--

CREATE TABLE `sk_krj` (
  `no_sk` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_sk` date NOT NULL,
  `id_jabatan` varchar(20) NOT NULL,
  `id_lokasi` varchar(20) NOT NULL,
  `id_pangkat` varchar(20) NOT NULL,
  `id_unit_krj` varchar(20) NOT NULL,
  `status_sk` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_krj`
--

INSERT INTO `sk_krj` (`no_sk`, `nip`, `tgl_sk`, `id_jabatan`, `id_lokasi`, `id_pangkat`, `id_unit_krj`, `status_sk`) VALUES
('SK/ZT/11/21/00001', '1234353415', '2021-11-15', 'JAB001', 'LOK001', 'PKT001', 'UKJ001', 'nonaktif'),
('SK/ZT/11/21/00002', '23456', '2021-11-15', 'JAB004', 'LOK003', 'PKT015', 'UKJ003', 'nonaktif'),
('SK/ZT/11/21/00007', '1234353415', '2021-11-15', 'JAB003', 'LOK001', 'PKT016', 'UKJ003', 'aktif'),
('SK/ZT/11/21/00008', '999999999', '2021-11-16', 'JAB004', 'LOK001', 'PKT010', 'UKJ002', 'aktif'),
('SK/ZT/11/21/00009', '196111041983032041', '2021-11-16', 'JAB001', 'LOK001', 'PKT005', 'UKJ001', 'aktif'),
('SK/ZT/11/21/00010', '196202271984032006', '2021-11-16', 'JAB001', 'LOK001', 'PKT009', 'UKJ001', 'aktif'),
('SK/ZT/11/21/00011', '196206081986032013', '2021-11-16', 'JAB002', 'LOK002', 'PKT012', 'UKJ001', 'aktif'),
('SK/ZT/11/21/00012', '196206301988032007', '2021-11-16', 'JAB003', 'LOK002', 'PKT010', 'UKJ001', 'aktif'),
('SK/ZT/11/21/00013', '12345098', '2021-11-16', 'JAB001', 'LOK001', 'PKT013', 'UKJ001', 'aktif'),
('SK/ZT/11/21/00014', '23456', '2021-11-17', 'JAB002', 'LOK001', 'PKT001', 'UKJ001', 'aktif'),
('SK/ZT/11/21/00015', '4890354735', '2017-06-01', 'JAB002', 'LOK002', 'PKT013', 'UKJ003', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `unit_krj`
--

CREATE TABLE `unit_krj` (
  `id_unit_krj` varchar(20) NOT NULL,
  `nm_unit_krj` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_krj`
--

INSERT INTO `unit_krj` (`id_unit_krj`, `nm_unit_krj`) VALUES
('UKJ001', 'TK'),
('UKJ002', 'UPTD'),
('UKJ003', 'SD'),
('UKJ004', 'SMP'),
('UKJ005', 'DINAS PENDIDIKAN'),
('UKJ006', 'PENILIK'),
('UKJ007', 'PENGAWAS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` enum('admin','hrd','gm') NOT NULL,
  `blokir` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `no_hp`, `level`, `blokir`) VALUES
('USR004', 'admin', '123', 'admin', '+62', 'admin', 'N'),
('USR005', 'User', '123', 'User', '+62', 'hrd', 'N'),
('USR006', 'gm', 'gm123', 'gm', '+62', 'gm', 'N'),
('USR007', 'testgm', '123', 'gm', '+62', 'gm', 'N'),
('USR008', 'testhrd', '12345', 'test', '+62', 'hrd', 'N'),
('USR009', 'testhrd2', '12345', 'test', '+62', 'hrd', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hukuman`
--
ALTER TABLE `hukuman`
  ADD PRIMARY KEY (`id_hukuman`),
  ADD KEY `nik` (`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `jjg`
--
ALTER TABLE `jjg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_krj`
--
ALTER TABLE `lokasi_krj`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_lokasi_2` (`id_lokasi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`),
  ADD KEY `id_pangkat` (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nip_2` (`nip`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pend`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nip_2` (`nip`);

--
-- Indexes for table `pengalaman_krj`
--
ALTER TABLE `pengalaman_krj`
  ADD PRIMARY KEY (`id_peng_krj`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nip_2` (`nip`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `nik` (`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `sk_krj`
--
ALTER TABLE `sk_krj`
  ADD PRIMARY KEY (`no_sk`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_pangkat` (`id_pangkat`),
  ADD KEY `id_unit_krj` (`id_unit_krj`);

--
-- Indexes for table `unit_krj`
--
ALTER TABLE `unit_krj`
  ADD PRIMARY KEY (`id_unit_krj`),
  ADD KEY `id_unit_krj` (`id_unit_krj`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jjg`
--
ALTER TABLE `jjg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pend` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `pengalaman_krj`
--
ALTER TABLE `pengalaman_krj`
  MODIFY `id_peng_krj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hukuman`
--
ALTER TABLE `hukuman`
  ADD CONSTRAINT `hukuman_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sk_krj`
--
ALTER TABLE `sk_krj`
  ADD CONSTRAINT `sk_krj_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_krj` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_4` FOREIGN KEY (`id_pangkat`) REFERENCES `pangkat` (`id_pangkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_5` FOREIGN KEY (`id_unit_krj`) REFERENCES `unit_krj` (`id_unit_krj`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
