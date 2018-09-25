-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 03:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `profession` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `fname`, `lname`, `email`, `dept`, `profession`, `pass`, `gender`, `extension`, `picture`) VALUES
(1, 'Said', 'Ali', 'ascoffy8@gmail.com', 'it', 'support', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '112', 'IMG_20151211_171806.jpg'),
(2, 'Ali', 'Mohamed', 'ali.mohamed@gmail.com', 'sales', 'sales rep', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '112', '5b34aeb9419eb1.jpg'),
(3, 'Khadija', 'Said', 'ascoffy8@gmail.com', 'Legal', 'Lawyer', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '211', '5b34d6865d0a95b070ad352168Capture2.PNG'),
(4, 'Khadija', 'Said', 'khadijah.thani@gmail.com', 'Legal', 'Lawyer', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '211', '5b34d6e84bcadally (2).jpg'),
(5, 'Khadija', 'Said', 'khadijah.thani@gmail.com', 'Legal', 'Lawyer', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '211', '5b34d7323116cally (2).jpg'),
(6, 'Stephen', 'Oyaro', 'vstoya@gmail.com', 'IT', 'IT', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '212', 'IMG_20151211_170332.jpg'),
(8, 'Ali', 'Kaka', 'ali.kaka@gmail.com', 'IT', 'IT', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'male', '251', 'AliIMG_20151211_164230.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `tor` varchar(45) DEFAULT NULL,
  `datetaken` date DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `venue` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `uid`, `tor`, `datetaken`, `returndate`, `venue`, `description`) VALUES
(1, 1, 'projector', '2018-06-28', '2018-06-29', 'my office', 'to do a presentation'),
(2, 1, 'projector', '2018-06-28', '2018-06-29', 'my office', 'to do a presentation');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `tos` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `attachment` varchar(60) DEFAULT NULL,
  `priority` varchar(45) DEFAULT NULL,
  `reportdate` varchar(45) DEFAULT NULL,
  `solution` varchar(200) DEFAULT NULL,
  `uid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `tos`, `description`, `attachment`, `priority`, `reportdate`, `solution`, `uid`) VALUES
(1, 'SAP', 'weee', '5b34a3d5d2e63IMG_20151211_171825.jpg', 'LOW', '2018/06/28', NULL, '1'),
(2, 'Network', 'port not working', '5b34ae0f68dacIMG_20151211_170507.jpg', 'MEDIUM', '2018/06/28', NULL, '1'),
(3, 'SAP', 'help', '2IMG_20151203_203556.jpg', 'MEDIUM', '2018/06/28', NULL, '2'),
(4, 'SAP', 'help', '2IMG_20151203_203556.jpg', 'MEDIUM', '2018/06/28', NULL, '2'),
(5, 'SAP', 'sese', '2IMG_20151211_150706.jpg', 'HIGH', '2018/06/28', NULL, '2'),
(6, 'SAP', 'tony', '2IMG_20151203_215221.jpg', 'MEDIUM', '2018/06/28', NULL, '2'),
(7, 'SAP', 'tony', '2IMG_20151203_215221.jpg', 'MEDIUM', '2018/06/28', NULL, '2'),
(8, 'SAP', 'tony', '2IMG_20151203_215221.jpg', 'MEDIUM', '2018/06/28', NULL, '2'),
(9, 'SAP', 'yyy', '2IMG_20151211_164252.jpg', 'LOW', '2018/06/28', NULL, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
