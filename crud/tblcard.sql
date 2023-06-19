-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 08:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcard`
--

CREATE TABLE `tblcard` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcard`
--

INSERT INTO `tblcard` (`Id`, `Name`, `Price`, `Image`) VALUES
(81, 'TV', '950000', 'uploadimage/tv.jpg'),
(82, 'Laptop', '1200000', 'uploadimage/laptop.jpg'),
(83, 'Sunglass', '1000', 'uploadimage/nine.jpg'),
(87, 'TV', '4500', 'uploadimage/smartwatch.jpg'),
(88, 'hat', '1200', 'uploadimage/five.jpg'),
(89, 'Hat and sunglass', '120000', 'uploadimage/six.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcard`
--
ALTER TABLE `tblcard`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcard`
--
ALTER TABLE `tblcard`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
