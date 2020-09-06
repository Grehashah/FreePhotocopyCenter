-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 09:18 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freephotocopycenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `AdminUname` varchar(50) NOT NULL,
  `AdminPwd` varchar(20) NOT NULL,
  `AdminFname` varchar(50) NOT NULL,
  `AdminLname` varchar(50) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Pic` varchar(300) NOT NULL,
  `DOJ` date NOT NULL,
  `DOB` date NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Lseen` datetime NOT NULL,
  `IsAuth` varchar(30) NOT NULL,
  `OfficeName` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `AreaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminUname`, `AdminPwd`, `AdminFname`, `AdminLname`, `Gender`, `Pic`, `DOJ`, `DOB`, `ContactNo`, `Email`, `Lseen`, `IsAuth`, `OfficeName`, `Address`, `AreaId`) VALUES
(1, 'Shrey Patel', '12345678', 'Shrey', 'Patel', 'male', 'a1.jpg', '2019-01-01', '1999-05-11', '8401529922', 'ashwin.patel1674@gmail.com', '2019-04-18 12:46:30', 'yes', 'Aakash Infotech', 'C-602,Gurukul Park,Memnagar,Ahmedabad-380052', 1),
(2, 'Greha Shah', 'greha@123', 'Greha', 'Shah', 'female', 'a2.jpg', '2019-01-01', '1999-06-05', '9624441248', 'grehashah56@gmail.com', '2019-04-18 11:36:32', 'yes', 'Aakash Infotech', 'C-603,Gurukul Park,Memnagar,Ahmedabad-380052', 2);

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

