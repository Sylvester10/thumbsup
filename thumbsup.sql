-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2021 at 12:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thumbsup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `roles` varchar(1000) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass_reset_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `level`, `roles`, `password`, `pass_reset_code`, `photo`, `photo_thumb`, `last_login`) VALUES
(4, 'Admin', 'admin@thumbsup.com', '08184242507', 2, 'All Roles', '46b99718fd21ebed699ea5ceb15e8231', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `snippet` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'true',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `body`, `snippet`, `featured_image`, `featured_image_thumb`, `published`, `date`) VALUES
(3, 'Blooms \'n Daisies Celebrates End Of The Year With Aplomb', 'blooms-n-daisies-celebrates-end-of-the-year-with-aplomb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ci...', 'Screenshot_2019-11-14_at_10_28_00_PM.png', 'Screenshot_2019-11-14_at_10_28_00_PM_thumb.png', 'true', '2018-11-23 14:24:08'),
(4, 'News With Image In Body', 'news-with-image-in-body', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidat<img src=\"http://topclass.com/assets/uploads/gallery/14.jpg\" alt=\"\" width=\"500\">at non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br><img src=\"localhost/topclass/assets/uploads/gallery/14.jpg\" alt=\"\" width=\"482\" height=\"322\"><br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br><br><br></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ci...', 'IMG_6599.jpg', 'IMG_6599_thumb.jpg', 'true', '2018-11-27 14:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `date_sent`) VALUES
(18, 'Max Meyer', 'onyekaesso@yahoo.com', 'Dgdtxnfylkuhj', 'Bgfiougp;glknjbrtdhv', '2019-01-22 11:53:59'),
(19, 'Quest To Reality LTD', 'admin@topclassmontessori.com', 'Ghkbjyvhrcthsg', 'Xchdvujhd', '2019-01-22 12:01:40'),
(20, 'Peter Griffin', 'info@q2rweb.com', 'Ghkbjyvhrcthsg', 'Ahjkfli;ouljmnb', '2019-01-22 12:42:02'),
(21, 'Nmakwe Sylvester', 'onykanmakwe@gmail.com', 'Dgdtxnfylkuhj', 'Dfugi;;lkjyddh', '2019-01-22 12:43:29'),
(22, 'Zbfgdf', 'admin@topclassmontessori.com', 'Ghkbjyvhrcthsg', 'EGHAEJSRUTKDJ', '2019-01-22 13:39:07'),
(23, 'Lkghcnfg', 'szfdgnxhmc@gmail.com', 'Sbzfdgn', 'Bfxdngfmhjfgv', '2019-01-22 13:49:47'),
(24, 'Thomas Jeff', 'onyekaesso@yahoo.com', 'Rsgtdm,u/.k,jmhnbg', 'Bhnj/.lhj,ngbfvdvd', '2019-01-22 23:22:43'),
(25, 'Sghcfgh', 'fsgfdhgfh@gmail.com', 'Dfmghjmhcngb', 'Rsjhtdhc', '2019-01-23 14:59:05'),
(26, 'Peter Griffin', 'Admin@bloomsndaisies.com', 'Sbzfdgn', 'O.kjntdvhbctrhg', '2019-01-23 15:00:55'),
(27, 'Nmakwe Sylvester', 'onyekaesso@yahoo.com', 'Dnfhmngbfzb', 'DBzd htxhn', '2019-01-23 15:07:32'),
(28, 'Quest To Reality LTD', 'info@q2rweb.com', 'Sagthdsbvf', 'Loylikubiyvfuyc', '2019-01-23 15:08:53'),
(29, 'Debbie', 'Debbie@yahoo.com', 'Enquiry', 'I love this school', '2019-01-24 10:38:46'),
(30, 'Micheal Ibokette', 'Admin@bloomsndaisies.com', 'Wegasethg', 'Hgckvjbl;kkkjh', '2020-02-14 12:02:25'),
(31, 'Sdvsdgbfacsdvs', 'wbvfbse@gmail.com', 'Sefbgrnbrgrh', 'Nrgbrrtgbvefer', '2020-02-14 12:10:11'),
(32, 'Nathan Igor', 'maildizontrust@gmail.com', 'New School', 'This is a new message', '2021-02-03 21:33:38'),
(33, 'Nathan Igor', 'maildizontrust@gmail.com', 'Klhbkhj', 'Jklnilbhvjn', '2021-04-15 10:14:37'),
(34, 'Nathan Igor', 'maildizontrust@gmail.com', 'J,kghfd', 'Ljnkhgf', '2021-04-15 10:15:27'),
(35, 'Nathan Igor', 'maildizontrust@gmail.com', 'Kjhfgdsdghbj', 'Xcfgvhbjnkmjnhgxcgvhb', '2021-04-15 10:16:19'),
(36, 'Nathan Igor', 'maildizontrust@gmail.com', 'Test', 'This is one of those tests y\'know', '2021-05-13 15:19:48'),
(37, 'Nathan Igor', 'maildizontrust@gmail.com', 'Test', 'This is one of those tests y\'know', '2021-05-13 15:22:22'),
(38, 'Micheal Ibokette', 'cryptomainfo@gmail.com', 'New School', 'Kjhkjgfdssdfgvhbjnkkmjhg fc', '2021-05-13 15:22:39'),
(39, 'Micheal Ibokette', 'cryptomainfo@gmail.com', 'New School', 'Kjhkjgfdssdfgvhbjnkkmjhg fc', '2021-05-13 15:23:07'),
(40, 'Micheal Ibokette', 'cryptomainfo@gmail.com', 'New School', 'Kjhkjgfdssdfgvhbjnkkmjhg fc', '2021-05-13 15:23:37'),
(41, 'Micheal Ibokette', 'cryptomainfo@gmail.com', 'Elrufghurehgoi', 'Kbtcrtyxtexeszxcferxrwazxfvhurvbikvbnmbkn', '2021-05-13 15:24:02'),
(42, 'Micheal Ibokette', 'maildizontrust@gmail.com', 'L,bhgvfc', 'Gvhjbnk', '2021-05-13 15:28:00'),
(43, 'Micheal Ibokette', 'cryptomainfo@gmail.com', 'Elrufghurehgoi', 'M,hdz6xycrtvghjnmitvlb,n.m,', '2021-05-13 15:32:43'),
(44, 'Micheal Ibokettess', 'cryptomaiffdssnfo@gmail.com', 'New School', 'Plesea work o', '2021-05-13 15:34:15'),
(45, 'Lnbkhvjghgffgcj', 'ddd@gmail.com', 'Knjbkhvjghcfg', 'Dfcgvhbjnbhvgc', '2021-07-18 17:18:31'),
(46, 'Fff', 'ggg@mail.com', 'New School', 'L;hkgjfxddxghjkhgf', '2021-07-31 21:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `day` varchar(50) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `date_unix` varchar(255) DEFAULT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `snippet` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `guest` varchar(255) DEFAULT NULL,
  `zoom_link` varchar(255) DEFAULT NULL,
  `google_form` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_thumb` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'false',
  `date_created` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `published` varchar(10) NOT NULL DEFAULT 'false',
  `date` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `org_structure`
--

CREATE TABLE `org_structure` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `abbr` varchar(10) DEFAULT NULL,
  `under` varchar(10) DEFAULT NULL,
  `rank` int(10) DEFAULT NULL,
  `hash_key` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `date_added` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_structure`
--

INSERT INTO `org_structure` (`id`, `fullname`, `abbr`, `under`, `rank`, `hash_key`, `address`, `type`, `amount`, `date_added`) VALUES
(2, 'Thumbs-Up Initiative', 'TUPI', NULL, 1000, 'bcf1b3be2f036d51d44819d44252b9cc91c40950', 'TUPI', 'structure', NULL, 1624572175),
(29, 'Research And Development Unit', 'RDU', 'ADU', 88, 'eff91c5c26b8a4efc1be06297a5e913f973040cc', 'TUPI/ADU/RDU', 'structure', NULL, 1625488998),
(30, 'Finance Unit', 'FIU', 'ADU', 88, 'ae50a46ee4354efade5d5b5b4d3e7277092c12e4', 'TUPI/ADU/FIU', 'structure', NULL, 1625489045),
(31, 'Public Relation And Welfare Unit', 'PRU', 'ADU', 88, '4346c8d745c6c219f2ccceb7a3ce6f245aa68eae', 'TUPI/ADU/PRU', 'structure', NULL, 1625489070),
(32, 'University Of YOU', 'UNY', 'TRU', 85, '368e91bb69c42ff2ae770e2606105b6d13e0e09a', 'TUPI/ADU/TRU/UNY', 'structure', NULL, 1625489111),
(28, 'Media Unit', 'MDU', 'ADU', 88, '37c2434e0bd1f02d66e653efeeb6b48c5fa61673', 'TUPI/ADU/MDU', 'structure', NULL, 1625488938),
(27, 'Business Unit', 'BSU', 'ADU', 88, '1fdbe0a47d24e774543114fa6a100869ee5b9d7d', 'TUPI/ADU/BSU', 'structure', NULL, 1625488911),
(26, 'Outreach Unit', 'OTU', 'ADU', 88, 'da07788817d298d556b1623ab2af9e0a303a7d58', 'TUPI/ADU/OTU', 'structure', NULL, 1625488584),
(25, 'Training Unit', 'TRU', 'ADU', 88, '7b6a629c3aec469b19b418dacae8e7b6c524ddc1', 'TUPI/ADU/TRU', 'structure', NULL, 1625488460),
(23, 'Boad Of Trustees', 'BOT', 'TUPI', 98, '5d64f40a226c473e99849d9c173c5c020394514f', 'TUPI/BOT', 'structure', NULL, 1625488255),
(24, 'Administrative Unit', 'ADU', 'TUPI', 89, 'cecfb3b79e8278c955fc57434b672daf8a707c28', 'TUPI/ADU', 'structure', NULL, 1625488303),
(33, 'Business And Financial Academy', 'BFA', 'TRU', 84, '03b7868e14b7e5d1c9436c421daa157bbfaa911c', 'TUPI/ADU/TRU/BFA', 'structure', NULL, 1625489173),
(34, 'Institutional Partnerships', 'INP', 'TRU', 84, '82348b76cb97904d39285049b7b8a80e2b28000f', 'TUPI/ADU/TRU/INP', 'structure', NULL, 1625489215),
(35, 'Passive Learning', 'PAL', 'TRU', 84, '5cee187af065bdbb4e941fc730d0e9eaf4e9e843', 'TUPI/ADU/TRU/PAL', 'structure', NULL, 1625489236),
(36, 'Extra-Curricular', 'EXC', 'TRU', 84, '48bdc36e43d9309b3361feaebcea56a2dfcbd54d', 'TUPI/ADU/TRU/EXC', 'structure', NULL, 1625489272),
(37, 'School Of Leadership', 'SCL', 'UNY', 80, '1bd8e503d549b8ed5a8135dac418d1de59b961ff', 'TUPI/ADU/TRU/UNY/SCL', 'structure', NULL, 1625489304),
(38, 'School Of Self', 'SCS', 'UNY', 80, '8d2abb8a4fe323898d7629ce512ada360d6efab0', 'TUPI/ADU/TRU/UNY/SCS', 'structure', NULL, 1625489340),
(39, 'Founder', 'FOD', 'TUPI', 100, 'b99787d09eecf1125a0bec888949d2f00ff87fea', 'TUPI/FOD', 'position', 1, 1625489780),
(41, 'Training Unit Leader', 'TRUL', 'TRU', 80, 'f14971bf573f8a5dca5faf4a5d2822fbffcfd459', 'TUPI/ADU/TRU/TRUL', 'position', 1, 1625491413),
(42, 'Training Unit Member', 'TRUM', 'TRU', 50, '7bb743c8eef93583ecc2d679ab89d406de854ac0', 'TUPI/ADU/TRU/TRUM', 'position', 100, 1625491482),
(43, 'Outreach Unit Member', 'OTUM', 'OTU', 50, '0aea8e49abbdb18c803fc34a3ba6ee669e3ef827', 'TUPI/ADU/OTU/OTUM', 'position', 100, 1625491664),
(44, 'Outreach Unit Leader', 'OTUL', 'OTU', 80, 'f90aa36812b2b0614765549db20c5fecb1d7c2b5', 'TUPI/ADU/OTU/OTUL', 'position', 1, 1625491710),
(45, 'Business Unit Member', 'BSUM', 'BSU', 50, '69c6bcea5802b142da974a0402017d2847204964', 'TUPI/ADU/BSU/BSUM', 'position', 100, 1625491786),
(46, 'Business Unit Leader', 'BSUL', 'BSU', 80, '292e3237d663dad32d6efa736b48bca038c444c0', 'TUPI/ADU/BSU/BSUL', 'position', 1, 1625491826),
(47, 'Media Unit Member', 'MDUM', 'MDU', 50, 'db110c75954dcab707bb39c5250df76fcfebaf6d', 'TUPI/ADU/MDU/MDUM', 'position', 100, 1625491869),
(48, 'Media Unit Leader', 'MDUL', 'MDU', 80, 'b101afe1297b2f3f599ba6c8c83dc823bbd98d29', 'TUPI/ADU/MDU/MDUL', 'position', 1, 1625491933),
(49, 'Research And Development Unit Member', 'RDUM', 'RDU', 50, '7ee51940edf092321bc7a7eed909f4e4df22d8a6', 'TUPI/ADU/RDU/RDUM', 'position', 100, 1625491979),
(50, 'Research And Development Unit Leader', 'RDUL', 'RDU', 80, '43a03875eb3263dcbced3ab92f23c1e2d9f4860c', 'TUPI/ADU/RDU/RDUL', 'position', 1, 1625492080),
(51, 'Finance Unit Member', 'FIUM', 'FIU', 50, '90cae892f91c51c0c03363d04aed64b3ce177d0d', 'TUPI/ADU/FIU/FIUM', 'position', 100, 1625492185),
(52, 'Finance Unit Leader', 'FIUL', 'FIU', 80, 'c754d9ec27b3c2e7d7dcebf67605341ff8c3c42d', 'TUPI/ADU/FIU/FIUL', 'position', 1, 1625492209),
(53, 'Public Relation And Welfare Unit Member', 'PRUM', 'PRU', 50, 'b4d2185af48fe870da6588739b0683d5d8c718b7', 'TUPI/ADU/PRU/PRUM', 'position', 100, 1625492272),
(54, 'Public Relation And Welfare Unit Leader', 'PRUL', 'PRU', 80, '74f25cecaf0bcbf9abd98047d36cd0223c4ef3a8', 'TUPI/ADU/PRU/PRUL', 'position', 1, 1625492313),
(55, 'Legal Counsel', 'LEC', 'BOT', 87, 'a408d549177f35e53e6d946319ba34404b57e8d1', 'TUPI/BOT/LEC', 'position', 1, 1625492410),
(56, 'Volunteering', 'VOL', 'OTU', 50, '8659b5f64eb238e5f8479c2e950aa807e74e6942', 'TUPI/ADU/OTU/VOL', 'position', 100, 1625492463),
(57, 'Dean Of School Of Self', 'DSS', 'SCS', 79, 'c3800323b5eb203b45deb3ffc73597f6f5d886d1', 'TUPI/ADU/TRU/UNY/SCS/DSS', 'position', 1, 1625492520),
(58, 'Deputy Dean School Of Self', 'DDS', 'SCS', 78, '2b2eb27d9c6808a345d4424d9beb9471e24ae49d', 'TUPI/ADU/TRU/UNY/SCS/DDS', 'position', 1, 1625492559),
(59, 'Dean Of School Of Leadership', 'DSL', 'SCL', 79, 'c8a453880e1cdaf019d081a523a11e989539c307', 'TUPI/ADU/TRU/UNY/SCL/DSL', 'position', 1, 1625492604),
(60, 'Deputy Dean School Of Leadership', 'DDL', 'SCL', 78, '568bc9d7709212fbf0c2c46e0cd783324db7d3b6', 'TUPI/ADU/TRU/UNY/SCL/DDL', 'position', 1, 1625492638);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `hash_key` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `organisation` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `position_main` varchar(255) DEFAULT NULL,
  `position_other` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT 'https://facebook.com/',
  `twitter` varchar(255) DEFAULT 'https://twitter.com/',
  `instagram` varchar(255) DEFAULT 'https://instagram.com/',
  `linkedin` varchar(255) DEFAULT 'https://linkedin.com/',
  `date_added` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_stats`
--

CREATE TABLE `school_stats` (
  `id` int(11) NOT NULL,
  `students` int(11) NOT NULL,
  `classes` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `teachers` int(11) NOT NULL,
  `school_buses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_stats`
--

INSERT INTO `school_stats` (`id`, `students`, `classes`, `staff`, `teachers`, `school_buses`) VALUES
(1, 467, 10, 29, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `date_added` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `residential_address` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'true',
  `quote` varchar(255) DEFAULT NULL,
  `facebook_handle` varchar(255) DEFAULT 'https://facebook.com/',
  `twitter_handle` varchar(255) DEFAULT 'https://twitter.com/',
  `instagram_handle` varchar(255) DEFAULT 'https://instagram.com/',
  `linkedin_handle` varchar(255) DEFAULT 'https://linkedin.com/',
  `classes_assigned` varchar(1000) DEFAULT NULL,
  `subjects_assigned` varchar(1000) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `designation`, `date_of_birth`, `sex`, `residential_address`, `additional_info`, `photo`, `photo_thumb`, `active`, `quote`, `facebook_handle`, `twitter_handle`, `instagram_handle`, `linkedin_handle`, `classes_assigned`, `subjects_assigned`, `date_added`, `last_login`) VALUES
(149, 'Eyibio Susan', 'eyibiosusan@topclass.com', '0908796858', 'Class Teacher', '1999/04/11', 'Female', 'Topclass', '', 'Eyibio_Susan.png', 'Eyibio_Susan_thumb.png', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 2', 'Teacher', '2018-12-02 23:08:51', NULL),
(150, 'Jenny Usani', 'jennyusani@topclass.com', '093553343545', 'Class Teacher', '1990/11/07', 'Female', 'Topclass', '', 'Jenny_Usani.jpg', 'Jenny_Usani_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Pine Class', 'Pine Class', '2018-12-02 23:21:51', NULL),
(151, 'Great S. Oko', 'great@topclass.com', '0908796858', 'Class Teacher', '1992/04/10', 'Male', 'Topclass', '', 'Great_S__Oko.jpg', 'Great_S__Oko_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 3', 'Composition And Verbal Reasoning', '2018-12-02 23:28:09', NULL),
(152, 'Micaiah Ita', 'micaiahita@topclass.com', '07033085090', 'Class Teacher', '2000/12/28', 'Female', 'Topclass', '', 'Micaiah_Ita.jpg', 'Micaiah_Ita_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 1', '(Lady Bird \"E\"', '2018-12-02 23:50:10', NULL),
(153, 'Mfon Akpan', 'mfonakpan@topclass.com', '09037383863', 'Class Teacher', '2018/01/02', 'Female', 'Topclass', '', 'Mfon_Akpa.jpg', 'Mfon_Akpa_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Pine Class', 'Pine Class', '2018-12-02 23:50:20', NULL),
(154, 'Uket Agnes', 'uketagnes@topclass.com', '07033085090', 'Class Teacher', '1992/10/14', 'Female', 'Topclass', '', 'Uket_Agnes.jpg', 'Uket_Agnes_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary  3', 'Visual And Cultural Arts', '2018-12-03 00:06:25', NULL),
(155, 'Utibe Ikpe', 'utibeikpe@topclass.com', '09035725267', 'Class Teacher', '1999/05/17', 'Female', 'Topclass', '', 'Utibe_Ikpe.jpg', 'Utibe_Ikpe_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 00:06:44', NULL),
(156, 'Monica Ushanu', 'monicaushanu@topclass.com', '0908796858', 'Class Teacher', '1994/03/31', 'Female', 'Topclass', '', 'monica_shanu.jpg', 'monica_shanu_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 3', 'Teacher', '2018-12-03 02:13:18', NULL),
(157, 'Victor Percy', 'victorpercy@topclass.com', '0908796858', 'Class Teacher', '1992/08/17', 'Male', 'Topclass', '', 'victor_Percy.jpg', 'victor_Percy_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary', 'Maths And Quantitative Reasoning', '2018-12-03 02:13:37', NULL),
(158, 'Wakama I. Elliot', 'wakama@topclass.com', '093553343545', 'Class Teacher', '1990/05/23', 'Male', 'Topclass', '', 'Wakama_elliot.jpg', 'Wakama_elliot_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 2', 'Vocational Aptitude And Computer Studies', '2018-12-03 02:21:50', NULL),
(159, 'Esther Linus', 'esther_linus@topclass.com', '0908796858', 'Class Teacher', '1995/07/19', 'Female', 'Topclass', '', 'esther_inus.jpg', 'esther_inus_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 1', '(Lady Bird \"E\")', '2018-12-03 02:31:07', NULL),
(160, 'Grace Ukper', 'grace_ukper@topclass.com', '0908796858', 'Class Assistant', '1994/10/19', 'Female', 'Topclass.com', '', 'grace_ukper.jpg', 'grace_ukper_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Pine Class', 'Pine Class', '2018-12-03 02:31:18', NULL),
(161, 'Mercy Victor', 'mercy_victor@topclass.com', '0908796858', 'Class Teacher', '1989/06/01', 'Female', 'Topclass', '', 'mercy_victor.jpg', 'mercy_victor_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 5', 'Mathematics', '2018-12-03 02:43:03', NULL),
(162, 'Grace Ante', 'grace_nte@topclass.com', '0908796858', 'Class Teacher', '1995/11/23', 'Female', 'Topclass', '', 'grace_ante.jpg', 'grace_ante_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 02:43:17', NULL),
(163, 'Ntekim Ntekim', 'ntekimntekim@topclass.com', '09035725267', 'Class Teacher', '1994/10/27', 'Male', 'Topclass', '', 'ntekim_ntekim.jpg', 'ntekim_ntekim_thumb.jpg', 'false', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary  2', 'Pysical Education And C.R.K', '2018-12-03 02:53:44', NULL),
(164, 'Nsaka Magaret', 'nsakaagaret@topclass.com', '0908796858', 'Class Teacher', '1999/10/08', 'Female', 'Topclass.', '', 'IMG_20181115_161516.jpg', 'IMG_20181115_161516_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 1', '(lady Bird \"N\")', '2018-12-03 02:53:54', NULL),
(165, 'Oka Anthonia', 'okaanthonia@topclass.com', '07033085090', 'Class Assistant', '2001/03/06', 'Female', 'Topclass', '', 'IMG_20190826_205954.jpg', 'IMG_20190826_205954_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 03:03:11', NULL),
(167, 'Otu Elizabeth', 'otu_elizabeth@topclass.com', '09035725267', 'Class Teacher', '1991/10/29', 'Female', 'Topclass', '', 'IMG_20180817_062021.jpg', 'IMG_20180817_062021_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Nursery 3', 'Teacher', '2018-12-03 03:13:50', NULL),
(168, 'Sandra Orioha', 'sandra_orioha@topclass.com', '07033085090', 'Class Teacher', '1994/11/30', 'Female', 'Topclass', '', 'IMG_20170821_204927.jpg', 'IMG_20170821_204927_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 2', 'Comprehensive And English Language', '2018-12-03 03:14:03', NULL),
(169, 'Ukpong Janet', 'ukpong_janet@topclass.com', '07033085090', 'Class Teacher', '1994/10/19', 'Female', 'Topclass', '', '1395020714468.jpg', '1395020714468_thumb.jpg', 'true', '', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', 'Primary 1', 'Teacher', '2018-12-03 03:39:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `testimony` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `date` int(50) DEFAULT NULL,
  `published` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `testimony`, `photo`, `photo_thumb`, `date`, `published`) VALUES
(32, 'Nathan Igor', 'Manager', 'Testsimony oooo', 'Batman_Black_n_White-wallpaper-109567932.jpg', 'Batman_Black_n_White-wallpaper-109567932_thumb.jpg', 1627812383, 'true'),
(33, 'Peter Grifin', 'Manager', 'Another one', '6808511.jpeg', '6808511_thumb.jpeg', 1627812426, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(990) DEFAULT NULL,
  `published` varchar(50) NOT NULL,
  `date_added` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `published`, `date_added`) VALUES
(6, 'Outreach Unit', '<p><strong>Responsible for External Public Activities, Events and Programs</strong></p>\r\n      <ul>\r\n       <li>Charity visits</li><br>\r\n     <li>Social media live chats and videos.</li><br>\r\n     <li>Volunteering.</li><br>\r\n     <li>Institutional Partnerships: School Adoptions, individual and groups</li>\r\n      </ul>', 'true', 1627811959),
(7, 'Media Unit', '<p><strong>Officially Responsible for TUPI contents and Content Development; Handles Coverage and Recording, Documentations, Media, Multi-Media, Info-tech and Internet and any other media related based activities/exercises of TUPI.</strong></p>', 'true', 1627593232),
(8, 'Business Unit', '<p><b>Officially responsible for all business activities and exercises of TUPI and responsible for working with the R&D team in getting grants for TUPI</b></p>', 'true', 1627593284),
(9, 'Research And Development Unit', '<p><strong>Handles knowledge-based data/resources that attract funding, and projects that magnifies TUPI</strong></p>', 'true', 1627593327),
(10, 'Finance Unit', '<p><strong>Takes and Keeps financial records of TUPI. Release and Regulates funds to various teams for TUPI activities</strong></p>', 'true', 1627593407),
(13, 'Training Unit', '<p><strong>Responsible for all Formal and Informal Grooming/Training in line with TUPI</strong></p>\r\n      <ul><li>University of YOU (School of Leadership and Self Development)</li><li>Business and Financial Academy/University (Grooming of Business Modules/Financial Grooming)</li><li>Institutional Partnerships: School Adoptions, individual and group </li><br><li>Passive learning (Cartoons, drama skits, entertaining learning, etc.)</li></ul>\r\n\r\n    <p><strong>Extra-Curricular</strong></p>\r\n    <ul><li>Sports</li><li>Competitions</li><li>Skill Acquisition</li><li>Dance</li><li>Martial Art etc.</li></ul>', 'true', 1627609689),
(14, 'Public Relation And Welfare Unit', '<p><b>Takes record of all minutes in central meetings</b></p>\r\n<ul>\r\n <li>Collates reports from Unit Heads/Secretaries</li><br>\r\n <li>Collates the report/record of financial activities, exercise and needs of Units</li><br>\r\n <li>Makes financial provision for Units, Central Activities, Events and Programs.</li><br>\r\n <li>Coordinates and assists the set up for TUPI activities</li><br>\r\n <li>Coordinates the activities of TUPI; Meetings, Event, Units, Time, Contents and Floor Management (flow of Meeting).</li><br>\r\n <li>Manges Quality Control of the Image and reputation of TUPI internally and publicly</li><br>\r\n <li>Works closely with the Admin team to drive the decisions and plans of the central goal.</li><br>\r\n</ul>', 'true', 1627763753);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `r_phone` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) DEFAULT NULL,
  `place_of_employment` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `office_phone` varchar(255) DEFAULT NULL,
  `date_added` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `address`, `state`, `residence`, `phone`, `email`, `availability`, `qualification`, `language`, `f_name`, `m_name`, `l_name`, `r_phone`, `r_email`, `place_of_employment`, `position`, `office_phone`, `date_added`) VALUES
(20, 'Peter Grifin', '10 Pius Adieq', 'Jigawa', 'Lagos, Portharcourt', '23456787654', 'ddd@gmail.com', '2021-07-23', 'Degree, Masters, PhD', 'Igbo, Yoruba', 'Svfdvfadv', 'Dfvfadvdf', 'Sdvfdvadf', '123456', 'ddd@gmail.com', 'Fvferveqvevf', 'Evvaveef', '987654', 1626706945),
(21, 'Esther Iwara', '.,vbhe,bv.nevjhkebvnjkegbelkjbl.vn.ekvn.ejkv kj', 'Akwa Ibom', 'Abuja, Lagos, Portharcourt', '08077765545', 'ddd@gmail.com', '2021-08-06', 'FSLC, NCE, Degree, PhD, Other', 'English, Yoruba, Hausa', 'Fsver', 'Kjbvwjhgcvqewhjgk', 'Kdbjkheq rj', '0987654', 'ddd@gmail.com', 'Qwdqrver', 'Ewrgqerfer', '24135646564', 1626714323),
(22, 'Sdcsd', 'Dsvdfvafdvaevvvafvj;klnjkbnvievbevkhbelveivbje;lvebvevbejlvn.evjkevbniuebvenvoi;ercnveiuvlevnever;vcner', 'Adamawa', 'Abuja, Lagos, Portharcourt', '9876545678', 'ss@gmail.com', '2021-07-30', 'Masters, PhD', 'English, Yoruba', 'Sss', 'Sss', 'Sss', '87654345678987', 'sss@gmail.com', 'Sss', 'Sss', '9876545678', 1627582420),
(23, 'Ddd', 'Ddddddd', 'Abia', 'Abuja, Lagos', '876545678876', 'sss@gmail.com', '2021-07-31', 'PhD, Other', 'English, Igbo', 'Sss', 'Sss', 'Sss', '8765456', 'sss@gmail.com', 'Ssss', 'Ssss', '98765434', 1627582503),
(24, 'Ddd', 'Kmnjbhkvjghtckyghcnkuteygwhj', 'Anambra', 'Lagos', '+23487656789876', 'ddd@gmail.com', '2021-08-07', 'PhD', 'English', 'Jbhvgcf', 'Jklbhvg', 'Jkhg', '987654', 'ddd@gmail.com', 'Kjhg', 'Khbjvgf', '876543', 1627584959),
(25, 'Josh Brolin', 'Kgjfsdcvkuybenvmeglvyb', 'Delta', 'Lagos', '234567654', 'onyekaesso10@gmail.com', '2021-08-07', 'FSLC, NCE', 'English', 'Fer', 'Sss', 'Sss', '987654', 'ddd@gmail.com', 'Jhgf', 'Jhgf', '09876543', 1627677701),
(26, 'Sss', 'Sss', 'Adamawa', 'Abuja, Lagos, Portharcourt', '345678', 'onyekaesso10@gmail.com', '2021-08-06', 'Other', 'Yoruba', 'Ddd', 'Ddd', 'Ddd', '222', 'ddd@gmail.com', 'Ddd', 'Dd', '22', 1627686391),
(27, 'Ddd', 'Dddd', 'Enugu', 'Abuja', '2233', 'onyekaesso10@gmail.com', '2021-07-29', 'SSCE', 'English', 'Asdd', 'Fsdsd', 'Asdsds', '233', 'ddd@gmail.com', 'Wsadff', 'Sdfsdaf', '333', 1627686505),
(28, 'Ssss', 'Sssssssss', 'Ekiti', 'Abuja', '234567654', 'onyekaesso10@gmail.com', '2021-08-08', 'Other', 'Yoruba', 'Sss', 'Sss', 'Sss', '2222', 'ddd@gmail.com', 'Sss', 'Sss', '2222', 1627686624),
(29, 'Dd', 'Dddd', 'Ekiti', 'Abuja', '222', 'onyekaesso10@gmail.com', '2021-08-04', 'SSCE', 'English, Igbo, Yoruba, Hausa', 'Dd', 'Dd', 'Dd', '222', 'ddd@gmail.com', 'Ddd', 'Ddd', '222', 1627686832),
(30, 'DFSBRGBRG', 'Dsadsd', 'Adamawa', 'Abuja', '234567654', 'onyekaesso10@gmail.com', '2021-08-08', 'OND', 'Igbo', 'Dd', 'Dd`dd', 'Dd', '22', 'ddd@gmail.com', 'Dd', 'Dd', '222', 1627687114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_structure`
--
ALTER TABLE `org_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_stats`
--
ALTER TABLE `school_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `org_structure`
--
ALTER TABLE `org_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `school_stats`
--
ALTER TABLE `school_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
