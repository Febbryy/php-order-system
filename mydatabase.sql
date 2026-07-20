-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Waktu pembuatan: 20 Jul 2026 pada 02.31
-- Versi server: 8.0.46
-- Versi PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `mydatabase`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desain`
--

CREATE TABLE `desain` (
  `id_desain` int NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `nama_desain` varchar(100) DEFAULT NULL,
  `gambar_desain` varchar(255) DEFAULT NULL,
  `harga_tambahan` decimal(10,2) DEFAULT '0.00',
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `desain`
--

INSERT INTO `desain` (`id_desain`, `id_pelanggan`, `nama_desain`, `gambar_desain`, `harga_tambahan`, `keterangan`) VALUES
(27, 38, 'baju sekolah', '1783481233_Screenshot 2026-05-02 052054.png', 0.00, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi dolore illum animi expedita consectetur inventore, veniam iure aliquid eveniet. Assumenda aut porro quaerat praesentium eius magni corporis, iusto sint tenetur?'),
(28, 38, 'baju sekolah', '1783482268_Screenshot 2026-05-30 073324.png', 0.00, 'test 1'),
(29, 1, 'baju sekolah', 'download.png', 0.00, 'tsting'),
(31, 38, 'baju sekolah', 'Jenis-Model-Kaos-Ringer.jpg', 0.00, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi dolore illum animi expedita consectetur inventore, veniam iure aliquid eveniet. Assumenda aut porro quaerat praesentium eius magni corporis, iusto sint tenetur?'),
(32, 38, 'baju sekolah', 'Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.webp', 0.00, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, eligendi quia, dignissimos quod molestiae quisquam, quibusdam dolorem corporis pariatur laborum accusantium dicta beatae perspiciatis reiciendis deserunt aliquid ad blanditiis voluptatem.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int NOT NULL,
  `id_pesanan` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL,
  `id_desain` int DEFAULT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(4, 'Baju Sekolah', NULL),
(5, 'Baju Casual', NULL),
(6, 'Jaket', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `jenis_produk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `warna_produk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stock_keranjang` int NOT NULL,
  `ukuran_produk` text NOT NULL,
  `harga_produk_pesanan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `jenis_produk`, `warna_produk`, `stock_keranjang`, `ukuran_produk`, `harga_produk_pesanan`) VALUES
(10, 38, 'Hoodie', 'Hitam', 1, 'S', 250000),
(12, 38, 'Kemeja', 'Kuning', 1, 'L', 200000),
(13, 38, 'Kaos', 'Abu-abu', 1, 'S', 150000),
(14, 38, 'Kaos', 'Hijau', 1, 'M', 150000),
(15, 38, 'Kaos', 'Hijau', 1, 'M', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal_daftar` datetime DEFAULT CURRENT_TIMESTAMP,
  `password_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `no_telepon`, `email`, `alamat`, `tanggal_daftar`, `password_pelanggan`, `username_pelanggan`) VALUES
(38, 'rian', '084619746', 'bijionta200@gmail.com', 'bogor barat sindang barang jembatan RT/RW 05/01', '2026-07-04 09:32:55', 'ilhamjago123', 'akutahu123'),
(40, 'ilham', '84176146', 'ilhamfebrianto66@gmail.com', NULL, '2026-07-06 03:24:42', 'akumerah123', 'akungojek123'),
(41, 'damar', '0823648254', 'febry400@gmail.com', ' BOGOR', '2026-07-07 13:08:55', 'admin123', 'damarlodon'),
(42, 'rian', '085381253871', 'bijionta200@gmail.com', 'tangerang', '2026-07-09 05:04:06', NULL, NULL),
(43, 'rian', '085381253871', 'bijionta200@gmail.com', 'tangerang', '2026-07-09 05:08:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `tanggal_pesan` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT 'pending',
  `total_harga` decimal(10,2) DEFAULT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text,
  `ukuran` varchar(10) DEFAULT NULL,
  `stok` int DEFAULT '0',
  `harga_produk` int NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_pelanggan`, `id_kategori`, `nama_produk`, `deskripsi`, `ukuran`, `stok`, `harga_produk`, `bukti_pembayaran`) VALUES
(36, 38, NULL, 'baju sekolah', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur provident corrupti minima sequi in', 'XL', 45, 2270000, ''),
(37, 38, NULL, 'baju seklah', 'etst 5', 'XL', 11, 570000, ''),
(38, 1, NULL, 'baju sekolah', 'baju untuk anak eklas 1 SD', 'L', 12, 620000, ''),
(40, 38, NULL, 'baju sekolah', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi dolore illum animi expedita consectetur inventore, veniam iure aliquid eveniet. Assumenda aut porro quaerat praesentium eius magni corporis, iusto sint tenetur?', 'XL', 5, 270000, ''),
(41, 38, NULL, 'baju renang', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, eligendi quia, dignissimos quod molestiae quisquam, quibusdam dolorem corporis pariatur laborum accusantium dicta beatae perspiciatis reiciendis deserunt aliquid ad blanditiis voluptatem.', 'XL', 3, 170000, '');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `desain`
--
ALTER TABLE `desain`
  ADD PRIMARY KEY (`id_desain`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_desain` (`id_desain`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desain`
--
ALTER TABLE `desain`
  MODIFY `id_desain` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`id_desain`) REFERENCES `desain` (`id_desain`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
