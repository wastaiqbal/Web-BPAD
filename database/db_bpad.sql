-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 06:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataasn`
--

CREATE TABLE `dataasn` (
  `nip` varchar(18) NOT NULL,
  `id_intansi` varchar(30) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dataasn`
--

INSERT INTO `dataasn` (`nip`, `id_intansi`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `foto`) VALUES
('199105152010000001', 'DLH005', 'Irham', 'DKI Jakarta', '1991-01-01', 'Laki-laki', 'Islam', 'DKI Jakarta', '081377783334', 'img-1.png'),
('199105152010000002', 'DHL001', 'Akbar', 'DKI Jakarta', '1991-01-02', 'Laki-laki', 'Kristen Protestan', 'DKI Jakarta', '082186869898', 'img-2.png'),
('199105152010000003', 'DPK002', 'Rani', 'Bandung', '1991-01-03', 'Perempuan', 'Islam', 'Bandung', '081377783334', 'img-3.png'),
('199105152010000004', 'DPU003', 'Ridwan', 'Lampung', '1991-01-04', 'Laki-laki', 'Kristen Katolik', 'DKI Jakarta', '082186869898', 'img-4.png'),
('222222222222222222', '11', '10000000000', '2', '2024-12-04', 'Laki-laki', 'Islam', '3', '3', 'img-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `datainstansi`
--

CREATE TABLE `datainstansi` (
  `ID_Instansi` varchar(50) NOT NULL,
  `Nama_Instansi` varchar(100) NOT NULL,
  `Alamat_Instansi` varchar(255) DEFAULT NULL,
  `Telp_Instansi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datainstansi`
--

INSERT INTO `datainstansi` (`ID_Instansi`, `Nama_Instansi`, `Alamat_Instansi`, `Telp_Instansi`) VALUES
('DHL001', 'Dinas Lingkungan Hidup', 'Jl. Raya Lingkungan No. 5', '021-1234567'),
('DLH005', 'Dinas Kesehatan', 'Jl. Kesehatan No. 3', '021-1122334'),
('DPK002', 'Dinas Pendidikan Kota', 'Jl. Pendidikan No. 10', '021-7654321'),
('DPP004', 'Dinas Perhubungan', 'Jl. Perhubungan No. 7', '021-9876543'),
('DPU003', 'Dinas Pekerjaan Umum', 'Jl. Pekerjaan Umum No. 15', '021-2345678');

-- --------------------------------------------------------

--
-- Table structure for table `datakendaraandinas`
--

CREATE TABLE `datakendaraandinas` (
  `ID_Kendaraan` varchar(50) NOT NULL,
  `Nopol` varchar(15) DEFAULT NULL,
  `Jenis_Roda` int(11) DEFAULT NULL CHECK (`Jenis_Roda` in (2,3,4)),
  `Merk` varchar(50) DEFAULT NULL,
  `Jenis_Kendaraan` varchar(50) DEFAULT NULL CHECK (`Jenis_Kendaraan` in ('Sedan','SUV','Sepeda Motor')),
  `Tahun_Kendaraan` int(11) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakendaraandinas`
--

INSERT INTO `datakendaraandinas` (`ID_Kendaraan`, `Nopol`, `Jenis_Roda`, `Merk`, `Jenis_Kendaraan`, `Tahun_Kendaraan`, `Status`) VALUES
('KD001', 'B 1234 CD', 4, 'Toyota', 'Sedan', 2020, 'Aktif'),
('KD002', 'B 5678 EF', 2, 'Honda', 'Sepeda Motor', 2018, 'Tidak Aktif'),
('KD003', 'B 9123 GH', 4, 'Daihatsu', 'SUV', 2022, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `datarekap`
--

CREATE TABLE `datarekap` (
  `Id_Rekap` int(11) NOT NULL,
  `Id_Kendaraan` varchar(50) NOT NULL,
  `Id_Intansi` varchar(50) NOT NULL,
  `Nama_Instansi` varchar(200) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Jumlah_ASN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datarekap`
--

INSERT INTO `datarekap` (`Id_Rekap`, `Id_Kendaraan`, `Id_Intansi`, `Nama_Instansi`, `Jumlah`, `Jumlah_ASN`) VALUES
(1, 'KD001', 'DHL001', 'Dinas Lingkungan Hidup', 10, 15),
(2, 'KD001', 'DPK002', 'Dinas Pendidikan', 5, 10),
(3, 'KD003', 'DPU003', 'Dinas Pekerjaan Umum', 6, 18),
(4, 'KD002', 'DPP004', 'Dinas Perhubungan', 7, 13),
(5, 'KD003', 'DLH005', 'Dinas Kesehatan', 12, 25),
(7, '', '', 'abc', 0, 0),
(8, '', '', 'acc', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datainstansi`
--
ALTER TABLE `datainstansi`
  ADD PRIMARY KEY (`ID_Instansi`);

--
-- Indexes for table `datakendaraandinas`
--
ALTER TABLE `datakendaraandinas`
  ADD PRIMARY KEY (`ID_Kendaraan`);

--
-- Indexes for table `datarekap`
--
ALTER TABLE `datarekap`
  ADD PRIMARY KEY (`Id_Rekap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datarekap`
--
ALTER TABLE `datarekap`
  MODIFY `Id_Rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
