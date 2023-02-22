-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 08:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `poke_history`
--

CREATE TABLE `poke_history` (
  `id` int(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poke_history`
--

INSERT INTO `poke_history` (`id`, `sender_email`, `recipient_email`, `message`) VALUES
(53, 'kvedaras.mindaugas@gmail.com', 'kvedaras.mindaugas@gmail.com', 'Mindaugas  siunčia tau poke'),
(54, 'kvedaras.mindaugas@gmail.com', 'erika@gmail.com', 'Mindaugas  siunčia tau poke'),
(55, 'kvedaras.mindaugas@gmail.com', 'eva@gmail.com', 'Mindaugas  siunčia tau poke'),
(56, 'kvedaras.mindaugas@gmail.com', 'erika@gmail.com', 'Mindaugas  siunčia tau poke'),
(57, 'inute@gmail.com', 'inute@gmail.com', 'Ina siunčia tau poke'),
(58, 'inute@gmail.com', 'eva@gmail.com', 'Ina siunčia tau poke'),
(59, 'inute@gmail.com', 'zaibas@gmail.com', 'Ina siunčia tau poke'),
(60, 'eva@gmail.com', 'zaibas@gmail.com', 'Eva siunčia tau poke'),
(61, 'eva@gmail.com', 'zaibas@gmail.com', 'Eva siunčia tau poke'),
(62, 'eva@gmail.com', 'kvedaras.mindaugas@gmail.com', 'Eva siunčia tau poke'),
(63, 'juozukas@gmail.com', 'juozukas@gmail.com', 'Juozas siunčia tau poke'),
(64, 'juozukas@gmail.com', 'erika@gmail.com', 'Juozas siunčia tau poke'),
(65, 'kvedaras.mindaugas@gmail.com', 'kvedaras.mindaugas@gmail.com', 'Mindaugas  siunčia tau poke'),
(66, 'kvedaras.mindaugas@gmail.com', 'eva@gmail.com', 'Mindaugas  siunčia tau poke'),
(67, 'kvedaras.mindaugas@gmail.com', 'zaibas@gmail.com', 'Mindaugas  siunčia tau poke'),
(68, 'kvedaras.mindaugas@gmail.com', 'kvedaras123.mindaugas@gmail.com', 'Mindaugas  siunčia tau poke'),
(69, 'kvedaras.mindaugas@gmail.com', 'erika@gmail.com', 'Mindaugas  siunčia tau poke');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `surname`, `email`, `password`) VALUES
(21, 'Mindaugas ', 'Kvedaras', 'kvedaras.mindaugas@gmail.com', '492e696b0d9a8137a2bd50fba6fea539'),
(28, 'Ina', 'Krauzienė', 'inute@gmail.com', 'e3246aa958df008b21c47f87715f8f7c'),
(48, 'Erika', 'Kvedarienė', 'erika@gmail.com', 'e3246aa958df008b21c47f87715f8f7c'),
(49, 'Domas', 'Kvedaras', 'zaibas@gmail.com', 'e3246aa958df008b21c47f87715f8f7c'),
(51, 'Eva', 'Kvedaraitė', 'eva@gmail.com', 'e3246aa958df008b21c47f87715f8f7c'),
(67, 'Juozas', 'Kvedaras', 'juozukas@gmail.com', 'e3246aa958df008b21c47f87715f8f7c'),
(68, 'Mindaugas ', 'Kvedaras', 'kvedaras123.mindaugas@gmail.com', '492e696b0d9a8137a2bd50fba6fea539'),
(69, 'Mindaugas ', 'Kvedaras', 'kvedaras1991.mindaugas@gmail.com', '492e696b0d9a8137a2bd50fba6fea539'),
(70, 'Mindaugas ', 'Kvedaras', 'kvedaras.mindaugas1991@gmail.com', 'e3246aa958df008b21c47f87715f8f7c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poke_history`
--
ALTER TABLE `poke_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poke_history`
--
ALTER TABLE `poke_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
