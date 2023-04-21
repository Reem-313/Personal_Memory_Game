-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 01:58 PM
-- Server version: 10.5.19-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k7qdcxk_MemoGame`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imageId` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `userIdFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imageId`, `Description`, `imagePath`, `userIdFK`) VALUES
(9, 'photo', '63d2bc687866f.jpg', 14),
(10, 'and more', '63d2bc985d832.jpg', 14),
(11, 'lab', '63d835e5b6bdc.jpeg', 14),
(12, 'tower', '63d83605ce6b5.jpg', 14),
(13, 'sunset', '63d83633c94fc.jpg', 14),
(14, 'flowers', '63d8367143915.jpg', 14),
(15, 'craft', '63d837040b66f.jpg', 14),
(16, 'sea', '63d8372f27447.jpg', 14),
(18, 'turkey', '63fe8d1bc1bc1.jpg', 14),
(19, 'selling', '63ff41526e0ec.jpg', 14),
(20, 'trees', '63ff52d8366f2.jpg', 14),
(21, 'chocolate', '63ff558392f03.jpg', 14),
(25, 'snow', '6402873d97e73.jpg', 17),
(26, 'old house', '640287b582c8b.jpg', 17),
(27, 'happy', '64052f535ac8e.jpg', 23),
(28, 'christmas', '6408976f4bc67.jpg', 17),
(29, 'tiger', '64089780065a8.jpg', 17),
(30, 'mothers day', '640897d21f1d4.jpg', 17),
(31, 'heart', '640897e5498bf.jpg', 17),
(32, 'bus', '64089fbebfbf0.jpg', 17),
(34, 'building', '6408a11c83b2e.jpg', 17),
(36, 'Motherscard', '64177e03c748e.jpg', 14),
(37, 'River', '6419bee8c78b2.jpg', 23),
(38, 'Love heart', '641a221c2a281.png', 14),
(39, 'Catcher ', '6439a6acaf1c3.jpeg', 25),
(40, 'Fruit', '6439a6ba65f9d.jpeg', 25),
(41, 'Spaghetti ', '6439a6ca22dc6.jpeg', 25),
(43, 'Ion', '6439a6db5e10d.jpeg', 25),
(44, 'Lion', '6439a6ebd4810.jpeg', 25),
(45, 'Person', '6439a701d937f.jpeg', 25),
(47, 'Uno', '6439a73a222b1.jpeg', 25),
(50, 'Donut', '6439a7906fd67.jpeg', 25),
(51, 'Jumper', '6439a83d0d1e4.jpeg', 25),
(54, 'Angel', '6439a84f9606b.jpeg', 25),
(55, 'Paul wilton', '643afe1d3e8b6.jpeg', 26),
(57, 'Daniele', '643afe33cc217.jpg', 27),
(58, 'gwpaulwilton@gmail.com', '643afe524bdb1.jpeg', 26),
(59, 'AC pregnant', '643afe5eca73e.jpg', 27),
(60, 'birth of Theresa', '643afe919c6de.jpg', 27),
(63, 'Lisa', '643afed6d8e97.jpg', 27),
(68, 'Liam', '643aff817b1aa.jpg', 27),
(71, 'Elisabeth', '643affc4a74b5.jpg', 27),
(73, 'Pau Wilton', '643affeeca017.jpeg', 26),
(74, 'Paul', '643afffc1f448.jpg', 27),
(90, 'Charles', '643b01ec6052e.jpg', 27),
(91, 'PA', '643b021bc50b0.jpg', 27),
(92, 'Josephine', '643b024309d67.jpg', 27),
(93, 'G. Paul Wilton', '643b0243c95d6.jpeg', 26),
(94, 'Andrew', '643b025a72e55.jpg', 27),
(95, 'W Paul Wilton', '643b026dbc897.jpeg', 26),
(97, 'Guy', '643b02728316e.jpg', 27),
(98, 'Arlette', '643b02916cdcd.jpg', 27),
(99, 'Annie', '643b02aa0e426.jpg', 27),
(100, 'Reem', '643b02dfd422f.jpg', 27),
(101, 'mum', '643b03b46027d.png', 14),
(102, 'photo 6', '643b03c295ad4.jpeg', 26),
(104, 'picture 7', '643b03ffb62ab.jpeg', 26),
(106, 'harbour', '643b0424d6fe2.jpeg', 26),
(107, 'rocks on beach', '643b0472d2d2d.jpeg', 26),
(109, 'the Wilton men', '643b04deacc8d.jpeg', 26),
(112, 'AB & Sylvia', '643b051a234f2.jpeg', 26),
(113, 'DaniÃ¨le', '643b05924e854.jpeg', 26),
(114, 'Elisabeth Jay', '643b05c39dc01.jpeg', 26),
(115, 'Koo family', '643b1cc2842bf.jpg', 28),
(116, 'Dadi', '643b1cd8700cd.jpg', 28),
(117, 'Jenny', '643b1cf6e7d44.jpg', 28),
(118, 'John', '643b1d110edb6.jpg', 28),
(119, 'John + Olwen', '643b1d3043eee.jpg', 28),
(120, 'Matida + Rachel', '643b1d4c591b1.jpg', 28),
(121, 'Leri + Gwens', '643b1d63d343f.jpg', 28),
(122, 'John + Jenny', '643b1d7e68a39.jpg', 28),
(123, 'My sonâ€™s house', '643d1a4c9ff13.jpeg', 29),
(125, 'Anne', '643d1a8a8b37e.jpeg', 29),
(126, 'Robert', '643d1aad957fa.jpeg', 29),
(127, 'Me', '643d1ae0c10ec.jpeg', 29),
(129, 'Marcel', '643d1b0bbadda.jpeg', 29),
(130, 'Grandsons', '643d1b5e7ee68.jpeg', 29),
(132, 'Grave', '643d1b907e269.jpeg', 29),
(133, 'reed', '643d4a5ddf0c4.jpg', 23),
(135, 'Reunion', '643daa982534b.jpg', 28),
(136, 'John walking', '643daac000592.jpg', 28),
(137, 'Rhods and cow', '643daadd0bee1.jpg', 28),
(138, 'Gwens + Beds', '643daaefcc151.jpg', 28),
(139, 'Eos + Olwen', '643dab05e2af4.jpg', 28),
(140, 'mother and son', '643dab1c067b7.jpg', 28),
(141, 'Toby cinema', '64425ccc49544.jpeg', 34),
(142, 'Easter cake', '64425cfe4434c.jpg', 34),
(143, 'Egg hunt', '64425d2f2de6a.jpg', 34),
(145, 'Annabel egg hunt', '64425da7bc011.jpg', 34),
(146, 'Easter flowers ', '64425de119fdb.jpg', 34),
(147, 'AurÃ©lie and ThÃ©o ', '64425e2a52a4f.jpg', 34),
(148, 'Zoe and ThÃ©o', '64425e9674b0a.jpg', 34),
(149, 'Mothers day cakes', '64425ec4eb1ed.jpg', 34),
(150, 'Disney three', '64425f431cf67.jpg', 34),
(151, 'New glasses ', '644264992587b.jpg', 34);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`) VALUES
(12, 'reem4', 'khider4', 'reemkhider4@yahoo.com', '4444'),
(13, 'Reem5', 'Khider5', 'reemkhider5@yahoo.com', '5555'),
(14, 'Reem6', 'Khider6', 'reemkhider6@yahoo.com', '6666'),
(17, 'Reem7', 'Khider7', 'reemkhider7@yahoo.com', '7777'),
(22, 'Boris', 'Johnson', 'bojo@email.com', 'theukrules'),
(23, 'Reem8', 'Khider8', 'reemkhider8@yahoo.com', '8888'),
(25, 'phil', 'greig', 'phil@greig.com', 'pppp'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageId`),
  ADD UNIQUE KEY `Description` (`Description`),
  ADD KEY `userIdFK` (`userIdFK`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`userIdFK`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
