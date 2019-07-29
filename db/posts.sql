-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 03:20 AM
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
  `post_views_count` int(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_user`, `post_category_id`, `post_url`, `post_views_count`) VALUES
(1, 'My cat is beautiful', 'Enea', '2018-09-25', 'a.png', 'The domestic cat is a small, typically furry, carnivorous mammal. They are often called house cats when kept as indoor pets or simply cats when there is no need to distinguish them from other felids and felines. They are often valued by humans for companionship and for their ability to hunt vermin                                                             ', 'cat, beautiful, ', 0, 'published', '', 26, 'my-cat', 1),
(2, 'My dog is beautiful', 'Enea', '2018-09-24', '16 (2).jpg', 'The domestic cat is a small, typically furry, carnivorous mammal. They are often called house cats when kept as indoor pets or simply cats when there is no need to distinguish them from other felids and felines. They are often valued by humans for companionship and for their ability to hunt vermin                                                                                ', 'dog, beautiful, ', 0, 'published', '', 26, 'my-dog', 1),
(9, 'Books are love', 'Airdrop Ico', '2018-09-24', 'Aero Woods.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque dolorum, voluptas exercitationem autem accusantium deserunt eum laboriosam provident tempora quas non maiores, facilis quasi unde in recusandae enim! Eos enim, sint accusantium voluptatem commodi in praesentium quis, repellendus velit vero, non ducimus laborum recusandae. Aliquam eos libero quod autem fuga est. Ducimus quis itaque voluptas tenetur quisquam? Delectus quae eligendi aut, voluptate ullam rem neque accusantium ipsum quaerat esse numquam quam aperiam tempora dicta officia natus quas reiciendis illo voluptas! Ipsam earum dolore porro nostrum vel blanditiis officiis consequuntur sunt. Aperiam, eum blanditiis saepe a dignissimos molestiae nihil optio! Sint placeat sequi modi at necessitatibus voluptates, doloremque optio expedita corporis? Ratione numquam rem veniam quisquam repudiandae! Quidem consequuntur beatae voluptatum vitae perspiciatis assumenda. Quidem quis recusandae unde quos dolorum velit mollitia numquam accusamus delectus harum hic eaque, voluptatibus doloribus qui perferendis, earum aliquam. Sed tempore aperiam facilis necessitatibus eaque id exercitationem nam dicta unde error. Sit ullam nulla illum eligendi numquam repellat possimus enim natus corporis provident dicta atque minima optio vel voluptas soluta deleniti cupiditate, repudiandae eum maxime saepe dignissimos reiciendis. Dolorem consequatur quibusdam mollitia accusamus laboriosam, debitis veniam ad cumque impedit. Perspiciatis quam, sunt odio at ex placeat?                                                            ', 'donate, car, banka,', 4, 'published', '', 26, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