CREATE TABLE `advertiser` (
  `AdvId` int(11) NOT NULL,
  `AUname` varchar(50) NOT NULL,
  `APwd` varchar(20) NOT NULL,
  `AFname` varchar(50) NOT NULL,
  `ALname` varchar(50) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Pic` varchar(300) NOT NULL,
  `DOJ` date NOT NULL,
  `DOB` date NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Lseen` datetime NOT NULL,
  `IsAuth` varchar(30) NOT NULL,
  `OfficeName` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `AreaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertiser`
--

INSERT INTO `advertiser` (`AdvId`, `AUname`, `APwd`, `AFname`, `ALname`, `Gender`, `Pic`, `DOJ`, `DOB`, `ContactNo`, `Email`, `Lseen`, `IsAuth`, `OfficeName`, `Address`, `AreaId`) VALUES
(1, 'Shrey Joshi', 'shrey@12', 'Shrey', 'Joshi', 'male', 'adv1.jpg', '2018-10-10', '1999-10-16', '8564585895', 'shrey1999.sp@gmail.com', '2018-10-11 12:00:00', 'yes', 'Motivatial Education', 'C-603,JayBhawani Complex,Ahmedabad', 1),
(2, 'Jaydeep Desai', 'jaydeep@123', 'Jaydeep', 'Desai', 'male', 'adv2.jpg', '2018-10-14', '1988-10-02', '9456784578', 'jaydeepdesai@gmail.com', '2018-10-15 15:00:00', 'yes', 'Cleverso Education', 'B-203,JayBhawani Complex,Ahmedabad', 2),
(3, 'Jay Patel', 'jay@123', 'Jay', 'Patel', 'male', 'adv3.jpg', '2018-10-15', '1998-10-08', '9426154245', 'jaypatel@gmail.com', '2018-10-16 12:00:00', 'yes', 'EtonWall Softwares', 'B-209,Him Complex,Ahmedabad', 3),
(4, 'Jinal Shah', 'jinal@123', 'Jinal', 'Shah', 'female', 'adv4.jpg', '2018-10-14', '1976-06-12', '9965269985', 'jinalshah@gmail.com', '2018-10-15 18:00:00', 'yes', 'Quality Clothes', 'B-205,Alpha Mall,Ahmedabad', 4),
(5, 'Khushali Jain', 'khushali@123', 'Khushali', 'Jain', 'female', 'adv5.jpg', '2018-11-15', '1995-11-14', '8585956421', 'khushalishah@gmail.com', '2018-11-16 11:00:00', 'yes', 'Transitial Education', 'A-103,JayBhawani Complex,Ahmedabad', 5),
(6, 'Harsh Solanki', 'harsh@123', 'Harsh', 'Solanki', 'male', 'adv6.jpg', '2018-10-23', '1990-09-02', '8899556644', 'harshsolanki@gmail.com', '2018-10-24 15:00:00', 'yes', 'Woodland', 'A-11,Himalaya Mall,Ahmedabad', 6),
(7, 'Chetak Patel', 'chetak@123', 'Chetak', 'Patel', 'male', 'adv7.jpg', '2018-10-10', '1999-06-03', '8754242316', 'chetakpatel@gmail.com', '2018-10-11 15:00:00', 'no', 'Real Paprika Pizza', 'B-20,Maruti Complex,Ahmedabad', 7),
(8, 'Kaushal Mehta', 'kaushal@123', 'Kaushal', 'Mehta', 'male', 'adv8.jpg', '2018-10-26', '1984-04-01', '9562301020', 'kaushalmehta@gmail.com', '2018-10-27 18:00:00', 'yes', 'US Pizza', 'A-101,Himalaya Mall,Ahmedabad', 8),
(9, 'Neel Bhavsar', 'neel@123', 'Neel', 'Bhavsar', 'male', 'adv9.jpg', '2018-10-27', '1991-06-11', '9426154879', 'neelbhavsar@gmail.com', '2018-10-28 12:00:00', 'yes', 'Shri Graphics', 'V-102,Bhawani Complex,Ahmedabad', 9),
(10, 'Shruti Patel', 'shruti@123', 'Shruti', 'Patel', 'female', 'adv10.jpg', '2018-10-16', '1995-02-06', '8899775544', 'shrutipatel@gmail.com', '2018-10-17 22:00:00', 'yes', 'Alvin Graphics', 'G-501,A-one Complex,Ahmedabad', 10),
(11, 'Purvang Shah', 'purvang@123', 'Purvang', 'Shah', 'male', 'adv11.jpg', '2018-10-23', '1970-10-07', '9874568956', 'purvangshah@gmail.com', '2018-10-24 18:00:00', 'yes', 'Stylesmyth Company Outlets', 'A-16,Best Mall,Ahmedabad', 11),
(12, 'Rita Patel', 'rita@123', 'Rita', 'Patel', 'female', 'adv12.jpg', '2018-10-14', '1985-06-04', '8264592034', 'ritapatel@gmail.com', '2018-10-15 22:00:00', 'yes', 'Loxdon Fast Food', 'N-20,Alpha Mall,Ahmedabad', 1),
(13, 'Vashvee Shah', 'vashvee@123', 'Vashvee', 'Shah', 'female', 'adv13.jpg', '2018-10-14', '1994-10-10', '9865988548', 'vashveeshah@gmail.com', '2018-10-15 23:00:00', 'yes', 'Vashvee Enterprise', 'C-601,JayBhawani Complex,Ahmedabad', 2),
(14, 'Henil Parekh', 'henil@123', 'Henil', 'Parekh', 'male', 'adv14.jpg', '2018-10-29', '2000-01-07', '7895897874', 'henilparekh@gmail.com', '2018-10-30 20:00:00', 'yes', 'Retrovis Clothes', 'A-109,Titanium City,Ahmedabad', 3),
(15, 'Paresh Patel', 'paresh@123', 'Paresh', 'Patel', 'male', 'adv15.jpg', '2018-10-24', '1980-10-20', '8246555852', 'pareshpatel@gmail.com', '2018-10-25 10:00:00', 'yes', 'Fashion World', 'B-107,Time Square,Ahmedabad', 4),
(16, 'Rutu Desai', 'rutu@123', 'Rutu', 'Desai', 'female', 'adv16.jpg', '2018-10-19', '1992-05-14', '9856243521', 'rutudesai@gmail.com', '2018-10-20 16:00:00', 'yes', 'Jay Bhawani Fast Food', 'R-502,JayBhawani Complex,Ahmedabad', 5),
(17, 'Jay Desai', 'jay@123', 'Jay', 'Desai', 'male', 'adv17.jpg', '2018-10-16', '1985-06-25', '9898985986', 'jaydesai@gmail.com', '2018-10-17 17:00:00', 'yes', 'Modential Fashion Hub', 'A-112,Him Complex,Ahmedabad', 6),
(18, 'Dirgh Shah', 'dirgh@123', 'Dirgh', 'Shah', 'male', 'adv18.jpg', '2018-10-06', '2000-02-22', '8998899859', 'dirghshah@gmail.com', '2018-10-07 14:00:00', 'yes', 'hari Om Fast Food', 'H-12,Maruti Complex,Ahmedabad', 8),
(19, 'Ekta Kapoor', 'ekta@123', 'Ekta', 'Kapoor', 'female', 'adv19.jpg', '2018-10-04', '1975-12-12', '8956471230', 'ektakapoor@gmail.com', '2018-10-05 11:00:00', 'yes', 'Ekta Medicals', 'A-901,Ekta Complex,Ahmedabad', 9),
(20, 'Prabhu Patel', 'prabhu@123', 'Prabhu', 'Patel', 'male', 'adv20.jpg', '2018-10-21', '1999-03-05', '8524619787', 'prabhupatel@gmail.com', '2018-10-22 16:00:00', 'no', 'Prabhu Jewelers', 'B-206,JayBhawani Complex,Ahmedabad', 10);

-- --------------------------------------------------------

--
-- Table structure for table `advertiseradvertise`
--

CREATE TABLE `advertiseradvertise` (
  `AAId` int(11) NOT NULL,
  `AdtypeId` int(11) NOT NULL,
  `AdvId` int(11) NOT NULL,
  `DOS` date NOT NULL,
  `DOE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertiseradvertise`
--

INSERT INTO `advertiseradvertise` (`AAId`, `AdtypeId`, `AdvId`, `DOS`, `DOE`) VALUES
(1, 1, 1, '2019-03-10', '2019-03-01'),
(3, 1, 2, '2019-03-12', '2018-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `advertisetype`
--

CREATE TABLE `advertisetype` (
  `AdtypeId` int(11) NOT NULL,
  `AdtypeName` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisetype`
--

INSERT INTO `advertisetype` (`AdtypeId`, `AdtypeName`, `Price`, `Duration`) VALUES
(1, 'Silver', 500, 7),
(2, 'Gold', 1000, 14),
(3, 'Diamond', 1500, 21);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `AreaId` int(11) NOT NULL,
  `AreaName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`AreaId`, `AreaName`) VALUES
(1, 'Gurukul'),
(2, 'Memnagar'),
(3, 'Naranpura'),
(4, 'Ghatlodia'),
(5, 'Vadaj'),
(6, 'Cpnagar'),
(7, 'Navrangpura'),
(8, 'Ranip'),
(9, 'Gota'),
(10, 'Thaltej'),
(11, 'Satellite');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `CollegeId` int(11) NOT NULL,
  `CollegeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`CollegeId`, `CollegeName`) VALUES
(1, 'KSSBM'),
(2, 'Som-Lalit'),
(3, 'L.D Science'),
(4, 'L.J.'),
(5, 'CEPT'),
(6, 'NIFD'),
(7, 'PDPU'),
(8, 'DAIICT'),
(9, 'NIRMA'),
(10, 'Umiya'),
(11, 'Sal');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FId` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Exp` varchar(10) NOT NULL,
  `Cmt` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FId`, `Email`, `Exp`, `Cmt`) VALUES
(7, 'jaypatel@gmail.com', 'good', 'jhbfvgh'),
(9, 'apurvashah@gmail.com', 'asd', 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MId` int(11) NOT NULL,
  `MUname` varchar(50) NOT NULL,
  `MPwd` varchar(20) NOT NULL,
  `MFname` varchar(50) NOT NULL,
  `MLname` varchar(50) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Pic` varchar(300) NOT NULL,
  `DOJ` date NOT NULL,
  `DOB` date NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Lseen` datetime NOT NULL,
  `IsAuth` varchar(30) NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `StreamId` int(11) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `AreaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MId`, `MUname`, `MPwd`, `MFname`, `MLname`, `Gender`, `Pic`, `DOJ`, `DOB`, `ContactNo`, `Email`, `Lseen`, `IsAuth`, `CollegeId`, `StreamId`, `Address`, `AreaId`) VALUES
(1, 'Anil Parekh', '12345678', 'Anil', 'Parekh', 'male', 'm1.jpg', '2019-02-05', '1977-10-16', '8401529943', 'ashwin.patel1674@gmail.com', '2019-04-14 07:17:29', 'yes', 1, 1, 'A-102,Aman appartment,Ahmedabad', 1),
(2, 'Apurva Shah', 'apurva@123', 'Apurva', 'Shah', 'female', 'm2.jpg', '2019-03-05', '1987-06-23', '6543210891', 'apurvashah@gmail.com', '2018-10-12 08:00:00', 'yes', 1, 2, 'B-302,Gurukrupa Appartment,Ahmedabad', 1),
(3, 'Kajal Patel', 'kajalpatel@123', 'Kajal', 'Patel', 'female', 'm3.jpg', '2018-10-15', '1967-05-10', '7546512013', 'kajalpatel@gmail.com', '2018-10-16 05:00:00', 'yes', 7, 1, 'B-303,Vishramnagar Appartment,Ahmedabad', 3),
(4, 'Om Joshi', 'omjoshi@123', 'Om', 'Joshi', 'male', 'm4.jpg', '2018-10-05', '1985-04-21', '8401529942', 'omjoshi@gmail.com', '2019-04-18 11:38:55', 'yes', 2, 4, 'c-602,Gurukul park,Ahmedabad', 2),
(5, 'Karan Patel', 'karan@123', 'Karan', 'Patel', 'male', 'm5.jpg', '2018-10-05', '1977-10-17', '9755440122', 'karanpatel@gmail,com', '2018-10-06 14:00:00', 'yes', 8, 1, 'B-303,Vishramnagar Appartment,Ahmedabad', 1),
(6, 'Sunil Thakor', 'sunil@123', 'Sunil', 'Thakor', 'male', 'm6.jpg', '2018-10-16', '1995-08-27', '6664255120', 'sunilthakor@gmail.com', '2018-10-17 10:00:00', 'yes', 8, 2, 'C-209,Vishram Appartment,Ahmedabad', 3),
(7, 'Akshat Shah', 'akshat@123', 'Akshat', 'Shah', 'male', 'm7.jpg', '2018-10-18', '1997-04-21', '9526712312', 'akshatshah@gmail.com', '2018-10-19 17:00:00', 'yes', 1, 2, 'J-701,Gurukrupa Society,Ahmedabad', 7),
(8, 'Priya Barot', 'priya@123', 'Priya', 'Barot', 'femlae', 'm8.jpg', '2018-10-24', '1997-06-23', '6664255127', 'priyabarot@gmail.com', '2018-10-25 12:00:00', 'yes', 9, 4, 'B-203,Vishwam Appartment,Ahmedabad', 4),
(9, 'Juhi Dudhia', 'juhi@123', 'Juhi', 'Dudhia', 'female', 'm9.jpg', '2018-10-26', '1989-03-24', '9898027203', 'juhidudhia@gmail.com', '2018-10-27 19:00:00', 'yes', 10, 6, 'A-11,Mangalmurti tenaments,Ahmedabad', 9),
(10, 'Janvi Shah', 'janvi@123', 'Janvi', 'Shah', 'female', 'm10.jpg', '2018-10-18', '1999-06-12', '8401527943', 'janvishah@gmail.com', '2018-10-19 15:00:00', 'yes', 9, 7, 'A-12,Shri tenaments,Ahmedabad', 11),
(11, 'Shreya Parmar', 'shreya@123', 'Shreya', 'Parmar', 'female', 'm11.jpg', '2018-11-01', '1986-10-16', '7752164529', 'shreyaparmar@gmail.com', '2018-11-02 04:00:00', 'yes', 10, 2, 'D-308,Zorba Appartment,Ahmedabad', 8),
(12, 'Meet Patel', 'meet@123', 'Meet', 'Patel', 'male', 'm12.jpg', '2018-11-14', '1977-10-01', '9755540131', 'meetpatel@gmail.com', '2018-11-15 11:00:00', 'yes', 8, 7, 'J-15,Shri bunglows,Ahmedabad', 11),
(13, 'Neel Patel', 'neel@123', 'Neel', 'Patel', 'male', 'm13.jpg', '2018-10-16', '2000-07-17', '9526712212', 'neelpatel@gmail.com', '2018-10-17 11:00:00', 'yes', 7, 7, 'C-608,Vishwas Residency,Ahmedabad', 10),
(14, 'Maulik Solanki', 'maulik@123', 'Maulik', 'Solanki', 'male', 'm14.jpg', '2018-10-24', '2001-02-14', '9988611465', 'mauliksolanki@gmail.com', '2018-10-25 13:00:00', 'yes', 7, 8, 'H-305,A-one Apartments,Ahmedabad', 6),
(15, 'Jayshil Panchal', 'jayshil@123', 'Jayshil', 'Panchal', 'male', 'm15.jpg', '2018-10-05', '1997-09-25', '8100031130', 'jayshilpanchal@gmail.com', '2018-10-06 18:00:00', 'yes', 10, 8, 'A-01,Vishwa Tenaments,Ahmedabad', 4),
(16, 'Vikram Bharwad', 'vikram@123', 'Vikram ', 'Bharwad', 'male', 'm16.jpg', '2018-11-22', '1996-03-12', '8160774991', 'vikrambharwad@gmail.com', '2018-11-23 16:00:00', 'yes', 2, 4, 'C-12,Goga society,Ahmedabad', 2),
(17, 'Hemali Solanki', 'hemali@123', 'Hemali', 'Solanki', 'female', 'm17.jpg', '2018-10-28', '1975-09-10', '7600022794', 'hemalisolanki@gmail.com', '2018-10-29 10:00:00', 'yes', 5, 1, 'A-209,Om Appartment,Ahmedabad', 8),
(18, 'Prabhu Shah', 'prabhu@123', 'Prabhu', 'Shah', 'male', 'm18.jpg', '2018-11-20', '1980-11-01', '8160774992', 'prabhushah@gmail.com', '2018-11-21 17:00:00', 'yes', 1, 2, 'V-201,Vadaj Residency,Ahmedabad', 9),
(19, 'Pushpa Bhavsar', 'pushpa@123', 'Pushpa', 'Bhavsar', 'female', 'm19.jpg', '2018-10-24', '1990-10-09', '9756491121', 'pushpabhavsar@gmail.com', '2018-10-25 11:00:00', 'yes', 1, 1, 'B-209,Ambika Appartment,Ahmedabad', 10),
(20, 'Pratik Shah', 'pratik@123', 'Pratik', 'Shah', 'male', 'm20.jpg', '2018-10-24', '1999-12-11', '9160774091', 'pratikshah@gmail.com', '2018-10-25 08:00:00', 'no', 7, 8, 'A-308,Narayan Appartment,Ahmedabad', 5);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `OtpId` int(11) NOT NULL,
  `OtpNo` varchar(20) NOT NULL,
  `MId` int(11) NOT NULL,
  `XId` int(11) NOT NULL,
  `DOO` datetime NOT NULL,
  `DOP` datetime NOT NULL,
  `NOP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`OtpId`, `OtpNo`, `MId`, `XId`, `DOO`, `DOP`, `NOP`) VALUES
(1, '0521', 1, 1, '2019-03-17 20:13:26', '2019-03-16 10:34:45', 15),
(2, '0522', 2, 1, '2019-01-13 13:00:00', '2019-02-20 06:45:52', 10),
(6, '5111', 1, 1, '2019-03-23 20:21:07', '0000-00-00 00:00:00', 10),
(7, '6091', 1, 1, '2019-04-13 17:08:28', '2019-04-13 05:09:30', 10);

-- --------------------------------------------------------

--
-- Table structure for table `paymentincome`
--

CREATE TABLE `paymentincome` (
  `PIId` int(11) NOT NULL,
  `AdvId` int(11) NOT NULL,
  `DOA` date NOT NULL,
  `Amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentincome`
--

INSERT INTO `paymentincome` (`PIId`, `AdvId`, `DOA`, `Amt`) VALUES
(1, 1, '2019-10-05', 500),
(2, 1, '2019-10-11', 500),
(3, 1, '2019-04-06', 500),
(4, 1, '2019-04-12', 1000),
(5, 1, '2019-04-13', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `paymentxerox`
--

CREATE TABLE `paymentxerox` (
  `PXId` int(11) NOT NULL,
  `XId` int(11) NOT NULL,
  `AdminId` int(11) NOT NULL,
  `DOG` date NOT NULL,
  `Amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentxerox`
--

INSERT INTO `paymentxerox` (`PXId`, `XId`, `AdminId`, `DOG`, `Amt`) VALUES
(1, 1, 1, '2019-02-01', 2000),
(3, 1, 1, '2019-03-04', 2000),
(4, 3, 2, '2019-04-03', 1000),
(6, 2, 1, '2019-04-04', 0),
(7, 1, 1, '2019-04-12', 15);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `StockId` int(11) NOT NULL,
  `DOS` date NOT NULL,
  `XId` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `QOH` int(11) NOT NULL,
  `AQH` int(11) NOT NULL,
  `QtyGiven` int(11) NOT NULL,
  `CurrQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockId`, `DOS`, `XId`, `Qty`, `QOH`, `AQH`, `QtyGiven`, `CurrQty`) VALUES
(3, '2019-02-02', 1, 2500, 200, 1000, 1000, 5000),
(5, '2019-03-02', 1, 3000, 200, 3000, 500, 3500),
(6, '2019-03-05', 1, 4000, 200, 100, 1000, 2500),
(7, '2019-03-05', 2, 1000, 100, 90, 1000, 5000),
(9, '2019-03-05', 1, 1000, 100, 990, 1000, 3500),
(10, '2019-03-20', 21, 1000, 100, 1000, 1000, 4000),
(11, '2019-03-20', 22, 1000, 100, 1000, 1000, 4000),
(12, '2019-03-20', 23, 1000, 100, 1000, 1000, 4000),
(14, '2019-04-18', 8, 1000, 100, 1000, 1000, 10000),
(16, '2019-04-18', 27, 1000, 100, 1000, 1000, 9000),
(17, '2019-04-18', 28, 1000, 100, 1000, 1000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `stockorder`
--

CREATE TABLE `stockorder` (
  `SOrderId` int(11) NOT NULL,
  `XId` int(11) NOT NULL,
  `DOOrder` datetime NOT NULL,
  `DOPro` datetime NOT NULL,
  `QtyReq` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockorder`
--

INSERT INTO `stockorder` (`SOrderId`, `XId`, `DOOrder`, `DOPro`, `QtyReq`, `Status`) VALUES
(17, 1, '2019-01-10 14:00:00', '2019-01-31 08:13:51', 1000, 'accepted'),
(18, 1, '2019-03-02 11:33:26', '2019-03-02 10:37:52', 1000, 'provided'),
(19, 1, '2019-03-05 07:17:37', '2019-03-05 07:17:54', 1000, 'provided');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `StreamId` int(11) NOT NULL,
  `StreamName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`StreamId`, `StreamName`) VALUES
(1, 'MSCIT'),
(2, 'MBA'),
(3, 'BCOM'),
(4, 'BCA'),
(5, 'MCA'),
(6, 'MD'),
(7, 'MBBS'),
(8, 'LLB'),
(9, 'MS'),
(10, 'BA'),
(11, 'MA'),
(12, 'LLM');

-- --------------------------------------------------------

--
-- Table structure for table `xeroxshop`
--

CREATE TABLE `xeroxshop` (
  `XId` int(11) NOT NULL,
  `XName` varchar(50) NOT NULL,
  `XUname` varchar(50) NOT NULL,
  `XPwd` varchar(20) NOT NULL,
  `XFname` varchar(50) NOT NULL,
  `XLname` varchar(50) NOT NULL,
  `Pic` varchar(300) NOT NULL,
  `DOJ` date NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Lseen` datetime NOT NULL,
  `IsAuth` varchar(30) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `AreaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xeroxshop`
--

INSERT INTO `xeroxshop` (`XId`, `XName`, `XUname`, `XPwd`, `XFname`, `XLname`, `Pic`, `DOJ`, `ContactNo`, `Email`, `Lseen`, `IsAuth`, `Address`, `AreaId`) VALUES
(1, 'Varad Xerox', 'Meet Panchal', 'meet@123', 'Meet', 'Panchal', 'x1.jpg', '2019-01-01', '7778824062', 'shrey1999.sp@gmail.com', '2019-04-18 10:44:16', 'yes', 'A-102,Maruti Complex,Ahmedabad', 1),
(2, 'A-one Xerox', 'Shreya Solanki', 'shrey@123', 'Shreya', 'Solanki', 'x2.jpg', '2019-01-24', '9526314511', 'shreysolanki@gmail.com', '2018-10-12 11:00:00', 'yes', 'D-602,Maruti complex,Ahmedabad', 1),
(3, 'Vardayni Xerox', 'Kartik Patel', 'kartik@123', 'Kartik', 'Patel', 'x3.jpg', '2019-02-13', '8401215473', 'kartikpatel@gmail.com', '2018-10-17 08:00:00', 'yes', 'A-11,A-one complex,Ahmedabad', 4),
(4, 'Swagat Xerox Center', 'Shaswat Thakor', 'shaswat@123', 'Shaswat', 'Thakor', 'x4.jpg', '2018-10-25', '9952642975', 'shaswatthakor@gmail.com', '2018-10-26 13:00:00', 'yes', 'A-401,Alpha mall,Ahmedabad', 6),
(5, 'Allwin Jumbo Xerox', 'Ashvin Patel', 'ashvin@123', 'Ashvin', 'Patel', 'x5.jpg', '2018-10-18', '7854588965', 'ashvinpatel@gmail.com', '2018-10-19 13:00:00', 'yes', 'A-101,Himalaya Mall,Ahmedabad', 10),
(6, 'Vijay Copy center', 'Vijay Parekh', 'vijay@123', 'Vijay', 'Parekh', 'x6.jpg', '2018-11-14', '8426159985', 'vijayparekh@gmail.com', '2018-11-15 19:00:00', 'yes', 'Z-203,Jyoti Complex,Ahmedabad', 11),
(7, 'Maru Xerox Center', 'Shubham Maru', 'shubham@123', 'Shubham', 'Maru', 'x7.jpg', '2018-10-16', '9426085184', 'shubhammaru@gmail.com', '2018-10-17 00:00:00', 'yes', 'G-702,Titanium complex,Ahmedabad', 8),
(8, 'Chheda Copy Center', 'Shreya Jain', 'shrey@12', 'Shreya', 'Jain', 'x8.jpg', '2018-10-15', '9426085187', 'shreyajain@gmail.com', '2019-04-18 11:44:44', 'yes', 'A-106,Him complex,Ahmedabad', 8),
(9, 'Pooja Xerox', 'Poonam Shah', 'poonam@123', 'Poonam', 'Shah', 'x9.jpg', '2018-10-24', '8452162489', 'poonamshah@gmail.com', '2019-04-18 11:19:22', 'yes', 'F-105,Him complex,Ahmedabad', 1),
(10, 'Ratndeep Digital Center', 'Rajdeep Zala', 'rajdeep@123', 'Rajdeep', 'Zala', 'x10.jog', '2018-10-27', '8754269531', 'rajdeepzala@gmail.com', '2018-10-28 18:00:00', 'yes', 'G-11,Titanium Square,Ahmedabad', 4),
(11, 'Friends Zone', 'Jayraj Shah', 'jayraj@123', 'Jayraj', 'Shah', 'x11.jpg', '2018-10-05', '8612459414', 'jayrajshah@gmail.com', '2018-10-06 11:00:00', 'yes', 'A-20,Himalya mall,Ahmedabad', 7),
(12, 'Haresh Traders', 'Haresh Patel', 'haresh@123', 'Haresh', 'Patel', 'x12.jpg', '2018-10-26', '7066219455', 'hareshpatel@gmail.com', '2018-10-27 12:00:00', 'yes', 'A-102,Alpha Complex,Ahmedabad', 8),
(13, 'Ditto Copies Center', 'Raj Mehta', 'raj@123', 'Raj', 'Mehta', 'x13.jpg', '2018-10-19', '6665234599', 'rajmehta@gmail.com', '2018-10-20 21:00:00', 'yes', 'B-101,Me complex,Ahmedabad', 3),
(14, 'Greha Enterprises', 'Greha Patel', 'greha@123', 'Greha', 'Patel', 'x14.jpg', '2018-10-27', '7754268956', 'grehapatel@gmail.com', '2018-10-28 07:00:00', 'yes', 'B-62,Shah Complex,Ahmedabad', 10),
(15, 'Knowledge Stationery', 'Alka Patel', 'alka@123', 'Alka ', 'Patel', 'x15.jpg', '2018-10-21', '9456885959', 'alkapatel@gmail.com', '2018-10-22 10:00:00', 'yes', 'A-11,Patidar Mall,Ahmedabad', 5),
(16, 'Rameshwar Stationery', 'Vivek Joshi', 'vivek@123', 'Vivek', 'Joshi', 'x16.jpg', '2018-10-14', '7546124521', 'vivekjoshi@gmail.com', '2018-10-15 15:00:00', 'yes', 'C-20,Maruti complex,Ahmedabad', 7),
(17, 'Renuka Xerox Hub', 'Renuka Bharwad', 'renuka@123', 'Renuka', 'Bharwad', 'x17.jpg', '2018-10-14', '9956455159', 'renukabharwad@gmail.com', '2018-10-15 19:00:00', 'yes', 'B-202,Gomti Complex,Ahmedabad', 8),
(18, 'Perfect Digital Print', 'Pushpa Patel', 'pushpa@123', 'Pushpa', 'Patel', 'x18.jpg', '2018-10-22', '8452615995', 'pushpapatel@gmail.com', '2018-10-23 09:00:00', 'yes', 'A-11,Jyanti Complex,Ahmedabad', 9),
(19, 'Jyanti Xerox Hub', 'Jyanti Thakor', 'jyanti@123', 'Jyanti', 'Thakor', 'x19.jpg', '2018-10-07', '8426012459', 'jyantithakor@gmail.com', '2018-10-08 22:00:00', 'yes', 'A-15,University complex,Ahmedabad', 6),
(20, 'Laxmi Stationery', 'Harshil Shah', 'harshil@123', 'Harshil', 'Shah', 'x20.jpg', '2018-10-21', '9426081559', 'harshilshah@gmail.com', '2018-10-22 06:00:00', 'no', 'B-22,Maruti complex,Ahmedabad', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `advertiser`
--
ALTER TABLE `advertiser`
  ADD PRIMARY KEY (`AdvId`);

--
-- Indexes for table `advertiseradvertise`
--
ALTER TABLE `advertiseradvertise`
  ADD PRIMARY KEY (`AAId`);

--
-- Indexes for table `advertisetype`
--
ALTER TABLE `advertisetype`
  ADD PRIMARY KEY (`AdtypeId`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`AreaId`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`CollegeId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MId`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`OtpId`);

--
-- Indexes for table `paymentincome`
--
ALTER TABLE `paymentincome`
  ADD PRIMARY KEY (`PIId`);

--
-- Indexes for table `paymentxerox`
--
ALTER TABLE `paymentxerox`
  ADD PRIMARY KEY (`PXId`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockId`);

--
-- Indexes for table `stockorder`
--
ALTER TABLE `stockorder`
  ADD PRIMARY KEY (`SOrderId`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`StreamId`);

--
-- Indexes for table `xeroxshop`
--
ALTER TABLE `xeroxshop`
  ADD PRIMARY KEY (`XId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertiser`
--
ALTER TABLE `advertiser`
  MODIFY `AdvId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `advertiseradvertise`
--
ALTER TABLE `advertiseradvertise`
  MODIFY `AAId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisetype`
--
ALTER TABLE `advertisetype`
  MODIFY `AdtypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `AreaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `CollegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `OtpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paymentincome`
--
ALTER TABLE `paymentincome`
  MODIFY `PIId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paymentxerox`
--
ALTER TABLE `paymentxerox`
  MODIFY `PXId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stockorder`
--
ALTER TABLE `stockorder`
  MODIFY `SOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `StreamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `xeroxshop`
--
ALTER TABLE `xeroxshop`
  MODIFY `XId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
