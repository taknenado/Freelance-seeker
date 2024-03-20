-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 12:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthdate` date NOT NULL,
  `user_type` enum('freelanser','employer') NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_path` varchar(255) DEFAULT '/uploads/avatars/default-avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `gender`, `birthdate`, `user_type`, `avatar`, `avatar_path`) VALUES
(1, 'taknenado', 'test@test.test', '123', '+7 (543) 254-35-43', 'male', '2024-03-01', 'freelanser', NULL, '/uploads/avatars/65facc9124e33.jpg'),
(2, '123', 'test1@test.test', '123', '+7 (323) 232-32-32', 'male', '2024-03-01', 'freelanser', NULL, '/uploads/avatars/default-avatar.jpg'),
(3, '1234', 'test2@test.test', '123', '+7 (123) 123-12-33', 'male', '2024-03-01', 'freelanser', NULL, '/uploads/avatars/default-avatar.jpg'),
(4, '12345', 'test4@test.test', '123', '+7 (333) 333-32-32', 'male', '2024-03-02', 'freelanser', NULL, '/uploads/avatars/default-avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
