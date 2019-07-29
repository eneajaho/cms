-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 12:49 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(255) NOT NULL,
  `notif_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `notif_subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `notif_time` date NOT NULL,
  `notif_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `notif_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `notif_receiver` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES
(4, 'root', 'root deleted category with id: 82', '2018-10-01', 'category', 'active', 'root'),
(5, 'root', 'root published post with ID: 44', '2018-10-01', 'post', 'active', 'root'),
(7, 'root', 'root drafted post with ID: 45', '2018-10-01', 'post', 'active', 'root'),
(8, 'root', 'rootcreated post with title: fhv', '2018-10-01', 'post', 'active', 'root'),
(12, 'root', 'root approved comment with ID: 57', '2018-10-02', 'comment', 'active', 'root'),
(13, 'root', 'root approved comment with ID: 57', '2018-10-02', 'comment', 'active', 'root'),
(14, 'root', 'root approved comment with ID: 57', '2018-10-02', 'comment', 'active', 'root'),
(15, 'root', 'root approved comment with ID: 57', '2018-10-02', 'comment', 'active', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
