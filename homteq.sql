-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 08:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homteq`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL,
  `prodDescripShort` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripLong`, `prodPrice`, `prodQuantity`, `prodDescripShort`) VALUES
(1, 'Headset', 'headsetSmall.jpg', 'headsetBig.jpg', 'Get it by Mon, Mar 29 - Wed, Apr 7 from Chino, California\r\n • Used condition\r\n • No returns, but backed by eBay Money back guaranteeeBay Money back guarantee\r\n • Almost gone\r\nCondition is Used. This item is In used Condition, and in great working condition. Connectivity Technology: Wireless, Bluetooth.', '53.99', 6, 'SteelSeries Arctis Pro Wireless Black Headset For PlayStation 4/PC Tested'),
(2, 'Laptop', 'laptopSmall.jpg', 'laptopLarge.jpg', 'USB 3.0 Type C, 10/100/1000 Ethernet Card, Wireless-AC, 1x SuperSpeed USB Type-C® 5Gbps signaling rate, 2x SuperSpeed USB Type-A 5Gbps signaling rate, 1x HDMI1.4b, 1x RJ-45, 1x Headphone / mic combo, Bluetooth 4.2, Realtek RTL8821CE 802.11a/b/g/n/ac (1x1) Wi-Fi, 1 multi-format SD media card reader.', '629.47', 104, 'Lenovo IdeaPad Gaming 3 15.6\" Laptop120Hz Ryzen 5-4600H 8GB 256GB SSD GTX 1650'),
(3, 'Lego', 'legoSmall.jpg', 'legoLarge.jpg', 'LEGO System A/S is a Danish toy production company based in Billund. It is best known for the manufacture of LEGO-brand toys, consisting mostly of interlocking plastic bricks. ', '23.99', 29, 'LEGO Scuba Diver Manta Ray Stingray Minifigure Ocean Boat Sea Polybag Gift 30370'),
(4, 'Coffe machine', 'machineSmall.jpg', 'machineLarge.jpg', 'The Nescafe Dolce Gusto Genio 2 is an automatic capsule coffee machine, designed to perfectly fit your single cup, black and specialty coffee brewing needs with a small footprint\r\nCOFFEE HOUSE INSPIRED DRINKS - Explore the wide variety of decadent flavors and coffee house inspired drinks offered by the Nescafe Dolce Gusto capsule-based coffee machine. With 15 flavor varieties, choose from authentic Espresso, Americano, Cappuccino, Latte, and more.', '105.99', 62, 'NESCAFÉ Dolce Gusto Coffee Machine, Genio 2, Espresso, Cappuccino and Latte Pod Machine'),
(5, 'Watch', 'watchSmall.jpg', 'watchBig.jpg', 'Water-resistant to 30m, function supports hand washing, raining, sailing and water sports, not suitable for swimming.\r\nApplicable people: All watches are equipped with exquisite gift boxes. Sending leaders, colleagues, classmates,', '123.99', 9, 'AMEXI Mens WatchWatches with Real Wooden case and Strap ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(4) NOT NULL,
  `userType` varchar(1) NOT NULL,
  `userFName` varchar(50) NOT NULL,
  `userSName` varchar(50) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPostCode` varchar(50) NOT NULL,
  `userTelNo` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostCode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(1, 'c', 'hassini', 'wijemane', '176 castle street colombo 8', '22', '2', 'hasini2019319@iit.ac.lk', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
