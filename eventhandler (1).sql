-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 04:29 PM
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
-- Database: `eventhandler`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `venue`, `price`, `date`, `time`) VALUES
(1, 'Rock Fest', 'City Stadium', 49.99, '2024-05-15', '19:30:00'),
(2, 'Gallery Showcase', 'ArtSpace Gallery', 0.00, '2024-06-02', '10:00:00'),
(3, 'Soccer Match', 'Sports Arena', 25.50, '2024-05-20', '15:00:00'),
(5, 'Blockbuster Premiere', 'Cineplex Theater', 12.75, '2024-05-28', '18:45:00'),
(6, 'Hope Gala', 'Grand Ballroom', 10000.00, '2024-06-19', '20:00:00'),
(7, 'Adi Maathraa', 'Colombo', 20.00, '0000-00-00', '18:00:00'),
(8, 'Sahara Flash', 'Ambalangoda', 1000.00, '2024-04-28', '22:00:00'),
(9, 'Flashback', 'Uragaha', 2000.00, '2024-06-01', '20:30:00'),
(10, 'FeedBack', 'Wathugedara', 1750.00, '2024-06-10', '18:00:00'),
(12, 'Ambalama', 'Ambalangoda', 1000.00, '2030-05-09', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `username`, `email`, `pwd`) VALUES
(3, 'chamika', 'shashipriya', 'chami', 'c@gmail.com', '1234567'),
(5, 'Hiruni', 'Navoda', 'Hiruuniiii', 'Hiruu@gmail.com', '12345'),
(6, 'Sewwandi', 'AA', 'Sew', 'Sew@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ID` int(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ID`, `Name`, `Date`, `Amount`) VALUES
(8, 'sushi', '2024-06-07', 2000.00),
(9, 'chamika', '2024-03-05', 1200.00),
(12, 'siyu', '2022-05-03', 3000.00),
(16, 'sushiiii', '2023-05-10', 5682.00),
(23, 'siyuu', '2024-06-09', 2300.00),
(27, 'Lihini', '2024-05-11', 20000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
