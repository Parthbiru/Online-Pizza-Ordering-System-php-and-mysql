-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2024 at 04:22 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'parth', '123', 'parth@gmail.com'),
(2, 'piyu', '$2y$10$TlJt4Z81uQ0GeS.L08YBHukgPtEt0hogvLLjQUhrqAqV4N2i2yuAW', 'piyu.BIRU8194@gmail.com'),
(3, 'bablu', '$2y$10$u/PoYIHaqbhpIDmnTeH8ReNzT210lpBV2/t7mrQMdiHbCcg6mDSoq', 'bablu@gmail.com'),
(4, 'NISHA', '$2y$10$v4NPANXqpCnFk3r8G287ruRgPMZeXAFqDlQ67rSF2ynk/55ZGM.hS', 'NISHA@gmail.com'),
(5, 'mahek', '$2y$10$gBLJcAyw7gP1PB26DUTOVu.qzilE6lQi6sf9cpRrm78hv9iBHF9yO', 'mahek@gmail.com'),
(6, 'hitaxi', '$2y$10$dm9hXO9MO.paTCH2TXTKxuNL3ab.Tf9peyo7SVS1HfHcnu3mAZKPu', 'h@gmail.com'),
(7, 'sonu', '$2y$10$frvHxB6AEGxWrhh3GADmYOFXYBNSSzhElrPq31Yxacjmqti7JYUpW', 'sonu@gmail.com'),
(8, 'hemanshi', '$2y$10$QpJr9oQOPqfTfpJtHJ0IVuh02GfwcRSvxT4bi/D4.rwC1WxNo/o.y', 'hemanshi@gmail.com'),
(9, 'krish', '$2y$10$GXOZwogUPgi03aGLbq4jO.kGRCjPiSyDsFspDGixPg54VZ48KCEFK', 'krish@gmail.com'),
(10, 'kruti', '$2y$10$TnNy2oiFNWxCmR2FEh6FleI4LYAoSkxy5u6KRP9OWG0adpAvL1RDC', 'kruti@gmail.com'),
(11, 'vish', '$2y$10$5ylIhkC9IBQabx1fA8pjKerVFsKASh77vqNtauZ3ML8XD9dkeFgu.', 'vish@yahoo.in'),
(12, 'neel', '$2y$10$iteOP6ksdxwapKVG8fUL5ea8AiKMEX0b6LAedcPasdS7MYh8jBPXi', 'neel@gmail.com'),
(13, 'chintu', '$2y$10$DLM1BcPnJtw/x/vL.iFgl.qv1TA2YGBMT4hM9F9mFYSEL19L27eeS', 'chintu@gmail.com'),
(14, 'dev', '$2y$10$xfOJgSkpvkp5Yx6i3nOiQuLgjjC.VDV2Czuug6Q2QH.dHzDsDQgOq', 'dev@gmail.com'),
(15, 'maam', '$2y$10$5FANES.Cf7.D6k.ZR4JAb.KAiontnkTDQ9Eb1vcrvX1jHhrKOGAPe', 'maam@gmail.com'),
(16, 'milan', '$2y$10$O3uIjvg9Vrr6dZYXdz//oOrHpkA8nDUmFhXHFe6kF3j28yMeed.um', 'milan@gmail.com'),
(17, 'geeta', '$2y$10$tCBWE3pFWaHb4OrCzWIvZOzXJtNB7a4EMw6OcK9Gful6pQUCBRl.2', 'geeta@gmail.com'),
(18, 'guddi', '$2y$10$C5B2RJJD6S3YDACATIPQve7Dpv1tssU5PXAZIxNZTb91G4IIKAI9e', 'guddi@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
