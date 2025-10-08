-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 08:22 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebidding`
--

-- --------------------------------------------------------

--
-- Table structure for table `biddapp`
--

CREATE TABLE IF NOT EXISTS `biddapp` (
`id` int(10) NOT NULL,
  `sellerid` varchar(30) NOT NULL,
  `bidderid` varchar(30) NOT NULL,
  `prodname` varchar(30) NOT NULL,
  `oprice` int(6) NOT NULL,
  `bprice` int(6) NOT NULL,
  `status` varchar(15) NOT NULL,
  `prodid` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `biddapp`
--

INSERT INTO `biddapp` (`id`, `sellerid`, `bidderid`, `prodname`, `oprice`, `bprice`, `status`, `prodid`) VALUES
(1, 'sugi@gmail.com', 'kavi@gmail.com', 'Vintage model Telephone', 2000, 2200, 'Accepted', 123),
(2, 'mano@gmail.com', 'kumar@gmail.com', 'Kum Kum gallery', 8000, 8500, 'Accepted', 875),
(3, 'sugi@gmail.com', 'kumar@gmail.com', 'Vintage model Telephone', 2000, 2050, 'Accepted', 96584),
(4, 'sukumaran26315@gmail.com', 'sukumaran26315@gmail.com', 'onion', 1100, 2500, 'Accepted', 0),
(5, 'sukumaran26315@gmail.com', '', 'carrot', 1000, 2500, 'Accepted', 0),
(6, 'sukumaran26315@gmail.com', 'sukumaran26315@gmail.com', 'carrot', 1200, 1300, 'Accepted', 0),
(7, '', '', 'corn', 5432, 25000, '', 0),
(8, 'john@gmail.com', 'sukumaran26315@gmail.com', 'banana', 500, 1000, '', 0),
(9, 'sam@gmail.com', 'sukumaran26315@gmail.com', 'bell chilli', 500, 2500, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

CREATE TABLE IF NOT EXISTS `bidder` (
`id` int(10) NOT NULL,
  `bname` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`id`, `bname`, `email`, `address`, `contact`, `password`) VALUES
(4, '', 'sudhakarskr@gmail.com', 'tiruppur', '8769542130', 'sudhakarskr'),
(5, 'sk', 'sukumaran26315@gmail.com', 'kodingiam', '8012869018', 'sk'),
(6, 'suthakar', 'sudhakarskr@gmail.com', 'tiruppur', '9998855258', 'sudhakarskr'),
(7, 'sanuf', 'sanuf@gmail.com', 'pollachi', '6381458406', 'sr'),
(8, 'sanuf', 'sanuf2421@gmail.com', 'pollachi', '6932558542', 'sanuf');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) NOT NULL,
  `selleremail` varchar(30) NOT NULL,
  `prodname` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` varchar(12) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `fno` bigint(10) NOT NULL,
  `flocation` varchar(12) NOT NULL,
  `km` int(12) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `prodid` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `selleremail`, `prodname`, `description`, `type`, `fname`, `fno`, `flocation`, `km`, `photo`, `price`, `prodid`) VALUES
(14, 'sukumaran26315@gmail.com', 'carrot', 'good for eye', 'organic', 'sukumaran', 8012869018, 'kodingiam', 1, 'carrot.jpg', 1200, 12),
(15, 'sukumaran26315@gmail.com', 'onion', 'with out nothing', 'hybrid', 'Ajith', 8012869017, 'kerala', 3, 'bigonion.jpg', 900, 13),
(29, 'john@gmail.com', 'banana', 'good', 'hybrid', 'john', 8012869018, 'chennai', 8, 'bananna.jpg', 500, 14),
(32, 'ajith@gmail.com', 'banana flower', 'good', 'hybrid', 'Ajith', 8012869018, 'kerala', 8, 'bannanaflower.jpg', 500, 15),
(35, 'sukumaran26315@gmail.com', 'corn', 'good for health', 'Organic', 'sukumaran', 8012869018, 'kodngiam', 0, 'corn.jpg', 5432, 16),
(36, 'sukumaran26315@gmail.com', 'beans', 'good combination with carrot', 'Organic', 'sukumaran', 8012869018, 'kodingiam', 0, 'beans.jpg', 2000, 1),
(39, 'sam@gmail.com', 'bell chilli', 'fdsgsfg', 'Organic', 'sukumaran', 8012869018, 'kodngiam', 4, 'bellchilli.jpg', 500, 65),
(40, 'sam@gmail.com', 'bell chilli', 'ghjhg', 'Hybrid', 'Ajith', 8012869018, 'kerala', 9, 'bellchilli.jpg', 1100, 198);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
`id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(220) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `email`, `address`, `contact`, `password`) VALUES
(3, 'sk', 'sukumaran26315@gmail.com', 'kodingiam', '8012869018', 'sk'),
(4, 'sam', 'sam@gmail.com', 'chennai', '8012869018', 'sam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biddapp`
--
ALTER TABLE `biddapp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidder`
--
ALTER TABLE `bidder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biddapp`
--
ALTER TABLE `biddapp`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bidder`
--
ALTER TABLE `bidder`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
