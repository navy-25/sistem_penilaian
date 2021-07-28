-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2021 pada 19.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_jurusan`
--

CREATE TABLE `kategori_jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_jurusan`
--

INSERT INTO `kategori_jurusan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia', NULL, NULL),
(2, 'Akuntansi', NULL, NULL),
(3, 'Administrasi Perkantoran', NULL, NULL),
(4, 'Perhotelan', NULL, NULL),
(5, 'Tata Boga', NULL, NULL),
(6, 'Teknik Komputer Jaringan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembimbing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `pembimbing`, `status`, `hari`, `jam`, `created_at`, `updated_at`) VALUES
(2, 'Kewirausahaan', '8', 'aktif', 'Senin', '07:00 - 09:00', '2021-07-28 08:35:05', '2021-07-28 08:35:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_user`
--

CREATE TABLE `kelas_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_user`
--

INSERT INTO `kelas_user` (`id`, `kelas`, `jurusan`, `id_siswa`, `created_at`, `updated_at`) VALUES
(4, 'X', 'Teknik Komputer Jaringan', '5', '2021-07-28 08:31:01', '2021-07-28 08:32:23'),
(5, 'X', 'Teknik Komputer Jaringan', '6', '2021-07-28 08:31:17', '2021-07-28 08:32:51'),
(6, 'X', 'Teknik Komputer Jaringan', '7', '2021-07-28 08:31:34', '2021-07-28 08:32:41'),
(7, NULL, NULL, '8', '2021-07-28 08:33:07', '2021-07-28 08:33:21'),
(8, NULL, NULL, '9', '2021-07-28 08:33:43', '2021-07-28 08:33:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontributor_kelas`
--

CREATE TABLE `kontributor_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontributor_kelas`
--

INSERT INTO `kontributor_kelas` (`id`, `id_kelas`, `id_siswa`, `id_guru`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '2', '6', '8', NULL, '2021-07-28 08:39:56', '2021-07-28 08:39:56'),
(4, '2', '7', '8', NULL, '2021-07-28 08:40:01', '2021-07-28 08:40:01'),
(5, '2', '5', '8', NULL, '2021-07-28 08:48:46', '2021-07-28 08:48:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(79, '2014_10_12_000000_create_users_table', 1),
(80, '2014_10_12_100000_create_password_resets_table', 1),
(81, '2019_08_19_000000_create_failed_jobs_table', 1),
(82, '2021_07_18_135215_create_kelas_table', 1),
(83, '2021_07_18_144841_create_kontributor_kelas_table', 1),
(84, '2021_07_18_153910_create_kelas_user_table', 1),
(85, '2021_07_18_154300_create_kategori_jurusan_table', 1),
(86, '2021_07_18_163228_create_modul_table', 1),
(87, '2021_07_20_092727_create_variabel_praktik_table', 1),
(88, '2021_07_20_133437_create_sub_variabel_praktik_table', 1),
(89, '2021_07_26_065658_create_nilai_praktik_table', 1),
(90, '2021_07_26_161820_create_feedback_praktik_table', 1),
(91, '2021_07_26_173256_create_nilai_tugas_table', 1),
(92, '2021_07_26_181333_create_file_tugas_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id`, `name`, `id_kelas`, `jenis`, `file`, `created_at`, `updated_at`) VALUES
(2, 'Digital Marketing', '2', 'Materi', 'Instagram Marketing.pdf', '2021-07-28 08:38:31', '2021-07-28 08:38:31'),
(3, 'Membuat Online Shop Instagram', '2', 'Tugas', NULL, '2021-07-28 08:39:15', '2021-07-28 08:39:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_variabel_praktik`
--

CREATE TABLE `sub_variabel_praktik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_variabel_praktik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_variabel_praktik`
--

INSERT INTO `sub_variabel_praktik` (`id`, `name`, `id_variabel_praktik`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Analisis Kekuatan (Strength)', '1', NULL, '2021-07-28 08:43:19', '2021-07-28 08:43:19'),
(3, 'Analisis Kelemahan (Weakness)', '1', NULL, '2021-07-28 08:43:30', '2021-07-28 08:43:30'),
(4, 'Analisis Peluang (Oportunity)', '1', NULL, '2021-07-28 08:43:40', '2021-07-28 08:43:40'),
(5, 'Analisis Ancaman (Threat)', '1', NULL, '2021-07-28 08:44:02', '2021-07-28 08:44:02'),
(6, 'Menentukan Pasar', '1', NULL, '2021-07-28 08:44:12', '2021-07-28 08:44:12'),
(7, 'Membuat mindmap penjualan', '1', NULL, '2021-07-28 08:44:21', '2021-07-28 08:44:21'),
(8, 'Ploting Area iklan', '2', NULL, '2021-07-28 08:44:59', '2021-07-28 08:44:59'),
(9, 'Pemilihan konten iklan', '2', NULL, '2021-07-28 08:45:10', '2021-07-28 08:45:10'),
(10, 'Membuat promosi', '2', NULL, '2021-07-28 08:45:17', '2021-07-28 08:45:17'),
(11, 'Caption', '2', NULL, '2021-07-28 08:45:21', '2021-07-28 08:45:21'),
(12, 'Pemilihan Jam Upload', '2', NULL, '2021-07-28 08:45:28', '2021-07-28 08:45:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `name`, `role`, `status`, `email`, `email_verified_at`, `nis`, `telepon`, `ig`, `fb`, `tw`, `alamat`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'IMG_5388_2 copy.jpg', 'admin', 'admin', 'Admin', 'admin123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mAD050Ns7BX0v6BAPBGEXulFsNtxhp/L274U50nJa72IWE7eVAjDS', NULL, '2021-07-27 20:23:27', '2021-07-27 20:30:15'),
(5, '201710370311032.jpg', 'Muhammad Nafi Maula Hakim', 'user', 'Siswa', 'nafimaulahakim123@gmail.com', NULL, '201710370311032', '082132521665', 'n_vi25', NULL, 'n_vi25', 'Perumahan Sarana Muara Indah Blok B Nomor 21, Jetis, Malang', '$2y$10$vqySYIklGGBVEOjH2uOFCOxMIrKwhUPbYKFI8kc.gcOozY326gpTe', NULL, '2021-07-28 08:31:01', '2021-07-28 08:32:23'),
(6, '201710370311019.jpg', 'Widya Rizka Ulul Fadilah', 'user', 'Siswa', 'widyarizka88@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$D2lDOWkQyDRYiQOzsa3q0.cI.0zTl1I5tFkknsrfha3neGYjdfANa', NULL, '2021-07-28 08:31:17', '2021-07-28 08:31:17'),
(7, '201710370311028.jpg', 'Rizqy Arifiantini', 'user', 'Siswa', 'arin123@gmail.com', NULL, '201710370311028', NULL, NULL, NULL, NULL, NULL, '$2y$10$NhazVbo.fKAA/mfTezCh1u2eY10FrQgyRGCeOEDFmf77jIpZNGtqO', NULL, '2021-07-28 08:31:34', '2021-07-28 08:32:41'),
(8, 'Galih Wasis (1).jpg', 'Galih Wasis Wicaksono, S.Kom, M.Cs.', 'user', 'Guru', 'galih123@gmail.com', NULL, '2020173827', NULL, NULL, NULL, NULL, NULL, '$2y$10$LKzn48rV0nrHloD2FCWHc.WRayh8sVB6GzpT3dHNrgFvDGx2nRPPi', NULL, '2021-07-28 08:33:07', '2021-07-28 08:33:21'),
(9, '861_10814100562.jpg', 'Ali Sofyan Kholimi, S.Kom., M.Kom', 'user', 'Guru', 'alisofyan123@gmail.com', NULL, '2020173123', NULL, NULL, NULL, NULL, NULL, '$2y$10$JBJ8JBsaR4y3UYnTS4rPWOg7.z4Dze8ARxGuNBBh00V02NHGD7fBS', NULL, '2021-07-28 08:33:43', '2021-07-28 08:33:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel_praktik`
--

CREATE TABLE `variabel_praktik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kkm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variabel_praktik`
--

INSERT INTO `variabel_praktik` (`id`, `name`, `id_kelas`, `kkm`, `created_at`, `updated_at`) VALUES
(1, 'Braindstorming Ide Produk', '2', '60', '2021-07-28 08:42:37', '2021-07-28 08:42:37'),
(2, 'Instagram Ads', '2', '55', '2021-07-28 08:44:50', '2021-07-28 08:44:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori_jurusan`
--
ALTER TABLE `kategori_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_user`
--
ALTER TABLE `kelas_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontributor_kelas`
--
ALTER TABLE `kontributor_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `sub_variabel_praktik`
--
ALTER TABLE `sub_variabel_praktik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `variabel_praktik`
--
ALTER TABLE `variabel_praktik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_jurusan`
--
ALTER TABLE `kategori_jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas_user`
--
ALTER TABLE `kelas_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kontributor_kelas`
--
ALTER TABLE `kontributor_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sub_variabel_praktik`
--
ALTER TABLE `sub_variabel_praktik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `variabel_praktik`
--
ALTER TABLE `variabel_praktik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
