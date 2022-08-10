-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2022 at 06:05 AM
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
-- Database: `db_penjualan_arrahman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `hargajual` int(11) DEFAULT NULL,
  `hargabeli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`idbarang`, `namabarang`, `idkategori`, `stok`, `hargajual`, `hargabeli`) VALUES
(1, 'Semen Tiga Roda', 7, 55, 56000, 48000),
(2, 'Semen Holchim', 7, 80, 57000, 50000),
(4, 'Soka Genteng', 2, 194, 1000, 800),
(5, 'Kebumen Genteng', 2, 770, 1300, 900),
(6, 'Pralin set 2m Rucika', 4, 27, 21000, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_beli`
--

CREATE TABLE `tb_item_beli` (
  `iditembeli` int(11) NOT NULL,
  `idpembelian` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_item_beli`
--

INSERT INTO `tb_item_beli` (`iditembeli`, `idpembelian`, `idbarang`, `harga`, `jumlah`) VALUES
(7, 12, 2, 50000, 200),
(13, 17, 1, 48000, 2),
(14, 17, 4, 800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_jual`
--

CREATE TABLE `tb_item_jual` (
  `iditemjual` int(11) NOT NULL,
  `idpenjualan` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_item_jual`
--

INSERT INTO `tb_item_jual` (`iditemjual`, `idpenjualan`, `idbarang`, `harga`, `jumlah`) VALUES
(2, 1, 1, 56000, 5),
(3, 1, 2, 57000, 2),
(4, 2, 1, 56000, 50),
(5, 2, 2, 57000, 20),
(6, 2, 5, 900, 400),
(8, 2, 4, 800, 240),
(9, 5, 1, 56000, 2),
(10, 6, 2, 57000, 49),
(13, 9, 5, 1300, 13),
(14, 9, 6, 21000, 33),
(15, 9, 2, 57000, 14),
(16, 9, 1, 56000, 4),
(17, 9, 4, 1000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Besi Baru'),
(2, 'Genteng'),
(3, 'Keramik'),
(4, 'Pralon'),
(7, 'Semen Baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namapelanggan`, `notelepon`, `alamat`, `email`) VALUES
(1, 'Suraji', '0819097789800', 'Sukoharjo', 'suraamin@gmail.com'),
(2, 'Samhadi', '081900967828', 'Sukoahrjo', 'samhadi128@gmail.com'),
(3, 'Suhadi Mangunjiwo', '082909678232', 'Sampih, Sukoharjo', 's.magun@gmail.com'),
(4, 'Sarmidi', '081909678222', 'Suroyudan', 'sarmidi2203@gmail.com'),
(5, 'Nova Arianto', '087789562567', 'Mergosari', 'maknyusnova@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idpenjualan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `dibayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`idpembayaran`, `idpenjualan`, `tanggal`, `dibayar`) VALUES
(2, 5, '2022-08-02', 100000),
(3, 5, '2022-08-02', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `idpembelian` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idsupplier` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`idpembelian`, `tanggal`, `idsupplier`, `total`) VALUES
(12, '2022-06-04', 3, 10000000),
(17, '2022-08-24', 3, 96800);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `idpengguna` int(11) NOT NULL,
  `namapengguna` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`idpengguna`, `namapengguna`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'kasir', 'kasir', 'kasir', 'kasir'),
(3, 'pemilik', 'pemilik', 'pemilik', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `idpenjualan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idpelanggan` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `jenisbayar` varchar(20) DEFAULT NULL,
  `statusbayar` varchar(20) DEFAULT NULL,
  `namasopir` varchar(50) DEFAULT NULL,
  `statuskirim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`idpenjualan`, `tanggal`, `idpelanggan`, `total`, `jenisbayar`, `statusbayar`, `namasopir`, `statuskirim`) VALUES
(1, '2022-06-26', 1, 394000, 'Langsung', 'Lunas', 'Pak Banu', 'Selesai'),
(2, '2022-06-26', 2, 200000, 'Langsung', 'Lunas', NULL, NULL),
(3, '2022-06-26', 3, 145000, 'Langsung', 'Lunas', NULL, NULL),
(4, '2022-06-26', 1, 70000, 'Langsung', 'Lunas', NULL, NULL),
(5, '2003-05-10', 1, 112000, 'Kredit', 'Lunas', NULL, NULL),
(6, '1975-10-19', 1, 2793000, 'Kredit', 'Belum Lunas', NULL, NULL),
(9, '2022-06-15', 1, 1743900, 'Kredit', 'Belum Lunas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `idsupplier` int(11) NOT NULL,
  `namasupplier` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`idsupplier`, `namasupplier`, `notelepon`, `alamat`) VALUES
(2, 'CV Sidojoyo', '081909717190', 'Banyumas'),
(3, 'CV Makmur Sentosa Baru', '021789044822', 'Jln Gota Gati , Purwokerto');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_barang`
--

CREATE TABLE `tmp_barang` (
  `tmp_id` int(11) NOT NULL,
  `tmp_nama` varchar(50) NOT NULL,
  `tmp_harga` int(11) NOT NULL,
  `tmp_jumlah` int(11) NOT NULL,
  `tmp_subtotal` int(11) NOT NULL,
  `tmp_jenis` varchar(10) NOT NULL,
  `tmp_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `tb_barang_ibfk_1` (`idkategori`);

--
-- Indexes for table `tb_item_beli`
--
ALTER TABLE `tb_item_beli`
  ADD PRIMARY KEY (`iditembeli`),
  ADD KEY `idpembelian` (`idpembelian`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `tb_item_jual`
--
ALTER TABLE `tb_item_jual`
  ADD PRIMARY KEY (`iditemjual`),
  ADD KEY `idpenjualan` (`idpenjualan`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idpenjualan` (`idpenjualan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `idsupplier` (`idsupplier`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `idpelanggan` (`idpelanggan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_item_beli`
--
ALTER TABLE `tb_item_beli`
  MODIFY `iditembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_item_jual`
--
ALTER TABLE `tb_item_jual`
  MODIFY `iditemjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `idpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `tb_kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_item_beli`
--
ALTER TABLE `tb_item_beli`
  ADD CONSTRAINT `tb_item_beli_ibfk_1` FOREIGN KEY (`idpembelian`) REFERENCES `tb_pembelian` (`idpembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_item_beli_ibfk_2` FOREIGN KEY (`idbarang`) REFERENCES `tb_barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_item_jual`
--
ALTER TABLE `tb_item_jual`
  ADD CONSTRAINT `tb_item_jual_ibfk_1` FOREIGN KEY (`idpenjualan`) REFERENCES `tb_penjualan` (`idpenjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_item_jual_ibfk_2` FOREIGN KEY (`idbarang`) REFERENCES `tb_barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`idpenjualan`) REFERENCES `tb_penjualan` (`idpenjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`idsupplier`) REFERENCES `tb_supplier` (`idsupplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `tb_pelanggan` (`idpelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
