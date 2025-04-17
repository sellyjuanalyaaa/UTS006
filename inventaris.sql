-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2025 pada 13.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `stok`, `deskripsi`) VALUES
(3, 1, 'Galon', 25, 'Konsumsi untuk panitia'),
(4, 1, 'Trash bag', 30, 'agar sampah tidak tercecer'),
(5, 1, 'Cup gelas', 20, '100/pcs per bks\r\n'),
(6, 2, 'Stopkontak', 10, ''),
(7, 2, 'Sound System', 2, 'Pengeras suara\r\n'),
(8, 2, 'Laptop', 0, 'Buat kerjain tugas'),
(9, 3, 'snowman papan tulis', 10, 'stok terbatas\r\n'),
(10, 2, 'TV', 6, 'Menonton tv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Perabot', 'Perabotan kantor'),
(2, 'Elektronik', 'Perangkat elektronik'),
(3, 'Alat Tulis', 'Peralatan tulis menulis'),
(4, 'Perkakas', 'Alat tukang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `waktu_pinjam` time DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `waktu_kembali` time DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_barang`, `jumlah`, `peminjam`, `tanggal_pinjam`, `waktu_pinjam`, `tanggal_kembali`, `waktu_kembali`, `status`) VALUES
(1, 3, 5, 'Dimas', '2025-04-17', '05:37:38', '2025-04-17', '05:38:12', 'Dikembalikan'),
(2, 4, 21, 'Tsanyst', '2025-04-17', '05:38:45', '2025-04-17', '17:30:32', 'Dikembalikan'),
(3, 7, 1, 'Dimas', '2025-04-17', '06:08:45', '2025-04-17', '14:08:40', 'Dikembalikan'),
(4, 7, 1, 'Nadzare', '2025-04-17', '06:09:32', '2025-04-17', '06:09:56', 'Dikembalikan'),
(5, 8, 5, 'Raihan Pati', '2025-04-17', '15:09:59', NULL, NULL, 'Dipinjam'),
(6, 3, 7, 'Alfaen Tegal', '2025-04-17', '15:10:38', NULL, NULL, 'Dipinjam'),
(7, 3, 6, 'Kafah Gamtenk', '2025-04-17', '15:11:32', NULL, NULL, 'Dipinjam'),
(8, 3, 9, 'alya', '2025-04-17', '15:12:18', NULL, NULL, 'Dipinjam'),
(9, 3, 2, 'dimas', '2025-04-17', '15:12:53', NULL, NULL, 'Dipinjam'),
(10, 3, 1, 'alya', '2025-04-07', '15:14:43', NULL, NULL, 'Dipinjam'),
(11, 5, 20, 'Fatimah', '2025-04-19', '15:32:15', '2025-04-17', '17:12:58', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','peminjam') NOT NULL DEFAULT 'peminjam',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nama_lengkap`, `role`, `created_at`, `updated_at`) VALUES
(6, 'admin123', '$2y$10$4wEScqG.hYzGSn17Zftmdustkm/AXbzlTxtM5LNly8hQHvpiuPJpK', 'sellyjuanalyarsln26@gmail.com', 'sellyjuan', 'peminjam', '2025-04-17 09:03:28', '2025-04-17 09:03:28'),
(7, 'kendika123', '$2y$10$zXT3ij8hcSkugkRfypFHg.HKZESgSsq9QaGqY6pHaI6pkkWeQYQdm', 'kendika@gmail.com', 'kendika', 'peminjam', '2025-04-17 09:27:22', '2025-04-17 09:27:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
