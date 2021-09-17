-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 07:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calattendence` (IN `stdID` INT)  begin
	declare attend int default 0 ;
	declare grd decimal(5,2) default 0 ;
	declare total_grd decimal(5,2) default 0 ;
	set attend = cntattendence(stdID) ;
	set grd = avgrade(stdID);
	set total_grd = totalgrade(stdID);	
	update student_record
	set totalgrade = total_grd and totalattendence = attend and grade = grd 
	where student_record.studentID = stdID ;
	end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `avgrade` (`stdID` INT) RETURNS DECIMAL(5,2) begin 
	declare cnt decimal(5,2) default 0.0 ;
	select coalesce(avg(grade),0) into cnt 
	from grade 
	group by student_id
	having grade.student_id = stdID;
	return cnt;
	end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cntattendence` (`stdID` INT) RETURNS INT(11) begin 
	declare cnt int default 0;
	select count(*) into cnt 
	from attendence 
	where status = 'p'
	group by stdid 
	having attendence.stdid = stdID;
	return cnt;
	end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `totalgrade` (`stdID` INT) RETURNS DECIMAL(5,2) begin 
	declare cnt decimal(5,2) default 0.0 ;
	select coalesce(sum(grade),0) into cnt 
	from grade 
	group by student_id 
	having grade.student_id = stdID;
	return cnt;
	end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'lamia@gmail.com', 'com'),
(2, 'ehsan@gmail.com', 'com'),
(3, 'diptubhaiya@gmail.com', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `stdid` int(11) NOT NULL,
  `clsid` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('p','a') DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`stdid`, `clsid`, `date`, `status`) VALUES
(1, 1, '2021-09-01', 'a'),
(1, 1, '2021-09-07', 'p'),
(1, 1, '2021-09-15', 'a'),
(1, 1, '2021-09-29', 'p'),
(2, 1, '2021-09-07', 'p'),
(2, 1, '2021-09-14', 'p'),
(2, 1, '2021-09-21', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classTeacherID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classTeacherID`) VALUES
(7, 1),
(2, 2),
(1, 3),
(3, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `student` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `grd` enum('A','A-','B','B-','C','D','I') DEFAULT 'I',
  `cgpa` decimal(4,2) NOT NULL DEFAULT 0.00,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`student`, `id`, `grd`, `cgpa`, `date`) VALUES
(1, 17, 'A', '4.00', '2021-09-16'),
(1, 18, 'A', '4.00', '2021-09-16'),
(1, 19, 'A', '4.00', '2021-09-16'),
(1, 20, 'A-', '3.70', '2021-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `content`, `date`) VALUES
(1, 'Jani na ki dibo ', '2021-09-09'),
(2, 'pre advising koy din por shesh . . . . .', '2021-09-09'),
(3, 'Last Day of project submission is on 19th September', '2021-09-14'),
(4, '16th September HIS103 exam', '2021-09-14'),
(5, '20th September a exam shesh', '2021-09-14'),
(6, '17 september 11:20 --> math exam', '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `day1` enum('SUN','MON','TUES','WED','THURS') NOT NULL,
  `day2` enum('SUN','MON','TUES','WED','THURS') NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `cid`, `subid`, `day1`, `day2`, `time`) VALUES
(18, 1, 9, 'SUN', 'MON', '10:00:00'),
(17, 1, 5, 'SUN', 'THURS', '09:10:00'),
(19, 1, 2, 'TUES', 'WED', '09:00:00'),
(20, 1, 3, 'TUES', 'WED', '10:00:00'),
(21, 2, 5, 'SUN', 'MON', '09:00:00'),
(22, 2, 9, 'SUN', 'MON', '10:00:00'),
(23, 2, 2, 'TUES', 'WED', '09:00:00'),
(24, 2, 3, 'TUES', 'WED', '10:00:00'),
(25, 3, 5, 'SUN', 'MON', '09:00:00'),
(26, 3, 9, 'SUN', 'MON', '10:00:00'),
(27, 3, 2, 'TUES', 'WED', '09:00:00'),
(28, 3, 3, 'TUES', 'WED', '10:00:00'),
(2, 7, 3, 'SUN', 'TUES', '10:00:00'),
(1, 7, 13, 'SUN', 'TUES', '09:00:00'),
(35, 7, 2, 'MON', 'WED', '09:00:00'),
(36, 7, 9, 'MON', 'WED', '00:00:00');

--
-- Triggers `schedule`
--
DELIMITER $$
CREATE TRIGGER `addsubjectinclass` AFTER INSERT ON `schedule` FOR EACH ROW begin
 insert into subjectsinclass(id,classID,subjectID) 
 values(new.id,new.cid , new.subid) ;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatesubjectinclass` AFTER UPDATE ON `schedule` FOR EACH ROW begin
 if old.subid <> new.subid then 
 delete from subjectsinclass where (subjectsinclass.id = old.id);
 delete from grade where (grade.id = old.id);
 insert into subjectsinclass(id,classID,subjectID) 
 values(old.id,old.cid , new.subid) ;
 end if;
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `current_class` int(11) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(32) NOT NULL,
  `gender` enum('Male','Female','Others') DEFAULT 'Others',
  `password` varchar(30) NOT NULL,
  `address` varchar(120) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `current_class`, `phone`, `email`, `gender`, `password`, `address`, `dob`) VALUES
