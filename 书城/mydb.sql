-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-04-13 11:58:57
-- 服务器版本： 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_booklist`
--

CREATE TABLE `b_booklist` (
  `b_booklist_id` int(10) NOT NULL,
  `b_booklist_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_booklist_summery` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_booklist_author` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_booklist_bookconcern` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_booklist_time` date NOT NULL,
  `b_booklist_price` int(10) NOT NULL,
  `b_booklist_isbn` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_booklist_pic` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `b_booklist`
--

INSERT INTO `b_booklist` (`b_booklist_id`, `b_booklist_name`, `b_booklist_summery`, `b_booklist_author`, `b_booklist_bookconcern`, `b_booklist_time`, `b_booklist_price`, `b_booklist_isbn`, `b_booklist_pic`) VALUES
(32, '百年孤独', '作品描写了布恩迪亚家族七代人的传奇故事，以及加勒比海沿岸小镇马孔', '加西亚·马尔克斯', '北京出版社', '1967-04-13', 25, '1', '2157百年孤独.jpg'),
(33, '城市发展史', '本书是美国著名的城市理论家、社会哲学家刘易斯·芒福德的重要理论著', '刘易斯·芒福德', '中国建筑工业出版社出版', '2005-02-01', 14, '2', '1214城市发展史.jpg'),
(34, '美国大城市的死与生', '作者以纽约、芝加哥等美国大城市为例，深入考察了都市结构的基本元素', '简·雅各布斯', '译林出版社', '2005-05-01', 34, '7-5447-0121-2', '2788美国大城市的死与生.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `b_login`
--

CREATE TABLE `b_login` (
  `b_login_id` int(10) NOT NULL,
  `b_login_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_login_password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `b_login`
--

INSERT INTO `b_login` (`b_login_id`, `b_login_name`, `b_login_password`) VALUES
(6, 'zc', '202cb962ac59075b964b07152d234b70'),
(7, '123', '202cb962ac59075b964b07152d234b70'),
(8, 'xkl', '202cb962ac59075b964b07152d234b70'),
(9, 'luxp', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- 表的结构 `b_shoppingcar`
--

CREATE TABLE `b_shoppingcar` (
  `b_car_id` int(10) NOT NULL,
  `b_car_bookid` int(10) NOT NULL,
  `b_car_username` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_car_booknum` int(10) NOT NULL,
  `b_car_bookname` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_car_pic` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b_car_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `b_shoppingcar`
--

INSERT INTO `b_shoppingcar` (`b_car_id`, `b_car_bookid`, `b_car_username`, `b_car_booknum`, `b_car_bookname`, `b_car_pic`, `b_car_price`) VALUES
(5, 32, 'zc', 3, '百年孤独', '2157百年孤独.jpg', 25),
(6, 34, 'zc', 1, '美国大城市的死与生', '2788美国大城市的死与生.jpg', 34),
(7, 33, 'zc', 1, '城市发展史', '1214城市发展史.jpg', 14);

-- --------------------------------------------------------

--
-- 表的结构 `candidate`
--

CREATE TABLE `candidate` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `current_status` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `current_salary` double NOT NULL,
  `expect_salary` double NOT NULL,
  `company` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `working_lines` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `education` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `working_age` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `candidate`
--

INSERT INTO `candidate` (`c_id`, `c_name`, `current_status`, `current_salary`, `expect_salary`, `company`, `working_lines`, `education`, `working_age`) VALUES
(4, '小红', '待业', 1000, 20000, '蓝欧科技', 'web前段', '本科', 3),
(5, '小明', '在职', 10000, 10000, '蓝欧', '前段', '大专', 1),
(6, '', '', 0, 0, '', '', '', 0),
(7, '', '', 0, 0, '', '', '', 0),
(8, '', '', 0, 0, '', '', '', 0),
(9, '', '', 0, 0, '', '', '', 0),
(10, '小明', '就业状态', 10000, 20000, '蓝欧', '前段', '大专', 2);

-- --------------------------------------------------------

--
-- 表的结构 `dialog`
--

CREATE TABLE `dialog` (
  `t_id` int(11) NOT NULL,
  `headhunter` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `can_id` int(11) NOT NULL,
  `candidate` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `dialog`
--

INSERT INTO `dialog` (`t_id`, `headhunter`, `can_id`, `candidate`, `content`, `time`) VALUES
(2, '张三', 4, '小红', 'diastolic', '2018-04-19 07:11:00'),
(4, 'dads', 4, '小红', '大武当', '2018-04-05 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_booklist`
--
ALTER TABLE `b_booklist`
  ADD UNIQUE KEY `b_booklist_id` (`b_booklist_id`);

--
-- Indexes for table `b_login`
--
ALTER TABLE `b_login`
  ADD PRIMARY KEY (`b_login_id`),
  ADD UNIQUE KEY `b_login_id` (`b_login_id`);

--
-- Indexes for table `b_shoppingcar`
--
ALTER TABLE `b_shoppingcar`
  ADD UNIQUE KEY `b_car_id` (`b_car_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `dialog`
--
ALTER TABLE `dialog`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_id` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_booklist`
--
ALTER TABLE `b_booklist`
  MODIFY `b_booklist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `b_login`
--
ALTER TABLE `b_login`
  MODIFY `b_login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `b_shoppingcar`
--
ALTER TABLE `b_shoppingcar`
  MODIFY `b_car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dialog`
--
ALTER TABLE `dialog`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
