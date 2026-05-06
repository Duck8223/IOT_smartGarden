-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `password_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`, `password_text`) VALUES
(1, 'Vườn Thông Minh', 'admin@dht.com', '615514bf0ef4b28d4c7cf730af49544f', '987tam123');

-- --------------------------------------------------------

--
-- Table structure for table `light`
--

CREATE TABLE `light` (
  `id` int(10) NOT NULL,
  `light_value` varchar(255) NOT NULL,
  `light_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `light`
--

INSERT INTO `light` (`id`, `light_value`, `light_time`) VALUES
(574, '35.0', '2023-12-08 11:13:55'),
(575, '35.0', '2023-12-08 11:14:00'),
(576, '35.0', '2023-12-08 11:14:05'),
(577, '35.0', '2023-12-08 11:14:09'),
(578, '35.0', '2023-12-08 11:14:16'),
(579, '35.0', '2023-12-08 11:14:21'),
(580, '35.0', '2023-12-08 11:14:26'),
(581, '35.0', '2023-12-08 11:14:31'),
(582, '35.0', '2023-12-08 11:14:36'),
(583, '35.0', '2023-12-08 11:14:41'),
(584, '75.0', '2023-12-08 11:18:51'),
(585, '75.0', '2023-12-08 11:18:56'),
(586, '75.0', '2023-12-08 11:19:05'),
(587, '75.0', '2023-12-08 11:19:10'),
(588, '75.0', '2023-12-08 11:19:15'),
(589, '75.0', '2023-12-08 11:19:20'),
(590, '75.0', '2023-12-08 11:19:24'),
(591, '75.0', '2023-12-08 11:19:29'),
(592, '75.0', '2023-12-08 11:20:55'),
(593, '75.0', '2023-12-08 11:21:00'),
(594, '75.0', '2023-12-08 11:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `moisture`
--

CREATE TABLE `moisture` (
  `id` int(10) NOT NULL,
  `moisture_value` varchar(255) NOT NULL,
  `moisture_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moisture`
--

INSERT INTO `moisture` (`id`, `moisture_value`, `moisture_time`) VALUES
(574, '25.0', '2023-12-08 11:13:55'),
(575, '25.0', '2023-12-08 11:14:00'),
(576, '25.0', '2023-12-08 11:14:05'),
(577, '25.0', '2023-12-08 11:14:09'),
(578, '25.0', '2023-12-08 11:14:16'),
(579, '25.0', '2023-12-08 11:14:21'),
(580, '25.0', '2023-12-08 11:14:26'),
(581, '25.0', '2023-12-08 11:14:31'),
(582, '25.0', '2023-12-08 11:14:36'),
(583, '25.0', '2023-12-08 11:14:41'),
(584, '100.0', '2023-12-08 11:18:51'),
(585, '100.0', '2023-12-08 11:18:56'),
(586, '100.0', '2023-12-08 11:19:05'),
(587, '100.0', '2023-12-08 11:19:10'),
(588, '100.0', '2023-12-08 11:19:15'),
(589, '100.0', '2023-12-08 11:19:20'),
(590, '100.0', '2023-12-08 11:19:24'),
(591, '100.0', '2023-12-08 11:19:29'),
(592, '21.0', '2023-12-08 11:20:55'),
(593, '21.0', '2023-12-08 11:21:00'),
(594, '24.0', '2023-12-08 11:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `rain`
--

CREATE TABLE `rain` (
  `id` int(10) NOT NULL,
  `rain_value` int(255) NOT NULL,
  `rain_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rain`
--

INSERT INTO `rain` (`id`, `rain_value`, `rain_time`) VALUES
(570, 36, '2023-12-08 11:13:55'),
(571, 36, '2023-12-08 11:14:00'),
(572, 36, '2023-12-08 11:14:05'),
(573, 36, '2023-12-08 11:14:09'),
(574, 36, '2023-12-08 11:14:16'),
(575, 36, '2023-12-08 11:14:21'),
(576, 36, '2023-12-08 11:14:26'),
(577, 36, '2023-12-08 11:14:31'),
(578, 36, '2023-12-08 11:14:36'),
(579, 36, '2023-12-08 11:14:41'),
(580, 72, '2023-12-08 11:18:51'),
(581, 72, '2023-12-08 11:18:56'),
(582, 72, '2023-12-08 11:19:05'),
(583, 72, '2023-12-08 11:19:10'),
(584, 72, '2023-12-08 11:19:15'),
(585, 72, '2023-12-08 11:19:20'),
(586, 72, '2023-12-08 11:19:24'),
(587, 72, '2023-12-08 11:19:29'),
(588, 18, '2023-12-08 11:20:55'),
(589, 18, '2023-12-08 11:21:00'),
(590, 18, '2023-12-08 11:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `temperature`
--

CREATE TABLE `temperature` (
  `id` int(10) NOT NULL,
  `temperature_value` varchar(255) NOT NULL,
  `temperature_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temperature`
--

INSERT INTO `temperature` (`id`, `temperature_value`, `temperature_time`) VALUES
(526, '65.5', '2023-12-08 11:13:55'),
(527, '65.5', '2023-12-08 11:14:00'),
(528, '65.5', '2023-12-08 11:14:05'),
(529, '65.5', '2023-12-08 11:14:09'),
(530, '65.5', '2023-12-08 11:14:16'),
(531, '65.5', '2023-12-08 11:14:21'),
(532, '65.5', '2023-12-08 11:14:26'),
(533, '65.5', '2023-12-08 11:14:31'),
(534, '65.5', '2023-12-08 11:14:36'),
(535, '65.5', '2023-12-08 11:14:41'),
(536, '65.5', '2023-12-08 11:18:51'),
(537, '65.5', '2023-12-08 11:18:56'),
(538, '65.5', '2023-12-08 11:19:05'),
(539, '65.5', '2023-12-08 11:19:10'),
(540, '65.5', '2023-12-08 11:19:15'),
(541, '65.5', '2023-12-08 11:19:20'),
(542, '65.5', '2023-12-08 11:19:24'),
(543, '65.5', '2023-12-08 11:19:29'),
(544, '65.5', '2023-12-08 11:20:55'),
(545, '65.5', '2023-12-08 11:21:00'),
(546, '65.5', '2023-12-08 11:22:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `light`
--
ALTER TABLE `light`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moisture`
--
ALTER TABLE `moisture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rain`
--
ALTER TABLE `rain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `light`
--
ALTER TABLE `light`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `moisture`
--
ALTER TABLE `moisture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `rain`
--
ALTER TABLE `rain`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT for table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=547;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
