-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jun 2025 pada 09.27
-- Versi server: 8.0.30
-- Versi PHP: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freepsikotest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` bigint UNSIGNED NOT NULL,
  `id_responden` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `ulasan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_responden`, `rating`, `ulasan`) VALUES
(1, 1, 1, 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` bigint UNSIGNED NOT NULL,
  `id_pertanyaan` bigint UNSIGNED NOT NULL,
  `id_responden` bigint UNSIGNED NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `id_responden`, `jawaban`) VALUES
(1, 1, 1, '0'),
(2, 1, 1, '1'),
(3, 2, 1, '3'),
(4, 1, 1, '2'),
(5, 1, 1, '2'),
(6, 2, 1, '1'),
(7, 1, 1, '2'),
(8, 2, 1, '0'),
(9, 3, 1, '2'),
(10, 4, 1, '1'),
(11, 5, 1, '1'),
(12, 6, 1, '2'),
(13, 7, 1, '2'),
(14, 8, 1, '2'),
(15, 9, 1, '2'),
(16, 10, 1, '2'),
(17, 11, 1, '2'),
(18, 12, 1, '2'),
(19, 13, 1, '2'),
(20, 14, 1, '2'),
(21, 15, 1, '2'),
(22, 16, 1, '2'),
(23, 17, 1, '2'),
(24, 18, 1, '2'),
(25, 19, 1, '2'),
(26, 20, 1, '2'),
(27, 21, 1, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Depression'),
(2, 'Anxiety'),
(3, 'Stress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_06_25_074604_psikotest', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_kategori`, `pertanyaan`) VALUES
(1, 1, 'Saya merasa bahwa diri saya menjadi marah karena hal-hal sepele.'),
(2, 2, 'Saya merasa bibir saya sering kering.'),
(3, 3, 'Saya sama sekali tidak dapat merasakan perasaan positif.'),
(4, 2, 'Saya mengalami kesulitan bernafas (misalnya: seringkali terengah-engah atau tidak dapat bernafas padahal tidak melakukan aktivitas fisik sebelumnya).'),
(5, 3, 'Saya sepertinya tidak kuat lagi untuk melakukan suatu kegiatan.'),
(6, 1, 'Saya cenderung bereaksi berlebihan terhadap suatu situasi.'),
(7, 2, 'Saya merasa goyah (misalnya, kaki terasa mau ’copot’).'),
(8, 1, 'Saya merasa sulit untuk bersantai.'),
(9, 2, 'Saya menemukan diri saya berada dalam situasi yang membuat saya merasa sangat cemas dan saya akan merasa sangat lega jika semua ini berakhir.'),
(10, 3, 'Saya merasa tidak ada hal yang dapat diharapkan di masa depan.'),
(11, 1, 'Saya menemukan diri saya mudah merasa kesal.'),
(12, 1, 'Saya merasa telah menghabiskan banyak energi untuk merasa cemas.'),
(13, 3, 'Saya merasa sedih dan tertekan.'),
(14, 1, 'Saya menemukan diri saya menjadi tidak sabar ketika mengalami penundaan (misalnya: kemacetan lalu lintas, menunggu sesuatu).'),
(15, 2, 'Saya merasa lemas seperti mau pingsan.'),
(16, 3, 'Saya merasa saya kehilangan minat akan segala hal.'),
(17, 3, 'Saya merasa bahwa saya tidak berharga sebagai seorang manusia.'),
(18, 1, 'Saya merasa bahwa saya mudah tersinggung.'),
(19, 2, 'Saya berkeringat secara berlebihan (misalnya: tangan berkeringat), padahal temperatur tidak panas atau tidak melakukan aktivitas fisik sebelumnya.'),
(20, 2, 'Saya merasa takut tanpa alasan yang jelas.'),
(21, 3, 'Saya merasa bahwa hidup tidak bermanfaat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `responden`
--

CREATE TABLE `responden` (
  `id_responden` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tanggal_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ujian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `responden`
--

INSERT INTO `responden` (`id_responden`, `nama_lengkap`, `jenis_kelamin`, `email`, `tempat_tanggal_lahir`, `tanggal_ujian`) VALUES
(1, 'as', 'Perempuan', 'asa@mail.com', '2025-06-18', '2025-06-25 00:00:00'),
(2, 'bin', 'Laki-laki', 'bilas@mail.com', '2025-06-27', '2025-06-25 00:00:00'),
(5, 'bikky', 'Laki-laki', 'asah@mail.com', '2025-06-18', '2025-06-25 00:00:00'),
(6, 'biam', 'Laki-laki', 'qwe@mail.com', '2025-06-12', '2025-06-25 00:00:00'),
(7, 'biam', 'Laki-laki', 'awsq@mail.com', '2025-06-12', '2025-06-25 00:00:00'),
(8, 'mahend', 'Laki-laki', 'bima@hehe.com', '2025-06-11', '2025-06-25 09:26:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `feedback_id_responden_foreign` (`id_responden`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `jawaban_id_pertanyaan_foreign` (`id_pertanyaan`),
  ADD KEY `jawaban_id_responden_foreign` (`id_responden`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `pertanyaan_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`),
  ADD UNIQUE KEY `responden_email_unique` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `responden`
--
ALTER TABLE `responden`
  MODIFY `id_responden` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_id_pertanyaan_foreign` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
