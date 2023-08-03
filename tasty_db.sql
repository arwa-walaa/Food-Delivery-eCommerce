-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 10:46 PM
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
-- Database: `tasty_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(50) NOT NULL,
  `category_image` varchar(1000) NOT NULL DEFAULT 'https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`, `category_image`) VALUES
('sasasa', 'https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640');

-- --------------------------------------------------------

--
-- Table structure for table `credit card`
--

CREATE TABLE `credit card` (
  `Email` varchar(255) NOT NULL,
  `credit_Number` int(11) NOT NULL,
  `Expiration_date` date NOT NULL,
  `Security_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Email` varchar(255) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Order_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Product_Name` varchar(150) NOT NULL,
  `Category_Name` varchar(150) NOT NULL,
  `Price` double NOT NULL,
  `Ingredience` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Product_image` varchar(1000) NOT NULL DEFAULT 'https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640',
  `Nutritional_Facts` text NOT NULL,
  `Source` varchar(150) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Product_Name`, `Category_Name`, `Price`, `Ingredience`, `Quantity`, `Product_image`, `Nutritional_Facts`, `Source`, `Rate`) VALUES
(1, 'pizaa', 'sasasa', 50, 'sasaasaasaasaaaaaa', 5, 'asasasas', 'asasasaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `BirthDate` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` enum('Female','Male') NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Name`, `Password`, `Email`, `BirthDate`, `Address`, `Gender`, `user_type`) VALUES
('sa', '123', '23@sa', '2022-05-05', 'asd', 'Female', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `credit card`
--
ALTER TABLE `credit card`
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Email`,`Product_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test` (`Category_Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit card`
--
ALTER TABLE `credit card`
  ADD CONSTRAINT `credit card_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `test` FOREIGN KEY (`Category_Name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
