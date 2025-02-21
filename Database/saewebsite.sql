-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 08:36 AM
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
-- Database: `saewebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `departureflightid` int(11) DEFAULT NULL,
  `returnflightid` int(11) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `passengernumber` int(11) DEFAULT NULL,
  `triptype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `departureflightid`, `returnflightid`, `totalprice`, `passengernumber`, `triptype`) VALUES
(1, 8, 20, 1760, 2, ''),
(2, 19, 6, 1470, 3, ''),
(5, 6, NULL, 0, 1, ''),
(6, 2, 24, 1780, 2, ''),
(7, 8, NULL, 0, 1, '0'),
(8, 2, 24, 890, 1, '0'),
(9, 19, 6, 490, 1, 'roundTrip'),
(10, 10, NULL, 0, 2, 'oneWay'),
(11, 4, NULL, 310, 1, 'oneWay'),
(12, 15, NULL, 580, 2, 'oneWay'),
(13, 11, NULL, 640, 2, 'oneWay'),
(14, 11, NULL, 960, 3, 'oneWay'),
(15, 2, 24, 1780, 2, 'roundTrip'),
(16, 19, NULL, 480, 2, 'oneWay'),
(17, 4, NULL, 930, 3, 'oneWay'),
(18, 4, NULL, 930, 3, 'oneWay'),
(19, 15, 18, 760, 2, 'roundTrip'),
(20, 17, NULL, 210, 1, 'oneWay'),
(21, 14, 17, 400, 1, 'roundTrip'),
(25, 21, NULL, 450, 1, 'oneWay'),
(26, 23, NULL, 920, 2, 'oneWay'),
(27, 21, NULL, 450, 1, 'oneWay'),
(28, 22, NULL, 420, 1, 'oneWay'),
(29, 23, NULL, 920, 2, 'oneWay'),
(31, 14, NULL, 380, 2, 'oneWay'),
(32, 15, NULL, 360, 2, 'oneWay'),
(33, 16, NULL, 200, 1, 'oneWay'),
(34, 15, NULL, 360, 2, 'oneWay'),
(35, 14, NULL, 190, 1, 'oneWay'),
(36, 15, 17, 390, 1, 'roundTrip'),
(37, 16, 18, 800, 2, 'roundTrip'),
(38, 22, NULL, 840, 2, 'oneWay'),
(39, 14, 18, 390, 1, 'roundTrip'),
(40, 21, 25, 1740, 2, 'roundTrip'),
(41, 15, 17, 780, 2, 'roundTrip'),
(42, 22, NULL, 840, 2, 'oneWay'),
(43, 22, NULL, 840, 2, 'oneWay'),
(44, 16, NULL, 400, 2, 'oneWay'),
(45, 21, 27, 2760, 3, 'roundTrip'),
(46, 14, 17, 400, 1, 'roundTrip'),
(47, 14, 17, 400, 1, 'roundTrip'),
(48, 14, 17, 400, 1, 'roundTrip'),
(49, 23, NULL, 460, 1, 'oneWay'),
(50, 15, 18, 780, 2, 'roundTrip'),
(51, 16, NULL, 200, 1, 'oneWay'),
(52, 21, 25, 1740, 2, 'roundTrip'),
(53, 33, 34, 580, 1, 'roundTrip');

-- --------------------------------------------------------

--
-- Table structure for table `flightdetails`
--

