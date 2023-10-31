-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 08:05 PM
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
-- Database: `db_farmerswebservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(4, 'Doyal Eldho', 'doyal@gmail.com', 'doyal'),
(7, 'DAS', 'das@gmail.com', 'das');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `booking_qty` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `product_id`, `retailer_id`, `booking_date`, `booking_status`, `booking_qty`, `payment_status`) VALUES
(1, 1, 4, '2023-09-16', '2', 50, 1),
(2, 6, 13, '2023-09-19', '1', 50, 1),
(3, 1, 4, '2023-09-22', '0', 10, 0),
(4, 1, 4, '2023-09-22', '1', 20, 1),
(5, 0, 4, '2023-09-22', '0', 50, 0),
(6, 1, 13, '2023-10-11', '0', 50, 0),
(15, 1, 13, '2023-10-11', '1', 250, 0),
(17, 8, 4, '2023-10-14', '2', 50, 1),
(18, 7, 4, '2023-10-14', '1', 15, 0),
(19, 8, 2, '2023-10-14', '2', 30, 0),
(20, 1, 4, '2023-10-15', '1', 10, 1),
(21, 5, 4, '2023-10-16', '2', 50, 1),
(22, 1, 4, '2023-10-26', '0', 40, 0),
(23, 9, 4, '2023-10-26', '2', 300, 1),
(24, 9, 13, '2023-10-26', '2', 300, 1),
(25, 1, 13, '2023-10-29', '0', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Crops'),
(6, 'Fish & Meat'),
(7, 'other items'),
(8, 'Livestocks');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaintfarmer`
--

