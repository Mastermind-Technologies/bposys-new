-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD:bplsys.sql
-- Generation Time: Feb 23, 2017 at 03:09 PM
=======
-- Generation Time: Feb 28, 2017 at 08:54 AM
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_bfp`
--

INSERT INTO `application_bfp` (`applicationId`, `userId`, `businessId`, `referenceNum`, `applicationDate`, `storeys`, `occupiedPortion`, `areaPerFloor`, `occupancyPermitNum`, `status`, `createdAt`, `updatedAt`) VALUES
(25, 1, 17, '1E5E2270C6', 'February 22, 2017', 3, '3', 200, 123456, 'Active', '2017-02-22 14:05:00', '2017-02-23 00:48:14');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_bplo`
--

INSERT INTO `application_bplo` (`applicationId`, `referenceNum`, `userId`, `businessId`, `taxYear`, `applicationDate`, `idPresented`, `modeOfPayment`, `DTISECCDA_RegNum`, `DTISECCDA_Date`, `brgyClearanceDateIssued`, `CTCNum`, `TIN`, `entityName`, `status`, `createdAt`, `updatedAt`) VALUES
(37, '1E5E2270C6', 1, 17, 2017, 'February 22, 2017', 'Driver''s License - 000000', 'Quarterly', '123456', '02/22/2017', '02/22/2017', '123456', '123456', 'NA', 'Active', '2017-02-22 14:05:00', '2017-02-23 05:07:17');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_cenro`
--

INSERT INTO `application_cenro` (`applicationId`, `userId`, `businessId`, `referenceNum`, `CNC`, `LLDAClearance`, `dischargePermit`, `apsci`, `productsAndByProducts`, `smokeEmission`, `volatileCompound`, `fugitiveParticulates`, `steamGenerator`, `APCD`, `stackHeight`, `wastewaterTreatmentFacility`, `wastewaterTreatmentOperationAndProcess`, `pendingCaseWithLLDA`, `typeOfSolidWastesGenerated`, `qtyPerDay`, `garbageCollectionMethod`, `frequencyOfGarbageCollection`, `wasteCollector`, `collectorAddress`, `garbageDisposalMethod`, `wasteMinimizationMethod`, `drainageSystem`, `drainageType`, `drainageDischargeLocation`, `sewerageSystem`, `septicTank`, `sewerageDischargeLocation`, `waterSupply`, `status`, `createdAt`, `updatedAt`) VALUES
(32, 1, 17, '1E5E2270C6', '02/22/2017', '02/22/2017', '02/22/2017', '02/22/2017', '', 1, 0, 'Gas', 'NA', 'dummy', '30', 'dummy', 1, 'NA', 'Household Wastes', 30, 'Truck Collection', 'Daily', 'dummy', 'dummy', 'Sanitary Landfill', 'Reduction', 1, 'Close/Underground', 'Public Drainage System', 1, 0, 'NA', 'Deep Well', 'Active', '2017-02-22 14:05:00', '2017-02-23 00:48:56');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_engineering`
--

INSERT INTO `application_engineering` (`applicationId`, `userId`, `businessId`, `referenceNum`, `status`, `createdAt`, `updatedAt`) VALUES
(25, 1, 17, '1E5E2270C6', 'Active', '2017-02-22 14:05:00', '2017-02-22 15:04:29');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_sanitary`
--

INSERT INTO `application_sanitary` (`applicationId`, `referenceNum`, `userId`, `businessId`, `applicationDate`, `annualEmployeePhysicalExam`, `typeLevelOfWaterSource`, `status`, `createdAt`, `updatedAt`) VALUES
(31, '1E5E2270C6', 1, 17, 'February 22, 2017', 1, 'dummy', 'Active', '2017-02-22 14:05:00', '2017-02-23 00:47:24');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_zoning`
--

INSERT INTO `application_zoning` (`applicationId`, `referenceNum`, `userId`, `businessId`, `status`, `createdAt`, `updatedAt`) VALUES
(32, '1E5E2270C6', 1, 17, 'Active', '2017-02-22 14:05:00', '2017-02-23 00:46:22');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
<<<<<<< HEAD:bplsys.sql
=======
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
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

--
-- Dumping data for table `fee_common_enterprise`
--

