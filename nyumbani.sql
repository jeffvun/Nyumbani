-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 03:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyumbani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applications`
--

CREATE TABLE `tbl_applications` (
  `applicationID` int(20) NOT NULL,
  `applicantID` int(20) NOT NULL,
  `listingID` int(20) NOT NULL,
  `application_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blockedusers`
--

CREATE TABLE `tbl_blockedusers` (
  `blockedID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blockedusers`
--

INSERT INTO `tbl_blockedusers` (`blockedID`, `userID`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_listings`
--

CREATE TABLE `tbl_listings` (
  `listingID` int(20) NOT NULL,
  `propertyID` int(20) NOT NULL,
  `isDeleted` int(2) NOT NULL DEFAULT 0 COMMENT '0 = visible\r\n1 = Not visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_listings`
--

INSERT INTO `tbl_listings` (`listingID`, `propertyID`, `isDeleted`) VALUES
(1, 10, 0),
(2, 11, 0),
(3, 12, 0),
(4, 13, 0),
(5, 14, 0),
(6, 15, 0),
(7, 16, 0),
(8, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `paymentID` int(7) NOT NULL,
  `propertyID` int(7) NOT NULL,
  `senderID` int(7) NOT NULL,
  `recipientID` int(7) NOT NULL,
  `paymentMethod` varchar(40) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`paymentID`, `propertyID`, `senderID`, `recipientID`, `paymentMethod`, `paymentDate`, `paymentAmount`) VALUES
(1, 10, 6, 1, 'Card', '2021-11-01', 70000),
(2, 10, 6, 1, 'Rent', '2021-10-01', 70000),
(3, 11, 3, 1, 'Rent', '2021-09-01', 70000),
(4, 15, 5, 2, 'cash', '2021-08-11', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `propertyID` int(7) NOT NULL,
  `ownerID` int(7) NOT NULL,
  `tenantID` int(7) DEFAULT NULL,
  `propertyDescription` varchar(80) NOT NULL,
  `propertyCounty` varchar(20) NOT NULL,
  `propertyPhysicalAddress` varchar(200) NOT NULL,
  `propertyType` enum('Apartment','Townhouse','Maisonette','Villa') NOT NULL,
  `propertyRent` int(7) NOT NULL,
  `thumbnailPhoto` varchar(80) NOT NULL DEFAULT 'placeholder.png',
  `rentDueDate` int(2) NOT NULL DEFAULT 1,
  `dateRented` date DEFAULT NULL,
  `isVerified` int(1) NOT NULL DEFAULT 0,
  `isDeleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '0 - not deleted\r\n1 - deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`propertyID`, `ownerID`, `tenantID`, `propertyDescription`, `propertyCounty`, `propertyPhysicalAddress`, `propertyType`, `propertyRent`, `thumbnailPhoto`, `rentDueDate`, `dateRented`, `isVerified`, `isDeleted`) VALUES
(10, 1, 6, '3 Bedroom Apartment in Nairobi', 'Nairobi', 'Mzima Springs, Lavington', 'Apartment', 70000, 'thumbnail1.jfif', 1, '2019-09-12', 0, b'0'),
(11, 1, 3, '5 Bedroom Mansionette in Nairobi', 'Nairobi', 'Lorem Rd, Kilimani', 'Maisonette', 120000, 'thumbnail2.jfif', 1, '2020-06-01', 0, b'0'),
(12, 1, 4, '3 Bedroom Apartment in Ngong', 'Kajiado', 'lorem Rd, near Ngong |Town', 'Apartment', 60000, 'thumbnail3.jfif', 1, '2021-03-03', 0, b'0'),
(13, 1, NULL, '5 Bedroom Apartment in Nairobi', 'Nairobi', 'Ipsum Text, here here', 'Apartment', 70000, 'thumbnail4.jpg', 1, NULL, 1, b'0'),
(14, 1, NULL, '3 Bedroom Villa in Westlands', 'Nairobi', 'Location x, Westlands', 'Villa', 75000, 'placeholder.png', 1, NULL, 0, b'0'),
(15, 2, 5, 'Single Bedroom Apartment in Kiambu', 'Nairobi', 'Place place place here', 'Apartment', 35000, 'placeholder.png', 1, '2020-01-29', 1, b'0'),
(16, 2, NULL, '2 Bedroom Apartment in Nairobi', 'Nairobi', 'Mzima Springs, Lavington', 'Apartment', 50000, 'placeholder.png', 1, NULL, 1, b'0'),
(17, 3, NULL, '4 Bedroom Mansionette in Nairobi', 'Nairobi', 'Kilimani,  Lorem Square', 'Maisonette', 73000, 'placeholder.png', 1, NULL, 1, b'0'),
(26, 7, NULL, '4 Bedroom Mansionette in Nairobi', 'Mombasa', 'Old Malindi Road, Kisauni', 'Townhouse', 34000, 'placeholder.png', 1, NULL, 1, b'0'),
(27, 1, NULL, '4 Bedroom Mansionette in Nairobi', 'Kajiado', 'Old Malindi Road, Kisauni', 'Maisonette', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(28, 7, NULL, '3 Bedroom Apartment in Kiambu', 'Kisumu', 'Old Malindi Road, Kisauni', 'Townhouse', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(29, 2, NULL, '4 Bedroom Mansionette in Kwale', 'Kwale', 'Old Malindi Road, Kisauni', 'Maisonette', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(30, 16, NULL, '2 Bedroom Apartment in Kisumu', 'Mombasa', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(31, 16, 20, '4 Bedroom Townhouse in Nairobi', 'Tana River', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, '2020-01-09', 0, b'0'),
(32, 1, 22, 'x Bedroom lorem ipsum in Nairobi', 'Mombasa', 'Old Malindi Road, Kisauni', 'Townhouse', 34000, 'placeholder.png', 1, '2020-01-20', 0, b'0'),
(33, 2, 21, 'x Bedroom lorem ipsum in county Y', 'Tana River', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, '2019-09-05', 1, b'0'),
(34, 17, 5, 'x Bedroom lorem ipsum in county Y', 'Kajiado', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, '2020-05-28', 0, b'0'),
(35, 17, NULL, 'x Bedroom lorem ipsum in county Y', 'Kisumu', 'Old Malindi Road, Kisauni', 'Maisonette', 34000, 'placeholder.png', 1, NULL, 1, b'0'),
(36, 3, NULL, 'x Bedroom lorem ipsum in county Y', 'Mombasa', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(37, 1, NULL, 'x Bedroom lorem ipsum in county Y', 'Tana River', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(38, 2, NULL, 'x Bedroom lorem ipsum in county Y', 'Kajiado', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 1, b'0'),
(39, 18, NULL, 'x Bedroom lorem ipsum in county Y', 'Kisumu', 'Old Malindi Road, Kisauni', 'Maisonette', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(40, 2, NULL, 'x Bedroom lorem ipsum in county Y', 'Meru', 'Old Malindi Road, Kisauni', 'Villa', 34000, 'placeholder.png', 1, NULL, 1, b'0'),
(41, 7, NULL, 'x Bedroom lorem ipsum in county Y', 'Kwale', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 1, b'0'),
(42, 18, NULL, 'x Bedroom lorem ipsum in county Y', 'Tana River', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 1, b'0'),
(43, 3, NULL, 'x Bedroom lorem ipsum in county Y', 'Kisumu', 'Old Malindi Road, Kisauni', 'Maisonette', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(44, 3, NULL, 'x Bedroom lorem ipsum in county Y', 'Kajiado', 'Old Malindi Road, Kisauni', 'Apartment', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(45, 3, NULL, 'x Bedroom lorem ipsum in county Y', 'Lamu', 'Old Malindi Road, Kisauni', 'Townhouse', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(46, 3, NULL, 'x Bedroom lorem ipsum in county Y', 'Mombasa', 'Old Malindi Road, Kisauni', 'Villa', 34000, 'placeholder.png', 1, NULL, 0, b'0'),
(47, 2, 4, '3 bedroom apartment somewhere', 'Meru', 'Lorem ipsum road near here', 'Apartment', 0, 'placeholder.png', 1, NULL, 0, b'0'),
(48, 2, 4, '3 bedroom apartment somewhere', 'Meru', 'Lorem ipsum road near here', 'Apartment', 120, 'placeholder.png', 1, NULL, 0, b'0'),
(54, 2, NULL, 'Molestias culpa dolo', 'Mombasa', 'Tempore maxime dolo', 'Villa', 0, 'test: path', 1, NULL, 0, b'0'),
(55, 7, NULL, 'Molestias culpa dolo', 'Mombasa', 'Tempore maxime dolo', 'Villa', 20000, 'test2.png', 1, NULL, 0, b'0'),
(56, 7, NULL, 'Molestias culpa dolo', 'Mombasa', 'Tempore maxime dolo', 'Villa', 20000, 'test2.png', 1, NULL, 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_propertydetails`
--

CREATE TABLE `tbl_propertydetails` (
  `propertyID` int(7) NOT NULL,
  `propertySize` float NOT NULL COMMENT 'squarefeet',
  `landSize` float NOT NULL COMMENT 'acres',
  `rooms` int(3) NOT NULL,
  `bedrooms` int(3) NOT NULL,
  `bathrooms` int(3) NOT NULL,
  `dateBuilt` date NOT NULL,
  `propertyFeatures` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`propertyFeatures`)),
  `availability` bit(1) NOT NULL DEFAULT b'1' COMMENT '0 - not listed\r\n1- available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_propertydetails`
--

INSERT INTO `tbl_propertydetails` (`propertyID`, `propertySize`, `landSize`, `rooms`, `bedrooms`, `bathrooms`, `dateBuilt`, `propertyFeatures`, `availability`) VALUES
(10, 2000, 0.5, 6, 3, 3, '2020-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(11, 5000, 1, 11, 5, 4, '2019-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(12, 2500, 0.5, 6, 3, 3, '2020-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(13, 2000, 0.5, 6, 3, 3, '2020-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(14, 5000, 1, 11, 5, 4, '2019-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(15, 2500, 0.5, 4, 3, 3, '2020-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(16, 2500, 0.5, 3, 1, 1, '2020-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(17, 2500, 0.5, 10, 4, 3, '2020-07-15', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(26, 10000, 2, 6, 3, 3, '2021-04-05', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(27, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(28, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(29, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"0\"\r\n}', b'1'),
(30, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"0\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(31, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(32, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"0\"\r\n}', b'0'),
(33, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(34, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"0\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(35, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(36, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(37, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"0\"\r\n}', b'1'),
(38, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(39, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(40, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(41, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(42, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"0\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"0\"\r\n}', b'1'),
(43, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(44, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"1\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(45, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"0\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(46, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"1\",\r\n   \"parking\":\"0\"\r\n}', b'1'),
(47, 1000, 1, 6, 3, 3, '2019-07-12', '{\r\n   \"balcony\":\"0\",\r\n   \"security\":\"0\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'0'),
(48, 10000, 2, 6, 4, 3, '2021-10-21', '{\r\n   \"balcony\":\"1\",\r\n   \"security\":\"1\",\r\n   \"laundry\":\"0\",\r\n   \"elevator\":\"0\",\r\n   \"parking\":\"1\"\r\n}', b'1'),
(54, 15, 22, 0, 5, 2, '0000-00-00', '{\"balcony\":\"1\",\"security\":\"0\",\"laundry\":\"0\",\"elevator\":\"0\",\"parking\":\"1\"}', b'1'),
(55, 15, 22, 0, 5, 2, '0000-00-00', '{\"balcony\":\"1\",\"security\":\"0\",\"laundry\":\"0\",\"elevator\":\"0\",\"parking\":\"1\"}', b'1'),
(56, 15, 22, 0, 5, 2, '0000-00-00', '{\"balcony\":\"1\",\"security\":\"0\",\"laundry\":\"0\",\"elevator\":\"0\",\"parking\":\"1\"}', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_propertymedia`
--

CREATE TABLE `tbl_propertymedia` (
  `propertyID` int(7) NOT NULL,
  `videoLink` varchar(80) NOT NULL,
  `otherImages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`otherImages`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_propertymedia`
--

INSERT INTO `tbl_propertymedia` (`propertyID`, `videoLink`, `otherImages`) VALUES
(10, 'https://youtu.be/dQw4w9WgXcQ', '{\"1\":\"pic1.jpg\", \"2\":\"pic2.jpg\"}'),
(11, 'https://youtu.be/dQw4w9WgXcQ', '{\"1\":\"pic3.jpg\", \"2\":\"pic4.jpg\"}'),
(12, 'https://youtu.be/dQw4w9WgXcQ', '{\"1\":\"pic2.jpg\", \"2\":\"pic4.jpg\"}'),
(54, 'https://youtu.be/dQw4w9WgXcQ', '{\"1\":\"pic1.jpg\",\"2\":\"pic2.jpg\"}'),
(55, 'https://youtu.be/dQw4w9WgXcQ', '{\"1\":\"pic1.jpg\",\"2\":\"pic2.jpg\"}'),
(56, 'https://youtu.be/dQw4w9WgXcQ', '{\"1\":\"pic1.jpg\",\"2\":\"pic2.jpg\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `requestID` int(10) NOT NULL,
  `propertyID` int(7) NOT NULL,
  `requestMessage` text NOT NULL,
  `requestStatus` tinyint(1) NOT NULL DEFAULT 0,
  `dateRequested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateCompleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleID` int(1) NOT NULL,
  `roleName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleID`, `roleName`) VALUES
(1, 'Admin'),
(2, 'PropertyOwner'),
(3, 'Tenant');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(7) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `role` int(1) NOT NULL,
  `password` varchar(60) NOT NULL,
  `joinDate` date NOT NULL DEFAULT current_timestamp(),
  `isDeleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '0- deleted\r\n1- active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `firstName`, `lastName`, `email`, `role`, `password`, `joinDate`, `isDeleted`) VALUES
(1, 'Eddie', 'Gikundi', 'eddie.gikundi@gmail.com', 2, '123', '2021-11-23', b'0'),
(2, 'Mark', 'Moore', 'markmoore@gmail.com', 2, '123', '2021-11-23', b'0'),
(3, 'Esther', 'Boyle', 'essyBoyle@gmail.com', 3, '123', '2021-11-23', b'0'),
(4, 'Ryan', 'Smith', 'rsmith11@gmail.com', 3, '123', '2021-11-23', b'0'),
(5, 'Hillary', 'Clinton', 'hclinton@gmail.com', 3, '123', '2021-11-23', b'0'),
(6, 'Steve', 'Miller', 'smiller@gmail.com', 3, '123', '2021-11-23', b'0'),
(7, 'Monica', 'Rahad', 'monica@gmail.com', 2, '123', '0000-00-00', b'0'),
(16, 'Mia', 'Don', 'monica12@gmail.com', 2, '123', '0000-00-00', b'0'),
(17, 'Chief', 'Derek', 'Chief@gmail.com', 2, '123', '0000-00-00', b'0'),
(18, 'Roy', 'Mtulile', 'Roy@gmail.com', 2, '123', '0000-00-00', b'0'),
(19, 'Doug', 'Muhi', 'Doug@gmail.com', 3, '123', '0000-00-00', b'0'),
(20, 'Mercy', 'Lucia', 'Lucia@gmail.com', 3, '123', '0000-00-00', b'0'),
(21, 'Amar', 'Umeir', 'Amar@gmail.com', 3, '123', '0000-00-00', b'0'),
(22, 'Cole', 'Wrld', 'jceWrld@gmail.com', 3, '123', '0000-00-00', b'0'),
(23, 'Juice', 'World', 'Juice@gmail.com', 1, '123', '0000-00-00', b'0'),
(24, 'Beth', 'Stoke', 'beth@gmail.com', 3, '123', '2021-11-28', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `applicantID` (`applicantID`),
  ADD KEY `listingID` (`listingID`);

--
-- Indexes for table `tbl_blockedusers`
--
ALTER TABLE `tbl_blockedusers`
  ADD PRIMARY KEY (`blockedID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_listings`
--
ALTER TABLE `tbl_listings`
  ADD PRIMARY KEY (`listingID`),
  ADD KEY `propertyID` (`propertyID`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `senderID` (`senderID`),
  ADD KEY `recipientID` (`recipientID`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`propertyID`),
  ADD KEY `ownerID` (`ownerID`),
  ADD KEY `tenantID` (`tenantID`);

--
-- Indexes for table `tbl_propertydetails`
--
ALTER TABLE `tbl_propertydetails`
  ADD PRIMARY KEY (`propertyID`);

--
-- Indexes for table `tbl_propertymedia`
--
ALTER TABLE `tbl_propertymedia`
  ADD PRIMARY KEY (`propertyID`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `propertyID` (`propertyID`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blockedusers`
--
ALTER TABLE `tbl_blockedusers`
  MODIFY `blockedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_listings`
--
ALTER TABLE `tbl_listings`
  MODIFY `listingID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `paymentID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `propertyID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  ADD CONSTRAINT `tbl_applications_ibfk_1` FOREIGN KEY (`applicantID`) REFERENCES `tbl_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_applications_ibfk_2` FOREIGN KEY (`listingID`) REFERENCES `tbl_listings` (`listingID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_blockedusers`
--
ALTER TABLE `tbl_blockedusers`
  ADD CONSTRAINT `tbl_blockedusers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_listings`
--
ALTER TABLE `tbl_listings`
  ADD CONSTRAINT `tbl_listings_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `tbl_property` (`propertyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD CONSTRAINT `tbl_Payments_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `tbl_property` (`propertyID`),
  ADD CONSTRAINT `tbl_Payments_ibfk_2` FOREIGN KEY (`senderID`) REFERENCES `tbl_users` (`userID`),
  ADD CONSTRAINT `tbl_Payments_ibfk_3` FOREIGN KEY (`recipientID`) REFERENCES `tbl_users` (`userID`);

--
-- Constraints for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD CONSTRAINT `tbl_Property_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `tbl_users` (`userID`),
  ADD CONSTRAINT `tbl_Property_ibfk_2` FOREIGN KEY (`tenantID`) REFERENCES `tbl_users` (`userID`);

--
-- Constraints for table `tbl_propertydetails`
--
ALTER TABLE `tbl_propertydetails`
  ADD CONSTRAINT `tbl_propertyDetails_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `tbl_property` (`propertyID`);

--
-- Constraints for table `tbl_propertymedia`
--
ALTER TABLE `tbl_propertymedia`
  ADD CONSTRAINT `tbl_propertyMedia_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `tbl_property` (`propertyID`);

--
-- Constraints for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD CONSTRAINT `tbl_Requests_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `tbl_property` (`propertyID`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
