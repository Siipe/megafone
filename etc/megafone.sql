-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 12:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `megafone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `dateCreated`, `user_id`) VALUES
(1, 'Environment', 'This category stands for your work environment. Bad situations like noises, heat, and other sutff.', '2015-10-30 20:48:16', 2),
(2, 'Workload', 'This category is for the people that work more than the necessary...', '2015-10-30 20:54:29', 3),
(3, 'Salary', 'I''m rich. I''m plenty of gold at my fortress. I''m just creating this to help the rest of you.. poor witless worms.. hahahahahaha!', '2015-10-30 21:00:16', 4),
(4, 'Bosses', 'This one stands for your lovable "masters". Enjoy!', '2015-10-30 21:11:34', 5),
(5, 'This category will have a big name, yeah', 'Hello, Jose de Almeida Carvalho Nogueira da Costa Freile de Lermano Soares Figueira Mendes', '2015-11-05 06:32:36', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `complaint_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `level`, `dateCreated`, `user_id`, `complaint_id`, `comment_id`) VALUES
(1, 'Yeah, that definitely sucks. You have my support to burn them!', 0, '2015-11-02 01:01:10', 2, 3, NULL),
(2, 'Make sure you won''t make a mess this time. Last time they messed up with you, you got drowned in the golden pool... what a shame!', 0, '2015-11-02 01:07:10', 5, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `description`, `dateCreated`, `user_id`, `category_id`) VALUES
(2, 'I''m getting tired of the same level!', 'My owner, testing the game, makes me go across the same level every time and for hours! I''m getting tired!', '2015-10-30 20:54:54', 3, 2),
(3, 'Dwarves are trying to steal my gold', 'I''m losing my patience. But I''d love to play with them before killing them. This is not certain, although death is!', '2015-10-30 21:06:45', 4, 3),
(4, 'Shao Kahn thinks he commands me, but he doesn''t!', 'I was reprogrammed by the Lin Kuei, the great master ever! So I will never surrender my free will for that lumbering fool!', '2015-10-30 21:13:19', 5, 4),
(6, 'test', 'asdas', '2015-10-30 21:33:27', NULL, 1),
(7, 'Another test', 'asdasdasdsdfcsdf sdfsdfsdfsdf sdf sdf sdf ', '2015-10-30 21:53:24', NULL, 3),
(8, 'Just a test about how big the names from this website can be. This is a test where I fill all spacee', 'Just a test about how big the names from this website can be. This is a test where I fill all spacee. Just a test about how big the names from this website can be. This is a test where I fill all spacee. Just a test about how big the names from this website can be. This is a test where I fill all spacee.', '2015-11-05 06:39:28', 6, 5),
(9, 'Argh!! Do I really have to keep fighting in outworld? ', 'This place is awful! Nothing to do at all, and every single creature you find here wants to kill you... What''s the point of serving Lin Kuei this way? ', '2015-11-06 09:46:49', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile` tinyint(4) NOT NULL,
  `dateJoined` datetime NOT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `profile`, `dateJoined`, `picture`) VALUES
(1, 'root', '$2a$10$GBZqyTL5W/0lQoBkin3MJudIwaQFM7yJ/6R2fc8XsXiNXqJDMFAEa', 'RooT', 'lfaugusto.gomes@gmail.com', 1, '2015-10-30 19:45:38', 'root.jpg'),
(2, 'lfgomes', '$2y$10$6OeytgYY0h81Ao3ZuIS3xenrzwol4gSRBibaiESoKOD0MkYM2HAFu', 'Luiz Felippe Gomes', 'siipecapoeira@gmail.com', 0, '2015-10-30 20:46:53', '577f9762-1928-4a2e-a6d1-993731f213a1.png'),
(3, 'rheiz', '$2y$10$QSadKpKk5NfG2v0hrPzxfeNQ46uK1AWiJX/9iXOT4VstwOp3YJDc2', 'Rheiz', 'rheiz@gmail.com', 0, '2015-10-30 20:52:06', '737cd3f6-20f6-4c31-9fab-70f141c96de5.png'),
(4, 'smaug', '$2y$10$o95LIsi2YT9pzWiZmnbRE.KxcYOyQtao6DH4BIW.0hdeUkPkQrOzm', 'SmauG', 'smaug@gmail.com', 0, '2015-10-30 20:57:53', 'aead67ef-f522-443d-a17b-bd3c1875569f.png'),
(5, 'cyrax', '$2y$10$W5CAWOjHK/ilPVZ1pNp76.BM6P.2x4CUZHwwOMZK0Dk0S296sDyby', 'Cyrax', 'cyrax@gmail.com', 0, '2015-10-30 21:08:12', '282df7b9-c209-4e03-af4b-2a4fa4d32c71.png'),
(6, 'jose', '$2y$10$EvbuXdlQR8DWhkHrB.qa1O9ZfrzwjDgPDUZ4.E.E.L/DMp/AoQcOa', 'Jose de Almeida Carvalho Nogueira da Costa Freile de Lermano Soares Figueira Mendes', 'jose_nome_grande@gmail.com', 0, '2015-11-05 06:26:22', 'b3c7f360-31bc-4e6d-b19e-73468c873776.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_USER_CATEGORY` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_USER_COMMENT` (`user_id`), ADD KEY `FK_COMPLAINT_COMMENT` (`complaint_id`), ADD KEY `FK_COMMENT_COMMENT` (`comment_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_USER_COMPLAINT` (`user_id`), ADD KEY `FK_CATEGORY_COMPLAINT` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `USER_UNIQUE` (`login`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`),
ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
