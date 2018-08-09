-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:20 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `addr` text NOT NULL,
  `dob` text NOT NULL,
  `tel` text NOT NULL,
  `addrnextofkin` text NOT NULL,
  `nextofkin` text NOT NULL,
  `sex` text NOT NULL,
  `rel` text NOT NULL,
  `pix` text NOT NULL,
  `cardno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `id` int(11) NOT NULL,
  `lga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`id`, `lga`) VALUES
(2, 'Okitipupa'),
(3, 'Ilaje'),
(4, 'Akure South'),
(5, 'Owo'),
(6, 'Ifon'),
(7, 'Irele'),
(8, 'Ose'),
(9, 'Akoko North East'),
(10, 'Akoko North West'),
(11, 'Akure East'),
(12, 'Akoko South West'),
(13, 'Akure North'),
(14, 'Ese-Odo'),
(15, 'Idanre'),
(16, 'Ifedore'),
(17, 'Ile-Oluji'),
(18, 'Okeigbo'),
(19, 'Ondo East'),
(20, 'Ondo West');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `surname` text NOT NULL,
  `othername` text NOT NULL,
  `sex` text NOT NULL,
  `lga` text NOT NULL,
  `state` text NOT NULL,
  `nationality` text NOT NULL,
  `ph` text NOT NULL,
  `mail` text NOT NULL,
  `passport` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `surname`, `othername`, `sex`, `lga`, `state`, `nationality`, `ph`, `mail`, `passport`, `date`) VALUES
(1, 'Edwin', 'Praise', 'Male', 'Akure', 'Ondo', 'Nigeria', '08107926083', 'akinjejibamikole@yahoo.com', '81acff5caec04a94cd53334b0624a847img_20131202_072233.jpg', '15th October 2015'),
(2, 'Desmond', 'Drake', 'Male', 'Ilaje', 'Ondo', 'Nigeria', '08107926085', 'akindutireayo@yahoo.com', '02cdfef30b290a4535733a06b79be2d7998541_509179755828723_1935360690_n.jpg', '15th October 2015');

-- --------------------------------------------------------

--
-- Table structure for table `performancetab`
--

CREATE TABLE `performancetab` (
  `id` int(11) NOT NULL,
  `ifr` text NOT NULL,
  `tg` text NOT NULL,
  `st` int(11) NOT NULL,
  `lm` varchar(78) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `mat` text NOT NULL,
  `password` text NOT NULL,
  `pix` text NOT NULL,
  `sex` text NOT NULL,
  `bk` varchar(2) NOT NULL,
  `dpt` text NOT NULL,
  `extrights` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `mat`, `password`, `pix`, `sex`, `bk`, `dpt`, `extrights`) VALUES
(1, 'Admin', 'Akinsuyi Allison Wilson', 'createaccount@cliqs.com', 'cbaac6303676c08e8dfa39d51d0d09e947878ad5', '1274882akinsuyi.jpg', 'Male', '0', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `make` text NOT NULL,
  `model` text NOT NULL,
  `color` text NOT NULL,
  `chasisno` text NOT NULL,
  `engineno` text NOT NULL,
  `plateno` text NOT NULL,
  `fview` text NOT NULL,
  `date` text NOT NULL,
  `fueltype` text NOT NULL,
  `vehicleuse` text NOT NULL,
  `vtype` text NOT NULL,
  `ownerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `make`, `model`, `color`, `chasisno`, `engineno`, `plateno`, `fview`, `date`, `fueltype`, `vehicleuse`, `vtype`, `ownerid`) VALUES
(1, 'Camry Le', 'Tyt', 'Nissan', 'Brown', '4777667', '5465665', '67676767', '9b3cca2f32201a8b8ab61a687da34239screenshot_2014-07-20-17-25-28.png', '15th October 2015', 'Gas', 'Private', 'Van', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performancetab`
--
ALTER TABLE `performancetab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lga`
--
ALTER TABLE `lga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `performancetab`
--
ALTER TABLE `performancetab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
