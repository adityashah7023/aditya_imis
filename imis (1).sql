-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2016 at 02:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(255) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL DEFAULT '21232f297a57a5a743894a0e4a801fc3',
  `admin_email` varchar(255) NOT NULL,
  `admin_contact_no` varchar(255) NOT NULL,
  `admin_status` varchar(255) NOT NULL DEFAULT 'enable',
  `is_super` int(1) NOT NULL DEFAULT '0' COMMENT '0- false | 1-true',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_username` (`admin_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_contact_no`, `admin_status`, `is_super`) VALUES
(1, 'Aditya Shah', 'aditya7023', '057829fa5a65fc1ace408f490be486ac', 'aditya.shah7023@gmail.com', '5197920120', 'enable', 1),
(2, 'Palak Desai', 'palakdesai7', '6418d24e63f4a9e5fc73a03cdd2fac30', 'palakdesai7@gmail.com', '5197923092', 'enable', 1),
(6, 'Stephanos', 'steph', '21232f297a57a5a743894a0e4a801fc3', 'stephanos@uwindsor.ca', '7894561230', 'disable', 0);

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `cert_id` int(255) NOT NULL AUTO_INCREMENT,
  `cert_name` varchar(255) NOT NULL,
  `cert_body` varchar(255) NOT NULL,
  `cert_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`cert_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`cert_id`, `cert_name`, `cert_body`, `cert_status`) VALUES
(1, 'OCAJP SE 7', 'Oracle', 'enable'),
(2, 'CCNA', 'CISCO', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `comp_id` int(255) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(255) NOT NULL,
  `comp_street1` varchar(255) NOT NULL,
  `comp_street2` varchar(255) NOT NULL,
  `comp_city` varchar(255) NOT NULL,
  `comp_province` varchar(255) NOT NULL,
  `comp_country` varchar(255) NOT NULL DEFAULT 'Canada',
  `comp_website` varchar(255) NOT NULL,
  `comp_phone` varchar(255) NOT NULL,
  `comp_email` varchar(255) NOT NULL,
  `comp_description` text NOT NULL,
  `comp_postal_code` varchar(255) NOT NULL,
  `comp_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `comp_street1`, `comp_street2`, `comp_city`, `comp_province`, `comp_country`, `comp_website`, `comp_phone`, `comp_email`, `comp_description`, `comp_postal_code`, `comp_status`) VALUES
