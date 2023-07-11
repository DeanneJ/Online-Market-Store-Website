-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 09:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopzilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Pay_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `C_Address` varchar(500) NOT NULL,
  `C_Zipcode` int(5) NOT NULL,
  `Pay_Method` varchar(20) NOT NULL,
  `Pay_Card_No` int(16) NOT NULL,
  `Pay_Exp_Date` varchar(8) NOT NULL,
  `Pay_Cvv` int(3) NOT NULL,
  `Pay_Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Pay_ID`, `C_ID`, `P_ID`, `C_Address`, `C_Zipcode`, `Pay_Method`, `Pay_Card_No`, `Pay_Exp_Date`, `Pay_Cvv`, `Pay_Amount`) VALUES
(1, 0, 5, 'weqwe', 123, 'debit', 13231, '3212', 3112, 100),
(2, 0, 5, 'qwe', 123, 'debit', 1234, '123', 132, 100),
(3, 0, 6, 'aeqwd', 0, 'debit', 32133213, '2', 21, 100),
(4, 0, 5, 'qwedq', 51, 'debit', 56, '5', 56, 100),
(5, 0, 5, 'adfca', 0, 'visa', 234, '234', 234, 100),
(6, 0, 5, '65165', 234, 'visa', 234, '234', 32423, 100),
(7, 0, 5, 'xfv', 234, 'debit', 234, '234', 234, 100),
(8, 0, 5, 'sdf', 345, 'debit', 345, '345', 34, 100),
(9, 0, 5, 'qwd', 1324, 'debit', 234, '234', 234, 100),
(10, 1, 5, 'wqd', 123, 'visa', 123, '123', 123, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Pay_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Pay_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
