-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 06:03 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_password` varchar(25) DEFAULT NULL,
  `admin_contact_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_email`, `admin_password`, `admin_contact_no`) VALUES
(2, 'pratikp545@gmail.com', '545545545545', '7819994136'),
(3, 'hardikdonda88@gmail.com', 'hardik9099', '7845454785'),
(4, 'arunmonpara1998@gmail.com', 'arun@123', '5265236502');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisement_id` int(11) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `ads_name` varchar(50) NOT NULL,
  `budget` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `ad_startdate` date NOT NULL,
  `ad_enddate` date NOT NULL,
  `perclick_rate` double NOT NULL,
  `impression_rate` double NOT NULL,
  `perclick_cost` double NOT NULL,
  `ad_type` varchar(10) NOT NULL,
  `ad_size` varchar(10) NOT NULL,
  `ad_file` varchar(100) NOT NULL,
  `ad_link` varchar(250) NOT NULL,
  `ad_category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `u_email`, `ads_name`, `budget`, `status`, `ad_startdate`, `ad_enddate`, `perclick_rate`, `impression_rate`, `perclick_cost`, `ad_type`, `ad_size`, `ad_file`, `ad_link`, `ad_category`) VALUES
(1, 'nddonda007@gmail.com', 'compaign 1', 10, 'stopped', '2018-04-27', '2018-05-09', 0.9, 0.1, 2, 'image', '728 x 90', 'banners/adward-adbanner sizes.png', 'https://www.google.co.in/', 'Shopping'),
(3, 'nddonda007@gmail.com', 'compaign 3', 10, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'image', '728 x 90', 'banners/ad3.jpg', 'https://www.adsense.com', 'Shopping'),
(6, 'nddonda007@gmail.com', 'myshopify', 10, 'stopped', '2018-04-30', '2018-05-07', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/dark_shopify.jpg', 'https://www.shopify.in/', 'Shopping'),
(7, 'nddonda007@gmail.com', 'myshopify', 10, 'stopped', '2018-03-08', '2018-03-09', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/dark_shopify.jpg', 'https://www.shopify.in/', 'Shopping'),
(15, 'nddonda007@gmail.com', 'demo1', 30, 'started', '2018-03-09', '2018-03-10', 0.9, 0.1, 1, 'Image', '728 x 90', 'banners/dark_shopify.jpg', 'https://www.google.com', 'Shopping'),
(16, 'yashjpatel9698@gmail.com', 'shoes 1', 20, 'stopped', '2018-05-03', '2018-05-11', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/Original-Sony-banner.jpg', 'https://www.alexa.com/', 'Shopping'),
(17, 'yashjpatel9698@gmail.com', 'Ads03', 34, 'stopped', '2018-05-05', '2018-05-11', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/adward-adbanner sizes.png', 'https://www.google.com', 'Shopping'),
(18, 'nddonda007@gmail.com', 'GiftCard', 50, 'stopped', '2018-05-08', '2018-05-11', 0.9, 0.1, 2, 'Image', '300 x 250', 'banners/Webp.net-gifmaker.gif', 'https:www.utu.ac.in', 'Education'),
(20, 'nddonda007@gmail.com', 'bearable', 50, 'stopped', '2018-05-04', '2018-05-07', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/ad3.png', 'https//:www.amazon.in', 'Shopping'),
(21, 'nddonda007@gmail.com', 'myshop', 30, 'stopped', '2018-05-05', '2018-05-07', 0.9, 0.1, 2, 'Animation', '300 x 600', 'banners/Webp.net-gifm ergefvb.gif', 'https://www.getjob.com/', 'Job'),
(22, 'nddonda007@gmail.com', 'myshop1', 30, 'stopped', '2018-03-10', '2018-03-12', 0.9, 0.1, 2, 'Animation', '300 x 600', 'banners/Webp.net-gifmaker.gif', 'https://www.google.co.in', 'Shopping'),
(23, 'nddonda007@gmail.com', 'Campaign 8', 34, 'stopped', '2018-05-10', '2018-05-13', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/Webp.net-gifmaker.gif', 'https://www.google.com', 'Blogs'),
(24, 'nddonda007@gmail.com', 'myads', 35, 'stopped', '2018-04-10', '2018-04-12', 0.9, 0.1, 2, 'Animation', '728 x 90', 'banners/ad3.png', 'https://www.flipkart.com/', 'Shopping'),
(25, 'meetkachhadiya3336@gmail.com', 'new shop', 40, 'stopped', '2018-04-10', '2018-04-13', 0.9, 0.1, 2, 'Animation', '300 x 600', 'banners/Webp.net-gifmaker.gif', 'https://www.flipkart.com', 'Shopping'),
(26, 'meetkachhadiya3336@gmail.com', 'new shop2', 30, 'stopped', '2018-05-03', '2018-05-07', 0.9, 0.1, 2, 'Animation', '728 x 90', 'banners/ad3.png', 'https://flipkart.com', 'Shopping'),
(27, 'nddonda007@gmail.com', 'Ads_compaign', 40, 'stopped', '2018-05-04', '2018-05-06', 0.9, 0.1, 2, 'Image', '300 x 250', 'banners/Webp.net-gifmaker.gif', 'https://www.youtube.com/', 'Blogs'),
(28, 'kvpatel366@gmail.com', 'hdvs ad', 30, 'stopped', '2018-05-05', '2018-05-07', 0.9, 0.1, 2, 'Animation', '728 x 90', 'banners/hdvs banner.gif', 'https://www.hdvideostatus.in', 'Entertainment'),
(29, 'nddonda007@gmail.com', 'bus travel', 30, 'stopped', '2018-05-05', '2018-05-07', 0.9, 0.1, 2, 'Image', '300 x 250', 'banners/bus-default-banner.jpg', 'http://www.travelorbit.in/bus/', 'Booking'),
(30, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(31, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(32, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(33, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(34, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(35, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(36, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(37, 'nddonda007@gmail.com', 'Booking', 40, 'stopped', '2018-05-05', '2018-05-08', 0.9, 0.1, 2, 'Animation', '300 x 250', 'banners/redbus-booking.gif', 'https://www.redbus.in', 'Booking'),
(38, 'nddonda007@gmail.com', 'Oakley glasses Ad', 50, 'started', '2018-09-16', '2018-09-19', 0.9, 0.1, 2, 'Image', '728 x 90', 'banners/oakley.jpg', 'https://www.oakley.com/en/men/sunglasses/category/101000000m', 'Shopping');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_click_count`
--

