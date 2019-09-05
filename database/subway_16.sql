-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2016 at 05:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `subway_16`
--

-- --------------------------------------------------------

--
-- Table structure for table `hd`
--

CREATE TABLE IF NOT EXISTS `hd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` int(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hd`
--

INSERT INTO `hd` (`id`, `fname`, `lname`, `mobile`, `address`, `product_code`) VALUES
(1, 'ajay', 'patel', 2147483647, '41/jay ambika soc,isanpur', '3DcAM05'),
(2, 'ajay', 'patel', 2147483647, '41/jay ambika soc,isanpur', '3AcAM02');

-- --------------------------------------------------------

--
-- Table structure for table `par.patel99@gmail.com`
--

CREATE TABLE IF NOT EXISTS `par.patel99@gmail.com` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_qty` int(50) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `product_prize` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `par.patel99@gmail.com`
--

INSERT INTO `par.patel99@gmail.com` (`id`, `product_name`, `product_code`, `product_qty`, `product_color`, `product_size`, `product_prize`) VALUES
(1, 'aloo-patty', '3DcAM01', 1, 'Whole Weat', 'Hony musterd', 135),
(2, 'chatpata-channa-patty', '3DcAM02', 1, 'Whole Weat', 'Hony musterd', 140),
(3, 'italianBMT', '3DcAM06', 1, 'Whole Weat', 'Hony musterd', 135),
(4, 'hara-bhara-patty', '3DcAM05', 1, 'Whole Weat', 'Hony musterd', 120),
(5, 'chicken-seekh', '3AcAM02', 1, 'Whole Weat', 'Hony musterd', 135);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`) VALUES
(3, 'ajay', 'ajybpatel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'ff3e5aa346f27dc4f73be5c876e9400f'),
(4, 'ajay', 'par.patel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'N', '0d5ad9f9156bf99f676e273ccf9d9ed7'),
(5, 'parth', 'par.patel99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '3167be67b511f11c559e850dbdf1aab7');

-- --------------------------------------------------------

--
-- Table structure for table `wi`
--

CREATE TABLE IF NOT EXISTS `wi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` int(50) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wi`
--

INSERT INTO `wi` (`id`, `fname`, `lname`, `mobile`, `product_code`) VALUES
(1, 'ajay', 'patel', 2147483647, 'NULL'),
(2, 'ajay', 'patel', 2147483647, '3DcAM06'),
(3, 'ajay', 'patel', 9983, '3DcAM04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
