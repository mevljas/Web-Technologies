-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 04:33 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restavracija`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dobava`
--

CREATE TABLE `Dobava` (
  `Id_Dobava` int(11) NOT NULL,
  `Kolicina` int(11) DEFAULT NULL,
  `DatumDobave` date DEFAULT NULL,
  `Id_Dobavitelj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Dobava`
--

INSERT INTO `Dobava` (`Id_Dobava`, `Kolicina`, `DatumDobave`, `Id_Dobavitelj`) VALUES
(1, 15, '2013-05-21', 1),
(2, 15, '2017-07-05', 1),
(3, 3, '2017-08-05', 1),
(4, 6, '2017-03-04', 1),
(5, 3, '2017-11-02', 1),
(6, 6, '2017-05-05', 1),
(7, 9, '2017-07-02', 1),
(8, 9, '2017-09-10', 1),
(9, 8, '2017-05-24', 1),
(10, 9, '2017-06-24', 1),
(11, 2, '2017-06-30', 1),
(12, 2, '2017-07-03', 1),
(13, 7, '2017-07-13', 1),
(14, 2, '2017-08-03', 1),
(15, 9, '2017-08-03', 1),
(16, 2, '2017-06-02', 1),
(17, 4, '2017-09-02', 1),
(18, 2, '2017-07-22', 1),
(19, 8, '2017-07-19', 1),
(20, 2, '2017-07-03', 1),
(21, 15, '2013-05-21', 1),
(22, 15, '2017-07-05', 1),
(23, 3, '2017-08-05', 1),
(24, 6, '2017-03-04', 1),
(25, 3, '2017-11-02', 1),
(26, 6, '2017-05-05', 1),
(27, 9, '2017-07-02', 1),
(28, 9, '2017-09-10', 1),
(29, 8, '2017-05-24', 1),
(30, 9, '2017-06-24', 1),
(31, 15, '2013-05-21', 1),
(32, 15, '2017-07-05', 1),
(33, 3, '2017-08-05', 1),
(34, 6, '2017-03-04', 1),
(35, 3, '2017-11-02', 1),
(36, 6, '2017-05-05', 1),
(37, 9, '2017-07-02', 1),
(38, 9, '2017-09-10', 1),
(39, 8, '2017-05-24', 1),
(40, 9, '2017-06-24', 1),
(41, 15, '2013-05-21', 2),
(42, 15, '2017-07-05', 2),
(43, 3, '2017-08-05', 2),
(44, 6, '2017-03-04', 2),
(45, 3, '2017-11-02', 2),
(46, 6, '2017-05-05', 2),
(47, 9, '2017-07-02', 2),
(48, 9, '2017-09-10', 2),
(49, 8, '2017-05-24', 2),
(50, 3, '2017-06-21', 3),
(51, 5, '2017-07-01', 3),
(52, 9, '2017-05-19', 4),
(53, 5, '2017-06-06', 4),
(54, 15, '2013-05-21', 5),
(55, 5, '2017-07-05', 5),
(56, 3, '2017-08-05', 5),
(57, 6, '2017-03-04', 5),
(58, 3, '2017-11-02', 5),
(59, 6, '2017-05-05', 5),
(60, 9, '2017-07-02', 5),
(61, 3, '2017-09-10', 5),
(62, 8, '2017-05-24', 5),
(63, 4, '2017-06-24', 5),
(64, 15, '2013-05-21', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Dobavitelj`
--

CREATE TABLE `Dobavitelj` (
  `Id_Dobavitelj` int(11) NOT NULL,
  `Ime` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Dobavitelj`
--

INSERT INTO `Dobavitelj` (`Id_Dobavitelj`, `Ime`) VALUES
(1, 'Tuš Cash&Carry'),
(2, 'Nektar Natura food'),
(3, 'PITUS'),
(4, 'MESARSTVO BLATNIK'),
(5, 'DEPORTIVO'),
(6, 'Meksiko d.o.o.'),
(7, 'DOBROTE METKA'),
(8, 'VIGROS');

-- --------------------------------------------------------

--
-- Table structure for table `Ima`
--

CREATE TABLE `Ima` (
  `Id_Stranka` int(11) NOT NULL,
  `Id_Popust` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Ima`
--

INSERT INTO `Ima` (`Id_Stranka`, `Id_Popust`) VALUES
(1, 1),
(8, 1),
(18, 1),
(1, 2),
(2, 2),
(6, 2),
(9, 2),
(10, 2),
(3, 3),
(11, 3),
(16, 3),
(2, 4),
(3, 5),
(14, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `izdelki_tus`
-- (See below for the actual view)
--
CREATE TABLE `izdelki_tus` (
`ime` varchar(50)
,`Kolicina` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `Jedilnik`
--

CREATE TABLE `Jedilnik` (
  `Id_Jedilnik` int(11) NOT NULL,
  `Ime` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Cena` decimal(10,2) DEFAULT NULL,
  `Vrsta` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Jedilnik`
--

INSERT INTO `Jedilnik` (`Id_Jedilnik`, `Ime`, `Cena`, `Vrsta`) VALUES
(1, 'Prekajena gosja prsa s tartufi 100 g', '10.00', 'Hladne predjedi'),
(2, 'Krašov pršut z melono 100 g', '8.00', 'Hladne predjedi'),
(3, 'Goveji carpaccio s parmezanom 100 g', '8.00', 'Hladne predjedi'),
(4, 'Žrebičkov carpaccio z ricotto 100 g', '9.00', 'Hladne predjedi'),
(5, 'Tatarski biftek (2 osebi)', '20.00', 'Hladne predjedi'),
(6, 'Jelenov tartar s pehtranom, timijanom in praženimi pistacijami  (2 osebi)', '24.00', 'Hladne predjedi'),
(7, 'Buffalo mozarella z bresaolo, hruško in medom 100 g', '9.00', 'Hladne predjedi'),
(8, 'Hobotnica v solati 100 g', '9.00', 'Hladne predjedi'),
(9, 'Hobotnični carpaccio z jagodami in zelenim poprom 100 g', '9.00', 'Hladne predjedi'),
(10, 'Bacala 100 g', '8.60', 'Hladne predjedi'),
(11, 'Bacala s tartufi 100 g', '10.00', 'Hladne predjedi'),
(12, 'Dimljena zlatovščica s hrenovo terino', '10.00', 'Hladne predjedi'),
(13, 'Gobova juha', '4.00', 'Juhe'),
(14, 'Gobova juha', '4.00', 'Juhe'),
(15, 'Čebulna juha ', '3.50', 'Juhe'),
(16, 'Dnevna juha', '3.00', 'Juhe'),
(17, 'Nadevane bučke z jurčki', '8.40', 'Tople predjedi'),
(18, 'Melancani ali bučke z mocarelo in pelati', '7.00', 'Tople predjedi'),
(19, 'Gratinirana kapesanta 1 kom', '4.00', 'Tople predjedi'),
(20, 'Kapesanta Špajza 1 kom', '4.50', 'Tople predjedi'),
(21, 'Žlikrofi z mavrahi in repki škampov', '12.00', 'Tople predjedi'),
(22, 'Fuži s tartufi', '12.00', 'Tople predjedi'),
(23, 'Domači njoki s z gobami', '9.00', 'Tople predjedi'),
(24, 'Domači špinačni njoki z morsko žabo,  štorovkami in tartufi', '12.00', 'Tople predjedi'),
(25, 'Črna rižota s sipo', '9.00', 'Tople predjedi'),
(26, 'Rižota z repki škampov, žafranom in penino', '10.00', 'Tople predjedi'),
(27, 'Rezanci z jastogom (za 2 osebi)', '30.00', 'Tople predjedi'),
(28, 'Goveji file v balsamicu in s suhimi paradižniki 250 g', '21.00', 'Mesne jedi'),
(29, 'Rezine govejega fileja na rukoli 250 g', '18.00', 'Mesne jedi'),
(30, 'Goveji file z zelenim poprom 250 g', '20.00', 'Mesne jedi'),
(31, 'Telečji pljučni medaljoni z jurčki 200 g', '19.00', 'Mesne jedi'),
(32, 'Telečji pljučni medaljoni s pomarančo in ingverjem 200 g', '19.00', 'Mesne jedi'),
(33, 'Žrebičkov file s tartufi 250 g', '24.00', 'Mesne jedi'),
(34, 'Žrebičkov file z jurčki 250 g', '24.00', 'Mesne jedi'),
(35, 'Jelenov file z borovnicami', '24.00', 'Mesne jedi'),
(36, 'Zajčji file s panceto, češnjevci in kaprami', '19.00', 'Mesne jedi'),
(37, 'Račja prsas konjakom in figami', '19.00', 'Mesne jedi'),
(38, 'Jagnječje zarebrnice z zelišči', '21.00', 'Mesne jedi'),
(39, 'T-bone steak (cca. 600g)', '22.00', 'Mesne jedi'),
(40, 'Račja prsas konjakom in figami', '19.00', 'Solate'),
(41, 'Brancin na žaru ali v soli 1 kg', '60.00', 'Morske jedi'),
(42, 'Kovač na žaru ali po mediteransko 1 kg', '60.00', 'Morske jedi'),
(43, 'File kovača po mediteransko 300 g', '20.00', 'Morske jedi'),
(44, 'File brancina s koromačem in žafranovo omako 300 g', '18.00', 'Morske jedi'),
(45, 'File morske žabe s tartrufi 250 g', '22.00', 'Morske jedi'),
(46, 'Škampi na žaru ali v buzari 500 g', '22.00', 'Morske jedi'),
(47, 'Hobotnica na tartufinem pireju 250 g', '22.00', 'Morske jedi'),
(48, 'Hobotnica v ponvici z vražjo zelenjavo 250 g', '22.00', 'Morske jedi'),
(49, 'Dnevne domače sladice', '3.50', 'sladice'),
(50, 'Čokoladna torta', '3.30', 'sladice'),
(51, 'Torta s tremi čokoladami', '3.20', 'sladice'),
(52, 'Kokosova torta', '2.90', 'sladice'),
(53, 'Torta Valentin z brusnicami in vanilijevo kremo', '2.90', 'sladice'),
(54, 'Višnjeva torta', '2.90', 'sladice'),
(55, 'Radenska	0.25 l', '1.60', 'Pijace'),
(56, 'Schweppes Bitter Lemon	0.25 l', '2.10', 'Pijace'),
(57, 'Coca-cola	0.25 l', '2.10', 'Pijace'),
(58, 'Fanta	0.25 l', '2.10', 'Pijace'),
(59, 'Cockta	0.25 l', '2.10', 'Pijace'),
(60, 'Nestea ledeni čaj	0.33 l', '2.10', 'Pijace'),
(61, 'Jabolčni sok	0.1 l', '1.00', 'Pijace'),
(62, 'Juice	0.1 l', '1.00', 'Pijace'),
(63, 'Cedevita	0.3 l', '1.50', 'Pijace'),
(64, 'kava', '1.20', 'Pijace'),
(65, 'kava z mlekom', '1.30', 'Pijace'),
(66, 'latte macchiato', '2.00', 'Pijace'),
(67, 'kakav', '1.70', 'Pijace'),
(68, 'rum', '2.00', 'Pijace'),
(69, 'travarica', '2.20', 'Pijace'),
(70, 'Jagermaister', '3.00', 'Pijace'),
(71, 'Union veliko	0,5l', '2.20', 'Pijace'),
(72, 'Laško veliko	0,5l', '2.20', 'Pijace'),
(73, 'Radler	0,5l', '2.20', 'Pijace'),
(74, 'Srebrna Radgonska penina, polsuha Mala	0,20l', '10.00', 'Pijace'),
(75, 'Koprski refošk', '1.30', 'Pijace'),
(76, 'Cviček	0,1L', '1.00', 'Pijace'),
(77, 'Rdeče vino točeno	0,1L', '1.00', 'Pijace'),
(78, 'Pogrinjek', '1.00', NULL),
(79, 'kruh', '5.00', 'drugo'),
(80, 'kruh', '5.00', 'kruh'),
(81, 'thf', '5.00', 'drg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_02_182856_create_posts_table', 1),
(4, '2017_06_03_144733_add_user_id_to_posts', 2),
(5, '2017_06_03_211549_add_cover_image_to_posts', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `narocila_miza_1`
-- (See below for the actual view)
--
CREATE TABLE `narocila_miza_1` (
`Ime` varchar(100)
,`Kolicina` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `narocila_skupine_podjetniki`
-- (See below for the actual view)
--
CREATE TABLE `narocila_skupine_podjetniki` (
`Ime` varchar(100)
,`Kolicina` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `Narocilo`
--

CREATE TABLE `Narocilo` (
  `Id_Narocilo` int(11) NOT NULL,
  `Id_Miza` int(11) DEFAULT NULL,
  `Skupina` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Kolicina` int(11) DEFAULT NULL,
  `Namen` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Id_Natakar` int(11) DEFAULT NULL,
  `Id_Jedilnik` int(11) DEFAULT NULL,
  `Id_Stranka` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Narocilo`
--

INSERT INTO `Narocilo` (`Id_Narocilo`, `Id_Miza`, `Skupina`, `Kolicina`, `Namen`, `Datum`, `Id_Natakar`, `Id_Jedilnik`, `Id_Stranka`) VALUES
(1, 1, 'goricani', 5, 'praznovanje', '2013-05-21', 1, 1, 1),
(2, 1, 'goricani', 5, 'praznovanje', '2013-05-21', 1, 50, 1),
(3, 1, 'goricani', 5, 'praznovanje', '2013-05-21', 1, 60, 1),
(4, 1, 'goricani', 5, 'praznovanje', '2013-05-21', 1, 25, 1),
(5, 1, 'goricani', 5, 'praznovanje', '2013-05-21', 1, 30, 1),
(6, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 3, 2),
(7, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 66, 2),
(8, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 50, 2),
(9, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 30, 2),
(10, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 72, 2),
(11, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 73, 2),
(12, 2, 'koprcani', 5, 'rojstni dan', '2013-04-20', 2, 31, 2),
(13, 3, NULL, 5, NULL, '2013-04-20', 2, 31, 2),
(14, 3, NULL, 5, NULL, '2013-04-20', 2, 61, 2),
(15, 3, NULL, 5, NULL, '2013-04-20', 2, 40, 2),
(16, 3, NULL, 5, NULL, '2013-04-20', 2, 38, 2),
(17, 3, NULL, 5, NULL, '2013-04-20', 2, 31, 2),
(18, 3, NULL, 5, NULL, '2013-04-20', 2, 57, 2),
(19, 3, NULL, 5, NULL, '2013-04-20', 2, 47, 2),
(20, 4, 'doktorji', 2, NULL, '2016-03-15', 3, 47, 3),
(21, 4, 'doktorji', 1, NULL, '2016-03-15', 3, 78, 3),
(22, 4, 'doktorji', 9, NULL, '2016-03-15', 3, 1, 3),
(23, 4, 'doktorji', 9, NULL, '2016-03-15', 3, 1, 3),
(24, 4, 'doktorji', 9, NULL, '2016-07-15', 3, 1, 3),
(25, 4, 'doktorji', 9, NULL, '2016-03-15', 3, 39, 3),
(26, 4, 'doktorji', 15, NULL, '2016-03-15', 3, 60, 3),
(27, 4, 'doktorji', 15, NULL, '2016-06-15', 3, 29, 3),
(28, 4, 'doktorji', 15, NULL, '2016-03-15', 3, 35, 3),
(29, 4, 'doktorji', 2, NULL, '2016-03-15', 3, 10, 3),
(30, 5, 'dijaki', 2, 'poveselitev', '2016-03-05', 3, 10, 3),
(31, 5, 'dijaki', 3, 'poveselitev', '2016-03-15', 3, 30, 3),
(32, 5, 'dijaki', 3, 'poveselitev', '2016-03-15', 3, 30, 3),
(33, 5, 'dijaki', 2, 'poveselitev', '2016-03-01', 3, 75, 3),
(34, 5, 'dijaki', 2, 'poveselitev', '2016-03-15', 3, 7, 3),
(35, 5, 'dijaki', 2, 'poveselitev', '2016-03-15', 3, 70, 3),
(36, 5, 'dijaki', 2, 'poveselitev', '2016-03-14', 3, 4, 3),
(37, 5, 'dijaki', 2, 'poveselitev', '2016-03-15', 3, 1, 3),
(38, 5, NULL, 2, NULL, '2016-08-15', 4, 1, 4),
(39, 5, NULL, 2, NULL, '2016-03-15', 4, 55, 4),
(40, 5, NULL, 2, NULL, '2016-09-15', 4, 48, 4),
(41, 5, NULL, 5, NULL, '2016-03-15', 4, 7, 4),
(42, 5, NULL, 5, NULL, '2016-06-15', 4, 34, 4),
(43, 5, NULL, 5, NULL, '2016-03-15', 4, 9, 4),
(44, 5, NULL, 5, NULL, '2017-03-15', 4, 16, 4),
(45, 5, NULL, 2, NULL, '2016-03-15', 4, 15, 4),
(46, 5, NULL, 2, NULL, '2017-03-15', 4, 46, 4),
(47, 5, NULL, 2, NULL, '2016-03-15', 4, 29, 4),
(48, 5, NULL, 2, NULL, '2016-03-15', 4, 57, 4),
(49, 5, NULL, 2, NULL, '2016-04-09', 4, 57, 4),
(50, 5, NULL, 2, NULL, '2016-04-09', 4, 57, 4),
(51, 5, NULL, 4, NULL, '2017-04-15', 4, 56, 4),
(52, 5, NULL, 4, NULL, '2017-04-15', 4, 73, 4),
(53, 6, NULL, 1, NULL, '2017-05-01', 5, 40, 8),
(54, 6, NULL, 2, NULL, '2017-05-01', 5, 21, 8),
(55, 6, NULL, 2, NULL, '2017-05-01', 5, 51, 8),
(56, 6, NULL, 5, NULL, '2017-05-01', 5, 51, 8),
(57, 8, NULL, 5, NULL, '2017-05-01', 6, 9, 9),
(58, 1, 'otroci', 6, 'rojstni dan', '2017-05-01', 6, 18, 9),
(59, 2, 'otroci', 6, 'rojstni dan', '2017-05-02', 6, 9, 9),
(60, 2, 'otroci', 6, 'rojstni dan', '2017-05-02', 6, 9, 9),
(61, 2, 'otroci', 2, 'rojstni dan', '2017-05-02', 6, 25, 9),
(62, 3, NULL, 2, NULL, '2017-05-15', 6, 25, 2),
(63, 3, NULL, 2, NULL, '2017-05-15', 6, 25, 2),
(64, 3, NULL, 3, NULL, '2017-05-15', 6, 46, 2),
(65, 3, NULL, 3, NULL, '2017-05-15', 6, 46, 2),
(66, 4, NULL, 2, NULL, '2017-05-15', 6, 44, 2),
(67, 4, NULL, 2, NULL, '2017-05-15', 6, 44, 2),
(68, 4, NULL, 2, NULL, '2017-05-15', 6, 66, 2),
(69, 5, 'gospodarstveniki', 2, 'sestanek', '2017-05-13', 2, 66, 3),
(70, 5, 'gospodarstveniki', 2, 'sestanek', '2017-05-13', 2, 66, 3),
(71, 5, 'gospodarstveniki', 2, 'sestanek', '2017-05-13', 2, 6, 3),
(72, 5, 'gospodarstveniki', 2, 'sestanek', '2017-05-13', 2, 13, 3),
(73, 5, 'gospodarstveniki', 2, 'sestanek', '2017-05-13', 2, 21, 3),
(74, 2, 'podjetniki', 3, 'sestanek', '2017-04-20', 5, 21, 1),
(75, 2, 'podjetniki', 3, 'sestanek', '2017-04-20', 5, 24, 1),
(76, 2, 'podjetniki', 2, 'sestanek', '2017-04-20', 5, 3, 1),
(77, 3, NULL, 2, NULL, '2017-04-19', 2, 5, 6),
(78, 3, NULL, 2, NULL, '2017-04-19', 2, 50, 6),
(79, 3, NULL, 2, NULL, '2017-04-19', 2, 11, 6),
(80, 3, NULL, 2, NULL, '2017-04-19', 2, 2, 6),
(81, 3, NULL, 5, NULL, '2017-04-19', 2, 2, 6),
(82, 3, NULL, 5, NULL, '2017-04-19', 2, 58, 6),
(83, 6, NULL, 2, NULL, '2017-05-03', 5, 68, 2),
(84, 6, NULL, 2, NULL, '2017-05-03', 5, 68, 2),
(85, 6, NULL, 2, NULL, '2017-05-03', 5, 36, 2),
(86, 6, NULL, 2, NULL, '2017-05-03', 5, 19, 2),
(87, 4, NULL, 2, NULL, '2017-05-03', 6, 19, 5),
(88, 4, NULL, 2, NULL, '2017-05-03', 6, 40, 5),
(89, 4, NULL, 2, NULL, '2017-05-03', 6, 77, 5),
(90, 4, NULL, 2, NULL, '2017-05-03', 6, 56, 5),
(91, 4, NULL, 2, NULL, '2017-05-03', 6, 46, 5),
(92, 2, NULL, 2, NULL, '2017-05-13', 3, 46, 6),
(93, 2, NULL, 2, NULL, '2017-05-13', 3, 17, 6),
(94, 2, NULL, 2, NULL, '2017-05-13', 3, 32, 6),
(95, 7, NULL, 2, NULL, '2017-05-13', 6, 32, 1),
(96, 7, NULL, 2, NULL, '2017-05-13', 6, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('zan.novak@gmail.com', '$2y$10$0c9f7BYTX6Snyoqezh6cUuV9lbfHG/BrscJTlg0HpTW7gG2aV6LTi', '2020-05-27 07:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `Popust`
--

CREATE TABLE `Popust` (
  `Id_Popust` int(11) NOT NULL,
  `VelikostPopusta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Popust`
--

INSERT INTO `Popust` (`Id_Popust`, `VelikostPopusta`) VALUES
(1, 10),
(2, 25),
(3, 50),
(4, 80),
(5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Stranka`
--

CREATE TABLE `Stranka` (
  `Id_Stranka` int(11) NOT NULL,
  `Ime` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Priimek` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Naslov` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Kraj` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Stranka`
--

INSERT INTO `Stranka` (`Id_Stranka`, `Ime`, `Priimek`, `Naslov`, `Kraj`, `email`) VALUES
(1, 'Betty ', 'Shumake', 'Slovenčeva 47', '3222 Dramlje', '\nBettyGShumake@jourrapide.com'),
(2, 'Pablo', 'Bailey', 'Kolodvorska 79', 'Košana', 'PabloLBailey@teleworm.us'),
(3, 'Larry', 'Fontenot', 'Trg revolucije 32', 'Bled', 'LarryPFontenot@dayrep.com'),
(4, 'Selma', 'Key', 'Ilichova 98', '1534 Ljubljana', 'SelmaJKey@teleworm.us'),
(5, 'David', 'Elliott', 'Trg revolucije 25', 'Adlešiči', 'DavidBElliott@armyspy.com'),
(6, 'Charlotte', 'Eaton', 'Ilichova 14', 'Ljubljana', 'CharlotteAEaton@armyspy.com'),
(7, 'Diane', 'Miles', 'Dalmatinova 90', 'Žalec', '\nDianeWMiles@dayrep.com'),
(8, 'Richard', 'Robinson', 'Gosposka ulica 109', 'Murska Sobota', 'RichardLRobinson@teleworm.us'),
(9, 'Lena', 'Gruber', 'Trg revolucije 68', 'Bistrica ob Dravi', 'LenaGGruber@jourrapide.com'),
(10, 'John', 'Dunaway', 'Tavcarjeva 57', 'Rovte', 'JohnJDunaway@teleworm.us'),
(11, 'Anna', 'Rouse', 'Slovenčeva 36', 'Cirkulane', 'AnnaJRouse@armyspy.com'),
(12, 'Yolanda', 'Morrison', 'Slovenčeva 23', 'Dravograd', 'YolandaAMorrison@jourrapide.com'),
(13, 'Samuel', 'Boyster', 'Kolodvorska 97', 'Komenda', 'SamuelJBoyster@armyspy.com'),
(14, 'Ronald ', 'Moss', 'Letališka 29', 'Hrastnik', 'RonaldSMoss@teleworm.us'),
(15, 'Nicole', 'Clayton', 'Gosposka ulica 58', 'Ormož', 'NicoleJClayton@armyspy.com'),
(16, 'Michael', 'Leitner', 'Ilichova 83', 'Ljubljana', 'MichaelJLeitner@jourrapide.com'),
(17, 'Anne', 'Rust', 'Trg revolucije 94', 'Brežice', 'AnneFRust@teleworm.us'),
(18, 'Athena', 'Rosenthal', 'Tavcarjeva 80', 'Šmarješke Toplice', 'AthenaPRosenthal@dayrep.com'),
(19, 'Jure', 'Novak', 'Ilichova 98', '1534 Ljubljana', 'Se123@teleworm.us'),
(20, 'Mojca', 'Kovac', 'Tavcarjeva 90', 'Šmarješke Toplice', 'Ath123l@dayrep.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_slovenian_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'William ', 'Cota', 'william.cota@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', 'MkiDo8tr0KJVyr92NvTv6pGriij34C8VBtkOBCooOFkrtVpndUeZG23nd7wX', NULL, NULL),
(2, 'Joyce ', 'Kaster', 'joyce.kaster@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', '', NULL, NULL),
(3, 'Mary ', 'Shriver', 'mary.shriver@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', 'Nn4jWhcIB9HYu6BlYwslDOQZgJKo0pYaZ3LviGBUkLk2f86ZpM5yHDJF8rk4', NULL, NULL),
(4, 'David ', 'Fleming', 'david.fleming@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', '', NULL, NULL),
(5, 'Doris ', 'Webb', 'doris.webb@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', '', NULL, NULL),
(6, 'Janice', 'Nance', 'janice.nance@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', '', NULL, NULL),
(7, 'Robin ', 'Salazar', 'robin.salazar@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', '', NULL, NULL),
(8, 'Sebastjan', NULL, 'Sebastjan.mevlja@gmail.com', '$2y$10$IEu4NungB4WRuR.urW2fgelXmU/UhLD8QgBr7jXrSn2SQgHKtFknK', 'LPQdVr7UylvQbDSZoldI2nDy16fumlwOj9luKKGATC1hxRSnae1GsgZQWvwl', '2020-05-27 06:51:29', '2020-05-27 06:51:29'),
(9, 'lala', NULL, 'lala@gmail.com', '$2y$10$lsEu/GRi3gL.RiGqxj4z8Ow6o3y3KuVW1W48sfKky/sTfRIOpAVnu', '98pyJgSQJo6hjjt75Y8khP5HVLFvC0ngBPEbJK8XMXRki2FgVqCN1drsS4do', '2020-05-27 06:51:59', '2020-05-27 06:51:59'),
(10, 'Žan', 'Novak', 'zan.novak@gmail.com', '$2y$10$eH60OZXkz2JiWDs6/3v4N.FZlYZcqSRQnIoiAYBq/JLF/8IRqLiKu', 'rUu9FCXBiqI6Znw0io3rfYtWdrrpffZPf7kAxkbX3uwY38XzmiBOmPIu7fWA', '2020-05-27 07:21:29', '2020-05-27 07:21:29'),
(11, 'ime', 'priimek', 'ime.priimek@gmail.com', '$2y$10$SF3UGAvRk8.xu6ErkPoajuBn2CTozeg9X.wPiQP1OHu25fGneST5O', '67IGTkOoJ4EgysBPCIij4XoTNmFfQ9Unf4aAYg6Vi4fpBmSNb3Koq0uIVDXq', '2020-05-27 08:01:37', '2020-05-27 08:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Sebastjan Mevlja', 'sebastjan.mevlja@gmail.com', '$2y$10$T0lD5.WwkCPvqHoFd13IPeneZSUcBxQ39NJcOq0TyeB4ELrUCLhs6', 'gAgkkLO3XVM0dUKLsNO6NBjkUUBfuWy2MSba3qB5t1ZBGmDzJ0fz7eAQIOD8', '2020-05-26 19:31:56', '2020-05-26 19:31:56'),
(4, 'aa', 'seba.mevlja@gmail.com', '$2y$10$2iLEsdDu/bRYaoP4HVCbbuzhOzd.n9tTB.t86O6LJi5EL.tk7TE4q', '5LG4b14xWflntuvD5137MZEuvk13eQfwFLUCaGXXibQsnNu4dMBKGCZqSvf4', '2020-05-27 06:04:42', '2020-05-27 06:04:42'),
(5, 'Sebastjan', 'sebaaaaa.mevlja@gmail.com', '$2y$10$y7jSBS95OXdNonN7XEAkvOp66cC/oWAeGjoFzOgTROQ.JpzzW/R/O', '1Vl2umNs2Wv70ncnWX5YgZrZAwPoedFOQPwQSJ5L8Z3IFLz930ccq6FTp1Ps', '2020-05-27 06:28:28', '2020-05-27 06:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `Zaloga`
--

CREATE TABLE `Zaloga` (
  `Id_Zaloga` int(11) NOT NULL,
  `Ime` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Kolicina` int(11) DEFAULT NULL,
  `Id_Dobava` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `Zaloga`
--

INSERT INTO `Zaloga` (`Id_Zaloga`, `Ime`, `Kolicina`, `Id_Dobava`) VALUES
(1, 'Juha Podravka, goveja, doza, 1kg', 0, 1),
(2, 'Juha Knorr, gobova, 1kg', 5, 2),
(3, 'Juha Maggi, s test.in mesnimi cmočki, 59g', 3, 3),
(4, 'Juha Tuš, gobova z jurčki, 70g', 1, 4),
(5, 'Kava Barcaffe, v zrnu, 1kg', 0, 5),
(6, 'Kava Tuš, v zrnu, 1kg', 0, 6),
(7, 'Cappuccino Tuš, vanilla, 125g', 0, 7),
(8, 'Cappuccino Tuš, classic, 125g', 0, 8),
(9, 'Čaj 1001 cvet, sadni raj, 149g', 0, 9),
(10, 'Kompot Tuš, sliva, brez koščic, 680g', 0, 10),
(11, 'Kompot Tuš, ananas, kosi, 850g', 5, 11),
(12, 'Kompot Tuš, jagoda, pločevinka, 820g', 5, 12),
(13, 'Šampinjoni rezani, pločevinka, 2,550kg', 5, 13),
(14, 'Fižol A la Chef, rjavi 2,5kg', 5, 14),
(15, 'Paradižnik Tuš, pasiran, 500g', 5, 15),
(16, 'Olive Tuš, črne, 360g', 5, 16),
(17, 'Rdeča pesa Natureta, 280g', 0, 17),
(18, 'Grah Natureta, 200g', 0, 18),
(19, 'Grah Natureta, 200g', 0, 19),
(20, 'Moka A la Chef, bela, pšenična, tip 500, 20kg', 0, 20),
(21, 'Moka Tuš ajdova, 1kg', 17, NULL),
(22, 'Olje sončnično pet, 10l', 17, NULL),
(23, 'Kis Talis, vinski, 1l', 17, NULL),
(24, 'Olje Tuš, solatno, 1l', 17, NULL),
(25, 'Balzamični kis A la Chef, 500ml', 17, NULL),
(26, 'Drobtine, bele, 500g', 17, NULL),
(27, 'Grisini Krex, klasik, 100g', 9, NULL),
(28, 'Ajvar Natureta, polpekoči, 1kg', 9, NULL),
(29, 'Gorčica A la Chef, 5kg', 9, NULL),
(30, 'Ketchup Naturete, 550g', 9, NULL),
(31, 'Gotova zmes Nektar, krompirjev pire, 2,5kg', 9, NULL),
(32, 'Polnjena paprika, 1kg, 2,5kg', 9, NULL),
(33, 'Juha Natureta, gobova, kremna, 400g', 9, NULL),
(34, 'Testenine Spaghetteria Knorr, špinača,164g', 9, NULL),
(35, 'Goveji golaž Podravka, 300g', 12, NULL),
(36, 'Domača marmelada Tuš, jagoda, 850g', 12, NULL),
(37, 'Sladkor Tuš, rjavi, trsni, 500g', 12, NULL),
(38, 'Sladkor Tuš, 1kg', 12, NULL),
(39, 'Testenine Barilla, špageti, št.3, 1kg', 12, NULL),
(40, 'Riž Erik, parboiled, dolgo zrnati, 5kg', 12, NULL),
(41, 'Omaka Tuš, paradižnikova z baziliko, 350g', 12, NULL),
(42, 'Rezanci Tuš, fidelini, jajčni, 400g', 12, NULL),
(43, 'Testenine, jajčne, polžki 32, 5kg', 12, NULL),
(44, 'Riž Natureta, parboiled, 1kg', 12, NULL),
(45, 'Testenine, školjke, conchiglie, 500g', 12, NULL),
(46, 'Omaka Natureta, gobova s smetano, 280g', 12, NULL),
(47, 'Pesto zeleni, 185g', 12, NULL),
(48, 'Kokosova moka A la Chef, 1kg', 13, NULL),
(49, 'Puding Dr.Oetker, vanilija, 3x38g', 13, NULL),
(50, 'Puding Tuš, čokolada, 50g', 13, NULL),
(51, 'Orehi Odlično, mleti, 200g', 13, NULL),
(52, 'Pecilni prašek Dr.Oetker, 6x12g', 13, NULL),
(53, 'Citronska kislina Prima, 80g', 13, NULL),
(54, 'Omaka Knorr, za pečenko, 500g', 13, NULL),
(55, 'Origano Kotany, zdrobljeni, 135g', 13, NULL),
(56, 'Lovorjev list, 100g', 13, NULL),
(57, 'Krompir mladi', 13, NULL),
(58, 'Marelice', 13, NULL),
(59, 'Kislo zelje Tuš,pak. 1kg', 13, NULL),
(60, 'Rukola Tuš, pakirano 100 g', 13, NULL),
(61, 'Motovilec Tuš, pak. 100g', 13, NULL),
(62, 'Jabolka Zlati delišes', 13, NULL),
(63, 'Brokoli', 13, NULL),
(64, 'Korenje', 13, NULL),
(65, 'Česen', 13, NULL),
(66, 'Bučke', 13, NULL),
(67, 'Ohrovt', 13, NULL),
(68, 'Čebula', 13, NULL),
(69, 'Zelje rdeče', 13, NULL),
(70, 'Melancan-jajčevec', 7, NULL),
(71, 'Kumare', 7, NULL),
(72, 'Solata Rustika,pak.200g', 7, NULL),
(73, 'Piščančja bedra, postrežno', 7, NULL),
(74, 'Piščančje krače Perutnina Ptuj, 500g', 7, NULL),
(75, 'Piščančji file, postrežno', 7, NULL),
(76, 'Piščančja prsa, brez kože', 7, NULL),
(77, 'Piščančja nabodalca P.Ptuj, hrustljava, 410g', 7, NULL),
(78, 'Pleskavice Ave, Leskovačke, 480g', 7, NULL),
(79, 'Čevapčiči Ave, 480g', 7, NULL),
(80, 'Svinsko pleče, brez kosti, vak.pak.', 7, NULL),
(81, 'Svinjsko stegno, vak.pak.', 7, NULL),
(82, 'Svinjska jetra', 7, NULL),
(83, 'Svinjski vrat, s kostjo', 14, NULL),
(84, 'Goveji vrat III., mladi, vak.pak.', 14, NULL),
(85, 'Mlado goveje stegno, brez kosti', 14, NULL),
(86, 'Teletina, stegno, brez kosti, vak.pak.', 14, NULL),
(87, 'Mleto mešano meso Anton, 480g', 14, NULL),
(88, 'Puranji file, vak. pak.', 14, NULL),
(89, 'Zrezki goveji, mladi', 14, NULL),
(90, 'Zrezki svinjski', 14, NULL),
(91, 'Atlantski losos, kotlet', 14, NULL),
(92, 'Klapavice, sveže', 14, NULL),
(93, 'Orada zlatobrov, 300/400', 14, NULL),
(94, 'Brancin, 200/300, HR', 14, NULL),
(95, 'Postrv Šarenka, očiščena', 14, NULL),
(96, 'Posebna Poli, kratka, 500g', 14, NULL),
(97, 'Pršut, narezan', 14, NULL),
(98, 'Pršut pečen Prunk', 14, NULL),
(99, 'Slanina Kras, prešana, mesna, postrežno', 14, NULL),
(100, 'Klobasa Domača', 14, NULL),
(101, 'Tortelini z mesom Tuš, 250g', 14, NULL),
(102, 'Tortelini z gobami Tuš, 250g', 14, NULL),
(103, 'Tortelini z ricotto in špinačo Tuš, 250g', 14, NULL),
(104, 'Njoki Tuš, krompirjevi, 500g', 14, NULL),
(105, 'Kvas Fala, 500g', 14, NULL),
(106, 'Smetana Pom.mlekarne, za stepanje, 1l', 14, NULL),
(107, 'Smetana Cessibon, mlečna, v dozi, 250g', 14, NULL),
(108, 'Kisla smetana A la Chef, 12%, 400g', 14, NULL),
(109, 'Alpska smetana za stepanje MU, 500ml', 14, NULL),
(110, 'Mleko Alpsko, polnomastno, 10l+2l', 14, NULL),
(111, 'Sir Edamec Tuš, cca 1,3kg, postrežno', 14, NULL),
(112, 'Sir Livada Pomurske mlekarne, postrežno', 14, NULL),
(113, 'Sir Tuš Tilsiter, rezine, 150g', 14, NULL),
(114, 'Majoneza Hellmanns, delikatesna, 4,65kg', 14, NULL),
(115, 'Francoska solata A la Chef', 9, NULL),
(116, 'Hren Tuš, 280g', 9, NULL),
(117, 'Hren Natureta, s smetano, 180g', 9, NULL),
(118, 'Solatni preliv, česen, 500ml', 9, NULL),
(119, 'Potica Tuš, orehova, 500g', 9, NULL),
(120, 'Torta s kakavovim prelivom, 800g', 9, NULL),
(121, 'Žemlja, velika, pakirano, 2x100g', 9, NULL),
(122, 'Rezina, kremna, 420g', 9, NULL),
(123, 'Kruh Vsakdan, polbeli, rezan, pakiran, 700g', 9, NULL),
(124, 'Jajca Tuš, kakovost A, vel. L, 6/1', 9, NULL),
(125, 'Beljak tekoči, 1l', 9, NULL),
(126, 'Losos dimljen, 100g', 9, NULL),
(127, 'Sladoled Leone, čokolada, 1l', 2, NULL),
(128, 'Sladoled Tuš, goz.sadeži, jogurt, 1l', 2, NULL),
(129, 'Sladoled Tuš, pistacija, lešnik, 1l', 2, NULL),
(130, 'Sladoled Tuš, čokolada, vanilija, 1l', 2, NULL),
(131, 'Sladoled Tuš premium, oreh, 900ml', 2, NULL),
(132, 'Sladoled Tuš premium, kremna rezina, 800ml', 2, NULL),
(133, 'Sladoled Maxim Premium, lešnik, 4l', 2, NULL),
(134, 'Sladoled Maxim Premium, vanilija, 4l', 6, NULL),
(135, 'Sladoled Lonček, piškotek, 120ml', 6, NULL),
(136, 'Sladoled Otočec, 1l, kakav in vanilija', 6, NULL),
(137, 'Pomfri Tuš, 2,5kg', 6, NULL),
(138, 'Grah Tuš, zamrznjeno, 450g', 6, NULL),
(139, 'Gozdni sadeži, zamrznjeno, 2,5kg', 6, NULL),
(140, 'Sorbet, limona z vodko, 630g', 6, NULL),
(141, 'Mešanica za smuti, malinina nebesa, 150g', 6, NULL),
(142, 'Puranji zrezek Vindon, dunajski, zamrz.,800g', 6, NULL),
(143, 'Sir Tuš, paniran, 400g', 6, NULL),
(144, 'Ribje palčke Tuš, panirane, 250g', 6, NULL),
(145, 'Cordon bleu, 1kg', 6, NULL),
(146, 'Piščančji medaljoni Perutnina Ptuj, 700g', 6, NULL),
(147, 'Pizza Ristorante capricciosa, 320g', 6, NULL),
(148, 'Pizza mini, šunka, 270g', 6, NULL),
(149, 'Sardele, očiščene, postrežno, 270g', 6, NULL),
(150, 'Morski sadeži A la Chef, zamrznjeno, 1kg', 6, NULL),
(151, 'Hobotnica očiščena', 6, NULL),
(152, 'Lignji, orjaške lovke, postrežno', 6, NULL),
(153, 'Morski pes, kotlet, zamrznjeno', 6, NULL),
(154, 'Orada, zamrznjeno, 200-300', 18, NULL),
(155, 'Postrv, očiščena, zamrznjeno, 1kg', 2, 21),
(156, 'Piščanec Ave, celi, zamrznjeno', 3, 22),
(157, 'Piščančja bedra, zamrznjeno', 0, 23),
(158, 'Race, zamrznjeno', 0, 24),
(159, 'Gosi zamrznjene', 1, 25),
(160, 'Štruklji Tuš, skutni, 600g', 0, 26),
(161, 'Rogljički Tuš, Francoski, zamrznjeno, 1kg', 0, 27),
(162, 'Idrijski žlikrofi, 600g', 0, 28),
(163, 'Brezalkoholno pivo Union, 4x0,5l ploč.', 0, 29),
(164, 'Pivo Uni, 0,5l', 0, 30),
(165, 'Pijača Malt, Laško, ananas, 0,5l', 0, 31),
(166, 'Pijača Malt, hruška-melisa, 0,5l', 0, 32),
(167, 'Cockta Black tonic, 0,25l', 0, 33),
(168, 'Cockta, 0,25l', 0, 34),
(169, 'Fanta orange, 1l', 1, 35),
(170, 'Cola Tuš, 0,5l', 2, 36),
(171, 'Coca Cola, 0,25l', 0, 37),
(172, 'Fanta, 0,25l', 0, 38),
(173, 'Fanta Shokata, 0,5l', 0, 39),
(174, 'Sprite, 0,25l', 0, 40),
(175, 'Schweppes, tonic water, 0,25l', 15, NULL),
(176, 'Schweppes bitter lemon, 0,5l', 15, NULL),
(177, 'Schweppes tangerine, 0,5l', 15, NULL),
(178, 'Ora original, 0,5l', 15, NULL),
(179, 'Pepsi Twist, pet, 500ml', 15, NULL),
(180, 'Ora original, 0,25l', 15, NULL),
(181, 'Ledeni čaj Sola, brusnica, 1,5l', 15, NULL),
(182, 'Ledeni čaj Tuš, breskev, 1,5l', 15, NULL),
(183, 'Ledeni čaj Nestea, limona, 0,5l', 15, NULL),
(184, 'Ledeni čaj Nestea, breskev, 1,5l', 15, NULL),
(185, 'Cedevita, limona, 1kg', 15, NULL),
(186, 'Cedevita Vin, grape, 19g', 7, NULL),
(187, 'Fruc Iso, pomar., grenivka, limona, 0,5l', 7, NULL),
(188, 'Sok Fructal, jabolko, 1l', 7, NULL),
(189, 'Nektar Fructal, breskev, 1l', 7, NULL),
(190, 'Nektar Dana, pomaranča, 1l', 7, NULL),
(191, 'Fruc Izi, Fructal, pomarča, 0,5l', 7, NULL),
(192, 'Nektar Fructal, marelica, jabolko, 0,2l', 7, NULL),
(193, 'Sok Fructal, jabolčni, 1,5l', 7, NULL),
(194, 'Mineralna voda Dana, 0,5l', 7, NULL),
(195, 'Mineralna voda Donat Mg, 1l', 7, NULL),
(196, 'Voda Oda, 0,5l', 7, NULL),
(197, 'Pijača Tuš, limeta, 0,5l', 7, NULL),
(198, 'Pijača Dana, bela sliva, zeleni čaj, 0,5l', 7, NULL),
(199, 'Mineralna voda Radenska, light, 0,5l', 7, NULL),
(200, 'Mineralna voda Radenska, classic, 0,5l', 7, NULL),
(201, 'Pijača Dana, gozdna jagoda, aloe vera, 0,5l', 7, NULL),
(202, 'Pivo Union, svetlo, alk.4,9 vol%, 0,33l', 7, NULL),
(203, 'Pivo Zlatorog, alk.4,9vol% , 0,33l', 6, NULL),
(204, 'Pivo Corona, extra, alk.4,5 vol %, 0,355l', 6, NULL),
(205, 'Pivo Heineken, alk.5 vol%, 0,33l', 6, NULL),
(206, 'Pivo Union, svetlo, alk.4,9 vol%, 0,33l', 6, NULL),
(207, 'Vino Z.Rebula, alk.11,5 vol%, 1l', 6, NULL),
(208, 'Vino Tuš Knežje, suho, alk.11,5 vol%, 1l', 6, NULL),
(209, 'Vino K.Teran, alk.11,5 vol%, 1l', 6, NULL),
(210, 'Vino Tuš Cviček, alk.9,5 vol%, 1l', 6, NULL),
(211, 'Vino Malvazija, alk.12 vol%, 0,75l', 6, NULL),
(212, 'Vino, belo, alk.11vol%, 2l', 6, NULL),
(213, 'Vino, rdeče, alk.11vol%, 2l', 6, NULL),
(214, 'Penina Srebrna, Rose, Radgonska, 0,2l', 6, NULL),
(215, 'Vino Barbera Merlot, alk.12 vol%, 1l', 6, NULL),
(216, 'Vino Refošk, sladki, alk.10 vol%, 0,5l', 6, NULL),
(217, 'Vino Pelješac, alk.12,4 vol%, 1l', 6, NULL),
(218, 'Sangria Maria Ole, alk.7 vol%, 1,5l', 6, NULL),
(219, 'Vino J.P.Chenet, Merlot, alk.13 vol%, 0,75l', 6, NULL),
(220, 'Whisky Jameson, alk.40 vol%, 1l', 6, NULL),
(221, 'Borovničevec TUŠ, alk.20 vol%, 1l', 6, NULL),
(222, 'Vodka Tuš, alk.37,5 vol%, 1l', 6, NULL),
(223, 'Pijača Cocktail Margarita, alk.4,7 vol%,0,33l', 6, NULL),
(224, 'Jagermeister, alk.35 vol%, 1l', 6, NULL),
(225, 'Vino Bishe, jagode in vino, alk.7 vol%, 1l', 6, NULL),
(226, 'Vermut bianco, alk.16 vol%, 1l', 6, NULL),
(227, 'Martini bianco, alk.15 vol%, 0,05l', 6, NULL),
(228, 'PRIMERBA BAZILIKA', 3, NULL),
(229, 'PRIMERBA PESTO', 3, NULL),
(230, 'PRIMERBA RDEČI PESTO', 3, NULL),
(231, 'REDUCIRANA GOVEJA OSNOVA PROFESSIONAL', 3, NULL),
(232, 'KOKOŠJA JUHA', 3, NULL),
(233, 'GOVEJA JUHA', 3, NULL),
(234, 'ZELENJAVNA BISTRA JUHA', 3, NULL),
(235, 'RIBJA OSNOVA', 3, NULL),
(236, 'GOBOVA OSNOVA Z JURČKI', 3, NULL),
(237, 'GOBOVA JUHA', 0, 41),
(238, 'ŠPARGLJEVA JUHA', 0, 42),
(239, 'PARADIŽNIKOVA JUHA', 0, 43),
(240, 'POROVA JUHA', 0, 44),
(241, 'CVETAČNA JUHA', 0, 45),
(242, 'ČESNOVA JUHA', 0, 46),
(243, 'GRAHOVA JUHA', 0, 47),
(244, 'OMAKA ZA PEČENKO', 0, 48),
(245, 'ŠPANSKA OMAKA', 1, 49),
(246, 'OMAKA DEMI GLACE', 3, NULL),
(247, 'SIROVA OMAKA', 8, NULL),
(248, 'OMAKA CARBONARA', 8, NULL),
(249, 'KNORR SAMBAL MANIS ČILI - SOJA', 8, NULL),
(250, 'PREŽGANJE SVETLO', 8, NULL),
(251, 'PIRE KROMPIR - GRANULAT', 8, NULL),
(252, 'TIRAMISU', 8, NULL),
(253, 'ČRNI ČAJ YELLOW LABEL', 8, NULL),
(254, 'ČRNI ČAJ ENGLISH BREAKFAST', 8, NULL),
(255, 'ZELENI ČAJ NATUR', 1, NULL),
(256, 'ZELIŠČNI ČAJ ŠIPEK', 1, NULL),
(257, 'Ananas', 8, NULL),
(258, 'Banana', 0, 49),
(259, 'Kivi', 0, 50),
(260, 'Lubenica', 8, NULL),
(261, 'SIR CHEEZERELLA MOZZANA RIBANA', 6, NULL),
(262, 'SIR RIBANI PIZZA MIX', 6, NULL),
(263, 'SIR RIBANI PIZZA MIX', 1, 51),
(264, 'SIR FALOT Z ZELIŠČI', 0, 52),
(265, 'ŠUNKA MIR NAREZEK VP', 3, NULL),
(266, 'SLANINA HAMBURG 1/2 VP KRAINER', 3, NULL),
(267, 'SIR PARMEZAN RIBAN 1 kg', 6, NULL),
(268, 'SIR BARON-EMENTALEC', 6, NULL),
(269, 'SIR CHEEZERELLA MOZZANA', 6, NULL),
(270, 'ŠUNKA MIR NAREZEK VP', 0, 53),
(271, 'SVINJSKI ZREZKI 200g', 0, 54),
(272, 'REBRE SVINJSKE S KOSTJO IN KOŽO VP', 0, 55),
(273, 'SALAMA OGRSKA', 1, 56),
(274, 'KULEN VP KRAINER', 0, 57),
(275, 'PANCETA VP-1/2', 0, 58),
(276, 'RDEČI FIŽOL 2550g/1530g FIORINO', 1, 59),
(277, 'ARTIČOKE 3/1-1550g neto', 1, 60),
(278, 'RDEČA PESA 4100 g', 0, 61),
(279, 'JALAPENO 3000g/1710g PARAMONGA', 1, 62),
(280, 'OMAKA NACHO 2,2 kg', 9, NULL),
(281, 'KEBAB OMAKA 2 kg', 9, NULL),
(282, 'ČESEN GRANULAT 1 kg', 9, NULL),
(283, 'TUNA KOSI 185g BLUE KING V RAST. OLJU', 9, NULL),
(284, 'TUNA KOSI 185g BLUE KING V RAST. OLJU', 9, NULL),
(285, 'SMETANA ZA KUHANJE 20% mm 1l', 19, NULL),
(286, 'VIŠNJE 2,5 kg ZAMRZNJENE', 19, NULL),
(287, 'SMUČ FILE 5kg/180-230g', 19, NULL),
(288, 'TUNA FILE BKK 25kg ZAMRZNJENO', 19, NULL),
(289, 'ŽABJI KRAKI 1kg ZAMRZNJENO', 19, NULL),
(290, 'MORSKI SADEŽI 1 kg', 19, NULL),
(291, 'PIŠČANEC CELI GRILL ZAMRZNJENO PANVITA', 19, NULL),
(292, 'PIŠČANČJA BEDRA ZM 180g PERUTNINA PTUJ', 19, NULL),
(293, 'KEBAB PIŠČANČJI REZANI 2 kg ZAMRZNJENO', 19, NULL),
(294, 'SPAGHETTI BARILLA nr.3', 8, NULL),
(295, 'PENNE RIGATE nr.73', 0, 64),
(296, 'RICE STIKS 10 mm', 8, NULL);

-- --------------------------------------------------------

--
-- Structure for view `izdelki_tus`
--
DROP TABLE IF EXISTS `izdelki_tus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sebastjanm`@`%` SQL SECURITY DEFINER VIEW `izdelki_tus`  AS  select `Zaloga`.`Ime` AS `ime`,`Dobava`.`Kolicina` AS `Kolicina` from ((`Zaloga` join `Dobava` on((`Dobava`.`Id_Dobava` = `Zaloga`.`Id_Dobava`))) join `Dobavitelj` on((`Dobavitelj`.`Id_Dobavitelj` = `Dobava`.`Id_Dobavitelj`))) where (`Dobavitelj`.`Ime` = 'Tuš Cash&Carry') ;

-- --------------------------------------------------------

--
-- Structure for view `narocila_miza_1`
--
DROP TABLE IF EXISTS `narocila_miza_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sebastjanm`@`%` SQL SECURITY DEFINER VIEW `narocila_miza_1`  AS  select `Jedilnik`.`Ime` AS `Ime`,`Narocilo`.`Kolicina` AS `Kolicina` from (`Jedilnik` join `Narocilo` on((`Jedilnik`.`Id_Jedilnik` = `Narocilo`.`Id_Narocilo`))) where (`Narocilo`.`Id_Miza` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `narocila_skupine_podjetniki`
--
DROP TABLE IF EXISTS `narocila_skupine_podjetniki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sebastjanm`@`%` SQL SECURITY DEFINER VIEW `narocila_skupine_podjetniki`  AS  select `Jedilnik`.`Ime` AS `Ime`,`Narocilo`.`Kolicina` AS `Kolicina` from (`Jedilnik` join `Narocilo` on((`Jedilnik`.`Id_Jedilnik` = `Narocilo`.`Id_Narocilo`))) where (`Narocilo`.`Skupina` = 'podjetniki') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dobava`
--
ALTER TABLE `Dobava`
  ADD PRIMARY KEY (`Id_Dobava`),
  ADD KEY `Id_Dobavitelj` (`Id_Dobavitelj`);

--
-- Indexes for table `Dobavitelj`
--
ALTER TABLE `Dobavitelj`
  ADD PRIMARY KEY (`Id_Dobavitelj`);

--
-- Indexes for table `Ima`
--
ALTER TABLE `Ima`
  ADD PRIMARY KEY (`Id_Stranka`,`Id_Popust`),
  ADD KEY `Id_Popust` (`Id_Popust`);

--
-- Indexes for table `Jedilnik`
--
ALTER TABLE `Jedilnik`
  ADD PRIMARY KEY (`Id_Jedilnik`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Narocilo`
--
ALTER TABLE `Narocilo`
  ADD PRIMARY KEY (`Id_Narocilo`),
  ADD KEY `Id_Natakar` (`Id_Natakar`),
  ADD KEY `Id_Jedilnik` (`Id_Jedilnik`),
  ADD KEY `Id_Stranka` (`Id_Stranka`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `Popust`
--
ALTER TABLE `Popust`
  ADD PRIMARY KEY (`Id_Popust`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Stranka`
--
ALTER TABLE `Stranka`
  ADD PRIMARY KEY (`Id_Stranka`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `Zaloga`
--
ALTER TABLE `Zaloga`
  ADD PRIMARY KEY (`Id_Zaloga`),
  ADD KEY `Id_Dobava` (`Id_Dobava`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dobava`
--
ALTER TABLE `Dobava`
  MODIFY `Id_Dobava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `Dobavitelj`
--
ALTER TABLE `Dobavitelj`
  MODIFY `Id_Dobavitelj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Jedilnik`
--
ALTER TABLE `Jedilnik`
  MODIFY `Id_Jedilnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Narocilo`
--
ALTER TABLE `Narocilo`
  MODIFY `Id_Narocilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `Popust`
--
ALTER TABLE `Popust`
  MODIFY `Id_Popust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Stranka`
--
ALTER TABLE `Stranka`
  MODIFY `Id_Stranka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Zaloga`
--
ALTER TABLE `Zaloga`
  MODIFY `Id_Zaloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Dobava`
--
ALTER TABLE `Dobava`
  ADD CONSTRAINT `Dobava_ibfk_1` FOREIGN KEY (`Id_Dobavitelj`) REFERENCES `Dobavitelj` (`Id_Dobavitelj`);

--
-- Constraints for table `Ima`
--
ALTER TABLE `Ima`
  ADD CONSTRAINT `Ima_ibfk_1` FOREIGN KEY (`Id_Stranka`) REFERENCES `Stranka` (`Id_Stranka`),
  ADD CONSTRAINT `Ima_ibfk_2` FOREIGN KEY (`Id_Popust`) REFERENCES `Popust` (`Id_Popust`);

--
-- Constraints for table `Narocilo`
--
ALTER TABLE `Narocilo`
  ADD CONSTRAINT `Narocilo_ibfk_1` FOREIGN KEY (`Id_Natakar`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Narocilo_ibfk_2` FOREIGN KEY (`Id_Jedilnik`) REFERENCES `Jedilnik` (`Id_Jedilnik`),
  ADD CONSTRAINT `Narocilo_ibfk_3` FOREIGN KEY (`Id_Stranka`) REFERENCES `Stranka` (`Id_Stranka`);

--
-- Constraints for table `Zaloga`
--
ALTER TABLE `Zaloga`
  ADD CONSTRAINT `Zaloga_ibfk_1` FOREIGN KEY (`Id_Dobava`) REFERENCES `Dobava` (`Id_Dobava`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
