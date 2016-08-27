-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2016 at 05:11 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taps`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `userid` int(11) UNSIGNED NOT NULL,
  `sscInst` varchar(72) DEFAULT NULL,
  `sscUniv` varchar(72) DEFAULT NULL,
  `sscPer` float DEFAULT NULL,
  `sscPassYr` year(4) DEFAULT NULL,
  `interInst` varchar(72) DEFAULT NULL,
  `interUniv` varchar(72) DEFAULT NULL,
  `interPer` float DEFAULT NULL,
  `interPassYr` year(4) DEFAULT NULL,
  `dipInst` varchar(72) DEFAULT NULL,
  `dipUniv` varchar(72) DEFAULT NULL,
  `dipPer` float DEFAULT NULL,
  `dipPassYr` year(4) DEFAULT NULL,
  `dipStream` varchar(72) DEFAULT NULL,
  `gradInst` varchar(72) DEFAULT NULL,
  `gradUniv` varchar(72) DEFAULT NULL,
  `gradPer` float DEFAULT NULL,
  `gradPassYr` year(4) DEFAULT NULL,
  `gradStream` varchar(72) DEFAULT NULL,
  `gradCourse` varchar(72) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`userid`, `sscInst`, `sscUniv`, `sscPer`, `sscPassYr`, `interInst`, `interUniv`, `interPer`, `interPassYr`, `dipInst`, `dipUniv`, `dipPer`, `dipPassYr`, `dipStream`, `gradInst`, `gradUniv`, `gradPer`, `gradPassYr`, `gradStream`, `gradCourse`) VALUES
(1, '', '', 90, 0000, 'cool', '', 90, 0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(10) NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `visit_id` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `round_no` int(6) NOT NULL DEFAULT '1',
  `feedback` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `userid`, `visit_id`, `status`, `round_no`, `feedback`, `timestamp`) VALUES
(11, 1, 3, 2, 3, 0, '2016-07-08 15:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `website` varchar(128) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=not yet 1=approved 2=to be deleted 3=deleted 4=modify request',
  `logofilename` varchar(50) NOT NULL DEFAULT 'dummy',
  `cod_id` int(11) NOT NULL,
  `info` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `website`, `approved`, `logofilename`, `cod_id`, `info`) VALUES
(1, 'Facebook', 'http://facebook.com', 1, '1.png', 1, 'Social Networking Platform');

-- --------------------------------------------------------

--
-- Table structure for table `company_status`
--

CREATE TABLE `company_status` (
  `id` int(11) NOT NULL,
  `visit_id` int(10) NOT NULL,
  `round_no` int(4) NOT NULL,
  `round_name` varchar(40) NOT NULL,
  `round_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_status`
--

INSERT INTO `company_status` (`id`, `visit_id`, `round_no`, `round_name`, `round_date`) VALUES
(1, 3, 0, 'PPT', '2016-07-23'),
(2, 3, 1, 'Aptitude Round', '2016-07-24'),
(3, 3, 2, 'GD', '2016-07-13'),
(4, 3, 3, 'Interview', '2016-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `company_visit`
--

CREATE TABLE `company_visit` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(4) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `designation` varchar(64) DEFAULT NULL,
  `application_start` datetime DEFAULT NULL,
  `application_deadline` datetime DEFAULT NULL,
  `job_type` int(4) DEFAULT NULL,
  `job_category` int(4) DEFAULT NULL,
  `application_format` int(2) DEFAULT NULL COMMENT '1=>institute, 2=>company',
  `salary` varchar(36) DEFAULT NULL,
  `stipulated_amt` varchar(40) NOT NULL,
  `bond` varchar(40) NOT NULL,
  `other_information` text,
  `app_link` varchar(40) DEFAULT NULL,
  `title` varchar(40) NOT NULL,
  `stud_viewable` int(1) NOT NULL COMMENT '1=>yes, 2=>no',
  `final` int(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_visit`
--

