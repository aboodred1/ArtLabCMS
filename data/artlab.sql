-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 01, 2009 at 03:03 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `artlab`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_admins`
-- 

CREATE TABLE `lab_admins` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_username` varchar(30) character set latin1 collate latin1_general_ci NOT NULL,
  `admin_password` varchar(30) character set latin1 collate latin1_general_ci NOT NULL,
  `admin_level` int(11) NOT NULL default '0',
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `lab_admins`
-- 

INSERT INTO `lab_admins` (`admin_id`, `admin_username`, `admin_password`, `admin_level`) VALUES 
(1, 'admin', 'admin', -1);

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_blocks`
-- 

CREATE TABLE `lab_blocks` (
  `block_id` int(11) NOT NULL auto_increment,
  `page_id` int(11) default '0',
  `block_title` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `block_has_title` enum('Y','N') character set latin1 collate latin1_general_ci default 'N',
  `block_direction` enum('LEFT','RIGHT') character set latin1 collate latin1_general_ci default 'LEFT',
  `block_content` text character set latin1 collate latin1_general_ci,
  `block_order` int(11) default '0',
  PRIMARY KEY  (`block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `lab_blocks`
-- 

INSERT INTO `lab_blocks` (`block_id`, `page_id`, `block_title`, `block_has_title`, `block_direction`, `block_content`, `block_order`) VALUES 
(1, 0, 'Test Left Block', 'N', 'LEFT', '<p>!mainmenu</p>', 1),
(7, 4, 'Additional Info', 'N', 'LEFT', '<p>a sdas dasd asdaa sdas das dasa</p>\r\n<p>sd</p>\r\n<p>asd</p>\r\n<p>asd</p>\r\n<p>&nbsp;as ds</p>', 1),
(2, 8, 'Test Right Block', 'Y', 'LEFT', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 1),
(3, 1, 'Our Services', 'N', 'LEFT', '!services', 0),
(4, 2, 'Portfolio Categories', 'N', 'LEFT', '!portfolio', 0),
(5, 0, 'Featured News', 'Y', 'RIGHT', '!featurednews', 0),
(6, 0, 'Featured Clients', 'Y', 'RIGHT', '!featuredclients', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_categories`
-- 

CREATE TABLE `lab_categories` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_title` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `lab_categories`
-- 

INSERT INTO `lab_categories` (`category_id`, `category_title`) VALUES 
(1, 'test'),
(2, 'test 2'),
(3, 'test 3');

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_clients`
-- 

CREATE TABLE `lab_clients` (
  `client_id` int(11) NOT NULL auto_increment,
  `client_title` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `client_brief` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `client_thumbnail` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `client_image` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `client_featured` enum('Y','N') character set latin1 collate latin1_general_ci NOT NULL default 'N',
  `client_order` int(11) default '0',
  `client_date_submited` date default '0000-00-00',
  `client_date_updated` date default '0000-00-00',
  PRIMARY KEY  (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `lab_clients`
-- 

INSERT INTO `lab_clients` (`client_id`, `client_title`, `client_brief`, `client_thumbnail`, `client_image`, `client_featured`, `client_order`, `client_date_submited`, `client_date_updated`) VALUES 
(1, 'test first client photos', 'test first client photos cool test first client photos cool', '93022973.img.small.jpg', '2503_03.jpg', 'Y', 1, '2009-07-28', '0000-00-00'),
(2, 'test first client photos', 'test first client photos cool test first client photos cool', '93022973.img.small.jpg', '2503_03.jpg', 'Y', 2, '2009-07-28', '0000-00-00'),
(3, 'test first client photos', 'test first client photos cool test first client photos cool', '93022973.img.small.jpg', '2503_03.jpg', 'Y', 3, '2009-07-28', '0000-00-00'),
(4, 'test first client photos', 'test first client photos cool test first client photos cool', '93022973.img.small.jpg', '2503_03.jpg', 'Y', 4, '2009-07-28', '0000-00-00'),
(5, 'test first client photos', 'test first client photos cool test first client photos cool', '93022973.img.small.jpg', '2503_03.jpg', 'Y', 5, '2009-07-28', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_contacts`
-- 

CREATE TABLE `lab_contacts` (
  `contact_id` int(11) NOT NULL auto_increment,
  `contact_name` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `contact_email` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `contact_type` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `contact_subject` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `contact_message` text character set latin1 collate latin1_general_ci,
  `contact_date_submited` date default '0000-00-00',
  PRIMARY KEY  (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `lab_contacts`
-- 

INSERT INTO `lab_contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_type`, `contact_subject`, `contact_message`, `contact_date_submited`) VALUES 
(1, 'Abood Radwan', 'abood_radwan@yahoo.com', 'Feedback', 'Testing issue', 'I would like to know if the anything that support my problem', '0000-00-00'),
(2, 'Abood Radwan', 'abood_radwan@yahoo.com', 'Feedback', 'Testing issue', 'I would like to know if the anything that support my problem', '0000-00-00'),
(3, 'Abood Radwan', 'abood_radwan@yahoo.com', 'Feedback', 'Testing issue', 'I would like to know if the anything that support my problem', '0000-00-00'),
(4, 'Abood Radwan', 'abood_radwan@yahoo.com', 'Feedback', 'Testing issue', 'I would like to know if the anything that support my problem', '0000-00-00'),
(5, 'Abood Radwan', 'abood_radwan@yahoo.com', 'Feedback', 'Testing issue', 'I would like to know if the anything that support my problem', '2009-07-27'),
(6, 'abood radwan', 'abood_radwan@yahoo.com', 'feedback', 'hello world', 'I like this game Mario ', '2009-07-27');

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_controls`
-- 

CREATE TABLE `lab_controls` (
  `control_id` int(11) NOT NULL auto_increment,
  `control_name` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `control_file` varchar(255) character set latin1 collate latin1_general_ci NOT NULL,
  `control_description` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`control_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `lab_controls`
-- 

INSERT INTO `lab_controls` (`control_id`, `control_name`, `control_file`, `control_description`) VALUES 
(1, 'news.module', 'news.module.php', 'this is for artlab news, which includes lists and details as well.'),
(2, 'contact.module', 'contact.module.php', 'this module allow users to contact directly with the web admin by adding user information into the database and sends email to the admin'),
(3, 'services.module', 'services.module.php', 'listing all service added to the system, and output the service in a will format'),
(4, 'clients.module', 'clients.module.php', 'this module provides clients page with nice interaction'),
(5, 'portfolios.module', 'portfolios.module.php', 'company portfolio');

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_news`
-- 

CREATE TABLE `lab_news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_title` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `news_brief` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `news_description` text character set latin1 collate latin1_general_ci,
  `news_thumbnail` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `news_featured` enum('Y','N') collate utf8_unicode_ci default 'N',
  `news_order` int(11) default NULL,
  `news_date_submited` date default '0000-00-00',
  `news_date_updated` date default '0000-00-00',
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `lab_news`
-- 

INSERT INTO `lab_news` (`news_id`, `news_title`, `news_brief`, `news_description`, `news_thumbnail`, `news_featured`, `news_order`, `news_date_submited`, `news_date_updated`) VALUES 
(1, 'test news 1', 'test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1', '<p>test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1 test news 1</p>', NULL, 'Y', 1, '2009-07-27', '0000-00-00'),
(2, 'test news 2', 'test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2', '<p>test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2 test news 2</p>', NULL, 'N', 2, '2009-07-27', '0000-00-00'),
(3, 'test news 3', 'test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3', '<p>test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3 test news 3</p>', NULL, 'N', 3, '2009-07-28', '0000-00-00'),
(4, 'test news 4', 'test news 4 test news 4 test news 4 test news 4 test news 4', '<p>test news 4 test news 4 test news 4 test news 4 test news 4test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4 test news 4test news 4 test news 4 test news 4 test news 4 test news 4test news 4 test news 4 test news 4 test news 4 test news 4</p>', NULL, 'N', 4, '2009-07-28', '0000-00-00'),
(5, 'test news 5', 'test news 5 test news 5 test news 5 test news 5 test news 5 test news 5', '<p>test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 test news 5 </p>', NULL, 'N', 5, '2009-07-28', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_pages`
-- 

CREATE TABLE `lab_pages` (
  `page_id` int(11) NOT NULL default '0',
  `control_id` int(11) default '0',
  `page_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `page_title` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `page_description` text character set latin1 collate latin1_general_ci,
  `page_meta_keyword` varchar(255) character set latin1 collate latin1_general_ci NOT NULL,
  `page_meta_description` varchar(255) character set latin1 collate latin1_general_ci NOT NULL,
  `page_order` int(11) default NULL,
  `page_status` enum('Y','N') collate utf8_unicode_ci default 'N',
  `page_date_submited` date NOT NULL default '0000-00-00',
  `page_date_updated` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `lab_pages`
-- 

INSERT INTO `lab_pages` (`page_id`, `control_id`, `page_name`, `page_title`, `page_description`, `page_meta_keyword`, `page_meta_description`, `page_order`, `page_status`, `page_date_submited`, `page_date_updated`) VALUES 
(0, NULL, 'Home', 'Home | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. hello world</p>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 1, 'N', '2009-07-25', '2009-07-27'),
(1, 3, 'Services', 'Services | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>Services</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 2, 'Y', '2009-07-25', '2009-07-27'),
(2, 5, 'Portfolio', 'Portfolio | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>Portfolio</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, portfolio', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, portfolio', 3, 'Y', '2009-07-25', '2009-07-29'),
(3, 4, 'Clients', 'Clients | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>Clients</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, Clients', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Clients', 4, 'Y', '2009-07-25', '2009-07-28'),
(4, 2, 'Contact Us', 'Contact Us | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>Contact Us</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, Contacts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Contact Us', 5, 'Y', '2009-07-25', '2009-07-27'),
(5, NULL, 'About', 'About | Art Lab', NULL, 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, About', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, About', 6, 'Y', '2009-07-25', '2009-07-27'),
(6, NULL, 'Privacy Policy', 'Privacy Policy | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>Privacy Policy</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, Privacy Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Privacy Policy', 7, 'Y', '2009-07-25', '2009-07-27'),
(7, NULL, 'Careers', 'Careers | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>Careers</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, Careers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Careers', 9, 'Y', '2009-07-25', '2009-07-27'),
(8, 1, 'News', 'News | Art Lab', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h1>News</h1>', 'Lorem4, Lorem3, Lorem2, Lorem5, art lab, News', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, News', 10, 'Y', '2009-07-26', '2009-07-27'),
(9, NULL, 'Thank You', 'Thank You', '<p>Thank you for submiting your information </p>', 'hellow,a asd,asd, asd', 'a sdasd a sdas das,d,as d a,sd,as da', 11, 'N', '2009-07-27', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_portfolios`
-- 

CREATE TABLE `lab_portfolios` (
  `portfolio_id` int(11) NOT NULL auto_increment,
  `category_id` int(11) NOT NULL default '0',
  `portfolio_title` varchar(50) collate latin1_general_ci default NULL,
  `portfolio_brief` varchar(255) collate latin1_general_ci default NULL,
  `portfolio_thumbnail` varchar(255) collate latin1_general_ci default NULL,
  `portfolio_image` varchar(255) collate latin1_general_ci default NULL,
  `portfolio_order` int(11) default '0',
  `portfolio_date_submited` date default '0000-00-00',
  `portfolio_date_update` date default '0000-00-00',
  `portfolio_temp` varchar(59) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`portfolio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `lab_portfolios`
-- 

INSERT INTO `lab_portfolios` (`portfolio_id`, `category_id`, `portfolio_title`, `portfolio_brief`, `portfolio_thumbnail`, `portfolio_image`, `portfolio_order`, `portfolio_date_submited`, `portfolio_date_update`, `portfolio_temp`) VALUES 
(1, 1, 'my first portfolio', 'my first portfolio my first portfolio my first portfolio my first portfolio my first portfolio', '93022973.img.small.jpg', 'illusion_jan23_tcm6-65009.jpg', 1, '2009-07-29', '0000-00-00', NULL),
(2, 1, 'my sec portfolio', 'my sec portfolio my sec portfolio vmy sec portfolio my sec portfolio my sec portfolio', NULL, NULL, 2, '2009-07-29', '0000-00-00', NULL),
(3, 1, 'my sec portfolio', 'my sec portfolio my sec portfolio vmy sec portfolio my sec portfolio my sec portfolio', NULL, NULL, 3, '2009-07-29', '2009-07-29', NULL),
(4, 1, 'my cool portfolio', 'my sec portfolio my sec portfolio vmy sec portfolio my sec portfolio my sec portfolio', NULL, NULL, 4, '2009-07-29', '0000-00-00', NULL),
(5, 1, 'my funny portfolio', 'my sec portfolio my sec portfolio vmy sec portfolio my sec portfolio my sec portfolio', NULL, NULL, 5, '2009-07-29', '2009-07-29', NULL),
(6, 1, 'my wow portfolio', 'my sec portfolio my sec portfolio vmy sec portfolio my sec portfolio my sec portfolio', NULL, NULL, 6, '2009-07-29', '0000-00-00', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `lab_services`
-- 

CREATE TABLE `lab_services` (
  `service_id` int(11) NOT NULL auto_increment,
  `service_parent_id` int(11) default '0',
  `service_title` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `service_description` text character set latin1 collate latin1_general_ci,
  `service_order` int(11) default NULL,
  `service_date_submited` date default '0000-00-00',
  `service_date_updated` date default '0000-00-00',
  PRIMARY KEY  (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `lab_services`
-- 

INSERT INTO `lab_services` (`service_id`, `service_parent_id`, `service_title`, `service_description`, `service_order`, `service_date_submited`, `service_date_updated`) VALUES 
(1, NULL, 'Graphic Design', '<p>Graphic Design</p>', 1, '2009-07-27', '0000-00-00'),
(2, NULL, 'Drawings and clipart', '<p>Drawings and clipart</p>', 2, '2009-07-27', '0000-00-00'),
(3, NULL, 'Applying specifications of a branding theme', '<p>Applying specifications of a branding theme</p>', 3, '2009-07-27', '0000-00-00'),
(4, NULL, 'Printing', '<p>Printing</p>', 4, '2009-07-27', '0000-00-00'),
(5, NULL, 'Additional Services', '<p>Additional Services</p>', 6, '2009-07-27', '0000-00-00'),
(6, 5, 'Website design', '<p>Website design </p>', 1, '2009-07-27', '0000-00-00'),
(7, 5, 'Copywriting & translation', '<p>Copywriting &amp; translation</p>', 2, '2009-07-27', '0000-00-00'),
(8, 5, 'Photography', '<p>Photography</p>', 3, '2009-07-27', '0000-00-00'),
(9, 5, 'Promotional items', '<p>Promotional items</p>', 4, '2009-07-27', '0000-00-00');
