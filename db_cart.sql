-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2018 pada 12.48
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `status` enum('PAID','UNPAID') NOT NULL DEFAULT 'UNPAID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `id_user`, `date`, `due_date`, `status`) VALUES
(1, 'US352', '2018-01-16 11:28:53', '2018-01-17 11:28:53', 'UNPAID'),
(2, 'US352', '2018-01-16 11:29:33', '2018-01-17 11:29:33', 'UNPAID'),
(3, 'US352', '2018-01-16 11:30:42', '2018-01-17 11:30:42', 'UNPAID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id_bayar` varchar(5) NOT NULL,
  `nm_bayar` varchar(25) NOT NULL,
  `an` varchar(25) NOT NULL,
  `norek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_bayar`
--

INSERT INTO `metode_bayar` (`id_bayar`, `nm_bayar`, `an`, `norek`) VALUES
('MP001', 'BNI', 'Admin', '1234-2345-12'),
('MP002', 'BRI', 'Teduh', '1234-5432'),
('MP003', 'BJB', 'Yogi Aditya Saputra', '8897-8999-1112-3131'),
('MP004', 'Indonesia2', 'Nisa1', '8899-2234-24241');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `id` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id`, `id_user`, `nama`, `tanggal`, `bukti`) VALUES
('MP002', 'US352', 'Teduh Sanubari', '2018-01-16 11:48:01', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Minuman'),
(2, 'Catering Rumahan'),
(3, 'Catering Prasmanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_plg` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_plg`, `id_user`, `nama`, `email`, `alamat`, `telp`) VALUES
(108, 'US352', 'Teduh Sanubari', 'teduhsanubari74@gmail.com', 'Pangandaran', '083829973095');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_plg` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_ivc` int(10) DEFAULT NULL,
  `id_produk` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `batas` datetime NOT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `gambar` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `id_plg`, `id_user`, `id_ivc`, `id_produk`, `tanggal`, `batas`, `qty`, `harga`, `gambar`) VALUES
(125, '106', 'US352', 1, 'BR002', '2018-01-16 11:28:53', '2018-01-17 11:28:53', 1, '600000', '0215eb92eea7501f1a31e3b2bd3a1d29.jpg'),
(127, '108', 'US352', 3, 'BR002', '2018-01-16 11:30:42', '2018-01-17 11:30:42', 1, '600000', '0215eb92eea7501f1a31e3b2bd3a1d29.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(150) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `kategori`) VALUES
('BR002', 'Sop Buah', 'Minuman segar dan kaya vitamin c, cocok dinikmati saat siang hari dengan terik matahari yang panas.', '20000', 'ecc0fa910d9c658f761622661c84a38f.jpg', 1),
('BR003', 'Catering Prasmanan', 'Menu ini tersedia berbagai macam dengan stock porsi yaitu 500, enak dan nikmat.', '600000', '0215eb92eea7501f1a31e3b2bd3a1d29.jpg', 3),
('BR004', 'Menu Catering 2', 'Siap saji dimana pun anda berada, kami siap melayani anda dengan sepenuh hati :).', '15000', '12fd4eb04c7e13d33746cd3ef6803208.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ponsel` int(12) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `alamat`, `ponsel`, `password`, `level`) VALUES
('12345', 'teduh', 'teduh@yahoo.com', 'Bandung', 89973095, 'teduh1402', 'admin'),
('US349', 'Nisa', 'nisa@yahoo.com', 'Bandung', 9283938, '1234', 'user'),
('US350', 'user', 'uhuh@yahoo.com', 'Bandung', 9666, '1234', 'user'),
('US352', 'ica', 'teduh@yahoo.com', 'Bandung', 9666, '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_plg`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_plg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
