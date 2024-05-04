-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanilladb`
--

-- --------------------------------------------------------

--
-- Table structure for table `companytb`
--

CREATE TABLE `companytb` (
  `email` varchar(500) NOT NULL,
  `spice` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `contactDetails` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companytb`
--

INSERT INTO `companytb` (`email`, `spice`, `city`, `contactDetails`, `password`, `image`) VALUES
('Companytest@gmail.com', 'Clove', 'Colombo', '976353743', '123456', 'dp/8.png'),
('testCompany@gmail.com', 'Vanilla', 'Colombo', '0765434567', '123456', 'dp/vanilla_beans_m.jpg'),
('VanillaSrilanka@gmail.com', 'Vanilla', 'Kandy', '0727865364', '123456', 'dp/vanilla_beans_m.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `farmertb`
--

CREATE TABLE `farmertb` (
  `email` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `spices` varchar(500) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmertb`
--

INSERT INTO `farmertb` (`email`, `city`, `spices`, `detail`, `password`, `image`) VALUES
('', '', '', '', '', 'dp/'),
('test1@gmail.com', 'Kandy', 'Vanilla', 'No: 6/1; Kandy, Colombo. TP: 0874673876', '123456', 'dp/images.png'),
('test2@gmail.com', 'Colombo', 'Vanilla', '081-8765427', '123456', 'dp/images (1).png'),
('test3@gmail.com', 'Wattala', 'Cloves', '0728765435', '123456', 'dp/maxresdefault.jpg'),
('test4@gmail.com', 'Kandy', 'Vanilla', '076356473', '123456', 'dp/maxresdefault.jpg'),
('test5@gmail.com', 'Wattegama', 'Vanilla', '9737656756', '123456', 'dp/7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `itemtb`
--

CREATE TABLE `itemtb` (
  `email` varchar(500) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `itemName` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `status` int(255) NOT NULL,
  `itemID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemtb`
--

INSERT INTO `itemtb` (`email`, `topic`, `itemName`, `image`, `city`, `status`, `itemID`) VALUES
('test1@gmail.com', 'Vanilla set 1', 'pure, organic vanilla ', 'uploads/1.jpg', 'Kandy', 1, 16),
('test1@gmail.com', 'Vanilla set 2', 'pure, organic vanilla ', 'uploads/2.jpg', 'Colombo', 1, 17),
('test2@gmail.com', 'Vanilla ', 'organic vanila ', 'uploads/3.jpg', 'Kandy', 1, 18),
('test3@gmail.com', 'Cloves', 'Sri Lanka cloves', 'uploads/clove-bud-oil_480x480.jpg', 'wattala', 1, 19),
('test4@gmail.com', 'Vanilla set 3', 'vanilla', 'uploads/vanilla_beans_m.jpg', 'Kandy', 1, 20),
('test5@gmail.com', 'vanilla', 'pure vanilla', 'uploads/7.jpg', 'Kandy', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `realtimepicturetbl`
--

CREATE TABLE `realtimepicturetbl` (
  `farmerEmail` varchar(500) NOT NULL,
  `imagepath` varchar(500) NOT NULL,
  `imageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `realtimepicturetbl`
--

INSERT INTO `realtimepicturetbl` (`farmerEmail`, `imagepath`, `imageID`) VALUES
('test5@gmail.com', 'imagesCapture/6634833d0282a.jpeg', 11),
('test5@gmail.com', 'imagesCapture/6634834a7e754.jpeg', 12),
('test5@gmail.com', 'imagesCapture/66348351bd1af.jpeg', 13),
('test5@gmail.com', 'imagesCapture/6634835c79134.jpeg', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companytb`
--
ALTER TABLE `companytb`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `farmertb`
--
ALTER TABLE `farmertb`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `itemtb`
--
ALTER TABLE `itemtb`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `realtimepicturetbl`
--
ALTER TABLE `realtimepicturetbl`
  ADD PRIMARY KEY (`imageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemtb`
--
ALTER TABLE `itemtb`
  MODIFY `itemID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `realtimepicturetbl`
--
ALTER TABLE `realtimepicturetbl`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
