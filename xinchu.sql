-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-16 14:11:17
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xinchu`
--

-- --------------------------------------------------------

--
-- 表的结构 `men_admin`
--

CREATE TABLE IF NOT EXISTS `men_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='账号表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `men_admin`
--

INSERT INTO `men_admin` (`id`, `username`, `password`) VALUES
(1, 'xinchumenye', 'xinchumenye123');

-- --------------------------------------------------------

--
-- 表的结构 `men_ads`
--

CREATE TABLE IF NOT EXISTS `men_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(40) NOT NULL COMMENT '自定义文件名',
  `savename` varchar(50) NOT NULL COMMENT '保存图片名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告位轮播' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `men_ads`
--

INSERT INTO `men_ads` (`id`, `filename`, `savename`) VALUES
(5, '领航未来', '20171105\\1b7edd929be2af29bec548795e636f8b.png'),
(6, '新年礼盒', '20171105\\79514ed4ae7f07addc2dcb684b0306ed.jpg'),
(7, '星辰', '20171105\\ea61fad334aa0b40de41aa3e57d8e01f.jpg'),
(8, '第4章图', '20171105\\f9534426f949f5b2e107af7c6c8ebe51.jpg'),
(9, '遗漏', '20171105\\23512d55478b5a6e2cee93b91c01572e.jpg'),
(11, '好感和我日哦将', '20171115\\fefa8609fa62042fab6c6c08b0d9b8ee.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `men_link`
--

CREATE TABLE IF NOT EXISTS `men_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_addr` varchar(600) NOT NULL COMMENT '链接网址',
  `link_name` varchar(100) NOT NULL COMMENT '网址名字',
  `guding_id` int(1) NOT NULL COMMENT '固定第几个',
  PRIMARY KEY (`id`),
  UNIQUE KEY `guding_id` (`guding_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='友情链接' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `men_link`
--

INSERT INTO `men_link` (`id`, `link_addr`, `link_name`, `guding_id`) VALUES
(1, 'www.baidu.com', '百度搜索', 1),
(2, 'www.163.com', '网易', 2),
(3, 'www.pbpbg.com', '新叶网络', 3),
(4, 'www.aliyun.com', '阿里云', 4),
(5, 'www.sina.com.cn', '新浪首页', 0);

-- --------------------------------------------------------

--
-- 表的结构 `men_news`
--

CREATE TABLE IF NOT EXISTS `men_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `savename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='新闻' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `men_news`
--

