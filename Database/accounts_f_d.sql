-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2011 at 05:21 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounts_f_d`
--

-- --------------------------------------------------------

--
-- Table structure for table `f_d_a_i_d`
--

CREATE TABLE IF NOT EXISTS `f_d_a_i_d` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_cl_d`
--

CREATE TABLE IF NOT EXISTS `f_d_cl_d` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `remaining_balance` varchar(100) DEFAULT NULL,
  `account_close_time` varchar(100) DEFAULT NULL,
  `account_close_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serial`,`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_co_d`
--

CREATE TABLE IF NOT EXISTS `f_d_co_d` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `maximum_loan_amount` varchar(100) DEFAULT NULL,
  `date_for_check_annual_interest` varchar(100) DEFAULT NULL,
  `tax_percentage` varchar(100) DEFAULT NULL,
  `no_taxation_annual_interest_limit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_c_a_d`
--

CREATE TABLE IF NOT EXISTS `f_d_c_a_d` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `current_amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serial`,`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_i_a_d`
--

CREATE TABLE IF NOT EXISTS `f_d_i_a_d` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `account_start_date` varchar(100) DEFAULT NULL,
  `account_start_time` varchar(100) DEFAULT NULL,
  `account_end_date` date NOT NULL,
  `initial_amount_deposited` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serial`,`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_i_d`
--

CREATE TABLE IF NOT EXISTS `f_d_i_d` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `interest_computation_interval` varchar(100) DEFAULT NULL,
  `interest_rate` varchar(100) DEFAULT NULL,
  `interest_accumulated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serial`,`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_l_d`
--

CREATE TABLE IF NOT EXISTS `f_d_l_d` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `initial_loan_amount` varchar(100) NOT NULL,
  `current_loan_amount` varchar(100) DEFAULT NULL,
  `loan_start_date` varchar(100) DEFAULT NULL,
  `loan_end_date` varchar(100) DEFAULT NULL,
  `interest_rate_on_loan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`serial`,`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_t_d`
--

CREATE TABLE IF NOT EXISTS `f_d_t_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `eligible_for_taxation_A_INCOME` varchar(100) DEFAULT NULL,
  `eligibility_for_taxation_A_INTEREST` varchar(100) DEFAULT NULL,
  `tax_amount_for_current_year` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_d_w_d`
--

CREATE TABLE IF NOT EXISTS `f_d_w_d` (
  `account_id` varchar(100) NOT NULL DEFAULT '',
  `onTime_withdrawal_time` time NOT NULL,
  `onTime_withdrawal_date` date NOT NULL,
  `premature_withdrawal` varchar(100) DEFAULT NULL,
  `premature_withdrawal_time` varchar(100) DEFAULT NULL,
  `penalty_on_premature_withdrawal` varchar(100) DEFAULT NULL,
  `amount_withdrawn` varchar(100) DEFAULT NULL,
  `withdrawal_medium` varchar(100) DEFAULT NULL,
  `transfer_to_account_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
