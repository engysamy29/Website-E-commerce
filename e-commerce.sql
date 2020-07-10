-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 07:02 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE `addtocart` (
  `usr_id` int(4) NOT NULL,
  `item_id` int(4) NOT NULL,
  `qun` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addtocart`
--

INSERT INTO `addtocart` (`usr_id`, `item_id`, `qun`) VALUES
(3, 13, 2),
(4, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(7) NOT NULL,
  `a_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `a_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `a_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_pass`) VALUES
(1, 'mayarnour', 'mayarnour98@gmail.com', 'ec392'),
(2, 'engysamy', 'engy_samy19@yahoo.com', '92116'),
(3, 'engysamy', 'engy_samy19@yahoo.com', '92116'),
(4, 'engysamy', 'engy_samy19@yahoo.com', 'bb99e'),
(5, 'engysamy', 'engy_samy19@yahoo.com', '92116');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `b_id` int(4) NOT NULL,
  `b_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `b_city` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `b_name`, `b_city`) VALUES
(4, 'Bakloza loza', 'Nasr city'),
(5, 'd4f', 'cccc');

-- --------------------------------------------------------

--
-- Table structure for table `branchinventory`
--

CREATE TABLE `branchinventory` (
  `bi_id` int(4) NOT NULL,
  `binvitem_id` int(4) NOT NULL,
  `quantity` int(7) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branchinventory`
--

INSERT INTO `branchinventory` (`bi_id`, `binvitem_id`, `quantity`, `price`) VALUES
(4, 13, 4, 333),
(5, 7, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `branchnumber`
--

CREATE TABLE `branchnumber` (
  `bn_id` int(4) NOT NULL,
  `bn_phonenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branchnumber`
--

INSERT INTO `branchnumber` (`bn_id`, `bn_phonenum`) VALUES
(4, 7677657);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(4) NOT NULL,
  `c_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `c_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `c_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_desc`, `c_img`) VALUES
(2, 'Fashion', 'You can find here all the latest fashion you need from tshirts to shorts.', '1544213800download.jpg'),
(4, 'Accessories', 'You can find sunglasses,necklaces,rings,scarfs,shoes and bags.', '1544214142Fashion-summer-women-and-cosmetics-and-accessories-HD-picture-06.jpg'),
(5, 'Books', 'You will find all you need of books here.', '1544214898ew0V5jf.jpg'),
(12, 'hfkje', 'fefff', '1544389460alif-mobiles-kozhikode-fztb0.jpg'),
(13, 'Electronics', 'dggefkhfelsijfowkdwhwfhfksjkls', '1544393672amazondiwaligreatindiansale-upto50offonnewsmartphonesandlaptops-04-1507105458.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `cl_id` int(4) NOT NULL,
  `cl_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`cl_id`, `cl_name`) VALUES
(2, '#000000'),
(3, '#0000a0'),
(4, '#800080'),
(5, '#00ff00'),
(6, '#000000'),
(7, '#804000');

-- --------------------------------------------------------

--
-- Table structure for table `coloritem`
--

CREATE TABLE `coloritem` (
  `citem_id` int(19) NOT NULL,
  `ccolor_id` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coloritem`
--

INSERT INTO `coloritem` (`citem_id`, `ccolor_id`) VALUES
(8, 3),
(8, 4),
(9, 2),
(13, 2),
(13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comi_id` int(4) NOT NULL,
  `co_Text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usc_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comi_id`, `co_Text`, `usc_id`) VALUES
