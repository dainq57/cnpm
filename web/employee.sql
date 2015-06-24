-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2014 at 05:59 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pword` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `level` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `username`, `pword`, `email`, `level`) VALUES
(1, 'No Name', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@gmail.com', '1'),
(4, 'Ngô Quang Đại', '12020073', '8399f5a4267046cfdbf9c75822b2b1d8e61acc34', 'dainq_57@gmail.com', '2'),
(5, 'Ngô Đức Dương', '12020069', 'ae9d27e7a0294f99f30b668cd1dce746035ed07d', 'duongnd_57@gmail.com', '2'),
(7, 'Lê Văn Đại', '12020491', '1f5a4ed7604dd4c6e795b267b34c70318fe55d72', 'dainlv_57@gmail.com', '2'),
(8, 'Lê Xuân Mạnh', '13020761', '686121cf8b787f28fb9174b41634b24a3d05642b', 'manhlx_57@gmail.com', '2'),
(9, 'Lương Quốc Việt', '12020440', 'a74f80204b89c0d264eb5fbce9b52cdc2d9c7d36', 'vietlq_57@gmail.com', '2'),
(11, 'Nguyễn Thị Dung', '12020054', '8444c062da77237866258ec76c996e9a05b67432', 'dungnt_57@gmail.com', '2'),
(12, 'Ngô Anh Long', '12020535', 'cfd6f37769b0dbaa6b6952de88f21eb5a641f154', 'longna_57@gmail.com', '2'),
(13, 'Hoàng Dương', '12020068', 'ec31da15963eb7b83b92e8c16e00e10347db2f8c', 'duongh_57@gmail.com', '2'),
(14, 'Từ Công Tuấn Anh', '12020254', '3c8bd27a15129d38a47d5eb7030a1119e2f24547', 'anhttc_57@gmail.com', '2'),
(15, 'Ngô Đức Hải', '12020121', '7dc965f11167463e7af9a769def3450ffd63f87c', 'haind_57@gmail.com', '2'),
(16, 'Nguyễn Bá Kỳ', '12020211', '2aac468a96f3b134ca0b3175911cb4e2237d30c7', 'kynb_57@gmail.com', '2'),
(18, 'Nguyễn Công Nam', '12020256', 'ae1e11fbaeef7a053e6dc5af43b3acd151105ebf', 'namnc_57@gmail.com', '2'),
(19, 'Nguyễn Mạnh Quân', '12020255', '3459c6482b983c06c9f89a70944e54b4aa1bd5fd', 'quannm_57@gmail.com', '2'),
(22, 'Nguyễn Hải Đăng', '12020086', 'a2cc350372084ceb7c77e88830fcd4f5273c01ed', 'dangnh_57@gmail.com', '2'),
(23, 'Nguyễn Hữu Trường', '12020123', '127227c2d690b785ceca7a1f09393482a6865854', 'truongnh_57@gmail.com', '2'),
(24, 'Nguyễn Thị Hoa', '12020037', '431029e3236423027ae1a594396f07dd0b9beb41', 'hoant_57@gmail.com', '2'),
(25, 'Trần Thị Hường', '12020056', '0cf8c3223d08afe9bfd734b2bcfa0c41f08d9f5b', 'huongtt_57@gmail.com', '2'),
(26, 'Hoàng Đức Tài', '12020345', 'd8579deb940891b787fe3dffcb83c55f1937040d', 'taihd_57@gmail.com', '2'),
(27, 'Vũ Văn Chiến', '12020567', 'b9e33ba14b8f3b5e823a1830847bc3017ea4c907', 'chienvv_57@gmail.com', '2'),
(28, 'Vũ Việt Anh', '12020023', 'fe6185d30e4e1d1a6de7fa5f4466af9fb6268c21', 'anhvv+57@gmail.com', '2'),
(29, 'Lê Khánh Chi', '12020013', 'd02033d1d070da8ba27c9ce3a1b0d89e0b7daa7b', 'chilk_57@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cocauluong`
--

