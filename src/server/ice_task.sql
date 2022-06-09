-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 02:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ice_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `Admin_ID` varchar(55) NOT NULL,
                         `Admin_Name` varchar(55) NOT NULL,
                         `Admin_Email` varchar(55) NOT NULL,
                         `Admin_Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
                                                                                    ('1ed865d0-3da0-4e74-9d53-37c79146383e', 'JP Jones', 'AD101874@rcconnect.co.za', '$argon2id$v=19$m=16,t=2,p=1$WEVvUldrUFdQRTNvdGZiWA$CQO3EOZiFpUSVO6RCm1ldA'),
                                                                                    ('69149836-040d-4155-9380-78b8f96e1641', 'James Cameron', 'AD101745@rcconnect.co.za', '$argon2id$v=19$m=16,t=2,p=1$WEVvUldrUFdQRTNvdGZiWA$CQO3EOZiFpUSVO6RCm1ldA'),
                                                                                    ('dd34fc22-332e-46ff-b567-55d2214a3695', 'Samantha Hudges', 'AD101844@rcconnect.co.za', '$argon2id$v=19$m=16,t=2,p=1$WEVvUldrUFdQRTNvdGZiWA$CQO3EOZiFpUSVO6RCm1ldA');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
                         `Admin_ID` varchar(55) NOT NULL,
                         `ISBN` varchar(45) NOT NULL,
                         `Display_Name` varchar(55) NOT NULL,
                         `Book_Name` varchar(100) NOT NULL,
                         `Description` text NOT NULL,
                         `COURSE` varchar(15) NOT NULL,
                         `InStock` tinyint(1) NOT NULL,
                         `Price` double(10,2) NOT NULL,
                         `Image` varchar(100) NOT NULL,
                         `Tag` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Admin_ID`, `ISBN`, `Display_Name`, `Book_Name`, `Description`, `COURSE`, `InStock`, `Price`, `Image`, `Tag`) VALUES
