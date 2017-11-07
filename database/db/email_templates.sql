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
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) UNSIGNED NOT NULL,
  `template_name` varchar(255) NOT NULL DEFAULT '',
  `template_subject` varchar(255) NOT NULL DEFAULT '',
  `template_html` text NOT NULL,
  `dynamic_variables` text NOT NULL COMMENT 'help text for the user to design the template',
  `send_to_unsubscribed_also` tinyint(1) NOT NULL DEFAULT '0',
  `audit_created_by` varchar(50) DEFAULT NULL,
  `audit_created_date` datetime DEFAULT NULL,
  `audit_updated_by` varchar(50) DEFAULT NULL,
  `audit_updated_date` datetime DEFAULT NULL,
  `audit_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template_name`, `template_subject`, `template_html`, `dynamic_variables`, `send_to_unsubscribed_also`, `audit_created_by`, `audit_created_date`, `audit_updated_by`, `audit_updated_date`, `audit_ip`) VALUES
(1, 'registraion_success', 'Registration success', 'Your Registration successfully\r\n{link}\r\n', '', 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
