-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 03:14 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(32) NOT NULL,
  `comment_post_id` int(32) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment_date` date NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment_content` text COLLATE utf8_bin NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_date`, `comment_email`, `comment_content`, `comment_status`) VALUES
(1, 1, 'Enea', '2018-09-11', 'asd@asd.com', 'asdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaa', 'approved'),
(2, 2, 'Klendi', '2018-09-25', 'klendi@email.com', 'This cms is coolaaaaaaaaaaaaaaaaaaaaaaaaaa', 'approved'),
(4, 9, 'Geni', '2018-09-25', 'geni@email.com', 'Nice Feature', 'approved'),
(6, 1, 'Mike', '2018-09-25', 'mike@email.com', 'Hey watch my page: www.page.com', 'approved'),
(7, 2, 'Smith', '2018-09-25', 'smith@gmail.com', 'Great website! Keep It up!', 'approved'),
(8, 9, 'Maria', '2018-09-25', 'maria@email.com', 'This sucks hahahaha', 'approved'),
(27, 1, 'Nike', '2018-09-25', 'nike@email.com', 'Cool', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
