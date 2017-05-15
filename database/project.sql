-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 09:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_category`
--

CREATE TABLE `area_category` (
  `area_id` int(11) NOT NULL,
  `area_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_category`
--

INSERT INTO `area_category` (`area_id`, `area_title`) VALUES
(1, 'Dhanmondi'),
(2, 'Baily Road'),
(3, 'Khilgaon'),
(4, 'Gulshan'),
(5, 'Banani');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_image` text NOT NULL,
  `links` varchar(30) NOT NULL,
  `restaurant_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`bookmark_id`, `restaurant_id`, `ip_add`, `user_id`, `restaurant_name`, `restaurant_image`, `links`, `restaurant_address`) VALUES
(1, 1, '0', 2, 'fajitas', 'fajitas.jpg', 'http://www.fajitasaz.com', 'dhanmondi'),
(2, 3, '', 3, 'Golden Food', 'golden.jpg', 'http://www.goldenfood.com', 'baily road'),
(4, 2, '', 3, 'Dosa Best', 'dosa.jpg', 'https://www.kfc.com', 'baily road'),
(8, 6, '', 3, 'Loiter Restaurant', 'loiter-d85.jpg', 'https://www.kfc.com', 'banani'),
(9, 4, '', 3, 'Asian Food', 'asian.jpg', 'http://www.foodnetwork.com', 'banani'),
(10, 5, '', 3, 'Zealan Restaurant', 'logo_New_Zealand_Natural.png', 'https://www.kfc.com', 'banani'),
(30, 3, '', 1, 'Golden Food', 'golden.jpg', '', 'baily road'),
(31, 1, '', 1, 'coffee cafe', 'coffe.jpg', '', 'baily road'),
(32, 1, '', 8, 'coffee cafe', 'coffe.jpg', '', 'baily road'),
(33, 2, '', 8, 'Dosa Best', 'dosa.jpg', '', 'baily road');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Grils'),
(2, 'Kabab'),
(3, 'Burger'),
(4, 'Pizza'),
(5, 'Fry'),
(6, 'Hot Dog');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(111) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Soup'),
(2, 'Fried Rice'),
(3, 'Birani'),
(4, 'Chinese '),
(5, 'Bangladeshi'),
(6, 'Indian'),
(9, 'jibon');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(111) NOT NULL,
  `uid` int(111) NOT NULL,
  `fid` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` int(111) NOT NULL,
  `food_qty` int(111) NOT NULL,
  `trx_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`brand_id`, `brand_title`) VALUES
(1, 'chinise'),
(2, 'indian'),
(3, 'bangladeshi'),
(4, 'western'),
(5, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `food_id` int(11) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_brand` int(111) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_title` varchar(255) NOT NULL,
  `food_price` int(111) NOT NULL,
  `food_restaurant` varchar(255) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_details` varchar(255) NOT NULL,
  `food_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`food_id`, `food_category`, `food_brand`, `food_name`, `food_title`, `food_price`, `food_restaurant`, `food_image`, `food_details`, `food_keywords`) VALUES
(4, '1', 2, 'fried rice', 'fried food', 235, ' chinise world', 'chinise-food.jpg', 'this is nice food .', 'fried rice,rice,chiken fried'),
(5, '1', 2, 'soup', 'thai soup', 456, ' euro garden', 'images (1).jpg', 'so delicious soup and people so much like that.', 'soup,thai soup,corn soup'),
(6, '2', 2, 'corn soup', 'famous food', 333, ' boomrs cfe', 'img_45431.jpg', 'best souop', 'soup,thai soup,corn soup,boomers soup'),
(7, '3', 3, 'pizza in', 'best pizza', 345, ' PIZZA IN', 'heart-shaped-pizza-ftr.jpg', 'this is best food and pizza ever in bangladesh.this also called love pizza.', 'pizza in,pizza king,pizza hut'),
(8, '1', 3, 'burger jambu', 'famous food', 44, ' dhaka fired chicken', 'images (1).jpg', 'good food for testy', 'burger,big burger,american burger'),
(9, '1', 3, 'pizza pitasi', 'best pizza', 454, ' grind pizza', 'pizza-hut-coupon.jpg', 'its best pizza ever i test', 'pizza in,pizza king,pizza hut'),
(11, '1', 4, 'king pizza', 'american burger', 200, ' american burger', 'images.jpg', 'rtrtr', 'trtrt'),
(12, '2', 4, 'burger big', 'american burger', 444, ' takeout', 'the-mcdonalds-secret-menu-exposed-12-photos-12.jpg', 'dfdfd', 'fdfdf'),
(13, '4', 1, 'pizza', 'pizza', 333, 'kings pizza', 'pizza-hut-coupon.jpg', 'good pizaa', 'pizza,king pizza,pizzas '),
(14, '1', 2, 'grils', 'grils', 222, 'gril house', 'grilled-chicken.jpg', 'khailgaon', 'gril,grils');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_title` varchar(300) NOT NULL,
  `food_image` text NOT NULL,
  `quantity` int(111) NOT NULL,
  `price` int(111) NOT NULL,
  `total_amount` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `f_id`, `ip_add`, `user_id`, `food_title`, `food_image`, `quantity`, `price`, `total_amount`) VALUES
