-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-28 15:51:32
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partymanager`
--

-- --------------------------------------------------------

--
-- 表的结构 `assignmission`
--

CREATE TABLE `assignmission` (
  `id` int(11) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `title` varchar(40) NOT NULL,
  `annix` text,
  `details` text NOT NULL,
  `max` int(100) NOT NULL,
  `min` int(100) NOT NULL,
  `timeLimit` date NOT NULL,
  `office` tinyint(1) NOT NULL DEFAULT '0',
  `communication` tinyint(1) NOT NULL DEFAULT '0',
  `automatic` tinyint(1) NOT NULL DEFAULT '0',
  `radar` tinyint(1) NOT NULL DEFAULT '0',
  `power` tinyint(1) NOT NULL DEFAULT '0',
  `maintain` tinyint(1) NOT NULL DEFAULT '0',
  `commuRun` tinyint(1) NOT NULL DEFAULT '0',
  `motor` tinyint(1) NOT NULL DEFAULT '0',
  `navi` tinyint(1) NOT NULL DEFAULT '0',
  `route` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `assignmission`
--

INSERT INTO `assignmission` (`id`, `publisher`, `title`, `annix`, `details`, `max`, `min`, `timeLimit`, `office`, `communication`, `automatic`, `radar`, `power`, `maintain`, `commuRun`, `motor`, `navi`, `route`) VALUES
(5, '张恒', 'yyy', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', 'yyy', 7, 2, '2017-12-31', 0, 0, 1, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `fixedmission`
--

CREATE TABLE `fixedmission` (
  `id` int(11) NOT NULL,
  `publisher` varchar(20) NOT NULL COMMENT '发布人',
  `title` varchar(40) NOT NULL COMMENT '名称',
  `annix` text COMMENT '附件',
  `details` text NOT NULL COMMENT '内容',
  `max` int(100) NOT NULL COMMENT '分值（上）',
  `min` int(100) NOT NULL COMMENT '分值（下）',
  `timeLimit` date NOT NULL COMMENT '时限',
  `office` tinyint(1) NOT NULL DEFAULT '0' COMMENT '机关党支部',
  `communication` tinyint(1) NOT NULL DEFAULT '0' COMMENT '通信室党支部',
  `automatic` tinyint(1) NOT NULL DEFAULT '0' COMMENT '自动化数据室党支部',
  `radar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '雷达室党支部',
  `power` tinyint(1) NOT NULL DEFAULT '0' COMMENT '供电室党支部',
  `maintain` tinyint(1) NOT NULL DEFAULT '0' COMMENT '维修室党支部',
  `commuRun` tinyint(1) NOT NULL DEFAULT '0' COMMENT '通信运行室党支部',
  `motor` tinyint(1) NOT NULL DEFAULT '0' COMMENT '现场车队党支部',
  `navi` tinyint(1) NOT NULL DEFAULT '0' COMMENT '导航室党支部',
  `route` tinyint(1) NOT NULL DEFAULT '0' COMMENT '航路导航室党支部',
  `sect11` tinyint(1) NOT NULL DEFAULT '0',
  `sect12` tinyint(1) NOT NULL DEFAULT '0',
  `sect13` tinyint(1) NOT NULL DEFAULT '0',
  `sect14` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fixedmission`
--

INSERT INTO `fixedmission` (`id`, `publisher`, `title`, `annix`, `details`, `max`, `min`, `timeLimit`, `office`, `communication`, `automatic`, `radar`, `power`, `maintain`, `commuRun`, `motor`, `navi`, `route`, `sect11`, `sect12`, `sect13`, `sect14`) VALUES
(3, '常诚', '上交党费', 'ftp://10.24.0.170/PartyManager/files/dsf.docx', '马上上交', 10, -5, '2017-03-31', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '水电费', '第三方', '啥地方萨芬的', '撒打发', 4, 3, '2017-03-16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '张恒', '测试任务', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', 5, -5, '2017-12-31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '张恒', '369', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', 5, 0, '2017-12-31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '常城', '111', '关于推进问题导向工作的相关建议.doc', '阿发', 3, 2, '2017-09-30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '张恒', '11111', '党办任务分解表（3.28）.doc', '2132143253', 10, 0, '2017-12-31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `missionlog`
--

CREATE TABLE `missionlog` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `annix` text,
  `details` text NOT NULL,
  `timeLimit` date NOT NULL,
  `finishTime` date DEFAULT NULL,
  `type` varchar(50) NOT NULL COMMENT '类型',
  `status` varchar(50) NOT NULL COMMENT '状态',
  `score` int(100) NOT NULL DEFAULT '0' COMMENT '得分',
  `annixSubmit` text COMMENT '提交文档',
  `branch` varchar(40) NOT NULL COMMENT '所在党支部',
  `submitter` varchar(20) DEFAULT NULL COMMENT '上传者'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `missionlog`
--

INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, `details`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, `branch`, `submitter`) VALUES
(24, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '现场车队党支部', NULL),
(23, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '维修室党支部', NULL),
(22, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '供电室党支部', NULL),
(21, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '航路导航室党支部', NULL),
(20, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '导航室党支部', NULL),
(19, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '雷达室党支部', NULL),
(18, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', '2017-04-20', '定期任务', '已打分', 85, '张恒视频脚本.docx', '自动化数据室党支部', '张恒'),
(17, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '通信运行室党支部', NULL),
(16, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '通信室党支部', NULL),
(15, '测试任务', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '测试内容', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '机关党支部', NULL),
(34, '123', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '123', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '现场车队党支部', NULL),
(33, '123', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '123', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '维修室党支部', NULL),
(32, '123', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '123', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '供电室党支部', NULL),
(31, '123', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '123', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '航路导航室党支部', NULL),
(30, '123', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '123', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '导航室党支部', NULL),
(35, '222', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', '222', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '导航室党支部', NULL),
(36, '222', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', '222', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '航路导航室党支部', NULL),
(37, '222', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', '222', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '供电室党支部', NULL),
(38, '222', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', '222', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '维修室党支部', NULL),
(39, '222', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', '222', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '现场车队党支部', NULL),
(40, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '机关党支部', NULL),
(41, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '通信室党支部', NULL),
(42, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '通信运行室党支部', NULL),
(43, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', '2017-04-20', '定期任务', '已打分', 98, '张恒视频脚本.docx', '自动化数据室党支部', '张恒'),
(44, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '雷达室党支部', NULL),
(45, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '导航室党支部', NULL),
(46, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '航路导航室党支部', NULL),
(47, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '供电室党支部', NULL),
(48, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '维修室党支部', NULL),
(49, '369', '张恒', '关于参加第一届民航空管系统“空管榜样”表彰会的通知.pdf', '369', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '现场车队党支部', NULL),
(50, 'yyy', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', 'yyy', '2017-12-31', '2017-04-20', '指定任务', '已打分', 95, '张恒视频脚本.docx', '自动化数据室党支部', '张恒'),
(51, 'yyy', '张恒', '关于召开第一届民航空管系统“空管榜样”表彰会的通知.docx', 'yyy', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '维修室党支部', NULL),
(52, 'ddd', '张恒', '忍不住的人生.docx', 'ddd', '2017-12-31', NULL, '指定任务', '已发布', 0, NULL, '机关党支部', NULL),
(53, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', '2017-04-19', '定期任务', '已打分', 99, '关于推进问题导向工作的相关建议.doc', '机关党支部', '常城'),
(54, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '通信室党支部', NULL),
(55, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '通信运行室党支部', NULL),
(56, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', '2017-04-20', '定期任务', '已打分', 100, '张恒视频脚本.docx', '自动化数据室党支部', '张恒'),
(57, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '雷达室党支部', NULL),
(58, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '导航室党支部', NULL),
(59, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '航路导航室党支部', NULL),
(60, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '供电室党支部', NULL),
(61, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '维修室党支部', NULL),
(62, '111', '常城', '关于推进问题导向工作的相关建议.doc', '阿发', '2017-09-30', NULL, '定期任务', '已发布', 0, NULL, '现场车队党支部', NULL),
(63, '111', '111', '111', '111', '2017-04-26', NULL, '111', '111', 0, NULL, '111', NULL),
(64, '213143', '常城', '张恒视频脚本.docx', 'weqr324', '2017-12-31', NULL, '亮点工作', '已打分', 99, NULL, '机关党支部', '常城'),
(65, '阿斯顿发顺丰的', '张恒', '张恒视频脚本.docx', '撒旦飞洒地方', '2017-12-31', NULL, '亮点工作', '已打分', 91, NULL, '自动化数据室党支部', '张恒'),
(66, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', '2017-04-27', '定期任务', '已打分', 99, '党建考核方案.rar', '机关党支部', '张恒'),
(67, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '通信室党支部', NULL),
(68, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '通信运行室党支部', NULL),
(69, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '自动化数据室党支部', NULL),
(70, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '雷达室党支部', NULL),
(71, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '导航室党支部', NULL),
(72, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '航路导航室党支部', NULL),
(73, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '供电室党支部', NULL),
(74, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '维修室党支部', NULL),
(75, '11111', '张恒', '党办任务分解表（3.28）.doc', '2132143253', '2017-12-31', NULL, '定期任务', '已发布', 0, NULL, '现场车队党支部', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL COMMENT '序号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `branch` varchar(20) NOT NULL COMMENT '支部名称',
  `request` int(11) DEFAULT NULL COMMENT '应缴',
  `paid` int(11) NOT NULL DEFAULT '0' COMMENT '实缴',
  `pay_year` varchar(20) NOT NULL COMMENT '缴费周期',
  `pay_month` varchar(20) NOT NULL COMMENT '缴费周期月',
  `remark` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `payment`
--

INSERT INTO `payment` (`id`, `name`, `branch`, `request`, `paid`, `pay_year`, `pay_month`, `remark`) VALUES
(1, '王忠义', '机关党支部', 100, 100, '2017', '2', NULL),
(3, '胡兴宇', '机关党支部', 100, 100, '2017', '2', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `person`
--

CREATE TABLE `person` (
  `id` int(10) NOT NULL COMMENT '序列号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `applicationTime` date DEFAULT NULL COMMENT '申请入党时间',
  `activistTime` date DEFAULT NULL COMMENT '积极分子时间',
  `developmentTime` date DEFAULT NULL COMMENT '发展对象时间',
  `remark` text COMMENT '备注',
  `gen` varchar(10) NOT NULL COMMENT '性别',
  `native` varchar(30) NOT NULL COMMENT '籍贯',
  `birth` date NOT NULL COMMENT '出生年月',
  `household` varchar(30) NOT NULL COMMENT '户口所在',
  `type` varchar(10) NOT NULL COMMENT '政治面貌',
  `workTime` date NOT NULL COMMENT '入职时间',
  `sector` varchar(40) NOT NULL COMMENT '部门岗位',
  `position` varchar(40) NOT NULL COMMENT '职务',
  `techTitle` varchar(20) NOT NULL COMMENT '职称',
  `eduBackground` varchar(20) NOT NULL COMMENT '学历',
  `school` varchar(50) NOT NULL COMMENT '毕业院校',
  `major` varchar(50) NOT NULL COMMENT '专业',
  `graduationTime` date NOT NULL COMMENT '毕业时间',
  `idCard` varchar(30) NOT NULL COMMENT '身份证号',
  `cell` varchar(20) DEFAULT NULL COMMENT '手机',
  `branch` varchar(20) NOT NULL COMMENT '所在党支部',
  `trainner` varchar(10) DEFAULT NULL COMMENT '培养人',
  `introducer` varchar(10) DEFAULT NULL COMMENT '入党介绍人',
  `agreeTime` date DEFAULT NULL COMMENT '支部大会通过时间',
  `probationaryTime` date DEFAULT NULL COMMENT '预备日期',
  `preregularTime` date DEFAULT NULL COMMENT '预备转正日期',
  `regularTime` date DEFAULT NULL COMMENT '转正日期',
  `authorityCode` int(10) NOT NULL DEFAULT '99' COMMENT '权限码',
  `password` varchar(20) NOT NULL DEFAULT '123456' COMMENT '密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `person`
--

INSERT INTO `person` (`id`, `name`, `applicationTime`, `activistTime`, `developmentTime`, `remark`, `gen`, `native`, `birth`, `household`, `type`, `workTime`, `sector`, `position`, `techTitle`, `eduBackground`, `school`, `major`, `graduationTime`, `idCard`, `cell`, `branch`, `trainner`, `introducer`, `agreeTime`, `probationaryTime`, `preregularTime`, `regularTime`, `authorityCode`, `password`) VALUES
(1, '张恒', '2016-03-01', '2017-03-01', '2017-03-01', NULL, '男', '陕西蒲城', '1986-05-03', '陕西西安', '积极分子', '2012-08-01', '机务员', '班组长', '工程师', '硕士', '西安电子科技大学', '信号与信息处理', '2012-03-01', '61010319860503045X', '18192232653', '自动化数据室党支部', '蒋晓霜', NULL, NULL, NULL, NULL, NULL, 0, '123456'),
(2, '蒋晓霜', '2004-10-10', '2004-10-15', '2007-03-01', '', '女', '湖南衡阳 ', '1986-11-18', '陕西西安', '党员', '2008-07-15', '机务员', '机务员', '工程师', '本科', '民航大', '通信工程', '2008-07-01', '430405198611183521 ', '133254532434', '自动化数据室党支部', '邢争鸣 宋思浓', '邢争鸣 宋思浓', '2008-03-26', '2008-04-22', '2009-03-26', '2009-03-26', 99, '123456'),
(3, '张浩楠', '2017-03-14', '2017-03-06', '2017-03-02', '2143245', '男', '陕西', '2017-03-02', '陕西西安', '积极分子', '2017-03-15', '机务员', '机务员', '工程师', '本科', '西安电子科技大学', '电子信息工程', '2017-03-20', '610103198605031234', '13999999999', '自动化数据室党支部', '付宝', '付宝', '2017-03-21', '2017-03-16', '2017-03-17', '2017-03-23', 99, '123456'),
(16, '王忠义', '1989-07-01', '1989-07-01', '1990-12-28', '', '男', '山东单县', '1960-01-26', '山东单县', '党员', '1978-12-13', '技保中心主任兼副书记 ', '处级', '高级工程师', '本科', '民航党校', '管理学', '1982-07-01', '610104196001265716', '13891828118', '机关党支部', '陈树荣', '陈树荣', '1991-12-28', '1992-02-15', '1993-01-06', '1992-12-28', 99, '123456'),
(17, '胡兴宇', '2004-05-01', '2004-05-25', '2005-05-01', '', '男', '陕西西安 ', '1971-01-13', '陕西西安 ', '党员', '1993-07-09', '技保中心党委副书记', '处级', '高级工程师', '本科', '西安邮电学院', '通信', '1993-07-01', '610104197101137310 ', '15339226669', '机关党支部', '', '', '2006-05-01', '2007-01-09', '2008-01-04', '2007-11-19', 99, '123456'),
(14, '张楠一雄', '2015-07-01', '2015-07-01', '2015-07-01', '第三方', '男', '白水', '1992-01-05', '西安', '申请入党', '2015-08-01', '机务员', '机务员', '助理工程师', '本科', '邮电', '通信', '2015-07-01', '610101199201051111', '12345678900', '自动化数据室党支部', '', '', '2015-07-01', '2015-07-01', '2015-07-01', '2015-07-01', 99, '123456'),
(18, '牟小光', '1998-10-01', '2000-11-01', '2001-11-01', '', '男', '新疆塔城 ', '1974-08-05', '陕西西安', '党员', '1997-07-16', '技保中心副主任', '处级', '高级工程师', '本科', '民航大学', '通信', '1997-07-01', '610103197408052411 ', '13572148145', '机关党支部', '俞国平', '尹亚宁', '2002-12-19', '2003-01-27', '2003-12-29', '2002-12-22', 99, '123456'),
(19, '文奇', '2007-01-01', '2007-01-01', '2008-01-01', '', '男', '陕西咸阳 ', '1976-05-07', '陕西西安', '党员', '1999-07-19', '技保中心副主任', '副处级', '高级工程师', '博士', '民航大学', '通信', '1999-07-01', '610113197605072115 ', '13032925508', '机关党支部', '王用辰 柴昱', '李明社 张湘义', '2012-04-01', '2010-04-01', '2012-04-01', '2011-04-01', 99, '123456'),
(20, '陈勇', '1990-06-13', '1990-07-13', '1991-07-13', '', '男', '江苏南通 ', '1972-02-01', '陕西西安', '党员', '1999-09-16', '技保中心综合办公室三级助理', '科级', '高级工程师', '本科', '中国民航大学', '通信', '1999-07-01', '610104197201315719 ', '18392166677', '机关党支部', '张登峰', '张登峰', '1992-06-13', '1992-09-03', '1993-07-08', '1993-07-03', 99, '123456'),
(21, '孙莹涛', '2000-11-18', '2000-11-19', '2001-11-18', '', '男', '陕西西安', '1982-01-20', '陕西西安', '党员', '2007-08-01', '技保中心技术室', '处级', '助理工程师', '博士', '中国民航大学', '通信', '1999-07-01', '610121198201202598 ', '13991331584', '机关党支部', '揭曙光', '揭曙光', '2002-06-28', '2002-09-24', '2003-07-04', '2003-06-20', 99, '123456'),
(22, '马宏', '1992-12-10', '1992-12-12', '2002-12-01', '', '男', '陕西西安', '1968-01-20', '陕西西安', '党员', '1989-08-16', '技保中心安全管理室', '科级', '高级工程师', '大专', '中国民航大学', '通信', '1990-07-01', '61010219680112031X ', '13891966533', '机关党支部', '李小兵', '李小兵', '2003-12-23', '2003-12-23', '2004-12-31', '2004-12-27', 99, '123456'),
(23, '刘佳媛', '2008-12-01', '2008-12-10', '2008-12-10', '', '女', '江苏无锡', '1972-05-18', '陕西西安 ', '党员', '1992-11-02', '技保中心通信室副主任', '副科级', '工程师', '大专', '民航大', '通信', '1992-07-02', '61010219720518272X', '13152070943', '通信室党支部', '', '', '2009-12-01', '2010-12-01', '2011-12-01', '2011-12-01', 99, '123456'),
(24, '吴烨晖', '2003-11-25', '2003-11-26', '2004-06-17', '', '男', '河南临颍', '1984-08-05', '陕西西安 ', '党员', '2007-08-01', '技保中心通信运行室主任', '科级', '工程师', '本科', '西安邮电学院', '电子与信息工程', '2007-07-01', '610104198408058339 ', '18161826652', '通信运行室党支部', '汪超 沈丹', '汪超 沈丹', '2005-06-17', '2005-12-20', '2006-06-28', '2006-06-22', 99, '123456'),
(25, '乔卫', '2007-05-22', '2007-05-22', '2007-05-22', '', '男', '陕西西安', '1980-12-14', '陕西西安', '党员', '2008-08-01', '技保中心自动化数据室 副主任', '副科级', '工程师', '本科', '民航大学', '通信', '2008-07-01', '610103198012143637 ', '18509233933', '自动化数据室党支部', '刘伟', '淡科锋', '2007-05-24', '2007-07-07', '2008-07-07', '2008-06-26', 99, '123456'),
(26, '李中新', '1997-11-10', '1997-11-15', '2004-12-27', '', '男', '河南孟县', '1972-10-13', '陕西西安', '党员', '1992-07-16', '技保中心雷达室主任', '处级', '高级工程师', '研究生', '民航大学', '通信', '1992-07-01', '61010419721013571X', '13991326537', '雷达室党支部', '杨天信 刘霆', '杨天信 刘霆', '2004-12-27', '2004-12-31', '2006-01-23', '2005-12-19', 99, '123456'),
(27, '高桂芳', '1997-11-20', '1998-11-20', '2004-11-09', '', '女', '陕西澄城', '1971-07-20', '陕西西安', '党员', '1992-08-01', '技保中心导航室主任', '科级', '工程师', '大专', '民航大学', '雷达', '1992-07-01', '610104197107205724', '13609169462', '导航室党支部', '刘彦弘', '刘彦弘', '2005-12-19', '2006-01-23', '2006-12-18', '2006-12-11', 99, '123456'),
(28, '华林', '1998-01-03', '1999-01-03', '2003-11-01', '', '男', '陕西西安', '1972-10-07', '陕西西安', '党员', '1992-08-16', '技保中心航路导航室主任', '科级', '工程师', '本科', '民航大学', '导航', '1992-07-01', '610104197210077310 ', '13609128910', '航路导航室党支部', '吴胜前', '吴胜前', '2004-12-27', '2004-12-31', '2006-01-23', '2006-01-12', 99, '123456'),
(29, '张翼起', '1997-07-05', '1997-07-10', '1997-07-15', '', '男', '陕西大荔', '1963-09-27', '陕西西安', '党员', '1986-07-16', '技保中心航路导航室党支部书记', '科级', '高级工程师', '本科', '民航大学', '导航', '1986-07-01', '610104196309275734', '13659190009', '航路导航室党支部', '刘明霞', '刘明霞', '1997-07-22', '1997-10-15', '1998-09-21', '1998-07-23', 99, '123456'),
(30, '黄光明', '1997-04-20', '1998-04-20', '2003-12-19', '', '男', '陕西柞水', '1972-10-06', '陕西西安', '党员', '1994-07-16', '技保中心航路导航室', '科级', '工程师', '本科', '民航大学', '导航', '1994-07-01', '62010219721006587X', '15891390838', '航路导航室党支部', '张伟', '张伟', '2004-12-27', '2003-12-19', '2004-12-31', '2004-12-27', 99, '123456'),
(31, '周林', '1986-03-15', '1986-03-16', '1987-03-15', '', '男', '云南昆明', '1959-02-08', '陕西西安', '党员', '1978-03-02', '技保中心供电室主任', '科级', '助理工程师', '大专', '民航大学', '电力', '1977-07-02', '610104195902085718', '13991938980', '供电室党支部', '范吉', '范吉', '1988-06-06', '1988-06-30', '1989-06-27', '1989-06-17', 99, '123456'),
(32, '吴胜前', '1998-11-20', '1998-11-22', '1998-11-25', '', '男', '陕西富平', '1971-08-07', '陕西西安', '党员', '1990-06-05', '技保中心维修室主任', '科级', '工程师', '本科', '民航大学', '电子与信息工程', '1990-05-30', '610104197108075730', '13193309328', '维修室党支部', '杨雅娟', '杨雅娟', '1998-12-18', '1999-01-13', '1999-12-30', '1999-12-18', 99, '123456'),
(33, '范小卫', '1987-01-01', '1987-01-10', '1987-01-15', '', '男', '四川温江', '1966-05-26', '陕西西安', '党员', '1989-10-16', '技保中心现场车队党支部副书记', '副科级', '无', '大专', '民航', '民航', '1983-07-01', '610104196705261617', '15991686565', '现场车队党支部', '马自新', '马自新', '1987-03-10', '1987-03-10', '1988-06-03', '1988-03-09', 99, '123456'),
(34, '叶庆康', '1998-02-06', '1999-01-01', '2004-11-10', '', '男', '浙江青田 ', '1964-04-30', '陕西西安', '党员', '1987-07-01', '技保中心通信室党支部书记', '科级', '工程师', '本科', '民航大学', '导航', '1987-07-01', '610104196404305719', '13484916409', '通信室党支部', '袁安秀', '袁安秀', '2005-12-19', '2006-01-23', '2006-12-18', '2006-12-11', 99, '123456'),
(35, '王联军', '1995-09-05', '1995-09-10', '1995-09-30', '', '男', '陕西泾阳 ', '1973-01-03', '陕西西安', '党员', '2004-11-19', '技保中心综合办公室三级助理', '三级助理', '无', '本科', '民航大学', '通信', '1991-07-01', '542623197301030518', '13759930807', '机关党支部', '李魏', '李魏', '1997-08-26', '1996-06-21', '1997-08-26', '1997-06-20', 99, '123456'),
(36, '于跃', '2005-11-22', '2005-12-22', '2006-10-18', '', '女', '吉林通化', '1986-10-24', '陕西西安', '党员', '2009-11-01', '技保中心综合办公室四级助理', '四级助理', '无', '本科', '民航大学', '通信', '2009-07-01', '61010419861024344X', '13991986193', '机关党支部', '安灵恒', '安灵恒', '2007-10-19', '2006-10-18', '2007-10-19', '2007-10-18', 99, '123456'),
(37, '常城', '2008-05-12', '2008-09-23', '2009-09-23', '', '男', '河南淮阳', '1987-05-06', '陕西西安', '党员', '2010-12-31', '技保中心综合办公室五级助理', '五级助理', '无', '本科', '西安电子科技大学', '测控技术与仪器', '2010-07-01', '610104198705065711 ', '15129003896', '机关党支部', '王思', '王思', '2010-09-23', '2009-09-23', '2010-09-23', '2010-09-23', 1, '123456'),
(38, '胡今晶', '2007-03-22', '2008-03-22', '2008-03-25', '', '女', '陕西西安', '1988-07-18', '陕西西安', '党员', '2010-08-02', '技保中心技术室四级助理', '四级助理', '工程师', '本科', '西安邮电学院', '通信与信息工程', '2010-07-01', '610104198807185124', '15991603243', '机关党支部', '熊伟', '熊伟', '2009-06-09', '2009-07-06', '2010-07-01', '2010-06-30', 99, '123456'),
(39, '刘彦弘', '1997-10-01', '1997-11-01', '1997-11-15', '', '女', '河北故城', '1968-12-13', '陕西西安', '党员', '1991-07-16', '技保中心技术室', '科级', '高级工程师', '本科', '民航大学', '导航', '1991-07-01', '610104196812135739 ', '13720758710', '机关党支部', '', '', '1997-11-15', '1998-11-15', '1999-11-15', '1999-11-15', 99, '123456'),
(40, '尚德佳', '2005-11-01', '2009-11-11', '2010-12-01', '', '男', '山西平遥 ', '1983-09-25', '陕西西安', '党员', '2005-08-01', '技保中心副主任', '副处级', '高级工程师', '研究生', '哈尔滨工业大学', '电子与信息工程', '2005-07-01', '610111198309252033 ', '13891925687', '机关党支部', '拜俊鹏', '王颖利', '2012-04-10', '2012-05-29', '2013-05-30', '2013-05-29', 99, '123456'),
(41, '段广涛', '1998-11-29', '1998-11-30', '1998-12-01', '', '男', '陕西户县', '1974-03-06', '陕西西安', '党员', '1995-08-16', '技保中心维修室副主任', '副科级', '工程师', '本科', '民航大学', '电子与信息工程', '1995-07-01', '610104197403065711', '13669266139', '维修室党支部', '于志海', '于志海', '1999-11-29', '1999-12-29', '2001-01-12', '2000-11-29', 99, '123456'),
(42, '胡栋楠', '2005-09-20', '2005-09-21', '2005-09-25', '', '男', '河南固始', '1988-01-30', '陕西西安', '党员', '2012-08-01', '技保中心通信运行室机务员', '机务员', '工程师', '研究生', '西北工业大学', '电子与信息工程', '2012-07-01', '342426198801304437', '13468676116', '通信运行室党支部', '彭亮', '廖书梓', '2005-05-24', '2007-06-05', '2008-06-15', '2008-05-25', 99, '123456'),
(43, '李牧', '2007-10-13', '2008-05-10', '2009-05-13', '', '男', '陕西渭南', '1989-04-08', '陕西西安', '党员', '2011-08-16', '技保中心雷达室副组长', '机务员', '工程师', '研究生', '民航大学', '雷达', '2011-07-01', '610525198904080037', '10000000000', '雷达室党支部', '江泽宁', '王磊', '2010-05-19', '2009-06-26', '2010-05-19', '2010-05-13', 99, '123456'),
(44, '杜建国', '1995-01-11', '2000-12-20', '2002-12-26', '', '男', '河南偃师', '1968-07-23', '陕西西安', '党员', '1985-12-15', '技保中心供电室副主任', '副科级', '助理工程师', '大专', '民航大学', '电力', '1985-07-01', '610104196807235719', '13992829297', '供电室党支部', '周建设', '张威', '2003-12-26', '2002-12-26', '2003-12-26', '2003-12-26', 99, '123456'),
(45, '谢亚军', '2008-12-01', '2008-12-13', '2011-03-05', '', '男', '陕西户县', '1977-12-21', '陕西西安', '党员', '2000-07-17', '副主任', '副科级', '工程师', '本科', '民航大学', '电力', '2000-07-01', '610125197712210814', '13992896245', '供电室党支部', '杜建国', '杜建国', '2011-12-15', '2012-06-08', '2013-06-08', '2013-06-08', 99, '123456'),
(46, '原高斌', '1997-08-16', '1997-08-17', '2005-11-22', '', '男', '陕西西安', '1973-10-15', '陕西西安', '党员', '1992-08-16', '技保中心供电室副主任', '副科级', '无', '大专', '民航大学', '电力', '1992-07-01', '610103197310150814 ', '13571898959', '供电室党支部', '周林', '周林', '2006-11-21', '2006-12-18', '2008-01-07', '2007-12-04', 99, '123456'),
(47, '王琰琳', '2011-01-05', '2011-01-09', '2012-01-09', '', '女', '浙江宁波', '1973-10-11', '陕西西安', '党员', '1992-08-16', '技保中心供电室副主任', '副科级', '助理工程师', '本科', '民航大学', '电力', '1992-07-01', '610111197310112826', '13991930255', '供电室党支部', '原高斌', '原高斌', '2012-02-09', '2013-04-28', '2014-04-28', '2014-04-28', 99, '123456'),
(48, '屈文月', '2007-11-03', '2007-11-05', '2008-11-05', '', '女', '陕西洛川', '1989-06-13', '陕西西安', '党员', '2014-08-01', '技保中心通信室', '机务员', '助理工程师', '研究生', '西安电子科技大学', '电子与信息工程', '2014-07-01', '610629198906130043', '15877392156', '通信运行室党支部', '李秀玥', '王美', '2009-11-20', '2009-12-15', '2010-12-15', '2010-11-20', 99, '123456'),
(49, '雷倩', '2008-09-26', '2008-09-27', '2009-04-04', '', '女', '陕西延川', '1990-12-08', '陕西西安', '党员', '2015-08-03', '技保中心通信运行室', '机务员', '助理工程师', '研究生', '西安邮电大学', '信号与信息处理', '2015-07-01', '610602199012080328', '15102963813', '通信运行室党支部', '刘凯元', '刘凯元', '2009-05-25', '2009-06-15', '2010-06-22', '2010-06-13', 99, '123456'),
(50, '张博', '2009-11-05', '2009-10-05', '2009-10-10', '', '男', '河北省元氏县', '1991-04-14', '陕西西安', '党员', '2013-08-01', '技保中心通信运行室', '机务员', '助理工程师', '本科', '西安明德学院', '通信', '2013-07-01', '610103199104143639', '13571902984', '通信运行室党支部', '李丹阳', '李丹阳', '2011-11-30', '2012-01-10', '2012-12-06', '2012-11-30', 99, '123456'),
(51, '刘思齐', '2009-01-02', '2009-05-10', '2009-05-16', '', '女', '陕西富平', '1992-10-01', '陕西西安', '党员', '2014-08-01', '技保中心通信运行室', '机务员', '助理工程师', '本科', '中国民航大学', '通信与信息工程', '2014-07-01', '610528199210017547 ', '15249213849', '通信运行室党支部', '张峰 杨静', '胡润 李飞', '2010-05-28', '2010-05-28', '2011-08-31', '2011-07-06', 99, '123456'),
(52, '钟聃', '2009-12-01', '2010-01-01', '2010-01-04', '', '男', '陕西省子洲县', '1987-09-04', '陕西西安', '党员', '2013-08-01', '技保中心通信室', '机务员', '工程师', '研究生', '西安电子科技大学', '电子与信息工程', '2013-07-01', '61273219870904001X', '13319272738', '通信室党支部', '周飞', '周飞', '2010-12-23', '2010-01-04', '2010-12-23', '2010-12-20', 99, '123456'),
(53, '景豆豆', '2007-10-21', '2010-05-05', '2011-06-14', '', '女', '陕西西安', '1988-10-30', '陕西西安', '党员', '2011-08-16', '技保中心通信运行室', '机务员', '工程师', '本科', '西安邮电学院', '信息安全', '2011-07-01', '610104198810305721', '18066633630', '通信运行室党支部', '隋容', '李琪', '2010-05-05', '2011-06-14', '2012-06-14', '2012-06-14', 99, '123456');

-- --------------------------------------------------------

--
-- 表的结构 `plans`
--

CREATE TABLE `plans` (
  `ID` int(40) NOT NULL COMMENT '序号',
  `branch` varchar(20) NOT NULL COMMENT '支部',
  `year` int(10) NOT NULL COMMENT '年份',
  `month` int(10) DEFAULT NULL COMMENT '月',
  `season` int(10) DEFAULT NULL COMMENT '季度',
  `fileName` varchar(100) NOT NULL COMMENT '文件名称',
  `type` varchar(100) NOT NULL COMMENT '计划类型'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `plans`
--

INSERT INTO `plans` (`ID`, `branch`, `year`, `month`, `season`, `fileName`, `type`) VALUES
(8, '机关党支部', 2018, NULL, NULL, '关于推进问题导向工作的相关建议.doc', '年初计划'),
(21, '机关党支部', 2017, NULL, NULL, '党办任务分解表（3.28）.doc', '年初计划'),
(14, '机关党支部', 2017, 5, NULL, '党建考核方案0309V2.rar', '月底总结'),
(15, '机关党支部', 2017, 6, NULL, '中国.rar', '月底总结'),
(16, '机关党支部', 2017, 7, NULL, '党建考核方案0309V2.rar', '月底总结'),
(17, '机关党支部', 2017, 8, NULL, '党建考核方案.rar', '月底总结'),
(18, '机关党支部', 2017, 9, NULL, '中国.rar', '月底总结'),
(19, '机关党支部', 2017, 10, NULL, '中国.rar', '月底总结'),
(20, '机关党支部', 2017, 11, NULL, '党建考核方案0309V2.pptx', '月底总结');

-- --------------------------------------------------------

--
-- 表的结构 `program`
--

CREATE TABLE `program` (
  `ID` int(10) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `program`
--

INSERT INTO `program` (`ID`, `branch`, `name`, `type`) VALUES
(1, '机关党支部', '沙发垫大商股份', '项目'),
(2, '机关党支部', '大撒飞洒发', '项目'),
(3, '机关党支部', '34124', '荣誉'),
(4, '机关党支部', '143245234', '荣誉');

-- --------------------------------------------------------

--
-- 表的结构 `rushmission`
--

CREATE TABLE `rushmission` (
  `id` int(11) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `title` varchar(40) NOT NULL,
  `annix` text,
  `details` text NOT NULL,
  `max` int(100) NOT NULL,
  `min` int(100) NOT NULL,
  `timeLimit` date NOT NULL,
  `num` int(10) NOT NULL,
  `leftnum` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shiningmission`
