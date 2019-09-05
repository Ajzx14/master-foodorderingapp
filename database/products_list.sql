-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 01:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_list`
--

CREATE TABLE IF NOT EXISTS `products_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(60) NOT NULL,
  `product_desc` text NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `product_name`, `product_desc`, `product_code`, `product_image`, `product_price`) VALUES
(1, 'aloo-patty', 'sandwich-aloo-patty', '3DcAM01', 'menu-category-sandwich-aloo-patty-IN-308x140.jpg', '135.00'),
(2, 'chatpata-channa-patty', 'sandwich-chatpata-channa-patty', '3DcAM02', 'menu-category-sandwich-chatpata-channa-patty-IN-308x140.jpg', '140.00'),
(3, 'corn-peas', 'sandwich-corn-peas', '3DcAM03', 'menu-category-sandwich-corn-peas-IN-308x140.jpg', '110.00'),
(4, 'green-peas-patty', 'menu-category-sandwich-green-peas-patty', '3DcAM04', 'menu-category-sandwich-green-peas-patty-IN-308x140.jpg', '120.00'),
(5, 'hara-bhara-patty', 'menu-category-sandwich-hara-bhara-patty', '3DcAM05', 'menu-category-sandwich-hara-bhara-patty-IN-308x140.jpg', '120.00'),
(6, 'italianBMT', 'menu-category-sandwich-italianBMT', '3DcAM06', 'menu-category-sandwich-italianBMT.jpg', '135.00'),
(7, 'mexican-bean-patty', 'menu-category-sandwich-mexican-bean-patty', '3DcAM07', 'menu-category-sandwich-mexican-bean-patty-IN-308x140.jpg', '135.00'),
(8, 'paneer-tikkai-IN', 'menu-category-sandwich-paneer-tikkai-IN-308x140', '3DcAM08', 'menu-category-sandwich-paneer-tikkai-IN-308x140.jpg', '150.00'),
(9, 'veggiedelite', 'menu-category-sandwich-veggiedelite', '3DcAM09', 'menu-category-sandwich-veggiedelite.jpg', '135.00'),
(10, 'veggie-patty', 'menu-category-sandwich-veggie-patty-IN-308x140', '3DcAM10', 'menu-category-sandwich-veggie-patty-IN-308x140.jpg', '135.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
