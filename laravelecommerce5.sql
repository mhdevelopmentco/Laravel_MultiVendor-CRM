-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2016 at 05:25 AM
-- Server version: 5.6.29-76.2-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravarc_lar5theme`
--

-- --------------------------------------------------------

--
-- Table structure for table `nm_aboutus`
--

CREATE TABLE IF NOT EXISTS `nm_aboutus` (
  `ap_id` int(11) NOT NULL AUTO_INCREMENT,
  `ap_description` text NOT NULL,
  `ap_date` datetime NOT NULL,
  PRIMARY KEY (`ap_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_add`
--

CREATE TABLE IF NOT EXISTS `nm_add` (
  `ad_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(100) NOT NULL,
  `ad_position` tinyint(4) NOT NULL COMMENT '1-Header right,2-Left side bar,3-Bottom footer',
  `ad_pages` tinyint(4) NOT NULL COMMENT '1-home,2-product,3-Deal,4-Auction',
  `ad_redirecturl` varchar(150) NOT NULL,
  `ad_img` varchar(150) NOT NULL,
  `ad_type` int(11) NOT NULL DEFAULT '1' COMMENT '1-admin 2 customer',
  `ad_status` tinyint(3) unsigned NOT NULL,
  `ad_read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not read 1 read',
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nm_add`
--

