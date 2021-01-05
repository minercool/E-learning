-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 05:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ida` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ida`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `completed_cours`
--

CREATE TABLE `completed_cours` (
  `idc` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `question_1` varchar(255) NOT NULL,
  `question_2` varchar(255) NOT NULL,
  `response_1` varchar(256) NOT NULL,
  `response_2` varchar(255) NOT NULL,
  `cours_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed_cours`
--

INSERT INTO `completed_cours` (`idc`, `id`, `firstname`, `lastname`, `question_1`, `question_2`, `response_1`, `response_2`, `cours_level`) VALUES
(42, 79, 'Ghaith', 'zghidi', 'h', 'i', 'data/vocals/1758274324.mp3', 'a', 'A2.2'),
(41, 79, 'Ghaith', 'zghidi', 'lazre9', 'black hole', 'data/vocals/5911648455.mp3', 'test', 'A2.2'),
(43, 79, 'Ghaith', 'zghidi', 'what is your name ?', 'what is your nationality ?', 'data/vocals/10371558771.mp3', 'غيث', 'A1.2');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `idc` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(256) NOT NULL,
  `image1` varchar(256) NOT NULL,
  `image2` varchar(256) NOT NULL,
  `video` varchar(50) NOT NULL,
  `quiz` varchar(256) NOT NULL,
  `question_1` varchar(255) NOT NULL,
  `question_2` varchar(255) NOT NULL,
  `cours_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`idc`, `title`, `image`, `image1`, `image2`, `video`, `quiz`, `question_1`, `question_2`, `cours_level`) VALUES
(64, 'python', 'data/image/1_mk1-6aYaf_Bes1E3Imhc0A.jpeg', 'data/image/1_mk1-6aYaf_Bes1E3Imhc0A.jpeg', 'data/image/eso1907a.jpg', 'data/videos/vid.mp4', 'data/quiz/quiz.zip', 'what is your name ?', 'what is your nationality ?', 'A1.1'),
(65, 'test', 'data/image/1_mk1-6aYaf_Bes1E3Imhc0A.jpeg', 'data/image/eso1907a.jpg', 'data/image/eso1907a.jpg', 'data/videos/vid.mp4', 'data/quiz/test.zip', 'lazre9', 'test ?', 'A1.1');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `birthday` date NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `exact_level` varchar(10) NOT NULL,
  `code` varchar(256) NOT NULL,
  `confirmation` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `birthday`, `sexe`, `exact_level`, `code`, `confirmation`) VALUES
(79, 'Ghaith', 'zghidi', 'zghidig@gmail.com', 'user', 'b512d97e7cbf97c273e4db073bbb547aa65a84589227f8f3d9e4a72b9372a24d', '1999-02-02', 'male', 'C1.1', '709132', 'OK'),
(81, 'ghaith', 'zghidi', 'zghidig@hotmail.com', 'zg', 'd01e396a01cbe7f025a84705397d4c0e7f4a5ac35ac8fd03641070038a12c551', '1999-05-04', 'male', 'A1.1', '604028', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(34, 'python', '#008000', '2020-08-12 00:00:00', '2020-08-16 00:00:00'),
(35, 'python', '#40E0D0', '2020-08-17 00:00:00', '2020-08-18 00:00:00'),
(36, 'C#', '#40E0D0', '2020-08-21 00:00:00', '2020-08-22 00:00:00'),
(39, 'python', '#008000', '2020-08-02 00:00:00', '2020-08-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `idm` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`idm`, `id`, `message`, `time`) VALUES
(86, 54, 'nn', '2020-08-13 04:41:00'),
(87, 54, 'll', '2020-08-13 04:42:29'),
(88, 54, 'The company is usually referred to as \"Asus\" or Hu', '2020-08-13 09:34:33'),
(89, 54, 'The company is usually referred to as \"Asus\" or Huáshuò in Chinese (traditional Chinese: 華碩; simplified Chinese: 华硕, literally \"Eminence by the Chinese\", where \"Hua\" (華) refers to China.) According to the company website, the name Asus originates from Pegasus, the winged horse of Greek mythology.[7] Only the last four letters of the word were used in order to give the name a high position in alphabetical listings.[8]\r\n', '2020-08-13 09:35:59'),
(90, 54, 'hello its me mario', '2020-08-13 10:58:08'),
(91, 54, 'helli its me mario', '2020-08-13 10:58:12'),
(92, 54, 'helli its me mario', '2020-08-13 10:58:16'),
(93, 54, 'helli its me mario', '2020-08-13 10:58:21'),
(94, 54, 'helli its me mario', '2020-08-13 10:58:25'),
(95, 54, 'helli its me mario', '2020-08-13 10:59:31'),
(96, 54, 'helli its me mario', '2020-08-13 10:59:35'),
(97, 54, 'helli its me mario', '2020-08-13 10:59:39'),
(98, 54, 'helli its me mariohelli its me mariohelli its me mariohelli its me mariohelli its me mariohelli its me mariohelli its me mariohelli its me mariohelli its me mariohelli its me mario', '2020-08-13 10:59:46'),
(99, 71, 'mail confirmation is working !', '2020-08-14 01:15:40'),
(100, 73, 'testing if this works or not i hope it works so i can finish i get paid because i need the damn money.', '2020-08-14 05:48:16'),
(101, 73, 'llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '2020-08-14 06:54:30'),
(102, 75, 'hello', '2020-08-14 07:52:36'),
(103, 79, 'Message bro', '2020-08-17 12:41:05'),
(104, 79, 'hi', '2020-08-21 02:18:52'),
(105, 79, 'gg', '2020-08-21 02:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `idc` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `note` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`idc`, `id`, `note`, `time`) VALUES
(42, 79, 85, '2020-08-22 02:59:43'),
(41, 79, 50, '2020-08-22 03:00:19'),
(41, 79, 86, '2020-08-22 06:22:13'),
(42, 79, 100, '2020-08-22 06:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `idn` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`idn`, `title`, `content`, `time`) VALUES
(41, 'testing ', 'testing this notification please work for me baby pleasseeee', '2020-08-14 08:36:49'),
(42, 'test', 'test test test', '2020-08-14 08:38:58'),
(43, 'test', 'TEST', '2020-08-17 02:39:07'),
(44, 'ddd', 'ddddd', '2020-08-21 04:20:36'),
(45, 'python', 'test', '2020-08-23 01:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `coption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_number`, `is_correct`, `coption`) VALUES
(5, 1, 0, ' Personal Hypertext Processor'),
(6, 1, 0, 'Private Home Page'),
(7, 1, 1, 'PHP: Hypertext Preprocessor'),
(8, 2, 1, 'echo \"Helow World\";'),
(9, 2, 0, '\"Hello World\";'),
(10, 2, 0, 'Document.Write(\"Hello World\");'),
(11, 3, 1, '$'),
(12, 3, 0, '%'),
(13, 3, 0, '?'),
(14, 3, 0, '!'),
(15, 4, 0, '.'),
(16, 4, 0, 'New Line'),
(17, 4, 0, '</php?'),
(18, 4, 1, ';'),
(19, 5, 0, 'Java'),
(20, 5, 1, 'Perl and C'),
(21, 5, 0, 'Visual Basic'),
(22, 5, 0, 'VB Script'),
(23, 6, 0, 'TRUE'),
(24, 6, 1, 'FALSE'),
(25, 7, 1, 'TRUE'),
(26, 7, 0, 'FALSE'),
(27, 8, 1, 'function myFunction()'),
(28, 8, 0, 'new_function myFunction()'),
(29, 8, 0, 'create myFunction()'),
(30, 9, 1, 'TRUE'),
(31, 9, 0, 'FALSE'),
(32, 10, 1, '/*..... */'),
(33, 10, 0, '<comment>....</comment>');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `idp` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `A` varchar(10) NOT NULL,
  `B` varchar(10) NOT NULL,
  `C` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`idp`, `firstname`, `lastname`, `email`, `username`, `password`, `A`, `B`, `C`) VALUES
(10, 'nidhal', 'zghidi', 'zghidig@gmail.com', 'proff', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'A', 'B', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question_text`) VALUES
(1, 'What does PHP stand for?'),
(2, 'How do you write \"Hello World\" in PHP'),
(3, 'All variables in PHP start with which symbol?'),
(4, 'What is the correct way to end a PHP statement?'),
(5, 'The PHP syntax is most similar to:'),
(6, 'When using the POST method, variables are displayed in the URL:'),
(7, 'In PHP you can use both single quotes (  ) and double quotes ( \" \" ) for strings:'),
(8, 'What is the correct way to create a function in PHP?'),
(9, 'PHP allows you to send emails directly from a script'),
(10, 'What is a correct way to add a comment in PHP?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ida`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`idn`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
