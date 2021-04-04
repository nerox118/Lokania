-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 01:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokania`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `seller` text NOT NULL,
  `photo` text NOT NULL,
  `price` int(100) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `seller`, `photo`, `price`, `location`) VALUES
(1, 'Ini Nama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis dolor faucibus, luctus felis vitae, tempor nibh. Aenean erat tellus, ornare molestie justo in, condimentum sollicitudin leo. In ut est ipsum. Sed sit amet lectus lacus. Nam at aliquam orci. In lobortis rhoncus eleifend. Mauris suscipit metus eu nulla ornare semper in id massa. Phasellus ultricies risus ut imperdiet egestas. Pellentesque venenatis egestas urna, a lobortis risus ornare sit amet. Sed faucibus eros orci, sed suscipit dolor blandit sit amet. Mauris commodo odio ex, id tempor purus tristique sed. Integer cursus tellus vitae volutpat varius. Nam finibus mollis sem, vitae gravida lectus placerat at. Etiam porta suscipit eros ac vestibulum. Vestibulum hendrerit nisl nec massa eleifend maximus.\r\n\r\nPhasellus euismod ullamcorper tempus. Proin tincidunt mauris rhoncus purus aliquam facilisis. Pellentesque at nibh sollicitudin ex porttitor tincidunt. Ut eu ex a tellus euismod finibus efficitur id ante. Integer lacus dui, dignissim id tellus vel, pulvinar tempor lorem. Aliquam vitae nulla ac lectus sodales gravida a nec felis. Maecenas elementum finibus metus, id tempus nunc mattis eget. Fusce magna urna, vulputate vel consectetur efficitur, fermentum in nunc. Mauris porta quis urna vitae mattis. Nam nisl neque, aliquam id egestas vel, bibendum ac massa. Vivamus et diam id risus mattis rutrum ac id nisi.', 'Ini Penjual', 'Ini Foto', 999999, 'Ini Lokasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `privilage` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `privilage`, `name`, `email`, `foto`, `lokasi`) VALUES
('nerox', 'Bachrul1182112', 1, 'Bachrul Ilmi Al Kautsar', 'arulrank2@gmail.com', '', 'Jl. Petemon II / 134c'),
('user', '1234', 0, 'USER', 'user@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
