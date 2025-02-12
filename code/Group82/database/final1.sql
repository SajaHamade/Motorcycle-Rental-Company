-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 12:48 PM
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
-- Database: `final1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_PASSWORD`) VALUES
('ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `motor_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `motor_result` varchar(100) DEFAULT NULL,
  `price` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `motor_id`, `email`, `book_date`, `return_date`, `motor_result`, `price`) VALUES
(1, 13, 'bob.johnson@example.com', '2023-05-15', '2023-05-25', 'RETURNED', '5000'),
(4, 22, 'saja.hamade5@gmail.com', '2023-09-01', '2023-09-10', 'RETURNED', '1800'),
(5, 13, 'Nadia111@gmail.com', '2023-10-15', '2023-10-25', 'RETURNED', '1600'),
(6, 22, 'jane.smith@example.com', '2023-11-05', '2023-11-11', 'RETURNED', '1110'),
(7, 17, 'yasser@gmail.com', '2023-12-10', '2023-12-20', 'RETURNED', '2000'),
(8, 18, 'Nadia111@gmail.com', '2024-01-05', '2024-01-15', 'RETURNED', '1700'),
(9, 17, 'bob.johnson@example.com', '2024-01-10', '2024-01-20', 'RETURNED', '2000'),
(11, 21, 'hanin5@gmail.com', '2024-02-15', '2024-02-25', 'RETURNED', '900'),
(12, 18, 'bob.johnson@example.com', '2024-03-01', '2024-03-10', 'Under Processing', '700'),
(13, 24, 'saja.hamade5@gmail.com', '2024-03-05', '2024-03-15', 'Under Processing', '1900'),
(14, 23, 'jane.smith@example.com', '2024-03-20', '2024-03-22', 'Under Processing', '500'),
(15, 13, 'yasser@gmail.com', '2024-04-01', '2024-04-10', 'Under Processing', '2100'),
(27, 18, 'Nadia111@gmail.com', '2024-02-01', '2024-02-04', 'RETURNED', '1200'),
(31, 23, 'saja.hamade5@gmail.com', '2024-02-10', '2024-02-13', 'RETURNED', '1950'),
(33, 23, 'saja.hamade5@gmail.com', '2024-02-22', '2024-02-24', 'RETURNED', '1300');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FED_ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `COMMENT` text NOT NULL,
  `RATING` enum('Excellent','Good','Average','Poor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FED_ID`, `email`, `COMMENT`, `RATING`) VALUES
(1, 'saja.hamade5@gmail.com', 'worth the price\r\n', 'Good'),
(10, 'hanin5@gmail.com', 'I had some Problems in  contacting with you', 'Average'),
(12, 'saja.hamade5@gmail.com', 'outsanding', 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `motorcycle`
--

CREATE TABLE `motorcycle` (
  `ID` int(10) NOT NULL,
  `plate_number` varchar(10) NOT NULL,
  `Brand` varchar(60) NOT NULL,
  `Year` int(11) NOT NULL,
  `engine` int(11) NOT NULL,
  `fuel` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(70) NOT NULL,
  `Available` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motorcycle`
--

INSERT INTO `motorcycle` (`ID`, `plate_number`, `Brand`, `Year`, `engine`, `fuel`, `price`, `image`, `Available`) VALUES
(13, 'M30644', 'Honda CBR1000RR Fireblade', 2022, 999, 'Gasoline', 470, 'honda3.jpg', 'No'),
(17, 'M333', 'Harley Davidson', 2021, 1200, 'Gasoline', 500, 'harley2.jpg', 'No'),
(18, 'M548', 'KTM Freeride E-XC', 2020, 4, 'Electricity', 400, 'e1.jpeg', 'Yes'),
(21, 'M444', 'Honda Goldwing GL1800', 2022, 1833, 'Gasoline', 600, 'honda3.jpg', 'Yes'),
(22, 'M78942', 'Yamaha YZF-R1', 2020, 989, 'Gasoline', 450, 'yamaha2.jpg', 'Yes'),
(23, 'M321', 'Harley Fat Boy', 2021, 1868, 'Gasoline', 650, 'harleyFatBoy.jpg', 'Yes'),
(24, 'M56487', 'Yamaha XT250', 2019, 249, 'Gasoline', 50, 'yamaha3.jpg', 'Yes'),
(27, 'M777', 'Honda', 2023, 1500, 'Gasoline', 450, 'redHonda.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL,
  `BOOK_ID` int(11) NOT NULL,
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` varchar(255) NOT NULL,
  `CVV` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAY_ID`, `BOOK_ID`, `CARD_NO`, `EXP_DATE`, `CVV`, `PRICE`) VALUES
(1, 1, '6759 6498 2643 8453', '12/24', 1254, 1200),
(2, 2, '1234 5678 9123 4567', '12/27', 5454, 800),
(3, 3, '1548 7548 7933 2489', '02/25', 1547, 900),
(4, 4, '3566 0020 2036 0505', '12/29', 4444, 2700),
(5, 5, '3566 0020 2036 0505', '02/25', 5555, 100),
(6, 6, '6759 6498 2643 8453', '12/25', 515, 450),
(7, 7, '5200 8282 8282 8210', '12/25', 1151, 1350),
(8, 8, '3566 0020 2036 0505', '12/25', 1256, 4200),
(9, 9, '6759 6498 2643 8453', '12/25', 1515, 9750),
(10, 10, '6759 6498 2643 8453', '12/25', 5151, 1040),
(11, 11, '5200 8282 8282 8210', '12/25', 5151, 4680),
(12, 12, '6200 0000 0000 0005', '12/25', 1515, 3600),
(13, 13, '6200 0000 0000 0005', '12/25', 1551, 900),
(14, 14, '3566 0020 2036 0505', '12/25', 1515, 21000),
(15, 15, '3566 0020 2036 0505', '12/26', 1848, 3600),
(19, 27, '3566 0020 2036 0505', '12/25', 1254, 1200),
(20, 29, '6759 6498 2643 8453', '12/15', 1548, 1300),
(21, 30, '5200 8282 8282 8210', '12/25', 2548, 2600),
(22, 31, '5200 8282 8282 8210', '12/25', 2545, 1950),
(23, 32, '5200 8282 8282 8210', '12/25', 5484, 1300),
(24, 33, '5200 8282 8282 8210', '12/25', 2554, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `phone`, `rating`, `password`) VALUES
('Bob', 'Johnson', 'bob.johnson@example.com', '5551112233', 5, 'secure789'),
('Hanin', 'Shaito', 'hanin5@gmail.com', '0214589', 5, 'hanin'),
('Jane', 'Smith', 'jane.smith@example.com', '9876543210', 5, 'pass456'),
('Jakson', 'Hinkel', 'jjH@gmail.com', '0124578', 5, 'jajajajaj'),
('John', 'Doe', 'john.doe@example.com', '1234567890', 5, 'password123'),
('Nadia', 'Saab', 'Nadia111@gmail.com', '01478919', 5, 'nadosh'),
('Nour', 'Ghsein', 'Nourrr@gmail.com', '0215789', 5, 'jajajajaj'),
('Saja', 'Hamade', 'saja.hamade5@gmail.com', '0355555', 5, 'saja'),
('Yasser', 'Hamade', 'yasser@gmail.com', '81549762', 5, 'yyyyy'),
('Zahraa', 'Mohammad', 'zahraaMM@gmail.com', '05487912', 5, 'zzzz'),
('Zahraa', 'Srour', 'zahraass@gmail.com', '01458782', 5, 'ssss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `email` (`email`),
  ADD KEY `motor_id` (`motor_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FED_ID`),
  ADD KEY `TEST` (`email`);

--
-- Indexes for table `motorcycle`
--
ALTER TABLE `motorcycle`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD UNIQUE KEY `BOOK_ID` (`BOOK_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `motorcycle`
--
ALTER TABLE `motorcycle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`motor_id`) REFERENCES `motorcycle` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
