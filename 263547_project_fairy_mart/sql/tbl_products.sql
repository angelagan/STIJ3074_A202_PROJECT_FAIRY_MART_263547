-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2021 at 12:37 AM
-- Server version: 10.3.29-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doubleks_fairy_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prid` int(11) NOT NULL,
  `primage` varchar(100) NOT NULL,
  `prname` varchar(100) NOT NULL,
  `prtype` varchar(100) NOT NULL,
  `prprice` varchar(100) NOT NULL,
  `prqty` int(11) NOT NULL,
  `datecreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prid`, `primage`, `prname`, `prtype`, `prprice`, `prqty`, `datecreated`) VALUES
(44, 'mangoes.png', 'Mango', 'Tropical and Exotic', '5.50', 2, '2021-06-08'),
(45, 'raspberries.png', 'Raspberry', 'Berries', '5.50', 20, '2021-06-08'),
(62, '60c097c1d55ac.png', 'Orange', 'Tropical and Exotic', '12.00', 5, '2021-06-09'),
(64, '60c0c3b208469.png', 'Cherry Pear', 'Apples and Pears', '12.00', 3, '2021-06-09'),
(66, '60c0c4208e2d7.png', 'Korea Pear', 'Apples and Pears', '2.00', 6, '2021-06-09'),
(67, '60c0c4e34389d.png', 'Korea Fuji Apple', 'Apples and Pears', '9.00', 5, '2021-06-09'),
(78, '60e851f27eb59.png', 'Watermelon', 'Melons', '15.00', 2, '2021-07-09'),
(79, '60e85435535a3.png', 'Rockmelon', 'Melons', '12.00', 2, '2021-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
