-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2024 pada 09.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(20) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `no_identitas`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
('AN-001', '222300018', 'Muhammad Nabil', 'Laki-Laki', 'Pekalongan', '030802820820'),
('AN-002', '222300002', 'Yoga Sugiono', 'Laki-Laki', 'Batang', '1212121'),
('AN-003', '222300037', 'Muhammad Said AlKhudri', 'Laki-Laki', 'Peklaongan', '23823927392'),
('AN-004', '222300022', 'Akhmad Reyhan Syabana', 'Laki-Laki', 'Pekalongan', '983298');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(20) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `sampul` text NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul`, `sampul`, `kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `status`) VALUES
('BK-001', 'Bawa aku pergi', 'Novel Kaila Zepeto.jpeg', 'Novel', 'Kaila Zapeto', 'Kaila Zapeto', '2024', 'ADA'),
('BK-002', 'Batu & Bambu', '_Batu & Bambu_ Children\'s Book.jpeg', 'Cerita anak', 'Yulianti Siantanjani', 'Yulianti Siantanjani', '2024', 'ADA'),
('BK-003', 'Danau Toba', 'Cerita Rakyat Asal-Usul Danau Toba Dan Pulau Samosir.jpeg', 'Cerita Rakyat', 'Dede Fiemansyah', 'Dede Fiemansyah', '2024', 'ADA'),
('BK-004', 'Sang Raja Hutan', 'inspirasi contoh Sampul Buku sang raja hutan - Templates by Canva.jpeg', 'Cerita anak', 'Heidi Saputra', 'Heidi Saputra', '2024', 'ADA'),
('BK-005', 'Putiput Siput Emas', 'Komik Putiput Siput Emas_.jpeg', 'Komik', 'Wafiq Sehat', 'Wafiq Sehat', '2024', 'ADA'),
('BK-006', 'Malin Kundang', 'Cerita Rakyat Malin Kundang Singkat.jpeg', 'Cerita Rakyat', 'Rini Kurniasih', 'Yayasan Mitra Netra ', '2024', 'ADA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1716965270),
('m130524_201442_init', 1716965273),
('m190124_110200_add_verification_token_column_to_user_table', 1716965273);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kd_pinjam` varchar(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `kd_buku` varchar(20) NOT NULL,
  `id_anggota` varchar(20) NOT NULL,
  `id_petugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kd_pengembalian` varchar(20) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` mediumint(9) NOT NULL,
  `kd_pinjam` varchar(20) NOT NULL,
  `kd_buku` varchar(20) NOT NULL,
  `id_anggota` varchar(20) NOT NULL,
  `id_petugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jabatan` varchar(80) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `password`, `jabatan`, `no_hp`, `alamat`) VALUES
('PE-001', 'Heru Tanoe', '', 'Pustakawan Madya', '12198291', 'Pekalongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(4, 'Uchiha NBL', 'tUu1qHcde0diwUol3xeI-18MuHkkprQI', '$2y$13$nJ1WDlBaGcbCdbNC5.5l4.sgy.OMEKCqtDQOdQ2OWpgiKRWYyzzne', 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490', 'sfriesen@jenkins.info', 10, 1392559490, 1392559490, NULL),
(5, 'nabil', 'Dv2fEZCkVPv10P1OGkapVbD8SawqKGD8', '$2y$13$J7ZJtCIVE5mVh2HB5DuLDOnzMc9FU0vbcpEnvDBMyqqcQMo.v3Gsu', NULL, 'nabil@gmail.com', 10, 1718158232, 1718158232, '0f4gPz5svPIq22zRszjVqGrdHwpYoYFx_1718158232'),
(6, 'yoga', '12345678', '$1$oB0fOY2E$TU3QgJ9ybSW03kLtXpk9W1', '', 'yoga@gmail.com', 10, 12345678, 12345678, ''),
(7, 'test', '6y4tydAaIqBXPPnlQHpyxaDbu_t86tVc', '$2y$13$u.GV2Syuh0XKdVxu9t3cJeBRJOo68KhL8PdQ4v6kBd2Xa5boEyPuu', NULL, 'rest@gmail.com', 10, 1718611724, 1718611724, '2kewZxCj030xoYFMAiLy7rg_YIXDKoxb_1718611724');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kd_pinjam`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kd_pengembalian`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
perpustakaanse_batik_ilhamperpustakaanperformance_schemaperformance_schemabuku