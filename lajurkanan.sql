-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Feb 2016 pada 17.09
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lajurkanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1445687405),
('m130524_201442_init', 1445687408),
('m151005_151608_yii2advance', 1445687409);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE IF NOT EXISTS `tbl_absensi` (
  `id_absensi` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `absen` char(3) NOT NULL,
  `tanggal` int(2) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=394 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `id_siswa`, `id_kelas`, `absen`, `tanggal`, `bulan`, `tahun`) VALUES
(1, 312, 9, 'H', 25, 1, 2011),
(2, 313, 9, 'H', 25, 1, 2011),
(3, 314, 9, 'H', 25, 1, 2011),
(4, 315, 9, 'H', 25, 1, 2011),
(5, 316, 9, 'H', 25, 1, 2011),
(6, 317, 9, 'H', 25, 1, 2011),
(7, 318, 9, 'H', 25, 1, 2011),
(8, 319, 9, 'H', 25, 1, 2011),
(9, 320, 9, 'H', 25, 1, 2011),
(10, 321, 9, 'H', 25, 1, 2011),
(11, 322, 9, 'H', 25, 1, 2011),
(12, 323, 9, 'H', 25, 1, 2011),
(13, 324, 9, 'H', 25, 1, 2011),
(14, 325, 9, 'H', 25, 1, 2011),
(15, 326, 9, 'H', 25, 1, 2011),
(16, 327, 9, 'H', 25, 1, 2011),
(17, 328, 9, 'H', 25, 1, 2011),
(18, 329, 9, 'H', 25, 1, 2011),
(19, 330, 9, 'H', 25, 1, 2011),
(20, 331, 9, 'H', 25, 1, 2011),
(21, 332, 9, 'H', 25, 1, 2011),
(22, 333, 9, 'H', 25, 1, 2011),
(23, 334, 9, 'H', 25, 1, 2011),
(24, 335, 9, 'H', 25, 1, 2011),
(25, 336, 9, 'H', 25, 1, 2011),
(26, 337, 9, 'H', 25, 1, 2011),
(27, 338, 9, 'H', 25, 1, 2011),
(28, 339, 9, 'H', 25, 1, 2011),
(29, 340, 9, 'H', 25, 1, 2011),
(30, 341, 9, 'H', 25, 1, 2011),
(31, 342, 9, 'H', 25, 1, 2011),
(32, 343, 9, 'H', 25, 1, 2011),
(33, 344, 9, 'H', 25, 1, 2011),
(34, 345, 9, 'H', 25, 1, 2011),
(35, 346, 9, 'H', 25, 1, 2011),
(36, 347, 9, 'H', 25, 1, 2011),
(37, 348, 9, 'H', 25, 1, 2011),
(38, 349, 9, 'H', 25, 1, 2011),
(39, 350, 9, 'H', 25, 1, 2011),
(40, 312, 9, 'I', 22, 2, 2011),
(41, 313, 9, 'A', 22, 2, 2011),
(42, 314, 9, 'B', 22, 2, 2011),
(43, 315, 9, 'B', 22, 2, 2011),
(44, 316, 9, 'B', 22, 2, 2011),
(45, 317, 9, 'H', 22, 2, 2011),
(46, 318, 9, 'H', 22, 2, 2011),
(47, 319, 9, 'H', 22, 2, 2011),
(48, 320, 9, 'H', 22, 2, 2011),
(49, 321, 9, 'H', 22, 2, 2011),
(50, 322, 9, 'H', 22, 2, 2011),
(51, 323, 9, 'H', 22, 2, 2011),
(52, 324, 9, 'H', 22, 2, 2011),
(53, 325, 9, 'H', 22, 2, 2011),
(54, 326, 9, 'H', 22, 2, 2011),
(55, 327, 9, 'H', 22, 2, 2011),
(56, 328, 9, 'H', 22, 2, 2011),
(57, 329, 9, 'H', 22, 2, 2011),
(58, 330, 9, 'H', 22, 2, 2011),
(59, 331, 9, 'H', 22, 2, 2011),
(60, 332, 9, 'H', 22, 2, 2011),
(61, 333, 9, 'H', 22, 2, 2011),
(62, 334, 9, 'H', 22, 2, 2011),
(63, 335, 9, 'H', 22, 2, 2011),
(64, 336, 9, 'B', 22, 2, 2011),
(65, 337, 9, 'B', 22, 2, 2011),
(66, 338, 9, 'B', 22, 2, 2011),
(67, 339, 9, 'B', 22, 2, 2011),
(68, 340, 9, 'B', 22, 2, 2011),
(69, 341, 9, 'B', 22, 2, 2011),
(70, 342, 9, 'B', 22, 2, 2011),
(71, 343, 9, 'A', 22, 2, 2011),
(72, 344, 9, 'A', 22, 2, 2011),
(73, 345, 9, 'A', 22, 2, 2011),
(74, 346, 9, 'A', 22, 2, 2011),
(75, 347, 9, 'A', 22, 2, 2011),
(76, 348, 9, 'A', 22, 2, 2011),
(77, 349, 9, 'A', 22, 2, 2011),
(78, 350, 9, 'A', 22, 2, 2011),
(79, 1, 1, 'H', 23, 2, 2011),
(80, 2, 1, 'B', 23, 2, 2011),
(81, 3, 1, 'B', 23, 2, 2011),
(82, 4, 1, 'A', 23, 2, 2011),
(83, 5, 1, 'H', 23, 2, 2011),
(84, 6, 1, 'H', 23, 2, 2011),
(85, 7, 1, 'H', 23, 2, 2011),
(86, 8, 1, 'H', 23, 2, 2011),
(87, 9, 1, 'B', 23, 2, 2011),
(88, 10, 1, 'B', 23, 2, 2011),
(89, 11, 1, 'B', 23, 2, 2011),
(90, 12, 1, 'B', 23, 2, 2011),
(91, 13, 1, 'B', 23, 2, 2011),
(92, 14, 1, 'B', 23, 2, 2011),
(93, 15, 1, 'H', 23, 2, 2011),
(94, 16, 1, 'H', 23, 2, 2011),
(95, 17, 1, 'H', 23, 2, 2011),
(96, 18, 1, 'H', 23, 2, 2011),
(97, 19, 1, 'H', 23, 2, 2011),
(98, 20, 1, 'H', 23, 2, 2011),
(99, 21, 1, 'H', 23, 2, 2011),
(100, 22, 1, 'H', 23, 2, 2011),
(101, 23, 1, 'I', 23, 2, 2011),
(102, 24, 1, 'I', 23, 2, 2011),
(103, 25, 1, 'S', 23, 2, 2011),
(104, 26, 1, 'S', 23, 2, 2011),
(105, 27, 1, 'S', 23, 2, 2011),
(106, 28, 1, 'H', 23, 2, 2011),
(107, 29, 1, 'H', 23, 2, 2011),
(108, 30, 1, 'H', 23, 2, 2011),
(109, 31, 1, 'H', 23, 2, 2011),
(110, 32, 1, 'H', 23, 2, 2011),
(111, 33, 1, 'H', 23, 2, 2011),
(112, 34, 1, 'H', 23, 2, 2011),
(113, 35, 1, 'B', 23, 2, 2011),
(114, 36, 1, 'B', 23, 2, 2011),
(115, 37, 1, 'A', 23, 2, 2011),
(116, 38, 1, 'A', 23, 2, 2011),
(117, 39, 1, 'B', 23, 2, 2011),
(118, 40, 1, 'B', 23, 2, 2011),
(119, 41, 1, 'H', 23, 2, 2011),
(120, 42, 1, 'H', 23, 2, 2011),
(121, 312, 9, 'H', 23, 2, 2011),
(122, 313, 9, 'B', 23, 2, 2011),
(123, 314, 9, 'B', 23, 2, 2011),
(124, 315, 9, 'A', 23, 2, 2011),
(125, 316, 9, 'A', 23, 2, 2011),
(126, 317, 9, 'B', 23, 2, 2011),
(127, 318, 9, 'B', 23, 2, 2011),
(128, 319, 9, 'B', 23, 2, 2011),
(129, 320, 9, 'H', 23, 2, 2011),
(130, 321, 9, 'H', 23, 2, 2011),
(131, 322, 9, 'H', 23, 2, 2011),
(132, 323, 9, 'B', 23, 2, 2011),
(133, 324, 9, 'A', 23, 2, 2011),
(134, 325, 9, 'I', 23, 2, 2011),
(135, 326, 9, 'S', 23, 2, 2011),
(136, 327, 9, 'H', 23, 2, 2011),
(137, 328, 9, 'H', 23, 2, 2011),
(138, 329, 9, 'H', 23, 2, 2011),
(139, 330, 9, 'H', 23, 2, 2011),
(140, 331, 9, 'B', 23, 2, 2011),
(141, 332, 9, 'B', 23, 2, 2011),
(142, 333, 9, 'A', 23, 2, 2011),
(143, 334, 9, 'A', 23, 2, 2011),
(144, 335, 9, 'A', 23, 2, 2011),
(145, 336, 9, 'I', 23, 2, 2011),
(146, 337, 9, 'H', 23, 2, 2011),
(147, 338, 9, 'H', 23, 2, 2011),
(148, 339, 9, 'H', 23, 2, 2011),
(149, 340, 9, 'H', 23, 2, 2011),
(150, 341, 9, 'B', 23, 2, 2011),
(151, 342, 9, 'B', 23, 2, 2011),
(152, 343, 9, 'A', 23, 2, 2011),
(153, 344, 9, 'H', 23, 2, 2011),
(154, 345, 9, 'H', 23, 2, 2011),
(155, 346, 9, 'H', 23, 2, 2011),
(156, 347, 9, 'H', 23, 2, 2011),
(157, 348, 9, 'H', 23, 2, 2011),
(158, 349, 9, 'H', 23, 2, 2011),
(159, 350, 9, 'H', 23, 2, 2011),
(237, 350, 9, 'SK', 24, 2, 2011),
(236, 349, 9, 'D', 24, 2, 2011),
(235, 348, 9, 'H', 24, 2, 2011),
(234, 347, 9, 'B', 24, 2, 2011),
(233, 346, 9, 'A', 24, 2, 2011),
(232, 345, 9, 'I', 24, 2, 2011),
(231, 344, 9, 'S', 24, 2, 2011),
(230, 343, 9, 'S', 24, 2, 2011),
(229, 342, 9, 'S', 24, 2, 2011),
(228, 341, 9, 'S', 24, 2, 2011),
(227, 340, 9, 'I', 24, 2, 2011),
(226, 339, 9, 'I', 24, 2, 2011),
(225, 338, 9, 'I', 24, 2, 2011),
(224, 337, 9, 'I', 24, 2, 2011),
(223, 336, 9, 'A', 24, 2, 2011),
(222, 335, 9, 'A', 24, 2, 2011),
(221, 334, 9, 'A', 24, 2, 2011),
(220, 333, 9, 'A', 24, 2, 2011),
(219, 332, 9, 'A', 24, 2, 2011),
(218, 331, 9, 'A', 24, 2, 2011),
(217, 330, 9, 'B', 24, 2, 2011),
(216, 329, 9, 'B', 24, 2, 2011),
(215, 328, 9, 'B', 24, 2, 2011),
(214, 327, 9, 'B', 24, 2, 2011),
(213, 326, 9, 'B', 24, 2, 2011),
(212, 325, 9, 'B', 24, 2, 2011),
(211, 324, 9, 'H', 24, 2, 2011),
(210, 323, 9, 'H', 24, 2, 2011),
(209, 322, 9, 'H', 24, 2, 2011),
(208, 321, 9, 'H', 24, 2, 2011),
(207, 320, 9, 'H', 24, 2, 2011),
(206, 319, 9, 'D', 24, 2, 2011),
(205, 318, 9, 'D', 24, 2, 2011),
(204, 317, 9, 'D', 24, 2, 2011),
(203, 316, 9, 'D', 24, 2, 2011),
(202, 315, 9, 'SK', 24, 2, 2011),
(201, 314, 9, 'SK', 24, 2, 2011),
(200, 313, 9, 'SK', 24, 2, 2011),
(199, 312, 9, 'SK', 24, 2, 2011),
(238, 1, 1, 'SK', 26, 2, 2011),
(239, 2, 1, 'SK', 26, 2, 2011),
(240, 3, 1, 'SK', 26, 2, 2011),
(241, 4, 1, 'SK', 26, 2, 2011),
(242, 5, 1, 'SK', 26, 2, 2011),
(243, 6, 1, 'SK', 26, 2, 2011),
(244, 7, 1, 'SK', 26, 2, 2011),
(245, 8, 1, 'SK', 26, 2, 2011),
(246, 9, 1, 'SK', 26, 2, 2011),
(247, 10, 1, 'SK', 26, 2, 2011),
(248, 11, 1, 'SK', 26, 2, 2011),
(249, 12, 1, 'SK', 26, 2, 2011),
(250, 13, 1, 'SK', 26, 2, 2011),
(251, 14, 1, 'SK', 26, 2, 2011),
(252, 15, 1, 'SK', 26, 2, 2011),
(253, 16, 1, 'SK', 26, 2, 2011),
(254, 17, 1, 'SK', 26, 2, 2011),
(255, 18, 1, 'SK', 26, 2, 2011),
(256, 19, 1, 'SK', 26, 2, 2011),
(257, 20, 1, 'SK', 26, 2, 2011),
(258, 21, 1, 'SK', 26, 2, 2011),
(259, 22, 1, 'SK', 26, 2, 2011),
(260, 23, 1, 'SK', 26, 2, 2011),
(261, 24, 1, 'SK', 26, 2, 2011),
(262, 25, 1, 'SK', 26, 2, 2011),
(263, 26, 1, 'SK', 26, 2, 2011),
(264, 27, 1, 'SK', 26, 2, 2011),
(265, 28, 1, 'SK', 26, 2, 2011),
(266, 29, 1, 'SK', 26, 2, 2011),
(267, 30, 1, 'SK', 26, 2, 2011),
(268, 31, 1, 'SK', 26, 2, 2011),
(269, 32, 1, 'SK', 26, 2, 2011),
(270, 33, 1, 'SK', 26, 2, 2011),
(271, 34, 1, 'SK', 26, 2, 2011),
(272, 35, 1, 'SK', 26, 2, 2011),
(273, 36, 1, 'SK', 26, 2, 2011),
(274, 37, 1, 'SK', 26, 2, 2011),
(275, 38, 1, 'SK', 26, 2, 2011),
(276, 39, 1, 'SK', 26, 2, 2011),
(277, 40, 1, 'SK', 26, 2, 2011),
(278, 41, 1, 'SK', 26, 2, 2011),
(279, 42, 1, 'SK', 26, 2, 2011),
(280, 168, 5, 'SK', 26, 2, 2011),
(281, 169, 5, 'D', 26, 2, 2011),
(282, 170, 5, 'H', 26, 2, 2011),
(283, 171, 5, 'B', 26, 2, 2011),
(284, 172, 5, 'A', 26, 2, 2011),
(285, 173, 5, 'I', 26, 2, 2011),
(286, 174, 5, 'S', 26, 2, 2011),
(287, 175, 5, 'I', 26, 2, 2011),
(288, 176, 5, 'A', 26, 2, 2011),
(289, 177, 5, 'B', 26, 2, 2011),
(290, 178, 5, 'H', 26, 2, 2011),
(291, 179, 5, 'D', 26, 2, 2011),
(292, 180, 5, 'SK', 26, 2, 2011),
(293, 181, 5, 'D', 26, 2, 2011),
(294, 182, 5, 'H', 26, 2, 2011),
(295, 183, 5, 'B', 26, 2, 2011),
(296, 184, 5, 'A', 26, 2, 2011),
(297, 185, 5, 'I', 26, 2, 2011),
(298, 186, 5, 'S', 26, 2, 2011),
(299, 187, 5, 'I', 26, 2, 2011),
(300, 188, 5, 'A', 26, 2, 2011),
(301, 189, 5, 'B', 26, 2, 2011),
(302, 190, 5, 'H', 26, 2, 2011),
(303, 191, 5, 'D', 26, 2, 2011),
(304, 192, 5, 'SK', 26, 2, 2011),
(305, 193, 5, 'D', 26, 2, 2011),
(306, 194, 5, 'H', 26, 2, 2011),
(307, 195, 5, 'B', 26, 2, 2011),
(308, 196, 5, 'A', 26, 2, 2011),
(309, 197, 5, 'I', 26, 2, 2011),
(310, 198, 5, 'S', 26, 2, 2011),
(311, 199, 5, 'I', 26, 2, 2011),
(312, 200, 5, 'A', 26, 2, 2011),
(313, 201, 5, 'B', 26, 2, 2011),
(314, 202, 5, 'H', 26, 2, 2011),
(315, 203, 5, 'D', 26, 2, 2011),
(316, 204, 5, 'SK', 26, 2, 2011),
(317, 205, 5, 'D', 26, 2, 2011),
(318, 206, 5, 'H', 26, 2, 2011),
(319, 207, 5, 'B', 26, 2, 2011),
(320, 208, 5, 'A', 26, 2, 2011),
(321, 244, 7, 'SK', 28, 2, 2011),
(322, 245, 7, 'H', 28, 2, 2011),
(323, 246, 7, 'H', 28, 2, 2011),
(324, 247, 7, 'SK', 28, 2, 2011),
(325, 248, 7, 'SK', 28, 2, 2011),
(326, 249, 7, 'SK', 28, 2, 2011),
(327, 250, 7, 'SK', 28, 2, 2011),
(328, 251, 7, 'SK', 28, 2, 2011),
(329, 252, 7, 'SK', 28, 2, 2011),
(330, 253, 7, 'SK', 28, 2, 2011),
(331, 254, 7, 'SK', 28, 2, 2011),
(332, 255, 7, 'SK', 28, 2, 2011),
(333, 256, 7, 'SK', 28, 2, 2011),
(334, 257, 7, 'SK', 28, 2, 2011),
(335, 258, 7, 'SK', 28, 2, 2011),
(336, 259, 7, 'SK', 28, 2, 2011),
(337, 260, 7, 'SK', 28, 2, 2011),
(338, 261, 7, 'SK', 28, 2, 2011),
(339, 262, 7, 'SK', 28, 2, 2011),
(340, 263, 7, 'SK', 28, 2, 2011),
(341, 264, 7, 'SK', 28, 2, 2011),
(342, 265, 7, 'SK', 28, 2, 2011),
(343, 266, 7, 'SK', 28, 2, 2011),
(344, 267, 7, 'SK', 28, 2, 2011),
(345, 268, 7, 'SK', 28, 2, 2011),
(346, 269, 7, 'SK', 28, 2, 2011),
(347, 270, 7, 'SK', 28, 2, 2011),
(348, 271, 7, 'SK', 28, 2, 2011),
(349, 272, 7, 'SK', 28, 2, 2011),
(350, 273, 7, 'SK', 28, 2, 2011),
(351, 274, 7, 'SK', 28, 2, 2011),
(352, 275, 7, 'SK', 28, 2, 2011),
(353, 276, 7, 'SK', 28, 2, 2011),
(354, 277, 7, 'SK', 28, 2, 2011),
(355, 278, 7, 'SK', 28, 2, 2011),
(356, 520, 16, 'H', 1, 3, 2011),
(357, 521, 16, 'B', 1, 3, 2011),
(358, 522, 16, 'D', 1, 3, 2011),
(359, 523, 16, 'SK', 1, 3, 2011),
(360, 524, 16, 'SK', 1, 3, 2011),
(361, 525, 16, 'SK', 1, 3, 2011),
(362, 526, 16, 'SK', 1, 3, 2011),
(363, 527, 16, 'SK', 1, 3, 2011),
(364, 528, 16, 'SK', 1, 3, 2011),
(365, 529, 16, 'SK', 1, 3, 2011),
(366, 530, 16, 'SK', 1, 3, 2011),
(367, 531, 16, 'SK', 1, 3, 2011),
(368, 532, 16, 'SK', 1, 3, 2011),
(369, 533, 16, 'SK', 1, 3, 2011),
(370, 534, 16, 'SK', 1, 3, 2011),
(371, 535, 16, 'SK', 1, 3, 2011),
(372, 536, 16, 'SK', 1, 3, 2011),
(373, 537, 16, 'SK', 1, 3, 2011),
(374, 538, 16, 'SK', 1, 3, 2011),
(375, 539, 16, 'SK', 1, 3, 2011),
(376, 540, 16, 'SK', 1, 3, 2011),
(377, 541, 16, 'SK', 1, 3, 2011),
(378, 542, 16, 'SK', 1, 3, 2011),
(379, 543, 16, 'SK', 1, 3, 2011),
(380, 544, 16, 'SK', 1, 3, 2011),
(381, 545, 16, 'SK', 1, 3, 2011),
(382, 546, 16, 'SK', 1, 3, 2011),
(383, 547, 16, 'SK', 1, 3, 2011),
(384, 548, 16, 'SK', 1, 3, 2011),
(385, 549, 16, 'SK', 1, 3, 2011),
(386, 550, 16, 'SK', 1, 3, 2011),
(387, 551, 16, 'SK', 1, 3, 2011),
(388, 552, 16, 'SK', 1, 3, 2011),
(389, 553, 16, 'SK', 1, 3, 2011),
(390, 554, 16, 'SK', 1, 3, 2011),
(391, 555, 16, 'SK', 1, 3, 2011),
(392, 556, 16, 'SK', 1, 3, 2011),
(393, 557, 16, 'SK', 1, 3, 2011);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agenda`
--

CREATE TABLE IF NOT EXISTS `tbl_agenda` (
  `id_agenda` int(5) NOT NULL,
  `tema_agenda` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `tema_agenda`, `isi`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `tempat`, `jam`, `keterangan`) VALUES
(1, 'Penerimaan Raport Semester Ganjil Tahun Ajaran 2010-2011', 'Berakhirnya semester ganjil tahun pelajaran 2010-2011, ditandai dengan pembagian laporan hasil belajar.', '2010-12-23', '2010-12-23', '2010-12-22', 'SMA Negeri 1 Wongsorejo', '07.30 WIB - 12.00 WIB', 'Untuk kelas XI dan XII, pembagian raport dimulai pukul 07.30 WIB. Sedangkan untuk kelas X pada pukul 09.00 WIB. Raport diambil oleh orang tua/wali murid masing-masing.'),
(2, 'Peluncuran Website Resmi SMA Negeri 1 Wongsorejo', 'Peluncuran website resmi dari SMA Negeri 1 Wongsorejo, sebagai media informasi dan akademik online untuk pelayanan pendidikan yang lebih baik kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat.', '2010-12-23', '2010-12-24', '2010-12-22', 'SMA Negeri 1 Wongsorejo', '07.30 WIB - 12.00 WIB', '-'),
(3, 'Penyembelihan Hewan Kurban Idul Adha 2010', 'Idul Adha yang biasa disebut lebaran haji atapun lebaran kurban sangat identik dengan penyembelihan hewan kurban. SMA Negeri 1 Wongsorejo tahun ini juga melakukan penyembelihan hewan kurban. Yang rencananya akan dihadiri oleh guru-guru, siswa dan pengurus OSIS.', '2012-11-17', '2012-11-17', '2010-11-15', 'SMA Negeri 1 Wongsorejo', '07.30 WIB - 14.00 WIB', 'Dihadiri oleh guru-guru, siswa dan pengurus OSIS.s'),
(5, '345345', '345345', '2015-06-24', '2015-06-24', '2015-06-24', '43', '435', '345345'),
(6, '34', '', '2015-06-24', '2015-06-24', '2015-06-24', '434', '5', ''),
(7, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '43', '34', '4'),
(8, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(9, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(10, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(11, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(12, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(13, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(14, '', '', '2015-06-24', '2015-06-24', '2015-06-24', '', '', ''),
(15, '45', '345', '0000-00-00', '0000-00-00', '2015-06-24', '345', '345', ''),
(16, '4356', '34563456', '0000-00-00', '0000-00-00', '2015-06-24', '4356', '3456', ''),
(17, '4356', 'q34234', '0000-00-00', '0000-00-00', '2015-06-24', '4356', '3456', ''),
(18, '2q34', 'ddddddddddddddddd', '0000-00-00', '0000-00-00', '2015-06-24', 'ddddddddddddddddddddddddddddd', '234', ''),
(19, '4534', '435', '0000-00-00', '0000-00-00', '2015-06-24', '345', '3245', '345'),
(20, '4534', '345', '0000-00-00', '0000-00-00', '2015-06-24', '345', '3245', ''),
(21, '4534', '345', '0000-00-00', '0000-00-00', '2015-06-24', 'fffffffffffffffffff', '3245', ''),
(22, '4534', 'w', '0000-00-00', '0000-00-00', '2015-06-24', 'fffffffffffffffffff', '3245', ''),
(23, '0', '', '0000-00-00', '0000-00-00', '2015-06-24', '0', '0', ''),
(24, '0', '', '0000-00-00', '0000-00-00', '2015-06-24', '0', '0', ''),
(25, 'jaenudin', 'dkdkd', '0000-00-00', '0000-00-00', '2015-11-30', 'kdklf', 'wrew', 'wrew'),
(26, '', '', '0000-00-00', '0000-00-00', '2015-12-24', '', '', ''),
(27, 'rantau', '23', '0000-00-00', '0000-00-00', '2016-02-03', '23', '2323', '2323'),
(28, 'rantau', '2323', '0000-00-00', '0000-00-00', '2016-02-03', '23', '2323', ''),
(29, 'jaenudin', '234234', '0000-00-00', '0000-00-00', '2016-02-03', '234', '234', '234234'),
(30, 'jaenudin', '234234', '0000-00-00', '0000-00-00', '2016-02-03', '234', '234', ''),
(31, 'jaenudin', '', '0000-00-00', '0000-00-00', '2016-02-03', 'jaenudin', '234', ''),
(32, 'jaenudin', 'jaenudin', '0000-00-00', '0000-00-00', '2016-02-03', 'jaenudin', 'jaenudin', ''),
(33, 'jaenudin', '', '0000-00-00', '0000-00-00', '2016-02-03', 'jaenudin', 'jaenudin', ''),
(34, '2q2323', '12313', '0000-00-00', '0000-00-00', '2016-02-10', '123', '123123', '123123123'),
(35, '2323', 'weeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '0000-00-00', '0000-00-00', '2016-02-11', 'wewe', 'wqeqwe', 'qweqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album_galeri`
--

