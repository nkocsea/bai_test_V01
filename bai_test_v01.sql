-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 01:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bai_test_v01`
--

-- --------------------------------------------------------

--
-- Table structure for table `thongtinkhachhang`
--

CREATE TABLE `thongtinkhachhang` (
  `id` int(11) NOT NULL,
  `maso` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `namsinh` date DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thongtinkhachhang`
--

INSERT INTO `thongtinkhachhang` (`id`, `maso`, `hoten`, `namsinh`, `datetime`, `status`) VALUES
(44, '2211241211050001', 'Nguyễn Văn An', '2022-11-21', '2022-11-24 19:21:39', 1),
(45, '2211241211150002', 'Nguyễn Văn Bình', '2022-11-09', '2022-11-24 19:21:31', 1),
(47, '2211241211320004', 'Lê Minh Lâm', '2022-10-31', '2022-11-24 19:21:22', 1),
(48, '2211241211540004', 'Nguyễn Minh Lâm', '2022-11-20', '2022-11-24 19:17:37', 1),
(49, '2211241311210005', 'Nguyên Văn Phụng', '1992-11-22', '2022-11-24 19:18:55', 1),
(50, '2211241311560006', 'Nguyễn Thị Bé', '2022-11-18', '2022-11-24 19:19:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thongtinkhachhang`
--
ALTER TABLE `thongtinkhachhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thongtinkhachhang`
--
ALTER TABLE `thongtinkhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
