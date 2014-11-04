-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-10-25 17:01:43
-- 服务器版本： 10.0.10-MariaDB
-- PHP Version: 5.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srtp-lzx`
--

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `answer_string` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `answer`
--

INSERT INTO `answer` (`id`, `form_id`, `username`, `answer_string`, `date`) VALUES
(1, 1, '', '', '2014-07-30 01:10:10'),
(2, 1, '', '', '2014-08-07 04:21:03'),
(3, 1, '', '', '2014-08-20 08:26:45'),
(4, 5, '', '', '2014-09-02 05:05:33'),
(5, 5, '', '', '2014-09-02 05:05:39'),
(6, 5, 'lzxto123-dnf@qq.com', 'fdsf γδundefinedγδfsdfsγδfsdfγδfsdfγδfdsfdsγδfsdfsdγδundefinedγδδ', '2014-09-02 08:41:18'),
(7, 5, '', '', '2014-09-02 07:00:57'),
(8, 4, 'lzxto123-dnf@qq.com', '佛挡杀佛γδundefinedγδ丰盛的γδ房顶上γδ发斯蒂芬γδ丰盛的γδ发斯蒂芬γδ', '2014-09-02 08:40:38'),
(9, 6, 'lzxto123-dnf@qq.com', '佛挡杀佛γδ$_FILES-01-1337934583-2117999.pngγδδ$_FILES-130646391411.jpgγδ', '2014-09-02 09:24:36'),
(10, 3, 'lzxto123-dnf@qq.com', '佛挡杀佛γδundefinedγδfds γδfdsfγδfsdfγδfsdfsdγδfrdgγδ', '2014-09-02 10:10:04'),
(11, 7, 'lzxto123-dnf@qq.com', '佛挡杀佛γδundefinedγδfds γδfdsfγδfsdfγδfsdfsdγδfrdgγδ', '2014-09-02 10:25:13'),
(12, 7, 'lzxto123-dnf@qq.com', '', '2014-09-02 10:25:34'),
(13, 8, '', '0Î²0Î²0Î²0Î²0Î²Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²0Î²1Î²1Î²0Î²Î²0Î²0Î²1Î²0Î²0Î²0Î²Î²Î²Î²Î²Î²Î²γδ女γδ3120103599γδγδ1888684057222γδlzxto123-dnf@qq.comγδγδγδγδundefinedγδ', '2014-09-04 08:33:44'),
(14, 10, 'lzxto123-dnf@qq.com', '房顶上γδ男γδ1γδ丰盛的γδ丰盛的γδlzxto1233-@fdwf.comγδ房顶上γδ', '2014-09-18 09:25:55'),
(15, 11, '404764607@qq.com', '$_FILES-8fe53ccfc93a825c007897750852ba65.δδ', '2014-10-03 03:35:26'),
(16, 11, '404764607@qq.com', '$_FILES-ceea9e02ca334d24eb1c43abc18afb59.δδ', '2014-10-03 03:40:19'),
(17, 11, '404764607@qq.com', '$_FILES-07dfb4b61aeb3068f4d4bcdf6145af3a.δδ', '2014-10-03 03:50:29'),
(18, 12, '404764607@qq.com', 'asdγδ男γδ3120102649γδasdγδasdγδasd@123.comγδqweγδ$_FILES-1d96ec416ff1b38a7da67046359b2f50.jpgδδ', '2014-10-10 01:34:06'),
(19, 14, '404764607@qq.com', '$_FILES-0f550627868cb1933c1698a6811f4a7d.docδ123γδ男γδ123γδ123γδ123γδ123@123.comγδ123γδδ', '2014-10-10 01:41:41'),
(20, 21, 'lzxto123-dnf@qq.com', 'fsdγδ男γδ9γδfdsfγδfsγδ12@123.comγδfsdγδ$_FILES-4948f017b68b326f536cb67cc00af6a8.jpgδδ', '2014-10-10 09:58:26');

-- --------------------------------------------------------

--
-- 表的结构 `decoration`
--

CREATE TABLE IF NOT EXISTS `decoration` (
  `form_id` int(11) NOT NULL,
  `form_expire_time` date DEFAULT NULL,
  `form_number_limit` int(11) DEFAULT NULL,
  `bg` text CHARACTER SET utf8,
  `form_tag` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `decoration`
--

INSERT INTO `decoration` (`form_id`, `form_expire_time`, `form_number_limit`, `bg`, `form_tag`) VALUES
(1, '2014-09-25', 200, '', ''),
(1, '2014-09-25', 200, '', ''),
(1, '2014-09-25', 200, '', ''),
(2, '2014-09-11', 200, '', ''),
(3, '2014-09-28', 200, '', ''),
(4, '2014-09-26', 200, '', ''),
(5, '2014-09-20', 800, '', '测试'),
(6, '2014-09-11', 500, '', ''),
(7, '2014-09-28', 450, '', ''),
(8, '2014-09-30', 700, '', '范德萨'),
(9, '2014-09-12', 50, '', ''),
(10, '2014-09-20', 1200, '', ''),
(11, '2014-10-04', 200, 'b80a374dfcfc00af6639485c3edd3b62.jpg', '123'),
(12, '2014-10-23', 200, '4c1fe3802692c18269ebed329d9146e6.png', ''),
(13, '2014-10-03', 123, '830e4e576f7dfa697a39cf15eee1a347.jpg', '123'),
(14, '2014-10-12', 200, 'a110d2a7be5eb27dea3f62a75851a3fb.jpg', '123'),
(20, '2014-10-17', 20, 'a141f2c8e7b9dceca2d23fdfd9cf496f.png', '123'),
(21, '2014-10-23', 350, '', ''),
(22, '2014-10-14', 1, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8 NOT NULL,
  `form_title` text CHARACTER SET utf8 NOT NULL,
  `form_intro` text CHARACTER SET utf8 NOT NULL,
  `question_string` text CHARACTER SET utf8 NOT NULL,
  `form_tip` text CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL,
  `click_times` int(11) NOT NULL,
  `answer_times` int(11) NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`form_id`, `username`, `form_title`, `form_intro`, `question_string`, `form_tip`, `Date`, `click_times`, `answer_times`) VALUES
(1, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '<p>请在这里输入报名表的说明</p>', '2014-09-01 06:45:40', 1, 0),
(2, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-09-01 07:14:34', 0, 0),
(3, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-09-01 07:42:35', 1, 0),
(4, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-09-02 08:28:16', 1, 0),
(5, 'lzxto123-dnf@qq.com', '测试', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ请在这里输入题干内容αfree-singlechoiceβrequiredδ', '请在这里输入报名表的注意事项', '2014-09-02 01:46:18', 0, 0),
(6, 'lzxto123-dnf@qq.com', 'gffffffffffffffd', '', 'gfdαfree-singlelineβγrequiredδ请在这里输入题干内容αfree-fileβγrequiredδ请在这里输入题干内容αfree-personalphotoβγrequiredδ请在这里输入题干内容αfree-fileβγrequiredδ', '请在这里输入报名表的注意事项', '2014-09-02 08:58:41', 3, 0),
(7, 'lzxto123-dnf@qq.com', 'vceshi', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', 'ccsafdfcccccccccccccccccccccc', '2014-09-02 10:10:53', 5, 0),
(8, 'lzxto123-dnf@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ的撒范德萨αfree-singlelineβγrequiredδ范德萨发的说法αfree-multilineβγrequiredδ范德萨发大水αfree-singlechoiceβ佛挡杀佛γ额外风水γ额外确认该死的γ房顶上γrequiredδ', '请在这里输入报名表的注意事项', '2014-09-02 11:14:43', 32, 0),
(9, 'lzxto123-dnf@qq.com', '请在这里输入报名表的名字', '<p>的撒的</p><p><i>请在这里输入报名表的说明</i></p>', '请在这里输入题干内容αfree-singlelineβγrequiredδ姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-09-04 03:43:54', 8, 0),
(10, 'lzxto123-dnf@qq.com', '收集银行账号', '<p>松岛枫</p><p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '丰盛的', '2014-09-18 09:20:48', 1, 0),
(11, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-fileβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-03 03:33:40', 1, 0),
(12, 'lzxto123-dnf@qq.com', '发的爽肤水', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ发斯蒂芬斯蒂芬αfree-fileβγrequiredδ', '的所发生的', '2014-10-03 10:59:04', 11, 0),
(13, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ123专业班级αlogic-classβγrequiredδ请在这里输入题干内容αfree-fileβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:35:13', 0, 0),
(14, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-fileβγrequiredδ姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:35:50', 1, 0),
(15, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-singlelineβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:55:12', 0, 0),
(16, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-singlelineβγrequiredδ姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:55:24', 0, 0),
(17, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-singlelineβγrequiredδ姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:56:05', 0, 0),
(18, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-singlelineβγrequiredδ姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:56:09', 0, 0),
(19, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '请在这里输入题干内容αfree-singlelineβγrequiredδ姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:56:16', 0, 0),
(20, '404764607@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 01:56:34', 1, 0),
(21, 'lzxto123-dnf@qq.com', 'fsdf', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδfeαfree-fileβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-10 09:56:58', 5, 0),
(22, 'lzxto123-dnf@qq.com', '请在这里输入报名表的名字', '<p>请在这里输入报名表的说明</p>', '姓名αlogic-nameβγrequiredδ性别αlogic-sexβ男γ女γrequiredδ学号αlogic-studentIDβγrequiredδ住址αlogic-addressβγrequiredδ电话长短号αlogic-telβγrequiredδ邮箱αlogic-emailβγrequiredδ专业班级αlogic-classβγrequiredδ', '请在这里输入报名表的注意事项', '2014-10-14 10:14:37', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `q4` text NOT NULL,
  `q5` text NOT NULL,
  `q6` text NOT NULL,
  `q7` text NOT NULL,
  `q8` text NOT NULL,
  `q9` text NOT NULL,
  `q10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `survey`
