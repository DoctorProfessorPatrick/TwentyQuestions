-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 06:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20questions`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `Animal` varchar(64) NOT NULL,
  `is_large` tinyint(1) NOT NULL,
  `lives_on_land` tinyint(1) NOT NULL,
  `is_mammal` tinyint(1) NOT NULL,
  `is_herbivore` tinyint(1) NOT NULL,
  `has_legs` tinyint(1) NOT NULL,
  `black_and_white` tinyint(1) NOT NULL,
  `in_arctic` tinyint(1) NOT NULL,
  `is_predator` tinyint(1) NOT NULL,
  `long_neck` tinyint(1) NOT NULL,
  `in_africa` tinyint(1) NOT NULL,
  `is_bird` tinyint(1) NOT NULL,
  `has_pouch` tinyint(1) NOT NULL,
  `is_fast` tinyint(1) NOT NULL,
  `prehensile_tail` tinyint(1) NOT NULL,
  `is_venomous` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`Animal`, `is_large`, `lives_on_land`, `is_mammal`, `is_herbivore`, `has_legs`, `black_and_white`, `in_arctic`, `is_predator`, `long_neck`, `in_africa`, `is_bird`, `has_pouch`, `is_fast`, `prehensile_tail`, `is_venomous`) VALUES
('Bear', 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
('Cat', 0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
('Cheetah', 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0),
('Elephant', 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
('Kangaroo', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
('Lemur', 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0),
('Orca', 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
('Rat', 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Rattlesnake', 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1),
('Shark', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
('Whale', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`Animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
