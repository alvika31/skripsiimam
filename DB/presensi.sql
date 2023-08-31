-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2023 pada 18.31
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam_absen` time NOT NULL,
  `lat_absen` varchar(250) NOT NULL,
  `long_absen` varchar(250) NOT NULL,
  `status_absen` int(1) NOT NULL,
  `selfie_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_pegawai`, `tgl_absen`, `jam_absen`, `lat_absen`, `long_absen`, `status_absen`, `selfie_absen`) VALUES
(390, 40, '2023-08-31', '22:54:10', '-7.0211486', '107.6097062', 1, 'WhatsApp_Image_2023-08-30_at_12_21_47-min1.jpg'),
(391, 40, '2023-08-31', '22:57:52', '-7.0211486', '107.6097062', 1, 'calvin-foto-rev.png'),
(392, 40, '2023-08-31', '23:19:15', '-7.0211486', '107.6097062', 1, 'edit.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(7, '20:00:00', '23:04:00', 'Masuk'),
(8, '01:00:00', '23:58:00', 'Pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` varchar(125) NOT NULL,
  `umur` int(11) NOT NULL,
  `image` varchar(125) NOT NULL DEFAULT 'image.jpg',
  `kode_pegawai` varchar(125) NOT NULL,
  `jabatan` varchar(125) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pegawai`, `nama_lengkap`, `username`, `password`, `user_type`, `umur`, `image`, `kode_pegawai`, `jabatan`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`) VALUES
(40, 'Alvika Aji Prahasta', 'alvika', '2f06a87d2b049973067695328b013230', 'Admin', 20, 'refisi.jpg', '001', 'Direktur', '2001-10-16', 'Bandung', 'Pria'),
(47, 'Erni Putri Siswanti', 'erni', '7815696ecbf1c96e6894b779456d330e', 'Admin', 35, 'erni.png', '002', 'HRD', '1988-06-15', 'Tangerang', 'Perempuan'),
(48, 'Della Dewi', 'della', '2f06a87d2b049973067695328b013230', 'Admin', 25, 'della.png', '003', 'Admin Support', '1993-10-14', 'Bandung', 'Perempuan'),
(49, 'Nirwansyah Ramdhani', 'nirwan', '28e47f714c1fcb538a669b971ee6ce46', 'Karyawan', 24, 'nirwan.png', '004', 'Web Developer', '1996-06-24', 'Bandung', 'Pria'),
(50, 'Faisal Kurnia', 'faisal', 'f4668288fdbf9773dd9779d412942905', 'Karyawan', 26, 'faisal.png', '005', 'Digital Marketing', '1990-06-19', 'Bandung', 'Pria'),
(51, 'Rio Gunawan', 'rio', '2646b693e6aeccc6eaac88e005944310', 'Karyawan', 22, 'rio.png', '006', 'Web Developer', '1996-10-24', 'Bandung', 'Pria'),
(52, 'Aria Wiguna', 'aria', 'aafa7ed7cc46d6b04fc6e2b20baab657', 'Karyawan', 22, 'arya.png', '007', 'Web Developer', '1997-06-23', 'Bandung', 'Pria'),
(53, 'Umi Warsitaningsih', 'umi', 'e84f942d7f93ddc14d24b930d87e3da7', 'Karyawan', 30, 'umi.png', '008', 'Adword Specialis', '1983-10-26', 'Lampung', 'Perempuan'),
(66, 'galih', 'galih', '027dc74f0bbf09a61a36ec7f0d9e08ca', 'Admin', 65, 'Foto_diri.jpg', '1234', 'atas boss', '2001-03-01', 'pejaten', 'Pria');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
