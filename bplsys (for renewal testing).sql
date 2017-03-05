-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 06:56 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bplsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `amusement_devices`
--

CREATE TABLE IF NOT EXISTS `amusement_devices` (
  `amusementDeviceId` int(10) NOT NULL,
  `activityId` int(10) NOT NULL,
  `units` int(60) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application_bfp`
--

CREATE TABLE IF NOT EXISTS `application_bfp` (
  `applicationId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `businessId` int(10) DEFAULT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `applicationDate` varchar(255) DEFAULT NULL,
  `storeys` int(10) DEFAULT NULL,
  `occupiedPortion` varchar(255) DEFAULT NULL,
  `areaPerFloor` int(10) DEFAULT NULL,
  `occupancyPermitNum` varchar(30) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_bfp`
--

INSERT INTO `application_bfp` (`applicationId`, `userId`, `businessId`, `referenceNum`, `applicationDate`, `storeys`, `occupiedPortion`, `areaPerFloor`, `occupancyPermitNum`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 24, 1, '9FAEA9BEB4', 'March 1, 2017', 2, '50', 150, '56123512', 'For applicant visit', '2017-03-01 02:31:46', '2017-03-01 02:43:18'),
(2, 24, 2, 'AE29D1B98F', 'March 1, 2017', 2, '2', 120, '00000000', 'For applicant visit', '2017-03-01 02:37:10', '2017-03-03 02:35:07'),
(3, 24, 3, '739862FF5C', 'March 1, 2017', 1, '1', 200, '00000000', 'Expired', '2017-03-01 02:48:56', '2017-03-05 05:29:58'),
(4, 24, 4, 'A98409F68C', 'March 1, 2017', 4, '50', 1000, '5612451266', 'For applicant visit', '2017-03-01 02:52:19', '2017-03-01 08:34:40'),
(5, 24, 6, 'A03F21C5BC', 'March 1, 2017', 3, '3', 300, '69996661', 'Active', '2017-03-01 02:55:10', '2017-03-01 08:16:41'),
(6, 24, 5, '3BA448289A', 'March 1, 2017', 3, '5', 400, '12466215', 'Active', '2017-03-01 02:58:41', '2017-03-05 00:29:10'),
(7, 24, 7, '9FBDFC51AA', 'March 2, 2017', 1, '1', 320, '22222222', 'For applicant visit', '2017-03-01 03:04:11', '2017-03-02 13:04:53'),
(8, 24, NULL, '8D6467E448', 'March 3, 2017', 0, '', 0, '', 'Draft', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `application_bplo`
--

CREATE TABLE IF NOT EXISTS `application_bplo` (
  `applicationId` int(10) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `userId` int(5) NOT NULL,
  `businessId` int(10) DEFAULT NULL,
  `taxYear` int(4) DEFAULT NULL,
  `applicationDate` varchar(255) DEFAULT NULL,
  `idPresented` varchar(255) DEFAULT NULL,
  `modeOfPayment` varchar(255) DEFAULT NULL,
  `DTISECCDA_RegNum` varchar(255) DEFAULT NULL,
  `DTISECCDA_Date` varchar(255) DEFAULT NULL,
  `brgyClearanceDateIssued` varchar(255) DEFAULT NULL,
  `CTCNum` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `entityName` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_bplo`
--

INSERT INTO `application_bplo` (`applicationId`, `referenceNum`, `userId`, `businessId`, `taxYear`, `applicationDate`, `idPresented`, `modeOfPayment`, `DTISECCDA_RegNum`, `DTISECCDA_Date`, `brgyClearanceDateIssued`, `CTCNum`, `TIN`, `entityName`, `status`, `createdAt`, `updatedAt`) VALUES
(1, '9FAEA9BEB4', 24, 1, 2017, 'March 1, 2017', '2012109320', 'Quarterly', '6543123', '02/07/2017', '02/09/2017', '6512355612', '1251262', 'NA', 'On process', '2017-03-01 02:31:46', '2017-03-01 02:43:18'),
(2, 'AE29D1B98F', 24, 2, 2017, 'March 1, 2017', 'Driver''s License - 000000', 'Quarterly', '00000000', '03/01/2017', '03/01/2017', '00000000', '00000000', 'NA', 'On process', '2017-03-01 02:37:10', '2017-03-03 02:35:06'),
(3, '739862FF5C', 24, 3, 2017, 'March 1, 2017', 'Voter''s ID - 000000', 'Semi-Anually', '00000000', '03/01/2016', '03/01/2016', '00000000', '00000000', 'NA', 'Expired', '2016-03-01 02:48:56', '2017-03-05 05:29:58'),
(4, 'A98409F68C', 24, 4, 2017, 'March 1, 2017', 'Postal ID - 819266123', 'Quarterly', '61235124', '02/18/2016', '05/20/2015', '561255123', '56126123', 'NA', 'On process', '2017-03-01 02:52:19', '2017-03-01 08:34:40'),
(5, 'A03F21C5BC', 24, 6, 2017, 'March 1, 2017', 'Company ID - 699966', 'Anually', '12127979', '02/21/2017', '02/21/2017', '67891234', '1234', 'NA', 'Active', '2017-03-01 02:55:10', '2017-03-01 08:18:46'),
(6, '3BA448289A', 24, 5, 2017, 'March 1, 2017', 'Voters ID - 9881234125', 'Quarterly', '851249123', '02/15/2017', '01/16/2017', '51231512', '612345126', 'Governor Program', 'Completed', '2017-03-01 02:58:41', '2017-03-05 00:29:11'),
(7, '9FBDFC51AA', 24, 7, 2017, 'March 2, 2017', 'Voter''s ID - 000000', 'Quarterly', '22222222', '03/01/2017', '03/01/2017', '22222222', '22222222', 'NA', 'On process', '2017-03-01 03:04:11', '2017-03-02 13:04:52'),
(8, '8D6467E448', 24, NULL, 2017, 'March 3, 2017', '', NULL, '', '', '', '', '', 'NA', 'Draft', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `application_cenro`
--

CREATE TABLE IF NOT EXISTS `application_cenro` (
  `applicationId` int(255) NOT NULL,
  `userId` int(5) NOT NULL,
  `businessId` int(10) DEFAULT NULL,
  `referenceNum` varchar(255) DEFAULT NULL,
  `CNC` varchar(255) DEFAULT NULL,
  `LLDAClearance` varchar(255) DEFAULT NULL,
  `dischargePermit` varchar(255) DEFAULT NULL,
  `apsci` varchar(255) DEFAULT NULL,
  `productsAndByProducts` varchar(255) DEFAULT NULL,
  `smokeEmission` tinyint(1) DEFAULT NULL,
  `volatileCompound` tinyint(1) DEFAULT NULL,
  `fugitiveParticulates` varchar(255) DEFAULT NULL,
  `steamGenerator` varchar(255) DEFAULT NULL,
  `APCD` varchar(255) DEFAULT NULL,
  `stackHeight` varchar(255) DEFAULT NULL,
  `wastewaterTreatmentFacility` varchar(255) DEFAULT NULL,
  `wastewaterTreatmentOperationAndProcess` tinyint(1) DEFAULT NULL,
  `pendingCaseWithLLDA` varchar(255) DEFAULT NULL,
  `typeOfSolidWastesGenerated` varchar(255) DEFAULT NULL,
  `qtyPerDay` int(255) DEFAULT NULL,
  `garbageCollectionMethod` varchar(255) DEFAULT NULL,
  `frequencyOfGarbageCollection` varchar(255) DEFAULT NULL,
  `wasteCollector` varchar(255) DEFAULT NULL,
  `collectorAddress` varchar(255) DEFAULT NULL,
  `garbageDisposalMethod` varchar(255) DEFAULT NULL,
  `wasteMinimizationMethod` varchar(255) DEFAULT NULL,
  `drainageSystem` tinyint(1) DEFAULT NULL,
  `drainageType` varchar(255) DEFAULT NULL,
  `drainageDischargeLocation` varchar(255) DEFAULT NULL,
  `sewerageSystem` tinyint(1) DEFAULT NULL,
  `septicTank` tinyint(1) DEFAULT NULL,
  `sewerageDischargeLocation` varchar(255) DEFAULT NULL,
  `waterSupply` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_cenro`
--

INSERT INTO `application_cenro` (`applicationId`, `userId`, `businessId`, `referenceNum`, `CNC`, `LLDAClearance`, `dischargePermit`, `apsci`, `productsAndByProducts`, `smokeEmission`, `volatileCompound`, `fugitiveParticulates`, `steamGenerator`, `APCD`, `stackHeight`, `wastewaterTreatmentFacility`, `wastewaterTreatmentOperationAndProcess`, `pendingCaseWithLLDA`, `typeOfSolidWastesGenerated`, `qtyPerDay`, `garbageCollectionMethod`, `frequencyOfGarbageCollection`, `wasteCollector`, `collectorAddress`, `garbageDisposalMethod`, `wasteMinimizationMethod`, `drainageSystem`, `drainageType`, `drainageDischargeLocation`, `sewerageSystem`, `septicTank`, `sewerageDischargeLocation`, `waterSupply`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 24, 1, '9FAEA9BEB4', '07/17/2015', '02/14/2017', 'NA', 'NA', 'NA', 1, 1, 'Mist', 'Boiler', 'AQMS', '5', 'Dumpsite', 1, 'NA', 'Garbage', 200, 'Disposal', 'Weekly', 'Jason Garbage Collection', 'Bacoor, Cavite', 'Controlled Dumpsite', 'Recycling|Reduction', 1, 'Close/Underground', 'Public Drainage System', 1, 0, 'NA', 'Deep Well', 'For applicant visit', '2017-03-01 02:31:46', '2017-03-01 02:43:18'),
(2, 24, 2, 'AE29D1B98F', 'NA', 'NA', 'NA', 'NA', '', 0, 0, 'Dust', 'NA', 'NA', '0', 'NA', 1, 'NA', 'Household Wastes', 12, 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Sanitary Landfill', 'NA', 0, 'NA', 'NA', 0, 0, 'NA', 'Deep Well', 'For applicant visit', '2017-03-01 02:37:10', '2017-03-03 02:35:07'),
(3, 24, 3, '739862FF5C', 'NA', 'NA', 'NA', 'NA', '', 0, 0, 'Mist|Gas', 'Furnace', 'AQMS', '200', 'NA', 1, '0100', 'Industrial Waste', 3, 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Controlled Dumpsite', 'Recycling|Reduction|Reuse', 1, 'Close/Underground', 'Public Drainage System', 1, 1, 'Treatment in Septic Tank', 'Water Utility', 'Expired', '2016-03-01 02:48:56', '2017-03-05 05:29:58'),
(4, 24, 4, 'A98409F68C', '07/23/2015', '05/16/2017', 'NA', 'NA', 'Foods', 1, 0, 'Mist', 'Boiler', 'NA', '0', 'Wastewater site', 1, 'NA', 'Food residues', 50, 'Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Sanitary Landfill', 'NA', 1, 'Close/Underground', 'Public Drainage System', 1, 1, 'Public Drainage System', 'Water Utility', 'For applicant visit', '2017-03-01 02:52:19', '2017-03-01 08:34:40'),
(5, 24, 6, 'A03F21C5BC', '02/20/2017', '02/20/2017', '02/20/2017', '02/20/2017', 'Gem stones', 0, 0, 'Dust', 'NA', 'NA', 'NA', 'Lumya ', 1, 'NA', 'NA', 0, 'NA', 'Weekly', 'Vonn Mesina', 'B2 L34 Tibo St. Bagong bayan Molino 3 Bacoor, Cavite', 'Sanitary Landfill', 'Recycling', 1, 'Close/Underground', 'Public Drainage System', 1, 0, 'NA', 'Water Utility', 'Active', '2017-03-01 02:55:10', '2017-03-01 08:17:26'),
(6, 24, 5, '3BA448289A', 'NA', 'NA', 'NA', 'NA', '', 0, 1, 'Mist', 'Furnace', 'NA', '0', 'NA', 0, 'NA', 'Residues', 400, 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Controlled Dumpsite', 'Recycling|Reduction', 1, 'Close/Underground', 'Public Drainage System', 1, 0, 'NA', 'Water Utility', 'Active', '2017-03-01 02:58:41', '2017-03-05 00:28:20'),
(7, 24, 7, '9FBDFC51AA', 'NA', 'NA', 'NA', 'NA', '', 0, 0, 'Mist|Gas', 'Furnace', 'NA', '12', 'NA', 0, 'NA', 'Industrial Waste', 10, 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Controlled Dumpsite', 'Reduction', 0, 'NA', 'NA', 0, 0, 'NA', 'Deep Well', 'For applicant visit', '2017-03-01 03:04:11', '2017-03-02 13:04:53'),
(8, 24, NULL, '8D6467E448', 'NA', 'NA', 'NA', 'NA', '', 0, 0, 'NA', 'NA', '', '', '', 0, 'NA', '', 0, '', 'Daily', '', '', 'Sanitary Landfill', 'NA', 0, 'NA', 'NA', 0, 0, 'NA', 'Deep Well', 'Draft', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `application_engineering`
--

CREATE TABLE IF NOT EXISTS `application_engineering` (
  `applicationId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `businessId` int(10) DEFAULT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_engineering`
--

INSERT INTO `application_engineering` (`applicationId`, `userId`, `businessId`, `referenceNum`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 24, 1, '9FAEA9BEB4', 'Active', '2017-03-01 02:31:46', '2017-03-01 02:42:37'),
(2, 24, 2, 'AE29D1B98F', 'Active', '2017-03-01 02:37:10', '2017-03-03 02:33:51'),
(3, 24, 3, '739862FF5C', 'Expired', '2016-03-01 02:48:56', '2017-03-05 05:29:59'),
(4, 24, 4, 'A98409F68C', 'Active', '2017-03-01 02:52:19', '2017-03-01 08:33:44'),
(5, 24, 6, 'A03F21C5BC', 'Active', '2017-03-01 02:55:10', '2017-03-01 08:08:48'),
(6, 24, 5, '3BA448289A', 'Active', '2017-03-01 02:58:41', '2017-03-01 08:41:25'),
(7, 24, 7, '9FBDFC51AA', 'Active', '2017-03-01 03:04:11', '2017-03-02 12:53:11'),
(8, 24, NULL, '8D6467E448', 'Draft', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `application_sanitary`
--

CREATE TABLE IF NOT EXISTS `application_sanitary` (
  `applicationId` int(255) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `userId` int(5) NOT NULL,
  `businessId` int(10) DEFAULT NULL,
  `applicationDate` varchar(60) NOT NULL,
  `annualEmployeePhysicalExam` tinyint(1) DEFAULT NULL,
  `typeLevelOfWaterSource` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_sanitary`
--

INSERT INTO `application_sanitary` (`applicationId`, `referenceNum`, `userId`, `businessId`, `applicationDate`, `annualEmployeePhysicalExam`, `typeLevelOfWaterSource`, `status`, `createdAt`, `updatedAt`) VALUES
(1, '9FAEA9BEB4', 24, 1, 'March 1, 2017', 1, 'Water tank', 'For applicant visit', '2017-03-01 02:31:46', '2017-03-01 02:43:18'),
(2, 'AE29D1B98F', 24, 2, 'March 1, 2017', 1, 'NA', 'For applicant visit', '2017-03-01 02:37:10', '2017-03-03 02:35:06'),
(3, '739862FF5C', 24, 3, 'March 1, 2016', 1, 'Water Tank', 'Expired', '2016-03-01 02:48:56', '2017-03-05 05:29:58'),
(4, 'A98409F68C', 24, 4, 'March 1, 2017', 1, 'Lagunawater', 'For applicant visit', '2017-03-01 02:52:19', '2017-03-01 08:34:40'),
(5, 'A03F21C5BC', 24, 6, 'March 1, 2017', 1, 'Maynilad', 'Active', '2017-03-01 02:55:10', '2017-03-01 08:15:31'),
(6, '3BA448289A', 24, 5, 'March 1, 2017', 1, 'Binanwater', 'Active', '2017-03-01 02:58:41', '2017-03-05 00:28:40'),
(7, '9FBDFC51AA', 24, 7, 'March 2, 2017', 1, 'Water Tank', 'For applicant visit', '2017-03-01 03:04:11', '2017-03-02 13:04:53'),
(8, '8D6467E448', 24, NULL, 'March 3, 2017', 1, '', 'Draft', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `application_zoning`
--

CREATE TABLE IF NOT EXISTS `application_zoning` (
  `applicationId` int(255) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `userId` int(5) NOT NULL,
  `businessId` int(10) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_zoning`
--

INSERT INTO `application_zoning` (`applicationId`, `referenceNum`, `userId`, `businessId`, `status`, `createdAt`, `updatedAt`) VALUES
(1, '9FAEA9BEB4', 24, 1, 'For applicant visit', '2017-03-01 02:31:46', '2017-03-01 02:43:18'),
(2, 'AE29D1B98F', 24, 2, 'For applicant visit', '2017-03-01 02:37:10', '2017-03-03 02:35:06'),
(3, '739862FF5C', 24, 3, 'Expired', '2016-03-01 02:48:56', '2017-03-05 05:29:58'),
(4, 'A98409F68C', 24, 4, 'For applicant visit', '2017-03-01 02:52:19', '2017-03-01 08:34:40'),
(5, 'A03F21C5BC', 24, 6, 'Active', '2017-03-01 02:55:10', '2017-03-01 08:13:05'),
(6, '3BA448289A', 24, 5, 'Active', '2017-03-01 02:58:41', '2017-03-05 00:27:45'),
(7, '9FBDFC51AA', 24, 7, 'For applicant visit', '2017-03-01 03:04:11', '2017-03-02 13:04:53'),
(8, '8D6467E448', 24, NULL, 'Draft', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE IF NOT EXISTS `approvals` (
  `approvalId` int(10) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `type` varchar(255) NOT NULL,
  `staff` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`approvalId`, `referenceNum`, `role`, `type`, `staff`, `createdAt`, `updatedAt`) VALUES
(1, '9FAEA9BEB4', 9, 'Validate', 'tester engineering', '2017-03-01 02:42:33', '2017-03-01 02:42:33'),
(2, '9FAEA9BEB4', 9, 'Approve', 'tester engineering', '2017-03-01 02:42:37', '2017-03-01 02:42:37'),
(3, '9FAEA9BEB4', 4, 'Approve Capital', 'tester bplo', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(4, '739862FF5C', 9, 'Validate', 'tester engineering', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(6, '739862FF5C', 9, 'Approve', 'tester engineering', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(7, '739862FF5C', 4, 'Approve Capital', 'tester bplo', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(8, '739862FF5C', 7, 'Validate', 'tester cenro', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(9, '739862FF5C', 7, 'Approve', 'tester cenro', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(10, '739862FF5C', 8, 'Validate', 'tester zoning', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(11, '739862FF5C', 8, 'Approve', 'tester zoning', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(12, '739862FF5C', 10, 'Validate', 'tester sanitary', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(13, '739862FF5C', 10, 'Approve', 'tester sanitary', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(14, '739862FF5C', 5, 'Validate', 'tester bfp', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(16, '739862FF5C', 5, 'Approve', 'tester bfp', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(17, '739862FF5C', 4, 'Issue', 'tester bplo', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(18, 'A03F21C5BC', 9, 'Validate', 'tester engineering', '2017-03-01 08:08:37', '2017-03-01 08:08:37'),
(19, 'A03F21C5BC', 9, 'Approve', 'tester engineering', '2017-03-01 08:08:49', '2017-03-01 08:08:49'),
(20, 'A03F21C5BC', 4, 'Approve Capital', 'tester bplo', '2017-03-01 08:09:29', '2017-03-01 08:09:29'),
(21, 'A03F21C5BC', 8, 'Validate', 'tester zoning', '2017-03-01 08:12:56', '2017-03-01 08:12:56'),
(22, 'A03F21C5BC', 8, 'Approve', 'tester zoning', '2017-03-01 08:13:05', '2017-03-01 08:13:05'),
(23, 'A03F21C5BC', 10, 'Validate', 'tester sanitary', '2017-03-01 08:15:17', '2017-03-01 08:15:17'),
(24, 'A03F21C5BC', 10, 'Approve', 'tester sanitary', '2017-03-01 08:15:31', '2017-03-01 08:15:31'),
(25, 'A03F21C5BC', 5, 'Validate', 'tester bfp', '2017-03-01 08:16:28', '2017-03-01 08:16:28'),
(26, 'A03F21C5BC', 5, 'Approve', 'tester bfp', '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(27, 'A03F21C5BC', 7, 'Validate', 'tester cenro', '2017-03-01 08:17:14', '2017-03-01 08:17:14'),
(28, 'A03F21C5BC', 7, 'Approve', 'tester cenro', '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(29, 'A03F21C5BC', 4, 'Issue', 'tester bplo', '2017-03-01 08:18:46', '2017-03-01 08:18:46'),
(30, 'A98409F68C', 9, 'Validate', 'tester engineering', '2017-03-01 08:33:39', '2017-03-01 08:33:39'),
(31, 'A98409F68C', 9, 'Approve', 'tester engineering', '2017-03-01 08:33:44', '2017-03-01 08:33:44'),
(32, 'A98409F68C', 4, 'Approve Capital', 'tester bplo', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(33, '3BA448289A', 9, 'Validate', 'tester engineering', '2017-03-01 08:41:17', '2017-03-01 08:41:17'),
(34, '3BA448289A', 9, 'Approve', 'tester engineering', '2017-03-01 08:41:25', '2017-03-01 08:41:25'),
(35, '3BA448289A', 4, 'Approve Capital', 'tester bplo', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(36, '9FBDFC51AA', 9, 'Validate', 'tester engineering', '2017-03-02 12:53:02', '2017-03-02 12:53:02'),
(37, '9FBDFC51AA', 9, 'Approve', 'tester engineering', '2017-03-02 12:53:11', '2017-03-02 12:53:11'),
(38, '9FBDFC51AA', 4, 'Approve Capital', 'tester bplo', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(39, 'AE29D1B98F', 9, 'Validate', 'tester engineering', '2017-03-03 02:32:58', '2017-03-03 02:32:58'),
(40, 'AE29D1B98F', 9, 'Approve', 'tester engineering', '2017-03-03 02:33:52', '2017-03-03 02:33:52'),
(41, 'AE29D1B98F', 4, 'Approve Capital', 'tester bplo', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(44, '739862FF5C', 4, 'Receive Payment', 'tester bplo', '2016-03-01 07:14:13', '2016-03-01 07:14:13'),
(45, '3BA448289A', 8, 'Validate', 'tester zoning', '2017-03-05 00:27:42', '2017-03-05 00:27:42'),
(46, '3BA448289A', 8, 'Approve', 'tester zoning', '2017-03-05 00:27:46', '2017-03-05 00:27:46'),
(47, '3BA448289A', 7, 'Validate', 'tester cenro', '2017-03-05 00:28:08', '2017-03-05 00:28:08'),
(48, '3BA448289A', 7, 'Approve', 'tester cenro', '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(49, '3BA448289A', 10, 'Validate', 'tester sanitary', '2017-03-05 00:28:36', '2017-03-05 00:28:36'),
(50, '3BA448289A', 10, 'Approve', 'tester sanitary', '2017-03-05 00:28:40', '2017-03-05 00:28:40'),
(51, '3BA448289A', 5, 'Validate', 'tester bfp', '2017-03-05 00:29:04', '2017-03-05 00:29:04'),
(52, '3BA448289A', 5, 'Approve', 'tester bfp', '2017-03-05 00:29:11', '2017-03-05 00:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `archived_applications`
--

CREATE TABLE IF NOT EXISTS `archived_applications` (
  `archiveId` int(10) NOT NULL,
  `referenceNum` varchar(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `taxYear` varchar(255) NOT NULL,
  `applicationDate` varchar(255) NOT NULL,
  `modeOfPayment` varchar(255) NOT NULL,
  `idPresented` varchar(255) NOT NULL,
  `DTISECCDA_RegNum` varchar(255) NOT NULL,
  `DTISECCDA_Date` varchar(255) NOT NULL,
  `brgyClearanceDateIssued` varchar(255) NOT NULL,
  `CTCNum` varchar(255) NOT NULL,
  `TIN` varchar(255) NOT NULL,
  `entityName` varchar(255) NOT NULL,
  `dateStarted` varchar(255) NOT NULL,
  `presidentTreasurerName` varchar(255) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `tradeName` varchar(255) NOT NULL,
  `signageName` varchar(255) NOT NULL,
  `organizationType` varchar(255) NOT NULL,
  `corporationName` varchar(255) NOT NULL,
  `dateOfOperation` varchar(255) NOT NULL,
  `businessDesc` varchar(255) NOT NULL,
  `PIN` varchar(255) NOT NULL,
  `bldgName` varchar(255) NOT NULL,
  `houseBldgNum` varchar(255) NOT NULL,
  `unitNum` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `cityMunicipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `telNum` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pollutionControlOfficer` varchar(255) NOT NULL,
  `maleEmployees` varchar(255) NOT NULL,
  `femaleEmployees` varchar(255) NOT NULL,
  `PWDEmployees` varchar(255) NOT NULL,
  `LGUEMployees` varchar(255) NOT NULL,
  `businessArea` varchar(255) NOT NULL,
  `emergencyContactPerson` varchar(255) NOT NULL,
  `emergencyTelNum` varchar(255) NOT NULL,
  `emergencyEmail` varchar(255) NOT NULL,
  `zoneType` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `gmapAddress` varchar(255) NOT NULL,
  `ownerFirstName` varchar(255) NOT NULL,
  `ownerMiddleName` varchar(255) NOT NULL,
  `ownerLastName` varchar(255) NOT NULL,
  `ownerHouseBldgNum` varchar(255) NOT NULL,
  `ownerBldgName` varchar(255) NOT NULL,
  `ownerUnitNum` varchar(255) NOT NULL,
  `ownerStreet` varchar(255) NOT NULL,
  `ownerBarangay` varchar(255) NOT NULL,
  `ownerSubdivision` varchar(255) NOT NULL,
  `ownerCityMunicipality` varchar(255) NOT NULL,
  `ownerProvince` varchar(255) NOT NULL,
  `ownerContactNum` varchar(255) NOT NULL,
  `ownerTelNum` varchar(255) NOT NULL,
  `ownerEmail` varchar(255) NOT NULL,
  `ownerPIN` varchar(255) NOT NULL,
  `CNC` varchar(255) NOT NULL,
  `LLDAClearance` varchar(255) NOT NULL,
  `dischargePermit` varchar(255) NOT NULL,
  `apsci` varchar(255) NOT NULL,
  `productsAndByProducts` varchar(255) NOT NULL,
  `smokeEmission` varchar(255) NOT NULL,
  `volatileCompound` varchar(255) NOT NULL,
  `fugitiveParticulates` varchar(255) NOT NULL,
  `steamGenerator` varchar(255) NOT NULL,
  `APCD` varchar(255) NOT NULL,
  `stackHeight` varchar(255) NOT NULL,
  `wastewaterTreatmentFacility` varchar(255) NOT NULL,
  `wastewaterTreatmentOperationAndProcess` varchar(255) NOT NULL,
  `pendingCaseWithLLDA` varchar(255) NOT NULL,
  `typeOfSolidWastesGenerated` varchar(255) NOT NULL,
  `qtyPerDay` varchar(255) NOT NULL,
  `garbageCollectionMethod` varchar(255) NOT NULL,
  `frequencyOfGarbageCollection` varchar(255) NOT NULL,
  `wasteCollector` varchar(255) NOT NULL,
  `collectorAddress` varchar(255) NOT NULL,
  `garbageDisposalMethod` varchar(255) NOT NULL,
  `wasteMinimizationMethod` varchar(255) NOT NULL,
  `drainageSystem` varchar(255) NOT NULL,
  `drainageType` varchar(255) NOT NULL,
  `drainageDischargeLocation` varchar(255) NOT NULL,
  `sewerageSystem` varchar(255) NOT NULL,
  `septicTank` varchar(255) NOT NULL,
  `sewerageDischargeLocation` varchar(255) NOT NULL,
  `waterSupply` varchar(255) NOT NULL,
  `storeys` varchar(255) NOT NULL,
  `occupiedPortion` varchar(255) NOT NULL,
  `areaPerFloor` varchar(255) NOT NULL,
  `occupancyPermitNum` varchar(255) NOT NULL,
  `annualEmployeePhysicalExam` varchar(255) NOT NULL,
  `typeLevelOfWaterSource` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archived_business_activities`
--

CREATE TABLE IF NOT EXISTS `archived_business_activities` (
  `archiveId` int(10) NOT NULL,
  `archiveApplicationId` int(10) NOT NULL,
  `lineOfBusiness` varchar(255) NOT NULL,
  `capitalization` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archived_lessors`
--

CREATE TABLE IF NOT EXISTS `archived_lessors` (
  `archiveId` int(10) NOT NULL,
  `archiveApplicationId` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `cityMunicipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `monthlyRental` varchar(255) NOT NULL,
  `telNum` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE IF NOT EXISTS `assessments` (
  `assessmentId` int(10) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `paidUpTo` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessmentId`, `referenceNum`, `amount`, `paidUpTo`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'AE29D1B98F', 7730, 'None', 'New', '2017-03-01 02:37:10', '2017-03-03 02:35:06'),
(2, '9FAEA9BEB4', 26600, 'None', 'New', '2017-03-01 02:41:26', '2017-03-01 02:43:18'),
(3, '739862FF5C', 0, 'Fourth Quarter', 'New', '2016-03-01 02:50:54', '2016-03-04 07:53:59'),
(4, 'A98409F68C', 26450, 'None', 'New', '2017-03-01 02:52:19', '2017-03-01 08:34:40'),
(6, 'A03F21C5BC', 0, 'Fourth Quarter', 'New', '2017-03-01 08:07:17', '2017-03-01 08:18:46'),
(7, '3BA448289A', 13900, 'None', 'New', '2017-03-01 08:40:30', '2017-03-01 08:42:10'),
(8, '9FBDFC51AA', 8080, 'None', 'New', '2017-03-02 12:52:39', '2017-03-02 13:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `bowling_alleys`
--

CREATE TABLE IF NOT EXISTS `bowling_alleys` (
  `activityId` int(10) NOT NULL,
  `nonAutomaticLanes` int(60) NOT NULL,
  `automaticLanes` int(60) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `businessId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `ownerId` int(10) NOT NULL,
  `presidentTreasurerName` varchar(255) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `tradeName` varchar(255) NOT NULL,
  `signageName` varchar(255) NOT NULL,
  `organizationType` varchar(255) NOT NULL,
  `corporationName` varchar(255) NOT NULL,
  `dateOfOperation` varchar(255) NOT NULL,
  `zoneType` varchar(255) NOT NULL,
  `businessDesc` varchar(255) NOT NULL,
  `PIN` int(255) NOT NULL,
  `bldgName` varchar(255) NOT NULL,
  `houseBldgNum` varchar(255) NOT NULL,
  `unitNum` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `cityMunicipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `gmapAddress` varchar(255) NOT NULL,
  `telNum` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pollutionControlOfficer` varchar(255) NOT NULL,
  `maleEmployees` int(255) NOT NULL,
  `femaleEmployees` int(255) NOT NULL,
  `PWDEmployees` int(255) NOT NULL,
  `businessArea` varchar(255) NOT NULL,
  `LGUResidingEmployees` int(255) NOT NULL,
  `emergencyContactPerson` varchar(255) NOT NULL,
  `emergencyTelNum` varchar(255) NOT NULL,
  `emergencyEmail` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`businessId`, `userId`, `ownerId`, `presidentTreasurerName`, `businessName`, `companyName`, `tradeName`, `signageName`, `organizationType`, `corporationName`, `dateOfOperation`, `zoneType`, `businessDesc`, `PIN`, `bldgName`, `houseBldgNum`, `unitNum`, `street`, `barangay`, `subdivision`, `cityMunicipality`, `province`, `lat`, `lng`, `gmapAddress`, `telNum`, `email`, `pollutionControlOfficer`, `maleEmployees`, `femaleEmployees`, `PWDEmployees`, `businessArea`, `LGUResidingEmployees`, `emergencyContactPerson`, `emergencyTelNum`, `emergencyEmail`, `createdAt`, `updatedAt`) VALUES
(1, 24, 1, 'Billy Labay', 'Mastermind Incorporated', 'Mastermind Incorporated', 'Mastermind Incorporated', 'mastermind-incorporated', 'Corporation', 'Mastermind Incorporated', '02/15/2017', 'Single residential', 'Software Development', 4024, 'Mastermind Building', 'B39 L16', '59', 'NA', 'Zapote', 'NA', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '0961245125', 'sales@mastermind.inc', 'Jason Hernandez', 37, 45, 15, '400', 20, 'Billy Labay', '09178715969', 'billy_labay@yahoo.com', '2017-03-01 02:19:28', '2017-03-01 02:19:28'),
(2, 24, 8, 'Renjo Dolosa', 'Grind Spot Internet Cafe', 'NA', 'NA', 'Grind Spot Internet Cafe', 'Single', 'NA', '03/01/2017', 'Single residential', 'Computer Shop', 4024, 'NA', 'Blk 29 Lot 19', 'NA', 'Dumaguete Street', 'Santo Domingo', 'South City Homes', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '8393969', 'grindspot@yahoo.com', 'Jason Hernandez', 10, 3, 0, '120', 5, 'Jason Hernandez', '09175138266', 'dolosa.renjo@yahoo.com', '2017-03-01 02:31:25', '2017-03-03 06:49:29'),
(3, 24, 4, 'Reymon Molina', 'Reymond Trucking Services', 'NA', 'NA', 'Reymon Trucking Services', 'Partnership', 'NA', '02/10/2016', 'Commercial/Industrial kind', 'NA', 4024, 'NA', 'Blk 29 Lot 20', 'NA', 'Dumaguete Street', 'Loma', 'South City Homes', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '8393969', 'reymon@yahoo.com', 'Jason Hernandez', 5, 3, 0, '200', 3, 'Jason Hernandez', '09175138266', 'hernandez.jason@yahoo.com', '2016-03-01 02:47:14', '2016-03-04 07:34:01'),
(4, 24, 5, 'Migi Descalzo', 'Migiflakes', 'Migiflakes', 'Migiflakes', 'migiflakes', 'Single', 'NA', '02/21/2017', 'Commercial/Industrial kind', 'Food manufacturing buscuit', 4024, 'Mercurial', '6', '5', '5th Street Avenue', 'Loma', 'NA', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '81258', 'migiflakes@yahoo.com', 'Exequiel Villar', 50, 0, 0, '500', 23, 'Jason Hernandez', '0912556123', 'jthernz@yahoo.com', '2017-03-01 02:49:14', '2017-03-01 06:11:49'),
(5, 24, 6, 'Kris Mariano', 'Magpamasahe kay Exe', 'Exe Group of Co.', 'Exe Group of Co.', 'Exe', 'Corporation', 'Exe Group of Co.', '03/01/2017', 'Apartments/Townhouses', 'Spa and rejuvenation', 4100, 'GPS', 'B6 L89', '996', 'South Point', 'Zapote', 'Carson', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '69-788', 'kris.mariano@yahoo.com', 'Kris Mariano', 6, 9, 0, '300', 15, 'Kris Mariano', '09234238989', 'kris.mariano@yahoo.com', '2017-03-01 02:51:19', '2017-03-04 01:55:44'),
(6, 24, 3, 'Aemon Delos Reyes', 'Aimbot', 'Aimbot', 'Aimbot', 'Aimbotaemon', 'Corporation', 'Aimbot Corps.', '02/26/2017', 'Commercial/Industrial kind', 'Aimbot Manufacturing', 4024, 'Aimbot Bldg.', 'B38', '5', 'NA', 'Malaban', 'NA', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '123456', 'aimbothax@gmail.com', 'Jason Hernandez', 200, 176, 0, '4000', 120, 'Renjo Dolosa', '09125981251', 'rjpower@yahoo.com', '2017-03-01 02:56:08', '2017-03-01 06:11:54'),
(7, 24, 7, 'Jason Hernandez', 'Jason''s Basurahan', 'NA', 'Jason''s Basurahan', 'Jason''s Basurahan', 'Single', 'NA', '03/01/2017', 'Commercial/Industrial kind', 'dumpsite', 4024, 'NA', 'Blk 29 Lot 21', 'NA', 'Dumaguete Street', 'Malaban', 'South City Homes', 'Biñan City', 'Laguna', '14.314304859110639', '121.08557510349783', 'Unnamed Road, Biñan, Laguna, Philippines', '8393969', 'jason@yahoo.com', 'Exequiel Villar', 15, 0, 0, '320', 10, 'Jason Hernandez', '09175138266', 'hernandez.jason@yahoo.com', '2017-03-01 02:57:21', '2017-03-01 06:11:59'),
(8, 24, 9, 'Rico Bihis', 'R V BIHIS TRUCKING SERVICES', 'NA', 'R V BIHIS TRUCKING SERVICES', 'R V BIHIS TRUCKING SERVICES', 'Single', 'NA', '03/02/2017', 'Commercial/Industrial kind', 'Trucking Services', 4024, 'NA', 'NA', 'NA', 'NA', 'San Vicente', 'Don Pablo Subdivision', 'Biñan City', 'Laguna', '14.330336609501085', '121.07960343360901', '332 F. Reyes St, Biñan, Laguna, Philippines', '0498395689', 'bihistrucking@gmail.com', 'NA', 12, 3, 0, '250', 15, 'Rico Bihis', '0498395689', 'bihistrucking@gmail.com', '2017-03-04 04:47:56', '2017-03-04 04:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `business_activities`
--

CREATE TABLE IF NOT EXISTS `business_activities` (
  `activityId` int(255) NOT NULL,
  `bploId` int(10) NOT NULL,
  `lineOfBusiness` varchar(255) DEFAULT NULL,
  `capitalization` varchar(255) DEFAULT NULL,
  `activityStatus` varchar(30) NOT NULL DEFAULT 'active',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_activities`
--

INSERT INTO `business_activities` (`activityId`, `bploId`, `lineOfBusiness`, `capitalization`, `activityStatus`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Others', '800000', 'active', '2017-03-01 02:37:10', '2017-03-01 02:37:10'),
(2, 1, 'Manufacturing Kind', '2000000', 'active', '2017-03-01 02:41:26', '2017-03-01 02:41:26'),
(3, 1, 'Retailer', '1500000', 'active', '2017-03-01 02:41:26', '2017-03-01 02:41:26'),
(4, 3, 'Manufacturing Kind', '500000', 'active', '2017-03-01 02:50:54', '2017-03-01 02:50:54'),
(5, 3, 'Exporter', '1000000', 'active', '2017-03-01 02:50:54', '2017-03-01 02:50:54'),
(6, 4, 'Manufacturing Kind', '10000000', 'active', '2017-03-01 02:52:20', '2017-03-01 02:52:20'),
(7, 4, 'Wholesaler Kind', '7000000', 'active', '2017-03-01 02:52:20', '2017-03-01 02:52:20'),
(9, 5, 'Contractor', '1000000', 'active', '2017-03-01 08:07:17', '2017-03-01 08:07:17'),
(10, 6, 'Exporter', '1000000', 'active', '2017-03-01 08:40:30', '2017-03-01 08:40:30'),
(11, 6, 'Wholesaler Kind', '1000000', 'active', '2017-03-01 08:40:30', '2017-03-01 08:40:30'),
(12, 7, 'Others', '200000', 'active', '2017-03-02 12:52:39', '2017-03-02 12:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

CREATE TABLE IF NOT EXISTS `changes` (
  `id` int(10) NOT NULL,
  `referenceNum` varchar(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `_from` varchar(255) NOT NULL,
  `_to` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changes`
--

INSERT INTO `changes` (`id`, `referenceNum`, `type`, `_from`, `_to`, `createdAt`, `updatedAt`) VALUES
(1, '739862FF5C', 'Change Business Name', 'Renjo Trucking Services', 'Reymond Trucking Services', '2017-03-04 07:34:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `chargeId` int(10) NOT NULL,
  `assessmentId` int(10) NOT NULL,
  `period` varchar(5) NOT NULL,
  `due` double NOT NULL,
  `surcharge` double NOT NULL,
  `interest` double NOT NULL,
  `particulars` varchar(255) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'not paid',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`chargeId`, `assessmentId`, `period`, `due`, `surcharge`, `interest`, `particulars`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'not paid', '2017-03-01 02:42:37', '2017-03-01 02:42:37'),
(2, 2, 'F1', 3500, 0, 0, 'MAYOR''S PERMIT FEE (MANUFACTURING KIND)', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(3, 2, 'Q1', 87.5, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(4, 2, 'Q2', 87.5, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(5, 2, 'Q3', 87.5, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(6, 2, 'Q4', 87.5, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(7, 2, 'F1', 1500, 0, 0, 'MAYOR''S PERMIT FEE (RETAILER)', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(8, 2, 'F1', 150, 0, 0, 'TAX ON RETAILER', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(9, 2, 'F1', 1200, 0, 0, 'GARBAGE SERVICE FEE', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(10, 2, 'F1', 2000, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(11, 2, 'F1', 14550, 0, 0, 'HEALTH CARD FEE', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(12, 2, 'F1', 1600, 0, 0, 'SANITARY PERMIT FEE', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(13, 2, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(14, 2, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(15, 2, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'not paid', '2017-03-01 02:43:18', '2017-03-01 02:43:18'),
(16, 3, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(17, 3, 'F1', 1000, 0, 0, 'MAYOR''S PERMIT FEE (MANUFACTURING KIND)', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(18, 3, 'F1', 100, 0, 0, 'TAX ON MANUFACTURING KIND', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(19, 3, 'F1', 2500, 0, 0, 'MAYOR''S PERMIT FEE (EXPORTER)', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(20, 3, 'Q1', 125, 0, 0, 'TAX ON EXPORTER', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(21, 3, 'Q2', 125, 0, 0, 'TAX ON EXPORTER', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(22, 3, 'F1', 1200, 0, 0, 'GARBAGE SERVICE FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(23, 3, 'F1', 1500, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(24, 3, 'F1', 1200, 0, 0, 'HEALTH CARD FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(25, 3, 'F1', 800, 0, 0, 'SANITARY PERMIT FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(26, 3, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(27, 3, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(28, 3, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02'),
(29, 6, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'paid', '2017-03-01 08:08:48', '2017-03-01 08:18:46'),
(30, 6, 'F1', 5000, 0, 0, 'MAYOR''S PERMIT FEE (CONTRACTOR)', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(31, 6, 'Q1', 500, 0, 0, 'TAX ON CONTRACTOR', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(32, 6, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(33, 6, 'F1', 750, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(34, 6, 'F1', 56400, 0, 0, 'HEALTH CARD FEE', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(35, 6, 'F1', 16000, 0, 0, 'SANITARY PERMIT FEE', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(36, 6, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(37, 6, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(38, 6, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'paid', '2017-03-01 08:09:29', '2017-03-01 08:18:46'),
(39, 4, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'not paid', '2017-03-01 08:33:44', '2017-03-01 08:33:44'),
(40, 4, 'F1', 5000, 0, 0, 'MAYOR''S PERMIT FEE (MANUFACTURING KIND)', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(41, 4, 'Q1', 125, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(42, 4, 'Q2', 125, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(43, 4, 'Q3', 125, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(44, 4, 'Q4', 125, 0, 0, 'TAX ON MANUFACTURING KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(45, 4, 'F1', 5000, 0, 0, 'MAYOR''S PERMIT FEE (WHOLESALER KIND)', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(46, 4, 'Q1', 125, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(47, 4, 'Q2', 125, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(48, 4, 'Q3', 125, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(49, 4, 'Q4', 125, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(50, 4, 'F1', 1200, 0, 0, 'GARBAGE SERVICE FEE', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(51, 4, 'F1', 3000, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(52, 4, 'F1', 7500, 0, 0, 'HEALTH CARD FEE', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(53, 4, 'F1', 2000, 0, 0, 'SANITARY PERMIT FEE', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(54, 4, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(55, 4, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(56, 4, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'not paid', '2017-03-01 08:34:40', '2017-03-01 08:34:40'),
(57, 7, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'not paid', '2017-03-01 08:41:25', '2017-03-01 08:41:25'),
(58, 7, 'F1', 3500, 0, 0, 'MAYOR''S PERMIT FEE (WHOLESALER KIND)', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(59, 7, 'Q1', 87.5, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(60, 7, 'Q2', 87.5, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(61, 7, 'Q3', 87.5, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(62, 7, 'Q4', 87.5, 0, 0, 'TAX ON WHOLESALER KIND', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(63, 7, 'F1', 2500, 0, 0, 'MAYOR''S PERMIT FEE (EXPORTER)', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(64, 7, 'Q1', 62.5, 0, 0, 'TAX ON EXPORTER', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(65, 7, 'Q2', 62.5, 0, 0, 'TAX ON EXPORTER', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(66, 7, 'Q3', 62.5, 0, 0, 'TAX ON EXPORTER', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(67, 7, 'Q4', 62.5, 0, 0, 'TAX ON EXPORTER', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(68, 7, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(69, 7, 'F1', 1500, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(70, 7, 'F1', 2250, 0, 0, 'HEALTH CARD FEE', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(71, 7, 'F1', 1200, 0, 0, 'SANITARY PERMIT FEE', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(72, 7, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(73, 7, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(74, 7, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'not paid', '2017-03-01 08:42:10', '2017-03-01 08:42:10'),
(75, 8, 'F1', 500, 0, 0, 'ANNUAL INSPECTION FEE', 'not paid', '2017-03-02 12:53:11', '2017-03-02 12:53:11'),
(76, 8, 'F1', 2000, 0, 0, 'MAYOR''S PERMIT FEE (OTHERS)', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(77, 8, 'F1', 200, 0, 0, 'TAX ON OTHERS', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(78, 8, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(79, 8, 'F1', 500, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(80, 8, 'F1', 2250, 0, 0, 'HEALTH CARD FEE', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(81, 8, 'F1', 1280, 0, 0, 'SANITARY PERMIT FEE', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(82, 8, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(83, 8, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(84, 8, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'not paid', '2017-03-02 13:04:53', '2017-03-02 13:04:53'),
(85, 1, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'not paid', '2017-03-03 02:33:51', '2017-03-03 02:33:51'),
(86, 1, 'F1', 2000, 0, 0, 'MAYOR''S PERMIT FEE (OTHERS)', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(87, 1, 'F1', 200, 0, 0, 'TAX ON OTHERS', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(88, 1, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(89, 1, 'F1', 750, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(90, 1, 'F1', 1950, 0, 0, 'HEALTH CARD FEE', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(91, 1, 'F1', 480, 0, 0, 'SANITARY PERMIT FEE', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(92, 1, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(93, 1, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(94, 1, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'not paid', '2017-03-03 02:35:06', '2017-03-03 02:35:06'),
(95, 3, 'F1', 200, 0, 0, 'CHANGE OF BUSINESS NAME FEE', 'paid', '2016-03-04 07:34:02', '2016-03-04 07:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `userId` int(10) NOT NULL,
  `permissionLevel` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`userId`, `permissionLevel`, `createdAt`, `updatedAt`) VALUES
(3, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(4, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(5, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(6, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(19, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(20, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(25, 1, '2017-03-05 02:46:41', '2017-03-05 02:46:41'),
(26, 2, '2017-03-05 02:53:45', '2017-03-05 02:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `fee_amusement_devices`
--

CREATE TABLE IF NOT EXISTS `fee_amusement_devices` (
  `amusementDeviceId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ratePerUnit` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_amusement_devices`
--

INSERT INTO `fee_amusement_devices` (`amusementDeviceId`, `name`, `ratePerUnit`, `createdAt`, `updatedAt`) VALUES
(2, 'Videoke, Karaoke, and Jukebox Machine', 500, '2017-02-25 01:57:51', '2017-02-25 01:57:51'),
(3, 'Contrivances such as Merry-Go-Round, Roller Coaster, Ferris Wheel, Swing, Shooting Gallery & other similar contivances', 300, '2017-02-25 01:58:39', '2017-02-25 01:58:39'),
(4, 'Vendo Machines', 200, '2017-02-25 01:58:51', '2017-02-25 01:58:51'),
(5, 'Others', 150, '2017-02-25 07:51:25', '2017-02-25 07:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `fee_bowling_alley`
--

CREATE TABLE IF NOT EXISTS `fee_bowling_alley` (
  `automaticLaneFee` double NOT NULL,
  `nonAutomaticLaneFee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_bowling_alley`
--

INSERT INTO `fee_bowling_alley` (`automaticLaneFee`, `nonAutomaticLaneFee`, `createdAt`, `updatedAt`) VALUES
(200, 150, '2017-02-23 12:29:18', '2017-02-26 01:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `fee_common_enterprise`
--

CREATE TABLE IF NOT EXISTS `fee_common_enterprise` (
  `commonEnterpriseFeeId` int(10) NOT NULL,
  `lineOfBusinessId` int(10) NOT NULL,
  `cottageFee` double NOT NULL,
  `smallScaleFee` double NOT NULL,
  `mediumScaleFee` double NOT NULL,
  `largeScaleFee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_common_enterprise`
--

INSERT INTO `fee_common_enterprise` (`commonEnterpriseFeeId`, `lineOfBusinessId`, `cottageFee`, `smallScaleFee`, `mediumScaleFee`, `largeScaleFee`, `createdAt`, `updatedAt`) VALUES
(3, 3, 1000, 3500, 5000, 7500, '2017-02-24 06:25:04', '2017-02-24 06:25:04'),
(4, 4, 1000, 3500, 5000, 7000, '2017-02-24 06:25:34', '2017-02-24 06:25:34'),
(5, 5, 800, 2500, 4000, 6500, '2017-02-24 06:25:55', '2017-02-24 06:25:55'),
(6, 6, 500, 1500, 3000, 5000, '2017-02-24 06:26:13', '2017-02-24 06:26:13'),
(7, 7, 500, 1500, 3000, 5000, '2017-02-24 06:26:48', '2017-02-24 06:26:48'),
(8, 10, 3000, 3000, 6000, 10000, '2017-02-27 02:25:01', '2017-02-27 02:25:01'),
(9, 11, 1000, 2000, 3000, 5000, '2017-02-27 14:36:24', '2017-02-27 14:36:24'),
(10, 12, 100, 100, 100, 100, '2017-02-28 16:16:40', '2017-02-28 16:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `fee_environmental_clearance_conditions`
--

CREATE TABLE IF NOT EXISTS `fee_environmental_clearance_conditions` (
  `feeEnvironmentalClearanceConditionId` int(10) NOT NULL,
  `above` int(60) NOT NULL,
  `below` int(60) NOT NULL,
  `fee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_environmental_clearance_conditions`
--

INSERT INTO `fee_environmental_clearance_conditions` (`feeEnvironmentalClearanceConditionId`, `above`, `below`, `fee`, `createdAt`, `updatedAt`) VALUES
(1, 0, 350000, 500, '2017-02-23 13:33:58', '2017-02-23 13:33:58'),
(2, 350000, 1000000, 750, '2017-02-23 13:41:40', '2017-02-23 13:41:40'),
(3, 1000000, 5000000, 1000, '2017-02-23 13:42:00', '2017-02-23 13:42:00'),
(4, 5000000, 0, 1500, '2017-02-23 13:43:11', '2017-02-23 13:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `fee_financial_institution`
--

CREATE TABLE IF NOT EXISTS `fee_financial_institution` (
  `financialInstitutionId` int(10) NOT NULL,
  `scale` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `fee` decimal(10,0) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_financial_institution`
--

INSERT INTO `fee_financial_institution` (`financialInstitutionId`, `scale`, `description`, `fee`, `createdAt`, `updatedAt`) VALUES
(1, 'Small', 'Pawnshops, Lending investors, Moneyshops and other financial institutions of same kind', '5000', '2017-02-23 12:45:31', '2017-02-26 01:09:29'),
(2, 'Medium', 'Rural, Thrift, and Savings Banks and other financial institutions of same kind', '7000', '2017-02-23 12:51:34', '2017-02-26 01:09:29'),
(3, 'Large', 'Commercial, Development and Universal Banks and other financial Institutions of similar scale', '10000', '2017-02-23 12:52:06', '2017-02-26 01:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `fee_fixed`
--

CREATE TABLE IF NOT EXISTS `fee_fixed` (
  `feeFixedId` int(10) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `conditional` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_fixed`
--

INSERT INTO `fee_fixed` (`feeFixedId`, `particular`, `fee`, `conditional`, `createdAt`, `updatedAt`) VALUES
(1, 'Business Inspection Fee', 200, 0, '2017-02-23 14:02:54', '2017-02-23 14:02:54'),
(2, 'Zoning/Location Clearance Fee', 200, 0, '2017-02-23 14:03:55', '2017-02-23 14:03:55'),
(3, 'Retirement Fee', 200, 1, '2017-02-24 01:47:07', '2017-02-24 07:30:45'),
(4, 'Business Plate & Sticker', 350, 0, '2017-02-26 00:13:58', '2017-02-26 00:13:58'),
(5, 'Change of Owner Fee', 200, 1, '2017-03-02 14:29:52', '2017-03-02 14:33:49'),
(6, 'Change of Business Name Fee', 200, 1, '2017-03-02 14:30:03', '2017-03-02 14:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `fee_golf_link`
--

CREATE TABLE IF NOT EXISTS `fee_golf_link` (
  `feeGoldLinkId` int(10) NOT NULL,
  `above` int(5) NOT NULL,
  `below` int(5) NOT NULL,
  `fee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_golf_link`
--

INSERT INTO `fee_golf_link` (`feeGoldLinkId`, `above`, `below`, `fee`, `createdAt`, `updatedAt`) VALUES
(1, 0, 10, 5000, '2017-02-24 05:49:27', '2017-02-24 05:49:27'),
(3, 18, 0, 18000, '2017-02-24 06:01:32', '2017-02-27 14:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `fee_sanitary_permit`
--

CREATE TABLE IF NOT EXISTS `fee_sanitary_permit` (
  `firstUnits` int(60) NOT NULL,
  `firstFee` double NOT NULL,
  `succeedingFee` double NOT NULL,
  `healthCardFee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_sanitary_permit`
--

INSERT INTO `fee_sanitary_permit` (`firstUnits`, `firstFee`, `succeedingFee`, `healthCardFee`, `createdAt`, `updatedAt`) VALUES
(25, 100, 4, 150, '2017-02-23 13:44:04', '2017-02-24 07:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `financial_institution`
--

CREATE TABLE IF NOT EXISTS `financial_institution` (
  `financialInstitutionId` int(10) NOT NULL,
  `activityId` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golf_links`
--

CREATE TABLE IF NOT EXISTS `golf_links` (
  `activityId` int(10) NOT NULL,
  `holes` int(60) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grosses`
--

CREATE TABLE IF NOT EXISTS `grosses` (
  `grossId` int(255) NOT NULL,
  `activityId` int(255) NOT NULL,
  `previousGross` int(255) NOT NULL,
  `essentials` int(255) NOT NULL,
  `nonEssentials` int(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issued_applications`
--

CREATE TABLE IF NOT EXISTS `issued_applications` (
  `issueId` int(10) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_applications`
--

INSERT INTO `issued_applications` (`issueId`, `referenceNum`, `dept`, `type`, `createdAt`, `updatedAt`) VALUES
(1, '9FAEA9BEB4', 'Engineering', 'New', '2017-03-01 02:42:37', '2017-03-01 02:42:37'),
(2, '739862FF5C', 'Engineering', 'New', '2017-03-01 07:15:09', '2017-03-01 07:15:09'),
(3, '739862FF5C', 'CENRO', 'New', '2017-03-01 07:17:08', '2017-03-01 07:17:08'),
(4, '739862FF5C', 'Zoning', 'New', '2017-03-01 07:17:48', '2017-03-01 07:17:48'),
(5, '739862FF5C', 'CHO', 'New', '2017-03-01 07:18:38', '2017-03-01 07:18:38'),
(7, '739862FF5C', 'BFP', 'New', '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(8, '739862FF5C', 'BPLO', 'New', '2017-03-01 07:24:29', '2017-03-01 07:24:29'),
(9, 'A03F21C5BC', 'Engineering', 'New', '2017-03-01 08:08:49', '2017-03-01 08:08:49'),
(10, 'A03F21C5BC', 'Zoning', 'New', '2017-03-01 08:13:05', '2017-03-01 08:13:05'),
(11, 'A03F21C5BC', 'CHO', 'New', '2017-03-01 08:15:31', '2017-03-01 08:15:31'),
(12, 'A03F21C5BC', 'BFP', 'New', '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(13, 'A03F21C5BC', 'CENRO', 'New', '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(14, 'A03F21C5BC', 'BPLO', 'New', '2017-03-01 08:18:46', '2017-03-01 08:18:46'),
(15, 'A98409F68C', 'Engineering', 'New', '2017-03-01 08:33:44', '2017-03-01 08:33:44'),
(16, '3BA448289A', 'Engineering', 'New', '2017-03-01 08:41:25', '2017-03-01 08:41:25'),
(17, '9FBDFC51AA', 'Engineering', 'New', '2017-03-02 12:53:11', '2017-03-02 12:53:11'),
(18, 'AE29D1B98F', 'Engineering', 'New', '2017-03-03 02:33:52', '2017-03-03 02:33:52'),
(19, '3BA448289A', 'Zoning', 'New', '2017-03-05 00:27:46', '2017-03-05 00:27:46'),
(20, '3BA448289A', 'CENRO', 'New', '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(21, '3BA448289A', 'CHO', 'New', '2017-03-05 00:28:40', '2017-03-05 00:28:40'),
(22, '3BA448289A', 'BFP', 'New', '2017-03-05 00:29:11', '2017-03-05 00:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'DTI/SEC/CDA Permit', '2017-02-18 06:33:54', '2017-02-18 13:08:51'),
(2, 'Barangay Clearance', '2017-02-18 06:33:54', '2017-02-18 06:33:54'),
(3, 'Fire Safety Insurance Certificate', '2017-02-18 06:33:54', '2017-02-18 13:09:01'),
(4, 'Zoning Clearance', '2017-02-18 06:33:54', '2017-02-18 06:33:54'),
(5, 'Engineering Clearance', '2017-02-18 06:33:54', '2017-02-18 06:33:54'),
(6, 'Sanitary Permit', '2017-02-18 06:33:54', '2017-02-18 06:33:54'),
(7, 'Environmental Clearance', '2017-02-18 06:33:54', '2017-02-18 06:33:54'),
(8, 'Realty Tax Receipt', '2017-02-21 12:31:08', '2017-02-21 12:31:08'),
(9, 'Building Plan', '2017-02-21 12:31:08', '2017-02-21 12:31:08'),
(10, 'Certificate of Non-Coverage', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(11, 'Environmental Compliance Certificate', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(12, 'Laguna Lake Development Authority Certificate (LLDA)', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(13, 'Water Analysis', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(14, 'Vermin and Rodent Control', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(15, 'Fire Safety Evaluation Clearance', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(16, 'Building Permit', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(17, 'FSIC for Occupancy', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(18, 'Fire Insurance Policy', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(19, 'Picture of Establishment (Exterior/Interior)', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(20, 'Copy of Contract List (If renting)', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(21, 'Receipt of Realty Tax (If own)', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(22, 'Proof of Service and Maintenance of Fire Fighting Equipment', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(23, 'Health Card per Employee', '2017-02-21 12:39:37', '2017-02-21 12:39:37'),
(24, 'Certificate of Land Title', '2017-02-21 12:44:00', '2017-02-21 12:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `lessors`
--

CREATE TABLE IF NOT EXISTS `lessors` (
  `lessorId` int(255) NOT NULL,
  `bploId` int(10) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `subdivision` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `cityMunicipality` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `monthlyRental` int(255) DEFAULT NULL,
  `telNum` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `line_of_businesses`
--

CREATE TABLE IF NOT EXISTS `line_of_businesses` (
  `lineOfBusinessId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `taxRate` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `impositionOfTaxCategory` varchar(60) NOT NULL,
  `garbageServiceFee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_of_businesses`
--

INSERT INTO `line_of_businesses` (`lineOfBusinessId`, `name`, `taxRate`, `type`, `description`, `impositionOfTaxCategory`, `garbageServiceFee`, `createdAt`, `updatedAt`) VALUES
(3, 'Manufacturing Kind', 10, 'Common Enterprise', 'testing', 'A', 1200, '2017-02-24 06:22:33', '2017-02-26 13:10:59'),
(4, 'Wholesaler Kind', 10, 'Common Enterprise', 'testing', 'B', 600, '2017-02-24 06:23:07', '2017-02-26 13:10:54'),
(5, 'Exporter', 10, 'Common Enterprise', 'testing', 'A', 600, '2017-02-24 06:23:23', '2017-02-26 13:11:10'),
(6, 'Retailer', 10, 'Common Enterprise', 'testing', 'D', 600, '2017-02-24 06:23:43', '2017-02-26 13:11:15'),
(7, 'Contractor', 10, 'Common Enterprise', 'testing', 'E', 600, '2017-02-24 06:24:26', '2017-02-26 13:11:19'),
(8, 'Amusement Places', 10, 'Amusement', 'Proprietors of amusement devices/places for a fee', 'H', 600, '2017-02-25 02:02:32', '2017-02-26 13:11:21'),
(9, 'Financial Institution', 10, 'Financial Institution', 'Financial Institutions such as banks', 'F', 600, '2017-02-25 02:10:26', '2017-02-26 13:11:30'),
(10, 'Lessor (Rental)', 10, 'Common Enterprise', 'Lessors of real estate including apartments for rent, boarding houses, Privately owned public markets, subdivision operators or real estate developers, private cemeteries or memorial parks.', 'I', 600, '2017-02-26 13:08:32', '2017-02-26 13:08:32'),
(11, 'Others', 10, 'Common Enterprise', 'others', 'H', 600, '2017-02-27 14:06:43', '2017-02-27 14:06:43'),
(12, 'Peddlers', 10, 'Common Enterprise', 'A business that travels from place to place to sell goods', 'G', 600, '2017-02-28 16:16:26', '2017-02-28 16:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationId` int(10) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `notifMessage` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationId`, `referenceNum`, `status`, `role`, `notifMessage`, `createdAt`, `updatedAt`) VALUES
(1, 'AE29D1B98F', 'Read', 9, 'Incoming', '2017-03-01 02:37:10', '2017-03-01 02:42:24'),
(2, '9FAEA9BEB4', 'Read', 9, 'Incoming', '2017-03-01 02:41:26', '2017-03-01 02:42:24'),
(3, '9FAEA9BEB4', 'Read', 3, 'Mastermind Incorporated has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-01 02:42:33', '2017-03-01 02:43:32'),
(4, '9FAEA9BEB4', 'Read', 4, 'New', '2017-03-01 02:42:37', '2017-03-01 02:43:12'),
(5, '9FAEA9BEB4', 'Read', 3, 'Mastermind Incorporated has been approved by tester engineering from the Office of the Building Official.', '2017-03-01 02:42:37', '2017-03-01 02:43:32'),
(6, '9FAEA9BEB4', 'Read', 5, 'Incoming', '2017-03-01 02:43:18', '2017-03-01 07:19:06'),
(7, '9FAEA9BEB4', 'Read', 7, 'Incoming', '2017-03-01 02:43:18', '2017-03-01 07:16:19'),
(8, '9FAEA9BEB4', 'Read', 8, 'Incoming', '2017-03-01 02:43:18', '2017-03-01 07:17:37'),
(9, '9FAEA9BEB4', 'Read', 10, 'Incoming', '2017-03-01 02:43:18', '2017-03-01 07:18:27'),
(10, '9FAEA9BEB4', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-01 02:43:18', '2017-03-01 02:43:32'),
(11, '739862FF5C', 'Read', 9, 'Incoming', '2017-03-01 02:50:54', '2017-03-01 03:05:07'),
(12, 'A98409F68C', 'Read', 9, 'Incoming', '2017-03-01 02:52:19', '2017-03-01 03:05:07'),
(14, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-01 07:14:13', '2017-03-01 07:17:36'),
(15, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-01 07:14:36', '2017-03-01 07:17:36'),
(16, '739862FF5C', 'Read', 4, 'New', '2017-03-01 07:15:09', '2017-03-01 07:15:19'),
(17, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been approved by tester engineering from the Office of the Building Official.', '2017-03-01 07:15:09', '2017-03-01 07:17:36'),
(18, '739862FF5C', 'Read', 5, 'Incoming', '2017-03-01 07:15:36', '2017-03-01 07:19:06'),
(19, '739862FF5C', 'Read', 7, 'Incoming', '2017-03-01 07:15:36', '2017-03-01 07:16:19'),
(20, '739862FF5C', 'Read', 8, 'Incoming', '2017-03-01 07:15:36', '2017-03-01 07:17:37'),
(21, '739862FF5C', 'Read', 10, 'Incoming', '2017-03-01 07:15:36', '2017-03-01 07:18:27'),
(22, '739862FF5C', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-01 07:15:36', '2017-03-01 07:17:36'),
(23, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been validated by tester cenro of City Environment and Natural Resources. Please check application status.', '2017-03-01 07:16:59', '2017-03-01 07:17:36'),
(24, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been approved by tester cenro of City Environment and Natural Resources.', '2017-03-01 07:17:09', '2017-03-01 07:17:36'),
(25, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been validated by tester zoning of Zoning Department. Please check application status.', '2017-03-01 07:17:43', '2017-03-01 07:18:20'),
(26, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been approved by tester zoning of Zoning Department.', '2017-03-01 07:17:48', '2017-03-01 07:18:20'),
(27, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been validated by tester sanitary of City Health Office. Please check application status.', '2017-03-01 07:18:33', '2017-03-01 07:19:00'),
(28, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been approved by tester sanitary of City Health Office.', '2017-03-01 07:18:38', '2017-03-01 07:19:00'),
(29, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been validated by tester bfp of Bureau of Fire Protection. Please check application status.', '2017-03-01 07:19:17', '2017-03-01 07:20:06'),
(30, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been approved by tester bfp of Bureau of Fire Protection.', '2017-03-01 07:19:26', '2017-03-01 07:20:06'),
(31, '739862FF5C', 'Read', 4, 'Completed', '2017-03-01 07:22:16', '2017-03-01 07:22:58'),
(32, '739862FF5C', 'Read', 3, 'Reymon Trucking Services has been approved by tester bfp of Bureau of Fire Protection.', '2017-03-01 07:22:16', '2017-03-01 07:25:15'),
(33, 'A03F21C5BC', 'Read', 9, 'Incoming', '2017-03-01 08:07:17', '2017-03-01 08:08:06'),
(34, 'A03F21C5BC', 'Read', 3, 'Aimbot has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-01 08:08:37', '2017-03-02 12:42:06'),
(35, 'A03F21C5BC', 'Read', 4, 'New', '2017-03-01 08:08:48', '2017-03-01 08:09:07'),
(36, 'A03F21C5BC', 'Read', 3, 'Aimbot has been approved by tester engineering from the Office of the Building Official.', '2017-03-01 08:08:49', '2017-03-02 12:42:06'),
(37, 'A03F21C5BC', 'Read', 5, 'Incoming', '2017-03-01 08:09:29', '2017-03-01 08:15:47'),
(38, 'A03F21C5BC', 'Read', 7, 'Incoming', '2017-03-01 08:09:29', '2017-03-01 08:17:00'),
(39, 'A03F21C5BC', 'Read', 8, 'Incoming', '2017-03-01 08:09:29', '2017-03-01 08:12:36'),
(40, 'A03F21C5BC', 'Read', 10, 'Incoming', '2017-03-01 08:09:29', '2017-03-01 08:15:11'),
(41, 'A03F21C5BC', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-01 08:09:29', '2017-03-02 12:42:06'),
(42, 'A03F21C5BC', 'Read', 3, 'Aimbot has been validated by tester zoning of Zoning Department. Please check application status.', '2017-03-01 08:12:56', '2017-03-02 12:42:06'),
(43, 'A03F21C5BC', 'Read', 3, 'Aimbot has been approved by tester zoning of Zoning Department.', '2017-03-01 08:13:05', '2017-03-02 12:42:06'),
(44, 'A03F21C5BC', 'Read', 3, 'Aimbot has been validated by tester sanitary of City Health Office. Please check application status.', '2017-03-01 08:15:17', '2017-03-02 12:42:06'),
(45, 'A03F21C5BC', 'Read', 3, 'Aimbot has been approved by tester sanitary of City Health Office.', '2017-03-01 08:15:31', '2017-03-02 12:42:06'),
(46, 'A03F21C5BC', 'Read', 3, 'Aimbot has been validated by tester bfp of Bureau of Fire Protection. Please check application status.', '2017-03-01 08:16:28', '2017-03-02 12:42:06'),
(47, 'A03F21C5BC', 'Read', 3, 'Aimbot has been approved by tester bfp of Bureau of Fire Protection.', '2017-03-01 08:16:41', '2017-03-02 12:42:06'),
(48, 'A03F21C5BC', 'Read', 3, 'Aimbot has been validated by tester cenro of City Environment and Natural Resources. Please check application status.', '2017-03-01 08:17:14', '2017-03-02 12:42:06'),
(49, 'A03F21C5BC', 'Read', 4, 'Completed', '2017-03-01 08:17:26', '2017-03-01 08:17:50'),
(50, 'A03F21C5BC', 'Read', 3, 'Aimbot has been approved by tester cenro of City Environment and Natural Resources.', '2017-03-01 08:17:26', '2017-03-02 12:42:06'),
(51, 'A98409F68C', 'Read', 3, 'Migiflakes has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-01 08:33:39', '2017-03-02 12:42:06'),
(52, 'A98409F68C', 'Read', 4, 'New', '2017-03-01 08:33:44', '2017-03-01 08:34:06'),
(53, 'A98409F68C', 'Read', 3, 'Migiflakes has been approved by tester engineering from the Office of the Building Official.', '2017-03-01 08:33:44', '2017-03-02 12:42:06'),
(54, 'A98409F68C', 'Read', 5, 'Incoming', '2017-03-01 08:34:40', '2017-03-04 01:52:39'),
(55, 'A98409F68C', 'Read', 7, 'Incoming', '2017-03-01 08:34:40', '2017-03-04 01:53:50'),
(56, 'A98409F68C', 'Read', 8, 'Incoming', '2017-03-01 08:34:40', '2017-03-04 01:46:59'),
(57, 'A98409F68C', 'Read', 10, 'Incoming', '2017-03-01 08:34:40', '2017-03-04 01:50:35'),
(58, 'A98409F68C', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-01 08:34:40', '2017-03-02 12:42:06'),
(59, '3BA448289A', 'Read', 9, 'Incoming', '2017-03-01 08:40:30', '2017-03-01 08:41:01'),
(60, '3BA448289A', 'Read', 3, 'Magpamasahe kay Exe has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-01 08:41:17', '2017-03-02 12:42:06'),
(61, '3BA448289A', 'Read', 4, 'New', '2017-03-01 08:41:25', '2017-03-01 08:41:43'),
(62, '3BA448289A', 'Read', 3, 'Magpamasahe kay Exe has been approved by tester engineering from the Office of the Building Official.', '2017-03-01 08:41:25', '2017-03-02 12:42:06'),
(63, '3BA448289A', 'Read', 5, 'Incoming', '2017-03-01 08:42:10', '2017-03-04 01:52:39'),
(64, '3BA448289A', 'Read', 7, 'Incoming', '2017-03-01 08:42:10', '2017-03-04 01:53:50'),
(65, '3BA448289A', 'Read', 8, 'Incoming', '2017-03-01 08:42:10', '2017-03-04 01:46:59'),
(66, '3BA448289A', 'Read', 10, 'Incoming', '2017-03-01 08:42:10', '2017-03-04 01:50:35'),
(67, '3BA448289A', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-01 08:42:10', '2017-03-02 12:42:06'),
(68, '9FBDFC51AA', 'Read', 9, 'Incoming', '2017-03-02 12:52:39', '2017-03-02 12:52:57'),
(69, '9FBDFC51AA', 'Read', 3, 'Jason''s Basurahan has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-02 12:53:03', '2017-03-02 12:54:58'),
(70, '9FBDFC51AA', 'Read', 4, 'New', '2017-03-02 12:53:11', '2017-03-02 12:53:24'),
(71, '9FBDFC51AA', 'Read', 3, 'Jason''s Basurahan has been approved by tester engineering from the Office of the Building Official.', '2017-03-02 12:53:11', '2017-03-02 12:54:58'),
(72, '9FBDFC51AA', 'Read', 5, 'Incoming', '2017-03-02 13:04:53', '2017-03-04 01:52:39'),
(73, '9FBDFC51AA', 'Read', 7, 'Incoming', '2017-03-02 13:04:53', '2017-03-04 01:53:50'),
(74, '9FBDFC51AA', 'Read', 8, 'Incoming', '2017-03-02 13:04:53', '2017-03-04 01:46:59'),
(75, '9FBDFC51AA', 'Read', 10, 'Incoming', '2017-03-02 13:04:53', '2017-03-04 01:50:35'),
(76, '9FBDFC51AA', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-02 13:04:53', '2017-03-03 01:53:56'),
(77, 'AE29D1B98F', 'Read', 3, 'Grind Spot Internet Cafe has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-03-03 02:32:58', '2017-03-03 02:36:40'),
(78, 'AE29D1B98F', 'Read', 4, 'New', '2017-03-03 02:33:52', '2017-03-03 02:34:38'),
(79, 'AE29D1B98F', 'Read', 3, 'Grind Spot Internet Cafe has been approved by tester engineering from the Office of the Building Official.', '2017-03-03 02:33:52', '2017-03-03 02:36:40'),
(80, 'AE29D1B98F', 'Read', 5, 'Incoming', '2017-03-03 02:35:06', '2017-03-04 01:52:39'),
(81, 'AE29D1B98F', 'Read', 7, 'Incoming', '2017-03-03 02:35:06', '2017-03-04 01:53:50'),
(82, 'AE29D1B98F', 'Read', 8, 'Incoming', '2017-03-03 02:35:06', '2017-03-04 01:46:59'),
(83, 'AE29D1B98F', 'Read', 10, 'Incoming', '2017-03-03 02:35:06', '2017-03-04 01:50:35'),
(84, 'AE29D1B98F', 'Read', 3, '<strong>Capitalization</strong> for <strong>Grind Spot Internet Cafe</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-03-03 02:35:07', '2017-03-03 02:36:40'),
(85, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>validated</strong> by <strong>tester zoning</strong> of Zoning Department. Please check application status.', '2017-03-05 00:27:42', '2017-03-05 00:31:53'),
(86, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>approved</strong> by <strong>tester zoning</strong> of Zoning Department.', '2017-03-05 00:27:46', '2017-03-05 00:31:53'),
(87, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>validated</strong> by <strong>tester cenro</strong> of City Environment and Natural Resources. Please check application status.', '2017-03-05 00:28:08', '2017-03-05 00:31:53'),
(88, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>approved</strong> by <strong>tester cenro</strong> of City Environment and Natural Resources.', '2017-03-05 00:28:20', '2017-03-05 00:31:53'),
(89, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>validated</strong> by <strong>tester sanitary</strong> of City Health Office. Please check application status.', '2017-03-05 00:28:36', '2017-03-05 00:31:53'),
(90, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>approved</strong> by <strong>tester sanitary</strong> of City Health Office.', '2017-03-05 00:28:40', '2017-03-05 00:31:53'),
(91, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>validated</strong> by <strong>tester bfp</strong> of Bureau of Fire Protection. Please check application status.', '2017-03-05 00:29:04', '2017-03-05 00:31:53'),
(92, '3BA448289A', 'Read', 4, 'Completed', '2017-03-05 00:29:11', '2017-03-05 00:32:14'),
(93, '3BA448289A', 'Read', 3, '<strong>Magpamasahe kay Exe</strong> has been <strong>approved</strong> by <strong>tester bfp</strong> of Bureau of Fire Protection.', '2017-03-05 00:29:11', '2017-03-05 00:31:53'),
(94, '739862FF5C', 'Read', 3, 'Reymond Trucking Services application has expired, please check application details for renewal request.', '2017-03-05 05:29:58', '2017-03-05 05:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `ownerId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `houseBldgNo` varchar(255) DEFAULT NULL,
  `bldgName` varchar(255) DEFAULT NULL,
  `unitNum` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `subdivision` varchar(255) DEFAULT NULL,
  `cityMunicipality` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `PIN` varchar(255) NOT NULL,
  `contactNum` varchar(255) DEFAULT NULL,
  `telNum` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerId`, `userId`, `firstName`, `middleName`, `lastName`, `suffix`, `gender`, `houseBldgNo`, `bldgName`, `unitNum`, `street`, `barangay`, `subdivision`, `cityMunicipality`, `province`, `PIN`, `contactNum`, `telNum`, `email`, `createdAt`, `updatedAt`) VALUES
(1, 24, 'Billy', 'Santos', 'Labay', '', 'Male', 'B39 L16', 'NA', 'NA', 'NA', 'Dila', 'Mabuhay Homes', 'Santa Rosa City', 'Laguna', '4026', '09178715969', 'NA', 'billy_labay@yahoo.com', '2017-03-01 02:16:23', '2017-03-01 02:16:23'),
(2, 24, 'Renjo', 'Enriquez', 'Dolosa', '', 'Male', 'Blk 29 Lot 19', 'NA', 'NA', 'Dumaguete Street', 'Santo Tomas', 'South City Homes', 'Biñan City', 'Laguna', '4024', '09175138266', '0498393969', 'dolosa.renjo@yahoo.com', '2017-03-01 02:27:36', '2017-03-01 02:27:36'),
(3, 24, 'Aemon', 'Master', 'Delos Reyes', '', 'Male', 'B6 L32', 'CSGO Building', '47', 'MG St.', 'Molino 2', 'Dust 2', 'Bacoor', 'Cavite', '4102', '09222223333', '64-123', 'aemon.delosreyes@yahoo.com', '2017-03-01 02:38:43', '2017-03-01 02:38:43'),
(4, 24, 'Reymon', 'Demc', 'Molina', '', 'Male', 'B1 L12', 'Crimson', '899', 'Commerce', 'Molino 3', 'Portofino', 'Bacoor', 'Cavite', '4102', '09232338989', '65-123', 'reymon.molina@yahoo.com', '2017-03-01 02:41:11', '2017-03-01 02:41:11'),
(5, 24, 'Migi', 'Range', 'Descalzo', '', 'Male', 'B7 L90', 'Paseo ', '696', 'Nova ', 'Molino 1', 'Bel Air', 'Bacoor', 'Cavite', '4102', '09787812316', '67-897', 'migi.descalzo', '2017-03-01 02:43:15', '2017-03-01 02:43:15'),
(6, 24, 'Exequiel', 'Atienza', 'Villar', '', 'Male', 'B8 L69', 'Rizal', '676', 'Adellina', 'Ayala', 'Ayala Alabang', 'Alabang', 'Muntinlupa', '4100', '09693446767', '69-881', 'exequiel.villar@yahoo.com', '2017-03-01 02:45:55', '2017-03-01 02:45:55'),
(7, 24, 'Jason', 'Tadeo', 'Hernandez', '', 'Male', 'Blk 29 Lot 21', 'NA', 'NA', 'Dumaguete Street', 'Santo Tomas', 'South City Homes', 'Biñan City', 'Laguna', '4024', '09175138266', '8393969', 'hernandez.jason@yahoo.com', '2017-03-01 02:54:02', '2017-03-01 02:54:02'),
(8, 24, 'John Lester', 'M.', 'Fontelara', '', 'Male', 'Blk 29 Lot 22', 'NA', 'NA', 'Dumaguete Street', 'Santo Tomas', 'South City Homes', 'Biñan City', 'Laguna', '4024', '8393969', '09175138266', 'johnny@yahoo.com', '2017-03-03 05:59:53', '2017-03-03 05:59:53'),
(9, 24, 'Rico', 'V', 'Bihis', '', 'Male', 'NA', 'NA', 'NA', 'NA', 'San Vicente', 'Don Pablo Subdivision', 'Biñan', 'Laguna', '4024', '0498395686', '', 'ricobihis@yahoo.com', '2017-03-04 04:41:28', '2017-03-04 04:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `transactionId` int(10) NOT NULL,
  `referenceNum` varchar(10) NOT NULL,
  `assessmentId` int(10) NOT NULL,
  `orNumber` varchar(30) NOT NULL,
  `amountPaid` double DEFAULT NULL,
  `quarterPaid` varchar(60) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`transactionId`, `referenceNum`, `assessmentId`, `orNumber`, `amountPaid`, `quarterPaid`, `createdAt`, `updatedAt`) VALUES
(1, '739862FF5C', 3, '512613', 10175, 'First Quarter', '2017-03-01 07:24:29', '2017-03-01 07:24:29'),
(2, 'A03F21C5BC', 6, '123456', 81000, 'First Quarter', '2017-03-01 08:18:46', '2017-03-01 08:18:46'),
(3, '739862FF5C', 3, '0000002', 125, 'Second Quarter', '2017-03-04 07:29:22', '2017-03-04 07:29:22'),
(4, '739862FF5C', 3, '00000003', 200, 'Fourth Quarter', '2017-03-04 07:54:00', '2017-03-04 07:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `reference_numbers`
--

CREATE TABLE IF NOT EXISTS `reference_numbers` (
  `referenceId` int(5) NOT NULL,
  `userId` int(5) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_numbers`
--

INSERT INTO `reference_numbers` (`referenceId`, `userId`, `referenceNum`, `createdAt`, `updatedAt`) VALUES
(1, 24, '9FAEA9BEB4', '2017-03-01 02:31:46', '2017-03-01 02:31:46'),
(2, 24, 'AE29D1B98F', '2017-03-01 02:37:10', '2017-03-01 02:37:10'),
(3, 24, '739862FF5C', '2017-03-01 02:48:56', '2017-03-01 02:48:56'),
(4, 24, 'A98409F68C', '2017-03-01 02:52:19', '2017-03-01 02:52:19'),
(5, 24, 'A03F21C5BC', '2017-03-01 02:55:10', '2017-03-01 02:55:10'),
(6, 24, '3BA448289A', '2017-03-01 02:58:41', '2017-03-01 02:58:41'),
(7, 24, '9FBDFC51AA', '2017-03-01 03:04:11', '2017-03-01 03:04:11'),
(8, 24, '8D6467E448', '2017-03-03 03:00:53', '2017-03-03 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `renewals`
--

CREATE TABLE IF NOT EXISTS `renewals` (
  `renewalId` int(10) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `requirementId` int(10) NOT NULL,
  `itemId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirementId`, `itemId`, `roleId`, `createdAt`, `updatedAt`) VALUES
(1, 1, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(2, 2, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(3, 3, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(4, 4, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(5, 5, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(6, 6, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(7, 7, 4, '2017-02-18 06:35:21', '2017-02-18 06:35:21'),
(8, 9, 8, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(9, 2, 8, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(10, 8, 8, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(11, 24, 8, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(12, 10, 7, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(13, 11, 7, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(14, 12, 7, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(15, 1, 7, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(16, 2, 7, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(17, 23, 10, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(18, 13, 10, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(19, 14, 10, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(20, 15, 5, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(21, 16, 5, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(22, 17, 5, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(23, 18, 5, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(24, 20, 5, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(25, 21, 5, '2017-02-21 12:51:20', '2017-02-21 12:51:20'),
(26, 22, 5, '2017-02-21 12:51:34', '2017-02-21 12:51:34'),
(27, 19, 5, '2017-02-21 12:51:34', '2017-02-21 12:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `retirements`
--

CREATE TABLE IF NOT EXISTS `retirements` (
  `retirementId` int(10) NOT NULL,
  `referenceNum` varchar(10) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(60) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'Master Admin', '2016-11-14 01:24:24', '0000-00-00 00:00:00'),
(2, 'User Admin', '2016-11-14 01:24:24', '0000-00-00 00:00:00'),
(3, 'Applicant', '2016-11-14 01:24:24', '0000-00-00 00:00:00'),
(4, 'BPLO', '2016-11-18 00:53:01', '2016-11-18 00:53:01'),
(5, 'BFP', '2017-01-02 07:13:28', '2017-01-02 07:13:28'),
(7, 'CENRO', '2017-01-02 07:13:28', '2017-01-02 07:13:28'),
(8, 'Zoning', '2017-01-02 07:13:28', '2017-01-02 07:13:28'),
(9, 'Engineering', '2017-01-02 07:13:28', '2017-01-02 07:13:28'),
(10, 'CHO', '2017-01-02 07:13:28', '2017-01-02 07:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_requirements`
--

CREATE TABLE IF NOT EXISTS `submitted_requirements` (
  `submittedRequirementsId` int(10) NOT NULL,
  `referenceNum` varchar(10) NOT NULL,
  `requirementId` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submitted_requirements`
--

INSERT INTO `submitted_requirements` (`submittedRequirementsId`, `referenceNum`, `requirementId`, `createdAt`, `updatedAt`) VALUES
(1, '739862FF5C', 12, '2017-03-01 07:17:08', '2017-03-01 07:17:08'),
(2, '739862FF5C', 13, '2017-03-01 07:17:08', '2017-03-01 07:17:08'),
(3, '739862FF5C', 14, '2017-03-01 07:17:08', '2017-03-01 07:17:08'),
(4, '739862FF5C', 15, '2017-03-01 07:17:08', '2017-03-01 07:17:08'),
(5, '739862FF5C', 16, '2017-03-01 07:17:08', '2017-03-01 07:17:08'),
(6, '739862FF5C', 8, '2017-03-01 07:17:48', '2017-03-01 07:17:48'),
(7, '739862FF5C', 9, '2017-03-01 07:17:48', '2017-03-01 07:17:48'),
(8, '739862FF5C', 10, '2017-03-01 07:17:48', '2017-03-01 07:17:48'),
(9, '739862FF5C', 11, '2017-03-01 07:17:48', '2017-03-01 07:17:48'),
(10, '739862FF5C', 17, '2017-03-01 07:18:38', '2017-03-01 07:18:38'),
(11, '739862FF5C', 18, '2017-03-01 07:18:38', '2017-03-01 07:18:38'),
(12, '739862FF5C', 19, '2017-03-01 07:18:38', '2017-03-01 07:18:38'),
(13, '739862FF5C', 20, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(14, '739862FF5C', 21, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(15, '739862FF5C', 22, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(16, '739862FF5C', 23, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(17, '739862FF5C', 24, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(18, '739862FF5C', 25, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(19, '739862FF5C', 26, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(20, '739862FF5C', 27, '2017-03-01 07:19:26', '2017-03-01 07:19:26'),
(21, '739862FF5C', 20, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(22, '739862FF5C', 21, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(23, '739862FF5C', 22, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(24, '739862FF5C', 23, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(25, '739862FF5C', 24, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(26, '739862FF5C', 25, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(27, '739862FF5C', 26, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(28, '739862FF5C', 27, '2017-03-01 07:22:16', '2017-03-01 07:22:16'),
(29, 'A03F21C5BC', 8, '2017-03-01 08:13:05', '2017-03-01 08:13:05'),
(30, 'A03F21C5BC', 9, '2017-03-01 08:13:05', '2017-03-01 08:13:05'),
(31, 'A03F21C5BC', 10, '2017-03-01 08:13:05', '2017-03-01 08:13:05'),
(32, 'A03F21C5BC', 11, '2017-03-01 08:13:05', '2017-03-01 08:13:05'),
(33, 'A03F21C5BC', 17, '2017-03-01 08:15:31', '2017-03-01 08:15:31'),
(34, 'A03F21C5BC', 18, '2017-03-01 08:15:31', '2017-03-01 08:15:31'),
(35, 'A03F21C5BC', 19, '2017-03-01 08:15:31', '2017-03-01 08:15:31'),
(36, 'A03F21C5BC', 20, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(37, 'A03F21C5BC', 21, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(38, 'A03F21C5BC', 22, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(39, 'A03F21C5BC', 23, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(40, 'A03F21C5BC', 24, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(41, 'A03F21C5BC', 25, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(42, 'A03F21C5BC', 26, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(43, 'A03F21C5BC', 27, '2017-03-01 08:16:41', '2017-03-01 08:16:41'),
(44, 'A03F21C5BC', 12, '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(45, 'A03F21C5BC', 13, '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(46, 'A03F21C5BC', 14, '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(47, 'A03F21C5BC', 15, '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(48, 'A03F21C5BC', 16, '2017-03-01 08:17:26', '2017-03-01 08:17:26'),
(49, '3BA448289A', 8, '2017-03-05 00:27:45', '2017-03-05 00:27:45'),
(50, '3BA448289A', 9, '2017-03-05 00:27:46', '2017-03-05 00:27:46'),
(51, '3BA448289A', 10, '2017-03-05 00:27:46', '2017-03-05 00:27:46'),
(52, '3BA448289A', 11, '2017-03-05 00:27:46', '2017-03-05 00:27:46'),
(53, '3BA448289A', 12, '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(54, '3BA448289A', 13, '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(55, '3BA448289A', 14, '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(56, '3BA448289A', 15, '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(57, '3BA448289A', 16, '2017-03-05 00:28:20', '2017-03-05 00:28:20'),
(58, '3BA448289A', 17, '2017-03-05 00:28:40', '2017-03-05 00:28:40'),
(59, '3BA448289A', 18, '2017-03-05 00:28:40', '2017-03-05 00:28:40'),
(60, '3BA448289A', 19, '2017-03-05 00:28:40', '2017-03-05 00:28:40'),
(61, '3BA448289A', 20, '2017-03-05 00:29:10', '2017-03-05 00:29:10'),
(62, '3BA448289A', 21, '2017-03-05 00:29:10', '2017-03-05 00:29:10'),
(63, '3BA448289A', 22, '2017-03-05 00:29:10', '2017-03-05 00:29:10'),
(64, '3BA448289A', 23, '2017-03-05 00:29:11', '2017-03-05 00:29:11'),
(65, '3BA448289A', 24, '2017-03-05 00:29:11', '2017-03-05 00:29:11'),
(66, '3BA448289A', 25, '2017-03-05 00:29:11', '2017-03-05 00:29:11'),
(67, '3BA448289A', 26, '2017-03-05 00:29:11', '2017-03-05 00:29:11'),
(68, '3BA448289A', 27, '2017-03-05 00:29:11', '2017-03-05 00:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(10) NOT NULL,
  `role` int(5) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT '.',
  `suffix` varchar(10) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNum` int(20) NOT NULL,
  `civilStatus` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birthDate` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `role`, `firstName`, `lastName`, `middleName`, `suffix`, `gender`, `email`, `contactNum`, `civilStatus`, `password`, `birthDate`, `createdAt`, `updatedAt`) VALUES
(3, 4, 'tester', 'bplo', '', '', 'Male', 'bplo@yahoo.com', 123, 'Single', '$2y$11$siARsmYAQeaUes.lc6GGtuo4.Z064.hLHsjmfVXUrsMlLz2WWSNfi', '01/22/2017', '2017-01-22 15:21:10', '2017-02-04 08:06:16'),
(4, 8, 'tester', 'zoning', '.', '', 'Female', 'zoning@yahoo.com', 123, 'Single', '$2y$11$9AwRmguWvE7xxtbSmU0PI.5XJUt11WAo9V898EXJConqBItphzjkW', '01/23/2017', '2017-01-23 13:40:13', '2017-02-04 08:06:03'),
(5, 7, 'tester', 'cenro', '.', '', 'Male', 'cenro@yahoo.com', 123, 'Single', '$2y$11$U5jDMB/IcLbBfsGfVjXee..yvduqOlmGhpvtsaJ8xjkZFENQ8j45a', '01/24/2017', '2017-01-24 02:48:22', '2017-02-02 11:06:18'),
(6, 10, 'tester', 'sanitary', '.', '', 'Female', 'sanitary@yahoo.com', 123, 'Single', '$2y$11$8XrzAcPA81u740c160gZAOXPH72ANUhceakMT560.vsusgkAAWD/.', '01/24/2017', '2017-01-24 03:33:39', '2017-02-02 11:06:20'),
(17, 3, 'Tester', 'Tester', '.', '', 'Male', 'dotraze@gmail.com', 123, 'Single', '$2y$11$xmsdTzVLqmjVl.CnzGPkL.OY6EcwT6z7oF8IMGUwMuYc87Q5piPBa', '01/28/2017', '2017-01-28 06:50:45', '2017-02-02 11:06:22'),
(19, 5, 'tester', 'bfp', '.', '', 'Female', 'bfp@yahoo.com', 123213, 'Single', '$2y$11$5DHPLvVINotpgFbSoT3azuZPViwN61LBiE9E/gnMWUHtfTHhw7gHi', '02/02/2017', '2017-02-02 14:19:03', '2017-02-19 12:39:02'),
(20, 9, 'tester', 'engineering', '.', '', 'Male', 'engineering@yahoo.com', 1231, 'Single', '$2y$11$V7fltHjfiyEXBRVWCc/3PeogLAmZvrnTE32/T5y8JPg9w8LRCAFLC', '02/02/2017', '2017-02-02 14:21:21', '2017-02-19 12:39:06'),
(22, 1, 'Renjo', 'Dolosa', 'Enriquez', '', 'Male', 'bposys.admin@gmail.com', 12341234, 'Single', '$2y$11$te1xFi9kAtZoaH91FfZSfeoZ5DqTJyTrU/Uci63ZEtOXpqmzcUzd.', '02/17/1995', '2017-02-19 12:38:43', '2017-02-19 12:39:28'),
(23, 3, 'Billy', 'Labay', 'Santos', '', 'male', 'billy_labay@yahoo.com', 2147483647, 'Single', '$2y$11$XurFMsSUd9ggnL8ssWCKaey6jfpu5Nks49BZa.27.XhDefM92y2YC', '08/19/1995', '2017-02-28 07:55:57', '2017-02-28 07:55:57'),
(24, 3, 'Renjo', 'Dolosa', 'Enriquez', '', 'male', 'dolosa.renjo@yahoo.com', 8266, 'Single', '$2y$11$3On7LVcZt02XV6d4elwfaOx3eSkY4S5s97VUqOxhyeJBSea2h0RrS', '02/17/1995', '2017-02-28 07:57:20', '2017-02-28 07:57:20'),
(25, 4, 'Jason', 'Hernandez', '', NULL, 'Male', 'jason@yahoo.com', 123123, 'Single', '$2y$11$iipzbbdgmoaoAXcAss0/5OB5IYi49ltllBPl1D9Tm2a582hGfOS/y', '03/05/2017', '2017-03-04 23:18:19', '2017-03-04 23:18:19'),
(26, 4, 'Rene', 'Manabat', '', NULL, 'Male', 'manabat.rene@yahoo.com', 2147483647, 'Single', '$2y$11$xYlebUig3xsYfb.YLIEYV.ny.0f/JC5HUSFhMSyyX5Q4s4iN9yiHS', '03/05/2017', '2017-03-05 02:53:45', '2017-03-05 02:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE IF NOT EXISTS `verifications` (
  `verificationId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`verificationId`, `userId`, `code`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 23, '2214885118', 1, '2017-02-28 07:56:43', '2017-02-28 07:56:43'),
(2, 24, 'A3C189C22D', 1, '2017-02-28 07:57:36', '2017-02-28 07:57:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amusement_devices`
--
ALTER TABLE `amusement_devices`
  ADD KEY `amusementDeviceId` (`amusementDeviceId`),
  ADD KEY `activityId` (`activityId`);

--
-- Indexes for table `application_bfp`
--
ALTER TABLE `application_bfp`
  ADD PRIMARY KEY (`applicationId`),
  ADD UNIQUE KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`),
  ADD KEY `businessId` (`businessId`);

--
-- Indexes for table `application_bplo`
--
ALTER TABLE `application_bplo`
  ADD PRIMARY KEY (`applicationId`),
  ADD UNIQUE KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`),
  ADD KEY `businessId` (`businessId`);

--
-- Indexes for table `application_cenro`
--
ALTER TABLE `application_cenro`
  ADD PRIMARY KEY (`applicationId`),
  ADD UNIQUE KEY `independentReferenceNumber` (`referenceNum`),
  ADD KEY `userId` (`userId`),
  ADD KEY `businessId` (`businessId`);

--
-- Indexes for table `application_engineering`
--
ALTER TABLE `application_engineering`
  ADD PRIMARY KEY (`applicationId`),
  ADD UNIQUE KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`),
  ADD KEY `businessId` (`businessId`);

--
-- Indexes for table `application_sanitary`
--
ALTER TABLE `application_sanitary`
  ADD PRIMARY KEY (`applicationId`),
  ADD UNIQUE KEY `referenceNum_2` (`referenceNum`),
  ADD KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`),
  ADD KEY `businessId` (`businessId`);

--
-- Indexes for table `application_zoning`
--
ALTER TABLE `application_zoning`
  ADD PRIMARY KEY (`applicationId`),
  ADD UNIQUE KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`),
  ADD KEY `businessId` (`businessId`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approvalId`),
  ADD KEY `referenceNum` (`referenceNum`),
  ADD KEY `role` (`role`),
  ADD KEY `role_2` (`role`);

--
-- Indexes for table `archived_applications`
--
ALTER TABLE `archived_applications`
  ADD PRIMARY KEY (`archiveId`),
  ADD KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `archived_business_activities`
--
ALTER TABLE `archived_business_activities`
  ADD PRIMARY KEY (`archiveId`),
  ADD KEY `archiveApplicationId` (`archiveApplicationId`) USING BTREE;

--
-- Indexes for table `archived_lessors`
--
ALTER TABLE `archived_lessors`
  ADD PRIMARY KEY (`archiveId`),
  ADD KEY `archiveApplicationId` (`archiveApplicationId`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessmentId`),
  ADD KEY `referenceNum` (`referenceNum`);

--
-- Indexes for table `bowling_alleys`
--
ALTER TABLE `bowling_alleys`
  ADD KEY `activityId` (`activityId`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`businessId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `business_activities`
--
ALTER TABLE `business_activities`
  ADD PRIMARY KEY (`activityId`),
  ADD KEY `referenceNum` (`bploId`);

--
-- Indexes for table `changes`
--
ALTER TABLE `changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referenceNum` (`referenceNum`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`chargeId`),
  ADD KEY `assessmentId` (`assessmentId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `fee_amusement_devices`
--
ALTER TABLE `fee_amusement_devices`
  ADD PRIMARY KEY (`amusementDeviceId`);

--
-- Indexes for table `fee_common_enterprise`
--
ALTER TABLE `fee_common_enterprise`
  ADD PRIMARY KEY (`commonEnterpriseFeeId`),
  ADD KEY `lineOfBusinessId` (`lineOfBusinessId`);

--
-- Indexes for table `fee_environmental_clearance_conditions`
--
ALTER TABLE `fee_environmental_clearance_conditions`
  ADD PRIMARY KEY (`feeEnvironmentalClearanceConditionId`);

--
-- Indexes for table `fee_financial_institution`
--
ALTER TABLE `fee_financial_institution`
  ADD PRIMARY KEY (`financialInstitutionId`);

--
-- Indexes for table `fee_fixed`
--
ALTER TABLE `fee_fixed`
  ADD PRIMARY KEY (`feeFixedId`);

--
-- Indexes for table `fee_golf_link`
--
ALTER TABLE `fee_golf_link`
  ADD PRIMARY KEY (`feeGoldLinkId`);

--
-- Indexes for table `fee_sanitary_permit`
--
ALTER TABLE `fee_sanitary_permit`
  ADD PRIMARY KEY (`firstUnits`);

--
-- Indexes for table `financial_institution`
--
ALTER TABLE `financial_institution`
  ADD KEY `activityId` (`activityId`),
  ADD KEY `financialInstitutionId` (`financialInstitutionId`);

--
-- Indexes for table `golf_links`
--
ALTER TABLE `golf_links`
  ADD KEY `activityId` (`activityId`);

--
-- Indexes for table `grosses`
--
ALTER TABLE `grosses`
  ADD PRIMARY KEY (`grossId`),
  ADD KEY `activityId` (`activityId`);

--
-- Indexes for table `issued_applications`
--
ALTER TABLE `issued_applications`
  ADD PRIMARY KEY (`issueId`),
  ADD KEY `referenceNum` (`referenceNum`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `lessors`
--
ALTER TABLE `lessors`
  ADD PRIMARY KEY (`lessorId`),
  ADD KEY `referenceNum` (`bploId`);

--
-- Indexes for table `line_of_businesses`
--
ALTER TABLE `line_of_businesses`
  ADD PRIMARY KEY (`lineOfBusinessId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationId`),
  ADD KEY `referenceNum` (`referenceNum`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ownerId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `referenceNum` (`referenceNum`),
  ADD KEY `assessmentId` (`assessmentId`);

--
-- Indexes for table `reference_numbers`
--
ALTER TABLE `reference_numbers`
  ADD PRIMARY KEY (`referenceId`),
  ADD UNIQUE KEY `referenceNum` (`referenceNum`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `renewals`
--
ALTER TABLE `renewals`
  ADD PRIMARY KEY (`renewalId`),
  ADD KEY `referenceNum` (`referenceNum`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`requirementId`),
  ADD KEY `itemId` (`itemId`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `retirements`
--
ALTER TABLE `retirements`
  ADD PRIMARY KEY (`retirementId`),
  ADD KEY `referenceNum` (`referenceNum`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `submitted_requirements`
--
ALTER TABLE `submitted_requirements`
  ADD PRIMARY KEY (`submittedRequirementsId`),
  ADD KEY `referenceNum` (`referenceNum`),
  ADD KEY `requirementId` (`requirementId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`verificationId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_bfp`
--
ALTER TABLE `application_bfp`
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `application_bplo`
--
ALTER TABLE `application_bplo`
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `application_cenro`
--
ALTER TABLE `application_cenro`
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `application_engineering`
--
ALTER TABLE `application_engineering`
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `application_sanitary`
--
ALTER TABLE `application_sanitary`
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `application_zoning`
--
ALTER TABLE `application_zoning`
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approvalId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `archived_applications`
--
ALTER TABLE `archived_applications`
  MODIFY `archiveId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archived_business_activities`
--
ALTER TABLE `archived_business_activities`
  MODIFY `archiveId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archived_lessors`
--
ALTER TABLE `archived_lessors`
  MODIFY `archiveId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessmentId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `businessId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `business_activities`
--
ALTER TABLE `business_activities`
  MODIFY `activityId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `changes`
--
ALTER TABLE `changes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `chargeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `fee_amusement_devices`
--
ALTER TABLE `fee_amusement_devices`
  MODIFY `amusementDeviceId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fee_common_enterprise`
--
ALTER TABLE `fee_common_enterprise`
  MODIFY `commonEnterpriseFeeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fee_environmental_clearance_conditions`
--
ALTER TABLE `fee_environmental_clearance_conditions`
  MODIFY `feeEnvironmentalClearanceConditionId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fee_financial_institution`
--
ALTER TABLE `fee_financial_institution`
  MODIFY `financialInstitutionId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fee_fixed`
--
ALTER TABLE `fee_fixed`
  MODIFY `feeFixedId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fee_golf_link`
--
ALTER TABLE `fee_golf_link`
  MODIFY `feeGoldLinkId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fee_sanitary_permit`
--
ALTER TABLE `fee_sanitary_permit`
  MODIFY `firstUnits` int(60) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `grosses`
--
ALTER TABLE `grosses`
  MODIFY `grossId` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issued_applications`
--
ALTER TABLE `issued_applications`
  MODIFY `issueId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `lessors`
--
ALTER TABLE `lessors`
  MODIFY `lessorId` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `line_of_businesses`
--
ALTER TABLE `line_of_businesses`
  MODIFY `lineOfBusinessId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `ownerId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `transactionId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reference_numbers`
--
ALTER TABLE `reference_numbers`
  MODIFY `referenceId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `renewalId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirementId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `retirements`
--
ALTER TABLE `retirements`
  MODIFY `retirementId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `submitted_requirements`
--
ALTER TABLE `submitted_requirements`
  MODIFY `submittedRequirementsId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `verificationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `amusement_devices`
--
ALTER TABLE `amusement_devices`
  ADD CONSTRAINT `amusement_devices_ibfk_1` FOREIGN KEY (`amusementDeviceId`) REFERENCES `fee_amusement_devices` (`amusementDeviceId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amusement_devices_ibfk_2` FOREIGN KEY (`activityId`) REFERENCES `business_activities` (`activityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_bfp`
--
ALTER TABLE `application_bfp`
  ADD CONSTRAINT `application_bfp_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_bfp_ibfk_2` FOREIGN KEY (`businessId`) REFERENCES `businesses` (`businessId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_bfp_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_bplo`
--
ALTER TABLE `application_bplo`
  ADD CONSTRAINT `application_bplo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_bplo_ibfk_2` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_bplo_ibfk_3` FOREIGN KEY (`businessId`) REFERENCES `businesses` (`businessId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_cenro`
--
ALTER TABLE `application_cenro`
  ADD CONSTRAINT `application_cenro_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_cenro_ibfk_2` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_cenro_ibfk_3` FOREIGN KEY (`businessId`) REFERENCES `businesses` (`businessId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_engineering`
--
ALTER TABLE `application_engineering`
  ADD CONSTRAINT `application_engineering_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_engineering_ibfk_2` FOREIGN KEY (`businessId`) REFERENCES `businesses` (`businessId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_engineering_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_sanitary`
--
ALTER TABLE `application_sanitary`
  ADD CONSTRAINT `application_sanitary_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_sanitary_ibfk_2` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_sanitary_ibfk_3` FOREIGN KEY (`businessId`) REFERENCES `businesses` (`businessId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_zoning`
--
ALTER TABLE `application_zoning`
  ADD CONSTRAINT `application_zoning_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_zoning_ibfk_2` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_zoning_ibfk_3` FOREIGN KEY (`businessId`) REFERENCES `businesses` (`businessId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `approvals_ibfk_3` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `archived_applications`
--
ALTER TABLE `archived_applications`
  ADD CONSTRAINT `archived_applications_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `archived_business_activities`
--
ALTER TABLE `archived_business_activities`
  ADD CONSTRAINT `archived_business_activities_ibfk_1` FOREIGN KEY (`archiveApplicationId`) REFERENCES `archived_applications` (`archiveId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `archived_lessors`
--
ALTER TABLE `archived_lessors`
  ADD CONSTRAINT `archived_lessors_ibfk_1` FOREIGN KEY (`archiveApplicationId`) REFERENCES `archived_applications` (`archiveId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bowling_alleys`
--
ALTER TABLE `bowling_alleys`
  ADD CONSTRAINT `bowling_alleys_ibfk_1` FOREIGN KEY (`activityId`) REFERENCES `business_activities` (`activityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businesses_ibfk_2` FOREIGN KEY (`ownerId`) REFERENCES `owners` (`ownerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_activities`
--
ALTER TABLE `business_activities`
  ADD CONSTRAINT `business_activities_ibfk_1` FOREIGN KEY (`bploId`) REFERENCES `application_bplo` (`applicationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `changes`
--
ALTER TABLE `changes`
  ADD CONSTRAINT `changes_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_ibfk_1` FOREIGN KEY (`assessmentId`) REFERENCES `assessments` (`assessmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee_common_enterprise`
--
ALTER TABLE `fee_common_enterprise`
  ADD CONSTRAINT `fee_common_enterprise_ibfk_1` FOREIGN KEY (`lineOfBusinessId`) REFERENCES `line_of_businesses` (`lineOfBusinessId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `financial_institution`
--
ALTER TABLE `financial_institution`
  ADD CONSTRAINT `financial_institution_ibfk_1` FOREIGN KEY (`activityId`) REFERENCES `business_activities` (`activityId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `financial_institution_ibfk_2` FOREIGN KEY (`financialInstitutionId`) REFERENCES `fee_financial_institution` (`financialInstitutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `golf_links`
--
ALTER TABLE `golf_links`
  ADD CONSTRAINT `golf_links_ibfk_1` FOREIGN KEY (`activityId`) REFERENCES `business_activities` (`activityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grosses`
--
ALTER TABLE `grosses`
  ADD CONSTRAINT `grosses_ibfk_1` FOREIGN KEY (`activityId`) REFERENCES `business_activities` (`activityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issued_applications`
--
ALTER TABLE `issued_applications`
  ADD CONSTRAINT `issued_applications_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessors`
--
ALTER TABLE `lessors`
  ADD CONSTRAINT `lessors_ibfk_1` FOREIGN KEY (`bploId`) REFERENCES `application_bplo` (`applicationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `assessments` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessments` (`assessmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renewals`
--
ALTER TABLE `renewals`
  ADD CONSTRAINT `renewals_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requirements_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retirements`
--
ALTER TABLE `retirements`
  ADD CONSTRAINT `retirements_ibfk_1` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submitted_requirements`
--
ALTER TABLE `submitted_requirements`
  ADD CONSTRAINT `submitted_requirements_ibfk_2` FOREIGN KEY (`requirementId`) REFERENCES `requirements` (`requirementId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requirements_ibfk_3` FOREIGN KEY (`referenceNum`) REFERENCES `reference_numbers` (`referenceNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE;

--
-- Constraints for table `verifications`
--
ALTER TABLE `verifications`
  ADD CONSTRAINT `verifications_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
