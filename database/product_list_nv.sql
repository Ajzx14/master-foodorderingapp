-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 01:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_list_nv`
--

CREATE TABLE IF NOT EXISTS `product_list_nv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_list_nv`
--

INSERT INTO `product_list_nv` (`id`, `product_code`, `product_desc`, `product_image`, `product_name`, `product_price`) VALUES
(1, '3AcAM01', 'menu-category-sandwich-chicken-ham-IN-308x140', 'menu-category-sandwich-chicken-ham-IN-308x140.jpg', 'chicken-ham', '135.00'),
(2, '3AcAM02', 'menu-category-sandwich-chicken-seekh-IN-308x140', 'menu-category-sandwich-chicken-seekh-IN-308x140.jpg', 'chicken-seekh', '135.00'),
(3, '3AcAM03', 'menu-category-sandwich-chicken-tandoori-IN-308x140', 'menu-category-sandwich-chicken-tandoori-IN-308x140.jpg', 'chicken-tandoori', '135.00'),
(4, '3AcAM04', 'menu-category-sandwich-chicken-tikka-IN-308x140', 'menu-category-sandwich-chicken-tikka-IN-308x140.jpg', 'chicken-tikka', '140.00'),
(5, '3AcAM05', 'menu-category-sandwich-italianBMT', 'menu-category-sandwich-italianBMT.jpg', 'ItalianBMT', '140.00'),
(6, '3AcAM06', 'menu-category-sandwich-roasted-chicken-IN-308x140', 'menu-category-sandwich-roasted-chicken-IN-308x140.jpg', 'roasted-chicken', '140.00'),
(7, '3AcAM07', 'menu-category-sandwich-subwayclub', 'menu-category-sandwich-subwayclub.jpg', 'subwayclub', '145.00'),
(8, '3AcAM08', 'menu-category-sandwich-SWOCT', 'menu-category-sandwich-SWOCT.jpg', 'SWOCT', '150.00'),
(9, '3AcAM09', 'menu-category-sandwich-turkey-breast-308x140_B', 'menu-category-sandwich-turkey-breast-308x140_B.jpg', 'turkey-breast', '155.00'),
(10, '3AcAM10', 'menu-category-sandwich-turkey-chicken-hami-IN-308x140', 'menu-category-sandwich-turkey-chicken-hami-IN-308x140.jpg', 'turkey-chicken-hami', '160.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
