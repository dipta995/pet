-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 06:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`store_id`, `product_id`, `customer_id`) VALUES
(6, 8, 4),
(7, 8, 4),
(8, 8, 4),
(9, 1, 4),
(10, 1, 4),
(11, 8, 4),
(12, 12, 4),
(13, 10, 4),
(14, 8, 4),
(15, 8, 4),
(16, 9, 4),
(17, 8, 4),
(18, 11, 4),
(19, 9, 4),
(20, 16, 4),
(21, 16, 4),
(22, 8, 4),
(23, 16, 4),
(24, 12, 3),
(25, 16, 3),
(26, 10, 4),
(27, 17, 4),
(28, 9, 4),
(29, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(300) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_image` varchar(266) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `flag`) VALUES
(1, 'Admin ', 'admin@gmail.com', '12', 'img/1a6c2448a2.webp', 0),
(7, 'editor', 'editor@gmail.com', '12', 'img/c22bb13287.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `title` varchar(266) NOT NULL,
  `price` varchar(266) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `checkout` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `title`, `price`, `quantity`, `pro_id`, `customer_id`, `image`, `checkout`) VALUES
(75, 'Bird Food', '200', 1, 37, 8, 'img/837e2369cc.jpg', 0),
(76, 'Optimum', '3500', 2, 31, 9, 'img/aa3fab5259.jpg', 2),
(77, 'Indian Parrot ', '2200', 1, 35, 9, 'img/e7fde5688d.webp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`) VALUES
(12, 'AQUA & REPTILE'),
(13, 'BIRD'),
(15, 'DOG'),
(16, 'RABBIT & HAMSTER'),
(17, 'Pets');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(280) NOT NULL,
  `customer_lname` varchar(280) NOT NULL,
  `customer_email` varchar(280) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_image` varchar(300) NOT NULL,
  `customer_password` varchar(280) NOT NULL,
  `customer_gender` varchar(50) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_email`, `customer_phone`, `customer_image`, `customer_password`, `customer_gender`, `creation`) VALUES
