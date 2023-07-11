-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 10:26 AM
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
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `S_ID` int(10) NOT NULL,
  `Full_Name` varchar(100) NOT NULL,
  `Business_Name` varchar(50) NOT NULL,
  `Contact_No` varchar(11) NOT NULL,
  `Seller_Address` varchar(100) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Seller_Username` varchar(25) NOT NULL,
  `Seller_Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`S_ID`, `Full_Name`, `Business_Name`, `Contact_No`, `Seller_Address`, `Country`, `Email`, `Seller_Username`, `Seller_Password`) VALUES
(1, 'Andrew Watson', 'Electromart', '44775566789', '25/B, Hildon , London', 'UK', 'andrewwatson@icloud.com', 'andrewW', 'Andrew123*'),
(2, 'Arun Sharaf', 'Glamour Store', '92123456789', '84/1, Islamabad Street', 'pakistan', 'arunsharaf@gmail.com', 'arunS', 'Arun123*'),
(3, 'Anali Perera', 'Beauty Factory', '94777848022', '280/4 , Kaduwela Road, Malabe', 'sri lanka', 'analiperera@gmail.com', 'analiP', 'Anali123*'),
(4, 'Ann Holland', 'New Tech', '44456123789', '84/3 , Flower Street , Chesham', 'UK', 'annholland@gmail.com', 'annH', 'AnnHolland123*'),
(5, 'Peter James', 'Daily Life', '15555553211', '813, Smith Road, New York', 'USA', 'peterjames@icloud.com', 'peterJ', 'Peter123*'),
(6, 'Pooja Singh', 'Young Beauty', '91456789123', '25/C , Ankara , New Delhi', 'india', 'poojasingh@gmail.com', 'poojaS', 'Pooja123*'),
(7, 'Kusal Fernando', 'Chance Sports', '94773005878', '12/A, Barnes Place , Colombo 07', 'sri lanka', 'kusalfernando@gmail.com', 'kusalF', 'Kusal123*'),
(8, 'Kimali Rathnayaka', 'Domestic Delights', '94777855644', '96/5, Kottawa Road , Homagama', 'sri lanka', 'kimalirathnayaka@gmail.com', 'kimaliR', 'Kimali123*'),
(9, 'Dineth Senanayaka', 'Brand Sport', '94774564567', '94/4, Batapotha Road , Kurunagala', 'sri lanka', 'dinethfernando@gmail.com', 'dinethF', 'Dineth123*'),
(10, 'Emma Gomez', 'Global Care', '15557894785', '30/Q, Jeffrey Street , Washington', 'USA', 'emmagomez@icloud.com', 'emmaG', 'Emma123*');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