(13, 'dewddws', 4),
(13, 'jjknjknjk', 4);

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `f_id` int(4) NOT NULL,
  `f_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`f_id`, `f_name`) VALUES
(2, 'Ram'),
(3, 'Core'),
(4, 'HardDisk');

-- --------------------------------------------------------

--
-- Table structure for table `featureitem`
--

CREATE TABLE `featureitem` (
  `fi_id` int(4) NOT NULL,
  `if_id` int(4) NOT NULL,
  `value` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `featureitem`
--

INSERT INTO `featureitem` (`fi_id`, `if_id`, `value`) VALUES
(2, 7, 200),
(2, 13, 500),
(3, 13, 7),
(4, 13, 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(4) NOT NULL,
  `i_des` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `i_imag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `i_price` int(10) NOT NULL,
  `imodel_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `i_des`, `i_imag`, `i_price`, `imodel_id`) VALUES
(8, 'ihkvfcnfhgkj', '1544395274alif-mobiles-kozhikode-fztb0.jpg', 55, 6),
(9, 'neknkfdnk', '1544394103alif-mobiles-kozhikode-fztb0.jpg', 55, 7),
(10, 'ewgrthurekjlwd;ghit', '1544394916alif-mobiles-kozhikode-fztb0.jpg', 45, 7),
(11, 'wesresrf', '1544394926alif-mobiles-kozhikode-fztb0.jpg', 44, 6),
(12, 'ewsgfgsf', '1544394937amazondiwaligreatindiansale-upto50offonnewsmartphonesandlaptops-04-1507105458.jpg', 34, 6),
(13, 'dnfjuerfvnjkvd', '1544635295alif-mobiles-kozhikode-fztb0.jpg', 13000, 8),
(14, 'eflkjke', '1544635307alif-mobiles-kozhikode-fztb0.jpg', 14000, 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemwished`
--
CREATE TABLE `itemwished` (
`i_id` int(4)
,`i_des` varchar(200)
,`i_imag` varchar(100)
,`i_price` int(10)
,`imodel_id` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `liket`
--

CREATE TABLE `liket` (
  `li_id` int(4) NOT NULL,
  `us_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `liket`
--

INSERT INTO `liket` (`li_id`, `us_id`) VALUES
(9, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(4) NOT NULL,
  `model_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `model_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mp_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `model_img`, `mp_id`) VALUES
(6, 'dg', '1544296423alif-mobiles-kozhikode-fztb0.jpg', 10),
(7, 'Iphone 6s', '1544393763alif-mobiles-kozhikode-fztb0.jpg', 11),
(8, 'Dell', '1544635262alif-mobiles-kozhikode-fztb0.jpg', 12),
(9, 'Lenovo', '1544635274alif-mobiles-kozhikode-fztb0.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ordert`
--

CREATE TABLE `ordert` (
  `o_id` int(4) NOT NULL,
  `pt_id` int(4) NOT NULL,
  `us_id` int(4) NOT NULL,
  `o_shipaddress` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `o_totalprice` int(7) NOT NULL,
  `shippedname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(19) NOT NULL,
  `ordernote` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordert`
--

INSERT INTO `ordert` (`o_id`, `pt_id`, `us_id`, `o_shipaddress`, `o_totalprice`, `shippedname`, `city`, `phone`, `ordernote`) VALUES
(4, 2, 3, 'fgdfv', 13000, 'mayar hassan nour', 'ddd', 1164642333, 'sxcvcccx');

-- --------------------------------------------------------

--
-- Table structure for table `paytype`
--

CREATE TABLE `paytype` (
  `pt_id` int(4) NOT NULL,
  `pt_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paytype`
--

INSERT INTO `paytype` (`pt_id`, `pt_name`) VALUES
(1, 'visa'),
(2, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(4) NOT NULL,
  `p_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `p_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pc_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_img`, `pc_id`) VALUES
(10, 'tshirst', '1544296415amazondiwaligreatindiansale-upto50offonnewsmartphonesandlaptops-04-1507105458.jpg', 2),
(11, 'mobiles', '1544393701alif-mobiles-kozhikode-fztb0.jpg', 13),
(12, 'laptops', '1544393725alif-mobiles-kozhikode-fztb0.jpg', 13),
(13, 'eheiwhid', '1544393737amazondiwaligreatindiansale-upto50offonnewsmartphonesandlaptops-04-1507105458.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_id` int(4) NOT NULL,
  `bu_id` int(4) NOT NULL,
  `us_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `us_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `us_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `us_gender` enum('Female','Male','','') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_id`, `bu_id`, `us_name`, `u_name`, `us_email`, `us_pass`, `us_gender`) VALUES
(3, 4, 'mayarnour', 'mayar hassan nour', 'soso_noga21@yahoo.com', 'bb99e', 'Female'),
(4, 4, 'engy', 'engy', 'engy_samy19@yahoo.com', 'a20aa', 'Female');

-- --------------------------------------------------------

--
-- Stand-in structure for view `usercart`
--
CREATE TABLE `usercart` (
`usr_id` int(4)
,`item_id` int(4)
,`qun` int(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `wishitem`
--
CREATE TABLE `wishitem` (
`iit_id` int(4)
,`wshus_id` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `iit_id` int(4) NOT NULL,
  `wshus_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`iit_id`, `wshus_id`) VALUES
(9, 4),
(13, 4);

-- --------------------------------------------------------

--
-- Structure for view `itemwished`
--
DROP TABLE IF EXISTS `itemwished`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemwished`  AS  (select `item`.`i_id` AS `i_id`,`item`.`i_des` AS `i_des`,`item`.`i_imag` AS `i_imag`,`item`.`i_price` AS `i_price`,`item`.`imodel_id` AS `imodel_id` from `item` where (`item`.`i_id` = 9)) ;

-- --------------------------------------------------------

--
-- Structure for view `usercart`
--
DROP TABLE IF EXISTS `usercart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usercart`  AS  (select `addtocart`.`usr_id` AS `usr_id`,`addtocart`.`item_id` AS `item_id`,`addtocart`.`qun` AS `qun` from `addtocart` where (`addtocart`.`usr_id` = 4)) ;

-- --------------------------------------------------------

--
-- Structure for view `wishitem`
--
DROP TABLE IF EXISTS `wishitem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wishitem`  AS  (select `wishlist`.`iit_id` AS `iit_id`,`wishlist`.`wshus_id` AS `wshus_id` from `wishlist`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD UNIQUE KEY `usr_id` (`usr_id`,`item_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `branchinventory`
--
ALTER TABLE `branchinventory`
  ADD UNIQUE KEY `bi_id` (`bi_id`,`binvitem_id`);

--
-- Indexes for table `branchnumber`
--
ALTER TABLE `branchnumber`
  ADD UNIQUE KEY `b_id` (`bn_id`,`bn_phonenum`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `coloritem`
--
ALTER TABLE `coloritem`
  ADD UNIQUE KEY `citem_id` (`citem_id`,`ccolor_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD UNIQUE KEY `comi_id` (`comi_id`,`co_Text`,`usc_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `featureitem`
--
ALTER TABLE `featureitem`
  ADD UNIQUE KEY `fi_id` (`fi_id`,`if_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `liket`
--
ALTER TABLE `liket`
  ADD UNIQUE KEY `i_id` (`li_id`,`us_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `ordert`
--
ALTER TABLE `ordert`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `paytype`
--
ALTER TABLE `paytype`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD UNIQUE KEY `i_id` (`iit_id`,`wshus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `cl_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ordert`
--
ALTER TABLE `ordert`
  MODIFY `o_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paytype`
--
ALTER TABLE `paytype`
  MODIFY `pt_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
