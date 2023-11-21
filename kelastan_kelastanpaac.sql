-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Nov 2023 pada 11.19
-- Versi server: 10.6.15-MariaDB-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelastan_kelastanpaac`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `waktu_posting` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `waktu_posting`) VALUES
(3, 'Gayahsgsg', 'Jagzgxhxh', '2023-11-19 03:06:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_gambar`
--

CREATE TABLE `berita_gambar` (
  `id` int(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `waktu_posting` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita_gambar`
--

INSERT INTO `berita_gambar` (`id`, `judul`, `deskripsi`, `waktu_posting`, `foto`) VALUES
(2, 'Test231312', 'sflkajdlfkajdfkahdfajl adlkjfhadkjfadf', '2023-11-12 08:29:46', '20231112082946.'),
(3, 'asdadasdasd', '2132edasdas', '2023-11-12 08:30:02', '20231112083002.'),
(4, '1;23k12l3', 'dd;askd;lasdk', '2023-11-12 08:31:09', '20231112083109.'),
(5, 'sadasdasdasd', 'asdasdasd', '2023-11-12 08:33:51', '20231112083351.'),
(6, 'asdadasd', 'asdasddas', '2023-11-12 08:35:28', '20231112083528.'),
(7, 'hgfjf', 'jhkhjh', '2023-11-12 08:37:35', 'hgfjf.'),
(8, 'lkalsjdk', 'as;dlkas;dk', '2023-11-12 08:42:31', 'lkalsjdk.'),
(10, 'asdasdasdasd', 'asdad', '2023-11-12 08:50:46', ''),
(12, 'Gilasdkjashd', 'asdjalkdasjdkl', '2023-11-12 08:57:21', '20231157085721.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `foto`, `nama`, `gender`, `role`) VALUES
('33422201', '33422201.png', 'Alma Nazhifa', 'P', 'Mahasiswa'),
('33422202', '33422202.png', 'Ananda Waldi Izulhaq', 'L', 'Mahasiswa'),
('33422203', '33422203.png', 'Arifa Mutia Widyadhari', 'P', 'Sekretaris'),
('33422204', '33422204.png', 'Aufaa Hamiidah Aryana', 'P', 'Mahasiswa'),
('33422205', '33422205.png', 'Bagus Surya Atmaja', 'L', 'Mahasiswa'),
('33422206', '33422206.png', 'Elang Argawana', 'L', 'Mahasiswa'),
('33422207', '33422207.png', 'Faiza Kurniawati', 'P', 'Mahasiswa'),
('33422208', '33422208.png', 'Gilang Raka Ramadhan', 'L', 'Mahasiswa'),
('33422209', '33422209.png', 'Isma Tania Rahmawati', 'P', 'Mahasiswa'),
('33422210', '33422210.png', 'Jhoy Marice Septiani Ohee', 'P', 'Mahasiswa'),
('33422211', '33422211.png', 'Krisna Desta Pradana', 'P', 'Mahasiswa'),
('33422212', '33422212.png', 'Mochammad Anda Fadholli', 'L', 'Mahasiswa'),
('33422213', '33422213.png', 'Muhammad Fayakun', 'L', 'Mahasiswa'),
('33422214', '33422214.png', 'Muhammad Raafi Hariyadi', 'L', 'Mahasiswa'),
('33422215', '33422215.png', 'Nabila Khairunnisa Dian Pranata', 'P', 'Bendahara'),
('33422216', '33422216.png', 'Naufal Martriputra', 'L', 'Wakil Ketu'),
('33422217', '33422217.png', 'Nurul Atha Indrastuti', 'P', 'Mahasiswa'),
('33422218', '33422218.png', 'Quenna Azra Riyanto', 'P', 'Mahasiswa'),
('33422219', '33422219.png', 'Raden Roro Faydiqta Regi Nur Bintani', 'P', 'Mahasiswa'),
('33422220', '33422220.png', 'Roy Arya Anugrah Julian Saputra Hartono', 'L', 'Ketua Kela'),
('33422221', '33422221.png', 'Yufigor Caesar Tegarrakasabda', 'L', 'Mahasiswa'),
('33422222', '33422222.png', 'Yunanto Biantoro', 'L', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`,`judul`);

--
-- Indeks untuk tabel `berita_gambar`
--
ALTER TABLE `berita_gambar`
  ADD PRIMARY KEY (`judul`,`deskripsi`,`waktu_posting`,`foto`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`foto`,`nama`,`gender`,`role`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`password`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berita_gambar`
--
ALTER TABLE `berita_gambar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