--

CREATE TABLE `shiningmission` (
  `id` int(11) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `title` varchar(40) NOT NULL,
  `annix` text,
  `details` text NOT NULL,
  `branch` varchar(40) NOT NULL,
  `timeLimit` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shiningmission`
--

INSERT INTO `shiningmission` (`id`, `publisher`, `title`, `annix`, `details`, `branch`, `timeLimit`) VALUES
(4, '常城', '213143', '张恒视频脚本.docx', 'weqr324', '机关党支部', '2017-12-31'),
(5, '张恒', '阿斯顿发顺丰的', '张恒视频脚本.docx', '撒旦飞洒地方', '自动化数据室党支部', '2017-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignmission`
--
ALTER TABLE `assignmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedmission`
--
ALTER TABLE `fixedmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missionlog`
--
ALTER TABLE `missionlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`ID`,`branch`,`year`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rushmission`
--
ALTER TABLE `rushmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiningmission`
--
ALTER TABLE `shiningmission`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `assignmission`
--
ALTER TABLE `assignmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `fixedmission`
--
ALTER TABLE `fixedmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `missionlog`
--
ALTER TABLE `missionlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- 使用表AUTO_INCREMENT `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '序列号', AUTO_INCREMENT=54;
--
-- 使用表AUTO_INCREMENT `plans`
--
ALTER TABLE `plans`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT COMMENT '序号', AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `program`
--
ALTER TABLE `program`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `rushmission`
--
ALTER TABLE `rushmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `shiningmission`
--
ALTER TABLE `shiningmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
