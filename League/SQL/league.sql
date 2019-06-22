-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2017 at 08:03 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `league`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `userStatUpdate`(IN `WeekNumber` INT, IN `GameNumber` INT, IN `TeamName` VARCHAR(40), IN `TeamResult` CHAR(1), IN `GameYear` INT)
BEGIN
    	DECLARE Week INT;
        DECLARE Game INT;
        DECLARE Team VARCHAR(40);
        DECLARE Result CHAR(1);
        DECLARE Yr	INT;
        SET Week = WeekNumber;
        SET Game = GameNumber;
        SET Team = TeamName;
        SET Result = TeamResult;
        SET Yr = GameYear;
        
        UPDATE STATS
        SET STATS.StatResult = Result
        WHERE STATS.TeamName = Team AND STATS.WeekNumber = Week AND STATS.GameNumber = Game AND STATS.GameYear = Yr;
        
        INSERT INTO MY_TEST (testTeam, testWeek, testGame, testResult, testYear)
        VALUES (Team, Week, Game, Result, Yr);
        
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `GAME_SCHEDULE`
--

CREATE TABLE `GAME_SCHEDULE` (
  `WeekNumber` int(11) NOT NULL,
  `GameNumber` int(11) NOT NULL,
  `GameYear` int(11) NOT NULL,
  `GameDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GAME_SCHEDULE`
--

INSERT INTO `GAME_SCHEDULE` (`WeekNumber`, `GameNumber`, `GameYear`, `GameDate`) VALUES
(1, 1, 2017, '2017-09-07 17:30:00'),
(1, 2, 2017, '2017-09-10 10:00:00'),
(1, 3, 2017, '2017-09-10 10:00:00'),
(1, 4, 2017, '2017-09-10 10:00:00'),
(1, 5, 2017, '2017-09-10 10:00:00'),
(1, 6, 2017, '2017-09-10 10:00:00'),
(1, 7, 2017, '2017-09-10 10:00:00'),
(1, 8, 2017, '2017-09-10 10:00:00'),
(1, 9, 2017, '2017-09-10 10:00:00'),
(1, 10, 2017, '2017-09-10 10:00:00'),
(1, 11, 2017, '2017-09-10 13:05:00'),
(1, 12, 2017, '2017-09-10 13:25:00'),
(1, 13, 2017, '2017-09-10 13:25:00'),
(1, 14, 2017, '2017-09-10 17:30:00'),
(1, 15, 2017, '2017-09-11 16:10:00'),
(1, 16, 2017, '2017-09-11 19:20:00'),
(2, 1, 2017, '2017-09-14 17:25:00'),
(2, 2, 2017, '2017-09-17 10:00:00'),
(2, 3, 2017, '2017-09-17 10:00:00'),
(2, 4, 2017, '2017-09-17 10:00:00'),
(2, 5, 2017, '2017-09-17 10:00:00'),
(2, 6, 2017, '2017-09-17 10:00:00'),
(2, 7, 2017, '2017-09-17 10:00:00'),
(2, 8, 2017, '2017-09-17 10:00:00'),
(2, 9, 2017, '2017-09-17 10:00:00'),
(2, 10, 2017, '2017-09-17 13:05:00'),
(2, 11, 2017, '2017-09-17 13:05:00'),
(2, 12, 2017, '2017-09-17 13:25:00'),
(2, 13, 2017, '2017-09-17 13:25:00'),
(2, 14, 2017, '2017-09-17 13:25:00'),
(2, 15, 2017, '2017-09-17 17:30:00'),
(2, 16, 2017, '2017-09-18 17:30:00'),
(3, 1, 2017, '2017-09-21 17:25:00'),
(3, 2, 2017, '2017-09-24 06:30:00'),
(3, 3, 2017, '2017-09-24 10:00:00'),
(3, 4, 2017, '2017-09-24 10:00:00'),
(3, 5, 2017, '2017-09-24 10:00:00'),
(3, 6, 2017, '2017-09-24 10:00:00'),
(3, 7, 2017, '2017-09-24 10:00:00'),
(3, 8, 2017, '2017-09-24 10:00:00'),
(3, 9, 2017, '2017-09-24 10:00:00'),
(3, 10, 2017, '2017-09-24 10:00:00'),
(3, 11, 2017, '2017-09-24 10:00:00'),
(3, 12, 2017, '2017-09-24 13:05:00'),
(3, 13, 2017, '2017-09-24 13:25:00'),
(3, 14, 2017, '2017-09-24 13:25:00'),
(3, 15, 2017, '2017-09-24 17:30:00'),
(3, 16, 2017, '2017-09-25 17:30:00'),
(4, 1, 2017, '2017-09-28 17:25:00'),
(4, 2, 2017, '2017-10-01 06:30:00'),
(4, 3, 2017, '2017-10-01 10:00:00'),
(4, 4, 2017, '2017-10-01 10:00:00'),
(4, 5, 2017, '2017-10-01 10:00:00'),
(4, 6, 2017, '2017-10-01 10:00:00'),
(4, 7, 2017, '2017-10-01 10:00:00'),
(4, 8, 2017, '2017-10-01 10:00:00'),
(4, 9, 2017, '2017-10-01 10:00:00'),
(4, 10, 2017, '2017-10-01 10:00:00'),
(4, 11, 2017, '2017-10-01 13:05:00'),
(4, 12, 2017, '2017-10-01 13:05:00'),
(4, 13, 2017, '2017-10-01 13:05:00'),
(4, 14, 2017, '2017-10-01 13:25:00'),
(4, 15, 2017, '2017-10-01 17:30:00'),
(4, 16, 2017, '2017-10-02 17:30:00'),
(5, 1, 2017, '2017-10-05 17:25:00'),
(5, 2, 2017, '2017-10-08 10:00:00'),
(5, 3, 2017, '2017-10-08 10:00:00'),
(5, 4, 2017, '2017-10-08 10:00:00'),
(5, 5, 2017, '2017-10-08 10:00:00'),
(5, 6, 2017, '2017-10-08 10:00:00'),
(5, 7, 2017, '2017-10-08 10:00:00'),
(5, 8, 2017, '2017-10-08 10:00:00'),
(5, 9, 2017, '2017-10-08 10:00:00'),
(5, 10, 2017, '2017-10-08 13:05:00'),
(5, 11, 2017, '2017-10-08 13:05:00'),
(5, 12, 2017, '2017-10-08 13:25:00'),
(5, 13, 2017, '2017-10-08 17:30:00'),
(5, 14, 2017, '2017-10-09 17:30:00'),
(6, 1, 2017, '2017-10-12 17:25:00'),
(6, 2, 2017, '2017-10-15 10:00:00'),
(6, 3, 2017, '2017-10-15 10:00:00'),
(6, 4, 2017, '2017-10-15 10:00:00'),
(6, 5, 2017, '2017-10-15 10:00:00'),
(6, 6, 2017, '2017-10-15 10:00:00'),
(6, 7, 2017, '2017-10-15 10:00:00'),
(6, 8, 2017, '2017-10-15 10:00:00'),
(6, 9, 2017, '2017-10-15 13:05:00'),
(6, 10, 2017, '2017-10-15 13:05:00'),
(6, 11, 2017, '2017-10-15 13:25:00'),
(6, 12, 2017, '2017-10-15 13:25:00'),
(6, 13, 2017, '2017-10-15 17:30:00'),
(6, 14, 2017, '2017-10-16 17:30:00'),
(7, 1, 2017, '2017-10-19 17:25:00'),
(7, 2, 2017, '2017-10-22 10:00:00'),
(7, 3, 2017, '2017-10-22 10:00:00'),
(7, 4, 2017, '2017-10-22 10:00:00'),
(7, 5, 2017, '2017-10-22 10:00:00'),
(7, 6, 2017, '2017-10-22 10:00:00'),
(7, 7, 2017, '2017-10-22 10:00:00'),
(7, 8, 2017, '2017-10-22 10:00:00'),
(7, 9, 2017, '2017-10-22 10:00:00'),
(7, 10, 2017, '2017-10-22 10:00:00'),
(7, 11, 2017, '2017-10-22 13:05:00'),
(7, 12, 2017, '2017-10-22 13:25:00'),
(7, 13, 2017, '2017-10-22 13:25:00'),
(7, 14, 2017, '2017-10-22 17:30:00'),
(7, 15, 2017, '2017-10-23 17:30:00'),
(8, 1, 2017, '2017-10-26 17:25:00'),
(8, 2, 2017, '2017-10-29 06:30:00'),
(8, 3, 2017, '2017-10-29 10:00:00'),
(8, 4, 2017, '2017-10-29 10:00:00'),
(8, 5, 2017, '2017-10-29 10:00:00'),
(8, 6, 2017, '2017-10-29 10:00:00'),
(8, 7, 2017, '2017-10-29 10:00:00'),
(8, 8, 2017, '2017-10-29 10:00:00'),
(8, 9, 2017, '2017-10-29 10:00:00'),
(8, 10, 2017, '2017-10-29 13:05:00'),
(8, 11, 2017, '2017-10-29 13:25:00'),
(8, 12, 2017, '2017-10-29 17:30:00'),
(8, 13, 2017, '2017-10-30 17:30:00'),
(9, 1, 2017, '2017-11-02 17:25:00'),
(9, 2, 2017, '2017-11-05 10:00:00'),
(9, 3, 2017, '2017-11-05 10:00:00'),
(9, 4, 2017, '2017-11-05 10:00:00'),
(9, 5, 2017, '2017-11-05 10:00:00'),
(9, 6, 2017, '2017-11-05 10:00:00'),
(9, 7, 2017, '2017-11-05 10:00:00'),
(9, 8, 2017, '2017-11-05 10:00:00'),
(9, 9, 2017, '2017-11-05 13:05:00'),
(9, 10, 2017, '2017-11-05 13:05:00'),
(9, 11, 2017, '2017-11-05 13:25:00'),
(9, 12, 2017, '2017-11-05 17:30:00'),
(9, 13, 2017, '2017-11-06 17:30:00'),
(10, 1, 2017, '2017-11-09 17:25:00'),
(10, 2, 2017, '2017-11-12 10:00:00'),
(10, 3, 2017, '2017-11-12 10:00:00'),
(10, 4, 2017, '2017-11-12 10:00:00'),
(10, 5, 2017, '2017-11-12 10:00:00'),
(10, 6, 2017, '2017-11-12 10:00:00'),
(10, 7, 2017, '2017-11-12 10:00:00'),
(10, 8, 2017, '2017-11-12 10:00:00'),
(10, 9, 2017, '2017-11-12 10:00:00'),
(10, 10, 2017, '2017-11-12 13:05:00'),
(10, 11, 2017, '2017-11-12 13:25:00'),
(10, 12, 2017, '2017-11-12 13:25:00'),
(10, 13, 2017, '2017-11-12 17:30:00'),
(10, 14, 2017, '2017-11-13 17:30:00'),
(11, 1, 2017, '2017-11-16 17:25:00'),
(11, 2, 2017, '2017-11-19 10:00:00'),
(11, 3, 2017, '2017-11-19 10:00:00'),
(11, 4, 2017, '2017-11-19 10:00:00'),
(11, 5, 2017, '2017-11-19 10:00:00'),
(11, 6, 2017, '2017-11-19 10:00:00'),
(11, 7, 2017, '2017-11-19 10:00:00'),
(11, 8, 2017, '2017-11-19 10:00:00'),
(11, 9, 2017, '2017-11-19 13:05:00'),
(11, 10, 2017, '2017-11-19 13:25:00'),
(11, 11, 2017, '2017-11-19 13:25:00'),
(11, 12, 2017, '2017-11-19 17:30:00'),
(11, 13, 2017, '2017-11-20 17:30:00'),
(12, 1, 2017, '2017-11-23 09:30:00'),
(12, 2, 2017, '2017-11-23 13:30:00'),
(12, 3, 2017, '2017-11-23 17:30:00'),
(12, 4, 2017, '2017-11-26 10:00:00'),
(12, 5, 2017, '2017-11-26 10:00:00'),
(12, 6, 2017, '2017-11-26 10:00:00'),
(12, 7, 2017, '2017-11-26 10:00:00'),
(12, 8, 2017, '2017-11-26 10:00:00'),
(12, 9, 2017, '2017-11-26 10:00:00'),
(12, 10, 2017, '2017-11-26 10:00:00'),
(12, 11, 2017, '2017-11-26 13:05:00'),
(12, 12, 2017, '2017-11-26 13:05:00'),
(12, 13, 2017, '2017-11-26 13:25:00'),
(12, 14, 2017, '2017-11-26 13:25:00'),
(12, 15, 2017, '2017-11-26 17:30:00'),
(12, 16, 2017, '2017-11-27 17:30:00'),
(13, 1, 2017, '2017-11-30 17:25:00'),
(13, 2, 2017, '2017-12-03 10:00:00'),
(13, 3, 2017, '2017-12-03 10:00:00'),
(13, 4, 2017, '2017-12-03 10:00:00'),
(13, 5, 2017, '2017-12-03 10:00:00'),
(13, 6, 2017, '2017-12-03 10:00:00'),
(13, 7, 2017, '2017-12-03 10:00:00'),
(13, 8, 2017, '2017-12-03 10:00:00'),
(13, 9, 2017, '2017-12-03 10:00:00'),
(13, 10, 2017, '2017-12-03 10:00:00'),
(13, 11, 2017, '2017-12-03 10:00:00'),
(13, 12, 2017, '2017-12-03 13:05:00'),
(13, 13, 2017, '2017-12-03 13:25:00'),
(13, 14, 2017, '2017-12-03 13:25:00'),
(13, 15, 2017, '2017-12-03 17:30:00'),
(13, 16, 2017, '2017-12-04 17:30:00'),
(14, 1, 2017, '2017-12-07 17:25:00'),
(14, 2, 2017, '2017-12-10 10:00:00'),
(14, 3, 2017, '2017-12-10 10:00:00'),
(14, 4, 2017, '2017-12-10 10:00:00'),
(14, 5, 2017, '2017-12-10 10:00:00'),
(14, 6, 2017, '2017-12-10 10:00:00'),
(14, 7, 2017, '2017-12-10 10:00:00'),
(14, 8, 2017, '2017-12-10 10:00:00'),
(14, 9, 2017, '2017-12-10 10:00:00'),
(14, 10, 2017, '2017-12-10 13:05:00'),
(14, 11, 2017, '2017-12-10 13:05:00'),
(14, 12, 2017, '2017-12-10 13:05:00'),
(14, 13, 2017, '2017-12-10 13:25:00'),
(14, 14, 2017, '2017-12-10 13:25:00'),
(14, 15, 2017, '2017-12-10 17:30:00'),
(14, 16, 2017, '2017-12-11 17:30:00'),
(15, 1, 2017, '2017-12-14 17:25:00'),
(15, 2, 2017, '2017-12-16 13:30:00'),
(15, 3, 2017, '2017-12-16 17:25:00'),
(15, 4, 2017, '2017-12-17 10:00:00'),
(15, 5, 2017, '2017-12-17 10:00:00'),
(15, 6, 2017, '2017-12-17 10:00:00'),
(15, 7, 2017, '2017-12-17 10:00:00'),
(15, 8, 2017, '2017-12-17 10:00:00'),
(15, 9, 2017, '2017-12-17 10:00:00'),
(15, 10, 2017, '2017-12-17 10:00:00'),
(15, 11, 2017, '2017-12-17 10:00:00'),
(15, 12, 2017, '2017-12-17 13:05:00'),
(15, 13, 2017, '2017-12-17 13:25:00'),
(15, 14, 2017, '2017-12-17 13:25:00'),
(15, 15, 2017, '2017-12-17 17:30:00'),
(15, 16, 2017, '2017-12-18 17:30:00'),
(16, 1, 2017, '2017-12-23 13:30:00'),
(16, 2, 2017, '2017-12-23 17:30:00'),
(16, 3, 2017, '2017-12-24 10:00:00'),
(16, 4, 2017, '2017-12-24 10:00:00'),
(16, 5, 2017, '2017-12-24 10:00:00'),
(16, 6, 2017, '2017-12-24 10:00:00'),
(16, 7, 2017, '2017-12-24 10:00:00'),
(16, 8, 2017, '2017-12-24 10:00:00'),
(16, 9, 2017, '2017-12-24 10:00:00'),
(16, 10, 2017, '2017-12-24 10:00:00'),
(16, 11, 2017, '2017-12-24 10:00:00'),
(16, 12, 2017, '2017-12-24 13:05:00'),
(16, 13, 2017, '2017-12-24 13:25:00'),
(16, 14, 2017, '2017-12-24 13:25:00'),
(16, 15, 2017, '2017-12-25 13:30:00'),
(16, 16, 2017, '2017-12-25 17:30:00'),
(17, 1, 2017, '2017-12-31 10:00:00'),
(17, 2, 2017, '2017-12-31 10:00:00'),
(17, 3, 2017, '2017-12-31 10:00:00'),
(17, 4, 2017, '2017-12-31 10:00:00'),
(17, 5, 2017, '2017-12-31 10:00:00'),
(17, 6, 2017, '2017-12-31 10:00:00'),
(17, 7, 2017, '2017-12-31 10:00:00'),
(17, 8, 2017, '2017-12-31 10:00:00'),
(17, 9, 2017, '2017-12-31 10:00:00'),
(17, 10, 2017, '2017-12-31 10:00:00'),
(17, 11, 2017, '2017-12-31 10:00:00'),
(17, 12, 2017, '2017-12-31 10:00:00'),
(17, 13, 2017, '2017-12-31 13:25:00'),
(17, 14, 2017, '2017-12-31 13:25:00'),
(17, 15, 2017, '2017-12-31 13:25:00'),
(17, 16, 2017, '2017-12-31 13:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `MY_TEST`
--

CREATE TABLE `MY_TEST` (
  `testID` int(11) NOT NULL,
  `testTeam` varchar(40) DEFAULT NULL,
  `testWeek` int(11) DEFAULT NULL,
  `testGame` int(11) DEFAULT NULL,
  `testResult` varchar(2) DEFAULT NULL,
  `testYear` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MY_TEST`
--

INSERT INTO `MY_TEST` (`testID`, `testTeam`, `testWeek`, `testGame`, `testResult`, `testYear`) VALUES
(1, 'Texans', 6, 3, 'W', 2017),
(2, 'Texans', 6, 3, 'W', 2017),
(3, 'Texans', 6, 3, 'L', 2017),
(4, 'Texans', 6, 3, 'W', 2017),
(5, 'Browns', 6, 3, 'L', 2017),
(6, 'Eagles', 6, 1, 'W', 2017),
(7, 'Panthers', 6, 1, 'L', 2017),
(8, 'Bears', 6, 2, 'L', 2017),
(9, 'Ravens', 6, 2, 'W', 2017),
(10, 'Texans', 6, 3, 'W', 2017),
(11, 'Browns', 6, 3, 'L', 2017),
(12, 'Packers', 6, 4, 'W', 2017),
(13, 'Vikings', 6, 4, 'L', 2017),
(14, 'Lions', 6, 5, 'W', 2017),
(15, 'Saints', 6, 5, 'L', 2017),
(16, 'Dolphins', 6, 6, 'L', 2017),
(17, 'Falcons', 6, 6, 'W', 2017),
(18, 'Jets', 6, 7, 'W', 2017),
(19, 'Patriots', 6, 7, 'L', 2017),
(20, '49ers', 6, 8, 'L', 2017),
(21, 'Redskins', 6, 8, 'W', 2017),
(22, 'Buccaneers', 6, 9, 'W', 2017),
(23, 'Cardinals', 6, 9, 'L', 2017),
(24, 'Jaguars', 6, 10, 'L', 2017),
(25, 'Rams', 6, 10, 'W', 2017),
(26, 'Chiefs', 6, 11, 'W', 2017),
(27, 'Steelers', 6, 11, 'L', 2017),
(28, 'Chargers', 6, 12, 'W', 2017),
(29, 'Raiders', 6, 12, 'L', 2017),
(30, 'Broncos', 6, 13, 'W', 2017),
(31, 'Giants', 6, 13, 'L', 2017),
(32, 'Colts', 6, 14, 'L', 2017),
(33, 'Titans', 6, 14, 'W', 2017),
(34, 'Panthers', 6, 1, 'L', 2017),
(35, 'Eagles', 6, 1, 'W', 2017),
(36, 'Panthers', 6, 1, 'L', 2017),
(37, 'Eagles', 6, 1, 'W', 2017),
(38, 'Panthers', 6, 1, 'L', 2017),
(39, 'Eagles', 6, 1, 'W', 2017),
(40, 'Ravens', 6, 2, 'L', 2017),
(41, 'Bears', 6, 2, 'W', 2017),
(42, 'Panthers', 6, 1, 'L', 2017),
(43, 'Panthers', 6, 1, 'L', 2017),
(44, 'Eagles', 6, 1, 'W', 2017),
(45, 'Ravens', 6, 2, 'L', 2017),
(46, 'Bears', 6, 2, 'W', 2017),
(47, 'Texans', 6, 3, 'W', 2017),
(48, 'Browns', 6, 3, 'L', 2017),
(49, 'Vikings', 6, 4, 'W', 2017),
(50, 'Packers', 6, 4, 'L', 2017),
(51, 'Saints', 6, 5, 'W', 2017),
(52, 'Lions', 6, 5, 'L', 2017),
(53, 'Falcons', 6, 6, 'L', 2017),
(54, 'Dolphins', 6, 6, 'W', 2017),
(55, 'Jets', 6, 7, 'L', 2017),
(56, 'Patriots', 6, 7, 'W', 2017),
(57, 'Redskins', 6, 8, 'W', 2017),
(58, '49ers', 6, 8, 'L', 2017),
(59, 'Cardinals', 6, 9, 'W', 2017),
(60, 'Buccaneers', 6, 9, 'L', 2017),
(61, 'Jaguars', 6, 10, 'L', 2017),
(62, 'Rams', 6, 10, 'W', 2017),
(63, 'Chiefs', 6, 11, 'L', 2017),
(64, 'Steelers', 6, 11, 'W', 2017),
(65, 'Raiders', 6, 12, 'L', 2017),
(66, 'Chargers', 6, 12, 'W', 2017),
(67, 'Broncos', 6, 13, 'L', 2017),
(68, 'Giants', 6, 13, 'W', 2017),
(69, 'Panthers', 6, 1, 'L', 2017),
(70, 'Eagles', 6, 1, 'W', 2017),
(71, 'Ravens', 6, 2, 'L', 2017),
(72, 'Bears', 6, 2, 'W', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `PLAYER`
--

CREATE TABLE `PLAYER` (
  `playerID` int(11) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(35) NOT NULL,
  `Email` text NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `UserPassword` text NOT NULL,
  `UserTeam` varchar(50) DEFAULT NULL,
  `JoinDate` date DEFAULT '2010-08-01'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PLAYER`
--

INSERT INTO `PLAYER` (`playerID`, `FirstName`, `LastName`, `Email`, `UserName`, `UserPassword`, `UserTeam`, `JoinDate`) VALUES
(1, 'Broc', 'Campbell', 'broccampbell@gmail.com', 'B_rockn_u', '$2y$10$cNUu.Zmw6hEZUQv9BPMzOOUoizCsjhLg3TEUeIaoR.IMvaipzU3du', NULL, '2017-04-25'),
(2, 'John', 'Doe', 'johndoe@yahoo.com', 'Gonna Win', '$2y$10$hm7vu2Qu7rrNtz9U/61MS.qHN2NeLJTu6u2G0AxgHzzSksPuZq4J2', NULL, '2017-04-26'),
(3, 'Jane', 'Doe', 'janedoe@gmail.com', 'Imagonnawin', '$2y$10$6Scm8HbgvrGPahn17veIeOAkbQriKYa6q0L.O1Ny8sj6OhW5D2gzu', NULL, '2017-04-26'),
(4, 'Hugh', 'Doe', 'hdoe@gmail.com', 'beatsme', '$2y$10$hPNLaBIFseica5OpBtAvLu4zpawm6pRjIH29EP9z.oVUgoF2FFu.a', NULL, '2017-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `STATS`
--

CREATE TABLE `STATS` (
  `StatID` int(11) NOT NULL,
  `playerID` int(11) DEFAULT NULL,
  `WeekNumber` int(11) DEFAULT NULL,
  `GameNumber` int(11) DEFAULT NULL,
  `TeamName` varchar(40) DEFAULT NULL,
  `StatResult` enum('W','L') DEFAULT 'L',
  `GameYear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STATS`
--

INSERT INTO `STATS` (`StatID`, `playerID`, `WeekNumber`, `GameNumber`, `TeamName`, `StatResult`, `GameYear`) VALUES
(1, 1, 6, 1, 'Eagles', 'W', 2017),
(2, 1, 6, 2, 'Ravens', 'L', 2017),
(3, 1, 6, 3, 'Texans', 'W', 2017),
(4, 1, 6, 4, 'Packers', 'L', 2017),
(5, 1, 6, 5, 'Lions', 'L', 2017),
(6, 1, 6, 6, 'Falcons', 'L', 2017),
(7, 1, 6, 7, 'Patriots', 'W', 2017),
(8, 1, 6, 8, 'Redskins', 'W', 2017),
(9, 1, 6, 9, 'Buccaneers', 'L', 2017),
(10, 1, 6, 10, 'Jaguars', 'L', 2017),
(11, 1, 6, 11, 'Chiefs', 'L', 2017),
(12, 1, 6, 12, 'Raiders', 'L', 2017),
(13, 1, 6, 13, 'Broncos', 'L', 2017),
(14, 1, 6, 14, 'Titans', 'W', 2017),
(15, 3, 6, 1, 'Panthers', 'L', 2017),
(16, 3, 6, 2, 'Ravens', 'L', 2017),
(17, 3, 6, 3, 'Texans', 'W', 2017),
(18, 3, 6, 4, 'Vikings', 'W', 2017),
(19, 3, 6, 5, 'Saints', 'W', 2017),
(20, 3, 6, 6, 'Dolphins', 'W', 2017),
(21, 3, 6, 7, 'Patriots', 'W', 2017),
(22, 3, 6, 8, 'Redskins', 'W', 2017),
(23, 3, 6, 9, 'Cardinals', 'W', 2017),
(24, 3, 6, 10, 'Rams', 'W', 2017),
(25, 3, 6, 11, 'Chiefs', 'L', 2017),
(26, 3, 6, 12, 'Chargers', 'W', 2017),
(27, 3, 6, 13, 'Broncos', 'L', 2017),
(28, 3, 6, 14, 'Colts', 'L', 2017),
(113, 4, 6, 1, 'No Pick', 'L', 2017),
(114, 4, 6, 2, 'Ravens', 'L', 2017),
(115, 4, 6, 3, 'Texans', 'W', 2017),
(116, 4, 6, 4, 'Vikings', 'W', 2017),
(117, 4, 6, 5, 'Lions', 'L', 2017),
(118, 4, 6, 6, 'Falcons', 'L', 2017),
(119, 4, 6, 7, 'Jets', 'L', 2017),
(120, 4, 6, 8, 'Redskins', 'W', 2017),
(121, 4, 6, 9, 'Cardinals', 'W', 2017),
(122, 4, 6, 10, 'Rams', 'W', 2017),
(123, 4, 6, 11, 'Steelers', 'W', 2017),
(124, 4, 6, 12, 'Raiders', 'L', 2017),
(125, 4, 6, 13, 'Broncos', 'L', 2017),
(126, 4, 6, 14, 'Colts', 'L', 2017),
(127, 2, 6, 1, 'No Pick', 'L', 2017),
(128, 2, 6, 2, 'Bears', 'W', 2017),
(129, 2, 6, 3, 'Browns', 'L', 2017),
(130, 2, 6, 4, 'Vikings', 'W', 2017),
(131, 2, 6, 5, 'Saints', 'W', 2017),
(132, 2, 6, 6, 'Dolphins', 'W', 2017),
(133, 2, 6, 7, 'Patriots', 'W', 2017),
(134, 2, 6, 8, '49ers', 'L', 2017),
(135, 2, 6, 9, 'Cardinals', 'W', 2017),
(136, 2, 6, 10, 'Rams', 'W', 2017),
(137, 2, 6, 11, 'Chiefs', 'L', 2017),
(138, 2, 6, 12, 'Raiders', 'L', 2017),
(139, 2, 6, 13, 'Giants', 'W', 2017),
(140, 2, 6, 14, 'Colts', 'L', 2017),
(155, 1, 5, 1, 'No Pick', 'L', 2017),
(156, 1, 5, 2, 'No Pick', 'L', 2017),
(157, 1, 5, 3, 'No Pick', 'L', 2017),
(158, 1, 5, 4, 'No Pick', 'L', 2017),
(159, 1, 5, 5, 'No Pick', 'L', 2017),
(160, 1, 5, 6, 'No Pick', 'L', 2017),
(161, 1, 5, 7, 'No Pick', 'L', 2017),
(162, 1, 5, 8, 'No Pick', 'L', 2017),
(163, 1, 5, 9, 'No Pick', 'L', 2017),
(164, 1, 5, 10, 'No Pick', 'L', 2017),
(165, 1, 5, 11, 'No Pick', 'L', 2017),
(166, 1, 5, 12, 'No Pick', 'L', 2017),
(167, 1, 5, 13, 'No Pick', 'L', 2017),
(168, 1, 5, 14, 'No Pick', 'L', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `TEAM`
--

CREATE TABLE `TEAM` (
  `TeamCity` varchar(40) NOT NULL,
  `TeamName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TEAM`
--

INSERT INTO `TEAM` (`TeamCity`, `TeamName`) VALUES
('San Francisco', '49ers'),
('Chicago', 'Bears'),
('Cincinnati', 'Bengals'),
('Buffalo', 'Bills'),
('Denver', 'Broncos'),
('Cleveland', 'Browns'),
('Tampa Bay', 'Buccaneers'),
('Arizona', 'Cardinals'),
('San Diego', 'Chargers'),
('Kansas City', 'Chiefs'),
('Indianapolis', 'Colts'),
('Dallas', 'Cowboys'),
('Miami', 'Dolphins'),
('Philadelphia', 'Eagles'),
('Atlanta', 'Falcons'),
('New York', 'Giants'),
('Jacksonville', 'Jaguars'),
('New York', 'Jets'),
('Detriot', 'Lions'),
('LoserCity', 'No Pick'),
('Green Bay', 'Packers'),
('Carolina', 'Panthers'),
('New England', 'Patriots'),
('Oakland', 'Raiders'),
('Los Angeles', 'Rams'),
('Baltimore', 'Ravens'),
('Washington', 'Redskins'),
('New Orleans', 'Saints'),
('Seattle', 'Seahawks'),
('Pittsburgh', 'Steelers'),
('Houston', 'Texans'),
('Tennessee', 'Titans'),
('Minnesota', 'Vikings');

-- --------------------------------------------------------

--
-- Table structure for table `TEAM_SCHEDULE`
--

CREATE TABLE `TEAM_SCHEDULE` (
  `Team` varchar(40) NOT NULL,
  `TeamStatus` varchar(8) NOT NULL,
  `TeamScore` int(11) DEFAULT '0',
  `TeamResult` char(1) DEFAULT 'U',
  `WeekNumber` int(11) NOT NULL DEFAULT '0',
  `GameNumber` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TEAM_SCHEDULE`
--

INSERT INTO `TEAM_SCHEDULE` (`Team`, `TeamStatus`, `TeamScore`, `TeamResult`, `WeekNumber`, `GameNumber`) VALUES
('49ers', 'Home', 0, 'U', 1, 13),
('49ers', 'Away', 0, 'U', 2, 12),
('49ers', 'Home', 0, 'U', 3, 1),
('49ers', 'Away', 0, 'U', 4, 13),
('49ers', 'Away', 0, 'U', 5, 4),
('49ers', 'Away', 24, 'L', 6, 8),
('49ers', 'Home', 0, 'U', 7, 11),
('49ers', 'Away', 0, 'U', 8, 5),
('49ers', 'Home', 0, 'U', 9, 9),
('49ers', 'Home', 0, 'U', 10, 12),
('49ers', 'Home', 0, 'U', 12, 12),
('49ers', 'Away', 0, 'U', 13, 9),
('49ers', 'Away', 0, 'U', 14, 6),
('49ers', 'Home', 0, 'U', 15, 13),
('49ers', 'Home', 0, 'U', 16, 12),
('49ers', 'Away', 0, 'U', 17, 15),
('Bears', 'Home', 0, 'U', 1, 8),
('Bears', 'Away', 0, 'U', 2, 3),
('Bears', 'Home', 0, 'U', 3, 8),
('Bears', 'Away', 0, 'U', 4, 1),
('Bears', 'Home', 0, 'U', 5, 14),
('Bears', 'Away', 27, 'W', 6, 2),
('Bears', 'Home', 0, 'U', 7, 7),
('Bears', 'Away', 0, 'U', 8, 6),
('Bears', 'Home', 0, 'U', 10, 2),
('Bears', 'Home', 0, 'U', 11, 6),
('Bears', 'Away', 0, 'U', 12, 9),
('Bears', 'Home', 0, 'U', 13, 9),
('Bears', 'Away', 0, 'U', 14, 8),
('Bears', 'Away', 0, 'U', 15, 2),
('Bears', 'Home', 0, 'U', 16, 6),
('Bears', 'Away', 0, 'U', 17, 9),
('Bengals', 'Home', 0, 'U', 1, 9),
('Bengals', 'Home', 0, 'U', 2, 1),
('Bengals', 'Away', 0, 'U', 3, 13),
('Bengals', 'Away', 0, 'U', 4, 9),
('Bengals', 'Home', 0, 'U', 5, 6),
('Bengals', 'Away', 0, 'U', 7, 3),
('Bengals', 'Home', 0, 'U', 8, 9),
('Bengals', 'Away', 0, 'U', 9, 3),
('Bengals', 'Away', 0, 'U', 10, 9),
('Bengals', 'Away', 0, 'U', 11, 10),
('Bengals', 'Home', 0, 'U', 12, 6),
('Bengals', 'Home', 0, 'U', 13, 16),
('Bengals', 'Home', 0, 'U', 14, 8),
('Bengals', 'Away', 0, 'U', 15, 8),
('Bengals', 'Home', 0, 'U', 16, 3),
('Bengals', 'Away', 0, 'U', 17, 2),
('Bills', 'Home', 0, 'U', 1, 2),
('Bills', 'Away', 0, 'U', 2, 9),
('Bills', 'Home', 0, 'U', 3, 6),
('Bills', 'Away', 0, 'U', 4, 7),
('Bills', 'Away', 0, 'U', 5, 6),
('Bills', 'Home', 0, 'U', 7, 2),
('Bills', 'Home', 0, 'U', 8, 8),
('Bills', 'Away', 0, 'U', 9, 1),
('Bills', 'Home', 0, 'U', 10, 6),
('Bills', 'Away', 0, 'U', 11, 9),
('Bills', 'Away', 0, 'U', 12, 4),
('Bills', 'Home', 0, 'U', 13, 8),
('Bills', 'Home', 0, 'U', 14, 2),
('Bills', 'Home', 0, 'U', 15, 7),
('Bills', 'Away', 0, 'U', 16, 5),
('Bills', 'Away', 0, 'U', 17, 8),
('Broncos', 'Home', 0, 'U', 1, 16),
('Broncos', 'Home', 0, 'U', 2, 14),
('Broncos', 'Away', 0, 'U', 3, 6),
('Broncos', 'Home', 0, 'U', 4, 14),
('Broncos', 'Home', 10, 'L', 6, 13),
('Broncos', 'Away', 0, 'U', 7, 13),
('Broncos', 'Away', 0, 'U', 8, 13),
('Broncos', 'Away', 0, 'U', 9, 7),
('Broncos', 'Home', 0, 'U', 10, 13),
('Broncos', 'Home', 0, 'U', 11, 10),
('Broncos', 'Away', 0, 'U', 12, 14),
('Broncos', 'Away', 0, 'U', 13, 6),
('Broncos', 'Home', 0, 'U', 14, 11),
('Broncos', 'Away', 0, 'U', 15, 1),
('Broncos', 'Away', 0, 'U', 16, 9),
('Broncos', 'Home', 0, 'U', 17, 14),
('Browns', 'Home', 0, 'U', 1, 10),
('Browns', 'Away', 0, 'U', 2, 2),
('Browns', 'Away', 0, 'U', 3, 3),
('Browns', 'Home', 0, 'U', 4, 9),
('Browns', 'Home', 0, 'U', 5, 2),
('Browns', 'Away', 17, 'L', 6, 3),
('Browns', 'Home', 0, 'U', 7, 8),
('Browns', 'Home', 0, 'U', 8, 2),
('Browns', 'Away', 0, 'U', 10, 3),
('Browns', 'Home', 0, 'U', 11, 2),
('Browns', 'Away', 0, 'U', 12, 6),
('Browns', 'Away', 0, 'U', 13, 12),
('Browns', 'Home', 0, 'U', 14, 7),
('Browns', 'Home', 0, 'U', 15, 5),
('Browns', 'Away', 0, 'U', 16, 6),
('Browns', 'Away', 0, 'U', 17, 5),
('Buccaneers', 'Away', 0, 'U', 1, 5),
('Buccaneers', 'Home', 0, 'U', 2, 3),
('Buccaneers', 'Away', 0, 'U', 3, 10),
('Buccaneers', 'Home', 0, 'U', 4, 12),
('Buccaneers', 'Home', 0, 'U', 5, 1),
('Buccaneers', 'Away', 33, 'L', 6, 9),
('Buccaneers', 'Away', 0, 'U', 7, 2),
('Buccaneers', 'Home', 0, 'U', 8, 4),
('Buccaneers', 'Away', 0, 'U', 9, 4),
('Buccaneers', 'Home', 0, 'U', 10, 7),
('Buccaneers', 'Away', 0, 'U', 12, 7),
('Buccaneers', 'Away', 0, 'U', 13, 10),
('Buccaneers', 'Home', 0, 'U', 14, 3),
('Buccaneers', 'Home', 0, 'U', 15, 16),
('Buccaneers', 'Away', 0, 'U', 16, 7),
('Buccaneers', 'Home', 0, 'U', 17, 4),
('Cardinals', 'Away', 0, 'U', 1, 7),
('Cardinals', 'Away', 0, 'U', 2, 8),
('Cardinals', 'Home', 0, 'U', 3, 16),
('Cardinals', 'Home', 0, 'U', 4, 13),
('Cardinals', 'Away', 0, 'U', 5, 9),
('Cardinals', 'Home', 38, 'W', 6, 9),
('Cardinals', 'Away', 0, 'U', 7, 6),
('Cardinals', 'Away', 0, 'U', 9, 9),
('Cardinals', 'Home', 0, 'U', 10, 1),
('Cardinals', 'Away', 0, 'U', 11, 4),
('Cardinals', 'Home', 0, 'U', 12, 13),
('Cardinals', 'Home', 0, 'U', 13, 14),
('Cardinals', 'Home', 0, 'U', 14, 12),
('Cardinals', 'Away', 0, 'U', 15, 9),
('Cardinals', 'Home', 0, 'U', 16, 14),
('Cardinals', 'Away', 0, 'U', 17, 16),
('Chargers', 'Away', 0, 'U', 1, 16),
('Chargers', 'Home', 0, 'U', 2, 11),
('Chargers', 'Home', 0, 'U', 3, 14),
('Chargers', 'Home', 0, 'U', 4, 11),
('Chargers', 'Away', 0, 'U', 5, 7),
('Chargers', 'Away', 17, 'W', 6, 12),
('Chargers', 'Home', 0, 'U', 7, 13),
('Chargers', 'Away', 0, 'U', 8, 7),
('Chargers', 'Away', 0, 'U', 10, 5),
('Chargers', 'Home', 0, 'U', 11, 9),
('Chargers', 'Away', 0, 'U', 12, 2),
('Chargers', 'Home', 0, 'U', 13, 12),
('Chargers', 'Home', 0, 'U', 14, 10),
('Chargers', 'Away', 0, 'U', 15, 3),
('Chargers', 'Away', 0, 'U', 16, 11),
('Chargers', 'Home', 0, 'U', 17, 13),
('Chiefs', 'Away', 0, 'U', 1, 1),
('Chiefs', 'Home', 0, 'U', 2, 6),
('Chiefs', 'Away', 0, 'U', 3, 14),
('Chiefs', 'Home', 0, 'U', 4, 16),
('Chiefs', 'Away', 0, 'U', 5, 13),
('Chiefs', 'Home', 13, 'L', 6, 11),
('Chiefs', 'Away', 0, 'U', 7, 1),
('Chiefs', 'Home', 0, 'U', 8, 13),
('Chiefs', 'Away', 0, 'U', 9, 11),
('Chiefs', 'Away', 0, 'U', 11, 8),
('Chiefs', 'Home', 0, 'U', 12, 4),
('Chiefs', 'Away', 0, 'U', 13, 4),
('Chiefs', 'Home', 0, 'U', 14, 4),
('Chiefs', 'Home', 0, 'U', 15, 3),
('Chiefs', 'Home', 0, 'U', 16, 4),
('Chiefs', 'Away', 0, 'U', 17, 14),
('Colts', 'Away', 0, 'U', 1, 11),
('Colts', 'Home', 0, 'U', 2, 8),
('Colts', 'Home', 0, 'U', 3, 3),
('Colts', 'Away', 0, 'U', 4, 15),
('Colts', 'Home', 0, 'U', 5, 4),
('Colts', 'Away', 21, 'L', 6, 14),
('Colts', 'Home', 0, 'U', 7, 10),
('Colts', 'Away', 0, 'U', 8, 9),
('Colts', 'Away', 0, 'U', 9, 2),
('Colts', 'Home', 0, 'U', 10, 4),
('Colts', 'Home', 0, 'U', 12, 5),
('Colts', 'Away', 0, 'U', 13, 11),
('Colts', 'Away', 0, 'U', 14, 2),
('Colts', 'Home', 0, 'U', 15, 1),
('Colts', 'Away', 0, 'U', 16, 1),
('Colts', 'Home', 0, 'U', 17, 7),
('Cowboys', 'Home', 0, 'U', 1, 14),
('Cowboys', 'Away', 0, 'U', 2, 14),
('Cowboys', 'Away', 0, 'U', 3, 16),
('Cowboys', 'Home', 0, 'U', 4, 10),
('Cowboys', 'Home', 0, 'U', 5, 12),
('Cowboys', 'Away', 0, 'U', 7, 11),
('Cowboys', 'Away', 0, 'U', 8, 11),
('Cowboys', 'Home', 0, 'U', 9, 11),
('Cowboys', 'Away', 0, 'U', 10, 11),
('Cowboys', 'Home', 0, 'U', 11, 12),
('Cowboys', 'Home', 0, 'U', 12, 2),
('Cowboys', 'Home', 0, 'U', 13, 1),
('Cowboys', 'Away', 0, 'U', 14, 13),
('Cowboys', 'Away', 0, 'U', 15, 15),
('Cowboys', 'Home', 0, 'U', 16, 13),
('Cowboys', 'Away', 0, 'U', 17, 12),
('Dolphins', 'Home', 0, 'U', 1, 5),
('Dolphins', 'Away', 0, 'U', 2, 11),
('Dolphins', 'Away', 0, 'U', 3, 5),
('Dolphins', 'Home', 0, 'U', 4, 2),
('Dolphins', 'Home', 0, 'U', 5, 5),
('Dolphins', 'Away', 20, 'W', 6, 6),
('Dolphins', 'Home', 0, 'U', 7, 5),
('Dolphins', 'Away', 0, 'U', 8, 1),
('Dolphins', 'Home', 0, 'U', 9, 12),
('Dolphins', 'Away', 0, 'U', 10, 14),
('Dolphins', 'Away', 0, 'U', 12, 8),
('Dolphins', 'Home', 0, 'U', 13, 6),
('Dolphins', 'Home', 0, 'U', 14, 16),
('Dolphins', 'Away', 0, 'U', 15, 7),
('Dolphins', 'Away', 0, 'U', 16, 4),
('Dolphins', 'Home', 0, 'U', 17, 8),
('Eagles', 'Away', 0, 'U', 1, 3),
('Eagles', 'Away', 0, 'U', 2, 6),
('Eagles', 'Home', 0, 'U', 3, 4),
('Eagles', 'Away', 0, 'U', 4, 11),
('Eagles', 'Home', 0, 'U', 5, 9),
('Eagles', 'Away', 28, 'W', 6, 1),
('Eagles', 'Home', 0, 'U', 7, 15),
('Eagles', 'Home', 0, 'U', 8, 5),
('Eagles', 'Home', 0, 'U', 9, 7),
('Eagles', 'Away', 0, 'U', 11, 12),
('Eagles', 'Home', 0, 'U', 12, 9),
('Eagles', 'Away', 0, 'U', 13, 15),
('Eagles', 'Away', 0, 'U', 14, 14),
('Eagles', 'Away', 0, 'U', 15, 10),
('Eagles', 'Home', 0, 'U', 16, 16),
('Eagles', 'Home', 0, 'U', 17, 12),
('Falcons', 'Away', 0, 'U', 1, 8),
('Falcons', 'Home', 0, 'U', 2, 15),
('Falcons', 'Away', 0, 'U', 3, 9),
('Falcons', 'Home', 0, 'U', 4, 7),
('Falcons', 'Home', 17, 'L', 6, 6),
('Falcons', 'Away', 0, 'U', 7, 14),
('Falcons', 'Away', 0, 'U', 8, 3),
('Falcons', 'Away', 0, 'U', 9, 6),
('Falcons', 'Home', 0, 'U', 10, 11),
('Falcons', 'Away', 0, 'U', 11, 13),
('Falcons', 'Home', 0, 'U', 12, 7),
('Falcons', 'Home', 0, 'U', 13, 2),
('Falcons', 'Home', 0, 'U', 14, 1),
('Falcons', 'Away', 0, 'U', 15, 16),
('Falcons', 'Away', 0, 'U', 16, 8),
('Falcons', 'Home', 0, 'U', 17, 1),
('Giants', 'Away', 0, 'U', 1, 14),
('Giants', 'Home', 0, 'U', 2, 16),
('Giants', 'Away', 0, 'U', 3, 4),
('Giants', 'Away', 0, 'U', 4, 12),
('Giants', 'Home', 0, 'U', 5, 7),
('Giants', 'Away', 23, 'W', 6, 13),
('Giants', 'Home', 0, 'U', 7, 12),
('Giants', 'Home', 0, 'U', 9, 5),
('Giants', 'Away', 0, 'U', 10, 12),
('Giants', 'Home', 0, 'U', 11, 8),
('Giants', 'Away', 0, 'U', 12, 3),
('Giants', 'Away', 0, 'U', 13, 13),
('Giants', 'Home', 0, 'U', 14, 13),
('Giants', 'Home', 0, 'U', 15, 10),
('Giants', 'Away', 0, 'U', 16, 14),
('Giants', 'Home', 0, 'U', 17, 11),
('Jaguars', 'Away', 0, 'U', 1, 6),
('Jaguars', 'Home', 0, 'U', 2, 7),
('Jaguars', 'Home', 0, 'U', 3, 2),
('Jaguars', 'Away', 0, 'U', 4, 4),
('Jaguars', 'Away', 0, 'U', 5, 8),
('Jaguars', 'Home', 17, 'L', 6, 10),
('Jaguars', 'Away', 0, 'U', 7, 10),
('Jaguars', 'Home', 0, 'U', 9, 3),
('Jaguars', 'Home', 0, 'U', 10, 5),
('Jaguars', 'Away', 0, 'U', 11, 2),
('Jaguars', 'Away', 0, 'U', 12, 13),
('Jaguars', 'Home', 0, 'U', 13, 11),
('Jaguars', 'Home', 0, 'U', 14, 5),
('Jaguars', 'Home', 0, 'U', 15, 4),
('Jaguars', 'Away', 0, 'U', 16, 12),
('Jaguars', 'Away', 0, 'U', 17, 3),
('Jets', 'Away', 0, 'U', 1, 2),
('Jets', 'Away', 0, 'U', 2, 10),
('Jets', 'Home', 0, 'U', 3, 5),
('Jets', 'Home', 0, 'U', 4, 4),
('Jets', 'Away', 0, 'U', 5, 2),
('Jets', 'Home', 17, 'L', 6, 7),
('Jets', 'Away', 0, 'U', 7, 5),
('Jets', 'Home', 0, 'U', 8, 3),
('Jets', 'Home', 0, 'U', 9, 1),
('Jets', 'Away', 0, 'U', 10, 7),
('Jets', 'Home', 0, 'U', 12, 10),
('Jets', 'Home', 0, 'U', 13, 4),
('Jets', 'Away', 0, 'U', 14, 11),
('Jets', 'Away', 0, 'U', 15, 11),
('Jets', 'Home', 0, 'U', 16, 11),
('Jets', 'Away', 0, 'U', 17, 10),
('Lions', 'Home', 0, 'U', 1, 7),
('Lions', 'Away', 0, 'U', 2, 16),
('Lions', 'Home', 0, 'U', 3, 9),
('Lions', 'Away', 0, 'U', 4, 6),
('Lions', 'Home', 0, 'U', 5, 3),
('Lions', 'Away', 38, 'L', 6, 5),
('Lions', 'Home', 0, 'U', 8, 12),
('Lions', 'Away', 0, 'U', 9, 13),
('Lions', 'Home', 0, 'U', 10, 3),
('Lions', 'Away', 0, 'U', 11, 6),
('Lions', 'Home', 0, 'U', 12, 1),
('Lions', 'Away', 0, 'U', 13, 7),
('Lions', 'Away', 0, 'U', 14, 3),
('Lions', 'Home', 0, 'U', 15, 2),
('Lions', 'Away', 0, 'U', 16, 3),
('Lions', 'Home', 0, 'U', 17, 6),
('Packers', 'Home', 0, 'U', 1, 12),
('Packers', 'Away', 0, 'U', 2, 15),
('Packers', 'Home', 0, 'U', 3, 13),
('Packers', 'Home', 0, 'U', 4, 1),
('Packers', 'Away', 0, 'U', 5, 12),
('Packers', 'Away', 10, 'L', 6, 4),
('Packers', 'Home', 0, 'U', 7, 9),
('Packers', 'Home', 0, 'U', 9, 13),
('Packers', 'Away', 0, 'U', 10, 2),
('Packers', 'Home', 0, 'U', 11, 3),
('Packers', 'Away', 0, 'U', 12, 15),
('Packers', 'Home', 0, 'U', 13, 10),
('Packers', 'Away', 0, 'U', 14, 7),
('Packers', 'Away', 0, 'U', 15, 6),
('Packers', 'Home', 0, 'U', 16, 2),
('Packers', 'Away', 0, 'U', 17, 6),
('Panthers', 'Away', 0, 'U', 1, 13),
('Panthers', 'Home', 0, 'U', 2, 9),
('Panthers', 'Home', 0, 'U', 3, 7),
('Panthers', 'Away', 0, 'U', 4, 5),
('Panthers', 'Away', 0, 'U', 5, 3),
('Panthers', 'Home', 23, 'L', 6, 1),
('Panthers', 'Away', 0, 'U', 7, 7),
('Panthers', 'Away', 0, 'U', 8, 4),
('Panthers', 'Home', 0, 'U', 9, 6),
('Panthers', 'Home', 0, 'U', 10, 14),
('Panthers', 'Away', 0, 'U', 12, 10),
('Panthers', 'Away', 0, 'U', 13, 5),
('Panthers', 'Home', 0, 'U', 14, 9),
('Panthers', 'Home', 0, 'U', 15, 6),
('Panthers', 'Home', 0, 'U', 16, 7),
('Panthers', 'Away', 0, 'U', 17, 1),
('Patriots', 'Home', 0, 'U', 1, 1),
('Patriots', 'Away', 0, 'U', 2, 5),
('Patriots', 'Home', 0, 'U', 3, 11),
('Patriots', 'Home', 0, 'U', 4, 5),
('Patriots', 'Away', 0, 'U', 5, 1),
('Patriots', 'Away', 24, 'W', 6, 7),
('Patriots', 'Home', 0, 'U', 7, 14),
('Patriots', 'Home', 0, 'U', 8, 7),
('Patriots', 'Away', 0, 'U', 10, 13),
('Patriots', 'Away', 0, 'U', 11, 11),
('Patriots', 'Home', 0, 'U', 12, 8),
('Patriots', 'Away', 0, 'U', 13, 8),
('Patriots', 'Away', 0, 'U', 14, 16),
('Patriots', 'Away', 0, 'U', 15, 14),
('Patriots', 'Home', 0, 'U', 16, 5),
('Patriots', 'Home', 0, 'U', 17, 10),
('Raiders', 'Away', 0, 'U', 1, 4),
('Raiders', 'Home', 0, 'U', 2, 10),
('Raiders', 'Away', 0, 'U', 3, 15),
('Raiders', 'Away', 0, 'U', 4, 14),
('Raiders', 'Home', 0, 'U', 5, 11),
('Raiders', 'Home', 16, 'L', 6, 12),
('Raiders', 'Home', 0, 'U', 7, 1),
('Raiders', 'Away', 0, 'U', 8, 8),
('Raiders', 'Away', 0, 'U', 9, 12),
('Raiders', 'Home', 0, 'U', 11, 11),
('Raiders', 'Home', 0, 'U', 12, 14),
('Raiders', 'Home', 0, 'U', 13, 13),
('Raiders', 'Away', 0, 'U', 14, 4),
('Raiders', 'Home', 0, 'U', 15, 15),
('Raiders', 'Away', 0, 'U', 16, 16),
('Raiders', 'Away', 0, 'U', 17, 13),
('Rams', 'Home', 0, 'U', 1, 11),
('Rams', 'Home', 0, 'U', 2, 13),
('Rams', 'Away', 0, 'U', 3, 1),
('Rams', 'Away', 0, 'U', 4, 10),
('Rams', 'Home', 0, 'U', 5, 10),
('Rams', 'Away', 27, 'W', 6, 10),
('Rams', 'Home', 0, 'U', 7, 6),
('Rams', 'Away', 0, 'U', 9, 5),
('Rams', 'Home', 0, 'U', 10, 10),
('Rams', 'Away', 0, 'U', 11, 5),
('Rams', 'Home', 0, 'U', 12, 11),
('Rams', 'Away', 0, 'U', 13, 14),
('Rams', 'Home', 0, 'U', 14, 14),
('Rams', 'Away', 0, 'U', 15, 12),
('Rams', 'Away', 0, 'U', 16, 10),
('Rams', 'Home', 0, 'U', 17, 15),
('Ravens', 'Away', 0, 'U', 1, 9),
('Ravens', 'Home', 0, 'U', 2, 2),
('Ravens', 'Away', 0, 'U', 3, 2),
('Ravens', 'Home', 0, 'U', 4, 8),
('Ravens', 'Away', 0, 'U', 5, 11),
('Ravens', 'Home', 24, 'L', 6, 2),
('Ravens', 'Away', 0, 'U', 7, 4),
('Ravens', 'Home', 0, 'U', 8, 1),
('Ravens', 'Away', 0, 'U', 9, 8),
('Ravens', 'Away', 0, 'U', 11, 3),
('Ravens', 'Home', 0, 'U', 12, 16),
('Ravens', 'Home', 0, 'U', 13, 7),
('Ravens', 'Away', 0, 'U', 14, 15),
('Ravens', 'Away', 0, 'U', 15, 5),
('Ravens', 'Home', 0, 'U', 16, 1),
('Ravens', 'Home', 0, 'U', 17, 2),
('Redskins', 'Home', 0, 'U', 1, 3),
('Redskins', 'Away', 0, 'U', 2, 13),
('Redskins', 'Home', 0, 'U', 3, 15),
('Redskins', 'Away', 0, 'U', 4, 16),
('Redskins', 'Home', 26, 'W', 6, 8),
('Redskins', 'Away', 0, 'U', 7, 15),
('Redskins', 'Home', 0, 'U', 8, 11),
('Redskins', 'Away', 0, 'U', 9, 10),
('Redskins', 'Home', 0, 'U', 10, 8),
('Redskins', 'Away', 0, 'U', 11, 7),
('Redskins', 'Home', 0, 'U', 12, 3),
('Redskins', 'Away', 0, 'U', 13, 1),
('Redskins', 'Away', 0, 'U', 14, 10),
('Redskins', 'Home', 0, 'U', 15, 9),
('Redskins', 'Home', 0, 'U', 16, 9),
('Redskins', 'Away', 0, 'U', 17, 11),
('Saints', 'Away', 0, 'U', 1, 15),
('Saints', 'Home', 0, 'U', 2, 5),
('Saints', 'Away', 0, 'U', 3, 7),
('Saints', 'Away', 0, 'U', 4, 2),
('Saints', 'Home', 52, 'W', 6, 5),
('Saints', 'Away', 0, 'U', 7, 9),
('Saints', 'Home', 0, 'U', 8, 6),
('Saints', 'Home', 0, 'U', 9, 4),
('Saints', 'Away', 0, 'U', 10, 6),
('Saints', 'Home', 0, 'U', 11, 7),
('Saints', 'Away', 0, 'U', 12, 11),
('Saints', 'Home', 0, 'U', 13, 5),
('Saints', 'Away', 0, 'U', 14, 1),
('Saints', 'Home', 0, 'U', 15, 11),
('Saints', 'Home', 0, 'U', 16, 8),
('Saints', 'Away', 0, 'U', 17, 4),
('Seahawks', 'Away', 0, 'U', 1, 12),
('Seahawks', 'Home', 0, 'U', 2, 12),
('Seahawks', 'Away', 0, 'U', 3, 12),
('Seahawks', 'Home', 0, 'U', 4, 15),
('Seahawks', 'Away', 0, 'U', 5, 10),
('Seahawks', 'Away', 0, 'U', 7, 12),
('Seahawks', 'Home', 0, 'U', 8, 10),
('Seahawks', 'Home', 0, 'U', 9, 10),
('Seahawks', 'Away', 0, 'U', 10, 1),
('Seahawks', 'Home', 0, 'U', 11, 13),
('Seahawks', 'Away', 0, 'U', 12, 12),
('Seahawks', 'Home', 0, 'U', 13, 15),
('Seahawks', 'Away', 0, 'U', 14, 5),
('Seahawks', 'Home', 0, 'U', 15, 12),
('Seahawks', 'Away', 0, 'U', 16, 13),
('Seahawks', 'Home', 0, 'U', 17, 16),
('Steelers', 'Away', 0, 'U', 1, 10),
('Steelers', 'Home', 0, 'U', 2, 4),
('Steelers', 'Away', 0, 'U', 3, 8),
('Steelers', 'Away', 0, 'U', 4, 8),
('Steelers', 'Home', 0, 'U', 5, 8),
('Steelers', 'Away', 19, 'W', 6, 11),
('Steelers', 'Home', 0, 'U', 7, 3),
('Steelers', 'Away', 0, 'U', 8, 12),
('Steelers', 'Away', 0, 'U', 10, 4),
('Steelers', 'Home', 0, 'U', 11, 1),
('Steelers', 'Home', 0, 'U', 12, 15),
('Steelers', 'Away', 0, 'U', 13, 16),
('Steelers', 'Home', 0, 'U', 14, 15),
('Steelers', 'Home', 0, 'U', 15, 14),
('Steelers', 'Away', 0, 'U', 16, 15),
('Steelers', 'Home', 0, 'U', 17, 5),
('Texans', 'Home', 0, 'U', 1, 6),
('Texans', 'Away', 0, 'U', 2, 1),
('Texans', 'Away', 0, 'U', 3, 11),
('Texans', 'Home', 0, 'U', 4, 3),
('Texans', 'Home', 0, 'U', 5, 13),
('Texans', 'Home', 33, 'W', 6, 3),
('Texans', 'Away', 0, 'U', 8, 10),
('Texans', 'Home', 0, 'U', 9, 2),
('Texans', 'Away', 0, 'U', 10, 10),
('Texans', 'Home', 0, 'U', 11, 4),
('Texans', 'Away', 0, 'U', 12, 16),
('Texans', 'Away', 0, 'U', 13, 3),
('Texans', 'Home', 0, 'U', 14, 6),
('Texans', 'Away', 0, 'U', 15, 4),
('Texans', 'Home', 0, 'U', 16, 15),
('Texans', 'Away', 0, 'U', 17, 7),
('Titans', 'Home', 0, 'U', 1, 4),
('Titans', 'Away', 0, 'U', 2, 7),
('Titans', 'Home', 0, 'U', 3, 12),
('Titans', 'Away', 0, 'U', 4, 3),
('Titans', 'Away', 0, 'U', 5, 5),
('Titans', 'Home', 24, 'W', 6, 14),
('Titans', 'Away', 0, 'U', 7, 8),
('Titans', 'Home', 0, 'U', 9, 8),
('Titans', 'Home', 0, 'U', 10, 9),
('Titans', 'Away', 0, 'U', 11, 1),
('Titans', 'Away', 0, 'U', 12, 5),
('Titans', 'Home', 0, 'U', 13, 3),
('Titans', 'Away', 0, 'U', 14, 12),
('Titans', 'Away', 0, 'U', 15, 13),
('Titans', 'Home', 0, 'U', 16, 10),
('Titans', 'Home', 0, 'U', 17, 3),
('Vikings', 'Home', 0, 'U', 1, 15),
('Vikings', 'Away', 0, 'U', 2, 4),
('Vikings', 'Home', 0, 'U', 3, 10),
('Vikings', 'Home', 0, 'U', 4, 6),
('Vikings', 'Away', 0, 'U', 5, 14),
('Vikings', 'Home', 23, 'W', 6, 4),
('Vikings', 'Home', 0, 'U', 7, 4),
('Vikings', 'Away', 0, 'U', 8, 2),
('Vikings', 'Away', 0, 'U', 10, 8),
('Vikings', 'Home', 0, 'U', 11, 5),
('Vikings', 'Away', 0, 'U', 12, 1),
('Vikings', 'Away', 0, 'U', 13, 2),
('Vikings', 'Away', 0, 'U', 14, 9),
('Vikings', 'Home', 0, 'U', 15, 8),
('Vikings', 'Away', 0, 'U', 16, 2),
('Vikings', 'Home', 0, 'U', 17, 9);

--
-- Triggers `TEAM_SCHEDULE`
--
DELIMITER $$
CREATE TRIGGER `TeamResultUpdate` AFTER UPDATE ON `team_schedule`
 FOR EACH ROW BEGIN
    
    	DECLARE currDate DATE;
        DECLARE currMonth INT;

        DECLARE currYear INT;
        SET currDate = NOW();
        SET currMonth = MONTH(currDate);
        SET currYear = YEAR(currDate);
        
        IF currMonth = 1 AND currYear = 2018 THEN SET currYear = 2017;
        END IF;
    
    	CALL userStatUpdate(old.WeekNumber, old.GameNumber, old.Team, new.TeamResult, currYear);
    
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GAME_SCHEDULE`
--
ALTER TABLE `GAME_SCHEDULE`
  ADD PRIMARY KEY (`WeekNumber`,`GameNumber`);

--
-- Indexes for table `MY_TEST`
--
ALTER TABLE `MY_TEST`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `PLAYER`
--
ALTER TABLE `PLAYER`
  ADD PRIMARY KEY (`playerID`);

--
-- Indexes for table `STATS`
--
ALTER TABLE `STATS`
  ADD PRIMARY KEY (`StatID`),
  ADD KEY `fk_StatPlayer` (`playerID`),
  ADD KEY `fk_StatTeam` (`TeamName`),
  ADD KEY `WeekStats` (`WeekNumber`);

--
-- Indexes for table `TEAM`
--
ALTER TABLE `TEAM`
  ADD PRIMARY KEY (`TeamName`);

--
-- Indexes for table `TEAM_SCHEDULE`
--
ALTER TABLE `TEAM_SCHEDULE`
  ADD PRIMARY KEY (`Team`,`WeekNumber`,`GameNumber`),
  ADD KEY `WeekNum_GameNum_fk` (`WeekNumber`,`GameNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MY_TEST`
--
ALTER TABLE `MY_TEST`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `PLAYER`
--
ALTER TABLE `PLAYER`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `STATS`
--
ALTER TABLE `STATS`
  MODIFY `StatID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `STATS`
--
ALTER TABLE `STATS`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`playerID`) REFERENCES `PLAYER` (`playerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stats_ibfk_3` FOREIGN KEY (`TeamName`) REFERENCES `TEAM` (`TeamName`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `WeekStats` FOREIGN KEY (`WeekNumber`) REFERENCES `GAME_SCHEDULE` (`WeekNumber`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `TEAM_SCHEDULE`
--
ALTER TABLE `TEAM_SCHEDULE`
  ADD CONSTRAINT `team_schedule_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `TEAM` (`TeamName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_schedule_ibfk_2` FOREIGN KEY (`WeekNumber`, `GameNumber`) REFERENCES `GAME_SCHEDULE` (`WeekNumber`, `GameNumber`) ON DELETE CASCADE ON UPDATE CASCADE;