-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 04:02 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_bfp`
--

INSERT INTO `application_bfp` (`applicationId`, `userId`, `businessId`, `referenceNum`, `applicationDate`, `storeys`, `occupiedPortion`, `areaPerFloor`, `occupancyPermitNum`, `status`, `createdAt`, `updatedAt`) VALUES
(2, 23, 2, '1F381A6840', 'February 28, 2017', 1, '3', 5, '123124124', 'Active', '2017-02-28 08:12:13', '2017-02-28 08:29:04'),
(5, 24, 1, 'CBB80768C6', 'February 28, 2017', 1, '1', 325, '000000', 'Expired', '2017-02-28 08:17:22', '2017-02-28 08:30:43'),
(6, 24, 3, 'E03C55A553', 'February 28, 2017', 1, '1', 325, '123456', 'For applicant visit', '2017-02-28 10:26:32', '2017-02-28 11:24:00'),
(7, 24, 3, '90036D3C81', 'February 28, 2017', 1, '1', 325, '123456', 'Draft', '2017-02-28 10:27:37', '2017-02-28 10:27:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_bplo`
--

INSERT INTO `application_bplo` (`applicationId`, `referenceNum`, `userId`, `businessId`, `taxYear`, `applicationDate`, `idPresented`, `modeOfPayment`, `DTISECCDA_RegNum`, `DTISECCDA_Date`, `brgyClearanceDateIssued`, `CTCNum`, `TIN`, `entityName`, `status`, `createdAt`, `updatedAt`) VALUES
(2, '1F381A6840', 23, 2, 2017, 'February 28, 2017', '1234567', 'Semi-Anually', '123456', '01/18/2017', '01/11/2017', '1234', '1234125', 'NA', 'Active', '2017-02-28 08:12:12', '2017-02-28 08:30:26'),
(5, 'CBB80768C6', 24, 1, 2017, 'February 28, 2017', 'Driver''s License - 000000', 'Semi-Anually', '000000', '02/28/2017', '02/28/2017', '000000', '000000', 'NA', 'Active', '2017-02-28 08:17:21', '2017-02-28 08:38:55'),
(6, 'E03C55A553', 24, 3, 2017, 'February 28, 2017', 'ID - 111111', 'Semi-Anually', '111111', '02/28/2017', '02/28/2017', '123456', '123456', 'NA', 'On process', '2017-02-28 10:26:32', '2017-02-28 11:23:58'),
(7, '90036D3C81', 24, 3, 2017, 'February 28, 2017', 'ID - 111111', 'Semi-Anually', '111111', '02/28/2017', '02/28/2017', '123456', '123456', 'NA', 'Draft', '2017-02-28 10:27:36', '2017-02-28 10:27:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_cenro`
--

INSERT INTO `application_cenro` (`applicationId`, `userId`, `businessId`, `referenceNum`, `CNC`, `LLDAClearance`, `dischargePermit`, `apsci`, `productsAndByProducts`, `smokeEmission`, `volatileCompound`, `fugitiveParticulates`, `steamGenerator`, `APCD`, `stackHeight`, `wastewaterTreatmentFacility`, `wastewaterTreatmentOperationAndProcess`, `pendingCaseWithLLDA`, `typeOfSolidWastesGenerated`, `qtyPerDay`, `garbageCollectionMethod`, `frequencyOfGarbageCollection`, `wasteCollector`, `collectorAddress`, `garbageDisposalMethod`, `wasteMinimizationMethod`, `drainageSystem`, `drainageType`, `drainageDischargeLocation`, `sewerageSystem`, `septicTank`, `sewerageDischargeLocation`, `waterSupply`, `status`, `createdAt`, `updatedAt`) VALUES
(2, 23, 2, '1F381A6840', '11/03/2016', '12/02/2016', 'NA', 'NA', '', 1, 0, 'Mist', 'Boiler|Furnace', 'AQMS', '20', 'None', 0, 'NA', 'Food Wastes', 10, 'Truck', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Sanitary Landfill', 'NA', 1, 'Close/Underground', 'Public Drainage System', 1, 0, 'NA', 'Water Utility', 'Active', '2017-02-28 08:12:12', '2017-02-28 08:27:41'),
(5, 24, 1, 'CBB80768C6', '02/28/2017', '02/28/2017', 'NA', '02/28/2017', '', 1, 1, 'Dust', 'NA', 'NA', '12', 'NA', 0, 'NA', 'Industrial Waste', 5, 'Truck Collection', 'Daily', 'NA', 'NA', 'Sanitary Landfill', 'Reduction', 0, 'NA', 'NA', 0, 0, 'NA', 'Deep Well', 'Active', '2017-02-28 08:17:22', '2017-02-28 08:28:07'),
(6, 24, 3, 'E03C55A553', '02/28/2017', '02/28/2017', 'NA', 'NA', '', 0, 0, 'NA', 'NA', 'NA', '12', 'NA', 0, 'NA', 'Household Waste', 5, 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Sanitary Landfill', 'NA', 0, 'NA', 'NA', 0, 0, 'NA', 'Deep Well', 'For applicant visit', '2017-02-28 10:26:32', '2017-02-28 11:24:00'),
(7, 24, 3, '90036D3C81', '02/28/2017', '02/28/2017', 'NA', 'NA', '', 0, 0, 'NA', 'NA', 'NA', '12', 'NA', 0, 'NA', 'Household Waste', 5, 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Sanitary Landfill', 'NA', 0, 'NA', 'NA', 0, 0, 'NA', 'Deep Well', 'Draft', '2017-02-28 10:27:37', '2017-02-28 10:27:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_engineering`
--

INSERT INTO `application_engineering` (`applicationId`, `userId`, `businessId`, `referenceNum`, `status`, `createdAt`, `updatedAt`) VALUES
(2, 23, 2, '1F381A6840', 'Active', '2017-02-28 08:12:13', '2017-02-28 08:21:13'),
(5, 24, 1, 'CBB80768C6', 'Active', '2017-02-28 08:17:22', '2017-02-28 08:22:42'),
(6, 24, 3, 'E03C55A553', 'Active', '2017-02-28 10:26:32', '2017-02-28 11:20:10'),
(7, 24, 3, '90036D3C81', 'Draft', '2017-02-28 10:27:37', '2017-02-28 10:27:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_sanitary`
--

INSERT INTO `application_sanitary` (`applicationId`, `referenceNum`, `userId`, `businessId`, `applicationDate`, `annualEmployeePhysicalExam`, `typeLevelOfWaterSource`, `status`, `createdAt`, `updatedAt`) VALUES
(2, '1F381A6840', 23, 2, 'February 28, 2017', 1, 'Water tank', 'Active', '2017-02-28 08:12:13', '2017-02-28 08:27:15'),
(5, 'CBB80768C6', 24, 1, 'February 28, 2017', 1, 'NA', 'Active', '2017-02-28 08:17:22', '2017-02-28 08:26:03'),
(6, 'E03C55A553', 24, 3, 'February 28, 2017', 1, 'NA', 'For applicant visit', '2017-02-28 10:26:32', '2017-02-28 11:24:00'),
(7, '90036D3C81', 24, 3, 'February 28, 2017', 1, 'NA', 'Draft', '2017-02-28 10:27:37', '2017-02-28 10:27:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_zoning`
--

INSERT INTO `application_zoning` (`applicationId`, `referenceNum`, `userId`, `businessId`, `status`, `createdAt`, `updatedAt`) VALUES
(2, '1F381A6840', 23, 2, 'Active', '2017-02-28 08:12:12', '2017-02-28 08:25:24'),
(5, 'CBB80768C6', 24, 1, 'Active', '2017-02-28 08:17:22', '2017-02-28 08:26:00'),
(6, 'E03C55A553', 24, 3, 'For applicant visit', '2017-02-28 10:26:32', '2017-02-28 11:24:00'),
(7, '90036D3C81', 24, 3, 'Draft', '2017-02-28 10:27:36', '2017-02-28 10:27:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`approvalId`, `referenceNum`, `role`, `type`, `staff`, `createdAt`, `updatedAt`) VALUES
(41, '1F381A6840', 9, 'Validate', 'tester engineering', '2017-02-28 08:20:59', '2017-02-28 08:20:59'),
(42, '1F381A6840', 9, 'Approve', 'tester engineering', '2017-02-28 08:21:13', '2017-02-28 08:21:13'),
(43, 'CBB80768C6', 9, 'Validate', 'tester engineering', '2017-02-28 08:22:21', '2017-02-28 08:22:21'),
(44, 'CBB80768C6', 9, 'Approve', 'tester engineering', '2017-02-28 08:22:43', '2017-02-28 08:22:43'),
(45, 'CBB80768C6', 4, 'Approve Capital', 'tester bplo', '2017-02-28 08:23:33', '2017-02-28 08:23:33'),
(46, '1F381A6840', 4, 'Approve Capital', 'tester bplo', '2017-02-28 08:23:55', '2017-02-28 08:23:55'),
(47, '1F381A6840', 8, 'Validate', 'tester zoning', '2017-02-28 08:24:29', '2017-02-28 08:24:29'),
(48, '1F381A6840', 8, 'Approve', 'tester zoning', '2017-02-28 08:25:25', '2017-02-28 08:25:25'),
(49, 'CBB80768C6', 8, 'Validate', 'tester zoning', '2017-02-28 08:25:39', '2017-02-28 08:25:39'),
(50, 'CBB80768C6', 10, 'Validate', 'tester sanitary', '2017-02-28 08:25:49', '2017-02-28 08:25:49'),
(51, 'CBB80768C6', 8, 'Approve', 'tester zoning', '2017-02-28 08:26:01', '2017-02-28 08:26:01'),
(52, 'CBB80768C6', 10, 'Approve', 'tester sanitary', '2017-02-28 08:26:04', '2017-02-28 08:26:04'),
(53, '1F381A6840', 10, 'Validate', 'tester sanitary', '2017-02-28 08:26:55', '2017-02-28 08:26:55'),
(54, '1F381A6840', 10, 'Approve', 'tester sanitary', '2017-02-28 08:27:15', '2017-02-28 08:27:15'),
(55, '1F381A6840', 7, 'Validate', 'tester cenro', '2017-02-28 08:27:27', '2017-02-28 08:27:27'),
(56, '1F381A6840', 7, 'Approve', 'tester cenro', '2017-02-28 08:27:42', '2017-02-28 08:27:42'),
(57, 'CBB80768C6', 7, 'Validate', 'tester cenro', '2017-02-28 08:27:51', '2017-02-28 08:27:51'),
(58, 'CBB80768C6', 7, 'Approve', 'tester cenro', '2017-02-28 08:28:08', '2017-02-28 08:28:08'),
(59, '1F381A6840', 5, 'Validate', 'tester bfp', '2017-02-28 08:28:30', '2017-02-28 08:28:30'),
(60, '1F381A6840', 5, 'Approve', 'tester bfp', '2017-02-28 08:29:05', '2017-02-28 08:29:05'),
(61, 'CBB80768C6', 5, 'Validate', 'tester bfp', '2017-02-28 08:30:20', '2017-02-28 08:30:20'),
(62, '1F381A6840', 4, 'Issue', 'tester bplo', '2017-02-28 08:30:27', '2017-02-28 08:30:27'),
(63, 'CBB80768C6', 5, 'Approve', 'tester bfp', '2017-02-28 08:30:43', '2017-02-28 08:30:43'),
(64, 'CBB80768C6', 4, 'Issue', 'tester bplo', '2017-02-28 08:38:55', '2017-02-28 08:38:55'),
(65, 'E03C55A553', 9, 'Validate', 'tester engineering', '2017-02-28 10:28:38', '2017-02-28 10:28:38'),
(66, 'E03C55A553', 9, 'Approve', 'tester engineering', '2017-02-28 10:29:14', '2017-02-28 10:29:14'),
(67, 'E03C55A553', 4, 'Approve Capital', 'tester bplo', '2017-02-28 10:33:30', '2017-02-28 10:33:30'),
(68, 'E03C55A553', 4, 'Approve Capital', 'tester bplo', '2017-02-28 10:36:51', '2017-02-28 10:36:51'),
(69, 'E03C55A553', 8, 'Validate', 'tester zoning', '2017-02-28 10:49:26', '2017-02-28 10:49:26'),
(70, 'E03C55A553', 8, 'Approve', 'tester zoning', '2017-02-28 10:51:20', '2017-02-28 10:51:20'),
(71, 'E03C55A553', 5, 'Validate', 'tester bfp', '2017-02-28 10:52:51', '2017-02-28 10:52:51'),
(72, 'E03C55A553', 5, 'Approve', 'tester bfp', '2017-02-28 10:53:45', '2017-02-28 10:53:45'),
(73, 'E03C55A553', 7, 'Validate', 'tester cenro', '2017-02-28 10:54:39', '2017-02-28 10:54:39'),
(74, 'E03C55A553', 7, 'Approve', 'tester cenro', '2017-02-28 10:54:53', '2017-02-28 10:54:53'),
(75, 'E03C55A553', 10, 'Validate', 'tester sanitary', '2017-02-28 10:55:29', '2017-02-28 10:55:29'),
(76, 'E03C55A553', 10, 'Approve', 'tester sanitary', '2017-02-28 10:55:40', '2017-02-28 10:55:40'),
(77, 'E03C55A553', 4, 'Issue', 'tester bplo', '2016-02-28 11:02:32', '2017-02-28 11:11:16'),
(78, 'E03C55A553', 9, 'Validate', 'tester engineering', '2017-02-28 11:19:59', '2017-02-28 11:19:59'),
(79, 'E03C55A553', 9, 'Approve', 'tester engineering', '2017-02-28 11:20:10', '2017-02-28 11:20:10'),
(80, 'E03C55A553', 4, 'Approve Capital', 'tester bplo', '2017-02-28 11:21:29', '2017-02-28 11:21:29'),
(81, 'E03C55A553', 4, 'Approve Capital', 'tester bplo', '2017-02-28 11:23:58', '2017-02-28 11:23:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archived_applications`
--

INSERT INTO `archived_applications` (`archiveId`, `referenceNum`, `userId`, `taxYear`, `applicationDate`, `modeOfPayment`, `idPresented`, `DTISECCDA_RegNum`, `DTISECCDA_Date`, `brgyClearanceDateIssued`, `CTCNum`, `TIN`, `entityName`, `dateStarted`, `presidentTreasurerName`, `businessName`, `companyName`, `tradeName`, `signageName`, `organizationType`, `corporationName`, `dateOfOperation`, `businessDesc`, `PIN`, `bldgName`, `houseBldgNum`, `unitNum`, `street`, `subdivision`, `barangay`, `cityMunicipality`, `province`, `telNum`, `email`, `pollutionControlOfficer`, `maleEmployees`, `femaleEmployees`, `PWDEmployees`, `LGUEMployees`, `businessArea`, `emergencyContactPerson`, `emergencyTelNum`, `emergencyEmail`, `zoneType`, `lat`, `lng`, `gmapAddress`, `ownerFirstName`, `ownerMiddleName`, `ownerLastName`, `ownerHouseBldgNum`, `ownerBldgName`, `ownerUnitNum`, `ownerStreet`, `ownerBarangay`, `ownerSubdivision`, `ownerCityMunicipality`, `ownerProvince`, `ownerContactNum`, `ownerTelNum`, `ownerEmail`, `ownerPIN`, `CNC`, `LLDAClearance`, `dischargePermit`, `apsci`, `productsAndByProducts`, `smokeEmission`, `volatileCompound`, `fugitiveParticulates`, `steamGenerator`, `APCD`, `stackHeight`, `wastewaterTreatmentFacility`, `wastewaterTreatmentOperationAndProcess`, `pendingCaseWithLLDA`, `typeOfSolidWastesGenerated`, `qtyPerDay`, `garbageCollectionMethod`, `frequencyOfGarbageCollection`, `wasteCollector`, `collectorAddress`, `garbageDisposalMethod`, `wasteMinimizationMethod`, `drainageSystem`, `drainageType`, `drainageDischargeLocation`, `sewerageSystem`, `septicTank`, `sewerageDischargeLocation`, `waterSupply`, `storeys`, `occupiedPortion`, `areaPerFloor`, `occupancyPermitNum`, `annualEmployeePhysicalExam`, `typeLevelOfWaterSource`, `createdAt`, `updatedAt`) VALUES
(1, 'E03C55A553', 24, '2017', 'February 28, 2017', 'Semi-Anually', 'ID - 111111', '111111', '02/28/2017', '02/28/2017', '123456', '123456', 'NA', '2017-02-28 18:26:32', 'Elma Pasahol', 'DOUBLE E BAKESHOP', 'NA', 'NA', 'NA', 'Single', 'NA', '02/17/2017', 'Bakeshop', '4024', 'NA', 'NA', 'NA', 'Paterno Street', 'NA', 'Dela Paz', 'Biñan City', 'Laguna', '123456789', 'doubleebakeshop@yahoo.com', 'Jason Hernandez', '10', '10', '4', '0', '325', 'Jason Hernandez', '09271135485', 'jason@yahoo.com', 'Single residential', 'NA', 'NA', 'NA', 'Elma', 'M', 'Pasahol', 'NA', 'NA', 'NA', 'General Malvar Street', 'Tubigan', 'NA', 'Biñan', 'Laguna', '123456789', '123456789', 'pasahol.elma@yahoo.com', '4024', '02/28/2017', '02/28/2017', 'NA', 'NA', '', '0', '0', 'NA', 'NA', 'NA', '12', 'NA', '0', 'NA', 'Household Waste', '5', 'Truck Collection', 'Daily', 'Jason Hernandez', 'Bacoor, Cavite', 'Sanitary Landfill', 'NA', '0', 'NA', 'NA', '0', '0', 'NA', 'Deep Well', '1', '1', '325', '123456', '1', 'NA', '2017-02-28 11:18:36', '2017-02-28 11:18:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archived_business_activities`
--

INSERT INTO `archived_business_activities` (`archiveId`, `archiveApplicationId`, `lineOfBusiness`, `capitalization`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Retailer', '500000', '2017-02-28 11:18:36', '0000-00-00 00:00:00'),
(2, 1, 'Lessor (Rental)', '350000', '2017-02-28 11:18:36', '0000-00-00 00:00:00'),
(3, 1, 'Others', '1000000', '2017-02-28 11:18:36', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessmentId`, `referenceNum`, `amount`, `paidUpTo`, `status`, `createdAt`, `updatedAt`) VALUES
(2, '1F381A6840', 0, 'None', 'New', '2017-02-28 08:12:14', '2017-02-28 08:12:14'),
(4, '1F381A6840', 0, 'Fourth Quarter', 'New', '2017-02-28 08:19:02', '2017-02-28 08:30:26'),
(5, 'CBB80768C6', 0, 'Fourth Quarter', 'New', '2017-02-28 08:21:01', '2017-02-28 08:38:55'),
(6, 'E03C55A553', 0, 'Fourth Quarter', 'New', '2017-02-28 10:26:32', '2017-02-28 11:02:32'),
(7, 'E03C55A553', 24258, 'None', 'New', '2017-02-28 11:18:37', '2017-02-28 11:24:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`businessId`, `userId`, `ownerId`, `presidentTreasurerName`, `businessName`, `companyName`, `tradeName`, `signageName`, `organizationType`, `corporationName`, `dateOfOperation`, `zoneType`, `businessDesc`, `PIN`, `bldgName`, `houseBldgNum`, `unitNum`, `street`, `barangay`, `subdivision`, `cityMunicipality`, `province`, `lat`, `lng`, `gmapAddress`, `telNum`, `email`, `pollutionControlOfficer`, `maleEmployees`, `femaleEmployees`, `PWDEmployees`, `businessArea`, `LGUResidingEmployees`, `emergencyContactPerson`, `emergencyTelNum`, `emergencyEmail`, `createdAt`, `updatedAt`) VALUES
(1, 24, 1, 'Rico Bihis', 'R V BIHIS TRUCKING SERVICES', 'NA', 'NA', 'NA', 'Single', 'NA', '02/28/2017', 'Commercial/Industrial kind', 'Trucking Services', 4024, 'NA', 'NA', 'NA', 'NA', 'San Vicente', 'Don Pablo Subdivision', 'Biñan City', 'Laguna', 'NA', 'NA', 'NA', '123456789', 'bihis.rico@yahoo.com', 'Rico Bihis', 1, 1, 0, '325', 0, 'Rico Bihis', '123456789', 'bihis.rico@yahoo.com', '2017-02-28 08:07:37', '2017-02-28 08:07:37'),
(2, 23, 2, 'Amor Vergonia', 'Princess Angel Fish Store', 'NA', 'NA', 'NA', 'Single', 'NA', '01/25/2017', 'Single residential', 'Fish Store', 4024, 'Public Market', 'NA', 'NA', 'NA', 'Poblacion', 'NA', 'Biñan City', 'Laguna', 'NA', 'NA', 'NA', '09064883719', 'princessangelfiststore@yahoo.com', 'Amor Vergonia', 1, 0, 0, '5', 0, 'NA', '000', 'angelfishstore@yahoo.com', '2017-02-28 08:08:36', '2017-02-28 08:08:36'),
(3, 24, 3, 'Elma Pasahol', 'DOUBLE E BAKESHOP', 'NA', 'NA', 'NA', 'Single', 'NA', '02/17/2017', 'Single residential', 'Bakeshop', 4024, 'NA', 'NA', 'NA', 'Paterno Street', 'Dela Paz', 'NA', 'Biñan City', 'Laguna', 'NA', 'NA', 'NA', '123456789', 'doubleebakeshop@yahoo.com', 'Jason Hernandez', 10, 10, 4, '325', 0, 'Jason Hernandez', '09271135485', 'jason@yahoo.com', '2017-02-28 10:21:56', '2017-02-28 10:21:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_activities`
--

INSERT INTO `business_activities` (`activityId`, `bploId`, `lineOfBusiness`, `capitalization`, `activityStatus`, `createdAt`, `updatedAt`) VALUES
(2, 2, 'Retailer', '750000', 'active', '2017-02-28 08:12:16', '2017-02-28 08:23:55'),
(4, 5, 'Others', '1000000', 'active', '2017-02-28 08:21:03', '2017-02-28 08:21:03'),
(5, 6, 'Retailer', '500000', 'active', '2017-02-28 10:26:32', '2017-02-28 10:26:32'),
(6, 6, 'Others', '1000000', 'active', '2017-02-28 10:26:33', '2017-02-28 10:26:33'),
(7, 6, 'Lessor (Rental)', '350000', 'active', '2017-02-28 10:26:33', '2017-02-28 10:26:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`chargeId`, `assessmentId`, `period`, `due`, `surcharge`, `interest`, `particulars`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 4, 'F1', 1500, 0, 0, 'ANNUAL INSPECTION FEE', 'paid', '2017-02-28 08:21:12', '2017-02-28 08:30:27'),
(2, 5, 'F1', 950, 0, 0, 'ANNUAL INSPECTION FEE', 'paid', '2017-02-28 08:22:42', '2017-02-28 08:38:55'),
(3, 5, 'F1', 2000, 0, 0, 'MAYOR''S PERMIT FEE (OTHERS)', 'paid', '2017-02-28 08:23:33', '2017-02-28 08:38:55'),
(4, 5, 'F1', 200, 0, 0, 'TAX ON OTHERS', 'paid', '2017-02-28 08:23:33', '2017-02-28 08:38:55'),
(5, 5, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'paid', '2017-02-28 08:23:33', '2017-02-28 08:38:55'),
(6, 5, 'F1', 750, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'paid', '2017-02-28 08:23:33', '2017-02-28 08:38:55'),
(7, 5, 'F1', 300, 0, 0, 'HEALTH CARD FEE', 'paid', '2017-02-28 08:23:33', '2017-02-28 08:38:55'),
(8, 5, 'F1', 1300, 0, 0, 'SANITARY PERMIT FEE', 'paid', '2017-02-28 08:23:34', '2017-02-28 08:38:55'),
(9, 5, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'paid', '2017-02-28 08:23:34', '2017-02-28 08:38:55'),
(10, 5, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'paid', '2017-02-28 08:23:34', '2017-02-28 08:38:55'),
(11, 5, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'paid', '2017-02-28 08:23:34', '2017-02-28 08:38:55'),
(12, 4, 'F1', 1500, 0, 0, 'MAYOR''S PERMIT FEE (RETAILER)', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(13, 4, 'F1', 150, 0, 0, 'TAX ON RETAILER', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(14, 4, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(15, 4, 'F1', 750, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(16, 4, 'F1', 150, 0, 0, 'HEALTH CARD FEE', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(17, 4, 'F1', 100, 0, 0, 'SANITARY PERMIT FEE', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(18, 4, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(19, 4, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(20, 4, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'paid', '2017-02-28 08:23:56', '2017-02-28 08:30:27'),
(21, 6, 'F1', 1000, 0, 0, 'ANNUAL INSPECTION FEE', 'paid', '2017-02-28 10:29:13', '2017-02-28 11:02:32'),
(22, 6, 'F1', 1500, 0, 0, 'MAYOR''S PERMIT FEE (RETAILER)', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(23, 6, 'F1', 150, 0, 0, 'TAX ON RETAILER', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(24, 6, 'F1', 3000, 0, 0, 'MAYOR''S PERMIT FEE (LESSOR (RENTAL))', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(25, 6, 'Q1', 150, 0, 0, 'TAX ON LESSOR (RENTAL)', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(26, 6, 'Q2', 150, 0, 0, 'TAX ON LESSOR (RENTAL)', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(27, 6, 'F1', 2000, 0, 0, 'MAYOR''S PERMIT FEE (OTHERS)', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(28, 6, 'F1', 200, 0, 0, 'TAX ON OTHERS', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(29, 6, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(30, 6, 'F1', 2000, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(31, 6, 'F1', 3600, 0, 0, 'HEALTH CARD FEE', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(32, 6, 'F1', 1300, 0, 0, 'SANITARY PERMIT FEE', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(33, 6, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(34, 6, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(35, 6, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'paid', '2017-02-28 10:36:51', '2017-02-28 11:02:32'),
(36, 7, 'F1', 1200, 0, 0, 'ANNUAL INSPECTION FEE', 'delinquent', '2017-02-28 11:20:10', '2017-02-28 11:21:29'),
(37, 7, 'F1', 1200, 0, 0, '[F1|DEL|2017] ANNUAL INSPECTION FEE', 'delinquent', '2017-02-28 11:21:29', '2017-02-28 11:23:58'),
(38, 7, 'F1', 1200, 0, 0, '[F1|DEL|2017] [F1|DEL|2017] ANNUAL INSPECTION FEE', 'not paid', '2017-02-28 11:23:58', '2017-02-28 11:23:58'),
(39, 7, 'F1', 1500, 0, 0, 'MAYOR''S PERMIT FEE (RETAILER)', 'not paid', '2017-02-28 11:23:58', '2017-02-28 11:23:58'),
(40, 7, 'Q1', 1375, 0, 0, 'TAX ON RETAILER', 'not paid', '2017-02-28 11:23:58', '2017-02-28 11:23:58'),
(41, 7, 'Q2', 1375, 0, 0, 'TAX ON RETAILER', 'not paid', '2017-02-28 11:23:58', '2017-02-28 11:23:58'),
(42, 7, 'F1', 3000, 0, 0, 'MAYOR''S PERMIT FEE (LESSOR (RENTAL))', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(43, 7, 'Q1', 850, 0, 0, 'TAX ON LESSOR (RENTAL)', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(44, 7, 'Q2', 850, 0, 0, 'TAX ON LESSOR (RENTAL)', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(45, 7, 'F1', 2000, 0, 0, 'MAYOR''S PERMIT FEE (OTHERS)', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(46, 7, 'Q1', 729, 0, 0, 'TAX ON OTHERS', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(47, 7, 'Q2', 729, 0, 0, 'TAX ON OTHERS', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(48, 7, 'F1', 600, 0, 0, 'GARBAGE SERVICE FEE', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(49, 7, 'F1', 2000, 0, 0, 'ENVIRONMENTAL CLEARANCE FEE', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(50, 7, 'F1', 3600, 0, 0, 'HEALTH CARD FEE', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(51, 7, 'F1', 1300, 0, 0, 'SANITARY PERMIT FEE', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(52, 7, 'F1', 200, 0, 0, 'BUSINESS INSPECTION FEE', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(53, 7, 'F1', 200, 0, 0, 'ZONING/LOCATION CLEARANCE FEE', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(54, 7, 'F1', 350, 0, 0, 'BUSINESS PLATE & STICKER', 'not paid', '2017-02-28 11:23:59', '2017-02-28 11:23:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(9, 11, 1000, 2000, 3000, 5000, '2017-02-27 14:36:24', '2017-02-27 14:36:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_fixed`
--

INSERT INTO `fee_fixed` (`feeFixedId`, `particular`, `fee`, `conditional`, `createdAt`, `updatedAt`) VALUES
(1, 'Business Inspection Fee', 200, 0, '2017-02-23 14:02:54', '2017-02-23 14:02:54'),
(2, 'Zoning/Location Clearance Fee', 200, 0, '2017-02-23 14:03:55', '2017-02-23 14:03:55'),
(3, 'Retirement Fee', 200, 1, '2017-02-24 01:47:07', '2017-02-24 07:30:45'),
(4, 'Business Plate & Sticker', 350, 0, '2017-02-26 00:13:58', '2017-02-26 00:13:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grosses`
--

INSERT INTO `grosses` (`grossId`, `activityId`, `previousGross`, `essentials`, `nonEssentials`, `createdAt`, `updatedAt`) VALUES
(1, 5, 0, 50000, 50000, '2017-02-28 11:18:37', '2017-02-28 11:18:37'),
(2, 7, 0, 0, 50000, '2017-02-28 11:18:37', '2017-02-28 11:18:37'),
(3, 6, 0, 0, 50000, '2017-02-28 11:18:37', '2017-02-28 11:18:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_applications`
--

INSERT INTO `issued_applications` (`issueId`, `referenceNum`, `dept`, `type`, `createdAt`, `updatedAt`) VALUES
(1, '1F381A6840', 'Engineering', 'New', '2017-02-28 08:21:13', '2017-02-28 08:21:13'),
(2, 'CBB80768C6', 'Engineering', 'New', '2017-02-28 08:22:42', '2017-02-28 08:22:42'),
(3, '1F381A6840', 'Zoning', 'New', '2017-02-28 08:25:24', '2017-02-28 08:25:24'),
(4, 'CBB80768C6', 'Zoning', 'New', '2017-02-28 08:26:00', '2017-02-28 08:26:00'),
(5, 'CBB80768C6', 'CHO', 'New', '2017-02-28 08:26:04', '2017-02-28 08:26:04'),
(6, '1F381A6840', 'CHO', 'New', '2017-02-28 08:27:15', '2017-02-28 08:27:15'),
(7, '1F381A6840', 'CENRO', 'New', '2017-02-28 08:27:42', '2017-02-28 08:27:42'),
(8, 'CBB80768C6', 'CENRO', 'New', '2017-02-28 08:28:08', '2017-02-28 08:28:08'),
(9, '1F381A6840', 'BFP', 'New', '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(10, '1F381A6840', 'BPLO', 'New', '2017-02-28 08:30:27', '2017-02-28 08:30:27'),
(11, 'CBB80768C6', 'BFP', 'New', '2017-02-28 08:30:43', '2017-02-28 08:30:43'),
(12, 'CBB80768C6', 'BPLO', 'New', '2017-02-28 08:38:55', '2017-02-28 08:38:55'),
(13, 'E03C55A553', 'Engineering', 'New', '2017-02-28 10:29:14', '2017-02-28 10:29:14'),
(14, 'E03C55A553', 'Zoning', 'New', '2017-02-28 10:51:20', '2017-02-28 10:51:20'),
(15, 'E03C55A553', 'BFP', 'New', '2017-02-28 10:53:45', '2017-02-28 10:53:45'),
(16, 'E03C55A553', 'CENRO', 'New', '2017-02-28 10:54:53', '2017-02-28 10:54:53'),
(17, 'E03C55A553', 'CHO', 'New', '2017-02-28 10:55:40', '2017-02-28 10:55:40'),
(18, 'E03C55A553', 'BPLO', 'New', '2017-02-28 11:02:32', '2017-02-28 11:10:26'),
(19, 'E03C55A553', 'Engineering', 'Renew', '2017-02-28 11:20:10', '2017-02-28 11:20:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(11, 'Others', 10, 'Common Enterprise', 'others', 'H', 600, '2017-02-27 14:06:43', '2017-02-27 14:06:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationId`, `referenceNum`, `status`, `role`, `notifMessage`, `createdAt`, `updatedAt`) VALUES
(2, '1F381A6840', 'Read', 9, 'Incoming', '2017-02-28 08:12:14', '2017-02-28 08:13:20'),
(4, '1F381A6840', 'Read', 9, 'Incoming', '2017-02-28 08:19:02', '2017-02-28 08:19:20'),
(5, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-02-28 08:20:59', '2017-02-28 08:20:59'),
(6, 'CBB80768C6', 'Read', 9, 'Incoming', '2017-02-28 08:21:01', '2017-02-28 08:21:28'),
(7, '1F381A6840', 'Read', 4, 'New', '2017-02-28 08:21:13', '2017-02-28 08:23:08'),
(8, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been approved by tester engineering from the Office of the Building Official.', '2017-02-28 08:21:13', '2017-02-28 08:21:13'),
(9, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-02-28 08:22:21', '2017-02-28 08:22:39'),
(10, 'CBB80768C6', 'Read', 4, 'New', '2017-02-28 08:22:42', '2017-02-28 08:23:08'),
(11, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been approved by tester engineering from the Office of the Building Official.', '2017-02-28 08:22:43', '2017-02-28 08:22:47'),
(12, 'CBB80768C6', 'Read', 5, 'Incoming', '2017-02-28 08:23:34', '2017-02-28 08:28:05'),
(13, 'CBB80768C6', 'Read', 7, 'Incoming', '2017-02-28 08:23:34', '2017-02-28 08:27:01'),
(14, 'CBB80768C6', 'Read', 8, 'Incoming', '2017-02-28 08:23:34', '2017-02-28 08:24:20'),
(15, 'CBB80768C6', 'Read', 10, 'Incoming', '2017-02-28 08:23:34', '2017-02-28 08:25:11'),
(16, 'CBB80768C6', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-02-28 08:23:35', '2017-02-28 08:23:41'),
(17, '1F381A6840', 'Read', 5, 'Incoming', '2017-02-28 08:23:57', '2017-02-28 08:28:05'),
(18, '1F381A6840', 'Read', 7, 'Incoming', '2017-02-28 08:23:57', '2017-02-28 08:27:01'),
(19, '1F381A6840', 'Read', 8, 'Incoming', '2017-02-28 08:23:57', '2017-02-28 08:24:20'),
(20, '1F381A6840', 'Read', 10, 'Incoming', '2017-02-28 08:23:57', '2017-02-28 08:25:11'),
(21, '1F381A6840', 'Unread', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-02-28 08:23:58', '2017-02-28 08:23:58'),
(22, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been validated by tester zoning of Zoning Department. Please check application status.', '2017-02-28 08:24:29', '2017-02-28 08:24:29'),
(23, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been approved by tester zoning of Zoning Department.', '2017-02-28 08:25:25', '2017-02-28 08:25:25'),
(24, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been validated by tester zoning of Zoning Department. Please check application status.', '2017-02-28 08:25:39', '2017-02-28 09:56:02'),
(25, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been validated by tester sanitary of City Health Office. Please check application status.', '2017-02-28 08:25:49', '2017-02-28 09:56:02'),
(26, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been approved by tester zoning of Zoning Department.', '2017-02-28 08:26:01', '2017-02-28 09:56:02'),
(27, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been approved by tester sanitary of City Health Office.', '2017-02-28 08:26:04', '2017-02-28 09:56:02'),
(28, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been validated by tester sanitary of City Health Office. Please check application status.', '2017-02-28 08:26:55', '2017-02-28 08:26:55'),
(29, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been approved by tester sanitary of City Health Office.', '2017-02-28 08:27:15', '2017-02-28 08:27:15'),
(30, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been validated by tester cenro of City Environment and Natural Resources. Please check application status.', '2017-02-28 08:27:27', '2017-02-28 08:27:27'),
(31, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been approved by tester cenro of City Environment and Natural Resources.', '2017-02-28 08:27:42', '2017-02-28 08:27:42'),
(32, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been validated by tester cenro of City Environment and Natural Resources. Please check application status.', '2017-02-28 08:27:51', '2017-02-28 09:56:02'),
(33, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been approved by tester cenro of City Environment and Natural Resources.', '2017-02-28 08:28:08', '2017-02-28 09:56:02'),
(34, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been validated by tester bfp of Bureau of Fire Protection. Please check application status.', '2017-02-28 08:28:30', '2017-02-28 08:28:30'),
(35, '1F381A6840', 'Read', 4, 'Completed', '2017-02-28 08:29:05', '2017-02-28 08:29:12'),
(36, '1F381A6840', 'Unread', 3, 'Princess Angel Fish Store has been approved by tester bfp of Bureau of Fire Protection.', '2017-02-28 08:29:05', '2017-02-28 08:29:05'),
(37, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been validated by tester bfp of Bureau of Fire Protection. Please check application status.', '2017-02-28 08:30:20', '2017-02-28 09:56:02'),
(38, 'CBB80768C6', 'Read', 4, 'Completed', '2017-02-28 08:30:43', '2017-02-28 08:30:55'),
(39, 'CBB80768C6', 'Read', 3, 'R V BIHIS TRUCKING SERVICES has been approved by tester bfp of Bureau of Fire Protection.', '2017-02-28 08:30:43', '2017-02-28 09:56:02'),
(40, 'E03C55A553', 'Read', 9, 'Incoming', '2017-02-28 10:26:32', '2017-02-28 10:28:27'),
(41, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-02-28 10:28:38', '2017-02-28 10:35:47'),
(42, 'E03C55A553', 'Read', 4, 'New', '2017-02-28 10:29:13', '2017-02-28 10:29:30'),
(43, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been approved by tester engineering from the Office of the Building Official.', '2017-02-28 10:29:14', '2017-02-28 10:35:47'),
(44, 'E03C55A553', 'Read', 5, 'Incoming', '2017-02-28 10:36:52', '2017-02-28 10:52:42'),
(45, 'E03C55A553', 'Read', 7, 'Incoming', '2017-02-28 10:36:52', '2017-02-28 10:54:25'),
(46, 'E03C55A553', 'Read', 8, 'Incoming', '2017-02-28 10:36:52', '2017-02-28 10:49:15'),
(47, 'E03C55A553', 'Read', 10, 'Incoming', '2017-02-28 10:36:52', '2017-02-28 10:55:18'),
(48, 'E03C55A553', 'Read', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-02-28 10:36:52', '2017-02-28 10:47:51'),
(49, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been validated by tester zoning of Zoning Department. Please check application status.', '2017-02-28 10:49:26', '2017-02-28 10:57:46'),
(50, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been approved by tester zoning of Zoning Department.', '2017-02-28 10:51:20', '2017-02-28 10:57:46'),
(51, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been validated by tester bfp of Bureau of Fire Protection. Please check application status.', '2017-02-28 10:52:52', '2017-02-28 10:57:46'),
(52, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been approved by tester bfp of Bureau of Fire Protection.', '2017-02-28 10:53:45', '2017-02-28 10:57:46'),
(53, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been validated by tester cenro of City Environment and Natural Resources. Please check application status.', '2017-02-28 10:54:39', '2017-02-28 10:57:46'),
(54, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been approved by tester cenro of City Environment and Natural Resources.', '2017-02-28 10:54:53', '2017-02-28 10:57:46'),
(55, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been validated by tester sanitary of City Health Office. Please check application status.', '2017-02-28 10:55:29', '2017-02-28 10:57:46'),
(56, 'E03C55A553', 'Read', 4, 'Completed', '2017-02-28 10:55:40', '2017-02-28 10:56:01'),
(57, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP has been approved by tester sanitary of City Health Office.', '2017-02-28 10:55:40', '2017-02-28 10:57:46'),
(58, 'E03C55A553', 'Read', 3, 'DOUBLE E BAKESHOP application has expired, please check application details for renewal request.', '2017-02-28 11:11:19', '2017-02-28 11:11:24'),
(59, 'E03C55A553', 'Read', 9, 'Incoming', '2017-02-28 11:18:37', '2017-02-28 11:19:34'),
(60, 'E03C55A553', 'Unread', 3, 'DOUBLE E BAKESHOP has been validated by tester engineering from the Office of the Building Official. Please check application status.', '2017-02-28 11:20:00', '2017-02-28 11:20:00'),
(61, 'E03C55A553', 'Read', 4, 'New', '2017-02-28 11:20:10', '2017-02-28 11:21:00'),
(62, 'E03C55A553', 'Unread', 3, 'DOUBLE E BAKESHOP has been approved by tester engineering from the Office of the Building Official.', '2017-02-28 11:20:10', '2017-02-28 11:20:10'),
(63, 'E03C55A553', 'Unread', 5, 'Incoming', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(64, 'E03C55A553', 'Unread', 7, 'Incoming', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(65, 'E03C55A553', 'Unread', 8, 'Incoming', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(66, 'E03C55A553', 'Unread', 10, 'Incoming', '2017-02-28 11:23:59', '2017-02-28 11:23:59'),
(67, 'E03C55A553', 'Unread', 3, '<strong>Capitalization</strong> for <strong>Dacudao Apartment</strong> has been <strong>approved!</strong> You can now proceed to other offices to process your remaining requirements.', '2017-02-28 11:24:00', '2017-02-28 11:24:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerId`, `userId`, `firstName`, `middleName`, `lastName`, `suffix`, `gender`, `houseBldgNo`, `bldgName`, `unitNum`, `street`, `barangay`, `subdivision`, `cityMunicipality`, `province`, `PIN`, `contactNum`, `telNum`, `email`, `createdAt`, `updatedAt`) VALUES
(1, 24, 'Rico', 'V.', 'Bihis', '', 'Male', 'NA', 'NA', 'NA', 'NA', 'Vicente', 'Don Pablo Subdivision', 'Biñan City', 'Laguna', '4024', '123456789', '123456789', 'bihis.rico@yahoo.com', '2017-02-28 08:03:09', '2017-02-28 08:03:09'),
(2, 23, 'Amor', 'A', 'Vergonia', '', 'Female', 'NA', 'NA', 'NA', 'Lanzones St', 'Sinalhan', 'St. Alfonso II', 'Santa Rosa City', 'Laguna', '4026', 'NA', '09064883719', 'vergonia.amor@yahoo.com', '2017-02-28 08:03:30', '2017-02-28 08:03:30'),
(3, 24, 'Elma', 'M', 'Pasahol', '', 'Female', 'NA', 'NA', 'NA', 'General Malvar Street', 'Tubigan', 'NA', 'Biñan', 'Laguna', '4024', '123456789', '123456789', 'pasahol.elma@yahoo.com', '2017-02-28 10:18:44', '2017-02-28 10:18:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`transactionId`, `referenceNum`, `assessmentId`, `orNumber`, `amountPaid`, `quarterPaid`, `createdAt`, `updatedAt`) VALUES
(1, '1F381A6840', 4, '78587958', 5500, 'First Quarter', '2017-02-28 08:30:26', '2017-02-28 08:30:26'),
(2, 'CBB80768C6', 5, '98768986', 6850, 'First Quarter', '2017-02-28 08:38:55', '2017-02-28 08:38:55'),
(3, 'E03C55A553', 6, '123456', 16400, 'Second Quarter', '2017-02-28 11:02:32', '2017-02-28 11:02:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_numbers`
--

INSERT INTO `reference_numbers` (`referenceId`, `userId`, `referenceNum`, `createdAt`, `updatedAt`) VALUES
(2, 23, '1F381A6840', '2017-02-28 08:12:11', '2017-02-28 08:12:11'),
(5, 24, 'CBB80768C6', '2017-02-28 08:17:21', '2017-02-28 08:17:21'),
(6, 24, 'E03C55A553', '2017-02-28 10:26:32', '2017-02-28 10:26:32'),
(7, 24, '90036D3C81', '2017-02-28 10:27:36', '2017-02-28 10:27:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renewals`
--

INSERT INTO `renewals` (`renewalId`, `referenceNum`, `year`, `createdAt`, `updatedAt`) VALUES
(1, 'E03C55A553', 2017, '2017-02-28 11:18:38', '2017-02-28 11:18:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submitted_requirements`
--

INSERT INTO `submitted_requirements` (`submittedRequirementsId`, `referenceNum`, `requirementId`, `createdAt`, `updatedAt`) VALUES
(1, '1F381A6840', 8, '2017-02-28 08:25:24', '2017-02-28 08:25:24'),
(2, '1F381A6840', 9, '2017-02-28 08:25:24', '2017-02-28 08:25:24'),
(3, '1F381A6840', 10, '2017-02-28 08:25:24', '2017-02-28 08:25:24'),
(4, '1F381A6840', 11, '2017-02-28 08:25:24', '2017-02-28 08:25:24'),
(5, 'CBB80768C6', 8, '2017-02-28 08:26:00', '2017-02-28 08:26:00'),
(6, 'CBB80768C6', 9, '2017-02-28 08:26:00', '2017-02-28 08:26:00'),
(7, 'CBB80768C6', 10, '2017-02-28 08:26:00', '2017-02-28 08:26:00'),
(8, 'CBB80768C6', 11, '2017-02-28 08:26:00', '2017-02-28 08:26:00'),
(9, 'CBB80768C6', 17, '2017-02-28 08:26:03', '2017-02-28 08:26:03'),
(10, 'CBB80768C6', 18, '2017-02-28 08:26:04', '2017-02-28 08:26:04'),
(11, 'CBB80768C6', 19, '2017-02-28 08:26:04', '2017-02-28 08:26:04'),
(12, '1F381A6840', 17, '2017-02-28 08:27:15', '2017-02-28 08:27:15'),
(13, '1F381A6840', 18, '2017-02-28 08:27:15', '2017-02-28 08:27:15'),
(14, '1F381A6840', 19, '2017-02-28 08:27:15', '2017-02-28 08:27:15'),
(15, '1F381A6840', 12, '2017-02-28 08:27:41', '2017-02-28 08:27:41'),
(16, '1F381A6840', 13, '2017-02-28 08:27:41', '2017-02-28 08:27:41'),
(17, '1F381A6840', 14, '2017-02-28 08:27:41', '2017-02-28 08:27:41'),
(18, '1F381A6840', 15, '2017-02-28 08:27:41', '2017-02-28 08:27:41'),
(19, '1F381A6840', 16, '2017-02-28 08:27:42', '2017-02-28 08:27:42'),
(20, 'CBB80768C6', 12, '2017-02-28 08:28:07', '2017-02-28 08:28:07'),
(21, 'CBB80768C6', 13, '2017-02-28 08:28:07', '2017-02-28 08:28:07'),
(22, 'CBB80768C6', 14, '2017-02-28 08:28:08', '2017-02-28 08:28:08'),
(23, 'CBB80768C6', 15, '2017-02-28 08:28:08', '2017-02-28 08:28:08'),
(24, 'CBB80768C6', 16, '2017-02-28 08:28:08', '2017-02-28 08:28:08'),
(25, '1F381A6840', 20, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(26, '1F381A6840', 21, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(27, '1F381A6840', 22, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(28, '1F381A6840', 23, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(29, '1F381A6840', 24, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(30, '1F381A6840', 25, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(31, '1F381A6840', 26, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(32, '1F381A6840', 27, '2017-02-28 08:29:04', '2017-02-28 08:29:04'),
(33, 'CBB80768C6', 20, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(34, 'CBB80768C6', 21, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(35, 'CBB80768C6', 22, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(36, 'CBB80768C6', 23, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(37, 'CBB80768C6', 24, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(38, 'CBB80768C6', 25, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(39, 'CBB80768C6', 26, '2017-02-28 08:30:42', '2017-02-28 08:30:42'),
(40, 'CBB80768C6', 27, '2017-02-28 08:30:43', '2017-02-28 08:30:43'),
(41, 'E03C55A553', 8, '2017-02-28 10:51:20', '2017-02-28 10:51:20'),
(42, 'E03C55A553', 9, '2017-02-28 10:51:20', '2017-02-28 10:51:20'),
(43, 'E03C55A553', 10, '2017-02-28 10:51:20', '2017-02-28 10:51:20'),
(44, 'E03C55A553', 11, '2017-02-28 10:51:20', '2017-02-28 10:51:20'),
(45, 'E03C55A553', 20, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(46, 'E03C55A553', 21, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(47, 'E03C55A553', 22, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(48, 'E03C55A553', 23, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(49, 'E03C55A553', 24, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(50, 'E03C55A553', 25, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(51, 'E03C55A553', 26, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(52, 'E03C55A553', 27, '2017-02-28 10:53:44', '2017-02-28 10:53:44'),
(53, 'E03C55A553', 12, '2017-02-28 10:54:52', '2017-02-28 10:54:52'),
(54, 'E03C55A553', 13, '2017-02-28 10:54:52', '2017-02-28 10:54:52'),
(55, 'E03C55A553', 14, '2017-02-28 10:54:53', '2017-02-28 10:54:53'),
(56, 'E03C55A553', 15, '2017-02-28 10:54:53', '2017-02-28 10:54:53'),
(57, 'E03C55A553', 16, '2017-02-28 10:54:53', '2017-02-28 10:54:53'),
(58, 'E03C55A553', 17, '2017-02-28 10:55:40', '2017-02-28 10:55:40'),
(59, 'E03C55A553', 18, '2017-02-28 10:55:40', '2017-02-28 10:55:40'),
(60, 'E03C55A553', 19, '2017-02-28 10:55:40', '2017-02-28 10:55:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
(24, 3, 'Renjo', 'Dolosa', 'Enriquez', '', 'male', 'dolosa.renjo@yahoo.com', 8266, 'Single', '$2y$11$3On7LVcZt02XV6d4elwfaOx3eSkY4S5s97VUqOxhyeJBSea2h0RrS', '02/17/1995', '2017-02-28 07:57:20', '2017-02-28 07:57:20');

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
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`chargeId`),
  ADD KEY `assessmentId` (`assessmentId`);

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
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `application_bplo`
--
ALTER TABLE `application_bplo`
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `application_cenro`
--
ALTER TABLE `application_cenro`
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `application_engineering`
--
ALTER TABLE `application_engineering`
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `application_sanitary`
--
ALTER TABLE `application_sanitary`
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `application_zoning`
--
ALTER TABLE `application_zoning`
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approvalId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `archived_applications`
--
ALTER TABLE `archived_applications`
  MODIFY `archiveId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `archived_business_activities`
--
ALTER TABLE `archived_business_activities`
  MODIFY `archiveId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `archived_lessors`
--
ALTER TABLE `archived_lessors`
  MODIFY `archiveId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessmentId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `businessId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `business_activities`
--
ALTER TABLE `business_activities`
  MODIFY `activityId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `chargeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `fee_amusement_devices`
--
ALTER TABLE `fee_amusement_devices`
  MODIFY `amusementDeviceId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fee_common_enterprise`
--
ALTER TABLE `fee_common_enterprise`
  MODIFY `commonEnterpriseFeeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
  MODIFY `feeFixedId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `grossId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issued_applications`
--
ALTER TABLE `issued_applications`
  MODIFY `issueId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
  MODIFY `lineOfBusinessId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `ownerId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `transactionId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reference_numbers`
--
ALTER TABLE `reference_numbers`
  MODIFY `referenceId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `renewalId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `submittedRequirementsId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
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
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_ibfk_1` FOREIGN KEY (`assessmentId`) REFERENCES `assessments` (`assessmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

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
