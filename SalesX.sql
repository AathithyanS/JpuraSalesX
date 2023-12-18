-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2023 at 04:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SalesX`
--

-- --------------------------------------------------------

--
-- Table structure for table `CustomerOrder`
--

CREATE TABLE `CustomerOrder` (
  `OrderId` int(255) NOT NULL,
  `PaymentId` varchar(255) NOT NULL,
  `CustomerId` int(255) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Amount` float NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CustomerOrder`
--

INSERT INTO `CustomerOrder` (`OrderId`, `PaymentId`, `CustomerId`, `DateTime`, `Address`, `Phone`, `Email`, `Amount`, `Status`) VALUES
(3, 'ch_3MyywxHJZZKzKLNm1KfxKjvA', 38, '2023-04-20 20:29:07', 'adfa', '41341341', 'Admin@gmail.com', 3430.35, 'Waiting'),
(4, 'ch_3Myz0dHJZZKzKLNm0fBKFQoj', 38, '2023-04-20 20:32:56', 'fasf', '42', 'Admin@gmail.com', 3430.35, 'Confirmed'),
(5, 'ch_3Myz7cHJZZKzKLNm0kka60b6', 38, '2023-04-20 20:40:08', 'adfasdf', '23423', 'Techhunter113@gmail.com', 4133.85, 'Shiped'),
(6, 'ch_3MzGpYHJZZKzKLNm1GcDbLwA', 38, '2023-04-21 15:34:39', 'adfa', '2342', 'Admin@gmail.com', 1033.2, 'Delivered'),
(7, 'ch_3MzKNgHJZZKzKLNm0LtPheyu', 38, '2023-04-21 19:22:08', 'adfa', '243242', 'aathi@gmail.com', 407.4, 'Waiting'),
(8, 'ch_3MzKShHJZZKzKLNm0v9bQyNT', 38, '2023-04-21 19:27:19', 'afas', '232', 'test@gmail.com', 933.45, 'Waiting'),
(9, 'ch_3N0HKFHJZZKzKLNm1Gfdthom', 38, '2023-04-24 10:18:31', '1234', '0771715935', 'Athi@gmail.com', 4028.85, 'Waiting'),
(10, 'ch_3N0Px6HJZZKzKLNm0OacBzUT', 38, '2023-04-24 19:31:12', 'tew', '2322', 'Admin@gmail.com', 1033.2, 'waiting'),
(11, 'ch_3N19NFHJZZKzKLNm1W0y0Wbg', 38, '2023-04-26 20:01:13', 'asdfa', '23', 't', 1340.85, 'Confirmed'),
(12, 'ch_3N1AL8HJZZKzKLNm0nBZ9HhP', 38, '2023-04-26 21:03:06', 'adsfasd', '2323', 'test@gmail.com', 1033.2, 'Confirmed'),
(13, 'ch_3N3aA4HJZZKzKLNm0RyiopQ6', 38, '2023-05-03 13:01:40', 'asdfa', '3323', 'Admin@gmail.com', 418.95, 'Canceled'),
(14, 'ch_3NcXdnHJZZKzKLNm1tk71ZzC', 38, '2023-08-07 23:24:47', 'asdfadsf', '32323', 'Admin@gmail.com', 407.4, 'Shiped'),
(15, 'ch_3Nd2ZBHJZZKzKLNm1HbHDm2u', 38, '2023-08-09 08:26:10', 'Madaththady road, kodikamam', '0771715935', 'Aathi@gmail.com', 407.4, 'Shiped'),
(16, 'ch_3NnelcHJZZKzKLNm1dxAwoNf', 44, '2023-09-07 15:14:53', 'asdfa', '232', 'test121@gmail.com', 407.4, 'Waiting'),
(17, 'ch_3OOi5uHJZZKzKLNm1HEgXJdT', 46, '2023-12-18 20:16:58', 'madaththady road, kodikamam, north , srilanka', '0752072376', 'Test@gmail.com', 1440.6, 'Waiting'),
(18, 'ch_3OOiElHJZZKzKLNm14hR2TT5', 47, '2023-12-18 20:26:07', 'madaththady road, kodikamam, north , srilanka', '0752072376', 'techhunter113@gmail.com', 1433.25, 'Waiting'),
(19, 'ch_3OOiXOHJZZKzKLNm0BC0lwbF', 48, '2023-12-18 20:45:22', 'Kodikamam, Jaffna.', '077123456', 'Aathi93@gmail.com', 1233.75, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `OrderProduct`
--

CREATE TABLE `OrderProduct` (
  `OrderId` int(255) NOT NULL,
  `ProductId` int(255) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderProduct`
--

