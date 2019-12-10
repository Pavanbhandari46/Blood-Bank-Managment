-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 05:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbdms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `search` (IN `sbtype` VARCHAR(11))  NO SQL
BEGIN
 SELECT * 
 FROM bloodbank
 WHERE Btype = sbtype;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `Btype` varchar(25) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`Btype`, `Quantity`, `Amount`) VALUES
('ABNegetive', 0, 0),
('ABPositive', 0, 0),
('ANegetive', 0, 0),
('APositive', 0, 0),
('BNegetive', 0, 0),
('BPositive', 0, 0),
('ONegetive', 0, 0),
('OPositive', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blooddetails`
--

CREATE TABLE `blooddetails` (
  `Blood_Bagno` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Btype` varchar(25) NOT NULL,
  `Dateofexp` date NOT NULL,
  `Donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `blooddetails`
--
DELIMITER $$
CREATE TRIGGER `tr_bb` AFTER INSERT ON `blooddetails` FOR EACH ROW UPDATE bloodbank set Quantity = Quantity+NEW.Quantity WHERE Btype=NEW.Btype
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blooddonor`
--

CREATE TABLE `blooddonor` (
  `Donor_id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Age` smallint(6) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `Address` text,
  `phno` bigint(11) NOT NULL,
  `BloodType` varchar(25) NOT NULL,
  `History` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddonor`
--

INSERT INTO `blooddonor` (`Donor_id`, `Name`, `Age`, `Sex`, `Address`, `phno`, `BloodType`, `History`) VALUES
(1, 'pavan', 21, 'M', 'j', 1234515145, 'O+', ' k'),
(2, 'pavan', 5, 'M', 'a', 65, 'O+', ' a'),
(3, 'pavan', 5, 'M', 'a', 65, 'OPositive', ' a');

-- --------------------------------------------------------

--
-- Table structure for table `dateofreg1`
--

CREATE TABLE `dateofreg1` (
  `Emp_id` int(11) NOT NULL,
  `Donor_id` int(11) NOT NULL,
  `Dateofreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dateofreg1`
--

INSERT INTO `dateofreg1` (`Emp_id`, `Donor_id`, `Dateofreg`) VALUES
(1, 1, '2018-11-23 10:44:29'),
(1, 2, '2018-11-26 03:29:55'),
(1, 3, '2018-11-26 03:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE `employee1` (
  `Emp_id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Phno` bigint(11) NOT NULL,
  `Role` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee1`
--

INSERT INTO `employee1` (`Emp_id`, `Name`, `Phno`, `Role`, `username`, `password`, `salary`) VALUES
(1, 'Pavan Reddy', 9900192954, 'Manager', 'pavang', 'pavang', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hos_id` int(11) NOT NULL,
  `Hos_Name` varchar(20) NOT NULL,
  `Hos_Address` text NOT NULL,
  `Hos_phno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hos_id`, `Hos_Name`, `Hos_Address`, `Hos_phno`, `username`, `password`) VALUES
(21, 'Manipal', '6', 0, 'manipal', 'manipal'),
(22, 'fortis', '12', 0, 'fortis1', 'pavan');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Emp_id` int(11) NOT NULL,
  `Hos_id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Emp_id`, `Hos_id`, `Amount`) VALUES
(1, 21, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Order_id` int(11) NOT NULL,
  `Hos_id` int(11) NOT NULL,
  `Btype` varchar(25) NOT NULL,
  `Dateofreq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Quantity` int(11) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Order_id`, `Hos_id`, `Btype`, `Dateofreq`, `Quantity`, `Status`) VALUES
(4, 21, 'OPositive', '2018-11-26 03:54:56', 1, 'Accepted will be delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`Btype`);

--
-- Indexes for table `blooddetails`
--
ALTER TABLE `blooddetails`
  ADD PRIMARY KEY (`Blood_Bagno`),
  ADD KEY `Donor_id` (`Donor_id`),
  ADD KEY `Donor_id_2` (`Donor_id`),
  ADD KEY `Btype` (`Btype`);

--
-- Indexes for table `blooddonor`
--
ALTER TABLE `blooddonor`
  ADD PRIMARY KEY (`Donor_id`);

--
-- Indexes for table `dateofreg1`
--
ALTER TABLE `dateofreg1`
  ADD PRIMARY KEY (`Donor_id`);

--
-- Indexes for table `employee1`
--
ALTER TABLE `employee1`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Hos_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Emp_id`,`Hos_id`),
  ADD KEY `Hos_id` (`Hos_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Order_id`,`Hos_id`),
  ADD UNIQUE KEY `Order_id` (`Order_id`),
  ADD KEY `Hos_id` (`Hos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee1`
--
ALTER TABLE `employee1`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Hos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blooddetails`
--
ALTER TABLE `blooddetails`
  ADD CONSTRAINT `blooddetails_ibfk_1` FOREIGN KEY (`Donor_id`) REFERENCES `blooddonor` (`Donor_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dateofreg1`
--
ALTER TABLE `dateofreg1`
  ADD CONSTRAINT `dateofreg1_ibfk_1` FOREIGN KEY (`Donor_id`) REFERENCES `blooddonor` (`Donor_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`Hos_id`) REFERENCES `hospital` (`Hos_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`Emp_id`) REFERENCES `employee1` (`Emp_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`Hos_id`) REFERENCES `hospital` (`Hos_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
