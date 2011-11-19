-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2011 at 11:39 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounts_c_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_a_a_i_d`
--

CREATE TABLE IF NOT EXISTS `c_a_a_i_d` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_a_c_a_d`
--

CREATE TABLE IF NOT EXISTS `c_a_c_a_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `current_amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_a_c_d`
--

CREATE TABLE IF NOT EXISTS `c_a_c_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `remaining_balance` varchar(100) DEFAULT NULL,
  `account_close_time` varchar(100) DEFAULT NULL,
  `account_close_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_a_d_d`
--

CREATE TABLE IF NOT EXISTS `c_a_d_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `deposit_id` varchar(100) NOT NULL DEFAULT '',
  `deposit_method` varchar(100) DEFAULT NULL,
  `amount_deposited` varchar(100) DEFAULT NULL,
  `deposit_time` varchar(100) DEFAULT NULL,
  `deposit_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`,`deposit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_a_i_a_d`
--

CREATE TABLE IF NOT EXISTS `c_a_i_a_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `initial_amount_deposited` varchar(100) DEFAULT NULL,
  `account_start_date` varchar(100) DEFAULT NULL,
  `account_start_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_a_n_t_d`
--

CREATE TABLE IF NOT EXISTS `c_a_n_t_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `number_withdrawals` varchar(100) DEFAULT NULL,
  `number_deposits` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_a_w_d`
--

CREATE TABLE IF NOT EXISTS `c_a_w_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `withdrawal_id` varchar(100) NOT NULL DEFAULT '',
  `amount_withdrawn` varchar(100) NOT NULL,
  `withdrawal_time` varchar(100) DEFAULT NULL,
  `withdrawal_date` varchar(100) DEFAULT NULL,
  `withdrawal_method` varchar(100) DEFAULT NULL,
  `transfer_to_account_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`,`withdrawal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
