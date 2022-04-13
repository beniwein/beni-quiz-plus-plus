-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 13, 2022 at 08:08 AM
-- Server version: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `Text2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsCorrectAnswer` int NOT NULL,
  `QuestionId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`Text2`, `IsCorrectAnswer`, `QuestionId`) VALUES
('Kamel', 1, 1),
('Elefant', 0, 1),
('Pferd', 0, 1),
('Nordpol', 0, 2),
('Südpol', 1, 2),
('Wal', 1, 3),
('Krokodil', 0, 3),
('Hund', 1, 3),
('Hase', 1, 3),
('Osterhase', 1, 3),
('Digital wallet', 0, 4),
('Mining', 0, 4),
('Blockchain', 1, 4),
('Token', 0, 4),
('Organize cloud storage', 1, 5),
('Remove all files from the cloud', 0, 5),
('Print a file from the cloud', 0, 5),
('Delete a cloud service account', 0, 5),
('USA', 0, 6),
('China', 0, 6),
('Finnland', 1, 6),
('Malaysia', 0, 6),
('Logistics, shipping car parts (Toyota)', 1, 15),
('Substitute for postal addresses (Japan Post)', 0, 15),
('Encryption of prescriptions in pharmacies', 0, 15),
('Menu in a take-away sushi restaurant', 0, 15),
('waterproof so you can talk on the phone in the shower', 1, 16),
('Barrier-free, with Braille on the keys, for the blind', 0, 16),
('configured as a remote control for TV and garage to save space', 0, 16),
('Equipped with sensors to send earthquake alerts', 0, 16),
('1995', 0, 17),
('2000', 0, 17),
('2007', 1, 17),
('2010', 0, 17),
('Bill Gates', 0, 18),
('Ada Lovelace', 1, 18),
('26', 0, 19),
('139', 0, 19),
('436', 0, 19),
('countless', 1, 19),
('Firefox', 0, 20),
('Microsoft Edge', 1, 20),
('DuckDuckGo', 0, 20),
('Internet Explorer', 0, 20),
('Apple II', 0, 21),
('IBM PC (5150)', 0, 21),
('Commodore 64', 1, 21),
('Sinclair ZX Spectrum', 0, 21),
('iPhone', 0, 22),
('Nokia 9000 Communicator', 1, 22),
('Motorolla 7500', 0, 22),
('Blackberry 850', 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `ID` int NOT NULL,
  `Text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`ID`, `Text`, `Image`, `Type`) VALUES
(1, 'Welches Tier hat zwei Höcker?', 'animal01', 'SINGLE'),
(2, 'Wo leben Eisbären?', 'animal02', 'SINGLE'),
(3, 'Was ist ein Säugetier?', 'animal03', 'MULTIPLE'),
(4, 'What technology is used to record cryptocurrency transactions?', 'NULL', 'SINGLE'),
(5, 'What does it mean to uncloud?', 'NULL', 'SINGLE'),
(6, 'In which country is cellphone throwing an official sport?', 'NULL', 'SINGLE'),
(15, 'The QR code was invented in Japan. What were QR codes first used for?', 'NULL', 'SINGLE'),
(16, 'Most cell phones in Japan are also..., - why?', 'NULL', 'SINGLE'),
(17, 'What year was the iPhone released?', 'NULL', 'SINGLE'),
(18, 'Who was the first programmer?', 'NULL', 'SINGLE'),
(19, 'How many computer languages are in use?', 'NULL', 'SINGLE'),
(20, 'What was the fastest growing web browser in 2020?', 'NULL', 'SINGLE'),
(21, 'Which model of computer is the best selling of all time?', 'NULL', 'SINGLE'),
(22, 'What was the first mobile phone with internet connectivity?', 'NULL', 'SINGLE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answers`
--
ALTER TABLE `Answers`
  ADD KEY `Answers_ibfk_1` (`QuestionId`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `Answers_ibfk_1` FOREIGN KEY (`QuestionId`) REFERENCES `Questions` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