('69149836-040d-4155-9380-78b8f96e1641', '978-132124997', 'Networking For Dummies', 'Computer Networks (5th Edition)', 'Set up a secure network at home or the office   Fully revised to cover Windows 10 and Windows Server 2019, this new edition of the trusted Networking For Dummies helps both beginning network administrators and home users to set up and maintain a network. Updated coverage of broadband and wireless technologies, as well as storage and back-up procedures, ensures that you`ll learn how to build a wired or wireless network, secure and optimize it, troubleshoot problems, and much more.   From connecting to the Internet and setting up a wireless network to solving networking problems and backing up your data—this #1 bestselling guide covers it all.  Build a wired or wireless network Secure and optimize your network Set up a server and manage Windows user accounts Use the cloud—safely  Written by a seasoned technology author—and jam-packed with tons of helpful step-by-step instructions—this is the book network administrators and everyday computer users will turn to again and again.', 'DNM311', 1, 240.77, '../Images/computer_network.jpg', 'Networking'),
('1ed865d0-3da0-4e74-9d53-37c79146383e', '978-0132350884', 'Clean Code 1st Edition', 'Clean Code: A Handbook of Agile Software Craftsmanship 1st Edition', 'Available at a lower price from other sellers that may not offer free Prime shipping. Even bad code can function. But if code isn`t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code. But it doesn`t have to be that way.  Noted software expert Robert C. Martin, presents a revolutionary paradigm with Clean Code: A Handbook of Agile Software Craftsmanship. Martin, who has helped bring agile principles from a practitioner’s point of view to tens of thousands of programmers, has teamed up with his colleagues from Object Mentor to distill their best agile practice of cleaning code “on the fly” into a book that will instill within you the values of software craftsman, and make you a better programmer―but only if you work at it.  What kind of work will you be doing? You`ll be reading code―lots of code. And you will be challenged to think about what’s right about that code, and what’s wrong with it. More importantly you will be challenged to reassess your professional values and your commitment to your craft.    Clean Codeis divided into three parts. The first describes the principles, patterns, and practices of writing clean code. The second part consists of several case studies of increasing complexity. Each case study is an exercise in cleaning up code―of transforming a code base that has some problems into one that is sound and efficient. The third part is the payoff: a single chapter containing a list of heuristics and “smells” gathered while creating the case studies. The result is a knowledge base that describes the way we think when we write, read, and clean code.   Readers will come away from this book understanding How to tell the difference between good and bad code How to write good code and how to transform bad code into good code How to create good names, good functions, good objects, and good classes How to format code for maximum readability How to implement complete error handling without obscuring code logic How to unit test and practice test-driven development What “smells” and heuristics can help you identify bad code This book is a must for any developer, software engineer, project manager, team lead, or systems analyst with an interest in producing better code.', 'DISD313', 1, 699.30, '../Images/clean_code.jpg', 'Programming'),
('69149836-040d-4155-9380-78b8f96e1641', '978-0133594140', 'Computer Networking', 'Computer Networking: A Top-Down Approach 7th Edition', 'Motivates readers with a top-down, layered approach to computer networking  Unique among computer networking texts, the Seventh Edition of the popular Computer Networking: A Top Down Approach builds on the author`s long tradition of teaching this complex subject through a layered approach in a “top-down manner.” The text works its way from the application layer down toward the physical layer, motivating readers by exposing them to important concepts early in their study of networking. Focusing on the Internet and the fundamentally important issues of networking, this text provides an excellent foundation for readers interested in computer science and electrical engineering, without requiring extensive knowledge of programming or mathematics. The Seventh Edition has been updated to reflect the most important and exciting recent advances in networking.', 'DNM311', 1, 582.57, '../Images/computer_networking.jpg', 'Networking'),
('1ed865d0-3da0-4e74-9d53-37c79146383e', '978-0201485677', 'Refactoring', 'Refactoring: Improving the Design of Existing Code', 'As the application of object technology--particularly the Java programming language--has become commonplace, a new problem has emerged to confront the software development community. Significant numbers of poorly designed programs have been created by less-experienced developers, resulting in applications that are inefficient and hard to maintain and extend. Increasingly, software system professionals are discovering just how difficult it is to work with these inherited, non-optimal applications. For several years, expert-level object programmers have employed a growing collection of techniques to improve the structural integrity and performance of such existing software programs. Referred to as refactoring, these practices have remained in the domain of experts because no attempt has been made to transcribe the lore into a form that all developers could use. . .until now. In Refactoring: Improving the Design of Existing Software, renowned object technology mentor Martin Fowler breaks new ground, demystifying these master practices and demonstrating how software practitioners can realize the significant benefits of this new process. With proper training a skilled system designe', 'DISD313', 1, 235.48, '../Images/refactor.jpg', 'Programming'),
('1ed865d0-3da0-4e74-9d53-37c79146383e', '978-0262046305', 'Introduction to Algorithms', 'Introduction to Algorithms, 4th Edition', 'Some books on algorithms are rigorous but incomplete; others cover masses of material but lack rigor. Introduction to Algorithms uniquely combines rigor and comprehensiveness. It covers a broad range of algorithms in depth, yet makes their design and analysis accessible to all levels of readers, with self-contained chapters and algorithms in pseudocode. Since the publication of the first edition, Introduction to Algorithms has become the leading algorithms text in universities worldwide as well as the standard reference for professionals. This fourth edition has been updated throughout, with new chapters on matchings in bipartite graphs, online algorithms, and machine learning, and new material on such topics as solving recurrence equations, hash tables, potential functions, and suffix arrays.  Each chapter is relatively self-contained, presenting an algorithm, a design technique, an application area, or a related topic, and can be used as a unit of study. The algorithms are described in English and in a pseudocode designed to be readable by anyone who has done a little programming. The explanations have been kept elementary without sacrificing depth of coverage or mathematical rigor. The fourth edition has 140 new exercises and 22 new problems, and color has been added to improve visual presentations. The writing has been revised throughout, and made clearer, more personal, and gender neutral. The book\'s website offers supplemental material.', 'DISD313', 1, 2098.38, '../Images/algorithms.jpg', 'Programming'),
('dd34fc22-332e-46ff-b567-55d2214a3695', '978-1119444237', 'Financial Accounting', 'Financial Accounting', 'he new seventh edition of Financial Accounting: Tools for Decision-Making by Kimmel, Weygandt, Kieso, Trenholm, Irvine and Burnley continues to provide the best tools for both instructors and students to succeed in their introductory financial accounting class. It helps students understand the purpose and use of financial accounting, whether they plan to become accountants or whether they simply need it for their personal life or career. The book`s unique, balanced procedural and conceptual (user-oriented) approach, proven pedagogy and breadth of problem material has made Financial Accounting the most popular introductory text in Canada. This hands-on text, paired with a powerful online teaching and learning environment, WileyPLUS with ORION, offers students a practical set of tools for use in making business decisions based on financial information.', 'HCIB4115', 1, 143.00, '../Images/financial_accounting.jpg', 'Business'),
('69149836-040d-4155-9380-78b8f96e1641', '978-1449387860', 'Network Warrior', 'Network Warrior: Everything You Need to Know, Second Edition', 'Pick up where certification exams leave off. With this practical, in-depth guide to the entire network infrastructure, youâ??ll learn how to deal with real Cisco networks, rather than the hypothetical situations presented on exams like the CCNA. Network Warrior takes you step by step through the world of routers, switches, firewalls, and other technologies based on the author\'s extensive field experience. You\'ll find new content for MPLS, IPv6, VoIP, and wireless in this completely revised second edition, along with examples of Cisco Nexus 5000 and 7000 switches throughout.  Topics include:  An in-depth view of routers and routing Switching, using Cisco Catalyst and Nexus switches as examples SOHO VoIP and SOHO wireless access point design and configuration Introduction to IPv6 with configuration examples Telecom technologies in the data-networking world, including T1, DS3, frame relay, and MPLS Security, firewall theory, and configuration, as well as ACL and authentication Quality of Service (QoS), with an emphasis on low-latency queuing (LLQ) IP address allocation, Network Time Protocol (NTP), and device failures', 'DNM311', 1, 590.65, '../Images/network_warrior.jpg', 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `UUID` varchar(55) NOT NULL,
                         `FullName` varchar(55) NOT NULL,
                         `Email` varchar(55) NOT NULL,
                         `Password` text NOT NULL,
                         `Verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UUID`, `FullName`, `Email`, `Password`, `Verified`) VALUES
                                                                              ('1ecf3be8-1e6c-44cb-9eb045f1', 'Tim Kyle', 'ST10131875@rcconnect.edu.za', '$argon2id$v=19$m=65536,t=4,p=1$eDYuLldQVGMzVDBUZ2duUQ$quIorOAzi8LHEqO2SsZp8qKL09zjl5d6RmE5kWEyc5o', 0),
                                                                              ('97443eaf-ec13-43b0-bd76-2ded8e44a17f', 'James Cameron', 'ST10137875@rcconnect.edu.za', '$argon2id$v=19$m=16,t=2,p=1$bzZRQnJvSWt4dEY4Z2o3dw$U3M9iqQF5rfQpAbGfUqDng', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
    ADD PRIMARY KEY (`ISBN`),
    ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`UUID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
    ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
