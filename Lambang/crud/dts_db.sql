-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 06:03 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dts_db`
--
CREATE DATABASE IF NOT EXISTS `dts_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dts_db`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `no_id` varchar(15) NOT NULL,
  `nama_merk` varchar(25) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `jumlah` int(5) NOT NULL,
  PRIMARY KEY (`no_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no_id`, `nama_merk`, `warna`, `jumlah`) VALUES
('1', 'a', 'a', 1),
('2', 'Alpard', 'Hitam', 5),
('3', 'Lenovo', 'merah', 8),
('4', 'Nokia', 'Hitam', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
