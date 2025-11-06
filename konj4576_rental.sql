-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2025 at 08:41 AM
-- Server version: 11.4.7-MariaDB-cll-lve
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konj4576_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(3) NOT NULL,
  `KdMerk` varchar(50) NOT NULL,
  `NmMerk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `KdMerk`, `NmMerk`) VALUES
(2, 'DHT', 'Daihatsu'),
(3, 'DTS', 'Datsun'),
(4, 'HND', 'Honda'),
(5, 'ISZ', 'Isuzu'),
(6, 'KIA', 'Korean Industrial Autocar'),
(7, 'MBS', 'Mitsubishi'),
(8, 'NSN', 'Nissan'),
(9, 'SZK', 'Suzuki'),
(16, 'TYT', 'Toyota'),
(17, 'CHV', 'Chevrolet'),
(20, 'WLI', 'Wuling');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(3) NOT NULL,
  `NoPlat` varchar(10) NOT NULL,
  `KdMerk` varchar(20) DEFAULT NULL,
  `IdType` varchar(20) DEFAULT NULL,
  `StatusRental` enum('Jalan','Dipesan','Kosong') DEFAULT NULL,
  `HargaSewa` double(10,0) DEFAULT NULL,
  `JenisMobil` varchar(20) DEFAULT NULL,
  `Transmisi` enum('Manual','CVT','Matic') DEFAULT NULL,
  `FotoMobil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `NoPlat`, `KdMerk`, `IdType`, `StatusRental`, `HargaSewa`, `JenisMobil`, `Transmisi`, `FotoMobil`) VALUES
