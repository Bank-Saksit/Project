-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 10:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillID` int(10) NOT NULL,
  `StudentID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `DateRegister` date NOT NULL,
  `DatePay` date NOT NULL,
  `Semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AcademicYear` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departmentinfo`
--

CREATE TABLE `departmentinfo` (
  `Department` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Faculty` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TelNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Website` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departmentinfo`
--

INSERT INTO `departmentinfo` (`Department`, `Faculty`, `Location`, `TelNumber`, `Email`, `Website`) VALUES
('วิศวกรรมคอมพิวเตอร์', 'วิศวกรรมศาสตร์', 'อาคารวิศววัฒนะ', '021233210', 'cpe@mail.kmutt.ac.th', 'cpe.kmutt.ac.th');

-- --------------------------------------------------------

--
-- Table structure for table `nodepartment`
--

CREATE TABLE `nodepartment` (
  `RecruitID` int(11) NOT NULL,
  `No` tinyint(1) NOT NULL,
  `Department` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parentinfo`
--

CREATE TABLE `parentinfo` (
  `ParentID` int(11) NOT NULL,
  `MobileNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TelNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `IDCardNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Race` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BloodGroup` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_student`
--

CREATE TABLE `parent_student` (
  `ParentID` int(11) NOT NULL,
  `StudentID` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitinfo`
--

CREATE TABLE `recruitinfo` (
  `RecruitID` int(11) NOT NULL,
  `RecruitPlanName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NoPass` tinyint(1) NOT NULL,
  `MobileNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TelNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SchoolID` int(10) NOT NULL,
  `EducationBackground` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Branch` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `SchoolGPAX` float NOT NULL,
  `Status` enum('รอจ่ายค่าสมัคร','รอสอบ','รอสัมภาษณ์','รอยืนยันสิทธิ์','รอจ่ายค่าเทอม','จ่ายค่าเทอมแล้ว','ไม่ผ่าน','สละสิทธิ์') COLLATE utf8_unicode_ci NOT NULL,
  `MovedUniversityName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `IDCardNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Race` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BloodGroup` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PostCode` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recruitinfo`
--

INSERT INTO `recruitinfo` (`RecruitID`, `RecruitPlanName`, `NoPass`, `MobileNumber`, `TelNumber`, `Email`, `SchoolID`, `EducationBackground`, `Branch`, `SchoolGPAX`, `Status`, `MovedUniversityName`, `IDCardNumber`, `Prefix`, `FirstName`, `LastName`, `Gender`, `DOB`, `Nationality`, `Race`, `Religion`, `BloodGroup`, `Address`, `Province`, `PostCode`) VALUES
(1, 'Clearing House', 1, '0961475555', '023455432', 'test01@hotmail.com', 1, 'ปวช', 'วิศวกรรม', 3.14, 'รอสัมภาษณ์', '', '1113322456654', 'นาย', 'ปิยะ', 'ไม่รู้', 'ชาย', '2000-05-23', 'ไทย', 'ไทย', 'คริสต์', 'A', 'ซักที่ในโลกเนี่ยแหละ', 'ไม่รู้', '11111'),
(2, 'เรียนดี', 3, '0945456666', '021233333', 'eiei@gmail.com', 2, 'มัธยมศึกษา', 'วิทย์-คณิต', 3.99, 'สละสิทธิ์', 'มหาลัยชื่อดังย่านบางเขน', '1122213564200', 'นางสาว', 'วีระ', 'สมความคิด', 'หญิง', '2001-05-15', 'จีน', 'อินเดีย', 'ซิกซ์', 'AB', 'ไม่ทราบได้', 'ไม่ทราบด้วย', '12332');

-- --------------------------------------------------------

--
-- Table structure for table `recruitplaninfo`
--

CREATE TABLE `recruitplaninfo` (
  `RecruitPlanName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Details` text COLLATE utf8_unicode_ci NOT NULL,
  `RecruitAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recruitplaninfo`
--

INSERT INTO `recruitplaninfo` (`RecruitPlanName`, `Details`, `RecruitAmount`) VALUES
('2B', '2B KMUTT', 30),
('Clearing House', 'เกือบจะแอดแล้วไง', 10),
('เรียนดี', 'เรียนดีไง', 50);

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `SchoolID` int(10) NOT NULL,
  `SchoolName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TelNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schoolinfo`
--

INSERT INTO `schoolinfo` (`SchoolID`, `SchoolName`, `Address`, `Province`, `Postcode`, `TelNumber`) VALUES
(1, 'อัสสัมชัญ สมุทรปราการ', 'หมู่บ้านทิพวัล ถนนเทพารักษ์', 'สมุทรปราการ', '10130', '020000000'),
(2, 'อมาตยกุล', 'ถนนพหลโยธิน แขวงอนุสาวรีย์ เขตบางเขน', 'กรุงเทพมหานคร', '10220', '021111111');

-- --------------------------------------------------------

--
-- Table structure for table `sectioninfo`
--

CREATE TABLE `sectioninfo` (
  `SubjectSectionID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SubjectID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `SectionNumber` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Semester` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `AcademicYear` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `SeatAmount` int(11) NOT NULL,
  `Day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Room` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ScoreGroup` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Score1` float NOT NULL,
  `Score2` float NOT NULL,
  `Score3` float NOT NULL,
  `Score4` float NOT NULL,
  `Score5` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `StaffID` int(11) NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MobileNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TelNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `EducationBackground` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ConsultantStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `IDCardNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Race` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BloodGroup` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `StudentID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `RecruitPlanName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Degree` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Course` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `MobileNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TelNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SchoolID` int(10) NOT NULL,
  `EducationBackground` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SchoolGPAX` float NOT NULL,
  `Status` enum('ปี1','ปี2','ปี3','ปี4','ปี5','ไล่ออก','ลาออก','จบการศึกษา','พักการเรียน') COLLATE utf8_unicode_ci NOT NULL,
  `IDCardNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Race` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BloodGroup` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`StudentID`, `Password`, `RecruitPlanName`, `Department`, `Degree`, `Course`, `MobileNumber`, `TelNumber`, `Email`, `SchoolID`, `EducationBackground`, `SchoolGPAX`, `Status`, `IDCardNumber`, `Prefix`, `FirstName`, `LastName`, `Gender`, `DOB`, `Nationality`, `Race`, `Religion`, `BloodGroup`, `Address`, `Province`, `Postcode`) VALUES
('59070501066', 'banana', 'เรียนดี', 'วิศวกรรมคอมพิวเตอร์', 'ปริญญาตรี', 'ปกติ', '0866666666', '022222222', 'waris.2541@mail.kmutt.ac.th', 2, 'มัธยมศึกษาปีที่6', 3.99, 'ปี2', '1111111111111', 'นาย', 'วริศ', 'หลิ่มโตประเสริฐ', 'มินเนี่ยน', '1998-02-14', 'มินเนี่ยน', 'มินเนี่ยน', 'มินเนี่ยน', 'B', 'หมอชิตมินเนี่ยน', 'กรุงเทพมหานคร', '10800'),
('59070501083', 'eiei', 'Clearing House', 'วิศวกรรมคอมพิวเตอร์', 'ปริญญาตรี', 'ปกติ', '0961933333', '023855555', 'thanapon.benz@mail.kmutt.ac.th', 1, 'มัธยมศึกษาปีที่6', 3.97, 'ปี2', '1119900000000', 'นาย', 'ธนพล', 'ปานะรัตน์', 'ชาย', '1997-12-16', 'ไทย', 'ไทย', 'พุทธ', '?', '54/2 หมู่3 บลาๆๆ', 'สมุทรปราการ', '10130');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `SubjectSectionID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `StudentID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `GPA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjectinfo`
--

CREATE TABLE `subjectinfo` (
  `SubjectID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `SubjectName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Credit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachersec`
--

CREATE TABLE `teachersec` (
  `StaffID` int(11) NOT NULL,
  `SubjectSectionID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ScoreGroup` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Score1` float NOT NULL,
  `Score2` float NOT NULL,
  `Score3` float NOT NULL,
  `Score4` float NOT NULL,
  `Score5` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `departmentinfo`
--
ALTER TABLE `departmentinfo`
  ADD PRIMARY KEY (`Department`);

--
-- Indexes for table `nodepartment`
--
ALTER TABLE `nodepartment`
  ADD PRIMARY KEY (`RecruitID`,`No`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `parentinfo`
--
ALTER TABLE `parentinfo`
  ADD PRIMARY KEY (`ParentID`);

--
-- Indexes for table `parent_student`
--
ALTER TABLE `parent_student`
  ADD PRIMARY KEY (`ParentID`,`StudentID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `recruitinfo`
--
ALTER TABLE `recruitinfo`
  ADD PRIMARY KEY (`RecruitID`),
  ADD KEY `RecruitPlanName` (`RecruitPlanName`),
  ADD KEY `SchoolID` (`SchoolID`);

--
-- Indexes for table `recruitplaninfo`
--
ALTER TABLE `recruitplaninfo`
  ADD PRIMARY KEY (`RecruitPlanName`);

--
-- Indexes for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  ADD PRIMARY KEY (`SchoolID`);

--
-- Indexes for table `sectioninfo`
--
ALTER TABLE `sectioninfo`
  ADD PRIMARY KEY (`SubjectSectionID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `RecruitPlanName` (`RecruitPlanName`),
  ADD KEY `Department` (`Department`),
  ADD KEY `SchoolID` (`SchoolID`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`SubjectSectionID`,`StudentID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `subjectinfo`
--
ALTER TABLE `subjectinfo`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `teachersec`
--
ALTER TABLE `teachersec`
  ADD PRIMARY KEY (`StaffID`,`SubjectSectionID`),
  ADD KEY `SubjectSectionID` (`SubjectSectionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BillID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parentinfo`
--
ALTER TABLE `parentinfo`
  MODIFY `ParentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitinfo`
--
ALTER TABLE `recruitinfo`
  MODIFY `RecruitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  MODIFY `SchoolID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `studentinfo` (`StudentID`);

--
-- Constraints for table `nodepartment`
--
ALTER TABLE `nodepartment`
  ADD CONSTRAINT `nodepartment_ibfk_2` FOREIGN KEY (`Department`) REFERENCES `departmentinfo` (`Department`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nodepartment_ibfk_3` FOREIGN KEY (`RecruitID`) REFERENCES `recruitinfo` (`RecruitID`) ON DELETE CASCADE;

--
-- Constraints for table `parent_student`
--
ALTER TABLE `parent_student`
  ADD CONSTRAINT `parent_student_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `studentinfo` (`StudentID`),
  ADD CONSTRAINT `parent_student_ibfk_3` FOREIGN KEY (`ParentID`) REFERENCES `parentinfo` (`ParentID`);

--
-- Constraints for table `recruitinfo`
--
ALTER TABLE `recruitinfo`
  ADD CONSTRAINT `recruitinfo_ibfk_1` FOREIGN KEY (`RecruitPlanName`) REFERENCES `recruitplaninfo` (`RecruitPlanName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recruitinfo_ibfk_2` FOREIGN KEY (`SchoolID`) REFERENCES `schoolinfo` (`SchoolID`);

--
-- Constraints for table `sectioninfo`
--
ALTER TABLE `sectioninfo`
  ADD CONSTRAINT `sectioninfo_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `subjectinfo` (`SubjectID`) ON DELETE CASCADE;

--
-- Constraints for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD CONSTRAINT `staffinfo_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `departmentinfo` (`Department`) ON UPDATE CASCADE;

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`RecruitPlanName`) REFERENCES `recruitplaninfo` (`RecruitPlanName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `studentinfo_ibfk_2` FOREIGN KEY (`Department`) REFERENCES `departmentinfo` (`Department`) ON UPDATE CASCADE,
  ADD CONSTRAINT `studentinfo_ibfk_3` FOREIGN KEY (`SchoolID`) REFERENCES `schoolinfo` (`SchoolID`);

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`SubjectSectionID`) REFERENCES `sectioninfo` (`SubjectSectionID`),
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `studentinfo` (`StudentID`);

--
-- Constraints for table `teachersec`
--
ALTER TABLE `teachersec`
  ADD CONSTRAINT `teachersec_ibfk_2` FOREIGN KEY (`SubjectSectionID`) REFERENCES `sectioninfo` (`SubjectSectionID`),
  ADD CONSTRAINT `teachersec_ibfk_3` FOREIGN KEY (`StaffID`) REFERENCES `staffinfo` (`StaffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
