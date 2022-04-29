-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 11:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user login`
--

-- --------------------------------------------------------

--
-- Table structure for table `login information`
--

CREATE TABLE `login information` (
  `Sr. No.` int(10) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `E-mail` varchar(10) NOT NULL,
  `Phone Number` int(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login information`
--

INSERT INTO `login information` (`Sr. No.`, `Username`, `E-mail`, `Phone Number`, `Password`) VALUES
(1, 'Vivek', 'viv@gmail.', 1234567890, 'gg'),
(5, 'Brad', 'brad@gmail', 2147483647, 'brad*12'),
(10, 'Dan', 'dan@123', 123, 'dan12'),
(11, 'Ed', 'ed@12', 12345, 'ed12'),
(16, 'Tom', 'tom@ee', 123, 'dgfd'),
(21, 'Vik', 'vik@gg', 131235, 'gg'),
(28, 'Vivek', 'viv@gmail.', 12345, 'viv___'),
(30, 'Vik', 'vik@12', 5357, 'gg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login information`
--
ALTER TABLE `login information`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login information`
--
ALTER TABLE `login information`
  MODIFY `Sr. No.` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
