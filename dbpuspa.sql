-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 02:59 AM
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
  `keterangan` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enumeration`
--

INSERT INTO `enumeration` (`id`, `key`, `value`, `keterangan`, `other`) VALUES
(1, 'roles', 'Superadmin', '0', ''),
(2, 'roles', 'Admin', '1', ''),
(3, 'roles', 'Anggota', '2', ''),
(4, 'forum', 'Pusat', '', ''),
(5, 'forum', 'Provinsi', '', ''),
(6, 'forum', 'Pemda', '', ''),
(7, 'sasaran kegiatan', 'Pemerintah; pengambil kebijakan', '', ''),
(8, 'sasaran kegiatan', 'Pemerintah; perencana kebijakan dan program', '', ''),
(9, 'sasaran kegiatan', 'Pemerintah daerah', '', ''),
(10, 'sasaran kegiatan', 'Desa', '', ''),
(11, 'sasaran kegiatan', 'Pelaku Usaha', '', ''),
(12, 'sasaran kegiatan', 'Lembaga Masyarakat', '', ''),
(13, 'sasaran kegiatan', 'Institusi Pendidikan', '', ''),
(14, 'sasaran kegiatan', 'Organisasi keagamaan', '', ''),
(15, 'sasaran kegiatan', 'Organisasi Profesi', '', ''),
(16, 'sasaran kegiatan', 'Dunia usaha', '', ''),
(17, 'sasaran kegiatan', 'Media', '', ''),
(18, 'sasaran kegiatan', 'Kelompok Masyarakat Umum', '', ''),
(19, 'sasaran kegiatan', 'Kelompok Masyarakat Perempuan', '', ''),
(20, 'sasaran kegiatan', 'Anak', '', ''),
(21, 'sasaran kegiatan', 'Kelompok disabilitas', '', ''),
(22, 'sasaran kegiatan', 'Kelompok marginal', 'lansia, masyarakat daerah tertinggal, terluar dsb', ''),
(23, 'jenis entitas', 'Lembaga Masyarakat', '', ''),
(24, 'jenis entitas', 'Institusi Pendidikan', '', ''),
(25, 'jenis entitas', 'Organisasi Keagamaan', '', ''),
(26, 'jenis entitas', 'Organisasi Profesi', '', ''),
(27, 'jenis entitas', 'Dunia Usaha', '', ''),
(28, 'jenis entitas', 'Media', '', ''),
(29, 'jenis entitas', 'Lain-lain', 'tokoh agama, tokoh masyarakat', ''),
(30, 'tujuan kegiatan', 'Pemberdayaan perempuan di bidang kewirausahaan yang berperspektif gender', '', ''),
(31, 'tujuan kegiatan', 'Peran Ibu dan Keluarga dalam pendidikan/pengasuhan anak', '', ''),
(32, 'tujuan kegiatan', 'Penurunan kekerasan terhadap perempuan dan anak', '', ''),
(33, 'tujuan kegiatan', 'Penurunan angka pekerja anak', '', ''),
(34, 'tujuan kegiatan', 'Pencegahan perkawinan anak', '', ''),
(35, 'jenis kegiatan', 'Kajian/assessment', '', ''),
(36, 'jenis kegiatan', 'Advokasi', '', ''),
(37, 'jenis kegiatan', 'Sosialisasi/Promosi/Peningkatan Kesadaran', '', ''),
(38, 'jenis kegiatan', 'Edukasi', '', ''),
(39, 'jenis kegiatan', 'Pelatihan', '', ''),
(40, 'jenis kegiatan', 'Pendampingan', '', ''),
(41, 'jenis kegiatan', 'Evaluasi program', '', ''),
(42, 'jenis kegiatan', 'Lain-lain', 'kampanye, pameran, dll', ''),
(43, 'tahapan', 'Latar Belakang (permasalahan, kebutuhan, kondisi yang ada)', '1', '15'),
(44, 'tahapan', 'Perumusan Ide (solusi, pemikiran, pendekatan, inovasi)', '2', '15'),
(45, 'tahapan', 'Perencanaan', '3', '15'),
(46, 'tahapan', 'Pengembangan (persiapan, pembangunan, pengembangan)', '4', '20'),
(47, 'tahapan', 'Implementasi (eksekusi, penerapan)', '5', '20'),
(48, 'tahapan', 'Evaluasi', '6', '15'),
(52, 'roles', 'Pembina', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kegiatan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_singkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan_dan_manfaat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pihak_yang_terlibat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kebutuhan_sumberdaya` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sasaran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_tahapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_status_kegiatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persentase_progres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analisis_resiko` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keunikan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potensi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strategi_menjaga_keberlangsungan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_keberhasilan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_publikasi` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `mitra_id`, `jenis_kegiatan_id`, `nama_singkat`, `nama_lengkap`, `foto`, `slug`, `deskripsi`, `tujuan_dan_manfaat`, `pihak_yang_terlibat`, `kebutuhan_sumberdaya`, `sasaran`, `status_tahapan`, `keterangan_status_kegiatan`, `persentase_progres`, `analisis_resiko`, `keunikan`, `potensi`, `strategi_menjaga_keberlangsungan`, `indikator_keberhasilan`, `lampiran`, `url`, `status_publikasi`, `created_at`, `updated_at`) VALUES
(4, '2', '35', 'KBM', 'Kegiatan Belajar Mengajar', '20221114173400.jpg', NULL, 'belajar mengajar didaerah untuk meningkatkan kualitas siswa', '[\"33\",\"34\"]', 'test', 'test', '[\"7\",\"19\",\"21\"]', '46', 'test', '50', 'e', 'test', 't', 's', 't', NULL, '', 0, '2022-11-13 16:21:58', '2022-11-17 21:54:26'),
(5, '3', '39', 'Perlatihan IRT', 'Pelatihan Ibu-ibu rumah tangga', '20221117193339.jpeg', NULL, 'Pelatihan ibu-ibu rumah tangga yang berisi tentang pemanfaatan sosial media untuk pemasaran produk yang mereka buat (kerajinan, makanan, dll)', '[\"30\"]', 'Pemerintah daerah, Dinas, UKM', 'Anggaran untuk penyelenggaraan, lokasi penyelenggaraan, perangkat yang dibutuhkan', '[\"19\",\"21\"]', '45', 'Masih menunggu lengkapnya data-data peralatan yang diperlukan dari narasumber', '90', 'peserta kurang banyak dimitigasi dengan promosi yang baik dan waktu yang cukup untuk peserta mendaftarkan diri ', 'belum pernah dikerjakan berbarengan dengan disabilitas', 'dapat direplikasi didaerah lain dapat dikembangkan topik-topik pelatihan yang lain', 'dijarikan program pemerintah daerah yagn rutin sehingga anggaran disediakan setiap tahun', 'jumlah peserta, tingkat kepuasan dari peserta, evaluasi, outcome (kajian dampak) sesudah beberapa bulan', '20221117193339.pdf', '', 0, '2022-11-17 12:33:40', '2022-11-17 21:00:53'),
(6, '3', '35', 'test', 'test', '20221117213133.jpeg', NULL, 'test', '[\"30\",\"32\",\"33\"]', 'test', 'test', '[\"13\",\"15\",\"19\"]', '43', 'test', '22', 'test', 'tes', 'test', 'test', 'test', NULL, '', 0, '2022-11-17 14:31:33', '2022-11-17 20:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(11) NOT NULL,
  `parent_id` bigint(11) NOT NULL,
  `kegiatan_id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `komentar` text NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `parent_id`, `kegiatan_id`, `user_id`, `komentar`, `read`, `created_at`, `updated_at`) VALUES
(30, 0, 4, 2, 'Mantaaap bos', 0, '2022-11-16 06:18:08', '2022-11-16 13:28:08'),
(34, 30, 4, 3, 'siap pak', 0, '2022-11-16 14:43:57', '2022-11-16 21:43:57'),
(35, 30, 4, 3, 'pembina', 0, '2022-11-16 14:46:16', '2022-11-16 21:46:16'),
(36, 30, 4, 3, 'anggota baru', 0, '2022-11-16 14:46:27', '2022-11-16 21:46:27'),
(37, 0, 5, 1, 'Harap deskripsi juga menjelaskan siapa saja pelatih yang terlibat dan uraian mengenai materi ajar', 0, '2022-11-17 12:37:24', '2022-11-17 19:37:24'),
(38, 37, 5, 4, 'siap pak', 0, '2022-11-17 12:45:31', '2022-11-17 19:45:31'),
(39, 37, 5, 4, 'sudah kami perbaiki, mohon diperiksa kembali terima kasih', 0, '2022-11-17 12:47:59', '2022-11-17 19:47:59'),
(41, 37, 5, 1, 'Sudah bagus', 0, '2022-11-17 12:49:25', '2022-11-17 19:49:25'),
(43, 0, 5, 4, 'test', 0, '2022-11-17 22:10:05', '2022-11-18 05:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `nama_singkat` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `kode_wilayah` int(11) DEFAULT NULL,
  `jenis_mitra` int(11) DEFAULT NULL,
  `website_mitra` varchar(255) DEFAULT NULL,
  `email_kontak` varchar(255) DEFAULT NULL,
  `alamat_mitra` varchar(255) DEFAULT NULL,
  `no_telp_mitra` varchar(15) DEFAULT NULL,
  `no_wa_mitra` varchar(15) NOT NULL,
  `dasar_hukum` text DEFAULT NULL,
  `rincian_kegiatan` text DEFAULT NULL,
  `permasalahan` text DEFAULT NULL,
  `kebutuhan` text DEFAULT NULL,
  `medsos` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `id_parent`, `nama_singkat`, `nama_lengkap`, `kode_wilayah`, `jenis_mitra`, `website_mitra`, `email_kontak`, `alamat_mitra`, `no_telp_mitra`, `no_wa_mitra`, `dasar_hukum`, `rincian_kegiatan`, `permasalahan`, `kebutuhan`, `medsos`, `url`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin Forum Pusat', 'Admin Forum Pusat', NULL, 4, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-12 14:33:36', '2022-11-16 06:17:32'),
(2, 1, 'A1', 'Anggota 12', NULL, 4, '', '', '', '0202', '0101', NULL, '', '', '', '{\"IG\":\"anggota1\"}', NULL, '2022-11-12 14:38:12', '2022-11-16 06:29:41'),
(3, 1, 'NU PUSAT', 'Nahdlatul Ulama', NULL, 4, '', 'bambangsoleh@gmail.com', '', '', '', NULL, '', '', '', '{\"\":\"\"}', NULL, '2022-11-17 12:22:48', '2022-11-17 14:23:57'),
(4, 0, 'Pembina', 'Pembina', NULL, NULL, '', NULL, '', '', '', NULL, '', '', '', '{\"\":\"\"}', NULL, '2022-11-17 12:22:48', '2022-11-17 22:13:10');

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
(1, 1, 0, 1, '2022-11-12 14:22:10', '2022-11-18 01:55:19'),
(2, 2, 1, 2, '2022-11-12 14:33:36', '2022-11-12 14:33:36'),
(4, 4, 3, 3, '2022-11-17 12:22:48', '2022-11-17 12:22:48'),
(5, 1, 4, 52, '2022-11-12 14:22:10', '2022-11-18 01:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi_email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `verifikasi_akun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_telp`, `no_wa`, `logo`, `email`, `password`, `token`, `verifikasi_email`, `verifikasi_akun`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '0', '', '20221117210214.jpg', 'superadmin@kpppa.co.id', '$2y$10$c/TVUDaT8CDMGyGzqm5fYODSks.Vw52oqQIDOU7aOOYXe8XQUbIa2', '', 'on', 'on', '2022-11-02 10:50:33', '2022-11-17 14:02:14'),
(2, '', '0', '', '', 'adminpusat@kpppa.co.id', '$2y$10$c/TVUDaT8CDMGyGzqm5fYODSks.Vw52oqQIDOU7aOOYXe8XQUbIa2', 'mas14MAILq', 'off', 'off', '2022-11-12 14:33:36', '2022-11-18 01:59:38'),
(4, 'Bambang Soleh', '0871882738', '0871882738', '20221117210302.png', 'nupusat@kpppa.co.id', '$2y$10$/yjv38GuZewUarOKS4Y/GOkyLNqCWH/woGC6sPHIr/mZcQMATUq9a', 'R8Vetz2cDN', 'off', 'on', '2022-11-17 12:22:48', '2022-11-18 01:59:10'),
(5, 'Pembina', '0', '', '20221117210214.jpg', 'pembina@kpppa.co.id', '$2y$10$c/TVUDaT8CDMGyGzqm5fYODSks.Vw52oqQIDOU7aOOYXe8XQUbIa2', '', 'on', 'on', '2022-11-02 10:50:33', '2022-11-17 14:02:14');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
