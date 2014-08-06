-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: 127.0.0.1
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.6.11
-- รุ่นของ PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `neocafe`
--
CREATE DATABASE IF NOT EXISTS `neocafe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `neocafe`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- dump ตาราง `category`
--

INSERT INTO `category` (`cid`, `category_name`) VALUES
(20, 'food'),
(19, 'snack'),
(21, 'coffee'),
(22, 'cocoa&tea'),
(23, 'smoothies');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- dump ตาราง `menu`
--

INSERT INTO `menu` (`mid`, `menu_name`, `cid`, `price`) VALUES
(2, 'คอกค่า', 17, 50),
(4, 'หมูทอด', 19, 60),
(5, 'ไก่ทอด', 19, 60),
(6, 'ไส้กรอกทอด', 19, 60),
(7, 'เฟรนซ์ฟรายด์', 19, 50),
(8, 'สปาเก็ตตี้ซอสมะเขือเทศไก่', 20, 70),
(9, 'สปาเก็ตตี้คาโบนาร่า', 20, 70),
(10, 'ข้าวหมูทอด', 20, 60),
(11, 'ข้าวไก่ทอด', 20, 60),
(12, 'ข้าวผัดปู', 20, 60),
(13, 'ข้าวผัดกระเพราไก่', 20, 60),
(14, 'ข้าวแพนงไก่', 20, 60),
(15, 'ไข่ดาว', 20, 10),
(16, 'เอสเพรสโซ่(ร้อน)', 21, 50),
(17, 'เอสเพรสโซ่(เย็น)', 21, 60),
(18, 'เอสเพรสโซ่(ปั่น)', 21, 75),
(19, 'มอคค่า(ร้อน)', 21, 50),
(20, 'มอคค่า(เย็น)', 21, 60),
(21, 'มอคค่า(ปั่น)', 21, 75),
(22, 'แคปปูชิโน่(ร้อน)', 21, 50),
(23, 'แคปปูชิโน่(เย็น)', 21, 60),
(24, 'แคปปูชิโน่(ปั่น)', 21, 75),
(25, 'ลาเต้(ร้อน)', 21, 50),
(26, 'ลาเต้(เย็น)', 21, 60),
(27, 'ลาเต้(ปั่น)', 21, 75),
(28, 'อเมริกาโน่(ร้อน)', 21, 50),
(29, 'อเมริกาโน่(เย็น)', 21, 60),
(30, 'อเมริกาโน่(ปั่น)', 21, 75),
(31, 'กาแฟ(เย็น)', 21, 60),
(32, 'กาแฟ(ปั่น)', 21, 75),
(33, 'โกโก้(เย็น)', 22, 60),
(34, 'โกโก้(ปั่น)', 22, 75),
(35, 'ชานม(เย็น)', 22, 60),
(36, 'ชานม(ปั่น)', 22, 75),
(37, 'ชาเนสที(เย็น)', 22, 60),
(38, 'ชาเนสที(ปั่น)', 22, 75),
(39, 'ชาเขียว(ร้อน)', 22, 50),
(40, 'ชามะลิ(ร้อน)', 22, 50),
(41, 'ชามิ้นท์(ร้อน)', 22, 50),
(42, 'สตอเบอร์รี่', 23, 75),
(43, 'กีวี่', 23, 75),
(44, 'ลิ้นจี่', 23, 75),
(45, 'แอปเปิ้ลมะนาว', 23, 75),
(46, 'test', 20, 555);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `queue` int(11) NOT NULL,
  `total` float NOT NULL,
  `discount` int(11) NOT NULL,
  `total_discount` float NOT NULL,
  `cash` float NOT NULL,
  `cashback` float NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- dump ตาราง `payment`
--

INSERT INTO `payment` (`pid`, `uid`, `queue`, `total`, `discount`, `total_discount`, `cash`, `cashback`, `date`, `status`) VALUES
(6, 5, 12, 5550, 0, 5550, 5555, 5, '2014-06-17', 1),
(7, 5, 5, 10, 0, 10, 0, -10, '2014-06-17', 1),
(4, 5, 1, 0, 0, 0, 0, 0, '2014-06-14', 0),
(5, 5, 2, 120, 0, 120, 150, 30, '2014-06-14', 1),
(8, 5, 8, 140, 0, 140, 0, -140, '2014-06-17', 1),
(9, 5, 2, 60, 0, 60, 0, -60, '2014-06-17', 1),
(10, 5, 8, 75, 0, 75, 0, -75, '2014-06-17', 1),
(11, 5, 12, 150, 0, 150, 0, -150, '2014-06-17', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `payment_list`
--

CREATE TABLE IF NOT EXISTS `payment_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- dump ตาราง `payment_list`
--

INSERT INTO `payment_list` (`id`, `pid`, `mid`, `number`, `note`, `status`) VALUES
(9, 6, 46, 10, '', 1),
(5, 4, 8, 1, '', 0),
(6, 5, 4, 1, '', 1),
(7, 4, 16, 1, '', 0),
(8, 5, 12, 1, '', 1),
(10, 7, 15, 1, '', 1),
(11, 8, 8, 2, '', 1),
(12, 9, 33, 1, '', 1),
(13, 10, 36, 1, '', 1),
(14, 11, 39, 3, '', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `queue` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `queue`
--

INSERT INTO `queue` (`queue`) VALUES
(12);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- dump ตาราง `role`
--

INSERT INTO `role` (`rid`, `role_name`) VALUES
(1, 'เจ้าของร้าน'),
(2, 'พนักงาน');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET utf8 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('74ddf45f21ab7e828426d64106435609', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1402951221, 'a:7:{s:9:"user_data";s:0:"";s:3:"uid";s:1:"5";s:9:"firstname";s:6:"montol";s:8:"lastname";s:6:"saklor";s:8:"username";s:5:"admin";s:4:"role";s:1:"1";s:9:"logged_in";b:1;}'),
('30b9a7fb98708e12e9fff54060698049', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1402939849, 'a:7:{s:9:"user_data";s:0:"";s:3:"uid";s:1:"5";s:9:"firstname";s:6:"montol";s:8:"lastname";s:6:"saklor";s:8:"username";s:5:"admin";s:4:"role";s:1:"1";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `firstname`, `lastname`, `email`, `tel`, `address`, `rid`) VALUES
(5, 'admin', '0c9802c6d8a116f8eef73cb48266c54e2bbb5abe', 'montol', 'saklor', 'a@a.com', '080000000', '54', 1),
(6, 'test', '0c9802c6d8a116f8eef73cb48266c54e2bbb5abe', 'test', 'test', 'test@test.com', '080000000', '5', 1),
(7, 'duker', '0c9802c6d8a116f8eef73cb48266c54e2bbb5abe', 'duker', 'space', 'duker@a.com', '080000000', '424', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