CREATE TABLE `tbl_complaintfarmer` (
  `complaintfarmer_id` int(11) NOT NULL,
  `complaintfarmer_title` varchar(200) NOT NULL,
  `complaintfarmer_content` varchar(1000) NOT NULL,
  `complaintfarmer_reply` varchar(1000) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `complaintfarmer_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaintretailer`
--

CREATE TABLE `tbl_complaintretailer` (
  `complaintretailer_id` int(11) NOT NULL,
  `complaintretailer_title` varchar(200) NOT NULL,
  `complaintretailer_content` varchar(1000) NOT NULL,
  `complaintretailer_reply` varchar(1000) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `complaintretailer_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_complaintretailer`
--

INSERT INTO `tbl_complaintretailer` (`complaintretailer_id`, `complaintretailer_title`, `complaintretailer_content`, `complaintretailer_reply`, `farmer_id`, `retailer_id`, `complaintretailer_date`) VALUES
(1, 'Fake Identity', 'Not same as per the details and bad experience', '', 0, 0, '2023-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(2, 'kollam'),
(9, 'Kottayam'),
(10, 'Alappuzha'),
(11, 'Kannur'),
(12, 'Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmer`
--

CREATE TABLE `tbl_farmer` (
  `farmer_id` int(11) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `farmer_email` varchar(50) NOT NULL,
  `farmer_contact` varchar(20) NOT NULL,
  `farmer_address` varchar(100) NOT NULL,
  `farmer_dob` date NOT NULL,
  `farmer_gender` varchar(10) NOT NULL,
  `farmer_photo` varchar(100) NOT NULL,
  `farmer_proof` varchar(100) NOT NULL,
  `farmer_password` varchar(50) NOT NULL,
  `place_id` int(50) NOT NULL,
  `farmer_vstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_farmer`
--

INSERT INTO `tbl_farmer` (`farmer_id`, `farmer_name`, `farmer_email`, `farmer_contact`, `farmer_address`, `farmer_dob`, `farmer_gender`, `farmer_photo`, `farmer_proof`, `farmer_password`, `place_id`, `farmer_vstatus`) VALUES
(6, 'Koshi Kuriyan', 'koshi@gmail.com', '7356567369', 'koshi house', '2023-08-18', 'Female', '', '', '007', 1, 1),
(7, 'Anamika', 'ana@gmail.com', '14578963', 'anamika house', '2023-08-10', 'Female', '', '', '123', 2, 1),
(8, 'koshi ', 'koshi2@gmail.com', '14578963', 'koshi house', '2023-08-02', 'Male', '', '', '12345', 4, 2),
(11, 'Sonia', 'koshi3@gmail.com', '888888', 'koshi house', '2023-08-17', 'Female', '', '', '123456', 3, 1),
(12, 'Rajav', 'koshi4@gmail.com', '14578963', 'koshi house', '2023-08-17', 'Male', '', '', '3333', 2, 0),
(15, 'koshi ', 'koshi7@gmail.com', '14578963', 'koshi house', '0000-00-00', 'Male', '', '', '', 5, 2),
(17, 'priya', 'koshi9@gmail.com', '14578963', 'koshi house', '2023-08-11', 'Female', '', '', '12345', 4, 0),
(18, 'jennifer', 'koshi10@gmail.com', '14578963', 'koshi house', '0000-00-00', 'Female', '', '', '', 6, 0),
(20, 'neymar', 'koshi@gmail.com', '14578963', 'koshi house', '0000-00-00', 'Male', 'WhatsApp Image 2023-05-02 at 1.15.54 PM.jpeg', '', '', 3, 0),
(21, 'ronaldo', 'koshi@gmail.com', '14578963', 'koshi house', '0000-00-00', 'Male', 'IMG-20181104-WA0065.jpg', '', '', 2, 1),
(22, 'messi', 'koshi@gmail.com', '14578963', 'koshi house', '0000-00-00', 'Male', 'logo.png', 'WIN_20220606_23_39_06_Pro.jpg', '', 6, 0),
(23, 'Makkal Selvan', 'ksebstore@gmail.com', '933333339', 'chennai ,tamil nadu', '2000-12-18', 'Male', 'Passport-Size-Photo-with-Coat-Tie.jpg', 'aadhar-card-png-600x426.png', '1234', 3, 0),
(35, 'Rajan', 'rajan@gmail.com', '74859656', 'koilandy', '0000-00-00', 'Male', 'images.jpeg', 'adhaar2.png', '123', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbackfarmer`
--

CREATE TABLE `tbl_feedbackfarmer` (
  `feedbackfarmer_id` int(11) NOT NULL,
  `feedbackfarmer_content` varchar(1000) NOT NULL,
  `feedbackfarmer_rating` varchar(200) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbackretailer`
--

CREATE TABLE `tbl_feedbackretailer` (
  `feedbackretailer_id` int(11) NOT NULL,
  `feedbackretailer_content` varchar(300) NOT NULL,
  `feedbackretailer_rating` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `review_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_feedbackretailer`
--

INSERT INTO `tbl_feedbackretailer` (`feedbackretailer_id`, `feedbackretailer_content`, `feedbackretailer_rating`, `farmer_id`, `retailer_id`, `review_date`) VALUES
(1, '0', 4, 0, 4, '2023-10-13'),
(2, '0', 4, 0, 4, '2023-10-13'),
(3, '0', 4, 35, 4, '2023-10-13'),
(4, '0', 4, 35, 4, '2023-10-13'),
(5, 'Good', 3, 35, 4, '2023-10-13'),
(6, 'sdfs', 3, 35, 4, '2023-10-13'),
(7, ' hb n', 3, 35, 4, '2023-10-13'),
(8, 'cfghj', 3, 35, 4, '2023-10-13'),
(9, 'wsdcf', 3, 35, 4, '2023-10-13'),
(10, 'hhfcg', 2, 35, 4, '2023-10-13'),
(11, 'vhj', 2, 35, 4, '2023-10-13'),
(12, 'scd', 3, 35, 4, '2023-10-13'),
(13, 'DAFSDG', 2, 35, 4, '2023-10-13'),
(14, 'DAFSDG', 2, 35, 4, '2023-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'pala', 2),
(2, 'Kuruvilanghadu', 9),
(3, 'Varkala', 12),
(4, 'Kochi', 1),
(5, 'Kuttanadu', 10),
(6, 'koilandy', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `product_photo` varchar(200) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `product_stock` int(100) NOT NULL,
  `product_status` varchar(100) NOT NULL DEFAULT '0',
  `product_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_rate`, `product_photo`, `subcategory_id`, `farmer_id`, `product_stock`, `product_status`, `product_description`) VALUES
(1, 'Jasmine Rice', 620, 'jasmine rice.jfif', 2, 6, 100, '1', 'Our Thai White Jasmine Rice is naturally grown without chemicals or pesticides and we make sure that our rice is produced and harvested in the best way possible.'),
(5, 'Matta Rice', 500, 'matta rice.jfif', 2, 7, 180, '1', ''),
(6, 'Broiler Chicken', 120, 'Broiler Chicken.jfif', 4, 8, 80, '', ''),
(7, 'Domestic Chicken', 150, 'Home chicken.jfif', 4, 22, 50, '', ''),
(8, 'Tuna', 800, 'Tuna.jfif', 6, 7, 100, '1', ''),
(9, 'Sharbhati Wheat', 870, 'Sihore Wheat.jpeg', 3, 23, 1600, '1', 'Sharbati wheat is grown in abundance in Sehore area. There is a black and alluvial fertile soil in the Sehore area which is suitable for the production of Sharbati wheat. Sharbati wheat is also called The Golden Grain, because its color is golden'),
(10, 'Sehore  Wheat', 900, 'Sihore Wheat.jpeg', 3, 35, 1400, '', 'nice wheat'),
(11, 'Rice', 100, 'rice.jfif', 2, 35, 50, '', 'sxvsd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `request_product` varchar(200) NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(200) NOT NULL DEFAULT '0',
  `request_pricerange` int(11) NOT NULL,
  `request_photo` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `request_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `request_product`, `request_quantity`, `retailer_id`, `request_date`, `request_status`, `request_pricerange`, `request_photo`, `category_id`, `request_description`) VALUES
(4, 'Domestic Chicken', 5, 13, '2023-10-01', '', 150, '652820368faa4_dchicken.jpeg', 6, 'Need a Domestic Chicken For Shap'),
(5, 'Rice', 80, 7, '2023-10-03', '', 6500, '6528e99b1be1f_rice.jfif', 1, 'i need bulk of  rice needed for home store'),
(10, 'Jamnapari', 1, 13, '2023-10-04', '', 30000, 'janmnapari-goat.jpeg', 8, 'good one'),
(12, 'Vechur Cow', 1, 13, '2023-10-11', '', 70000, 'Vechurcow.jpeg', 8, '3 Year or below aged Vechur cow needed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retailer`
--

CREATE TABLE `tbl_retailer` (
  `retailer_id` int(11) NOT NULL,
  `retailer_name` varchar(50) NOT NULL,
  `retailer_email` text NOT NULL,
  `retailer_contact` varchar(11) NOT NULL,
  `retailer_address` varchar(200) NOT NULL,
  `retailer_password` text NOT NULL,
  `retailer_vstatus` int(11) NOT NULL DEFAULT 0,
  `retailer_proof` varchar(200) NOT NULL,
  `retailer_photo` varchar(200) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_retailer`
--

INSERT INTO `tbl_retailer` (`retailer_id`, `retailer_name`, `retailer_email`, `retailer_contact`, `retailer_address`, `retailer_password`, `retailer_vstatus`, `retailer_proof`, `retailer_photo`, `place_id`) VALUES
(1, 'Abhishek AGW', 'abhi@gmail.com', '2147483647', 'kerala house', '123', 1, 'IMG_8468.JPG', 'WhatsApp Image 2023-05-02 at 8.01.31 PM.jpeg', 1),
(2, 'Ayyapan nair', 'ayyappan@gmail.com', '2147483647', 'ayyapankovil', '123', 1, '', '', 1),
(3, 'johny', 'john@gmail.com', '2034567', 'john kurishinghl', 'johny', 0, 'jasmine rice.jfif', 'jasmine rice.jfif', 2),
(4, 'mathew john', 'ksebstore@gmail.com', '1234567821', 'mathew kurishinghl', 'mathew', 2, '', '', 4),
(5, 'Farhan', 'tpf7925@gmail.com', '2147483647', 'ayyapankovil', '123', 0, 'aadhar-card-png-600x426.png', 'photo profile sample.jfif', 5),
(7, 'Rolex', 'abhishekagw777@gmail.com', '145263', 'Gadegts Dude', '1234', 0, 'download.png', 'adhaar2.png', 1),
(13, 'Rajan', 'rajan@gmail.com', '7356567369', 'rajan House', '1234', 0, 'images.jpeg', 'farmer.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_rating` varchar(50) NOT NULL,
  `user_review` varchar(200) NOT NULL,
  `review_datetime` date NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'Corns'),
(2, 1, 'Rice'),
(3, 1, 'Wheat'),
(4, 6, 'Hen'),
(5, 6, 'prawns'),
(6, 6, 'Fish');

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
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaintfarmer`
--
ALTER TABLE `tbl_complaintfarmer`
  ADD PRIMARY KEY (`complaintfarmer_id`);

--
-- Indexes for table `tbl_complaintretailer`
--
ALTER TABLE `tbl_complaintretailer`
  ADD PRIMARY KEY (`complaintretailer_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_farmer`
--
ALTER TABLE `tbl_farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `tbl_feedbackfarmer`
--
ALTER TABLE `tbl_feedbackfarmer`
  ADD PRIMARY KEY (`feedbackfarmer_id`);

--
-- Indexes for table `tbl_feedbackretailer`
--
ALTER TABLE `tbl_feedbackretailer`
  ADD PRIMARY KEY (`feedbackretailer_id`);

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
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_retailer`
--
ALTER TABLE `tbl_retailer`
  ADD PRIMARY KEY (`retailer_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_complaintfarmer`
--
ALTER TABLE `tbl_complaintfarmer`
  MODIFY `complaintfarmer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaintretailer`
--
ALTER TABLE `tbl_complaintretailer`
  MODIFY `complaintretailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_farmer`
--
ALTER TABLE `tbl_farmer`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_feedbackfarmer`
--
ALTER TABLE `tbl_feedbackfarmer`
  MODIFY `feedbackfarmer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedbackretailer`
--
ALTER TABLE `tbl_feedbackretailer`
  MODIFY `feedbackretailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_retailer`
--
ALTER TABLE `tbl_retailer`
  MODIFY `retailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
