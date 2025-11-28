-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2025 at 08:45 PM
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
-- Database: `bcnhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `history` text NOT NULL,
  `hymm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `history`, `hymm`) VALUES
(1, '<h1 style=\"border: 0px; font-family: Abel, sans-serif; font-size: 3em; font-weight: normal; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(51, 51, 51); line-height: 1.3em;\">Baguio City National High School History</h1><p style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">The first secondary school in Baguio was the normal school in 1916 later called Baguio Trade School. Classes were held where Home Sweet Home now stands as this area and the present University of the Philippines Baguio location was included in the reserved land for the Bureau of Education by Forbes. In 1919 it became Mountain Province High School. Classes were held at Teacher’s Camp and native girls from all over the province were housed at Bua Dormitory known today as Pacdal Elementary School. Among the pioneer teachers were Juan Balagot, Servillano Tumaneng, Pedro Balagot, Genoveva Llamas, Esperanza Ver, Donato Guerzon, Julia Guerzon, Grace H. Miller, Petra Ramirez, and Pilar Tan and Jess L. Gains who was also the principal.</p><p style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">MPHS easily gained national popularity in both academics and athletics because for a number of years, it had the strongest baseball team in Northern Luzon. Its coach, Arthur McCann produced baseball champs such as pitcher Antonio Capulo who one time pitched a non score game to Northern Luzon Teams and Juan Cerantes who was rated best 2nd baseman in the country. Antonio Dimas, Eugene Pucay, Gilbert Sonduan, Dibson Diwas, Braulio Caoili and Chakchakan Colis became legends in their time. The girls were famous for their extensive lace making and native weaving projects that easily became popular among tourists. The graduates added to the institution’s prestige for they had high proficiency in both spoken and written English.</p><p style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Succeeding principals who served MPHS were Mr. Richard B. Patterson, Ms. Eldridge, and Mr. Paul Bramlett.</p><p style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">The normal curriculum was transferred to the Trinidad Agricultural High School; thus, it became the responsibility of the Mountain Province.</p><p style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">In 1937, the national government transferred the financial responsibility of maintaining the school to the city government; thus, the name Mountain Province High School was replaced with Baguio City High School. BCHS squatted at the present site of Baguio Government Center until World War II broke out in 1941. During the Japanese occupation, classes were held at Quezon Elementary School. By 1945, the school admitted students at the Vallejo Hotel, then moved back to Teacher’s Camp during the second semester.</p><p style=\"border: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">The destruction of the Government Center buildings during the liberation started the school’s troubles about where to hold classes without having to move property and equipment. Several mayors worked for a permanent site of BCHS building. In 1947, Mayor Jose M. Cariño was eyeing the former residence of Governor Blanco. It didn’t push through however because of the plan to put up a national stadium and swimming pool at the Athletic Bowl site. Finally, Mayor Luis Torres succeeded in establishing the fact that former Governor Blanco’s place was the property of the government. Mayor Gil R. Mallare made every effort that led to the approval of the site as permanent house of BCHS. He also secured an amount of Php180, 000.00 loan from the Rehabilitation Financing Corporation to start the construction of the building on September 20, 1953.</p>', '<h2 style=\"border: 0px; font-family: Abel, sans-serif; font-size: 2em; font-weight: normal; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(51, 51, 51); line-height: 1.3em;\">Baguio City High Hymn</h2><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">In all the world aye,<br>There’ll be but one highland home fondest to me.<br>Baguio City fairest by far,<br>And but one Alma Mater, Baguio City High.<br>However lowly, however lofty,<br>Fickle fate may lead me away,<br>Always remembrance will bring me back<br>To dear Baguio City High.<br>In sunshine ‘neath clouds,<br>‘midst towering pine, colorful bouquets abloom,<br>Our loved campus greenward spread out,<br>Loveliest in all the land, Baguio City High.<br>Today we sing, fore’er see visions,<br>Ah, the years shall tell our story<br>We shall not break faith we pledge thee,<br>Oh dear Baguio City High.</p><h2 style=\"border: 0px; font-family: Abel, sans-serif; font-size: 2em; font-weight: normal; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(51, 51, 51); line-height: 1.3em;\">Baguio City Hymn</h2><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Oh, Baguio haven for all people<br>For you we thank the Lord and God of all<br>Pine sifted sunshine air we breathe so fresh<br>Tranquil beauty and invigorating breeze<br>Your countless wonders known afar and near<br>Your verdant hills of kissed by clouds of pearl<br>Myriad flowers bloom so beautiful in you<br>Like children of every land and hue<br>For any race whether dark or light<br>None can resist your great invite<br>To love and live in you forever<br>Our Eden dreams and gifts of the Creator</p><h2 style=\"border: 0px; font-family: Abel, sans-serif; font-size: 2em; font-weight: normal; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(51, 51, 51); line-height: 1.3em;\">Cordillera Hymn</h2><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Cradled by majestic mountains<br>Blessed with nature’s flowing fountains<br>Blooming flowers and verdant hills<br>Is a region of murm’ring rills<br>Chorus:<br>Cordillera, region of wonder hail<br>Beloved land your name we shall not fail<br>Honor and fame, to you we strive to bring<br>Your glory won, we shall forever sing</p><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Here dwell freedom-loving people<br>Strong our bond it’s hard to topple<br>For our freedom we rise and fight<br>Our priceless ancestral birthright</p><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">‘Neath the sky the rain may gather<br>Angry clouds may craz’ly wander<br>But the sun shines forever fair<br>As we climb up the golden stair.</p><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Dreams of peace of oneness and progress<br>Cherished goals our regions’ praises<br>Striving to build a brighter dawn<br>For our children to call their own.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `overview` text NOT NULL,
  `content` text NOT NULL,
  `imgPath` text NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `overview`, `content`, `imgPath`, `created_by`) VALUES
