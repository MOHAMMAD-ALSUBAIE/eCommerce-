-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 11:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedatabases`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProudctID` int(11) NOT NULL,
  `usernameID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  PRIMARY KEY (`id`,`ProudctID`,`usernameID`),
  KEY `forgenkEY_ProductID` (`ProudctID`),
  KEY `forgenkEY_UserNameID` (`usernameID`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ProudctID`, `usernameID`, `quantity`, `Total_Price`) VALUES
(23, 3, 1, 2, 9998),
(24, 1, 1, 1, 3499),
(25, 1, 1, 1, 3499),
(26, 3, 1, 1, 4999),
(27, 3, 1, 1, 4999),
(28, 3, 1, 1, 4999),
(29, 6, 1, 1, 5299),
(30, 6, 1, 5, 26495),
(31, 2, 1, 4, 15996),
(32, 1, 1, 1, 3499),
(33, 2, 1, 3, 11997),
(34, 2, 1, 1, 3999),
(35, 1, 1, 1, 3499),
(36, 1, 1, 2, 6998),
(40, 2, 9, 1, 3999),
(41, 5, 1, 1, 3579),
(42, 6, 1, 1, 5299),
(43, 5, 1, 1, 3579),
(44, 5, 1, 1, 3579),
(45, 5, 1, 1, 3579),
(46, 4, 1, 1, 3075),
(47, 3, 1, 1, 4999),
(48, 6, 1, 1, 5299),
(52, 3, 1, 1, 4999),
(53, 3, 1, 1, 4999),
(54, 3, 1, 1, 4999),
(55, 3, 1, 2, 9998),
(56, 3, 3, 1, 4999),
(57, 3, 3, 1, 4999),
(58, 3, 3, 1, 4999),
(59, 3, 1, 5, 24995),
(60, 3, 1, 2, 9998),
(61, 1, 1, 1, 3499),
(62, 3, 1, 1, 4999),
(63, 1, 1, 1, 3499),
(64, 4, 1, 1, 3075),
(65, 3, 1, 1, 4999),
(66, 3, 1, 1, 4999),
(67, 3, 10, 1, 4999),
(68, 3, 12, 1, 4999),
(69, 3, 14, 1, 4999),
(70, 3, 15, 1, 4999),
(71, 3, 16, 1, 4999);

-- --------------------------------------------------------

--
-- Table structure for table `proudcts`
--

CREATE TABLE IF NOT EXISTS `proudcts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proudct` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ProudctType` varchar(256) DEFAULT NULL,
  `price` double NOT NULL,
  `imagePath` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proudcts`
--

INSERT INTO `proudcts` (`id`, `proudct`, `quantity`, `ProudctType`, `price`, `imagePath`) VALUES
(1, 'iPhone 14', 100, 'Apple iPhone 14,128GB\r\n', 3499, 'Images of Proudcts/Apple iPhone 14.png'),
(2, 'iPhone 14', 0, 'Apple iPhone 14,256GB\r\n', 3999, 'Images of Proudcts/Apple iPhone 14.png'),
(3, 'iPhone 14', 0, 'Apple iPhone 14,512GB', 4999, 'Images of Proudcts/Apple iPhone 14.png'),
(4, 'iPhone 13', 0, 'Apple iPhone 13,128GB', 3075, 'Images of Proudcts/Apple iPhone 13.png'),
(5, 'iPhone 13\r\n', 0, 'Apple iPhone 13,256GB', 3579, 'Images of Proudcts/Apple iPhone 13.png'),
(6, 'iPhone 13\r\n', 0, 'Apple iPhone 13,512GB', 5299, 'Images of Proudcts/Apple iPhone 13.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'MohammedAlsubaie', 'alsubaiemoh672@gmail.com', '123'),
(2, 'MohammedAlsubaie', 'mstrgamer1@gmail.com', '123'),
(3, 'MohammedAlsubaie', 'nasser503@gmail.com', '123'),
(4, 'MohammedAlsubaie', 'bllk503@gmail.com', '123'),
(6, 'MohammedAlsubaie', 'wfllwl@gmail.com', '123'),
(7, 'Mohammed Naser', 'mohammed22be@gmail.com', '112233'),
(8, 'DAFDWF', 'anything@gmail.com', '123'),
(9, 'dsdsd', 'have@gmail.com', '123'),
(10, 'huhkjlkj', 'uhkihil@gmail.om', '123'),
(11, 'hi every', 'hi@gmail.com', '111'),
(12, 'test', 'test1@gmail.com', '123'),
(13, 'test', 'test2@', '12'),
(14, 'test3', 'test3@gmail.com', '123'),
(15, 'moh', 'alsubaiemoh673@gmail.com', '123'),
(16, 'test4', 'test4@gmail.com', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `forgenkEY_ProductID` FOREIGN KEY (`ProudctID`) REFERENCES `proudcts` (`id`),
  ADD CONSTRAINT `forgenkEY_UserNameID` FOREIGN KEY (`usernameID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
