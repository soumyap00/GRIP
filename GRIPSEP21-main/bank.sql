-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 06:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Id`, `Name`, `Email`, `Balance`) VALUES
(102, 'Ram Joshi', 'qweasd@gmail.com', 140060.43),
(104, 'Krishan Iyer', 'poiuyt@hotmail.com', 230783.21000000002),
(106, 'Gorav Sinha', 'mnbvcx@yahoo.com', 565646.6599999999),
(108, 'Kunal Kar', 'olmiknj@gmail.com', 527447.0099999999),
(109, 'Rajesh Kapoor', 'ytrfghnbv@hotmail.com', 50476.46),
(110, 'Soumyashree Patra', 'qwerty123@gmail.com', 2499.31),
(111, 'Nikhil', 'asdfgh@gmail.com', 48547.51),
(112, 'Suraj', 'qwesd@gmail.com', 140060.43),
(113, 'Abhisek', 'zxcvbn@yahoo.com', 21466.88),
(114, 'Tarini', 'poiut@hotmail.com', 228977.21000000002),
(115, 'Indrajeet', 'ljhgf@gmail.com', 16777.760000000002),
(116, 'Sandeep', 'mncx@yahoo.com', 566956.6599999999),
(117, 'Deepti', 'efvbg@gmail.com', 1237093.7999999998),
(118, 'Kunal', 'olknj@gmail.com', 543125.0099999999),
(119, 'Rakesh', 'ghnbv@hotmail.com', 34798.46);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `S_Id` int(11) NOT NULL,
  `Sender_ID` int(11) NOT NULL,
  `Sender_Name` varchar(50) NOT NULL,
  `Transfer_Amount` double NOT NULL,
  `Receiver_Id` int(11) NOT NULL,
  `Receiver_Name` varchar(50) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`S_Id`, `Sender_ID`, `Sender_Name`, `Transfer_Amount`, `Receiver_Id`, `Receiver_Name`, `Date`) VALUES
(11, 110, 'Soumyashree Patra', 110, 116, 'Sandeep', '2021-09-21 20:15:09'),
(12, 114, 'Tarini', 2256, 111, 'Nikhil', '2021-09-21 20:16:08'),
(13, 117, 'Deepti', 5234, 115, 'Indrajeet', '2021-09-21 20:16:24'),
(14, 113, 'Abhisek', 1200, 116, 'Sandeep', '2021-09-21 22:00:06'),
(15, 111, 'Nikhil', 200, 114, 'Tarini', '2021-09-21 22:00:23'),
(16, 108, 'Kunal Kar', 15678, 109, 'Rajesh Kapoor', '2021-09-21 22:02:49'),
(17, 111, 'Nikhil', 7600, 117, 'Deepti', '2021-09-21 22:03:09'),
(18, 104, 'Krishan Iyer', 250, 110, 'Soumyashree Patra', '2021-09-21 22:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`S_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