INSERT INTO `men_news` (`id`, `title`, `content`, `savename`) VALUES
(3, '标题一', '这是新闻内容额外费瓦', '20171105\\9296a0356fdd86fd1d6f0dd67a2ebe12.png'),
(4, '新闻2', '人哇个热轧给外人', '20171105\\31005bd6bd7a7cbdc7cb1e8ac2c648b9.png'),
(5, '为鹅鹅鹅方法', '人分别购买送法律外人GV抢二楼困难老人发给我为人很帮忙的老师发的离开', '20171106\\b1d956fc6e7dceb413dffe68fdd226f6.jpg'),
(6, '我很帅', 'asfcsdfdsvdsvsb s', '20171106\\f3b1b73bb309fad3e616ba4f29c757ed.jpg'),
(7, 'sfswgvsf', 'eqgvfzsnb svb vdxzb xb zdx', '20171106\\5185d46f90cf5662d8e39fa50fd4e920.jpg'),
(8, '嗨嗨哈哈', '额外给责任法保护方式', '20171106\\efafe6e1cdf9c8535bf667cbe1345277.jpg'),
(9, '没人打官司保障房', '物权法ｖ认证是无色无蜂窝个　额哇嘎', '20171106\\5fc40a18959c87ee022530c3f0d0c2ca.jpg'),
(10, '小狗', '小狗狗eqfnrlw忙完了可观的v面无人购买外人看姑娘娃人口纽瓦克给女人你问g.krznskmzg.khgxr 肥皂水进口国内ewjk k wanrgbjksk  efjkhnztzekfeajf谁放到你就认识客观', '20171108\\82f40a857bc03c72ed0878867cf6510a.jpg'),
(11, 'REGRTHJHGFD', '很变态高兴地节能灯管gdxng对方和你', '20171108\\b6bcc8fa83b32c84a3ec4b28f80d8c95.jpg'),
(12, '如果把对方', '地方和你的心干涩', '20171108\\d505eb7e17b7152a6bca80c51a1745eb.jpg'),
(13, '封神榜则关闭', '发送白砂糖被告人顺便帮个人赛别人', '20171116\\3a67ebb285c99483cc4c601b75a72c67.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `men_product`
--

CREATE TABLE IF NOT EXISTS `men_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL COMMENT '产品系列',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：产品未推荐。1:产品推荐',
  `pro_name` varchar(30) NOT NULL COMMENT '产品名',
  `savename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='产品' AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `men_product`
--

INSERT INTO `men_product` (`id`, `category`, `recommend`, `pro_name`, `savename`) VALUES
(11, '好汉 ', 1, '问啊费瓦', '20171105\\cc293a2b117f953c8ef51a6c6d5ed882.jpg'),
(12, '仙剑', 1, '奇侠传', '20171105\\d373602d17d06a566c865bdaa6ff4f9d.png'),
(13, '典雅', 1, '典雅的', '20171105\\97662fee7fdd05312f43980ee0d0b880.jpg'),
(14, '爷们', 1, '爷们门', '20171105\\7175f68f2a1aff8be556eba669a628ef.jpg'),
(15, '典雅', 0, '阿珍是傻逼', '20171105\\7deb7c614b2dc84589a11bfe3914be75.jpg'),
(16, '典雅', 1, '不知道', '20171106\\562718b62f6d5a0e4b653e324875f68e.jpg'),
(18, '仙剑', 1, '人翻滚吧二分', '20171108\\359d75a145e887df8e035fb3e29a86fd.jpg'),
(22, '仙剑', 1, 'regression', '20171114\\03ea39f24e3f1c1e757054f0681d7d1f.jpg'),
(23, '典雅', 1, '个分手被各方', '20171114\\4d1bdefa113207ed0077c67527ab1e57.jpg'),
(27, '爷们', 1, '官方那大概', '20171114\\c14c1166361fb7fa4287a7b9f68fd33f.png'),
(29, '仙剑', 1, '高洪波定格在', '20171114\\069cccb3aa9b3428d7c46f0516731330.jpg'),
(30, '仙剑', 1, '如果被告人女的额', '20171114\\395fe3fe0e8d77831de8b421c5dd6402.jpg'),
(33, '好汉 ', 1, '满汉全席都是小菜一碟', '20171115\\ee575a24ba5561dde83f9dad9eb62109.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `men_profile`
--

CREATE TABLE IF NOT EXISTS `men_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '简介内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='简介内容更改表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `men_profile`
--

INSERT INTO `men_profile` (`id`, `content`) VALUES
(1, '&lt;p&gt;&amp;nbsp; 海贼王我当定了.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;怎么可能。&lt;/p&gt;&lt;p&gt;我怎么可能认识你.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- 表的结构 `men_quality`
--

CREATE TABLE IF NOT EXISTS `men_quality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '钻石品质内容',
  `savename` varchar(70) NOT NULL,
  `weiyi` tinyint(1) NOT NULL COMMENT '唯一',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='钻石品质门的介绍' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `men_quality`
--

INSERT INTO `men_quality` (`id`, `content`, `savename`, `weiyi`) VALUES
(2, '第一一一一一个全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热。', '20171106\\a8c208f099f67eac5b933f48da84b7cf.jpg', 0),
(3, '第二个---全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热', '20171106\\5623b744815a0076e2ef0bf8b2150048.jpg', 1),
(4, '第三个豪门全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热带雨林，全实木打造。取材自澳大利亚热', '20171106\\25f660e825089d6cb801656e67ed6990.jpg', 2),
(5, '俄方v阿尔官方v无答复维尔瓦 ', '20171116\\fbc0ccd26c534b45f7aa5b3b5d05ede7.jpeg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `men_series`
--

CREATE TABLE IF NOT EXISTS `men_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='系列' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `men_series`
--

INSERT INTO `men_series` (`id`, `category`) VALUES
(1, '仙剑'),
(2, '典雅'),
(3, '爷们'),
(4, '好汉 ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
