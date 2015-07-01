-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2015 at 06:22 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log-itb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `email`, `alamat`, `noTelp`) VALUES
('197109302008121002', 'Achmad Munir', 'test@test.com', 'Jl.Dimana saja', '022-22123421'),
('197308092006041001', 'Achmad Imam Kistijantoro', 'test@test.com', 'Jln.Dimanakah', '0283930222');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `email`, `alamat`, `noTelp`) VALUES
('12312312', 'Siapakah dia 1', 'siapakh@siapa.com', 'Jln.Dimanakah', '292929292123123');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `email`, `alamat`, `noTelp`) VALUES
('20302102', 'Test', '123123@itakvkd.com', 'jl.kdfkdsjfksdjf', '123913298193'),
('23513030', 'Rickard Elsen', 'rickardelsen@gmail.com', 'Dimana Aja', '022 2512356'),
('23513070', 'Elia Dolaciho Bangun', 'eliad.bangun@gmail.com', 'Jl. Pelindung Hewan No.8D', '087822233260');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `idrole` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `deskripsi`) VALUES
('Admin', 'Role yang berfungsi mengelola data user.'),
('Kaprodi', 'Dosen yang mengepalai program studi.'),
('Mahasiswa', 'Role yang mengikuti kegiatan Tugas Akhir, Kerja Praktek dan SKPI'),
('Pembimbing_TA', 'Dosen yang sudah diperbolehkan membimbing mahasiswa yang mengambil tugas akhir.'),
('TU_Akademik', 'Role yang mengelola data mahasiswa, dosen, tugas akhir, kerja praktek dan SKPI'),
('Wali', 'Dosen yang menjadi wali dari mahasiswa.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(18) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('197109302008121002', '1f16f2fc96c53f2659202661dafa87a89877b713'),
('20302102', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('23513030', 'd6626d119ad5b8e8a08497a12b5d2735574a9482'),
('23513070', 'b53faa1db42e54fc75e4fcfdc4c6a330f562b778');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `username` varchar(18) NOT NULL,
  `idrole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`username`, `idrole`) VALUES
('23513030', 'Admin'),
('197109302008121002', 'Kaprodi'),
('23513070', 'Kaprodi'),
('20302102', 'Mahasiswa'),
('197109302008121002', 'Pembimbing_TA'),
('23513030', 'Pembimbing_TA'),
('197109302008121002', 'Wali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`username`,`idrole`),
  ADD KEY `idrole` (`idrole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