(1, 'University of Windsor', '401', 'Sunset Avenue', 'Windsor', 'Ontario', 'Canada', 'http://www.uwindsor.ca', '7984561203', 'uwindsor@uwindsor.ca', 'University', 'N9B1C9', 'enable'),
(2, 'EPICenter', '240', 'Wyandotte', 'Windsor', 'ON', 'Canada', 'http://www.epicentreuwindsor.ca/', '5194561320', 'epicenter@uwindsor.ca', 'Entrepreneurship Practice and Innovation Center', 'N9B1C9', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `internship_type`
--

CREATE TABLE IF NOT EXISTS `internship_type` (
  `intp_id` int(255) NOT NULL AUTO_INCREMENT,
  `intp_name` varchar(255) NOT NULL,
  `intp_status` varchar(255) NOT NULL,
  PRIMARY KEY (`intp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `internship_type`
--

INSERT INTO `internship_type` (`intp_id`, `intp_name`, `intp_status`) VALUES
(1, 'Company', 'enable'),
(2, 'Startup Company', 'enable'),
(3, 'Research Project', 'enable'),
(4, 'MAC Project', 'enable'),
(5, 'Other', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(255) NOT NULL AUTO_INCREMENT,
  `comp_id` int(255) NOT NULL,
  `intp_id` int(255) NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_responsibilities` text NOT NULL,
  `job_requirements` text NOT NULL,
  `job_openings` int(255) NOT NULL,
  `job_salary` varchar(255) NOT NULL DEFAULT '$0 - $0 PA' COMMENT '$ 0 - $ 0 P.A.',
  `job_pay_status` varchar(255) NOT NULL DEFAULT 'unpaid' COMMENT 'paid/unpaid',
  `job_application_deadline` date NOT NULL,
  `jbgrp_id` int(255) NOT NULL,
  `job_contact_fname` varchar(255) NOT NULL,
  `job_contact_lname` varchar(255) NOT NULL,
  `job_contact_position` varchar(255) NOT NULL,
  `job_contact_phone` varchar(255) NOT NULL,
  `job_contact_email` varchar(255) NOT NULL,
  `job_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `comp_id`, `intp_id`, `job_position`, `job_description`, `job_responsibilities`, `job_requirements`, `job_openings`, `job_salary`, `job_pay_status`, `job_application_deadline`, `jbgrp_id`, `job_contact_fname`, `job_contact_lname`, `job_contact_position`, `job_contact_phone`, `job_contact_email`, `job_status`) VALUES
(2, 1, 3, 'software intern', 'Software', 'coding\r\ndesigning', 'expreiee', 1, '$0 - $0 PA', 'unpaid', '2016-04-02', 3, 'Aditya', 'Shah', 'sr. software developer', '15197920120', 'aditya.shah7023@gmail.com', 'enable'),
(3, 1, 2, 'software intern', 'sda ', 'sa d', 's a', 2, '$15 - $17 PH', 'paid', '2016-04-11', 2, 'Aditya', 'Shah', 'sr. software developer', '15197920120', 'aditya.shah7023@gmail.com', 'enable'),
(5, 1, 4, 'Android Developer', 's fablfidshf ipsafo iahsdofihsa d9pf sdaf iasdf ', 'saf hiushf iisaHF \r\nDLSKFJ SDF\r\nSDIJF \r\nSAFK ;AOSFAKSF \r\nds jpS D[APFKsdf ', 'sdlf knsa\r\nds fj\r\nd sjfpjasdf\r\na  asojdg]aosdf\r\nas kg\r\noa \r\ndkg asdgk ]akg\r\nag sdpgk asdg \r\na g', 1, '$0', 'unpaid', '2016-04-15', 2, 'Palak', 'Desai', 'Mobile Development', '5197923092', 'palakdesai7@gmail.com', 'enable'),
(6, 2, 2, 'iOS Developer', 'iOS Development', 'Developing iOS application', 'Knowledge of iOS programming', 1, '0', 'unpaid', '2016-05-20', 2, 'Jhon', 'Peter', 'Mentor', '4654789123', 'epicenter@uwindsor.ca', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `job_group`
--

CREATE TABLE IF NOT EXISTS `job_group` (
  `jbgrp_id` int(255) NOT NULL AUTO_INCREMENT,
  `jbgrp_name` varchar(255) NOT NULL,
  `jbgrp_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`jbgrp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `job_group`
--

INSERT INTO `job_group` (`jbgrp_id`, `jbgrp_name`, `jbgrp_status`) VALUES
(1, 'Web Development', 'enable'),
(2, 'Mobile Development', 'enable'),
(3, 'System Development', 'enable'),
(4, 'Technical Support', 'enable'),
(5, 'Networking', 'enable'),
(6, 'Data Analysis', 'enable'),
(7, 'Testing', 'enable'),
(8, 'Security', 'enable'),
(9, 'Data Management', 'enable'),
(10, 'Other', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `job_skill`
--

CREATE TABLE IF NOT EXISTS `job_skill` (
  `jbsk_id` int(255) NOT NULL AUTO_INCREMENT,
  `job_id` int(255) NOT NULL,
  `skill_id` int(255) NOT NULL,
  `jbsk_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`jbsk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`jbsk_id`, `job_id`, `skill_id`, `jbsk_status`) VALUES
(1, 5, 1, 'enable'),
(2, 5, 7, 'enable'),
(3, 6, 19, 'enable'),
(4, 6, 9, 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `skill_id` int(255) NOT NULL AUTO_INCREMENT,
  `sktyp_id` int(255) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `sktyp_id`, `skill_name`, `skill_status`) VALUES
(1, 1, 'C', 'enable'),
(2, 1, 'ASP.NET', 'enable'),
(3, 1, 'C++', 'enable'),
(4, 1, 'C#', 'enable'),
(5, 2, 'Concrete5', 'enable'),
(6, 2, 'DotNetNuke', 'enable'),
(7, 3, 'Android', 'enable'),
(8, 3, 'Chrome OS', 'enable'),
(9, 3, 'iOS', 'enable'),
(10, 1, 'Flex', 'enable'),
(11, 1, 'Java', 'enable'),
(12, 1, 'JavaScript', 'enable'),
(13, 1, 'LISP', 'enable'),
(14, 1, 'Matlab', 'enable'),
(15, 1, 'MySQL', 'enable'),
(16, 1, 'Objective-C', 'enable'),
(17, 1, 'Pascal', 'enable'),
(18, 1, 'Perl', 'enable'),
(19, 1, 'PHP', 'enable'),
(20, 1, 'Prolog', 'enable'),
(21, 1, 'Python', 'enable'),
(22, 1, 'Ruby', 'enable'),
(23, 1, 'R', 'enable'),
(24, 1, 'VB.NET', 'enable'),
(25, 2, 'Drupal', 'enable'),
(26, 2, 'Joomla', 'enable'),
(27, 2, 'Wordpress', 'enable'),
(28, 3, 'Unix', 'enable'),
(29, 3, 'Linux', 'enable'),
(30, 3, 'MAC OS', 'enable'),
(31, 3, 'Windows', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `skill_type`
--

CREATE TABLE IF NOT EXISTS `skill_type` (
  `sktyp_id` int(255) NOT NULL AUTO_INCREMENT,
  `sktyp_name` varchar(255) NOT NULL,
  `sktyp_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`sktyp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skill_type`
--

INSERT INTO `skill_type` (`sktyp_id`, `sktyp_name`, `sktyp_status`) VALUES
(1, 'Technical', 'enable'),
(2, 'CMS', 'enable'),
(3, 'Operating Systems', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_num` int(255) NOT NULL,
  `stu_fname` varchar(255) NOT NULL,
  `stu_mname` varchar(255) NOT NULL,
  `stu_lname` varchar(255) NOT NULL,
  `stu_password` varchar(255) NOT NULL DEFAULT 'cd73502828457d15655bbd7a63fb0bc8',
  `stu_email` varchar(255) NOT NULL,
  `stu_gender` varchar(255) NOT NULL,
  `stu_nationality` varchar(255) NOT NULL,
  `stu_internship_status` varchar(255) NOT NULL,
  `stu_contact_no` varchar(255) NOT NULL,
  `stu_semester` int(255) NOT NULL,
  `stu_intake_year` int(255) NOT NULL,
  `stu_intake_term` varchar(255) NOT NULL COMMENT 'winter | summer | fall',
  `stu_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`stu_num`),
  UNIQUE KEY `stu_email` (`stu_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_num`, `stu_fname`, `stu_mname`, `stu_lname`, `stu_password`, `stu_email`, `stu_gender`, `stu_nationality`, `stu_internship_status`, `stu_contact_no`, `stu_semester`, `stu_intake_year`, `stu_intake_term`, `stu_status`) VALUES
(104503890, 'Atish', 'P', 'Lewate', 'cd73502828457d15655bbd7a63fb0bc8', 'atish@uwindsor.ca', 'male', 'Indian', 'Available', '1654789432', 1, 2016, 'winter', 'enable'),
(104512003, 'Aditya', 'K', 'Shah', 'cd73502828457d15655bbd7a63fb0bc8', 'aditya.shah7023@gmail.com', 'male', 'Indian', 'Hired', '1234567999', 1, 2016, 'winter', 'enable'),
(104512014, 'Palak', 'Ajay', 'Desai', 'cd73502828457d15655bbd7a63fb0bc8', 'desai11c@uwindsor.ca', 'female', 'indian', 'Available', '5197923092', 1, 2016, 'winter', 'enable'),
(104512398, 'Basir', 'M', 'Haider', 'cd73502828457d15655bbd7a63fb0bc8', 'basir@uwindsor.ca', 'male', 'Pakistani', 'Available', '4567894561', 2, 2015, 'winter', 'enable'),
(104546012, 'Javeria', 'T', 'Khan', 'cd73502828457d15655bbd7a63fb0bc8', 'khan11@uwindsor.ca', 'female', 'Indian', 'Available', '4563214789', 2, 2015, 'fall', 'enable'),
(104548020, 'Vinay', 'S', 'Saraf', 'cd73502828457d15655bbd7a63fb0bc8', 'saraf@uwindsor.ca', 'male', 'Indian', 'Available', '1654789456', 1, 2016, 'winter', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `student_certification`
--

CREATE TABLE IF NOT EXISTS `student_certification` (
  `stce_id` int(255) NOT NULL AUTO_INCREMENT,
  `stu_num` int(255) NOT NULL,
  `cert_id` int(255) NOT NULL,
  `stce_received_date` date NOT NULL,
  `stce_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`stce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_certification`
--

INSERT INTO `student_certification` (`stce_id`, `stu_num`, `cert_id`, `stce_received_date`, `stce_status`) VALUES
(1, 104512003, 1, '2015-04-21', 'enable'),
(2, 104512014, 1, '2015-11-18', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `student_education`
--

CREATE TABLE IF NOT EXISTS `student_education` (
  `sted_id` int(255) NOT NULL AUTO_INCREMENT,
  `stu_num` int(255) NOT NULL,
  `sted_degree_name` varchar(255) NOT NULL,
  `sted_uni_name` varchar(255) NOT NULL,
  `sted_uni_city` varchar(255) NOT NULL,
  `sted_gpa` float NOT NULL,
  `sted_major` varchar(255) NOT NULL,
  `sted_status` varchar(255) NOT NULL DEFAULT 'enable',
  `sted_start_year` int(255) NOT NULL,
  `sted_end_year` int(255) NOT NULL,
  PRIMARY KEY (`sted_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_education`
--

INSERT INTO `student_education` (`sted_id`, `stu_num`, `sted_degree_name`, `sted_uni_name`, `sted_uni_city`, `sted_gpa`, `sted_major`, `sted_status`, `sted_start_year`, `sted_end_year`) VALUES
(1, 104512003, 'Bachelor', 'Gujarat Technological University', 'Ahmedabad', 3.46, 'Computer Engineering', 'enable', 2010, 2014),
(2, 104512003, 'Master', 'University of Windsor', 'Windsor', 3.2, 'Applied Computing', 'enable', 2016, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `student_internship`
--

CREATE TABLE IF NOT EXISTS `student_internship` (
  `stin_id` int(255) NOT NULL AUTO_INCREMENT,
  `stjin_id` int(255) NOT NULL,
  `stin_assigned_date` date NOT NULL,
  `stin_start_date` date NOT NULL,
  `stin_end_date` date NOT NULL,
  `stin_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`stin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_internship`
--

INSERT INTO `student_internship` (`stin_id`, `stjin_id`, `stin_assigned_date`, `stin_start_date`, `stin_end_date`, `stin_status`) VALUES
(3, 7, '2016-04-11', '2016-04-15', '2016-04-30', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `student_job_interest`
--

CREATE TABLE IF NOT EXISTS `student_job_interest` (
  `stjin_id` int(255) NOT NULL AUTO_INCREMENT,
  `stu_num` int(255) NOT NULL,
  `job_id` int(255) NOT NULL,
  `stjin_verification_status` varchar(255) NOT NULL DEFAULT 'pending',
  `stjin_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`stjin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student_job_interest`
--

INSERT INTO `student_job_interest` (`stjin_id`, `stu_num`, `job_id`, `stjin_verification_status`, `stjin_status`) VALUES
(7, 104512003, 5, 'approved', 'enable'),
(8, 104512014, 5, 'approved', 'enable'),
(9, 104512014, 6, 'pending', 'enable'),
(10, 104512003, 6, 'pending', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `student_skill`
--

CREATE TABLE IF NOT EXISTS `student_skill` (
  `stsk_id` int(255) NOT NULL AUTO_INCREMENT,
  `stu_num` varchar(255) NOT NULL,
  `skill_id` int(255) NOT NULL,
  `stsk_points` int(255) NOT NULL,
  `stsk_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`stsk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `student_skill`
--

INSERT INTO `student_skill` (`stsk_id`, `stu_num`, `skill_id`, `stsk_points`, `stsk_status`) VALUES
(10, '104512003', 1, 1, 'enable'),
(11, '104512003', 2, 2, 'enable'),
(12, '104512003', 3, 1, 'enable'),
(13, '104512003', 4, 2, 'enable'),
(14, '104512003', 5, 3, 'enable'),
(15, '104512003', 6, 4, 'enable'),
(16, '104512003', 7, 3, 'enable'),
(18, '104512003', 9, 3, 'enable'),
(19, '104512003', 8, 2, 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `woex_id` int(255) NOT NULL AUTO_INCREMENT,
  `stu_num` int(255) NOT NULL,
  `woex_company_name` varchar(255) NOT NULL,
  `woex_company_location` varchar(255) NOT NULL,
  `woex_position` varchar(255) NOT NULL,
  `woex_duties` text NOT NULL,
  `woex_from_year` varchar(255) NOT NULL,
  `woex_to_year` varchar(255) NOT NULL,
  `woex_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`woex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`woex_id`, `stu_num`, `woex_company_name`, `woex_company_location`, `woex_position`, `woex_duties`, `woex_from_year`, `woex_to_year`, `woex_status`) VALUES
(1, 104512003, 'Dhyey InfoTech', 'Gandhinagar, India', '.Net Developer', 'Coding', '2-2014', '6-2015', 'enable');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