CREATE TABLE `flightdetails` (
  `scheduledetailid` int(11) NOT NULL,
  `scheduleid` int(11) DEFAULT NULL,
  `flightnumber` varchar(250) DEFAULT NULL,
  `departureairport` varchar(250) DEFAULT NULL,
  `departuredate` varchar(250) DEFAULT NULL,
  `departuretime` varchar(250) DEFAULT NULL,
  `arrivalairport` varchar(250) DEFAULT NULL,
  `arrivaldate` varchar(250) DEFAULT NULL,
  `arrivaltime` varchar(250) DEFAULT NULL,
  `price` int(250) DEFAULT NULL,
  `class` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flightdetails`
--

INSERT INTO `flightdetails` (`scheduledetailid`, `scheduleid`, `flightnumber`, `departureairport`, `departuredate`, `departuretime`, `arrivalairport`, `arrivaldate`, `arrivaltime`, `price`, `class`) VALUES
(14, 1, 'AS801', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-11', '10:30 AM', 'Yangon Airport (Yangon, Myanmar)', '2024-11-11', '12:00 PM', 180, 'Economy'),
(15, 1, 'FL111', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-11', '5:30 AM', 'Yangon Airport (Yangon, Myanmar)', '2024-11-11', '7:00 AM', 190, 'Economy'),
(16, 1, 'BV345', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-11', '6:00 PM', 'Yangon Airport (Yangon, Myanmar)', '2024-11-11', '7:00 PM', 200, 'Economy'),
(17, 1, 'ZQ222', 'Yangon Airport (Yangon, Myanmar)', '2024-11-17', '8:00 PM', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-17', '9:30 PM', 210, 'Economy'),
(18, 1, 'FD999', 'Yangon Airport (Yangon, Myanmar)', '2024-11-17', '9:00 AM', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-17', '10:30 AM', 200, 'Economy'),
(21, 2, 'BB333', 'Kansai Airport (Osaka, Japan)', '2024-11-02', '8:30 PM', 'Soul Airport (Soul, Korea)', '2024-11-02', '11:30 PM', 450, 'Business'),
(22, 2, 'QW245', 'Kansai Airport (Osaka, Japan)', '2024-11-02', '12:00 PM', 'Soul Airport (Soul, Korea)', '2024-11-02', '3:00 PM', 420, 'Business'),
(23, 2, 'FG111', 'Haneda Airport (Tokyo, Japan)', '2024-11-02', '5:30 AM', 'Soul Airport (Soul, Korea)', '2024-11-02', '8:30 AM', 460, 'Business'),
(24, 2, 'FL234', 'Soul Airport (Soul, Korea)', '2024-11-07', '7:30 AM', 'Haneda Airport (Tokyo, Japan)', '2024-11-07', '10:30 AM', 440, 'Business'),
(25, 2, 'AS901', 'Soul Airport (Soul, Korea)', '2024-11-07', '3:00 PM', 'Kansai Airport (Osaka, Japan)', '2024-11-07', '6:00 PM', 420, 'Business'),
(26, 2, 'AS345', 'Soul Airport (Soul, Korea)', '2024-11-07', '2:00 PM', 'Haneda Airport (Tokyo, Japan)', '2024-11-07', '5:00 PM', 490, 'Business'),
(27, 2, 'KK456', 'Soul Airport (Soul, Korea)', '2024-11-07', '10:00 AM', 'Kansai Airport (Osaka, Japan)', '2024-11-07', '1:00 PM', 470, 'Business'),
(31, 3, 'XX9999', 'Kuala Lumpur Airport (Kuala Lumpur, Malaysia)', '2024-11-08', '5:30 AM', 'Juanda International Airport (Surabaya, Indonesia)', '2024-11-08', '8:00AM', 300, 'Economy'),
(32, 3, 'JJ6544', 'Juanda International Airport (Surabaya, Indonesia)', '2024-11-13', '10:00 AM', 'Kuala Lumpur Airport (Kuala Lumpur, Malaysia)', '2024-11-13', '1:00 PM', 290, 'Economy'),
(33, 4, 'AS901', 'Vientiane (Wattay International Airport, Lao)', '2024-11-10', '12:30 PM', 'Phnom Penh (Phnom Penh Airport, Cambodia)', '2024-11-10', '2:00 PM', 300, 'Economy'),
(34, 4, 'FL123', 'Phnom Penh (Phnom Penh Airport, Cambodia)', '2024-11-15', '8:30 PM', 'Vientiane (Wattay International Airport, Lao)', '2024-11-15', '11:30 PM', 280, 'Economy'),
(36, 5, 'CH2222', 'Beijing International Airport (Beijing, China)', '2024-11-18', '12:30 PM', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-18', '3:00 PM', 460, 'Business'),
(37, 5, 'AS901', '	Beijing International Airport (Beijing, China)', '2024-11-18', '10:00 AM', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-18', '1:00 PM', 430, 'Business'),
(38, 5, 'WE7777', 'Suvarnabhumi Airport (Bangkok, Thailand)', '2024-11-20', '10:00 AM', '	Beijing International Airport (Beijing, China)', '2024-11-20', '2:00 PM', 410, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `flightschedules`
--

CREATE TABLE `flightschedules` (
  `scheduleid` int(11) NOT NULL,
  `airline` varchar(100) DEFAULT NULL,
  `capacity` varchar(100) DEFAULT NULL,
  `flightroute` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flightschedules`
--

INSERT INTO `flightschedules` (`scheduleid`, `airline`, `capacity`, `flightroute`) VALUES
(1, 'MAI', '100 Seats', 'Myanmar, Thailand, Singapore '),
(2, 'AirAsia ', '120 Seats', 'Japan, Korea, China'),
(3, 'JetStream', '100 Seats', 'Malaysia, Thailand, Indonesia'),
(4, 'Horizon Airways', '90 Seats', 'Laos, Cambodia'),
(5, 'Fly China', '80 seats', 'China, Thailand, Korea, Japan'),
(9, 'Test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `passengersinfo`
--

CREATE TABLE `passengersinfo` (
  `passengerdetailId` int(11) NOT NULL,
  `bookingid` int(11) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `passportno` varchar(100) DEFAULT NULL,
  `issuedate` date DEFAULT NULL,
  `expireddate` date DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `countrycode` varchar(100) NOT NULL,
  `phnumber` int(11) NOT NULL,
  `meals` varchar(100) DEFAULT NULL,
  `passengertype` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengersinfo`
--

INSERT INTO `passengersinfo` (`passengerdetailId`, `bookingid`, `title`, `firstname`, `middlename`, `lastname`, `dateofbirth`, `nationality`, `passportno`, `issuedate`, `expireddate`, `email`, `countrycode`, `phnumber`, `meals`, `passengertype`) VALUES
(1, 16, 'Mr', 'zaw', 'win', 'dd', '2024-09-13', 'Bahamas', 'D1111', '2024-09-26', '2024-09-18', '', '', 0, 'Regular Meal', 'adult'),
(2, 16, 'Mr', 'zaw', 'win', 'dd', '2024-09-13', 'Bahamas', 'D1111', '2024-09-26', '2024-09-18', '', '', 0, 'Regular Meal', 'adult'),
(3, 16, '0', 'test', 'test', 'test', '2024-09-20', 'Bahrain', 'MF11111', '2024-09-20', '2024-09-11', '', '', 0, 'Baby Meal', 'infant'),
(5, 17, 'Mr', 'for', 'for', 'test', '2024-09-27', 'Bahrain', 'aaaa', '2024-09-25', '2024-09-25', '', '', 0, 'Diabetic Meal', 'adult'),
(7, 17, 'Mrs', 'hnin', NULL, 'aye', '2024-09-21', 'Austria', '2222', '2024-09-20', '2024-09-25', '', '', 0, 'Vegetarian Meal', 'child'),
(8, 17, 'Mrs', 'last', 'time', 'testing', '2024-09-20', 'Bahamas', 'qqqq', '2024-09-19', '2024-09-24', '', '', 0, '0', 'infant'),
(9, 17, 'Mrs', 'last', 'time', 'testing', '2024-09-20', 'Bahamas', 'qqqq', '2024-09-19', '2024-09-24', '', '', 0, '0', 'infant'),
(10, 17, 'Mr', 'kyaw', 'kyaw', 'lay', '2024-09-12', '0', '2222', '2024-09-26', '2024-09-26', '', '', 0, 'Vegetarian Meal', 'infant'),
(11, 17, 'Mr', 'gg', 'gg', 'gg', '2024-09-27', 'Czech Republic', 'qqqq', '2024-09-18', '2024-09-26', '', '', 0, '0', 'infant'),
(12, 18, 'Mrs', 'ss', 'ss', 'ss', '2024-09-02', '0', 'ss', '2024-10-03', '2024-09-26', '', '', 0, 'Regular Meal', 'adult'),
(13, 18, '0', 'zz', 'zz', 'zz', '2024-09-21', 'Bahamas', 'zz', '2024-09-27', '2024-09-27', '', '', 0, 'Regular Meal', 'adult'),
(14, 18, 'Mr', 'test', '1', '1', '2024-09-20', 'Bahrain', '1', '2024-09-28', '2024-09-26', '', '', 0, 'Hindu Meal', 'adult'),
(15, 18, 'Mr', 'try', 'try', 'try', '2024-09-28', 'Bahrain', 'try', '2024-09-27', '2024-09-28', '', '', 0, 'Diabetic Meal', 'adult'),
(16, 18, 'Mrs', 'fortry', 'fortry', 'fortry', '2024-09-02', 'Bahrain', '2222fortry', '2024-09-01', '2024-09-02', '', '', 0, 'Vegetarian Meal', 'child'),
(17, 18, 'Mrs', 'c', 'c', 'c', '2024-09-27', 'Hong Kong', 'cccff', '2024-09-20', '2024-09-25', '', '', 0, 'Baby Meal', 'infant'),
(19, 19, 'Mrs', 'Vam', NULL, 'testing', '2024-09-26', 'Bahrain', '2222', '2024-09-26', '2024-10-02', '', '', 0, 'Baby Meal', 'child'),
(20, 20, 'Mr', 'ZAw', NULL, 'zaw', '2024-09-27', 'Azerbaijan', 'aaaa', '2024-09-19', '2024-09-24', '', '', 0, 'Hindu Meal', 'adult'),
(26, 26, 'Mrs', 'd', 'd', 'd', '2024-10-05', 'Afghanistan', 'd', '2024-09-19', '2024-09-12', '', '', 0, 'Vegetarian Meal', 'adult'),
(27, 27, 'Mrs', 'rt', 'rt', 'rt', '2024-09-27', 'Egypt', 'rrt', '2024-09-19', '2024-08-27', '', '', 0, 'Baby Meal', 'adult'),
(28, 28, 'Mrs', 'a', 'a', 'a', '2024-09-27', 'Georgia', 'MF11111', '2024-09-26', '2024-09-25', '', '', 0, 'Diabetic Meal', 'adult'),
(29, 29, 'Mrs', 'q', 'q', 'q', '2024-10-03', 'Azerbaijan', 'q', '2024-09-27', '2024-09-16', '', '', 0, 'Baby Meal', 'adult'),
(30, 29, 'Mrs', 'o', 'o', 'o', '2024-09-20', 'Liberia', 'o', '2024-10-05', '2024-09-27', '', '', 0, 'Baby Meal', 'child'),
(31, 32, 'Mrs', 'hnin', 'hnin', 'hnin', '2024-09-20', 'Georgia', '12w33', '2024-09-27', '2024-09-26', '', '', 0, 'Hindu Meal', 'adult'),
(32, 32, 'Mrs', 'child', 'child', 'child', '2024-10-04', 'Austria', 'child', '2024-09-27', '2024-09-28', '', '', 0, 'Regular Meal', 'child'),
(33, 34, 'Mrs', 'win', 'win', 'win', '2024-09-27', 'Bangladesh', 'ss', '2024-09-28', '2024-09-20', '', '', 0, 'Hindu Meal', 'adult'),
(34, 34, 'Mrs', 's', 's', 's', '2024-09-27', 'Azerbaijan', 's', '2024-09-27', '2024-09-26', '', '', 0, 'Vegetarian Meal', 'child'),
(35, 35, 'Mr', 'zaw', 'test', '1', '2024-09-04', 'Cuba', 'qqqq', '2024-09-26', '2024-09-27', '', '', 0, 'Regular Meal', 'adult'),
(36, 36, 'Mr', 'dota', 'dota', 'dota', '2024-09-27', 'Congo', 'dota1111', '2024-09-28', '2024-09-20', '', '', 0, 'Baby Meal', 'adult'),
(37, 37, 'Mr', 'ko', NULL, 'phyo', '2024-10-04', 'Afghanistan', '111', '2024-09-27', '2024-09-26', '', '', 0, 'Diabetic Meal', 'child'),
(38, 37, 'Mr', 'htoo', 'htoo', 'htoo', '2024-10-03', 'Bahamas', 'htoo111', '2024-09-27', '2024-09-25', '', '', 0, 'Vegetarian Meal', 'infant'),
(39, 38, 'Mr', 'Lei', 'yin', 'yin', '2024-09-19', 'Russian Federation', 'GG9999', '2024-09-26', '2024-09-26', '', '', 0, 'Diabetic Meal', 'child'),
(40, 38, 'Mr', 'win', 'zaw', 'zaw', '2024-09-19', 'Bahrain', 'FF9999', '2024-10-04', '2024-09-24', '', '', 0, 'Baby Meal', 'infant'),
(41, 39, 'Mr', 'Aung', 'Thu', 'Ta', '2024-09-26', 'Azerbaijan', 'D1111', '2024-09-25', '2024-09-24', '', '', 0, 'Hindu Meal', 'adult'),
(42, 39, 'Mrs', 'ss', 'ss', 'ss', '2024-09-26', 'Bahamas', 'ss', '2024-10-02', '2024-10-01', '', '', 0, 'Diabetic Meal', 'adult'),
(43, 39, 'Mrs', 'pouu', 'pouu', 'pouu', '2024-09-26', 'Bahrain', 'MF11111', '2024-09-19', '2024-09-19', 'test@gmail.com', '+31', 1111111, 'Hindu Meal', 'adult'),
(44, 40, 'Mrs', 'baby', NULL, 'baby', '2024-09-26', 'Japan', 'MF11111', '2024-09-19', '2024-09-19', 'test@gmail.com', '+43', 45676543, 'Baby Meal', 'child'),
(45, 40, 'Mr', 'daw', '2', '2', '2024-09-27', 'Australia', '2', '2024-09-13', '2024-09-17', 'test@gmail.com', '+47', 999999999, 'Diabetic Meal', 'infant'),
(46, 40, 'Mrs', '66', '66', '66', '2024-09-25', 'Azerbaijan', '66', '2024-09-18', '2024-09-18', 'zawminp@gmail.com', '+62', 66666, 'Diabetic Meal', 'infant'),
(47, 41, 'Mrs', 'test9', '9', '9', '2024-10-03', 'Estonia', '9', '2024-09-26', '2024-09-12', '9', '+61', 99, 'Vegetarian Meal', 'adult'),
(48, 41, 'Mr', 'tt', 'tt', 'tt', '2024-09-26', 'Bangladesh', 't', '2024-09-26', '2024-09-26', 'test@gmail.com', '+91', 55, 'Baby Meal', 'child'),
(49, 41, 'Mrs', 'rrrocker', 'rrrocker', 'rrrocker', '2024-09-28', 'Bahrain', 'ff444', '2024-09-05', '2024-08-27', 'test@gmail.com', '+64', 66, 'Diabetic Meal', 'child'),
(50, 42, 'Mrs', 'ss', 'sss', 'ss', '2024-09-19', 'Australia', 'ss', '2024-09-18', '2024-09-18', 'ss', '+91', 33, 'Diabetic Meal', 'child'),
(51, 42, 'Mrs', 'ddd', 'dd', 'dd', '2024-09-27', 'Bahamas', 'dd', '2024-09-05', '2024-08-27', 'dd', '+31', 444, 'Vegetarian Meal', 'infant'),
(52, 42, 'Mrs', 'ee', 'ee', 'ee', '2024-10-04', 'Bahrain', 'ee', '2024-08-29', '2024-08-27', 'ee', '+91', 1, 'Hindu Meal', 'infant'),
(53, 43, 'Mrs', 'Zaw ', 'Min', 'Phyo', '2024-09-20', 'France', 'NB21234', '2024-09-19', '2024-09-11', 'zawminp@gmail.com', '+47', 98765432, 'Regular Meal', 'child'),
(54, 43, 'Mrs', 'Ni', 'Ni', 'Zaw', '2024-09-26', 'Bangladesh', 'MF11111', '2024-09-18', '2024-09-18', 'aung@gmail.com', '+52', 34556777, 'Diabetic Meal', 'infant'),
(55, 43, 'Mrs', 'Rosi', 'Pai', 'Ko', '2024-10-02', 'Canada', 'E44444', '2024-09-26', '2024-09-25', 'zawminp2003@gmail.com', '+43', 11111, 'Vegetarian Meal', 'infant'),
(56, 43, 'Mr', 'Joker', 'May', 'lay', '2024-10-04', 'Barbados', 'EE33333', '2024-09-19', '2024-09-26', 'aung@gmail.com', '+91', 33333, 'Hindu Meal', 'infant'),
(57, 43, 'Mr', 'Zaw ', NULL, 'Phyo', '2024-09-28', 'Azerbaijan', 'MF312118', '2024-09-17', '2024-09-25', 'zawminp@gmail.com', '+62', 33, 'Regular Meal', 'infant'),
(58, 44, 'Mr', 'Kyaw', 'Lwin', 'Moe', '2024-09-27', 'Portugal', 'DE234544', '2024-09-12', '2024-09-11', 'zawminp@gmail.com', '+64', 988888888, 'Regular Meal', 'adult'),
(59, 44, 'Mrs', 'Daw', 'Eain', 'Mar', '2024-09-26', 'Cuba', 'MF11111', '2024-09-19', '2024-09-19', 'zawminp@gmail.com', '+47', 222344532, 'Baby Meal', 'child'),
(60, 45, 'Mr', 'Jame', NULL, 'joe', '2024-09-25', 'Egypt', 'FD111111', '2024-09-05', '2024-09-20', 'test@gmail.com', '+86', 2334455, 'Regular Meal', 'adult'),
(61, 45, 'Mrs', 'Rose', 'Jon', 'Daw', '2024-10-04', 'Bangladesh', 'MF11111', '2024-09-12', '2024-09-19', 'test@gmail.com', '+43', 111, 'Diabetic Meal', 'child'),
(62, 45, 'Mrs', 'Baby', NULL, 'Ko', '2024-08-29', 'Hong Kong', 'QQ233445', '2024-09-20', '2024-09-11', '1111@gmail.comm', '+64', 111, 'Baby Meal', 'infant'),
(63, 45, 'Mrs', 'CI', NULL, 'Phyo', '2024-09-26', 'American Samoa', 'SS2222', '2024-09-12', '2024-09-19', '111@gmail.com', '+91', 0, 'Hindu Meal', 'infant'),
(64, 46, 'Mr', 'Do', 'Do', 'Saw', '2024-09-19', 'Bangladesh', 'MF11111', '2024-09-04', '2024-09-04', 'aung@gmail.com', '+44', 11, 'Hindu Meal', 'adult'),
(65, 46, 'Mr', 'test', 'test', '1', '2024-09-27', 'Barbados', 'ss', '2024-09-19', '2024-09-11', '111@gmail.com', '+62', 2, 'Hindu Meal', 'adult'),
(66, 48, 'Mrs', 'Daw', 'Fwqe', 'Di', '2024-10-04', 'Argentina', 'aaaa', '2024-09-28', '2024-09-26', '1111@gmail.comm', '+91', 55555, 'Diabetic Meal', 'adult'),
(67, 49, 'Mr', 'Phoo', 'Joe', 'Ehw', '2024-09-25', 'Dominican Republic', 'NH11111', '2024-09-06', '2024-08-28', 'Phoo@gmail.com', '+91', 1111, 'Hindu Meal', 'adult'),
(68, 50, 'Mr', 'Sandi', 'Zaw', 'Myint', '2024-09-11', 'American Samoa', 'DD1111', '2024-09-27', '2024-09-26', 'sandi@gmail.com', '+31', 11, 'Baby Meal', 'adult'),
(69, 50, 'Mrs', 'Hnin', 'Hnin', 'win', '2024-09-18', 'Bangladesh', 'SQ22222', '2024-09-12', '2024-08-29', 'Hnin2@gmail.com', '+62', 111, 'Hindu Meal', 'child'),
(70, 51, 'Mr', 'aye', NULL, 'aye', '2024-09-04', 'Aruba', 'MF11111', '2024-09-05', '2024-08-28', 'aung@gmail.com', '+62', 11, 'Hindu Meal', 'adult'),
(71, 51, 'Mrs', 'gorge', 'test', 'gorge', '2024-10-15', 'French Polynesia', 'qqqq22', '2024-10-18', '2024-10-10', 'zawminp@gmail.com', '+91', 111, 'Baby Meal', 'adult'),
(72, 52, 'Mrs', 'Cow', 'joe', 'Ko', '2024-10-23', 'Bahamas', 'D1111', '2024-10-22', '2024-10-22', 'cow@gmail.com', '+62', 1111111111, 'Hindu Meal', 'adult'),
(73, 52, 'Mr', 'Xi', 'Ui', 'oo', '2024-10-23', 'Cayman Islands', 'MF11111', '2024-10-23', '2024-10-15', 'test@gmail.com', '+47', 2147483647, 'Hindu Meal', 'infant'),
(74, 53, 'Mrs', 'phoo', 'hnin', 'way', '2024-10-24', 'Congo, the Democratic Republic of the', 'we2222', '2024-11-01', '2024-10-18', 'aung@gmail.com', '+62', 111, 'Diabetic Meal', 'adult');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `bookingid` int(11) DEFAULT NULL,
  `CardNumber` varchar(16) DEFAULT NULL,
  `CardExpiryDate` varchar(100) DEFAULT NULL,
  `CCV` int(11) DEFAULT NULL,
  `cardHolderName` varchar(100) DEFAULT NULL,
  `bankname` varchar(100) DEFAULT NULL,
  `accountno` int(11) DEFAULT NULL,
  `swiftcode` varchar(100) DEFAULT NULL,
  `AccHolderName` varchar(100) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `paymentOption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `bookingid`, `CardNumber`, `CardExpiryDate`, `CCV`, `cardHolderName`, `bankname`, `accountno`, `swiftcode`, `AccHolderName`, `totalprice`, `paymentOption`) VALUES
(1, 37, NULL, '2024-07', 111, '111', 'HSBC', 111, '111', 'zaw', 800, '0'),
(2, 37, NULL, NULL, NULL, NULL, 'Deutsche Bank', 222, '222', 'daw', 800, '0'),
(3, 37, '56565', '2024-06', 555, 'win', NULL, NULL, NULL, NULL, 800, '0'),
(4, 37, NULL, NULL, NULL, NULL, 'Citibank', 123456, '1111hh', 'Kyaw Zaw', 800, 'banking'),
(5, 37, '11111122', '2024-01', 222, 'Zaw Min', NULL, NULL, NULL, NULL, 800, 'card'),
(6, 37, NULL, NULL, NULL, NULL, 'HSBC', 345677, '8888', '8888', 800, 'banking'),
(7, 38, NULL, NULL, NULL, NULL, 'DBS', 11111, '111', '111', 840, 'banking'),
(8, 39, '222222222', '2024-06', 2222, 'Zaw', NULL, NULL, NULL, NULL, 390, 'card'),
(9, 42, NULL, NULL, NULL, NULL, 'MUFG', 222222, '111', 'zaw', 840, 'banking'),
(10, 42, '11', '2024-03', 11, '11', NULL, NULL, NULL, NULL, 840, 'card'),
(11, 43, '11', '2024-06', 11, '11', NULL, NULL, NULL, NULL, 840, 'card'),
(12, 43, '11', '2024-10', 11, '11', NULL, NULL, NULL, NULL, 840, 'card'),
(13, 43, '222', '2024-10', 222, 'daw', NULL, NULL, NULL, NULL, 840, 'card'),
(14, 43, '222', '2024-10', 333, 'Hnin', NULL, NULL, NULL, NULL, 840, 'card'),
(15, 43, '111', '2024-06', 1, '1', NULL, NULL, NULL, NULL, 840, 'card'),
(16, 43, '66', '2024-10', 66, '66', NULL, NULL, NULL, NULL, 840, 'card'),
(17, 43, NULL, NULL, NULL, NULL, 'MUFG', 222, 'ww', 'ww', 840, 'banking'),
(18, 43, '111', '2024-11', 11, '11', NULL, NULL, NULL, NULL, 840, 'card'),
(19, 43, NULL, NULL, NULL, NULL, 'OCBC Bank', 111, '22222', 'daw', 840, 'banking'),
(20, 44, NULL, NULL, NULL, NULL, 'UOB', 111, '111', 'Daw', 400, 'banking'),
(21, 45, NULL, NULL, NULL, NULL, 'Bangkok Bank', 222, '1111hh', 'Kyaw Zaw', 2760, 'banking'),
(22, 45, '3', '2024-07', 2, 'Zaw', NULL, NULL, NULL, NULL, 2760, 'card'),
(23, 46, '1', '2024-10', 1, 'win', NULL, NULL, NULL, NULL, 400, 'card'),
(24, 46, '1', '2024-10', 1, '1', NULL, NULL, NULL, NULL, 400, 'card'),
(25, 48, NULL, NULL, NULL, NULL, 'DBS Bank', 0, '8888', 'daw', 400, 'banking'),
(26, 49, '1', '2024-06', -1, 'Zaw Min', NULL, NULL, NULL, NULL, 460, 'card'),
(27, 50, '1', '2024-11', 1, 'Zaw Min', NULL, NULL, NULL, NULL, 780, 'card'),
(28, 51, NULL, '2024-07', 1111, 'Zaw', NULL, NULL, NULL, NULL, 200, 'card'),
(29, 51, '4', NULL, 1111, 'Zaw', NULL, NULL, NULL, NULL, 200, 'card'),
(30, 51, NULL, NULL, NULL, NULL, 'HSBC', 222, '8888', 'a', 200, 'banking'),
(31, 51, '1', '2024-03', 1, '11', NULL, NULL, NULL, NULL, 200, 'card'),
(32, 52, '9999999999', '2024-06', 11, 'CowJoehi', NULL, NULL, NULL, NULL, 1740, 'card'),
(33, 53, '3', '2024-11', 111, '111', NULL, NULL, NULL, NULL, 580, 'card');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneno` int(11) DEFAULT NULL,
  `regions` varchar(50) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phoneno`, `regions`, `gender`, `dob`, `role`) VALUES
(1, 'kyawHein', '$2y$10$Eaw0Qe74LeaUnQ.XEJNKB.RLGyYqHFja.CYguYRB9S2KSYg15DaW2', 'test@gmail.com', 9111111, 'Ethiopia', 'Male', '2003-03-20', 'user'),
(2, 'admin', '$2y$10$5d0rq7ZUVdaqlbOb2Wl./.hK7Q6rwojCyvLQSPsHiRRTY.TYtntde', 'admin3@gmail.com', 9877777, 'Myanmar', '', '', 'admin'),
(4, 'zaw7', '$2y$10$pzPr8faqglNGOV1vL0HN7OPph2yhDWktLlxlMSGo08RQqSkk7zcZG', 'test@gmail.com', 9876546, 'Cameroon', 'Male', '2016-02-19', 'user'),
(7, 'Nolan', '$2y$10$1ufGrGuaFoiNWtfGicGCN.1Z4SmkYSU4JcTqDdXLXcYSLjXkYgive', 'nolan@gmail.com', 88888, 'Brazil', 'Undefined', '2024-11-15', 'user'),
(8, 'rose', '$2y$10$7RXlg0fK0/jeV7fQb39z..1v2vmYgQckMgpjCiJNauzWLACGLjUsa', '1111@gmail.comm', 111, 'Hungary', 'Female', '2024-09-24', 'user'),
(10, 'ForDee', '$2y$10$JhtytPWdWqOCBFsPDNWnv.UzQZKZdPYRriHVEq1Sm7neSRHVMG33O', 'fordee@gmail.com', 1111, 'Armenia', 'Male', '2024-10-23', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `flightdetails`
--
ALTER TABLE `flightdetails`
  ADD PRIMARY KEY (`scheduledetailid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Indexes for table `flightschedules`
--
ALTER TABLE `flightschedules`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `passengersinfo`
--
ALTER TABLE `passengersinfo`
  ADD PRIMARY KEY (`passengerdetailId`),
  ADD KEY `bookingid` (`bookingid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `bookingid` (`bookingid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `flightdetails`
--
ALTER TABLE `flightdetails`
  MODIFY `scheduledetailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `flightschedules`
--
ALTER TABLE `flightschedules`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passengersinfo`
--
ALTER TABLE `passengersinfo`
  MODIFY `passengerdetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flightdetails`
--
ALTER TABLE `flightdetails`
  ADD CONSTRAINT `flightdetails_ibfk_1` FOREIGN KEY (`scheduleid`) REFERENCES `flightschedules` (`scheduleid`);

--
-- Constraints for table `passengersinfo`
--
ALTER TABLE `passengersinfo`
  ADD CONSTRAINT `passengersinfo_ibfk_1` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
