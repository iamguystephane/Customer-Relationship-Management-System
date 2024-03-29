-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 10:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminimage`
--

CREATE TABLE `adminimage` (
  `AID` int(11) NOT NULL,
  `ImgName` longtext DEFAULT NULL,
  `Comment` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminimage`
--

INSERT INTO `adminimage` (`AID`, `ImgName`, `Comment`) VALUES
(40, '../images/4b1fb-16507308445350-1920.jpg', 'first image from the project team'),
(41, '../images/home.png', 'This is the logo for your business sir. Is everything okay with it?'),
(42, '../images/home-removebg-preview.png', 'sure. background removed'),
(43, '../images/981-9813175_c-logo-c-programming-language-logo-removebg-preview.png', 'This is the homepage'),
(44, '../images/Gmail-removebg-preview.png', 'Okay, the color has been changed. Do you like it now?');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` varchar(50) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Country` varchar(40) DEFAULT NULL,
  `Country_Code` varchar(10) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`ID`, `Username`, `Email`, `Tel`, `Address`, `Gender`, `Country`, `Country_Code`, `Password`, `Status`) VALUES
(13, 'iamguystephane', 'gstephane138@gmail.com', '672280977', 'Mendong', 'Male', 'Cameroon', '237', 'cameroonsucks', 'admin'),
(14, 'forlemurostand', 'forlemu@gmail.com', '54545463213', 'Mendong', 'Male', 'Cameroon', '237', 'rostandbright', 'user'),
(15, 'romeobilly', 'romeobilly@yahoo.com', '670878485', 'Mendong', 'Male', 'The USA', '+1', 'romeobilly1234', 'user'),
(16, 'leotosam', 'leotossam@gmail.com', '6785163656', 'Soa', 'Male', 'Cameroon', '+237', 'leotossam1234', 'user'),
(17, 'barrin', 'barrin@gmail.com', '655584645454', 'vogt', 'Male', 'Canada', '+1', 'barrin1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `create_project`
--

CREATE TABLE `create_project` (
  `ID` int(11) NOT NULL,
  `Project_Name` varchar(1000) NOT NULL,
  `Project_Description` longtext NOT NULL,
  `Customer_Name` varchar(30) NOT NULL,
  `Status` varchar(30) DEFAULT 'Decline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_project`
--

INSERT INTO `create_project` (`ID`, `Project_Name`, `Project_Description`, `Customer_Name`, `Status`) VALUES
(73, 'Website Creation', 'I need a website that will manage my business with name and sdjakjlgioelsdggos', 'iamguysteph', 'Failed'),
(75, 'nljh lzjn', 'ljjbl', 'lmnlnjk', 'Failed'),
(78, 'xln cvncvl', 'vbhcvlb cvbhdvklbj', 'xnbnblknlk', 'Failed'),
(81, 'vsjhvlsjvs', 'sljvhslvhsdjvhdsl', 'nljxnv.jnvlj', 'Accept'),
(82, 'skjdvlsovj', 'shcvjhvshvsovhskvhskj', 'lxjch ljxhj', 'Failed'),
(83, 'Website Creation', 'Hello, vitna media, Please I would love for you to create a website for my business. The slogan for my business is \"eat until you can eat no more\". We offer home delivery services, so I would want a section for that included in the website where clients can request for food to be delivered to a specific location and we can either accept or deny their request', 'Awa & Sons Restaurant', 'Accept'),
(84, 'Logo & flyer Design', 'Hello, vitna media, We are a startup company and would love for our logo and flyers to be designed. We are a company incharge of home interior designs. We also decorate presents and make them presentable. We are literally into almost everything that can de decorated. Our slogan is \"We make thing look better\". We would like a logo with flyers. Thanks', 'Stephen Decor & co.', 'Failed'),
(85, 'Website Creation', 'Hello, vitna media, Please I would love for you to create a website for my business. The slogan for my business is \"eat until you can eat no more\". We offer home delivery services, so I would want a section for that included in the website where clients can request for food to be delivered to a specific location and we can either accept or deny their request', 'Awa & Sons Restaurant', 'Accept'),
(86, 'Logo & flyer Design', 'Hello, vitna media, We are a startup company and would love for our logo and flyers to be designed. We are a company incharge of home interior designs. We also decorate presents and make them presentable. We are literally into almost everything that can de decorated. Our slogan is \"We make thing look better\". We would like a logo with flyers. Thanks', 'Stephen Decor & co.', 'Decline');

-- --------------------------------------------------------

--
-- Table structure for table `customerimage`
--

CREATE TABLE `customerimage` (
  `CID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `ImgName` longtext DEFAULT NULL,
  `Comment` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerimage`
--

INSERT INTO `customerimage` (`CID`, `AID`, `ImgName`, `Comment`) VALUES
(18, 40, '../images/666918-ghost-of-tsushima-playstation-4-front-cover.jpeg', 'This is the first reply from the customer to the project teams first image'),
(19, 41, '', 'The logo seems nice, but please could you remove the white background?'),
(20, 42, '', 'I love it! Everything is now okay'),
(21, 43, '', 'I want you to change the color of the C'),
(22, 44, '', 'Everything is okay');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `Status`) VALUES
('barrin', 'barrin1234', 'admin'),
('forlemurostand', 'rostandbright', 'user'),
('iamguystephane', 'cameroonsucks', 'admin'),
('leotosam', 'leotossam1234', 'user'),
('romeobilly', 'romeobilly1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminimage`
--
ALTER TABLE `adminimage`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `create_project`
--
ALTER TABLE `create_project`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customerimage`
--
ALTER TABLE `customerimage`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminimage`
--
ALTER TABLE `adminimage`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `create_project`
--
ALTER TABLE `create_project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `customerimage`
--
ALTER TABLE `customerimage`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerimage`
--
ALTER TABLE `customerimage`
  ADD CONSTRAINT `customerimage_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `adminimage` (`AID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
