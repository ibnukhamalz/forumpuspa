-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 06:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpuspa`
--

-- --------------------------------------------------------

--
-- Table structure for table `enumeration`
--

CREATE TABLE `enumeration` (
  `id` bigint(20) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enumeration`
--

INSERT INTO `enumeration` (`id`, `key`, `value`, `keterangan`) VALUES
(1, 'roles', 'Superadmin', '0'),
(2, 'roles', 'Admin', '1'),
(3, 'roles', 'Anggota', '2'),
(4, 'forum', 'Pusat', ''),
(5, 'forum', 'Provinsi', ''),
(6, 'forum', 'Pemda', ''),
(7, 'sasaran kegiatan', 'Pemerintah; pengambil kebijakan', ''),
(8, 'sasaran kegiatan', 'Pemerintah; perencana kebijakan dan program', ''),
(9, 'sasaran kegiatan', 'Pemerintah daerah', ''),
(10, 'sasaran kegiatan', 'Desa', ''),
(11, 'sasaran kegiatan', 'Pelaku Usaha', ''),
(12, 'sasaran kegiatan', 'Lembaga Masyarakat', ''),
(13, 'sasaran kegiatan', 'Institusi Pendidikan', ''),
(14, 'sasaran kegiatan', 'Organisasi keagamaan', ''),
(15, 'sasaran kegiatan', 'Organisasi Profesi', ''),
(16, 'sasaran kegiatan', 'Dunia usaha', ''),
(17, 'sasaran kegiatan', 'Media', ''),
(18, 'sasaran kegiatan', 'Kelompok Masyarakat Umum', ''),
(19, 'sasaran kegiatan', 'Kelompok Masyarakat Perempuan', ''),
(20, 'sasaran kegiatan', 'Anak', ''),
(21, 'sasaran kegiatan', 'Kelompok disabilitas', ''),
(22, 'sasaran kegiatan', 'Kelompok marginal', 'lansia, masyarakat daerah tertinggal, terluar dsb'),
(23, 'jenis entitas', 'Lembaga Masyarakat', ''),
(24, 'jenis entitas', 'Institusi Pendidikan', ''),
(25, 'jenis entitas', 'Organisasi Keagamaan', ''),
(26, 'jenis entitas', 'Organisasi Profesi', ''),
(27, 'jenis entitas', 'Dunia Usaha', ''),
(28, 'jenis entitas', 'Media', ''),
(29, 'jenis entitas', 'Lain-lain', 'tokoh agama, tokoh masyarakat'),
(30, 'tujuan kegiatan', 'Pemberdayaan perempuan di bidang kewirausahaan yang berperspektif gender', ''),
(31, 'tujuan kegiatan', 'Peran Ibu dan Keluarga dalam pendidikan/pengasuhan anak', ''),
(32, 'tujuan kegiatan', 'Penurunan kekerasan terhadap perempuan dan anak', ''),
(33, 'tujuan kegiatan', 'Penurunan angka pekerja anak', ''),
(34, 'tujuan kegiatan', 'Pencegahan perkawinan anak', ''),
(35, 'jenis kegiatan', 'Kajian/assessment', ''),
(36, 'jenis kegiatan', 'Advokasi', ''),
(37, 'jenis kegiatan', 'Sosialisasi/Promosi/Peningkatan Kesadaran', ''),
(38, 'jenis kegiatan', 'Edukasi', ''),
(39, 'jenis kegiatan', 'Pelatihan', ''),
(40, 'jenis kegiatan', 'Pendampingan', ''),
(41, 'jenis kegiatan', 'Evaluasi program', ''),
(42, 'jenis kegiatan', 'Lain-lain', 'kampanye, pameran, dll'),
(43, 'tahapan', 'Latar Belakang (permasalahan, kebutuhan, kondisi yang ada)', '1'),
(44, 'tahapan', 'Perumusan Ide (solusi, pemikiran, pendekatan, inovasi)', '2'),
(45, 'tahapan', 'Perencanaan', '3'),
(46, 'tahapan', 'Pengembangan (persiapan, pembangunan, pengembangan)', '4'),
(47, 'tahapan', 'Implementasi (eksekusi, penerapan)', '5'),
(48, 'tahapan', 'Evaluasi', '6');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kegiatan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_singkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan_dan_manfaat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pihak_yang_terlibat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kebutuhan_sumberdaya` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sasaran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_tahapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persentase_progres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analisis_resiko` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strategi_menjaga_keberlangsungan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_keberhasilan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `mitra_id`, `jenis_kegiatan_id`, `nama_singkat`, `foto`, `slug`, `deskripsi`, `tujuan_dan_manfaat`, `pihak_yang_terlibat`, `kebutuhan_sumberdaya`, `sasaran`, `status_tahapan`, `persentase_progres`, `analisis_resiko`, `strategi_menjaga_keberlangsungan`, `indikator_keberhasilan`, `lampiran`, `created_at`, `updated_at`) VALUES
(1, '4', '37', '1', 'foto-kegiatan/2bzJT8334EupFhb40w759ex2OuEz2B0ObkjSQmsI.jpg', NULL, '1', '1', '1', '1', '1', '44', '10', '1', '1', '1', 'lampiran-kegiatan/K9c5Q4eWRnFemSjT7tdBSBwLP1TbUow179RSMIW4.jpg', '2022-11-02 10:58:06', '2022-11-05 05:25:57'),
(2, '4', '40', '2', 'foto-kegiatan/aE5fpWCoHHf843dhrO7y3jxeOjhPPZSFnP9Q3x35.jpg', NULL, '2', '2', '2', '2', '2', '45', '2', '2', '2', '2', 'lampiran-kegiatan/LGN7y8EKDARMzYk8Aqj1s9JOTEqG89u2VyFUjYIY.jpg', '2022-11-02 10:58:31', '2022-11-05 05:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(11) NOT NULL,
  `id_parent` bigint(11) NOT NULL,
  `id_kegiatan` bigint(11) NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `nama_singkat` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `kode_wilayah` int(11) NOT NULL,
  `jenis_mitra` int(11) NOT NULL,
  `website_mitra` varchar(255) NOT NULL,
  `email_mitra` varchar(255) NOT NULL,
  `alamat_mitra` varchar(255) NOT NULL,
  `no_telp_mitra` varchar(15) NOT NULL,
  `dasar_hukum` text DEFAULT NULL,
  `rincian_kegiatan` text NOT NULL,
  `permasalahan` text NOT NULL,
  `kebutuhan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `id_parent`, `nama_singkat`, `nama_lengkap`, `logo`, `kode_wilayah`, `jenis_mitra`, `website_mitra`, `email_mitra`, `alamat_mitra`, `no_telp_mitra`, `dasar_hukum`, `rincian_kegiatan`, `permasalahan`, `kebutuhan`, `created_at`, `updated_at`) VALUES
(1, 0, 'Pusat', 'Pusat', '20221104183248.jpg', 1, 4, '4', 'adminpusat@kpppa.co.id', '1', '1', '20221104193632.pdf', '1', '11', '1', '2022-11-04 08:48:20', '2022-11-04 18:36:32'),
(2, 1, 'NU PUSAT', 'Nahdlatul Ulama', '20221104173842.png', 1, 4, '1', 'test@test.com', '1', '1', NULL, '1', '11', '1', '2022-11-04 08:48:20', '2022-11-04 17:08:57'),
(3, 0, 'Jabar', 'Jawa Barat', NULL, 1, 5, '1', '1', '1', '1', NULL, '1', '11', '1', '2022-11-04 08:48:20', '2022-11-04 17:08:54'),
(4, 1, 'idgi', 'IKATAN DOKTER GIGI INDONESIA', '20221105032151.jpg', 1, 4, '0', 'idgi@gmail.com', 'IKATAN DOKTER GIGI INDONESIA', '0', NULL, '0', '0', '0', '2022-11-04 14:26:09', '2022-11-05 02:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `mitra_id` bigint(20) DEFAULT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `mitra_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 8, 0, 1, '2022-11-04 08:54:33', '2022-11-04 10:01:50'),
(2, 9, 1, 2, '2022-11-04 08:54:33', '2022-11-04 10:01:53'),
(3, 12, 2, 3, '2022-11-04 08:54:37', '2022-11-04 10:01:54'),
(5, 11, 3, 2, '2022-11-04 08:54:33', '2022-11-04 11:00:39'),
(7, 13, 4, 3, '2022-11-04 14:26:09', '2022-11-04 14:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(8, 'super admin', 'superadmin@kpppa.co.id', '$2y$10$U9.0Oxkeaa7mdocpCjRIpu5386jAlK.fFtCaXKfcDyEHQ0ruzJEjO', '2022-11-02 10:50:33', '2022-11-02 10:50:33'),
(9, 'ibnu kamal', 'adminpusat@kpppa.co.id', '$2y$10$U9.0Oxkeaa7mdocpCjRIpu5386jAlK.fFtCaXKfcDyEHQ0ruzJEjO', '2022-11-02 10:50:33', '2022-11-02 10:50:33'),
(11, 'zhia', 'adminpusat1@kpppa.co.id', '$2y$10$U9.0Oxkeaa7mdocpCjRIpu5386jAlK.fFtCaXKfcDyEHQ0ruzJEjO', '2022-11-02 10:50:33', '2022-11-02 10:50:33'),
(12, 'NU', 'nu@kpppa.co.id', '$2y$10$U9.0Oxkeaa7mdocpCjRIpu5386jAlK.fFtCaXKfcDyEHQ0ruzJEjO', '2022-11-02 10:50:33', '2022-11-02 10:50:33'),
(13, 'idgi', 'anggota@idgi.com', '$2y$10$SnnJHxucFheUyA6bnozwNOcJYEZVf1WqzpysvfymaS2ZRZCg8S4oy', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enumeration`
--
ALTER TABLE `enumeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foregn key` (`user_id`,`mitra_id`,`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enumeration`
--
ALTER TABLE `enumeration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