(1, 'KSJdasbdaa', 'qkdjbbkjkbssdf', '<p>akjasdooacoakb</p>', 'Screenshot 2025-09-10 212134.png', 8),
(2, 'zxoc', 'xxkjckjb', '<p>jackabsdk</p>', 'Screenshot 2025-09-04 224044.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `overview` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `author` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `overview`, `content`, `date`, `author`, `created_by`, `imgPath`) VALUES
(1, '511', '+51', '<p><br></p><p><br></p><p>4</p><p>/</p>', '2025-11-28 13:40:47', '+551', NULL, 'Screenshot 2025-09-07 192942.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `overview` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `location` text NOT NULL,
  `imgPath` text NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `overview`, `content`, `date`, `location`, `imgPath`, `created_by`) VALUES
(1, 'asdasd', 'asdasd', '<p>aasdasd</p>', '2025-11-28 03:06:00', 'asdasd', 'Screenshot 2025-08-19 210206.png', NULL),
(2, 'asdsad', 'asdsad', '<p><img src=\"/websys/BCNHS/uploads/content-images/1764270766_6928a2ae64f3c.png\" style=\"width: 337.424px; height: 195.438px;\"></p><p>This is an event</p>', '2025-11-28 03:12:00', 'asdas', 'Screenshot 2025-09-07 192942.png', NULL),
(3, 'adfdfasdffasdsdfsdfs', 'sdgfsdfdf', '<p><img src=\"/websys/BCNHS/uploads/content-images/1764287228_6928e2fc0e7b2.png\" style=\"width: 595.888px; height: 315.984px;\"></p><ol><li><b><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">This is a nigga</font></b></li></ol>', '2025-11-30 07:47:00', 'z,jfnldfnljasn', 'Screenshot 2025-09-04 224044.png', NULL),
(4, 'a.sknaskl;', ';askca;sm;ms', '<p>as;lm;aslmd;alsm</p>', '2025-11-29 01:32:00', 'as;lmas;ldm', 'Screenshot 2025-08-19 210206.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Not Nigga'),
(7, 'Nigga');

-- --------------------------------------------------------

--
-- Table structure for table `faculty-staff`
--

CREATE TABLE `faculty-staff` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty-staff`
--

INSERT INTO `faculty-staff` (`id`, `faculty_id`, `name`, `position`, `imgPath`) VALUES
(9, 1, 'Mhar', 'Whitest man alive', '2X2.png'),
(10, 1, 'asdas', 'asdasd', 'Screenshot 2025-09-10 212134.png'),
(12, 7, 'Ivan', 'Niggaest of them all', '349067437_2593869734085382_4257843187517932363_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `introduction` text NOT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `name`, `introduction`, `imgPath`) VALUES
(1, 'Whitney A. Dawayen', 'Excellence is what we pursue', '6929f3a58dc8a.png');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `overview` text NOT NULL,
  `content` text NOT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `overview`, `content`, `imgPath`) VALUES
(2, 'Senior High School', 'This is a program offered in our school', '<p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Senior High School (SHS) covers the last two years of the K to 12 program and includes Grades 11 and 12. In SHS, students will go through a core curriculum and subjects under a track of their choice.</p><p style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Baguio City National High School Senior High School offers the following tracks and strands:</p><ol style=\"border: 0px; font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 12px; margin-right: 0px; margin-bottom: 1.75em; margin-left: 3.1em; outline: 0px; padding: 0px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(68, 68, 68);\"><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Academic Track<ul style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-left: 2.8em; outline: 0px; padding: 0px; vertical-align: baseline; list-style-position: initial; list-style-image: initial;\"><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Accountancy, Business, and Management (ABM)</li><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">General Academic Strand (GAS)</li><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Humanities and Social Sciences (HUMSS)</li></ul></li><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Technical- Vocational- Livelihood Track<ul style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-left: 2.8em; outline: 0px; padding: 0px; vertical-align: baseline; list-style-position: initial; list-style-image: initial;\"><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Automotive</li><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Bread and Pastry</li></ul></li><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Arts and Design</li><li style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 2.1em;\">Sports</li></ol>', '355821506_9392968097440264_488397309343071743_n.jpg'),
(3, 'ASDASD', 'ADASD', '<p>ASDASDASD</p>', 'logo.png'),
(4, 'asdasdas', 'asdasdasdas', '<p>asdasda</p>', '481197709_636057712405729_7447579656400529420_n.jpg'),
(5, 'asdasd', 'assdasd', '<p>asdasdas</p>', '349067437_2593869734085382_4257843187517932363_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `overview` text NOT NULL,
  `link` text NOT NULL,
  `path` text NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `overview`, `link`, `path`, `subject_id`) VALUES
(1, 'asdasd', 'asdasd', 'https://www.youtube.com/watch?v=_hpORV94p6M', 'Content for Data Recovery and Resili.pdf', 1),
(2, 'Math not', 'This is not a math ', 'https://www.youtube.com/watch?v=MjT6xJLywR4&t=1s', 'Group1_University_Database_Recovery.docx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `location` text NOT NULL,
  `imgPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `location`, `imgPath`) VALUES