INSERT INTO `company_visit` (`id`, `session_id`, `company_id`, `designation`, `application_start`, `application_deadline`, `job_type`, `job_category`, `application_format`, `salary`, `stipulated_amt`, `bond`, `other_information`, `app_link`, `title`, `stud_viewable`, `final`, `timestamp`) VALUES
(3, 1, 1, 'Jr Software Engineer', '2016-07-11 00:00:00', '2016-07-15 23:59:59', 1, 3, 1, '09348203', '039480', '39489', '39489', NULL, 'Software Engineer', 1, 0, '2016-07-08 15:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(4) NOT NULL,
  `course_name` varchar(64) NOT NULL COMMENT 'Values like M.Tech 2nd year, B.Tech 3rd year, Ph.D.,etc.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'B.Tech.'),
(2, 'M.Tech.'),
(3, 'Ph.D.'),
(4, 'MCA'),
(5, 'MBA'),
(6, 'M.Sc.');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `last_modified_on`) VALUES
(1, 'Civil Engineering', '2014-12-24 21:48:48'),
(2, 'Electrical Engineering', '2014-12-24 21:48:48'),
(3, 'Mechanical Engineering', '2014-12-24 21:48:48'),
(4, 'Electronics & communication Engineering', '2014-12-24 21:48:48'),
(5, 'Metallurgical & Materials Engineering', '2014-12-24 21:48:48'),
(6, 'Chemical Engineering', '2014-12-24 21:48:48'),
(7, 'Computer Science & Engineering', '2015-01-01 04:56:37'),
(8, 'Biotechnology', '2014-12-24 21:48:48'),
(9, 'Physics', '2014-12-24 21:48:48'),
(10, 'Chemistry', '2014-12-24 21:48:48'),
(11, 'Mathematics', '2014-12-24 21:48:48'),
(12, 'Humanities & Social Science', '2014-12-24 21:48:48'),
(13, 'Physical Education', '2014-12-24 21:48:48'),
(14, 'School of Management', '2014-12-24 21:48:48'),
(100, 'No Department', '2015-01-23 03:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `eligibility`
--

CREATE TABLE `eligibility` (
  `id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `graduation_cgpa` float DEFAULT NULL COMMENT 'Only for PGs',
  `ssc_percentage` float DEFAULT NULL,
  `inter_percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eligibility`
--

INSERT INTO `eligibility` (`id`, `visit_id`, `specialization_id`, `categories`, `cgpa`, `graduation_cgpa`, `ssc_percentage`, `inter_percentage`) VALUES
(1, 1, 23, 'General,OBC,SC,ST,PWD', 5, NULL, 30, 30),
(2, 1, 23, 'General,OBC,SC,ST,PWD', 5, NULL, 30, 30),
(5, 3, 23, 'General,OBC,SC,ST,PWD', 5, NULL, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `visit_id` int(4) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(4) NOT NULL,
  `company_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`visit_id`, `description`, `user_id`, `company_name`) VALUES
(1, 'cool;sakalkdsfjl;KDSFJ;LASKDFJ;LSKDFJSL;KDFJ;LSKDFJS;ALDKFJS;ALKDF', 1, 'Google\r\n'),
(1, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel nibh varius sapien porta faucibus. Suspendisse eget tempor elit. Nulla a blandit nunc. Nam quis mollis nisi. Vestibulum imperdiet lorem tortor, lobortis bibendum lacus tristique et. Proin vel blandit metus, non vestibulum felis. Sed luctus erat in libero pharetra, id.', 2, 'Facebook'),
(2, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel nibh varius sapien porta faucibus. Suspendisse eget tempor elit. Nulla a blandit nunc. Nam quis mollis nisi. Vestibulum imperdiet lorem tortor, lobortis bibendum lacus tristique et. Proin vel blandit metus, non vestibulum felis. Sed luctus erat in libero pharetra, id.', 2, 'Facebook');

-- --------------------------------------------------------

--
-- Table structure for table `gpa`
--

CREATE TABLE `gpa` (
  `userid` int(11) UNSIGNED NOT NULL,
  `cgpa` float(3,2) DEFAULT NULL,
  `sem1sg` float(3,2) DEFAULT NULL,
  `sem1cg` float(3,2) DEFAULT NULL,
  `sem2sg` float(3,2) DEFAULT NULL,
  `sem2cg` float(3,2) DEFAULT NULL,
  `sem3sg` float(3,2) DEFAULT NULL,
  `sem3cg` float(3,2) DEFAULT NULL,
  `sem4sg` float(3,2) DEFAULT NULL,
  `sem4cg` float(3,2) DEFAULT NULL,
  `sem5sg` float(3,2) DEFAULT NULL,
  `sem5cg` float(3,2) DEFAULT NULL,
  `sem6sg` float(3,2) DEFAULT NULL,
  `sem6cg` float(3,2) DEFAULT NULL,
  `sem7sg` float(3,2) DEFAULT NULL,
  `sem7cg` float(3,2) DEFAULT NULL,
  `approval_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpa`
--

INSERT INTO `gpa` (`userid`, `cgpa`, `sem1sg`, `sem1cg`, `sem2sg`, `sem2cg`, `sem3sg`, `sem3cg`, `sem4sg`, `sem4cg`, `sem5sg`, `sem5cg`, `sem6sg`, `sem6cg`, `sem7sg`, `sem7cg`, `approval_status`) VALUES
(1, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.99, 9.00, 9.00, -1),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'cod', 'Coordinator'),
(3, 'stud', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `job_category_id` int(8) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`job_category_id`, `category`) VALUES
(1, 'Normal'),
(2, 'Dream'),
(3, 'Super Dream');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `job_type_id` int(8) NOT NULL,
  `type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`job_type_id`, `type`) VALUES
(1, 'Core'),
(2, 'Non-Core');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `post_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`post_id`, `title`, `content`, `timestamp`, `cod_id`) VALUES
(2, 'test2', 'test2\r\n', '2016-01-17 02:55:47', 111),
(3, 'test3', 'jshfjshflksjflkjasfdsa;lfksd,afn,msdbmfbasdn\r\nhfgjsgmsbmdfns,md', '2016-01-17 02:59:07', 111),
(4, 'Test news Hemal', 'Lolwa', '2016-07-08 19:02:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_lock`
--

CREATE TABLE `profile_lock` (
  `id` int(11) NOT NULL,
  `lock_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_lock`
--

INSERT INTO `profile_lock` (`id`, `lock_date`) VALUES
(0, '2016-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE `selection` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `visit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`id`, `userid`, `visit_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `last_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `last_modified_on`) VALUES
(1, 'Summer Intern 2016', '2016-02-20 11:21:23'),
(2, 'Winter Intern 2016', '2016-02-20 11:21:23'),
(3, 'Placement 2016', '2016-02-20 11:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course` int(4) NOT NULL,
  `name` varchar(256) NOT NULL,
  `abbr` varchar(16) NOT NULL,
  `last_modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `department_id`, `course`, `name`, `abbr`, `last_modified_on`) VALUES
(1, 1, 2, 'M.Tech. Civil Transportation Engineering', 'M_Tech_Civil_Tr', '2016-02-23 19:45:21'),
(2, 1, 2, 'M.Tech. Civil Remote Sensing and GIS', 'M_Tech_Civil_RS', '2016-02-23 19:45:21'),
(3, 1, 2, 'M.Tech. Civil GeoTechnincal Engineering', 'M_Tech_Civil_GT', '2016-02-23 19:45:21'),
(4, 1, 2, 'M.Tech. Civil Engineering Structures', 'M_Tech_Civil_ES', '2016-02-23 19:45:21'),
(5, 1, 2, 'M.Tech. Civil Environmental Engineering', 'M_Tech_Civil_EE', '2016-02-23 19:45:21'),
(6, 1, 2, 'M.Tech. Civil Construction Technology and Management', 'M_Tech_Civil_CT', '2016-02-23 19:45:21'),
(7, 1, 2, 'M.Tech. Civil Water Resources Engineering', 'M_Tech_Civil_WR', '2016-02-23 19:45:21'),
(8, 1, 1, 'B.Tech. Civil Engineering', 'B_Tech_Civil', '2016-02-23 19:45:21'),
(9, 2, 2, 'M.Tech. Electrical Power Electronics and Drives', 'M_Tech_Electric', '2016-02-23 19:45:21'),
(10, 2, 2, 'M.Tech. Electrical Power Systems Engineering', 'M_Tech_Electric', '2016-02-23 19:45:21'),
(11, 2, 1, 'B.Tech. Electrical Engineering', 'B_Tech_Electric', '2016-02-23 19:45:21'),
(12, 3, 2, 'M.Tech. Mechanical Thermal Engineering', 'M_Tech_Mech_ThE', '2016-02-23 19:45:21'),
(13, 3, 2, 'M.Tech. Mechanical Manufacturing Engineering', 'M_Tech_Mech_MfE', '2016-02-23 19:45:21'),
(14, 3, 2, 'M.Tech. Mechanical Materials and Systems Engineering Design', 'M_Tech_Mech_MSE', '2016-02-23 19:45:21'),
(15, 3, 2, 'M.Tech. Mechanical Machine Design', 'M_Tech_Mech_MD', '2016-02-23 19:45:21'),
(16, 3, 2, 'M.Tech. Mechanical Additive Manufacturing', 'M_Tech_Mech_AM', '2016-02-23 19:45:21'),
(17, 3, 2, 'M.Tech. Mechanical Computer Integrated Manufacturing', 'M_Tech_Mech_CIM', '2016-02-23 19:45:21'),
(18, 3, 2, 'M.Tech. Mechanical Automobile Engineering', 'M_Tech_Mech_AE', '2016-02-23 19:45:21'),
(19, 3, 1, 'B.Tech. Mechanical Engineering', 'B_Tech_Mech', '2016-02-23 19:45:21'),
(20, 4, 2, 'M.Tech. ECE Electronic Instrumentation', 'M_Tech_ECE_EI', '2016-02-23 19:45:21'),
(21, 4, 2, 'M.Tech. ECE VLSI System Design', 'M_Tech_ECE_VLSI', '2016-02-23 19:45:21'),
(22, 4, 2, 'M.Tech. ECE Advanced Communication Systems', 'M_Tech_ECE_ACS', '2016-02-23 19:45:21'),
(23, 4, 1, 'B.Tech. Electronics and Communication Engineering', 'B_Tech_ECE', '2016-02-23 19:45:21'),
(24, 5, 2, 'M.Tech. Metallurgical Materials Technology', 'M_Tech_Meta_MT', '2016-02-23 19:45:21'),
(25, 5, 2, 'M.Tech. Metallurgical Industrial Metallurgy', 'M_Tech_Meta_IM', '2016-02-23 19:45:21'),
(26, 5, 1, 'B.Tech. Metallurgical and Materials Engineering', 'B_Tech_Meta', '2016-02-23 19:45:21'),
(27, 6, 2, 'M.Tech. Chemical Engineering', 'M_Tech_Chem', '2016-02-23 19:45:21'),
(28, 6, 1, 'B.Tech. Chemical Engineering', 'B_Tech_Chem', '2016-02-23 19:45:21'),
(29, 7, 2, 'M.Tech. Computer Science and Engineering', 'M_Tech_CSE', '2016-02-23 19:45:21'),
(30, 7, 2, 'M.Tech. CSE Computer Science and Information Security', 'M_Tech_CSE_CSIS', '2016-02-23 19:45:21'),
(31, 7, 4, 'Master of Computer Applications', 'MCA_CSE', '2016-02-23 19:45:21'),
(32, 7, 1, 'B.Tech. Computer Science and Engineering', 'B_Tech_CSE', '2016-02-23 19:45:21'),
(33, 8, 1, 'B.Tech. Biotechnology', 'B_Tech_Biotech', '2016-02-23 19:45:21'),
(34, 9, 6, 'M.Sc Physics Engineering Physics', 'M_Sc_Phy_EP', '2016-02-23 19:45:21'),
(35, 9, 6, 'M.Sc Physics Electronics', 'M_Sc_Phy_ELECT', '2016-02-23 19:45:21'),
(36, 9, 6, 'M.Sc Physics Photonics', 'M_Sc_Phy_PHOTO', '2016-02-23 19:45:21'),
(37, 9, 6, 'M.Sc Physics Instrumentation', 'M_Sc_Phy_INSTRU', '2016-02-23 19:45:21'),
(39, 10, 6, 'M.Sc. Chemistry Analytical Chemistry', 'M_Sc_Chemistry ', '2016-02-23 19:45:21'),
(40, 10, 6, 'M.Sc. Chemistry Organic Chemistry', 'M_Sc_Chemistry ', '2016-02-23 19:45:21'),
(42, 11, 6, 'M.Sc. Mathematics Applied Mathematics', 'M_Sc_Maths_AM', '2016-02-23 19:45:21'),
(43, 11, 6, 'M.Sc. Mathematics and Scientific Computing', 'M_Sc_Maths_MSC', '2016-02-23 19:45:21'),
(44, 14, 5, 'Master of Business Management', 'MBA', '2016-02-23 19:45:21'),
(45, 100, 6, 'M.Sc. MMCA', 'M_Sc_MMCA', '2016-02-23 19:45:21'),
(46, 100, 6, 'M.Sc. DDPP', 'M_Sc_DDPP', '2016-02-23 19:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$5FX3b2ntXach5C2tiLM4HOH0ylmWwWIYj7.InxXDhxYf0.P8Zs8vK', '', 'admin@admin.com', '', 'VneUy5PMIqjQn5S8sLFU7Ocae358a87cf5b5dce2', 1467670820, 'uBadhs9.aanVddapeiOgp.', 1268889823, 1468067599, 1, 'Sreerag', 'Sreenath', '9502812109'),
(3, '::1', 'taps911410', '$2y$08$P6lsHd85AselZRiJ/ZrM6uDH0T6srW0MSXatGxJgKdwQjQAtwE2ce', 'AAsEl6tWeEPrNu31p5cJJu', 'hempat02@gmail.com', NULL, NULL, NULL, 'IoAmFMTZSRu9GWnwx77a9e', 1468016630, 1468064931, 1, 'Hemal', 'Patil', 'Hemal');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `userid` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `roll_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `registration_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `specialization_id` int(8) NOT NULL,
  `gender` int(1) NOT NULL COMMENT '0=>Female, 1=>Male',
  `birthday` date NOT NULL,
  `category_id` int(2) NOT NULL,
  `country` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `current_address` text COLLATE utf8_unicode_ci,
  `permanent_address` text COLLATE utf8_unicode_ci,
  `passport` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills` mediumtext COLLATE utf8_unicode_ci,
  `projects` text COLLATE utf8_unicode_ci,
  `experience` mediumtext COLLATE utf8_unicode_ci,
  `hobbies` mediumtext COLLATE utf8_unicode_ci,
  `linkedin` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `encrypt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `approved` int(2) NOT NULL DEFAULT '0' COMMENT '0=not filled 1=approved 2=filled',
  `deactivate_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=active 1=deactivate request 2=approved 3=declined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`userid`, `first_name`, `middle_name`, `last_name`, `name`, `roll_number`, `registration_number`, `specialization_id`, `gender`, `birthday`, `category_id`, `country`, `mobile`, `current_address`, `permanent_address`, `passport`, `skills`, `projects`, `experience`, `hobbies`, `linkedin`, `emergency_contact`, `encrypt`, `approved`, `deactivate_status`) VALUES
(1, 'Sreerag', 'M', 'Sreenath', '', '134153', '811371', 23, 1, '1995-09-21', 5, 'India', '9502812109', 'lol', 'lol', NULL, '', '', '', '', '', '0', '134153skfhf', 1, 3),
(3, 'Hemal', '', 'Patil', 'Hemal Patil', '147235', '911410', 32, 0, '0000-00-00', 0, '', '', NULL, NULL, NULL, '', '', '', '', '', NULL, '911410oT8tjpPE', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(64, 1, 1),
(65, 1, 2),
(66, 1, 3),
(70, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(8) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `category`) VALUES
(1, 'General'),
(2, 'OBC'),
(3, 'SC'),
(4, 'ST'),
(5, 'PWD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`userid`,`visit_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `approved` (`approved`),
  ADD KEY `cod_id` (`cod_id`);

--
-- Indexes for table `company_status`
--
ALTER TABLE `company_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_visit`
--
ALTER TABLE `company_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `job_type` (`job_type`),
  ADD KEY `job_category` (`job_category`),
  ADD KEY `id` (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eligibility`
--
ALTER TABLE `eligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpa`
--
ALTER TABLE `gpa`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `id` (`userid`),
  ADD KEY `id_2` (`userid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`job_category_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `profile_lock`
--
ALTER TABLE `profile_lock`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `selection`
--
ALTER TABLE `selection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `visit_id` (`visit_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid_2` (`userid`),
  ADD UNIQUE KEY `roll_number` (`roll_number`),
  ADD UNIQUE KEY `registration_number` (`registration_number`),
  ADD KEY `specialization_id` (`specialization_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_status`
--
ALTER TABLE `company_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company_visit`
--
ALTER TABLE `company_visit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `eligibility`
--
ALTER TABLE `eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `selection`
--
ALTER TABLE `selection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academics`
--
ALTER TABLE `academics`
  ADD CONSTRAINT `del` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gpa`
--
ALTER TABLE `gpa`
  ADD CONSTRAINT `delete_gpa` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `delete` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
