-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 10:19 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumet_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'dumet', '7516c3b35580b3490248629cff5e498c'),
(4, 'dumet', 'a5ebb0d6bae502fb5933838ea6986e47'),
(5, 'joko', '9ba0009aa81e794e628a04b51eaf7d7f');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `icon`) VALUES
(1, 'Premium', 'icon-premium.svg'),
(2, 'Photo', 'icon-photo.svg'),
(3, 'Font', 'icon-font.svg'),
(4, 'Theme', 'icon-themes.svg'),
(5, 'Photoshop', 'icon-psd.svg'),
(6, 'Illustrator', 'icon-ai.svg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `name`, `comment`, `image`, `status`, `date`) VALUES
(1, 1, 'Nathan Shaw', 'Well done ! I like the way you did it. Awesome !', 'avatar.png', 1, '2018-05-07 09:47:24'),
(2, 1, 'Igor Vlademir', 'Awesome mockup, i like it very much ! It will help me for my website i was looking for since few days. Thank you a lot.', 'avatar.png', 1, '2018-05-07 09:48:31'),
(9, 15, 'Erick Jope', 'Amazing post...', 'avatar.png', 1, '2018-05-13 15:52:38'),
(13, 1, 'Johny Deep', 'Wonderful Post', 'avatar.png', 0, '2018-05-14 17:25:03'),
(14, 16, 'Adi Asmara', 'Terrific!', 'avatar.png', 0, '2018-05-17 16:10:40'),
(16, 17, 'Irwan Mahfud', 'Good', 'avatar.png', 1, '2018-05-17 16:15:39'),
(18, 8, 'Manohara Jemat', 'Impresive', 'avatar.png', 0, '2018-05-21 11:20:10'),
(19, 1, 'Agus', 'Good Good', 'avatar.png', 1, '2018-05-22 11:35:23'),
(21, 18, 'Agus', 'Test', 'avatar.png', 1, '2018-05-22 17:01:11'),
(22, 5, 'Test', 'Test', 'avatar.png', 1, '2018-06-03 17:46:07'),
(23, 3, 'Anton', 'Ghkljdaljslkj;a', 'avatar.png', 0, '2018-06-03 12:57:09'),
(24, 23, 'Adi', 'Test\r\n', 'avatar.png', 0, '2018-08-03 15:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `description`, `image`, `user`, `date`) VALUES
(1, 5, 'Wordpress theme', 'Symphony is a responsive one page website template designed with sketches and coded with html5 and php. Freebie released by Lacoste Xavier.', 'psd-4.jpg', 'Onuur', '2018-04-22 16:22:50'),
(2, 3, 'Free font', 'Bavro is a minimal free font best suitable for posters and headlines. Designed and released by Marcelo Melo.', 'font-1.jpg', 'Johny', '2018-04-22 16:25:10'),
(3, 5, 'PSD Goodies', 'A set of high resolution iPhone 6 and Nexus 5 mockups created with smart objects. Free PSD released by Ghani Pradita.', 'psd-1.jpg', 'Arthika', '2018-04-22 16:29:53'),
(4, 5, 'PSD Goodies', 'A set of 4 free photorealistic Nexus 5 mockups providing smart objects. Free PSD released by Craftwork.', 'psd-2.jpg', 'Eko Budiman', '2018-04-22 16:29:53'),
(5, 6, 'Illustrator freebies', 'A set of 6 outline beer icons created with Adobe Illustrator. Free Ai designed and released by Justas Galaburda.', 'ai-1.jpg', 'Bertrand', '2018-04-22 16:42:13'),
(6, 4, 'Html theme', 'Symphony is a responsive one page website template designed with sketches and coded with html5 and php. Freebie released by Lacoste Xavier.', 'theme-2.jpg', 'Bella', '2018-04-22 16:42:13'),
(7, 5, 'PSD goodies', 'A set of 9 high-quality Apple Watch mockups created with Photoshop smart objects. Free PSD released by Samuel Medvedowsky.', 'psd-3.jpg', 'Welly', '2018-04-22 16:42:13'),
(8, 3, 'Free font', 'Beyno is a free uppercase font with a futuristic feel and look. Designed and released by Fabian Korn.', 'font-2.jpg', 'Andy', '2018-04-22 16:42:13'),
(9, 4, 'Wordpress theme', 'Symphony is a responsive one page website template designed with sketches and coded with html5 and php. Freebie released by Lacoste Xavier.', 'font-3.jpg', 'Richard', '2018-04-22 16:42:13'),
(10, 6, 'Illustrator icons', 'A set of 16 outline space icons created with Adobe Illustrator. Free Ai designed and released by Justas Galaburda.', 'ai-2.jpg', 'Umi', '2018-04-22 16:57:42'),
(11, 5, 'PSD icons', 'Grap is a set of 9 simple but coloured icons created with Photoshop. Free PSD released by kamran bhatti.', 'icons-1.jpg', 'Julian', '2018-04-22 16:57:42'),
(12, 1, 'UI design', 'Acess to our largest database of the web about the ui and look into a ton of professionnal tools', 'ui-1.jpg', 'Theresia', '2018-04-22 16:57:42'),
(13, 3, 'Free font', 'A set of 6 outline beer icons created with Adobe Illustrator. Free Ai designed and released by Justas Galaburda.', 'font-5.jpg', 'Patrick', '2018-04-22 16:57:42'),
(14, 4, 'Html theme', 'Symphony is a responsive one page website template designed with sketches and coded with html5 and php. Freebie released by Lacoste Xavier.', 'theme-2.jpg', 'Eunice', '2018-04-22 16:57:42'),
(15, 5, 'PSD mockup', 'A very detailed Macbook Air mockup created with Photoshop and providing smart objects. Free PSD released by Barin Cristian.', 'psd-5.jpg', 'Umar', '2018-04-22 17:07:23'),
(16, 5, 'PSD icons', 'A set of 16 hand gestures icons you may find useful for your projects. Free PSD released by Rovane Durso.', 'icons-3.jpg', 'David', '2018-04-22 17:07:23'),
(17, 3, 'Free font', 'Julep is an elegant and modern free font released in vector formats (Ai, EPS and PDF). Designed and released by Jeremy Ross', 'font-4.jpg', 'Elena', '2018-04-22 17:07:23'),
(18, 4, 'HTML theme', 'Gorgo is a free HTML portfolio template for freelancers, photographers, agencies, designers and other creative fields. Designed and released by Aristothemes.', 'theme-3.jpg', 'Joshua', '2018-04-22 17:07:23'),
(19, 3, 'Free font', 'REEF is a rounded font free for commercial and personal use. It\'s strength lies in simplicity and construction.', 'font-6.jpg', 'Sylvester', '2018-04-22 17:07:23'),
(20, 4, 'HTML theme', 'ActiveBox is a free responsive HTML template featured by clean and minimalistic design. Designed and coded by Kamal Chaneman.', 'theme-4.jpg', 'Hartono', '2018-04-22 17:09:16'),
(23, 2, 'Premium Best', 'Test Test Test', 'icons-1.jpg', ' ', '2018-05-22 12:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
