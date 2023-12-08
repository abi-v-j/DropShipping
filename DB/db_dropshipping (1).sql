-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 11:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dropshipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'DropShip', 'dropshipping@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL DEFAULT '0',
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `booking_amount` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_amount`, `user_id`, `seller_id`) VALUES
(1, '2023-10-17', '10', 0, 0, 1),
(2, '2023-10-17', '2', 6750, 1, 0),
(3, '2023-10-17', '10', 0, 0, 1),
(4, '2023-10-17', '1', 3100, 1, 0),
(5, '2023-10-17', '2', 600, 1, 0),
(6, '2023-10-25', '10', 0, 0, 2),
(7, '2023-10-25', '2', 750, 1, 0),
(8, '2023-10-27', '1', 11700, 1, 0),
(9, '2023-10-27', '2', 2100, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` varchar(100) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `cart_price` varchar(30) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `product_id`, `booking_id`, `cart_status`, `cart_price`, `seller_id`) VALUES
(2, '1', 1, 1, 10, '750', 1),
(3, '9', 1, 2, 4, '750', 1),
(4, '1', 2, 3, 10, '350', 1),
(5, '1', 3, 3, 10, '250', 1),
(6, '6', 2, 4, 1, '350', 1),
(7, '4', 3, 4, 1, '250', 1),
(8, '1', 2, 5, 4, '350', 1),
(9, '1', 3, 5, 4, '250', 1),
(10, '1', 1, 6, 10, '700', 2),
(11, '1', 2, 6, 10, '350', 2),
(12, '1', 1, 7, 4, '750', 1),
(13, '10', 1, 8, 1, '750', 1),
(14, '12', 2, 8, 1, '350', 1),
(15, '10', 2, 9, 1, '350', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Toys&Gaming'),
(3, 'Electronics Accessories'),
(4, 'Wearable Technology'),
(5, 'Gaming Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL DEFAULT 'Not Yet Replyed',
  `user_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_content`, `complaint_date`, `complaint_reply`, `user_id`, `complaint_status`) VALUES
(1, 1, 'very bad', '2023-10-17', 'sorry', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(1, 'Product Issues'),
(2, 'Shipping and Delievery'),
(3, 'Customer Service'),
(4, 'Payment and Billing'),
(5, 'Website and Technical Problems'),
(6, 'Return and Refund Issues'),
(7, 'Security and Privacy'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Kasaragod'),
(2, 'kannur'),
(3, 'Wayanad'),
(4, 'Kozhikode'),
(5, 'Malappuram'),
(6, 'palakkad'),
(7, 'Thrissur'),
(8, 'Ernakulam'),
(9, 'Idukki'),
(10, 'Kottayam'),
(11, 'Alappuzha'),
(12, 'Pathanamthitta'),
(13, 'Kollam'),
(14, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Nileswaram', 1),
(2, 'Manjeshwar', 2),
(3, 'Uppala', 1),
(4, 'Shiriya', 1),
(5, 'Kumbla', 1),
(6, 'Kuthuparamba', 2),
(7, 'Thalassery', 2),
(8, 'Iritty', 2),
(9, 'Mattanur', 2),
(10, 'Ancharakandi', 2),
(11, 'Mananthavady', 3),
(12, 'Kalpatta', 3),
(13, 'Sulthanbathery', 3),
(14, 'Vythiri', 3),
(15, 'Tholpetty', 3),
(16, 'Vadakara', 4),
(17, 'Kappad', 4),
(18, 'Beypore', 4),
(19, 'Chembalam', 4),
(20, 'Thikkoti', 4),
(21, 'Manjeri', 5),
(22, 'Kotakkal', 5),
(23, 'Nilambure', 5),
(24, 'Tirur', 5),
(25, 'Tanur', 5),
(26, 'Shornur', 6),
(27, 'Pattambi', 6),
(28, 'Malambuzha', 6),
(29, 'Chittur', 6),
(30, 'kollamkode', 6),
(31, 'chalakudy', 7),
(32, 'Irinjalakuda', 7),
(33, 'Puthukad', 7),
(34, 'ollur', 7),
(35, 'Mannuthy', 7),
(36, 'Aluva', 8),
(37, 'Vythila', 8),
(38, 'Piravom', 8),
(39, 'Muvattupuzha', 8),
(40, 'Kalure', 8),
(41, 'Kattapana', 9),
(42, 'Munnar', 9),
(43, 'Vagamon', 9),
(44, 'Periyar', 9),
(45, 'Nedumkandam', 9),
(46, 'Pala', 10),
(47, 'Irattupetta', 10),
(48, 'Vaikam', 10),
(49, 'Changanassery', 10),
(50, 'Ettumanoor', 10),
(51, 'Kuttanadu', 11),
(52, 'Cherthala', 11),
(53, 'Haripad', 11),
(54, 'Mavelikkara', 11),
(55, 'Kayamkulam', 11),
(56, 'konni', 12),
(57, 'Pandalam', 12),
(58, 'Kadapra', 12),
(59, 'Adoor', 12),
(60, 'Erumely', 12),
(61, 'Karunagappally', 13),
(62, 'Elampalloor', 13),
(63, 'Valakom', 13),
(64, 'Oachira', 13),
(65, 'Paravur', 13),
(66, 'Neyyattinkara', 14),
(67, 'Nedumangad', 14),
(68, 'Varkala', 14),
(69, 'Attingal', 14),
(70, 'Thambanoor', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_details` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_maxprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_photo`, `product_details`, `product_price`, `subcategory_id`, `product_maxprice`) VALUES
(1, 'SELLMONK  Robot Car', 'robot.jpg', 'SELLMONK Kids Toys Robot Car for 3 Year Old Boys and Childrens Electronic Toys | Robot Car for Kids ', 500, 1, 750),
(2, 'Gizga Essentials Electronics Accessories Organizer', 'electronic accessories organizer.jpg', 'Gizga Essentials Electronics Accessories Organizer, Universal Travel Organizer for Cables, Chargers,', 300, 7, 450),
(3, 'TAAPSEE DC Power Pigtail Male & Female Cables ', 'TAAPSEE DC Power Pigtail.jpg', 'TAAPSEE DC Power Pigtail Male & Female Cables (Upgraded 18AWG) with 2.1mm x 5.5mm Connectors Barrel ', 150, 5, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `product_id`, `user_review`, `user_rating`, `user_name`) VALUES
(1, '2023-10-17 16:27:27', 1, 'Good', '3', 'Suhail');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `seller_contact` varchar(100) NOT NULL,
  `seller_address` varchar(100) NOT NULL,
  `seller_photo` varchar(100) NOT NULL,
  `seller_proof` varchar(100) NOT NULL,
  `seller_status` varchar(100) NOT NULL DEFAULT '0',
  `seller_password` varchar(100) NOT NULL,
  `seller_doj` int(11) NOT NULL,
  `seller_email` varchar(40) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_contact`, `seller_address`, `seller_photo`, `seller_proof`, `seller_status`, `seller_password`, `seller_doj`, `seller_email`, `place_id`) VALUES
(1, 'muhammed suhail ch', '8304892083', 'aramthoppil house\r\np/o kuthuparamba\r\npincode:670643', 'robot.jpg', 'robot.jpg', '1', '1234567890', 20231017, 'muhammedsuhail@gmail.com', 11),
(2, 'Sreehari', '1234567890', 'bpc college', 'db_dropshipping.sql', 'db_dropshipping.sql', '2', '12345678', 20231025, 'sreehari@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Action Fiqures', 1),
(2, 'Board Games', 1),
(4, 'Outdoor Play', 1),
(5, 'Cables and Connectors', 3),
(6, 'Chargers and Adapters', 3),
(7, 'Computer Accessories', 3),
(8, 'Audio Accessories', 3),
(9, 'Smartwatch Bands', 4),
(10, 'Fitness Trackers', 4),
(11, 'Charging Docks', 4),
(12, 'Screen Protectors', 4),
(13, 'Gaming Headsets', 5),
(14, 'Controllers', 5),
(15, 'Gaming Mousepads', 5),
(16, 'Console Skins', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_dob` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `user_password`, `user_photo`, `user_proof`, `user_gender`, `user_dob`, `place_id`) VALUES
(1, 'Sreehari', '9876543210', 'sreehari@gmail.com', 'bpc college', '987654321', 'robot.jpg', 'robot.jpg', 'others', 2005, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

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
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
