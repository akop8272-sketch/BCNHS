-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 08:13 AM
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
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.\r\n\r\nQuisque sit amet efficitur libero, at pellentesque eros. Ut suscipit libero ac dignissim interdum. Etiam eget quam ac nisl pretium elementum. Aliquam erat volutpat. Vivamus in rutrum libero, ac suscipit tortor. Praesent ac neque eros. Phasellus tempus non nunc at porta.', 'llLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.\r\n\r\nQuisque sit amet efficitur libero, at pellentesque eros. Ut suscipit libero ac dignissim interdum. Etiam eget quam ac nisl pretium elementum. Aliquam erat volutpat. Vivamus in rutrum libero, ac suscipit tortor. Praesent ac neque eros. Phasellus tempus non nunc at porta.');

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
(1, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.', 'placeholder.png', NULL),
(2, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.', 'placeholder.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL COMMENT 'created, updated, deleted',
  `content_type` varchar(50) NOT NULL COMMENT 'article, event, achievement',
  `content_id` int(11) DEFAULT NULL,
  `content_title` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `action`, `content_type`, `content_id`, `content_title`, `created_at`) VALUES
(3, 8, 'updated', 'principal', 1, 'Whitney A. Dawayen', '2025-11-29 14:58:36'),
(4, 8, 'updated', 'principal', 1, 'Whitney A. Dawayen', '2025-11-29 14:58:50'),
(5, 8, 'created', 'faculty_staff', 13, 'asdasd', '2025-11-29 15:02:06'),
(6, 8, 'deleted', 'faculty_staff', 13, 'asdasd', '2025-11-29 15:02:22'),
(7, 8, 'created', 'user', NULL, 'Student', '2025-11-29 15:04:26'),
(8, 8, 'updated', 'article', 1, 'Lorem Ipsum', '2025-11-29 15:10:56');

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
(1, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'lLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.', '2025-11-29 02:22:09', 'Lorem Ipsum', NULL, 'placeholder.png');

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
(1, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.', '2025-11-28 03:06:00', 'Lorem Ipsum', 'placeholder.png', NULL),
(2, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.', '2025-11-28 03:12:00', 'Lorem Ipsum', 'placeholder.png', NULL),
(3, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.', '2025-11-30 07:47:00', 'Lorem Ipsum', 'placeholder.png', NULL),
(4, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.\r\n\r\nNunc volutpat tellus et interdum euismod. Suspendisse tellus metus, pulvinar in ex ut, tempor congue lectus. Suspendisse potenti. In tempus vel sapien sit amet gravida. Vivamus eu urna congue, suscipit lectus et, dapibus nibh. Mauris facilisis risus in ligula facilisis, congue vulputate quam tincidunt. Suspendisse tincidunt tortor in dui eleifend, in aliquam risus suscipit. Mauris id tincidunt erat. Aenean at tincidunt ante.', '2025-11-29 01:32:00', 'Lorem Ipsum', 'placeholder.png', NULL);

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
(1, 'Lorems Ipsum'),
(7, 'Lorem Ipsum Lorem');

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
(9, 1, 'Mhar', 'Lorem Ipsum', '692a55a321fcd.png');

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
(1, 'Whitney A. Dawayen', 'Excellence is what we pursue', '692a59be1348d.png');

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
(2, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\n\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\n\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.', '355821506_9392968097440264_488397309343071743_n.jpg'),
(4, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\n\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\n\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.', '481197709_636057712405729_7447579656400529420_n.jpg');

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
(2, 'Lorem Ipsum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'https://www.youtube.com/watch?v=MjT6xJLywR4&t=1s', 'Group1_University_Database_Recovery.docx', 2);

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
(3, 'Library', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id efficitur mauris. Morbi eu cursus sapien. Nunc neque lorem, blandit vel rutrum vitae, convallis sit amet arcu. Praesent posuere, purus vitae consectetur vestibulum, mauris elit tristique orci, vel varius quam odio a diam. Nam nec fermentum felis. Nulla porttitor ipsum augue, vitae tempor mi posuere quis. Sed euismod libero id hendrerit rhoncus. Sed porta varius enim consequat mollis. Nulla facilisi. Duis et mauris pretium, porttitor turpis et, porttitor arcu. Cras eget eleifend augue. Nullam venenatis purus sodales, consequat tellus eu, suscipit mi. Proin non suscipit elit, ut dignissim libero. Ut scelerisque ante in enim rhoncus, id sollicitudin diam ultricies. Sed commodo risus vitae tortor hendrerit, vestibulum sodales quam maximus.\r\n\r\nSed sapien tortor, congue eu elementum vitae, gravida ac metus. Sed fermentum leo a mi aliquam feugiat. Fusce luctus id urna vitae semper. Mauris rutrum eu erat ac malesuada. Cras pharetra justo libero, in lobortis lacus faucibus sit amet. Nunc imperdiet risus urna, non elementum lacus porttitor condimentum. Vivamus tellus leo, auctor a libero in, facilisis porttitor sem. Quisque consequat massa sed massa consectetur, eu volutpat risus posuere.\r\n\r\nAliquam nec felis eget nunc sodales bibendum. In nisi tortor, bibendum sit amet mollis at, finibus commodo nunc. Proin vestibulum, purus vel fermentum commodo, lacus elit feugiat tortor, nec elementum tellus odio non dolor. Fusce placerat arcu tellus, eget consectetur quam sodales venenatis. Phasellus consequat enim nec risus accumsan, eget tempus felis mollis. Quisque viverra ut dolor at vestibulum. Sed laoreet nulla nec fermentum mattis.', 'Multi-Purpose Building, 2nd Floor', '692a5b97c89df.png');

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
(1, 'Lorem Ipsum'),
(2, 'Lorem Ipsum'),
(3, 'Lorem Ipsum');

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
(10, 'Faculty', 'faculty@gmail.com', '$2y$10$V7FhOk44jnvLKnNELCZMXe2EdloN0AHnEI.EUrO2wiX4hx2SZE9oO', 'Faculty'),
(11, 'Student', 'student@gmail.com', '$2y$10$P0ldxXdsacmDZHq9cr062OTp4ukBDF2Wb3P65yC894w8RYWLP7Yte', 'User');

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
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_content_type` (`content_type`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty-staff`
--
ALTER TABLE `faculty-staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `fk_achievements_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `fk_activity_log_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
