-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 09:14 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sketch`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(35) NOT NULL,
  `cat_img` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_title`, `cat_img`, `date`) VALUES
(41, 'Custom', 'pexels-photo-1068523.jpeg', '2020-03-27 03:08:08'),
(43, 'Cars_ ions', '_large_image_1.jpg', '2020-03-28 03:10:10'),
(44, 'Food/Beverages', '-664278069.jpg', '2020-03-26 04:14:09'),
(45, 'Music/Jam', '1492941022.jpg', '2020-03-25 05:11:12'),
(46, 'Education', '20225516-open-book-and-a-graduate-hat-on-a-white-background-Stock-Vector.jpg', '2020-03-24 05:15:12'),
(47, 'Camera tools', 'Cara membersihkan Lensa Kamera - Copy.jpg', '2020-03-23 03:06:06'),
(48, 'Bitcoin', 'images - 2020-02-07T095132.716.jpeg', '2020-03-22 22:36:11'),
(49, 'Web design', '5f10d5bdd05b0ade5c37595e0afda4ae.jpg', '2020-03-31 13:46:41'),
(50, 'Techs', '15.jpg', '2020-04-01 12:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `photo_id`, `email`, `fullname`, `comment`, `status`, `date`) VALUES
(15, 42, 'garlMattews@yahoo.com', 'Garlic Mattews', 'Nice dashboard!', 'Approved', '2020-03-26 02:07:27'),
(16, 42, 'henry@yahoo.com', 'Henry Cold', 'Dashy', 'Approved', '2020-03-26 02:07:27'),
(18, 43, 'edet@gmail.com', 'Edetty', 'Who are they?', 'Approved', '2020-03-27 18:25:46'),
(19, 44, 'howdy@gmail.com', 'howdy', 'The site is not that bad!', 'Approved', '2020-03-27 19:26:04'),
(21, 52, 'sussanglow@gmail.com', 'Sussan Gloriam', 'Where are the pictures?', 'Approved', '2020-03-28 17:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `subject`, `message`) VALUES
(2, 'Kenneth', 'Paulion', 'More Life', 'Life couldn\\\'t get better without more'),
(5, 'Blessing', 'Newton', 'Low needs', 'There is now no leads');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `category` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `seen` int(255) NOT NULL,
  `review` varchar(255) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `filename`, `type`, `size`, `category`, `author`, `status`, `seen`, `review`, `date`) VALUES
(43, 'Meet ups', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the car owner to easily contact the eng', 'ab2.jpeg', 'image/jpeg', 197912, 41, 'John Craves', 'Approved', 0, '0', '2020-03-24 14:13:54'),
(44, 'Views', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the car owner to easily contact the eng', 'bg.jpeg', 'image/jpeg', 236257, 41, 'Martha Glory', 'Approved', 0, '0', '2020-03-24 14:14:29'),
(45, 'Plans', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners ', 'pl.jpeg', 'image/jpeg', 147936, 41, 'Choice Edet', 'Approved', 0, '0', '2020-03-28 10:42:04'),
(46, 'Edutables', 'Education has proven over years to be the only means for us to attain that which we hold between the shapes of our thoughts', 'education.jpg', 'image/jpeg', 57286, 46, 'John Mattew', 'Approved', 0, '0', '2020-03-28 17:37:29'),
(47, 'Connecting with Education', 'Education has proven over years to be the only means for us to attain that which we hold between the longs', 'education2-getty-images.jpg', 'image/jpeg', 26015, 46, 'Mary Silas', 'Approved', 0, '0', '2020-03-28 17:38:16'),
(48, 'Help notes', 'Silence has proven over years to be the only means for us to attain that which we hold between ', 'Helpdesk-PNG-Pic.png', 'image/png', 94369, 41, 'Benjamin Chukwu', 'Approved', 0, '0', '2020-03-28 17:39:00'),
(49, 'Cam one', 'Camera has proven over years to be the only means for us to attain that which we hold between ', 'pm_product_holga.jpg.optimal.jpg', 'image/jpeg', 160385, 47, 'Neoton Gary', 'Approved', 0, '0', '2020-03-28 17:40:00'),
(50, 'Cam two', 'Camera has proven over years to be the only means for us to attain that which we hold between ', 'images(1).jpg', 'image/jpeg', 10593, 47, 'Choice Edet', 'Approved', 0, '0', '2020-03-28 17:40:17'),
(51, 'Cam three', 'Camera has proven over years to be the only means for us to attain that which we hold between ', 'Photo-blogpost.jpg', 'image/jpeg', 94124, 47, 'John Mattew', 'Approved', 0, '0', '2020-03-28 17:40:31'),
(52, 'Gallary Shots', 'Camera has proven over years to be the only means for us to attain that which we hold between. Camera diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how Camera has proven over years to be the only means for us to attain that which we hold between. Camera diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and howCamera has proven over years to be the only means for us to attain that which we hold between. Camera diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how  ', 'camera-and-photographs.jpg', '', 0, 47, 'Benjamin Chukwu', 'Approved', 0, '0', '2020-03-28 17:41:45'),
(53, 'The dance crew', 'Music has proven over years to be the only means for us to attain that which we hold between ', '-447966916.jpg', 'image/jpeg', 69174, 45, 'Choice Edet', 'Approved', 0, '0', '2020-03-28 17:42:29'),
(54, 'Sounds', 'Music has proven over years to be the only means for us to attain that which we hold between ', '1531113031.jpg', 'image/jpeg', 87167, 45, 'John Mattew', 'Approved', 0, '0', '2020-03-28 17:42:45'),
(55, 'Creamy chops', 'Food has proven over years to be the only means for us to attain that which we hold between ', '680484426.jpg', 'image/jpeg', 109781, 44, 'Mary Silas', 'Approved', 0, '0', '2020-03-28 17:43:15'),
(56, 'Biscuits', 'Food has proven over years to be the only means for us to attain that which we hold between ', '534364944.jpg', 'image/jpeg', 1121015, 44, 'Mary Silas', 'Approved', 0, '0', '2020-03-28 17:43:33'),
(57, 'Cookies', 'Food has proven over years to be the only means for us to attain that which we hold between ', '-281939096.jpg', 'image/jpeg', 124785, 44, 'Neoton Gary', 'Approved', 0, '0', '2020-03-28 17:43:49'),
(58, 'Speedy one', 'Cars has proven over years to be the only means for us to attain that which we hold between ', '_large_image_2.jpg', '', 0, 43, 'Benjamin Chukwu', 'Approved', 0, '0', '2020-03-28 17:44:31'),
(59, 'Speedy two', 'Cars has proven over years to be the only means for us to attain that which we hold between ', '_large_image_3.jpg', 'image/jpeg', 165053, 43, 'Jacobs Adama', 'Approved', 0, '0', '2020-03-28 17:44:58'),
(60, 'Speedy three', 'Cars has proven over years to be the only means for us to attain that which we hold between ', '_large_image_4.jpg', 'image/jpeg', 554659, 43, 'Choice Edet', 'Approved', 0, '0', '2020-03-28 17:45:40'),
(61, 'Bitcoin Keys', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '2020-02-07T095533.241.jpeg', '', 0, 48, 'John Mattew', 'Approved', 0, '0', '2020-03-28 22:39:03'),
(63, 'Bitcoin Scale imagery', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'ssss.jpeg', '', 0, 48, 'Ruth Damascus', 'Approved', 0, '0', '2020-03-28 22:39:29'),
(66, 'SEO and more', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'Z.jpg', '', 0, 49, 'Lincon James', 'Approved', 0, '0', '2020-03-31 13:47:41'),
(67, 'Web banner', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'S.jpg', 'image/jpeg', 322885, 49, 'Choice Edet', 'Approved', 0, '0', '2020-03-31 13:48:09'),
(68, 'Atutechs Corps', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'DKC-Web-Design-Banner.jpg', '', 0, 49, 'John Mattew', 'Approved', 0, '0', '2020-03-31 13:48:28'),
(69, 'The Growth', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '5f10d5bdd05b0ade5c37595e0afda4ae.jpg', 'image/jpeg', 254918, 49, 'Benjamin Chukwu', 'Approved', 0, '0', '2020-03-31 13:48:57'),
(70, 'Lines of Web', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'X.jpg', 'image/jpeg', 98227, 49, 'Mary Silas', 'Approved', 0, '0', '2020-03-31 13:49:24'),
(71, 'Hatching Web', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '48578194-web-design-programming-seo-concept-flat-web-banners-template-set-vector-illustration-website-infogra.jpg', 'image/jpeg', 274603, 49, 'Jacobs Adama', 'Approved', 0, '0', '2020-03-31 13:51:26'),
(72, 'The Langs', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'development-banner.jpg', 'image/jpeg', 99120, 49, 'Neoton Gary', 'Approved', 0, '0', '2020-03-31 13:51:55'),
(73, '50 Lines Off', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '01_Preview 3.jpg', 'image/jpeg', 126291, 49, 'Lincon James', 'Approved', 0, '0', '2020-03-31 13:54:19'),
(74, 'Sounds of Web', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'seo-responsive-website-and-web-design-flat-banners-vector-4829126.jpg', '', 0, 49, 'John Craves', 'Approved', 0, '0', '2020-03-31 13:54:53'),
(80, 'Responsive Design', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'RespWebDesign_Banner.jpg', '', 0, 49, 'Choice Edet', 'Approved', 0, '0', '2020-04-01 05:38:29'),
(81, 'Solutions', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', 'BEE-1525-Web Design Banners_01_Preview4.jpg', '', 0, 49, 'Philips Samson', 'Approved', 0, '0', '2020-04-01 05:38:29'),
(82, 'Units', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '2-1.jpg', '', 0, 50, 'Neoton Gary', 'pending', 0, '0', '2020-04-01 12:24:33'),
(84, 'Pins', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '3.jpg', '', 0, 50, 'Benjamin Chukwu', 'pending', 0, '0', '2020-04-01 12:24:33'),
(85, 'Usams', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '4.png', '', 0, 50, 'Jacobs Adama', 'Approved', 0, '0', '2020-04-01 12:24:33'),
(86, 'Iphone Lines', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '5.jpg', '', 0, 50, 'Mary Silas', 'Approved', 0, '0', '2020-04-01 12:24:33'),
(87, 'Fashion Plugs ', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '6.jpg', '', 0, 50, 'Lincon James', 'Approved', 0, '0', '2020-04-01 12:24:33'),
(88, 'Shell Shock', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '7.jpg', '', 0, 50, 'John Craves', 'Approved', 0, '0', '2020-04-01 12:24:34'),
(89, 'Inputs', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '8.png', '', 0, 50, 'Mary Silas', 'Approved', 0, '0', '2020-04-01 12:24:34'),
(90, 'Ear Piece', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '9.png', '', 0, 50, 'Benjamin Chukwu', 'Approved', 0, '0', '2020-04-01 12:24:34'),
(91, 'The Charges', 'Sketch as an online application is a platform which provides you with the best possible ways to manage your photos. It\'s primary priorities is to give you the best right when you need it the most not just because we want to be in service for serving you gives us more happiness. Sketch\'s development started on March 2020 with Object Oriented Methodology using Php, it was developed with the sole aim of helping it\'s developer to acquire more knowledge of OOP and to aid users in ways possible.', '10.png', '', 0, 50, 'John Mattew', 'Approved', 0, '0', '2020-04-01 12:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment`
--

CREATE TABLE `reply_comment` (
  `id` int(11) NOT NULL,
  `reply_name` varchar(33) NOT NULL,
  `reply_mail` varchar(255) NOT NULL,
  `reply_msg` varchar(255) NOT NULL,
  `photo_id` varchar(3333) NOT NULL,
  `comment_id` int(166) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_comment`
--

INSERT INTO `reply_comment` (`id`, `reply_name`, `reply_mail`, `reply_msg`, `photo_id`, `comment_id`, `date`) VALUES
(1, 'Admin Elliot', 'admin_elliot@gmail.com', 'Yeah, it is very nice!', '42', 15, '2020-03-27 02:09:11'),
(2, 'Admin Tony', 'admin_tony@gmail.com', 'I do like the design to be honest', '42 ', 16, '2020-03-27 02:36:45'),
(3, 'Admin Timothy', 'admin_tim@gmail.com', 'I pray to be able to get better with both UI/UX', '42 ', 16, '2020-03-27 02:40:14'),
(4, 'Tony', 'tony@gmail.com', 'Thanks for the comment buddy!', '44 ', 19, '2020-03-27 19:27:37'),
(6, 'Admin Tonio', 'admin_tonio@gmail.com', 'The pictures within!', '52  ', 21, '2020-03-28 17:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unapproved',
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `fname`, `lname`, `pass`, `image`, `date`, `email`, `status`, `role`) VALUES
(31, 'Stephanie', 'Glory', 'Living', '$2y$12$2McuVzvSpX5mh4RAq3eJfOfZsdWN3/J3um6IGSRDj9BoUjxrLNY1u', 'woman-1.jpg', '2020-03-21 02:11:28', 'steph@gmail.com', 'Unapproved', 'Admin'),
(34, 'Admin', 'Tony', 'Victorious', '$2y$12$SYuGJShNC3483/y0Di.GVO2wxEZ3xf8Z/Vx3QuqxrStRpLCh1d2Cu', 'man-1.jpg', '2020-03-22 10:46:37', 'admin@gmail.com', 'Approved', 'Subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_comment`
--
ALTER TABLE `reply_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `reply_comment`
--
ALTER TABLE `reply_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
