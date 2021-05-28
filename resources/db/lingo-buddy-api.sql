-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 10:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lang-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `dialects`
--

CREATE TABLE `dialects` (
  `dialect_id` tinyint(3) UNSIGNED NOT NULL,
  `dialect_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dialects`
--

INSERT INTO `dialects` (`dialect_id`, `dialect_name`) VALUES
(1, 'Alagwa'),
(2, 'Akiek'),
(3, 'Akie Northern Tanzan'),
(4, 'Arusha'),
(5, 'Assa'),
(6, 'Barabaig'),
(7, 'Balouch Coastal Tanzania'),
(8, 'Bembe'),
(9, 'Bena'),
(10, 'Bende'),
(11, 'Bondei'),
(12, 'Bungu'),
(13, 'Burunge'),
(14, 'Chaga'),
(15, 'Datooga'),
(16, 'Dhaiso'),
(17, 'Digo'),
(18, 'Doe'),
(19, 'Fipa'),
(20, 'Gogo'),
(21, 'Goa Coastal Tanzania'),
(22, 'Gorowa'),
(23, 'Gujirati Coastal Tanzania'),
(24, 'Gweno'),
(25, 'Ha'),
(26, 'Hutu Western Tanzani'),
(27, 'Hadza'),
(28, 'Hangaza'),
(29, 'Haya'),
(30, 'Hehe'),
(31, 'Holoholo people'),
(32, 'Ikizu'),
(33, 'Ikoma'),
(34, 'Iraqw'),
(35, 'Isanzu'),
(36, 'Jiji'),
(37, 'Jita'),
(38, 'Kabwa'),
(39, 'Kagura'),
(40, 'Kaguru'),
(41, 'Kahe'),
(42, 'Kami'),
(43, 'Kamba Northern Tanzania'),
(44, 'Kara (also called Regi)'),
(45, 'Kerewe'),
(46, 'Kikuyu'),
(47, 'Kimbu'),
(48, 'Kinga'),
(49, 'Kisankasa'),
(50, 'Kisi'),
(51, 'Konongo'),
(52, 'Kuria'),
(53, 'Kutu'),
(54, 'Kw’adza'),
(55, 'Kwavi'),
(56, 'Kwaya'),
(57, 'Kwere'),
(58, 'Kwifa'),
(59, 'Lambya'),
(60, 'Luguru'),
(61, 'Luo'),
(62, 'Maasai'),
(63, 'Machinga'),
(64, 'Magoma'),
(65, 'Mbulu (in Arusha)'),
(66, 'Makonde'),
(67, 'Makua'),
(68, 'Makwe'),
(69, 'Malila'),
(70, 'Mambwe'),
(71, 'Manyema'),
(72, 'Manda'),
(73, 'Mahara'),
(74, 'Mediak'),
(75, 'Matengo'),
(76, 'Matumbi'),
(77, 'Maviha'),
(78, 'Mbugwe'),
(79, 'Mbunga'),
(80, 'Mbugu'),
(81, 'Meru (Wameru of the slopes of Mt. Meru in Arumeru District)'),
(82, 'Mosiro'),
(83, 'Mpoto'),
(84, 'Msur Zanzibar'),
(85, 'Mwanga'),
(86, 'Mwera'),
(87, 'Ndali'),
(88, 'Ndamba'),
(89, 'Ndendeule'),
(90, 'Ndengereko'),
(91, 'Ndonde'),
(92, 'Nyanja people Southern Tanzania'),
(93, 'Ngas Northern Tanzania'),
(94, 'Ngasa'),
(95, 'Ngindo'),
(96, 'Ngoni'),
(97, 'Ngulu'),
(98, 'Ngazija (Zanzibar island)'),
(99, 'Ngurimi'),
(100, 'Ngwele'),
(101, 'Nilamba'),
(102, 'Nindi'),
(103, 'Nyakyusa'),
(104, 'Nyasa people in Mbeya'),
(105, 'Nyambo'),
(106, 'Nyamwanga'),
(107, 'Nyamwezi'),
(108, 'Nyanyembe'),
(109, 'Nyaturu'),
(110, 'Nyiha'),
(111, 'Nyiramba'),
(112, 'Omotik'),
(113, 'Okiek people'),
(114, 'Pangwa'),
(115, 'Pare'),
(116, 'Pimbwe'),
(117, 'Pogolo'),
(118, 'Rangi'),
(119, 'Rufiji'),
(120, 'Rungi'),
(121, 'Rungu'),
(122, 'Rungwa'),
(123, 'Rwa'),
(124, 'Safwa'),
(125, 'Sagara'),
(126, 'Sandawe'),
(127, 'Sangu'),
(128, 'Segeju'),
(129, 'Swengwear'),
(130, 'Sambaa'),
(131, 'Shirazi'),
(132, 'Shubi'),
(133, 'Sizaki'),
(134, 'Suba'),
(135, 'Sukuma'),
(136, 'Sumbwa'),
(137, 'Sungu Tanga'),
(138, 'Swahili'),
(139, 'Temi'),
(140, 'Tongwe'),
(141, 'Twa Western Tanzania'),
(142, 'Tutsi Western Tanzania'),
(143, 'Tumbuka'),
(144, 'Vidunda'),
(145, 'Vinza'),
(146, 'Wanda'),
(147, 'Washihiri Zanzibar'),
(148, 'Wamanga Zanzibar and Mafia island'),
(149, 'Wanji'),
(150, 'Wangarenaro Arusha'),
(151, 'Ware'),
(152, 'Yaaku people Northern Tanzania'),
(153, 'Yao'),
(154, 'Zanaki'),
(155, 'Zaramo'),
(156, 'Zigula'),
(157, 'Zinza'),
(158, 'Zyoba'),
(159, 'Zulu people Southern Tanzania');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `dialect` varchar(20) NOT NULL,
  `term` varchar(20) NOT NULL,
  `translation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `dialect`, `term`, `translation`) VALUES
(1, 'sambaa', 'mnaa', 'mama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dialects`
--
ALTER TABLE `dialects`
  ADD PRIMARY KEY (`dialect_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dialects`
--
ALTER TABLE `dialects`
  MODIFY `dialect_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