(3, 'Library', '<p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">The school library is located at the second floor of the Multi-Purpose Building (main campus). It has 10,000 volumes of books covering all subject areas. Also available are magazines (international and local) and daily newspapers (national and local).</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">The library is open from 8:00 am to 5:00 pm with no snacks or lunch breaks from Mondays to Fridays.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">The BCNHS Library exists primarily as a reference facility to all students, teachers, and non-teaching personnel and other individuals as maybe authorized by the librarian. It should not be mistaken for and utilized as a source of textbooks for personal use. It is to this end that the regulations have been made to allow full utilization of the limited library materials by numbers of borrowers.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">A. Mission</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">To provide library services and facilities to all students and personnel of BCNHS for information, recreation,&nbsp; education and research to boost their morale and maintain a high degree of efficiency.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">B. Library Rules and Regulations</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">1. Behavior Inside the Library</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">Anyone availing of the services of the BCNHS Library must:</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">a) Use personally the library card in borrowing and returning books. A library card is issued to each freshman at the beginning of the school year.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">b) Observe silence at all times. Maintain acceptable low noise levels in all areas of the library.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">c) Respect the rights of others. Refrain from inappropriate behavior (bullying, shouting, etc.) inside the library.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">d) Maintain the cleanliness of the library. Avoid littering. Eating is not allowed inside the library.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">e) Refrain from entering into the office of the librarian and in the stack room except when transacting an official business.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">f) Maintain the layout of the library furniture, fittings or equipment. Ask permission from the Librarians if an alteration is needed.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">*Violation in any of these rules is a sufficient ground for the suspension or cancellation of library privileges.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">2. Borrowing and Returning of Books</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">a) Home reading books maybe borrowed for one (1) week.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">b) Other reference books maybe borrowed overnight.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">c) Any borrower who fails to return the borrowed book on the due date shall be penalized of 1.00 per day.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">d) Encyclopedias, dictionaries, newspapers, magazines and reserved books must be used only inside the library.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">Note: Library privileges shall be suspended until the overdue book is returned and the corresponding fines are paid.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">3. Borrowing Guide</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">In borrowing a book, the following are helpful:</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">a) Consult the card catalog.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">b) Fill a call slip. Present this to the Librarian.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">c) If the book is available, present your library card. If the book is out, locate another book in the same field of study.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">d) Fill up the book card inserted at the pocket in the inner back cover of the book.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">4. Loss and Replacement of Library Materials</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">If anybody loses a library material, he/she must report the incident immediately at the counter where the material is borrowed. Lost materials shall be replaced with the same title, author and edition<br>(preferably the latest edition). If the library material is not available, it shall be replaced with one of the same subject or be paid with the original cost. Borrowed books that are destroyed beyond repair shall also be considered for replacement or be paid by the borrower.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">5. Research Classes</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">In the conduct of research classes, a written request to the Librarian and a reservation must be made at least one (1) day before the scheduled research class. This is to limit the number of research classes held in the library to only one class per period. This is on first come first serve basis.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">6. Library Clearance</strong></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\">Upon transfer, separation, discharge, resignation or suspension from BCNHS of any bonafide borrower, he/she shall clear himself/herself of any library obligations.</p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><img src=\"/websys/BCNHS/uploads/content-images/1764344284_6929c1dc3bb67.png\" style=\"width: 709.036px; height: 375.984px;\"><br></p><p style=\"border: 0px; font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 12px;=\"\" margin-right:=\"\" 0px;=\"\" margin-bottom:=\"\" 1.75em;=\"\" margin-left:=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" color:=\"\" rgb(68,=\"\" 68,=\"\" 68);\"=\"\"><br></p>', 'Multi-Purpose Building, 2nd Floor', 'Screenshot 2025-09-10 212824.png');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'nigga2'),
(2, 'Math'),
(3, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(8, 'Admin User', 'admin@bcnhs.local', '$2y$12$QXNzxwnnrXonXaiLWOsimeNRFToXQimR7ghlpHqsP4SA3PCH4URNC', 'Admin'),
(9, 'Mhar Castro', 'student@gmail.com', '$2y$10$Pyl7YwCohKTn1zb970Lqqed6dfLFwRENHpkSnvub1wGfoc3YEdhKK', 'User'),
(10, 'Faculty', 'faculty@gmail.com', '$2y$10$V7FhOk44jnvLKnNELCZMXe2EdloN0AHnEI.EUrO2wiX4hx2SZE9oO', 'Faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_achievements_user` (`created_by`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_user` (`created_by`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_user` (`created_by`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty-staff`
--
ALTER TABLE `faculty-staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_fk` (`faculty_id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_idFK` (`subject_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty-staff`
--
ALTER TABLE `faculty-staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `fk_achievements_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `faculty-staff`
--
ALTER TABLE `faculty-staff`
  ADD CONSTRAINT `faculty_fk` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `subject_idFK` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
