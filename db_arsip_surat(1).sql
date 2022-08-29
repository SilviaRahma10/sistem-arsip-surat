-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2021 pada 14.39
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `isi` text NOT NULL,
  `batas_waktu` date NOT NULL,
  `sifat_id` int(11) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id`, `sm_id`, `jabatan_id`, `isi`, `batas_waktu`, `sifat_id`, `catatan`) VALUES
(13, 22, 101, 'undangan diskusi teknik', '2021-11-15', 1, 'tidak dapat diwakilkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL COMMENT 'opsional',
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `jabatan`) VALUES
(101, 'Valle', 'komti solitairee'),
(102, 'aqmal', 'sekretaris umum solitiree');

-- --------------------------------------------------------

--
-- Struktur dari tabel `memo_keluar`
--

CREATE TABLE `memo_keluar` (
  `id` int(11) NOT NULL,
  `penerima` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `memo_keluar`
--

INSERT INTO `memo_keluar` (`id`, `penerima`, `tgl`, `keterangan`, `file`, `created_at`, `user_id`) VALUES
(4, 'BEMFT universitas bengkulu', '2021-11-17', 'acara maulid nabi', 'Undangan_Maulid_Nabi.pdf', '2021-11-08', 1),
(5, 'komti SI', '2021-11-30', 'collab healing', 'healing_colab.jpg', '2021-11-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `memo_masuk`
--

CREATE TABLE `memo_masuk` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `memo_masuk`
--

INSERT INTO `memo_masuk` (`id`, `pengirim`, `tgl`, `keterangan`, `file`, `created_at`, `user_id`) VALUES
(7, 'komti ts', '2021-11-26', 'acara makrab', 'poster_makrab.jpg', '2021-11-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sifat`
--

CREATE TABLE `sifat` (
  `id` int(11) NOT NULL,
  `sifat` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sifat`
--

INSERT INTO `sifat` (`id`, `sifat`) VALUES
(1, 'Segera'),
(2, 'Sangat Segera'),
(3, 'Rahasia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_surat` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_agenda`, `pengirim`, `no_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `created_at`, `user_id`, `isi_surat`) VALUES
(10, 1, 'solitairee', '1/PAS/XI/2021', 'Surat permohonan Dana', '2021-11-09', '2021-11-25', '', 'surat_permohonan.png', '2020-12-01', 1, NULL),
(11, 124, 'solitairee', '1/PAS/XI/2021', 'undangan rapat', '2021-11-03', '2020-12-16', '', 'undangan_rapat.pdf', '2020-12-02', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `no_agenda` int(11) DEFAULT NULL,
  `pengirim` varchar(128) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_agenda`, `pengirim`, `no_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `created_at`, `user_id`) VALUES
(22, 1, 'biro SDM', 'SDM/2021/11/12', 'surat undangan diskusi teknik', '2021-11-25', '2021-11-10', 'DISKUSI', 'surat_undangan_(2).jpg', '2021-11-08', 1),
(23, 2, 'BEM FT UNIB', '17/BEM-FT-UNIB/XI/2021', 'SURAT UNDANGAN DISKUSI ANTAR PRODI FAKULTAS TEKNIK', '2021-11-13', '2021-11-06', 'DISKUSI', 'SURAT_UNDANGAN_DISKUSI.pdf', '2021-11-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES
(1, 'silvia rahma', 'admin01', 'silviarahma2021@gmail.com', '$2y$10$OwOzMowXdJTDOsS3IO0H7e6twJwVGe9PUTEMEbCT6yRbqoaMzpH7e', 'default.svg', 1, '1605240939'),
(2, 'widya nurul', 'admin2', 'widyanurulhuda@gmail.com', '$2y$10$Iv8uRGoflqVrpzyFr7uGheIRYGQ3H9kmu/000R.spfrWH7d7.1bW.', 'default.svg', 1, '1605249406'),
(5, 'testt', 'admin3', 'tes@gmail.com', '$2y$10$ibtz.sAwKAE81MzSpVCe/utlqLoVyqCvx/u3dOxmyWmEEdeaWIYBe', 'default.svg', 1, '0572653'),
(17, 'khalid', 'khalid123', 'khalidalrijadi@gmail.com', '$2y$10$l4jKehSEqdY5Cfo9BYfIreqb3agQcKXNnKUIcUXXYlRSm1OSbiP/6', 'default.svg', 2, '1605493420'),
(23, 'widya nurul huda', 'widya', 'widyanurulhuda1@gmail.com', '$2y$10$6pLTiJVqU8PiaxSK431m3e4ZLriaTYmPl/xR3XMiUVLVUoB5/ahbq', 'default.svg', 1, '1636362424'),
(24, 'WIDYANURUL', 'WIDYANURUL', 'nuruldesign@gmail.com', '$2y$10$/HHOgaNSnyeGAeM6p54g.OQaKHaGsUbM/Y5NVKk7SdXdEtNTcKD9W', 'default.svg', 2, '1636362507'),
(25, 'asih', 'asih', 'asih@gmail.com', '$2y$10$Jw2ge7D5K7EbhbnaXlHMLuxhTLapy.SBTI9dzlGH1XYHohi0wVPk.', 'default.svg', 2, '1636362621'),
(26, 'wahyu ramadhani', 'wahyu', 'wahyu@gmail.com', '$2y$10$ARGYEE7AyTTsmrSJ73EfsuVK8lMTDiurQkgeAEk.7ASnGHqeDus0e', 'default.svg', 2, '1636362661'),
(27, 'nabila gita', 'nabila', 'nabila@gmail.com', '$2y$10$.JOsEKvlURSW5PiuxluTV.suuh5rO9WOkJTz//QvxKR4FKkaGyFO2', 'default.svg', 2, '1636362720'),
(28, 'silvia rahma', 'silvia', 'silvia@gmail.com', '$2y$10$8eGBiRoFnGIjz5QgUo7Bp.L4rpivVtq0PTeM9ZCJ1YuWLX6DlHiSW', 'default.svg', 2, '1636363069');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'silviarahma2021@gmail.com', '7mrmfi2wevTUH00kHb3Q6rLly4OhbiweRaKiIEl9Lz0=', '1605240598'),
(2, 'widyanurulhuda@gmail.com', 'PRB8EGsnedbZW9f8RBheB5i9GKwY36XX7hb6SlIIrMU=', '1605249558');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sifat_id` (`sifat_id`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `disposisi_ibfk_1` (`sm_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `memo_keluar`
--
ALTER TABLE `memo_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `memo_masuk`
--
ALTER TABLE `memo_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `memo_keluar`
--
ALTER TABLE `memo_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `memo_masuk`
--
ALTER TABLE `memo_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sifat`
--
ALTER TABLE `sifat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`sm_id`) REFERENCES `surat_masuk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`sifat_id`) REFERENCES `sifat` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