CREATE TABLE IF NOT EXISTS `tbl_album_galeri` (
  `id_album` int(10) NOT NULL,
  `nama_album` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_album_galeri`
--

INSERT INTO `tbl_album_galeri` (`id_album`, `nama_album`) VALUES
(1, 'Kegiatan Belajar Siswa-Siswi'),
(2, 'Hari Raya Kurban - Idul Adha 2010'),
(7, 'wwwww');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE IF NOT EXISTS `tbl_berita` (
  `id_berita` int(3) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `author` varchar(20) NOT NULL,
  `counter` int(3) NOT NULL,
  `status_app` char(2) NOT NULL,
  `kawasan` int(20) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `isi`, `gambar`, `tanggal`, `waktu`, `author`, `counter`, `status_app`, `kawasan`, `rating`) VALUES
(98, 'kerajunan di tanah abang ', '<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif&nbsp;</p>', 'IMG_20160101_085750.jpg', '2016-02-11', '12:11:00', 'jaenudin', 1, '02', 2, 0),
(102, 'banjir di jakarta', '<p>&nbsp;</p>\n<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif</p>\n<p>Dr. &nbsp;Azhar &nbsp;Susanto, &nbsp;Mbus, &nbsp;Ak&nbsp;&nbsp;&nbsp;&nbsp; menjelaskan &nbsp;dalam &nbsp;buku &nbsp;berjudul &nbsp;Sistem Informasi Manajemen Konsep dan Pengembangannya yaitu &ldquo;perancangan adalah spesifikasi &nbsp;umum dan terinci dari pemecahan &nbsp;masalah&nbsp; berbasis&nbsp; komputer &nbsp;yang telah dipilih selama tahap analisis&rdquo;. &nbsp;(Susanto,  2004)</p>\n<p>Berdasarkan &nbsp;dua&nbsp; definisi &nbsp;perancangan &nbsp;tersebut, &nbsp;maka &nbsp;penulis &nbsp;dapat menyimpulkan &nbsp;bahwa &nbsp;perancangan &nbsp;merupakan &nbsp;suatu&nbsp; alternatif &nbsp;untuk memecahkan &nbsp;masalah dan yang dipilih selama tahap analisis dalam pemecahan masalah yang dihadapi perusahaan.</p>', '151208-204511.jpg', '2016-02-11', '02:25:00', 'jaenudin', 1, '02', 2, 0),
(99, 'kebakaran di bogor', '<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif&nbsp;</p>', 'IMG_20160101_085753.jpg', '2016-02-11', '12:12:00', 'jaenudin', 1, '02', 3, 0),
(100, 'Remaja tawuran', '<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif&nbsp;</p>', '554857605-jellyfish.jpg', '2016-02-11', '12:13:00', 'jaenudin', 1, '02', 2, 0),
(101, 'Judi di cileungsi', '<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif&nbsp;</p>', '1012434259-chrysanthemum.jpg', '2016-02-11', '12:14:00', 'jaenudin', 1, '02', 1, 0),
(103, 'jakarta', '<p>&nbsp;</p>\n<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif</p>\n<p>Dr. &nbsp;Azhar &nbsp;Susanto, &nbsp;Mbus, &nbsp;Ak&nbsp;&nbsp;&nbsp;&nbsp; menjelaskan &nbsp;dalam &nbsp;buku &nbsp;berjudul &nbsp;Sistem Informasi Manajemen Konsep dan Pengembangannya yaitu &ldquo;perancangan adalah spesifikasi &nbsp;umum dan terinci dari pemecahan &nbsp;masalah&nbsp; berbasis&nbsp; komputer &nbsp;yang telah dipilih selama tahap analisis&rdquo;. &nbsp;(Susanto,  2004)</p>\n<p><strong>Berdasarkan &nbsp;dua&nbsp; definisi &nbsp;perancangan &nbsp;tersebut, &nbsp;maka &nbsp;penulis &nbsp;dapat menyimpulkan &nbsp;bahwa &nbsp;perancangan &nbsp;merupakan &nbsp;suatu&nbsp; alternatif &nbsp;untuk memecahkan &nbsp;masalah dan yang dipilih selama tahap analisis dalam pemecahan masalah yang dihadapi perusahaan.</strong></p>', 'welcome.jpg', '2016-02-11', '02:26:00', 'jaenudin', 1, '02', 1, 0),
(104, '34324', '<p>23234</p>', '151208-204558.jpg', '2016-02-11', '03:05:00', 'jaenudin', 1, '02', 2, 0),
(105, '34324', '<p>234234</p>', '151208-204511.jpg', '2016-02-11', '03:06:00', 'jaenudin', 1, '02', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE IF NOT EXISTS `tbl_data` (
  `id_data` int(11) NOT NULL,
  `content` text NOT NULL,
  `data_id` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id_data`, `content`, `data_id`) VALUES
