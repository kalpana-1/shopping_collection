-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 01:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping-cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `item_desc` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `price`, `image`, `item_desc`) VALUES
(1, 'Hand Bags', 2500, 'bags.jpg', 'Get colorful accessories for spring like a long wallet from Comme des Garçons, a fuchsia J.Crew crossbody bag,or a tasseled key fob from Kate Spade—plus a wedge-shaped Baggu pouch.'),
(2, 'Sunglasses', 1500, 'sunglasses.jpg', 'Make a style statement this summer with cat-eye sunglasses like a pair of Stephane Christian half-frames, some iridescent blue Dior frames,Thom Browne.'),
(3, 'Hiking Boots', 3700, 'shoe.jpg', 'Embrace the monochrome with items from the new Nike and KAWS collaboration, like a pair of grey Air Jordan IVs, a hooded sweatshirt,or a flat brim Jumpman hat—plus a Nike x KAWS coach\'s jacke'),
(4, 'Girl\'s Watch', 2300, 'watch.jpeg', 'Fashion design japan movement stainless steel ladies watch Product parameter OEM service Packaging & Shipping 1.Free packaging: ..."'),
(5, 'High Heels', 2300, 'heels.jpg', 'Make a style statement this summer with cat-eye sunglasses like a pair of Stephane Christian half-frames, some iridescent blue Dior frames,Thom Browne'),
(6, 'Hair Clip', 800, 'hairClips.jpg', 'Embrace the monochrome with items from the new Nike and KAWS collaboration, like a pair of grey Air Jordan IVs, a hooded sweatshirt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `address`, `telephone`, `email`) VALUES
(10, 'chathura', 'chathura123', 'Gampaha', 774589650, 'chathura@gmail.com'),
(8, 'sadu', '123', 'Gampaha', 774589650, 'sadu@gmail.com'),
(6, 'Vindaya ', 'vindy123', 'N0 74/1 Paris Perera Road Jaela', 774589650, 'vindayatechno@gmail.com'),
(9, 'vindy', 'vindy123', 'Jaela', 774589650, 'vindya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
