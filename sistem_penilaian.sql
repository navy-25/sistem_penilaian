-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2021 pada 16.20
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
(2, 'Teknik Sepeda Motor', NULL, NULL);

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
(8, 'Java Programming', '3', 'aktif', 'Selasa', '05:00 - 09:00', '2021-07-20 02:19:27', '2021-07-20 02:19:27');

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
(1, NULL, NULL, '3', '2021-07-18 09:08:52', '2021-07-18 10:16:52'),
(3, 'XI', 'Multimedia', '1', '2021-07-18 09:08:52', '2021-07-18 09:10:59');

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
(7, '8', '1', '2', NULL, '2021-07-20 02:50:09', '2021-07-20 02:50:09');

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2021_07_18_135215_create_kelas_table', 1),
(27, '2021_07_18_144841_create_kontributor_kelas_table', 1),
(28, '2021_07_18_153910_create_kelas_user_table', 1),
(29, '2021_07_18_154300_create_kategori_jurusan_table', 1),
(30, '2021_07_18_163228_create_modul_table', 2),
(31, '2021_07_20_092727_create_variabel_praktik_table', 3),
(32, '2021_07_20_133437_create_sub_variabel_praktik_table', 4);

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
(13, 'Akses modifier pada java programming', '8', 'Materi', 'Penggunaan Public,Private,dan Protected Pada Pemprograman Java _ Welcome My Blog Coretanmu.pdf', '2021-07-20 02:19:57', '2021-07-20 02:19:57'),
(14, 'Tugas method java', '8', 'Tugas', 'Method Pada Java - Java Method_Java NetBeans .pdf', '2021-07-20 02:20:09', '2021-07-20 02:20:09');

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
(1, 'Membuat Create', '1', 'mampu membuat created dengan tampilan yang bagus, algoritma benar dan efektif', NULL, NULL),
(3, 'Membuat Read', '1', NULL, '2021-07-20 07:07:38', '2021-07-20 07:07:38');

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
(1, 'IMG_5388_2.jpg', 'Muhammad Nafi Maula Hakim', 'user', 'Siswa', 'nafimaulahakim123@gmail.com', NULL, '36675059', '082132521665', 'n_vi25', 'muhammadnafimaulahakim', 'n_vi25', 'Perumahan Sarana Muara Indah Blok B Nomor 21, Jetis, Malang', '$2y$10$h6X61tcWttLWFEbKSg7u9OLDPIBKfIJ03W81SId3eCJ.tSXZ1UEgG', NULL, '2021-07-18 09:08:04', '2021-07-20 01:08:45'),
(2, 'IMG_5394.jpg', 'admin', 'admin', 'Admin', 'admin123@gmail.com', NULL, '2017103703110322', '082132521665', NULL, NULL, NULL, 'Bandar Kedung Mulyo', '$2y$10$CyzsHJUlW5goY2PpeWss1uf.8eyfOJxX.SpQu6q15DdEkx4qx0v0q', NULL, '2021-07-18 09:08:52', '2021-07-20 01:13:22'),
(3, '861_10814100562.jpg', 'Ali Sofyan Kholimi, S.Kom., M.Kom', 'user', 'Guru', 'alisofyan123@gmail.com', NULL, '0701038202', '08213627163123', NULL, NULL, NULL, 'Malang', '$2y$10$ct7A73Z.4pcB1CBOPhCFs.PY9AMXtUQKbtUcrM7lM8Q9Em60ZnBz6', NULL, '2021-07-18 09:18:30', '2021-07-20 01:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel_praktik`
--

CREATE TABLE `variabel_praktik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `variabel_praktik`
--

INSERT INTO `variabel_praktik` (`id`, `name`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, 'Membuat simpel CRUD', '8', '2021-07-20 02:37:05', '2021-07-20 02:37:05'),
(2, 'Menghubungkan dengan SQL', '8', '2021-07-20 02:43:57', '2021-07-20 02:43:57');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kelas_user`
--
ALTER TABLE `kelas_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontributor_kelas`
--
ALTER TABLE `kontributor_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `sub_variabel_praktik`
--
ALTER TABLE `sub_variabel_praktik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `variabel_praktik`
--
ALTER TABLE `variabel_praktik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
