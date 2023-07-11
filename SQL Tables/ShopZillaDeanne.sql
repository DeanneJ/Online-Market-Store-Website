-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 07:53 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `C_ID`, `P_ID`) VALUES
(44, 2, 1),
(45, 2, 17),
(46, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(50) NOT NULL,
  `C_Name` varchar(100) NOT NULL,
  `C_Email` varchar(100) NOT NULL,
  `C_Username` varchar(100) NOT NULL,
  `C_Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_Email`, `C_Username`, `C_Password`) VALUES
(1, 'Deanne', 'Deanne@gmail.com', 'dean', '$2y$10$FN0zmHFC72NX96CLaZvGU..OeUR01PMwYN8ax7/FC.j6uZECNp4pG'),
(3, 'Vilan', 'vilan@gmail.com', 'vilasith', '$2y$10$66T3pLlwvKIXuFffswl91.cAD.oDxouVtBTYML98PeW3NjxhxV1Gq');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fed_ID` int(10) NOT NULL,
  `C_ID` int(10) NOT NULL,
  `Fed_Name` varchar(100) NOT NULL,
  `Fed_Email` varchar(100) NOT NULL,
  `Fed_Product_or_Store` varchar(100) NOT NULL,
  `Fed_Title` varchar(500) NOT NULL,
  `Fed_Description` varchar(1000) NOT NULL,
  `Fed_Rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fed_ID`, `C_ID`, `Fed_Name`, `Fed_Email`, `Fed_Product_or_Store`, `Fed_Title`, `Fed_Description`, `Fed_Rating`) VALUES
(18, 1, 'Deanne', 'Deanne@gmail.com', 'Electromart', 'Not Satisfied', 'Late Delivery\r\nDamaged Products\r\nBad Quality', 1),
(19, 2, 'Vilan', 'vilan@gmail.com', 'Chance Sports', 'Best Sports Products Provider', 'Good Products\r\nQuality Service\r\nVery Satisfied', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_sz`
--

