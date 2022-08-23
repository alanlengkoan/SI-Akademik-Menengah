-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2022 at 01:16 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_akademik_menengah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_materi`, `id_siswa`, `waktu`) VALUES
(1, 70938415, 69401572, '2021-05-25 18:30:25'),
(2, 19103586, 17310428, '2021-07-14 15:53:24'),
(3, 36729350, 53785190, '2021-07-14 16:01:35'),
(4, 19103586, 94792038, '2021-07-14 17:17:51'),
(5, 30235496, 31653482, '2021-07-15 23:17:35'),
(6, 32563074, 94792038, '2021-07-16 08:50:25'),
(7, 83608197, 94792038, '2021-07-16 08:56:45'),
(8, 57908645, 28943201, '2021-09-03 20:49:53'),
(9, 36915042, 81325809, '2021-09-04 13:23:02'),
(10, 66180249, 81325809, '2021-09-04 14:18:33'),
(11, 72461375, 16728350, '2021-09-04 14:19:35'),
(12, 74859673, 16728350, '2021-09-05 08:09:09'),
(13, 21950746, 40429375, '2021-09-09 20:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `level` enum('guru','siswa') NOT NULL,
  `pesan` longtext NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `id_materi`, `id_users`, `level`, `pesan`, `date_send`) VALUES
(13516879, 36915042, 47438621, 'guru', 'adsasdawd', '2021-09-04 06:13:49'),
(19346721, 21950746, 82031756, 'guru', '<a href=\"http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746\" target=\"_blank\">http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746</a> <a href=\"asdas\" target=\"_blank\">asdas</a>', '2021-09-09 11:51:31'),
(23814625, 74859673, 47438621, 'guru', 'asas', '2021-09-04 23:56:27'),
(42905438, 36915042, 47438621, 'guru', 'asdasdasd <a href=\"https://stackoverflow.com/\" target=\"_blank\">https://stackoverflow.com/</a>', '2021-09-04 06:10:48'),
(44205963, 21950746, 40429375, 'siswa', '<a href=\"http://localhost/si/SI-Akademik-Menengah/public/uploads/file/0d9eb12a96c7ca649e3ee1071b315417.pdf\" target=\"_blank\">0d9eb12a96c7ca649e3ee1071b315417.pdf</a>', '2021-09-09 12:50:06'),
(44673812, 21950746, 82031756, 'guru', '<a href=\"http://localhost/si/SI-Akademik-Menengah/public/uploads/file/cb0c4dcbd889d2cbf5d3d614a34a78a1.pdf\" target=\"_blank\">cb0c4dcbd889d2cbf5d3d614a34a78a1.pdf</a>', '2021-09-09 12:38:41'),
(46714859, 74859673, 47438621, 'guru', 'sdasd <a href=\"http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/74859673\" target=\"_blank\">http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/74859673</a>', '2021-09-04 23:57:58'),
(48637594, 36915042, 81325809, 'siswa', 'asdasdasd <a href=\"https://stackoverflow.com/\" target=\"_blank\">https://stackoverflow.com/</a>', '2021-09-04 06:14:50'),
(54165902, 36915042, 47438621, 'guru', 'asdasd <a href=\"https://stackoverflow.com/\" target=\"_blank\">https://stackoverflow.com/</a> <a href=\"https://stackoverflow.com/\" target=\"_blank\">https://stackoverflow.com/</a> <a href=\"https://stackoverflow.com/\" target=\"_blank\">https://stackoverflow.com/</a>', '2021-09-04 06:10:55'),
(65943721, 21950746, 82031756, 'guru', '<a href=\"http://localhost/si/SI-Akademik-Menengah/public/uploads/file/8cf5c27a572d6b09161bb18ad2edd6d6.pdf\">8cf5c27a572d6b09161bb18ad2edd6d6.pdf</a>', '2021-09-09 12:35:57'),
(70819563, 74859673, 47438621, 'guru', 'adsad', '2021-09-04 23:57:51'),
(84187025, 21950746, 82031756, 'guru', '<a href=\"http://localhost/si/SI-Akademik-Menengah/public/uploads/file/e81bafc4d8215d0a3360a168563e9c06.pdf\">e81bafc4d8215d0a3360a168563e9c06.pdf</a>', '2021-09-09 12:37:26'),
(87281946, 21950746, 40429375, 'siswa', 'asdasd', '2021-09-09 12:50:00'),
(90638945, 36915042, 47438621, 'guru', 'asdasdasd', '2021-09-04 06:11:04'),
(95713042, 21950746, 82031756, 'guru', 'asd <a href=\"http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746\" target=\"_blank\">http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746</a>', '2021-09-09 11:51:47'),
(97108639, 74859673, 47438621, 'guru', 'asas', '2021-09-04 23:56:49'),
(97502384, 21950746, 82031756, 'guru', 'asdasd <a href=\"http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746\" target=\"_blank\">http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746</a> <a href=\"asdasdsa\" target=\"_blank\">asdasdsa</a> <a href=\"http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746\" target=\"_blank\">http://localhost/si/SI-Akademik-Menengah/guru/materi/detail/21950746</a>', '2021-09-09 11:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jen_kel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(200) NOT NULL,
  `thn_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `agama`, `jen_kel`, `alamat`, `pendidikan`, `thn_masuk`) VALUES
