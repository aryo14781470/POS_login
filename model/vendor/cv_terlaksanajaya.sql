-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 08:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_terlaksanajaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(20) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(20) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `dibuat_oleh`, `dibuat_tanggal`) VALUES
('HVS', 'Hout vrij schrijfpap', 'admin', '2022-10-31 11:12:00'),
('NCR', 'Non Carbon Required', 'admin', '2022-10-31 11:12:00'),
('TML', 'Thermal Paste', 'admin', '2022-11-06 18:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

CREATE TABLE `cart_order` (
  `id_cart` varchar(20) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `detail_qty` int(11) NOT NULL,
  `detail_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` text NOT NULL,
  `email_customer` varchar(20) NOT NULL,
  `contact_customer` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(20) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL,
  `diupdate_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `email_customer`, `contact_customer`, `dibuat_oleh`, `dibuat_tanggal`, `diupdate_tanggal`) VALUES
('CS001', 'asdsww', 'sadw', 'cvrf@gmail.com', '123123', 'admin', '2022-11-15 10:03:26', '2022-11-21 19:01:42'),
('CS002', 'Alfamart', 'Kranji', 'alfa@gmail.com', '088214781470', 'aryo354', '2023-01-03 13:48:27', '2023-01-03 13:48:27'),
('CS003', 'indomaret', 'Kranji', 'indomarco@gmail.com', '12345678', 'aryo354', '2023-05-22 08:31:40', '2023-05-22 08:31:40'),
('CS004', 'dandan', 'bintara', 'dan@gmail.com', '12345678', 'aryo354', '2023-05-22 08:38:20', '2023-05-22 08:38:20'),
('CS005', 'konyol', 'konyol', 'konyol@gmail.com', '123456', 'aryo354', '2023-05-22 08:46:06', '2023-05-22 08:46:06'),
('CS006', 'dora', 'dora', 'dora@gmail.com', '123456', 'aryo354', '2023-05-22 09:39:21', '2023-05-22 09:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_kategori_gambar` varchar(10) NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `nama_gambar`, `gambar`, `id_kategori_gambar`, `dibuat_oleh`, `dibuat_tanggal`) VALUES
(127, 'ser', 'IrlQraj8xOcuOEjoSslptMPAVUtLeDEVLuquwRYz.png', 'CF001', 'aryo354', '2023-06-09 15:23:34'),
(128, 'ser', 'XIj67oeH4FTiOZpuMVhzxv0XdoadJSrwxzBAxd1I.png', 'CF001', 'aryo354', '2023-06-09 15:25:48'),
(129, 'ser', 'XPLATLjS4G4ubVdIdohFEd7T8JLRJkPnFiroJv5J.png', 'CF001', 'aryo354', '2023-06-09 15:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_barang` varchar(20) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `harga_brg` int(11) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_bahan` varchar(20) NOT NULL,
  `id_ukuran` varchar(20) NOT NULL,
  `id_sheet` int(11) NOT NULL,
  `gambar_brg` varchar(100) NOT NULL,
  `di_buat_oleh` varchar(50) NOT NULL,
  `create_brg` datetime NOT NULL,
  `update_brg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `dibuat_oleh` varchar(100) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `dibuat_oleh`, `dibuat_tanggal`) VALUES
('BK001', 'Buku Tulis', 'admin', '2022-11-06 18:22:34'),
('CF001', 'Continuous Form', 'admin', '2022-11-04 00:00:00'),
('RL001', 'Roll', 'admin', '2022-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `name_level` varchar(100) NOT NULL,
  `acces_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`name_level`, `acces_level`) VALUES
('admin', 1),
('supplier', 2),
('customer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL,
  `acces` int(11) NOT NULL,
  `create_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sheet`
--

CREATE TABLE `sheet` (
  `id_sheet` int(11) NOT NULL,
  `lapisan_sheet` varchar(50) NOT NULL,
  `isi_sheet` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `dibuat_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sheet`
--

INSERT INTO `sheet` (`id_sheet`, `lapisan_sheet`, `isi_sheet`, `dibuat_oleh`, `dibuat_tanggal`) VALUES
(1, '1 play', '2000/box', 'admin', '2022-11-06 22:08:59'),
(2, '2 play', '1000/box', 'admin', '2022-11-06 22:09:27'),
(3, '3 play', '1000/box', 'admin', '2022-11-06 22:10:09'),
(4, '4 play', '500/box', 'admin', '2022-11-06 22:10:33'),
(5, '5 play', '500/box', 'admin', '2022-11-06 22:10:48'),
(6, '6 play', '500/box', 'admin', '2022-11-06 22:11:03'),
(7, '7 play', '500/box', 'admin', '2022-11-06 22:11:22'),
(8, '8 play', '500/box', 'admin', '2022-11-06 22:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL,
  `untuk_tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`id_transaksi`, `id_barang`, `id_customer`, `status`, `payment`, `dibuat_tanggal`, `untuk_tanggal`, `total`) VALUES
('202305250003', 'BRG004', 'CS002', 'Draft', 'Null', '2023-05-26 11:08:11', '2023-05-31 05:30:00', 1200000),
('202305250003', 'BRG004', 'CS002', 'Draft', 'Null', '2023-05-26 11:16:54', '2023-05-30 13:30:00', 1200000),
('202305250004', 'BRG003', 'CS006', 'Draft', 'Null', '2023-05-26 11:21:44', '2023-06-01 06:30:00', 495000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `email_supplier` varchar(20) NOT NULL,
  `contact_supplier` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(20) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL,
  `diupdate_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `email_supplier`, `contact_supplier`, `dibuat_oleh`, `dibuat_tanggal`, `diupdate_tanggal`) VALUES
('SP001', 'Indomaret', 'Gg hj naman 1 Kranji', 'indomaret@gmail.com', '88541845156', 'admin', '2022-11-12 00:00:00', '2022-11-12 00:00:00'),
('SP002', 'ananda', 'Pondok Ungu', 'Pondok Ungu', '88214781470', 'admin', '2022-11-12 14:08:01', '2022-11-12 14:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `untuk_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `dibuat_tanggal` datetime NOT NULL,
  `dibuat_oleh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `status`, `untuk_tanggal`, `dibuat_tanggal`, `dibuat_oleh`) VALUES
('202306130001', 'CS001', 'Billed', '2023-06-30 05:00:00', '2023-06-13 09:52:11', 'admin'),
('202306130002', 'CS002', 'Billed', '2023-06-30 06:00:00', '2023-06-13 10:33:08', 'admin'),
('202306130003', 'CS003', 'Approved', '2023-06-30 05:00:00', '2023-06-13 18:15:34', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `detail_qty` int(11) NOT NULL,
  `detail_harga` float NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi`, `id_barang`, `detail_qty`, `detail_harga`, `dibuat_tanggal`) VALUES
('202306130001', 'BRG001', 3, 20000, '2023-06-13 09:52:11'),
('202306130001', 'BRG002', 5, 75000, '2023-06-13 09:52:11'),
('202306130001', 'BRG003', 2, 200000, '2023-06-13 09:52:11'),
('202306130002', 'BRG003', 4, 200000, '2023-06-13 10:33:08'),
('202306130002', 'BRG002', 3, 75000, '2023-06-13 10:33:08'),
('202306130003', 'BRG001', 5, 20000, '2023-06-13 18:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_payment`
--

CREATE TABLE `transaksi_payment` (
  `id_transaksi` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `berkas` varchar(30) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `reference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_payment`
--

INSERT INTO `transaksi_payment` (`id_transaksi`, `total`, `ongkir`, `grand_total`, `bayar`, `berkas`, `metode`, `pembayaran`, `reference`) VALUES
('202306130001', 835000, '15000', 850000, 400000, '202306130001-1.png', '', 1, 'pembayaran pertama'),
('202306130001', 835000, '15000', 850000, 450000, '202306130001-2.png', '', 2, 'pembayaran kedua'),
('202306130002', 1025000, '15000', 1040000, 500000, '202306130002-1.png', '', 1, 'pembayaran 1'),
('202306130002', 1025000, '15000', 1040000, 540000, '202306130002-2.png', 'COD', 2, 'kedua');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` varchar(20) NOT NULL,
  `nama_ukuran` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(12) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`, `dibuat_oleh`, `dibuat_tanggal`) VALUES
('KS001', 'Khusus 9,5x13', 'admin', '2022-10-31 00:00:00'),
('ST001', 'Standart 9,5 x 11', 'admin', '2022-11-04 23:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acces` varchar(50) NOT NULL,
  `code` mediumint(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `fail` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL,
  `diupdate_tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `username`, `email`, `password`, `acces`, `code`, `status`, `fail`, `dibuat_tgl`, `diupdate_tgl`) VALUES
(2, 'aryo', 'aryoyusuf313@gmail.com', '$2y$10$sVkeegsrPSSwp3MpzYSwh.TvnFjihIP.87u2nZ/.pmhFV2H.j/RF6', '3', 0, 'verified', 2, '2022-11-19 14:20:57', '0000-00-00 00:00:00'),
(19, 'aryo354', 'aryoyusuf7@gmail.com', '$2y$10$rUnGh5Mvn157kTiXQPpOhOc7UCwHue/0eb9.htxN0rdNFkMd7cSaG', '1', 0, 'verified', 0, '2022-11-21 14:22:53', '0000-00-00 00:00:00'),
(20, 'lely', 'nurlaeli0705@gmail.com', '$2y$10$jF9bDR7jDVQ.s3m/HPAFQOLIRvxCIvPzHH6Rq0n5v5bSghlhcfpua', '', 0, 'verified', 0, '2023-03-04 12:23:12', '0000-00-00 00:00:00'),
(25, 'dwdw', 'socialaryo@gmail.com', '$2y$10$9FXDMI5FHBsOCajPgxOle.iUklYfIQHXazhFNwTfqwJyOvlejRH6C', '1', 0, 'verified', 0, '2023-05-22 09:46:42', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `sheet`
--
ALTER TABLE `sheet`
  ADD PRIMARY KEY (`id_sheet`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sheet`
--
ALTER TABLE `sheet`
  MODIFY `id_sheet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
