-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookforme_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(60) NOT NULL,
  `check_in_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `is_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `room_id`, `hotel_name`, `first_name`, `last_name`, `email`, `phone`, `address`, `country`, `check_in_date`, `days`, `total_bill`, `booking_date`, `is_end`) VALUES
(5, 1, 'JW Marriott Hotel Kuwait City', 'Jasmine', 'Khan', 'js@gmail.com', '77865', 'Saudi Arabia, Dammam City', 'Saudi Arabia', '2024-08-19', 1, 180, '2024-08-10', 0),
(7, 5, 'Hilton Garden Inn Kuwait', 'Hakim', 'ud din', 'hakim_156@gmail.com', '556698877', 'Kuwait', 'Kuwait', '2024-08-26', 2, 300, '2024-08-10', 0),
(8, 4, 'JW Marriott Hotel Kuwait City', 'Hakim', 'Hakim', 'hakim@gmail.com', '12345698', 'my address', 'Kuwait', '2024-08-14', 2, 400, '2024-08-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `c_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`c_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'farheen', 'farheen@gmail.com', '78546985', 'I want to ask about the special offers for the family rooms. Please contact me or send me details'),
(2, 'Javed', 'javed887@gmail.com', '765456', 'I want to register my hotel on your website. Please send me your details about all of your services and charges. \r\nThanks and Regards');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(60) NOT NULL,
  `hotel_address` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_address`, `phone`) VALUES
(1, 'JW Marriott Hotel Kuwait City', 'Al Shuhada Street Kuwait City, 13124, Kuwait', '+965 2245 5550'),
(2, 'Hilton Garden Inn Kuwait', 'Mutlaq Abbas Munawir St, Kuwait City, Kuwait', '+965 2226 2000'),
(3, 'Grand Hyatt Kuwait', 'Zahra 47451, Kuwait', '+965 2221 1234'),
(4, ' Four Seasons Hotel Kuwait at Burj Alshaya', ' Al-Soor St, Kuwait City, Kuwait', '+965 2200 6000');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `qualities` varchar(50) NOT NULL,
  `service1` varchar(40) NOT NULL,
  `service2` varchar(40) NOT NULL,
  `service3` varchar(40) NOT NULL,
  `capacity` varchar(40) NOT NULL,
  `beds` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `hotel_id`, `qualities`, `service1`, `service2`, `service3`, `capacity`, `beds`, `price`, `rooms`, `image1`, `image2`, `image3`) VALUES
(1, 'Family Room', 1, 'Spacious, Family-friendly', 'Free Wi-Fi', 'Television', 'Complimentary Breakfast', '2 Adults 3 Children', '1 king size Bed, 3 small beds', 180, 24, 'h1r1.jpg', 'h1r12.jpg', 'h1r13.jpg'),
(2, 'Couples Room', 1, 'Cozy, Romantic', 'Free Wi-Fi', 'Television', 'Complimentary Breakfast', '2 Adults', '1 king size Bed', 200, 8, 'h1r2.jpg', 'h1r22.jpg', 'h1r23.jpg'),
(3, 'Business Room', 1, 'Comfortable, Well-equipped for work', 'Free Wi-Fi', 'Work Desk', 'Complimentary Breakfast', '1 Adult', '1 Queen Size Bed', 100, 15, 'h1r3.jpg', 'h1r32.jpg', 'h1r33.jpg'),
(4, 'Casual Room', 1, 'Relaxed, Budget-friendly', 'Free Wi-Fi', 'Television', 'Complimentary Breakfast', '4 Adults', '4 Queen size', 200, 14, 'h1r4.jpg', 'h1r42.jpg', 'h1r43.jpg'),
(5, 'Family Room', 2, 'Spacious, Family-friendly', 'Free Wi-Fi', 'Television', 'Complimentary Breakfast', '2 Adults 2 Children', '1 king size Bed, 3 small beds', 150, 18, 'h2r1.jpg', 'h2r12.jpg', 'h2r13.jpg'),
(6, 'Couples Room', 2, 'Cozy, Romantic', 'Free Wi-Fi', 'Television', 'Complimentary Breakfast', '2 Adults', '1 king size Bed', 170, 10, 'h2r2.jpg', 'h2r22.jpg', 'h2r23.jpg'),
(7, 'Business Room', 2, 'Comfortable, Well-equipped for work', 'Free Wi-Fi', 'Work Desk', 'Complimentary Breakfast', '1 Adult', '1 Queen Size Bed', 80, 12, 'h2r3.jpg', 'h2r32.jpg', 'h2r33.jpg'),
(8, 'Casual Room', 2, 'Relaxed, Budget-friendly', 'Free Wi-Fi', 'Television', 'Complimentary Breakfast', '5 Adults', '5 Queen size', 160, 15, 'h2r4.jpg', 'h2r42.jpg', 'h2r43.jpg'),
(9, 'Family Room', 3, 'Spacious, Family-friendly', 'Free Wi-Fi - 100mbps', 'LED 4K', 'Complimentary Breakfast, Lunch, Dinner', '2 Adults 5 Children', '1 king size Bed, 5 small beds', 300, 20, 'h3r1.jpg', 'h3r12.jpg', 'h3r13.jpg'),
(10, 'Couples Room', 3, 'Cozy, Romantic', 'Free Wi-Fi - 100mbps', 'LED 4K', 'Complimentary Breakfast, Lunch , Dinner', '2 Adults', '1 king size Bed', 250, 20, 'h3r2.jpg', 'h3r22.jpg', 'h3r23.jpg'),
(11, 'Business Room', 3, 'Comfortable, Well-equipped for work', 'Free Wi-Fi -100mbps', 'Work Desk with Mac PC', 'Complimentary Breakfast', '1 Adult', '1 Queen Size Bed', 130, 15, 'h3r3.jpg', 'h3r32.jpg', 'h3r33.jpg'),
(12, 'Casual Room', 3, 'Relaxed, Budget-friendly', 'Free Wi-Fi - 100mbps', 'LED 4K', 'Complimentary Breakfast, Lunch, Dinner', '6 Adults', '6 Queen size', 300, 20, 'h3r4.jpg', 'h3r42.jpg', 'h3r43.jpg'),
(13, 'Family Room', 4, 'Spacious, Family-friendly', 'Free Wi-Fi - 100mbps', 'LED 4K', 'Complimentary Breakfast, Lunch, Dinner', '2 Adults2 Children', '1 king size Bed, 5 small beds', 120, 10, 'h4r1.jpg', 'h4r12.jpg', 'h4r13.jpg'),
(14, 'Couples Room', 4, 'Cozy, Romantic', 'Free Wi-Fi - 100mbps', 'LED 4K', 'Complimentary Breakfast, Lunch , Dinner', '2 Adults', '1 king size Bed', 200, 10, 'h4r2.jpg', 'h4r22.jpg', 'h4r23.jpg'),
(15, 'Business Room', 4, 'Comfortable, Well-equipped for work', 'Free Wi-Fi -100mbps', 'Work Desk with Mac PC', 'Complimentary Breakfast', '1 Adult', '1 Queen Size Bed', 110, 15, 'h4r3.jpg', 'h4r32.jpg', 'h4r33.jpg'),
(16, 'Casual Room', 4, 'Relaxed, Budget-friendly', 'Free Wi-Fi - 100mbps', 'LED 4K', 'Complimentary Breakfast, Lunch, Dinner', '4 Adults', '4 Queen size', 250, 20, 'h4r4.jpg', 'h4r42.jpg', 'h4r43.jpg'),
(17, 'Honeymoon Package offer', 4, 'Cozy, Romantic room with extra services', 'Free Wi-Fi - 100mbps', 'Flower decorated room', 'Complimentary Breakfast, Lunch, Dinner', '2 Adults', '1 king size Bed', 200, 5, 'so1.jpg', 'so12.jpg', 'so13.jpg'),
(18, 'Family Holidays offer', 3, 'Family gathering near beech,', 'Free Wi-Fi - 100mbps', ' free joy land tickets', 'Complimentary Breakfast, Lunch, Dinner', '2 Adults 3 Children', '1 king size Bed, 3 small beds', 190, 5, 'so2.jpg', 'so22.jpg', 'so23.jpg'),
(19, 'Business Trip offer', 2, 'Business meeting hall with electronic  equipments', 'Free Wi-Fi - 100mbps', 'Hall room facilties', 'Complimentary Breakfast, Lunch, Dinner', '6 Adults', '6 small beds', 250, 5, 'so3.jpg', 'so32.jpeg', 'so33.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `phone`, `address`, `password`) VALUES
('hakim', 'Hakim', 'Hakim', 'hakim@gmail.com', '12345698', 'my address', '12345'),
('hakim2', 'Hakim', 'ul Din', 'hakim2@gmail.com', '78965412', 'new address for hakim 2', '123456'),
('hakim_156', 'Hakim', 'ud din', 'hakim_156@gmail.com', '556698877', 'Kuwait', '123789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
