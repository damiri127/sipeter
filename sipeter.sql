-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2024 pada 07.03
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
-- Database: `sipeter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataobat_farmasi`
--

CREATE TABLE `dataobat_farmasi` (
  `id_obatfarmasi` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_abatisasi`
--

CREATE TABLE `data_abatisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_afp`
--

CREATE TABLE `data_afp` (
  `id_dataafp` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kasus` enum('baru','lama') NOT NULL,
  `status` enum('dilacak','ditemukan') NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bumilresiko`
--

CREATE TABLE `data_bumilresiko` (
  `data_bumilresiko` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pendarahan` enum('Ya','Tidak') NOT NULL,
  `infeksi` enum('Ya','Tidak') NOT NULL,
  `keracunan_kehamilan` enum('Ya','Tidak') NOT NULL,
  `partus_lama` enum('Ya','Tidak') NOT NULL,
  `status` enum('Ditangani','Dirujuk') NOT NULL,
  `nomor_rujukan` int(11) NOT NULL,
  `tinggal_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dbd`
--

CREATE TABLE `data_dbd` (
  `id_datadbd` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_filaria`
--

CREATE TABLE `data_filaria` (
  `id_data_filaria` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `status_pengobatan` enum('terobati','belum terobati') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fogingfokus`
--

CREATE TABLE `data_fogingfokus` (
  `id_datafogingfokus` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_foging` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ibuhamil`
--

CREATE TABLE `data_ibuhamil` (
  `id_dataibuhamil` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('K1','K4') NOT NULL,
  `paritas` int(11) NOT NULL,
  `jarak_kehamilan` int(11) NOT NULL,
  `ukuran_lila` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelahiran`
--

CREATE TABLE `data_kelahiran` (
  `id_data_kelahiran` bigint(20) UNSIGNED NOT NULL,
  `dataibuhamil_id` bigint(20) UNSIGNED NOT NULL,
  `ditangani_nakes` enum('Ya','Tidak') NOT NULL,
  `status_kehidupanbayi` enum('Hidup','Mati') NOT NULL,
  `berat_badanbayi` int(11) NOT NULL,
  `tanggal_kelahiran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kematianmaternal`
--

CREATE TABLE `data_kematianmaternal` (
  `id_kematianmaternal` bigint(20) UNSIGNED NOT NULL,
  `datakelahiran_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Melahirkan','Nifas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kesakitan`
--

CREATE TABLE `data_kesakitan` (
  `id_datakesakitan` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `jeniskesakitan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kunjunganneonatus`
--

CREATE TABLE `data_kunjunganneonatus` (
  `id_data_kunjunganneonatus` bigint(20) UNSIGNED NOT NULL,
  `datakelahiran_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_kunjungan` enum('0','1','2','3') NOT NULL,
  `afiksia` enum('Ya','Tidak') NOT NULL,
  `traoma_lahir` enum('Ya','Tidak') NOT NULL,
  `neonatus` enum('Ya','Tidak') NOT NULL,
  `neonatrium` enum('Ya','Tidak') NOT NULL,
  `status_rujukan` enum('Dirujuk','Tidak dirujuk') NOT NULL,
  `nomor_rujukan` int(11) NOT NULL,
  `usia_bayi` int(11) NOT NULL,
  `status_bayi` enum('Hidup','Mati') NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lilawanitausiasubur`
--

CREATE TABLE `data_lilawanitausiasubur` (
  `id_datalilawanitausiasubur` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_malaria`
--

CREATE TABLE `data_malaria` (
  `id_datamalaria` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('berat','komplikasi') NOT NULL,
  `status_pasien` enum('Ibu hamil','Anak-anak','Pasien lainnya') NOT NULL,
  `status_pengobatan_profilaksi` enum('Ya','Tidak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemberantasan_sarangnyamuk`
--

CREATE TABLE `data_pemberantasan_sarangnyamuk` (
  `id_data_pemberantasan_sarangnyamuk` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_pemberantasan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemeriksaan_jentik`
--

CREATE TABLE `data_pemeriksaan_jentik` (
  `id_data_pemeriksaan_jentik` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_pemilik_rumah` varchar(255) NOT NULL,
  `deteksi_jentiknyamuk` enum('terdeteksi','tidak terdeteksi') NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penerimaobatfarmasi`
--

CREATE TABLE `data_penerimaobatfarmasi` (
  `id_penerimaobatfarmasi` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_obatfarmasi` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemberian` date NOT NULL,
  `status_penerima` enum('ana-anak','ibu_hamil','penduduk_lainnya','ibu_nifas','balita') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penerimavaksin`
--

CREATE TABLE `data_penerimavaksin` (
  `id_penerimavaksin` bigint(20) UNSIGNED NOT NULL,
  `vaksin_id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `status_penerima` enum('bayi 9-11 bln','bayi 2-11 bln','bayi 0-11 bln','ibu hamil','wanita usia subur','murid sd kelas1','murid sd kelas2','murid sd kelas6') NOT NULL,
  `tanggal_vaksinasi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penyemprotanmalaria`
--

CREATE TABLE `data_penyemprotanmalaria` (
  `id_data_penyemprotanmalaria` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_pemilik_rumah` varchar(50) NOT NULL,
  `tanggal_penyemprotan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rabies`
--

CREATE TABLE `data_rabies` (
  `id_data_rabies` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_stimulasitumbuhkembang`
--

CREATE TABLE `data_stimulasitumbuhkembang` (
  `data_stimulasitumbuhkembang` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `besar_lingkarkepala` int(11) NOT NULL,
  `status_gizi` varchar(255) NOT NULL,
  `status_perawakan` varchar(255) NOT NULL,
  `status_beratbadan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tetanusneonatrium`
--

CREATE TABLE `data_tetanusneonatrium` (
  `id_datatetanusneonatrium` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `status` enum('dilacak','ditemukan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_timbangananak`
--

CREATE TABLE `data_timbangananak` (
  `id_datatimbangananak` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `status_bgm` enum('Ya','Tidak') NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_vaksinasi`
--

CREATE TABLE `data_vaksinasi` (
  `id_data_vaksinasi` bigint(20) UNSIGNED NOT NULL,
  `nama_vaksin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kesakitan`
--

CREATE TABLE `jenis_kesakitan` (
  `id_jeniskesakitan` bigint(20) UNSIGNED NOT NULL,
  `id_namakesakitan` bigint(20) UNSIGNED NOT NULL,
  `nama_jeniskesakitan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_27_045125_create_pasien', 1),
(6, '2024_03_27_053115_create_nama-kesakitan', 1),
(7, '2024_03_28_012347_create_jenis_kesakitan', 1),
(8, '2024_03_28_012811_create_data_kesakitan', 1),
(9, '2024_04_04_040951_create_dataobat_farmasi', 1),
(10, '2024_04_04_041419_create_data_penerimaobatfarmasi', 1),
(11, '2024_04_04_042424_create_data_timbangananak', 1),
(12, '2024_04_04_044130_create_data_lilawanitausiasubur', 1),
(13, '2024_04_18_005245_create_data_ibuhamil', 1),
(14, '2024_04_18_012732_create_data_bumilresiko', 1),
(15, '2024_04_18_014223_create_data_kelahiran', 1),
(16, '2024_04_18_015022_create_data_kunjunganneonatus', 1),
(17, '2024_04_18_043215_create_data_kematianmaternal', 1),
(18, '2024_04_18_043726_create_data_stimulasitumbuhkembang', 1),
(19, '2024_04_18_070612_create_data_vaksinasi', 1),
(20, '2024_04_18_070718_create_data_penerimavaksin', 1),
(21, '2024_04_23_020340_create_data_afp', 1),
(22, '2024_04_23_020847_create_data_tetanusneonatrium', 1),
(23, '2024_04_25_012942_create_data_malaria', 1),
(24, '2024_04_25_013447_create_data_penyemprotanmalaria', 1),
(25, '2024_04_25_013744_create_data_fogingfokus', 1),
(26, '2024_04_25_013929_create_data_dbd', 1),
(27, '2024_04_25_014059_create_data_abatisasi', 1),
(28, '2024_04_25_014604_create_data_pemberantasan_sarangnyamuk', 1),
(29, '2024_04_25_014802_create_data_pemeriksaan_jentik', 1),
(30, '2024_04_25_015142_create_data_rabies', 1),
(31, '2024_04_25_020138_create_data_filaria', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_kesakitan`
--

CREATE TABLE `nama_kesakitan` (
  `id_namakesakitan` bigint(20) UNSIGNED NOT NULL,
  `nama_kesakitan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` enum('kepala-puskesmas','admin','petugas-puskesmas','petugas-loket') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `level`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cepri damiri', 'admin', 'damiri', '$2y$12$sktgbt7CqGNieIai939VGubkS4C/.Or0r6JknYN79IZ89JbPrlkQO', NULL, '2024-05-02 07:21:00', '2024-05-02 07:21:00'),
(2, 'ananta padma kusuma', 'kepala-puskesmas', 'anantapk', '$2y$12$11fZywMdrJduUlrzILc2CO/yJTw8SFv.k3nHBfXbKGJ807iA2RdMC', NULL, '2024-05-02 19:51:43', '2024-05-02 19:51:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dataobat_farmasi`
--
ALTER TABLE `dataobat_farmasi`
  ADD PRIMARY KEY (`id_obatfarmasi`);

--
-- Indeks untuk tabel `data_abatisasi`
--
ALTER TABLE `data_abatisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_afp`
--
ALTER TABLE `data_afp`
  ADD PRIMARY KEY (`id_dataafp`),
  ADD KEY `data_afp_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_bumilresiko`
--
ALTER TABLE `data_bumilresiko`
  ADD PRIMARY KEY (`data_bumilresiko`),
  ADD KEY `data_bumilresiko_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `data_dbd`
--
ALTER TABLE `data_dbd`
  ADD PRIMARY KEY (`id_datadbd`),
  ADD KEY `data_dbd_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_filaria`
--
ALTER TABLE `data_filaria`
  ADD PRIMARY KEY (`id_data_filaria`),
  ADD KEY `data_filaria_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_fogingfokus`
--
ALTER TABLE `data_fogingfokus`
  ADD PRIMARY KEY (`id_datafogingfokus`);

--
-- Indeks untuk tabel `data_ibuhamil`
--
ALTER TABLE `data_ibuhamil`
  ADD PRIMARY KEY (`id_dataibuhamil`),
  ADD KEY `data_ibuhamil_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  ADD PRIMARY KEY (`id_data_kelahiran`),
  ADD KEY `data_kelahiran_dataibuhamil_id_foreign` (`dataibuhamil_id`);

--
-- Indeks untuk tabel `data_kematianmaternal`
--
ALTER TABLE `data_kematianmaternal`
  ADD PRIMARY KEY (`id_kematianmaternal`),
  ADD KEY `data_kematianmaternal_datakelahiran_id_foreign` (`datakelahiran_id`);

--
-- Indeks untuk tabel `data_kesakitan`
--
ALTER TABLE `data_kesakitan`
  ADD PRIMARY KEY (`id_datakesakitan`),
  ADD KEY `data_kesakitan_pasien_id_foreign` (`pasien_id`),
  ADD KEY `data_kesakitan_jeniskesakitan_id_foreign` (`jeniskesakitan_id`);

--
-- Indeks untuk tabel `data_kunjunganneonatus`
--
ALTER TABLE `data_kunjunganneonatus`
  ADD PRIMARY KEY (`id_data_kunjunganneonatus`),
  ADD KEY `data_kunjunganneonatus_datakelahiran_id_foreign` (`datakelahiran_id`);

--
-- Indeks untuk tabel `data_lilawanitausiasubur`
--
ALTER TABLE `data_lilawanitausiasubur`
  ADD PRIMARY KEY (`id_datalilawanitausiasubur`),
  ADD KEY `data_lilawanitausiasubur_id_pasien_foreign` (`id_pasien`);

--
-- Indeks untuk tabel `data_malaria`
--
ALTER TABLE `data_malaria`
  ADD PRIMARY KEY (`id_datamalaria`),
  ADD KEY `data_malaria_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_pemberantasan_sarangnyamuk`
--
ALTER TABLE `data_pemberantasan_sarangnyamuk`
  ADD PRIMARY KEY (`id_data_pemberantasan_sarangnyamuk`);

--
-- Indeks untuk tabel `data_pemeriksaan_jentik`
--
ALTER TABLE `data_pemeriksaan_jentik`
  ADD PRIMARY KEY (`id_data_pemeriksaan_jentik`);

--
-- Indeks untuk tabel `data_penerimaobatfarmasi`
--
ALTER TABLE `data_penerimaobatfarmasi`
  ADD PRIMARY KEY (`id_penerimaobatfarmasi`),
  ADD KEY `data_penerimaobatfarmasi_id_users_foreign` (`id_users`),
  ADD KEY `data_penerimaobatfarmasi_id_obatfarmasi_foreign` (`id_obatfarmasi`);

--
-- Indeks untuk tabel `data_penerimavaksin`
--
ALTER TABLE `data_penerimavaksin`
  ADD PRIMARY KEY (`id_penerimavaksin`),
  ADD KEY `data_penerimavaksin_vaksin_id_foreign` (`vaksin_id`),
  ADD KEY `data_penerimavaksin_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_penyemprotanmalaria`
--
ALTER TABLE `data_penyemprotanmalaria`
  ADD PRIMARY KEY (`id_data_penyemprotanmalaria`);

--
-- Indeks untuk tabel `data_rabies`
--
ALTER TABLE `data_rabies`
  ADD PRIMARY KEY (`id_data_rabies`),
  ADD KEY `data_rabies_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_stimulasitumbuhkembang`
--
ALTER TABLE `data_stimulasitumbuhkembang`
  ADD PRIMARY KEY (`data_stimulasitumbuhkembang`),
  ADD KEY `data_stimulasitumbuhkembang_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_tetanusneonatrium`
--
ALTER TABLE `data_tetanusneonatrium`
  ADD PRIMARY KEY (`id_datatetanusneonatrium`),
  ADD KEY `data_tetanusneonatrium_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_timbangananak`
--
ALTER TABLE `data_timbangananak`
  ADD PRIMARY KEY (`id_datatimbangananak`),
  ADD KEY `data_timbangananak_pasien_id_foreign` (`pasien_id`);

--
-- Indeks untuk tabel `data_vaksinasi`
--
ALTER TABLE `data_vaksinasi`
  ADD PRIMARY KEY (`id_data_vaksinasi`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_kesakitan`
--
ALTER TABLE `jenis_kesakitan`
  ADD PRIMARY KEY (`id_jeniskesakitan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nama_kesakitan`
--
ALTER TABLE `nama_kesakitan`
  ADD PRIMARY KEY (`id_namakesakitan`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dataobat_farmasi`
--
ALTER TABLE `dataobat_farmasi`
  MODIFY `id_obatfarmasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_abatisasi`
--
ALTER TABLE `data_abatisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_afp`
--
ALTER TABLE `data_afp`
  MODIFY `id_dataafp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_bumilresiko`
--
ALTER TABLE `data_bumilresiko`
  MODIFY `data_bumilresiko` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_dbd`
--
ALTER TABLE `data_dbd`
  MODIFY `id_datadbd` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_filaria`
--
ALTER TABLE `data_filaria`
  MODIFY `id_data_filaria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_fogingfokus`
--
ALTER TABLE `data_fogingfokus`
  MODIFY `id_datafogingfokus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_ibuhamil`
--
ALTER TABLE `data_ibuhamil`
  MODIFY `id_dataibuhamil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  MODIFY `id_data_kelahiran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kematianmaternal`
--
ALTER TABLE `data_kematianmaternal`
  MODIFY `id_kematianmaternal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kesakitan`
--
ALTER TABLE `data_kesakitan`
  MODIFY `id_datakesakitan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kunjunganneonatus`
--
ALTER TABLE `data_kunjunganneonatus`
  MODIFY `id_data_kunjunganneonatus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_lilawanitausiasubur`
--
ALTER TABLE `data_lilawanitausiasubur`
  MODIFY `id_datalilawanitausiasubur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_malaria`
--
ALTER TABLE `data_malaria`
  MODIFY `id_datamalaria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pemberantasan_sarangnyamuk`
--
ALTER TABLE `data_pemberantasan_sarangnyamuk`
  MODIFY `id_data_pemberantasan_sarangnyamuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pemeriksaan_jentik`
--
ALTER TABLE `data_pemeriksaan_jentik`
  MODIFY `id_data_pemeriksaan_jentik` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_penerimaobatfarmasi`
--
ALTER TABLE `data_penerimaobatfarmasi`
  MODIFY `id_penerimaobatfarmasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_penerimavaksin`
--
ALTER TABLE `data_penerimavaksin`
  MODIFY `id_penerimavaksin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_penyemprotanmalaria`
--
ALTER TABLE `data_penyemprotanmalaria`
  MODIFY `id_data_penyemprotanmalaria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_rabies`
--
ALTER TABLE `data_rabies`
  MODIFY `id_data_rabies` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_stimulasitumbuhkembang`
--
ALTER TABLE `data_stimulasitumbuhkembang`
  MODIFY `data_stimulasitumbuhkembang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_tetanusneonatrium`
--
ALTER TABLE `data_tetanusneonatrium`
  MODIFY `id_datatetanusneonatrium` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_timbangananak`
--
ALTER TABLE `data_timbangananak`
  MODIFY `id_datatimbangananak` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_vaksinasi`
--
ALTER TABLE `data_vaksinasi`
  MODIFY `id_data_vaksinasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_kesakitan`
--
ALTER TABLE `jenis_kesakitan`
  MODIFY `id_jeniskesakitan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `nama_kesakitan`
--
ALTER TABLE `nama_kesakitan`
  MODIFY `id_namakesakitan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_afp`
--
ALTER TABLE `data_afp`
  ADD CONSTRAINT `data_afp_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_bumilresiko`
--
ALTER TABLE `data_bumilresiko`
  ADD CONSTRAINT `data_bumilresiko_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `data_dbd`
--
ALTER TABLE `data_dbd`
  ADD CONSTRAINT `data_dbd_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_filaria`
--
ALTER TABLE `data_filaria`
  ADD CONSTRAINT `data_filaria_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_ibuhamil`
--
ALTER TABLE `data_ibuhamil`
  ADD CONSTRAINT `data_ibuhamil_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  ADD CONSTRAINT `data_kelahiran_dataibuhamil_id_foreign` FOREIGN KEY (`dataibuhamil_id`) REFERENCES `data_ibuhamil` (`id_dataibuhamil`);

--
-- Ketidakleluasaan untuk tabel `data_kematianmaternal`
--
ALTER TABLE `data_kematianmaternal`
  ADD CONSTRAINT `data_kematianmaternal_datakelahiran_id_foreign` FOREIGN KEY (`datakelahiran_id`) REFERENCES `data_kelahiran` (`id_data_kelahiran`);

--
-- Ketidakleluasaan untuk tabel `data_kesakitan`
--
ALTER TABLE `data_kesakitan`
  ADD CONSTRAINT `data_kesakitan_jeniskesakitan_id_foreign` FOREIGN KEY (`jeniskesakitan_id`) REFERENCES `jenis_kesakitan` (`id_jeniskesakitan`),
  ADD CONSTRAINT `data_kesakitan_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_kunjunganneonatus`
--
ALTER TABLE `data_kunjunganneonatus`
  ADD CONSTRAINT `data_kunjunganneonatus_datakelahiran_id_foreign` FOREIGN KEY (`datakelahiran_id`) REFERENCES `data_kelahiran` (`id_data_kelahiran`);

--
-- Ketidakleluasaan untuk tabel `data_lilawanitausiasubur`
--
ALTER TABLE `data_lilawanitausiasubur`
  ADD CONSTRAINT `data_lilawanitausiasubur_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_malaria`
--
ALTER TABLE `data_malaria`
  ADD CONSTRAINT `data_malaria_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_penerimaobatfarmasi`
--
ALTER TABLE `data_penerimaobatfarmasi`
  ADD CONSTRAINT `data_penerimaobatfarmasi_id_obatfarmasi_foreign` FOREIGN KEY (`id_obatfarmasi`) REFERENCES `dataobat_farmasi` (`id_obatfarmasi`),
  ADD CONSTRAINT `data_penerimaobatfarmasi_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `data_penerimavaksin`
--
ALTER TABLE `data_penerimavaksin`
  ADD CONSTRAINT `data_penerimavaksin_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `data_penerimavaksin_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `data_vaksinasi` (`id_data_vaksinasi`);

--
-- Ketidakleluasaan untuk tabel `data_rabies`
--
ALTER TABLE `data_rabies`
  ADD CONSTRAINT `data_rabies_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_stimulasitumbuhkembang`
--
ALTER TABLE `data_stimulasitumbuhkembang`
  ADD CONSTRAINT `data_stimulasitumbuhkembang_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_tetanusneonatrium`
--
ALTER TABLE `data_tetanusneonatrium`
  ADD CONSTRAINT `data_tetanusneonatrium_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `data_timbangananak`
--
ALTER TABLE `data_timbangananak`
  ADD CONSTRAINT `data_timbangananak_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
