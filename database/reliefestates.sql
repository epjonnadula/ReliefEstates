-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 07:44 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reliefestates`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`) VALUES
('Ravi Teja', '114cs0123', '0123'),
('Eshwar Prithvi', '714cs1038', '9297');

-- --------------------------------------------------------

--
-- Table structure for table `citiestable`
--

CREATE TABLE `citiestable` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `sname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citiestable`
--

INSERT INTO `citiestable` (`cid`, `cname`, `sname`) VALUES
(101, 'Visakhapatnam', 'Andhra Pradesh'),
(102, 'Vijayawada', 'Andhra Pradesh'),
(201, 'Itanagar', 'Arunachal Pradesh'),
(301, 'Guwahati', 'Assam'),
(401, 'Patna', 'Bihar'),
(501, 'Raipur', 'Chhattisgarh'),
(601, 'Panaji', 'Goa'),
(701, 'Ahmedabad', 'Gujarat'),
(702, 'Surat', 'Gujarat'),
(703, 'Vadodara', 'Gujarat'),
(704, 'Rajkot', 'Gujarat'),
(801, 'Faridabad', 'Haryana'),
(802, 'Chandigarh', 'Haryana'),
(901, 'Shimla', 'Himachal Pradesh'),
(1001, 'Srinagar', 'Jammu and Kashmir'),
(1101, 'Dhanbad', 'Jharkhand'),
(1102, 'Ranchi', 'Jharkhand'),
(1201, 'Bangalore', 'Karnataka'),
(1202, 'Mangalore', 'Karnataka'),
(1301, 'Thiruvananthapuram', 'Kerala'),
(1302, 'Kochi', 'Kerala'),
(1401, 'Indore', 'Madhya Pradesh'),
(1402, 'Bhopal', 'Madhya Pradesh'),
(1403, 'Jabalpur', 'Madhya Pradesh'),
(1404, 'Gwalior', 'Madhya Pradesh'),
(1501, 'Mumbai', 'Maharashtra'),
(1502, 'Pune', 'Maharashtra'),
(1503, 'Nagpur', 'Maharashtra'),
(1504, 'Aurangabad', 'Maharashtra'),
(1505, 'Nashik', 'Maharashtra'),
(1601, 'Imphal', 'Manipur'),
(1701, 'Shillong', 'Meghalaya'),
(1801, 'Aizawl', 'Mizoram'),
(1901, 'Kohima', 'Nagaland'),
(2001, 'Bhubaneswar', 'Odisha'),
(2002, 'Cuttack', 'Odisha'),
(2101, 'Ludhiana', 'Punjab'),
(2102, 'Amritsar', 'Punjab'),
(2201, 'Jaipur', 'Rajasthan'),
(2202, 'Jodhpur', 'Rajasthan'),
(2203, 'Kota', 'Rajasthan'),
(2301, 'Gangtok', 'Sikkim'),
(2401, 'Chennai', 'Tamil Nadu'),
(2402, 'Coimbatore', 'Tamil Nadu'),
(2501, 'Hyderabad', 'Telangana'),
(2502, 'Warangal', 'Telangana'),
(2601, 'Agartala', 'Tripura'),
(2701, 'Lucknow', 'Uttar Pradesh'),
(2702, 'Varanasi', 'Uttar Pradesh'),
(2703, 'Allahabad', 'Uttar Pradesh'),
(2801, 'Dehradun', 'Uttarakhand'),
(2901, 'Kolkata', 'West Bengal'),
(2902, 'Howrah', 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `cusername` varchar(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cpassword` varchar(40) NOT NULL,
  `cemail` varchar(40) NOT NULL,
  `ccity` varchar(30) NOT NULL,
  `ccontact` bigint(20) NOT NULL,
  `cquestion` varchar(50) NOT NULL,
  `canswer` varchar(50) NOT NULL,
  `cbalance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `cusername`, `cname`, `cpassword`, `cemail`, `ccity`, `ccontact`, `cquestion`, `canswer`, `cbalance`) VALUES
(0, '114cs0123', 'Ravi Teja', '0123', '114cs0123@nitrkl.ac.in', 'Rourkela', 7077611166, '2', 'dog', 537920),
(1, '714cs1038', 'Eshwar Prithvi', '9297', 'eshwarprithvi9@gmail.com', 'Rourkela', 9440268005, '1', 'nalanda', 536686);

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `name` varchar(10) NOT NULL,
  `bhk` varchar(10) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `price` bigint(20) NOT NULL,
  `area` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sellerusername` varchar(30) NOT NULL,
  `transno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `aid` int(11) NOT NULL,
  `ausername` varchar(30) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `apassword` varchar(40) NOT NULL,
  `aemail` varchar(40) NOT NULL,
  `acity` varchar(30) NOT NULL,
  `acontact` varchar(20) NOT NULL,
  `aquestion` varchar(50) NOT NULL,
  `aanswer` varchar(50) NOT NULL,
  `abalance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`aid`, `ausername`, `aname`, `apassword`, `aemail`, `acity`, `acontact`, `aquestion`, `aanswer`, `abalance`) VALUES
(1, '114cs0123', 'Ravi Teja', '0123', '114cs0123@nitrkl.ac.in', 'Rourkela', '7077611166', '2', 'dog', 0),
(2, '714cs1038', 'Eshwar Prithvi', '9297', '714cs1038@nitrkl.ac.in', 'Rourkela', '7077105393', '1', 'nalanda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `statestable`
--

CREATE TABLE `statestable` (
  `sid` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `zname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statestable`
--

INSERT INTO `statestable` (`sid`, `sname`, `zname`) VALUES
(1, 'Andhra Pradesh', 'south'),
(2, 'Arunachal Pradesh', 'north east'),
(3, 'Assam', 'north east'),
(4, 'Bihar', 'east'),
(5, 'Chhattisgarh', 'east'),
(6, 'Goa', 'west'),
(7, 'Gujarat', 'north west'),
(8, 'Haryana', 'north'),
(9, 'Himachal Pradesh', 'north'),
(10, 'Jammu and Kashmir', 'north'),
(11, 'Jharkhand', 'east'),
(12, 'Karnataka', 'south'),
(13, 'Kerala', 'south'),
(14, 'Madhya Pradesh', 'central'),
(15, 'Maharashtra', 'west'),
(16, 'Manipur', 'north east'),
(17, 'Meghalaya', 'north east'),
(18, 'Mizoram', 'north east'),
(19, 'Nagaland', 'north east'),
(20, 'Odisha', 'east'),
(21, 'Punjab', 'north'),
(22, 'Rajasthan', 'north west'),
(23, 'Sikkim', 'east'),
(24, 'Tamil Nadu', 'south'),
(25, 'Telangana', 'south'),
(26, 'Tripura', 'north east'),
(27, 'Uttar Pradesh', 'north'),
(28, 'Uttarakhand', 'north'),
(29, 'West Bengal', 'east');

-- --------------------------------------------------------

--
-- Table structure for table `tempproperty`
--

CREATE TABLE `tempproperty` (
  `name` varchar(30) NOT NULL,
  `bhk` varchar(10) NOT NULL,
  `constructionstatus` varchar(20) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `area` decimal(10,0) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `name` varchar(10) NOT NULL,
  `bhk` varchar(10) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `price` bigint(20) NOT NULL,
  `area` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sellerusername` varchar(30) NOT NULL,
  `transno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `citiestable`
--
ALTER TABLE `citiestable`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `statestable`
--
ALTER TABLE `statestable`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tempproperty`
--
ALTER TABLE `tempproperty`
  ADD PRIMARY KEY (`address`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
