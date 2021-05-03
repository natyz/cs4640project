-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 06:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wl9wgc`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL,
  `pic` varchar(255) DEFAULT 'https://64.media.tumblr.com/tumblr_md923niK1p1qc4uvwo1_400.gifv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sender`, `receiver`, `date`, `message`, `pic`) VALUES
('wan', 'nat', '2021-04-18', 'hi', 'https://64.media.tumblr.com/tumblr_md923niK1p1qc4uvwo1_400.gifv'),
('nat', 'wan', '2021-04-18', 'hi', 'https://i.imgur.com/0xxsg1R.gif?noredirect'),
('wan@wan.com', 'nat@nat.com', '2021-04-18', 'hi nat', 'https://i.pinimg.com/originals/9d/29/3a/9d293a6baece811a07a1c2f41d592065.gif'),
('nat@nat.com', 'wan@wan.com', '2021-04-18', 'hi wan', 'https://i.imgur.com/0xxsg1R.gif?noredirect'),
('wan@wan.com', 'nat@nat.com', '2021-04-19', 'askdljf', 'https://64.media.tumblr.com/tumblr_md923niK1p1qc4uvwo1_400.gifv'),
('nat@nat.com', 'wan@wan.com', '2021-04-19', 'sup wan', 'https://i.pinimg.com/originals/9d/29/3a/9d293a6baece811a07a1c2f41d592065.gif'),
('wan@wan.com', 'nat@nat.com', '2021-04-19', 'i hope you had a good day!', 'https://i.pinimg.com/originals/63/3e/8a/633e8a837a39bea065eb23613ce40b06.gif'),
('wan@wan.com', 'nat@nat.com', '2021-04-19', 'it\'s really sunny today!', 'https://media.tenor.com/images/83d6a5ed40a24164dfe1e4e19fad23d9/tenor.gif'),
('wan@wan.com', 'nat@nat.com', '2021-04-19', 'how are you doing', 'https://i.pinimg.com/originals/9d/29/3a/9d293a6baece811a07a1c2f41d592065.gif'),
('nat@nat.com', 'wan@wan.com', '2021-04-18', 'Hi HOw', 'https://3.bp.blogspot.com/-PrUzQ7DKWEA/XBHIrLkvDgI/AAAAAAAMVFk/f5KwHNedoawavVXxdUb12DpvycOamZzyACLcBGAs/s1600/AS0004704_12.gif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
