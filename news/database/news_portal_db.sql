-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 09:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `category`, `description`, `date_created`) VALUES
(1, 'Sample Category', 'Sample Only', '2020-11-16 09:52:44'),
(2, 'Category 1', 'Sample', '2020-11-16 09:53:32'),
(3, 'Category 2', 'Sample Ddescription', '2020-11-16 09:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `post_list`
--

CREATE TABLE `post_list` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category_id` int(30) NOT NULL,
  `content` text NOT NULL,
  `cover_img` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_published` datetime NOT NULL DEFAULT current_timestamp(),
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_list`
--

INSERT INTO `post_list` (`id`, `title`, `category_id`, `content`, `cover_img`, `status`, `date_published`, `date_created`) VALUES
(1, 'Sample News', 2, '																																																&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent volutpat, eros at pulvinar pharetra, dolor est posuere ante, non tincidunt nunc sapien at turpis. Praesent non mauris quis lorem iaculis sagittis et id sapien. Etiam velit ligula, fringilla vitae diam non, consequat tempor magna. Suspendisse condimentum porttitor nibh in gravida. Integer ac lacinia est, nec blandit ligula. Nunc sed efficitur ipsum, sit amet eleifend odio. Nulla facilisi.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; &quot;&gt;&lt;img src=&quot;http://localhost/news_portal/assets/uploads/content_images/1605514740_typhoon.jpg&quot; style=&quot;width: 390.656px; height: 292.612px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Morbi molestie lorem pellentesque arcu eleifend facilisis. In ut neque ipsum. Phasellus congue nunc ut lectus maximus, nec suscipit sapien feugiat. Maecenas ornare ipsum vel augue laoreet, a rutrum magna malesuada. Nunc magna orci, dictum vel orci quis, ultricies elementum metus. Morbi viverra faucibus nulla et bibendum. In non feugiat enim. Morbi aliquet id quam ut aliquam. Aliquam justo sem, eleifend id velit quis, fermentum hendrerit mi. Duis at nulla euismod, condimentum felis non, faucibus justo. In metus enim, porttitor id ligula sit amet, malesuada iaculis elit. Nam imperdiet ultrices nisl quis sodales. Vestibulum venenatis risus elit, at ornare erat bibendum et. Sed eu pellentesque diam. Nam dapibus massa tellus, imperdiet tincidunt nisl imperdiet eu. Sed in lectus molestie, eleifend felis nec, rhoncus erat.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Nulla et dui quis nunc ultricies laoreet. Nullam nunc risus, mattis id volutpat non, mattis non ex. Donec vitae ullamcorper ante. Quisque iaculis efficitur diam, scelerisque euismod dui porta at. Nulla tempor ante ac sem lobortis congue vel a elit. Proin mattis commodo felis, tincidunt commodo mi dictum eget. Etiam at laoreet mauris. Mauris tincidunt lacus eu nulla mollis, vehicula vestibulum massa bibendum. Morbi porttitor consectetur justo sed posuere. Aenean ac faucibus sem. Aenean rhoncus massa faucibus erat faucibus, in ultrices purus elementum. Nam ultrices ac neque in blandit. Sed commodo gravida lacus.&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;															&lt;/p&gt;																																								', '1605514500_dl.jpg', 1, '2020-11-16 11:22:07', '2020-11-16 10:58:38'),
(2, 'Sample 101', 1, '												&lt;p style=&quot;text-align: center; &quot;&gt;											&lt;img src=&quot;http://localhost/news_portal/assets/uploads/content_images/1605497100_images-(2).jpg&quot; style=&quot;width: 545.212px; height: 306.321px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Donec at augue gravida, molestie risus in, tincidunt ante. Vestibulum maximus accumsan convallis. Cras molestie, metus vitae lobortis tincidunt, ante purus sollicitudin tellus, et commodo nisi velit at felis. Duis tristique nulla eu augue semper, at rhoncus lorem mollis. Praesent ut ex ut neque finibus lacinia id sed mauris. Nam iaculis porta maximus. Suspendisse ut enim a purus iaculis hendrerit et tempus augue. Nulla vel risus venenatis, hendrerit risus nec, pulvinar diam. Maecenas fringilla scelerisque risus. Proin rhoncus orci vitae metus maximus, sit amet lobortis risus fermentum. Vivamus viverra hendrerit fringilla. Duis accumsan rutrum turpis nec rutrum. Integer vel diam non arcu ullamcorper iaculis ac vel sapien. Nullam at lacinia leo.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Duis vulputate enim euismod magna commodo, sit amet condimentum diam pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce tempus faucibus finibus. Vestibulum nec sagittis felis, id feugiat tortor. Duis sed ex arcu. Fusce aliquet iaculis erat, nec congue magna rutrum in. In pretium elit mollis dapibus pretium. Donec dignissim quam quis leo efficitur, ac euismod dui imperdiet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt;&lt;p style=&quot;text-align: center; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;&lt;img src=&quot;http://localhost/news_portal/assets/uploads/content_images/1605497160_47446233-clean-noir-et-gradient-sombre-image-de-fond-abstrait-.jpg&quot; style=&quot;width: 463.16px; height: 308.773px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Nulla et dui quis nunc ultricies laoreet. Nullam nunc risus, mattis id volutpat non, mattis non ex. Donec vitae ullamcorper ante. Quisque iaculis efficitur diam, scelerisque euismod dui porta at. Nulla tempor ante ac sem lobortis congue vel a elit. Proin mattis commodo felis, tincidunt commodo mi dictum eget. Etiam at laoreet mauris. Mauris tincidunt lacus eu nulla mollis, vehicula vestibulum massa bibendum. Morbi porttitor consectetur justo sed posuere. Aenean ac faucibus sem. Aenean rhoncus massa faucibus erat faucibus, in ultrices purus elementum. Nam ultrices ac neque in blandit. Sed commodo gravida lacus.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;										', '1605512400_typhoon.jpg', 1, '2020-11-16 11:26:47', '2020-11-16 11:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_list`
--
ALTER TABLE `post_list`
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
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_list`
--
ALTER TABLE `post_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
