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
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`name`, `email`, `phone`, `gender`, `password`, `otp`, `date_reg`) VALUES
('angela', 'angelagan333@gmail.com', '0123456888', 'Female', 'abae854dceb7a01ab186d14e8e024480e917af31', '1', '2021-06-10 09:38:06'),
('angela', 'gan_hui_ching@soc.uum.edu.my', '0123456789', 'Female', 'abae854dceb7a01ab186d14e8e024480e917af31', '1', '2021-07-03 00:30:21'),
('jago', 'jagox40910@ovooovo.com', '0123456789', 'Male', '4b593335ef34f07c9317a30e0c1d28a540273009', '2691', '2021-07-09 22:08:55'),
('jir', 'jirkosukku@biyac.com', '0123456789', 'Female', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', '2021-06-10 09:36:15'),
('relmupagno', 'relmupagno@biyac.com', '0123456789', 'Male', '1a3648c3050dc56b477030352288c8e2187e7c2a', '5807', '2021-07-03 00:19:57'),
('rikkomisto', 'rikkomisto@biyac.com', '0123456789', 'Male', '396ca1f6dce6fa732fd1ba1a295d829a4b96d977', '4549', '2021-07-09 22:05:18'),
('seeyong', 'seeyong_98@hotmail.com', '015-9852002', 'Female', '3d637fc604995b51a048db0058a7c210e57a38cc', '1', '2021-06-10 09:42:39'),
('Man Nee', 'yastufukko@biyac.com', '0169468580', 'Female', '1a7150a0e134d303a2de7a00791aac6ac2d4e108', '1', '2021-06-10 09:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
