-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 10:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letdiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(9) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'PYTHON', 'Python is programming language known for its readability and versatility.', '2024-03-24 14:42:18'),
(2, 'ANDROID', 'Android primarily uses Java or Kotlin for app development, offering a robust and versatile language environment for creating mobile applications with a focus on performance and scalability.', '2024-03-24 14:50:21'),
(3, 'JAVASCRIPT ', 'JavaScript is a programming language commonly used for creating interactive effects within web browsers.', '2024-03-24 14:54:19'),
(4, 'JAVA', 'Java is a widely used programming language known for its platform independence and robustness, commonly used for building enterprise-scale applications.', '2024-03-24 14:54:22'),
(5, 'PHP', 'PHP is a server-side scripting language designed for web development, widely used for creating dynamic web pages and applications.', '2024-03-24 14:55:25'),
(6, 'c++', 'C++ is a powerful, high-performance programming language used for building a wide range of software applications, including games, operating systems, and high-performance applications.', '2024-03-24 14:56:27'),
(7, '.NET', '.NET is a framework that supports various programming languages, allowing for the development of a wide range of applications for Windows, web, mobile, and more.', '2024-03-24 14:57:37'),
(8, 'DJANGO', 'Django is a high-level Python web framework that enables rapid development of secure and maintainable websites.', '2024-03-24 14:58:49'),
(9, 'HTML/CSS', 'HTML/CSS is a markup language duo used for creating and styling web pages, with HTML defining the structure and content and CSS handling the presentation and layout.', '2024-03-24 15:00:44'),
(10, 'MONGODB', 'MongoDB is a NoSQL database program, which uses JSON-like documents with optional schemas.', '2024-03-24 15:02:13'),
(11, 'FIREBASE', 'Firebase is a platform developed by Google for creating mobile and web applications.', '2024-03-24 15:04:04'),
(12, 'RUBY', 'Ruby is a dynamic, reflective, object-oriented, and general-purpose programming language known for its simplicity and productivity.', '2024-03-24 15:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(9) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(9) NOT NULL,
  `comment_by` int(9) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(43, 'Numpy is library of python use for numericals.', 85, 0, '2024-04-25 02:51:41'),
(44, 'Using Global key word', 84, 0, '2024-04-25 13:43:47'),
(45, 'Like Mobile App', 71, 0, '2024-04-25 13:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Email` text NOT NULL,
  `Query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_title` varchar(256) NOT NULL,
  `thread_des` text NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_des`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES
(71, 'Android', 'what is android', 0, 2, '2024-04-20 01:40:09'),
(84, 'Python', 'How i can use global variable inside function?', 0, 2, '2024-04-25 02:49:38'),
(85, 'Python', 'What is Numpy?', 0, 1, '2024-04-25 02:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(35, 'y@gmail.com', '$2y$10$.GgISYEMjaMdNYngeRYMNe7XjpCduIN7xAT9Cgd7PH.n8KKdqVDQK', '2024-04-18 16:12:12'),
(36, 'v@gmail.com', '$2y$10$W3LuCeLYu.iUFNqj/o58qe7Iht7.e8IqKan4cy5jASgpCZ1boI906', '2024-04-20 10:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