INSERT INTO `OrderProduct` (`OrderId`, `ProductId`, `Quantity`) VALUES
(3, 24, 0),
(3, 20, 0),
(4, 24, 0),
(4, 20, 0),
(5, 20, 0),
(5, 23, 0),
(5, 21, 0),
(6, 29, 0),
(6, 27, 0),
(7, 29, 0),
(8, 28, 0),
(9, 28, 3),
(9, 22, 5),
(10, 29, 1),
(10, 27, 1),
(11, 28, 1),
(11, 29, 1),
(12, 29, 1),
(12, 27, 1),
(13, 23, 1),
(14, 29, 1),
(15, 29, 1),
(16, 29, 1),
(17, 29, 2),
(17, 27, 1),
(18, 29, 1),
(18, 23, 1),
(18, 24, 2),
(19, 29, 2),
(19, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `ProductId` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `IsLaptop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ProductId`, `Title`, `Brand`, `Price`, `Quantity`, `Details`, `Image`, `Date`, `IsLaptop`) VALUES
(20, 'Apple 2021 MacBook Pro', 'Apple', 2689, 5, '$214.44 Shipping & Import Fees Deposit to Sri Lanka Details  Available at a lower price from other sellers that may not offer free Prime shipping. Brand	Apple Series	MacBook Pro Screen Size	16.2 Inches Color	Space Gray Hard Disk Size	512 GB CPU Model	ARM ', '0.38470700 168114487810.png', '2023-03-31', 1),
(21, 'SAMSUNG Galaxy S23+ Plus', 'Samsung', 849, 20, 'SAMSUNG Galaxy S23+ Plus Cell Phone, Factory Unlocked Android Smartphone, 256GB Storage, 50MP Camera, Night Mode, Long Battery Life, Adaptive Display, US Version, 2023, Lavender', '0.62019200 16811457351.png', '2023-03-18', 0),
(22, 'Samsung Galaxy S20+', 'Samsung', 234, 11, 'Samsung Galaxy S20+ 5G 128GB Fully Unlocked Smartphone (Renewed)', '0.50307500 16811459052.png', '2023-03-20', 0),
(23, 'Lenovo 15.62', 'Lenovo', 399, 4, 'Lenovo 15.6', '0.31230500 16811462566.png', '2023-03-21', 1),
(24, 'HP 2021 Stream 14', 'Hp', 289, 6, 'HP 2021 Stream 14', '0.15717400 16811464187.png', '2023-03-24', 1),
(25, 'Motorola Moto G Stylus 5G', 'Motorala', 179, 22, 'Motorola Moto G Stylus 5G | 2021 | 2-Day Battery | Unlocked | Made for US 4/128GB | 48MP Camera | Cosmic Emerald', '0.48863200 16811466473.png', '2023-04-01', 0),
(26, 'Lenovo IdeaPad 15.6\" Laptop Newest', 'Lenovo', 449, 2, 'Lenovo IdeaPad 15.6\" Laptop Newest, 15.6 Inch HD Anti-Glare Display, AMD Dual-core Processor, 20GB RAM 1TB SSD, WiFi6 Bluetooth5, 9.5Hr Battery, Windows 11 +GM Accessories', '0.98493200 16811468118.png', '2023-04-03', 1),
(27, 'Dell 2022 Inspiron 15 3511 Laptop', 'Dell', 596, 10, 'Dell 2022 Newest Inspiron 15 3511 Laptop, 15.6', '0.89825700 16811469429.png', '2023-04-05', 1),
(28, 'SAMSUNG Galaxy Z Flip 3 Phone', 'Samsung', 889, 9, 'SAMSUNG Galaxy Z Flip 3 5G Cell Phone, Factory Unlocked Android Smartphone, 256GB, Flex Mode, Super Steady Camera, Ultra Compact, US Version, Phantom Black', '0.57267800 16811471055.png', '2023-04-07', 0),
(29, 'Apple iPhone 11', 'Apple', 388, 5, 'Apple iPhone 11, US Version, 256GB, Purple - Unlocked (Renewed). The product is refurbished, fully functional, and in excellent condition. Backed by the 90-day Amazon Renewed Guarantee.', '0.82317200 16811472324.png', '2023-04-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `UserName`, `Email`, `PhoneNo`, `Address`, `Password`, `IsAdmin`) VALUES
(38, 'Test2', 'test@gmail.com', 2423, 'adfa', 't', 1),
(40, 'asdf', 'Admin@gmail.com', 232, 'asdfa', 'admin123', 1),
(41, 'ict20801', 'adfa@gmail', 252345, 'aff', 'afaaf', 0),
(42, 'Test2', 'test2@gmail.com', 32413, 'afa', 'asdfa', 1),
(44, 'test', 'test121@gmail.com', 771715935, 'aa;dfasd', 'test121@gmail.com', 0),
(45, 'Aathi', 'aathi3@gmail.com', 771234567, 'madaththady road, kodikamam, north , srilanka', 'Aathi123@', 0),
(46, 'Aathi', 'Aathi2@gmail.com', 771234567, 'madaththady road, kodikamam, north , srilanka', 'Aathi2@', 0),
(47, 'Aathi', 'Test33@gmail.com', 77123455, 'madaththady road, kodikamam, north , srilanka', 'TEst123', 0),
(48, 'Aathithyan', 'Aathi93@gmail.com', 77123456, 'Kodikamam, Jaffna.', 'Aathi123@', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  MODIFY `OrderId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
