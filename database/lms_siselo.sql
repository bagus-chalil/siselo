-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2022 at 06:04 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_siselo`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl_absen` datetime NOT NULL,
  `m_mapel_id` varchar(30) NOT NULL,
  `absensi_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl_absen`, `m_mapel_id`, `absensi_active`) VALUES
(1, '2021-12-17 12:00:00', 'MTK12210001', 1),
(2, '2021-12-20 12:00:00', 'MTK12210002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id` int(11) NOT NULL,
  `absen_id` int(11) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `tgl_absen_siswa` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id`, `absen_id`, `nisn`, `tgl_absen_siswa`, `status`) VALUES
(1, 1, '085226812', 1640579270, 1),
(2, 2, '085226812', 1640580736, 1),
(3, 1, '70728012', 1640581026, 1),
(6, 1, '0129783901', 1640750503, 1),
(7, 2, '70728012', 1641175008, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alat_praktikum`
--

CREATE TABLE `alat_praktikum` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(200) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat_praktikum`
--

INSERT INTO `alat_praktikum` (`id`, `nama_alat`, `matpel_id`, `kelas_id`, `gambar`, `stok`) VALUES
(4, 'Mikroskop Kejujuran', 2, 2, 'Mikroskop-Kejujuran.jpg', 6),
(5, 'Gelas Ukur', 2, 1, 'Gelas-Ukur.jpg', 10),
(6, 'Kaca Pembesar(Lup)', 2, 2, 'Kaca-PembesarLup.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_guru` varchar(75) NOT NULL,
  `emails` varchar(150) NOT NULL,
  `matpel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `emails`, `matpel_id`) VALUES
(1, '98230819308', 'Rikzi Okta Maulana', 'rizki@gmail.com', 1),
(2, '091238190', 'Uzumaki Didan', 'rasenggan@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `h_ujian`
--

CREATE TABLE `h_ujian` (
  `id` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_ujian`
--

INSERT INTO `h_ujian` (`id`, `ujian_id`, `user_Id`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `nilai_bobot`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(1, 2, 2, '6,7', '6:C:N,7:D:N', 1, '50.00', '100.00', '2021-12-15 13:12:02', '2021-12-15 13:22:02', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '13');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_guru`
--

CREATE TABLE `kelas_guru` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_guru`
--

INSERT INTO `kelas_guru` (`id`, `kelas_id`, `guru_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_matpel`
--

CREATE TABLE `kelas_matpel` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_matpel`
--

INSERT INTO `kelas_matpel` (`id`, `kelas_id`, `matpel_id`) VALUES
(2, 1, 3),
(3, 1, 2),
(4, 1, 4),
(5, 1, 5),
(9, 1, 6),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 1, 1),
(15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id_matpel` int(11) NOT NULL,
  `nama_matpel` varchar(128) NOT NULL,
  `kode_matpel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `nama_matpel`, `kode_matpel`) VALUES
(1, 'Matematika', 'MTK'),
(2, 'IPA', 'IPA'),
(3, 'Bahasa Inggris', 'ING'),
(4, 'Bahasa Indonesia', 'IND'),
(5, 'Sejarah Indonesia', 'SJI'),
(6, 'Bahasa Jawa', 'BJW'),
(100, 'Ekonomi', 'EKM');

-- --------------------------------------------------------

--
-- Table structure for table `m_mapel`
--

CREATE TABLE `m_mapel` (
  `id` int(11) NOT NULL,
  `id_m_mapel` varchar(30) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `tgl_mapel` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `dokumen` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mapel`
--

INSERT INTO `m_mapel` (`id`, `id_m_mapel`, `judul`, `keterangan`, `mapel_id`, `kelas_id`, `author`, `tgl_mapel`, `status`, `dokumen`) VALUES
(1, 'MTK12210001', 'Belajar Koding', '<p>Belajar YA yang rajin</p>\r\n', 1, 2, '98230819308', '2021-12-09 12:00:00', 1, 'Proposal_1_-_Bachtiar_Nur_Yogi_Pratama-1-16.pdf'),
(2, 'MTK12210002', 'Belajar Kubus', '<p>Kubus itu mudah....</p>\r\n', 1, 2, '98230819308', '2021-12-10 06:00:00', 1, 'A22_2018_02652_Proposal_Kartasemar.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `m_ujian`
--

CREATE TABLE `m_ujian` (
  `id_ujian` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ujian`
--

INSERT INTO `m_ujian` (`id_ujian`, `guru_id`, `matpel_id`, `nama_ujian`, `jumlah_soal`, `waktu`, `jenis`, `tgl_mulai`, `terlambat`, `token`) VALUES
(1, 1, 1, 'Pre Test 1', 2, 20, 'acak', '2021-12-15 08:45:20', '2021-12-20 20:45:38', 'YMDOQ'),
(2, 1, 1, 'Test 2', 2, 10, 'urut', '2021-12-15 09:23:42', '2021-12-16 23:23:47', 'LCMON');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_alat`
--

CREATE TABLE `tb_pinjam_alat` (
  `id_pinjam` int(11) NOT NULL,
  `alat_id` int(11) NOT NULL,
  `alat_praktikum` varchar(20) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam_alat`
--

INSERT INTO `tb_pinjam_alat` (`id_pinjam`, `alat_id`, `alat_praktikum`, `tgl_pinjam`, `tgl_kembali`, `nisn`, `qty`) VALUES
(5, 6, 'Kaca Pembesar(Lup)', '2021-12-28 10:00:00', '2021-12-29 10:00:00', '70728012', 1),
(6, 4, 'Mikroskop Kejujuran', '2021-12-28 18:47:00', '2021-12-30 18:47:00', '085226812', 1),
(7, 6, 'Kaca Pembesar(Lup)', '2021-12-29 18:47:00', '2021-12-30 18:47:00', '085226812', 1),
(9, 4, 'Mikroskop Kejujuran', '2021-12-22 11:00:00', '2022-01-05 01:00:00', '0129783901', 1),
(10, 4, 'Mikroskop Kejujuran', '2021-12-29 10:47:00', '2021-12-31 10:47:00', '70728012', 1);

--
-- Triggers `tb_pinjam_alat`
--
DELIMITER $$
CREATE TRIGGER `update_alat` AFTER INSERT ON `tb_pinjam_alat` FOR EACH ROW BEGIN
UPDATE alat_praktikum set stok = stok - NEW.qty WHERE  id= NEW.alat_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `matpel_id` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `file_a` varchar(255) NOT NULL,
  `file_b` varchar(255) NOT NULL,
  `file_c` varchar(255) NOT NULL,
  `file_d` varchar(255) NOT NULL,
  `file_e` varchar(255) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `guru_id`, `matpel_id`, `bobot`, `file`, `tipe_file`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `file_a`, `file_b`, `file_c`, `file_d`, `file_e`, `jawaban`, `created_on`, `updated_on`) VALUES
(6, 1, 1, 1, '56cd46977e2702ee279cca65ab8a7019.jpg', 'image/jpeg', '<p>Coba Tebak Gambar ini!<br></p>', '<p>1<br></p>', '<p>2<br></p>', '<p>3<br></p>', '<p>4<br></p>', '<p>5<br></p>', '', '', '', '', '', 'D', 1639406938, 1639548940),
(7, 1, 1, 1, '', '', '<p>Himpunan penyelesaian dari sistem persamaan y = 2x, 6x – y = 8 adalah</p>', '<p>{2,6}</p>', '<p>{2,8}</p>', '<p>{2,4}</p>', '<p>{2,7}</p>', '<p>{2,9}</p>', '', '', '', '', '', 'D', 1639462060, 1639462060);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `m_mapelId` varchar(30) NOT NULL,
  `tgl_tugas` datetime DEFAULT NULL,
  `dokumen_tugas` varchar(240) DEFAULT NULL,
  `tgs_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `deskripsi_tugas`, `m_mapelId`, `tgl_tugas`, `dokumen_tugas`, `tgs_active`) VALUES
(1, 'Matematika Dasar', 'asdsadadsa', 'MTK12210001', '2022-01-10 09:51:56', 'SISTEMATIKA_PROPOSAL.pdf', 1),
(2, 'Belajar Matematika Dasar', 'Tolong dipelajari minggu depan ulangan !...', 'MTK12210001', '2021-12-23 12:57:17', '10_1_1_119_93622.pdf', 1),
(3, 'Belajar Algoritma', 'Belajar seru kok....', 'MTK12210002', '2022-01-11 09:53:24', 'Pertemuan_10-14_(suplemen)_Made_PA.pdf', 1),
(4, 'asdadsad', 'asdsadad', 'MTK12210002', '2022-01-01 09:53:27', '7106507485_TL-WN722N(EU)(US)_V3_QIG.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `deskripsi_hasil` text NOT NULL,
  `dokumen_hasil` varchar(200) DEFAULT NULL,
  `waktu_pengumpulan` int(11) NOT NULL,
  `status_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_siswa`
--

INSERT INTO `tugas_siswa` (`id`, `tugas_id`, `nisn`, `deskripsi_hasil`, `dokumen_hasil`, `waktu_pengumpulan`, `status_tugas`) VALUES
(1, 1, 85226812, '<p>Semoga Bener</p>\r\n', 'LEMBAR_PERSETUJUAN_PROPOSAL_INSTANSI2.docx', 1640314070, 1),
(3, 1, 70728012, '<p>semangat</p>\r\n', 'Test_2_707280121.pdf', 1640320046, 1),
(4, 2, 70728012, '<p>100 pak</p>\r\n', 'tes2.pdf', 1640320156, 1),
(5, 2, 85226812, '<p>Harus Bisa</p>\r\n', 'sdh_tt2.docx', 1640321192, 1),
(6, 3, 85226812, '<p>Aku bisa</p>\r\n', 'sdh_tt3.docx', 1640574380, 1),
(7, 3, 70728012, '<p>hjgjhgjhgj</p>\r\n', 'tes3.pdf', 1640670395, 1),
(8, 4, 70728012, '<p>kjahsdkjhakjdhkah</p>\r\n', 'Test_2_70728012_2.pdf', 1640670437, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kelas_id` int(2) DEFAULT NULL,
  `wali_kelas` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nisn`, `email`, `alamat`, `kelas_id`, `wali_kelas`, `telephone`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'asdadadada', '1238971289237198', 'bagus@gmail.com', '', 0, '0', '', 'default.jpg', '$2y$10$uoszfUMKfaqjS4LbDs57pOdjmt5pYTUfbf1Uw7EeZGNop8GKZaZvq', 1, 1, 1636981735),
(2, 'Yusuf', '70728012', 'yusuf@gmail.com', 'Desa Gembong,Pati', 2, '1', '71283173', '3.jpg', '$2y$10$d0FJaAZY5mN2WI9aleupIOtS9vJQe3NifVQdDb9COpTgpqRba7MA6', 3, 1, 1637029202),
(3, 'Rikzi Okta Maulana', '98230819308', 'rizki@gmail.com', '<p>Gedonganak, Ungaran Timur, Kabupaten Semarang<br></p>', 2, '', '08518746490', '711.jpg', '$2y$10$jLnH/liDqQ7r4sXRUjvRfuu.Z1L.q4niONjEl1Eu1/k.LywbRFlA.', 2, 1, 1638158773),
(4, 'Graha Didan', '085226812', 'grahadidan@gmail.com', '', 2, '1', '', 'default.jpg', '$2y$10$nQAbsscFH7amiHvbBAXQ3.2qEdv5NYJQhK3oS5RAhLahYGiqR0Ste', 3, 1, 1638416038),
(5, 'Uzumaki Didan', '091238190', 'rasenggan@gmail.com', '', 3, '', '', 'default.jpg', '$2y$10$aXorRvQxc7273yl2Uoy5B.6CfLr2kgM1ROpRdiCkvys5qjYQ42z6C', 2, 1, 1638856776),
(6, 'Bagus', '0129783901', 'bagusakbar@gmail.com', '', 2, '1', '', 'default.jpg', '$2y$10$KO5RARJi8KqCQj2z9vPMa.2fdf/g4VN1zO34NGl8pw9WIIzesHom6', 3, 1, 1640691916);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(2, 2, 7),
(4, 1, 3),
(5, 1, 4),
(6, 1, 1),
(8, 1, 8),
(10, 1, 10),
(11, 1, 5),
(13, 1, 2),
(17, 2, 11),
(18, 2, 12),
(19, 2, 13),
(20, 3, 14),
(21, 2, 9),
(22, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Tools'),
(4, 'Menu'),
(5, 'Kelas dan MataPelajaran'),
(6, 'Ruang Belajar'),
(9, 'Guru'),
(10, 'Relasi'),
(11, 'MataPelajaran'),
(13, 'Ujian'),
(14, 'Kelas'),
(15, 'Alat Praktikum');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Website/guru', 'fas fa-fw fa-laptop', 1),
(2, 6, 'Halaman Utama', 'Website', 'fas fa-fw fa-pencil-ruler', 1),
(4, 7, 'Ujian Online', 'Ujian', 'fas fa-fw fa-file-signature', 1),
(6, 4, 'Menu Management', 'Menu', 'fas fa-fw fa-tag', 1),
(7, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-tags', 1),
(11, 3, 'Kajian Nikah', 'Yusuf', 'fab fa-android', 1),
(12, 2, 'Role', 'User', 'fas fa-fw fa-users-cog', 1),
(13, 14, 'Halaman Belajar', 'Kelas', 'fas fa-chalkboard-teacher', 1),
(14, 10, 'MataPelajaran-Kelas', 'relasi', 'fas fa-fw fa-link', 1),
(15, 5, 'Data kelas', 'kelas', 'fab fa-fw fa-accusoft', 1),
(16, 5, 'Data MataPelajaran', 'mapel/v_mapel', 'fas fa-book-open', 1),
(17, 2, 'User level', 'user/view_user', 'fas fa-fw fa-user-shield', 1),
(18, 11, 'Upload Materi Pelajaran', 'Mapel', 'fas fa-fw fa-book', 1),
(19, 9, 'Kelas Online', 'Guru', 'fas fa-fw fa-book-reader', 1),
(20, 13, 'Bank Soal', 'Soal', 'fas fa-fw fa-file-alt', 1),
(21, 13, 'Ujian Online', 'Ujian/master', 'fas fa-fw fa-cubes', 1),
(22, 13, 'Hasil Ujian', 'Hasilujian', 'fas fa-file-contract', 1),
(23, 15, 'Alat Praktikum', 'praktikum', 'fas fa-fw fa-toolbox', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_id` (`absen_id`);

--
-- Indexes for table `alat_praktikum`
--
ALTER TABLE `alat_praktikum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matpel_id` (`matpel_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `email` (`emails`),
  ADD KEY `email_2` (`emails`),
  ADD KEY `matpel_id` (`matpel_id`);

--
-- Indexes for table `h_ujian`
--
ALTER TABLE `h_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujian_id` (`ujian_id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `dosen_id` (`guru_id`);

--
-- Indexes for table `kelas_matpel`
--
ALTER TABLE `kelas_matpel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `matpel_id` (`matpel_id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `m_mapel`
--
ALTER TABLE `m_mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_m_mapel` (`id_m_mapel`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `m_ujian`
--
ALTER TABLE `m_ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `matkul_id` (`matpel_id`);

--
-- Indexes for table `tb_pinjam_alat`
--
ALTER TABLE `tb_pinjam_alat`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `alat_id` (`alat_id`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `matpel_id` (`matpel_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `tugas_id` (`tugas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `wali_kelas` (`wali_kelas`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `alat_praktikum`
--
ALTER TABLE `alat_praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `h_ujian`
--
ALTER TABLE `h_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas_guru`
--
ALTER TABLE `kelas_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_matpel`
--
ALTER TABLE `kelas_matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `m_mapel`
--
ALTER TABLE `m_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_ujian`
--
ALTER TABLE `m_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pinjam_alat`
--
ALTER TABLE `tb_pinjam_alat`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