CREATE TABLE `order_sz` (
  `O_ID` int(11) NOT NULL,
  `Pay_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_sz`
--

INSERT INTO `order_sz` (`O_ID`, `Pay_ID`, `C_ID`, `P_ID`) VALUES
(1, 0, 2, 17),
(2, 0, 2, 1),
(3, 0, 2, 7),
(4, 0, 2, 23),
(5, 6, 2, 5),
(6, 6, 2, 17),
(7, 7, 2, 1),
(8, 7, 2, 23),
(9, 8, 2, 9),
(10, 8, 2, 7),
(11, 8, 2, 17),
(12, 9, 1, 4),
(13, 10, 1, 4),
(14, 10, 1, 23),
(15, 11, 1, 8),
(16, 11, 1, 17),
(17, 11, 1, 9),
(18, 12, 1, 23),
(19, 12, 1, 7),
(20, 12, 1, 17),
(21, 13, 1, 1),
(22, 13, 1, 4),
(23, 13, 1, 17),
(24, 14, 1, 1),
(25, 14, 1, 9),
(26, 14, 1, 23),
(27, 15, 2, 7),
(28, 15, 2, 17),
(29, 15, 2, 23),
(30, 16, 2, 17),
(31, 16, 2, 4),
(32, 17, 1, 4),
(33, 18, 3, 4),
(34, 18, 3, 17),
(35, 19, 3, 7),
(36, 19, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Pay_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Pay_ID`, `C_ID`, `Total`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(6, 2, 10000),
(7, 2, 13400),
(8, 2, 55300),
(9, 1, 1200),
(10, 1, 1600),
(11, 1, 54400),
(12, 1, 5700),
(13, 1, 15200),
(14, 1, 63400),
(15, 2, 5700),
(16, 2, 3700),
(17, 1, 1200),
(18, 3, 3800),
(19, 3, 13300);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `P_Availability` int(11) NOT NULL,
  `P_Description` varchar(255) NOT NULL,
  `P_Category` varchar(100) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `Business_Name` varchar(50) NOT NULL,
  `Image_URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_Name`, `Price`, `P_Availability`, `P_Description`, `P_Category`, `Category_ID`, `S_ID`, `Business_Name`, `Image_URL`) VALUES
(1, 'Health Spikes Pair', 13000, 10, 'Health Middle Short Distance Spike Running Shoes Student Track and Field Competition Professional Sprint Long Jump Nail Shoes', 'Sports and Outdoor', 4, 2, 'Chance Sports', 'uploads/Spikes.png'),
(4, 'Makeup Brush', 1200, 20, '13PCS Makeup Brushes Set Eye Shadow Foundation Women Cosmetic Brush Eyeshadow Blush Powder Blending Beauty Soft Makeup Tool', 'Health and Beauty', 3, 3, 'Beauty Factory', 'uploads/MakeupBrush.png'),
(5, 'Football Boots', 9000, 16, 'Krampon Football Boots Men Soccer Shoes Society TF/FG Cleats Sneakers Light Non-slip Futsal Kids Women Turf Sports Football Shoe', 'Sports and Outdoor', 4, 2, 'Chance Sports', 'uploads/FootballBoots.jpg'),
(7, 'Polo T Shirt', 4300, 14, '2023 New Designer Hazzys Summer Mens Golf Wear Polo Shirts With Short Sleeve Turn Down Collar Casual Tops Fashions Top Clothing', 'Fashion and Clothing', 2, 3, 'Beauty Factory', 'uploads/PoloTShirt.jpg'),
(8, 'MMA Gloves', 3400, 8, 'Half Finger Boxing PU Leather Gloves Fighting Kick Boxing Gloves Karate Muay Thai Training Workout Gloves Taekwondo Protector', 'Sports and Outdoor', 4, 2, 'Chance Sports', 'uploads/MMAGloves.jpg'),
(17, 'Gaming Mouse', 2600, 7, 'Wired Gaming Mouse 1600 DPI Optical 6 Button USB Mouse With RGB BackLight Mute Mice For Desktop Laptop Computer Gamer Mouse', 'Electronics', 1, 1, 'Electromart', 'uploads/Mouse.png'),
(40, 'KZ ZSN Pro Earphone', 4000, 6, 'KZ ZSN PRO 1DD+1BA Hybrid technology HIFI Metal In Ear Earphone Bass Earbud Sport Noise Cancelling Headset ZSN AS10 ZS10 PRO ZST', 'Electronics', 1, 1, 'Electromart', 'uploads/ZSN Earphone.png'),
(43, 'SkyLion Keyboard', 3500, 9, 'SKYLION H300 Wired 104 Keys Membrane Keyboard Many Kinds of Colorful Lighting Gaming and Office For Windows and IOS System', 'Electronics', 1, 1, 'Electromart', 'uploads/Keyboard.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `PC_ID` int(11) NOT NULL,
  `PC_Name` varchar(100) NOT NULL,
  `PC_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`PC_ID`, `PC_Name`, `PC_Image`) VALUES
(1, 'Electronics', 'uploads/Electronics.png'),
(2, 'Fashion and Clothing', 'uploads/Fashion&Clothing.png'),
(3, 'Health and Beauty', 'uploads/Health&Beauty.png'),
(4, 'Sports and Outdoor', 'uploads/Sports&Outdoor.png'),
(5, 'Home and Kitchen', 'uploads/Home&Kitchen.png');

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
(1, 'Andrew Watson', 'Electromart', '44775566789', '25/B, Hildon , London', 'australia', 'andrewwatson@icloud.com', 'andrewW', 'Andrew123*'),
(2, 'Arun Sharaf', 'Beauty Factory', '92123456789', '84/1, Islamabad Street', 'pakistan', 'arunsharaf@gmail.com', 'arunS', 'Arun123*'),
(3, 'Anali Perera', 'Beauty Factory', '94777848022', '280/4 , Kaduwela Road, Malabe', 'sri lanka', 'analiperera@gmail.com', 'analiP', 'Anali123*'),
(5, 'Peter James', 'Domestic Delights', '15555553211', '813, Smith Road, New York', 'USA', 'peterjames@icloud.com', 'peterJ', 'Peter123*'),
(6, 'Pooja Singh', 'Beauty Factory', '91456789123', '25/C , Ankara , New Delhi', 'india', 'poojasingh@gmail.com', 'poojaS', 'Pooja123*'),
(7, 'Kusal Fernando', 'Chance Sports', '94773005878', '12/A, Barnes Place , Colombo 07', 'sri lanka', 'kusalfernando@gmail.com', 'kusalF', 'Kusal123*'),
(8, 'Kimali Rathnayaka', 'Domestic Delights', '94777855644', '96/5, Kottawa Road , Homagama', 'sri lanka', 'kimalirathnayaka@gmail.com', 'kimaliR', 'Kimali123*'),
(9, 'Dineth Senanayaka', 'Chance Sports', '94774564567', '94/4, Batapotha Road , Kurunagala', 'sri lanka', 'dinethfernando@gmail.com', 'dinethF', 'Dineth123*'),
(10, 'Emma Gomez', 'Beauty Factory', '15557894785', '30/Q, Jeffrey Street , Washington', 'USA', 'emmagomez@icloud.com', 'emmaG', 'Emma123*');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fed_ID`);

--
-- Indexes for table `order_sz`
--
ALTER TABLE `order_sz`
  ADD PRIMARY KEY (`O_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Pay_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`PC_ID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fed_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_sz`
--
ALTER TABLE `order_sz`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Pay_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `PC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
