-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 10 月 21 日 15:26
-- 服务器版本: 5.5.38
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `running`
--

-- --------------------------------------------------------

--
-- 表的结构 `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost_date` int(11) DEFAULT NULL,
  `cost_title` varchar(200) DEFAULT NULL,
  `cost_money` float(255,2) DEFAULT NULL,
  PRIMARY KEY (`cost_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `run`
--

CREATE TABLE IF NOT EXISTS `run` (
  `time` int(11) NOT NULL,
  `km` float(10,1) DEFAULT NULL,
  PRIMARY KEY (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `run`
--

INSERT INTO `run` (`time`, `km`) VALUES
(1445411178, 1.5);

-- --------------------------------------------------------

--
-- 表的结构 `wish`
--

CREATE TABLE IF NOT EXISTS `wish` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `wish_title` varchar(200) DEFAULT NULL,
  `wish_money` float(255,2) DEFAULT NULL,
  PRIMARY KEY (`wish_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
