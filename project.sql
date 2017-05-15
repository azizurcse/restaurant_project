-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 06:13 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'jibon', 'admin@gmail.com', '100141');

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
(32, 1, '', 8, 'coffee cafe', 'coffe.jpg', '', 'baily road'),
(33, 2, '', 8, 'Dosa Best', 'dosa.jpg', '', 'baily road'),
(38, 3, '', 1, 'Golden Food', 'golden.jpg', '', 'baily road'),
(39, 1, '', 13, 'coffee cafe', 'coffe.jpg', '', 'baily road');

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
(6, 'Indian');

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
-- Table structure for table `delivery_service`
--

CREATE TABLE `delivery_service` (
  `delivery_man_id` int(11) NOT NULL,
  `delivery_man_name` varchar(111) NOT NULL,
  `delivery_email` varchar(111) NOT NULL,
  `delivery_pass` varchar(111) NOT NULL,
  `delivery_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_service`
--

INSERT INTO `delivery_service` (`delivery_man_id`, `delivery_man_name`, `delivery_email`, `delivery_pass`, `delivery_area`) VALUES
(1, 'Rashed', 'dhanmondideliveryman@gmail.com', 'delivery123', 'Dhanmondi'),
(2, 'Limon', 'warideliveryman@gmail.com', 'delivery123', 'Wari'),
(3, 'Rimon', 'gulshandeliveryman@gmail.com', 'delivery123', 'Gulshan'),
(4, 'Shipon', 'bananideliveryman@gmail.com', 'delivery123', 'Banani'),
(5, 'Ripon', 'uttaradeliveryman@gmail.com', 'delivery123', 'Uttara'),
(6, 'mahin', 'anonta93@gmail.com', '12345', 'dhaka');

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
(4, '2', 1, 'fried rice', 'fried food', 235, ' chinise world', 'chinise-food.jpg', 'this is nice food .', 'fried rice,rice,chiken fried'),
(5, '1', 2, 'soup', 'thai soup', 456, ' euro garden', 'images (1).jpg', 'so delicious soup and people so much like that.', 'soup,thai soup,corn soup'),
(6, '1', 3, 'corn soup', 'famous food', 333, ' boomrs cfe', 'img_45431.jpg', 'best soup', 'soup,thai soup,corn soup,boomers soup'),
(7, '4', 4, 'pizza in', 'best pizza', 345, ' PIZZA IN', 'heart-shaped-pizza-ftr.jpg', 'this is best food and pizza ever in bangladesh.this also called love pizza.', 'pizza in,pizza king,pizza hut'),
(8, '1', 4, 'chinise soup', 'famous food', 44, ' dhaka fired chicken', 'thai-soup.jpg', 'good food for testy', 'burger,big burger,american burger'),
(9, '4', 4, 'pizza pitasi', 'best pizza', 454, ' grind pizza', 'pizza-hut-coupon.jpg', 'its best pizza ever i test', 'pizza in,pizza king,pizza hut'),
(11, '2', 5, 'chinese_fried_rice', 'chinese_fried_rice', 200, 'cherry drops', 'chinese_fried_rice.jpg', 'chicken and rice and vegetable ', 'rice,fried rice'),
(12, '2', 6, 'Chicken fried rice', 'Chicken fried rice', 444, ' takeout', 'fired-chicken.jpg', 'Its good taste and you also taste it.', 'rice,fried rice,rice bowl'),
(13, '4', 4, 'pizza', 'pizza', 333, 'kings pizza', 'pizza-hut-coupon.jpg', 'good pizaa', 'pizza,king pizza,pizzas '),
(21, '3', 0, 'birani', 'Nanna birani', 150, ' nanna ', 'kacci_biryani.jpg', 'best birani in dhaka city', 'birani,nanna birani, best birani,birayani'),
(22, '3', 0, 'Morog polau', 'Morog polau', 180, ' Fokhruddin', 'takeaway-food-nanna-biryani-28.jpg', 'It is the best for morog polau', 'polau, morog polau,fokhruddin'),
(23, '3', 1, 'Chicken birani', 'Chicken birani', 160, ' Star hotel and restaurant', 'kolkata-kacchi-ghor.jpg', 'chicken birani is most favourite in bangladeshi people. It is best for you can taste', 'birani,nanna birani, best birani,birayani'),
(24, '3', 2, 'Nanna Special birani', 'Nanna Special birani', 220, ' Nanna ', 'takeaway-food-nanna-biryani-27.jpg', 'Nanna birani is best birani place in bangaldesh.', 'birani,nanna birani, best birani,birayani'),
(25, '4', 1, 'Chinise chowmein', 'Chinise chowmein', 250, ' euro garden', 'chinise1.jpg', 'chicken chowmein is popular in chinise items or dishes.', 'chowmein,nuduls,chinise chowmein,best chowmein,'),
(26, '0', 1, 'Grills', 'Grills', 80, ' chicken grill', '54f9d142c9f0d_-_grilled-red-curry-chicken-xl-22297485.jpg', 'Grill with meonize and salad', 'grill, chicken,fry,chicken grill'),
(27, '0', 1, 'Beef kabab', 'Beef kabab', 90, ' kabab ghor', 'download (1).jpg', 'beef kabab is totally yummy taste.', 'beef,beef kabab,kabab'),
(28, '0', 2, 'kabab', 'kabab', 150, ' chap shamlau', 'download (3).jpg', 'Its so tasty and everybody taste it daily.', 'kabab,beef,beef kabab'),
(29, '0', 2, 'shami kabab', 'shick kabab', 130, ' Star hotel', 'images (2).jpg', 'shick kabab is totally fill with beef.', 'kabab,beef,beef kabab'),
(30, '0', 3, 'Burger', 'Burger', 210, ' Mr.Burger', 'burger1.jpg', 'Beef Burger', 'beef burger, burger'),
(31, '0', 3, 'Chicken burger', 'Chicken burger', 160, ' BFC', 'Chicken-Burger.jpg', 'chicken burger with extra cheze.', 'burger,chciken burger'),
(32, '0', 3, 'Zambo burger', 'Zambo burger', 220, ' Amerian burger', 'burger_600x390-600x390.jpeg', 'Zambo burger is two layer of beef.', 'beef,beef kabab,kabab, zambo burger,jabmo burger'),
(33, '4', 1, 'chowmein', 'Chinise food', 250, ' Hangout', 'chinise3.jpg', 'chowmein ', 'chowmein,nuduls,chinise chowmein,best chowmein,'),
(34, '5', 5, 'chicken fry', 'chicken fry', 115, ' kfc', 'fry2.jpg', 'kfc chicken fry', 'fry,chicken fry, kfc fry,kfc chicken fry'),
(35, '5', 5, 'BFC fry', 'BFC fry', 85, ' bfc', 'fry1.jpg', 'bfc chicken fry', 'fry,chicken fry, kfc fry,kfc chicken fry,bfc'),
(36, '6', 6, 'Hot Dog', 'Hot Dog', 140, ' kfc', 'hotdog1.jpg', 'hot dog', 'hot dog,kfc hot dog'),
(37, '6', 6, 'hot dog indian', 'hot dog indian', 150, ' Indian hot dog', 'hotdog2.jpg', 'hot dog', 'hot dog,kfc hot dog'),
(38, '0', 6, 'hot dog special', 'hot dog special', 160, ' hot dog special', 'hotdog3.jpg', 'hot dog', 'hot dog,kfc hot dog'),
(39, '6', 0, 'Dosa', 'Dosa', 120, ' Indian Dosa', 'dosa.jpg', 'dosa', 'dosa,indian dosa');

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
  `user_email` varchar(111) NOT NULL,
  `food_title` varchar(300) NOT NULL,
  `food_image` text NOT NULL,
  `quantity` int(111) NOT NULL,
  `price` int(111) NOT NULL,
  `total_amount` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `f_id`, `ip_add`, `user_id`, `user_email`, `food_title`, `food_image`, `quantity`, `price`, `total_amount`) VALUES
