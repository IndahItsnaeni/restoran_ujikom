-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mar 2020 pada 03.34
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_beli`
--

CREATE TABLE `detail_beli` (
  `id_beli` int(10) NOT NULL,
  `kode_beli` char(10) NOT NULL,
  `id_masakan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id_detail_orders` int(10) NOT NULL,
  `id_orders` int(10) NOT NULL,
  `kode_beli` char(10) NOT NULL,
  `id_masakan` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status_detail_orders` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`id_detail_orders`, `id_orders`, `kode_beli`, `id_masakan`, `jumlah`, `keterangan`, `status_detail_orders`) VALUES
(33, 92, '58JN', 11, 1, '', 'dimasak'),
(34, 94, '8NWI', 6, 1, 'dingin', 'dimasak'),
(35, 94, '8NWI', 8, 1, 'bawang daun', 'dimasak'),
(36, 95, '4U75', 10, 1, 'manis', 'dimasak'),
(37, 95, '4U75', 5, 1, 'pedas', 'dimasak'),
(38, 96, '7TBZ', 10, 1, '', 'dimasak'),
(39, 97, 'P0RB', 6, 1, 'hm', 'dimasak'),
(40, 98, 'FA0N', 7, 1, '', 'dimasak'),
(41, 98, 'FA0N', 9, 1, '', 'dimasak'),
(42, 98, 'FA0N', 6, 1, '', 'dimasak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Kasir'),
(3, 'Owner'),
(4, 'Waiter'),
(5, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(10) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama_masakan` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `status_masakan` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `gambar`, `nama_masakan`, `harga`, `status_masakan`, `kategori`) VALUES
(5, '5dd33d643ca1b.jpeg', 'Nasi Goreng', 20000, 'Tersedia', 'Makanan'),
(6, '5e192d0f62b99.jpg', 'Aqua', 5000, 'Tersedia', 'Minuman'),
(7, '5e192dbf617fb.jpg', 'Ale-ale Rasa Anggur', 2000, 'Tersedia', 'Minuman'),
(8, '5e193f6ab81f9.jpg', 'Mie Kaldu Ayam', 20000, 'Tersedia', 'Makanan'),
(9, '5e378cae7ca1a.png', 'Cup Cake Chocolate', 75000, 'Tersedia', 'Makanan'),
(10, '5e378e08298b2.png', 'Green Tea Cup', 25000, 'Tersedia', 'Minuman'),
(11, '5e378ebc0decb.png', 'Fruit Salad', 35000, 'Tersedia', 'Minuman'),
(12, '5e378f6c010f6.png', 'Black Coffee', 45000, 'Tersedia', 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(10) NOT NULL,
  `kode_beli` char(10) NOT NULL,
  `no_meja` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status_orders` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `kode_beli`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_orders`) VALUES
(92, '58JN', '12', '2020-03-06', 10, 'tambahkan taplak meja', 'Sudah Dibayar'),
(94, '8NWI', '5', '2020-03-06', 10, 'tambahkan taplak meja', 'Sudah Dibayar'),
(95, '4U75', '8', '2020-03-06', 14, 'tisue', 'Belum Dibayar'),
(96, '7TBZ', '15', '2020-03-06', 14, '', 'Sudah Dibayar'),
(97, 'P0RB', '1', '2020-03-06', 14, 'hmmm', 'Sudah Dibayar'),
(98, 'FA0N', '2', '2020-03-11', 16, '', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_beli`) VALUES
(132, '2020-02-13'),
(133, '2020-02-13'),
(134, '2020-02-13'),
(135, '2020-02-16'),
(136, '2020-02-16'),
(137, '2020-02-16'),
(138, '2020-02-16'),
(139, '2020-02-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_orders` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_orders`, `tanggal`, `total_bayar`) VALUES
(8, 9, 92, '2020-03-11', 35000),
(9, 9, 98, '2020-03-11', 82000),
(10, 9, 94, '2020-03-11', 25000),
(11, 17, 98, '2020-03-11', 0),
(12, 17, 96, '2020-03-11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `id_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(9, 'jihan123', '$2y$10$n7rhjQ1CvILCMS59maeT0.4iBYAORSFwAfBB5Dh.NxPdRw56G5aoS', 'Jihan Humaira', 2),
(10, 'admin', '$2y$10$1e9qdeGS7XEjQR.o80iKi.k76pEdX3TbnLNe4X0WXoJxfVZWtZZJS', 'Indah Itsnaeni', 1),
(14, 'cucu', '$2y$10$4RgIjr7mXFo3U.kXHuMBxOKWwKj2GnCNosBfRwTosWsMUzwfJMI2C', 'Cucu Destiani', 5),
(15, 'indah123', '$2y$10$c5S7acj5ZwFho0LYrSg80uT4Lt5QhXzLc/HkV0vDTlT/1k/ODchhS', 'Indah Itsnaeni', 3),
(16, 'umayah', '$2y$10$dc3YSERyF6nHjzShR1Wete6TjBg3hLt.DCqO4EqmeY7eZirrdFApW', 'umayah', 5),
(17, 'alfi', '$2y$10$zwzXPgwK4tH3dJAiN.PFsO/m7StJZh.UwiWEtA7x/9Wh7AXMG/W2q', 'alfiyatul', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_produk` (`id_masakan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id_detail_orders`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_masakan` (`id_masakan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_beli`
--
ALTER TABLE `detail_beli`
  MODIFY `id_beli` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id_detail_orders` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`),
  ADD CONSTRAINT `detail_orders_ibfk_2` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
