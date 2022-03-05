-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 01:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncasurvey_`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nca_`
--

CREATE TABLE `nca_` (
  `id` int(11) NOT NULL,
  `image1` blob NOT NULL,
  `image2` blob NOT NULL,
  `image3` blob NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `id_no` tinytext NOT NULL,
  `passport_no` tinytext NOT NULL,
  `tax_no` tinytext NOT NULL,
  `kra_pin` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `contact` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `phd` tinytext NOT NULL,
  `masters` tinytext NOT NULL,
  `bachelors` tinytext NOT NULL,
  `post_grad_diploma` tinytext NOT NULL,
  `diploma` tinytext NOT NULL,
  `post_phd` tinytext NOT NULL,
  `post_masters` tinytext NOT NULL,
  `post_degree` tinytext NOT NULL,
  `post_diploma` tinytext NOT NULL,
  `other_train_cert_1` tinytext NOT NULL,
  `other_train_cert_2` tinytext NOT NULL,
  `other_train_cert_3` tinytext NOT NULL,
  `work_company_1` tinytext NOT NULL,
  `work_period_1` tinytext NOT NULL,
  `work_role_1` tinytext NOT NULL,
  `work_website_1` tinytext NOT NULL,
  `work_company_2` tinytext NOT NULL,
  `work_period_2` tinytext NOT NULL,
  `work_role_2` tinytext NOT NULL,
  `work_website_2` tinytext NOT NULL,
  `work_company_3` tinytext NOT NULL,
  `work_period_3` tinytext NOT NULL,
  `work_role_3` tinytext NOT NULL,
  `work_website_3` tinytext NOT NULL,
  `referr_name_1` tinytext NOT NULL,
  `referr_phone_1` tinytext NOT NULL,
  `referr_email_1` tinytext NOT NULL,
  `referr_name_2` tinytext NOT NULL,
  `referr_phone_2` tinytext NOT NULL,
  `referr_email_2` tinytext NOT NULL,
  `expertise` text NOT NULL,
  `interest` text NOT NULL,
  `project_name` text NOT NULL,
  `host_company` text NOT NULL,
  `period_implementation` text NOT NULL,
  `contact_person` text NOT NULL,
  `project_name_1` text NOT NULL,
  `host_company_1` text NOT NULL,
  `period_implementation_1` text NOT NULL,
  `contact_person_1` text NOT NULL,
  `project_name_2` text NOT NULL,
  `host_company_2` text NOT NULL,
  `period_implementation_2` text NOT NULL,
  `contact_person_2` text NOT NULL,
  `prof_mem_1` text NOT NULL,
  `prof_mem_2` text NOT NULL,
  `prof_mem_3` text NOT NULL,
  `prof_mem_4` text NOT NULL,
  `prof_mem_5` text NOT NULL,
  `prof_mem_6` text NOT NULL,
  `prof_mem_7` text NOT NULL,
  `prof_mem_8` text NOT NULL,
  `prof_mem_9` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nca_`
--
ALTER TABLE `nca_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nca_`
--
ALTER TABLE `nca_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
