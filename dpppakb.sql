-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2024 pada 06.17
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpppakb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_kegiatan`
--

CREATE TABLE `biaya_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(225) DEFAULT NULL,
  `jenis_kegiatan` varchar(225) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `rincian` varchar(225) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biaya_kegiatan`
--

INSERT INTO `biaya_kegiatan` (`id`, `nama_pegawai`, `jenis_kegiatan`, `biaya`, `rincian`, `tanggal_keluar`, `foto`) VALUES
(4, 'Muhammad Rizqiannor', 'sosialisasi kb', 6000000, 'Makan Bersama dan 100,000 per-orang', '2024-02-13', 'bukti/1674815164-blob.jpeg'),
(5, 'Silvia Inayah', 'makan bersama', 200000, 'Makan Bersama dan 150,000 per-orang', '2024-02-09', 'bukti/Logo_BerAKHLAK.png'),
(6, 'Galuh Humampai', 'membeli susu anak', 5000000, 'Makan Bersama dan 75,000 per-orang', '2024-02-10', 'bukti/photo_2023-09-26_11-33-19.jpg'),
(7, 'Anang Gulinang', 'Sosialisasi Pencegahan Kekerasan Anak', 9000000, 'Makan Bersama dan 150,000 per-orang', '2024-02-27', 'bukti/94-DPP-PPLIPI.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `nama_bidang`) VALUES
(1, 'Bidang UNPEG'),
(2, 'Bidang PPA'),
(3, 'Bidang KB'),
(4, 'Bidang PHA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL,
  `nama_golongan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `nama_golongan`) VALUES
(3, 'Golongan I'),
(4, 'Golongan II'),
(5, 'Golongan III'),
(6, 'Golongan IV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(1, 'Kasi'),
(2, 'Kadis'),
(3, 'Staf'),
(4, 'Admin'),
(5, 'Kabid'),
(6, 'Sekretaris'),
(7, 'Kasubag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tema` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pelaksana` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tempat` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tema`, `pelaksana`, `tempat`, `tujuan`, `tanggal`) VALUES
(1, 'Peringatan Hari Ibu ke-95 Tahun 2023', 'Perempuan Berdaya, Indonesia Maju', 'Muhammad Rizqiannor', 'Mahligai Pancasila', 'Mendorong semua pemangku kepentingan dan masyarakat luas untuk memberikan perhatian dan pengakuan akan pentingnya eksistensi perempuan dalam berbagai bidang', '2023-12-14'),
(2, 'Peringatan Hari Keluarga Nasional ke-30', 'Menuju Keluarga Bebas Stunting, Indonesia Maju', 'Muhammad Rizqiannor', 'Gedung Sultan Suriansyah', 'Sebagai sebuah momentum peringatan bagi seluruh bagi keluarga akan pentingnya keharmonisan keluarga untuk pembangunan bangsa dan negara', '2023-06-29'),
(6, 'Peringatan Hari Anak Nasional ke-39 Tahun 2023', 'Anak Terlindungi, Indonesia Maju', 'Muhammad Rizqiannor', 'Mahligai Pancasila', 'Meningkatkan kesadaran dan perhatian terhadap pentingnya perlindungan dan pemenuhan hak-hak anak', '2023-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `golongan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `detail_jabatan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bidang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `golongan`, `jabatan`, `detail_jabatan`, `bidang`) VALUES
(34, '2010010274', 'Muhammad Rizqiannor', 'Golongan IV', 'Admin', 'Kasubag Perencanaan', 'PPA'),
(35, '2010010274', 'Silvia Inayah', 'Golongan I', 'Kasubag', 'Kasubag Perencanaan', 'Perencanaan'),
(36, '2010010274', 'Anang Gulinang', 'Golongan II', 'Kasi', 'Staf Perencanaan', 'KB'),
(37, '2010010274', 'Galuh Humampai', 'Golongan III', 'Sekretaris', 'Staf Perencanaan', 'PHA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(11) NOT NULL,
  `data_kegiatan` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tempat` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `jumlah_peserta` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `data_kegiatan`, `tempat`, `jumlah_peserta`, `nama_pegawai`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 'Sosialisasi KB', 'Gedung Sultan Suriansyah', '200 Orang', 'Muhammad Rizqiannor', '2024-02-07 10:53:00', '2024-02-07 10:20:00'),
(3, 'Sosialisasi Kekerasan Anak', 'Gedung Sultan Suriansyah', '200 Orang', 'Muhammad Rizqiannor', '2024-02-07 11:30:00', '2024-02-07 11:36:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(12, 'MuhammadRizqiannor', 'd98c4c103cb5fb6858cb1f1ec988f058', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_kegiatan`
--
ALTER TABLE `biaya_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_kegiatan`
--
ALTER TABLE `biaya_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
