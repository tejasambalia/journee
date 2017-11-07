-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 04:13 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

CREATE TABLE `email_queue` (
  `id` int(11) UNSIGNED NOT NULL,
  `email_templates_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'trigger will make sure email is not sent out if template is not forced to send to unsubscribed user and email_to is in unsubscribed list',
  `email_to` varchar(1000) NOT NULL DEFAULT '' COMMENT 'comma seperate multiple or single email_to address',
  `email_from` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `attached_files` mediumtext NOT NULL COMMENT 'JSON array with absolute file paths.',
  `date_time_queued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `sent_debug_log` varchar(500) DEFAULT '',
  `sent_date_time` datetime DEFAULT NULL,
  `opened_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unsubscribe_block` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'if this value is 1, email will not be sent out',
  `audit_created_by` varchar(50) DEFAULT NULL,
  `audit_created_date` datetime DEFAULT NULL,
  `audit_updated_by` varchar(50) DEFAULT NULL,
  `audit_updated_date` datetime DEFAULT NULL,
  `audit_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_queue`
--

INSERT INTO `email_queue` (`id`, `email_templates_id`, `email_to`, `email_from`, `subject`, `body`, `attached_files`, `date_time_queued`, `sent`, `sent_debug_log`, `sent_date_time`, `opened_date_time`, `unsubscribe_block`, `audit_created_by`, `audit_created_date`, `audit_updated_by`, `audit_updated_date`, `audit_ip`) VALUES
(1, 1, 'rupalbapodarak@gmail.com', 'rupalbapodarak@gmail.com', 'Registration success', 'Your Registration successfully\r\n{link}\r\n', '[]', '2017-10-08 13:57:22', 1, '', NULL, '2017-10-08 19:27:22', 0, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'rupalbapodarak@gmail.com', 'rupalbapodarak@gmail.com', 'Registration success', 'Your Registration successfully\r\n{link}\r\n', '[]', '2017-10-08 13:58:57', 1, '', NULL, '2017-10-08 19:28:57', 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_queue`
--
ALTER TABLE `email_queue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_queue`
--
ALTER TABLE `email_queue`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
