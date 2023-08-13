-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 09:42 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `admin_id` bigint(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`admin_id`, `admin_name`, `password`, `date`) VALUES
(1, 'RunTimeJet', 'RTJ', '2021-07-15 10:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` varchar(255) NOT NULL,
  `ansid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` mediumtext NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `timestamp`) VALUES
(1, 'Science', 'Science (from Latin Scientia \'knowledge\') is a systematic enterprise that builds and organizes knowledge in the form of testable explanations and predictions about the universe.\r\n\r\nThe earliest roots of science can be traced to Ancient Egypt and Mesopotamia in around 3000 to 1200 BCE. Their contributions to mathematics, astronomy, and medicine entered and shaped the Greek natural philosophy of classical antiquity, whereby formal attempts were made to provide explanations of events in the physical world based on natural causes. After the fall of the Western Roman Empire, knowledge of Greek conceptions of the world deteriorated in Western Europe during the early centuries (400 to 1000 CE) of the Middle Ages, but was preserved in the Muslim world during the Islamic Golden Age. The recovery and assimilation of Greek works and Islamic inquiries into Western Europe from the 10th to 13th century revived \"natural philosophy\", which was later transformed by the Scientific Revolution that began in the 16th century as new ideas and discoveries departed from previous Greek conceptions and traditions. The scientific method soon played a greater role in knowledge creation and it was not until the 19th century that many of the institutional and professional features of science began to take shape; along with the changing of \"natural philosophy\" to \"natural science.\"\r\n\r\nModern science is typically divided into three major branches that consist of the natural sciences (e.g., biology, chemistry, and physics), which study nature in the broadest sense; the social sciences (e.g., economics, psychology, and sociology), which study individuals and societies; and the formal sciences (e.g., logic, mathematics, and theoretical computer science), which deal with symbols governed by rules. There is disagreement, however, on whether the formal sciences actually constitute a science as they do not rely on empirical evidence. Disciplines that use existing scientific knowledge for practical purposes, such as engineering and medicine, are described as applied sciences.\r\n\r\nNew knowledge in science is advanced by research from scientists who are motivated by curiosity about the world and a desire to solve problems. Contemporary scientific research is highly collaborative and is usually done by teams in academic and research institutions, government agencies, and companies. The practical impact of their work has led to the emergence of science policies that seek to influence the scientific enterprise by prioritizing the development of commercial products, armaments, health care, public infrastructure, and environmental protection.', '2021-07-22 10:19:13'),
(2, 'Mathematics', 'Mathematics (from Greek: μάθημα, máthēma, \'knowledge, study, learning\') includes the study of such topics as quantity (number theory), structure (algebra), space (geometry), and change (analysis). It has no generally accepted definition.\r\n\r\nMathematicians seek and use patterns[9] to formulate new conjectures; they resolve the truth or falsity of such by mathematical proof. When mathematical structures are good models of real phenomena, mathematical reasoning can be used to provide insight or predictions about nature. Through the use of abstraction and logic, mathematics developed from counting, calculation, measurement, and the systematic study of the shapes and motions of physical objects. Practical mathematics has been a human activity from as far back as written records exist. The research required to solve mathematical problems can take years or even centuries of sustained inquiry.\r\n\r\nRigorous arguments first appeared in Greek mathematics, most notably in Euclid\'s Elements. Since the pioneering work of Giuseppe Peano (1858–1932), David Hilbert (1862–1943), and others on axiomatic systems in the late 19th century, it has become customary to view mathematical research as establishing truth by rigorous deduction from appropriately chosen axioms and definitions. Mathematics developed at a relatively slow pace until the Renaissance when mathematical innovations interacting with new scientific discoveries led to a rapid increase in the rate of mathematical discovery that has continued to the present day.\r\nMathematics is essential in many fields, including natural science, engineering, medicine, finance, and the social sciences. Applied mathematics has led to entirely new mathematical disciplines, such as statistics and game theory. Mathematicians engage in pure mathematics (mathematics for its own sake) without having any application in mind, but practical applications for what began as pure mathematics are often discovered later.', '2021-07-22 10:19:13'),
(3, 'History', 'History (from Greek ἱστορία, historia, meaning \"inquiry; knowledge acquired by investigation\") is the study of the past. Events before the invention of writing systems are considered prehistory. \"History\" is an umbrella term comprising past events as well as the memory, discovery, collection, organization, presentation, and interpretation of these events. Historians seek knowledge of the past using historical sources such as written documents, oral accounts, art and material artefacts, and ecological markers.\r\n\r\nHistory also includes the academic discipline which uses a narrative to describe, examine, question, and analyze past events, and investigate their patterns of cause and effect.Historians often debate which narrative best explains an event, as well as the significance of different causes and effects. Historians also debate the nature of history as an end in itself, as well as its usefulness to give perspective on the problems of the present.\r\n\r\nStories common to a particular culture, but not supported by external sources (such as the tales surrounding King Arthur), are usually classified as cultural heritage or legends.History differs from myth in that it is supported by evidence. However, ancient influences have helped spawn variant interpretations of the nature of history which have evolved over the centuries and continue to change today. The modern study of history is wide-ranging and includes the study of specific regions and the study of certain topical or thematic elements of historical investigation. History is often taught as part of primary and secondary education, and the academic study of history is a major discipline in university studies.\r\n\r\nHerodotus, a 5th-century BC Greek historian, is often considered the \"father of history\" in the Western tradition, although he has also been criticized as the \"father of lies\".Along with his contemporary Thucydides, he helped form the foundations for the modern study of past events and societies. Their works continue to be read today, and the gap between the culture-focused Herodotus and the military-focused Thucydides remains a point of contention or approach in modern historical writing. In East Asia, a state chronicle, the Spring and Autumn Annals, was reputed to date from as early as 722 BC, although only 2nd-century BC texts have survived.', '2021-07-22 10:19:13'),
(4, 'English', 'English is a West Germanic language belonging to the Indo-European language family, originally spoken by the inhabitants of early medieval England. It is named after the Angles, one of the ancient Germanic peoples that migrated to the area of Great Britain, which later took their name, England. Both names derive from Anglia, a peninsula on the Baltic Sea. English is most closely related to Frisian and Low Saxon, while its vocabulary has been significantly influenced by other Germanic languages, particularly Old Norse (a North Germanic language), as well as Latin and French.\r\n\r\nEnglish has developed over the course of more than 1,400 years. The earliest forms of English, a group of West Germanic (Ingvaeonic) dialects brought to Great Britain by Anglo-Saxon settlers in the 5th century, are collectively called Old English. Middle English began in the late 11th century with the Norman conquest of England; this was a period in which English was influenced by Old French, in particular through its Old Norman dialect.Early Modern English began in the late 15th century with the introduction of the printing press to London, the printing of the King James Bible and the start of the Great Vowel Shift.', '2021-07-22 10:19:13'),
(5, 'Tamil', 'Tamil (/ˈtæmɪl/; தமிழ் Tamiḻ [t̪amiɻ], is a Dravidian language natively spoken by the Tamil people of South Asia. Tamil is the official language of the Indian state of Tamil Nadu, and an official language of the two sovereign nations, Singapore and Sri Lanka. In India, it is also the official language of the Union Territory of Puducherry. Tamil is spoken by significant minorities in the four other South Indian states of Kerala, Karnataka, Andhra Pradesh and Telangana and the Union Territory of the Andaman and Nicobar Islands. It is also spoken by the Tamil diaspora found in many countries, including Malaysia, South Africa, United Kingdom, United States, Canada, Australia and Mauritius. Tamil is also natively spoken by Sri Lankan Moors.', '2021-07-22 10:31:21'),
(6, 'Sinhala ', 'Sinhala (/ˈsɪnhələ, ˈsɪŋələ/ SIN-hə-lə, SING-ə-lə; සිංහල, siṁhala, [ˈsiŋɦələ]), also known as Sinhalese, is an Indo-Aryan language primarily spoken by the Sinhalese people of Sri Lanka, who make up the largest ethnic group on the island, numbering about 16 million.Sinhala is also spoken as the first language by other ethnic groups in Sri Lanka, totalling about 4 million people as of 2001. It is written using the Sinhala script, which is one of the Brahmic scripts; a descendant of the ancient Indian Brahmi script closely related to the Kadamba script.\r\n\r\nSinhala is one of the official and national languages of Sri Lanka. Along with Pali, it played a major role in the development of Theravada Buddhist literature.\r\n\r\nThe oldest Sinhalese Prakrit inscriptions found are from the third to second century BCE following the arrival of Buddhism in Sri Lanka, while the oldest extant literary works date from the ninth century. The closest relatives are the Vedda language (an endangered, indigenous creole still spoken by a minority of Sri Lankans, mixing Sinhala with an isolate of unknown origin and from which Old Sinhala borrowed various aspects into its main Indo-Aryan substrate), and the Maldivian language. It has two main varieties, written and spoken, and is a conspicuous example of the linguistic phenomenon known as diglossia', '2021-07-22 10:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseId` varchar(60) NOT NULL,
  `CourseName` varchar(60) NOT NULL,
  `Subject` varchar(60) NOT NULL,
  `Grade` int(2) NOT NULL,
  `Image` blob DEFAULT NULL,
  `TId` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `Sid` varchar(60) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `CourseId` varchar(60) NOT NULL,
  `LessonName` varchar(60) NOT NULL,
  `Video` varchar(120) DEFAULT NULL,
  `Tid` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(255) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` varchar(255) NOT NULL,
  `qid` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `choice` int(11) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` varchar(255) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `cid` varchar(60) DEFAULT NULL,
  `tid` varchar(60) NOT NULL,
  `total` int(10) DEFAULT NULL,
  `mpq` int(11) NOT NULL,
  `time` bigint(20) DEFAULT NULL,
  `tag` varchar(60) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `eid` varchar(255) NOT NULL,
  `Sid` varchar(60) NOT NULL,
  `cid` varchar(60) NOT NULL,
  `score` int(11) NOT NULL,
  `fullMarks` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `Sid` varchar(60) NOT NULL,
  `Grade` int(2) NOT NULL,
  `CourseId` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

CREATE TABLE `student_db` (
  `sid` varchar(60) NOT NULL,
  `student_fname` varchar(100) NOT NULL,
  `student_lname` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_db`
--

CREATE TABLE `teacher_db` (
  `teacher_id` varchar(60) NOT NULL,
  `teacher_fname` varchar(100) NOT NULL,
  `teacher_lname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` longtext NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_name` (`admin_name`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`Sid`,`eid`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`CourseId`,`LessonName`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`eid`,`Sid`);

--
-- Indexes for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD PRIMARY KEY (`Sid`,`Grade`,`CourseId`);

--
-- Indexes for table `student_db`
--
ALTER TABLE `student_db`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teacher_db`
--
ALTER TABLE `teacher_db`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