(1, 'Lamia Munira', 1, '0123456234', 'lamia@ieee.com', 'Female', 'oky', 'London', '2001-09-24'),
(2, 'Maisha', 1, '0123456', 'amin@ieee.com', 'Others', 'oky', 'London', '2001-05-30'),
(3, 'Omi', 1, '0123456', 'omi@ieee.com', 'Others', 'oky', 'London', '2001-11-01'),
(4, 'Tasnia', 1, '0123456', 'orni@ieee.com', 'Others', 'oky', 'London', '2001-06-15'),
(5, 'Taqi', 2, '0123456', 'taqi@ieee.com', 'Others', 'oky', 'London', '2001-08-30'),
(10, 'Ehsan', 3, '01657', 'ehsan@ieee.com', 'Male', 'oky', 'USA', '2001-08-24'),
(12, 'lamian', 2, '12345', 'lamia.munira@northsouth.edu', 'Others', 'SDK3y8a0', 'Mohammadpur i think', '2001-09-24'),
(17, 'Sara', 2, '9831047134', 'sara@gmail.com', 'Female', 'k0TZ@WM9', 'London', '2000-09-01'),
(18, 'Alex', 3, '0165723', 'alex@gm.com', 'Male', 'okay', 'USA', '2010-09-28'),
(20, 'Sam', 7, '1234', 'sam@gm.com', 'Male', 'V3oA$mJd', 'Uttara', '2012-09-11');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `addstdinclassandrecord` AFTER INSERT ON `student` FOR EACH ROW begin
 insert into studentsinclass(classID,studentid,year) 
 values(new.current_class,new.id,substr(curdate(),1,4)) ;
 insert into studentsclassrecord( studentID, classID)
 values(new.id,new.current_class) ;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatestdinclassandrecord` AFTER UPDATE ON `student` FOR EACH ROW begin
 if old.current_class <> new.current_class then
 update studentsclassrecord set total_attendence = ( 
 select count(*) from attendence where stdid = old.id and status = 'p' and clsid = old.current_class) 
 where studentID = old.id and classID = old.current_class;
 update studentsclassrecord set total_grade = ( 
 select sum(cgpa) from grade where student = old.id ) 
 where studentID = old.id and classID = old.current_class;
 update studentsclassrecord set `grade` = ( 
 select avg(cgpa) from grade where student = old.id ) 
 where studentID = old.id and classID = old.current_class;
 update studentsclassrecord set finishing_year = curdate()
 where studentID = old.id and classID = old.current_class;
 delete from studentsinclass where classID = old.current_class and studentid = old.id ;
 delete from grade where student = old.id ; 
 delete from attendence where clsid = old.current_class and stdid = old.id ;
 insert into studentsclassrecord(studentID, classID)
 values(new.id,new.current_class) ;
 insert into studentsinclass(classID,studentid,year) 
 values(new.current_class,new.id,substr(curdate(),1,4)) ;
 end if;
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `studentsclassrecord`
--

CREATE TABLE `studentsclassrecord` (
  `studentID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `total_attendence` int(11) NOT NULL DEFAULT 0,
  `total_grade` decimal(5,2) NOT NULL DEFAULT 0.00,
  `grade` decimal(5,2) NOT NULL DEFAULT 0.00,
  `finishing_year` date DEFAULT current_timestamp(),
  `starting_year` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsclassrecord`
--

INSERT INTO `studentsclassrecord` (`studentID`, `classID`, `total_attendence`, `total_grade`, `grade`, `finishing_year`, `starting_year`) VALUES
(1, 1, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(3, 1, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(2, 1, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(4, 1, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(5, 1, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(10, 3, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(5, 2, 0, '0.00', '0.00', '2021-09-14', '2021-09-14'),
(12, 1, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(17, 1, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(18, 4, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(18, 2, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(17, 2, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(12, 2, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(18, 3, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(20, 3, 0, '0.00', '0.00', '2021-09-15', '2021-09-15'),
(20, 7, 0, '0.00', '0.00', '2021-09-15', '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `studentsinclass`
--

CREATE TABLE `studentsinclass` (
  `classID` int(11) DEFAULT NULL,
  `studentid` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsinclass`
