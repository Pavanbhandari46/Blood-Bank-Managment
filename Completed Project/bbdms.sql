-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 06:05 PM
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
  `Btype` varchar(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`Btype`, `Quantity`, `Amount`) VALUES
('A+', 0, 0),
('A-', 0, 0),
('AB+', 0, 0),
('AB-', 0, 0),
('B+', 0, 0),
('B-', 0, 0),
('O+', 0, 0),
('O-', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blooddetails`
--

CREATE TABLE `blooddetails` (
  `Blood_Bagno` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Btype` varchar(3) NOT NULL,
  `Dateofexp` date NOT NULL,
  `Donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddetails`
--

INSERT INTO `blooddetails` (`Blood_Bagno`, `Quantity`, `Btype`, `Dateofexp`, `Donor_id`) VALUES
(1, 2, 'O+', '2018-12-02', 1);

--
-- Triggers `blooddetails`
--
DELIMITER $$
CREATE TRIGGER `bbdd` AFTER DELETE ON `blooddetails` FOR EACH ROW UPDATE bloodbank set Quantity = Quantity-old.Quantity WHERE Btype=old.Btype
$$
DELIMITER ;
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
  `BloodType` varchar(3) NOT NULL,
  `History` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddonor`
--

INSERT INTO `blooddonor` (`Donor_id`, `Name`, `Age`, `Sex`, `Address`, `phno`, `BloodType`, `History`) VALUES
(1, 'pavan', 5, 'M', 'l', 9535177135, 'O+', ' l'),
(2, 'pavan', 5, 'M', 'Bangalore', 65, 'O+', ' none'),
(3, 'pavan', 5, 'M', 'l', 65, 'O+', ' l'),
(10, 'pavan', 5, 'M', 'g', 65, 'O+', ' g'),
(80, 'pavan', 5, 'M', 'l', 65, 'O+', ' l');

-- --------------------------------------------------------

--
-- Table structure for table `dateofreg1`
--

CREATE TABLE `dateofreg1` (
  `Emp_id` int(11) NOT NULL,
  `Donor_id` int(11) NOT NULL,
  `Dateofreg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE `employee1` (
  `Emp_id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Phno` bigint(11) NOT NULL,
  `Role` varchar(10) NOT NULL,
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
(21, 'Manipal', '6', 0, 'manipal', 'manipal');

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
(1, 21, 100);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Order_id` int(11) NOT NULL,
  `Hos_id` int(11) NOT NULL,
  `Btype` varchar(2) NOT NULL,
  `Dateofreq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Quantity` int(11) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Order_id`, `Hos_id`, `Btype`, `Dateofreq`, `Quantity`, `Status`) VALUES
(1, 21, 'O+', '2018-11-10 12:16:47', 1, 'Cancelled'),
(2, 21, 'O+', '2018-11-10 07:30:30', 1, 'Cancelled'),
(3, 21, 'O+', '2018-11-10 08:07:07', 1, 'Cancelled'),
(4, 21, 'O+', '2018-11-10 09:50:48', 2, 'Cancelled'),
(5, 21, 'O+', '2018-11-10 12:59:49', 2, 'Cancelled'),
(6, 21, 'O+', '2018-11-10 13:00:12', 2, 'Sorry your order has been rejected'),
(7, 21, 'O+', '2018-11-10 13:00:58', 2, 'Accepted will be delivered'),
(21, 21, 'O+', '2018-11-12 16:41:33', 0, 'Accepted will be delivered'),
(22, 21, 'O+', '2018-11-12 16:41:35', 0, 'Accepted will be delivered'),
(23, 21, 'O+', '2018-11-12 16:41:36', 0, 'Accepted will be delivered'),
(24, 21, 'O+', '2018-11-12 16:41:37', 0, 'Accepted will be delivered'),
(25, 21, 'O+', '2018-11-10 16:30:53', 0, 'Order Placed'),
(26, 21, 'O+', '2018-11-10 16:32:32', 0, 'Order Placed'),
(27, 21, 'O+', '2018-11-10 16:33:28', 0, 'Order Placed'),
(28, 21, 'O+', '2018-11-10 16:33:46', 0, 'Order Placed'),
(29, 21, 'O+', '2018-11-10 16:34:56', 0, 'Order Placed'),
(30, 21, 'O+', '2018-11-10 16:35:46', 0, 'Order Placed'),
(31, 21, 'O+', '2018-11-10 16:36:26', 0, 'Order Placed'),
(32, 21, 'O+', '2018-11-10 16:37:18', 0, 'Order Placed'),
(33, 21, 'O+', '2018-11-10 16:38:03', 0, 'Order Placed'),
(34, 21, 'O+', '2018-11-10 18:08:54', 2, 'Order Placed'),
(35, 21, 'O+', '2018-11-10 18:11:37', 2, 'Order Placed'),
(36, 21, 'O+', '2018-11-10 18:12:02', 2, 'Order Placed'),
(37, 21, 'O+', '2018-11-10 18:12:22', 2, 'Order Placed'),
(38, 21, 'O+', '2018-11-12 16:40:32', 2, 'Accepted will be delivered');

--
-- Triggers `request`
--
DELIMITER $$
CREATE TRIGGER `t3` BEFORE UPDATE ON `request` FOR EACH ROW IF new.Status = 'Accepted will be delivered' THEN 
UPDATE bloodbank SET Quantity = Quantity-old.Quantity WHERE Btype=old.Btype;
END IF
$$
DELIMITER ;

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
  MODIFY `Hos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