CREATE TABLE IF NOT EXISTS `cocauluong` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `luongcb` int(255) unsigned NOT NULL,
  `phucap` int(255) unsigned NOT NULL,
  `cquydinh` int(50) unsigned NOT NULL,
  `cthucte` int(50) unsigned NOT NULL,
  `nghi` int(10) NOT NULL,
  `baohiem` int(50) NOT NULL,
  `luongtt` int(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cocauluong`
--

INSERT INTO `cocauluong` (`pid`, `username`, `name`, `luongcb`, `phucap`, `cquydinh`, `cthucte`, `nghi`, `baohiem`, `luongtt`) VALUES
(3, '12020073', 'Ngô Quang Đại', 1000, 100, 27, 25, 2, 20, 1103),
(4, '12020069', 'Ngô Đức Dương', 2000, 100, 27, 24, 3, 40, 2119),
(6, '12020491', 'Lê Văn Đại', 0, 0, 0, 0, 0, 0, 0),
(7, '13020761', 'Lê Xuân Mạnh', 0, 0, 0, 0, 0, 0, 0),
(8, '12020440', 'Lương Quốc Việt', 0, 0, 0, 0, 0, 0, 0),
(10, '12020054', 'Nguyễn Thị Dung', 0, 0, 0, 0, 0, 0, 0),
(11, '12020535', 'Ngô Anh Long', 0, 0, 0, 0, 0, 0, 0),
(12, '12020068', 'Hoàng Dương', 0, 0, 0, 0, 0, 0, 0),
(13, '12020254', 'Từ Công Tuấn Anh', 0, 0, 0, 0, 0, 0, 0),
(14, '12020121', 'Ngô Đức Hải', 0, 0, 0, 0, 0, 0, 0),
(15, '12020211', 'Nguyễn Bá Kỳ', 0, 0, 0, 0, 0, 0, 0),
(17, '12020256', 'Nguyễn Công Nam', 0, 0, 0, 0, 0, 0, 0),
(18, '12020255', 'Nguyễn Mạnh Quân', 0, 0, 0, 0, 0, 0, 0),
(21, '12020086', 'Nguyễn Hải Đăng', 0, 0, 0, 0, 0, 0, 0),
(22, '12020123', 'Nguyễn Hữu Trường', 0, 0, 0, 0, 0, 0, 0),
(23, '12020037', 'Nguyễn Thị Hoa', 0, 0, 0, 0, 0, 0, 0),
(24, '12020056', 'Trần Thị Hường', 0, 0, 0, 0, 0, 0, 0),
(25, '12020345', 'Hoàng Đức Tài', 0, 0, 0, 0, 0, 0, 0),
(26, '12020567', 'Vũ Văn Chiến', 0, 0, 0, 0, 0, 0, 0),
(27, '12020023', 'Vũ Việt Anh', 0, 0, 0, 0, 0, 0, 0),
(28, '12020013', 'Lê Khánh Chi', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `connect`
--

CREATE TABLE IF NOT EXISTS `connect` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `name_c` varchar(100) NOT NULL,
  `username_c` varchar(100) NOT NULL,
  `Information` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `connect`
--

INSERT INTO `connect` (`id`, `Title`, `name_c`, `username_c`, `Information`) VALUES
(4, 'Tăng lương', 'Ngô Đức Dương', '12020069', 'Xếp không tăng lương là em nghỉ việc đấy !'),
(5, 'Tăng lương', 'Ngô Quang Đại', '12020073', 'Đề nghị tăng lương');

-- --------------------------------------------------------

--
-- Table structure for table `end_account`
--

CREATE TABLE IF NOT EXISTS `end_account` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `end_account`
--

INSERT INTO `end_account` (`id`, `name`, `username`, `pword`, `email`, `level`) VALUES
(2, 'Ngô Quang Đại', '12020073', '8399f5a4267046cfdbf9c75822b2b1d8e61acc34', 'dainq_57@gmail.com', '2'),
(3, 'Nguyễn Mạnh Quân', '12020254', '3c8bd27a15129d38a47d5eb7030a1119e2f24547', 'quannm_57@gmail.com', '2'),
(6, 'Lê Văn Chiến', '12020025', 'a730824980cd11208f72b0969628ee3869c5f055', 'chienlv_57@gmail.com', '2'),
(10, 'Mai Văn Dương', '12020448', '999623c0a77f4f8b6e79614b9ae673fdef06f9d4', 'duongmv_57@gmail.com', '2'),
(17, 'Nguyễn Cao Long', '11020199', 'a03af557b67fa4d7af70976cdf22d0f173389a4b', 'longnc_57@gmail.com', '2'),
(20, 'Nguyễn Doãn Duy', '11020054', '995448cf40708c03f9178705d538256456cc77ab', 'đuyn_57@gmail.com', '2'),
(21, 'Nguyễn Duy Kiên', '11020023', 'b9ccd3f5920b0bafb95d694f231236395391f283', 'kiennd_57@gmail.com', '2'),
(30, 'Ngô Văn Đại', '12020074', '666637645817cb3cb44374a16a07ae333d989ac5', 'dainq57@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `khenthuong`
--

CREATE TABLE IF NOT EXISTS `khenthuong` (
  `thuong_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `thuong` int(200) NOT NULL,
  `lydo` text NOT NULL,
  PRIMARY KEY (`thuong_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `khenthuong`
--

INSERT INTO `khenthuong` (`thuong_id`, `username`, `thuong`, `lydo`) VALUES
(1, '12020073', 1000000, 'Ngoan'),
(2, '12020069', 1000000, 'Đi làm đầy đủ');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `HocVi` varchar(50) NOT NULL,
  `htDaoTao` varchar(50) NOT NULL,
  `ChuyenNganh` varchar(50) NOT NULL,
  `QuocTich` varchar(50) NOT NULL,
  `DanToc` varchar(50) NOT NULL,
  `TonGiao` varchar(50) NOT NULL,
  `SoCMT` varchar(50) NOT NULL,
  `NoiCapCMT` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `SoTruong` varchar(50) NOT NULL,
  `Tinh1` varchar(50) NOT NULL,
  `Huyen1` varchar(50) NOT NULL,
  `Xa1` varchar(50) NOT NULL,
  `SoNha1` varchar(50) NOT NULL,
  `Tinh2` varchar(50) NOT NULL,
  `Huyen2` varchar(50) NOT NULL,
  `Xa2` varchar(50) NOT NULL,
  `SoNha2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `username`, `year`, `avatar`, `HocVi`, `htDaoTao`, `ChuyenNganh`, `QuocTich`, `DanToc`, `TonGiao`, `SoCMT`, `NoiCapCMT`, `Phone`, `SoTruong`, `Tinh1`, `Huyen1`, `Xa1`, `SoNha1`, `Tinh2`, `Huyen2`, `Xa2`, `SoNha2`) VALUES
(2, '12020073', '03/10/1993', '../avatar/1459912_539176489523960_796159537_n.jpg', 'Đại Học', 'Chính Quy', 'Công Nghệ Thông Tin', 'Việt Nam', 'Kinh', 'Không', '122168305', 'Bắc Giang', '0979638606', 'Đàn hát', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng', '', 'Bắc Giang', 'Yên Dũng', 'Quỳnh Sơn', ''),
(1, 'admin', '2014', '../avatar/logo.gif', 'Đại Học', 'Chính Quy', 'Công Nghệ Thông Tin', 'Việt Nam', 'Kinh', 'Không', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, '12020037', '', '../avatar/427845_156167814528296_165276781_n.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '12020073', '03/10/1993', '../avatar/427845_156167814528296_165276781_n.jpg', 'Đại Học', 'Chính Quy', 'Công Nghệ Thông Tin', 'Việt Nam', 'Kinh', 'Không', '122168305', 'Bắc Giang', '0979638606', 'Đàn hát', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng', '', 'Bắc Giang', 'Yên Dũng', 'Quỳnh Sơn', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
