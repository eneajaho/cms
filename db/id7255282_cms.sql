-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2018 at 01:57 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7255282_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(26, 'MySQL'),
(35, 'HTML'),
(82, 'PHP');

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
(6, 1, 'Mike', '2018-09-25', 'mike@email.com', 'Hey watch my page: www.page.com', 'approved'),
(42, 1, 'Geni', '2018-09-25', 'geni@gmail.com', 'This is cool man', 'approved'),
(43, 1, 'broo', '2018-09-29', 'das@gmail.com', 'das\r\n', 'approved'),
(44, 1, 'Geni', '2018-10-01', 'asd@gmail.com', 'asd', 'approved');

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
(15, 'root', 'root approved comment with ID: 57', '2018-10-02', 'comment', 'active', 'root'),
(17, 'Geni', 'Geni added a comment in post with ID: 1', '2018-10-01', 'comment', 'active', 'root'),
(18, 'Root', 'Root approved comment with ID: 6', '2018-10-01', 'comment', 'active', 'root'),
(19, 'Root', 'Root approved comment with ID: 44', '2018-10-01', 'comment', 'active', 'root'),
(20, 'Root', 'Root added a new user with username: Root', '2018-10-02', 'user', 'active', 'root'),
(21, 'Root', 'Root approved comment with ID: 1', '2018-10-02', 'comment', 'active', 'root'),
(22, 'Root', 'Root edited user with username: Root', '2018-10-02', 'user', 'active', 'root'),
(23, 'Root', 'Root edited user with username: Root', '2018-10-02', 'user', 'active', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_date` date NOT NULL,
  `post_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_content` varchar(9999) COLLATE utf8_bin NOT NULL,
  `post_tags` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'draft',
  `post_user` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_category_id` int(255) NOT NULL,
  `post_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_views_count` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_user`, `post_category_id`, `post_url`, `post_views_count`) VALUES
(1, 'My cat is beautiful', 'eneajahollari', '2018-09-25', 'a.png', 'The domestic cat is a small, typically furry, carnivorous mammal. They are often called house cats when kept as indoor pets or simply cats when there is no need to distinguish them from other felids and felines. They are often valued by humans for companionship and for their ability to hunt vermin                                                                       ', 'cat, beautiful, ', 1, 'published', '', 26, 'my-cat', 26),
(2, 'My dog is beautiful', 'Enea', '2018-09-24', '16 (2).jpg', 'The domestic cat is a small, typically furry, carnivorous mammal. They are often called house cats when kept as indoor pets or simply cats when there is no need to distinguish them from other felids and felines. They are often valued by humans for companionship and for their ability to hunt vermin                                                                                ', 'dog, beautiful, ', -1, 'draft', '', 26, 'my-dog', 1),
(9, 'Books are love', 'en', '2018-09-29', 'Aero Woods.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque dolorum, voluptas exercitationem autem accusantium deserunt eum laboriosam provident tempora quas non maiores, facilis quasi unde in recusandae enim! Eos enim, sint accusantium voluptatem commodi in praesentium quis, repellendus velit vero, non ducimus laborum recusandae. Aliquam eos libero quod autem fuga est. Ducimus quis itaque voluptas tenetur quisquam? Delectus quae eligendi aut, voluptate ullam rem neque accusantium ipsum quaerat esse numquam quam aperiam tempora dicta officia natus quas reiciendis illo voluptas! Ipsam earum dolore porro nostrum vel blanditiis officiis consequuntur sunt. Aperiam, eum blanditiis saepe a dignissimos molestiae nihil optio! Sint placeat sequi modi at necessitatibus voluptates, doloremque optio expedita corporis? Ratione numquam rem veniam quisquam repudiandae! Quidem consequuntur beatae voluptatum vitae perspiciatis assumenda. Quidem quis recusandae unde quos dolorum velit mollitia numquam accusamus delectus harum hic eaque, voluptatibus doloribus qui perferendis, earum aliquam. Sed tempore aperiam facilis necessitatibus eaque id exercitationem nam dicta unde error. Sit ullam nulla illum eligendi numquam repellat possimus enim natus corporis provident dicta atque minima optio vel voluptas soluta deleniti cupiditate, repudiandae eum maxime saepe dignissimos reiciendis. Dolorem consequatur quibusdam mollitia accusamus laboriosam, debitis veniam ad cumque impedit. Perspiciatis quam, sunt odio at ex placeat?                                                                      ', 'donate, car, banka,', 2, 'published', '', 26, '', 1),
(28, 'dfdf', 'en', '2018-09-29', '1.jpg', 'dfgdfg', 'dfgdfg', 0, 'published', '', 26, '', 2),
(29, 'Aksident ne rrugen 31 shkurti', 'root', '2018-09-29', 'WWW.YIFY-TORRENTS.COM.jpg', ' persona te lenduar, aksident me motor', 'lajme', 0, 'draft', '', 26, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_image` text COLLATE utf8_bin NOT NULL,
  `user_role` varchar(255) COLLATE utf8_bin NOT NULL,
  `randSalt` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '3',
  `user_description` varchar(9999) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_image`, `user_role`, `randSalt`, `user_description`) VALUES
(34, 'en', 'Enea', 'Jahollari', 'jahollarienea14@gmail.com', 'asd', 'books.png', 'admin', '3', '8)'),
(36, 'root', 'Root', 'Admin', 'jahollarienea14@gmail.com', 'root', 'IMG_20180929_121256_903.jpg', 'admin', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit fuga adipisci. Atque accusamus quam deserunt earum maiores voluptatem doloribus dolores, perspiciatis labore excepturi velit cupiditate eius, eaque sequi sapiente!'),
(37, 'klendi', 'Klendi', '', 'klendi@gmail.com', '1234', '419429400.jpg', 'admin', '3', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
