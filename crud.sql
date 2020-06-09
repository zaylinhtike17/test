-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 11:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `education` text COLLATE utf8_unicode_ci NOT NULL,
  `skill` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `dept` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `dob`, `education`, `skill`, `gender`, `dept`, `address`) VALUES
(8, 'ye thu', '1995-06-03', 'graduated', 'PHP,Javascript,MySQL', 'male', 'autocad', 'hledan'),
(11, 'zaw', '1999-02-17', 'graduated', 'CSS,MySQL', 'male', 'autocad', 'kamayut'),
(12, 'emma', '2001-06-06', 'postgraduated', 'PHP,Javascript', 'female', 'design', 'north dagon'),
(14, 'thet', '1996-11-11', 'graduated', 'PHP,Javascript', 'male', 'system', 'yankin'),
(15, 'Myint', '1993-04-05', 'graduated', 'CSS', 'femlae', 'photoshop', 'Ahlone'),
(16, 'aagsd', '2020-06-03', 'postgraduated', 'PHP,Javascript,CSS', 'male', 'autocad', 'latha\r\n'),
(17, 'sad', '1992-04-06', 'graduated', 'PHP,Javascript', 'male', 'photoshop', 'thamine'),
(18, 'Than Htet Aung', '1995-06-06', 'graduated', 'Javascript,MySQL', 'male', 'autocad', 'Insein'),
(19, 'aye', '1998-12-02', 'graduated', 'PHP', 'male', 'design', 'North Dagon'),
(20, 'hay', '1996-08-05', 'graduated', 'CSS', 'male', 'design', 'Hlaing thar yar\r\n'),
(21, 'zay', '2000-04-02', 'graduated', 'CSS,MySQL', 'male', 'system', 'Sanchaung'),
(22, 'mya mya', '1999-06-14', 'postgraduated', '', 'female', 'design', 'Mingalar Taung Nyunt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
