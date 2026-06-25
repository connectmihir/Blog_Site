-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2026 at 07:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Content Marketing'),
(4, 'Digital Marketing'),
(5, 'Local SEO'),
(1, 'SEO'),
(2, 'Web Design ');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `email`, `user_name`, `comment`) VALUES
(2, 3, '', 'Mihir Ranjan', 'adfvsadfvsvf(TESTING)'),
(3, 4, '', 'Mihir Ranjan', 'asdfvadsfvdafvadfvadgfvddavfdaadddddddddddddddddddddddddddddddddd'),
(4, 3, '', 'Mihir Ranjan', 'gbsfbgfsbfgbfsgbfsbgfsbfbsgbfsgbfgbfbfgsbfgbsfgbfsgbfsgb'),
(5, 3, '', 'rashmi', 'sdgbagbagbdgbabfabdfabvfnbd,vnfd from rashmi id'),
(6, 4, '', 'rashmi', 'sdgbagbagbdgbabfabdfabvfnbd,vnfd from rashmi id');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `author_id`, `category_id`, `content`, `image`) VALUES
(3, 'testing asfhsajkhflksahfklasfklsahfklasjhdflkjashdfjkhkl', 15, 1, 'sdjkfahlsdfjasfljahljfhda fak;fsafl afdljk afjk', '2019-23 (3).png'),
(4, 'HELLO JI NOW  I AM REUPLOAD THE POST BY EDITING', 15, 4, 'asdfgvavdfvadvdvfavda\r\nAFDVADFV\r\nA\r\nDVF\r\nADF\r\nVA\r\nDFV\r\nAD\r\nBF\r\nADB\r\nAD\r\nB\r\nABDF\r\nBA\r\nBDADBFFS\r\nGHNGHJMRY\r\nMDY\r\nM\r\nDHG\r\nMGF\r\nDM\r\nGMJGS\r\nMDG\r\nM\r\nGJMDHG\r\nM\r\n|JHDM\r\nGHM\r\nDHM\r\ngh', 'Mihir Ranjan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(160) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','author','subscriber') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Mihir Ranjan', 'connectmihirr@gmail.com', '', 'author'),
(2, 'Lipi kuti', 'drlipikakuti@gmail.com', '', 'subscriber'),
(3, 'mahi', 'mahim@gmail.com', '', 'admin'),
(8, 'aish', 'aish@gamil.com', '', 'subscriber'),
(9, 'Lipi kutiwer', 'qwertyuio2@gmail.com', '', 'subscriber'),
(10, 'duhcisucuc', '123456#@gmail.com', '1234asdfqwerzxcv', 'author'),
(11, 'kaba', 'kaba@gmail.com', '1234', 'subscriber'),
(12, 'kabaAdmin', 'adminkaba@gmail.com', '12345', 'author'),
(13, 'koko', 'koko@gmail.com', '123', 'admin'),
(14, 'qwe', 'qwe@gamil.com', '12', 'subscriber'),
(15, 'rashmi', 'rashmi@gmail.com', '123456', 'admin'),
(16, 'slo', 'slo@gmail.com', '1234', 'subscriber'),
(17, 'Mihir Ranjan', 'ranjan@gmail.com', '12', 'admin'),
(18, 'salo kumar', 'salo@gmail.com', '', 'admin'),
(19, 'sala kalu', 'sala@gmail.com', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `xxx001` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
