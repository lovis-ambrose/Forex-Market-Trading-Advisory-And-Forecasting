-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fname` int(11) NOT NULL,
  `lname` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `cpassword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `f_clients`
--

CREATE TABLE `f_clients` (
  `f_id` int(11) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(120) NOT NULL,
  `c_password` varchar(120) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_clients`
--

INSERT INTO `f_clients` (`f_id`, `fname`, `lname`, `email`, `gender`, `password`, `c_password`, `profile_pic`, `code`) VALUES
(1, 'Kagimu', 'Edward', 'edwardkagimukalungi@gmail.com', 'Male', '316e5457aa130e54367f056968018e60224942df', '316e5457aa130e54367f056968018e60224942df', '', ''),
(3, 'MUJUNI', 'BENARD MAKUBA', 'benardmujuni@gmail.com', 'Male', 'cfe984b19145163d7271bb61a410e0f6b89a9c3a', 'cfe984b19145163d7271bb61a410e0f6b89a9c3a', '', ''),
(4, 'ADONIA', 'AYEBARE', 'ugandaunny@un.int', 'Male', '38ba6df0ad6883b0c16b5b20a24d5ff26b72999c', '38ba6df0ad6883b0c16b5b20a24d5ff26b72999c', '', ''),
(13, 'AGGREY DAVID', 'kibenge', 'agrey@gmail.com', 'Male', 'd0ee7ca89d7be504b075ccce4406712db6d33fd7', 'd0ee7ca89d7be504b075ccce4406712db6d33fd7', '', ''),
(14, 'Geofrey', 'Nabeeta', 'geofrey@gmail.com', 'Male', '4afd0fe6eae248fda189925a0a52c0af40eb1cab', '4afd0fe6eae248fda189925a0a52c0af40eb1cab', '', ''),
(16, 'john', 'Kironde', 'john@gmail.com', 'Male', '8b7f6d7358baeb10399a6f32f21e911e1f74fca6', '8b7f6d7358baeb10399a6f32f21e911e1f74fca6', '', ''),
(17, 'AZALAI', 'ABIDJAN', 'reservationaha@azalaihotels.com', 'Male', '15d2f175d10a479fb47be1bdda06a9e7dcd96d5d', '15d2f175d10a479fb47be1bdda06a9e7dcd96d5d', '', ''),
(19, 'Givious', 'Musimenta', 'givious@gmail.com', 'Male', '92f441113c94452431e109b524595bea7b4e00b7', '92f441113c94452431e109b524595bea7b4e00b7', '', ''),
(20, 'Givious', 'Musimenta', 'givious@gmail.com', 'Male', '92f441113c94452431e109b524595bea7b4e00b7', '92f441113c94452431e109b524595bea7b4e00b7', '', ''),
(21, 'kasibante', 'Moses', 'moses@gmail.com', 'Male', '5bd86e7ccd094e9bd2782c70fbf296f8b8bfe9e4', '5bd86e7ccd094e9bd2782c70fbf296f8b8bfe9e4', '', ''),
(23, 'Gift', 'Tyra', 'gift@gmail.com', 'Male', '956a30b4675b5f641a97e09240622fc83e58bea2', '956a30b4675b5f641a97e09240622fc83e58bea2', '', ''),
(24, 'Kakande', 'Julius', 'julius@gmail.com', 'Male', '10786139397b7e3bad96ebfbfb32212131856d97', '10786139397b7e3bad96ebfbfb32212131856d97', '', ''),
(25, 'Nagawa', 'Rebecca', 'rebecca@gmail.com', 'Female', 'd0854f5c030c747ec0f0fc9813d58a1e3d9148ae', 'd0854f5c030c747ec0f0fc9813d58a1e3d9148ae', '', 'ACC-CAT-V809G'),
(26, 'Nazziwa', 'Rebecca', 'nazziwa@gmail.cpm', 'Female', 'd0854f5c030c747ec0f0fc9813d58a1e3d9148ae', 'd0854f5c030c747ec0f0fc9813d58a1e3d9148ae', '', 'ACC-CAT-LYUX1'),
(27, 'Selugo', 'Derick', 'derick@gmail.com', 'Male', '6ad8b81414a8f9878ac48f0dea06c3ddb86373b4', '6ad8b81414a8f9878ac48f0dea06c3ddb86373b4', '', 'ACC-CAT-9WPD3'),
(28, 'Nankinga', 'Rebecca', 'nankinga@gmail.com', 'Female', 'b02ff86733a622d8eec1facf0a864bf7427de559', 'b02ff86733a622d8eec1facf0a864bf7427de559', '', 'ACC-CAT-QJZN7'),
(29, 'Musinguzi', 'Nelson', 'nelson@gmail.com', 'Male', 'aad7630551c0e5f38d4b3d5db547eeeff54ae088', 'aad7630551c0e5f38d4b3d5db547eeeff54ae088', '', 'ACC-CAT-AQVG0');

-- --------------------------------------------------------

--
-- Table structure for table `f_pips`
--

CREATE TABLE `f_pips` (
  `trip_id` int(11) NOT NULL,
  `destination` varchar(25) NOT NULL,
  `officer_driven` varchar(25) NOT NULL,
  `setoff_date` date NOT NULL,
  `mileage_start` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_pips`
--

INSERT INTO `f_pips` (`trip_id`, `destination`, `officer_driven`, `setoff_date`, `mileage_start`) VALUES
(15, 'New York City', 'Bruce Kanine', '2022-11-03', 1000),
(16, 'Mbarara City', 'Bruce Okello', '2022-11-02', 1000),
(17, 'Mbale stadium', 'Bruce Okello', '2022-11-11', 1000),
(18, 'Kamwenge', 'Bruce Okello', '2022-11-02', 1000),
(19, 'Kyenjojo District', 'Bruce Okello', '2022-11-03', 13000),
(20, 'Kanungu', 'Bruce Okello', '2022-12-14', 5000),
(21, 'Moroto', 'Bruce Okello', '2022-12-19', 60000),
(22, 'Mbarara City', 'john kalinda', '2022-12-08', 1000),
(23, 'Mbale City', 'Bruce Okello', '2022-11-02', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `f_systemsettings`
--

CREATE TABLE `f_systemsettings` (
  `sys_id` int(11) NOT NULL,
  `sys_name` varchar(255) NOT NULL,
  `sys_tagline` varchar(255) NOT NULL,
  `f_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_systemsettings`
--

INSERT INTO `f_systemsettings` (`sys_id`, `sys_name`, `sys_tagline`, `f_desc`) VALUES
(1, 'FMTAF', 'Forex Market Trading Advisory And Forecasting', 'In today\'s fast-paced financial markets');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `f_clients`
--
ALTER TABLE `f_clients`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `f_pips`
--
ALTER TABLE `f_pips`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `f_systemsettings`
--
ALTER TABLE `f_systemsettings`
  ADD PRIMARY KEY (`sys_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_clients`
--
ALTER TABLE `f_clients`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `f_pips`
--
ALTER TABLE `f_pips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `f_systemsettings`
--
ALTER TABLE `f_systemsettings`
  MODIFY `sys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
