-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 04:37 PM
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
(1, 'Robot Vacuum Cleaner', 15000, 10, 'Smart Robot Vacuum Cleaner, Self-Charging Robotic Vacuum Cleaner', 'Home and Garden', 5, 8, 'Home Decor', 'RobotVacuum.png'),
(2, 'Toshiba 1TB External Hard Drive', 6000, 10, 'Portable External Hard Drive USB 3.0 2.5 HDD Storage Compatible for PC, Mac, Desktop, Laptop, MacBook, Chromebook, Xbox One, Xbox 360', 'Electronics', 4, 5, 'Audio World', 'ToshibaHardDrive.png'),
(3, 'Bluetooth Speaker', 2500, 10, 'Wireless Portable Bluetooth Speaker Subwoofer With 3.5mm Aux Jack USB TF Card', 'Electronics', 4, 5, 'Audio World', 'BluetoothSpeaker.png'),
(4, 'KZ ZSN Pro Earphone', 3600, 10, 'KZ ZSN PRO 1DD+1BA Hybrid technology HIFI Metal In Ear Earphone Bass Earbud Sport Noise Cancelling Headset ZSN AS10 ZS10 PRO ZST', 'Electronics', 4, 1, 'Electromart', 'ZSN Earphone.png'),
(5, 'Apple iPhone 14', 290000, 10, 'Released 2022, September 16 240g, 7.9mm thickness', 'Electronics', 4, 1, 'Electromart', '14pro.png'),
(6, 'Facial Massage Roller', 500, 10, 'Gua Sha Roller Massager Roller for Face Neck Eye Resin Facial Massage Instrumenr Beauty Health Care Scraping Board Muscle', 'Health and Beauty', 3, 3, 'Beauty Factory', 'FacialMAssageRoller.png'),
(7, 'Mascara', 1000, 10, '4d Silk Fiber Lash Mascara Long Curling Mascara Makeup Eyelash Black Waterproof Fiber Mascara Eye Lashes Makeup', 'Health and Beauty', 3, 10, 'Global Care', 'Mascara.png'),
(8, 'Summer Hat', 2400, 10, 'Elegant temperament Hat For Women Dot Chiffon Bucket Hat Organza breathable Beach Hat summer big eaves sunshade fisherman hat', 'Fashion', 2, 2, 'Glamour Store', 'summerHat.png'),
(9, 'Sneakers', 1600, 10, 'New Concise Canvas Men Shoes Comfortable Men s Casual Shoes Brand Breathable Male Big Size Men Walk Flat Sneakers Zapatos Hombre', 'Fashion', 2, 2, 'Glamour Store', 'Sneakers.png'),
(10, 'Bracelet', 850, 10, 'Rinhoo Fashion Handmade Purple Butterfly Flower Bracelet For Women Charm Sweet Animal Pendant Braided Bracelets & Bangle Jewelry', 'Fashion', 2, 6, 'Young Beauty', 'Bracelet.png'),
(11, 'Punching Bag', 6600, 10, 'Punch Sandbag Durable Boxing Heavy Punch Bag with Metal Chain Hook Carabiner Fitness Training Hook Kick Fight Karate Taekwondo', 'Sports and Outdoor', 1, 7, 'Chance Sports', 'PunchingBag.png'),
(12, 'Swimming Goggles', 3000, 10, 'COPOZZ Large Frame Adults Swimming Goggles Professional Anti-Fog Sports Swim Eyewear Waterproof Swimming Glasses For Men Women', 'Sports and Outdoor', 1, 7, 'Chance Sports', 'SwimmingGoggles.png'),
(13, 'Football Boots', 9000, 10, 'Krampon Football Boots Men Soccer Shoes Society TF/FG Cleats Sneakers Light Non-slip Futsal Kids Women Turf Sports Football Shoe', 'Sports and Outdoor', 1, 7, 'Chance Sports', 'FootballBoots.png'),
(14, 'Spikes Pair', 13000, 10, 'Health Middle Short Distance Spike Running Shoes Student Track and Field Competition Professional Sprint Long Jump Nail Shoes', 'Sports and Outdoor', 1, 9, 'Brand Sport', 'Spikes.png'),
(15, 'MMA Gloves', 3400, 10, 'Half Finger Boxing PU Leather Gloves Fighting Kick Boxing Gloves Karate Muay Thai Training Workout Gloves Taekwondo Protector', 'Sports and Outdoor', 1, 9, 'Brand Sport', 'MMAgloves.png'),
(16, 'Makeup Brush', 1200, 10, '13PCS Makeup Brushes Set Eye Shadow Foundation Women Cosmetic Brush Eyeshadow Blush Powder Blending Beauty Soft Makeup Tool', 'Health and Beauty', 3, 3, 'Beauty Factory', 'MakeupBrush.png'),
(17, 'Eye Liner', 950, 10, 'Black Matte Smooth Liquid Eyeliner Pen Waterproof Long Lasting Eye Liner Pencil Quick Drying Non-blooming Natural Eyes Cosmetics', 'Health and Beauty', 3, 3, 'Beauty Factory', 'EyeLiner.png'),
(18, 'Facial Serum', 450, 10, 'Retinol Facial Serum Organic Whitening Anti-Aging Wrinkle Essence Face Skin Care Vitamin Hyaluronic Acid Moisturizing', 'Health and Beauty', 3, 3, 'Beauty Factory', 'FacialSerum.png'),
(19, 'Keyboard', 3500, 10, 'SKYLION H300 Wired 104 Keys Membrane Keyboard Many Kinds of Colorful Lighting Gaming and Office For Windows and IOS System', 'Electronics', 4, 4, 'New Tech', 'Keyboard.png'),
(20, 'Samsung Galaxy M31', 50000, 10, 'Released 2020, March 05 191g, 8.9mm thickness Android 10, up to Android 12, One UI 4.1 64GB/128GB storage, microSDXC', 'Electronics', 4, 4, 'New Tech', 'M31.png'),
(21, 'Potted Plant', 900, 10, 'Artificial Potted Plants Decorative Faux Greenery with Ceramic Planter for Home, Office, Living Room, and Bedroom Decoration', 'Home and Garden', 5, 8, 'Home Decor', 'PottedPlant.png'),
(22, 'Cookware Set', 5000, 10, '11 Piece Non-Stick Cookware Set Pots and Pans Set Dishwasher Safe Induction Granite Coating Aluminum Frying Pans with Cooking Utensils - Black', 'Home and Garden', 5, 8, 'Home Decor', 'CookwareSet.png'),
(23, 'Men’s Trouser', 2000, 10, 'Men’S New Casual Pants Summer Solid Breathable Drawstring Pocket Straight Trousers Male Thin Quick-Drying Sweatpants Pants', 'Fashion', 2, 6, 'Young Beauty', 'MenTrouser.png'),
(24, 'Women’s Top', 2100, 10, 'Women Korean Fashion Vintage Puff Sleeve Shirts 2023 Y2k Ladies Square Collar Pleated White Blouses Summer Blusas Mujer De Mujer', 'Fashion', 2, 2, 'Glamour Store', 'WomenTop.png'),
(25, 'Polo T-Shirt', 4200, 10, '2023 New Designer Hazzys Summer Men’s Golf Wear Polo Shirts With Short Sleeve Turn Down Collar Casual Tops Fashions Top Clothing', 'Fashion', 2, 6, 'Young Beauty', 'PoloTShirt.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
