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
-- Table structure for table `tbl_paid`
--

CREATE TABLE `tbl_paid` (
  `receiptid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `paid_amount` varchar(50) NOT NULL,
  `remarks` varchar(60) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paid`
--

INSERT INTO `tbl_paid` (`receiptid`, `email`, `paid_amount`, `remarks`, `status`) VALUES
('42o9wlx4', 'angelagan333@gmail.com', '191', '', 'paid'),
('vlrtxqyk', 'angelagan333@gmail.com', '3', '', 'paid'),
('snn70vqh', 'angelagan333@gmail.com', '2', '', 'paid'),
('8tqvt9z0', 'angelagan333@gmail.com', '15', '', 'paid'),
('hol6acak', 'angelagan333@gmail.com', '3', 'no', 'paid'),
('lxgzqp3n', 'angelagan333@gmail.com', '2', '9', 'paid'),
('ydtpwixk', 'angelagan333@gmail.com', '3', '-', 'paid'),
('p6rkeg0m', 'angelagan333@gmail.com', '45', 'more nice', 'paid'),
('jfrekvw8', 'angelagan333@gmail.com', '15', 'no', 'paid'),
('aqymzvdz', 'angelagan333@gmail.com', '15', 'no', 'paid'),
('4nchqq2e', 'angelagan333@gmail.com', '45', 'no', 'paid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
