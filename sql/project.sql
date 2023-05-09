-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 09:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `ID` varchar(6) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Time_Start` datetime NOT NULL,
  `Time_End` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`ID`, `Name`, `Time_Start`, `Time_End`) VALUES
('CL0001', 'LINDA', '2023-04-18 12:30:23', '2023-04-18 12:30:23'),
('CL0002', 'KEIRA', '2023-04-18 12:31:57', '2023-04-18 12:31:57'),
('CD0001', 'KIM', '2023-04-18 12:32:27', '2023-04-18 12:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event`
--

CREATE TABLE `calendar_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_hour` datetime DEFAULT NULL,
  `event_end_hour` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `calendar_event`
--

INSERT INTO `calendar_event` (`event_id`, `event_name`, `event_start_hour`, `event_end_hour`) VALUES
(9, 'Collector:Keira, Location: Quan 1, Phuong Ben Thanh', '2023-04-28 12:00:00', '2023-04-28 14:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `employee_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `password`, `position`, `email`, `phone`, `state`, `country`, `street`, `employee_image`) VALUES
('p0001', 'Linda', 'admin', 'Collector', 'linda@gmail.com', '234-658-2666', 'California', 'US(United States)', 'Steiner', 'http://localhost/UWC-2.0/img/linda.jpg'),
('p0002', 'Keira', 'admin', 'Janitor', 'keira@gmail.com', '835-658-8375', 'New york', 'US(United States)', 'Time Square', 'http://localhost/UWC-2.0/img/keira.jpg'),
('p0003', 'Tommy', 'admin', 'Janitor', 'tommy@gmail.com', '234-658-2666', 'California', 'US(United States)', '3525 Hershell Hollow Road', 'http://localhost/UWC-2.0/img/tommy.jpg'),
('p0004', 'Yenefer', 'admin', 'Janitor', 'yenefer@gmail.com', '374-638-8876', 'Ohio', 'US(United States)', 'Lombard', 'http://localhost/UWC-2.0/img/yenefer.jpg'),
('p0005', 'Jack', 'admin', 'Collector', 'jack@gmail.com', '296-643-2658', 'Washinton D.C', 'US(United States)', 'Sherlock Home', 'http://localhost/UWC-2.0/img/jack.jpg'),
('p0006', 'Jame', 'admin', 'Collector', 'jame@gmail.com', '944-668-1375', 'Dalas', 'US(United States)', 'Main Street', 'http://localhost/UWC-2.0/img/jame.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `have`
--

CREATE TABLE `have` (
  `employee_id` varchar(255) NOT NULL,
  `mcp_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `have`
--

INSERT INTO `have` (`employee_id`, `mcp_id`) VALUES
('p0001', 'm0001'),
('p0001', 'm0002'),
('p0001', 'm0003'),
('p0002', 'm0005'),
('p0003', 'm0003'),
('p0004', 'm0003');

-- --------------------------------------------------------

--
-- Table structure for table `mcps`
--

CREATE TABLE `mcps` (
  `mcp_id` varchar(255) NOT NULL,
  `mcp_district` varchar(255) NOT NULL,
  `mcp_address` varchar(255) NOT NULL,
  `mcp_manager` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcps`
--

INSERT INTO `mcps` (`mcp_id`, `mcp_district`, `mcp_address`, `mcp_manager`, `capacity`) VALUES
('m0001', 'Quận Thủ Đức', 'Phường Linh Trung', 'Văn Tuấn', '75%'),
('m0002', 'Quận Thủ Đức', 'Phường Linh Tây', 'Quý Nam', '50%'),
('m0003', 'Quận Thủ Đức', 'Phường Linh Xuân', 'Quang An', '100%'),
('m0004', 'Quận Thủ Đức', 'Phường Linh Trung', 'Thành Tuấn', '75%'),
('m0005', 'Quận 1', 'Phường Bến Thành', 'Văn Khải', '50%'),
('m0006', 'Quận 1', 'Phường Bến Nghé', 'Võ Việt', '0%'),
('m0007', 'Quận 1', 'Phường Cầu Ông Lãnh', 'Văn Hoàng', '75%'),
('m0008', 'Quận 1', 'Phường Đa Kao', 'Duy Hoàng', '50%'),
('m0009', 'Quận 3', 'Phường 11', 'Duy An', '0%'),
('m0010', 'Quận 3', 'Phường 12', 'Mạnh Tuấn', '75%'),
('m0011', 'Quận 3', 'Phường 13', 'Quốc Nam', '50%'),
('m0012', 'Quận 3', 'Phường 14', 'Việt An', '50%'),
('m0013', 'Quận 4', 'Phường 1', 'Tiến Đạt', '25%'),
('m0014', 'Quận 4', 'Phường 2', 'Hữu Danh', '75%'),
('m0015', 'Quận 4', 'Phường 3', 'Quốc Trung', '50%'),
('m0016', 'Quận 4', 'Phường 4', 'Văn Khải', '100%');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_district` varchar(255) NOT NULL,
  `route_image` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_district`, `route_image`, `route_name`) VALUES
('Quận Thủ Đức', 'http://localhost/UWC-2.0/img/route/THUDUC_1.jpg', 'THUDUC_ROUTE1'),
('Quận Thủ Đức', 'http://localhost/UWC-2.0/img/route/THUDUC_2.jpg', 'THUDUC_ROUTE2'),
('Quận 1', 'http://localhost/UWC-2.0/img/route/QUAN1_1.jpg', 'QUAN1_ROUTE1'),
('Quận 1', 'http://localhost/UWC-2.0/img/route/QUAN1_2.jpg', 'QUAN1_ROUTE2'),
('Quận 4', 'http://localhost/UWC-2.0/img/route/QUAN4_1.jpg', 'QUAN4_ROUTE1'),
('Quận 4', 'http://localhost/UWC-2.0/img/route/QUAN4_2.jpg', 'QUAN4_ROUTE2'),
('Quận 3', 'http://localhost/UWC-2.0/img/route/QUAN3_1.jpg', 'QUAN3_ROUTE1'),
('Quận 3', 'http://localhost/UWC-2.0/img/route/QUAN3_2.jpg', 'QUAN3_ROUTE2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` varchar(50) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `remaining_amount` int(255) NOT NULL,
  `vehicle_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_name`, `remaining_amount`, `vehicle_image`) VALUES
('37C - 13531', 'ISUZU_10T8', 20, 'http://localhost/UWC-2.0/img/vehicle/car1.png'),
('29H - 47393', 'HYUNDAI_HD260_10T21', 20, 'http://localhost/UWC-2.0/img/vehicle/car2.png'),
('29H - 23771', 'HYUNDAI_PORTER_H150_1T3', 20, 'http://localhost/UWC-2.0/img/vehicle/car3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_event`
--
ALTER TABLE `calendar_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `have`
--
ALTER TABLE `have`
  ADD PRIMARY KEY (`employee_id`,`mcp_id`),
  ADD KEY `fk_have_mcp_id` (`mcp_id`);

--
-- Indexes for table `mcps`
--
ALTER TABLE `mcps`
  ADD PRIMARY KEY (`mcp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_event`
--
ALTER TABLE `calendar_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `have`
--
ALTER TABLE `have`
  ADD CONSTRAINT `fk_have_em_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_have_mcp_id` FOREIGN KEY (`mcp_id`) REFERENCES `mcps` (`mcp_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