(53, 'DD 1234 AA', 'DHT', 'TRS-X-MT', 'Kosong', 400000, 'MPV', 'Matic', 'FotoMobil-1711225062-24-Mar-2024.png'),
(55, 'DD 8888 TT', 'DHT', 'TRS-X-MT', 'Kosong', 400000, 'MPV', 'CVT', 'FotoMobil-1711225545-24-Mar-2024.'),
(56, 'B 2900 KZO', 'TYT', 'U001', 'Jalan', 400000, 'MPV', 'CVT', 'FotoMobil-1711379851-25-Mar-2024.'),
(57, 'DD 1528 S', 'TYT', 'U006', 'Kosong', 300000, 'MPV', 'Manual', 'FotoMobil-1711380196-25-Mar-2024.'),
(58, 'DD 1527 S', 'TYT', 'U006', 'Kosong', 300000, 'MPV', 'Manual', 'FotoMobil-1711380250-25-Mar-2024.'),
(59, 'DD 1726 S', 'TYT', 'U006', 'Kosong', 300000, 'MPV', 'Manual', 'FotoMobil-1711380363-25-Mar-2024.'),
(60, 'DD 1738 S', 'TYT', 'U006', 'Kosong', 300000, 'MPV', 'Manual', 'FotoMobil-1711380400-25-Mar-2024.'),
(61, 'B 2569 KZD', 'TYT', 'U007', 'Kosong', 350000, 'MPV', 'Matic', 'FotoMobil-1711380453-25-Mar-2024.'),
(62, 'B 2573 KZD', 'TYT', 'U007', 'Kosong', 350000, 'MPV', 'Matic', 'FotoMobil-1711380500-25-Mar-2024.'),
(63, 'B 2498 KZE', 'TYT', 'U007', 'Kosong', 350000, 'MPV', 'Manual', 'FotoMobil-1711380636-25-Mar-2024.'),
(64, 'B 2846 KZE', 'TYT', 'U007', 'Kosong', 350000, 'MPV', 'Matic', 'FotoMobil-1711380680-25-Mar-2024.'),
(65, 'B 2960 KZE', 'TYT', 'U007', 'Kosong', 350000, 'MPV', 'Matic', 'FotoMobil-1711380730-25-Mar-2024.'),
(66, 'B 2898 KZO', 'TYT', 'U001', 'Kosong', 400000, 'MPV', 'CVT', 'FotoMobil-1711380767-25-Mar-2024.'),
(67, 'B 2833 KZZ', 'TYT', 'U001', 'Kosong', 400000, 'MPV', 'CVT', 'FotoMobil-1711380802-25-Mar-2024.'),
(68, 'B 2420 KZZ', 'TYT', 'U001', 'Kosong', 400000, 'MPV', 'CVT', 'FotoMobil-1711380832-25-Mar-2024.'),
(69, 'B 2705 KIJ', 'TYT', 'U007', 'Kosong', 400000, 'MPV', 'Manual', 'FotoMobil-1711380876-25-Mar-2024.'),
(70, 'B 2707 KIJ', 'TYT', 'U001', 'Kosong', 400000, 'MPV', 'CVT', 'FotoMobil-1711380911-25-Mar-2024.'),
(71, 'B 2319 KIJ', 'TYT', 'U001', 'Kosong', 400000, 'MPV', 'Manual', 'FotoMobil-1711380957-25-Mar-2024.'),
(72, 'B 2486 KIJ', 'TYT', 'U001', 'Kosong', 400000, 'MPV', 'CVT', 'FotoMobil-1711381005-25-Mar-2024.');

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id` int(3) NOT NULL,
  `IdSopir` char(6) NOT NULL,
  `NIK` char(13) NOT NULL,
  `NmSopir` varchar(50) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NoTelp` char(13) DEFAULT NULL,
  `JenisKelamin` enum('P','L') DEFAULT NULL,
  `NoSim` char(20) DEFAULT NULL,
  `TarifPerhari` double(10,0) DEFAULT NULL,
  `StatusSopir` enum('Busy','Booked','Free') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id`, `IdSopir`, `NIK`, `NmSopir`, `Alamat`, `NoTelp`, `JenisKelamin`, `NoSim`, `TarifPerhari`, `StatusSopir`) VALUES
(16, 'SPR000', '-', '-', '-', '-', 'L', '-', 0, 'Booked'),
(17, 'SPR001', '2323232323232', 'Anto', 'sdsds', '081237373464', 'L', '2323232232', 1000, 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `NoTransaksi` char(8) NOT NULL,
  `NIK` char(13) DEFAULT NULL,
  `Id_Mobil` int(3) DEFAULT NULL,
  `Tanggal_Pesan` date DEFAULT NULL,
  `Tanggal_Pinjam` date DEFAULT NULL,
  `Tanggal_Kembali_Rencana` date DEFAULT NULL,
  `Tanggal_Kembali_Sebenarnya` date DEFAULT NULL,
  `berangkat` varchar(20) DEFAULT NULL,
  `pulang` varchar(20) DEFAULT NULL,
  `LamaRental` int(3) DEFAULT NULL,
  `LamaDenda` int(3) DEFAULT NULL,
  `Kerusakan` text DEFAULT NULL,
  `Id_Sopir` char(6) DEFAULT NULL,
  `tarifsopir` double(10,0) DEFAULT NULL,
  `BiayaBBM` double(10,0) DEFAULT NULL,
  `BiayaKerusakan` double(10,0) DEFAULT NULL,
  `Denda` double(10,0) DEFAULT NULL,
  `Mhrg_harian` double(10,0) DEFAULT NULL,
  `Total_Bayar` double(10,0) DEFAULT NULL,
  `Jumlah_Bayar` double(10,0) DEFAULT NULL,
  `sisa_bayar` double(10,0) DEFAULT NULL,
  `Kembalian` double(10,0) DEFAULT NULL,
  `StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai') DEFAULT NULL,
  `Arsip` int(1) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `jaminan` varchar(100) DEFAULT NULL,
  `panjar` double(10,0) DEFAULT NULL,
  `status_bayar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`NoTransaksi`, `NIK`, `Id_Mobil`, `Tanggal_Pesan`, `Tanggal_Pinjam`, `Tanggal_Kembali_Rencana`, `Tanggal_Kembali_Sebenarnya`, `berangkat`, `pulang`, `LamaRental`, `LamaDenda`, `Kerusakan`, `Id_Sopir`, `tarifsopir`, `BiayaBBM`, `BiayaKerusakan`, `Denda`, `Mhrg_harian`, `Total_Bayar`, `Jumlah_Bayar`, `sisa_bayar`, `Kembalian`, `StatusTransaksi`, `Arsip`, `tujuan`, `jaminan`, `panjar`, `status_bayar`) VALUES
('JS00001', '7306082809970', 72, '2024-03-25', '2024-03-25', '2024-03-26', '2024-03-26', '14:00', '14:00', 1, 0, 'selesai', 'SPR000', 0, 0, 0, 0, 350000, 0, 0, 0, 0, 'Selesai', 0, 'makassar', '-', 350000, 'Lunas'),
('JS00002', '7371022709790', 59, '2024-03-26', '2024-03-26', '2024-03-27', '2024-03-27', '07:00', '07:00', 1, 0, 'h', 'SPR000', 0, 0, 0, 0, 300000, 300000, 300000, 0, 0, 'Selesai', 0, 'Palopo', 'Sisa sewa mobil belum terbayar. Maka dibuatkan spk', 0, 'Lunas'),
('JS00003', '7306083005990', 69, '2024-03-28', '2024-03-28', '2024-03-30', '2024-03-30', '20:00', '20:00', 2, 0, 'FF', 'SPR000', 0, 0, 0, 40000, 400000, 640000, 640000, 0, 0, 'Selesai', 0, 'Gowa, Makassar', 'Motor, KTP', 200000, 'Lunas'),
('JS00004', '7371022709790', 56, '2024-04-01', '2024-04-01', '2024-04-02', NULL, '02:53', '02:53', 1, NULL, NULL, 'SPR000', 0, NULL, NULL, NULL, 400000, 400000, NULL, NULL, NULL, 'Mulai', 0, 'makassar', 'Motor, KTP', 350000, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(3) NOT NULL,
  `IdType` varchar(20) NOT NULL,
  `NmType` varchar(50) DEFAULT NULL,
  `KdMerk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `IdType`, `NmType`, `KdMerk`) VALUES