INSERT INTO `fee_common_enterprise` (`commonEnterpriseFeeId`, `lineOfBusinessId`, `cottageFee`, `smallScaleFee`, `mediumScaleFee`, `largeScaleFee`, `createdAt`, `updatedAt`) VALUES
<<<<<<< HEAD:bplsys.sql
(1, 1, 1000, 2000, 3000, 4000, '2017-02-23 11:56:52', '2017-02-23 11:56:52');
=======
(3, 3, 1000, 3500, 5000, 7500, '2017-02-24 06:25:04', '2017-02-24 06:25:04'),
(4, 4, 1000, 3500, 5000, 7000, '2017-02-24 06:25:34', '2017-02-24 06:25:34'),
(5, 5, 800, 2500, 4000, 6500, '2017-02-24 06:25:55', '2017-02-24 06:25:55'),
(6, 6, 500, 1500, 3000, 5000, '2017-02-24 06:26:13', '2017-02-24 06:26:13'),
(7, 7, 500, 1500, 3000, 5000, '2017-02-24 06:26:48', '2017-02-24 06:26:48'),
(8, 10, 3000, 3000, 6000, 10000, '2017-02-27 02:25:01', '2017-02-27 02:25:01'),
(9, 11, 1000, 2000, 3000, 5000, '2017-02-27 14:36:24', '2017-02-27 14:36:24');
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_financial_institution`
--

<<<<<<< HEAD:bplsys.sql
INSERT INTO `fee_financial_institution` (`financialInstitutionId`, `scale`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'Small', 'Pawnshops, Lending investors, Moneyshops and other financial institutions of same kind', '2017-02-23 12:45:31', '2017-02-23 12:45:31'),
(2, 'Medium', 'Rural, Thrift, and Savings Banks and other financial institutions of same kind', '2017-02-23 12:51:34', '2017-02-23 12:51:34'),
(3, 'Large', 'Commercial, Development and Universal Banks and other financial Institutions of similar scale', '2017-02-23 12:52:06', '2017-02-23 12:52:06');
=======
INSERT INTO `fee_financial_institution` (`financialInstitutionId`, `scale`, `description`, `fee`, `createdAt`, `updatedAt`) VALUES
(1, 'Small', 'Pawnshops, Lending investors, Moneyshops and other financial institutions of same kind', '5000', '2017-02-23 12:45:31', '2017-02-26 01:09:29'),
(2, 'Medium', 'Rural, Thrift, and Savings Banks and other financial institutions of same kind', '7000', '2017-02-23 12:51:34', '2017-02-26 01:09:29'),
(3, 'Large', 'Commercial, Development and Universal Banks and other financial Institutions of similar scale', '10000', '2017-02-23 12:52:06', '2017-02-26 01:09:29');
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

-- --------------------------------------------------------

--
-- Table structure for table `fee_fixed`
--

CREATE TABLE IF NOT EXISTS `fee_fixed` (
  `feeFixedId` int(10) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

--
-- Dumping data for table `fee_fixed`
--

<<<<<<< HEAD:bplsys.sql
INSERT INTO `fee_fixed` (`feeFixedId`, `particular`, `fee`, `createdAt`, `updatedAt`) VALUES
(1, 'Business Inspection Fee', 200, '2017-02-23 14:02:54', '2017-02-23 14:02:54'),
(2, 'Zoning/Location Clearance Fee', 200, '2017-02-23 14:03:55', '2017-02-23 14:03:55');
=======
INSERT INTO `fee_fixed` (`feeFixedId`, `particular`, `fee`, `conditional`, `createdAt`, `updatedAt`) VALUES
(1, 'Business Inspection Fee', 200, 0, '2017-02-23 14:02:54', '2017-02-23 14:02:54'),
(2, 'Zoning/Location Clearance Fee', 200, 0, '2017-02-23 14:03:55', '2017-02-23 14:03:55'),
(3, 'Retirement Fee', 200, 1, '2017-02-24 01:47:07', '2017-02-24 07:30:45'),
(4, 'Business Plate & Sticker', 350, 0, '2017-02-26 00:13:58', '2017-02-26 00:13:58');
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_golf_link`
--

INSERT INTO `fee_golf_link` (`feeGoldLinkId`, `above`, `below`, `fee`, `createdAt`, `updatedAt`) VALUES
(1, 0, 10, 5000, '2017-02-24 05:49:27', '2017-02-24 05:49:27'),
(3, 18, 0, 18000, '2017-02-24 06:01:32', '2017-02-27 14:51:52');
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
(25, 100, 4, 100, '2017-02-23 13:44:04', '2017-02-23 13:56:32');

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

<<<<<<< HEAD:bplsys.sql
=======
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

>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

--
-- Dumping data for table `line_of_businesses`
--