(7, 2, '0', 2, 'pizza', '4791207-9790062099-Pizza.jpg', 2, 500, 1000),
(8, 3, '0', 2, 'king pizza', 'images (2).jpg', 3, 600, 1800),
(10, 1, '0', 0, 'burger', 'Hamburger.jpg', 1, 200, 200),
(11, 2, '0', 0, 'pizza', '4791207-9790062099-Pizza.jpg', 1, 500, 500),
(12, 1, '0', 2, 'burger', 'Hamburger.jpg', 2, 200, 400),
(13, 3, '0', 0, 'king pizza', 'images (2).jpg', 1, 600, 600),
(14, 13, '0', 2, 'pizza', 'pizza-hut-coupon.jpg', 1, 333, 333),
(15, 2, '0', 3, 'pizza', '4791207-9790062099-Pizza.jpg', 7, 500, 3500),
(21, 7, '0', 3, 'pizza in', 'heart-shaped-pizza-ftr.jpg', 1, 345, 345),
(23, 1, '0', 3, 'burger', 'Hamburger.jpg', 1, 200, 200),
(57, 4, '0', 1, 'fried rice', 'chinise-food.jpg', 1, 235, 235),
(58, 5, '0', 1, 'soup', 'images (1).jpg', 1, 456, 456),
(59, 6, '0', 1, 'corn soup', 'img_45431.jpg', 1, 333, 333),
(87, 5, '0', 8, 'soup', 'images (1).jpg', 1, 456, 456),
(88, 4, '0', 8, 'fried rice', 'chinise-food.jpg', 1, 235, 235),
(89, 6, '0', 8, 'corn soup', 'img_45431.jpg', 1, 333, 333);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_category`
--

CREATE TABLE `restaurant_category` (
  `restaurant_cat_id` int(11) NOT NULL,
  `restaurant_cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_category`
--

INSERT INTO `restaurant_category` (`restaurant_cat_id`, `restaurant_cat_title`) VALUES
(1, 'Party Center'),
(2, 'Chinise'),
(3, 'Fast Food'),
(4, 'Juice Bar'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_title` varchar(255) NOT NULL,
  `restaurant_category` varchar(255) NOT NULL,
  `area_category` varchar(255) NOT NULL,
  `restaurant_image` text NOT NULL,
  `restaurant_address` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`restaurant_id`, `restaurant_name`, `restaurant_title`, `restaurant_category`, `area_category`, `restaurant_image`, `restaurant_address`, `user_id`, `restaurant_keywords`) VALUES
(1, 'coffee cafe', 'coffee cafe', '1', '2', 'coffe.jpg', 'baily road', 2, 'coffee, cold coffee,hot coffee'),
(2, 'Dosa Best', 'dosa best', '1', '2', 'dosa.jpg', 'baily road', 2, 'dosa,indian dosa,thai dosa'),
(3, 'Golden Food', 'golden food', '1', '2', 'golden.jpg', 'baily road', 2, 'golden food,Golden Food,fast food'),
(4, 'Asian Food', 'asian food', '2', '5', 'asian.jpg', 'banani', 1, 'indian restaurant,pakisthan restaurant'),
(5, 'Zealan Restaurant', 'zealan restaurant', '2', '5', 'logo_New_Zealand_Natural.png', 'banani', 1, 'fast food,thai soup'),
(6, 'Loiter Restaurant', 'loiter restaurant', '2', '5', 'loiter-d85.jpg', 'banani', 1, 'restaurant,dhaka city restaurant'),
(7, 'American Burger', 'american burger', '3', '1', 'american-burger.jpg', 'dhanmondi', 3, 'fast food,chinise ,'),
(8, 'Baburchi', 'baburchi', '3', '1', 'baburchi.jpg', 'dhanmondi', 0, 'baburchi restaurant,birani restaurant'),
(9, 'Fajitas', 'fajitas', '4', '1', 'fajitas.jpg', 'dhanmondi', 1, 'dhanmondi restaurant,fajitas'),
(10, 'Heils Kitchin', 'heils kitchin', '4', '3', 'hels.jpg', 'khailgaon', 0, 'heils restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(111) NOT NULL,
  `mobile` varchar(43) NOT NULL,
  `customer_image` text NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `customer_image`, `address1`, `address2`) VALUES
(1, 'Azizur', 'Rahman', 'azizur.jibon@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01521560129', 'Image0208.jpg', 'gulbagh', 'tangails'),
(2, 'Sifat', 'Zaman', 'sifat@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01969508259', 'sifat.jpg', 'sutrapur', 'dhaka'),
(3, 'Dinan', 'Mahmud', 'inan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '02152560129', 'jibon.jpg', 'hajaribagh', 'dhaka'),
(8, 'Sonia', 'Akter', 'sonia@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01685134340', '2015-11-01-15-39-35-816.jpg', 'dfdfdf', 'dfdfdfdf'),
(9, 'Min', 'Sim', 'mim@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01685134340', 'Image0072.jpg', 'dfdfdf', 'dfdfdfdf'),
(10, 'Aydfd', 'Yadfdf', 'dfdad@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01685134340', 'Image0085.jpg', 'dfdfdf', 'dfdfdfdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_category`
--
ALTER TABLE `area_category`
  ADD UNIQUE KEY `area_id` (`area_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  ADD UNIQUE KEY `restaurant_cat_id` (`restaurant_cat_id`);

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