INSERT INTO `nm_add` (`ad_id`, `ad_name`, `ad_position`, `ad_pages`, `ad_redirecturl`, `ad_img`, `ad_type`, `ad_status`, `ad_read_status`) VALUES
(1, 'Mens Fashion', 1, 1, 'http://localhost/laravel5.0/catproducts/viewcategorylist/MSwy', '1394024215326-BeSummerReady_980x459_980_459_mini-770x459PiSN9mMO.jpg', 1, 0, 1),
(2, 'Womens Fashion', 1, 1, 'http://localhost/laravel5.0/catproducts/viewcategorylist/MSwz', 'banner04ynoKA3qX.jpg', 1, 0, 1),
(3, 'Mens Winter', 1, 1, 'http://localhost/laravel5.0/catproducts/viewcategorylist/Miwy', 'banner_mens_SHOP_BY_STYLE_WINTER61P1mrNl.jpg', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_admin`
--

CREATE TABLE IF NOT EXISTS `nm_admin` (
  `adm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adm_fname` varchar(150) NOT NULL,
  `adm_lname` varchar(150) NOT NULL,
  `adm_password` varchar(150) NOT NULL,
  `adm_email` varchar(150) NOT NULL,
  `adm_phone` varchar(20) NOT NULL,
  `adm_address1` varchar(150) NOT NULL,
  `adm_address2` varchar(150) NOT NULL,
  `adm_ci_id` int(10) unsigned NOT NULL COMMENT 'city id',
  `adm_co_id` smallint(5) unsigned NOT NULL COMMENT 'country id',
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_admin`
--

INSERT INTO `nm_admin` (`adm_id`, `adm_fname`, `adm_lname`, `adm_password`, `adm_email`, `adm_phone`, `adm_address1`, `adm_address2`, `adm_ci_id`, `adm_co_id`) VALUES
(1, 'admin', 'admin', 'admin', 'pofitechnologies@gmail.com', '9790153222', 'chennai', 'chennai', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_adminreply_comments`
--

CREATE TABLE IF NOT EXISTS `nm_adminreply_comments` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_blog_id` int(11) NOT NULL,
  `reply_cmt_id` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nm_adminreply_comments`
--

INSERT INTO `nm_adminreply_comments` (`reply_id`, `reply_blog_id`, `reply_cmt_id`, `reply_msg`, `reply_date`) VALUES
(1, 1, 1, 'oke oke oke oke oke oke oke<br>', '2016-03-10 08:15:34'),
(2, 1, 1, 'dfgdfdfzhghdrdhghd', '2016-03-31 22:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `nm_auction`
--

CREATE TABLE IF NOT EXISTS `nm_auction` (
  `auc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auc_title` varchar(500) NOT NULL,
  `auc_category` int(11) NOT NULL,
  `auc_main_category` int(11) NOT NULL,
  `auc_sub_category` int(11) NOT NULL,
  `auc_second_sub_category` int(11) NOT NULL,
  `auc_original_price` int(11) NOT NULL,
  `auc_auction_price` int(11) NOT NULL,
  `auc_bitinc` smallint(5) unsigned NOT NULL,
  `auc_saving_price` int(11) NOT NULL,
  `auc_start_date` datetime NOT NULL,
  `auc_end_date` datetime NOT NULL,
  `auc_shippingfee` decimal(10,2) NOT NULL,
  `auc_shippinginfo` text NOT NULL,
  `auc_description` text NOT NULL,
  `auc_merchant_id` int(11) NOT NULL,
  `auc_shop_id` int(11) NOT NULL,
  `auc_meta_keyword` varchar(250) NOT NULL,
  `auc_meta_description` varchar(500) NOT NULL,
  `auc_image_count` int(11) NOT NULL,
  `auc_image` varchar(500) NOT NULL,
  `auc_status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active, 0-block',
  `auc_posted_date` datetime NOT NULL,
  PRIMARY KEY (`auc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nm_auction`
--

INSERT INTO `nm_auction` (`auc_id`, `auc_title`, `auc_category`, `auc_main_category`, `auc_sub_category`, `auc_second_sub_category`, `auc_original_price`, `auc_auction_price`, `auc_bitinc`, `auc_saving_price`, `auc_start_date`, `auc_end_date`, `auc_shippingfee`, `auc_shippinginfo`, `auc_description`, `auc_merchant_id`, `auc_shop_id`, `auc_meta_keyword`, `auc_meta_description`, `auc_image_count`, `auc_image`, `auc_status`, `auc_posted_date`) VALUES
(1, 'Diamond necklace', 1, 1, 1, 1, 15000, 10500, 10, 4500, '2014-08-09 12:50:47', '2014-09-09 12:50:47', '10.00', 'Ships to india', 'Diamond necklace will take you to a completely different world with \r\nspectacular views. Jewelry diamond necklaces the most beautiful state. \r\nJewelry design is an art. The worldâ€™s most valuable asset is the people.\r\n Charms adorn people. So, Jewelry design is the art of human adornment. \r\nJewelry design is one of the oldest professions. Diamond necklaces are \r\ndesigned by expert designers. We chose the most beautiful diamond \r\nnecklace designs for you. There are two predominant objective in the \r\ndesign of diamond necklaces. Exquisite designs, modesty shows in the \r\nwealth. Large stone adorned with necklaces, are influenced environment. \r\nYou can choose the most special days of the diamond necklace.<br><br><br>', 6, 5, 'Diamond', 'Diamond', 2, 'jewelzc8BoIZr.jpg/**/new2jdMILdT7.jpg/**/new1PhpgKukL.jpg/**/', 1, '2014-08-13 04:11:08'),
(2, 'hand bags', 1, 1, 1, 1, 1500, 1000, 10, 500, '2014-08-13 16:49:34', '2014-08-06 16:49:34', '25.00', 'free', 'asds', 2, 1, 'asd', 'asss', 4, '2YmlkRqJC.png/**/5UCkEi0zv.png/**/4TZEEKtZ7.png/**/1Zfw5yHW8.png/**/6A9AOLRAx.png/**/', 1, '2014-08-11 11:20:54'),
(3, 'hand bags', 1, 1, 1, 1, 1500, 1000, 10, 500, '2014-08-09 12:50:47', '2014-08-12 16:51:17', '25.00', 'swds', 'sdsa', 2, 1, 'sads', 'asdsa', 4, '2w4QZLuE2.png/**/5iJNcTQKA.png/**/62wJiGqDm.png/**/1r11FrvLT.png/**/3hypyZDuW.png/**/', 1, '2014-08-11 11:22:15'),
(4, 'Merchant deal', 2, 2, 2, 2, 10000, 9000, 10, 1000, '2014-08-12 09:38:54', '2014-08-13 15:24:54', '10.00', 'coimbatore vadavalli', 'Meta keywords<br>', 4, 3, 'fdafds', 'dsfds', 2, 'flower3SIH0fbjz.jpg/**/flower1Fk1kQ6Cw.jpg/**/flower2jaBoQuEf.jpg/**/', 1, '2014-08-13 04:10:25'),
(5, 'sasa', 1, 1, 1, 1, 150, 100, 5, 50, '2014-11-21 19:41:48', '2014-11-28 19:41:48', '12.00', 'wewewe', 'weewe', 1, 1, 'wewe', 'wewe', 0, 'DMR_48xTLGZCgG.jpg/**/', 1, '2014-11-20 16:14:58'),
(6, 'BiG Bazar', 2, 2, 0, 0, 1000, 100, 10, 900, '2014-12-10 11:20:30', '2014-12-16 11:20:30', '3.00', 'shipp', 'auction', 5, 4, 'rterte', 'ertert', 0, 'IMG_1269_wUYY6ufcW.jpg/**/', 1, '2014-12-10 10:22:18'),
(7, 'Senbagam', 5, 9, 19, 49, 400, 300, 10, 100, '2015-05-11 08:15:34', '2015-05-12 08:04:34', '0.00', 'item shipping', 'This product which unique<br>', 3, 2, 'keywords', 'keywords', 0, 'ChrysanthemumZVXd9lBr.jpg/**/', 1, '2015-05-11 02:49:23'),
(8, 'shoe sport', 4, 7, 33, 0, 100, 50, 1, 50, '2016-02-17 18:34:37', '2016-02-25 18:34:37', '0.00', 'ship to you', 'is a sport shoe, nike', 1, 1, 'ss', 'ss', 0, 'slide1-2mwb33rdS.png/**/', 1, '2016-02-17 10:36:00'),
(9, 'Test Auc', 5, 8, 14, 35, 320, 250, 10, 70, '2016-03-09 17:40:47', '2016-03-25 17:40:47', '20.00', 'Test', 'Test', 1, 140, 'Test', 'Test', 0, 'imagesRT1JF5cz.jpeg/**/', 1, '2016-03-09 12:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `nm_banner`
--

CREATE TABLE IF NOT EXISTS `nm_banner` (
  `bn_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bn_title` varchar(150) NOT NULL,
  `bn_type` varchar(10) NOT NULL COMMENT '1-home,2-product,3-deal,4-auction',
  `bn_img` varchar(150) NOT NULL,
  `bn_status` int(11) NOT NULL COMMENT '1-block,0-unblock',
  `bn_redirecturl` text NOT NULL,
  PRIMARY KEY (`bn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `nm_banner`
--

INSERT INTO `nm_banner` (`bn_id`, `bn_title`, `bn_type`, `bn_img`, `bn_status`, `bn_redirecturl`) VALUES
(44, 'Mens Wear', '1,1,1', 'banner1Rl0YCxMM.jpg', 0, 'http://demo.laravelecommerce.com/'),
(45, 'Womens Wear', '1,1,1', 'banner2TGGsF3fd.jpg', 0, 'http://demo.laravelecommerce.com/'),
(46, 'Kids wear', '1,1,1', 'banner3BkK5M1yz.jpg', 0, 'http://demo.laravelecommerce.com/'),
(47, 'Cycles', '1,1,1', 'banner4dMOwCCMb.jpg', 0, 'http://demo.laravelecommerce.com/'),
(48, 'Women Collection', '1,1,1', 'Vogue-Banner-870x350J2vBfniD.jpg', 0, 'http://demo18.pofi5.com/');

-- --------------------------------------------------------

--
-- Table structure for table `nm_blog`
--

CREATE TABLE IF NOT EXISTS `nm_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(50) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_catid` int(11) NOT NULL,
  `blog_image` varchar(100) NOT NULL,
  `blog_metatitle` varchar(100) NOT NULL,
  `blog_metadesc` text NOT NULL,
  `blog_metakey` varchar(100) NOT NULL,
  `blog_tags` varchar(100) NOT NULL,
  `blog_comments` int(5) NOT NULL COMMENT '0-not allow,1-allow',
  `blog_type` int(5) unsigned NOT NULL COMMENT '1-publish,2-drafts',
  `blog_status` tinyint(3) unsigned NOT NULL COMMENT '1-block,0-unblock',
  `blog_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nm_blog`
--

INSERT INTO `nm_blog` (`blog_id`, `blog_title`, `blog_desc`, `blog_catid`, `blog_image`, `blog_metatitle`, `blog_metadesc`, `blog_metakey`, `blog_tags`, `blog_comments`, `blog_type`, `blog_status`, `blog_created_date`) VALUES
(1, 'New product', 'Lorem ipsum dolor sit amet, lobortis mauris sed, mi fringilla enim nulla tincidunt nibh, mauris lectus ante rutrum at dui, mauris urna varius. Etiam amet vestibulum sodales augue, metus dapibus aspernatur in vel placerat, consectetuer mattis ornare non est convallis vitae, libero in non urna at. Tempor placerat sollicitudin consectetuer justo lacinia, pulvinar arcu arcu purus vel quisque ligula, felis vivamus curabitur nascetur purus elit, tempus mauris varius nulla faucibus sem, auctor mauris eget. Eu nunc ac nostra lectus, wisi dui ante sit sollicitudin aliquam, et nulla urna condimentum nisl cras, lobortis nisl primis libero id. Eu cum, dolor vitae turpis ut dui, neque quam vulputate ut ut. Sodales nostra sed suspendisse cras et, dictum vestibulum parturient amet non, ac vel ligula non id ultricies, per mauris interdum id laoreet, laoreet et sed auctor volutpat duis. Ullamcorper fermentum. Erat morbi nam nihil, ligula arcu mollis ac id tortor eros, neque malesuada elementum sed iaculis luctus vulputate, ac nostra, mauris nulla neque magna nibh eros tincidunt. Imperdiet sapien exercitationem sed. Maecenas dictum erat volutpat tempor, nullam senectus molestie, velit sed nullam maecenas vestibulum aliquam lorem, lectus ut nascetur eros sem mi.', 1, 'animasi-gambar-dp-bbm-tukang-parkir-300x300waJYdOpK.png', 'xxxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'Electronic Prd', 1, 1, 0, '2016-06-07 04:35:38'),
(2, 'Diwali Damaka', 'xcvxcvcxvxcvxcvxccccccccccccccc xcvxcvcxvxcvxcvcxvxcvxc xcvxcvxcvcxv xcvcxvcxvcxvxcvcxx', 3, 'TulipsjKKaczAb.jpg', 'cvxcxcv', 'xcvcxvcxvx', 'xcvcxvcx', 'vvcxcxc', 1, 1, 0, '2016-11-01 22:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `nm_blogsetting`
--

CREATE TABLE IF NOT EXISTS `nm_blogsetting` (
  `bs_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `bs_allowcommt` tinyint(4) NOT NULL,
  `bs_radminapproval` tinyint(4) NOT NULL COMMENT 'Require Admin Approval ',
  `bs_postsppage` tinyint(4) NOT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_blogsetting`
--

INSERT INTO `nm_blogsetting` (`bs_id`, `bs_allowcommt`, `bs_radminapproval`, `bs_postsppage`) VALUES
(1, 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nm_blog_cus_comments`
--

CREATE TABLE IF NOT EXISTS `nm_blog_cus_comments` (
  `cmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmt_blog_id` int(11) NOT NULL,
  `cmt_name` varchar(250) NOT NULL,
  `cmt_email` varchar(250) NOT NULL,
  `cmt_website` varchar(250) NOT NULL,
  `cmt_msg` text NOT NULL,
  `cmt_admin_approve` int(11) NOT NULL DEFAULT '0' COMMENT '1 => Approved, 2 => Unapproved',
  `cmt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cmt_msg_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not read ,1 Read ',
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nm_blog_cus_comments`
--

INSERT INTO `nm_blog_cus_comments` (`cmt_id`, `cmt_blog_id`, `cmt_name`, `cmt_email`, `cmt_website`, `cmt_msg`, `cmt_admin_approve`, `cmt_date`, `cmt_msg_status`) VALUES
(1, 1, 'yamuna', 'yamua@nexplocindia.com', 'https://www.google.co.in/?gfe_rd=cr&ei=pwbrU7zeM6HV8gfkuYDABQ&gws_rd=ssl', 'description about the product', 1, '2014-08-13 01:03:36', 1),
(2, 1, 'charles', 'charlesvictor.j@pofitec.com', 'http://pofitec.com', 'Lorem ipsum dolor sit amet, lobortis mauris sed, mi fringilla enim nulla tincidunt nibh, mauris lectus ante rutrum at dui, mauris urna varius. Etiam amet vestibulum sodales augue, metus dapibus aspernatur in vel placerat, consectetuer mattis ornare non est convallis vitae, libero in non urna at. Tempor placerat sollicitudin consectetuer justo lacinia, pulvinar arcu arcu purus vel quisque ligula, felis vivamus curabitur nascetur purus elit, tempus mauris varius nulla faucibus sem, auctor mauris eget. Eu nunc ac nostra lectus, wisi dui ante sit sollicitudin aliquam, et nulla urna condimentum nisl cras, lobortis nisl primis libero id. Eu cum, dolor vitae turpis ut dui, neque quam vulputate ut ut. Sodales nostra sed suspendisse cras et, dictum  ', 1, '2016-06-07 04:37:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_city`
--

CREATE TABLE IF NOT EXISTS `nm_city` (
  `ci_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ci_name` varchar(100) NOT NULL,
  `ci_con_id` smallint(6) NOT NULL,
  `ci_lati` decimal(18,14) NOT NULL,
  `ci_long` decimal(18,14) NOT NULL,
  `ci_default` tinyint(4) NOT NULL,
  `ci_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nm_city`
--

INSERT INTO `nm_city` (`ci_id`, `ci_name`, `ci_con_id`, `ci_lati`, `ci_long`, `ci_default`, `ci_status`) VALUES
(1, 'Coimbatore', 1, '11.00469725195311', '76.92911993710936', 1, 1),
(2, 'chennai', 1, '12.76506834229134', '80.13712774960936', 0, 1),
(3, 'Delhi', 1, '28.52674846734579', '77.13511358945311', 0, 1),
(4, 'Bangaluru', 1, '12.91101510701221', '77.66657721249999', 0, 1),
(5, 'Kolkata', 1, '23.05206669256911', '87.99372564999999', 0, 1),
(6, 'Bangalore', 1, '9999.99999999999999', '9999.99999999999999', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_cms_pages`
--

CREATE TABLE IF NOT EXISTS `nm_cms_pages` (
  `cp_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cp_title` varchar(250) NOT NULL,
  `cp_description` longtext NOT NULL,
  `cp_status` tinyint(4) NOT NULL DEFAULT '1',
  `cp_created_date` datetime NOT NULL,
  PRIMARY KEY (`cp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `nm_cms_pages`
--

INSERT INTO `nm_cms_pages` (`cp_id`, `cp_title`, `cp_description`, `cp_status`, `cp_created_date`) VALUES
(8, 'Help', '<b>What Information Do You We Collect<br></b>We collect information from you when register on our site or fill out our contact form.<br>\r\n\r\n            When ordering or raising enquiry on our \r\nwebsite, as appropriate, you may be asked to enter your Name, Email id, \r\nPhone number and skype ID. However you could visit Laravel ecommerce \r\nwebsite anonymously.<br><br><b>Special Notice</b> <br>If you are under 13 years old\r\n            Laravel Ecommerce website is not \r\nanticipated at children under 13 years old and we do not collect, use, \r\nprovide or process in any other form any personal information of \r\nchildren under the age of 13 consciously. We therefore also ask you, if \r\nyou are under 13 years old, please do not send us your personal \r\ninformation (for example, your name, address and email address).<br><br><b>Purposes of the collection of your data<br></b>&nbsp;Laravel Ecommerce is intent to inform \r\nyou of who we are and what we do. We collect and use personal \r\ninformation (including name, phone number and email ID) to better \r\nprovide you with the required services, or information. We would \r\ntherefore use your personal information in order to:\r\n\r\n            <ul><li>Acknowledge to your queries or requests</li><li>Govern our obligations in relation to any agreement you have with us</li><li>Anticipate and resolve problems with any goods or services supplied to you</li><li>Create products or services that may meet your needs</li></ul><b>Keeping our records accurate<br></b>&nbsp;We aim to keep our data confidential \r\nabout you as authentic as possible. If you would like to review, change \r\nor delete the details you have provided with us, please contact us via \r\nemail which is mentioned in our website.<br><br><b>Security of your personal data<br></b>&nbsp;As we value your personal information, \r\nwe will establish sufficient level of protection. We have therefore \r\nenforced technology and policies with the objective of protecting your \r\nprivacy from illegal access and erroneous use and will update these \r\nmeasures as new technology becomes available, as relevant.<br><b>Cookies policy</b>\r\n            <h4>Why do we use cookies?</h4>\r\n            We use browser cookies to learn more \r\nabout the way you interact with our content and help us to improve your \r\nexperience when visiting our website.<br>\r\n             Cookies remember the type of browser \r\nyou use and which additional browser software you have installed. They \r\nalso remember your preferences, such as language and region, which \r\nremain as your default settings when you revisit the website. Cookies \r\nalso allow you to rate pages and fill in comment forms.<br>\r\n            Some of the cookies we use are session \r\ncookies and only last until you close your browser, others are \r\npersistent cookies which are stored on your computer for longer.<br><b>Changes on privacy policy<br></b>&nbsp;We may make changes on our website’s \r\nprivacy policy at any time. If we make any consequential changes to this\r\n privacy policy and the way in which we use your personal data we will \r\npost these changes on this page and will do our best to notify you of \r\nany significant changes. Kindly often check our privacy policies.<br>', 1, '2016-06-10 04:36:27'),
(9, 'test', 'test', 1, '2016-08-21 00:56:58'),
(11, 'TestTK', 'Dies ist ein Test<br>', 1, '2016-09-07 12:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `nm_color`
--

CREATE TABLE IF NOT EXISTS `nm_color` (
  `co_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `co_code` varchar(10) NOT NULL,
  `co_name` varchar(50) NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `nm_color`
--

INSERT INTO `nm_color` (`co_id`, `co_code`, `co_name`) VALUES
(2, '#3D0C02', 'Bean  '),
(3, '#FFFFFF', 'White'),
(4, '#FFFF00', 'Yellow'),
(5, '#0141AD', 'Cobalt'),
(6, '#ED0A3F', 'Red Ribbon'),
(8, '#E7F8FF', 'Lily White'),
(9, '#163531', 'Gable Green'),
(10, '#B4C2DA', 'Pigeon Post'),
(11, '#000000', 'Black'),
(12, '#6195ED', 'Cornflower Blue'),
(13, '#66ED61', 'Pastel Green'),
(14, '#252F41', 'Ebony Clay'),
(15, '#3C485D', 'Oxford Blue'),
(16, '#9199AC', 'Manatee'),
(17, '#8F4B0E', 'Korma'),
(18, '#1D2A3E', 'Cloud Burst'),
(19, '#1C1E21', 'Shark'),
(20, '#0C1422', 'Ebony'),
(21, '#3E5884', 'East Bay'),
(23, '#070B12', 'Ebony'),
(24, '#07090D', 'Bunker'),
(25, '#4C4F56', 'Abbey'),
(26, '#F0F8FF', 'Alice Blue'),
(27, '#ED6461', 'Burnt Sienna'),
(28, '#ED6175', 'Mandy'),
(29, '#0D1116', 'Bunker'),
(30, '#6195ED', 'Cornflower Blue'),
(31, '#6195ED', 'Cornflower Blue'),
(34, '#273E72', 'Astronaut'),
(36, '#7CB0A1', 'Acapulco'),
(37, '#FF0000', 'Red'),
(38, '#7CB0A1', 'Acapulco'),
(39, '#C9FFE5', 'Aero Blue'),
(40, '#EB9373', 'Apricot'),
(41, '#4C80D6', 'Havelock Blue'),
(42, '#A7C219', 'La Rioja'),
(43, '#D92030', 'Alizarin Crimson');

-- --------------------------------------------------------

--
-- Table structure for table `nm_colorfixed`
--

CREATE TABLE IF NOT EXISTS `nm_colorfixed` (
  `cf_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cf_code` varchar(10) NOT NULL,
  `cf_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `nm_colorfixed`
--

INSERT INTO `nm_colorfixed` (`cf_id`, `cf_code`, `cf_name`) VALUES
(1, '#FFFFFF', 'White'),
(2, '#808080', 'gray'),
(3, '#C0C0C0', 'silver'),
(4, '#000000', 'black'),
(5, '#800000', 'maroon'),
(6, '#FF0000', 'red'),
(7, '#800080', 'purple'),
(8, '#008000', 'green'),
(9, '#00FF00', 'lime'),
(10, '#808000', 'olive'),
(11, '#FFFF00', 'yellow'),
(12, '#00FFFF', 'aqua'),
(13, '#FFA500', 'orange'),
(14, '#000080', 'navy'),
(15, '#0000FF', 'blue'),
(16, '#008080', 'teal'),
(17, '#6195ED', 'Cornflower Blue'),
(18, '#7CB0A1', 'Acapulco'),
(19, '#000000', 'Black'),
(20, '#FFCB9E', 'Peach Orange');

-- --------------------------------------------------------

--
-- Table structure for table `nm_contact`
--

CREATE TABLE IF NOT EXISTS `nm_contact` (
  `cont_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(100) NOT NULL,
  `cont_email` varchar(150) NOT NULL,
  `cont_no` varchar(50) NOT NULL,
  `cont_message` text NOT NULL,
  `cont_restatus` tinyint(4) NOT NULL,
  `cont_date` datetime NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_country`
--

CREATE TABLE IF NOT EXISTS `nm_country` (
  `co_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `co_code` varchar(10) NOT NULL,
  `co_name` varchar(30) NOT NULL,
  `co_cursymbol` varchar(5) NOT NULL,
  `co_curcode` varchar(10) NOT NULL,
  `co_status` tinyint(4) NOT NULL COMMENT '1-block,0-unblock',
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nm_country`
--

INSERT INTO `nm_country` (`co_id`, `co_code`, `co_name`, `co_cursymbol`, `co_curcode`, `co_status`) VALUES
(1, 'IND', 'India', 'Rs', 'INR', 0),
(5, 'IR', 'Iran', 'Rls', 'IRR', 0),
(6, 'CZ', 'czech republic', 'K?', 'CZK', 0),
(7, 'USA', 'United States of America', '$', 'USD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_currency`
--

CREATE TABLE IF NOT EXISTS `nm_currency` (
  `cur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cur_name` varchar(100) NOT NULL,
  `cur_code` varchar(5) NOT NULL,
  `cur_symbol` varchar(10) NOT NULL,
  `cur_status` tinyint(11) NOT NULL DEFAULT '1',
  `cur_default` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_customer`
--

CREATE TABLE IF NOT EXISTS `nm_customer` (
  `cus_id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(100) NOT NULL,
  `facebook_id` varchar(150) NOT NULL,
  `cus_email` varchar(150) NOT NULL,
  `cus_pwd` varchar(40) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_address1` varchar(150) NOT NULL,
  `cus_address2` varchar(150) NOT NULL,
  `cus_country` varchar(50) NOT NULL,
  `cus_city` varchar(50) NOT NULL,
  `cus_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cus_logintype` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>Admin user, 2=> Website User, 3=> Facebook User',
  `cus_status` int(11) NOT NULL COMMENT '0 unblock 1 block',
  `cus_pic` varchar(150) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `nm_customer`
--

INSERT INTO `nm_customer` (`cus_id`, `cus_name`, `facebook_id`, `cus_email`, `cus_pwd`, `cus_phone`, `cus_address1`, `cus_address2`, `cus_country`, `cus_city`, `cus_joindate`, `cus_logintype`, `cus_status`, `cus_pic`, `created_date`) VALUES
(25, 'maheshwaran', '', 'maheswaran@pofitec.com', '49bb197bec17b7d20b2df6b1f3c3434a', '1234567890', 'gandhipuram', 'gandhipuram', '1', '1', '2016-06-10 10:15:34', 2, 0, '', '0000-00-00'),
(28, 'Pavithran', '', 'pavithrandbpro@gmail.com', '202cb962ac59075b964b07152d234b70', '9787467575', '', '', '1', '1', '2016-06-10 16:14:29', 2, 0, '', '0000-00-00'),
(42, 'charles', '', 'charlesvictor.j@pofitec.com', '11d7fb8c3ed2d559a6575b2395a87537', '9498056637', '', '', '1', '1', '2016-06-17 13:03:30', 2, 0, '', '0000-00-00'),
(47, 'Pavithran', '', 'pavithran.g@pofitec.com', 'c781679cc2fd7a1f6c8ff947cd4abd5e', '9787467575', '', '', '1', '1', '2016-06-21 09:52:19', 2, 0, '', '0000-00-00'),
(74, 'rajesh', '', 'erkprajesh@gmail.com', '4297f44b13955235245b2497399d7a93', '9500818702', '', '', '1', '1', '2016-06-23 07:32:23', 2, 0, '', '0000-00-00'),
(75, 'kumar', '', 'rrpofi@gmail.com', '79cfac6387e0d582f83a29a04d0bcdc4', '1234567890', '', '', '1', '1', '2016-06-23 07:41:49', 2, 0, '', '0000-00-00'),
(76, 'Pavithran', '', 'pavithrang@rocketmail.com', '202cb962ac59075b964b07152d234b70', '9787467575', '', '', '1', '1', '2016-06-25 04:27:45', 2, 0, '', '0000-00-00'),
(78, 'Test', '', 'tester@testy.com', 'fcea920f7412b5da7be0cf42b8c93759', '4055551212', '', '', '1', '2', '2016-07-01 17:19:14', 2, 0, '', '0000-00-00'),
(79, 'reca', '', 'recabyte008@yahoo.com', 'c50303bee26c312d8d284b7abf372645', '56667788', '', '', '1', '1', '2016-07-02 04:28:51', 2, 0, '', '0000-00-00'),
(80, 'Renzo Fernandini', '10210016168465859', 'undefined', '', '', '', '', '', '', '2016-07-06 17:01:24', 3, 0, '', '0000-00-00'),
(81, 'TESTE 1', '', 'teste@teste.com', '827ccb0eea8a706c4c34a16891f84e7b', '1313131233', '', '', '1', '2', '2016-07-09 13:57:52', 2, 0, '', '0000-00-00'),
(82, 'vinod', '', 'vinodbabu@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', '', '', '1', '1', '2016-07-12 13:09:27', 2, 1, '', '0000-00-00'),
(83, 'JC Charles Victor', '1066743686710240', 'charlesjc496@gmail.com', '', '', '', '', '', '', '2016-07-16 09:43:27', 3, 0, '', '0000-00-00'),
(84, 'Kailash Rajendhar rr', '1192904664076815', 'kumarkailash075@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9092398789', 'bcvbcvbvb', 'vbcvbcvb', '', '', '2016-07-16 09:45:45', 3, 0, 'Koalaq3N6cYUG.jpg', '0000-00-00'),
(85, 'Vinod Vinod', '1765794540307590', 'test21689@gmail.com', '', '', '', '', '', '', '2016-07-16 09:45:48', 3, 0, '', '0000-00-00'),
(86, 'G Pavithran Cse', '561788407336067', 'pavithrang@rocketmail.com', '', '', '', '', '', '', '2016-07-16 09:45:59', 3, 0, '', '0000-00-00'),
(87, 'Lukas Gregor', '10205435746891755', 'lukas.gregis@gmail.com', '', '', '', '', '', '', '2016-07-17 17:12:34', 3, 0, '', '0000-00-00'),
(88, 'Faiz Arifin', '1219900048028708', 'paihz@live.com', '', '', '', '', '', '', '2016-07-21 16:27:15', 3, 0, '', '0000-00-00'),
(89, 'asd', '', 'sadasd@asdasd', '2a79542558166335a1203696038cd0ca', '4654654654', '', '', '5', '', '2016-07-21 17:29:48', 2, 0, '', '0000-00-00'),
(90, 'Al-Dosari Reema', '10155293974172619', 'ksu_sa@hotmail.com', '', '', '', '', '', '', '2016-07-23 08:34:28', 3, 0, '', '0000-00-00'),
(92, 'dfghdf', '', 'fdfdfgh@agsd.com', 'e10adc3949ba59abbe56e057f20f883e', '34563456', '', '', '1', '1', '2016-08-10 01:36:07', 2, 0, '', '0000-00-00'),
(93, 'Muhammad Eltayeb', '10153807869518342', 'moh_eltayeb2020@yahoo.com', '', '', '', '', '', '', '2016-08-15 17:30:25', 3, 0, '', '0000-00-00'),
(94, 'Justin McCombs', '10154148282473145', 'jtmccombs@gmail.com', '', '', '', '', '', '', '2016-08-16 18:47:14', 3, 0, '', '0000-00-00'),
(95, 'catella', '', 'smartwebfrance@gmail.com', '3ba7de1bbadfc2f8280f9019cfedfddf', '3367135517', '', '', '', '', '2016-08-17 06:42:29', 2, 0, '', '0000-00-00'),
(96, 'reza', '', 'abc@gmail.com', '815b4482c3bbf68e3ed3264bdebb22f4', '8221122341', '', '', '1', '3', '2016-08-17 09:24:01', 2, 0, '', '0000-00-00'),
(97, 'DiMas MuhammadFadillah', '672020079616159', 'dimas.triple@rocketmail.com', '', '', '', '', '', '', '2016-08-20 10:36:42', 3, 0, '', '0000-00-00'),
(98, 'a', '', 'a@a.com', '68830aef4dbfad181162f9251a1da51b', '1232132131', '', '', '6', '', '2016-08-22 08:09:08', 2, 0, '', '0000-00-00'),
(99, 'Pk', '', 'pk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9687563245', '', '', '1', '3', '2016-08-23 09:45:28', 2, 0, '', '0000-00-00'),
(100, 'kiran', '', 'kiran@medsoft.com', '539d60e046342d8320727bbef8b098a1', '9898558741', '', '', '1', '4', '2016-08-25 06:31:22', 2, 0, '', '0000-00-00'),
(101, 'Rafael Sarrasqueiro', '1041105329300254', 'rafael114e@hotmail.com', '', '', '', '', '', '', '2016-08-28 01:34:14', 3, 0, '', '0000-00-00'),
(102, 'amitavaroy', '', 'amitava@mail.com', '095d611f2ced24942461da530e62b07d', '1587687', '', '', '1', '2', '2016-08-30 09:10:49', 2, 0, '', '0000-00-00'),
(103, 'Ismail Marzuqi', '10207343560412894', 'iesien22@yahoo.com', '', '', '', '', '', '', '2016-08-30 13:09:47', 3, 0, '', '0000-00-00'),
(104, 'Burham', '', 'rezka@gmail.com', '8c32b1f76c746d784f0c1fd005e2a220', '8213131233', '', '', '1', '3', '2016-08-30 15:09:18', 2, 0, '', '0000-00-00'),
(105, 'Multi Vendeur', '119809888472489', 'luxim67gg@gmail.com', '', '', '', '', '', '', '2016-08-31 13:08:39', 3, 0, '', '0000-00-00'),
(106, 'aaa', '', 'admin@example.com', '197b3add3c4657f8e9d6233b01b31183', '123456789', '', '', '1', '2', '2016-09-12 18:10:17', 2, 0, '', '0000-00-00'),
(108, 'khor', '', 'khoro918@hotmail.com', '6fe3ea8579a55615b47f17f7acfdbe13', '0168811709', '', '', '5', '', '2016-09-25 06:30:57', 2, 0, '', '0000-00-00'),
(109, 'Wedus', '', 'prifacom@yahoo.com', '21f303fb44ac7deae9527031551003ab', '123456', '', '', '1', '4', '2016-09-26 04:19:07', 2, 0, '', '0000-00-00'),
(110, 'mahmoud', '', 'mogahead@gmail.com', '7552747da92b1998eee7469a00daea71', '0111113015', '', '', '1', '3', '2016-09-26 21:27:35', 2, 0, '', '0000-00-00'),
(111, 'name', '', 'asd@asd.com', '078bbb4bf0f7117fb131ec45f15b5b87', '123456789', '', '', '7', '', '2016-10-03 03:09:27', 2, 0, '', '0000-00-00'),
(112, 'maheswaran', '', 'maheswaranphp@gmail.com', '49bb197bec17b7d20b2df6b1f3c3434a', '9543543543', '', '', '1', '1', '2016-10-14 11:57:28', 2, 0, '', '0000-00-00'),
(113, 'Jason', '', 'j.gerbes@me.com', 'e10adc3949ba59abbe56e057f20f883e', '0271111111', '', '', '6', '', '2016-10-16 02:50:53', 2, 0, '', '0000-00-00'),
(114, 'jubin', '', 'jubinmehta86@gmail.com', 'b99716c738bf817ab57eca6e2bd16b36', '9891117519', '', '', '1', '3', '2016-10-16 04:06:22', 2, 0, '', '0000-00-00'),
(115, 'trung', '', 'codertrung@gmail.com', 'c8dd80411c4d8e171dca372f000a65b8', '0986222512', '', '', '1', '4', '2016-10-17 16:17:25', 2, 0, '', '0000-00-00'),
(124, 'pofi kailash', '', 'kailashkumar.r@esec.ac.in', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', '', '', '1', '1', '2016-11-15 06:21:47', 2, 0, '', '0000-00-00'),
(125, 'George Nammour', '', 'georgen@linteractif.com', 'f5fe3630496d417ef1beb821683238b6', '9613583114', '', '', '1', '1', '2016-11-15 13:21:04', 2, 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_deals`
--

CREATE TABLE IF NOT EXISTS `nm_deals` (
  `deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_title` varchar(500) NOT NULL,
  `deal_category` int(11) NOT NULL,
  `deal_main_category` int(11) NOT NULL,
  `deal_sub_category` int(11) NOT NULL,
  `deal_second_sub_category` int(11) NOT NULL,
  `deal_original_price` int(11) NOT NULL,
  `deal_discount_price` int(11) NOT NULL,
  `deal_discount_percentage` int(11) NOT NULL,
  `deal_saving_price` int(11) NOT NULL,
  `deal_start_date` datetime NOT NULL,
  `deal_end_date` datetime NOT NULL,
  `deal_expiry_date` date NOT NULL,
  `deal_description` text NOT NULL,
  `deal_merchant_id` int(11) NOT NULL,
  `deal_shop_id` int(11) NOT NULL,
  `deal_meta_keyword` varchar(250) NOT NULL,
  `deal_meta_description` varchar(500) NOT NULL,
  `deal_min_limit` int(11) NOT NULL,
  `deal_max_limit` int(11) NOT NULL,
  `deal_purchase_limit` int(11) NOT NULL,
  `deal_image_count` int(11) NOT NULL,
  `deal_image` varchar(500) NOT NULL,
  `deal_no_of_purchase` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `deal_status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active, 0-block',
  `deal_posted_date` datetime NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `nm_deals`
--

INSERT INTO `nm_deals` (`deal_id`, `deal_title`, `deal_category`, `deal_main_category`, `deal_sub_category`, `deal_second_sub_category`, `deal_original_price`, `deal_discount_price`, `deal_discount_percentage`, `deal_saving_price`, `deal_start_date`, `deal_end_date`, `deal_expiry_date`, `deal_description`, `deal_merchant_id`, `deal_shop_id`, `deal_meta_keyword`, `deal_meta_description`, `deal_min_limit`, `deal_max_limit`, `deal_purchase_limit`, `deal_image_count`, `deal_image`, `deal_no_of_purchase`, `created_date`, `deal_status`, `deal_posted_date`) VALUES
(1, 'Samsung Galaxy', 1, 1, 1, 10, 15999, 499, 97, 15500, '2016-06-08 16:42:05', '2017-01-12 16:42:05', '2017-02-15', 'Experience the new change with&nbsp;Samsung Galaxy S6&nbsp;which comprises of state-of-the-art functions and features. This smartphone has a big&nbsp;12.92 cm (5.1) Super AMOLED screen&nbsp;that offers colour rich picture performance with detailed textures. Enjoy capturing every moment with&nbsp;16 MP primary camera&nbsp;and take selfies with&nbsp;5 MP front camera.&nbsp;<div><br></div>', 9, 1, 'Samsung Galaxy s6 Best Deals', 'Crafted from glass and metal, the Samsung Galaxy S6 is a revolutionary smartphone that comes with a Quad HD Super AMOLED display, 16 MP camera and lightning-fast 64-bit, octa-core processor.', 1, 4, 0, 3, 's1Hs55vD5m.jpg/**/s1Hs55vD5m.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 12:54:51'),
(2, 'Lenovo S90 Or Sisley S90', 1, 1, 2, 12, 12550, 499, 96, 12051, '2016-06-08 17:23:46', '2016-12-23 17:23:46', '2017-01-20', 'With a 127 mm screen size, the S90’s Super AMOLED screen packs an HD multimedia experience that’ll rock your socks off. You can watch movies while you commute to work, and share videos with friends and family.', 9, 1, 'Lenovo S90 ', 'With dual micro SIM slots, connect to 2G or 3G networks with ease. A-GPS allows you to broadcast your location and let your pals know where you are for a quick meet up.', 1, 4, 0, 3, 'l1SopvrOfv.jpeg/**/l1SopvrOfv.jpeg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 12:04:33'),
(3, 'Digital SLR Camera', 1, 9, 12, 13, 46737, 1999, 96, 44738, '2016-06-08 17:46:32', '2017-01-11 17:46:32', '2017-02-09', 'With the world’s fastest AF performance, you only need 0.06s to achieve perfect, timeless moments with the ?6000. Its compact body delivers superb image quality, making this a crowd pleaser among enthusiasts and professionals. World’s Fastest, AF (0.06 sec), 24.3MP Exmor APS HD CMOS + BIONZ X, 11 FPS Continuous Shooting, DSLR-style Operation, Enhanced OLED Tru-Finder, WiFi/NFC/PlayMemories Camera Apps.', 9, 1, 'Digital SLR Camera', 'With the world’s fastest AF performance, you only need 0.06s to achieve perfect, timeless moments with the ?6000. Its compact body delivers superb image quality, making this a crowd pleaser among enthusiasts and professionals.', 1, 4, 0, 3, 'd2Y6X5TAAr.jpg/**/d2Y6X5TAAr.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:00:51'),
(4, 'Athena Red & Black Layered Top', 3, 7, 10, 4, 600, 199, 67, 401, '2016-06-13 17:49:55', '2016-12-15 17:49:55', '2017-02-09', 'This stylish top from Athena is a chic must-have in your wardrobe. Team it with a pair of skinny jeans and a bracelet to look your best.', 9, 1, 'Western Wear', 'Red and black woven layered top, has a round neck, three-quarter sleeves with sleeveless on the left side, contrast asymmetric upper layer that extends to the right sleeve with keyhole detail', 1, 3, 0, 3, 'tN3JKuosC.jpg/**/tN3JKuosC.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:01:26'),
(5, 'Lifestyle Retail Pink Floral Print Top', 3, 7, 10, 4, 699, 100, 86, 599, '2016-06-08 18:09:26', '2016-12-16 18:09:26', '2017-02-15', 'Pink woven printed top, has a spread collar, a short button placket with pintucks on either side and pleats below, three-quarter sleeves with roll-up tabs, curved hem.', 9, 1, 'Lifestyle Retail Pink Floral Print Top', 'Lifestyle Retail brings to you a range of trendy tops to spruce up your wardrobe. Team this piece with a pair of jeans and heels to complete your look.', 1, 4, 0, 3, 'ttHEa6rOMB.jpg/**/ttHEa6rOMB.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:01:55'),
(6, 'Bitterlime Pack of 2 Leggings', 3, 7, 10, 15, 499, 99, 80, 400, '2016-06-08 18:29:59', '2017-01-05 18:29:59', '2017-02-15', 'Look trendy with this set of leggings from Bitterlime. Team it with a chic kurta or a long top and a pair of flats to complete your ensemble', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 1, 3, 0, 3, 'lwRCYSOvN.jpg/**/lwRCYSOvN.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:03:38'),
(7, ' Black-Gray Henley T Shirts', 2, 2, 3, 8, 399, 99, 75, 300, '2016-06-08 18:42:59', '2017-01-11 18:42:59', '2017-02-15', 'Free Spirit brings to you this Henley T-shirt that will be an excellent inclusion in your wardrobe. Made with premium quality material, this T-shirt brings out the best in your style. Its high-end material use makes it extremely comfortable to wear all throughout the day. It is also soft on the skin and, thus, does not cause any irritation or rashes. It also scores high on the aspect of style and is sure to win compliments for you. It is a must-have for people who prefer quality and reliability over everything.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'st1MQsGNe2y.JPG/**/st1MQsGNe2y.JPG/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:04:06'),
(8, 'Globalite Strike Navy Casual Shoes', 2, 10, 15, 17, 499, 99, 80, 400, '2016-06-24 19:04:56', '2017-01-12 19:04:56', '2017-02-15', 'Globalite continually creates what is aspired and not just what is necessary. All of its products are meant to deliver high performance, durability and great comfort.', 12, 5, 'Globalite Strike Navy Casual Shoes', 'Globalite continually creates what is aspired and not just what is necessary. All of its products are meant to deliver high performance, durability and great comfort.', 1, 4, 0, 3, 'shtNRf34ok.jpg/**/shtNRf34ok.jpg/**//**//**/', 0, '06/08/2016', 0, '2016-07-16 13:05:30'),
(9, ' Black Steel Wrist Watch', 2, 11, 17, 18, 1499, 199, 87, 1300, '2016-06-08 19:12:14', '2017-01-05 19:12:14', '2017-02-08', 'Japanese Movement :: Swiss Design :: Water Resistant :: Manufacturer Warranty :: Attractive Packing with Warranty Card :: Contemporary Modern Design :: Brass Steel Case :: Disclaimer: Product color may slightly vary due to photographic lighting sources or your monitor settings : Chronographs are Dummy and Do not Work.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'wYPovNF38.jpg/**/wYPovNF38.jpg/**//**//**/', 0, '06/08/2016', 0, '2016-07-16 13:05:57'),
(10, ' Babyhug Booties Bow Applique', 4, 6, 13, 14, 1500, 299, 80, 1201, '2016-06-08 19:45:56', '2016-12-15 19:45:56', '2017-01-20', 'Cute Walk Shoes by Babyhug meant for precious little feet. A range of super stylish &amp; comfortable footwear, fine crafted from top quality material. Materials and components are carefully chosen for their quality and lightness, ensuring that no shoes are heavier than the proportional age appropriate weight for the child''s body weight.', 12, 5, 'Baby Footwear', 'Cute Walk Shoes by Babyhug meant for precious little feet. A range of super stylish & comfortable footwear, fine crafted from top quality material. Materials and components are carefully chosen for their quality and lightness, ensuring that no shoes are heavier than the proportional age appropriate weight for the child''s body weight.', 1, 4, 0, 3, 'b4ZdiVx93F.jpg/**/b4ZdiVx93F.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:06:20'),
(11, 'Baby Full Sleeves Regular Tops', 4, 6, 18, 19, 799, 199, 75, 600, '2016-06-08 19:58:57', '2016-12-23 19:58:57', '2017-01-20', 'Product color may slightly vary due to photographic lighting sources or your monitor settings.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'btdP2Sy789.jpg/**/btdP2Sy789.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 14:38:03'),
(12, 'Samsung Galaxy A5', 1, 1, 1, 20, 19990, 599, 97, 19391, '2016-06-08 20:05:10', '2016-12-29 20:05:10', '2017-02-15', '4G&nbsp;Connectivity and Phone Features Depend on the Carrier and the Location of the User<br>', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 's1y3DywrGi.jpg/**/s1y3DywrGi.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 14:38:43'),
(13, 'Sony Xperia M4 Aqua', 1, 1, 1, 21, 18990, 699, 96, 18291, '2016-06-08 20:13:38', '2016-12-16 20:13:38', '2017-01-13', 'The waterproof camera phone designed for everyone. Get more with two powerful cameras, waterproofing and a 2-day battery. A 64-bit&nbsp;Octa-core&nbsp;phone with lightning-fast performance.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, 'sn5ntBRR0M.jpg/**/sn5ntBRR0M.jpg/**//**//**/', 0, '06/08/2016', 1, '2016-07-16 13:04:30'),
(14, 'Z Berries Women''s, Girl''s Shrug', 3, 7, 19, 22, 499, 99, 80, 400, '2016-06-09 10:19:33', '2016-07-07 10:19:33', '2016-07-29', 'Z Berries shrug is a must for your wardrobe any season. Pair it up with any outfit or a solid top &amp; footwear to look stylish and elegant for your outings. Made from Premium Viscose Lycra, These Regular-Fit Shrugs Are Lightweight And Comfortable To Wear All Day Long. Wear It Over A Sleeveless Top And Skinny-Fit Denims Or Shorts For An Ultimate Fashion.', 13, 6, 'Z Berries Women''s, Girl''s Shrug', 'Z Berries shrug is a must for your wardrobe any season. Pair it up with any outfit or a solid top & footwear to look stylish and elegant for your outings. Made from Premium Viscose Lycra, These Regular-Fit Shrugs Are Lightweight And Comfortable To Wear All Day Long. Wear It Over A Sleeveless Top And Skinny-Fit Denims Or Shorts For An Ultimate Fashion.', 1, 3, 0, 3, 'nTw35uEj3.jpg/**/sg5IAtBHbm.jpg/**/ggd3QlD5OL.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 13:17:58'),
(15, 'Garments Orange Gown For Girls', 4, 12, 20, 23, 600, 199, 67, 401, '2016-06-09 10:34:50', '2016-12-22 10:34:50', '2017-02-15', 'Dress your little darling in this beautiful Rani(Pink) coloured suit set from Aarika and watch as she fetches oodles of compliments and candies at the next wedding function you take her to.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, 'f1p9uvxNNc.jpg/**/f1p9uvxNNc.jpg/**//**//**/', 0, '06/09/2016', 1, '2016-07-16 13:02:45'),
(16, 'Noddy Clothing Full Sleeves Shirt', 4, 12, 20, 25, 799, 299, 63, 500, '2016-06-09 10:46:51', '2016-12-15 10:46:51', '2017-01-19', 'Dress up your son in this party wear shirt with Jacket by Noddy Original Clothing for the next evening out. Set contains a full sleeve check shirt and sleeveless Jacket with pockets. Pair this charming set with a classy pair of denims or chinos to give him a stylish party look.', 9, 1, 'Big Bazaar In Coimbatore', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'st1cjNNP6si.jpg/**/st1cjNNP6si.jpg/**//**//**/', 0, '06/09/2016', 1, '2016-11-01 23:40:11'),
(17, 'Pink Polka Dot Print A-Line Dress', 4, 12, 20, 23, 699, 99, 86, 600, '2016-06-09 10:53:15', '2016-07-07 10:53:15', '2016-07-29', 'Pink polka dot print&nbsp;A-line&nbsp;<a href="http://www.myntra.com/dress?src=pd" target="" rel="">dress</a>, has a round neck,&nbsp;<a href="http://www.myntra.com/cap?src=pd" target="" rel="">cap</a>&nbsp;sleeves, concealed zip closure on the back, flared hem with cut-out detail', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'd44o0jZ7HH.jpg/**/dZ5SzeaJY.jpg/**/d33eVJX6Cd.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 13:19:34'),
(18, 'Babyhug Full Sleeves Night Suit', 4, 12, 20, 24, 359, 99, 72, 260, '2016-11-01 10:57:38', '2016-12-31 10:57:38', '2016-12-31', 'Babyhug&nbsp;presents full sleeves night suit for your little boy. The set comprises of full sleeves top and Pyjama. Cute Dinosaur print on top and solid color Pyjama makes the set look attractive. Round neck ensures easy dressing.', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 4, 0, 3, 'bt3FFqSKfE.jpg/**/bt5TvUZQgCV.jpg/**/bt2A0ItJger.jpg/**/bt6QvyzpGru.jpg/**/', 0, '06/09/2016', 1, '2016-11-01 23:43:36'),
(19, 'Boys Ethnic Dhoti Kurta Set', 4, 12, 20, 26, 1299, 399, 69, 900, '2016-06-09 11:04:03', '2016-07-07 11:04:03', '2016-07-28', 'Kute Kids Boys Ethnic Dhoti Kurta Set.', 13, 6, 'Big Bazaar In Coimbatore', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 5, 0, 3, 'k1wYjjDmmO.jpg/**/k3Wh88S6Ra.jpg/**/k2votpiAH8.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 13:21:25'),
(20, 'Blue Net and geogertte Anarkali Suit', 4, 12, 20, 27, 1299, 299, 77, 1000, '2016-06-09 11:10:52', '2016-12-22 11:10:52', '2017-02-23', 'Blue shade Net and geogertte anarkali suit flaunts floral jacquard patterned and applique with fancy dangler enhanced yoke part. Gathered lower part beautifies the suit look. Comes with matching bottom and dupatta.&nbsp;<br>', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 4, 0, 3, 'auK6ix3De.jpg/**/auK6ix3De.jpg/**//**//**/', 0, '06/09/2016', 1, '2016-07-16 13:04:55'),
(21, 'Lee Slim Fit Fit Women''s Blue Jeans', 3, 7, 21, 28, 1235, 399, 68, 836, '2016-06-09 11:18:25', '2016-07-07 11:18:25', '2016-07-29', 'This model has a height of 5 feet 8 inches and is wearing a Jeans of Size 28.', 13, 6, 'Big Bazaar In Coimbatore', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, 'jevvRXU7R.jpg/**/j1oFRyU1qm.jpg/**/j46KYksBzd.jpg/**/j3Cm8gVTXP.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 13:22:07'),
(22, 'Javuli Cotton Solid Patiala', 3, 4, 6, 29, 799, 199, 75, 600, '2016-06-09 11:33:21', '2016-07-08 11:33:21', '2016-07-29', 'Look trendy with this set of Patiala&nbsp;from Bitterlime. Team it with a chic kurta or a long top and a pair of flats to complete your ensemble', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 4, 0, 3, 'p1QXYaqdIp.jpeg/**/p1QXYaqdIp.jpeg/**//**//**/', 0, '06/09/2016', 1, '2016-06-17 16:51:51'),
(24, 'Men''s Blue Jeans', 2, 2, 9, 2, 999, 199, 80, 800, '2016-07-13 11:48:43', '2016-12-07 11:48:43', '2017-01-19', 'This stylish Jeans from Athena is a chic must-have in your wardrobe. Team it with a pair of skinny jeans &nbsp;to look your best.', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 2, 5, 0, 3, 'j2JHhDI9ow.jpg/**/j2JHhDI9ow.jpg/**//**//**/', 0, '06/09/2016', 1, '2016-07-16 12:05:13'),
(25, 'Men''s Solid Casual Blue Shirt', 2, 2, 4, 1, 999, 99, 90, 900, '2016-06-09 11:55:27', '2016-07-07 11:55:27', '2016-07-28', 'This stylish Shitrs from Athena is a chic must-have in your wardrobe. Team it with a pair of skinny jeans to look your best.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'jZ4tcjVzB.jpg/**/htnq6jl2q.jpg/**/6mvzKoGeP.jpg/**/67kcjXMBHR.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:21:31'),
(26, 'Qpark White Linen Casual Shirt', 2, 2, 4, 1, 799, 99, 88, 700, '2016-06-09 11:58:25', '2016-07-07 11:58:25', '2016-07-29', 'This stylish Checked Shitrs from Athena is a chic must-have in your wardrobe. Team it with a pair of skinny jeans to look your best.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'lorJAUi6xOM.jpg/**/lo4wYZWxP16.jpg/**/lor2Lb8UsJAz.jpg/**/lo43pnnXuEM3.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:22:00'),
(27, 'Men''s Formal Navy Blue Cotton Shirt', 2, 2, 4, 1, 650, 99, 85, 551, '2016-06-09 12:09:42', '2016-07-08 12:09:42', '2016-07-29', 'Inspire the fashion freaks to try something out-of-the-box when you wear this casual shirt from the house of You Forever.Amplify your style quotient by wearing this button-down wonder that is fashioned using quality cotton for absolute comfort.So, keep partying like it''s your job in this comfy regular-fit casual shirt, pair of tapered jeans and suede loafers.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'c18gAMVO1b.jpg/**/c29J1ep6J7.jpg/**/c3y9ioRmPt.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 14:22:22'),
(28, 'Red T Shirt', 2, 2, 3, 9, 599, 99, 83, 500, '2016-06-09 12:15:23', '2016-07-07 12:15:23', '2016-07-30', 'This stylish T-Shitrs from Athena is a chic must-have in your wardrobe. Team it with a pair of skinny jeans to look your best.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, 'ts2IaGKAThz.jpg/**/ts3KLktwCqk.jpg/**/ts4WqTX1HxR.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 14:24:22'),
(29, 'Men''s Slim Fit Yellow TShirt ', 2, 2, 3, 8, 599, 99, 83, 500, '2016-06-09 12:19:26', '2016-07-07 12:19:26', '2016-07-28', 'Peter England Men''s Blended Shirt.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, '37RxrqPjr.jpg/**/aFkQGdeoX.jpg/**/2KnnhCsrC.jpg/**/aZ2Eraqvn.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:23:25'),
(30, 'Lenovo A6000 (8GB, Black)', 1, 1, 2, 6, 8000, 599, 93, 7401, '2016-06-09 12:25:29', '2016-07-07 12:25:29', '2016-07-29', 'From listening to music to watching videos, sharing data to editing documents on-the-go, you can do it all seamlessly on Lenovo A6000 8GB Black smartphone. An affordable smartphone with advanced features, it comes with a large 12.7 cm (5) HD display screen and quad-core 1.2 GHz processor. With 1 GB RAM and Android 4.4.4 KitKat operating system, it delivers hi-speed performance. You can take advantage of two distinct networks using its dual SIM feature.&nbsp;', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 5, 0, 3, 'l8kcmEDDS.jpg/**/l1LNASgW5t.jpg/**/l3FFFPdKOG.jpg/**/l4Xi4I4nLG.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:25:31'),
(31, 'Lenovo S580 8GB Black', 1, 1, 2, 6, 8775, 1599, 82, 7176, '2016-06-09 12:29:29', '2016-07-07 12:29:29', '2016-07-29', 'From clicking high-resolution images to recording HD videos, making video calls to fast-speed web browsing, Lenovo S580 Smartphone does it all seamlessly. An affordable smartphone with advanced features, it comes with a large 5 inch HD display screen and quad-core 1.2 GHz processor. With 1 GB RAM and Android 4.3 Jellybean, it delivers hi-speed performance. You can take advantage of two distinct networks using its Dual Sim feature.&nbsp;', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 2, 5, 0, 3, 'l9S7beRmYl.jpg/**/l8gw55oWz8.jpg/**/l71NVrP5l4.jpg/**/l54PGrQ3nkU.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:24:41'),
(32, 'Lenovo S850 (16GB, White)', 1, 1, 2, 6, 8290, 599, 93, 7691, '2016-06-09 12:34:59', '2016-07-07 12:34:59', '2016-07-28', 'Designed with advanced features along with a stylish look, the new Lenovo S850 smartphone is ready to amaze you with its excellent performance. Equipped with the latest MTK 6582 1.3 GHz Quad-core PowerVR SGX544 processor along with the new Android™ 4.4.2 KitKat Operating System (OS), this outstanding smartphone facilitates you with seamless multitasking and smooth operating experience. Watch your favourite videos and play graphic intensive games on a bright 12.7 cm (5) capacitive touchscreen of the Lenovo smartphone.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 2, 5, 0, 3, 'mkZTOJ2Y7.jpeg/**/m2ACZ3ggTI.jpg/**/m3OxdOfJQm.jpg/**/m4eYuOlPKI.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:26:19'),
(33, 'Sony Cybershot WX220 Digital Camera', 1, 9, 12, 13, 9350, 799, 91, 8551, '2016-06-09 12:54:40', '2016-07-07 12:54:40', '2016-07-28', 'With Built-In Wi-Fi and full HD (High Definition) recording facility,&nbsp;Sony WX80&nbsp;weighs only 124 grams and can easily slip-on in your pockets. This 16.2 mega pixels Sony Cyber Shot digital camera consists of Exmor® R CMOS Image Sensor and 8x Optical Zoom, which clicks a high quality image with every minute detail.', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 3, 0, 3, 'caUYJkVR80.jpg/**/c3ZaVUa3La.jpg/**/c4JD1G7JA5.jpg/**/c1Hm9jfyzf.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:25:53'),
(34, 'Highlander Blue Slim Fit Shirt', 2, 2, 4, 1, 599, 99, 83, 500, '2016-06-09 13:26:26', '2016-07-07 13:26:26', '2016-07-29', 'Blue and red checked&nbsp;casual shirt, has a spread collar, a full button placket, long sleeves with roll-up tab features, a patch pocket,&nbsp;a curved hem', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'sQsvf4PxO.jpg/**/s2dlBvVg9Q.jpg/**/s3eGWHrSDL.jpg/**/s34yG5674ZE.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:57:28'),
(35, 'Red Sandals For Kids', 4, 6, 13, 14, 250, 59, 76, 191, '2016-06-09 13:37:35', '2016-07-08 13:37:35', '2016-07-29', 'Your little one will look all grown up with this baby sandal from Little''s. Neutral enough to wear with anything, the cushioning foot bed will mould to your child’s foot making this sandal super comfortable.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, '1hpR6EfeT.jpg/**/2v2T09d0d.jpg/**/5tcqxIu0b.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 14:58:27'),
(36, 'Yellow Solid Tops', 3, 7, 10, 4, 699, 99, 86, 600, '2016-06-13 13:41:33', '2016-07-07 13:41:33', '2016-07-29', '<div>Double your fashion flair as you wear this top, in white coloured, from the house of Ar2. Fashioned using cotton blend, this top will keep you at comfort all day long. This beautiful creation will give you a trendy look when clubbed with matching leggings and sandals.</div>', 9, 1, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 2, 5, 0, 3, 'yFbnmih72.jpg/**/y1nj18U3O0.jpg/**/y3aPSmqfBz.jpg/**/y4G1NkDTiq.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:25:04'),
(37, 'Red Solid Tops', 3, 7, 10, 4, 799, 199, 75, 600, '2016-06-09 13:50:40', '2016-07-07 13:50:40', '2016-07-29', '<div>Double your fashion flair wearing this red coloured top from the house of Lynda. Fashioned using georgette, this top will keep you at comfort all day long. Designed to perfection, this classy top will look great when clubbed with trousers and black pumps.</div>', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'ryZ8CWSJJ.jpg/**/3pPDMTGma.jpg/**/2Dq1y5Y5P.jpg/**/riRzYCTkr.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:58:47'),
(38, 'Yellow Striped Tops', 3, 7, 10, 4, 699, 99, 86, 600, '2016-06-09 13:57:02', '2016-07-07 13:57:02', '2016-07-29', '<div>Look like an enchanting beauty as you make your way for a dinner outing with your friends wearing this yellow top from Fabindia. Made from khadi cotton, this short top features a high neck with tiny cut out detail on the shoulders and has tiny pleats on the front yoke. It also has full sleeves and comes in regular fit. This chequered top &nbsp;can be teamed with a pair of jeans and beige wedges to complete your stylish look.&nbsp;</div>', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 4, 0, 3, 'kghdqgqq8.jpg/**/k2exbZ3unr.jpg/**/k3uq7gUp5x.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 14:59:15'),
(39, 'Samsung Galaxy Core 2 (White)', 1, 1, 1, 10, 6990, 599, 91, 6391, '2016-06-09 14:03:21', '2016-07-08 14:03:21', '2016-07-29', 'Power-packed with high end features along with an impressive design, the new Samsung Galaxy Core 2 4GB Phone is ready to dazzle you with its outstanding performance. Equipped with the latest Android KitKat 4.4.2 operating system along with Quad core 1.2GHz processor, this excellent smartphone thrills you with seamless multitasking and smooth operating experience. Watch your favourite videos and play graphic intensive games on a bright 11.43 cm (4.5) capacitive touchscreen of the Samsung smartphone.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'mtkAQ0cGI.jpg/**/m1z8bSLA8G.jpg/**/mokX5FPz2Y.jpg/**/m43eqbC899a.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 15:00:27'),
(40, 'Samsung Galaxy NFC Sticker', 1, 1, 1, 10, 8990, 599, 93, 8391, '2016-06-09 14:06:48', '2016-07-07 14:06:48', '2016-07-29', 'smartphone which is specially designed for bike riders? Samsung Galaxy J3 8GB 4G gives you an uninterrupted riding experience with its advanced S bike mode. Simply, activate the S bike mode and enjoy riding without worrying about answering your phone calls or checking notifications. This dual SIM smartphone packs all the latest features required by a professional go getter. It comes with a large 12.7 cm (5) super AMOLED display, Android Lollipop Operating system, 4G LTE connectivity, 1.5 GB of RAM plus a powerful 2600 mAh battery that makes it a must-buy. From playing games to working on your business projects, you can do it all with this advanced smartphone brought to you by Samsung. Additionally, it comes along with 1 year Samsung India warranty. &nbsp; &nbsp; &nbsp;', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'sZiSdcxPW.jpg/**/s1qhkjheYy.jpg/**/s2bJucShZJ.jpg/**/s3JrcF9keZ.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 15:01:07'),
(41, 'White Round Neck Top', 3, 7, 10, 4, 399, 59, 85, 340, '2016-06-09 14:13:51', '2016-07-07 14:13:51', '2016-07-29', 'Look trendy with this Tops &nbsp;from Bitterlime. Team it with a chic kurta or a long top and a pair of flats to complete your ensemble', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 3, 'wRDqSvmIf.jpg/**/w3f8XK1Atg.jpg/**/w2ywB53hRZ.jpg/**/w4J4qZzRyu.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 15:01:53'),
(44, 'Johnson''s Avocado Hair Oil', 4, 6, 22, 33, 155, 49, 68, 106, '2016-06-09 14:38:33', '2016-07-07 14:38:33', '2016-07-29', 'Grooming your baby and making him look good shows great care and love on your part. Keep his hair healthy and nourish it with this Johnson’s Baby Avocado Hair Oil.', 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 1, 3, 0, 0, 'hmp6GzHZd.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:58:07'),
(45, 'Johnson''s Baby Powder', 4, 6, 22, 34, 159, 49, 69, 110, '2016-06-09 22:19:28', '2016-07-08 22:19:28', '2016-07-29', 'Himalaya baby lotion has soothing and antimicrobial properties, which keeps your baby''s skin healthy and soft. 1. Protects skin 2. Adds moisture 3. Nourishes skin 4. Key Ingredients: Olive oil, enriched with vitamin E, nourishes, protects and softens skin and prevents chafing. Himalaya''s Baby Cream is specially formulated to protect your little one''s chapped cheeks, ''crawler''s knee'', tender nose and rubbed elbows. 1. It not only moisturize baby''s skin but also preserves its natural softness. 2. Country Mallow, an antioxidant, has nourishing properties and protects baby''s skin from germs. 3. Licorice protects and soothes baby''s skin.', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 4, 0, 2, 'byhnUey1L.jpg/**/byhnUey1L.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 16:43:34'),
(46, 'Chicco Concentrated Fabric Softener ', 4, 6, 22, 34, 341, 159, 53, 182, '2016-06-09 22:25:35', '2016-07-08 22:25:35', '2016-07-29', 'Chicco''s Softener for sensitive skin freshens and softens all baby''s garments without irritating its sensitive skin. The natural additives make the fabrics soft and gently perfumed, without damaging fibres of colours. Dermatological tested, nickel tested, antistatic and biodegradable', 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 1, 4, 0, 2, 'lo30IWAF9xq.jpg/**/lo2YBkYg020.jpg/**//**/', 0, '06/09/2016', 1, '2016-06-17 15:15:03'),
(47, 'Multi Purpose Diaper Shoulder Bag ', 4, 6, 7, 35, 949, 399, 58, 550, '2016-06-09 23:01:51', '2016-07-07 23:01:51', '2016-07-29', 'High Quality Durable Material.Easy to Clean.Adjustable/Removable Shoulder Strap.Beautiful design.Carry Handles.Lightweight and Compact.', 9, 1, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 2, 4, 0, 3, 'bZ2rIjqYE.jpg/**/61aEM8UjwuLWkArpojw._SL1000_/**/b3yjJZe04e.jpg/**/b4AXW8yRfZ.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 15:08:27'),
(48, 'Littly Baby Dungaree Set ', 4, 12, 20, 24, 799, 499, 38, 300, '2016-06-09 23:10:01', '2016-07-08 23:10:01', '2016-07-29', 'Littly presents a cute and adorable baby dungaree set for your little one. Made from soft and comfortable material, this dungaree set comes with a trendy round neck cotton t-shirt with shoulder loops for ease and comfort fit. Dungaree is made of soft corduroy fabric and has adjustable straps with two button closures. The embroidery at the front gives it a stylish look. This dungaree set is an ideal pick for this summer and is available in multiple summer cool colors. Note: Actual product may slightly vary in terms of color / design and will be shipped based on availability.', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 1, 5, 0, 2, 'bdA5Kr5OXk.jpg/**/bd1vWXy881I.jpg/**/bd3BhyjbtbA.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 15:13:58'),
(49, 'Baby Boys'' Denim Clothing Set', 4, 12, 20, 24, 599, 399, 33, 200, '2016-06-09 23:16:50', '2016-07-08 23:16:50', '2016-07-29', 'This is a regular fit baby boys top and dungaree is made of denim material and also has half sleeve and a round neck. It is best suitable for casual wear.', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 1, 4, 0, 3, 'dQeaErVRi.jpg/**/4TkxgVYTQ.jpg/**/2rhoSsaxj.jpg/**/d3ANGDMCZI.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 15:14:43'),
(50, 'Princess Flower Petal Tulle Dress ', 4, 12, 20, 23, 1999, 699, 65, 1300, '2016-06-09 23:27:36', '2016-07-07 23:27:36', '2016-07-29', 'Make your little girl look stylish and pretty in this comfortable rose petals style tulle dress with embedded pearl like beads for a rich look and lace dress. Sleeveless Lace tulle dress with pearl like beads adds to the beauty. Its a perfect summer party dress.', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 1, 4, 0, 3, 'drjc9TOuOwI.jpg/**/7soYpTKOi.jpg/**/hgcbkeAJA.jpg/**/55IwcjJHFg.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:23:57'),
(51, 'Pinehill Cuffed Booties & Mittens Set', 4, 6, 13, 14, 425, 229, 46, 196, '2016-06-09 23:46:43', '2016-07-07 23:46:43', '2016-07-29', 'Let your cute little one stay cozy in the cold anytime in this mitten and booties set form Pinehill. This cute set booties and mittens is perfect for babies on the go. The cute solid color dual shade makes it even more cute and stylish. This cuffed ribbed style adds an element of cuteness to this set. It is specially designed to keep your baby warm and stylish while you are in the park or just strolling. Made up of high quality fabric which is soft and gentle on your baby''s skin.&nbsp;<br>', 12, 5, 'Globalite Strike Navy Casual Shoes', 'Globalite continually creates what is aspired and not just what is necessary. All of its products are meant to deliver high performance, durability and great comfort.', 1, 3, 0, 3, 'bIr0144NC.jpg/**/b5dulzFqdA.jpg/**/b3N7oBLSQ9.jpg/**/b2O7dO0bmn.jpg/**/', 0, '06/09/2016', 1, '2016-06-17 14:59:39'),
(52, 'Women''s Viscose Dhoti', 3, 4, 6, 29, 1199, 699, 42, 500, '2016-06-09 23:53:51', '2016-07-08 23:53:51', '2016-07-29', '<div>Rajnandini Combo Of 4 Plain Women Leggings gives a trenty look.</div>', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 2, 6, 0, 2, '1x0QJmjT3.jpg/**/2KGEokUlH.jpg/**/3RcFF0Td1.jpg/**/', 0, '06/10/2016', 1, '2016-06-17 15:00:02'),
(53, 'Pannkh Women Pack of 3 Leggings', 3, 4, 6, 29, 699, 399, 43, 300, '2016-06-10 00:09:12', '2016-07-08 00:09:12', '2016-07-29', '<div><div><div><div><div>These versatile churidar leggings from Pannkh are a must-have in your ethnic wear staples. Team them with a kurta and flats to look your best.<br></div></div></div></div></div><div></div><div><div></div></div>', 12, 5, 'Trinity Place Department Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play. There is also a selection of signature funky neon leather handbags that are reasonably priced and make a statement.', 1, 4, 0, 3, 'l7qMGfTnz3.jpg/**/l1KjSysSqL.jpg/**/k8lvyOynnK.jpg/**/l7GvGaaA0Z.jpg/**/', 0, '06/10/2016', 0, '2016-06-17 15:14:20'),
(54, 'Johnsons  Baby Shampoo (400ml)', 4, 6, 22, 33, 150, 99, 34, 51, '2016-06-13 13:39:15', '2016-07-08 13:39:15', '2016-07-29', 'Baby Soap helps moisturise your baby''s delicate skin by reducing moisture loss while cleansing it ever so gently. Gentle care your baby''s delicate skin needs in the growing years.<br>', 9, 1, 'Rosan Bag Mall in Coimbtore', 'Rosan Bag Mall in Coimbtore', 2, 4, 0, 0, 'sKQni1Lqa.jpg/**/', 0, '06/13/2016', 1, '2016-06-17 15:13:33'),
(55, 'Johnson''s Baby Powder 700 g', 4, 6, 22, 33, 200, 159, 21, 41, '2016-06-14 10:28:37', '2016-07-08 10:28:37', '2016-07-29', 'Johnson &amp; Johnson is an American multinational medical devices, pharmaceutical and consumer packaged goods manufacturer founded in 1886. Johnson &amp; Johnson''s brands include numerous household names of medications and first aid supplies. Among its well-known consumer products are the Band-Aid Brand line of bandages, Tylenol medications, Johnson''s baby products, Neutrogena skin and beauty products, Clean &amp; Clear facial wash and Acuvue contact lenses.', 12, 5, 'Rosan Bag Mall in Coimbatore', 'Rosan Bag Mall in Coimbatore', 1, 4, 0, 0, 'gL7be9HJC.jpg/**/', 0, '06/14/2016', 1, '2016-06-17 15:12:56'),
(56, 'John Players Blue Cotton T-Shirt', 2, 2, 3, 7, 599, 399, 33, 200, '2016-06-14 11:20:54', '2016-12-15 11:20:54', '2017-02-15', 'John Players offers a complete fashion wardrobe to the male youth of today. The brand stands for style, charisma and attitude and brings them into your wardrobe with its vibrant yet relaxed collection. Incorporating the most contemporary trends with a splash of youthful energy, playful styling &amp; trendy collections, John Players knows the pulse of the youth and offers clothing for the discerning youth. John Players offers complete range in men''s apparel with the coolness quotient being an inseparable part of its genes.Offering vibrant wardrobe essentials spanning across Formal wear, Casual wear, Party wear, Jeans &amp; Accessories, John Players has everything that appeals to the new generation.', 12, 5, 'Rosan Bag Mall in Coimbatore', 'Rosan Bag Mall in Coimbatore', 1, 4, 0, 2, 'ttqoYMapiD.jpg/**/ttqoYMapiD.jpg/**//**/', 0, '06/14/2016', 1, '2016-07-16 13:02:23'),
(57, 'mob', 1, 8, 11, 5, 500, 20, 96, 480, '2016-09-07 17:16:20', '2016-09-10 17:16:20', '2016-09-15', 'dscription', 15, 11, 'test shop\r\nclock\r\n', 'Meta description*', 5, 10, 0, 0, '12994318_1120388151339038_3085805154032470004_ndMy1wig8.jpg/**/', 0, '09/07/2016', 1, '2016-09-07 20:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `nm_emailsetting`
--

CREATE TABLE IF NOT EXISTS `nm_emailsetting` (
  `es_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `es_contactname` varchar(150) NOT NULL,
  `es_contactemail` varchar(150) NOT NULL,
  `es_webmasteremail` varchar(150) NOT NULL,
  `es_noreplyemail` varchar(150) NOT NULL,
  `es_phone1` varchar(20) NOT NULL,
  `es_phone2` varchar(20) NOT NULL,
  `es_latitude` decimal(18,14) NOT NULL,
  `es_longitude` decimal(18,14) NOT NULL,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_emailsetting`
--

INSERT INTO `nm_emailsetting` (`es_id`, `es_contactname`, `es_contactemail`, `es_webmasteremail`, `es_noreplyemail`, `es_phone1`, `es_phone2`, `es_latitude`, `es_longitude`) VALUES
(1, 'Nitish Mishra ABC', 'sales@nitish.com', 'sales@nitishabc.com', 'sales@nitishdef.com', '+919790153111', '+1 (972) 591 8222', '11.01680000000000', '76.95580000000000');

-- --------------------------------------------------------

--
-- Table structure for table `nm_enquiry`
--

CREATE TABLE IF NOT EXISTS `nm_enquiry` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(50) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `nm_enquiry`
--

INSERT INTO `nm_enquiry` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_date`) VALUES
(1, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'Test Demo', 0, ''),
(2, 'fgfdgdf', 'dfhdfhd@gmail.com', '1234567890', 'dfsgsfgfgfdh', 0, ''),
(5, 'yuyuy', 'pofidevelopmentyuyuy@gmail.com', '8883152529', 'teerdt', 1, '06/04/2016'),
(7, 'ilakkiya m', 'il@gm.com', '8883152529', 'rttrtr', 1, '06/03/2016'),
(8, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi', 0, ''),
(9, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi', 0, ''),
(10, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi', 0, ''),
(11, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi', 0, ''),
(12, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi', 0, ''),
(13, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi', 0, ''),
(14, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'twest', 0, ''),
(15, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'test', 0, ''),
(16, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'test', 0, ''),
(17, 'Amit', 'amit.srivastava@tradebooster.com', '9350352736', 'Hi,\r\n\r\nWe would link to purchase comment with star rating plugin.\r\n\r\nPlease confirm cost.', 0, ''),
(18, 'raj', 'kumar@pofitec.com', '12131232', 'test', 0, ''),
(19, 'Teresa', 'rlbojfanxv@meldram.com', 'http://v-doc.co/nm/txxrz', 'I was just looking at your eCommerce Software; Shopping Cart Software | Laravel E Commerce website and see that your website has the potential to become very popular. I just want to tell you, In case you don''t already know... There is a website service which already has more than 16 million users, and most of the users are interested in websites like yours. By getting your site on this service you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can find out more about it here: http://hothor.se/1gj55 - Now, let me ask you... Do you need your website to be successful to maintain your business? Do you need targeted traffic who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your site? If your answer is YES, you can achieve these things only if you get your website on the service I am describing. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything at all. All the popular websites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That''s how running a successful website works... Here''s to your success! Find out more here: http://www.v-diagram.com/2sv1p', 0, ''),
(20, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'fgdfgdfg', 0, ''),
(21, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'fgdfgdfgfdgfdgfd', 0, ''),
(22, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'ghjghjghjghj', 0, ''),
(23, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'ghjghjghjghj', 0, ''),
(24, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'ghjghjghjghj', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nm_estimate_zipcode`
--

CREATE TABLE IF NOT EXISTS `nm_estimate_zipcode` (
  `ez_id` int(11) NOT NULL AUTO_INCREMENT,
  `ez_code_series` int(11) NOT NULL,
  `ez_code_series_end` int(11) NOT NULL,
  `ez_code_days` int(11) NOT NULL,
  `ez_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ez_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nm_estimate_zipcode`
--

INSERT INTO `nm_estimate_zipcode` (`ez_id`, `ez_code_series`, `ez_code_series_end`, `ez_code_days`, `ez_status`) VALUES
(1, 641001, 641051, 2, 1),
(2, 642001, 642001, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_faq`
--

CREATE TABLE IF NOT EXISTS `nm_faq` (
  `faq_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `faq_name` varchar(100) NOT NULL,
  `faq_ans` text NOT NULL,
  `faq_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nm_faq`
--

INSERT INTO `nm_faq` (`faq_id`, `faq_name`, `faq_ans`, `faq_status`) VALUES
(1, 'Wondering where to sell online?', 'Dip Multivendor is the best place to sell online and make money. With over 100 million buyers, Dip Multivendoris one of the world''s largest online marketplaces. With so many buyers, Dip Multivendor gives you the opportunity to find more buyers to pay you more for your items.', 1),
(2, 'What is a product detail page?', 'A product detail page is the place where customers read details about a product for sale on Dip Multivendor. It includes the product image, price, description, customer reviews, ordering options, and the link to view offers from all sellers.', 1),
(3, 'Why do I need to create a product detail page?', 'Dip Multivendor has one of the largest online product catalogs. But we don''t have everything. If you can''t find a product detail page on Dip Multivendor for something you''d like to sell, then you need to create one. Once created, the product detail page will be available onDip Multivendor for you to sell your inventory, and other sellers can also use too.', 0),
(4, 'What will the product detail page I create look like?', 'The product detail page you create will look like any other product page on Dip Multivendor. By creating pages that use a standard format, customers can more easily evaluate the products they want to buy.', 0),
(5, 'How do I create a product detail page?', 'First, you confirm that your product isn''t already listed on Dip Multivendor. Second, you identify the product category and describe it. Third and last, you set the price and condition for each item. For more information, ', 0),
(6, 'What information can I include in my product description?', 'You are allowed 2,000 characters to describe your product. For some product categories, you also have five key product features (bullets) of 100 characters each for highlighting significant product attributes. ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_generalsetting`
--

CREATE TABLE IF NOT EXISTS `nm_generalsetting` (
  `gs_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `gs_sitename` varchar(100) NOT NULL,
  `gs_metatitle` varchar(150) NOT NULL,
  `gs_metakeywords` text NOT NULL,
  `gs_metadesc` text NOT NULL,
  `gs_defaulttheme` tinyint(3) unsigned NOT NULL,
  `gs_defaultlanguage` tinyint(3) unsigned NOT NULL,
  `gs_payment_status` varchar(50) NOT NULL,
  `gs_themes` varchar(20) NOT NULL,
  PRIMARY KEY (`gs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_generalsetting`
--

INSERT INTO `nm_generalsetting` (`gs_id`, `gs_sitename`, `gs_metatitle`, `gs_metakeywords`, `gs_metadesc`, `gs_defaulttheme`, `gs_defaultlanguage`, `gs_payment_status`, `gs_themes`) VALUES
(1, 'Laravel Ecommerce', 'Laravel Ecommerce', 'Laravel Ecommerce Multivendor', 'Laravel Ecommerce Multivendor', 1, 1, 'COD', 'green');

-- --------------------------------------------------------

--
-- Table structure for table `nm_imagesetting`
--

CREATE TABLE IF NOT EXISTS `nm_imagesetting` (
  `imgs_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `imgs_name` varchar(150) NOT NULL,
  `imgs_type` tinyint(4) NOT NULL COMMENT '1- logo,2 -Favicon,3-noimage',
  PRIMARY KEY (`imgs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nm_imagesetting`
--

INSERT INTO `nm_imagesetting` (`imgs_id`, `imgs_name`, `imgs_type`) VALUES
(1, 'logoZqQiMSA4.png', 1),
(2, 'BMW-logoTx8RI1xu.png', 2),
(3, 'EmptycLdH190y.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nm_inquiries`
--

CREATE TABLE IF NOT EXISTS `nm_inquiries` (
  `iq_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iq_name` varchar(100) NOT NULL,
  `iq_emailid` varchar(150) NOT NULL,
  `iq_phonenumber` varchar(20) NOT NULL,
  `iq_message` varchar(300) NOT NULL,
  `inq_readstatus` int(11) NOT NULL DEFAULT '0' COMMENT '0-not read 1 read',
  PRIMARY KEY (`iq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nm_inquiries`
--

INSERT INTO `nm_inquiries` (`iq_id`, `iq_name`, `iq_emailid`, `iq_phonenumber`, `iq_message`, `inq_readstatus`) VALUES
(1, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'Test File', 1),
(2, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'dfhdhdf', 1),
(3, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'sdfgfshdfh', 1),
(4, 'cffdh', 'dfhdfhfd@gmail.com', '56465456', 'dsgdgsdgsd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_language`
--

CREATE TABLE IF NOT EXISTS `nm_language` (
  `la_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `la_code` varchar(7) NOT NULL,
  `la_name` varchar(30) NOT NULL,
  `la_active` tinyint(4) NOT NULL,
  UNIQUE KEY `id` (`la_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_login`
--

CREATE TABLE IF NOT EXISTS `nm_login` (
  `log_id` int(5) NOT NULL AUTO_INCREMENT,
  `cus_id` int(5) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_type` int(11) NOT NULL DEFAULT '1' COMMENT '1-wesite,2 facebook',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=313 ;

--
-- Dumping data for table `nm_login`
--

INSERT INTO `nm_login` (`log_id`, `cus_id`, `log_date`, `log_type`) VALUES
(1, 2, '2014-08-09 05:46:12', 1),
(2, 4, '2014-08-11 23:07:20', 1),
(3, 1, '2014-08-11 23:08:36', 1),
(4, 1, '2014-08-11 23:38:03', 1),
(5, 1, '2014-08-11 23:40:12', 1),
(6, 1, '2014-08-11 23:52:03', 1),
(7, 1, '2014-08-12 00:03:43', 1),
(8, 1, '2014-08-12 00:25:54', 1),
(9, 5, '2014-08-12 01:25:16', 1),
(10, 1, '2014-08-12 22:41:56', 1),
(11, 1, '2014-08-12 23:12:51', 1),
(12, 1, '2014-08-13 00:13:15', 1),
(13, 1, '2014-08-17 23:45:10', 1),
(14, 1, '2014-08-18 04:15:54', 1),
(15, 1, '2014-08-19 00:09:47', 1),
(16, 21, '2014-08-20 22:21:20', 1),
(17, 21, '2014-08-22 22:33:16', 1),
(18, 7, '2014-08-27 22:41:28', 1),
(19, 7, '2014-08-27 22:42:08', 1),
(20, 1, '2014-09-03 04:46:15', 1),
(21, 1, '2014-09-03 04:57:41', 1),
(22, 1, '2014-09-03 04:58:26', 1),
(23, 26, '2014-09-03 05:01:06', 1),
(24, 42, '2014-11-24 12:04:30', 1),
(25, 40, '2014-11-24 13:00:14', 1),
(26, 40, '2014-11-24 17:20:46', 1),
(27, 46, '2015-04-25 13:14:12', 1),
(28, 48, '2015-04-25 13:18:06', 1),
(29, 46, '2015-04-25 13:19:02', 1),
(30, 53, '2015-07-05 05:45:14', 1),
(31, 64, '2015-11-18 10:22:11', 1),
(32, 76, '2015-11-18 12:32:25', 1),
(33, 76, '2015-11-18 12:36:21', 1),
(34, 76, '2015-11-18 12:46:03', 1),
(35, 76, '2015-11-18 12:48:44', 1),
(36, 76, '2015-11-18 13:35:30', 1),
(37, 76, '2015-11-18 14:02:46', 1),
(38, 76, '2015-11-19 05:11:05', 1),
(39, 76, '2015-11-19 09:55:47', 1),
(40, 76, '2015-11-19 10:24:13', 1),
(41, 77, '2015-11-19 11:18:29', 1),
(42, 92, '2015-12-17 07:00:24', 1),
(43, 94, '2015-12-19 22:06:05', 1),
(44, 96, '2015-12-29 07:35:59', 1),
(45, 99, '2016-01-06 04:07:19', 1),
(46, 96, '2016-01-08 09:53:52', 1),
(47, 96, '2016-01-09 08:07:52', 1),
(48, 96, '2016-01-09 08:08:38', 1),
(49, 96, '2016-01-09 08:13:43', 1),
(50, 96, '2016-01-09 08:13:43', 1),
(51, 106, '2016-01-21 07:24:55', 1),
(52, 106, '2016-01-22 06:42:28', 1),
(53, 107, '2016-01-27 07:59:32', 1),
(54, 109, '2016-01-29 07:11:26', 1),
(55, 119, '2016-02-21 03:29:24', 1),
(56, 122, '2016-02-23 11:48:39', 1),
(57, 122, '2016-02-23 12:29:45', 1),
(58, 124, '2016-02-26 05:08:21', 1),
(59, 125, '2016-02-26 12:33:57', 1),
(60, 131, '2016-03-09 12:05:48', 1),
(61, 124, '2016-03-11 09:49:45', 1),
(62, 124, '2016-03-11 09:50:42', 1),
(63, 134, '2016-03-15 05:04:54', 1),
(64, 134, '2016-03-15 10:18:01', 1),
(65, 137, '2016-03-15 11:53:12', 1),
(66, 137, '2016-03-15 12:58:45', 1),
(67, 141, '2016-03-16 15:57:43', 1),
(68, 142, '2016-03-17 11:54:40', 1),
(69, 146, '2016-03-17 12:48:03', 1),
(70, 146, '2016-03-17 12:51:18', 1),
(71, 160, '2016-03-21 08:11:22', 1),
(72, 160, '2016-03-21 12:21:38', 1),
(73, 163, '2016-03-21 12:49:15', 1),
(74, 164, '2016-03-23 03:05:04', 1),
(75, 3, '2016-04-20 10:24:36', 1),
(76, 1, '2016-04-21 07:25:49', 1),
(77, 4, '2016-04-27 04:33:34', 1),
(78, 4, '2016-04-27 04:34:36', 1),
(79, 4, '2016-04-27 04:37:47', 1),
(80, 4, '2016-04-27 04:57:53', 1),
(81, 7, '2016-05-05 12:22:36', 1),
(82, 7, '2016-05-05 12:22:37', 1),
(83, 8, '2016-05-20 06:36:22', 1),
(84, 14, '2016-05-27 06:31:05', 1),
(85, 15, '2016-05-28 04:35:28', 1),
(86, 15, '2016-05-28 05:26:00', 1),
(87, 15, '2016-05-28 05:36:54', 1),
(88, 15, '2016-05-28 06:37:27', 1),
(89, 15, '2016-05-28 07:43:24', 1),
(90, 15, '2016-05-28 07:55:02', 1),
(91, 15, '2016-05-28 09:42:15', 1),
(92, 15, '2016-05-28 10:10:43', 1),
(93, 16, '2016-05-28 10:17:49', 1),
(94, 16, '2016-05-28 10:20:12', 1),
(95, 15, '2016-05-28 10:25:38', 1),
(96, 16, '2016-05-28 12:38:58', 1),
(97, 15, '2016-05-28 12:41:21', 1),
(98, 15, '2016-05-28 12:41:25', 1),
(99, 15, '2016-05-28 12:41:32', 1),
(100, 15, '2016-05-28 12:41:33', 1),
(101, 16, '2016-05-28 12:41:53', 1),
(102, 16, '2016-05-28 12:41:55', 1),
(103, 16, '2016-05-28 12:41:56', 1),
(104, 16, '2016-05-28 12:42:18', 1),
(105, 16, '2016-05-28 12:43:16', 1),
(106, 16, '2016-05-28 13:07:44', 1),
(107, 16, '2016-05-30 04:41:05', 1),
(108, 15, '2016-05-30 04:50:46', 1),
(109, 16, '2016-05-30 04:54:36', 1),
(110, 16, '2016-05-30 06:09:35', 1),
(111, 16, '2016-05-30 06:41:30', 1),
(112, 16, '2016-05-30 07:15:56', 1),
(113, 16, '2016-05-30 07:23:25', 1),
(114, 18, '2016-05-30 07:33:09', 1),
(115, 19, '2016-05-31 02:30:57', 1),
(116, 19, '2016-05-31 02:32:37', 1),
(117, 19, '2016-05-31 02:42:13', 1),
(118, 19, '2016-05-31 16:43:23', 1),
(119, 19, '2016-05-31 22:35:24', 1),
(120, 20, '2016-05-31 23:03:09', 1),
(121, 19, '2016-06-01 00:41:29', 1),
(122, 20, '2016-06-01 02:03:31', 1),
(123, 19, '2016-06-02 18:58:47', 1),
(124, 19, '2016-06-03 10:30:02', 1),
(125, 19, '2016-06-03 10:59:57', 1),
(126, 19, '2016-06-03 12:07:19', 1),
(127, 19, '2016-06-03 12:19:57', 1),
(128, 19, '2016-06-03 12:19:59', 1),
(129, 19, '2016-06-03 12:20:00', 1),
(130, 19, '2016-06-03 12:20:02', 1),
(131, 19, '2016-06-03 12:20:05', 1),
(132, 19, '2016-06-03 12:20:05', 1),
(133, 19, '2016-06-03 12:20:06', 1),
(134, 19, '2016-06-02 16:44:03', 1),
(135, 19, '2016-06-04 01:45:46', 1),
(136, 19, '2016-06-03 13:40:06', 1),
(137, 19, '2016-06-03 15:52:48', 1),
(138, 19, '2016-06-03 16:20:24', 1),
(139, 19, '2016-06-03 16:24:11', 1),
(140, 19, '2016-06-04 06:41:09', 1),
(141, 15, '2016-06-04 06:43:20', 1),
(142, 15, '2016-06-04 07:13:27', 1),
(143, 14, '2016-06-04 08:25:04', 1),
(144, 15, '2016-06-06 12:34:12', 1),
(145, 19, '2016-06-06 12:36:48', 1),
(146, 19, '2016-06-06 17:55:41', 1),
(147, 21, '2016-06-07 07:55:19', 1),
(148, 21, '2016-06-07 08:10:58', 1),
(149, 14, '2016-06-07 08:15:28', 1),
(150, 14, '2016-06-07 09:38:39', 1),
(151, 21, '2016-06-07 09:39:57', 1),
(152, 14, '2016-06-07 13:40:32', 1),
(153, 14, '2016-06-07 14:33:56', 1),
(154, 14, '2016-06-08 05:02:02', 1),
(155, 23, '2016-06-08 11:38:39', 1),
(156, 23, '2016-06-08 12:07:08', 1),
(157, 24, '2016-06-09 06:01:43', 1),
(158, 24, '2016-06-09 07:52:18', 1),
(159, 24, '2016-06-09 11:39:10', 1),
(160, 23, '2016-06-10 04:41:24', 1),
(161, 23, '2016-06-10 05:23:15', 1),
(162, 24, '2016-06-10 05:58:56', 1),
(163, 23, '2016-06-10 06:53:43', 1),
(164, 23, '2016-06-10 07:07:01', 1),
(165, 23, '2016-06-10 08:12:56', 1),
(166, 23, '2016-06-10 08:19:09', 1),
(167, 23, '2016-06-10 08:35:14', 1),
(168, 24, '2016-06-10 08:36:41', 1),
(169, 23, '2016-06-10 09:21:46', 1),
(170, 23, '2016-06-10 09:46:05', 1),
(171, 24, '2016-06-10 09:47:20', 1),
(172, 23, '2016-06-10 09:51:29', 1),
(173, 24, '2016-06-10 10:04:33', 1),
(174, 25, '2016-06-10 10:07:42', 1),
(175, 25, '2016-06-10 10:16:33', 1),
(176, 25, '2016-06-10 10:18:53', 1),
(177, 24, '2016-06-10 10:22:12', 1),
(178, 25, '2016-06-10 10:34:17', 1),
(179, 25, '2016-06-10 10:46:44', 1),
(180, 27, '2016-06-10 11:23:42', 1),
(181, 25, '2016-06-10 13:12:12', 1),
(182, 25, '2016-06-10 14:46:00', 1),
(183, 28, '2016-06-10 16:14:44', 1),
(184, 28, '2016-06-11 04:26:29', 1),
(185, 23, '2016-06-11 04:59:56', 1),
(186, 28, '2016-06-11 05:16:21', 1),
(187, 30, '2016-06-11 05:44:53', 1),
(188, 30, '2016-06-11 05:55:08', 1),
(189, 28, '2016-06-11 06:37:04', 1),
(190, 28, '2016-06-11 07:03:38', 1),
(191, 25, '2016-06-11 07:25:51', 1),
(192, 23, '2016-06-11 07:33:36', 1),
(193, 31, '2016-06-11 07:49:01', 1),
(194, 25, '2016-06-11 07:51:09', 1),
(195, 31, '2016-06-11 07:56:32', 1),
(196, 23, '2016-06-15 06:34:20', 1),
(197, 25, '2016-06-15 12:11:13', 1),
(198, 34, '2016-06-16 09:39:44', 1),
(199, 25, '2016-06-17 06:03:58', 1),
(200, 23, '2016-06-18 06:53:31', 1),
(201, 23, '2016-06-18 06:54:27', 1),
(202, 43, '2016-06-21 09:07:04', 1),
(203, 23, '2016-06-21 09:16:31', 1),
(204, 23, '2016-06-21 09:17:34', 1),
(205, 23, '2016-06-21 09:53:21', 1),
(206, 43, '2016-06-21 10:00:28', 1),
(207, 48, '2016-06-21 10:06:34', 1),
(208, 51, '2016-06-21 10:23:29', 1),
(209, 25, '2016-06-21 10:38:51', 1),
(210, 25, '2016-06-22 10:27:25', 1),
(211, 25, '2016-06-22 10:33:57', 1),
(212, 25, '2016-06-22 13:43:25', 1),
(213, 42, '2016-06-22 13:51:40', 1),
(214, 42, '2016-06-22 13:57:59', 1),
(215, 42, '2016-06-22 14:36:06', 1),
(216, 25, '2016-06-22 14:42:19', 1),
(217, 60, '2016-06-22 20:35:47', 1),
(218, 61, '2016-06-23 02:45:02', 1),
(219, 25, '2016-06-23 04:54:24', 1),
(220, 74, '2016-06-23 07:32:56', 1),
(221, 75, '2016-06-23 07:42:05', 1),
(222, 42, '2016-06-23 08:20:57', 1),
(223, 25, '2016-06-23 09:11:39', 1),
(224, 76, '2016-06-25 04:28:38', 1),
(225, 76, '2016-06-25 04:30:06', 1),
(226, 76, '2016-06-25 05:13:12', 1),
(227, 76, '2016-06-25 05:18:35', 1),
(228, 76, '2016-06-28 10:46:31', 1),
(229, 76, '2016-06-28 10:48:42', 1),
(230, 76, '2016-06-28 11:15:11', 1),
(231, 76, '2016-06-28 13:30:44', 1),
(232, 76, '2016-06-28 13:37:29', 1),
(233, 76, '2016-07-01 05:24:42', 1),
(234, 76, '2016-07-01 05:29:23', 1),
(235, 76, '2016-07-01 05:29:23', 1),
(236, 25, '2016-07-01 05:31:15', 1),
(237, 76, '2016-07-01 05:39:01', 1),
(238, 76, '2016-07-01 06:24:45', 1),
(239, 79, '2016-07-02 04:29:23', 1),
(240, 76, '2016-07-02 05:37:59', 1),
(241, 76, '2016-07-02 11:16:28', 1),
(242, 42, '2016-07-04 06:52:20', 1),
(243, 81, '2016-07-09 13:58:50', 1),
(244, 42, '2016-07-12 13:02:07', 1),
(245, 42, '2016-07-12 13:02:08', 1),
(246, 42, '2016-07-12 13:02:09', 1),
(247, 42, '2016-07-12 13:02:09', 1),
(248, 42, '2016-07-12 13:02:09', 1),
(249, 42, '2016-07-12 13:02:09', 1),
(250, 82, '2016-07-12 13:10:55', 1),
(251, 25, '2016-07-15 05:42:18', 1),
(252, 25, '2016-07-15 07:45:11', 1),
(253, 28, '2016-07-26 05:46:48', 1),
(254, 25, '2016-07-29 08:04:38', 1),
(255, 25, '2016-07-29 08:05:36', 1),
(256, 25, '2016-08-01 07:46:00', 1),
(257, 25, '2016-08-01 08:11:49', 1),
(258, 28, '2016-08-11 10:53:02', 1),
(259, 95, '2016-08-17 06:43:30', 1),
(260, 96, '2016-08-17 09:24:35', 1),
(261, 96, '2016-08-17 09:41:05', 1),
(262, 96, '2016-08-19 13:51:57', 1),
(263, 99, '2016-08-23 09:45:48', 1),
(264, 99, '2016-08-23 09:53:01', 1),
(265, 100, '2016-08-25 06:32:10', 1),
(266, 100, '2016-08-25 12:02:07', 1),
(267, 84, '2016-08-25 12:50:16', 1),
(268, 84, '2016-08-29 10:52:40', 1),
(269, 104, '2016-08-30 15:10:02', 1),
(270, 104, '2016-08-30 16:07:39', 1),
(271, 25, '2016-09-07 13:10:42', 1),
(272, 106, '2016-09-12 18:10:52', 1),
(273, 108, '2016-09-25 06:31:20', 1),
(274, 109, '2016-09-26 04:19:29', 1),
(275, 109, '2016-09-26 09:49:27', 1),
(276, 110, '2016-09-26 21:28:45', 1),
(277, 110, '2016-09-28 00:02:11', 1),
(278, 42, '2016-09-30 07:49:16', 1),
(279, 42, '2016-09-30 07:51:33', 1),
(280, 111, '2016-10-03 03:10:35', 1),
(281, 113, '2016-10-16 02:51:19', 1),
(282, 114, '2016-10-16 04:06:48', 1),
(283, 115, '2016-10-17 16:17:54', 1),
(284, 84, '2016-10-19 13:14:54', 1),
(285, 84, '2016-11-01 01:48:56', 1),
(286, 84, '2016-11-01 04:50:44', 1),
(287, 84, '2016-11-01 04:52:15', 1),
(288, 84, '2016-11-02 02:17:03', 1),
(289, 84, '2016-11-02 04:36:09', 1),
(290, 84, '2016-11-02 06:10:05', 1),
(291, 84, '2016-11-02 06:10:23', 1),
(292, 84, '2016-11-03 04:48:18', 1),
(293, 84, '2016-11-09 22:22:39', 1),
(294, 84, '2016-11-09 22:53:51', 1),
(295, 84, '2016-11-09 22:55:10', 1),
(296, 84, '2016-11-10 02:10:29', 1),
(297, 84, '2016-11-10 02:24:41', 1),
(298, 84, '2016-11-10 02:34:11', 1),
(299, 84, '2016-11-10 02:34:38', 1),
(300, 84, '2016-11-10 02:35:23', 1),
(301, 124, '2016-11-15 06:33:26', 1),
(302, 124, '2016-11-15 13:23:13', 1),
(303, 124, '2016-11-15 13:24:01', 1),
(304, 125, '2016-11-15 13:25:01', 1),
(305, 125, '2016-11-15 13:26:01', 1),
(306, 125, '2016-11-15 13:47:44', 1),
(307, 125, '2016-11-15 13:56:47', 1),
(308, 125, '2016-11-15 13:57:21', 1),
(309, 125, '2016-11-15 14:01:59', 1),
(310, 84, '2016-11-15 14:07:20', 1),
(311, 84, '2016-11-16 04:25:46', 1),
(312, 84, '2016-11-16 04:37:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_maincategory`
--

CREATE TABLE IF NOT EXISTS `nm_maincategory` (
  `mc_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `mc_name` varchar(100) NOT NULL,
  `mc_type` varchar(10) NOT NULL,
  `mc_img` varchar(150) NOT NULL,
  `mc_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nm_maincategory`
--

INSERT INTO `nm_maincategory` (`mc_id`, `mc_name`, `mc_type`, `mc_img`, `mc_status`) VALUES
(2, 'MEN', '1,1,1', 'men-categorymGFooaEh.jpeg', 1),
(3, 'WOMEN', '1,1,1', 'SAREESWEt8bBAo.jpeg', 1),
(4, 'BABY & KIDS', '1,1,1', 'BABYcBdJmJln.jpg', 1),
(5, 'HOME & KITCHEN', '1,1,1', 'dead-shopping-cartfVTnMIGJ.jpg', 1),
(6, 'ELECTRONICS', '1,1,1', 'shopping cart 2ltqacj52.jpg', 1),
(7, 'SPORTS', '1,1,1', 'profilexyUXsTa9.png', 1),
(8, 'AUTO MOBILES', '1,1,1', 'sedan-512xMcVlTeV.png', 1),
(9, 'BOOKS', '1,1,1', 'books-icon-512q6gJrb9I.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_merchant`
--

CREATE TABLE IF NOT EXISTS `nm_merchant` (
  `mer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `addedby` varchar(20) NOT NULL,
  `mer_fname` varchar(150) NOT NULL,
  `mer_lname` varchar(150) NOT NULL,
  `mer_password` varchar(150) NOT NULL,
  `mer_email` varchar(150) NOT NULL,
  `mer_phone` varchar(20) NOT NULL,
  `mer_address1` varchar(150) NOT NULL,
  `mer_address2` varchar(150) NOT NULL,
  `mer_ci_id` int(10) unsigned NOT NULL COMMENT 'city id',
  `mer_co_id` smallint(5) unsigned NOT NULL COMMENT 'country id',
  `mer_payment` varchar(100) NOT NULL,
  `mer_commission` tinyint(4) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `mer_staus` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-unblock,0-block',
  PRIMARY KEY (`mer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `nm_merchant`
--

INSERT INTO `nm_merchant` (`mer_id`, `addedby`, `mer_fname`, `mer_lname`, `mer_password`, `mer_email`, `mer_phone`, `mer_address1`, `mer_address2`, `mer_ci_id`, `mer_co_id`, `mer_payment`, `mer_commission`, `created_date`, `mer_staus`) VALUES
(9, '0', 'Ganesh', 'kumar', '1234567890', 'charlesvictor.j@pofitec.com', '221657', 'City Main Road', 'Bangaluru', 4, 1, '1234567890', 10, '06/08/2016', 1),
(11, '0', 'mukunth', 'rajan', 'mLmWyiGj', 'rajan@gmail.com', '1234567890', 'j.k road', 'Delhi', 3, 1, '456789123', 10, '06/08/2016', 1),
(12, '0', 'Ravi', 'Kumar', '123456', 'pofidevelopment@gmail.com', '8883152529', 'Ramnagar', 'Gandhipuram', 1, 1, '15600', 2, '06/08/2016', 1),
(13, '12', 'Rajesh', 'Kumar', '0HSaEFbD', 'pofidevelopment1@gmail.com', '7894561230', 'Ganghipuram', 'Ganapathy', 1, 1, '45000', 2, '06/08/2016', 1),
(15, '', 'kumar', 'merchant', '123456', 'kumarkailash075@gmail.com', '5545454545', '75', 'anna street', 0, 1, '1212121212', 2, '', 1),
(16, '', 'charles', 'victor', '4Zdai1Px', 'charlesvictor.j@pofitec.com', '9952440467', 'ramnagar', 'gandipuram', 1, 1, 'charlesvictor.j@pofitec.com', 16, '', 1),
(17, '', 'nljdsnvj', 'jkxnvjsn', 'gGZM5gnB', 'erkprajesh@gmail.com', '1231231231', '12121', 'KJFNSF', 1, 1, 'erkprajesh@gmail.com', 10, '', 1),
(18, '0', 'Rajiv', 'Tandon', '8hUKOtpH', 'rajivlinkites@gmail.com', '8871665475', 'Indiore', 'IOndfeor', 4, 1, '', 10, '08/01/2016', 1),
(19, '', 'Kucau', 'Combro', 'K9wa9R13', 'persero.dana@gmail.com', '082312323123', 'cemput', 'barat', 3, 1, 'persero.dana@gmail.com', 5, '', 1),
(20, '0', 'Ashish', 'Zanwar', 'P1wz8RAR', 'ashish.tantram@gmail.com', '7738254158', 'ghfghfgh', 'fgfgfd', 5, 1, '', 10, '09/18/2016', 1),
(21, '15', 'testmerchantsli', 'testmerch', '8lmsNamc', 'testmerch@test.com', '9999999999', 'first address line', 'second address line', 4, 1, 'testpayment', 50, '10/05/2016', 1),
(22, '', 'knjn', 'njkn', 'xBSuOjCX', 'jkn@ddd.ddd', '878678687687', 'ddd', 'jknjknkn', 1, 1, 'knkjkjnjknkj', 10, '', 1),
(23, '', 'kjnjknj', 'kjnnknjk', 'BrglkSHh', 'j.gerbes@me.com', '878798789798', 'bjbjhhbjh', 'bhjhbjbhj', 2, 1, '', 10, '', 1),
(24, '0', 'sundhar', 'kumar', 'WpwQWyNb', 'sundhar@gmail.com', '1234567890', 'xcxcxccccxcxcx', 'cvvcvcvcvcvcvcvc', 1, 1, '45545545545455454545', 2, '11/01/2016', 1),
(25, '0', 'test', 'test', '9cNCLYOW', 'support@linteractif.com', '+9613583114', 'Beirut', 'Beirut', 2, 1, 'dfdf', 1, '11/11/2016', 0),
(26, '0', 'test', 'test', 'XUWUNPak', 'info@test.com', '3583114', 'Mar Takla - Street Elias Sarkis', 'Bldg. Georges Maalouf 2nd Floor', 1, 1, '', 5, '11/12/2016', 0),
(27, '0', 'test', 'k', 'djAOqi1O', 'test21689@gmail.com', '9876543210', 'test address1', 'test address2', 1, 1, 'vinodbabu@pofitec.com', 1, '11/12/2016', 1),
(28, '', 'bala', 'fgfgfgfg', 'gCqScTcZ', 'kailashkumar.r@esec.ac.in', '1234567890', 'fgfgfgfdg', 'ghgfhgfhgfh', 1, 1, 'kailashkumar.r@esec.ac.in', 5, '', 1),
(29, '', 'kailash', 'kumar', 'nBe0mm3F', 'kailashkumar.r@pofitec.com', '1234567890', 'vvxxcvxcvcvxcv', 'vxcxcvxcv', 1, 1, 'kailashkumar.r@pofitec.com', 5, '', 1),
(30, '0', 'test', 'test', 'y3mQYxab', 'test@test.com', '3583114', 'Mar Takla - Street Elias Sarkis', 'Bldg. Georges Maalouf 2nd Floor', 1, 1, 'georgen@linteractif.com', 5, '11/15/2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_modulesettings`
--

CREATE TABLE IF NOT EXISTS `nm_modulesettings` (
  `ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `ms_dealmodule` int(11) NOT NULL,
  `ms_productmodule` int(11) NOT NULL,
  `ms_auctionmodule` int(11) NOT NULL,
  `ms_blogmodule` int(11) NOT NULL,
  `ms_nearmemapmodule` int(11) NOT NULL,
  `ms_storelistmodule` int(11) NOT NULL,
  `ms_pastdealmodule` int(11) NOT NULL,
  `ms_faqmodule` int(11) NOT NULL,
  `ms_cod` int(11) NOT NULL,
  `ms_paypal` int(11) NOT NULL,
  `ms_creditcard` int(11) NOT NULL,
  `ms_googlecheckout` int(11) NOT NULL,
  `ms_shipping` int(11) NOT NULL COMMENT '1=>Free shipping, 2=> Flat shipping, 3=> Product per shippin, 4=> Per Item shipping',
  `ms_newsletter_template` int(11) NOT NULL COMMENT '1=> Temp 1, 2=>Temp 2, 3=> Temp 3, 4=> Temp 4',
  `ms_citysettings` int(11) NOT NULL COMMENT '1=> With city, 0=> Without city',
  PRIMARY KEY (`ms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_newsletter_subscribers`
--

CREATE TABLE IF NOT EXISTS `nm_newsletter_subscribers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `post_dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `nm_newsletter_subscribers`
--

INSERT INTO `nm_newsletter_subscribers` (`id`, `email`, `city_id`, `status`, `post_dt`) VALUES
(5, 'sg@gmail.com', 0, 1, '0000-00-00 00:00:00'),
(8, 'chalesvictor.info@gmail.com', 0, 1, '0000-00-00 00:00:00'),
(7, 'erkprajesh@gmail.com', 0, 1, '0000-00-00 00:00:00'),
(9, 'charlesvictor.j@pofitec.com', 0, 1, '0000-00-00 00:00:00'),
(10, 'pavithrandbpro@gmail.com', 0, 1, '0000-00-00 00:00:00'),
(11, 'kumar@pofitec.com', 0, 1, '0000-00-00 00:00:00'),
(12, 'kailash.k@pofitec.com', 0, 1, '0000-00-00 00:00:00'),
(13, 'kumarkailash075@gmail.com', 0, 1, '0000-00-00 00:00:00'),
(14, 'kailashkumar.r@pofitec.com', 0, 1, '0000-00-00 00:00:00'),
(18, 'mogahead@gmail.com', 0, 1, '0000-00-00 00:00:00'),
(19, 'kailashkumar.r@esec.ac.in', 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_order`
--

CREATE TABLE IF NOT EXISTS `nm_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_cus_id` int(10) unsigned NOT NULL,
  `order_pro_id` int(11) unsigned NOT NULL,
  `order_type` tinyint(4) NOT NULL COMMENT '1-product,2-deals',
  `transaction_id` varchar(50) NOT NULL,
  `payer_email` varchar(50) NOT NULL,
  `payer_id` varchar(50) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_amt` decimal(10,2) NOT NULL,
  `order_tax` decimal(10,2) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `token_id` varchar(30) NOT NULL,
  `payment_ack` varchar(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` varchar(20) NOT NULL,
  `payer_status` varchar(50) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1-sucess,2-complete,3-hold,4-failed',
  `order_paytype` smallint(6) NOT NULL COMMENT '1-paypal',
  `order_pro_color` int(11) NOT NULL,
  `order_pro_size` int(11) NOT NULL,
  `order_shipping_add` text NOT NULL,
  `order_merchant_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `nm_order`
--

INSERT INTO `nm_order` (`order_id`, `order_cus_id`, `order_pro_id`, `order_type`, `transaction_id`, `payer_email`, `payer_id`, `payer_name`, `order_qty`, `order_amt`, `order_tax`, `currency_code`, `token_id`, `payment_ack`, `order_date`, `created_date`, `payer_status`, `order_status`, `order_paytype`, `order_pro_color`, `order_pro_size`, `order_shipping_add`, `order_merchant_id`) VALUES
(10, 30, 22, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-06-11 11:16:25', '', '', 3, 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(11, 30, 28, 1, '', '', '', '', 1, '15.00', '0.00', '', '', '', '2016-06-11 11:16:25', '', '', 3, 0, 0, 0, ',,,,,', 0),
(12, 30, 45, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:16:25', '', '', 3, 0, 0, 0, ',,,,,', 0),
(13, 30, 44, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:16:25', '', '', 3, 0, 0, 0, ',,,,,', 0),
(14, 30, 35, 2, '', '', '', '', 1, '59.00', '0.00', '', '', '', '2016-06-11 11:16:25', '', '', 3, 0, 0, 0, ',,,,,', 0),
(15, 30, 22, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-06-11 11:18:08', '', '', 3, 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(16, 30, 28, 1, '', '', '', '', 1, '15.00', '0.00', '', '', '', '2016-06-11 11:18:08', '', '', 3, 0, 0, 0, ',,,,,', 0),
(17, 30, 45, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:18:08', '', '', 3, 0, 0, 0, ',,,,,', 0),
(18, 30, 44, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:18:08', '', '', 3, 0, 0, 0, ',,,,,', 0),
(19, 30, 35, 2, '', '', '', '', 1, '59.00', '0.00', '', '', '', '2016-06-11 11:18:08', '', '', 3, 0, 0, 0, ',,,,,', 0),
(20, 30, 22, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-06-11 11:19:47', '', '', 3, 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(21, 30, 28, 1, '', '', '', '', 1, '15.00', '0.00', '', '', '', '2016-06-11 11:19:47', '', '', 3, 0, 0, 0, ',,,,,', 0),
(22, 30, 9, 1, '', '', '', '', 1, '599.00', '0.00', '', '', '', '2016-06-11 11:19:47', '', '', 3, 0, 13, 13, ',,,,,', 0),
(23, 30, 45, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:19:47', '', '', 3, 0, 0, 0, ',,,,,', 0),
(24, 30, 44, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:19:47', '', '', 3, 0, 0, 0, ',,,,,', 0),
(25, 30, 35, 2, '', '', '', '', 1, '59.00', '0.00', '', '', '', '2016-06-11 11:19:47', '', '', 3, 0, 0, 0, ',,,,,', 0),
(26, 30, 22, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(27, 30, 28, 1, '', '', '', '', 1, '15.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 0, 0, ',,,,,', 0),
(28, 30, 9, 1, '', '', '', '', 1, '599.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 13, 13, ',,,,,', 0),
(29, 30, 45, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 0, 0, ',,,,,', 0),
(30, 30, 44, 2, '', '', '', '', 1, '49.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 0, 0, ',,,,,', 0),
(31, 30, 35, 2, '', '', '', '', 1, '59.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 0, 0, ',,,,,', 0),
(32, 30, 13, 2, '', '', '', '', 1, '699.00', '0.00', '', '', '', '2016-06-11 11:25:22', '', '', 3, 0, 0, 0, ',,,,,', 0),
(33, 25, 9, 1, '', '', '', '', 1, '599.00', '0.00', '', '', '', '2016-06-15 05:00:00', '', '', 3, 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890', 0),
(34, 25, 9, 1, '', '', '', '', 1, '599.00', '0.00', '', '', '', '2016-06-15 05:00:00', '', '', 3, 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890', 0),
(35, 25, 9, 1, '', '', '', '', 1, '599.00', '0.00', '', '', '', '2016-06-15 05:00:00', '', '', 3, 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890', 0),
(36, 25, 20, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-06-17 05:00:00', '', '', 3, 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890', 0),
(37, 43, 29, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-06-21 07:40:48', '', '', 3, 0, 2, 5, 'kumar,144, Ram nagar,sengupatha,TamilNadu,641009,1231231231', 0),
(38, 23, 17, 1, '', '', '', '', 1, '479.00', '0.00', '', '', '', '2016-06-21 08:18:20', '', '', 3, 0, 16, 1, 'kailash,jansinagar,v.chatram,tn,638004,1234567890', 0),
(39, 23, 21, 1, '', '', '', '', 1, '50.00', '0.00', '', '', '', '2016-06-21 08:18:20', '', '', 3, 0, 8, 4, 'kailash,jansinagar,v.chatram,tn,638004,1234567890', 0),
(40, 48, 21, 1, '', '', '', '', 1, '50.00', '0.00', '', '', '', '2016-06-21 08:57:46', '', '', 3, 0, 8, 1, 'kailashkumar,anna street,chatram,tn,123456,1234567890', 0),
(41, 25, 20, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-06-21 12:01:34', '', '', 3, 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890', 0),
(42, 76, 13, 1, '', '', '', '', 1, '699.00', '0.00', '', '', '', '2016-07-01 15:59:51', '', '', 3, 0, 0, 0, 'Pavithran,144, Sengupta Street | Near Hotel City Towers,Ram Nagar | Coimbatore - 641009,Tamil Nadu,641009,9787467575', 0),
(43, 79, 14, 1, '', '', '', '', 1, '8499.00', '0.00', '', '', '', '2016-07-02 15:01:20', '', '', 3, 0, 19, 0, 'reca,543654365,jytfjuyj,jhgfjhgfj,4324321,654365436', 0),
(44, 25, 11, 1, '', '', '', '', 1, '1573.00', '0.00', '', '', '', '2016-07-29 06:36:10', '', '', 3, 0, 12, 7, ',,,,,', 9),
(45, 96, 13, 1, '', '', '', '', 1, '699.00', '0.00', '', '', '', '2016-08-17 07:57:17', '', '', 3, 0, 12, 4, ',,,,,', 9),
(46, 100, 37, 1, '', '', '', '', 31, '21669.00', '0.00', '', '', '', '2016-08-25 17:02:44', '', '', 3, 0, 1, 1, ',,,,,', 9),
(47, 84, 14, 1, '', '', '', '', 1, '8499.00', '0.00', '', '', '', '2016-08-25 11:21:18', '', '', 3, 0, 19, 10, ',,,,,', 9),
(48, 103, 13, 1, '', '', '', '', 1, '699.00', '0.00', '', '', '', '2016-08-30 11:42:41', '', '', 3, 0, 12, 6, ',,,,,', 9),
(49, 104, 38, 1, '', '', '', '', 1, '400.00', '0.00', '', '', '', '2016-08-30 14:56:42', '', '', 3, 0, 3, 1, ',,,,,', 19),
(50, 110, 25, 1, '', '', '', '', 5, '100.00', '0.00', '', '', '', '2016-09-27 08:00:31', '', '', 3, 0, 4, 1, ',,,,,', 9),
(51, 84, 35, 1, '', '', '', '', 1, '299.00', '0.00', '', '', '', '2016-11-02 11:55:22', '', '', 3, 0, 13, 3, ',,,,,', 0),
(52, 84, 35, 1, '', '', '', '', 1, '299.00', '0.00', '', '', '', '2016-11-02 11:55:44', '', '', 3, 0, 13, 3, ',,,,,', 0),
(53, 84, 29, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 12:50:44', '', '', 3, 0, 4, 6, ',,,,,', 0),
(54, 84, 29, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 12:52:06', '', '', 3, 0, 4, 6, ',,,,,', 0),
(55, 84, 29, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 13:06:05', '', '', 3, 0, 4, 6, ',,,,,', 0),
(56, 84, 28, 1, '', '', '', '', 1, '15.00', '0.00', '', '', '', '2016-11-02 13:11:45', '', '', 3, 0, 6, 3, ',,,,,', 0),
(57, 84, 28, 1, '', '', '', '', 1, '15.00', '0.00', '', '', '', '2016-11-02 13:15:41', '', '', 3, 0, 6, 3, ',,,,,', 0),
(58, 84, 29, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 13:17:07', '', '', 3, 0, 4, 6, ',,,,,', 0),
(59, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:23:50', '', '', 3, 0, 4, 2, ',,,,,', 0),
(60, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:24:12', '', '', 3, 0, 4, 2, ',,,,,', 0),
(61, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:32:47', '', '', 3, 0, 4, 2, ',,,,,', 0),
(62, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:33:20', '', '', 3, 0, 4, 2, ',,,,,', 0),
(63, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:33:36', '', '', 3, 0, 4, 2, ',,,,,', 0),
(64, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:34:48', '', '', 3, 0, 4, 2, ',,,,,', 0),
(65, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:35:49', '', '', 3, 0, 4, 2, ',,,,,', 0),
(66, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:48:50', '', '', 3, 0, 4, 2, ',,,,,', 0),
(67, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:49:10', '', '', 3, 0, 4, 2, ',,,,,', 0),
(68, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:52:47', '', '', 3, 0, 4, 2, ',,,,,', 0),
(69, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:53:43', '', '', 3, 0, 4, 2, ',,,,,', 0),
(70, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:54:27', '', '', 3, 0, 4, 2, ',,,,,', 0),
(71, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:54:59', '', '', 3, 0, 4, 2, ',,,,,', 0),
(72, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:56:58', '', '', 3, 0, 4, 2, ',,,,,', 0),
(73, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 13:58:36', '', '', 3, 0, 4, 2, ',,,,,', 0),
(74, 84, 24, 1, '', '', '', '', 1, '30.00', '0.00', '', '', '', '2016-11-02 14:02:28', '', '', 3, 0, 4, 2, ',,,,,', 0),
(75, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 14:11:02', '', '', 3, 0, 1, 4, ',,,,,', 0),
(76, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:30:38', '', '', 3, 0, 5, 5, ',,,,,', 0),
(77, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:32:16', '', '', 3, 0, 5, 5, ',,,,,', 0),
(78, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:34:14', '', '', 3, 0, 5, 5, ',,,,,', 0),
(79, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:44:09', '', '', 3, 0, 5, 5, ',,,,,', 0),
(80, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:48:03', '', '', 3, 0, 5, 5, ',,,,,', 0),
(81, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:52:27', '', '', 3, 0, 5, 5, ',,,,,', 0),
(82, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:52:45', '', '', 3, 0, 5, 5, ',,,,,', 0),
(83, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:53:24', '', '', 3, 0, 5, 5, ',,,,,', 0),
(84, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:57:13', '', '', 3, 0, 5, 5, ',,,,,', 0),
(85, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 14:58:30', '', '', 3, 0, 5, 5, ',,,,,', 0),
(86, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:01:26', '', '', 3, 0, 5, 5, ',,,,,', 0),
(87, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:02:44', '', '', 3, 0, 5, 5, ',,,,,', 0),
(88, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:16:02', '', '', 3, 0, 5, 5, ',,,,,', 0),
(89, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:17:04', '', '', 3, 0, 5, 5, ',,,,,', 0),
(90, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:20:46', '', '', 3, 0, 5, 5, ',,,,,', 0),
(91, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:21:45', '', '', 3, 0, 5, 5, ',,,,,', 0),
(92, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:30:16', '', '', 3, 0, 5, 5, ',,,,,', 0),
(93, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:31:17', '', '', 3, 0, 5, 5, ',,,,,', 0),
(94, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:36:10', '', '', 3, 0, 5, 5, ',,,,,', 0),
(95, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:36:31', '', '', 3, 0, 5, 5, ',,,,,', 0),
(96, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:36:35', '', '', 3, 0, 5, 5, ',,,,,', 0),
(97, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:36:53', '', '', 3, 0, 5, 5, ',,,,,', 0),
(98, 84, 30, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-02 15:37:42', '', '', 3, 0, 5, 5, ',,,,,', 0),
(99, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 16:54:31', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(100, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 16:56:59', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(101, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 16:57:26', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(102, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 16:58:00', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(103, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 16:59:14', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(104, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:13:53', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(105, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:14:15', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(106, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:14:30', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(107, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:15:20', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(108, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:15:36', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(109, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:16:49', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(110, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:17:07', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(111, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:17:24', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(112, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:33:55', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(113, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:34:11', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(114, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:34:24', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(115, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:34:38', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(116, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:35:06', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(117, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:36:07', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(118, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:36:53', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(119, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:37:18', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(120, 84, 25, 1, '', '', '', '', 1, '20.00', '0.00', '', '', '', '2016-11-02 17:37:42', '', '', 3, 0, 4, 4, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(121, 125, 29, 1, '', '', '', '', 1, '10.00', '0.00', '', '', '', '2016-11-15 02:03:45', '', '', 3, 0, 4, 6, 'George Nammour,test,test,test,test,test,georgen@linteractif.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_ordercod`
--

CREATE TABLE IF NOT EXISTS `nm_ordercod` (
  `cod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_transaction_id` varchar(60) NOT NULL,
  `cod_cus_id` int(10) unsigned NOT NULL,
  `cod_pro_id` int(11) unsigned NOT NULL,
  `cod_order_type` tinyint(4) NOT NULL COMMENT '1-product,2-deals',
  `cod_qty` int(11) NOT NULL,
  `cod_amt` decimal(10,2) NOT NULL,
  `cod_tax` decimal(10,2) NOT NULL,
  `cod_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_status` tinyint(4) NOT NULL COMMENT '1-sucess,2-complete,3-hold,4-failed',
  `created_date` varchar(20) NOT NULL,
  `cod_paytype` smallint(6) NOT NULL,
  `cod_pro_color` tinyint(4) NOT NULL,
  `cod_pro_size` tinyint(4) NOT NULL,
  `cod_ship_addr` text NOT NULL,
  `cod_merchant_id` int(11) NOT NULL,
  PRIMARY KEY (`cod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `nm_ordercod`
--

INSERT INTO `nm_ordercod` (`cod_id`, `cod_transaction_id`, `cod_cus_id`, `cod_pro_id`, `cod_order_type`, `cod_qty`, `cod_amt`, `cod_tax`, `cod_date`, `cod_status`, `created_date`, `cod_paytype`, `cod_pro_color`, `cod_pro_size`, `cod_ship_addr`, `cod_merchant_id`) VALUES
(2, '9WvmAPSH', 23, 11, 1, 1, '1573.00', '0.00', '2016-06-10 03:23:00', 1, '', 0, 12, 6, 'kailashkumar,165,nehru street,tamilnadu,123456,1234567890', 0),
(3, 'OqiTjnRY', 25, 10, 1, 1, '349.00', '0.00', '2016-06-10 03:46:54', 3, '', 0, 12, 1, 'maheshwaran,155,,Anna street,tamilnadu,123456,1234567890', 0),
(4, '4eRFlF3I', 25, 11, 1, 1, '1573.00', '0.00', '2016-06-10 03:49:09', 3, '', 0, 12, 6, 'maheshwaran,155,,Anna street,tamilnadu,123456,1234567890', 0),
(5, 'Q0im3BDy', 24, 11, 1, 1, '1573.00', '0.00', '2016-06-10 03:52:49', 3, '', 0, 12, 6, 'dhanasekar,147,my street,tamilnadu,123456,1234567890', 0),
(6, 'Mm0bMdJK', 25, 14, 1, 1, '8499.00', '0.00', '2016-06-10 04:17:31', 3, '', 0, 19, 10, 'maheshwaran,155,,Anna street,tamilnadu,123456,1234567890', 0),
(7, 'Sj4oddUf', 25, 33, 1, 1, '199.00', '0.00', '2016-06-10 04:22:50', 3, '', 0, 7, 1, 'mahesh,12,gandhipuram,tamilnadu,123456,1234567890', 0),
(8, '5hKo9QmB', 25, 9, 1, 1, '599.00', '0.00', '2016-06-10 04:25:35', 3, '', 0, 13, 1, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890', 0),
(9, 'OYPw6feZ', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(10, 'OYPw6feZ', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 0, 0, ',,,,,', 0),
(11, 'OYPw6feZ', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 13, 13, ',,,,,', 0),
(12, 'OYPw6feZ', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 0, 0, ',,,,,', 0),
(13, 'OYPw6feZ', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 0, 0, ',,,,,', 0),
(14, 'OYPw6feZ', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 0, 0, ',,,,,', 0),
(15, 'OYPw6feZ', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:26:25', 3, '', 0, 0, 0, ',,,,,', 0),
(16, 'lb9GLDtR', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(17, 'lb9GLDtR', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 0, 0, ',,,,,', 0),
(18, 'lb9GLDtR', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 13, 13, ',,,,,', 0),
(19, 'lb9GLDtR', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 0, 0, ',,,,,', 0),
(20, 'lb9GLDtR', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 0, 0, ',,,,,', 0),
(21, 'lb9GLDtR', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 0, 0, ',,,,,', 0),
(22, 'lb9GLDtR', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:26:35', 3, '', 0, 0, 0, ',,,,,', 0),
(23, 'PZ1rgQHJ', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(24, 'PZ1rgQHJ', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 0, 0, ',,,,,', 0),
(25, 'PZ1rgQHJ', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 13, 13, ',,,,,', 0),
(26, 'PZ1rgQHJ', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 0, 0, ',,,,,', 0),
(27, 'PZ1rgQHJ', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 0, 0, ',,,,,', 0),
(28, 'PZ1rgQHJ', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 0, 0, ',,,,,', 0),
(29, 'PZ1rgQHJ', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:26:45', 3, '', 0, 0, 0, ',,,,,', 0),
(30, 'CbNDY0Es', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(31, 'CbNDY0Es', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 0, 0, ',,,,,', 0),
(32, 'CbNDY0Es', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 13, 13, ',,,,,', 0),
(33, 'CbNDY0Es', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 0, 0, ',,,,,', 0),
(34, 'CbNDY0Es', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 0, 0, ',,,,,', 0),
(35, 'CbNDY0Es', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 0, 0, ',,,,,', 0),
(36, 'CbNDY0Es', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:26:55', 3, '', 0, 0, 0, ',,,,,', 0),
(37, '59GkS84h', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(38, '59GkS84h', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 0, 0, ',,,,,', 0),
(39, '59GkS84h', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 13, 13, ',,,,,', 0),
(40, '59GkS84h', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 0, 0, ',,,,,', 0),
(41, '59GkS84h', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 0, 0, ',,,,,', 0),
(42, '59GkS84h', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 0, 0, ',,,,,', 0),
(43, '59GkS84h', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:27:05', 3, '', 0, 0, 0, ',,,,,', 0),
(44, 'avPATAKg', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(45, 'avPATAKg', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 0, 0, ',,,,,', 0),
(46, 'avPATAKg', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 13, 13, ',,,,,', 0),
(47, 'avPATAKg', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 0, 0, ',,,,,', 0),
(48, 'avPATAKg', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 0, 0, ',,,,,', 0),
(49, 'avPATAKg', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 0, 0, ',,,,,', 0),
(50, 'avPATAKg', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:27:15', 3, '', 0, 0, 0, ',,,,,', 0),
(51, 'p4bs1uOi', 30, 22, 1, 1, '30.00', '0.00', '2016-06-11 11:27:25', 3, '', 0, 0, 0, 'ilakkiya m,ganghipuram,ganghipuram,tamilnadu,641008,8883152529', 0),
(52, 'p4bs1uOi', 30, 28, 1, 1, '15.00', '0.00', '2016-06-11 11:27:25', 3, '', 0, 0, 0, ',,,,,', 0),
(53, 'p4bs1uOi', 30, 9, 1, 1, '599.00', '0.00', '2016-06-11 11:27:25', 3, '', 0, 13, 13, ',,,,,', 0),
(54, 'p4bs1uOi', 30, 45, 2, 1, '49.00', '0.00', '2016-06-11 11:27:25', 1, '', 0, 0, 0, ',,,,,', 0),
(55, 'p4bs1uOi', 30, 44, 2, 1, '49.00', '0.00', '2016-06-11 11:27:25', 3, '', 0, 0, 0, ',,,,,', 0),
(56, 'p4bs1uOi', 30, 35, 2, 1, '59.00', '0.00', '2016-06-11 11:27:25', 3, '', 0, 0, 0, ',,,,,', 0),
(57, 'p4bs1uOi', 30, 13, 2, 1, '699.00', '0.00', '2016-06-11 11:27:25', 1, '', 0, 0, 0, ',,,,,', 0),
(58, 'jgVSv9x2', 23, 21, 1, 1, '50.00', '0.00', '2016-06-18 17:25:12', 3, '', 0, 4, 4, 'kailashkumar,155,,Anna street,tamilnadu,123456,1234567890,', 0),
(59, 'l7m0ZvzV', 43, 29, 1, 1, '10.00', '0.00', '2016-06-21 07:42:03', 3, '', 0, 2, 5, 'kumar,144, Ram nagar,sengupatha,TamilNadu,641009,1231231231,', 0),
(60, 'tH4ngdDM', 23, 21, 1, 1, '50.00', '0.00', '2016-06-21 07:48:23', 3, '', 0, 8, 4, 'kailashkumar,155,,Anna street,tamilnadu,123456,1234567890,', 0),
(61, 'wevRSXhG', 23, 17, 1, 1, '479.00', '0.00', '2016-06-21 08:19:08', 3, '', 0, 16, 1, 'kailash,jansinagar,v.chatram,tn,638004,1234567890,kumarkailash075@gmail.com', 0),
(62, 'wevRSXhG', 23, 21, 1, 1, '50.00', '0.00', '2016-06-21 08:19:08', 3, '', 0, 8, 4, 'kailash,jansinagar,v.chatram,tn,638004,1234567890,kumarkailash075@gmail.com', 0),
(63, 'lgLhm2to', 43, 13, 1, 1, '699.00', '0.00', '2016-06-21 08:33:01', 3, '', 0, 0, 0, 'kumar,144, Ram nagar,sengupatha,TamilNadu,641009,1231231231,kumar@pofitec.com', 0),
(64, '0jtp89vX', 43, 11, 1, 1, '1573.00', '0.00', '2016-06-21 08:34:13', 3, '', 0, 0, 0, 'kumar,144, Ram nagar,sengupatha,TamilNadu,641009,1231231231,kumar@pofitec.com', 0),
(65, 'XkPGCA0r', 48, 17, 1, 1, '479.00', '0.00', '2016-06-21 08:36:54', 3, '', 0, 16, 1, 'kailashkumar,155,,Anna street,tamilnadu,123456,1234567890,kailashkumar.r@pofitec.com', 0),
(66, 'kP2OOfA0', 48, 18, 1, 1, '9500.00', '0.00', '2016-06-21 08:41:33', 3, '', 0, 3, 1, 'kailashkumar,anna street,chatram,tn,123456,1234567890,kailashkumar.r@gmail.com', 0),
(67, 'iGuSLB1T', 48, 13, 1, 1, '699.00', '0.00', '2016-06-21 08:50:40', 3, '', 0, 12, 6, 'kailashkumar,anna street,chatram,tn,123456,1234567890,kumarkailash075@gmail.com', 0),
(68, 'WvIjasje', 43, 15, 1, 1, '9999.00', '0.00', '2016-06-21 08:51:54', 3, '', 0, 0, 0, 'kumar,144, Ram nagar,sengupatha,TamilNadu,641009,1231231231,kumar@pofitec.com', 0),
(69, '0y1K8VYa', 51, 15, 1, 1, '9999.00', '0.00', '2016-06-21 08:54:15', 3, '', 0, 0, 0, 'rajesh,144, Ram nagar,sengupatha,TamilNadu,641009,1231231231,erkprajesh@gmail.com', 0),
(70, 'NFOlWGD3', 48, 9, 1, 1, '599.00', '0.00', '2016-06-21 08:55:18', 3, '', 0, 0, 0, 'kailashkumar,anna street,chatram,tn,123456,1234567890,kailashkumar.r@pofitec.com', 0),
(71, 'iXrxCcRg', 48, 21, 1, 1, '50.00', '0.00', '2016-06-21 09:02:29', 3, '', 0, 8, 1, 'kailashkumar,anna street,chatram,tn,123456,1234567890,kumarkailash075@gmail.com', 0),
(72, 'svpI47Pj', 25, 9, 1, 1, '599.00', '0.00', '2016-06-21 09:09:24', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(73, 'EOzBpRES', 48, 9, 1, 1, '599.00', '0.00', '2016-06-21 10:00:12', 3, '', 0, 13, 1, 'kailashkumar,anna street,chatram,tn,123456,1234567890,kumarkailash075@gmail.com', 0),
(74, 'UqgixZIE', 25, 37, 1, 1, '699.00', '0.00', '2016-06-21 12:00:21', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(75, 'bioWWIO5', 25, 20, 1, 1, '20.00', '0.00', '2016-06-21 12:01:47', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(76, 'qk7EpHI9', 58, 13, 1, 1, '699.00', '0.00', '2016-06-22 17:03:48', 3, '', 0, 12, 6, 'test,144,ramnagar,TamilNadu,641009,1231231231,sales@laravelecommerce.com', 0),
(77, 'Wj4MQ1km', 74, 11, 1, 3, '4719.00', '0.00', '2016-06-23 06:10:10', 3, '', 0, 12, 7, 'rajesh,144,122,tn,641010,1231231231,erkprajesh@gmail.com', 0),
(78, 'Wj4MQ1km', 74, 17, 1, 1, '479.00', '0.00', '2016-06-23 06:10:10', 3, '', 0, 6, 1, 'sddsfd,sdvsd,sdvsdv,sdvsdv,123123,1231231231,er@er.com', 0),
(79, 'IzrQJsE0', 75, 9, 1, 1, '599.00', '0.00', '2016-06-23 06:15:05', 3, '', 0, 0, 0, 'kumar,test1,test2,tn,641009,9745232341,maheswaran@pofitec.com', 0),
(80, 'IzrQJsE0', 75, 11, 1, 1, '1573.00', '0.00', '2016-06-23 06:15:05', 3, '', 0, 12, 7, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(81, 'ZT4lBMuL', 75, 9, 1, 1, '599.00', '0.00', '2016-06-23 06:18:30', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(82, 'RCzVnnIb', 75, 9, 1, 1, '599.00', '0.00', '2016-06-23 06:21:28', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(83, 'RCzVnnIb', 75, 11, 1, 1, '1573.00', '0.00', '2016-06-23 06:21:28', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(84, 'QBs1y0kg', 75, 13, 1, 1, '699.00', '0.00', '2016-06-23 06:25:28', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(85, 'QBs1y0kg', 75, 14, 1, 1, '8499.00', '0.00', '2016-06-23 06:25:28', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(86, 'z3mLALps', 75, 9, 1, 1, '599.00', '0.00', '2016-06-23 06:30:27', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(87, 'z3mLALps', 75, 11, 1, 1, '1573.00', '0.00', '2016-06-23 06:30:27', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,kumar@pofitec.com', 0),
(88, 'z3mLALps', 75, 13, 1, 1, '699.00', '0.00', '2016-06-23 06:30:27', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,charles.j@pofitec.com', 0),
(89, 'JUuJiL2f', 42, 9, 1, 1, '599.00', '0.00', '2016-06-23 06:55:12', 3, '', 0, 13, 13, 'charles,xxxxx,xxxxxx,tamilnadu,641009,9498056637,charlesvictor.j@pofitec.com', 0),
(90, 'JUuJiL2f', 42, 15, 1, 1, '9999.00', '0.00', '2016-06-23 06:55:12', 3, '', 0, 3, 1, 'victor,xxxx,xxxx,tamilnadu,641009,9498056637,chalesvictor.info@gmail.com', 0),
(91, 'j8gh2u4d', 76, 11, 1, 1, '1573.00', '0.00', '2016-07-01 15:56:46', 3, '', 0, 0, 0, 'Pavi,Ddf,Ff,Ggg,638452,1234567890,pavithrandbpro@gmail.com', 0),
(92, 'Kx2rQPjQ', 76, 13, 1, 1, '699.00', '0.00', '2016-07-01 16:00:06', 3, '', 0, 0, 0, 'Pavithran,144, Sengupta Street | Near Hotel City Towers,Ram Nagar | Coimbatore - 641009,Tamil Nadu,641009,9787467575,pavithrandbpro@gmail.com', 0),
(93, 'pHsuuWgj', 76, 21, 1, 1, '50.00', '0.00', '2016-07-01 16:01:22', 3, '', 0, 0, 0, 'test,test mail,tes,test,123456,1234567890,pavithran.g@pofitec.com', 0),
(94, '5Pml8btH', 25, 11, 1, 1, '1573.00', '0.00', '2016-07-01 16:02:55', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(95, '5Pml8btH', 25, 13, 1, 1, '699.00', '0.00', '2016-07-01 16:02:55', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(96, 'uTagFXCm', 25, 11, 1, 1, '1573.00', '0.00', '2016-07-01 16:04:07', 3, '', 0, 0, 0, 'maheshwaran,gandhipuram,ramnagar,tamilnadu,123456,1234567890,maheswaran@pofitec.com', 0),
(97, 'mMD3pBAC', 25, 13, 1, 1, '699.00', '0.00', '2016-07-01 16:05:14', 3, '', 0, 0, 0, 'test,test,test,test,123456,1234567890,charles.j@pofitec.com', 0),
(98, '5Zwmhnj4', 76, 13, 1, 1, '699.00', '0.00', '2016-07-01 16:06:43', 3, '', 0, 0, 0, 'test,test mail,tes,test,123456,1234567890,pavithran.g@pofitec.com', 0),
(99, 'YHLHgVKi', 25, 13, 1, 1, '699.00', '0.00', '2016-07-01 16:09:30', 3, '', 0, 0, 0, 'test,test,test,test,123456,1234567890,charles.j@pofitec.com', 0),
(100, '3jdOFHkf', 76, 13, 1, 1, '699.00', '0.00', '2016-07-01 16:23:45', 3, '', 0, 0, 0, 'test,test mail,tes,test,123456,1234567890,pavithran.g@pofitec.com', 0),
(101, '4VMOK411', 81, 24, 1, 1, '30.00', '0.00', '2016-07-09 12:29:56', 3, '', 0, 0, 0, 'TESTE 1,123,teste,sp,11600-000,123123123,teste@teste.com', 9),
(102, 'huwHgoS9', 84, 14, 1, 1, '8499.00', '0.00', '2016-08-25 12:40:01', 3, '', 0, 19, 10, 'kailashkumar,dfgfdgd,dfgfgdg,dggdfg,123456,1234567890,kumarkailash075@gmail.com', 9),
(103, '73jUIiyu', 84, 13, 1, 1, '699.00', '0.00', '2016-08-29 09:23:23', 3, '', 0, 12, 4, 'kailashkumar,dg,dfgfdg,dfgdfg,123456,1234567890,kumarkailash075@gmail.com', 9),
(104, 'MvdrPn46', 103, 13, 1, 1, '699.00', '0.00', '2016-08-30 11:42:26', 3, '', 0, 12, 6, 'Testing,testing address,address two,testing,32412,1231231231,iesien22@yahoo.com', 9),
(105, 'KwFJYVzW', 104, 17, 1, 1, '479.00', '0.00', '2016-08-30 13:41:30', 2, '', 0, 6, 1, 'Burham,cimahi depok,rt07,delhi,10222,rezka@gmai,rezka@gmail.com', 12),
(106, 'TnypbbGu', 104, 38, 1, 1, '400.00', '0.00', '2016-08-30 14:38:47', 1, '', 0, 3, 1, 'Burham,cimahi depok,rt07,delhi,10222,812122112,rezka@gmail.com', 19),
(107, 'LbPMcMu6', 110, 26, 1, 1, '20.00', '0.00', '2016-09-28 11:02:19', 2, '', 0, 2, 7, 'mahmoud,cairo,cairo,cairo,76878,+201111130,mogahead@gmail.com', 9),
(108, 'LbPMcMu6', 110, 11, 1, 2, '3146.00', '0.00', '2016-09-28 11:02:19', 2, '', 0, 12, 5, 'mahmoud,cairo,cairo,cairo,76878,+201111130,mogahead@gmail.com', 15),
(109, 'ShXub3Ge', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 11:53:20', 3, '', 0, 13, 3, ',,,,,,', 0),
(110, 'wCryOpkZ', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 11:55:06', 3, '', 0, 13, 3, ',,,,,,', 0),
(111, 'bibajVfl', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 11:59:48', 3, '', 0, 13, 3, ',,,,,,', 0),
(112, 'KlIyxHNL', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 12:05:14', 3, '', 0, 13, 3, ',,,,,,', 0),
(113, 'JQ57ouKA', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 12:05:37', 3, '', 0, 13, 3, ',,,,,,', 0),
(114, 'uewNxyPv', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 12:06:10', 3, '', 0, 13, 3, ',,,,,,', 0),
(115, '5ORhOEB9', 84, 35, 1, 1, '299.00', '0.00', '2016-11-02 12:09:29', 3, '', 0, 13, 3, ',,,,,,', 0),
(116, 'oNeEWkG1', 84, 31, 1, 1, '20.00', '0.00', '2016-11-02 12:13:17', 3, '', 0, 14, 3, ',,,,,,', 0),
(117, 'AvQEABpA', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:21:40', 3, '', 0, 3, 3, ',,,,,,', 0),
(118, 'SEywcJPh', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:22:49', 3, '', 0, 3, 3, ',,,,,,', 0),
(119, '4xFTjTRs', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:24:47', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(120, 'K33ATkxh', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:29:06', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(121, 'pj4q7kkY', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:30:10', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(122, 'xil8xroD', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:30:41', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(123, '73TywZtC', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:31:02', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(124, 'EkOm6dVn', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:31:39', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(125, 'pm5udNkC', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:33:44', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(126, 'tpioIaxP', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:34:49', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(127, 'CL9GK0VK', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:35:43', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(128, 'VQUucOlj', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:37:33', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(129, 'rDALZnbO', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:37:54', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(130, 'zy04wMzL', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:40:27', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(131, 'scqhCW1v', 84, 22, 1, 1, '30.00', '0.00', '2016-11-02 12:40:45', 3, '', 0, 3, 3, 'kannan,36,vaheni street,tn,121211,1234567890,kumarkailash075@gmail.com', 0),
(132, 'pr6cJt0j', 84, 25, 1, 1, '20.00', '0.00', '2016-11-02 17:39:22', 3, '', 0, 4, 4, 'guna,75,hghdhghgs,tn,123456,1234567890,kumarkailash075@gmail.com', 0),
(133, 'RLycuxJD', 84, 25, 1, 1, '20.00', '0.00', '2016-11-02 17:39:52', 3, '', 0, 4, 4, 'guna,75,hghdhghgs,tn,123456,1234567890,kumarkailash075@gmail.com', 0),
(134, 'SIlc0AWh', 124, 18, 1, 1, '9500.00', '0.00', '2016-11-15 06:36:04', 3, '', 0, 3, 2, 'pofi kailash,bcvbcvcvb,vcbvcbcvbcvb,tn,123456,1234567890,kailashkumar.r@esec.ac.in', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_order_auction`
--

CREATE TABLE IF NOT EXISTS `nm_order_auction` (
  `oa_id` int(11) NOT NULL AUTO_INCREMENT,
  `oa_pro_id` int(11) NOT NULL,
  `oa_cus_id` int(11) NOT NULL,
  `oa_cus_name` varchar(150) NOT NULL,
  `oa_cus_email` varchar(250) NOT NULL,
  `oa_cus_address` text NOT NULL,
  `oa_bid_amt` int(11) NOT NULL,
  `oa_bid_shipping_amt` int(11) NOT NULL,
  `oa_original_bit_amt` int(11) NOT NULL,
  `oa_bid_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oa_bid_winner` int(11) NOT NULL COMMENT '1=> Winner, 0=> Bidders',
  `oa_bid_item_status` int(11) NOT NULL COMMENT '0=> Onprocess, 1=> Send,  3=>Cancelled',
  `oa_delivery_date` datetime NOT NULL,
  PRIMARY KEY (`oa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nm_order_auction`
--

INSERT INTO `nm_order_auction` (`oa_id`, `oa_pro_id`, `oa_cus_id`, `oa_cus_name`, `oa_cus_email`, `oa_cus_address`, `oa_bid_amt`, `oa_bid_shipping_amt`, `oa_original_bit_amt`, `oa_bid_date`, `oa_bid_winner`, `oa_bid_item_status`, `oa_delivery_date`) VALUES
(1, 1, 2, 'kumar ', 'kumar@gmail.com ', 'cbe', 10501, 10, 10500, '2014-08-11 23:23:05', 1, 3, '2014-08-12 04:53:01'),
(2, 3, 4, 'testing ', 'testing@nexplocindia.com ', 'coimbatore ,vadavalli', 1010, 25, 1000, '2014-08-11 23:24:36', 1, 1, '2014-08-12 04:54:30'),
(3, 1, 4, 'testing ', 'testing@nexplocindia.com ', 'Coimbatore vadavalli', 10550, 10, 10500, '2014-08-11 23:21:40', 0, 0, '0000-00-00 00:00:00'),
(4, 4, 1, 'yamuna ', 'yamuna@nexplocindia.com ', 'coimbatore,vadavalli', 90010, 10, 9000, '2014-08-12 23:02:22', 0, 0, '0000-00-00 00:00:00'),
(5, 1, 7, 'DivyaNanjappan ', 'divya@gmail.com ', 'cbe', 10551, 10, 10500, '2014-08-27 22:43:06', 0, 0, '0000-00-00 00:00:00'),
(6, 5, 42, 'suresh1 ', 'suresh@claydip.com ', 'asda', 1123, 12, 100, '2014-11-24 12:13:02', 0, 0, '0000-00-00 00:00:00'),
(7, 9, 131, 'Vineet ', 'vineet19universal@gmail.com ', 'Test', 270, 20, 250, '2016-03-09 12:13:23', 0, 0, '0000-00-00 00:00:00'),
(8, 9, 131, 'Vineet ', 'vineet19universal@gmail.com ', 'test', 271, 20, 250, '2016-03-09 12:13:51', 0, 0, '0000-00-00 00:00:00'),
(9, 9, 124, 'testery ', 'yksin98@yahoo.com ', '21 jalajjjjj', 285, 20, 250, '2016-03-11 09:50:14', 0, 0, '0000-00-00 00:00:00'),
(10, 9, 124, 'testery ', 'yksin98@yahoo.com ', 'as', 288, 20, 250, '2016-03-11 09:51:15', 0, 0, '0000-00-00 00:00:00'),
(11, 9, 124, 'testery ', 'yksin98@yahoo.com ', 'nice', 289, 20, 250, '2016-03-11 09:51:47', 0, 0, '0000-00-00 00:00:00'),
(12, 9, 124, 'testery ', 'yksin98@yahoo.com ', 'as', 289, 20, 250, '2016-03-11 09:52:06', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_paymentsettings`
--

CREATE TABLE IF NOT EXISTS `nm_paymentsettings` (
  `ps_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `ps_flatshipping` decimal(10,2) NOT NULL COMMENT 'shipping Tax Percentage',
  `ps_taxpercentage` tinyint(3) unsigned NOT NULL,
  `ps_extenddays` smallint(5) unsigned NOT NULL COMMENT 'Auction Extend Days',
  `ps_alertdays` int(11) NOT NULL,
  `ps_minfundrequest` int(10) unsigned NOT NULL,
  `ps_maxfundrequest` int(10) unsigned NOT NULL,
  `ps_referralamount` int(11) NOT NULL,
  `ps_countryid` int(11) NOT NULL,
  `ps_countrycode` varchar(10) NOT NULL,
  `ps_cursymbol` varchar(10) NOT NULL,
  `ps_curcode` varchar(10) NOT NULL,
  `ps_paypalaccount` varchar(150) NOT NULL,
  `ps_paypal_api_pw` varchar(250) NOT NULL,
  `ps_paypal_api_signature` varchar(250) NOT NULL,
  `ps_authorize_trans_key` varchar(250) NOT NULL,
  `ps_authorize_api_id` varchar(250) NOT NULL,
  `ps_paypal_pay_mode` tinyint(4) NOT NULL COMMENT '0->Test Mode, 1-> Live Mode',
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_paymentsettings`
--

INSERT INTO `nm_paymentsettings` (`ps_id`, `ps_flatshipping`, `ps_taxpercentage`, `ps_extenddays`, `ps_alertdays`, `ps_minfundrequest`, `ps_maxfundrequest`, `ps_referralamount`, `ps_countryid`, `ps_countrycode`, `ps_cursymbol`, `ps_curcode`, `ps_paypalaccount`, `ps_paypal_api_pw`, `ps_paypal_api_signature`, `ps_authorize_trans_key`, `ps_authorize_api_id`, `ps_paypal_pay_mode`) VALUES
(1, '0.00', 0, 0, 0, 0, 0, 0, 7, 'USA', '$', 'USD', 'kumarkailash075-facilitator_api1.gmail.com', 'GLEBQ6PP97BNPGUC', 'AFcWxV21C7fd0v3bYYYRCpSSRl31A3ALiNYZPRWAccOXL-QVRG8VDON9', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_procart`
--

CREATE TABLE IF NOT EXISTS `nm_procart` (
  `pc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pc_date` datetime NOT NULL,
  `pc_pro_id` int(11) NOT NULL,
  `pc_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_procolor`
--

CREATE TABLE IF NOT EXISTS `nm_procolor` (
  `pc_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pc_pro_id` int(10) unsigned NOT NULL,
  `pc_co_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=502 ;

--
-- Dumping data for table `nm_procolor`
--

INSERT INTO `nm_procolor` (`pc_id`, `pc_pro_id`, `pc_co_id`) VALUES
(2, 2, 5),
(3, 2, 1),
(4, 2, 3),
(5, 2, 4),
(56, 37, 1),
(62, 40, 6),
(63, 40, 1),
(64, 41, 1),
(65, 42, 2),
(68, 45, 10),
(70, 46, 1),
(96, 48, 2),
(97, 48, 3),
(111, 3, 13),
(112, 3, 6),
(113, 3, 1),
(114, 3, 9),
(115, 3, 10),
(116, 49, 1),
(117, 4, 10),
(118, 50, 8),
(119, 50, 2),
(120, 51, 8),
(121, 51, 2),
(122, 52, 10),
(123, 52, 4),
(124, 53, 11),
(125, 53, 8),
(126, 53, 3),
(127, 57, 10),
(128, 57, 8),
(129, 57, 16),
(130, 58, 4),
(131, 58, 12),
(132, 58, 15),
(133, 59, 4),
(134, 59, 3),
(135, 59, 6),
(136, 59, 14),
(137, 59, 15),
(138, 60, 8),
(139, 60, 2),
(140, 62, 4),
(141, 62, 12),
(142, 63, 13),
(143, 63, 12),
(144, 63, 10),
(145, 63, 6),
(146, 63, 5),
(147, 64, 5),
(148, 65, 10),
(149, 65, 6),
(150, 66, 8),
(151, 66, 6),
(152, 66, 5),
(153, 66, 4),
(154, 66, 3),
(155, 66, 2),
(156, 66, 1),
(157, 67, 8),
(158, 67, 6),
(159, 67, 5),
(160, 67, 4),
(161, 67, 3),
(162, 67, 2),
(163, 67, 1),
(164, 68, 2),
(165, 68, 1),
(166, 69, 2),
(167, 69, 1),
(168, 70, 2),
(169, 70, 1),
(171, 72, 2),
(172, 72, 1),
(173, 73, 6),
(175, 71, 3),
(176, 74, 1),
(177, 75, 1),
(178, 76, 3),
(179, 76, 4),
(180, 76, 2),
(181, 76, 1),
(182, 77, 1),
(183, 78, 3),
(184, 79, 11),
(185, 79, 3),
(186, 80, 8),
(187, 81, 13),
(188, 82, 10),
(191, 85, 1),
(192, 86, 3),
(193, 86, 2),
(194, 86, 1),
(195, 87, 3),
(196, 87, 2),
(197, 87, 1),
(198, 88, 8),
(199, 89, 2),
(200, 89, 1),
(202, 91, 1),
(203, 91, 2),
(204, 92, 4),
(205, 92, 3),
(206, 92, 2),
(207, 92, 1),
(208, 93, 4),
(209, 93, 3),
(210, 93, 2),
(211, 93, 1),
(212, 94, 2),
(213, 94, 1),
(214, 95, 10),
(215, 95, 9),
(216, 95, 8),
(217, 95, 6),
(218, 95, 5),
(219, 95, 4),
(220, 95, 3),
(221, 95, 2),
(222, 95, 1),
(223, 96, 3),
(224, 96, 2),
(225, 96, 1),
(226, 97, 3),
(227, 97, 2),
(228, 97, 1),
(229, 98, 4),
(230, 98, 3),
(231, 99, 3),
(234, 101, 3),
(235, 101, 2),
(236, 101, 1),
(237, 102, 13),
(238, 103, 13),
(239, 104, 10),
(240, 104, 3),
(241, 105, 4),
(242, 105, 9),
(243, 106, 9),
(244, 106, 4),
(245, 106, 3),
(246, 107, 10),
(247, 107, 5),
(248, 108, 8),
(249, 108, 1),
(256, 109, 19),
(257, 109, 18),
(258, 109, 6),
(259, 110, 16),
(260, 111, 8),
(261, 111, 3),
(262, 111, 1),
(266, 47, 9),
(267, 47, 2),
(268, 47, 4),
(269, 100, 1),
(270, 100, 2),
(274, 83, 1),
(276, 84, 3),
(278, 112, 19),
(279, 90, 9),
(281, 2, 3),
(282, 2, 4),
(283, 3, 5),
(284, 3, 12),
(285, 4, 6),
(286, 4, 13),
(287, 4, 12),
(295, 1, 6),
(309, 6, 12),
(310, 5, 3),
(311, 5, 8),
(312, 5, 10),
(313, 5, 19),
(314, 5, 10),
(315, 7, 3),
(316, 8, 11),
(393, 13, 12),
(394, 14, 19),
(396, 15, 3),
(399, 16, 3),
(400, 16, 5),
(402, 19, 11),
(403, 20, 11),
(404, 20, 9),
(405, 25, 4),
(406, 25, 1),
(407, 25, 14),
(408, 26, 2),
(409, 26, 11),
(410, 27, 18),
(411, 27, 4),
(412, 27, 5),
(413, 27, 6),
(414, 24, 4),
(415, 24, 2),
(416, 24, 14),
(417, 21, 4),
(418, 21, 8),
(419, 21, 6),
(420, 21, 4),
(421, 21, 2),
(422, 21, 1),
(423, 23, 10),
(424, 23, 6),
(425, 23, 3),
(426, 23, 18),
(427, 35, 13),
(428, 35, 1),
(429, 36, 1),
(430, 36, 1),
(434, 30, 4),
(435, 30, 5),
(436, 30, 1),
(437, 30, 4),
(438, 31, 18),
(439, 31, 14),
(440, 31, 2),
(444, 32, 13),
(445, 32, 9),
(446, 32, 1),
(449, 9, 13),
(454, 33, 14),
(455, 33, 17),
(457, 38, 3),
(458, 38, 2),
(459, 38, 1),
(460, 38, 4),
(461, 10, 12),
(465, 11, 12),
(466, 40, 3),
(467, 17, 6),
(468, 17, 16),
(471, 41, 17),
(472, 42, 4),
(473, 22, 3),
(474, 22, 18),
(477, 29, 4),
(478, 29, 2),
(479, 39, 3),
(481, 43, 11),
(483, 44, 11),
(484, 45, 6),
(485, 46, 6),
(486, 47, 13),
(489, 34, 9),
(490, 34, 15),
(491, 34, 14),
(493, 28, 6),
(494, 28, 2),
(495, 48, 2),
(496, 48, 4),
(497, 48, 6),
(498, 48, 8),
(499, 48, 13),
(500, 49, 19),
(501, 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nm_prodelpolicy`
--

CREATE TABLE IF NOT EXISTS `nm_prodelpolicy` (
  `pdp_id` bigint(20) unsigned NOT NULL,
  `pdp_pro_id` smallint(5) unsigned NOT NULL,
  `pdp_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_product`
--

CREATE TABLE IF NOT EXISTS `nm_product` (
  `pro_no_of_purchase` int(11) NOT NULL,
  `pro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pro_title` varchar(150) NOT NULL,
  `pro_mc_id` smallint(5) unsigned DEFAULT NULL,
  `pro_smc_id` smallint(5) unsigned NOT NULL,
  `pro_sb_id` smallint(5) unsigned NOT NULL,
  `pro_ssb_id` smallint(5) unsigned NOT NULL,
  `pro_price` decimal(10,2) NOT NULL,
  `pro_disprice` decimal(10,2) NOT NULL,
  `pro_inctax` tinyint(4) NOT NULL,
  `pro_shippamt` decimal(10,2) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_isspec` tinyint(4) NOT NULL COMMENT '1-yes 2-no',
  `pro_delivery` smallint(5) unsigned NOT NULL COMMENT 'in days',
  `pro_mr_id` int(10) unsigned NOT NULL,
  `pro_sh_id` smallint(5) unsigned NOT NULL,
  `pro_mkeywords` text NOT NULL,
  `pro_mdesc` text NOT NULL COMMENT 'metadescription',
  `pro_postfacebook` tinyint(4) NOT NULL,
  `pro_Img` varchar(500) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `pro_status` tinyint(4) NOT NULL COMMENT '1=> Active, 0 => Block',
  `pro_image_count` int(11) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `sold_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `nm_product`
--

INSERT INTO `nm_product` (`pro_no_of_purchase`, `pro_id`, `pro_title`, `pro_mc_id`, `pro_smc_id`, `pro_sb_id`, `pro_ssb_id`, `pro_price`, `pro_disprice`, `pro_inctax`, `pro_shippamt`, `pro_desc`, `pro_isspec`, `pro_delivery`, `pro_mr_id`, `pro_sh_id`, `pro_mkeywords`, `pro_mdesc`, `pro_postfacebook`, `pro_Img`, `created_date`, `pro_status`, `pro_image_count`, `pro_qty`, `sold_status`) VALUES
(5, 17, 'Dora Canvas Shoes', 4, 6, 13, 16, '799.00', '599.00', 0, '0.00', '<h3>Dora DO1DGC1159 Canvas Shoes Price: Rs. 479</h3><div>Stylish, light in weight and soft from base, this Casual shoe pair is perfect for your li''l angel. Having classy eyelets and strong laces, the shoe will give ultimate comfort to your princess and enables her in Casual speedily.<br><h3>Key Features of Dora DO1DGC1159 Canvas Shoes</h3><ul><li>Dora Sequence Canvas</li><li>Canvas Shoes</li></ul><br></div>', 2, 2, 12, 18, 'Dora Canvas Shoes', 'Dora Canvas Shoes', 0, 'dora1x8bOmLY5.jpg/**/dora2MAwypKuu.jpg/**/dora3NENSeMIg.jpg/**//**/', '06/08/2016', 1, 3, 15, 1),
(2, 18, 'Lenovo A6000', 2, 2, 3, 7, '10000.00', '9500.00', 0, '0.00', '<h3>Key Features of Lenovo A6000</h3><ul><li>Android v5.1 (Lollipop) OS</li><li>13 MP Primary Camera</li><li>5 MP Secondary Camera</li><li>Dual Sim (LTE + LTE)</li><li>5.5 inch Capacitive Touchscreen</li><li>1.2 GHz Qualcomm Snapdragon 410 Quad Core Processor</li><li>Wi-Fi Enabled</li><li>Expandable Storage Capacity of 128 GB</li></ul>', 2, 5, 9, 23, 'Samsung Galaxy On7', 'Samsung Galaxy On7', 0, 'lenoa69pcx1UqA.jpg/**/lenoa62joycXNLk.jpg/**/lenoa63iRDHKKWo.jpg/**//**/', '06/08/2016', 1, 3, 15, 1),
(26, 22, 'LUCfashion Solid Men''s V-neck Maroon T-Shirt', 2, 2, 3, 9, '799.00', '30.00', 0, '0.00', '<div>Key Features of LUCfashion Solid Men''s V-neck Maroon T-Shirt Fit: Regular Fit Sleeve: Half Sleeve Fabric: 100% Cotton Color:Maroon Number Of Contents in Package:1</div>', 2, 8, 9, 23, 'xxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxx', 0, '13612bumz-lucfashion-m-400x400-imae6xv2k4h9g5pz.jpeg/**/13612bumz-lucfashion-xxl-400x400-imae6xv2myahydsk.jpeg/**/61Yg8h3JjML._UL1500_/**/asn305sko-12bum-lucfashion-400x400-imae5jzq8npa2vze.jpeg/**/', '06/08/2016', 1, 3, 20, 0),
(1, 23, 'LUCfashion Solid Men''s V-neck Green T-Shirt', 2, 2, 3, 9, '499.00', '60.00', 0, '0.00', 'LanosUC has designed this V-neck T-shirt in a versatile solid black shade to give you a cool look effortlessly. Crafted from&nbsp;pure cotton&nbsp;with half-sleeves, this trendy tee can be clubbed with a pair of slim worn effect pants and plimsolls.', 2, 6, 13, 6, 'xxxxxxxxxxxx', 'xxxxxxxxxxxxx', 0, 'Original-Penguin-Green-V-Neck-SDL556475312-1-b6f11yKmrU8HX.jpg/**/Original-Penguin-Green-V-Neck-SDL556475312-2-af117KhytXVQf.jpg/**/Original-Penguin-Green-V-Neck-SDL556475312-3-1be0b8iBQmwsa.jpg/**/', '06/08/2016', 1, 3, 5, 1),
(17, 24, 'Shoe Island Bab088-Tan-9 Casual Shoes', 2, 10, 15, 17, '499.00', '30.00', 0, '0.00', 'Hand-Made With Perfection. Class. Perfection. Relive. Experience The Exotic New Hand-Crafted Range Of #Shoeisland', 2, 8, 9, 4, 'xxxxxxxxx', 'xxxxxxxxx', 0, 'Shoe-Island-Tan-Synthetic-Leather-SDL530640140-1-48618gJt7ep3v.jpg/**/Shoe-Island-Tan-Synthetic-Leather-SDL530640140-2-7df84UCSyGWik.jpg/**/Shoe-Island-Tan-Synthetic-Leather-SDL530640140-3-a0773rGzJwjoG.jpg/**/', '06/08/2016', 1, 3, 10, 0),
(26, 25, 'Isole Beige Casual Shoes', 2, 10, 15, 17, '499.00', '20.00', 0, '0.00', 'Specifications of Isole Beige Casual Shoes Hand-Made With Perfection. Class. Perfection. Relive. Experience The Exotic New Hand-Crafted Range Of #Shoeisland', 2, 3, 9, 4, 'xxxxxxxxx', 'xxxxxxxxx', 0, 'Globalite-White-Canvas-Lace-Casual-SDL273015021-1-5d96bV8AuCQyk.jpg/**/Globalite-White-Canvas-Lace-Casual-SDL273015021-2-df6a73VF8LYOx.jpg/**/Globalite-White-Canvas-Lace-Casual-SDL273015021-3-690feE19lHGdm.jpg/**/', '06/08/2016', 1, 3, 5, 0),
(1, 26, 'CURREN New Fashion', 2, 11, 17, 18, '299.00', '20.00', 0, '0.00', 'Lorem ipsum dolor sit amet, mattis eros blandit, et consequat quis pede erat, per vestibulum nec proin lacus, arcu pede bibendum proin dui ipsum. Viverra quis eget accumsan tempor hendrerit, aut aenean ante ac posuere eget lorem, condimentum quam eu id. Ut in natoque vestibulum integer, odio ut a irure vulputate, et consectetuer eget, ut lacus eget pede aenean aliquip, vitae ligula id ut vitae mauris vestibulum. Sodales nullam vitae dolor posuere mollis nulla, cubilia sagittis, tortor commodo ac tempor fringilla mollis fermentum, consectetuer amet cillum ac amet habitant posuere. Tristique semper. Id sem non felis, rutrum sed magna pede convallis. Ac ut dolor lacus suscipit dolor, suspendisse erat.', 2, 6, 9, 4, 'xxxxx', 'xxxxxx', 0, 'Curren-Brown-Leather-Analog-Watch-SDL118668689-1-8816akQl5KTGb.jpg/**/Curren-Brown-Leather-Analog-Watch-SDL118668689-2-8188bGqv2hEoG.jpg/**/Curren-Brown-Leather-Analog-Watch-SDL118668689-3-338c2CE51pu0R.jpg/**/', '06/08/2016', 1, 3, 30, 1),
(0, 27, 'Vintex CR-01 Curren Analog Watch - For Boys, Men', 2, 11, 17, 18, '399.00', '30.00', 0, '0.00', 'Lorem ipsum dolor sit amet, mattis eros blandit, et consequat quis pede erat, per vestibulum nec proin lacus, arcu pede bibendum proin dui ipsum. Viverra quis eget accumsan tempor hendrerit, aut aenean ante ac posuere eget lorem, condimentum quam eu id. Ut in natoque vestibulum integer, odio ut a irure vulputate, et consectetuer eget, ut lacus eget pede aenean aliquip, vitae ligula id ut vitae mauris vestibulum. Sodales nullam vitae dolor posuere mollis nulla, cubilia sagittis, tortor commodo ac tempor fringilla mollis fermentum, consectetuer amet cillum ac amet habitant posuere. Tristique semper. Id sem non felis, rutrum sed magna pede convallis. Ac ut dolor lacus suscipit dolor, suspendisse erat.', 2, 6, 9, 4, 'xxx', 'xxx', 0, 'Curren-Beige-Analog-Watch-SDL611647344-1-d78e6e7t6x4OB.jpg/**/Curren-Beige-Analog-Watch-SDL611647344-2-0e2a9sxJZkpbU.jpg/**/Curren-Beige-Analog-Watch-SDL611647344-3-37535pC0lFFJO.jpg/**/', '06/08/2016', 1, 3, 6, 1),
(13, 28, 'Sai Fabrics Casual Self Design, Solid Women''s Kurti', 3, 4, 6, 3, '240.00', '15.00', 0, '0.00', 'Lorem ipsum dolor sit amet, mattis eros blandit, et consequat quis pede erat, per vestibulum nec proin lacus, arcu pede bibendum proin dui ipsum. Viverra quis eget accumsan tempor hendrerit, aut aenean ante ac posuere eget lorem, condimentum quam eu id. Ut in natoque vestibulum integer, odio ut a irure vulputate, et consectetuer eget, ut lacus eget pede aenean aliquip, vitae ligula id ut vitae mauris vestibulum. Sodales nullam vitae dolor posuere mollis nulla, cubilia sagittis, tortor commodo ac tempor fringilla mollis fermentum, consectetuer amet cillum ac amet habitant posuere. Tristique semper. Id sem non felis, rutrum sed magna pede convallis. Ac ut dolor lacus suscipit dolor, suspendisse erat.', 2, 9, 9, 23, 'xxxxx', 'xxxxxxthtgh', 0, 'kblack-tanvi-400x400-imaec2ehdafnsbbe.jpeg/**/kblack-tanvi-400x400-imaec2egm96sbdz9.jpeg/**/ptf038-jaytextile-m-400x400-imaec2egteha4gkx.jpeg/**/', '06/08/2016', 1, 2, 15, 1),
(7, 29, 'Sai Fabrics Casual Self Design Women''s Kurti', 3, 4, 6, 3, '240.00', '10.00', 0, '0.00', 'Lorem ipsum dolor sit amet, mattis eros blandit, et consequat quis pede erat, per vestibulum nec proin lacus, arcu pede bibendum proin dui ipsum. Viverra quis eget accumsan tempor hendrerit, aut aenean ante ac posuere eget lorem, condimentum quam eu id. Ut in natoque vestibulum integer, odio ut a irure vulputate, et consectetuer eget, ut lacus eget pede aenean aliquip, vitae ligula id ut vitae mauris vestibulum. Sodales nullam vitae dolor posuere mollis nulla, cubilia sagittis, tortor commodo ac tempor fringilla mollis fermentum, consectetuer amet cillum ac amet habitant posuere. Tristique semper. Id sem non felis, rutrum sed magna pede convallis. Ac ut dolor lacus suscipit dolor, suspendisse erat.', 2, 8, 9, 23, 'xxxx', 'xxxx', 0, 'Sai-Fabrics-Beige-Cotton-Kurti-SDL837839685-1-ab9b6LNsyL2Zs.jpg/**/Sai-Fabrics-Beige-Cotton-Kurti-SDL837839685-2-b0a57yRcN18Qx.jpg/**/Sai-Fabrics-Beige-Cotton-Kurti-SDL837839685-3-d5e18jaagwxYp.jpg/**//**/', '06/08/2016', 1, 3, 20, 1),
(23, 30, 'THE WOOL HOUSE Women''s Red, Pink, Yellow, Black, White, Light Blue Leggings', 3, 7, 10, 15, '625.00', '10.00', 0, '0.00', 'Lorem ipsum dolor sit amet, mattis eros blandit, et consequat quis pede erat, per vestibulum nec proin lacus, arcu pede bibendum proin dui ipsum. Viverra quis eget accumsan tempor hendrerit, aut aenean ante ac posuere eget lorem, condimentum quam eu id. Ut in natoque vestibulum integer, odio ut a irure vulputate, et consectetuer eget, ut lacus eget pede aenean aliquip, vitae ligula id ut vitae mauris vestibulum. Sodales nullam vitae dolor posuere mollis nulla, cubilia sagittis, tortor commodo ac tempor fringilla mollis fermentum, consectetuer amet cillum ac amet habitant posuere. Tristique semper. Id sem non felis, rutrum sed magna pede convallis. Ac ut dolor lacus suscipit dolor, suspendisse erat.', 2, 3, 12, 5, 'xxxxx', 'xxx', 0, 'GOPPS-Yellow-Woolen-Leggings-SDL635969879-1-51217TPduHVfu.jpg/**/GOPPS-Yellow-Woolen-Leggings-SDL635969879-3-13f9faRSdTgVC.jpg/**/GOPPS-Yellow-Woolen-Leggings-SDL635969879-2-22a6dnfckIZp1.jpg/**/', '06/08/2016', 1, 3, 10, 0),
(1, 31, 'Greyon Women''s Multicolor Leggings', 3, 7, 10, 15, '550.00', '20.00', 0, '0.00', 'Lorem ipsum dolor sit amet, mattis eros blandit, et consequat quis pede erat, per vestibulum nec proin lacus, arcu pede bibendum proin dui ipsum. Viverra quis eget accumsan tempor hendrerit, aut aenean ante ac posuere eget lorem, condimentum quam eu id. Ut in natoque vestibulum integer, odio ut a irure vulputate, et consectetuer eget, ut lacus eget pede aenean aliquip, vitae ligula id ut vitae mauris vestibulum. Sodales nullam vitae dolor posuere mollis nulla, cubilia sagittis, tortor commodo ac tempor fringilla mollis fermentum, consectetuer amet cillum ac amet habitant posuere. Tristique semper. Id sem non felis, rutrum sed magna pede convallis. Ac ut dolor lacus suscipit dolor, suspendisse erat.', 2, 8, 12, 5, 'xxxx', 'xxxx', 0, 'Greenwich-Multi-Color-Cotton-Women-SDL089603320-1-577b9FpUEB6DY.jpg/**/Greenwich-Multi-Color-Cotton-Women-SDL089603320-2-b9bb8MhfZJESl.jpg/**/Greenwich-Multi-Color-Cotton-Women-SDL089603320-3-81a01NQBKeR6u.jpg/**/', '06/08/2016', 1, 3, 6, 1),
(0, 32, 'Crocs Baby Boys, Baby Girls Sandals', 4, 6, 13, 14, '1795.00', '199.00', 0, '0.00', 'Weve updated a favorite with a new look, but kept the same Crocs comfort inside. Slip into the bold new Kids Crocband II.5 from Crocs. Kids Crocband II.5 Clog Details: Updated midsole band design. Odor-resistant, easy to clean and quick to dry. Advanced toe box ventilation for breathability. Lightweight, non-marking soles. Water-friendly and buoyant; weighs only ounces. Fully molded Croslite material for lightweight cushioning and comfort. Croslite material heel strap for a secure fit.<br>', 2, 5, 12, 5, 'xxxx', 'xxxxx', 0, 'Crocs-Red-Clogs-SDL758501417-2-803c0LUJpekaF.jpg/**/Crocs-Red-Clogs-SDL758501417-1-455baxipQws7t.jpg/**/Crocs-Red-Clogs-SDL758501417-3-07b2dxuI3Bess.jpg/**/', '06/08/2016', 1, 3, 50, 1),
(0, 34, 'Cutecumber Party Short Sleeve Printed Baby Girl''s Red, White Top', 4, 6, 18, 19, '307.00', '50.00', 0, '0.00', 'Short Sleeve,&nbsp;Pack of 1&nbsp;Knit&nbsp;Printed&nbsp;Baby Girl''s&nbsp;Party dresses', 2, 2, 9, 23, 'xxxxx', 'xxxx', 0, '612-League-Red-White-Printed-SDL234360569-1-e4d58AKg3nUYO.jpg/**/612-League-Red-White-Printed-SDL234360569-2-f44a5WCy9xvCT.jpg/**/612-League-Red-White-Printed-SDL234360569-3-f91d2Lnuvhbuj.jpg/**//**/', '06/08/2016', 1, 3, 50, 1),
(9, 35, 'Globalite Stumble Walking Shoes', 2, 10, 15, 17, '599.00', '299.00', 0, '0.00', 'Cute Walk Shoes by Babyhug meant for precious little feet. A range of super stylish &amp; comfortable footwear, fine crafted from top quality material. Materials and components are carefully chosen for their quality and lightness, ensuring that no shoes are heavier than the proportional age appropriate weight for the child''s body weight.', 2, 2, 9, 4, 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 0, 'Globalite-Stumble-Black-Grey-Men-SDL996600935-1-2a717ksgE6anF.jpg/**/Globalite-Stumble-Black-Grey-Men-SDL996600935-2-9b815LHDnHWfW.jpg/**/Globalite-Stumble-Black-Grey-Men-SDL996600935-3-f14b1qHOHUN3d.jpg/**/', '06/10/2016', 1, 3, 2, 0),
(0, 36, 'Reebok Court Canvas Shoes', 2, 10, 15, 17, '1722.00', '599.00', 0, '0.00', 'Cute Walk Shoes by Babyhug meant for precious little feet. A range of super stylish &amp; comfortable footwear, fine crafted from top quality material. Materials and components are carefully chosen for their quality and lightness, ensuring that no shoes are heavier than the proportional age appropriate weight for the child''s body weight.', 2, 2, 12, 5, 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 0, 'Reebok-On-Court-Iv-Navy-SDL696561302-1-6ca21IPQtSgRU.jpg/**/Reebok-On-Court-Iv-Navy-SDL696561302-2-c8f796Nytmj96.jpg/**/Reebok-On-Court-Iv-Navy-SDL696561302-4-a163eGykzfYYO.jpg/**/', '06/10/2016', 1, 3, 2, 1),
(2, 37, 'Lynda Casual 3/4 Sleeve Floral Print Women''s Black Top', 3, 7, 10, 4, '1299.00', '699.00', 0, '0.00', '<h4>Lynda Casual 3/4 Sleeve Floral Print Women''s Black Top Price: Rs. 699</h4><div>Lynda black floral print shirt<br><br><br></div>', 2, 4, 9, 4, 'Print Women''s Black Top', 'Print Women''s Black Top', 0, 'tops1VvjRdFfI.jpg/**/tops3xqetccZq.jpg/**/tops2zmOlK39u.jpg/**/', '06/08/2016', 1, 2, 50, 1),
(2, 38, 'Lenovo A6000 Special Price', 1, 1, 2, 6, '500.00', '400.00', 0, '0.00', '<h3>Key Features of Lenovo A6000</h3><ul><li>Android v5.1 (Lollipop) OS</li><li>13 MP Primary Camera</li><li>5 MP Secondary Camera</li><li>Dual Sim (LTE + LTE)</li><li>5.5 inch Capacitive Touchscreen</li><li>1.2 GHz Qualcomm Snapdragon 410 Quad Core Processor</li><li>Wi-Fi Enabled</li><li>Expandable Storage Capacity of 128 GB</li></ul><br>', 2, 3, 19, 12, 'Special Price Lenovo A6000', 'Special Price Lenovo A6000', 0, 'Lenovo-A6000-WHITE.jpg/**//**/', '08/30/2016', 0, 1, 500, 1),
(0, 43, 'HP 15-AC167TU Notebook', 6, 16, 24, 38, '22399.00', '22000.00', 0, '0.00', '<div><ul><li>The Best offer for you will be applied directly in the cart</li></ul></div><div><div><div><div><div></div><div><div><div><ul><li>Extra 10% Off on purchases made through All Credit/Debit Cards<a href="https://www.snapdeal.com/offers/bank-offer-nov" target="_blank" rel="">View T&amp;C</a></li></ul></div></div></div></div></div></div><div><div><div><div></div><div><div><div><ul><li>3X Reward Points, Redeemable on Snapdeal with Snapdeal HDFC Credit Card.<a href="https://www.snapdeal.com/offers/sd-hdfc-card" target="_blank" rel="">View T&amp;C</a></li></ul></div></div></div></div></div></div><div><ol></ol><div><ul><li>5% Savings with HDFC Bank Rewards Debit Card.<a href="http://www.hdfcbank.com/personal/products/cards/debit-cards/hdfc-bank-rewards-debit-card" target="_blank" rel="">View T&amp;C</a></li></ul><div><br></div></div></div></div>', 2, 3, 20, 13, 'HP 15-AC167TU Notebook (P4Y38PA) ', 'HP 15-AC167TU Notebook (P4Y38PA) ', 0, 'HP-15-AC167TU-Notebook-P4Y38PA-SDL793038580-1-a64b6.jpg/**/HP-15-AC167TU-Notebook-P4Y38PA-SDL793038580-2-f4768.jpg/**/', '11/11/2016', 1, 1, 50, 1),
(0, 44, 'Nikon D5200', 6, 24, 38, 58, '37000.00', '37000.00', 0, '0.00', '<ol><li><span class="wysiwyg-color-red">See the world with more clarity with Nikon D5200. Make memories with this amazing piece of technology, it enables you to shoot from about any position. This camera comes with a built in HDR (high-dynamic range) – which helps take shots in both dark as well as bright settings. It also offers a plethora of filters at your disposal. So go clicking like a pro.</span></li></ol>', 2, 3, 19, 12, 'Nikon D5200', 'Nikon D5200', 0, 'Nikon-D5200-with-18-55mm-SDL193116648-1-de08f.jpg/**/Nikon-D5200-with-18-55mm-SDL193116648-2-be8f3.jpg/**/', '11/11/2016', 1, 1, 50, 1),
(0, 45, 'Elite Sofa Cum Bed', 5, 14, 23, 36, '14000.00', '12000.00', 0, '0.00', 'Elite Sofa Bed is very comfortable and modern designed. It has been specially designed to provide the most comfort while sitting and sleeping. Its strong and long lasting teak wood frame construction makes it super strong and sturdy for long time use. Its beautiful upholstery adds a different dimension to the overall decor of any area. With a fine quality finish, this sofa cum bed is perfect for those extra guests or friends to sleep with comfort.', 2, 5, 13, 6, 'Elite Sofa Cum Bed', 'Elite Sofa Cum Bed', 0, 'Dolphins-Elite-Fabric-Sofa-cum-SDL566288795-2-19ec8.jpg/**/Dolphins-Elite-Fabric-Sofa-cum-SDL566288795-1-9a877.jpg/**/', '11/11/2016', 1, 1, 20, 1),
(0, 46, 'Spiderman Comic Book', 9, 20, 33, 48, '450.00', '400.00', 0, '0.00', 'The Complete Story of spider man''s Life.&nbsp;', 2, 3, 12, 5, 'Spiderman Comic Book', 'Spiderman Comic Book', 0, 'Free_Comic_Book_Day_Vol_2007_Spider-Man.jpg/**/', '11/11/2016', 1, 0, 100, 1),
(0, 47, 'test new test ', 2, 2, 3, 7, '5500.00', '5.00', 0, '0.00', 'test', 2, 2, 9, 23, 'test', 'test', 0, '9410135-Interior-design-of-modern-apartment-living-room-hall-kitchen-3d-render-Stock-PhotoVIWvhVEH.jpg/**/', '11/14/2016', 1, 0, 5, 1),
(0, 48, 'test new test ', 2, 10, 15, 17, '1500.00', '1.00', 0, '0.00', 'test', 2, 2, 9, 14, 't', 't', 0, '1.png/**/', '11/14/2016', 1, 0, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_prosize`
--

CREATE TABLE IF NOT EXISTS `nm_prosize` (
  `ps_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ps_pro_id` int(10) unsigned NOT NULL,
  `ps_si_id` smallint(5) unsigned NOT NULL,
  `ps_volume` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=589 ;

--
-- Dumping data for table `nm_prosize`
--

INSERT INTO `nm_prosize` (`ps_id`, `ps_pro_id`, `ps_si_id`, `ps_volume`) VALUES
(9, 2, 1, 1),
(50, 37, 1, 1),
(53, 40, 1, 1),
(54, 41, 1, 1),
(55, 42, 1, 1),
(58, 45, 4, 1),
(61, 46, 2, 1),
(79, 48, 5, 1),
(89, 3, 4, 1),
(90, 3, 1, 1),
(91, 3, 3, 1),
(92, 49, 1, 1),
(93, 4, 1, 1),
(94, 50, 6, 1),
(95, 50, 8, 1),
(96, 51, 8, 1),
(97, 51, 7, 1),
(98, 57, 4, 1),
(99, 57, 6, 1),
(100, 57, 1, 1),
(101, 58, 6, 1),
(102, 58, 3, 1),
(103, 58, 2, 1),
(104, 59, 3, 1),
(105, 59, 1, 1),
(106, 59, 9, 1),
(107, 59, 8, 1),
(108, 59, 7, 1),
(109, 59, 2, 1),
(110, 59, 6, 1),
(111, 60, 1, 1),
(112, 60, 3, 1),
(113, 62, 4, 1),
(114, 63, 9, 1),
(115, 63, 7, 1),
(116, 63, 1, 1),
(117, 63, 2, 1),
(118, 63, 4, 1),
(119, 63, 5, 1),
(120, 64, 1, 1),
(121, 64, 6, 1),
(122, 65, 5, 1),
(123, 65, 3, 1),
(124, 66, 4, 1),
(125, 66, 3, 1),
(126, 66, 2, 1),
(127, 66, 1, 1),
(128, 67, 6, 1),
(129, 67, 5, 1),
(130, 67, 4, 1),
(131, 67, 3, 1),
(132, 67, 2, 1),
(133, 67, 1, 1),
(134, 68, 2, 1),
(135, 68, 1, 1),
(136, 69, 2, 1),
(137, 69, 1, 1),
(138, 70, 2, 1),
(139, 70, 1, 1),
(142, 72, 2, 1),
(143, 72, 1, 1),
(144, 73, 4, 1),
(147, 71, 8, 1),
(148, 71, 4, 1),
(149, 74, 1, 1),
(150, 75, 1, 1),
(151, 76, 2, 1),
(152, 76, 1, 1),
(153, 77, 1, 1),
(154, 78, 8, 1),
(155, 78, 1, 1),
(156, 79, 4, 1),
(157, 80, 7, 1),
(158, 81, 2, 1),
(159, 82, 4, 1),
(162, 85, 1, 1),
(163, 86, 1, 1),
(164, 87, 2, 1),
(165, 87, 1, 1),
(166, 88, 2, 1),
(167, 89, 1, 1),
(169, 91, 3, 1),
(170, 91, 2, 1),
(171, 91, 1, 1),
(172, 92, 2, 1),
(173, 92, 1, 1),
(174, 93, 2, 1),
(175, 93, 1, 1),
(176, 94, 2, 1),
(177, 94, 1, 1),
(178, 95, 9, 1),
(179, 95, 8, 1),
(180, 95, 7, 1),
(181, 95, 6, 1),
(182, 95, 5, 1),
(183, 95, 4, 1),
(184, 95, 3, 1),
(185, 95, 2, 1),
(186, 95, 1, 1),
(187, 96, 5, 1),
(188, 96, 4, 1),
(189, 96, 3, 1),
(190, 96, 2, 1),
(191, 96, 1, 1),
(192, 97, 3, 1),
(193, 97, 2, 1),
(194, 97, 1, 1),
(195, 98, 9, 1),
(196, 98, 8, 1),
(197, 98, 6, 1),
(198, 98, 4, 1),
(199, 98, 7, 1),
(200, 98, 5, 1),
(201, 98, 2, 1),
(202, 98, 3, 1),
(203, 98, 1, 1),
(204, 99, 4, 1),
(209, 101, 4, 1),
(210, 101, 3, 1),
(211, 101, 2, 1),
(212, 101, 1, 1),
(213, 102, 3, 1),
(214, 102, 2, 1),
(215, 102, 1, 1),
(216, 103, 3, 1),
(217, 103, 2, 1),
(218, 103, 1, 1),
(219, 104, 5, 1),
(220, 104, 4, 1),
(221, 104, 3, 1),
(222, 104, 2, 1),
(223, 104, 1, 1),
(224, 105, 9, 1),
(225, 105, 8, 1),
(226, 105, 7, 1),
(227, 105, 6, 1),
(228, 105, 5, 1),
(229, 105, 2, 1),
(230, 105, 3, 1),
(231, 105, 4, 1),
(232, 105, 1, 1),
(233, 106, 9, 1),
(234, 106, 8, 1),
(235, 106, 7, 1),
(236, 106, 6, 1),
(237, 106, 5, 1),
(238, 106, 2, 1),
(239, 106, 3, 1),
(240, 106, 4, 1),
(241, 106, 1, 1),
(242, 107, 5, 1),
(243, 107, 8, 1),
(244, 107, 9, 1),
(245, 107, 7, 1),
(246, 107, 6, 1),
(247, 107, 4, 1),
(248, 107, 3, 1),
(249, 107, 2, 1),
(250, 107, 1, 1),
(251, 108, 3, 1),
(261, 109, 1, 1),
(262, 110, 3, 1),
(263, 111, 7, 1),
(264, 111, 5, 1),
(268, 47, 2, 1),
(269, 47, 4, 1),
(270, 47, 8, 1),
(272, 100, 1, 1),
(273, 100, 2, 1),
(274, 100, 3, 1),
(275, 100, 4, 1),
(279, 83, 1, 1),
(281, 84, 3, 1),
(284, 112, 3, 1),
(285, 112, 6, 1),
(286, 54, 3, 1),
(289, 90, 1, 1),
(293, 2, 6, 1),
(294, 2, 8, 1),
(295, 2, 7, 1),
(296, 3, 8, 1),
(297, 3, 7, 1),
(298, 4, 10, 1),
(299, 4, 9, 1),
(300, 4, 7, 1),
(301, 4, 6, 1),
(313, 1, 7, 1),
(314, 1, 8, 1),
(315, 1, 1, 1),
(329, 6, 8, 1),
(330, 5, 4, 1),
(331, 5, 5, 1),
(332, 5, 8, 1),
(333, 5, 7, 1),
(334, 5, 1, 1),
(335, 7, 10, 1),
(336, 8, 10, 1),
(463, 13, 6, 1),
(464, 13, 4, 1),
(465, 14, 10, 1),
(468, 15, 1, 1),
(469, 15, 10, 1),
(471, 16, 1, 1),
(472, 16, 1, 1),
(475, 19, 10, 1),
(476, 19, 1, 1),
(477, 20, 2, 1),
(478, 20, 3, 1),
(479, 25, 1, 1),
(480, 25, 4, 1),
(481, 26, 7, 1),
(482, 26, 3, 1),
(483, 27, 1, 1),
(484, 27, 5, 1),
(485, 27, 4, 1),
(486, 27, 6, 1),
(487, 24, 2, 1),
(488, 24, 5, 1),
(489, 21, 4, 1),
(490, 21, 1, 1),
(491, 21, 2, 1),
(492, 21, 3, 1),
(493, 23, 3, 1),
(494, 23, 2, 1),
(495, 23, 4, 1),
(496, 35, 3, 1),
(497, 35, 1, 1),
(498, 36, 2, 1),
(499, 36, 1, 1),
(502, 30, 5, 1),
(503, 30, 4, 1),
(504, 31, 3, 1),
(505, 31, 3, 1),
(506, 31, 7, 1),
(509, 32, 1, 1),
(510, 32, 5, 1),
(511, 32, 4, 1),
(514, 9, 13, 1),
(515, 9, 1, 1),
(516, 9, 10, 1),
(520, 12, 1, 1),
(521, 12, 10, 1),
(522, 12, 2, 1),
(527, 33, 5, 1),
(528, 33, 1, 1),
(531, 38, 1, 1),
(532, 38, 10, 1),
(533, 38, 1, 1),
(534, 10, 10, 1),
(535, 10, 1, 1),
(546, 11, 7, 1),
(547, 11, 6, 1),
(548, 11, 5, 1),
(549, 40, 2, 1),
(550, 17, 1, 1),
(553, 41, 2, 1),
(554, 42, 3, 1),
(555, 22, 3, 1),
(556, 22, 2, 1),
(557, 22, 4, 1),
(561, 29, 6, 1),
(562, 29, 5, 1),
(563, 39, 3, 1),
(565, 43, 2, 1),
(567, 44, 5, 1),
(568, 45, 2, 1),
(569, 46, 2, 1),
(570, 47, 2, 1),
(574, 34, 3, 1),
(576, 28, 3, 1),
(577, 28, 3, 1),
(578, 28, 7, 1),
(579, 48, 2, 1),
(580, 48, 4, 1),
(581, 48, 12, 1),
(582, 48, 11, 1),
(583, 48, 9, 1),
(584, 48, 7, 1),
(585, 48, 5, 1),
(586, 48, 3, 1),
(587, 49, 2, 1),
(588, 18, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_prospec`
--

CREATE TABLE IF NOT EXISTS `nm_prospec` (
  `spc_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `spc_pro_id` int(10) unsigned NOT NULL,
  `spc_sp_id` smallint(5) unsigned NOT NULL,
  `spc_value` text NOT NULL,
  PRIMARY KEY (`spc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `nm_prospec`
--

INSERT INTO `nm_prospec` (`spc_id`, `spc_pro_id`, `spc_sp_id`, `spc_value`) VALUES
(15, 3, 1, ''),
(16, 49, 1, 'fasassas'),
(18, 55, 1, ''),
(19, 56, 1, 'cool wear'),
(20, 57, 1, 'comfort'),
(21, 58, 1, 'comfort'),
(22, 59, 1, 'good'),
(23, 61, 1, 'sofa material'),
(24, 63, 1, 'sofa specification'),
(25, 68, 1, 'material'),
(26, 79, 1, 'SOFA'),
(27, 80, 1, 'comfort'),
(29, 54, 1, 'Good'),
(39, 12, 2, '3/4 Sleeve'),
(40, 45, 2, '2'),
(41, 45, 5, '10'),
(42, 28, 1, 'dd'),
(43, 28, 1, 'dd'),
(44, 28, 1, 'dd'),
(45, 48, 6, 't'),
(46, 48, 7, 't'),
(47, 48, 1, 't'),
(48, 49, 1, 'cfd'),
(49, 49, 7, 'dfd'),
(50, 49, 7, 'dfds');

-- --------------------------------------------------------

--
-- Table structure for table `nm_referaluser`
--

CREATE TABLE IF NOT EXISTS `nm_referaluser` (
  `ruse_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruse_date` datetime NOT NULL,
  `ruse_name` varchar(100) NOT NULL,
  `ruse_emailid` varchar(150) NOT NULL,
  `ruse_userid` int(10) unsigned NOT NULL,
  `ruse_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ruse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_review`
--

CREATE TABLE IF NOT EXISTS `nm_review` (
  `comment_id` int(50) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) DEFAULT NULL,
  `deal_id` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `status` int(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sam1` int(50) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `nm_review`
--

INSERT INTO `nm_review` (`comment_id`, `product_id`, `deal_id`, `store_id`, `customer_id`, `title`, `comments`, `ratings`, `status`, `created_date`, `sam1`) VALUES
(1, '69', NULL, NULL, '19', 'Super', 'Nice Products kids denim trousers', '3', 0, '2016-10-19 11:48:34', 0),
(10, '62', NULL, NULL, '19', 'BEAUTIFUL PRODUCT.', 'kids denim trousers is nice product', '1', 0, '2016-06-02 18:07:17', 0),
(13, '74', NULL, NULL, '19', 'Cray Cloths', 'Nice Products', '1', 0, '2016-06-02 19:07:17', 0),
(14, '62', NULL, NULL, '19', 'Nice Products', 'Nice Products thursday', '2', 0, '2016-06-03 12:28:50', 0),
(17, NULL, '20', NULL, '19', 'Deal for week nice vv', 'Nice product when will launch cvcvcv.', '1', 1, '2016-10-19 14:02:09', 0),
(18, '75', NULL, NULL, '19', 'Nice Products', 'Good Product make it easy.', '1', 0, '2016-06-03 13:40:40', 0),
(19, '75', NULL, NULL, '19', 'Nice Prd', 'Prd Nice', '2', 0, '2016-06-02 15:53:04', 0),
(22, '5', NULL, NULL, '19', 'Short Sleeve Graphic Print', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '3', 0, '2016-06-04 06:41:49', 0),
(23, '5', NULL, NULL, '15', ' Women''s White Top', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo?', '1', 0, '2016-06-04 06:43:58', 0),
(24, NULL, '26', NULL, '15', 'Quality and cost', 'Worth product for this Cost', '4', 1, '2016-10-19 13:32:08', 0),
(25, NULL, '27', NULL, '15', 'Nice Deal', 'This is a very good deal', '3', 1, '2016-10-19 13:33:12', 0),
(26, NULL, '27', NULL, '15', 'fgfhfhfgh', 'hgfhgfhgfhgfhgfhfgh', '2', 1, '2016-10-19 13:34:57', 0),
(27, '1', NULL, NULL, '19', 'Nice Shirts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', '1', 0, '2016-06-06 12:37:10', 0),
(28, NULL, '26', NULL, '19', 'Nice Deals', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '1', 0, '2016-06-06 12:57:43', 0),
(31, '9', NULL, NULL, '23', 'Nice Product', 'It is worthful pproduct for this cost', '2', 0, '2016-06-08 11:39:22', 0),
(32, '10', NULL, NULL, '23', 'I like this product', 'Attractive color and best materiel.', '4', 0, '2016-06-08 11:49:55', 0),
(33, NULL, '2', NULL, '23', 'Best for cost', 'looking nice quality', '3', 0, '2016-06-08 12:10:46', 0),
(34, '15', NULL, NULL, '25', 'Lenovo K3 Note', 'Nice Products', '1', 0, '2016-06-10 14:46:24', 0),
(35, NULL, '45', NULL, '23', 'Nice deal.', 'It is very good deal, i will recommend to my friends', '3', 0, '2016-06-11 05:00:53', 0),
(37, NULL, NULL, '1', '25', 'Today', 'Nice Products good sales', '2', 0, '2016-06-11 07:26:19', 0),
(41, '14', NULL, NULL, '25', 'Lenovo', 'Nice Products', '2', 0, '2016-06-11 07:55:24', 0),
(44, NULL, '3', NULL, '31', 'Deal product', 'Nice camera', '1', 0, '2016-06-11 08:25:36', 0),
(45, '13', NULL, NULL, '42', 'Nice Cloths', 'hdsghsdfhsd', '1', 0, '2016-07-12 13:03:44', 0),
(46, '13', NULL, NULL, '82', 'Legens Top', 'Nice Tops and Best price', '1', 0, '2016-07-12 13:12:45', 0),
(47, '23', NULL, NULL, '28', 'Best Product', 'This T- Shirt is best product. Its have good quality and design', '5', 0, '2016-08-11 10:53:58', 0),
(48, '23', NULL, NULL, '99', 'Good Product', 'This product''s good quality and design.', '5', 0, '2016-08-23 09:48:37', 0),
(49, '23', NULL, NULL, '99', 'sfdg', 'dfgfhgf', '5', 0, '2016-08-23 09:49:10', 0),
(50, '11', NULL, NULL, '101', 'Duvida', 'Muit bom', '4', 0, '2016-08-28 01:34:51', 0),
(51, NULL, '7', NULL, '84', 'Nice collection', 'very nice collect.cost effective', '4', 0, '2016-10-19 13:17:10', 0),
(52, '27', NULL, NULL, '84', 'Nice Design', 'xzxzxzxzxzxzxxzxzxzx', '3', 0, '2016-11-03 04:49:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_secmaincategory`
--

CREATE TABLE IF NOT EXISTS `nm_secmaincategory` (
  `smc_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `smc_name` varchar(100) NOT NULL,
  `smc_mc_id` smallint(5) unsigned NOT NULL,
  `smc_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`smc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `nm_secmaincategory`
--

INSERT INTO `nm_secmaincategory` (`smc_id`, `smc_name`, `smc_mc_id`, `smc_status`) VALUES
(1, 'Mobiles', 1, 1),
(2, 'Cloths', 2, 1),
(4, 'Ethnic Wear', 3, 1),
(6, 'Baby Care', 4, 1),
(7, 'Western Wear', 3, 1),
(8, 'Clock', 1, 1),
(9, 'Digital Camera', 1, 1),
(10, 'Footwear', 2, 1),
(11, 'Watches', 2, 1),
(12, 'Cloths', 4, 1),
(13, 'ccccc', 1, 1),
(14, 'Furnitures', 5, 1),
(15, 'Kitchenware', 5, 1),
(16, 'Computers & Gaming', 6, 1),
(17, 'Cricket Kit', 7, 1),
(18, 'Cars', 8, 1),
(19, 'Bikes', 8, 1),
(20, 'Story Books', 9, 1),
(21, 'Text Books', 9, 1),
(22, 'Biography', 9, 1),
(23, 'Bikes', 7, 1),
(24, 'Cameras', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_secsubcategory`
--

CREATE TABLE IF NOT EXISTS `nm_secsubcategory` (
  `ssb_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ssb_name` varchar(100) NOT NULL,
  `ssb_sb_id` smallint(5) unsigned NOT NULL,
  `ssb_smc_id` smallint(5) unsigned NOT NULL,
  `mc_id` smallint(5) unsigned NOT NULL,
  `ssb_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ssb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `nm_secsubcategory`
--

INSERT INTO `nm_secsubcategory` (`ssb_id`, `ssb_name`, `ssb_sb_id`, `ssb_smc_id`, `mc_id`, `ssb_status`) VALUES
(1, 'Checked Shirts', 4, 2, 2, 1),
(2, 'Regular Fit', 9, 2, 2, 1),
(3, 'Indigo', 6, 3, 4, 1),
(4, 'Printed Tops', 10, 3, 7, 1),
(5, 'Analog', 11, 1, 8, 1),
(6, 'Android Mobiles', 2, 1, 1, 1),
(7, 'Polo', 3, 2, 2, 1),
(8, 'Rounded Neck', 3, 2, 2, 1),
(9, 'V-Neck', 3, 2, 2, 1),
(10, 'Samsung Galaxy ', 1, 1, 1, 1),
(12, 'Lenovo S90 ', 2, 1, 1, 1),
(13, 'Sony CyberShot', 12, 1, 9, 1),
(14, 'Boys Footwear', 13, 4, 6, 1),
(15, 'Leggings', 10, 3, 7, 1),
(16, 'Girls Footwear', 13, 4, 6, 1),
(17, 'Casual Shoes', 15, 2, 10, 1),
(18, ' Black Steel Wrist Watch', 17, 2, 11, 1),
(19, 'Baby League  Regular Tops', 18, 4, 6, 1),
(20, 'Samsung Galaxy A5 bb', 1, 1, 1, 1),
(21, 'Sony Xperia M4', 1, 1, 1, 0),
(22, 'Z Berries Shrug', 19, 3, 7, 1),
(23, 'Empire Waist Pink Dress', 20, 4, 12, 1),
(24, 'Tshirts', 20, 4, 12, 1),
(25, 'Shirts', 20, 4, 12, 1),
(26, 'Ethnic Dhoti', 20, 4, 12, 1),
(27, 'Anarkali Suit', 20, 4, 12, 1),
(28, 'Slim Fit', 21, 3, 7, 1),
(29, 'Patiala', 6, 3, 4, 1),
(33, 'Johnson ', 22, 4, 6, 1),
(34, 'Lotion', 22, 4, 6, 1),
(35, 'Diaper Bag', 7, 4, 6, 1),
(36, 'Living Room', 23, 5, 14, 1),
(37, 'Bed Room', 23, 5, 14, 1),
(38, '2 in 1 Laptops', 24, 6, 16, 1),
(39, 'Mac Books', 24, 6, 16, 1),
(40, 'Note Books', 24, 6, 16, 1),
(41, 'Helmets', 27, 7, 17, 1),
(42, 'Maruthi', 28, 8, 18, 1),
(43, 'Hundai', 29, 8, 18, 1),
(44, 'Audi', 30, 8, 18, 1),
(45, 'Ancient India', 31, 9, 20, 1),
(46, 'Nagas', 32, 9, 20, 1),
(47, 'Superman', 33, 9, 20, 1),
(48, 'Spider Man', 33, 9, 20, 1),
(49, 'Mercedes Benz', 30, 8, 18, 1),
(50, 'Hero', 34, 8, 19, 1),
(51, 'Honda', 34, 8, 19, 1),
(52, 'Yamaha', 35, 8, 19, 1),
(53, 'Suzuki', 35, 8, 19, 1),
(54, 'Royal Enfield', 36, 8, 19, 1),
(55, 'Harley Davidson', 36, 8, 19, 1),
(56, 'Canon', 37, 6, 24, 1),
(58, 'Nikon', 38, 6, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_shipping`
--

CREATE TABLE IF NOT EXISTS `nm_shipping` (
  `ship_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ship_name` varchar(100) NOT NULL,
  `ship_address1` varchar(200) NOT NULL,
  `ship_address2` varchar(200) NOT NULL,
  `ship_ci_id` int(11) NOT NULL,
  `ship_state` varchar(100) NOT NULL,
  `ship_country` smallint(5) unsigned NOT NULL,
  `ship_postalcode` varchar(20) NOT NULL,
  `ship_phone` varchar(20) NOT NULL,
  `ship_email` varchar(255) NOT NULL,
  `ship_order_id` int(10) unsigned NOT NULL,
  `ship_cus_id` bigint(20) NOT NULL,
  PRIMARY KEY (`ship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=467 ;

--
-- Dumping data for table `nm_shipping`
--

INSERT INTO `nm_shipping` (`ship_id`, `ship_name`, `ship_address1`, `ship_address2`, `ship_ci_id`, `ship_state`, `ship_country`, `ship_postalcode`, `ship_phone`, `ship_email`, `ship_order_id`, `ship_cus_id`) VALUES
(1, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 0, 25),
(2, 'yamuna', '', '', 1, '', 1, '', '', '', 0, 3),
(3, 'testing', 'coimbatore', 'vadavalli', 1, 'tmilnadu', 1, '641021', '7598400215', '', 0, 4),
(4, 'testing', 'coimbatore', 'vadavalli', 0, 'tmilnadu', 0, '641021', '--', '', 1, 4),
(5, 'sethu', 'coimbatore', 'vadavalli', 1, 'tamilnadu', 1, '641021', '9789453352', '', 0, 5),
(6, 'sethu', 'coimbatore', 'vadavalli', 0, 'tamilnadu', 0, '641021', '--', '', 2, 5),
(7, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 12, 25),
(8, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 19, 25),
(9, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 29, 25),
(10, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 15, 25),
(11, 'din', '', '', 1, '', 1, '', '', '', 0, 20),
(12, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 36, 25),
(13, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 38, 25),
(14, 'dinesh', '', '', 1, '', 1, '', '', '', 0, 21),
(15, 'Marimuthu', '4/156, North Garden, Palladam', 'Coimbatore(post)', 0, 'Coimbatore', 0, '641041', '9874563210', '', 39, 21),
(16, '', '', '', 0, '', 0, '', '', '', 40, 21),
(17, 'dfgdfg', '', '', 1, '', 1, '', '', '', 0, 22),
(18, 'shankar', '', '', 1, '', 1, '', '', '', 0, 26),
(19, 'viniu', '', '', 1, '', 1, '', '', '', 0, 27),
(20, 'viniu', '', '', 1, '', 1, '', '', '', 0, 28),
(21, 'viniu', '', '', 1, '', 1, '', '', '', 0, 29),
(22, 'viniu', '', '', 1, '', 1, '', '', '', 0, 30),
(23, 'Bharathi', '', '', 1, '', 1, '', '', '', 0, 32),
(24, 'Priya', '', '', 1, '', 1, '', '', '', 0, 33),
(25, 'Gowtham', '', '', 1, '', 1, '', '', '', 0, 34),
(26, 'Gowtham', '', '', 1, '', 1, '', '', '', 0, 35),
(27, 'suresh', '', '', 1, '', 1, '', '', '', 0, 36),
(28, 'suresh', '', '', 1, '', 1, '', '', '', 0, 37),
(29, 'suresh', '', '', 1, '', 1, '', '', '', 0, 38),
(30, 'Gowtham', '', '', 1, '', 1, '', '', '', 0, 39),
(31, 'mate', 'bfd', 'gfdgfdg', 1, 'hfhg', 1, '457353', '789525332', '', 0, 40),
(32, 'Gowtham', '', '', 1, '', 1, '', '', '', 0, 41),
(33, 'mate', 'bfd', 'gfdgfdg', 1, 'hfhg', 1, '457353', '789525332', '', 56, 40),
(34, 'mate', 'bfd', 'gfdgfdg', 1, 'hfhg', 1, '457353', '789525332', '', 57, 40),
(35, 'suresh1', '', '', 1, '', 1, '', '', '', 0, 42),
(36, 'mate', 'bfd', 'gfdgfdg', 1, 'hfhg', 1, '457353', '789525332', '', 118, 40),
(37, 'mate', 'bfd', 'gfdgfdg', 1, 'hfhg', 1, '457353', '789525332', '', 59, 40),
(38, 'mate', 'bfd', 'gfdgfdg', 1, 'hfhg', 1, '457353', '789525332', '', 60, 40),
(39, 'manu', '', '', 1, '', 1, '', '', '', 0, 45),
(40, 'shanmu', '', '', 1, '', 1, '', '', '', 0, 46),
(41, 'dsfaew', '', '', 1, '', 1, '', '', '', 0, 47),
(42, 'kailashkumar', 'anna street', 'chatram', 2, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 0, 48),
(43, 'test', '', '', 1, '', 1, '', '', '', 0, 49),
(44, 'suresh', '', '', 1, '', 1, '', '', '', 0, 50),
(45, 'est', '', '', 1, '', 1, '', '', '', 0, 51),
(46, 'test', 'tesste', 'teste', 0, 'teste', 0, '2732733', '657657687', '', 120, 51),
(47, '', '', '', 0, '', 0, '', '', '', 121, 51),
(48, 'test', '', '', 1, '', 1, '', '', '', 0, 52),
(49, 'tezt', 'rqwr', 'qeqe', 0, 'reads', 0, '300000', '23413423', '', 122, 52),
(50, '', '', '', 0, '', 0, '', '', '', 123, 52),
(51, 'Habib', '', '', 1, '', 1, '', '', '', 0, 53),
(52, 'Habib Ynusa', 'c17 Kaduna', 'c17 Kaduna', 0, 'Nigeria', 0, '600001', '0806211490', '', 63, 53),
(53, '', '', '', 0, '', 0, '', '', '', 64, 53),
(54, 'mahesh', '', '', 1, '', 1, '', '', '', 0, 54),
(55, 'horny', '', '', 0, '', 1, '', '', '', 0, 55),
(56, 'vince', '', '', 1, '', 1, '', '', '', 0, 56),
(57, 'mahesh', '', '', 1, '', 1, '', '', '', 0, 57),
(58, 'test', '', '', 1, '', 1, '', '', '', 0, 58),
(59, 'test', '', '', 1, '', 1, '', '', '', 0, 59),
(60, 'test', '20,test', 'tester ', 0, 'AP', 0, '456324', '8495559723', '', 65, 59),
(61, 'dave', '', '', 1, '', 1, '', '', '', 0, 60),
(62, 'kumar kumar', '144,ramnagar', 'sengupatha street', 1, 'tamilnadu', 1, '641009', '9500818702', 'sales@laravelecommerce.com', 0, 61),
(63, 'balaji', 'Dhamnunagar', 'Puliyakulam', 1, 'Tamilnadu', 1, '641045', '9952440467', '', 0, 62),
(64, 'charles', 'Redfields', 'Puliyakulam', 1, 'Tamilnadu', 1, '641045', '9498056637', '', 0, 63),
(65, 'charles', '', '', 1, '', 1, '', '', '', 0, 64),
(66, 'charles', '', '', 1, '', 1, '', '', '', 0, 65),
(67, 'charles', '', '', 1, '', 1, '', '', '', 0, 66),
(68, 'vivek', '', '', 1, '', 1, '', '', '', 0, 67),
(69, 'charles', '', '', 1, '', 1, '', '', '', 0, 68),
(70, 'charles', '', '', 1, '', 1, '', '', '', 0, 69),
(71, 'babu', '', '', 1, '', 1, '', '', '', 0, 70),
(72, 'charles', '', '', 1, '', 1, '', '', '', 0, 71),
(73, 'charlesjc', '', '', 1, '', 1, '', '', '', 0, 72),
(74, 'charlesjc', '', '', 1, '', 1, '', '', '', 0, 73),
(75, 'rajesh', '144', '122', 1, 'tn', 1, '641010', '1231231231', 'erkprajesh@gmail.com', 0, 74),
(76, 'kumar', 'test1', 'test2', 1, 'tn', 1, '641009', '9745232341', 'rrpofi@gmail.com', 0, 75),
(77, 'victorboss', 'Ramnagar', 'Gandipuram', 1, 'Tamilnadu', 1, '641045', '9498056637', '', 0, 76),
(78, 'rajesh', '', '', 1, '', 1, '', '', '', 0, 77),
(79, 'rajesh', '', '', 1, '', 1, '', '', '', 0, 78),
(80, '', '', '', 0, '', 0, '', '', '', 133, 77),
(81, 'balji', '', '', 1, '', 1, '', '', '', 0, 92),
(82, 'Jayson', '?12, Prince Edward Road, #04-06 Podium A,', 'Bestway Building', 0, 'N/A', 0, '079212', '96172158', '', 135, 93),
(83, 'Ali', '', '', 1, '', 1, '', '', '', 0, 94),
(84, 'pavi', '', '', 1, '', 1, '', '', '', 0, 96),
(85, 'huyhoang', '', '', 1, '', 1, '', '', '', 0, 99),
(86, 'Li', 'dd', 'dd', 0, 'Ifugao', 0, '996584', '0915127728', '', 136, 100),
(87, 'hfhfh', 'fhfh', 'fhfhf', 0, '100000', 0, '100000', '0988543131', '', 89, 102),
(88, 'unicon', '', '', 1, '', 1, '', '', '', 0, 106),
(89, 'kkkk', '', '', 1, '', 1, '', '', '', 0, 107),
(90, 'kkkk', 'kkkk', 'kkkk', 0, 'kkkk', 0, '124544', '123000000', '', 138, 107),
(91, '', '', '', 0, '', 0, '', '', '', 139, 107),
(92, 'bike', '', '', 1, '', 1, '', '', '', 0, 108),
(93, 'sh', '', '', 1, '', 1, '', '', '', 0, 109),
(94, 'sdfasdf', '', '', 1, '', 1, '', '', '', 0, 111),
(95, 'sdfasdf', '', '', 1, '', 1, '', '', '', 0, 112),
(96, 'Test', '', '', 1, '', 1, '', '', '', 0, 113),
(97, 'vinay', '', '', 1, '', 1, '', '', '', 0, 116),
(98, 'testuser', '', '', 1, '', 1, '', '', '', 0, 119),
(99, 'aa', 'aaa', 'aaa', 0, 'aaa', 0, '111111', '1111111111', '', 140, 119),
(100, '', '', '', 0, '', 0, '', '', '', 141, 119),
(101, '', '', '', 0, '', 0, '', '', '', 142, 119),
(102, 'a', 'a', '11', 0, '111', 0, '111122', '11118988', '', 143, 120),
(103, 'arun', '', '', 1, '', 1, '', '', '', 0, 122),
(104, 'testery', '', '', 1, '', 1, '', '', '', 0, 124),
(105, 'kumar', '', '', 1, '', 1, '', '', '', 0, 125),
(106, '432432', '', '', 1, '', 1, '', '', '', 0, 126),
(107, 'Vineet', '', '', 1, '', 1, '', '', '', 0, 131),
(108, '', '', '', 0, '', 0, '', '', '', 145, 131),
(109, 'zam', 'jogja', 'jogja', 0, 'jogja', 0, '123456', '0292920000', '', 92, 132),
(110, '', '', '', 0, '', 0, '', '', '', 147, 132),
(111, 'dfas', '', '', 1, '', 1, '', '', '', 0, 133),
(112, 'ilakkiya', '', '', 1, '', 1, '', '', '', 0, 134),
(113, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 93, 134),
(114, '', '', '', 0, '', 0, '', '', '', 94, 134),
(115, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 148, 134),
(116, 'ilakkiya', '', '', 1, '', 1, '', '', '', 0, 135),
(117, 'ilakkiya', 'gandhipuram', 'namnagar', 0, 'tamilnadu', 0, '641008', '8883152529', '', 149, 134),
(118, '', '', '', 0, '', 0, '', '', '', 150, 134),
(119, 'ilakkiya', '', '', 2, '', 1, '', '', '', 0, 136),
(120, 'surya', '', '', 1, '', 1, '', '', '', 0, 137),
(121, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 151, 137),
(122, '', '', '', 0, '', 0, '', '', '', 152, 137),
(123, '', '', '', 0, '', 0, '', '', '', 153, 137),
(124, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 95, 137),
(125, '', '', '', 0, '', 0, '', '', '', 96, 137),
(126, '', '', '', 0, '', 0, '', '', '', 97, 137),
(127, 'ilakkiya m', '', '', 1, '', 1, '', '', '', 0, 138),
(128, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 98, 137),
(129, 'Test', 'Test', 'Test', 0, 'Test', 0, '99999999999999', '7968748368', '', 154, 139),
(130, '', '', '', 0, '', 0, '', '', '', 155, 139),
(131, 'Test', 'Test', 'Test', 0, 'Test', 0, '99999999999999', '7968748368', '', 99, 139),
(132, '', '', '', 0, '', 0, '', '', '', 100, 139),
(133, 'Rajeshkumar', 'POFI TECHNOLOGIES PRIVATE LIMITED (OPC)', '#144, 1st Floor, Sengupta Street, Ram Nagar,', 0, 'Tamil Nadu', 0, '641009', '9500818702', '', 156, 81),
(134, 'Rajeshkumar', 'POFI TECHNOLOGIES PRIVATE LIMITED (OPC)', '#144, 1st Floor, Sengupta Street, Ram Nagar,', 0, 'Tamil Nadu', 0, '641009', '9500818702', '', 157, 81),
(135, 'Rajeshkumar', 'POFI TECHNOLOGIES PRIVATE LIMITED (OPC)', '#144, 1st Floor, Sengupta Street, Ram Nagar,', 0, 'Tamil Nadu', 0, '641009', '9500818702', '', 101, 81),
(136, 'Test', '', '', 2, '', 1, '', '', '', 0, 140),
(137, 'root-master', '', '', 2, '', 1, '', '', '', 0, 141),
(138, 'ilakkiya', '', '', 1, '', 1, '', '', '', 0, 142),
(139, 'ilakkiya', '', '', 1, '', 1, '', '', '', 0, 143),
(140, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 102, 142),
(141, 'ilakkiya m', '', '', 1, '', 1, '', '', '', 0, 145),
(142, 'ilakkiya', '', '', 2, '', 1, '', '', '', 0, 146),
(143, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 103, 146),
(144, 'charles', '', '', 1, '', 1, '', '', '', 0, 147),
(145, 'charles', '', '', 1, '', 1, '', '', '', 0, 148),
(146, 'charles', '', '', 1, '', 1, '', '', '', 0, 149),
(147, 'charles', '', '', 1, '', 1, '', '', '', 0, 150),
(148, 'charles', '', '', 1, '', 1, '', '', '', 0, 151),
(149, 'charles', '', '', 2, '', 1, '', '', '', 0, 152),
(150, 'charles', '', '', 1, '', 1, '', '', '', 0, 153),
(151, 'charles', '', '', 1, '', 1, '', '', '', 0, 154),
(152, 'charles', '', '', 2, '', 1, '', '', '', 0, 155),
(153, 'charles', '', '', 2, '', 1, '', '', '', 0, 156),
(154, 'charles', '', '', 2, '', 1, '', '', '', 0, 157),
(155, 'charles', '', '', 1, '', 1, '', '', '', 0, 158),
(156, 'charles', '', '', 2, '', 1, '', '', '', 0, 159),
(157, 'charles', '', '', 2, '', 1, '', '', '', 0, 160),
(158, 'sdgsdgs', '', '', 2, '', 1, '', '', '', 0, 161),
(159, 'sdgsdgs', '', '', 2, '', 1, '', '', '', 0, 162),
(160, 'Ahmey', '', '', 1, '', 1, '', '', '', 0, 163),
(161, 'shafiq', '', '', 2, '', 1, '', '', '', 0, 164),
(162, 'charles', '', '', 2, '', 1, '', '', '', 0, 165),
(163, 'charles fdddfh', '', '', 2, '', 1, '', '', '', 0, 166),
(164, 'dfsdfg', '', '', 2, '', 1, '', '', '', 0, 167),
(165, '', '', '', 0, '', 0, '', '', '', 108, 130),
(166, 'sdfasdsad', 'asdasd', 'asdasd', 0, 'asdasd', 0, '23434234234', '2342342342', '', 109, 168),
(167, 'dfhdfhfd', '', '', 1, '', 1, '', '', '', 0, 169),
(168, 'arun', '', '', 1, '', 1, '', '', '', 0, 170),
(169, 'arun', '', '', 1, '', 1, '', '', '', 0, 171),
(170, 'dfhdfhd', '', '', 2, '', 1, '', '', '', 0, 172),
(171, 'arun', '', '', 1, '', 1, '', '', '', 0, 173),
(172, 'arun', '', '', 1, '', 1, '', '', '', 0, 174),
(173, 'charles', '', '', 2, '', 1, '', '', '', 0, 175),
(174, 'dfhdfhd', '', '', 2, '', 1, '', '', '', 0, 176),
(175, 'fddfhdfh', '', '', 2, '', 1, '', '', '', 0, 177),
(176, 'shsfhsf', '', '', 2, '', 1, '', '', '', 0, 178),
(177, 'dfhdfhdf', '', '', 0, '', 0, '', '', '', 0, 179),
(178, 'fdhdhfd', '', '', 0, '', 0, '', '', '', 0, 180),
(179, 'ccc', '', '', 2, '', 1, '', '', '', 0, 181),
(180, 'fff', '', '', 1, '', 1, '', '', '', 0, 182),
(181, 'gh', '', '', 2, '', 1, '', '', '', 0, 183),
(182, 'dhdhddf', '', '', 2, '', 1, '', '', '', 0, 184),
(183, 'sfhhsffsh', '', '', 2, '', 1, '', '', '', 0, 185),
(184, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 0, 25),
(185, 'charles', '', '', 2, '', 1, '', '', '', 0, 2),
(186, 'pavithran', '', '', 2, '', 1, '', '', '', 0, 3),
(187, 'pavithran', '', '', 2, '', 1, '', '', '', 0, 4),
(188, 'sdgsdgs', '', '', 1, '', 1, '', '', '', 0, 6),
(189, 'charles', '', '', 1, '', 1, '', '', '', 0, 7),
(190, 'dadsagds', '', '', 1, '', 1, '', '', '', 0, 8),
(191, 'sdgsdgs', '', '', 1, '', 1, '', '', '', 0, 9),
(192, 'new', '', '', 1, '', 1, '', '', '', 0, 10),
(193, 'charles', '', '', 2, '', 1, '', '', '', 0, 11),
(194, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 0, 25),
(195, 'charles', '', '', 1, '', 1, '', '', '', 0, 2),
(196, 'charles', '', '', 1, '', 1, '', '', '', 0, 3),
(197, 'charles', '', '', 1, '', 1, '', '', '', 0, 4),
(198, 'pavithran', '', '', 1, '', 1, '', '', '', 0, 5),
(199, 'dfhdhdf', '', '', 1, '', 1, '', '', '', 0, 6),
(200, 'charles', '', '', 1, '', 1, '', '', '', 0, 7),
(201, 'demo', '', '', 1, '', 1, '', '', '', 0, 8),
(202, 'mahesh', 'eerwrwer', 'erewrwer', 1, 'tn', 1, '3423423', '365536565', '', 0, 14),
(203, 'kailash', '', '', 1, '', 1, '', '', '', 0, 15),
(204, 'kailash', 'jansi nagar', 'erode', 0, 'tamilnadu', 0, '638004', '1234567890', '', 111, 15),
(205, 'kailash', 'jansi nagar', 'erode', 0, 'tamilnadu', 0, '638004', '1234567890', '', 112, 15),
(206, 'kailash', 'jansi nagar', 'erode', 0, 'tamilnadu', 0, '638004', '1234567890', '', 113, 15),
(207, 'saravanan', 'anna street', 'v,chatram', 2, 'tamil nadu', 1, '123458', '9092398789', '', 0, 16),
(208, 'kannan', '', '', 1, '', 1, '', '', '', 0, 17),
(209, 'pavithran', 'nehru Street', 'velacheri', 2, 'Tamil nadu', 1, '123456', '1717171717', '', 0, 18),
(210, 'charles', '', '', 1, '', 1, '', '', '', 0, 19),
(211, 'test', '', '', 1, '', 1, '', '', '', 0, 20),
(212, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 2, 21),
(213, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 3, 21),
(214, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 4, 21),
(215, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 5, 21),
(216, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 6, 21),
(217, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 131, 21),
(218, 'ilakkiya', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 132, 21),
(219, 'kailash', 'jansinagar', 'v.chatram', 2, 'tn', 1, '638004', '1234567890', 'kumarkailash075@gmail.com', 0, 23),
(220, 'maheswaran', 'hello', '', 1, '', 1, '', '', '', 0, 24),
(221, 'maheswaran', 'test', 'test', 0, 'test', 0, '641041', '9324234322', '', 133, 24),
(222, '', '', '', 0, '', 0, '', '', '', 134, 24),
(223, 'maheshwaran', 'gandhipuram', 'ramnagar', 1, 'tamilnadu', 1, '123456', '1234567890', '', 0, 25),
(224, 'dhanasekar', '', '', 1, '', 1, '', '', '', 0, 26),
(225, 'ilakkiya m', '', '', 1, '', 1, '', '', '', 0, 27),
(226, 'Pavithran', '', '', 1, '', 1, '', '', '', 0, 28),
(227, 'ilakkiya m', '', '', 1, '', 1, '', '', '', 0, 29),
(228, 'ilakkiya m', '', '', 1, '', 1, '', '', '', 0, 30),
(229, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 10, 30),
(230, '', '', '', 0, '', 0, '', '', '', 11, 30),
(231, '', '', '', 0, '', 0, '', '', '', 12, 30),
(232, '', '', '', 0, '', 0, '', '', '', 13, 30),
(233, '', '', '', 0, '', 0, '', '', '', 14, 30),
(234, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 15, 30),
(235, '', '', '', 0, '', 0, '', '', '', 16, 30),
(236, '', '', '', 0, '', 0, '', '', '', 17, 30),
(237, '', '', '', 0, '', 0, '', '', '', 18, 30),
(238, '', '', '', 0, '', 0, '', '', '', 19, 30),
(239, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 20, 30),
(240, '', '', '', 0, '', 0, '', '', '', 21, 30),
(241, '', '', '', 0, '', 0, '', '', '', 22, 30),
(242, '', '', '', 0, '', 0, '', '', '', 23, 30),
(243, '', '', '', 0, '', 0, '', '', '', 24, 30),
(244, '', '', '', 0, '', 0, '', '', '', 25, 30),
(245, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 26, 30),
(246, '', '', '', 0, '', 0, '', '', '', 27, 30),
(247, '', '', '', 0, '', 0, '', '', '', 28, 30),
(248, '', '', '', 0, '', 0, '', '', '', 29, 30),
(249, '', '', '', 0, '', 0, '', '', '', 30, 30),
(250, '', '', '', 0, '', 0, '', '', '', 31, 30),
(251, '', '', '', 0, '', 0, '', '', '', 32, 30),
(252, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 9, 30),
(253, '', '', '', 0, '', 0, '', '', '', 10, 30),
(254, '', '', '', 0, '', 0, '', '', '', 11, 30),
(255, '', '', '', 0, '', 0, '', '', '', 12, 30),
(256, '', '', '', 0, '', 0, '', '', '', 13, 30),
(257, '', '', '', 0, '', 0, '', '', '', 14, 30),
(258, '', '', '', 0, '', 0, '', '', '', 15, 30),
(259, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 16, 30),
(260, '', '', '', 0, '', 0, '', '', '', 17, 30),
(261, '', '', '', 0, '', 0, '', '', '', 18, 30),
(262, '', '', '', 0, '', 0, '', '', '', 19, 30),
(263, '', '', '', 0, '', 0, '', '', '', 20, 30),
(264, '', '', '', 0, '', 0, '', '', '', 21, 30),
(265, '', '', '', 0, '', 0, '', '', '', 22, 30),
(266, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 23, 30),
(267, '', '', '', 0, '', 0, '', '', '', 24, 30),
(268, '', '', '', 0, '', 0, '', '', '', 25, 30),
(269, '', '', '', 0, '', 0, '', '', '', 26, 30),
(270, '', '', '', 0, '', 0, '', '', '', 27, 30),
(271, '', '', '', 0, '', 0, '', '', '', 28, 30),
(272, '', '', '', 0, '', 0, '', '', '', 29, 30),
(273, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 30, 30),
(274, '', '', '', 0, '', 0, '', '', '', 31, 30),
(275, '', '', '', 0, '', 0, '', '', '', 32, 30),
(276, '', '', '', 0, '', 0, '', '', '', 33, 30),
(277, '', '', '', 0, '', 0, '', '', '', 34, 30),
(278, '', '', '', 0, '', 0, '', '', '', 35, 30),
(279, '', '', '', 0, '', 0, '', '', '', 36, 30),
(280, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 37, 30),
(281, '', '', '', 0, '', 0, '', '', '', 38, 30),
(282, '', '', '', 0, '', 0, '', '', '', 39, 30),
(283, '', '', '', 0, '', 0, '', '', '', 40, 30),
(284, '', '', '', 0, '', 0, '', '', '', 41, 30),
(285, '', '', '', 0, '', 0, '', '', '', 42, 30),
(286, '', '', '', 0, '', 0, '', '', '', 43, 30),
(287, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 44, 30),
(288, '', '', '', 0, '', 0, '', '', '', 45, 30),
(289, '', '', '', 0, '', 0, '', '', '', 46, 30),
(290, '', '', '', 0, '', 0, '', '', '', 47, 30),
(291, '', '', '', 0, '', 0, '', '', '', 48, 30),
(292, '', '', '', 0, '', 0, '', '', '', 49, 30),
(293, '', '', '', 0, '', 0, '', '', '', 50, 30),
(294, 'ilakkiya m', 'ganghipuram', 'ganghipuram', 0, 'tamilnadu', 0, '641008', '8883152529', '', 51, 30),
(295, '', '', '', 0, '', 0, '', '', '', 52, 30),
(296, '', '', '', 0, '', 0, '', '', '', 53, 30),
(297, '', '', '', 0, '', 0, '', '', '', 54, 30),
(298, '', '', '', 0, '', 0, '', '', '', 55, 30),
(299, '', '', '', 0, '', 0, '', '', '', 56, 30),
(300, '', '', '', 0, '', 0, '', '', '', 57, 30),
(301, 'charles', '', '', 1, '', 1, '', '', '', 0, 31),
(302, 'kailashkumar', '', '', 1, '', 1, '', '', '', 0, 33),
(303, 'charles', '', '', 1, '', 1, '', '', '', 0, 34),
(304, 'charles', '', '', 1, '', 1, '', '', '', 0, 35),
(305, 'charles', '', '', 1, '', 1, '', '', '', 0, 36),
(306, 'charles', '', '', 1, '', 1, '', '', '', 0, 37),
(307, 'charles', '', '', 1, '', 1, '', '', '', 0, 38),
(308, 'charles', '', '', 1, '', 1, '', '', '', 0, 39),
(309, 'charles', '', '', 1, '', 1, '', '', '', 0, 40),
(310, 'charles', '', '', 1, '', 1, '', '', '', 0, 41),
(311, 'charles', '', '', 1, '', 1, '', '', '', 0, 42),
(312, 'kumar', '', '', 1, '', 1, '', '', '', 0, 43),
(313, 'Pavithran', '', '', 1, '', 1, '', '', '', 0, 47),
(314, 'kailashkumar', 'anna street', 'chatram', 2, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 0, 48),
(315, 'Mohsin Ahmed', '', '', 3, '', 1, '', '', '', 0, 49),
(316, 'rajesh', '', '', 1, '', 1, '', '', '', 0, 51),
(317, 'maheshwaran', '', '', 1, '', 1, '', '', '', 0, 59),
(318, 'emre', '', '', 5, '', 1, '', '', '', 0, 60),
(319, 'kumar kumar', '144,ramnagar', 'sengupatha street', 1, 'tamilnadu', 1, '641009', '9500818702', 'sales@laravelecommerce.com', 0, 61),
(320, 'kumar', '', '', 1, '', 1, '', '', '', 0, 62),
(321, 'kumar', '', '', 1, '', 1, '', '', '', 0, 63),
(322, 'kumar', '', '', 1, '', 1, '', '', '', 0, 64),
(323, 'kumar', '', '', 1, '', 1, '', '', '', 0, 65),
(324, 'kumar', '', '', 1, '', 1, '', '', '', 0, 66),
(325, 'kumar', '', '', 1, '', 1, '', '', '', 0, 67),
(326, 'kumar', '', '', 1, '', 1, '', '', '', 0, 68),
(327, 'kumar', '', '', 1, '', 1, '', '', '', 0, 69),
(328, 'kumar', '', '', 1, '', 1, '', '', '', 0, 70),
(329, 'kumar', '', '', 1, '', 1, '', '', '', 0, 71),
(330, 'kumar', '', '', 1, '', 1, '', '', '', 0, 72),
(331, 'kumar', '', '', 1, '', 1, '', '', '', 0, 73),
(332, 'rajesh', '144', '122', 1, 'tn', 1, '641010', '1231231231', 'erkprajesh@gmail.com', 0, 74),
(333, 'sddsfd', 'sdvsd', 'sdvsdv', 0, 'sdvsdv', 0, '123123', '1231231231', 'er@er.com', 78, 74),
(334, 'kumar', 'test1', 'test2', 1, 'tn', 1, '641009', '9745232341', 'rrpofi@gmail.com', 0, 75),
(335, 'maheshwaran', 'gandhipuram', 'ramnagar', 0, 'tamilnadu', 0, '123456', '1234567890', 'maheswaran@pofitec.com', 80, 75),
(336, 'victor', 'xxxx', 'xxxx', 0, 'tamilnadu', 0, '641009', '9498056637', 'chalesvictor.info@gmail.com', 90, 42),
(337, 'Pavithran', '', '', 1, '', 1, '', '', '', 0, 76),
(338, 'Pavi', 'Ddf', 'Ff', 0, 'Ggg', 0, '638452', '1234567890', 'pavithrandbpro@gmail.com', 91, 76),
(339, 'Pavithran', '144, Sengupta Street | Near Hotel City Towers', 'Ram Nagar | Coimbatore - 641009', 0, 'Tamil Nadu', 0, '641009', '9787467575', 'pavithrandbpro@gmail.com', 42, 76),
(340, 'Pavithran', '144, Sengupta Street | Near Hotel City Towers', 'Ram Nagar | Coimbatore - 641009', 0, 'Tamil Nadu', 0, '641009', '9787467575', 'pavithrandbpro@gmail.com', 92, 76),
(341, 'test', 'test mail', 'tes', 0, 'test', 0, '123456', '1234567890', 'pavithran.g@pofitec.com', 93, 76),
(342, 'test', 'test', 'test', 0, 'test', 0, '123456', '1234567890', 'charles.j@pofitec.com', 97, 25),
(343, 'test', 'test', 'test', 0, 'test', 0, '123456', '1234567890', 'charles.j@pofitec.com', 99, 25),
(344, 'Test', '', '', 2, '', 1, '', '', '', 0, 78),
(345, 'reca', '', '', 1, '', 1, '', '', '', 0, 79),
(346, 'TESTE 1', '', '', 2, '', 1, '', '', '', 0, 81),
(347, 'vinod', '', '', 1, '', 1, '', '', '', 0, 82),
(348, 'asd', '', '', 0, '', 5, '', '', '', 0, 89),
(349, 'dfghdf', '', '', 1, '', 1, '', '', '', 0, 92),
(350, 'catella', '', '', 0, '', 0, '', '', '', 0, 95),
(351, 'reza', '', '', 3, '', 1, '', '', '', 0, 96),
(352, 'a', '', '', 0, '', 6, '', '', '', 0, 98),
(353, 'Pk', '', '', 3, '', 1, '', '', '', 0, 99),
(354, 'kiran', '', '', 4, '', 1, '', '', '', 0, 100),
(355, 'hgjhgj', 'ghjhg', 'jghj', 0, 'hgj', 0, 'jhg', 'jhgjhg', 'jhgj', 46, 100),
(356, 'amitavaroy', '', '', 2, '', 1, '', '', '', 0, 102),
(357, 'Testing', 'testing address', 'address two', 0, 'testing', 0, '32412', '1231231231', 'iesien22@yahoo.com', 104, 103),
(358, 'Testing', 'testing address', 'address two', 0, 'testing', 0, '32412', '1231231231', 'iesien22@yahoo.com', 48, 103),
(359, 'Burham', '', '', 3, '', 1, '', '', '', 0, 104),
(360, 'Burham', 'cimahi depok', 'rt07', 0, 'delhi', 0, '10222', '812122112', 'rezka@gmail.com', 49, 104),
(361, 'aaa', '', '', 2, '', 1, '', '', '', 0, 106),
(362, 'wefsdfsdfs', '', '', 1, '', 1, '', '', '', 0, 107),
(363, 'khor', '', '', 0, '', 5, '', '', '', 0, 108),
(364, 'Wedus', '', '', 4, '', 1, '', '', '', 0, 109),
(365, 'mahmoud', '', '', 3, '', 1, '', '', '', 0, 110),
(366, 'name', '', '', 0, '', 7, '', '', '', 0, 111),
(367, 'maheswaran', '', '', 1, '', 1, '', '', '', 0, 112),
(368, 'Jason', '', '', 0, '', 6, '', '', '', 0, 113),
(369, 'jubin', '', '', 3, '', 1, '', '', '', 0, 114),
(370, 'trung', '', '', 4, '', 1, '', '', '', 0, 115),
(371, 'esec kailash', '', '', 2, '', 1, '', '', '', 0, 116),
(372, 'esec kailash', '', '', 2, '', 1, '', '', '', 0, 117),
(373, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 113, 84),
(374, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 114, 84),
(375, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 115, 84),
(376, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 116, 84),
(377, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 117, 84),
(378, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 118, 84),
(379, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 119, 84),
(380, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 120, 84),
(381, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 121, 84),
(382, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 122, 84),
(383, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 123, 84),
(384, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 124, 84),
(385, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 125, 84),
(386, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 126, 84),
(387, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 127, 84),
(388, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 128, 84),
(389, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 129, 84),
(390, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 130, 84),
(391, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 131, 84),
(392, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 53, 84),
(393, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 54, 84),
(394, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 55, 84),
(395, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 56, 84),
(396, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 57, 84),
(397, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 58, 84),
(398, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 59, 84),
(399, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 60, 84),
(400, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 61, 84),
(401, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 62, 84),
(402, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 63, 84),
(403, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 64, 84),
(404, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 65, 84),
(405, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 66, 84),
(406, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 67, 84),
(407, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 68, 84),
(408, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 69, 84),
(409, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 70, 84),
(410, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 71, 84),
(411, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 72, 84),
(412, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 73, 84),
(413, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 74, 84),
(414, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 75, 84),
(415, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 76, 84),
(416, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 77, 84),
(417, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 78, 84),
(418, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 79, 84),
(419, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 80, 84),
(420, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 81, 84),
(421, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 82, 84),
(422, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 83, 84),
(423, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 84, 84),
(424, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 85, 84),
(425, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 86, 84),
(426, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 87, 84),
(427, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 88, 84),
(428, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 89, 84),
(429, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 90, 84),
(430, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 91, 84),
(431, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 92, 84),
(432, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 93, 84),
(433, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 94, 84),
(434, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 95, 84),
(435, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 96, 84),
(436, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 97, 84),
(437, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 98, 84),
(438, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 99, 84),
(439, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 100, 84),
(440, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 101, 84),
(441, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 102, 84),
(442, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 103, 84),
(443, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 104, 84),
(444, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 105, 84),
(445, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 106, 84),
(446, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 107, 84),
(447, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 108, 84),
(448, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 109, 84),
(449, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 110, 84),
(450, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 111, 84),
(451, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 112, 84),
(452, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 113, 84),
(453, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 114, 84),
(454, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 115, 84),
(455, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 116, 84),
(456, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 117, 84),
(457, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 118, 84),
(458, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 119, 84),
(459, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 120, 84),
(460, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 132, 84),
(461, 'guna', '75', 'hghdhghgs', 5, 'tn', 1, '123456', '1234567890', 'kumarkailash075@gmail.com', 133, 84),
(462, 'pofikailash', '', '', 1, '', 1, '', '', '', 0, 123),
(463, 'pofi kailash', '', '', 1, '', 1, '', '', '', 0, 124),
(464, 'pofi kailash', 'bcvbcvcvb', 'vcbvcbcvbcvb', 0, 'tn', 0, '123456', '1234567890', 'kailashkumar.r@esec.ac.in', 134, 124),
(465, 'George Nammour', '', '', 1, '', 1, '', '', '', 0, 125),
(466, 'George Nammour', 'test', 'test', 0, 'test', 0, 'test', 'test', 'georgen@linteractif.com', 121, 125);

-- --------------------------------------------------------

--
-- Table structure for table `nm_size`
--

CREATE TABLE IF NOT EXISTS `nm_size` (
  `si_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `si_name` varchar(20) NOT NULL,
  PRIMARY KEY (`si_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nm_size`
--

INSERT INTO `nm_size` (`si_id`, `si_name`) VALUES
(2, '42'),
(3, '44'),
(4, '28'),
(5, '32'),
(6, '34'),
(7, '36'),
(8, '38'),
(9, '40'),
(11, '53'),
(12, '66');

-- --------------------------------------------------------

--
-- Table structure for table `nm_smtp`
--

CREATE TABLE IF NOT EXISTS `nm_smtp` (
  `sm_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sm_host` varchar(150) NOT NULL,
  `sm_port` varchar(20) NOT NULL,
  `sm_uname` varchar(30) NOT NULL,
  `sm_pwd` varchar(30) NOT NULL,
  `sm_isactive` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nm_smtp`
--

INSERT INTO `nm_smtp` (`sm_id`, `sm_host`, `sm_port`, `sm_uname`, `sm_pwd`, `sm_isactive`) VALUES
(1, 'smtp.gmail.com', '587', 'kailashkumar.r@pofitec.com', '1234567890', 1),
(2, 'Send Grid', '149', 'send grid', 'sendgrid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_social_media`
--

CREATE TABLE IF NOT EXISTS `nm_social_media` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sm_fb_app_id` varchar(100) NOT NULL,
  `sm_fb_sec_key` varchar(100) NOT NULL,
  `sm_fb_page_url` varchar(250) NOT NULL,
  `sm_fb_like_page_url` varchar(250) NOT NULL,
  `sm_twitter_url` varchar(250) NOT NULL,
  `sm_twitter_app_id` varchar(250) NOT NULL,
  `sm_twitter_sec_key` varchar(250) NOT NULL,
  `sm_linkedin_url` varchar(250) NOT NULL,
  `sm_youtube_url` varchar(250) NOT NULL,
  `sm_gmap_app_key` varchar(250) NOT NULL,
  `sm_android_page_url` varchar(250) NOT NULL,
  `sm_iphone_url` varchar(250) NOT NULL,
  `sm_analytics_code` text NOT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_social_media`
--

INSERT INTO `nm_social_media` (`sm_id`, `sm_fb_app_id`, `sm_fb_sec_key`, `sm_fb_page_url`, `sm_fb_like_page_url`, `sm_twitter_url`, `sm_twitter_app_id`, `sm_twitter_sec_key`, `sm_linkedin_url`, `sm_youtube_url`, `sm_gmap_app_key`, `sm_android_page_url`, `sm_iphone_url`, `sm_analytics_code`) VALUES
(1, '1159985624035786', 'b515b2aa9c659647515b7c34964ae228', 'http://www.facebook.com/', 'http://www.facebook.com/', 'http://www.twitter.com/', 'dsf1dsfsd232d1f21dsf21ds2f1dsf', 'sd2f1sd2f13sfgsd543df3ds1fds1f', 'http://www.linkedin.com/', 'http://www.youtube.com', 'sdf1sd321f32dssadf1f3ds1f3', '', 'http://www.iphone.com', '<script>\r\n  (function(i,s,o,g,r,a,m){i[''GoogleAnalyticsObject'']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,''script'',''https://www.google-analytics.com/analytics.js'',''ga'');\r\n\r\n  ga(''create'', ''UA-62671250-4'', ''auto'');\r\n  ga(''send'', ''pageview'');\r\n</script>');

-- --------------------------------------------------------

--
-- Table structure for table `nm_specification`
--

CREATE TABLE IF NOT EXISTS `nm_specification` (
  `sp_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sp_name` text NOT NULL,
  `sp_spg_id` smallint(5) unsigned NOT NULL,
  `sp_order` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nm_specification`
--

INSERT INTO `nm_specification` (`sp_id`, `sp_name`, `sp_spg_id`, `sp_order`) VALUES
(1, 'sofa feature', 1, 1),
(2, 'box 1', 2, 1),
(3, 'box 2', 2, 2),
(4, 'box 3', 2, 3),
(5, 'volume', 3, 5),
(6, 'test2', 1, 1),
(7, 'mangoolian', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nm_spgroup`
--

CREATE TABLE IF NOT EXISTS `nm_spgroup` (
  `spg_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `spg_name` varchar(150) NOT NULL,
  `spg_order` smallint(6) NOT NULL,
  PRIMARY KEY (`spg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nm_spgroup`
--

INSERT INTO `nm_spgroup` (`spg_id`, `spg_name`, `spg_order`) VALUES
(1, 'sofa', 1),
(2, 'boxes', 2),
(3, 'Memory', 4),
(4, 'mantest', 5),
(5, 'ABCDEFGH', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nm_store`
--

CREATE TABLE IF NOT EXISTS `nm_store` (
  `stor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stor_merchant_id` int(11) NOT NULL,
  `stor_name` varchar(100) NOT NULL,
  `stor_phone` varchar(20) NOT NULL,
  `stor_address1` varchar(150) NOT NULL,
  `stor_address2` varchar(150) NOT NULL,
  `stor_country` smallint(5) unsigned NOT NULL,
  `stor_city` int(10) unsigned NOT NULL,
  `stor_zipcode` varchar(20) NOT NULL,
  `stor_metakeywords` text NOT NULL,
  `stor_metadesc` text NOT NULL,
  `stor_website` text NOT NULL,
  `stor_latitude` decimal(18,14) NOT NULL,
  `stor_longitude` decimal(18,14) NOT NULL,
  `stor_img` varchar(150) NOT NULL,
  `stor_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` varchar(20) NOT NULL,
  `stor_addedby` int(5) NOT NULL DEFAULT '1' COMMENT '1-admin,2 -merchant',
  PRIMARY KEY (`stor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `nm_store`
--

INSERT INTO `nm_store` (`stor_id`, `stor_merchant_id`, `stor_name`, `stor_phone`, `stor_address1`, `stor_address2`, `stor_country`, `stor_city`, `stor_zipcode`, `stor_metakeywords`, `stor_metadesc`, `stor_website`, `stor_latitude`, `stor_longitude`, `stor_img`, `stor_status`, `created_date`, `stor_addedby`) VALUES
(1, 9, 'Design Hut', '226157', 'City Main Road', 'Bangaluru', 1, 4, '123456', 'nice store in bangalore', 'nice store in bangalore', 'www.hut.com', '12.96624565591343', '77.58632295390623', 'Bonmarche_1852845bS66erAZ7.jpg', 1, '06/08/2016', 1),
(4, 9, 'Maz Store', '1234567890', 'j.k road', 'Delhi', 1, 3, '123456', 'Maz store in delhi for online shopping', 'Maz store in delhi for online shopping', 'www.maz.com', '28.70552213640328', '77.24198018437505', 'storesffgnF9Dv.jpg', 1, '', 1),
(5, 12, 'Trinity Place', '8883152529', 'Ramnagar', 'Ganghipuram', 1, 1, '641008', 'Trinity  Place Deaprtment Store', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 'http://www.downtownmagazinenyc.com/theres-a-new-name-downtown-trinity-place-department-store/', '11.01006629675941', '76.94938781586916', 'sZEQNGpZB.jpg', 1, '06/08/2016', 1),
(6, 13, 'Big Bazaar', '7485963210', 'Ganghipuram', 'Town Hall', 1, 1, '641008', 'Big Bazaar In Coimbatore', 'This large, bright, minimalist three level (levels two and three will open shortly) space brings to Lower Manhattan the best of small European brands. For now, the first floor is women’s wear with vintage-inspired dresses, tops and skirts suitable for work or play.', 'http://www.allahabadonline.in/city-guide/big-bazar-allahabad', '10.98995993029173', '76.96492573652358', 'ko5BrnpVi.jpg', 1, '06/08/2016', 1),
(7, 16, 'Savithrai', '9498056637', 'ramnagar', 'gandipuram', 1, 1, '641009', 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'www.demo.laravelecommerce.com', '11.01235010000000', '76.96286580000003', 'Desert3rk1dftU.jpg', 1, '', 1),
(8, 17, 'pofi', '1231231231', '1441', '123', 1, 1, '641009', 'NSBDV.SD', 'MNB KSJDFB', 'SKDJFNB.COM', '11.01684450000000', '76.95583209999995', 'logo2lrbuKBG.png', 0, '', 1),
(9, 18, 'rajivstore', '8871665475', 'address', 'address', 1, 4, '4503321', 'test', 'test', 'test', '10.25000000000000', '30.20000000000000', '2016-06-27-1800jirp7ox4.jpg', 1, '08/01/2016', 1),
(11, 15, 'Test Shop', '00000000000000000000', 'Mullai Nagar', 'test', 1, 1, '3456789', 'test', 'test', 'http://www.test.com', '40.35451960150120', '-3.68863972377926', 'sample swinder theme0Y5qz4Zf.jpg', 1, '', 2),
(12, 19, 'Palugada Store', '082312323123', 'Cemput', 'Barat', 1, 3, '10520', 'adasda', 'adasdad', 'http://domain.com', '12.29706829285382', '106.69921875000000', 'tampak ruangan 305bdtZ85.jpg', 1, '', 1),
(13, 20, 'tp', '7738254158', 'ghghg', 'hghgh', 1, 5, '400605', 'jkjkjj', 'ghhgh', 'baapprojects.com', '16.78703312221986', '72.71560756015629', 'html testnS811dWK.PNG', 1, '09/18/2016', 1),
(14, 9, 'test branch', '12312414412414', 'casdasdas', 'asdasdasd', 1, 1, '343434', 'sdasdas', 'asdasd', 'http://www.dsd.com', '11.14620713599789', '76.94422613828124', '300px-Usdollar100fronteXWGEDcW.jpg', 1, '', 1),
(15, 21, 'testShop', '7777777777', 'shopaddresslineone', 'shopaddresslinetwo', 1, 5, '877878', 'testshopmeta', 'testshopmetadesc', 'www.testshop.com', '28.63478125109309', '77.20816972578132', 'Hydrangeas987UGY1n.jpg', 0, '10/05/2016', 1),
(16, 22, 'jnjknjknjkn', '989890080', 'jkn', 'jkn', 1, 2, '88888', 'jknjknjkn', 'jk', 'njk', '44.91139700000000', '-116.11331489999998', 'tn-1470647813-s-l1600-2racpcR73.jpg', 1, '', 1),
(17, 23, 'kjnkjnkjnjkn', '8888888888', 'jknjknjk', 'nkjnjkn', 1, 2, '6757657', 'jhbjhb', 'hjb', 'jbhjbjb', '44.91139700000000', '-116.11331489999998', 'tn-1470647810-s-l1600-3CySrp4G7.jpg', 1, '', 1),
(18, 12, '21', '12', '12', '12', 1, 2, '12', '12', '12', '12', '13.07732955605433', '80.24050599765633', '_contoh1RFoqpumv.jpg', 1, '', 1),
(19, 9, 'bbb store', '1234567890', 'vxcxccxvc', 'fdggdf', 1, 1, '123456', 'dfdsfs', 'dfsdfsd', 'www.ssss.com', '11.03030886565141', '76.93873297421874', 'bbbb_shopOVk8M4lf.jpg', 1, '', 1),
(20, 9, 'vvv shop', '1234567890', 'sdssfddsf', 'dsfdfsd', 1, 1, '123456', 'sfdsdfsdf', 'dsfdf', 'www.mmmm.com', '11.05861384231795', '76.94559942929686', 'bbbb_shopreI0EGJh.jpg', 1, '', 1),
(21, 24, 'Magnum trendy shop', '2354780', 'bvbxcvxbvcbxbx', 'bvsbvbvdbvbdvsbv', 1, 1, '123456', 'bvxvbvbvxbvbcv', 'vbsvbvbvxbbcxbb', 'www.manum.com', '11.07614975186641', '76.96269855507808', 'bbbb_shopo0VH6YkM.jpg', 1, '11/01/2016', 1),
(22, 24, 'Hoston store', '4567891230', 'bvnbvnvbn', 'vnbvnbnv', 1, 4, '123456', 'cvcbvcbcvbcvb', 'cvbcvbcvbvbcvb', 'www.hoston.com', '12.99568597215706', '77.61378877421873', 'bbbb_shopR4xiRTvt.jpg', 1, '', 1),
(23, 9, 'Amazon shop', '123456', 'bnbbnbnbnbnb', 'jhsdjsjdhjdhjsh', 1, 1, '123456', 'nxnmxbcbnxcnxb', 'hsgshgshgd', 'http://www.amazon.in/', '11.03570050014765', '76.91676031796874', 'Koalai2hRpsY8.jpg', 1, '', 2),
(24, 25, 'test', '+9610000000', 'Beirut', 'test', 1, 2, '00000', 'test', 'test', 'http://www.test.com', '33.83107203432984', '35.51001644609369', '2TUcnr6nN.jpg', 1, '11/11/2016', 1),
(25, 26, 'test', '+9613583114', 'test', 'test', 1, 0, '000961', 'test', 'test', 'http://www.test.com', '33.87840083768415', '35.50109005449212', 'Screen Shot 2016-11-11 at 4F6l4ywOA.10', 1, '11/12/2016', 1),
(26, 27, 'test store', '09876543210', 'test ship addr1', 'test ship addr2', 1, 1, '543543543', 'dvfg', 'dfg d', 'www.google.com', '11.06267233831586', '76.98055133828120', '@mx_580wx0DdcKH.jpg', 1, '11/12/2016', 1),
(27, 28, 'biz store', '01234567890', '79', 'gandhi nagar', 1, 1, '123456', 'xcxcxcxcxcxcxxcxcxcxcc', 'xcxxxxcxccxxxxc', 'www.biz.com', '11.01684450000000', '76.95583209999995', 'Koalazc2q4GaR.jpg', 1, '', 1),
(28, 29, 'biz store', '01234567890', 'ghjghjghgj', 'fsfsdfsdfsdf', 1, 1, '123456', 'bxncbnbncxbvnxcbvnbnbxcnvb', 'nbnnbxnvbncbvnbxcnvb', 'www.biz.com', '11.01684450000000', '76.95583209999995', 'KoalaMA9fibRA.jpg', 1, '', 1),
(29, 30, 'teest', '+9613583114', 'test', 'test', 1, 1, '00000', 'test', 'test', 'http://www.test.com', '33.87384016751478', '35.51070309160150', '15095046_1356125864419876_5949159025492857915_nofXBjtQ1.jpg', 1, '11/15/2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_subcategory`
--

CREATE TABLE IF NOT EXISTS `nm_subcategory` (
  `sb_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sb_name` varchar(100) NOT NULL,
  `sb_smc_id` smallint(5) unsigned NOT NULL,
  `mc_id` smallint(5) unsigned NOT NULL,
  `sb_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `nm_subcategory`
--

INSERT INTO `nm_subcategory` (`sb_id`, `sb_name`, `sb_smc_id`, `mc_id`, `sb_status`) VALUES
(1, 'Samsung', 1, 1, 1),
(2, 'Lenova', 1, 1, 1),
(3, 'T-Shirt', 2, 2, 1),
(4, 'Shirts', 2, 2, 1),
(5, 'Sarees', 4, 3, 1),
(6, 'Kurtas', 4, 3, 1),
(7, 'Diapers', 6, 4, 1),
(8, 'Wipes', 6, 4, 1),
(9, 'jeans', 2, 2, 1),
(10, 'Tops', 7, 3, 1),
(11, 'Wall Clock', 8, 1, 1),
(12, 'Sony', 9, 1, 1),
(13, 'Kids and Baby Footwear', 6, 4, 1),
(15, 'Casual', 10, 2, 1),
(17, 'Casual Watches', 11, 2, 1),
(18, 'Tops', 6, 4, 1),
(19, 'Shrug', 7, 3, 1),
(20, 'Kids Clothing', 12, 4, 1),
(21, 'Jeans', 7, 3, 1),
(22, 'Skin Care', 6, 4, 1),
(23, 'Wooden Furniture', 14, 5, 1),
(24, 'Laptops', 16, 6, 1),
(25, 'Desktops', 16, 6, 1),
(26, 'Full Kit', 17, 7, 1),
(27, 'Separate Equipments', 17, 7, 1),
(28, 'Basic Cars', 18, 8, 1),
(29, 'Sports Car', 18, 8, 1),
(30, 'Luxury Car', 18, 8, 1),
(31, 'Historical', 20, 9, 1),
(32, 'Thriller', 20, 9, 1),
(33, 'Comic', 20, 9, 1),
(34, 'Basic Bikes', 19, 8, 1),
(35, 'Sports Bikes', 19, 8, 1),
(36, 'Luxury Bikes', 19, 8, 1),
(37, 'Digital ', 24, 6, 1),
(38, 'DSLR', 24, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_subscription`
--

CREATE TABLE IF NOT EXISTS `nm_subscription` (
  `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_cus_id` int(10) unsigned NOT NULL COMMENT 'customer id',
  `sub_mc_id` smallint(5) unsigned NOT NULL,
  `sub_status` tinyint(4) NOT NULL,
  `sub_readstatus` int(11) NOT NULL DEFAULT '0' COMMENT '-not read 1 read',
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_terms`
--

CREATE TABLE IF NOT EXISTS `nm_terms` (
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_description` text NOT NULL,
  `tr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_terms`
--

INSERT INTO `nm_terms` (`tr_id`, `tr_description`, `tr_date`) VALUES
(1, '<b>Introduction</b><br>These terms and conditions govern \r\nyour use of <a rel="" target="" href="http://www.laravelecommerce.com">www.laravelecommerce.com</a>; by using this website, you accept \r\nthese terms and conditions in full. If you disagree with these terms and\r\n conditions or any part of these terms and conditions, you must not use \r\nthis website.<br>\r\n\r\n               You must be at least 18 years of age \r\nto use this website.  By using this website and by agreeing to these \r\nterms and conditions you warrant and represent that you are at least 18 \r\nyears of age.<br>\r\n\r\n               This website uses cookies.  By using \r\nthis website and agreeing to these terms and conditions, you consent to \r\nuse of cookies in accordance with the terms of <a rel="" target="" href="http://www.laravelecommerce.com">www.laravelecommerce.com</a><br>\r\n             <b>LICENSE TO USE WEBSITE</b><br>Unless otherwise stated, Laravel Ecommerce and/or \r\nits licensors own the intellectual property rights in the website and \r\nmaterial on the website.  Subject to the license below, all these \r\nintellectual property rights are reserved.<br>\r\n\r\n You may view, download for caching purposes only, \r\nand print pages [or [OTHER CONTENT]] from the website for your own \r\npersonal use, subject to the restrictions set out below and elsewhere in\r\n these terms and conditions.<br><br>YOU MUST NOT:&nbsp;&nbsp; <br><ul><li>Sell, rent or sub license material from the website;</li><li>Show any material from the website in public;</li><li>Reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;</li><li>Edit or otherwise modify any material on the website;</li><li>Redistribute material from this website.</li></ul><b>ACCEPTABLE USE\r\n</b><ul><li>You must not use this website in any way that causes, or may cause, \r\ndamage to the website or impairment of the availability or accessibility\r\n of the website; or in any way which is unlawful, illegal, fraudulent or\r\n harmful, or in connection with any unlawful, illegal, fraudulent or \r\nharmful purpose or activity.</li><li>You must not use this website to copy, store, host, transmit, send, \r\nuse, publish or distribute any material which consists of (or is linked \r\nto) any spyware, computer virus, Trojan horse, worm, keystroke logger, \r\nrootkit or other malicious computer software.</li><li>You must not conduct any systematic or automated data collection \r\nactivities (including without limitation scraping, data mining, data \r\nextraction and data harvesting) on or in relation to this website \r\nwithout Laravel Ecommerce’s express written consent.</li><li>You must not use this website to transmit or send unsolicited commercial communications.</li><li>You must not use this website for any purposes related to marketing without Laravel Ecommerce’s express written consent.</li></ul><b>RESTRICTED ACCESS\r\n\r\n </b><br>[Access to certain areas of this website is \r\nrestricted.]  Laravel Ecommerce’s reserves the right to restrict access \r\nto [other] areas of this website, or indeed this entire website, at \r\nLaravel Ecommerce discretion.<br>\r\n\r\n If Laravel Ecommerce’s provides you with a user ID \r\nand password to enable you to access restricted areas of this website or\r\n other content or services, you must ensure that the user ID and \r\npassword are kept confidential.<br>\r\n\r\n Laravel Ecommerce’s may disable your user ID and password in Laravel Ecommerce’s sole discretion without notice or explanation.]<br><br><b>USER CONTENT</b>\r\n\r\n <br>In these terms and conditions, “your user content” \r\nmeans material (including without limitation text, images, audio \r\nmaterial, video material and audio-visual material) that you submit to \r\nthis website, for whatever purpose.<br>\r\n\r\n You grant to Laravel Ecommerce a worldwide, \r\nirrevocable, non-exclusive, royalty-free license to use, reproduce, \r\nadapt, publish, translate and distribute your user content in any \r\nexisting or future media.  You also grant to the right to sub-license \r\nthese rights, and the right to bring an action for infringement of these\r\n rights.<br>\r\n\r\n Your user content must not be illegal or unlawful, \r\nmust not infringe any third party’s legal rights, and must not be \r\ncapable of giving rise to legal action whether against you or Laravel \r\nEcommerce or a third party.<br>\r\n\r\n You must not submit any user content to the website\r\n that is or has ever been the subject of any threatened or actual legal \r\nproceedings or other similar complaint.<br>\r\n\r\n Laravel Ecommerce reserves the right to edit or \r\nremove any material submitted to this website, or stored on Laravel \r\nEcommerce’s servers, or hosted or published upon this website.\r\n<br><br><b>LIMITATIONS OF LIABILITY</b>\r\n\r\n <br>Laravel Ecommerce will not be liable to you \r\n(whether under the law of contact, the law of torts or otherwise) in \r\nrelation to the contents of, or use of, or otherwise in connection with,\r\n this website:<br>\r\n\r\n \r\n\r\n For any indirect, special or consequential loss; or\r\nFor any business losses, loss of revenue, income, profits or anticipated\r\n savings, loss of contracts or business relationships, loss of \r\nreputation or goodwill, or loss or corruption of information or data.<br>\r\n \r\n\r\n These limitations of liability apply even if Laravel Ecommerce has been expressly advised of the potential loss.<br><br><b>REASONABLENESS</b>\r\n\r\n <br>By using this website, you agree that the \r\nexclusions and limitations of liability set out in this website \r\ndisclaimer are reasonable.<br>\r\n\r\n If you do not think they are reasonable, you must not use this website.<br><br><b>UNENFORCEABLE PROVISIONS<br></b>&nbsp;If any provision of this website disclaimer is, or \r\nis found to be, unenforceable under applicable law, that will not affect\r\n the enforceability of the other provisions of this website disclaimer.<br><br><b>BREACHES OF THESE TERMS AND CONDITIONS<br></b>&nbsp;Without prejudice to Laravel Ecommerce’s other \r\nrights under these terms and conditions, if you breach these terms and \r\nconditions in any way, Laravel Ecommerce may take such action as Laravel\r\n Ecommerce deems appropriate to deal with the breach, including \r\nsuspending your access to this website, prohibiting you from accessing \r\nthe website, blocking computers using your IP address from accessing the\r\n website, contacting your internet service provider to request that they\r\n block your access to the website and/or bringing court proceedings \r\nagainst you.<br><br><b>VARIATION<br></b>&nbsp;Laravel Ecommerce may revise these terms and \r\nconditions from time-to-time.  Revised terms and conditions will apply \r\nto the use of this website from the date of the publication of the \r\nrevised terms and conditions on this website.  Please check this page \r\nregularly to ensure you are familiar with the current version.<br><br><b>ASSIGNMENT<br></b>&nbsp;Laravel Ecommerce may transfer, sub-contract or \r\notherwise deal with Laravel Ecommerce rights and/or obligations under \r\nthese terms and conditions without notifying you or obtaining your \r\nconsent.<br>\r\n\r\n You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions.<br><br><b>SEVERABILITY<br></b>&nbsp;If a provision of these terms and conditions is \r\ndetermined by any court or other competent authority to be unlawful \r\nand/or unenforceable, the other provisions will continue in effect.  If \r\nany unlawful and/or unenforceable provision would be lawful or \r\nenforceable if part of it were deleted, that part will be deemed to be \r\ndeleted, and the rest of the provision will continue in effect.<br><br><b>LAW AND JURISDICTION<br></b>&nbsp;These terms and conditions will be governed by and \r\nconstrued in accordance with Indian law, and any disputes relating to \r\nthese terms and conditions will be subject to the exclusive jurisdiction\r\n of the courts of Coimbatore.<br><br><br><br>', '2016-06-09 22:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `nm_theme`
--

CREATE TABLE IF NOT EXISTS `nm_theme` (
  `the_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `the_Name` varchar(150) NOT NULL,
  PRIMARY KEY (`the_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nm_wishlist`
--

CREATE TABLE IF NOT EXISTS `nm_wishlist` (
  `ws_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ws_pro_id` bigint(20) unsigned NOT NULL,
  `ws_cus_id` bigint(20) unsigned NOT NULL,
  `ws_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ws_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `nm_wishlist`
--

INSERT INTO `nm_wishlist` (`ws_id`, `ws_pro_id`, `ws_cus_id`, `ws_date`) VALUES
(1, 55, 4, '2016-04-27 05:03:47'),
(2, 54, 4, '2016-04-27 05:04:21'),
(3, 55, 14, '2016-05-27 06:36:55'),
(4, 55, 15, '2016-05-28 06:38:33'),
(16, 69, 16, '2016-05-28 13:08:42'),
(17, 70, 15, '2016-05-30 04:51:10'),
(18, 62, 16, '2016-05-30 05:47:22'),
(19, 62, 16, '2016-05-30 05:49:34'),
(20, 62, 16, '2016-05-30 06:05:03'),
(21, 62, 16, '2016-05-30 06:06:27'),
(22, 62, 16, '2016-05-30 06:08:34'),
(23, 50, 16, '2016-05-30 06:08:47'),
(24, 55, 16, '2016-05-30 06:10:49'),
(25, 70, 16, '2016-05-30 06:41:49'),
(26, 69, 16, '2016-05-30 06:57:58'),
(27, 69, 16, '2016-05-30 06:59:21'),
(28, 69, 16, '2016-05-30 07:00:02'),
(29, 69, 16, '2016-05-30 07:00:48'),
(30, 69, 16, '2016-05-30 07:02:10'),
(31, 69, 16, '2016-05-30 07:02:51'),
(32, 69, 16, '2016-05-30 07:12:18'),
(33, 68, 16, '2016-05-30 07:13:50'),
(34, 68, 16, '2016-05-30 07:14:48'),
(35, 55, 16, '2016-05-30 07:16:23'),
(36, 71, 16, '2016-05-30 07:19:18'),
(37, 2, 14, '2016-06-07 08:15:47'),
(38, 9, 23, '2016-06-08 12:07:36'),
(39, 16, 48, '2016-06-21 10:09:19'),
(40, 9, 48, '2016-06-21 10:09:47'),
(41, 11, 58, '2016-06-22 06:34:46'),
(42, 25, 94, '2016-08-16 18:48:18'),
(43, 25, 125, '2016-11-15 14:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `nm_withdraw_request`
--

CREATE TABLE IF NOT EXISTS `nm_withdraw_request` (
  `wd_id` int(11) NOT NULL AUTO_INCREMENT,
  `wd_mer_id` int(11) NOT NULL,
  `wd_total_wd_amt` int(11) NOT NULL,
  `wd_submited_wd_amt` int(11) NOT NULL,
  `wd_status` int(11) NOT NULL COMMENT '1 => paid, 0=> Hold',
  `wd_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nm_withdraw_request`
--

INSERT INTO `nm_withdraw_request` (`wd_id`, `wd_mer_id`, `wd_total_wd_amt`, `wd_submited_wd_amt`, `wd_status`, `wd_date`) VALUES
(1, 6, 6375, 3375, 0, '2014-08-13 01:34:05'),
(2, 1, 27360, 14700, 0, '2016-05-13 07:30:30'),
(3, 15, 13986, 11598, 0, '2016-10-05 07:29:32'),
(4, 9, 355786, 20, 0, '2016-11-02 00:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `nm_withdraw_request_paypal`
--

CREATE TABLE IF NOT EXISTS `nm_withdraw_request_paypal` (
  `wr_id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_mer_id` int(11) NOT NULL,
  `wr_mer_name` varchar(250) NOT NULL,
  `wr_mer_payment_email` varchar(250) NOT NULL,
  `wr_paid_amount` varchar(250) NOT NULL,
  `wr_txn_id` varchar(250) NOT NULL,
  `wr_status` varchar(100) NOT NULL,
  `wr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nm_withdraw_request_paypal`
--

INSERT INTO `nm_withdraw_request_paypal` (`wr_id`, `wr_mer_id`, `wr_mer_name`, `wr_mer_payment_email`, `wr_paid_amount`, `wr_txn_id`, `wr_status`, `wr_date`) VALUES
(1, 6, 'shankar', 'marimuthu@ideazglobal.com', '3000.00', '7UM45757EY5785036', 'Pending', '2014-08-13 01:20:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
