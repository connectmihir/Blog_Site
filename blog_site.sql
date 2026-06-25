-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2026 at 09:54 AM
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
(9, 'SEO');

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
(11, 6, '', 'Lolu kumari', 'fradfeqafrefrefe'),
(15, 12, '', 'kalu ram', 'asdfsa');

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
(6, 'How do I start content creating?', 17, 3, 'Starting your journey in content creation is an exciting and rewarding endeavor. Whether you want to create a blog, YouTube channel, podcast, or any other form of content, here are the essential steps to help you get started\r\n\r\nHow do I start content creating?\r\nDefine Your Niche and Audience\r\nResearch and Competitor Analysis\r\nSteps for content strategy\r\nConclusion\r\nIs content creator an easy job?\r\nDo you need to study to be a content creator?\r\nIs content creator an easy job?\r\nIs content creator a stressful job?\r\nDefine Your Niche and Audience\r\nChoose a specific niche or topic that you are passionate about and knowledgeable in.\r\n\r\nStart by thinking about what really excites you. What topic or subject do you love talking about or exploring? This will be your niche. \r\nIdentify your target audience or ideal viewers/readers/listeners. Understanding their needs and interests is crucial.\r\n\r\nconsider who might be interested in what you have to say. That’s your audience. Make sure there’s a match between your passion and your audience’s interests.\r\nResearch and Competitor Analysis\r\nResearch existing content creators in your chosen niche.\r\nTake some time to see what’s already out there. Look at other content creators in your niche. See what they’re doing well and where there might be room for you. Learning from others is a great way to get started.\r\n\r\nAnalyze their content to identify gaps or opportunities for improvement.\r\nCreate a Content Strategy\r\nCreate a simple plan for your content. Decide what type of content you want to create—whether it’s articles, videos, podcasts, or something else. Then, figure out how often you can realistically produce content. Having a plan keeps you organized.\r\nSteps for content strategy\r\nDevelop a content calendar outlining what types of content you’ll create (e.g., blog posts, videos, podcasts) and how often.\r\nPlan your content topics and titles in advance.\r\nSet clear goals for your content, such as increasing subscribers, generating leads, or educating your audience.\r\nChoose Your Platforms:\r\nSelect the platforms where you want to publish your content. This could include your website, YouTube, social media, or podcast hosting platforms.\r\nTailor your content format to the platform’s strengths and audience preferences.\r\nCreate High-Quality Content:\r\nInvest in good-quality equipment, such as cameras, microphones, and editing software.\r\nWrite well-researched, informative, and engaging content.\r\nPay attention to visuals and design if applicable to your platform.\r\nConsistency is Key:\r\nStick to a regular posting schedule to build trust and a loyal audience.\r\nConsistency helps with SEO and algorithmic visibility on platforms like YouTube and social media.\r\nOptimize for SEO:\r\nLearn the basics of Search Engine Optimization (SEO) to make your content more discoverable.\r\nUse relevant keywords in your content and metadata.\r\nCreate compelling headlines and meta descriptions.\r\nPromote Your Content:\r\nShare your content on social media, in relevant online communities, and via email newsletters.\r\nCollaborate with other creators or influencers in your niche for cross-promotion.\r\nEngage with Your Audience:\r\nRespond to comments and messages promptly.\r\nBuild a community around your content by encouraging discussions and feedback.\r\nAnalyze and Adapt:\r\nMonitor the performance of your content using analytics tools.\r\nPay attention to which topics and formats resonate the most with your audience.\r\nContinuously improve your content strategy based on the data you gather.\r\nStay Committed and Patient:\r\nBuilding a successful content creation presence takes time and dedication.\r\nStay committed to your niche and audience, and don’t be discouraged by initial challenges.\r\nLearn and Evolve:\r\nStay up-to-date with industry trends and best practices.\r\nBe open to feedback and continuously improve your skills.\r\nConclusion\r\nStarting in content creation is an ongoing journey that requires learning, adaptability, and dedication. With time and effort, you can grow your audience and achieve your content marketing goals. Remember, the most successful content creators are those who are passionate about their subjects and genuinely connect with their audience. Good luck on your content creation journey!\r\n\r\nIs content creator an easy job?\r\nTo start content creating, pick your niche, plan content, create quality, promote, and be consistent. Research your audience for better results.\r\n\r\nDo you need to study to be a content creator?\r\nStudying can help, but it’s not mandatory. Learning about content strategy, writing, and marketing can enhance your skills as a content creator, but real-world practice and creativity matter most.\r\n\r\nIs content creator an easy job?\r\nContent creation can be rewarding but not necessarily easy. It requires creativity, consistency, and adaptation to audience needs. It can be time-consuming and competitive.\r\n\r\nIs content creator a stressful job?\r\nMay be or not , it varies based on individual workload and time management. Content creation can be stressful due to deadlines, creative pressure, and the need for consistency.', 'How-do-I-start-content-creating.png'),
(11, 'test the title', 25, 3, 'test the desc', 'How-do-content-creators-earn.png'),
(12, 'aasfdasfs', 25, 9, 'asdfsafds', 'unloxacademy_logo.jpg');

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
(19, 'sala kalu', 'sala@gmail.com', '', 'admin'),
(23, 'Lolu kumari', 'lolu@gmail.com', 'khaas log', 'admin'),
(25, 'kalu ram', 'kalu@gmail.com', 'passs', 'admin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