(100, 4, '0', 12, 'inann@gmail.com', 'fried rice', 'chinise-food.jpg', 4, 235, 940),
(101, 7, '0', 1, 'azizur.jibon@gmail.com', 'pizza in', 'heart-shaped-pizza-ftr.jpg', 2, 345, 690),
(102, 36, '0', 1, 'azizur.jibon@gmail.com', 'Hot Dog', 'hotdog1.jpg', 2, 140, 280),
(103, 8, '0', 1, 'azizur.jibon@gmail.com', 'chinise soup', 'thai-soup.jpg', 1, 44, 44),
(104, 4, '0', 13, 'shuvo@gmail.com', 'fried rice', 'chinise-food.jpg', 2, 235, 470);

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_user_id` int(11) NOT NULL,
  `user_email` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `restaurant_keywords` text NOT NULL,
  `links` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`restaurant_id`, `restaurant_name`, `restaurant_title`, `restaurant_category`, `area_category`, `restaurant_image`, `restaurant_address`, `user_id`, `restaurant_keywords`, `links`) VALUES
(1, 'coffee cafe', 'coffee cafe', '5', '2', 'coffe.jpg', 'baily road', 2, 'coffee, cold coffee,hot coffee', 'https://www.facebook.com/apon.coffee.house'),
(2, 'Dosa Best', 'dosa best', '1', '2', 'dosa.jpg', 'baily road', 2, 'dosa,indian dosa,thai dosa', 'http://www.jamieoliver.com'),
(3, 'Golden Food', 'golden food', '1', '2', 'golden.jpg', 'baily road', 2, 'golden food,Golden Food,fast food', 'http://www.goldenfood.com'),
(4, 'Asian Food', 'asian food', '2', '5', 'asian.jpg', 'banani', 1, 'indian restaurant,pakisthan restaurant', 'http://www.foodnetwork.com'),
(6, 'Loiter Restaurant', 'loiter restaurant', '2', '5', 'loiter-d85.jpg', 'banani', 1, 'restaurant,dhaka city restaurant', ''),
(7, 'American Burger', 'american burger', '3', '1', 'american-burger.jpg', 'dhanmondi', 3, 'fast food,chinise ,', 'http://www.american-burgers.com/'),
(8, 'Baburchi', 'baburchi', '3', '1', 'baburchi.jpg', 'dhanmondi', 0, 'baburchi restaurant,birani restaurant', 'https://www.facebook.com/baburchirestaurant'),
(9, 'Fajitas', 'fajitas', '4', '1', 'fajitas.jpg', 'dhanmondi', 1, 'dhanmondi restaurant,fajitas', 'http://www.fajitasaz.com'),
(10, 'Heils Kitchin', 'heils kitchin', '4', '3', 'hels.jpg', 'khailgaon', 0, 'heils restaurant', 'https://www.facebook.com/hellskitchenbd');

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
(1, 'Azizur', 'Rahman', 'azizur.jibon@gmail.com', '5062bf581ae9e70befa093051997f991', '01521560129', 'azizur.png', 'gulbagh', 'tangails'),
(2, 'Sifat', 'Zaman', 'sifat@gmail.com', '409560', '01969508259', 'sifat.jpg', 'sutrapur', 'dhaka'),
(3, 'Dinan', 'Mahmud', 'inan@gmail.com', '409560', '02152560129', 'jibon.jpg', 'hajaribagh', 'dhaka'),
(8, 'Sonia', 'Akter', 'sonia@gmail.com', 'afbff8fb32a99178e981ba2e92ee243a', '01685134340', '2015-11-01-15-39-35-816.jpg', 'dfdfdf', 'dfdfdfdf'),
(10, 'Aydfd', 'Yadfdf', 'dfdad@gmail.com', '409560', '01685134340', 'Image0085.jpg', 'dfdfdf', 'dfdfdfdf'),
(11, 'Kamal', 'Ahmed', 'kamal@gmail.com', '409560', '01685134340', 'Screenshot_1.jpg', 'gulbagh', 'dhaka'),
(12, 'Inan', 'Mahmud', 'inan.mahmud1992@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01685134340', 'young-boys-with-table-manners.jpg', '53/5, Baddanagar Lane, Hazaribagh. Dhaka-1205', 'Mymensingh'),
(13, 'Shuvo', 'Ahmed', 'shuvo@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01685134340', 'family-dinner-table.jpg', 'dhaka', 'dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `delivery_service`
--
ALTER TABLE `delivery_service`
  ADD PRIMARY KEY (`delivery_man_id`);

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
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_user_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `area_category`
--
ALTER TABLE `area_category`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_service`
--
ALTER TABLE `delivery_service`
  MODIFY `delivery_man_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `order_user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  MODIFY `restaurant_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