(10561723, '-', 'YUNUS U', 'Kristen', 'L', 'OSANGO', 's1', 2018),
(13617802, '-', 'ALFRIDA', 'Kristen', 'P', 'LOKO', 's1', 2018),
(16091753, '-', 'SERLI', 'Kristen', 'L', 'MAMASA', 's1', 2019),
(18563714, '-', 'KORMELI, S.Th', 'Kristen', 'L', 'MAMASA', 's1', 2015),
(24159203, '-', 'Dra. ARRANG B.', 'Kristen', 'P', 'TAWALIAN', 's1', 2010),
(33274168, '-', 'YATIMINA MANA\'O', 'Kristen', 'P', 'RANTE KATOAN', 's1', 2018),
(36895742, '-', 'HERMIN, S.Th', 'Kristen', 'P', 'MASKO', 's1', 2015),
(38260573, '-', 'Pdt. ARIS D. RIMBE, M.Th', 'Kristen', 'L', 'TATOA', 's2', 2010),
(41250473, '-', 'EKA LESTARI', 'Kristen', 'P', 'OSANGO', 's1', 2018),
(43509614, '-', 'JHON DIAN PURNAMA', 'Kristen', 'L', 'MAMASA', 's1', 2018),
(45628439, '-', 'YUSTITA, S.Pd', 'Kristen', 'P', 'OSANGO', 's1', 2019),
(47438621, '-', 'AFRIANDI LEMBA\'', 'Kristen', 'L', 'OSANGO', 's1', 2018),
(50186354, '-', 'EFLIN ABANG, S.Th', 'Kristen', 'P', 'TATOA', 's1', 2015),
(50412867, '-', 'ROSALINA', 'Kristen', 'P', 'KAMPUNG BARU', 's1', 2017),
(54639072, '-', 'ARLIN, S.Pd', 'Kristen', 'P', 'MAKAU', 's1', 2015),
(60286793, '-', 'ASMEDI, S.Ip', 'Kristen', 'L', 'OSANGO', 's1', 2017),
(62369084, '-', 'MARTINUS PAOTONAN, S.Pd', 'Kristen', 'L', 'MAMASA', 's1', 2018),
(66435128, '-', 'NURMALASARI, S.Pd', 'Kristen', 'P', 'MAMASA', 's1', 2019),
(67461325, '-', 'YANSENS, S.Th', 'Kristen', 'L', 'MAMASA', 's1', 2018),
(68316902, '-', 'HERBA YULINDA S.Pd.K', 'Kristen', 'L', 'BAMBA BUNTU', 's1', 2015),
(72741958, '-', 'DEWISUSANTY, S.Pd', 'Kristen', 'P', 'RANDANAN', 's1', 2017),
(73246501, '-', 'WIDIA NOVITA, S.Pd', 'Kristen', 'P', 'RANDANAN', 's1', 2017),
(74723195, '-', 'ASRIANI RAMPOLA\'BI\',S.Pd', 'Kristen', 'P', 'MASKO', 's1', 2015),
(75467821, '-', 'Pdt. ANILA, S.Th', 'Kristen', 'P', 'mamasa', 's1', 2018),
(76938425, '-', 'KALEB NAJOAN', 'Kristen', 'L', 'TATOA', 's1', 2017),
(76987104, '-', 'TANDEDIKA, ST.h, M.Pd.K', 'Kristen', 'P', 'mamasa', 's2', 2010),
(77831096, '-', 'ASRIANTO', 'Kristen', 'L', 'RANDANAN', 's1', 2017),
(82031756, '-', 'SIMSON D,S.Th', 'Kristen', 'L', 'OSANGO', 's1', 2019),
(89364728, '-', 'ALDIAN TOAR NAJOAN,S.Tp', 'Kristen', 'L', 'TATOA', 's1', 2018),
(90478965, '-', 'ANI YUSMIRIAN, S.Pd', 'Kristen', 'P', 'MAMASA', 's1', 2018),
(92614083, '-', 'FITRI D', 'Kristen', 'P', 'RANDANAN', 's1', 2019),
(94576921, '-', 'SELI JUAN SARI', 'Kristen', 'P', 'MASKO', 's1', 2018),
(99248703, '-', 'SURIADY BONGGA LOTONG', 'Kristen', 'L', 'KAMPUNG BARU', 's1', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tugas`
--

CREATE TABLE `hasil_tugas` (
  `id_hasil_tugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_tugas`
--

INSERT INTO `hasil_tugas` (`id_hasil_tugas`, `id_tugas`, `id_siswa`, `jawaban`, `nilai`) VALUES
(21807365, 89213587, 16728350, 'bf9c93b789baadd5777d39c889060677.pdf', 100),
(33052978, 89213587, 69401572, 'c47cbafa814f857832b1d28f9330b13d.docx', 80),
(46387045, 89213587, 29476351, '9eb44c7734968b9d483a1773a75eac60.docx', 100),
(47024569, 53614790, 29476351, 'b2a37892d0c356f2115ab1c8289176ae.pdf', 100),
(68957231, 53614790, 16728350, '446ad062798727fefc1549315048d7c9.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `id_hasil_ujian` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`id_hasil_ujian`, `id_ujian`, `id_siswa`, `jawaban`, `nilai`) VALUES
(13916508, 72875063, 16728350, '1', NULL),
(19052143, 75973401, 29476351, '4', NULL),
(21675432, 10783469, 29476351, '1', NULL),
(22648357, 92054863, 98960437, '4', NULL),
(23201654, 92054863, 78036714, '2', NULL),
(25849273, 10783469, 69401572, '1', NULL),
(27960218, 25840792, 98960437, '3', NULL),
(29842106, 92054863, 17310428, '3', NULL),
(30239617, 84956201, 94792038, '3', NULL),
(33250761, 26348795, 94792038, '3', NULL),
(41284695, 75726184, 16728350, '1', NULL),
(42351846, 25840792, 78036714, '1', NULL),
(42638095, 52516973, 29476351, '2', NULL),
(42640738, 26348795, 37209163, '3', NULL),
(44285613, 92054863, 24071869, '3', NULL),
(44608391, 26348795, 24071869, '3', NULL),
(44908375, 26348795, 98960437, '3', NULL),
(44980351, 84956201, 17310428, '5', NULL),
(51738920, 84956201, 98960437, '5', NULL),
(52563891, 25840792, 94792038, '3', NULL),
(52746890, 39503874, 78036714, '4', NULL),
(53908574, 25840792, 37209163, '1', NULL),
(55097186, 10783469, 16728350, '1', NULL),
(59084623, 39503874, 37209163, '2', NULL),
(59174632, 75973401, 16728350, '1', NULL),
(60426873, 75726184, 29476351, '3', NULL),
(67485293, 52516973, 16728350, '3', NULL),
(68791420, 39503874, 17310428, '4', NULL),
(69523417, 25840792, 24071869, '3', NULL),
(69701258, 39503874, 24071869, '4', NULL),
(73018492, 39503874, 94792038, '4', NULL),
(75167243, 75726184, 69401572, '1', NULL),
(79730458, 84956201, 37209163, '1', NULL),
(84512867, 72875063, 29476351, '3', NULL),
(84976281, 26348795, 17310428, '3', NULL),
(85732961, 52516973, 69401572, '3', NULL),
(85802431, 26348795, 78036714, '3', NULL),
(86138059, 84956201, 78036714, '3', NULL),
(88325417, 72875063, 69401572, '1', NULL),
(91659342, 75973401, 69401572, '2', NULL),
(93042617, 25840792, 17310428, '3', NULL),
(94583967, 92054863, 37209163, '2', NULL),
(97892501, 92054863, 94792038, '2', NULL),
(97946350, 84956201, 24071869, '5', NULL),
(98347560, 39503874, 98960437, '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_penugasan_guru` int(11) NOT NULL,
  `hari` int(2) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_penugasan_guru`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(12836074, 87429380, 3, '11:45:00', '13:45:00'),
(12945718, 28769305, 4, '11:05:00', '12:25:00'),
(14916237, 20834615, 3, '11:05:00', '12:25:00'),
(14917302, 58769420, 5, '07:30:00', '08:50:00'),
(15207936, 36082174, 3, '09:30:00', '10:50:00'),
(16170849, 42360594, 5, '10:10:00', '11:45:00'),
(16952841, 54732608, 2, '12:25:00', '13:50:00'),
(18167025, 16872504, 2, '11:45:00', '13:50:00'),
(19701524, 14357102, 6, '11:05:00', '12:25:00'),
(20981356, 29384065, 2, '08:50:00', '10:10:00'),
(22703614, 97865341, 3, '10:10:00', '11:45:00'),
(23249780, 79160472, 4, '10:10:00', '11:45:00'),
(23405917, 75641089, 4, '07:30:00', '08:50:00'),
(23967124, 99504817, 4, '12:25:00', '13:45:00'),
(24719085, 34716520, 3, '12:25:00', '13:45:00'),
(26478295, 90182753, 4, '12:25:00', '13:45:00'),
(27921506, 37018395, 5, '07:30:00', '09:30:00'),
(27942310, 22361849, 4, '12:25:00', '13:45:00'),
(28709251, 72198364, 7, '09:30:00', '11:45:00'),
(30892763, 35267384, 7, '11:45:00', '12:25:00'),
(32071458, 73526897, 7, '08:50:00', '10:50:00'),
(32086549, 12037864, 3, '12:25:00', '13:45:00'),
(34681792, 62395670, 2, '08:50:00', '10:50:00'),
(34752386, 12158693, 4, '17:05:00', '19:25:00'),
(37254389, 58276513, 4, '11:05:00', '12:25:00'),
(38657934, 22763049, 3, '07:30:00', '09:30:00'),
(39354607, 94365127, 6, '22:00:00', '23:59:00'),
(41357026, 35267384, 3, '07:30:00', '09:30:00'),
(45024796, 22607134, 6, '08:10:00', '09:30:00'),
(45096723, 99260834, 7, '07:30:00', '08:10:00'),
(45140863, 80274965, 4, '09:30:00', '10:50:00'),
(46359478, 54302895, 7, '09:30:00', '10:50:00'),
(46801927, 53427601, 4, '11:05:00', '12:25:00'),
(49382165, 92169873, 7, '08:10:00', '09:30:00'),
(51389764, 81069428, 2, '10:10:00', '12:25:00'),
(54023795, 91045928, 4, '07:30:00', '08:50:00'),
(55347086, 52175390, 4, '16:00:00', '18:00:00'),
(55416398, 35843712, 2, '12:25:00', '13:50:00'),
(55864321, 53750894, 5, '08:50:00', '10:10:00'),
(57435092, 65062714, 5, '07:30:00', '08:50:00'),
(57486325, 70386547, 4, '08:50:00', '10:50:00'),
(58314097, 32904156, 7, '11:05:00', '12:25:00'),
(58450362, 51573698, 2, '11:05:00', '12:25:00'),
(59451032, 75768912, 6, '08:10:00', '09:30:00'),
(60198532, 98697032, 6, '09:30:00', '10:50:00'),
(63178502, 44967513, 3, '07:30:00', '08:50:00'),
(63726408, 12567109, 3, '11:45:00', '13:45:00'),
(64039518, 84657210, 3, '09:30:00', '11:45:00'),
(64569083, 17468059, 2, '12:25:00', '13:50:00'),
(64879130, 83902657, 5, '08:50:00', '10:50:00'),
(66432710, 73601798, 2, '08:50:00', '10:10:00'),
(68017563, 67896012, 6, '09:30:00', '10:50:00'),
(68507369, 72983651, 5, '08:50:00', '10:10:00'),
(69137806, 39370516, 4, '08:50:00', '10:10:00'),
(69275103, 67842306, 4, '08:50:00', '10:50:00'),
(69607425, 83902657, 7, '08:50:00', '09:30:00'),
(71206487, 44510967, 5, '10:10:00', '11:45:00'),
(71258069, 83685410, 5, '11:45:00', '13:05:00'),
(71906742, 57821354, 2, '10:10:00', '12:25:00'),
(73208146, 34716520, 2, '10:10:00', '11:45:00'),
(74207598, 16872504, 3, '11:45:00', '12:25:00'),
(74706195, 76495731, 3, '09:30:00', '11:45:00'),
(74950381, 10762894, 4, '07:30:00', '09:30:00'),
(75287196, 57230981, 3, '07:30:00', '08:50:00'),
(75698013, 71304287, 5, '09:30:00', '11:45:00'),
(78051697, 30713492, 4, '16:00:00', '18:00:00'),
(82798163, 91045928, 3, '08:50:00', '10:10:00'),
(83218460, 52546037, 7, '11:05:00', '12:25:00'),
(83697514, 82768459, 4, '07:30:00', '08:50:00'),
(84035918, 70439617, 2, '08:50:00', '10:10:00'),
(84078329, 36712034, 6, '11:05:00', '12:25:00'),
(84519026, 17483206, 6, '09:30:00', '10:50:00'),
(84768532, 65216307, 4, '11:45:00', '13:45:00'),
(88694051, 85371680, 5, '18:45:00', '22:05:00'),
(89162348, 49564082, 7, '08:50:00', '10:10:00'),
(89263017, 85814069, 7, '07:30:00', '08:50:00'),
(90649187, 25096382, 7, '07:30:00', '08:50:00'),
(90814259, 45406982, 5, '11:45:00', '13:05:00'),
(93019728, 36392058, 6, '11:05:00', '12:25:00'),
(93528719, 62395670, 7, '10:10:00', '10:50:00'),
(94059267, 44081932, 7, '16:30:00', '17:30:00'),
(97461028, 99814365, 6, '09:00:00', '11:00:00'),
(98257493, 28769305, 7, '11:05:00', '12:25:00'),
(98351279, 72834791, 5, '07:30:00', '08:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`) VALUES
(21386475, 'XI'),
(30637192, 'XA'),
(77941563, 'XB'),
(91423650, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`) VALUES
(12437095, 'SEJARAH GEREJA'),
(14751082, 'HOMILETIKA'),
(27132065, 'MISIOLOGI'),
(35091347, 'HERMENEUTIKA'),
(43624510, 'SENI BUDAYA'),
(43728951, 'MATEMATIKA'),
(55736410, 'PJOK'),
(56718403, 'ILMU PENGETAHUAN ALKITAB'),
(57352986, 'BAHASA INGGRIS'),
(58712960, 'PKN'),
(63147802, 'IPA'),
(65083429, 'PRAKARYA/K.USAHA'),
(69825473, 'PAK DAN BUDI PEKERTI'),
(72365870, 'ETIKA KRISTEN'),
(78174526, 'IPS'),
(88432107, 'MUSIK GEREJA'),
(88607953, 'BAHASA INDONESIA'),
(89504827, 'DOGMATIKA'),
(90728931, 'DOGMATIKA'),
(97512689, 'SEJARAH INDONESIA');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_penugasan_guru` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pertemuan` varchar(50) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `status_materi` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_penugasan_guru`, `judul`, `pertemuan`, `status`, `status_materi`) VALUES
(10518372, 73526897, 'Bab 1 Induksi Matematika', NULL, '1', '1'),
(10579612, 65216307, 'Bab 1 Menyusun Prosedur', NULL, '1', '1'),
(10785436, 94365127, 'xxx', NULL, '1', '1'),
(11079846, 32904156, 'Bab 1 Kasus-kasus Pelanggaran Hak dan Pengingkaran', NULL, '1', '1'),
(12941067, 12158693, 'asasaas', NULL, '1', '1'),
(15480716, 36082174, 'Pengertian Homiletika', NULL, '1', '1'),
(19103586, 99814365, 'Bab 4 Senam Lantai', NULL, '1', '1'),
(20195768, 44081932, 'Bab 1 Harmonisasi Hak dan Kewajiban', NULL, '1', '1'),
(21950746, 85371680, 'Misi dalam Perjanjian Lama dan Perjanjian Baru', 'Pertemuan 2', '1', '1'),
(22650378, 34716520, 'Budi Pekerti', NULL, '1', '1'),
(27406581, 71304287, 'Chapter 1 Talking About Self', NULL, '1', '1'),
(28201356, 67842306, 'bab 1 memperkenalkan diri dan orang lain', NULL, '1', '1'),
(28956132, 37018395, 'BAB 1 Membuat Surat Lamaran Pekerjaan', NULL, '1', '1'),
(32563074, 99814365, 'Bab 1 Keterampilan Permainan dan Olahraga Beregu', NULL, '1', '1'),
(33690472, 85814069, 'Tafsiran', NULL, '1', '1'),
(35794136, 36712034, 'Bab 1 Nila-nilai Pancasila dalam Kerangka Praktik ', NULL, '1', '1'),
(36729350, 94365127, 'Bab 2 Keterampilan Olahraga Perorangan', NULL, '1', '1'),
(36915042, 30713492, 'jhjh', NULL, '1', '1'),
(37541923, 12158693, 'qqq', NULL, '1', '1'),
(39065312, 99260834, 'bertumbuh dan semakin berhikmat', NULL, '1', '1'),
(47491085, 81069428, 'linear tiga variabel', NULL, '1', '1'),
(47658390, 75641089, 'Alat bantu Hermeneutika', NULL, '1', '1'),
(48076421, 22763049, 'Chapter 1 Talking About Self', NULL, '1', '1'),
(51329746, 12158693, 'Pelajaran 1 Menganalisis, Merancang, dan Mengevalu', NULL, '1', '1'),
(51763528, 79160472, 'Buku Pengantar Alkitab', NULL, '1', '1'),
(57908645, 12567109, 'Chapter 1 Les\'s Visit Seattle', NULL, '1', '1'),
(64207635, 52175390, 'BAB 3 Memahami Isu Terkini Lewat Editorial', NULL, '1', '1'),
(64973815, 94365127, 'bahasa baku', NULL, '1', '1'),
(65623894, 75641089, 'Pengertian Homiletika', NULL, '1', '1'),
(66180249, 30713492, 'Bab 1 Menganalisis Keterampilan Gerak Permainan Bo', NULL, '1', '1'),
(70548213, 30713492, 'sadasd', NULL, '1', '1'),
(70938415, 52175390, 'membuat surat lamaran', NULL, '1', '1'),
(71305946, 99260834, 'PENTINGNYA PENDIDIKAN ETIKA KRISTEN', NULL, '1', '1'),
(72461375, 12158693, 'asdas', NULL, '1', '1'),
(74859673, 12158693, 'asd', 'pertemuan 2', '1', '0'),
(77321496, 36392058, 'Bab 1 Nila-nilai Pancasila dalam Kerangka Praktik ', NULL, '1', '1'),
(79254013, 44510967, 'Tujuan Berkhotbah', NULL, '1', '1'),
(80635741, 12158693, 'adsasd', 'pertemuan 1', '1', '1'),
(81403957, 76495731, 'Chapter 1 Can Greed Ever be Satisfied', NULL, '1', '1'),
(82718650, 30713492, 'asdad', NULL, '1', '1'),
(83608197, 99814365, 'Bab 3 latihan dan Pengukuran Kebugaran Jasmani', NULL, '1', '1'),
(94379625, 20834615, 'Alat bantu Hermeneutika', NULL, '1', '1'),
(94653071, 52175390, 'BAB 2 Menikmati Cerita Sejarah Indonesia', NULL, '1', '0'),
(95674902, 44967513, 'dasar teologi khotbah', NULL, '1', '1'),
(95794162, 83685410, 'Alat bantu Hermeneutika', NULL, '1', '1'),
(95891276, 34716520, 'Etika_Kristen_dalam_Pendidikan_Karakter_dan_Moral_', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `materi_detail`
--

CREATE TABLE `materi_detail` (
  `id_materi_detail` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `tipe` enum('pdf','mp4') DEFAULT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_detail`
--

INSERT INTO `materi_detail` (`id_materi_detail`, `id_materi`, `tipe`, `file`) VALUES
(10439125, 74859673, 'mp4', 'ac15778cec72fd12801779ea203eb825.mp4'),
(17643092, 74859673, 'pdf', '66a760d16170847b5342729a61942c89.pdf'),
(27395146, 12941067, 'pdf', 'a2a8d6dd49069be4b4eca9c5d7cc8d22.pdf'),
(31789246, 12941067, 'pdf', '05f2bb0d4ec63330aca2266563c95bad.pdf'),
(33274195, 12941067, 'pdf', 'eef2e96e3365d01a04af2a35e0331bf1.pdf'),
(46234058, 74859673, 'pdf', '487f418819a36a0a70a7b1c9d5c35c67.pdf'),
(48914263, 70548213, 'pdf', '4c37b0e675cdcda0575295708b603536.pdf'),
(71753429, 70548213, 'pdf', 'af53af743af982e18f4b2ef8043c382d.pdf'),
(73896042, 72461375, 'pdf', '98d61853e2418d5034a877fc08b16d05.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `role` text,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `gambar`, `status`, `role`, `tgl_post`) VALUES
(50532417, 'penerimaan siswa baru', 'penerimaan siswa baru', 'b2f3923cccd0dbc6cbd41153a4dbfbb1.jpg', '1', 'guru,siswa', '2021-04-26 23:57:36'),
(56742593, 'kalender pendidikan', '-', 'b5b2462ba94217a6ec0632ee47880b27.jpg', '1', 'guru,siswa', '2021-04-24 06:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan_guru`
--

CREATE TABLE `penugasan_guru` (
  `id_penugasan_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penugasan_guru`
--

INSERT INTO `penugasan_guru` (`id_penugasan_guru`, `id_kelas`, `id_guru`, `id_mapel`) VALUES
(10762894, 30637192, 67461325, 12437095),
(12037864, 30637192, 41250473, 65083429),
(12158693, 91423650, 47438621, 55736410),
(12567109, 91423650, 74723195, 57352986),
(14357102, 21386475, 62369084, 43624510),
(16872504, 21386475, 76987104, 56718403),
(17468059, 30637192, 33274168, 69825473),
(17483206, 77941563, 62369084, 43624510),
(20834615, 30637192, 10561723, 35091347),
(22361849, 77941563, 72741958, 78174526),
(22607134, 91423650, 62369084, 43624510),
(22763049, 77941563, 45628439, 57352986),
(25096382, 77941563, 16091753, 90728931),
(28769305, 77941563, 82031756, 72365870),
(29384065, 30637192, 82031756, 27132065),
(30713492, 21386475, 47438621, 55736410),
(32904156, 91423650, 13617802, 58712960),
(34716520, 21386475, 82031756, 72365870),
(35267384, 30637192, 76987104, 56718403),
(35843712, 91423650, 82031756, 27132065),
(36082174, 30637192, 10561723, 14751082),
(36392058, 30637192, 13617802, 58712960),
(36712034, 77941563, 13617802, 58712960),
(37018395, 30637192, 82031756, 88607953),
(39370516, 21386475, 41250473, 65083429),
(42360594, 77941563, 72741958, 63147802),
(44081932, 21386475, 13617802, 58712960),
(44510967, 21386475, 10561723, 14751082),
(44967513, 91423650, 10561723, 14751082),
(45406982, 30637192, 72741958, 63147802),
(49564082, 77941563, 76938425, 88432107),
(51573698, 77941563, 41250473, 65083429),
(52175390, 91423650, 66435128, 88607953),
(52546037, 21386475, 16091753, 90728931),
(53427601, 30637192, 16091753, 90728931),
(53750894, 77941563, 67461325, 97512689),
(54302895, 91423650, 33274168, 69825473),
(54732608, 77941563, 33274168, 69825473),
(57230981, 21386475, 67461325, 12437095),
(57821354, 91423650, 67461325, 12437095),
(58276513, 91423650, 72741958, 78174526),
(58769420, 91423650, 72741958, 63147802),
(62395670, 77941563, 76987104, 56718403),
(65062714, 77941563, 82031756, 27132065),
(65216307, 21386475, 66435128, 88607953),
(67842306, 77941563, 66435128, 88607953),
(67896012, 91423650, 76938425, 88432107),
(70386547, 91423650, 77831096, 43728951),
(70439617, 91423650, 41250473, 65083429),
(71304287, 30637192, 45628439, 57352986),
(72198364, 30637192, 77831096, 43728951),
(72834791, 21386475, 67461325, 97512689),
(72983651, 21386475, 72741958, 63147802),
(73526897, 21386475, 77831096, 43728951),
(73601798, 21386475, 18563714, 69825473),
(75641089, 77941563, 10561723, 14751082),
(75768912, 21386475, 76938425, 88432107),
(76495731, 21386475, 74723195, 57352986),
(79160472, 21386475, 10561723, 35091347),
(80274965, 30637192, 72741958, 78174526),
(81069428, 30637192, 82031756, 43728951),
(82768459, 21386475, 72741958, 78174526),
(83685410, 77941563, 10561723, 35091347),
(83902657, 91423650, 76987104, 56718403),
(84657210, 77941563, 77831096, 43728951),
(85371680, 21386475, 82031756, 27132065),
(85814069, 91423650, 10561723, 35091347),
(87429380, 77941563, 67461325, 12437095),
(90182753, 91423650, 16091753, 89504827),
(91045928, 91423650, 82031756, 72365870),
(92169873, 30637192, 76938425, 88432107),
(94365127, 77941563, 47438621, 55736410),
(97865341, 91423650, 67461325, 97512689),
(98697032, 30637192, 62369084, 43624510),
(99260834, 30637192, 82031756, 72365870),
(99504817, 30637192, 75467821, 97512689),
(99814365, 30637192, 47438621, 55736410);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tmp_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ortu_wali` varchar(200) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jen_kel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `thn_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nis`, `nama`, `tmp_lahir`, `tgl_lahir`, `ortu_wali`, `agama`, `jen_kel`, `alamat`, `thn_masuk`) VALUES
(11374592, 77941563, '20039', 'ROSDIANA BUNGAN', 'tabang', '2003-10-08', 'Arianto', 'Kristen', 'L', 'MASKO', 2020),
(12795384, 91423650, '18024', 'ROKISTEN LUMIKA', 'tabang', '2001-05-09', 'Santo Kalua', 'Kristen', 'L', 'MASKO', 2018),
(12815647, 30637192, '20008', 'JUNIATI LANGI BAMBA', 'tabang', '2003-08-29', 'siswanto ', 'Kristen', 'L', 'MAMASA', 2020),
(13598142, 91423650, '18023', 'NURDIA', 'tabang', '2001-11-14', 'Herjon', 'Kristen', 'P', 'mamasa', 2018),
(13865104, 77941563, '20035', 'LENAWATI LEMPANLANGI', 'paladan', '2003-01-24', 'Herman sumitro', 'Kristen', 'P', 'TATOA', 2020),
(16728350, 91423650, '18003', 'ARIS', 'mamasa', '1999-01-16', 'sudi', 'Kristen', 'L', 'MAMASA', 2018),
(17310428, 30637192, '20004', 'ELISABETH', 'mamasa', '1997-12-11', 'sudi', 'Kristen', 'P', 'MAMASA', 2020),
(18715403, 21386475, '19009', 'Jesi Anastasya', 'lambanan', '2001-06-26', 'Usman Hadi', 'Kristen', 'P', 'MASKO', 2019),
(19380652, 91423650, '18028', 'ELISA SOMBO BAMBA', 'mamasa', '2000-07-14', 'Sirina Kombong', 'Kristen', 'P', 'OSANGO', 2018),
(20926483, 77941563, '20027', 'GAYATRI SARI', 'mamasa', '1999-01-16', 'Agus Tantoro', 'Kristen', 'P', 'OSANGO', 2020),
(21756042, 91423650, '18022', 'NIARDIKA SRIAYU', 'tambun', '2001-05-09', 'Karunia Septin', 'Kristen', 'P', 'OSANGO', 2018),
(23964705, 21386475, '19014', 'Marlina', 'orobua', '2003-09-09', 'Setyanto', 'Kristen', 'P', 'RANDANAN', 2019),
(24071869, 30637192, '20005', 'IMMER TRI PUTRA', 'mamasa', '1999-01-16', 'bongga', 'Kristen', 'L', 'OSANGO', 2020),
(24378609, 91423650, '18016', 'MAGDALENA', 'paladan', '2002-11-12', 'buntu linggi', 'Kristen', 'P', 'TATOA', 2018),
(25194260, 91423650, '18027', 'YOHANA BANNE WULAWAN', 'mamasa', '2001-05-22', 'Sudiarno', 'Kristen', 'P', 'TATOA', 2018),
(27109486, 30637192, '20012', 'MARNIA SANTIA', 'mamasa', '2021-06-23', 'pualinggi\'', 'Kristen', 'P', 'TATOA', 2020),
(27963128, 30637192, '20013', 'MARNIATI LIMBONG ARRUAN', 'tabang', '2021-07-15', 'stevanus silomba', 'Kristen', 'P', 'banggo', 2020),
(28943201, 91423650, '18004', 'ASMAWATI', 'mamasa', '1999-01-16', 'asmedi', 'Kristen', 'P', 'TATOA', 2018),
(29476351, 91423650, '18001', 'AGUSTINA', 'tabang', '1997-12-11', 'asmedi', 'Kristen', 'P', 'TATOA', 2018),
(30513472, 77941563, '20034', 'LEMPAN TIBOYONG', 'lakahang', '2003-05-28', 'pualinggi\'', 'Kristen', 'P', 'MASKO', 2020),
(30892735, 77941563, '20024', 'BETRIS LANGI\'', 'mamasa', '1997-12-11', 'kornelius', 'Kristen', 'P', 'TATOA', 2020),
(31653482, 77941563, '20023', 'ARRUAN BULAWAN', 'lambanan', '1999-01-16', 'BULAWAN', 'Kristen', 'L', 'MAMASA', 2020),
(33481205, 77941563, '20029', 'IRMAWATI DO\'LAKKIRAN', 'tambun', '2002-06-18', 'ranto', 'Kristen', 'P', 'RANDANAN', 2020),
(33794658, 77941563, '20040', 'SALMON SAPPELAYUK', 'mamasa', '2004-06-17', 'Seprianus', 'Kristen', 'L', 'TATOA', 2020),
(33854170, 91423650, '18007', 'ENOS SAMBO GAYANG', 'mamasa', '2000-10-03', 'Arya Tolan', 'Kristen', 'P', 'MASKO', 2018),
(35492768, 77941563, '20032', 'JUPRIANTO TEANG', 'mamasa', '2003-07-23', 'Herman', 'Kristen', 'L', 'TATOA', 2020),
(36893452, 91423650, '18011', 'HERMILA', 'Rante Pongko', '2000-09-12', 'Jhosua', 'Kristen', 'P', 'MASKO', 2018),
(37209163, 30637192, '20006', 'INDRI SULISTIA', 'osango', '2002-02-06', 'markus', 'Kristen', 'L', 'RANDANAN', 2020),
(38953174, 91423650, '18008', 'EUNIKE TAPO\'', 'tambun', '2000-04-25', 'Arnes Barens', 'Kristen', 'P', 'TATOA', 2018),
(39508647, 21386475, '19010', 'Julio Winrawan', 'tabang', '2001-05-19', 'Suryo Bastian', 'Kristen', 'L', 'TATOA', 2019),
(40354629, 30637192, '20007', 'JEKSEN', 'paladan', '2003-07-22', 'stevanus', 'Kristen', 'L', 'bethel', 2020),
(40429375, 21386475, '19002', 'ARIANUS', 'mamasa', '1997-12-11', 'pualinggi\'', 'Kristen', 'L', 'TATOA', 2019),
(40538921, 91423650, '18010', 'FEBRIANTO', 'Taupe', '2000-10-13', 'Aditya', 'Kristen', 'L', 'TATOA', 2018),
(45203691, 21386475, '19012', 'Krisna Sulastri', 'tabang', '2001-10-15', 'langga\' Karua', 'Kristen', 'P', 'MASKO', 2019),
(50124876, 77941563, '20030', 'JANUARDI', 'kalimantan', '2003-01-10', 'roky', 'Kristen', 'L', 'MASKO', 2020),
(50643952, 30637192, '20009', 'KRISDAYANTI', 'lambanan', '2003-08-14', 'junianto', 'Kristen', 'L', 'banggo', 2020),
(51350894, 91423650, '18002', 'AGUSTINUS LAMBA', 'tabang', '1997-12-11', 'asmedi', 'Kristen', 'L', 'TATOA', 2018),
(53278691, 91423650, '18020', 'MARNITA', 'tabang', '2002-07-16', 'Limbong gayang', 'Kristen', 'P', 'MASKO', 2018),
(53785190, 91423650, '29990', 'derry', 'mamasa', '1996-07-24', 'Arianto', 'Kristen', 'L', 'bunkas', 2020),
(54953270, 21386475, '19008', 'Ika Sestiawati', 'mamasa', '2001-12-06', 'Artha Rongga', 'Kristen', 'P', 'TATOA', 2019),
(56480351, 77941563, '20031', 'JEPRIANTO', 'orobua', '2003-06-24', 'Arman', 'Kristen', 'L', 'OSANGO', 2020),
(57156390, 91423650, '18021', 'MUSA', 'lambanan', '2002-05-07', 'Arjun', 'Kristen', 'L', 'TATOA', 2018),
(57961504, 91423650, '18018', 'MARIATY', 'mamasa', '2002-06-05', 'Aldy sambokaraeng', 'Kristen', 'P', 'MASKO', 2018),
(58326740, 77941563, '20038', 'RESKYANUS', 'mamasa', '2004-05-14', 'Arruan banga', 'Kristen', 'L', 'MAMASA', 2020),
(59728456, 77941563, '20037', 'OKTOPIANUS ROMBE', 'lambanan', '2003-10-03', 'Tasik lebukan', 'Kristen', 'L', 'TATOA', 2020),
(59753068, 21386475, '19015', 'Marsusilo Mato\'', 'Rantebuda', '2003-07-15', 'Tandi minanga', 'Kristen', 'L', 'rantebuda', 2019),
(61564089, 21386475, '19013', 'Kriswirna', 'lambanan', '2004-08-13', 'Wiranata', 'Kristen', 'P', 'TATOA', 2019),
(63710524, 21386475, '19011', 'Juniati Rara\'', 'tambun', '2001-09-26', 'Septi Rara\'', 'Kristen', 'P', 'OSANGO', 2019),
(64539278, 77941563, '20028', 'GAYATRI SARI', 'tabang', '2003-06-18', 'Joni', 'Kristen', 'P', 'OSANGO', 2020),
(65214389, 30637192, '20016', 'MILSA MALILLIN', 'Osango', '2003-10-08', 'Jumaidi', 'Kristen', 'P', 'OSANGO', 2020),
(68765019, 30637192, '65789', 'elni', 'mamasa', '1995-03-11', 'burhan', 'Kristen', 'P', 'taora', 2019),
(68905176, 77941563, '20036', 'MARLIANI', 'tabang', '2004-06-08', 'Linggi saratu', 'Kristen', 'P', 'MAMASA', 2020),
(68946175, 21386475, '19006', 'Heltianti Langi\' Saratu\'', 'mamasa', '2001-12-21', 'Arianto', 'Kristen', 'P', 'TATOA', 2019),
(69301652, 91423650, '18026', 'SURNIATI', 'paladan', '2001-07-18', 'Kandoa', 'Kristen', 'P', 'MASKO', 2018),
(69401572, 91423650, '18005', 'BARRANG GOA', 'mamasa', '1999-01-16', 'bongga', 'Kristen', 'P', 'MAMASA', 2018),
(69648130, 91423650, '18006', 'DESIANTI P.', 'tabang', '2000-06-20', 'Hadi Sevin', 'Kristen', 'L', 'TATOA', 2018),
(72904615, 21386475, '19005', 'DIANA SANTI', 'tabang', '1999-01-16', 'bongga', 'Kristen', 'P', 'OSANGO', 2019),
(74257308, 30637192, '20010', 'MALDER DEMMATAYAN', 'tabang', '2000-10-20', 'arpanus', 'Kristen', 'L', 'MASKO', 2020),
(76972840, 91423650, '18019', 'MARLIANA', 'mamasa', '2002-10-02', 'Oktovianus', 'Kristen', 'P', 'MAMASA', 2018),
(77102895, 91423650, '19009', 'FANNI SRIANTI BULAWAN', 'mamasa', '2000-09-06', 'Siloalo', 'Kristen', 'P', 'MASKO', 2018),
(78036714, 30637192, '20003', 'DORKAS TASIK LEBUKAN', 'mamasa', '1999-01-16', 'LEBUKAN', 'Kristen', 'P', 'MAMASA', 2020),
(78316745, 91423650, '18014', 'KARMI', 'Lambanan', '2002-08-07', 'Simson ', 'Kristen', 'P', 'BAMBA BUNTU', 2018),
(78347619, 91423650, '18012', 'JULIATI', 'mamasa', '2000-06-16', 'Kelvin Bramastu', 'Kristen', 'P', 'MASKO', 2018),
(78349620, 91423650, '18013', 'JUNIWATI', 'mamasa', '2002-02-13', 'Bongga Paillin', 'Kristen', 'P', 'MAMASA', 2018),
(78413697, 91423650, '18015', 'LUDIA', 'Mehalaan', '2002-01-25', 'Rokisten', 'Kristen', 'P', 'BAMBA BUNTU', 2018),
(78609174, 77941563, '20033', 'KATRIN KOMBONG', 'mamasa', '2003-08-26', 'Rinto', 'Kristen', 'P', 'banggo', 2020),
(81325809, 21386475, '19003', 'ARRUAN LOLA\'', 'mamasa', '1999-01-16', 'bongga', 'Kristen', 'P', 'TATOA', 2019),
(82964708, 21386475, '19001', 'ABIGAEL LAKKIRAN', 'mamasa', '1999-01-16', 'LAKKIRAN', 'Kristen', 'L', 'TATOA', 2019),
(83541780, 30637192, '20015', 'MILKA', 'mamasa', '2004-10-02', 'Sinta Rumengan', 'Kristen', 'P', 'randanan', 2020),
(84056391, 21386475, '19007', 'Herniati', 'lambanan', '2001-07-17', 'Jitro Sepadang', 'Kristen', 'P', 'MAMASA', 2019),
(85368419, 30637192, '20011', 'MARKUS SENIDURI', 'mamasa', '2002-09-18', 'junaedi', 'Katolik', 'L', 'banggo', 2020),
(89831620, 30637192, '20014', 'MELISA', 'Kalimbuang', '2004-04-28', 'Simon Gayang', 'Kristen', 'P', 'kalimbuang', 2020),
(93890475, 77941563, '20026', 'ESTER KOMBONG BUA\'', 'mamasa', '1999-01-16', 'bongga', 'Kristen', 'P', 'TATOA', 2020),
(94792038, 30637192, '20001', 'APRIANA', 'mamasa', '1997-12-11', 'asmedi', 'Kristen', 'P', 'TATOA', 2020),
(96528419, 91423650, '18025', 'SINRAYANTI EWANAN', 'tambun', '2001-06-12', 'Demianus Marrapa', 'Kristen', 'P', 'TATOA', 2018),
(96983402, 21386475, '19004', 'DIAN SRIKURNIA', 'lambanan', '1997-12-11', 'sudi', 'Kristen', 'P', 'MASKO', 2019),
(97932105, 91423650, '18017', 'MARIANTI', 'tabang', '2002-02-08', 'Hermon ', 'Kristen', 'P', 'MASKO', 2018),
(98960437, 30637192, '20002', 'ARWANDI BONGGA', 'mamasa', '1999-01-16', 'pualinggi\'', 'Kristen', 'L', 'MAMASA', 2020),
(99283641, 77941563, '20025', 'BULAWAN', 'mamasa', '1997-12-11', 'asmedi', 'Kristen', 'P', 'TATOA', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_penugasan_guru` int(11) NOT NULL,
  `id_ujian_jenis` int(11) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `time` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status_soal` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_penugasan_guru`, `id_ujian_jenis`, `tgl_ujian`, `time`, `nilai`, `status_soal`) VALUES
(40157482, 52175390, 44258360, '2021-04-26', 90, 5, '1'),
(50985342, 99814365, 44258360, '2021-07-02', 90, 5, '1'),
(59203416, 99814365, 66385012, '2022-04-12', 90, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_penugasan_guru` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `file` text NOT NULL,
  `tipe` enum('pdf','doc','mp4') NOT NULL,
  `jenis_tugas` enum('pekerjaan_rumah','pekerjaan_sekolah') DEFAULT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `finish` date DEFAULT NULL,
  `status_tugas` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_penugasan_guru`, `judul`, `file`, `tipe`, `jenis_tugas`, `id_materi`, `start`, `finish`, `status_tugas`) VALUES
(33590187, 99814365, 'tugas 1', 'd5b4010378d9ce88637fd85b8845f71d.pdf', 'pdf', 'pekerjaan_sekolah', 32563074, NULL, NULL, '1'),
(45107938, 99814365, 'tugas 1.1', 'edf60f794c81f2038df89b847e1bc054.pdf', 'pdf', 'pekerjaan_rumah', 32563074, '2021-06-15', '2021-06-21', '1'),
(53614790, 52175390, 'tugas latihan ', '533265e7995c68f4192645d6bf105c4a.pdf', 'pdf', 'pekerjaan_sekolah', 70938415, NULL, NULL, '1'),
(60827954, 30713492, 'tugas bab 1', 'f4748662e2dd9cca8f55a50f4fd11cce.pdf', 'pdf', 'pekerjaan_sekolah', 66180249, NULL, NULL, '1'),
(63296084, 12158693, 'asas', 'ee2b20a6e73a9660bafea9f89dfed10b.pdf', 'pdf', 'pekerjaan_sekolah', 74859673, NULL, NULL, '1'),
(64298073, 99814365, 'tugas 1 keterampilan olahraga beregu', '8df341195ae414b95ab69b3680bbff46.docx', 'doc', 'pekerjaan_rumah', 32563074, '2021-07-16', '2021-07-30', '1'),
(84803715, 94365127, 'tugas bab 2', 'b03b21110424a19c5d4d39d4555761d5.pdf', 'pdf', 'pekerjaan_sekolah', 36729350, NULL, NULL, '1'),
(89213587, 52175390, 'tugas 1 materi contoh surat lamaran', '7205c0ce94ec6c22f734f8f0496c81d2.pdf', 'pdf', 'pekerjaan_rumah', NULL, '2021-04-26', '2021-04-27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jenis` enum('essay','pilihan_ganda') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `id_soal`, `jenis`) VALUES
(10783469, 40157482, 'pilihan_ganda'),
(22746051, 59203416, 'pilihan_ganda'),
(25840792, 50985342, 'pilihan_ganda'),
(26348795, 50985342, 'pilihan_ganda'),
(37562389, 59203416, 'pilihan_ganda'),
(39503874, 50985342, 'pilihan_ganda'),
(52516973, 40157482, 'pilihan_ganda'),
(54783192, 59203416, 'pilihan_ganda'),
(72875063, 40157482, 'pilihan_ganda'),
(74986037, 59203416, 'pilihan_ganda'),
(75726184, 40157482, 'pilihan_ganda'),
(75973401, 40157482, 'pilihan_ganda'),
(84956201, 50985342, 'pilihan_ganda'),
(91579830, 59203416, 'pilihan_ganda'),
(92054863, 50985342, 'pilihan_ganda');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_essay`
--

CREATE TABLE `ujian_essay` (
  `id_ujian_essay` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `soal` text NOT NULL,
  `gambar` text NOT NULL,
  `jawaban_benar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ujian_jenis`
--

CREATE TABLE `ujian_jenis` (
  `id_ujian_jenis` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian_jenis`
--

INSERT INTO `ujian_jenis` (`id_ujian_jenis`, `jenis`, `keterangan`) VALUES
(44258360, 'UJIAN TENGAH SEMESTER', 'DILAKSANAKAN SETIAP PERTENGAHAN SEMESTER'),
(51798203, 'ULANGAN HARIAN', 'DILAKSANAKAN OLEH MASING2 GURU MAPEL '),
(66385012, 'UJIAN KENAIKAN KELAS', 'DILAKSANAKAN SETIAP AKHIR SEMESTER ');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_pilihan_ganda`
--

CREATE TABLE `ujian_pilihan_ganda` (
  `id_ujian_pilihan_ganda` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `soal` text NOT NULL,
  `gambar` text NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `pil_e` text NOT NULL,
  `jawaban_benar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian_pilihan_ganda`
--

INSERT INTO `ujian_pilihan_ganda` (`id_ujian_pilihan_ganda`, `id_ujian`, `soal`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `jawaban_benar`) VALUES
(10152937, 37562389, 'Berikut ini anggota badan yang digunakan untuk menahan bola memantul, kecuali....', '', 'perut', 'kaki bagian dalam', 'kaki bagian luar', 'kepala', 'telapak kaki', '4'),
(16183295, 52516973, 'Setelah dilakukan penilaian terhadap ulangan Bahasa Indonesia kelas XII IPA, yang memperoleh nilai 8 sebanyak 25 orang, nilai 7 sebanyak 4 orang, dan nilai 6 hanya 1 orang. Jumlah siswa 30 orang. (...)\r\n\r\nSimpulan yang tepat untuk mengakhiri paragraf tersebut adalah....', '', 'Belum dapat dikatakan mereka pintar.', 'Mereka belum dikatakan siswa yang pandai.', 'Dapat dikatakan nilai mereka baik.', 'Jadi, guru mereka boleh berbangga.', 'Memang mereka anak yang rajin-rajin.', '3'),
(17215608, 91579830, 'Tendangan yang biasa digunakan oleh pemain untuk melakukan tendangan penalti adalah....', '', 'kaki bagian dalam', 'kaki bagian luar', ' punggung kaki', 'ujung kaki', 'mata kaki', '1'),
(20267913, 22746051, 'Ukuran panjang lapangan sepak bola adalah....', '', '75 m – 90 m', '64 m – 75 m', '80 m – 95 m', '100 m – 110 m', '100 m – 120 m', '4'),
(34623159, 39503874, 'Berikut ini merupakan teknik dasar dalam permainan sepak bola, kecuali....', '', 'menendang bola dengan menggunakan kaki bagian dalam', 'menendang bola dengan menggunakan kaki bagian luar', 'menendang bola dengan punggung kaki', 'menahan bola menggunakan tangan', 'menahan bola menggunakan dada', '4'),
(37598306, 54783192, 'Seorang pemain belakang tangannya menyentuh bola di dalam darah kotak penalti wilayahnya, maka hukuman yang diberikan wasit adalah....', '', 'tendangan bebas', 'tendangan penalti', 'lemparan sudut', ' lemparan ke dalam', ' tendangan gawang', '5'),
(43927846, 75726184, 'Teks 1\r\n\r\nPagi itu hujan lebat mengguyur Kota Bandar Lampung, Lampung. Hujan yang terjadi mulai pukul 04.30 WIB tadi membuat jalan menuju Stasiun Tanjung Karang, tepatnya Jalan Raden Intan, terendam banjir. Pada malam hari genangan air setinggi sekitar 40 cm mengakibatkan kemacetan cukup panjang.\r\n\r\nTeks 2\r\n\r\nRibuan rumah terendam banjir bandang di tiga kecamatan di Kabupaten Banggai, Provinsi Sulawesi Tengah. Para korban mengungsi ke daerah yang lebih aman. Kondisi itu terjadi pada Minggu pukul 03.00 WITA\r\n\r\nPerbedaan pola penyajian kedua teks tersebut adalah....', '', 'Teks 1 : urutan waktu\r\nTeks 2 : urutan tempat', 'Teks 1 : urutan waktu\r\nTeks 2 : urutan sebab-akibat', 'Teks 1 : urutan sebab-akibat\r\nTeks 2 : urutan waktu', 'Teks 1 : urutan tempat\r\nTeks 2 : urutan waktu', 'Teks 1 : urutan tempat\r\nTeks 2 : urutan sebab-akibat', '2'),
(49076243, 25840792, 'Menendang bola mengenai tengah-tenagah kaki bagian dalam. Cara tersebut merupakan teknik menendang bola menggunakan....', '', 'kaki bagian dalam', 'kaki bagian luar', ' punggung kaki', 'punggung kaki bagian dalam', 'punggung kaki bagian luar', '1'),
(49378504, 26348795, 'Dalam permainan sepak bola, bagian tubuh yang tidak diperbolehkan menyentuh bola bagi para pemain selain penjaga gawang adalah....', '', 'paha', 'kaki', 'tangan', 'kepala', 'bahu', '3'),
(53504912, 74986037, 'Berikut ini keterampilan teknik yang harus dimiliki oleh pemain sepak bola, kecuali....', '', 'passing', 'shooting', 'heading', 'dribling', 'lay up shoot', '5'),
(71653429, 75973401, 'Janganlah sampai kawan\r\n\r\nKesejahteraan tinggallah angan\r\n\r\nKeadilan hanyalah khayal\r\n\r\nKemerdekaan kembalilah terjajah\r\n\r\nYang tersisa hanyalah kebodohan\r\n\r\n \r\n\r\nMari naik kapal, kawan\r\n\r\nJangan hanya tinggal diam\r\n\r\nMari bersatu ambil peranan\r\n\r\nBuatlah perubahan\r\n\r\n \r\n\r\nKata naik kapal dalam puisi tersebut melambangkan....', '', 'melakukan perjuangan', 'memberikan kesempatan', 'menunjukkan ketakutan', 'melakukan pembangunan', 'memberikan kesepakatan', '1'),
(80712935, 92054863, 'Permainan sepak bola terdiri atas.... babak', '', 'satu', 'dua', 'tiga', 'empat ', 'lima', '2'),
(84715602, 10783469, 'Sani seseorang siswa baru di kelas kami. Anaknya pendiam, tetapi murah senyum. Melihat penampilan dia yang banyak diam, banyak teman mengira Sani seorang siswa biasa-biasa saja. Akan tetapi, pada saat ulangan dan hasilnya diumumkan, nilai Sani selalu yang tertinggi. Seperti kata peribahasa ....\r\n\r\nPeribahasa yang sesuai dengan ilustrasi tersebut adalah....', '47d70a0b85dcbc560e6b3956afcfa084.jpg', 'air yang tenang menghanyutkan', 'memikul di bahu, memikul di kepala', 'seperti ilmu padi, kian berisi, kian merunduk', 'pikir itu pelita hatiair beriak tanda tak dalam', 'air susu dibalas air tuba', '1'),
(92163907, 72875063, 'Bacalah paragraf berikut dengan saksama!\r\n\r\nSebaiknya, brokoli dimasak atau direbus dengan air mendidih dalam kondisi setengah matang. Tambahkan garam untuk membunuh kuman, lalu tiriskan sebentar! Siram dengan air dingin! Fungsi air dingin untuk mempertahankan warna dan memperlambat proses pemasakan brokoli. Dalam kondisi seperti ini, brokoli dapat disimpan 2—3 hari dalam lemari pendingin dan aman dikonsumsi.\r\n\r\nIde pokok paragraf tersebut adalah....', '', 'cara menyimpan brokoli', 'fungsi garam dan penirisan brokoli', 'cara mempertahankan warna brokoli', 'daya tahan brokoli', 'cara membersihkan brokoli', '1'),
(96947813, 84956201, 'Kaki tendang diayun dari belakang. Saat bola datang, ujung kaki atau sepatu mengarah ke tanah. Perkenaan bola adalah pada kaki bagian....', '', 'dalam kaki', 'luar kaki', 'punggung kaki', 'telapak kaki', 'mata kaki', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guru','siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_users`, `username`, `password`, `role`, `status`) VALUES
(1, 1, 'admin', '$2y$10$C6RDOPemc.sc4cve0CnvbOecsMlAGtuxes4DA6L789/9.9Lg5Cguq', 'admin', '1'),
(11490358, 76938425, 'kaleb najoan', '$2y$10$DjT/TrrbJLS7AcxKUZ7e/uzJ1xVhNPNRfE/hDeU/YubS8u2Y21QNq', 'guru', '1'),
(13876429, 94792038, 'apriana', '$2y$10$1gJww1p6StCZJyadZ.xgauZYVbkGkQ33fqL2mFOKOAr8BPEP3.gFG', 'siswa', '1'),
(14236870, 41250473, 'eka lestari', '$2y$10$qco/8Njg0zMpPx09Vonc..d74gy0jaebflrQxeFLroqsCrB6IC6CS', 'guru', '1'),
(16418025, 45628439, 'yustita', '$2y$10$755fz6r.V.PK0i0tCI8iIup8VJrefW1jISrjPXe.WYo4/Yl8TDDDq', 'guru', '1'),
(17451263, 75467821, 'anila', '$2y$10$.6iGpzMrbrr08Fyt2BZE4eAioUsbWZ/zBL8Ls8nPH7qoR70cVM0iu', 'guru', '1'),
(20127845, 81325809, 'arruan lola', '$2y$10$G5G0JpYHtKbwZbAxzTDs7.aYtqJKjV0QpIhk72HZCNa0GHI47yPoK', 'siswa', '1'),
(20512468, 99283641, 'bulawan', '$2y$10$AsgrDESxC.v66C7xH3vkau4Wrdre/vYZsomH9CZDHg/tiSdDc5GyG', 'siswa', '1'),
(21930672, 18563714, 'kormely', '$2y$10$1ha8BX/z/0ZruiHEX81GiuYoszXEOO9aETZQAhNug64zL9ECicR3a', 'guru', '1'),
(24706193, 17310428, 'elisabeth', '$2y$10$695vMk8C/oeCk0/cKqCm9e3zau0Rd4KqkdQZEwUxSONl8xY6Hh94y', 'siswa', '1'),
(26024981, 24071869, 'immer triputra', '$2y$10$sv0Jrk1cVDLT0DKHcrIpt.2QaTLG.kLRvOdFpZBpNHdD4BTnaFrKS', 'siswa', '1'),
(26092351, 76987104, 'tandedika', '$2y$10$.MnoW0cAcdVOeHrfX2fOUO494bs1KMG3OG3oLEFIlpF8leWCumwDy', 'guru', '1'),
(26723019, 82031756, 'simson', '$2y$10$QjAZ3FKi.RNRI3O57u/Oye7rh7IlaQsmlSc8BaWkk1D2lgx3CtHKa', 'guru', '1'),
(29386452, 28943201, 'asmawati', '$2y$10$pFQjNRv3fVbllCEqa9YeI.pev/w6KS0SbXOOZnxNtAsX5JsmUVPkC', 'siswa', '1'),
(33761894, 78036714, 'dorkas tasik lebukan', '$2y$10$OtsYOTkX17hMFAcBbijuvOEpI4wCAjLzjc4nObU1YoN1A9mBnY8IC', 'siswa', '1'),
(38345609, 62369084, 'marthinus paotonan', '$2y$10$.HTATTgjH8fv2V51Q1liDOI0hao5A2B7unQFHqDcbzPPIzuB1XnaO', 'guru', '1'),
(38513207, 40429375, 'arianus', '$2y$10$JxoGdhM27TsbuXg.QRyq8.S8L.28zX9s04WEjkZS725ORporKAf4i', 'siswa', '1'),
(38942735, 69401572, 'barrang goa', '$2y$10$EnuPfMF34/mNs0/3JiwXTezv2E7VwKveMbyN2LEe1mVvRFxnzWR7m', 'siswa', '1'),
(40924375, 16728350, 'aris', '$2y$10$/g84go7Gisl0Tus3an443.Os5RF.5kDZuNTjXTb.VEOLB8yhmZ/Sm', 'siswa', '1'),
(46458071, 47438621, 'afriandi lemba', '$2y$10$bR7H8Q9BIXEd7BNtCa4y9.UGwLTQGVysC7DUXRFiXJlDRF7yTb.DW', 'guru', '1'),
(48360297, 96983402, 'dian srikurnia', '$2y$10$a7W3ZP.TX7TkYxhdVA/AvOVLNoESjoWwvPbzJVNqeAdpO9fA8YuG6', 'siswa', '1'),
(49207364, 31653482, 'arruan bulawan', '$2y$10$FUPiIdzHMokCFPvq/tFx4uyY49.W61nK/fJj5tKPRCSsR3iqrkZDa', 'siswa', '1'),
(52137584, 10561723, 'yunus u', '$2y$10$0BZfJakaDqI8ApZC24dWLe8sz/Ub5UQs714R9.SsMuAKMJ6t1LE/u', 'guru', '1'),
(57215608, 77831096, 'asrianto', '$2y$10$uGZWrXmoxJx/njanWt2/rOrLq7qi.iF.pn3Ddlt30LUhi3o5DrAGC', 'guru', '1'),
(61678523, 74723195, 'asriani', '$2y$10$qiplsPhWfn7T9UjTBXrn9uPJUDwuDPd2W6b4RF78deCzuj6/pMo2.', 'guru', '1'),
(62907634, 53785190, 'derry', '$2y$10$eZbkAQeJlWqtIHTmsO2FOe6LC5jnpTUh0GA9QVQRwiSsLD.KO9U/u', 'siswa', '1'),
(69516087, 72741958, 'dewisusanty', '$2y$10$a6KVSbxzLcOGd7Ouiz7gC.Sb3KOf.k0i08hspXkg6W3dd3vagyKL2', 'guru', '1'),
(71689504, 33274168, 'yatimina mana\'o', '$2y$10$RToZgHMaIjwQbJQGPrpoq.YtjNyYU3k4E67ppihFHEhRYCqknNBRq', 'guru', '1'),
(77250439, 93890475, 'ester kombong bua ', '$2y$10$Z2D38zEd7uYZbWh3.jrzWuVmG8Ymgk7bdNn5jAXktm2jX5S4vdECm', 'siswa', '1'),
(77391085, 13617802, 'alfrida', '$2y$10$7lnMJosaMo8mOL.0cSOC3eFLn24yHX5tzWkOpeO0GBIawCySwp.FS', 'guru', '1'),
(78407321, 16091753, 'serli', '$2y$10$uUcwm.KCDPm2KT/wLJi/Se1XmSRlKIaovXG9znq0wHzlz4rkYvrY.', 'guru', '1'),
(79267531, 66435128, 'nurmalasari', '$2y$10$l2hcGAHHDrOx1XvZQd8Oz.Mll1eJWqQPxCT.RB72715NxNEq8r0s6', 'guru', '1'),
(86950271, 51350894, 'agustinus lamba', '$2y$10$99/UWvecOPSqE2xIMyFld.YzCvBQQKUTRpf8oMuewRtahea/7avLS', 'siswa', '1'),
(88359702, 18715403, 'jesi anastasya', '$2y$10$bxF2V4pwZBbnTMmzql31CeuKpawaQ7dS5Vwt2LB18DQtYln9/BqbW', 'siswa', '1'),
(88764320, 72904615, 'diana santi', '$2y$10$aMeID2Dr3oj23QkhpM1CN.aq4cn3eh1vyEzElAcbDibBVtbpXokFa', 'siswa', '1'),
(89738206, 20926483, 'gayatri sari', '$2y$10$9C2qxCwb8O5TBO2o6jnQGOoGWNeMQOhIlIDrEKujLA5AiWTUI/71K', 'siswa', '1'),
(90296735, 98960437, 'arwandi bongga', '$2y$10$u/gc1Dc71v.NYq8DVEIJFePAZ8YwSXrkFrPP8uWK74sR5lZF/QvtW', 'siswa', '1'),
(90985174, 82964708, 'abigael lakkiran', '$2y$10$vD4pOVAhhkiWQMvV07Tf/.Z8aRRjuO0sMyV5DYQmr/5ipTCZbcpyi', 'siswa', '1'),
(91264857, 67461325, 'yansens', '$2y$10$aZNWn8GsNpZwR/kWSAeFbuO/p3U8mV8ZfXnh72RNax8bWPP0/f6YW', 'guru', '1'),
(94329857, 37209163, 'indri sulistia', '$2y$10$/Rh7kUuSkjfjnPcYOoJLLeYt0y7bkbpRkCrtE8TMN8HYgRz9y9aAG', 'siswa', '1'),
(96329708, 29476351, 'agustina', '$2y$10$lYU0yYcaYi4fuoAJmjQxVeFXAbEjiF1/mf6aWtRCbaPAVvzoAph06', 'siswa', '1'),
(97934065, 68765019, 'elni', '$2y$10$73bweneH3X0CFc3nj.T7x.RXgMC4B9nvtDv2OHVE6y/PQnbPLVNN.', 'siswa', '1'),
(98719260, 30892735, 'betris langi\'', '$2y$10$/ixcQkbjp0BT5/Q0Q9yorOwXatOqMTI3p.B1c0Nb76l77f5Sjg6N6', 'siswa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali_kelas`, `id_guru`, `id_kelas`) VALUES
(11827563, 16091753, 77941563),
(30827594, 18563714, 30637192),
(60765391, 10561723, 91423650),
(98652973, 24159203, 21386475);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `rel_id_materi_materi_to forum` (`id_materi`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `hasil_tugas`
--
ALTER TABLE `hasil_tugas`
  ADD PRIMARY KEY (`id_hasil_tugas`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`id_hasil_ujian`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `materi_detail`
--
ALTER TABLE `materi_detail`
  ADD PRIMARY KEY (`id_materi_detail`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  ADD PRIMARY KEY (`id_penugasan_guru`),
  ADD KEY `guru_penugasan` (`id_guru`),
  ADD KEY `kelas_penugasan` (`id_kelas`),
  ADD KEY `mapel_penugasan` (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas_siswa` (`id_kelas`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `ujian_essay`
--
ALTER TABLE `ujian_essay`
  ADD PRIMARY KEY (`id_ujian_essay`),
  ADD KEY `id_ujian_essay` (`id_ujian`);

--
-- Indexes for table `ujian_jenis`
--
ALTER TABLE `ujian_jenis`
  ADD PRIMARY KEY (`id_ujian_jenis`);

--
-- Indexes for table `ujian_pilihan_ganda`
--
ALTER TABLE `ujian_pilihan_ganda`
  ADD PRIMARY KEY (`id_ujian_pilihan_ganda`),
  ADD KEY `id_ujian_pilihan_ganda` (`id_ujian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`),
  ADD KEY `wali_kelas_id_guru` (`id_guru`),
  ADD KEY `wali_kelas_id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97502385;

--
-- AUTO_INCREMENT for table `hasil_tugas`
--
ALTER TABLE `hasil_tugas`
  MODIFY `id_hasil_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68957232;

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `id_hasil_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98347561;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98351280;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95891277;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56742594;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99283642;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59203417;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89213588;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92054864;

--
-- AUTO_INCREMENT for table `ujian_essay`
--
ALTER TABLE `ujian_essay`
  MODIFY `id_ujian_essay` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian_jenis`
--
ALTER TABLE `ujian_jenis`
  MODIFY `id_ujian_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66385013;

--
-- AUTO_INCREMENT for table `ujian_pilihan_ganda`
--
ALTER TABLE `ujian_pilihan_ganda`
  MODIFY `id_ujian_pilihan_ganda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96947814;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98719261;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98652974;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  ADD CONSTRAINT `guru_penugasan` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_penugasan` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_penugasan` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