(1, '<p><span style="font-size: small;"><strong>Visi Sekolah</strong></span><br /><br /> Dalam merumuskan visi, pihak-pihak yang terkait (stakeholders) melakukan musyawarah sehingga visi tersebut benar-benar mewakili aspirasi semua pihak yang terkait. Harapannya, semua pihak yang terkait dalam kegiatan pembelajaran (guru, karyawan, peserta didik dan wali murid) benar-benar menyadari visi tersebut untuk selanjutnya memegang komitmen terhadap visi yang telah disampaikan bersama. Adapun visi SMA Negeri 1 Wongsorejo adalah  "disenangi, mandiri, berprestasi dan mantap dalam IMTAQ"<br /><br /> <span style="font-size: small;"><strong>Misi Sekolah</strong></span><br /><br /> Untuk mencapai visi sebagai sekolah yang disenangi, mandiri dan berprestasi serta mantap dalam IMTAQ, maka perlu dilakukan suatu misi berupa kegiatan  jangka panjang dengan arah yang jelas dan sistematis. Berikut misi SMA Negeri</p>\n<ol>\n<li>Menyiapkan generasi yang unggul dalam bidang imtek dan iptek</li>\n<li>Menumbuhkan penghayatan terhadap ajaran agama sehingga terbangun insane yang cerdas, cendekia, berbudi pekerti yang luhur dan berakhlak mulia.</li>\n<li>Membentuk sumber daya manusia yang aktif, kreatif, inovatif dan berprestasi sesuai dengan perkembangan zaman</li>\n<li>Membangun citra sekolah sebagai mitra terpercaya</li>\n<li>Melaksanakan pembelajaran yang efektif</li>\n<li>Menyediakan sarana dan prasarana yang diperlukan dalam kegiatan belajar siswa untuk mendukung pengembangan potensi pesrta didik agar berkembang secara optimal</li>\n<li>Memberikan jaminan pelayanan yang prima dalam berbagai hal untuk mendukung proses belajar dan bekerja yang harmonis dan selaras</li>\n</ol>', '1.2'),
(2, '<b>Tujuan</b><br><br>\r\nTujuan SMA Negeri 1 Wongsorejo dijabarkan berdasarkan tujuan umum pendidikan, visi dan misi sekolah. Berdasarkan tiga hal tersebut, dapat dijabarkan tujuan dari SMA Negeri 1 Wongsorejo adalah <br><br>\r\n<ol>\r\n<li>Terdepan, Terbaik, dan Terpercaya dalam hal ketakwaan terhadap Tuhan Yang Maha Esa</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam pengembangan potensi, kecerdasan dan minat </li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam perolehan Nilai UAN </li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam persaingan masuk jenjang Perguruan Tinggi dan Dunia Kerja</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam membekali peserta didik agar memiliki keterampilan teknologi informasi dan komunikasi serta mampu mengembangkan diri secara mandiri.</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam persaingan secara global</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam pelayanan</li>\r\n</ol>\r\n\r\n', '1.4'),
(3, '230', 'counter'),
(4, '<table width="460" border="0" cellpadding="0" cellspacing="0">\r\n  <!--DWLayoutTable-->\r\n  <tr>\r\n    <td width="80" height="25" align="left" valign="middle">Ketua </td>\r\n    <td width="15" align="center" valign="middle">:</td>\r\n    <td colspan="3" align="left" valign="middle">Drs. Istu Handono</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle">Wakil Ketua </td>\r\n    <td align="center" valign="middle">:</td>\r\n    <td width="181" align="left" valign="middle">Sukardi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>\r\n  <td colspan="2" valign="middle">(Wakasek Kesiswaan)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Dra. Ni Wayan  Sedariasih </td>\r\n    <td colspan="2" valign="middle">(Wakasek Kurikulum)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Drs. Kuntohadi </td>\r\n    <td colspan="2" valign="middle">(Wakasek Humas)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Drs. Priyo Suyitno</td>\r\n    <td colspan="2" valign="middle">(Wakasek Sapra)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Drs. Katiman&nbsp;&nbsp; </td>\r\n    <td colspan="2" valign="middle">(Pembina OSIS)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Sri Purwanti</td>\r\n    <td colspan="2" valign="middle">(Ass. Kurikulum</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Drs. Ahmad&nbsp;&nbsp;&nbsp; </td>\r\n    <td colspan="2" valign="middle">(Ass. Sarpra)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Drs. Edy Purdiyanto</td>\r\n    <td colspan="2" valign="middle">(Ass. Humas)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Drs. Edy Suparnadi</td>\r\n    <td colspan="2" valign="middle">(Litbang)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Nandi Suhaili&nbsp; </td>\r\n    <td colspan="2" valign="middle">(Bendahara OSIS)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td align="left" valign="middle">Widi Nugrahani</td>\r\n    <td colspan="2" valign="middle">(Bendahara UKS)</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" align="left" valign="middle">Anggota</td>\r\n    <td align="center" valign="middle">:</td>\r\n    <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Ketaqwaan Terhadap  Tuhan Yang Maha Esa</td>\r\n    <td width="130" valign="middle">Drs. Kuntohadi</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Kehidupan Berbangsa  dan Bernegara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>\r\n    <td valign="middle">Drs. Priyo Suyitno</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Kepribadian dan Budi  Pekerti Luhur </td>\r\n    <td valign="middle">Supriyadi</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Berorganisasi  Pendidikan Politik dan Kepemimpinan</td>\r\n    <td valign="middle">Drs. Edy Purdiyanto</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Keterampilan dan  Kewiraswastaan</td>\r\n    <td valign="middle">Mujiati, S.Pd</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Persepsi, Apresiasi  dan Kreasi Seni</td>\r\n    <td valign="middle">Sri Purwanti, S.Kar</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Kesegaran Jasmani dan  Daya Kreasi&nbsp; </td>\r\n    <td valign="middle">Asnawi, S.Pd</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="25" colspan="4" align="left" valign="middle">Pendidikan  Pendahuluan Bela Negara</td>\r\n    <td valign="middle">Drs. Abdus Syakur</td>\r\n  </tr>\r\n  <tr>\r\n    <td height="1"></td>\r\n    <td></td>\r\n    <td></td>\r\n    <td width="54"></td>\r\n    <td></td>\r\n  </tr>\r\n</table>', '3.1'),
(5, '<p>Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita.<br />Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman. Hal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi SMA Negeri 1 Wongsorejo, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.<br /><br /> Dalam sebuah sistem ketata kelolaan Sekolah Berbasis Manajemen, kami berusaha terus meningkatkan kinerja dan profesionalisme  demi terwujudnya pelayanan prima dalam cakupan Lembaga Pendidikan terutama di SMA Negeri 1 Wongsorejo ini. Kami sudah mulai menerapkan sistem Teknologi Komputerisasi agar transparansi pengelolaan pendidikan terjaga optimalisasinya.<br />Sebuah sistem akan bermanfaat dan berdaya guna tinggi jika didukung dan direalisasikan oleh semua komponen yang berkompeten di SMA Negeri 1 Wongsorejo baik sistem manajerial, akademik, pelayanan publik, prestasi,moralitas dan semua hal yang berinteraksi di dalamnya. Alhamdulilah peningkatan tersebut dapat dilihat dari data-data kepegawaian dan karya-karya nyata yang telah dihasilkan walaupun masih ada kelemahan yang terus kami treatment dengan menyeimbangkan hasil kinerja dan prize yang diberikan. Mudah-mudahan semua yang kita berikan untuk kemajuan dan keajegan nilai-nilai pendidikan dapat terus meningkat.<br /><br /> Secara pribadi saya mohon maaf, jika pemenuhan tuntutan dan kinerja yang saya lakukan masih ada kelemahan. Oleh karena itu, bantuan dan kerjasama dari berbagai pihak untuk optimalisasi mutu dan kualitas pendidikan sangat saya harapkan. Mudah-mudahan dalam tiap langkah dan nafas kita menciptakan nilai jual yang tinggi bagi keilmuan dan nilai hakiki di hadapan Tuhan Yang Maha Esa. <br />Demikian sambutan ini saya sampaikan, ditutup dengan pesan moral dan keilmuan bagi kita semua.</p>\n<p><br /><br /> Kepala SMA Negeri 1 Wongsorejoo<br /><br /><br /><br /> <span style="text-decoration: underline;"><strong>Drs. Istu Handono</strong></span></p>', '1.1'),
(6, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '1.3'),
(7, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '1.5'),
(8, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '2.1'),
(9, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '2.2'),
(10, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '3.2'),
(11, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '3.3'),
(12, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '4.2'),
(13, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.1'),
(14, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.2'),
(15, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.3'),
(16, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.4'),
(17, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.5'),
(18, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.6'),
(19, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.7'),
(20, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.8'),
(21, '<p>Belum ada konten..!!!<br /> Silakan anda kunjungi halaman ini beberapa saat lagi</p>\n<p><img title="Bunga Di Tepi Jalan" src="../../../media/image/imgthumb/hydrangeas.jpg" alt="Bunga Di Tepi Jalan" width="230" height="160" /></p>', '6.9'),
(22, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.10'),
(23, 'Belum ada konten..!!!<br>\r\nSilakan anda kunjungi halaman ini beberapa saat lagi', '6.11'),
(24, 'Halaman akan diarahkan ke Sistem Rekap <br>Absensi Harian Siswa...\r\nPlease Wait..!!!', '5.1'),
(27, '<p>Akan diadakan Tes Potensi Akademik (TPA)</p>', '5.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_download`
--

CREATE TABLE IF NOT EXISTS `tbl_download` (
  `id_download` int(5) NOT NULL,
  `judul_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `author` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tbl_download`
--

INSERT INTO `tbl_download` (`id_download`, `judul_file`, `nama_file`, `tgl_posting`, `author`) VALUES
(1, 'Absensi Siswa 2010-2011', '787226257Absen_2010_-_2011_edit.xls', '2010-12-29', 'wayansedariasih'),
(11, 'Absensi Siswa Tahun Ajaran 2010-2011', '918529572Distribusi_2010_-_2011_B._Yayik.xls', '2010-12-29', 'istu'),
(12, 'Absensi Siswa 2010-2011', '675735311hasil_survei.xls', '2010-12-29', 'istu'),
(13, 'E-Book 11 Langkah Memahami C#', '1169337824SO_SII_1.pdf', '2011-02-24', 'de_lumbung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE IF NOT EXISTS `tbl_galeri` (
  `id_foto` int(10) NOT NULL,
  `id_album` int(10) NOT NULL,
  `foto_kecil` varchar(100) NOT NULL,
  `foto_besar` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_foto`, `id_album`, `foto_kecil`, `foto_besar`) VALUES
(1, 3, 'small-foto-1.jpg', 'big-foto-1.jpg'),
(2, 3, 'small-foto-2.jpg', 'big-foto-2.jpg'),
(3, 3, 'small-foto-3.jpg', 'big-foto-3.jpg'),
(4, 3, 'small-foto-4.jpg', 'big-foto-4.jpg'),
(5, 3, 'small-foto-5.jpg', 'big-foto-5.jpg'),
(6, 2, 'small-foto-6.jpg', 'big-foto-6.jpg'),
(7, 2, 'small-foto-7.jpg', 'big-foto-7.jpg'),
(8, 2, 'small-foto-8.jpg', 'big-foto-8.jpg'),
(9, 2, 'small-foto-9.jpg', 'big-foto-9.jpg'),
(10, 2, 'small-foto-10.jpg', 'big-foto-10.jpg'),
(11, 2, 'small-foto-11.jpg', 'big-foto-11.jpg'),
(12, 2, 'small-foto-12.jpg', 'big-foto-12.jpg'),
(13, 1, 'small-foto-13.jpg', 'big-foto-13.jpg'),
(14, 1, 'small-foto-14.jpg', 'big-foto-14.jpg'),
(15, 1, 'small-foto-15.jpg', 'big-foto-15.jpg'),
(16, 1, 'small-foto-16.jpg', 'big-foto-16.jpg'),
(17, 1, 'small-foto-17.jpg', 'big-foto-17.jpg'),
(18, 1, 'small-foto-18.jpg', 'big-foto-18.jpg'),
(19, 1, 'small-foto-19.jpg', 'big-foto-19.jpg'),
(20, 5, 'small-foto-20.jpg', 'big-foto-20.jpg'),
(21, 5, 'small-foto-21.jpg', 'big-foto-21.jpg'),
(22, 5, 'small-foto-22.jpg', 'big-foto-22.jpg'),
(26, 5, 'kecil-555080216-5cm.hd720p', '555080216-5cm.hd720p'),
(27, 5, 'kecil-1118545443-1602522_20120414020813.jpg', '1118545443-1602522_20120414020813.jpg'),
(28, 5, 'kecil-1008946689-tulips.jpg', '1008946689-tulips.jpg'),
(29, 5, 'kecil-863173667-tulips.jpg', '863173667-tulips.jpg'),
(30, 3, 'kecil-587284590-jellyfish.jpg', '587284590-jellyfish.jpg'),
(31, 2, 'kecil-538569910-jellyfish.jpg', '538569910-jellyfish.jpg'),
(33, 0, 'kecil-1212635639-jellyfish.jpg', '1212635639-jellyfish.jpg'),
(34, 0, 'kecil-1012434259-chrysanthemum.jpg', '1012434259-chrysanthemum.jpg'),
(35, 0, 'kecil-230476459-hydrangeas.jpg', '230476459-hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE IF NOT EXISTS `tbl_gambar` (
  `id_file` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_description` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `image_size` varchar(20) NOT NULL,
  `uploaded_date` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_file`, `title`, `image_description`, `image_url`, `file_type`, `image_size`, `uploaded_date`) VALUES
(12, 'Penyerahan Buku ajar untuk peserta, Oleh Kepala Dinas Pendidikan Pemuda dan Olahraga & Ketua STIKOM', 'Workshop Linux', 'media/pdf/delpi.pdf', 'pdf', '0', '2011-02-23'),
(13, '435', '3245', 'media/image/imgthumb/lighthouse.jpg', 'pdf', '0', '2015-06-24'),
(14, 'WEER', 'WERWR', 'media/image/imgthumb/151208-204704.jpg', 'image', 'original_size', '2016-02-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawabanpoll`
--

CREATE TABLE IF NOT EXISTS `tbl_jawabanpoll` (
  `id_jawaban_poll` int(3) NOT NULL,
  `id_soal_poll` int(3) NOT NULL,
  `jawaban` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `counter` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tbl_jawabanpoll`
--

INSERT INTO `tbl_jawabanpoll` (`id_jawaban_poll`, `id_soal_poll`, `jawaban`, `counter`) VALUES
(1, 1, 'Kurang', 10),
(2, 1, 'Cukup', 7),
(3, 1, 'Sangat Bagus', 10),
(4, 1, 'Tidak Tahu', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `tahun_ajaran`) VALUES
(1, 'X.1', '2010/2011'),
(2, 'X.2', '2010/2011'),
(3, 'X.3', '2010/2011'),
(4, 'X.4', '2010/2011'),
(5, 'X.5', '2010/2011'),
(6, 'XI IPA.1', '2010/2011'),
(7, 'XI IPA.2', '2010/2011'),
(8, 'XI IPA.3', '2010/2011'),
(9, 'XI IPS.2', '2010/2011'),
(11, 'XI IPS.1', '2010/2011'),
(12, 'XII IPA.1', '2010/2011'),
(13, 'XII IPA.2', '2010/2011'),
(14, 'XII IPA.3', '2010/2011'),
(15, 'XII IPS.1', '2010/2011'),
(16, 'XII IPS.2', '2010/2011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kepegawaian`
--

CREATE TABLE IF NOT EXISTS `tbl_kepegawaian` (
  `id_kepegawaian` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `kelahiran` varchar(150) NOT NULL,
  `matpel` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kepegawaian`
--

INSERT INTO `tbl_kepegawaian` (`id_kepegawaian`, `nip`, `nama_pegawai`, `kelahiran`, `matpel`, `jk`, `status`, `username`, `password`) VALUES
(1, '196412291989031011', 'jaenudin', 'Malang, 29 Desember 1964', 'PPKN', 'L', 'admin', 'jaenudin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '195704151985031017', 'user', 'Pamekasan, 15 April 1957', 'Ekonomi, Akuntansi', 'L', 'jurnalis', 'adi', 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, '195910111983081003', 'Drs. Kuntohadi, M.Pd.I', 'Banyuwangi, 10 November 1959', 'Pend. Agama Islam', 'L', 'guru', 'kuntohadi', '145f7d3f9a14c17da71f58269a559f51'),
(4, '196604031997032002', 'Sri Purwanti', 'Klaten, 03 April 1966', 'Seni Tari', 'P', 'guru', 'sripurwanti', 'd99669c69d2010136c4f2939ec12e016'),
(5, '19660525199512002', 'Fransisco Maya, S.Pd', 'Timor-Timur, 25 Mei 1966', 'PKn', 'P', 'guru', 'fransiscomaya', '3bbc2b1bb1fed3b95589cde0a97ce390'),
(6, '197110111998021001', 'Agus Suprantiyono, S.Pd', 'Pati, 11 Oktober 1971', 'Fisika', 'L', 'guru', 'agussuprantiyono', 'f590b48dd6c45eec8f0969a7a291b5ef'),
(7, '196502091999032001', 'Ni Wayan Sedariasih', 'Tabanan, 09 Februari 1965', 'Sejarah, Sosiologi', 'P', 'guru', 'wayansedariasih', '90a2d00785194295f5dba7acac7517f5'),
(8, '196705091998021002', 'Abdus Syakur', 'Bondowoso, 09 Mei 1967', 'Matematika', 'L', 'guru', 'abdussyakur', '397e6c0b0abaded911d0376c493e0d62'),
(9, '196509022000031003', 'Samsul, S.Pd', 'Banyuwangi, 02 September 1965', 'Geografi', 'L', 'guru', 'samsul', '6ddcd35687be9a4415e4416a6dd6829e'),
(10, '196606122000032006', 'Husnul Hotimah', 'Banyuwangi, 12 Juni 1966', 'Matematika', 'P', 'guru', 'husnulhotimah', '0bb3a76b2e36715f76f769362fff6196'),
(11, '197009202003122006', 'Mujiati, S.Pd', 'Banyuwangi, 20 September 1970', 'Sosiologi / Kewarganegaraan', 'P', 'guru', 'mujiati', '6f644f6d12df3a3ef6938668a48130ec'),
(12, '197909012003122008', 'Umi Lestari, S.Pd', 'Banyuwangi, 01 September 1979', 'Bahasa Inggris', 'P', 'guru', 'umilestari', '1e398be40df082937f345008f9904570'),
(13, '197511162005012011', 'Sulityowati, S.Pd', 'Banyuwangi, 16 November 1975', 'Bahasa Inggris', 'P', 'guru', 'sulityowati', 'c7a31c51818f708d292867d128ca7f07'),
(14, '196606162006041016', 'Sukardi, S.Pd', 'Banyuwangi, 16 Juni 1966', 'Matematika', 'L', 'guru', 'sukardi', 'f4789943ee2c7f47492dea41ef8289e6'),
(15, '196806102007011033', 'Katiman, S.Pd', 'Banyuwangi, 10 Juni 1968', 'Sejarah / Mulok', 'L', 'guru', 'katiman', 'ca4e33770790fb7cee92227b2ba26292'),
(16, '197506112007012006', 'Nandi Suhaili, S.Pd', 'Banyuwangi, 11 Juni 1975', 'Kimia', 'L', 'guru', 'nandisuhaili', '733e65748f8b2bcbf1cf45513fdc86da'),
(17, '197308022007012006', 'Widi Nugrahani, S.Pd', 'Banyuwangi, 02 Agustus 1973', 'Bahasa Indonesia', 'P', 'guru', 'widinugrahani', '239dfedc4c79fe58a372b27ca247f92a'),
(18, '196409172007011016', 'Drs. Edy Purdiyanto', 'Malang, 17 September 1964', 'Biologi / Fisika', 'L', 'guru', '', ''),
(19, '196309052007011007', 'Drs. Priyo Suyitno', 'Banyuwangi, 05 September 1963', 'Sejarah', 'L', 'guru', '', ''),
(20, '196408252007011007', 'Untung Selamet, S.Pd', 'Karang Sari, 25 Agustus 1964', 'Bahasa Indonesia', 'L', 'guru', '', ''),
(21, '197309192007011013', 'Drs. Zhudi Hermawan', 'Banyuwangi, 19 September 1973', 'Penjaskes', 'L', 'guru', '', ''),
(22, '510234143', 'Dra. Eny Sulistyowati', 'Banyuwangi, 06 November 1963', 'BK', 'P', 'guru', '', ''),
(23, '510234277', 'Drs. Ahmad', 'Banyuwangi, 11 Juli 1967', 'Matematika', 'L', 'guru', '', ''),
(24, '510234292', 'Supriyadi, S.Pd', 'Banyuwangi, 15 Juli 1975', 'Bahasa Inggris', 'L', 'guru', '', ''),
(25, '510234305', 'Dra. Yayik Prakesti', 'Banyuwangi, 25 Mei 1965', 'Biologi', 'P', 'guru', '', ''),
(26, '510234455', 'Drs. Imam Tajuddin', 'Banyuwangi, 16 Juni 1968', 'BK / Bahasa Asing', 'L', 'guru', '', ''),
(27, '510234455', 'Asnawi, S.Pd', 'Banyuwangi, 05 Maret 1963', 'Penjaskes', 'L', 'guru', '', ''),
(28, '-', 'Holifatun Nur Ania', 'Banyuwangi, 08 Januari 1979', 'Mulok', 'P', 'guru', '', ''),
(29, '-', 'Priyo Utomo', 'Banyuwangi, 05 Mei 1971', 'Bahasa Indonesia', 'L', 'guru', '', ''),
(31, '-', 'Etik Kus Endang', 'Banyuwangi, 15 Desember 1978', '-', 'P', 'guru', '', ''),
(32, '-', 'Emi Wati', 'Banyuwangi, 23 Oktober 1968', '-', 'P', 'guru', '', ''),
(33, '-', 'Dian Novita', 'Banyuwangi, 30 November 1984', 'Kimia', 'P', 'guru', '', ''),
(34, '-', 'Yuli Setiyawati', 'Banyuwangi, 15 Juli 1965', '-', 'P', 'guru', '', ''),
(35, '-', 'Etik Lis Andiyani', '-', 'Bahasa Jepang', 'P', 'guru', '', ''),
(36, '195904011989021003', 'Aries Bintang Pranyoto', 'Banyuwangi, 01 April 1959', '-', 'L', 'pegawai', '', ''),
(37, '196701112000032003', 'Fitria Indahati', 'Banyuwangi, 11 Januari 1967', '-', 'P', 'pegawai', '', ''),
(38, '196610141998021004', 'Sudarto', 'Banyuwangi, 14 Oktober 1966', '-', 'L', 'pegawai', '', ''),
(39, '-', 'Suryadi', 'Banyuwangi, 23 Desember 1975', '-', 'L', 'pegawai', '', ''),
(40, '-', 'Salam Wahyudi Umar Said', 'Banyuwangi, 12 Agustus 1969', '-', 'L', 'pegawai', '', ''),
(41, '-', 'Yuliana Aisyah Fitri', 'Banyuwangi, 28 Juli 1985', '-', 'P', 'pegawai', '', ''),
(42, '-', 'Kusniah', 'Banyuwangi, 08 Mei 1988', '-', 'P', 'pegawai', '', ''),
(43, '-', 'Moh. Yusuf', 'Banyuwangi, 20 September 1967', '-', 'L', 'pegawai', '', ''),
(44, '-', 'Ahmad Fauzi', 'Banyuwangi, 12 Agustus 1990', '-', 'L', 'pegawai', '', ''),
(45, '-', 'Gede Suma Wijaya', 'Denpasar, 4 Februari 1991', '-', 'L', 'admin', 'de_lumbung', '751c3e22ea4ed888c7c5edd64a005deb'),
(47, '5', '45', '4356', '4536', 'L', 'guru', '123', '202cb962ac59075b964b07152d234b70'),
(48, '345', '435', '35', '354', 'L', 'pegawai', '123456', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komunitas`
--

CREATE TABLE IF NOT EXISTS `tbl_komunitas` (
  `id_komunitas` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `wilayah` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komunitas`
--

INSERT INTO `tbl_komunitas` (`id_komunitas`, `nama`, `photo`, `keterangan`, `kegiatan`, `wilayah`) VALUES
(17, 'KRETEK', 'big-foto-8.jpg', 'sdsdfsdfsdf', '<p>sdgsdfg</p>', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kreasi`
--

CREATE TABLE IF NOT EXISTS `tbl_kreasi` (
  `id_kreasi` int(3) NOT NULL,
  `judul_kreasi` varchar(100) NOT NULL,
  `isi_kreasi` text NOT NULL,
  `gambar_kreasi` varchar(100) NOT NULL,
  `tanggal_kreasi` date NOT NULL,
  `waktu_kreasi` time NOT NULL,
  `author` varchar(50) NOT NULL,
  `counter` int(3) NOT NULL,
  `status_app` char(2) NOT NULL,
  `category_kreasi` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kreasi`
--

INSERT INTO `tbl_kreasi` (`id_kreasi`, `judul_kreasi`, `isi_kreasi`, `gambar_kreasi`, `tanggal_kreasi`, `waktu_kreasi`, `author`, `counter`, `status_app`, `category_kreasi`) VALUES
(23, 'tetangga', '<p>&nbsp;</p>\n<p>Perancangan&nbsp; menurut John Burch dan Gary Grudnitski yang telah terjemahkan oleh Jogiyanto (2005) dalam bukunya yang berjudul Analisis dan Desain Sistem Informasi adalah &ldquo;desain sistem dapat didefinisikan&nbsp; sebagai penggambaran, perencanaan,&nbsp; dan pembuatan sketsa atau pengaturan dari beberapa elemen yang terpisah dari satu kesatuan yang utuh dan berfungsi&rdquo;. (Jogiyanto, 2005)</p>\n<p>Definisi&nbsp; perancangan &nbsp;menurut Al-Bahra &nbsp;Bin Ladjamudin &nbsp;(2005) yang terdapat dalam&nbsp; buku yang berjudul &nbsp;Analisis &nbsp;dan Desain Sistem Informasi, &nbsp;menjelaskan bahwa &ldquo;perancangan adalah kemampuan untuk membuat beberapa alternatif</p>\n<p>Dr. &nbsp;Azhar &nbsp;Susanto, &nbsp;Mbus, &nbsp;Ak&nbsp;&nbsp;&nbsp;&nbsp; menjelaskan &nbsp;dalam &nbsp;buku &nbsp;berjudul &nbsp;Sistem Informasi Manajemen Konsep dan Pengembangannya yaitu &ldquo;perancangan adalah spesifikasi &nbsp;umum dan terinci dari pemecahan &nbsp;masalah&nbsp; berbasis&nbsp; komputer &nbsp;yang telah dipilih selama tahap analisis&rdquo;. &nbsp;(Susanto,  2004)</p>\n<p>Berdasarkan &nbsp;dua&nbsp; definisi &nbsp;perancangan &nbsp;tersebut, &nbsp;maka &nbsp;penulis &nbsp;dapat menyimpulkan &nbsp;bahwa &nbsp;perancangan &nbsp;merupakan &nbsp;suatu&nbsp; alternatif &nbsp;untuk memecahkan &nbsp;masalah dan yang dipilih selama tahap analisis dalam pemecahan masalah yang dihadapi perusahaan.</p>', '230476459-hydrangeas.jpg', '2016-02-11', '03:23:00', 'jaenudin', 1, '01', 1),
(24, 'Cinta', '<p>&nbsp;</p>\n<p class="Default">Puji syukur saya panjatkan kepada Tuhan Yang Maha Esa, karena atas berkat dan rahmat-Nya, saya dapat menyelesaikan laporan uji kompetensi ini. Penulisan laporan uji kompetensi ini dilakukan dalam rangka memenuhi salah satu syarat untuk mencapai gelar Sarjana Komputer Program Studi Teknik Informatika. Saya menyadari bahwa, tanpa bantuan dan bimbingan dari berbagai pihak, dari masa perkuliahan sampai pada penyusunan laporan uji kompetensi ini, sangatlah sulit bagi saya untuk menyelesaikan laporan uji kompetensi ini. Oleh karena itu, saya mengucapkan terima kasih kepada:</p>\n<p class="Default">&nbsp;</p>\n<p class="Default">Puji syukur saya panjatkan kepada Tuhan Yang Maha Esa, karena atas berkat dan rahmat-Nya, saya dapat menyelesaikan laporan uji kompetensi ini. Penulisan laporan uji kompetensi ini dilakukan dalam rangka memenuhi salah satu syarat untuk mencapai gelar Sarjana Komputer Program Studi Teknik Informatika. Saya menyadari bahwa, tanpa bantuan dan bimbingan dari berbagai pihak, dari masa perkuliahan sampai pada penyusunan laporan uji kompetensi ini, sangatlah sulit bagi saya untuk menyelesaikan laporan uji kompetensi ini. Oleh karena itu, saya mengucapkan terima kasih kepada:</p>\n<p>&gt;</p>', 'IMG_20160101_085750.jpg', '0000-00-00', '08:05:00', 'jaenudin', 1, '02', 2),
(25, 'sefawer', '<p class="Default">&nbsp;</p>\n<p class="Default">Puji syukur saya panjatkan kepada Tuhan Yang Maha Esa, karena atas berkat dan rahmat-Nya, saya dapat menyelesaikan laporan uji kompetensi ini. Penulisan laporan uji kompetensi ini dilakukan dalam rangka memenuhi salah satu syarat untuk mencapai gelar Sarjana Komputer Program Studi Teknik Informatika. Saya menyadari bahwa, tanpa bantuan dan bimbingan dari berbagai pihak, dari masa perkuliahan sampai pada penyusunan laporan uji kompetensi ini, sangatlah sulit bagi saya untuk menyelesaikan laporan uji kompetensi ini. Oleh karena itu, saya mengucapkan terima kasih kepada:</p>', 'IMG_20160101_001410.jpg', '2016-02-11', '08:07:00', 'jaenudin', 1, '01', 2),
(26, 'wwerwer', '<p>Status</p>', 'IMG_20160101_090223_HDR.jpg', '2016-02-11', '08:10:00', 'jaenudin', 1, '02', 2),
(27, 'hedfsdf', '<p>&lt;?php echo base_url() ?&gt;index.php/web/horor</p>', 'big-foto-1.jpg', '2016-02-11', '08:42:00', 'jaenudin', 1, '02', 3),
(28, 'wewqe', '<p>qweqweqwe</p>', '607393772-hydrangeas.jpg', '2016-02-11', '08:43:00', 'jaenudin', 1, '01', 3),
(29, 'wqwqeqwewqe', '<p>weqweqwwqe</p>', 'big-foto-8.jpg', '2016-02-11', '08:53:00', 'jaenudin', 1, '02', 4),
(30, 'hhgffg', '<p>kjhghghgfgfg</p>', 'big-foto-6.jpg', '2016-02-11', '08:56:00', 'jaenudin', 1, '02', 4),
(31, '2q34', '<p>324234324</p>', '230476459-hydrangeas.jpg', '2016-02-11', '08:58:00', 'jaenudin', 1, '01', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` char(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id_parent` char(10) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `id_parent`, `level`) VALUES
('1', 'Profil Sekolah', '0', 0),
('1.1', 'Sambutan Kepala Sekolah', '1', 1),
('1.2', 'Visi dan Misi', '1', 1),
('1.3', 'Sasaran Mutu', '1', 1),
('1.4', 'Tujuan', '1', 1),
('1.5', 'Motto', '1', 1),
('2', 'Fasilitas Sekolah', '0', 0),
('2.1', 'Sarana dan Prasarana', '2', 1),
('2.2', 'Peta Lokasi Sekolah', '2', 1),
('3', 'Pendidik & Tenaga Pendidik', '0', 0),
('3.1', 'Struktur Organisasi Sekolah', '3', 1),
('3.2', 'Kepala Sekolah', '3', 1),
('3.3', 'Komite Sekolah', '3', 1),
('3.4', 'Data Guru', '3', 1),
('3.5', 'Data Pegawai', '3', 1),
('4', 'Kesiswaan', '0', 0),
('4.1', 'Data Siswa', '4', 1),
('4.2', 'Data Prestasi Siswa', '4', 1),
('5', 'Akademik Sekolah', '0', 0),
('5.1', 'Absensi Harian Siswa', '5', 1),
('5.2', 'Info Penerimaan Siswa Baru', '5', 1),
('6', 'Ekstra Kurikuler', '0', 0),
('6.1', 'Sepak Bola', '6', 1),
('6.2', 'Bola Volly', '6', 1),
('6.3', 'Musik', '6', 1),
('6.4', 'Pencinta Alam (PA)', '6', 1),
('6.5', 'PMR', '6', 1),
('6.6', 'Bola Basket', '6', 1),
('6.7', 'Pramuka', '6', 1),
('6.8', 'English Club', '6', 1),
('6.9', 'Pencak Silat', '6', 1),
('6.10', 'Teater', '6', 1),
('6.11', 'Tekwondo', '6', 1),
('7', 'Indexs Berita', '0', 10),
('8', 'Galeri Kegiatan', '0', 10),
('9', 'Pengumuman', '0', 10),
('10', 'Agenda Sekolah', '0', 10),
('11', 'List Download', '0', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_osis`
--

CREATE TABLE IF NOT EXISTS `tbl_osis` (
  `osis_id` int(20) NOT NULL,
  `osis_nama` varchar(50) NOT NULL,
  `osis_kelas` varchar(50) NOT NULL,
  `osis_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_osis`
--

INSERT INTO `tbl_osis` (`osis_id`, `osis_nama`, `osis_kelas`, `osis_jabatan`) VALUES
(1, '3', '7', '232323'),
(2, '1', '1', '2433'),
(3, '244', '1', 'erww'),
(4, '480', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE IF NOT EXISTS `tbl_pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `judul_pengumuman` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi`, `tanggal`, `penulis`) VALUES
(2, 'Libur Semester Ganjil Tahun Ajaran 2010-2011', 'Libur semester ganjil tahun ajaran 2010-2011 dimulai dari tanggal 24 Desember 2010 sampai dengan tanggal 2 Januari 2011.', '2010-12-22', 'admin'),
(3, 'Proses Belajar Mengajar di Semester Genap Tahun Ajaran 2010-2011', 'Setelah libur semester ganjil tahun ajaran 2010-2011, proses belajar mengajar di semester genap tahun ajaran 2010-2011 mulai aktif kembali tanggal 3 Januari 2011.', '2010-12-22', 'admin'),
(4, 'Peresmian dan Launching Website Perdana SMA Negeri 1 Wongsorejo', 'Peresmian dan launching website resmi SMA Negeri 1 Wongsorejo akan diadakan pada hari 23 Desember 2010 pukul 10.00, bertepatan dengan pembagian raport semester ganjil tahun ajaran 2010-2011', '2010-12-22', 'admin'),
(10, 'l;.,k;l', '<p>kljklhjk</p>', '2014-08-25', 'jaenudin'),
(12, 'wer', '<p>ewrewr</p>', '2015-05-31', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'N',
  `tgl_posting` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `id_siswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nis` int(30) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=559 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `id_kelas`, `nis`, `nama_siswa`) VALUES
(1, 1, 1102, 'M. Fhasa Wijaya'),
(2, 1, 1192, 'Adry Tyo Bastiar'),
(3, 1, 1201, 'Aji Dekia Septi Budiana'),
(4, 1, 1211, 'Angga Setiawan'),
(5, 1, 1224, 'Carissa Komalasari'),
(6, 1, 1225, 'Chepy Anggraini'),
(7, 1, 1233, 'Desi Rosita'),
(8, 1, 1235, 'Devira Lelyana Putri'),
(9, 1, 1256, 'Erwin Budiyanto'),
(10, 1, 1258, 'Faisol Andriyanto'),
(11, 1, 1263, 'Firman Adi Prasetyo'),
(12, 1, 1266, 'Fredy Fernando'),
(13, 1, 1268, 'Hadi Eko Romadlan'),
(14, 1, 1276, 'Husnul Khotima'),
(15, 1, 1279, 'Ibnu Katsiar Damasiqi'),
(16, 1, 1280, 'Ida Yuniarsi'),
(17, 1, 1292, 'Jupri Efendi'),
(18, 1, 1299, 'Linda Septianingsih'),
(19, 1, 1303, 'Mahdi Hasan'),
(20, 1, 1310, 'Moh. Rizal Siddiqi'),
(21, 1, 1312, 'Moh. Syarif Hidayatullah'),
(22, 1, 1314, 'Much. Arif Setio Muradani'),
(23, 1, 1315, 'Muhamad Dicky Alamsyah'),
(24, 1, 1317, 'Muhammad Abdurrohman'),
(25, 1, 1323, 'Nanda Leo Riza Azizi'),
(26, 1, 1325, 'Novia Maya Anggraini'),
(27, 1, 1330, 'Orlando Aji Noviandara'),
(28, 1, 1343, 'Rian Sandi Wibowo'),
(29, 1, 1347, 'Rifqi Zainur Rozyi'),
(30, 1, 1349, 'Riski Dwi Agustina'),
(31, 1, 1352, 'Risqa Aprihatiningrum'),
(32, 1, 1353, 'Ristin Ambar Sari'),
(33, 1, 1354, 'Rizal Fathurrahman'),
(34, 1, 1355, 'Rizal Firmansyah Hutama'),
(35, 1, 1356, 'Rizal Hairul Rojikin'),
(36, 1, 1364, 'Shely Mareta Husein'),
(37, 1, 1374, 'Syahrullah Gunawan'),
(38, 1, 1376, 'Tara Miftahurridha M'),
(39, 1, 1380, 'Wavinda Rizki Bastian'),
(40, 1, 1381, 'Wida Purwitarani'),
(41, 1, 1383, 'Yogga Novan Syaputra'),
(42, 1, 1391, 'Yuli Holifatul Koyimah'),
(43, 2, 996, 'Andre Agustin'),
(44, 2, 1194, 'Ahmad Dani Effendi'),
(45, 2, 1198, 'Ahmad Nur Hadi'),
(46, 2, 1204, 'Aliyin Nizan Putri'),
(47, 2, 1214, 'Anis Tri Lusiyani'),
(48, 2, 1217, 'Arif Nur Achwan'),
(49, 2, 1218, 'Arsandika Juni R. H'),
(50, 2, 1220, 'Ayu Cahyaningrum A'),
(51, 2, 1221, 'Ayub Febrila Andhika'),
(52, 2, 1223, 'Beny Azhar Helmy'),
(53, 2, 1227, 'Dahlia Faizatul Aina'),
(54, 2, 1229, 'Danil Azhar Arrofiqi'),
(55, 2, 1230, 'Dea Dewangga S'),
(56, 2, 1231, 'Dedi Kurniawan'),
(57, 2, 1239, 'Diana Permata Sari P'),
(58, 2, 1240, 'Didik Agus Setiawan'),
(59, 2, 1241, 'Dimas Aji Pangestu'),
(60, 2, 1247, 'Dofa Mahdy Firdaus'),
(61, 2, 1257, 'Fadlur Rahman Zaini'),
(62, 2, 1261, 'Fine Fatimah P'),
(63, 2, 1269, 'Halimatus Sya''diah'),
(64, 2, 1281, 'Ifan Riadi'),
(65, 2, 1283, 'Imam Muhlisin'),
(66, 2, 1286, 'Intan Sandi Pertiwi'),
(67, 2, 1290, 'Julianto Danu Wiyasa'),
(68, 2, 1302, 'Maghfiratika Izzatul A'),
(69, 2, 1304, 'Malik Abdul Azis'),
(70, 2, 1311, 'Moh. Saifur Rizal'),
(71, 2, 1320, 'Muhammad Nur Effendi'),
(72, 2, 1324, 'Ninda Rahayu'),
(73, 2, 1335, 'Ratni Ernawati'),
(74, 2, 1339, 'Restu '),
(75, 2, 1346, 'Rifky Dwi Wibowo'),
(76, 2, 1351, 'Risky Harun Arrasyid'),
(77, 2, 1359, 'Salis Ainul Yakin'),
(78, 2, 1365, 'Shita Rohani'),
(79, 2, 1371, 'Suci Oktafiyani Putri'),
(80, 2, 1375, 'Syaiful Basori'),
(81, 2, 1377, 'Tika Meliyati Putri'),
(82, 2, 1382, 'Yeni Wijayanti'),
(83, 2, 1387, 'Yuda Chandra Febriyanto'),
(84, 2, 1393, 'Yuni Safitri'),
(85, 3, 1199, 'Ahmad Suhairi'),
(86, 3, 1202, 'Alfian Chandra Gama'),
(87, 3, 1205, 'Amanda Nur Maulida'),
(88, 3, 1206, 'Amarta Apri Lianto'),
(89, 3, 1207, 'Anandya Faris Utomo'),
(90, 3, 1208, 'Andi Sulistiyono'),
(91, 3, 1209, 'Andri Krisdianto'),
(92, 3, 1219, 'Atia Al Kamila'),
(93, 3, 1238, 'Dhoifatul Khasanah'),
(94, 3, 1246, 'Diya Septigustina'),
(95, 3, 1248, 'Doni Dwi Darma'),
(96, 3, 1252, 'Eko Prianto'),
(97, 3, 1259, 'Fajar Bahari'),
(98, 3, 1265, 'Fitria Hardiyanti'),
(99, 3, 1282, 'Ike Wahyuni'),
(100, 3, 1284, 'Indah Gita Cahyani'),
(101, 3, 1285, 'Indra Jaya Sakti'),
(102, 3, 1291, 'Jumani'),
(103, 3, 1295, 'Krido Prasetyo H'),
(104, 3, 1297, 'Kurnia Utami Susanti'),
(105, 3, 1298, 'Lely Devita Sari'),
(106, 3, 1308, 'Moh. Ainur Rohman'),
(107, 3, 1309, 'Moh. Mukhtar Firdaus'),
(108, 3, 1318, 'Muhammad Idris'),
(109, 3, 1322, 'Nanang Hadi Wijaya'),
(110, 3, 1329, 'Oktavia Handayani'),
(111, 3, 1331, 'Puji Tri Lestari'),
(112, 3, 1334, 'Ragil Astiti'),
(113, 3, 1336, 'Rendi Septian'),
(114, 3, 1337, 'Reni Fitriyani'),
(115, 3, 1340, 'Restu Aji Prabowo'),
(116, 3, 1342, 'Ria Vandiana'),
(117, 3, 1344, 'Rifky Aldiansyah'),
(118, 3, 1357, 'Rozaq'),
(119, 3, 1358, 'Sajiwanto'),
(120, 3, 1361, 'Santi '),
(121, 3, 1363, 'Seicariana Trisna'),
(122, 3, 1370, 'Sriyani Yulis Yesika'),
(123, 3, 1372, 'Sudi Anang Triana'),
(124, 3, 1384, 'Yogi Andriyanto'),
(125, 3, 1389, 'Yudhit Destaria Suwandi'),
(126, 3, 1395, 'Zainul Arifin'),
(127, 4, 1197, 'Ahmad Novrizal'),
(128, 4, 1203, 'Ali Ridhowi'),
(129, 4, 1210, 'Andrik Hermanto'),
(130, 4, 1214, 'Apriyadi Pratama'),
(131, 4, 1216, 'Ari Andi Putra'),
(132, 4, 1232, 'Dedy Sufyan'),
(133, 4, 1236, 'Devita Sari'),
(134, 4, 1244, 'Dina Cindy Antika'),
(135, 4, 1245, 'Dita Aprilliani'),
(136, 4, 1251, 'Eka Putri Albianti'),
(137, 4, 1253, 'Eny Tri Hariyanti'),
(138, 4, 1254, 'Erlan Faishal'),
(139, 4, 1255, 'Erwin Apriyanto'),
(140, 4, 1260, 'Feby Retnosari'),
(141, 4, 1262, 'Firman Achmad Sholeh'),
(142, 4, 1271, 'Happy Muchtar'),
(143, 4, 1272, 'Hendra Jadmiko'),
(144, 4, 1274, 'Heni Anggraini'),
(145, 4, 1275, 'Hidayaturrohman'),
(146, 4, 1289, 'Jeniar Cahya Mentari'),
(147, 4, 1294, 'Komang Dendi Tri K'),
(148, 4, 1296, 'Krisbiantoro'),
(149, 4, 1300, 'Lutvi Ivan Pratama'),
(150, 4, 1305, 'Marinda Sagita Dewi'),
(151, 4, 1307, 'Mira Siska Yuliandari'),
(152, 4, 1316, 'Muhamad Ikhsan Yusoef'),
(153, 4, 1321, 'Muhammad Slamet Riadi'),
(154, 4, 1327, 'Nur Rochman Pratama'),
(155, 4, 1328, 'Nutrisia Imansari'),
(156, 4, 1332, 'Purwo Ardiyanto'),
(157, 4, 1348, 'Rio Octa Soeryono'),
(158, 4, 1360, 'Sandi Eka Kurniawan'),
(159, 4, 1366, 'Sintha Trivionata'),
(160, 4, 1367, 'Sisca Riwayati'),
(161, 4, 1373, 'Susy Adella Faradhita'),
(162, 4, 1378, 'Ulul Hidayasah'),
(163, 4, 1388, 'Yuda Eka Putra'),
(164, 4, 1390, 'Yudianto'),
(165, 4, 1392, 'Yuliyatin'),
(166, 4, 1394, 'Yuri Angga Setyamarsa'),
(167, 4, 1397, 'Zerier Atdiyan Mulvi'),
(168, 5, 1193, 'Ageng Fitriyanti'),
(169, 5, 1195, 'Ahmad Fathorrozi'),
(170, 5, 1196, 'Ahmad Fauzan'),
(171, 5, 1200, 'Ahmad Zaini Al Farizi'),
(172, 5, 1212, 'Anggun Sasmito'),
(173, 5, 1215, 'Ardy Ashari'),
(174, 5, 1222, 'Bagus Pebriawan'),
(175, 5, 1226, 'Cici Nanda Safitri'),
(176, 5, 1228, 'Dana Ade Prasdyansyah'),
(177, 5, 1234, 'Desy Risa Amalia'),
(178, 5, 1236, 'Devita Ika Putri Rahayu'),
(179, 5, 1242, 'Dimas Dandy Nirana'),
(180, 5, 1243, 'Dimas Satria Aji'),
(181, 5, 1249, 'Edi Sumariyanto'),
(182, 5, 1250, 'Edy Hariyo Santoso'),
(183, 5, 1264, 'Fitria Anzani'),
(184, 5, 1267, 'Gung Putu Kristian Y'),
(185, 5, 1270, 'Hanif Bachtiar'),
(186, 5, 1273, 'Hendry Prayudi Laksono'),
(187, 5, 1277, 'Husnul Lailiyah'),
(188, 5, 1278, 'I Dewa Ayu Rianja'),
(189, 5, 1287, 'Irfan Joko Prasetyo'),
(190, 5, 1288, 'Isti Lailiya'),
(191, 5, 1293, 'Kholifatur Rosidah'),
(192, 5, 1301, 'M. Fatal Ari'),
(193, 5, 1306, 'Maslahatul Aprillia Ummah'),
(194, 5, 1313, 'Moh. Taufiqi Irwan W'),
(195, 5, 1318, 'Muhammad Ali Wafi'),
(196, 5, 1326, 'Novita Arlan'),
(197, 5, 1333, 'R. Ernest Hemingway P'),
(198, 5, 1338, 'Reni Handayani'),
(199, 5, 1341, 'Rezi Hermawan'),
(200, 5, 1345, 'Rifky Dwi Mariyanto'),
(201, 5, 1350, 'Riskiyana Dewi Yanita'),
(202, 5, 1362, 'Sayu Suci Ariani'),
(203, 5, 1368, 'Siti Rukaiyatul Hasanah'),
(204, 5, 1369, 'Sony Prastyo'),
(205, 5, 1379, 'Wandy Siswanto'),
(206, 5, 1385, 'Yosi Iswahyudi'),
(207, 5, 1386, 'Yourridha Bungaylla'),
(208, 5, 1396, 'Zainur Rofiq'),
(209, 6, 997, 'Andre Maulana Rusadi'),
(210, 6, 978, 'Abdurrahman Wahid'),
(211, 6, 982, 'Ade Rizki Pratama'),
(212, 6, 988, 'Ahmad Arif Setiawan'),
(213, 6, 993, 'Ainur Rofik'),
(214, 6, 1000, 'Anggi Setyowati'),
(215, 6, 1001, 'Anis Abdurrohman'),
(216, 6, 1008, 'Arham Fadhillah'),
(217, 6, 1012, 'Ariska Febrianto'),
(218, 6, 1016, 'Badria Sunata'),
(219, 6, 1022, 'Desza Gita Dwi'),
(220, 6, 1025, 'Dewi Suparyani'),
(221, 6, 1026, 'Dian Mey Wirianti'),
(222, 6, 1027, 'Diana Fatmasari'),
(223, 6, 1036, 'Dwi Wahyuningsih'),
(224, 6, 1040, 'Dwi Wahyu Novita'),
(225, 6, 1042, 'Edwin Juniarto'),
(226, 6, 1044, 'Elfania Arumnia'),
(227, 6, 1047, 'Eni Yuvita'),
(228, 6, 1050, 'Fernando Rasna'),
(229, 6, 1051, 'Fitriyani'),
(230, 6, 1064, 'Ila Nur qur''ani'),
(231, 6, 1092, 'Marentini Fitrias Tituk'),
(232, 6, 1094, 'Marta Kristiani'),
(233, 6, 1098, 'Miftahul Hasanah'),
(234, 6, 1111, 'Niken Retno Dwi'),
(235, 6, 1114, 'Nur Fadhilah'),
(236, 6, 1118, 'Nuzul Ainur Rosyi'),
(237, 6, 1127, 'Retno Ardiyanti'),
(238, 6, 1140, 'Sholi Galih'),
(239, 6, 1144, 'Siti Laili Ngarofatus'),
(240, 6, 1149, 'Suhairi'),
(241, 6, 1176, 'Yuca Erlina'),
(242, 6, 1181, 'Yurike Faradilla'),
(243, 6, 1185, 'Zulfikar Maharditya PP'),
(244, 7, 984, 'Aditya Prasiwijaya'),
(245, 7, 985, 'Agus Setiawan'),
(246, 7, 1004, 'Anisa Hamidatun'),
(247, 7, 1024, 'Dewi Wulandari'),
(248, 7, 1028, 'Diana Wijayanti'),
(249, 7, 1030, 'Dimas Alit Indriya'),
(250, 7, 1031, 'Dimas Slamet'),
(251, 7, 1034, 'Dita Silvi Antika'),
(252, 7, 1038, 'Dwi Langgeng D'),
(253, 7, 1045, 'Ella Dwi Safitri'),
(254, 7, 1048, 'Ervi Listi Eka'),
(255, 7, 1049, 'Fariz Taufik Rohman'),
(256, 7, 1056, 'Gatot Siswandi'),
(257, 7, 1058, 'Halimatus Yulia'),
(258, 7, 1065, 'Ilfa Listiani'),
(259, 7, 1082, 'Linggar Alif A '),
(260, 7, 1084, 'Lucky Eka Putri'),
(261, 7, 1085, 'Lukman Firdaus '),
(262, 7, 1090, 'M. Taufik KD'),
(263, 7, 1093, 'Maria Ulfa'),
(264, 7, 1096, 'Maulana Habib'),
(265, 7, 1107, 'Mulyadi'),
(266, 7, 1108, 'Mumayyizatul Hasanah'),
(267, 7, 1116, 'Nuril Septiana'),
(268, 7, 1135, 'Roni Pratama'),
(269, 7, 1141, 'Siti Asmiyatil'),
(270, 7, 1145, 'Siti Nursamsiyah'),
(271, 7, 1157, 'Taufik Rohman'),
(272, 7, 1168, 'Wahyudi Bagus S'),
(273, 7, 1171, 'Widya Nurrohma'),
(274, 7, 1172, 'Wildam Bilion P.Y'),
(275, 7, 1177, 'Yulia Puspita'),
(276, 7, 1178, 'Yulindawati'),
(277, 7, 1179, 'Yunita Ningsih'),
(278, 7, 1180, 'Yunita Wulandari'),
(279, 8, 980, 'Ahmad Subhan'),
(280, 8, 986, 'Agus Susanto'),
(281, 8, 998, 'Andry Effendi'),
(282, 8, 999, 'Angga Pratama'),
(283, 8, 1006, 'Ardian Yudi P'),
(284, 8, 1009, 'Arif Budi F'),
(285, 8, 1041, 'Dyah Tri Winarti'),
(286, 8, 1046, 'Endi Alfian Insan Kamil'),
(287, 8, 1054, 'Galeh Satriyo Edy'),
(288, 8, 1060, 'Helita Tria D'),
(289, 8, 1063, 'Ika Septi A'),
(290, 8, 1066, 'Ilham Yusena'),
(291, 8, 1069, 'Indah Gita Cahyani'),
(292, 8, 1071, 'Ismi Fatchiyah'),
(293, 8, 1080, 'Lidya Muchtar'),
(294, 8, 1081, 'Linda Sukowati'),
(295, 8, 1084, 'Lucky Rinanda L'),
(296, 8, 1091, 'Moh. Zidqi Hidayat'),
(297, 8, 1095, 'Masrifan D'),
(298, 8, 1105, 'Moh. Hendry Jay Irawan'),
(299, 8, 1115, 'Nur Indah Yanti'),
(300, 8, 1121, 'Prasiska Wahyu P. v'),
(301, 8, 1131, 'Rino Hermanto'),
(302, 8, 1133, 'Rizki Arifta Giovani'),
(303, 8, 1137, 'Rosy Firman'),
(304, 8, 1138, 'Septiana Dewi'),
(305, 8, 1148, 'Sugiyasih'),
(306, 8, 1151, 'Sulikah'),
(307, 8, 1152, 'Sulung Kresna'),
(308, 8, 1155, 'Saiful Arifin'),
(309, 8, 1161, 'Tomi Arif Sumarsono'),
(310, 8, 1170, 'Waril Santoso'),
(311, 8, 1173, 'Williana Eka Rasti'),
(312, 9, 796, 'Arif Rahman Hakim'),
(313, 9, 835, 'Febriana Eka PS'),
(314, 9, 987, 'Ahmad Andi Winoto'),
(315, 9, 991, 'Ahmad Yadi'),
(316, 9, 995, 'Andi Rahmawan'),
(317, 9, 1002, 'Anis Riawati'),
(318, 9, 1007, 'Ardian Yulian Syafitri'),
(319, 9, 1029, 'Diki Kusuma Wardana'),
(320, 9, 1035, 'Dodik Prasetyo W'),
(321, 9, 1037, 'Dwi Aninditya P'),
(322, 9, 1052, 'Frengky Fica Army'),
(323, 9, 1053, 'Fristy Ayu Wahyudi'),
(324, 9, 1057, 'Gusti Nyoman Arni'),
(325, 9, 1061, 'Heri Hermanto'),
(326, 9, 1062, 'Husnul Khotimah'),
(327, 9, 1067, 'Imam Efendi'),
(328, 9, 1068, 'Imam Syafi''i'),
(329, 9, 1072, 'Ismiyati'),
(330, 9, 1070, 'Indra Purnomo'),
(331, 9, 1074, 'Khafid Haqiqi'),
(332, 9, 1076, 'Khoirur Rosyikin'),
(333, 9, 1079, 'Kiki Tri Ardiyanto'),
(334, 9, 1087, 'Lukman Hakim'),
(335, 9, 1089, 'M. Bakir Al Jaelani'),
(336, 9, 1109, 'Nanang Hariyadi'),
(337, 9, 1123, 'Ragil Ardinata'),
(338, 9, 1126, 'Rendi Putut Wijanarko'),
(339, 9, 1129, 'Rifqi Setiawan'),
(340, 9, 1130, 'Rima Liyana'),
(341, 9, 1139, 'Shinta Dwi Maulida'),
(342, 9, 1143, 'Siti Komariah'),
(343, 9, 1147, 'Sugianto '),
(344, 9, 1153, 'Suwondo'),
(345, 9, 1154, 'Syahrul Huda Habib'),
(346, 9, 1156, 'Syamsul Arifin'),
(347, 9, 1159, 'Tia Oktavianti'),
(348, 9, 1164, 'Wahyu Eka Wulandari'),
(349, 9, 1165, 'Wahyu Herdianto'),
(350, 9, 1175, 'Yogi Agung S'),
(351, 11, 802, 'Budi Hartono'),
(352, 11, 891, 'Mohammad Solihin'),
(353, 11, 919, 'Rifqi Febriyanto'),
(354, 11, 981, 'Ade Chandra'),
(355, 11, 983, 'Adi Setiawan'),
(356, 11, 990, 'Ahmad Syarifuddin'),
(357, 11, 992, 'Ahmadi'),
(358, 11, 994, 'Andi Irawan'),
(359, 11, 1010, 'Arif Kushadi'),
(360, 11, 1011, 'Arif Wahyu Tri Sejarah'),
(361, 11, 1013, 'Ariyanto'),
(362, 11, 1021, 'Daifi Ibrahim'),
(363, 11, 1036, 'Dodik Rahman'),
(364, 11, 1055, 'Gatot Bara Agung'),
(365, 11, 1059, 'Hamdan Affandi'),
(366, 11, 1075, 'Khoirul Rizal'),
(367, 11, 1078, 'Kiki Nurfa''iza'),
(368, 11, 1086, 'Lukman Hakiki P'),
(369, 11, 1088, 'Lusiyati'),
(370, 11, 1097, 'Mey Dita Yudastiawan'),
(371, 11, 1099, 'Miftahul Imron'),
(372, 11, 1100, 'Miki Margareta'),
(373, 11, 1101, 'Moh. Ali Imron'),
(374, 11, 1103, 'Moh. Nasikin'),
(375, 11, 1112, 'Miliya Megawati'),
(376, 11, 1117, 'Nurul Hidayat'),
(377, 11, 1119, 'Okky Pangestu'),
(378, 11, 1122, 'Putu Merta Dinata'),
(379, 11, 1124, 'Ramadhani Eka '),
(380, 11, 1128, 'Rifki Rudi H'),
(381, 11, 1134, 'Roni Okfi Satriyo W'),
(382, 11, 1142, 'Siti Hanifah'),
(383, 11, 1146, 'Sofyan Rozy'),
(384, 11, 1150, 'Sulastri Jayanti'),
(385, 11, 1158, 'Teguh Setiyono'),
(386, 11, 1160, 'Tika Mulyani'),
(387, 11, 1163, 'Vici Arwen Dedy'),
(388, 11, 1166, 'Wahyu Setiawan'),
(389, 11, 1182, 'Yusdiana Hana Pratiwi'),
(390, 11, 1184, 'Zainur Fitria A'),
(391, 11, 1190, 'Diana Yahyu'),
(392, 12, 781, 'Akhmad Furqon R'),
(393, 12, 789, 'Anik Dwi F'),
(394, 12, 791, 'Anita Pratiwi'),
(395, 12, 803, 'Budi Septa Rahayu'),
(396, 12, 807, 'Dede Yudha Prakasa'),
(397, 12, 810, 'Dedy Tri Ananda'),
(398, 12, 811, 'Deni Agustian'),
(399, 12, 813, 'Dewi Ajeng A.S'),
(400, 12, 824, 'Elvina Kumala Sari'),
(401, 12, 829, 'Estu Trianani'),
(402, 12, 836, 'Fenty Andriyani. P'),
(403, 12, 841, 'Galih Sukron Insani'),
(404, 12, 849, 'Hidayatur'),
(405, 12, 850, 'Husnul Khotimah'),
(406, 12, 851, 'I Komang Eka S.W.'),
(407, 12, 858, 'Imamatur Nafi''ah'),
(408, 12, 900, 'Novita Andriyani'),
(409, 12, 904, 'Nur Rafita Sari'),
(410, 12, 910, 'Nugroho HPP'),
(411, 12, 923, 'Riska Anggraini'),
(412, 12, 931, 'Rovi Zayyana I'),
(413, 12, 932, 'Rubi Emawati'),
(414, 12, 935, 'Sandi Tamara R'),
(415, 12, 938, 'Septi Manda Sari'),
(416, 12, 944, 'Siti Yulia Mustafida'),
(417, 12, 946, 'Suafis Zulfia MA'),
(418, 12, 964, 'Widiya Astuti'),
(419, 12, 973, 'Zaim Dzuel Hazmy'),
(420, 12, 975, 'Yuli Setyorini'),
(421, 13, 784, 'Anas Mahfud'),
(422, 13, 793, 'Aprilia Sudi Riskiyani'),
(423, 13, 783, 'Anas Adhi Saputra'),
(424, 13, 795, 'Arfienda Riski MW'),
(425, 13, 797, 'Arobin Jaka Mahendra'),
(426, 13, 804, 'Camellia Iveny S.'),
(427, 13, 808, 'Dedy Andriyansyah'),
(428, 13, 816, 'Diana Lia'),
(429, 13, 817, 'Diana Puspita'),
(430, 13, 823, 'Elmy Esra AL Faris'),
(431, 13, 830, 'Eva Rosalina'),
(432, 13, 832, 'Fachrudin Nur'),
(433, 13, 836, 'Firman Hidayatullah'),
(434, 13, 840, 'Friska Dwi M'),
(435, 13, 843, 'Giri Andrea'),
(436, 13, 854, 'Ika Novitasari'),
(437, 13, 875, 'Linda Ayu'),
(438, 13, 884, 'Mastuti Septya Ningrum'),
(439, 13, 887, 'Merry Ratna'),
(440, 13, 898, 'Nova Ratna sari'),
(441, 13, 907, 'Nurmala Setya Abadi'),
(442, 13, 916, 'Rianti Malindo'),
(443, 13, 917, 'Ridha Nur Putri'),
(444, 13, 928, 'Rizqi Yuli A'),
(445, 13, 930, 'Rosalina Mega P'),
(446, 13, 936, 'Santi Wijaya'),
(447, 13, 939, 'Septicia Tawakal'),
(448, 13, 943, 'Siti Marwiyah'),
(449, 14, 777, 'Agustina Utami'),
(450, 14, 786, 'Andri Sucipto'),
(451, 14, 805, 'Cindy Prameswari'),
(452, 14, 806, 'Dea Rinda Aulia'),
(453, 14, 818, 'Diana Putri F.'),
(454, 14, 819, 'Dini Eka Safitri'),
(455, 14, 837, 'Feny Ayu Setyorini'),
(456, 14, 839, 'Fitria Kartika Dewi'),
(457, 14, 842, 'Gilang Eko G.'),
(458, 14, 847, 'Hardianti'),
(459, 14, 860, 'Indah Sri Eva Wulandari'),
(460, 14, 866, 'Ita Lailatul K.'),
(461, 14, 867, 'Ivana Gabriella'),
(462, 14, 873, 'Lia Nurhayati'),
(463, 14, 877, 'Luluk Syarifah H'),
(464, 14, 882, 'Mariana'),
(465, 14, 892, 'M. Arif Alfan Habibi'),
(466, 14, 894, 'Neti Putri Susanti'),
(467, 14, 896, 'Nita Kartika'),
(468, 14, 906, 'Nurlaili Jamil'),
(469, 14, 915, 'Retno Adi Wiangga'),
(470, 14, 921, 'Rifki Ferlian'),
(471, 14, 924, 'Riski Hidayati'),
(472, 14, 926, 'Riski Amalia'),
(473, 14, 927, 'Risky Setiawan'),
(474, 14, 947, 'Sugiarti'),
(475, 14, 949, 'Sultan Amir'),
(476, 14, 950, 'Supartiningsih'),
(477, 14, 963, 'Wahyuni Sara'),
(478, 14, 966, 'Wiwin Nandasari'),
(479, 15, 636, 'Ansori'),
(480, 15, 773, 'Abdul Rozak'),
(481, 15, 776, 'Agus Syaifur Rohman'),
(482, 15, 778, 'Ahmad Husaini'),
(483, 15, 788, 'Anggi Ernawati'),
(484, 15, 792, 'Annasil Fachmi'),
(485, 15, 798, 'Ayu Erawati'),
(486, 15, 814, 'Dewi N.S'),
(487, 15, 815, 'Diana Endang W.'),
(488, 15, 821, 'Eka Sherly Verdia'),
(489, 15, 822, 'Eko Adi Rifanto'),
(490, 15, 827, 'Erwin Maulana Ishaq'),
(491, 15, 831, 'Evry Lia Tri P'),
(492, 15, 834, 'Febri Maulana'),
(493, 15, 854, 'Hendra Wahyudi'),
(494, 15, 865, 'Istiq Farin Bharani'),
(495, 15, 869, 'Karmila '),
(496, 15, 874, 'Lina Puspita Sari'),
(497, 15, 876, 'Lingga Sandy E'),
(498, 15, 881, 'Mahmuda'),
(499, 15, 885, 'Maulidiana'),
(500, 15, 890, 'Moh Rofiq Amin Aziz'),
(501, 15, 902, 'Nur Hasanah'),
(502, 15, 903, 'Nur Hidayah'),
(503, 15, 909, 'Nurul Yatimah'),
(504, 15, 910, 'Oktaf Nurrahman'),
(505, 15, 914, 'Reni Vonita'),
(506, 15, 919, 'Rifqi Afriyanto'),
(507, 15, 925, 'Rhiza Nurika'),
(508, 15, 940, 'Shara Eka Suci'),
(509, 15, 952, 'Susi Indrayanti'),
(510, 15, 958, 'Umi Akroma Safi''i'),
(511, 15, 959, 'Veki Mei Ria'),
(512, 15, 962, 'Wahyudi'),
(513, 15, 970, 'Yulius Anggara'),
(514, 15, 971, 'Yunita Sari'),
(515, 15, 972, 'Yustina Cici A.'),
(516, 15, 977, 'Rini Kusuma'),
(517, 15, 1187, 'Rudi Pranggono'),
(518, 15, 1188, 'Dwi Kukuh'),
(519, 15, 1191, 'Anas Hunaifi Arifin'),
(520, 16, 780, 'Ajimas Rahman'),
(521, 16, 785, 'Andi Purna Irawan'),
(522, 16, 790, 'Anisya Maulidya'),
(523, 16, 800, 'Badrus Samsi'),
(524, 16, 801, 'Bayu Adji Widyatama'),
(525, 16, 820, 'Doni Setiawan'),
(526, 16, 826, 'Erlita Yulianti Putri'),
(527, 16, 846, 'Halimatus Sadiyah'),
(528, 16, 852, 'Icuk Sunyoto'),
(529, 16, 856, 'Imam M Sobirin'),
(530, 16, 857, 'Imamatun Nisa'),
(531, 16, 859, 'Indah Kurnia Ramadhani'),
(532, 16, 861, 'Irawati'),
(533, 16, 863, 'Irfan Firmanda'),
(534, 16, 864, 'Iskandar Ruli Gunawan'),
(535, 16, 868, 'Joko Arindi'),
(536, 16, 871, 'Kiki Firdaus P.'),
(537, 16, 872, 'Leni Suciati'),
(538, 16, 877, 'Luluk Ulmadaniyah'),
(539, 16, 886, 'Melinda'),
(540, 16, 889, 'Moh. Rizki'),
(541, 16, 895, 'Nita Aprilia'),
(542, 16, 899, 'Novi Aditya Setiawan'),
(543, 16, 905, 'Nuril Hamdani'),
(544, 16, 918, 'Ridwan Rahman'),
(545, 16, 922, 'Rinawati'),
(546, 16, 929, 'Rodiyah'),
(547, 16, 933, 'Rudi Hartono'),
(548, 16, 934, 'Samsul Mashur'),
(549, 16, 937, 'Sepki Surya Irawan'),
(550, 16, 942, 'Siti Kholifah'),
(551, 16, 948, 'Suharmawati'),
(552, 16, 953, 'Susiyanto'),
(553, 16, 956, 'Tri Suryo'),
(554, 16, 957, 'Tutus Dewi Wahyuni'),
(555, 16, 965, 'Wita Pratiwi'),
(556, 16, 969, 'Yuliana'),
(557, 16, 1186, 'Sherly Delvita Aurora');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soalpolling`
--

CREATE TABLE IF NOT EXISTS `tbl_soalpolling` (
  `id_soal_poll` int(3) NOT NULL,
  `soal_poll` text COLLATE latin1_general_ci NOT NULL,
  `status` char(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tbl_soalpolling`
--

INSERT INTO `tbl_soalpolling` (`id_soal_poll`, `soal_poll`, `status`) VALUES
(1, 'Bagaimana menurut pendapat anda tentang tampilan website SMAN 1 Wongsorejo ini?', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wilayah`
--

CREATE TABLE IF NOT EXISTS `tbl_wilayah` (
  `id_wialayah` int(11) NOT NULL,
  `wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id_wialayah`, `wilayah`) VALUES
(1, 'qqw'),
(2, 'jakarta timur'),
(3, 'jakarta barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jaenudin', 'T-oaymo8RBlsmfWxGQajnEK-5njbaWVR', '$2y$13$nM5dMIjVih6dMXySZeFNSu66flhQ2lFrqYYrGIngG7CpGhyLp5RfK', NULL, 'jaenudinudin84@gmail.com', 10, 1445687457, 1445687457);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `tbl_album_galeri`
--
ALTER TABLE `tbl_album_galeri`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tbl_download`
--
ALTER TABLE `tbl_download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_jawabanpoll`
--
ALTER TABLE `tbl_jawabanpoll`
  ADD PRIMARY KEY (`id_jawaban_poll`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_kepegawaian`
--
ALTER TABLE `tbl_kepegawaian`
  ADD PRIMARY KEY (`id_kepegawaian`);

--
-- Indexes for table `tbl_komunitas`
--
ALTER TABLE `tbl_komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indexes for table `tbl_kreasi`
--
ALTER TABLE `tbl_kreasi`
  ADD PRIMARY KEY (`id_kreasi`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_osis`
--
ALTER TABLE `tbl_osis`
  ADD PRIMARY KEY (`osis_id`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_soalpolling`
--
ALTER TABLE `tbl_soalpolling`
  ADD PRIMARY KEY (`id_soal_poll`);

--
-- Indexes for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`id_wialayah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=394;
--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_album_galeri`
--
ALTER TABLE `tbl_album_galeri`
  MODIFY `id_album` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_download`
--
ALTER TABLE `tbl_download`
  MODIFY `id_download` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_foto` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_jawabanpoll`
--
ALTER TABLE `tbl_jawabanpoll`
  MODIFY `id_jawaban_poll` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_kepegawaian`
--
ALTER TABLE `tbl_kepegawaian`
  MODIFY `id_kepegawaian` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_komunitas`
--
ALTER TABLE `tbl_komunitas`
  MODIFY `id_komunitas` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_kreasi`
--
ALTER TABLE `tbl_kreasi`
  MODIFY `id_kreasi` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_osis`
--
ALTER TABLE `tbl_osis`
  MODIFY `osis_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=559;
--
-- AUTO_INCREMENT for table `tbl_soalpolling`
--
ALTER TABLE `tbl_soalpolling`
  MODIFY `id_soal_poll` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  MODIFY `id_wialayah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