CREATE TABLE `advertiser_click_count` (
  `advertisement_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `click_cost` double NOT NULL,
  `click_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertiser_click_count`
--

INSERT INTO `advertiser_click_count` (`advertisement_id`, `count`, `click_cost`, `click_date`) VALUES
(7, 1, 2, '2018-03-08'),
(6, 1, 2, '2018-03-09'),
(16, 1, 2, '2018-03-09'),
(16, 1, 2, '2018-03-09'),
(24, 1, 2, '2018-04-10'),
(6, 1, 2, '2018-04-26'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 1.5, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 2, '2018-05-01'),
(1, 1, 1, '2018-05-01'),
(1, 1, 2, '2018-05-03'),
(1, 1, 2, '2018-05-03'),
(1, 1, 1.5, '2018-05-03'),
(1, 1, 1.5, '2018-05-03'),
(27, 1, 1.5, '2018-05-04'),
(20, 1, 1.8, '2018-05-05'),
(38, 1, 2, '2018-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_transaction`
--

CREATE TABLE `advertiser_transaction` (
  `u_email` varchar(255) NOT NULL,
  `paid_amount` double NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertiser_transaction`
--

INSERT INTO `advertiser_transaction` (`u_email`, `paid_amount`, `payment_date`) VALUES
('nddonda007@gmail.com', 1000, '2018-03-03'),
('nddonda007@gmail.com', 3000, '2018-03-03'),
('nddonda007@gmail.com', 1000, '2018-03-03'),
('nddonda007@gmail.com', 1200, '2018-03-10'),
('nddonda007@gmail.com', 1500, '2018-03-10'),
('meetkachhadiya3336@gmail.com', 2000, '2018-04-10'),
('meetkachhadiya3336@gmail.com', 1000, '2018-04-10'),
('nddonda007@gmail.com', 7750, '2018-04-29'),
('nddonda007@gmail.com', 1000, '2018-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `adv_wallet`
--

CREATE TABLE `adv_wallet` (
  `u_email` varchar(255) NOT NULL,
  `money` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adv_wallet`
--

INSERT INTO `adv_wallet` (`u_email`, `money`, `date`) VALUES
('meetkachhadiya3336@gmail.com', 3000, '2018-04-10'),
('nddonda007@gmail.com', 8758.2, '2018-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `email`, `comment`, `date`, `status`) VALUES
(7, 'hardikdonda88@gmail.com', 'Something want wrong.? please check your server and tall me what do problem i am not able to login in the system..!!!', '2018-01-24', 'accept'),
(8, 'hardikdonda88@gmail.com', 'Something want wrong.? please check your server and tall me what do problem i am not able to login in the system..!!!', '2018-01-24', 'reject'),
(20, 'rv00788@gmail.com', 'Good Work.', '2018-01-30', 'pending\r\n'),
(23, 'pratik545p@gmail.com', 'Thanks for your Support.... :)', '2018-02-20', 'accept'),
(24, 'pratik545p@gmail.com', 'Thanks for help', '2018-02-20', 'reject'),
(25, 'pratik545p@gmail.com', 'Thanks for help', '2018-02-20', 'accept'),
(26, 'pratik545p@gmail.com', 'Hello Dear good work:)', '2018-02-20', 'accept'),
(27, 'pratik545p@gmail.com', 'Hello Dear good work:)', '2018-02-20', 'reject'),
(28, 'pratik545p@gmail.com', 'Hello Dear good work:)', '2018-02-20', 'reject'),
(29, 'pratik545p@gmail.com', 'my name is raj and am not able to register in the system', '2018-02-20', 'accept'),
(30, 'pratik545p@gmail.com', 'i getting for your help', '2018-02-20', 'reject'),
(32, 'nddonda007@gmail.com', 'great work with manage adveritement portal', '2018-02-20', 'reject'),
(33, 'nddonda007@gmail.com', 'Hello, i need your help.', '2018-02-20', 'accept'),
(34, 'nddonda007@gmail.com', 'Hello, I am Nirav!', '2018-02-20', 'accept'),
(39, 'silverdevil@gmail.com', '\r\nYour site performance is Good:)...', '2018-03-09', 'reject'),
(40, 'pratik545p@gmail.com', 'I\'m not able to use any offers', '2018-03-10', 'pending'),
(41, 'meetkachhadiya3336@gmail.com', ' Banner advertising is a cost-effective way to promote the sites. Thanks for sharing this informative post', '2018-04-10', 'pending'),
(42, 'pratik545p@gmail.com', 'Your system is helpful for me...', '2018-04-10', 'pending'),
(43, 'nddonda007@gmail.com', 'Thanks you sir..', '2018-05-04', 'reject'),
(44, 'pratik545p@gmail.com', 'Thank you sir..', '2018-05-04', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `offer_master`
--

CREATE TABLE `offer_master` (
  `offer_id` int(11) NOT NULL,
  `offer_name` varchar(30) NOT NULL,
  `offer_description` varchar(100) NOT NULL,
  `add_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rupees` double NOT NULL,
  `status` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_master`
--

INSERT INTO `offer_master` (`offer_id`, `offer_name`, `offer_description`, `add_date`, `start_date`, `end_date`, `rupees`, `status`, `image`, `user_type`) VALUES
(11, 'Special Offer', 'Special offer now available for Advertisers.\r\nMinus 0.2 rs per click..', '2018-05-05', '2018-05-05', '2018-05-08', 0.2, 'active', '../advertisement/offer_banner/Special-Offer.jpg', 'Advertiser'),
(12, 'Diwali Offer', 'Special diwali offer now available for publishers....\r\nincreate 0.3 rupees per click', '2018-05-05', '2018-05-05', '2018-05-08', 0.3, 'active', '../advertisement/offer_banner/diwali-offer-banner.jpg', 'Publisher');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_ad_impression`
--

CREATE TABLE `publisher_ad_impression` (
  `u_email` varchar(255) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `impression_earning` double NOT NULL,
  `impression_cost` double NOT NULL,
  `impression_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher_ad_impression`
--

INSERT INTO `publisher_ad_impression` (`u_email`, `advertisement_id`, `count`, `impression_earning`, `impression_cost`, `impression_date`) VALUES
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-06'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-06'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-06'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-06'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-07'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-07'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-07'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.2, '2018-03-07'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-07'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.2, '2018-03-07'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-08'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.2, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 7, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 17, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 15, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 21, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 22, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 22, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 22, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 16, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 22, 1, 0.1, 0.1, '2018-03-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 24, 1, 0.1, 0.1, '2018-04-10'),
('pratik545p@gmail.com', 25, 1, 0.1, 0.1, '2018-04-12'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-04-12'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-04-26'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-04-29'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-04-29'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-04-29'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-03'),
('pratik545p@gmail.com', 27, 1, 0.1, 0.1, '2018-05-04'),
('pratik545p@gmail.com', 27, 1, 0.1, 0.1, '2018-05-04'),
('pratik545p@gmail.com', 27, 1, 0.1, 0.1, '2018-05-04'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 27, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 1, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 26, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 6, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 3, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 20, 1, 0.1, 0.1, '2018-05-05'),
('pratik545p@gmail.com', 38, 1, 0.1, 0.1, '2018-09-16'),
('pratik545p@gmail.com', 38, 1, 0.1, 0.1, '2018-09-16'),
('pratik545p@gmail.com', 38, 1, 0.1, 0.1, '2018-09-16'),
('pratik545p@gmail.com', 38, 1, 0.1, 0.1, '2018-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_click_count`
--

CREATE TABLE `publisher_click_count` (
  `u_email` varchar(255) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `click_earning` double NOT NULL,
  `click_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher_click_count`
--

INSERT INTO `publisher_click_count` (`u_email`, `advertisement_id`, `count`, `click_earning`, `click_date`) VALUES
('pratik545p@gmail.com', 6, 1, 0.9, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.9, '2018-03-09'),
('pratik545p@gmail.com', 16, 1, 0.9, '2018-03-09'),
('pratik545p@gmail.com', 24, 1, 0.9, '2018-04-10'),
('pratik545p@gmail.com', 6, 1, 0.9, '2018-04-26'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 0.9, '2018-05-01'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-03'),
('pratik545p@gmail.com', 1, 1, 1.4, '2018-05-03'),
('pratik545p@gmail.com', 27, 1, 1.2, '2018-05-04'),
('pratik545p@gmail.com', 20, 1, 0.9, '2018-05-05'),
('pratik545p@gmail.com', 38, 1, 0.9, '2018-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `rate_updates`
--

CREATE TABLE `rate_updates` (
  `rate_id` int(11) NOT NULL,
  `per_click_cost` double NOT NULL,
  `per_impression_cost` double NOT NULL,
  `per_click_rate` double NOT NULL,
  `per_impression_rate` double NOT NULL,
  `rate_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_updates`
--

INSERT INTO `rate_updates` (`rate_id`, `per_click_cost`, `per_impression_cost`, `per_click_rate`, `per_impression_rate`, `rate_status`) VALUES
(1, 1, 0.2, 0.4, 0.02, 'deactive'),
(2, 2, 0.2, 0.9, 0.1, 'deactive'),
(3, 3, 0.1, 1, 0.2, 'deactive'),
(4, 2, 0.2, 0.9, 0.1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `u_firstname` varchar(15) NOT NULL,
  `u_lastname` varchar(15) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(40) NOT NULL,
  `u_type` varchar(15) NOT NULL,
  `u_contact_no` varchar(10) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `ac_holdername` varchar(50) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`u_firstname`, `u_lastname`, `u_email`, `u_password`, `u_type`, `u_contact_no`, `bank_name`, `account_no`, `ac_holdername`, `ifsc_code`) VALUES
('Dipak', 'Solanki', 'dipaksolanki@gmail.com', 'ZGlwYWtAMTIz', 'advertiser', '7845129632', 'Dena Bank', '8716731673614523', 'Dipak Solanki', 'DBIN0069504'),
('Hardik', 'Donda', 'hardikdonda88@gmail.com', 'Nzg0NTQ1Nzg0NQ==', 'publisher', '9847168146', 'Bank of Baroda', '8419681796817896', 'Hardik Devrajbhai Donda', '86716897168'),
('Jay', 'Parmar', 'jayparmar111@gmail.com', 'amF5cGFybWFyQDEyMw==', 'advertiser', '7877990987', 'State Bank of India', '7452125236598565', 'Jay H Parmar', 'SBIN0017044'),
('Kevin', 'Patel', 'kevinp66@gmail.com', 'a2V2aW5AMTIz', 'publisher', '7990612106', 'Axis Bank', '1948149514514645', 'Kevin V Patel', 'ABX000152Cc'),
('Kevin', 'Patel', 'kvpatel366@gmail.com', 'a3ZwYXRlbEAxMjM=', 'advertiser', '9656595620', 'Axis Bank', '8176374132173671', 'Kevin V Patel', 'AXI00012I44'),
('Mitul', 'Radadiya', 'mdradadiya007@gmail.com', 'bWl0dWxAMTIz', 'publisher', '7517231257', 'State Bank of India', '7371327136736175', 'Mitul D Radadiya', 'SBIN00H4530'),
('Meet', 'Kachhadiya', 'meetkachhadiya3336@gmail.com', 'bWVldEAxMjM0', 'advertiser', '8401562377', 'State Bank of India', '6485468498465468', 'Meet Kachhadiya', 'SBIN0016040'),
('NIrav', 'Donda', 'nddonda007@gmail.com', 'bmRkb25kYTAwNw==', 'advertiser', '7405644207', 'Central Bank of India', '6542654654161454', 'Nidav D Donda', '65148617968'),
('Pratik', 'Patel', 'pratik545p@gmail.com', 'NTQ1NTQ1NTQ1NTQ1', 'publisher', '7819994136', 'IDBI Bank', '9871965814769881', 'Pratik Devrajbhai Patel', '98681479681'),
('Pratik', 'Donda', 'pratikdonda@gmail.com', 'cHJhdGlrQDEyMw==', 'publisher', '7359426041', 'IDBI Bank', '6716372641651436', 'Pratik D Donda', 'IDBI00N3400'),
('Ravi', 'Savani', 'ravisavani1105@gmail.com', 'cmF2aXNhdmFuaTM2Ng==', 'advertiser', '7698949412', 'State Bank of India', '6459879148718979', 'Ravi s savani', '81798147981'),
('Ravi ', 'Savani', 'ravisavani366@gmail.com', 'cmF2aUAxMjM0NQ==', 'advertiser', '7698949412', 'State Bank of India', '7777856465466566', 'Ravi R Savani', 'SBIN0064550'),
('Yash', 'Patel', 'yashjpatel9698@gmail.com', 'MTIzNDU2Nzg5', 'advertiser', '7819994136', 'Axis Bank', '4798789798798798', 'Yash J Patel', '46468498649');

-- --------------------------------------------------------

--
-- Table structure for table `user_offer`
--

CREATE TABLE `user_offer` (
  `u_email` varchar(255) NOT NULL,
  `offer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_offer`
--

INSERT INTO `user_offer` (`u_email`, `offer_id`) VALUES
('nddonda007@gmail.com', 11),
('pratik545p@gmail.com', 12),
('pratik545p@gmail.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tracker`
--

CREATE TABLE `visitor_tracker` (
  `visitor_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `visitor_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_tracker`
--

INSERT INTO `visitor_tracker` (`visitor_id`, `advertisement_id`, `ip_address`, `visitor_date_time`) VALUES
(14, 6, '192.168.556.09', '2018-03-04 17:51:10'),
(19, 7, '192.168.506.53', '2018-03-05 18:05:32'),
(20, 7, '192.168.506.53', '2018-03-06 20:15:23'),
(21, 7, '659.168.009.53', '2018-03-06 22:22:51'),
(22, 1, '659.168.009.53', '2018-03-07 11:21:20'),
(23, 6, '192.168.159.53', '2018-03-07 11:34:33'),
(25, 7, '192.168.159.48', '2018-03-08 22:26:48'),
(27, 6, '192.108.159.48', '2018-03-09 02:31:37'),
(28, 16, '::1', '2018-03-09 18:49:07'),
(29, 16, '192.108.159.88', '2018-03-09 19:01:25'),
(30, 24, '::1', '2018-04-10 09:57:22'),
(31, 6, '::1', '2018-04-26 13:02:02'),
(33, 1, '::1', '2018-05-03 14:25:47'),
(34, 27, '::1', '2018-05-04 14:53:34'),
(35, 20, '::1', '2018-05-05 12:19:03'),
(36, 38, '::1', '2018-09-16 23:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `website_id` int(11) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `website_title` varchar(30) NOT NULL,
  `website_url` varchar(50) NOT NULL,
  `website_category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`website_id`, `u_email`, `website_title`, `website_url`, `website_category`) VALUES
(5, 'pratik545p@gmail.com', 'Amazon.in', 'https://amazon.in', 'Shopping'),
(6, 'pratik545p@gmail.com', 'FlipKart', 'https://flipkart.com', 'Shopping'),
(7, 'pratik545p@gmail.com', 'Myntra', 'https://www.myntra.com', 'Shopping'),
(8, 'pratik545p@gmail.com', 'ShoutMeLoud', 'https://shoutmeloud.com/', 'Blogs'),
(9, 'pratik545p@gmail.com', 'Lenskart', 'https://www.lenskart.com', 'Shopping');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`),
  ADD KEY `u_email` (`u_email`);

--
-- Indexes for table `advertiser_click_count`
--
ALTER TABLE `advertiser_click_count`
  ADD KEY `advertisement_id` (`advertisement_id`);

--
-- Indexes for table `advertiser_transaction`
--
ALTER TABLE `advertiser_transaction`
  ADD KEY `u_email` (`u_email`);

--
-- Indexes for table `adv_wallet`
--
ALTER TABLE `adv_wallet`
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `offer_master`
--
ALTER TABLE `offer_master`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `publisher_ad_impression`
--
ALTER TABLE `publisher_ad_impression`
  ADD KEY `u_email` (`u_email`),
  ADD KEY `advertisement_id` (`advertisement_id`);

--
-- Indexes for table `publisher_click_count`
--
ALTER TABLE `publisher_click_count`
  ADD KEY `u_email` (`u_email`),
  ADD KEY `advertisement_id` (`advertisement_id`);

--
-- Indexes for table `rate_updates`
--
ALTER TABLE `rate_updates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`u_email`);

--
-- Indexes for table `user_offer`
--
ALTER TABLE `user_offer`
  ADD KEY `u_email` (`u_email`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  ADD PRIMARY KEY (`visitor_id`),
  ADD KEY `advertisement_id` (`advertisement_id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`website_id`),
  ADD KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `offer_master`
--
ALTER TABLE `offer_master`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rate_updates`
--
ALTER TABLE `rate_updates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `website_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`);

--
-- Constraints for table `advertiser_click_count`
--
ALTER TABLE `advertiser_click_count`
  ADD CONSTRAINT `advertiser_click_count_ibfk_1` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);

--
-- Constraints for table `advertiser_transaction`
--
ALTER TABLE `advertiser_transaction`
  ADD CONSTRAINT `advertiser_transaction_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`);

--
-- Constraints for table `adv_wallet`
--
ALTER TABLE `adv_wallet`
  ADD CONSTRAINT `adv_wallet_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`);

--
-- Constraints for table `publisher_ad_impression`
--
ALTER TABLE `publisher_ad_impression`
  ADD CONSTRAINT `publisher_ad_impression_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`),
  ADD CONSTRAINT `publisher_ad_impression_ibfk_2` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);

--
-- Constraints for table `publisher_click_count`
--
ALTER TABLE `publisher_click_count`
  ADD CONSTRAINT `publisher_click_count_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`),
  ADD CONSTRAINT `publisher_click_count_ibfk_2` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);

--
-- Constraints for table `user_offer`
--
ALTER TABLE `user_offer`
  ADD CONSTRAINT `user_offer_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`),
  ADD CONSTRAINT `user_offer_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offer_master` (`offer_id`);

--
-- Constraints for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  ADD CONSTRAINT `visitor_tracker_ibfk_1` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);

--
-- Constraints for table `website`
--
ALTER TABLE `website`
  ADD CONSTRAINT `website_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user_master` (`u_email`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_start_ads` ON SCHEDULE EVERY 1 DAY STARTS '2018-04-12 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO update advertisement set status ="started" where ad_startdate=curdate()$$

CREATE DEFINER=`root`@`localhost` EVENT `update_end_ads` ON SCHEDULE EVERY 1 DAY STARTS '2018-04-12 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO update advertisement set status="stopped" where ad_enddate=curdate()$$

CREATE DEFINER=`root`@`localhost` EVENT `start_offer` ON SCHEDULE EVERY 1 DAY STARTS '2018-04-12 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO update offer_master set status="active" where start_date=curdate()$$

CREATE DEFINER=`root`@`localhost` EVENT `end_offer` ON SCHEDULE EVERY 1 DAY STARTS '2018-04-12 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO update offer_master set status="deactive" where end_date=curdate()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
