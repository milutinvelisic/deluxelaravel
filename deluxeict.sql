-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 07:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deluxeict`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `idBlog` int(50) NOT NULL,
  `srcBlog` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altBlog` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `textBlog` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blogDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`idBlog`, `srcBlog`, `altBlog`, `textBlog`, `blogDate`) VALUES
(1, 'images/image_1.jpg', 'Feed 1', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(2, 'images/image_2.jpg', 'Feed 2', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(3, 'images/image_3.jpg', 'Feed 3', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(4, 'images/image_4.jpg', 'Feed 4', 'First -Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(5, 'images/image_5.jpg', 'Feed 5', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(6, 'images/image_6.jpg', 'Feed 6', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(7, 'images/image_7.jpg', 'Feed 7', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(8, 'images/image_8.jpg', 'Feed 8', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(9, 'images/image_9.jpg', 'Feed 9 ', 'First - Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(10, 'images/image_10.jpg', 'Feed 10', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(11, 'images/image_1.jpg', 'Feed 11', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(12, 'images/image_2.jpg', 'Feed 12', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(13, 'Images/image_3.jpg', 'Feed 13', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(14, 'images/image_4.jpg', 'Feed 14', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(15, 'images/image_5.jpg', 'Feed 15', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(16, 'images/image_6.jpg', 'Feed 16', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(17, 'images/image_7.jpg', 'Feed 17', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(18, 'images/image_8.jpg', 'Feed 18', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(19, 'images/image_9.jpg', 'Feed 19', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(20, 'images/image_2.jpg', 'Feed 20', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(21, 'images/image_1.jpg', 'Feed 21', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(22, 'images/image_2.jpg', 'Feed 22', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(23, 'images/image_3.jpg', 'Feed 23', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(24, 'images/image_4.jpg', 'Feed 24', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(25, 'images/image_1.jpg', 'Feed 1', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(26, 'images/image_2.jpg', 'Feed 2', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(27, 'images/image_3.jpg', 'Feed 3', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(28, 'images/image_4.jpg', 'Feed 4', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(29, 'images/image_5.jpg', 'Feed 5', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(30, 'images/image_6.jpg', 'Feed 6', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(31, 'images/image_7.jpg', 'Feed 7', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(32, 'images/image_8.jpg', 'Feed 8', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(33, 'images/image_9.jpg', 'Feed 9 ', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(34, 'images/image_10.jpg', 'Feed 10', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(35, 'images/image_1.jpg', 'Feed 11', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(36, 'images/image_2.jpg', 'Feed 12', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(37, 'Images/image_3.jpg', 'Feed 13', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(38, 'images/image_4.jpg', 'Feed 14', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(39, 'images/image_5.jpg', 'Feed 15', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019'),
(40, 'images/image_6.jpg', 'Feed 16', 'Even the all-powerful Pointing has no control about the blind texts', 'Mart 25, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `idFood` int(50) NOT NULL,
  `foodName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foodDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foodPrice` int(50) NOT NULL,
  `foodSrc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foodAlt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`idFood`, `foodName`, `foodDescription`, `foodPrice`, `foodSrc`, `foodAlt`) VALUES
(1, 'Blueberries pie', 'There is nothing to beat a fresh blueberry pie', 30, 'menu-1.jpg', 'Blueberries pie'),
(2, 'Pancakes', 'Rolled-up pancakes in chocolate sauce', 20, 'menu-2.jpg', 'Rolled-up pancakes in chocolate sauce'),
(3, 'Pancakes', 'Pancakes with fruit salad', 15, 'menu-3.jpg', 'Pancakes with fruit salad'),
(4, 'Grilled Beef', 'Grilled Beef with potatoes', 30, 'menu-4.jpg', 'Grilled Beef with potatoes'),
(5, 'Grilled Chicken', 'Grilled Chicken', 30, 'menu-5.jpg', 'Grilled Chicken'),
(6, 'Ultimate Overload', 'Ultimate Overload', 30, 'menu-6.jpg', 'Ultimate Overload'),
(7, 'Fruit cocktail', 'Fresh fruit cocktail', 10, 'menu-7.jpg', 'Fruit cocktail'),
(8, 'Ham & Pineapple', 'Ham & Pineapple', 13, 'menu-8.jpg', 'Ham & Pineapple');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `idNav` int(50) NOT NULL,
  `navText` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`idNav`, `navText`, `navLink`, `navTitle`) VALUES
(1, 'Home', 'index.php', 'Home'),
(2, 'Rooms', 'rooms.php', 'Rooms'),
(3, 'Restaurant', 'restaurant.php', 'Restaurant'),
(4, 'About', 'about.php', 'About'),
(5, 'Feed', 'feed.php', 'Feed'),
(8, 'Contact', 'contact.php', 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `reservedrooms`
--

CREATE TABLE `reservedrooms` (
  `idReservedRoom` int(50) NOT NULL,
  `dateFrom` int(100) NOT NULL,
  `dateTo` int(100) NOT NULL,
  `idRoomType` int(50) NOT NULL,
  `idUser` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRole` int(50) NOT NULL,
  `roleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `roleName`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `idRoom` int(50) NOT NULL,
  `roomName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roomPicture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRoomType` int(50) NOT NULL,
  `roomPrice` int(50) NOT NULL,
  `maxPeoplePerRoom` int(50) NOT NULL,
  `roomSize` int(50) NOT NULL,
  `numberOfBeds` int(100) NOT NULL,
  `idRoomStatus` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`idRoom`, `roomName`, `roomPicture`, `idRoomType`, `roomPrice`, `maxPeoplePerRoom`, `roomSize`, `numberOfBeds`, `idRoomStatus`) VALUES
(1, 'Suite Room', 'room-1.jpg', 1, 100, 3, 30, 2, 1),
(2, 'Family Room', 'room-2.jpg', 2, 130, 4, 45, 3, 1),
(3, 'Deluxe Room', 'room-3.jpg', 3, 150, 5, 50, 4, 1),
(4, 'Classic Room', 'room-4.jpg', 4, 100, 4, 40, 2, 1),
(5, 'Superior Room', 'room-5.jpg', 5, 300, 6, 75, 5, 1),
(6, 'Luxury Room', 'room-6.jpg', 6, 500, 7, 100, 7, 1),
(7, 'Nova Soba', '1584297199_87979235_3012680295418445_908538870486794240_o.jpg', 1, 225, 4, 40, 8, 1),
(13, 'Nova Soba6', '1584647879_88360895_2939105002817309_4050528977628954624_o.jpg', 1, 100, 5, 120, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomphotos`
--

CREATE TABLE `roomphotos` (
  `idRoomPhotos` int(50) NOT NULL,
  `photosSrc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photosAlt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRoom` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `idRoomStatus` int(50) NOT NULL,
  `roomStatusName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`idRoomStatus`, `roomStatusName`) VALUES
(1, 'Avaliable'),
(2, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `idRoomType` int(50) NOT NULL,
  `roomTypeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`idRoomType`, `roomTypeName`) VALUES
(1, 'Suite room'),
(2, 'Family Room'),
(3, 'Deluxe Room'),
(4, 'Classic Room'),
(5, 'Superior Room'),
(6, 'Luxury Room');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(50) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `originalPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `idRole` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `email`, `password`, `originalPassword`, `active`, `idRole`) VALUES
(1, 'milutin', 'milutin.velisic.195.17@ict.edu.rs', '9a77038671a58cbba911448ba8caf22c', 'necesuci', 1, 1),
(19, 'perica', 'peraperic@gmail.com', '24e3731b1f1855b524130768bde350fe', 'zikazikic', 0, 2),
(20, 'danijelaa', 'danijela@gmail.com', 'fef213de0f55d86f2f6ee663f346bd5e', 'danijela', 0, 2),
(21, 'veljko', 'veljko@gmail.com', '52ea23b880f8b50b929b2360e264b2b5', 'veljko', 0, 2),
(22, 'ictict', 'ictict@gmail.com', 'cd04fe19fad9c5de0ef975cb4e841187', 'ictict', 0, 2),
(23, 'korona', 'korona@gmail.com', 'c8f8197346f12efe2be5d57df551710b', 'korona', 0, 2),
(25, 'nikola', 'nikola@gmail.com', '9365ea12b2d910e1aceaac190fbc97a5', 'nikola', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idBlog`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`idFood`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`idNav`);

--
-- Indexes for table `reservedrooms`
--
ALTER TABLE `reservedrooms`
  ADD PRIMARY KEY (`idReservedRoom`),
  ADD KEY `idRoomType` (`idRoomType`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idRoom`),
  ADD KEY `idRoomType` (`idRoomType`),
  ADD KEY `idRoomStatus` (`idRoomStatus`);

--
-- Indexes for table `roomphotos`
--
ALTER TABLE `roomphotos`
  ADD PRIMARY KEY (`idRoomPhotos`),
  ADD KEY `idSobe` (`idRoom`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`idRoomStatus`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`idRoomType`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `idBlog` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `idFood` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `idNav` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservedrooms`
--
ALTER TABLE `reservedrooms`
  MODIFY `idReservedRoom` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `idRoom` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roomphotos`
--
ALTER TABLE `roomphotos`
  MODIFY `idRoomPhotos` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `idRoomStatus` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `idRoomType` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservedrooms`
--
ALTER TABLE `reservedrooms`
  ADD CONSTRAINT `reservedrooms_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservedrooms_ibfk_3` FOREIGN KEY (`idRoomType`) REFERENCES `roomtype` (`idRoomType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`idRoomType`) REFERENCES `roomtype` (`idRoomType`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`idRoomStatus`) REFERENCES `roomstatus` (`idRoomStatus`);

--
-- Constraints for table `roomphotos`
--
ALTER TABLE `roomphotos`
  ADD CONSTRAINT `roomphotos_ibfk_1` FOREIGN KEY (`idRoom`) REFERENCES `room` (`idRoom`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
