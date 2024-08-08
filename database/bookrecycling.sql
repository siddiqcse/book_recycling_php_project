-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 05:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookrecycling`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `image_url` text NOT NULL,
  `isSold` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `isFree` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `writer` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` text CHARACTER SET utf8 NOT NULL,
  `edition` int(11) NOT NULL,
  `year_of_build` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `user_id`, `title`, `image_url`, `isSold`, `price`, `isFree`, `description`, `writer`, `quantity`, `category`, `edition`, `year_of_build`) VALUES
(8, 6, 'CotoDer Golpo', 'CHILD-7.jpg', 0, 20, 0, 'বাঘ সিংহ শিয়াল কুমির ও ভূতের গল্প', 'Humayon Ahamed', 10, 'ছোটদের বই', 5, 2019),
(9, 6, 'Python Books', 'ACA-10.jpg', 0, 60, 1, 'The Python Book delivers an essential introductory guide to learning Python for anyone who works with data but does not have experience in programming. The author, an experienced data scientist and Python programmer, shows readers how to use Python for data analysis, exploration, cleaning, and wrangling. Readers will learn what in the Python language is important for data analysis, and why.', 'Jeam Clean', 12, 'Programming Books', 3, 2007),
(10, 6, 'Math Physics', 'ACA-7.jpg', 0, 100, 1, 'the branch of science concerned with the nature and properties of matter and energy. The subject matter of physics includes mechanics, heat, light and other radiation, sound, electricity, magnetism, and the structure of atoms.', 'Albert', 14, 'Math Books', 4, 2008),
(11, 6, 'English Manual', 'ACA-5.jpg', 0, 70, 1, 'Literature written in the English language includes many countries such as the United Kingdom and its crown dependencies, the Republic of Ireland.', 'Robert Juo', 15, 'English Books', 6, 2008),
(12, 6, 'Chemisty Boos', 'ACA-6.jpg', 0, 90, 1, '\"A Ready-Reference Book of Chemical and Physical Data\". ISBN: 0-87819-455-X (The 55th Edition is incorrectly listed on Amazon.com under this ISBN, but this is the correct ISBN for the 56th Edition).', 'Jon Kee', 21, 'Chemistry Books', 6, 1998),
(13, 7, 'THE HAPPINESS OF A DOG WITH A BALL IN ITS MOUTH', '811ftjOO5FL.jpg', 0, 100, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Bruce Handy', 21, 'ছোটদের বই', 4, 1998);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'ছোটদের বই'),
(2, 'প্রবন্ধ'),
(57, 'ইসলামিক বই'),
(58, 'বাংলা বই'),
(61, 'Programming Books'),
(62, 'Novel Books'),
(63, 'Physics Books'),
(64, 'English Books'),
(65, 'Chemistry Books');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `userID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `isAdmin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`userID`, `name`, `email`, `phone`, `password`, `isAdmin`) VALUES
(2, 'Hasan ', 'hasan@gmail.com', '01303129515', '2', 0),
(6, 'Mehedi Hasan Shuvo', 'duetianmehedishuvo@gmail.com', '+8801303129515', 'wwwwew', 1),
(7, 'Shuvo Khan', 'qwq@gmail.com', '+441777368276', '1', 1),
(10, 'Mehedi Hasan Shuvo', 'a@gmail.com', '121212121', 'a', 1),
(11, 'Arafat', 'arafat13@gmail.com', '01638667366', '1', 1),
(12, 'arafat', 'arafat@gmail.com', '01521564040', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_cart` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
