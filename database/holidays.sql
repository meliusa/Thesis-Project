-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2024 pada 14.17
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
-- Database: `script-sweet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `holidays`
--

INSERT INTO `holidays` (`id`, `year`, `date`, `name`, `created_at`, `updated_at`) VALUES
(1, '2024', '2024-12-25', 'Hari Raya Natal', '2024-03-22 13:05:12', NULL),
(2, '2024', '2024-09-15', 'Maulid Nabi Muhammad SAW', '2024-03-22 13:05:12', NULL),
(3, '2024', '2024-08-17', 'Hari Proklamasi Kemerdekaan RI', '2024-03-22 13:05:12', NULL),
(4, '2024', '2024-07-07', 'Tahun Baru Islam 1446 Hijriyah', '2024-03-22 13:05:12', NULL),
(5, '2024', '2024-06-17', 'Hari Raya Idul Adha 1445 Hijriyah', '2024-03-22 13:05:12', NULL),
(6, '2024', '2024-06-01', 'Hari Lahirnya Pancasila', '2024-03-22 13:05:12', NULL),
(7, '2024', '2024-05-23', 'Hari Raya Waisak 2568', '2024-03-22 13:05:12', NULL),
(8, '2024', '2024-05-09', 'Kenaikan Isa Al Masih', '2024-03-22 13:05:12', NULL),
(9, '2024', '2024-05-01', 'Hari Buruh Internasional', '2024-03-22 13:05:12', NULL),
(10, '2024', '2024-04-11', 'Hari Raya Idul Fitri 1445 Hijriyah', '2024-03-22 13:05:12', NULL),
(11, '2024', '2024-04-10', 'Hari Raya Idul Fitri 1445 Hijriyah', '2024-03-22 13:05:12', NULL),
(12, '2024', '2024-03-29', 'Wafat Isa Al Masih', '2024-03-22 13:05:12', NULL),
(13, '2024', '2024-03-11', 'Hari Raya Nyepi', '2024-03-22 13:05:12', NULL),
(14, '2024', '2024-02-10', 'Tahun Baru Imlek 2575 Kongzili', '2024-03-22 13:05:12', NULL),
(15, '2024', '2024-02-08', 'Isra Mikraj Nabi Muhammad SAW', '2024-03-22 13:05:12', NULL),
(16, '2024', '2024-01-01', 'Tahun Baru Masehi', '2024-03-22 13:05:12', NULL),
(17, '2025', '2025-12-25', 'Hari Raya Natal', '2024-03-22 13:05:12', NULL),
(18, '2025', '2025-09-05', 'Maulid Nabi Muhammad SAW', '2024-03-22 13:05:12', NULL),
(19, '2025', '2025-08-17', 'Hari Proklamasi Kemerdekaan RI', '2024-03-22 13:05:12', NULL),
(20, '2025', '2025-06-27', 'Tahun Baru Islam 1447 Hijriyah', '2024-03-22 13:05:12', NULL),
(21, '2025', '2025-06-07', 'Hari Raya Idul Adha 1446 Hijriyah', '2024-03-22 13:05:12', NULL),
(22, '2025', '2025-06-01', 'Hari Lahirnya Pancasila', '2024-03-22 13:05:12', NULL),
(23, '2025', '2025-05-29', 'Kenaikan Isa Al Masih', '2024-03-22 13:05:12', NULL),
(24, '2025', '2025-05-12', 'Hari Raya Waisak 2569', '2024-03-22 13:05:12', NULL),
(25, '2025', '2025-05-01', 'Hari Buruh Internasional', '2024-03-22 13:05:12', NULL),
(26, '2025', '2025-04-18', 'Wafat Isa Al Masih', '2024-03-22 13:05:12', NULL),
(27, '2025', '2025-04-01', 'Hari Raya Idul Fitri 1446 Hijriyah', '2024-03-22 13:05:12', NULL),
(28, '2025', '2025-03-31', 'Hari Raya Idul Fitri 1446 Hijriyah', '2024-03-22 13:05:12', NULL),
(29, '2025', '2025-03-29', 'Hari Raya Nyepi', '2024-03-22 13:05:12', NULL),
(30, '2025', '2025-01-29', 'Tahun Baru Imlek 2576 Kongzili', '2024-03-22 13:05:12', NULL),
(31, '2025', '2025-01-27', 'Isra Mikraj Nabi Muhammad SAW', '2024-03-22 13:05:12', NULL),
(32, '2025', '2025-01-01', 'Tahun Baru Masehi', '2024-03-22 13:05:12', NULL),
(33, '2026', '2026-12-25', 'Hari Raya Natal', '2024-03-22 13:05:12', NULL),
(34, '2026', '2026-08-25', 'Maulid Nabi Muhammad SAW', '2024-03-22 13:05:12', NULL),
(35, '2026', '2026-08-17', 'Hari Proklamasi Kemerdekaan RI', '2024-03-22 13:05:12', NULL),
(36, '2026', '2026-06-16', 'Tahun Baru Islam 1448 Hijriyah', '2024-03-22 13:05:12', NULL),
(37, '2026', '2026-06-01', 'Hari Lahirnya Pancasila', '2024-03-22 13:05:12', NULL),
(38, '2026', '2026-05-31', 'Hari Raya Waisak 2570', '2024-03-22 13:05:12', NULL),
(39, '2026', '2026-05-27', 'Hari Raya Idul Adha 1447 Hijriyah', '2024-03-22 13:05:13', NULL),
(40, '2026', '2026-05-14', 'Kenaikan Isa Al Masih', '2024-03-22 13:05:13', NULL),
(41, '2026', '2026-05-01', 'Hari Buruh Internasional', '2024-03-22 13:05:13', NULL),
(42, '2026', '2026-04-03', 'Wafat Isa Al Masih', '2024-03-22 13:05:13', NULL),
(43, '2026', '2026-03-21', 'Hari Raya Idul Fitri 1447 Hijriyah', '2024-03-22 13:05:13', NULL),
(44, '2026', '2026-03-20', 'Hari Raya Idul Fitri 1447 Hijriyah', '2024-03-22 13:05:13', NULL),
(45, '2026', '2026-03-19', 'Hari Raya Nyepi', '2024-03-22 13:05:13', NULL),
(46, '2026', '2026-02-17', 'Tahun Baru Imlek 2577 Kongzili', '2024-03-22 13:05:13', NULL),
(47, '2026', '2026-01-16', 'Isra Mikraj Nabi Muhammad SAW', '2024-03-22 13:05:13', NULL),
(48, '2026', '2026-01-01', 'Tahun Baru Masehi', '2024-03-22 13:05:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
