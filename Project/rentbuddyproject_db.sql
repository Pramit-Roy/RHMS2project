-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentbuddyproject_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `land_lord_lady_details`
--

CREATE TABLE `land_lord_lady_details` (
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phno` varchar(14) NOT NULL,
  `acno` varchar(14) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_lord_lady_details`
--

INSERT INTO `land_lord_lady_details` (`fname`, `mname`, `lname`, `email`, `phno`, `acno`, `username`, `password`) VALUES
('Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744', '56789', '@proy', 'pr'),
('P', '', 'R', 'rpra@gmail.com', '456', '456', '@roy', '456'),
('sougata', '', 'nandy', 'sougata.nandy123@gmail.com', '8918206713', '5365365456', 'sougata403', '54321');

-- --------------------------------------------------------

--
-- Table structure for table `residense_details`
--

CREATE TABLE `residense_details` (
  `rname` varchar(30) NOT NULL,
  `colony` varchar(50) NOT NULL,
  `strvill` varchar(30) NOT NULL,
  `po` varchar(30) NOT NULL,
  `ps` varchar(30) NOT NULL,
  `disct` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin` varchar(30) NOT NULL,
  `img` text NOT NULL,
  `un` varchar(30) NOT NULL,
  `rid` int(11) NOT NULL,
  `createdat` datetime DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residense_details`
--

INSERT INTO `residense_details` (`rname`, `colony`, `strvill`, `po`, `ps`, `disct`, `state`, `pin`, `img`, `un`, `rid`, `createdat`, `fname`, `mname`, `lname`, `email`, `phno`) VALUES
('Badalkuthi', 'Satyajit Pally', 'Galsi Station Road', 'Galsi', 'G', 'Purba Barddhaman', 'West Bengal', '713406', 'IMG-662faadab17662.11789594.png', '@roy', 87, '2024-04-29 19:42:42', 'Pramit', '', '', '', ''),
('Badalkuthi2', 'Babla(Satyajit Pally)', 'Babla', 'Galsi', 'Galsi', 'Purba Bardhaman', 'Bengal', '713403', 'IMG-66376ef95f0851.30409467.png', '@roy', 88, '2024-05-05 17:05:21', 'Pramit', '', '', '', ''),
('Badalkuthi3', 'Babla(Gram)', 'Babla Village', 'Galsi', 'Galsi', 'Purba Bardhaman', 'West Bengal', '713428', 'IMG-66376f2851b9a0.42174720.png', '@roy', 89, '2024-05-05 17:06:08', 'Pramit', '', '', '', ''),
('Badalkuthi4', 'Satyajit Pally', 'Galsi Village', 'Galsi', 'Galsi', 'Purba Bardhaman', 'Paschim Bangla', '713403', 'IMG-66376f5f4d09e9.81078407.png', '@roy', 90, '2024-05-05 17:07:03', 'Pramit', '', '', '', ''),
('Badalkuthi5', 'Babla Pally', 'Galsi Station Rasta', 'Galsi', 'Galsi', 'Purba Bardhaman', 'Paschim Banga', '713406', 'IMG-66376fadd8ef26.56314832.png', '@roy', 91, '2024-05-05 17:08:21', 'Pramit', '', '', '', ''),
('Badalkuthi6', 'Babla(gach)', 'Galsi Station ', 'Galsi', 'Galsi', 'Purba Bardhaman', 'West Bengal', '713406', 'IMG-66377bdb4abd83.44288232.png', '@roy', 92, '2024-05-05 18:00:19', '', '', '', '', ''),
('Badalkuthi1', 'New Babla', 'Galsi Station Road', 'Galsi', 'Galsi', 'Purba Bardhaman', 'West Bengal', '713428', 'IMG-66377cb89ff8c3.54279198.jpg', '@roy', 93, '2024-05-05 18:04:00', 'P', '', 'R', '', ''),
('Badalkuthi7', 'Babla(Gram Pally)', 'New Galsi', 'Galsi', 'Galsi', 'Purba Bardhaman', 'Paschim Bengal', '713406', 'IMG-6638b3f8b97ab3.86460942.jpg', '@roy', 96, '2024-05-06 16:12:00', 'P', '', 'R', 'rpra@gmail.com', '456'),
('Small House', 'Babla (Satyajit Pally)', 'Galsi Station Road', 'Galsi', 'Galsi', 'Purba Barddhaman', 'West Bengal', '713406', 'IMG-6638b9d6c56e12.77772332.jpg', '@proy', 97, '2024-05-06 16:37:02', 'Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744'),
('Santhal House', 'Mirikpara', 'Galsi', 'Galsi', 'Galsi', 'Purba Barddhaman', 'West Bengal', '713406', 'IMG-6638ba1cc6dc77.13660057.jpg', '@proy', 98, '2024-05-06 16:38:12', 'Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744'),
('Palace', 'Subhas Pally', 'Burdwan Station Road', 'Baburbag', 'Burdwan South', 'Purba Barddhaman', 'West Bengal', '713102', 'IMG-6638bb1e7e9925.10825746.jpg', '@proy', 99, '2024-05-06 16:42:30', 'Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744'),
('Tanbu', 'Singhdarja Gali', 'Khoshbagan Road', 'Mithapukur', 'Burdwan South', 'Purba Barddhaman', 'West Bengal', '713102', 'IMG-6638bc12cd2622.08588980.jpg', '@proy', 100, '2024-05-06 16:46:34', 'Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744'),
('Japan Rajbari', 'Saltlake Sector 5', 'Inner Ring Road', 'Bidhannagar', 'Calcutta South', 'South 24 Pargana', 'West Bengal', '700001', 'IMG-6638bc905878a4.55992295.jpg', '@proy', 101, '2024-05-06 16:48:40', 'Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744'),
('', '', '', '', '', '', '', '', 'IMG-663c9324cb3c69.13385521.jpg', '@proy', 102, '2024-05-09 14:41:00', 'Pramit', '', 'Roy', 'rpramit415@outlook.com', '9382867744');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_details`
--

CREATE TABLE `tenant_details` (
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mono` varchar(14) NOT NULL,
  `acno` varchar(14) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant_details`
--

INSERT INTO `tenant_details` (`fname`, `mname`, `sname`, `email`, `mono`, `acno`, `username`, `password`) VALUES
('PR', '', 'oy', 'rpramit415@gmail.com', '45', '7578575', '7654', '75'),
('PR', 'Tenant', 'PR', 'rpramit415@gmal.com', '09382867744', '677', '@pra', '45'),
('Pramit', '', 'Roy', 'rpramit415@gmail.com', '9382867744', '45', '@prami', '45'),
('Pramit', 'Tenant', 'Roy', 'rpramit415@gmail.com', '9382867744', '456', '@pramit', '45'),
('sougata', '', 'nandy', 'sougata.nandy123@gmail.com', '8918206713', '5356354665764', 'sougata402', '4321');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `img`) VALUES
(4, 'IMG-662632e90e6946.29102606.png'),
(5, 'IMG-662632f121ba12.17497702.png'),
(6, 'IMG-662632f95539e5.26931023.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `land_lord_lady_details`
--
ALTER TABLE `land_lord_lady_details`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `acno` (`acno`);

--
-- Indexes for table `residense_details`
--
ALTER TABLE `residense_details`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tenant_details`
--
ALTER TABLE `tenant_details`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `acno` (`acno`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `residense_details`
--
ALTER TABLE `residense_details`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