(8, 'Dipta', 'Dey', 'dipta1@gmail.com ', '12345678123', 'img/f9621af064.jpg', '25d55ad283aa400af464c76d713c07ad', 'Male', '2021-03-16 18:24:50'),
(9, 'Tanjil', 'Haque', 'tanjilhaque@gmail.com ', '01900011134', 'img/23d63e6060.jpg', '25d55ad283aa400af464c76d713c07ad', 'Male', '2021-04-03 18:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `notification` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `customer_id`, `notification`) VALUES
(17, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `details` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `rat_hit` int(11) NOT NULL,
  `rat_avg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `cat_id`, `sub_id`, `title`, `price`, `quantity`, `unit`, `image`, `details`, `seller_id`, `hit`, `rat_hit`, `rat_avg`) VALUES
(29, 12, 12, 'Aini', '2000', '1', '', 'img/5e5cad533c.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(30, 12, 12, 'Gold Fish', '1260', '1', '', 'img/0208d2be5f.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(31, 12, 13, 'Optimum', '3500', '1', '', 'img/aa3fab5259.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(32, 12, 13, 'Turtle Food', '1990', '1', '', 'img/d0bf70935a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(33, 13, 14, 'African Grey Parrot', '19000', '1', '', 'img/4f7fdfb3bb.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(34, 13, 14, 'Red Parrot ', '9500', '1', '', 'img/fa15746fff.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(35, 13, 14, 'Indian Parrot ', '2200', '1', '', 'img/e7fde5688d.webp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(36, 13, 14, 'Yellow Bird ', '12600', '1', '', 'img/c1a84a728c.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(37, 13, 15, 'Bird Food', '200', '1', '', 'img/837e2369cc.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(38, 13, 15, 'Wild Bird Food', '1200', '1', '', 'img/7a40feb137.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 0),
(39, 15, 23, 'Bull Dog', '60000', '1', '', 'img/28112fb5dd.jpg', 'Write about your pets', 10, 0, 9, 2),
(40, 15, 32, 'Boxer Dog', '100000', '1', '', 'img/913dd43d50.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratting`
--

CREATE TABLE `tbl_ratting` (
  `rat_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recentview`
--

CREATE TABLE `tbl_recentview` (
  `recent_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `viewin` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recentview`
--

INSERT INTO `tbl_recentview` (`recent_id`, `product_id`, `customer_id`, `viewin`) VALUES
(43, 31, 9, '2021-04-04 13:32:00'),
(44, 35, 9, '2021-04-03 18:21:45'),
(45, 30, 9, '2021-04-03 18:26:32'),
(46, 31, 0, '2021-04-03 19:10:31'),
(47, 39, 0, '2021-04-04 13:36:04'),
(48, 40, 0, '2021-04-03 19:12:08'),
(49, 39, 9, '2021-04-04 13:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(266) NOT NULL,
  `review` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `name`, `email`, `review`, `product_id`) VALUES
(54, 'tanjil', 'tanjinhaque2@gmail.com', 'sfsdf sfs ', 39),
(55, 'fsdf', 'parvez@gmail.com', 'fsdf', 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(300) NOT NULL,
  `seller_email` varchar(300) NOT NULL,
  `seller_password` varchar(266) NOT NULL,
  `seller_phone` varchar(100) NOT NULL,
  `seller_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_email`, `seller_password`, `seller_phone`, `seller_image`) VALUES
(1, 'dipta', 'dipta@gmail.com', '123', '1233', 'img/b551b6656d.jpg'),
(2, 'dipta', 'dipta@gmail.com', '12', '1233', 'img/b551b6656d.jpg'),
(7, 'dipta', 'dipta@gmail.com', 'dsf', '1233', 'img/60ce783fb1.'),
(8, 'sdfsdfsdf', 'c@gmail.com ', '123456789', '4343434343434343', 'img/4494895b55.jpg'),
(9, 'Seller', 'seller@gmail.com ', '12345678', '01631245874', 'img/e4176e702c.webp'),
(10, 'seller one', 'seller1@gmail.com ', '12345678', '01631245874', 'img/597e14834a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `social_name` varchar(300) NOT NULL,
  `social_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `social_name`, `social_link`) VALUES
(1, 'Facebook', 'https://web.facebook.com/profile.php?id=100009680143022'),
(2, 'twitter', 'www.twitter.com'),
(3, 'linkedin', 'www.linkedin.com'),
(4, 'instragram', 'www.instragram.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE `tbl_subcat` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(300) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`sub_id`, `sub_name`, `cat_id`) VALUES
(12, 'Fish Food ', 12),
(13, 'Turtle Food', 12),
(14, 'Birds ', 13),
(15, 'Bird Food ', 13),
(16, 'Bird Health Supplies ', 0),
(17, 'Bird Health Supplies ', 13),
(18, 'Cat Food', 14),
(19, 'Cat Health Supplies ', 14),
(20, 'Cat Dress ', 14),
(21, 'Cat Toy ', 14),
(22, 'Cat Litter', 14),
(23, 'Dog Food', 15),
(24, 'Dog Collar Harness ', 15),
(25, 'Dog Health', 15),
(26, 'Dog Toy ', 15),
(27, 'Dog Dress', 15),
(28, 'Rabbit Food ', 16),
(29, 'Hamster Food ', 16),
(30, 'Rabbit Grooming Supplies', 16),
(31, 'Cats', 14),
(33, 'Dogs', 17),
(34, 'Dogs House', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_ratting`
--
ALTER TABLE `tbl_ratting`
  ADD PRIMARY KEY (`rat_id`);

--
-- Indexes for table `tbl_recentview`
--
ALTER TABLE `tbl_recentview`
  ADD PRIMARY KEY (`recent_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_ratting`
--
ALTER TABLE `tbl_ratting`
  MODIFY `rat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_recentview`
--
ALTER TABLE `tbl_recentview`
  MODIFY `recent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
