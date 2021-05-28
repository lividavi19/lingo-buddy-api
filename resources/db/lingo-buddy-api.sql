-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 12:20 PM
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
  `dialect_name` varchar(60) NOT NULL,
  `other_name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dialects`
--

INSERT INTO `dialects` (`dialect_id`, `dialect_name`, `other_name`, `location`) VALUES
(1, 'alagwa', '', ''),
(2, 'akiek', '', ''),
(3, 'akie', '', 'Northern Tanzania'),
(4, 'arusha', '', ''),
(5, 'assa', '', ''),
(6, 'barabaig', '', ''),
(7, 'balouch', '', 'Coastal Tanzania'),
(8, 'bembe', '', ''),
(9, 'bena', '', 'Iringa'),
(10, 'bende', '', ''),
(11, 'bondei', '', 'Tanga'),
(12, 'bungu', '', ''),
(13, 'burunge', '', ''),
(14, 'chaga', '', ''),
(15, 'datooga', '', ''),
(16, 'dhaiso', '', ''),
(17, 'digo', '', ''),
(18, 'doe', '', ''),
(19, 'fipa', '', ''),
(20, 'gogo', '', 'Dodoma'),
(21, 'goa', '', 'Coastal Tanzania'),
(22, 'gorowa', '', ''),
(23, 'gujirati', '', 'Coastal Tanzania'),
(24, 'gweno', '', ''),
(25, 'ha', '', ''),
(26, 'hutu', '', 'Western Tanzania'),
(27, 'hadza', '', ''),
(28, 'hangaza', '', ''),
(29, 'haya', '', ''),
(30, 'hehe', '', 'Iringa'),
(31, 'holoholo', '', ''),
(32, 'ikizu', '', ''),
(33, 'ikoma', '', ''),
(34, 'iraqw', '', ''),
(35, 'isanzu', '', ''),
(36, 'jiji', '', ''),
(37, 'jita', '', ''),
(38, 'kabwa', '', ''),
(39, 'kagura', '', ''),
(40, 'kaguru', '', ''),
(41, 'kahe', '', ''),
(42, 'kami', '', ''),
(43, 'kamba', '', 'Northern Tanzania'),
(44, 'kara', 'regi', ''),
(45, 'kerewe', '', ''),
(46, 'kikuyu', '', ''),
(47, 'kimbu', '', ''),
(48, 'kinga', '', ''),
(49, 'kisankasa', '', ''),
(50, 'kisi', '', ''),
(51, 'konongo', '', ''),
(52, 'kuria', '', ''),
(53, 'kutu', '', ''),
(54, 'kw’adza', '', ''),
(55, 'kwavi', '', ''),
(56, 'kwaya', '', ''),
(57, 'kwere', '', ''),
(58, 'kwifa', '', ''),
(59, 'lambya', '', ''),
(60, 'luguru', '', ''),
(61, 'luo', '', ''),
(62, 'maasai', 'massai', ''),
(63, 'machinga', '', ''),
(64, 'magoma', '', ''),
(65, 'mbulu', '', 'Arusha'),
(66, 'makonde', '', 'Mtwara'),
(67, 'makua', '', ''),
(68, 'makwe', '', ''),
(69, 'malila', '', ''),
(70, 'mambwe', '', ''),
(71, 'manyema', '', ''),
(72, 'manda', '', ''),
(73, 'mahara', '', ''),
(74, 'mediak', '', ''),
(75, 'matengo', '', ''),
(76, 'matumbi', '', ''),
(77, 'maviha', '', ''),
(78, 'mbugwe', '', ''),
(79, 'mbunga', '', ''),
(80, 'mbugu', '', ''),
(81, 'meru', '', 'Arumeru'),
(82, 'mosiro', '', ''),
(83, 'mpoto', '', ''),
(84, 'msur', '', 'Zanzibar'),
(85, 'mwanga', '', ''),
(86, 'mwera', '', ''),
(87, 'ndali', '', ''),
(88, 'ndamba', '', ''),
(89, 'ndendeule', '', ''),
(90, 'ndengereko', '', 'Pwani'),
(91, 'Ndonde', '', ''),
(92, 'nyanja', '', 'Southern Tanzania'),
(93, 'ngas', '', 'Northern Tanzania'),
(94, 'ngasa', '', ''),
(95, 'ngindo', '', ''),
(96, 'ngoni', '', ''),
(97, 'ngulu', '', ''),
(98, 'ngazija', '', 'Zanzibar Island'),
(99, 'ngurimi', '', ''),
(100, 'ngwele', '', ''),
(101, 'nilamba', '', ''),
(102, 'nindi', '', ''),
(103, 'nyakyusa', '', 'Mbeya'),
(104, 'nyasa', '', 'Mbeya'),
(105, 'nyambo', '', ''),
(106, 'nyamwanga', '', ''),
(107, 'nyamwezi', '', ''),
(108, 'nyanyembe', '', ''),
(109, 'nyaturu', '', ''),
(110, 'nyiha', '', ''),
(111, 'nyiramba', '', ''),
(112, 'omotik', '', ''),
(113, 'okiek', '', ''),
(114, 'pangwa', '', ''),
(115, 'pare', '', ''),
(116, 'pimbwe', '', ''),
(117, 'pogolo', '', 'Morogoro'),
(118, 'rangi', '', ''),
(119, 'rufiji', '', ''),
(120, 'rungi', '', ''),
(121, 'rungu', '', ''),
(122, 'rungwa', '', ''),
(123, 'rwa', '', ''),
(124, 'safwa', '', ''),
(125, 'sagara', '', ''),
(126, 'sandawe', '', ''),
(127, 'sangu', '', ''),
(128, 'segeju', '', ''),
(129, 'swengwear', '', ''),
(130, 'sambaa', '', 'Tanga'),
(131, 'shirazi', '', ''),
(132, 'shubi', '', ''),
(133, 'sizaki', '', ''),
(134, 'suba', '', ''),
(135, 'sukuma', '', 'Mwanza'),
(136, 'sumbwa', '', ''),
(137, 'sungu', '', 'Tanga'),
(138, 'swahili', '', ''),
(139, 'temi', '', ''),
(140, 'tongwe', '', ''),
(141, 'twa', '', 'Western Tanzania'),
(142, 'tutsi', '', 'Western Tanzania'),
(143, 'tumbuka', '', ''),
(144, 'vidunda', '', ''),
(145, 'vinza', '', ''),
(146, 'wanda', '', ''),
(147, 'shihiri', '', 'Zanzibar'),
(148, 'manga', '', 'Zanzibar and Mafia Island'),
(149, 'wanji', '', ''),
(150, 'ngarenaro', '', 'Arusha'),
(151, 'ware', '', ''),
(152, 'yaaku', '', 'Northern Tanzania'),
(153, 'yao', '', ''),
(154, 'zanaki', '', ''),
(155, 'zaramo', '', 'Dar es Salaam'),
(156, 'zigua', '', 'Tanga'),
(157, 'zinza', '', ''),
(158, 'zyoba', '', ''),
(159, 'zulu', '', 'Southern Tanzania');

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
