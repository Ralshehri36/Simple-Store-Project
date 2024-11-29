-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 10:09 PM
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
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `ItemName` text NOT NULL,
  `ItemDescription` text NOT NULL,
  `Price` float NOT NULL,
  `Type` text NOT NULL,
  `City` text NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `ItemName`, `ItemDescription`, `Price`, `Type`, `City`, `photo`) VALUES
(59, 'BMW', 'BMW M5 2019', 90000, 'Cars', 'Riyadh', 0x496d616765732f424d572e6a7067),
(60, 'Mercedes', 'Mercedes AMG 2024 C63 V8 Engine', 85050, 'Cars', 'Jaddah', 0x496d616765732f4d657263656465732e6a7067),
(61, 'Audi A8', 'Audi A8 2022 V4', 115000, 'Cars', 'Dammam', 0x496d616765732f417564692e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `FullName` text NOT NULL,
  `UserName` varchar(35) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `P_photo` blob NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`FullName`, `UserName`, `Email`, `Password`, `P_photo`, `level`) VALUES
('Rayan Alshehri', 'Rayan_Admin', 'Rayan_Admin@gmail.com', '$2y$10$49Z7xo.8OnyRE/aub11gq.bFGi2ocyf27Dt5S/4j.J1SaCe1IHEdK', 0x50726f66696c652f70702e706e67, 1),
('Rayan Alshehri', 'Rayan_User', 'Rayan_User@gmail.com', '$2y$10$RbEmrFHxmKLMHMpntPKeXOrcmxMhGWALh/w8ino09ZdwDg1eRtuMG', 0x50726f66696c652f70702e706e67, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