--

INSERT INTO `studentsinclass` (`classID`, `studentid`, `year`) VALUES
(1, 1, 2021),
(1, 3, 2021),
(1, 2, 2021),
(1, 4, 2021),
(3, 10, 2021),
(2, 5, 2021),
(2, 17, 2021),
(2, 12, 2021),
(3, 18, 2021),
(7, 20, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subjectTeacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `subjectTeacher`) VALUES
(1, 'Art', 1),
(2, 'English', 3),
(3, 'Math', 1),
(4, 'CSE311', 5),
(5, 'Bangla', 4),
(6, 'History', 2),
(7, 'Politics', 3),
(8, 'CSE231', 4),
(9, 'Biology', 4),
(10, 'Chemistry', 3),
(11, 'Religion', 3),
(12, 'BGS', 4),
(13, 'CSE215', 1),
(14, 'Science', 2),
(15, 'Economics', 2),
(17, 'Pol', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjectsinclass`
--

CREATE TABLE `subjectsinclass` (
  `id` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectsinclass`
--

INSERT INTO `subjectsinclass` (`id`, `classID`, `subjectID`) VALUES
(19, 1, 2),
(20, 1, 3),
(17, 1, 5),
(18, 1, 9),
(23, 2, 2),
(24, 2, 3),
(21, 2, 5),
(22, 2, 9),
(27, 3, 2),
(28, 3, 3),
(25, 3, 5),
(26, 3, 9),
(35, 7, 2),
(2, 7, 3),
(36, 7, 9),
(1, 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(32) NOT NULL,
  `gender` enum('Male','Female','Others') DEFAULT 'Others',
  `password` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `phone`, `email`, `gender`, `password`, `address`, `dob`) VALUES
(1, 'Lamia Munira', '012345690', 'lamia@gm.com', 'Female', 'okay', 'Mohammadpur', '2001-09-24'),
(2, 'Munira', '0123456', 'munira@gm.com', 'Female', 'okay', 'Mohammadpur', '2001-09-24'),
(3, 'Tasnia', '0123456', 'tasnia@gm.com', 'Female', 'okay', 'Uttara', '2001-05-15'),
(4, 'Maisha', '0123456', 'maisha@gm.com', 'Female', 'okay', 'Bashundhara', '2001-05-30'),
(5, 'Taqi', '01552731548', 'taq@gm.com', 'Male', 'eRiuNrWL', 'Bashundhara', '2000-08-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD UNIQUE KEY `stdid` (`stdid`,`clsid`,`date`),
  ADD KEY `clsid` (`clsid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classTeacherID` (`classTeacherID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD UNIQUE KEY `student` (`student`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cid` (`cid`,`day1`,`time`),
  ADD UNIQUE KEY `cid_2` (`cid`,`day2`,`time`),
  ADD UNIQUE KEY `cid_3` (`cid`,`day1`,`day2`,`subid`,`time`),
  ADD UNIQUE KEY `cid_4` (`cid`,`subid`),
  ADD KEY `cid_5` (`cid`,`subid`),
  ADD KEY `id` (`id`,`cid`,`subid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `current_class` (`current_class`);

--
-- Indexes for table `studentsclassrecord`
--
ALTER TABLE `studentsclassrecord`
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `studentsinclass`
--
ALTER TABLE `studentsinclass`
  ADD UNIQUE KEY `classID` (`classID`,`studentid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `subjectTeacher` (`subjectTeacher`);

--
-- Indexes for table `subjectsinclass`
--
ALTER TABLE `subjectsinclass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classID` (`classID`,`subjectID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subjectsinclass`
--
ALTER TABLE `subjectsinclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`stdid`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendence_ibfk_2` FOREIGN KEY (`clsid`) REFERENCES `class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`classTeacherID`) REFERENCES `teacher` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`student`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`id`) REFERENCES `schedule` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`current_class`) REFERENCES `class` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `studentsclassrecord`
--
ALTER TABLE `studentsclassrecord`
  ADD CONSTRAINT `studentsclassrecord_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studentsinclass`
--
ALTER TABLE `studentsinclass`
  ADD CONSTRAINT `studentsinclass_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentsinclass_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`subjectTeacher`) REFERENCES `teacher` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subjectsinclass`
--
ALTER TABLE `subjectsinclass`
  ADD CONSTRAINT `subjectsinclass_ibfk_1` FOREIGN KEY (`id`) REFERENCES `schedule` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
