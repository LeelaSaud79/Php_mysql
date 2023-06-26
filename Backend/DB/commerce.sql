-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 10:47 AM
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
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `bill_id` int(11) NOT NULL,
  `billing_name` varchar(100) DEFAULT NULL,
  `billing_address` varchar(50) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`bill_id`, `billing_name`, `billing_address`, `order_id`) VALUES
(1, 'Sharfira Joshi', 'Bhaktpuur', 1),
(2, 'Anu Shah', 'Kirtipur', 2),
(3, 'Karin Bhandari', 'Lalitpur', 3),
(4, 'Illy Bhandari', 'Gwarko', 4),
(5, 'Nam Awasthi', 'Baneshwor', 5),
(6, 'Arjun Lamichhanne', 'Godawari', 6),
(7, 'Yogi Devkota', 'Bhaktpuur', 7),
(8, 'Zyara Shrestha', 'Kirtipur', 8);

-- --------------------------------------------------------

--
-- Table structure for table `finalorder`
--

CREATE TABLE `finalorder` (
  `final_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `ship_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finalorder`
--

INSERT INTO `finalorder` (`final_id`, `order_id`, `bill_id`, `ship_id`, `prod_id`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2),
(3, 3, 3, 3, 3),
(4, 4, 4, 4, 4),
(5, 5, 5, 5, 5),
(6, 6, 6, 6, 6),
(7, 7, 7, 7, 7),
(8, 8, 8, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_itmes`
--

CREATE TABLE `order_itmes` (
  `order_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_itmes`
--

INSERT INTO `order_itmes` (`order_id`, `date`, `quantity`, `prod_id`) VALUES
(1, '2023-03-09', 10, 1),
(2, '2023-04-20', 20, 2),
(3, '2023-03-25', 15, 3),
(4, '2023-05-01', 25, 4),
(5, '2023-05-05', 5, 5),
(6, '2023-05-16', 10, 6),
(7, '2023-05-13', 10, 7),
(8, '2023-05-15', 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `price`) VALUES
(1, 'Laptop', 95000),
(2, 'Hoodies', 2500),
(3, 'Mobile', 60000),
(4, 'Headphone', 2000),
(5, 'Camera', 150000),
(6, 'Smartwatches', 15000),
(7, 'Television', 120000),
(8, 'Tablets', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_details`
--

CREATE TABLE `shipment_details` (
  `ship_id` int(11) NOT NULL,
  `shiping_name` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(50) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment_details`
--

INSERT INTO `shipment_details` (`ship_id`, `shiping_name`, `shipping_address`, `order_id`) VALUES
(1, 'Laptop12XY', 'Kirtipur', 1),
(2, 'Clothing7812', 'Lugu', 2),
(3, 'MObile12QW', 'Nuwakot', 3),
(4, 'electro1234', 'Butwal', 4),
(5, 'Latest4567', 'Kalinchowk', 5),
(6, 'Looktime@#$', 'Janakpur', 6),
(7, 'TV*&', 'Mahendranagar', 7),
(8, 'Tablets234', 'Dhangdahi', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `finalorder`
--
ALTER TABLE `finalorder`
  ADD PRIMARY KEY (`final_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `ship_id` (`ship_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `order_itmes`
--
ALTER TABLE `order_itmes`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `shipment_details`
--
ALTER TABLE `shipment_details`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `finalorder`
--
ALTER TABLE `finalorder`
  MODIFY `final_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_itmes`
--
ALTER TABLE `order_itmes`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipment_details`
--
ALTER TABLE `shipment_details`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_itmes` (`order_id`);

--
-- Constraints for table `finalorder`
--
ALTER TABLE `finalorder`
  ADD CONSTRAINT `finalorder_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_itmes` (`order_id`),
  ADD CONSTRAINT `finalorder_ibfk_2` FOREIGN KEY (`ship_id`) REFERENCES `shipment_details` (`ship_id`),
  ADD CONSTRAINT `finalorder_ibfk_3` FOREIGN KEY (`bill_id`) REFERENCES `billing_details` (`bill_id`),
  ADD CONSTRAINT `finalorder_ibfk_4` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `order_itmes`
--
ALTER TABLE `order_itmes`
  ADD CONSTRAINT `order_itmes_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `shipment_details`
--
ALTER TABLE `shipment_details`
  ADD CONSTRAINT `shipment_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_itmes` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