(11, 'AVZ-G-MT', 'Avanza 1.5 G MT', 'TYT'),
(12, 'AVZ-V-AT', 'Avanza Veloz 1.3 AT', 'TYT'),
(13, 'MBL-S-MT', 'Mobilio 2017 S MT', 'HND'),
(14, 'MBL-RS', 'Mobilio RS', 'HND'),
(16, 'ER3-GX-AT', 'Ertiga GX AT', 'SZK'),
(17, 'GL-HWS', 'Grand Livina HWS', 'NSN'),
(18, 'XNA-R', 'Xenia R', 'DHT'),
(19, 'YRS-E-AT', 'Yaris 1.5 E AT', 'TYT'),
(21, 'JZZ-S-MT', 'Jazz S MT', 'HND'),
(22, 'MRG-GLX', 'Mirage GLX', 'MBS'),
(23, 'CRL-G-MT', 'Corolla Altis G MT', 'TYT'),
(24, 'CVC-H-LS', 'Civic Hatchback LS', 'HND'),
(25, 'HRV-G-MT', 'HRV G MT', 'HND'),
(26, 'EXP-G-MT', 'Expander G MT', 'MBS'),
(28, 'R-TRDS-AT', 'Rush  AT', 'TYT'),
(31, 'HCM', 'Hiace Commuter', 'HC'),
(32, 'HCP', 'Hiace Premio', 'HC'),
(33, 'U001', 'New Avanza', 'TYT'),
(34, 'U002', 'Mobilio', 'HND'),
(35, 'U003', 'Brio', 'HND'),
(36, 'U004', 'Fortuner', 'TYT'),
(37, 'U005', 'Innova Riborn', 'TYT'),
(38, 'U006', 'Grand Avanza', 'TYT'),
(39, 'U007', 'Avanza', 'TYT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `NIK` char(13) NOT NULL,
  `FotoKTP` varchar(250) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `NamaUser` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `ttl` varchar(25) DEFAULT NULL,
  `JenisKelamin` enum('L','P') DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NoTelp` varchar(13) DEFAULT NULL,
  `NoTelpKerabat` varchar(13) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `RoleId` int(2) DEFAULT NULL,
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NIK`, `FotoKTP`, `Nama`, `NamaUser`, `Password`, `ttl`, `JenisKelamin`, `Alamat`, `NoTelp`, `NoTelpKerabat`, `pekerjaan`, `Foto`, `RoleId`, `IsActive`) VALUES
(1, '172039', '', 'Abdi Gunawan', 'gunn@m.com', '$2y$10$.WKnMGrLO7Ku4p8hq9z9y.ur316gzDvKz13t8TkBe4tAZknvlCxNW', NULL, 'L', 'Jl. Goa Ria, Pondok Asri 1 Blok A7 No.10', '087816973617', NULL, NULL, 'default.png', 1, 1),
(42, '1223434345345', 'WhatsApp Image 2024-02-27 at 21.27.08.jpeg', 'Syamsul', 'syamsul@mail.com', '$2y$10$2VmGBmlF1hjPBrikUmwppeOFLwA42rOQjTGRj57zKpIpxqInQkv2O', 'Makassar, 18-09-1993', 'L', 'SAUDAGAR', '082177733329', '088123235423', 'Pengusaha', 'default.png', 1, 1),
(44, '1234567876524', '', 'Baso', 'baso@b.com', '$2y$10$d0PdqAvVy7JLYjCjVZpghuDTz3MKAa28h1HOl5XEM3Q37ON64GHn6', NULL, 'L', 'Jl. Gowa', '123456765653', NULL, NULL, 'default.png', 2, 1),
(45, '7306082809970', 'Cuplikan layar 2024-01-24 193025.png', 'MUHAMMAD FADLAN ASDAR', NULL, '$2y$10$dqaXXH3fWbsN59VTKmHRpuyfi40x1ntEldaco2CX2ANYKyVPEXnxG', 'SINJAI, 28-09-1997', 'L', 'BTN MINASA UPA BLOK M 14 NO.7B', '08114444262', '0', 'PELAJAR', 'default.png', 3, 1),
(54, '7371022709790', 'defaultktp.jpg', 'LUKMAN', NULL, '$2y$10$C/DM5HNLtmnoyPerhh4iAeS/u5im0C7QPcis1FiXU0tdfZY2YcPdC', 'PALOPO, 27-09-1979', 'L', 'JL. BONTOTANGMGA NO.30', '0', '0', 'WIRASWASTA', 'default.png', 3, 1),
(55, '7306083005990', 'defaultktp.jpg', 'Fathur Rahman Abdullah', NULL, '$2y$10$Q93cKmbjKW8ws8/LY01ZoeQ44Q7yJ1gtqPUGcgmuSXzqJ9VPXmiou', 'Ujung Pandang, 30 Mei 199', 'L', 'BTN Andi Tonro Permai A15 / 08', '085171012511', '085242488428', 'Freelance', 'default.png', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Karyawan'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewmobil`
-- (See below for the actual view)
--
CREATE TABLE `viewmobil` (
`id` int(3)
,`NoPlat` varchar(10)
,`KdMerk` varchar(20)
,`IdType` varchar(20)
,`StatusRental` enum('Jalan','Dipesan','Kosong')
,`HargaSewa` double(10,0)
,`FotoMobil` varchar(100)
,`NmMerk` varchar(50)
,`NmType` varchar(50)
,`JenisMobil` varchar(20)
,`Transmisi` enum('Manual','CVT','Matic')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewtransaksi`
-- (See below for the actual view)
--
CREATE TABLE `viewtransaksi` (
`NoTransaksi` char(8)
,`NIK` char(13)
,`Id_Mobil` int(3)
,`Tanggal_Pesan` date
,`Tanggal_Pinjam` date
,`Tanggal_Kembali_Rencana` date
,`Tanggal_Kembali_Sebenarnya` date
,`LamaRental` int(3)
,`LamaDenda` int(3)
,`Kerusakan` text
,`Id_Sopir` char(6)
,`BiayaBBM` double(10,0)
,`BiayaKerusakan` double(10,0)
,`Denda` double(10,0)
,`Total_Bayar` double(10,0)
,`Jumlah_Bayar` double(10,0)
,`Kembalian` double(10,0)
,`StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai')
,`Nama` varchar(30)
,`NamaUser` varchar(50)
,`Alamat` text
,`NoTelp` varchar(13)
,`NoTelpKerabat` varchar(13)
,`ttl` varchar(25)
,`pekerjaan` varchar(50)
,`NmSopir` varchar(50)
,`TarifPerhari` double(10,0)
,`Arsip` int(1)
,`NoPlat` varchar(10)
,`HargaSewa` double(10,0)
,`NmMerk` varchar(50)
,`NmType` varchar(50)
,`status_bayar` text
,`Mhrg_harian` double(10,0)
,`sisa_bayar` double(10,0)
,`berangkat` varchar(20)
,`pulang` varchar(20)
,`panjar` double(10,0)
,`tarifsopir` double(10,0)
,`tujuan` varchar(50)
,`jaminan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewtype`
-- (See below for the actual view)
--
CREATE TABLE `viewtype` (
`id` int(3)
,`IdType` varchar(20)
,`NmType` varchar(50)
,`KdMerk` varchar(50)
,`NmMerk` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewusers`
-- (See below for the actual view)
--
CREATE TABLE `viewusers` (
`id` int(3)
,`NIK` char(13)
,`Nama` varchar(30)
,`NamaUser` varchar(50)
,`Password` varchar(255)
,`JenisKelamin` enum('L','P')
,`Alamat` text
,`NoTelp` varchar(13)
,`Foto` varchar(100)
,`RoleId` int(2)
,`IsActive` int(1)
,`role` varchar(20)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`,`KdMerk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`,`NoPlat`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`,`IdSopir`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NoTransaksi`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`,`IdType`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`NIK`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- --------------------------------------------------------

--
-- Structure for view `viewmobil`
--
DROP TABLE IF EXISTS `viewmobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`konj4576`@`localhost` SQL SECURITY DEFINER VIEW `viewmobil`  AS SELECT `mobil`.`id` AS `id`, `mobil`.`NoPlat` AS `NoPlat`, `mobil`.`KdMerk` AS `KdMerk`, `mobil`.`IdType` AS `IdType`, `mobil`.`StatusRental` AS `StatusRental`, `mobil`.`HargaSewa` AS `HargaSewa`, `mobil`.`FotoMobil` AS `FotoMobil`, `merk`.`NmMerk` AS `NmMerk`, `type`.`NmType` AS `NmType`, `mobil`.`JenisMobil` AS `JenisMobil`, `mobil`.`Transmisi` AS `Transmisi` FROM ((`mobil` join `type` on(`mobil`.`IdType` = `type`.`IdType`)) join `merk` on(`mobil`.`KdMerk` = `merk`.`KdMerk`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewtransaksi`
--
DROP TABLE IF EXISTS `viewtransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`konj4576`@`localhost` SQL SECURITY DEFINER VIEW `viewtransaksi`  AS SELECT `transaksi`.`NoTransaksi` AS `NoTransaksi`, `transaksi`.`NIK` AS `NIK`, `transaksi`.`Id_Mobil` AS `Id_Mobil`, `transaksi`.`Tanggal_Pesan` AS `Tanggal_Pesan`, `transaksi`.`Tanggal_Pinjam` AS `Tanggal_Pinjam`, `transaksi`.`Tanggal_Kembali_Rencana` AS `Tanggal_Kembali_Rencana`, `transaksi`.`Tanggal_Kembali_Sebenarnya` AS `Tanggal_Kembali_Sebenarnya`, `transaksi`.`LamaRental` AS `LamaRental`, `transaksi`.`LamaDenda` AS `LamaDenda`, `transaksi`.`Kerusakan` AS `Kerusakan`, `transaksi`.`Id_Sopir` AS `Id_Sopir`, `transaksi`.`BiayaBBM` AS `BiayaBBM`, `transaksi`.`BiayaKerusakan` AS `BiayaKerusakan`, `transaksi`.`Denda` AS `Denda`, `transaksi`.`Total_Bayar` AS `Total_Bayar`, `transaksi`.`Jumlah_Bayar` AS `Jumlah_Bayar`, `transaksi`.`Kembalian` AS `Kembalian`, `transaksi`.`StatusTransaksi` AS `StatusTransaksi`, `users`.`Nama` AS `Nama`, `users`.`NamaUser` AS `NamaUser`, `users`.`Alamat` AS `Alamat`, `users`.`NoTelp` AS `NoTelp`, `users`.`NoTelpKerabat` AS `NoTelpKerabat`, `users`.`ttl` AS `ttl`, `users`.`pekerjaan` AS `pekerjaan`, `sopir`.`NmSopir` AS `NmSopir`, `sopir`.`TarifPerhari` AS `TarifPerhari`, `transaksi`.`Arsip` AS `Arsip`, `viewmobil`.`NoPlat` AS `NoPlat`, `viewmobil`.`HargaSewa` AS `HargaSewa`, `viewmobil`.`NmMerk` AS `NmMerk`, `viewmobil`.`NmType` AS `NmType`, `transaksi`.`status_bayar` AS `status_bayar`, `transaksi`.`Mhrg_harian` AS `Mhrg_harian`, `transaksi`.`sisa_bayar` AS `sisa_bayar`, `transaksi`.`berangkat` AS `berangkat`, `transaksi`.`pulang` AS `pulang`, `transaksi`.`panjar` AS `panjar`, `transaksi`.`tarifsopir` AS `tarifsopir`, `transaksi`.`tujuan` AS `tujuan`, `transaksi`.`jaminan` AS `jaminan` FROM (((`transaksi` join `sopir` on(`transaksi`.`Id_Sopir` = `sopir`.`IdSopir`)) join `users` on(`transaksi`.`NIK` = `users`.`NIK`)) join `viewmobil` on(`transaksi`.`Id_Mobil` = `viewmobil`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewtype`
--
DROP TABLE IF EXISTS `viewtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`konj4576`@`localhost` SQL SECURITY DEFINER VIEW `viewtype`  AS SELECT `type`.`id` AS `id`, `type`.`IdType` AS `IdType`, `type`.`NmType` AS `NmType`, `type`.`KdMerk` AS `KdMerk`, `merk`.`NmMerk` AS `NmMerk` FROM (`type` join `merk` on(`type`.`KdMerk` = `merk`.`KdMerk`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewusers`
--
DROP TABLE IF EXISTS `viewusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`konj4576`@`localhost` SQL SECURITY DEFINER VIEW `viewusers`  AS SELECT `users`.`id` AS `id`, `users`.`NIK` AS `NIK`, `users`.`Nama` AS `Nama`, `users`.`NamaUser` AS `NamaUser`, `users`.`Password` AS `Password`, `users`.`JenisKelamin` AS `JenisKelamin`, `users`.`Alamat` AS `Alamat`, `users`.`NoTelp` AS `NoTelp`, `users`.`Foto` AS `Foto`, `users`.`RoleId` AS `RoleId`, `users`.`IsActive` AS `IsActive`, `user_role`.`role` AS `role` FROM (`users` join `user_role` on(`users`.`RoleId` = `user_role`.`id`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