INSERT INTO `line_of_businesses` (`lineOfBusinessId`, `name`, `taxRate`, `type`, `description`, `impositionOfTaxCategory`, `garbageServiceFee`, `createdAt`, `updatedAt`) VALUES
<<<<<<< HEAD:bplsys.sql
(1, 'Retailer', 10, 'Common Enterprise', 'test', '', 600, '2017-02-23 11:40:40', '2017-02-23 11:40:40');
=======
(3, 'Manufacturing Kind', 10, 'Common Enterprise', 'testing', 'A', 1200, '2017-02-24 06:22:33', '2017-02-26 13:10:59'),
(4, 'Wholesaler Kind', 10, 'Common Enterprise', 'testing', 'B', 600, '2017-02-24 06:23:07', '2017-02-26 13:10:54'),
(5, 'Exporter', 10, 'Common Enterprise', 'testing', 'A', 600, '2017-02-24 06:23:23', '2017-02-26 13:11:10'),
(6, 'Retailer', 10, 'Common Enterprise', 'testing', 'D', 600, '2017-02-24 06:23:43', '2017-02-26 13:11:15'),
(7, 'Contractor', 10, 'Common Enterprise', 'testing', 'E', 600, '2017-02-24 06:24:26', '2017-02-26 13:11:19'),
(8, 'Amusement Places', 10, 'Amusement', 'Proprietors of amusement devices/places for a fee', 'H', 600, '2017-02-25 02:02:32', '2017-02-26 13:11:21'),
(9, 'Financial Institution', 10, 'Financial Institution', 'Financial Institutions such as banks', 'F', 600, '2017-02-25 02:10:26', '2017-02-26 13:11:30'),
(10, 'Lessor (Rental)', 10, 'Common Enterprise', 'Lessors of real estate including apartments for rent, boarding houses, Privately owned public markets, subdivision operators or real estate developers, private cemeteries or memorial parks.', 'I', 600, '2017-02-26 13:08:32', '2017-02-26 13:08:32'),
(11, 'Others', 10, 'Common Enterprise', 'others', 'H', 600, '2017-02-27 14:06:43', '2017-02-27 14:06:43');
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
<<<<<<< HEAD:bplsys.sql
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_numbers`
--

INSERT INTO `reference_numbers` (`referenceId`, `userId`, `referenceNum`, `createdAt`, `updatedAt`) VALUES
(40, 1, '1E5E2270C6', '2017-02-22 14:05:00', '2017-02-22 14:05:00');
=======
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
(22, 1, 'Renjo', 'Dolosa', 'Enriquez', '', 'Male', 'bposys.admin@gmail.com', 12341234, 'Single', '$2y$11$te1xFi9kAtZoaH91FfZSfeoZ5DqTJyTrU/Uci63ZEtOXpqmzcUzd.', '02/17/1995', '2017-02-19 12:38:43', '2017-02-19 12:39:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
<<<<<<< HEAD:bplsys.sql
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
=======
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `application_bplo`
--
ALTER TABLE `application_bplo`
<<<<<<< HEAD:bplsys.sql
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
=======
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `application_cenro`
--
ALTER TABLE `application_cenro`
<<<<<<< HEAD:bplsys.sql
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
=======
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `application_engineering`
--
ALTER TABLE `application_engineering`
<<<<<<< HEAD:bplsys.sql
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
=======
  MODIFY `applicationId` int(10) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `application_sanitary`
--
ALTER TABLE `application_sanitary`
<<<<<<< HEAD:bplsys.sql
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
=======
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `application_zoning`
--
ALTER TABLE `application_zoning`
<<<<<<< HEAD:bplsys.sql
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
=======
  MODIFY `applicationId` int(255) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approvalId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
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
  MODIFY `assessmentId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `businessId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_activities`
--
ALTER TABLE `business_activities`
  MODIFY `activityId` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `chargeId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_amusement_devices`
--
ALTER TABLE `fee_amusement_devices`
  MODIFY `amusementDeviceId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fee_common_enterprise`
--
ALTER TABLE `fee_common_enterprise`
<<<<<<< HEAD:bplsys.sql
  MODIFY `commonEnterpriseFeeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
=======
  MODIFY `commonEnterpriseFeeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
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
<<<<<<< HEAD:bplsys.sql
  MODIFY `feeFixedId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
=======
  MODIFY `feeFixedId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `fee_golf_link`
--
ALTER TABLE `fee_golf_link`
  MODIFY `feeGoldLinkId` int(10) NOT NULL AUTO_INCREMENT;
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
  MODIFY `issueId` int(10) NOT NULL AUTO_INCREMENT;
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
<<<<<<< HEAD:bplsys.sql
  MODIFY `lineOfBusinessId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
=======
  MODIFY `lineOfBusinessId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `ownerId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `transactionId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_numbers`
--
ALTER TABLE `reference_numbers`
<<<<<<< HEAD:bplsys.sql
  MODIFY `referenceId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
=======
  MODIFY `referenceId` int(5) NOT NULL AUTO_INCREMENT;
>>>>>>> refs/remotes/origin/assessment-dev:bplsys(clean).sql
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
  MODIFY `submittedRequirementsId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `verificationId` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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