--

INSERT INTO `survey` (`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES
('q1-mul2', '是，并且在纳新过程中使用', '手机发短信&爱玩客河口区文件和进口权威和科技&', '可有可无', '很需要', '免费才愿意用', '会设计', 'q8-mul2&三点定位打球&', 'q9-mul2&请注明&', ''),
('q1-mul2', '是，并且在纳新过程中使用', '手机发短信&爱玩客河口区文件和进口权威和科技&', '可有可无', '很需要', '免费才愿意用', '会设计', 'q8-mul2&三点定位打球&', 'q9-mul2&请注明&', ''),
('q1-mul4&q1-mul8&', '否，暂无此类打算', '其他方式（请注明）&请注明&', '不需要', '可有可无', '免费才愿意用', '会考虑', 'q8-mul1&q8-mul2&请注明&', 'q9-mul2&q9-mul4&请注明&', 'gweergwerg'),
('q1-mul1&q1-mul2&q1-mul3&q1-mul4&q1-mul6&', '是，但纳新时不怎么用', '手机发短信&请注明&', '可有可无', '很需要', '免费才愿意用', '不感兴趣', 'q8-mul1&请注明&', 'q9-mul1&请注明&', ''),
('q1-mul1&q1-mul2&q1-mul3&q1-mul4&q1-mul6&', '是，但纳新时不怎么用', '手机发短信&请注明&', '可有可无', '很需要', '免费才愿意用', '不感兴趣', 'q8-mul1&请注明&', 'q9-mul1&请注明&', ''),
('q1-mul4&q1-mul5&q1-mul8&', '否，暂无此类打算', '其他方式（请注明）&是的&', '很需要', '不需要', '免费才愿意用', '会考虑', 'q8-mul2&请注明&', '橘红', '是对的 这是\r\n测试'),
('q1-mul1&q1-mul4&q1-mul7&q1-mul8&q1-mul9-*&', '是，并且在纳新过程中使用', '发飞信&请注明&', '不需要', '可有可无', '免费才愿意用', '会考虑', 'q8-mul2&q8-mul3&请注明&', '搭配吧', '暂时没有建议，详细了解之后可以提出。'),
('q1-mul1&q1-mul2&q1-mul3&q1-mul4&q1-mul6&q1-mul7&q1-mul8&q1-mul9-*&', '是，并且在纳新过程中使用', '发飞信&请注明&', '可有可无', '很需要', '免费才愿意用', '会考虑', 'q8-mul2&q8-mul3&请注明&', 'q9-mul4&请注明&', ''),
('q1-mul1&q1-mul2&q1-mul3&q1-mul4&q1-mul5&q1-mul7&', '是，并且在纳新过程中使用', '发飞信&请注明&', '很需要', '很需要', '免费才愿意用', '会设计', 'q8-mul1&请注明&', 'q9-mul4&请注明&', '希望界面尽可能的简介，操作比较人性，需要有安卓系统的app'),
('q1-mul1&q1-mul4&q1-mul5&', '否，但之后可能会开通', '发飞信&请注明&', '很需要', '很需要', '我不想用', '会设计', 'q8-mul2&q8-mul3&请注明&', 'q9-mul1&q9-mul4&请注明&', '');

-- --------------------------------------------------------

--
-- 表的结构 `_user`
--

CREATE TABLE IF NOT EXISTS `_user` (
  `user_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_question` varchar(10) DEFAULT NULL,
  `user_answer` varchar(10) DEFAULT NULL,
  `user_vip` varchar(1) DEFAULT NULL,
  `user_email` varchar(40) DEFAULT NULL,
  `user_telephone` varchar(11) DEFAULT NULL,
  `user_regdate` date DEFAULT NULL,
  `user_logdate` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `_user`
--

INSERT INTO `_user` (`user_id`, `username`, `password`, `user_question`, `user_answer`, `user_vip`, `user_email`, `user_telephone`, `user_regdate`, `user_logdate`) VALUES
(1, '404764607@qq.com', 'qweqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1@2.com', 'qweqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'test@qq.com', 'testtest', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'ljh19950713@gmail.com', '445998700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'lzxto123-dnf@qq.com', '1995lzx927', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'iamzerolu@gmail.com', '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'baomingba@126.com', 'taodada', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
