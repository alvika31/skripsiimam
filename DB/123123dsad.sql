-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2023 pada 05.30
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
-- Database: `presensi_karyawan`
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
  `jam_absen_pulang` time NOT NULL,
  `lat_absen` varchar(250) NOT NULL,
  `long_absen` varchar(250) NOT NULL,
  `keterangan_absen` varchar(100) NOT NULL,
  `status_absen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_pegawai`, `tgl_absen`, `jam_absen`, `jam_absen_pulang`, `lat_absen`, `long_absen`, `keterangan_absen`, `status_absen`) VALUES
(279, 40, '2022-05-19', '08:43:23', '00:00:00', '-7.0311904', '107.6021675', 'Bekerja Di Kantor', 1),
(280, 51, '2022-05-19', '08:43:35', '00:00:00', '-7.0311904', '107.6021675', 'Bekerja Di Kantor', 1),
(281, 52, '2022-05-19', '08:43:50', '00:00:00', '-7.0311904', '107.6021675', 'Bekerja Di Kantor', 1),
(282, 49, '2022-05-19', '08:43:57', '00:00:00', '-7.0311904', '107.6021675', 'Bekerja Di Kantor', 1),
(283, 48, '2022-05-19', '08:44:10', '00:00:00', '-7.0311904', '107.6021675', 'Bekerja Di Kantor', 1),
(284, 53, '2022-05-19', '08:44:53', '00:00:00', '-7.0311904', '107.6021675', 'Bekerja Di Kantor', 1),
(285, 40, '2022-05-20', '09:07:53', '09:08:14', '-7.0311844', '107.6021731', 'Bekerja Di Kantor', 2),
(286, 47, '2022-05-20', '09:09:01', '00:00:00', '-7.0311845', '107.6021734', 'Sakit', 1),
(291, 40, '2022-06-09', '15:46:43', '00:00:00', '-7.031178', '107.6021783', 'Bekerja Di Kantor', 1),
(292, 53, '2022-06-09', '15:50:03', '00:00:00', '-7.0311834', '107.6021805', 'Bekerja Di Kantor', 1),
(293, 47, '2022-06-09', '23:40:33', '00:00:00', '-7.0317349', '107.6029929', 'Bekerja Di Kantor', 1),
(295, 47, '2022-06-10', '22:29:08', '00:00:00', '-7.03118', '107.6021821', 'Bekerja Di Kantor', 1),
(296, 47, '2022-06-13', '10:16:27', '10:50:34', '-7.0311852', '107.6021788', 'Bekerja Di Kantor', 2),
(298, 40, '2022-06-13', '10:18:44', '10:50:19', '-7.0311852', '107.6021788', 'Bekerja Di Rumah / WFH', 2),
(299, 53, '2022-06-13', '10:51:09', '10:51:16', '-7.0311822', '107.6021801', 'Bekerja Di Rumah / WFH', 2),
(300, 50, '2022-06-13', '10:51:37', '10:51:39', '-7.0311822', '107.6021801', 'Bekerja Di Kantor', 2),
(301, 49, '2022-06-13', '10:51:54', '10:51:57', '-7.0311822', '107.6021801', 'Bekerja Di Kantor', 2),
(302, 40, '2022-06-16', '08:39:16', '00:00:00', '-6.9310697', '107.6150931', 'Bekerja Di Kantor', 1),
(303, 47, '2022-06-16', '08:39:33', '00:00:00', '-6.9310737', '107.6151041', 'Bekerja Di Kantor', 1),
(304, 53, '2022-06-16', '08:40:56', '00:00:00', '-6.9310767', '107.6150979', 'Bekerja Di Kantor', 1),
(305, 49, '2022-06-16', '08:42:14', '00:00:00', '-6.9310805', '107.6151031', 'Bekerja Di Kantor', 1),
(306, 40, '2022-07-05', '14:31:00', '00:00:00', '-6.9539132', '107.5818564', 'Bekerja Di Kantor', 1),
(307, 40, '2022-07-13', '15:09:06', '00:00:00', '-7.0311726', '107.6021891', 'Bekerja Di Kantor', 1),
(309, 49, '2022-07-29', '08:43:52', '00:00:00', '-7.0311842', '107.6021731', 'Bekerja Di Rumah / WFH', 1),
(311, 40, '2022-07-29', '14:43:25', '00:00:00', '-7.041379078132156', '107.60773724826336', 'Bekerja Di Kantor', 1),
(312, 40, '2022-08-02', '17:12:26', '00:00:00', '-7.0564276', '107.572521', 'Bekerja Di Kantor', 1),
(313, 40, '2022-08-06', '14:24:28', '00:00:00', '-7.0413726', '107.6077072', 'Bekerja Di Kantor', 1),
(314, 40, '2022-08-23', '23:04:41', '00:00:00', '-6.9107712', '107.6002816', 'Bekerja Di Kantor', 1),
(315, 40, '2022-08-25', '10:06:08', '11:18:53', '-7.0311839', '107.602161', 'Cuti', 2),
(316, 40, '2022-09-19', '17:13:40', '17:14:32', '-7.0413608', '107.6077436', 'Bekerja Di Kantor', 2),
(317, 40, '2022-09-25', '14:50:01', '00:00:00', '-7.0311782', '107.6021904', 'Bekerja Di Kantor', 1),
(318, 40, '2022-09-27', '08:49:32', '00:00:00', '-7.0311892', '107.6021919', 'Bekerja Di Kantor', 1),
(319, 40, '2022-09-30', '16:15:02', '16:20:07', '-7.0413696', '107.6077408', 'Bekerja Di Kantor', 2),
(320, 47, '2022-09-30', '16:15:36', '17:58:45', '-7.0413696', '107.6077408', 'Bekerja Di Kantor', 2),
(321, 49, '2022-09-30', '16:17:15', '16:24:27', '-7.0413765', '107.6077397', 'Bekerja Di Kantor', 2),
(322, 48, '2022-09-30', '16:18:08', '00:00:00', '-7.0413752', '107.6077369', 'Bekerja Di Kantor', 1),
(323, 50, '2022-09-30', '16:18:53', '00:00:00', '-7.0413632', '107.6077461', 'Bekerja Di Rumah / WFH', 1),
(324, 52, '2022-09-30', '16:19:09', '00:00:00', '-7.0413632', '107.6077461', 'Bekerja Di Kantor', 1),
(325, 51, '2022-09-30', '16:19:30', '22:40:38', '-7.0413632', '107.6077461', 'Bekerja Di Kantor', 2),
(326, 53, '2022-09-30', '16:19:41', '16:21:11', '-7.0413632', '107.6077461', 'Bekerja Di Kantor', 2),
(327, 40, '2022-10-01', '16:28:26', '10:23:19', '-7.0413632', '107.6077461', 'Bekerja Di Kantor', 2),
(328, 49, '2022-10-01', '17:37:25', '00:00:00', '-7.0311838', '107.6019443', 'Bekerja Di Kantor', 1),
(329, 47, '2022-10-01', '17:43:20', '17:53:10', '-7.0311823', '107.6019497', 'Bekerja Di Kantor', 2),
(330, 40, '2022-10-02', '00:31:03', '11:54:35', '-7.0311869', '107.6021896', 'Bekerja Di Kantor', 2),
(331, 51, '2022-10-02', '00:31:24', '00:00:00', '-7.031183', '107.602194', 'Bekerja Di Kantor', 1),
(332, 51, '2022-10-01', '09:52:32', '00:00:00', '-7.031187', '107.6021837', 'Sakit', 1),
(334, 53, '2022-10-01', '10:20:52', '00:00:00', '-7.0311791', '107.6021874', 'Sakit', 1),
(335, 52, '2022-10-01', '10:24:15', '00:00:00', '-7.0311783', '107.6021862', 'Cuti', 1),
(336, 48, '2022-10-01', '10:33:20', '10:46:36', '-7.0311821', '107.6021829', 'Cuti', 2),
(337, 49, '2022-10-02', '11:56:10', '11:56:45', '-7.0311829', '107.6021932', 'Bekerja Di Rumah / WFH', 2),
(338, 40, '2022-10-04', '09:11:07', '00:00:00', '-7.0311876', '107.60219', 'Bekerja Di Kantor', 1),
(339, 47, '2022-10-04', '10:03:30', '10:03:45', '-7.0311893', '107.6021875', 'Sakit', 2),
(340, 40, '2022-10-06', '09:15:47', '11:20:21', '-7.0311874', '107.6021951', 'Bekerja Di Kantor', 2),
(341, 51, '2022-10-06', '11:19:52', '00:00:00', '-7.0311884', '107.6021894', 'Cuti', 1),
(342, 49, '2022-10-06', '13:02:56', '00:00:00', '-6.9311016', '107.6150732', 'Bekerja Di Rumah / WFH', 1),
(343, 40, '2022-10-07', '10:16:17', '10:18:16', '-6.9539405', '107.5818538', 'Bekerja Di Kantor', 2),
(344, 40, '2022-10-08', '09:00:49', '00:00:00', '-7.0311877', '107.602193', 'Bekerja Di Kantor', 1),
(345, 40, '2022-10-10', '09:00:27', '00:00:00', '-7.0311902', '107.6021826', 'Bekerja Di Kantor', 1),
(346, 40, '2022-10-15', '10:05:43', '00:00:00', '-7.0311827', '107.6021891', 'Bekerja Di Kantor', 1),
(347, 40, '2022-10-16', '11:31:58', '00:00:00', '-7.0311827', '107.6021877', 'Sakit', 1),
(348, 40, '2022-10-17', '13:30:22', '00:00:00', '-7.0311755', '107.602197', 'Bekerja Di Rumah / WFH', 1),
(349, 54, '2022-10-17', '14:19:44', '00:00:00', '-6.9174639', '107.6191228', 'Bekerja Di Kantor', 1),
(350, 47, '2022-10-18', '09:31:38', '11:47:08', '-7.0311845', '107.6021828', 'Bekerja Di Kantor', 2),
(351, 40, '2022-10-19', '10:56:14', '00:00:00', '-6.9316608', '107.6153241', 'Bekerja Di Rumah / WFH', 1),
(352, 40, '2022-10-20', '09:32:13', '00:00:00', '-6.9238784', '107.5806208', 'Bekerja Di Kantor', 1),
(353, 50, '2022-10-20', '09:32:28', '00:00:00', '-7.0311728', '107.602191', 'Bekerja Di Rumah / WFH', 1),
(354, 48, '2022-10-20', '09:32:38', '00:00:00', '-7.0311728', '107.602191', 'Bekerja Di Kantor', 1),
(355, 51, '2022-10-20', '09:50:35', '00:00:00', '-7.0311728', '107.602191', 'Bekerja Di Kantor', 1),
(356, 40, '2022-10-22', '13:58:52', '00:00:00', '-6.9964622', '107.5998821', 'Bekerja Di Kantor', 1),
(358, 40, '2022-10-23', '09:48:22', '11:36:19', '-6.9074944', '106.9252608', 'Bekerja Di Kantor', 2),
(360, 40, '2022-11-02', '09:30:47', '00:00:00', '-7.0313028', '107.6022438', 'Bekerja Di Rumah / WFH', 1),
(361, 40, '2022-11-05', '09:08:24', '10:02:49', '-7.0311848', '107.6021871', 'Bekerja Di Kantor', 2),
(362, 40, '2022-11-06', '16:57:04', '00:00:00', '-7.0209874', '107.6097062', 'Sakit', 1),
(363, 40, '2022-11-07', '10:04:57', '00:00:00', '-6.9310346', '107.6150551', 'Bekerja Di Kantor', 1),
(364, 40, '2022-11-08', '12:12:54', '00:00:00', '-7.0311867', '107.6021947', 'Bekerja Di Kantor', 1),
(365, 40, '2022-11-26', '10:14:14', '10:15:12', '-7.0311721', '107.6021856', 'Bekerja Di Rumah / WFH', 2),
(366, 40, '2022-12-06', '09:40:07', '00:00:00', '-7.0209874', '107.6097062', 'Bekerja Di Kantor', 1),
(367, 56, '2022-12-07', '12:34:52', '12:39:28', '-6.9338416', '107.6169069', 'Bekerja Di Kantor', 2),
(368, 40, '2022-12-11', '18:09:09', '00:00:00', '-7.0416188', '107.6097063', 'Bekerja Di Kantor', 1),
(369, 47, '2022-12-11', '18:26:27', '00:00:00', '-7.0416188', '107.6097063', 'Bekerja Di Kantor', 1),
(370, 52, '2022-12-11', '18:28:29', '00:00:00', '-7.0416188', '107.6097063', 'Bekerja Di Kantor', 1),
(371, 40, '2022-12-12', '22:37:36', '23:07:42', '-7.0209874', '107.6097062', 'Bekerja Di Rumah / WFH', 2),
(372, 40, '2022-12-15', '09:45:27', '00:00:00', '-6.9600367', '107.5860329', 'Bekerja Di Rumah / WFH', 1),
(373, 40, '2022-12-18', '19:20:14', '19:25:19', '-7.0416188', '107.6097063', 'Bekerja Di Kantor', 2),
(374, 47, '2022-12-18', '19:26:25', '19:26:33', '-7.0416188', '107.6097063', 'Sakit', 2),
(375, 48, '2022-12-18', '19:26:50', '19:26:54', '-7.0416188', '107.6097063', 'Cuti', 2),
(376, 40, '2022-12-28', '14:28:24', '14:38:12', '-7.0228065', '107.5603044', 'Bekerja Di Kantor', 2),
(377, 47, '2022-12-28', '14:39:43', '14:39:45', '-7.0228065', '107.5603044', 'Sakit', 2),
(378, 51, '2022-12-28', '14:48:24', '14:48:25', '-7.0228065', '107.5603044', 'Cuti', 2),
(379, 49, '2022-12-28', '14:54:10', '14:54:11', '-7.0228065', '107.5603044', 'Bekerja Di Kantor', 2);

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
(7, '14:00:00', '16:30:00', 'Masuk'),
(8, '14:00:00', '15:28:00', 'Pulang');

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
(53, 'Umi Warsitaningsih', 'umi', 'e84f942d7f93ddc14d24b930d87e3da7', 'Karyawan', 30, 'umi.png', '008', 'Adword Specialis', '1983-10-26', 'Lampung', 'Perempuan');

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
