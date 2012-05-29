-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2012 at 05:18 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library_2012`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(10) NOT NULL AUTO_INCREMENT,
  `au_firstname` varchar(50) NOT NULL,
  `au_lastname` varchar(50) NOT NULL,
  `date_birth` varchar(20) NOT NULL,
  `date_death` varchar(20) NOT NULL,
  `au_description` varchar(500) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `au_firstname`, `au_lastname`, `date_birth`, `date_death`, `au_description`) VALUES
(1, 'Shkar', 'Rajar', 'Nov / 01/ 1968', 'Dec / 02 / 1990', ' Programmer'),
(2, 'Andres', 'Bonifacio', ' - -  / dd / yyyy', '- - / dd / yyyy', 'matapang\r\n'),
(3, 'Monaliza', ' Estrella', 'Apr / 4 / 1994', 'Jan / 1 / 2012', 'qrtqertqer'),
(4, 'Juan', 'Dela Cruz', ' - -  / dd / yyyy', ' - -  / dd / yyyy', ''),
(5, 'zandy', 'Tacuel', ' - -  / dd / yyyy', ' - -  / dd / yyyy', 'zandy malagu');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `copyright` varchar(10) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `page_number` varchar(15) NOT NULL,
  `classification_id` int(3) NOT NULL,
  `author_id` int(5) NOT NULL,
  `description` varchar(500) NOT NULL,
  `unit_price` int(7) NOT NULL,
  `original_stock` int(11) NOT NULL,
  `remaining_stock` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `copyright`, `publisher`, `page_number`, `classification_id`, `author_id`, `description`, `unit_price`, `original_stock`, `remaining_stock`, `location`) VALUES
(1, 'Web Application Architecture', 'c1989', 'Philippine Publishing House', '157', 1, 1, '', 500, 1, 0, ''),
(2, 'Applied Consumer Psychology', 'c2005', 'Rex Bookstore', 'iii-243\r', 1, 1, '', 0, 1, 0, ''),
(3, 'Basic Nutrition for Filipinos-4th Edition', 'c1996', 'Meriam Webster Book Store', '470\r', 1, 1, '', 0, 1, 0, ''),
(4, 'Zoology Laboratory Manual', 'c2005', 'Anvil Publication', '185\r', 1, 1, '', 0, 2, 1, ''),
(5, 'Invitation To Wonder(An introduction to Philosophical Thought)', 'c1989', 'Solar Publishing Corp.', '253\r', 1, 1, '', 0, 1, 0, ''),
(6, 'English Proficiency Instruction for Effective Communication', '-', '-', '190\r', 1, 1, '', 0, 2, 2, ''),
(7, 'Design of Machine Members', 'c1978', 'McGraw Hill Book Company', 'v-520\r', 1, 1, '', 0, 1, 1, ''),
(8, 'Trigonometry, Plain and Spherical', 'c1963', 'Royal Publishing House Inc.', 'v-103\r', 1, 1, '', 0, 1, 0, ''),
(9, 'MAKAMISA The search for Rizal''s Third Novel', 'c2008', 'Anvil Publication', '5-152\r', 1, 1, '', 0, 4, 2, ''),
(10, 'THE WRITER''S EYE Composition in the Multimedia Age', 'c2008', 'McGraw Hill Book Company', 'v-I-6\r', 1, 1, '', 0, 1, 1, ''),
(11, 'Introduction to MASS COMMUNICATION Media Literacy and Culture, Fourth Edition', 'c2006', 'McGraw Hill Book Company', 'vi-I-16\r', 1, 1, '', 0, 1, 1, ''),
(12, 'F_l_p_no ng mga Flpno, Mga Problema sa Ispeling, Retorika at Pagpapayaman ng Wikang Pambansa', 'c2009', 'Anvil Publication', 'v-251\r', 1, 1, '', 0, 1, 1, ''),
(13, 'MULTI-MEDIA, Video, Installation, Performance', 'c2007', 'Routledge', 'viii-249\r', 1, 1, '', 0, 1, 1, ''),
(14, 'UP DIKSYUNARYONG FILIPINO', 'c2001', 'Anvil Publication', 'v-960\r', 1, 1, '', 0, 1, 1, ''),
(15, 'NEWS WRITING AND REPORTING For Today''s Media, Seventh Edition', 'c2007', 'McGraw Hill Book Company', 'iii-484\r', 1, 1, '', 0, 1, 1, ''),
(16, 'MULTI-MEDIA, Video, Installation, Performance', 'c2007', 'Routledge', 'viii-249\r', 1, 1, '', 0, 1, 1, ''),
(17, 'COLLEGE ENGLISH FOR TODAY-BOOK 1-REV.Ed.', 'c1988', 'National Book Store', 'iv-402\r', 1, 1, '', 0, 1, 1, ''),
(18, 'INFORMATION HANDBOOK FOR SCHOOL HEALTH AND NUTRITION PERSONNEL', 'c1992', '-', 'i-79\r', 1, 1, '', 0, 1, 1, ''),
(19, 'REVIEW QUESTIONS IN PHARMACOLOGY AND THERAPEUTICS, REVISED', 'c1994', 'U.P.E.C', 'i-98\r', 1, 1, '', 0, 1, 1, ''),
(20, 'SECOND COURSE IN FUNDEMENTALS OF MATHEMATICS', 'c1983', 'Allyn and Bacon Inc.', 'v-561\r', 1, 1, '', 0, 1, 1, ''),
(21, 'THE LATE VICTORIANS, A SHORT HISTORY', 'c1955', 'D.VAN NOSTRAND COMPANY', '188\r', 1, 1, '', 0, 1, 1, ''),
(22, 'BIOCHEMISTRY, A CASE-ORIENTED APPROACH, FIFTH EDITION', 'c1990', 'C.V.Mosby Corp.', 'v-905\r', 1, 1, '', 0, 1, 1, ''),
(23, 'PRACTICAL ACCOUNTING 1, CPA EXAMINATION, 1998 EDITION', 'c1998', 'GIC Enterprises', 'i-660\r', 1, 1, '', 0, 1, 1, ''),
(24, 'PRACTICAL ACCOUNTING 1, CPA EXAMINATION, 2002 EDITION', 'c2002', 'GIC Enterprises', '766\r', 1, 1, '', 0, 1, 1, ''),
(25, 'BASIC ELECTRICITY, REVISED EDITION Vol.5', 'c1978', 'HAYDEN BOOKS', '5-166\r', 1, 1, '', 0, 1, 1, ''),
(26, 'BASIC AUDITING, THEORY AND CONCEPTS, SECOND EDITION', 'c1996', '-', '579\r', 1, 1, '', 0, 1, 1, ''),
(27, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 1, A/AMIITABHA', 'c1974', 'THE PUBLISHERS AGENCY', 'x-352\r', 1, 1, '', 0, 1, 1, ''),
(28, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 3, AUSTRALIA/BODE', 'c1974', 'THE PUBLISHERS AGENCY', '734-1112\r', 1, 1, '', 0, 1, 1, ''),
(29, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 4, BODEL/CARBO PERIOD', 'c1974', 'THE PUBLISHERS AGENCY', '1114-1492\r', 1, 1, '', 0, 1, 1, ''),
(30, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 5, CARBON MONO./CLIVE', 'c1974', 'THE PUBLISHERS AGENCY', '1494-1872\r', 1, 1, '', 0, 1, 1, ''),
(31, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 6, CLOCK/CZOLGOSZ', 'c1974', 'THE PUBLISHERS AGENCY', '1874-2252\r', 1, 1, '', 0, 1, 1, ''),
(32, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 7, D/ELECTROSTATICS', 'c1974', 'THE PUBLISHERS AGENCY', '2254-2632\r', 1, 1, '', 0, 1, 1, ''),
(33, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 8, ELECTROTYPING/FONTANNE', 'c1974', 'THE PUBLISHERS AGENCY', '2634-3011\r', 1, 1, '', 0, 1, 1, ''),
(34, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 9, FONTENELLE/GOTTWALDOV', 'c1974', 'THE PUBLISHERS AGENCY', '3014-3391\r', 1, 1, '', 0, 1, 1, ''),
(35, 'THE NEW AMERICAN ENCYCLOPEDIA UNABRIDGED, Vol. 10, GOUACHE/HUDSON', 'c1974', 'THE PUBLISHERS AGENCY', '3394-3772', 1, 1, '', 0, 1, 1, ''),
(48, 'gadgafg', '123df', 'fgdf', '123444', 1, 3, '', 1111, 1, 1, 'sdfsg geg'),
(49, 'math', '2011', 'hindi ko alam', '100', 1, 3, '', 100, 1, 0, 'sa librry'),
(50, 'eqry', '2345', 'rg', '5345', 2, 1, '', 2432, 1, 0, 'dg'),
(51, 'eqry', '2345', 'rg', '5345', 2, 1, '', 2432, 1, 0, 'dgtw35y'),
(52, 'qqqqq', '3452345', 'ertghrth', '145', 2, 2, '', 134515, 1, 0, '5dhrth'),
(53, 'rrrrrrrrrrrrrrr', '14545', 'dfadhgh', '41351345', 9, 2, '', 145145, 1, 0, 'rgsethar'),
(54, 'ujrgkj', '426', 'hthj', '452', 1, 2, '', 2562, 1, 0, 'ghjtj'),
(55, 'thrsthrh', '2562', 'fghhj', '3464', 1, 2, '', 262, 3, 0, 'ryhjthy'),
(56, 'gssssssss', '878', 'jkltuil', '5878', 1, 2, '', 35868, 1, 0, 'gkdtyj'),
(57, 'wrt', 'tt', 'wt', 'wert', 1, 2, '', 0, 1, 1, 'wrt'),
(58, 'La Verdad Christian College manual', '2012', 'LVCC', '2012', 1, 3, '', 2012, 1, 0, 'LVCC'),
(59, 'La Verdad Christian College manual part 2', '2013', 'LVCC', '2013', 1, 3, '', 2013, 1, 0, 'LVCC');

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

CREATE TABLE IF NOT EXISTS `book_status` (
  `book_id` int(11) NOT NULL,
  `accession_num` int(11) NOT NULL,
  `status` varchar(222) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`book_id`, `accession_num`, `status`) VALUES
(1, 2556, 'lost'),
(2, 2557, 'lost'),
(3, 2558, 'lost'),
(4, 2559, 'in'),
(4, 2560, 'lost'),
(5, 2561, 'lost'),
(6, 2562, 'in'),
(7, 2563, 'in'),
(8, 2564, 'in'),
(9, 2565, 'in'),
(9, 2566, 'in'),
(9, 2567, 'in'),
(9, 2568, 'in'),
(9, 2569, 'in'),
(6, 1001, 'limited'),
(58, 2012, 'in'),
(59, 2013, 'in');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE IF NOT EXISTS `borrowers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `student_id`, `firstname`, `lastname`, `course`, `address`, `contact`) VALUES
(1, 'CP003', 'Cedrick', 'Buan', '2nd Year - Computer Programming', 'Quezon Province', '093872883737'),
(2, 'CP001', 'Dennis', 'Almazora', '2nd Year - Computer Programming', 'Laguna', '09384069024'),
(3, 'CP002', 'Victorino', 'Bautista', '2nd Year - Computer Programming', 'La Union', '09303417585'),
(4, 'CP004', 'John Rick', 'Caneda', '2nd Year - Computer Programming', 'Cebu', '09103283135'),
(5, 'CP005', 'Aleks', 'Daloso', '2nd Year - Computer Programming', 'Metro', '09384069024'),
(6, 'CP006', 'Rachele Ann', 'Delcano', '2nd Year - Computer Programming', 'Cavite', '09103283100'),
(7, 'CP007', 'Monaliza', 'Estrella', '2nd Year - Computer Programming', 'Bulacan', '09303417585'),
(8, 'CP008', 'Joane Pauline', 'Maunes', '2nd Year - Computer Programming', 'Manila', '09384069024'),
(9, 'CP009', 'Eunice', 'Orozco', '2nd Year - Computer Programming', 'Aurora', '09303417585'),
(10, 'CP010', 'Pristine', 'Palmes', '2nd Year - Computer Programming', 'Metro', '093872883737'),
(11, 'CP011', 'Dave', 'Quilon', '2nd Year - Computer Programming', 'Cavite', '09384069024'),
(12, 'CP012', 'Sarah', 'Santos', '1st Year - Computer Programming', 'Bataan', '09384069024'),
(13, 'CP013', 'Zandy', 'Tacuel', '2nd Year - Computer Programming', 'Iloilo', '09103283135'),
(17, 'CP090', 'Romack', 'Natividad', '2nd Year - Computer Programming', 'Rizal', '0909090909');

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE IF NOT EXISTS `classification` (
  `class_id` int(2) NOT NULL AUTO_INCREMENT,
  `class_code` varchar(10) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_description` varchar(500) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`class_id`, `class_code`, `class_name`, `class_description`) VALUES
(1, '000-099', 'Computer Science, information and general works', 'This class includes Computer Science, knowledge and systems, Bibliographies, Library & information sciences, Encyclopedias & books of facts, formerly collected essays by language, Magazines, journals & serials, Associations, organizations & museums, News media, journalism & publishing, General collections, Manuscripts & rare books.'),
(2, '100-199', 'Philosophy and Psychology', 'This classification includes Philosophy, Metaphysics, Epistemology, Parapsychology & occultism, Philosophical schools of thought, Psychology, Logic, Ethics (Moral Philosophy), Ancient, medieval & Eastern Philosophy and Modern Western Philosophy books '),
(3, '200-299', 'Religion', 'This class includes the Religion, Natural Theology, Bible, Christian Theology, Christian Moral & devotional theology, Christian orders & local church, Christian social theology, Christian church history, Christian denominations & sects, and other comparative religions related books'),
(4, '300-399', 'Social Sciences', 'This class includes the Social sciences, sociology & anthropology, General Statistics, Political Science , Economics, Law, Public Administration, Social Services, Education, Commerce, communications, transport, Customs, Etiquette, and Folklore books'),
(5, '400-499', 'Language', 'This class includes Language, Linguistics, English & Old English, German Languages, Romance Languages, French, Italian, Romanian, Rhaeto-Romanic, Spanish, Portuguese,Italic, Latin, Hellenic, Classical Greek, and other languages books. '),
(6, '500-599', 'Science', 'This class includes Sciences, Mathematics, Astronomy & allied sciences, Physics, Chemistry & allied sciences, Earth sciences, Paleontology, Paleozoology, Life Sciences, Plants, and  Zoological sciences/Animals related books.'),
(7, '600-699', 'Technology', 'This class includes the Technology(Applied Sciences), Medical Sciences, Medicine, Engineering & applied operations, Agriculture, Home Economics & family living, Management & auxiliary services, Chemical Engineering, Manufacturing, Manufacture for specific uses, and Buildings related books.'),
(8, '700-799', 'Arts', 'This classification includes Arts, Civic & landscape art, Architecture, Plastic Arts, Sculpture, Drawing & decorative arts, Painting & Paintings, Graphic arts, Printmaking & prints,Photography & photographs, Music, Recreational and performing arts related books.'),
(9, '800-899', 'Literature', 'This class includes Literature, rhetoric & criticism, American literature in English, English & Old English literatures, German & related literatures, Literature of Romance languages, Italian, Romanian, Rhaeto-Romanic, Spanish & portugese literatures, Italic literatures; Latin literature, Hellenic literatures; Classical Greek, and Literature of other languages related books.'),
(10, '900-999', 'History, geography, (& biography)', 'This classification includes History, Geography & travel, Biography, genealogy, insignia, History of ancient world (to ca. 499), General history of Europe, General history of Asia; Far East, General history of Africa, General history of North America, General history of South America and General history of other areas related books');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `penalty_id` int(11) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `penalty_id`, `payment_date`, `amount`) VALUES
(1, 1, '2012-03-06', 10),
(2, 1, '2012-03-06', 100),
(3, 7, '2012-03-06', 100),
(4, 7, '2012-03-06', 100),
(5, 7, '2012-03-06', 2),
(6, 7, '2012-03-06', 2),
(7, 7, '2012-03-06', 2),
(8, 7, '2012-03-06', 2),
(9, 7, '2012-03-06', 2),
(10, 7, '2012-03-06', 2),
(11, 7, '2012-03-06', 100),
(12, 7, '2012-03-06', 2),
(13, 7, '2012-03-06', 2),
(14, 7, '2012-03-06', 2),
(15, 7, '2012-03-06', 2),
(16, 7, '2012-03-06', 2),
(17, 7, '2012-03-06', 2),
(18, 7, '2012-03-06', 2),
(19, 7, '2012-03-06', 2),
(20, 10, '2012-03-06', 100),
(21, 10, '2012-03-06', 20),
(22, 10, '2012-03-06', 300),
(23, 10, '2012-03-06', 100),
(24, 10, '2012-03-16', 100),
(25, 10, '2012-03-16', 10),
(26, 10, '2012-03-16', 100),
(27, 10, '2012-03-16', 8),
(28, 10, '2012-03-16', 12),
(29, 10, '2012-03-16', 10),
(30, 7, '2012-03-17', 20),
(31, 7, '2012-03-17', 1),
(32, 7, '2012-03-17', 9),
(33, 7, '2012-03-17', 9),
(34, 7, '2012-03-17', 9),
(35, 7, '2012-03-17', 2),
(36, 7, '2012-03-17', 2),
(37, 7, '2012-03-17', 2),
(38, 7, '2012-03-17', 2),
(39, 7, '2012-03-17', 2),
(40, 7, '2012-03-17', 2),
(41, 7, '2012-03-17', 2),
(42, 7, '2012-03-17', 2),
(43, 7, '2012-03-17', 2),
(44, 7, '2012-03-17', 2),
(45, 7, '2012-03-17', 2),
(46, 7, '2012-03-17', 2),
(47, 7, '2012-03-17', 2),
(48, 7, '2012-03-17', 2),
(49, 7, '2012-03-17', 2),
(50, 7, '2012-03-17', 2),
(51, 7, '2012-03-17', 2),
(52, 9, '2012-03-17', 100),
(53, 9, '2012-03-17', 1),
(54, 9, '2012-03-17', 1),
(55, 9, '2012-03-17', 1),
(56, 9, '2012-03-17', 2),
(57, 9, '2012-03-17', 5),
(58, 9, '2012-03-17', 1),
(59, 9, '2012-03-17', 1),
(60, 9, '2012-03-17', 3),
(61, 9, '2012-03-17', 2),
(62, 9, '2012-03-17', 1),
(63, 9, '2012-03-17', 1),
(64, 9, '2012-03-17', 1),
(65, 9, '2012-03-17', 1),
(66, 9, '2012-03-17', 1),
(67, 9, '2012-03-17', 1),
(68, 9, '2012-03-17', 1),
(69, 9, '2012-03-17', 1),
(70, 9, '2012-03-17', 1),
(71, 9, '2012-03-17', 1),
(72, 9, '2012-03-17', 1),
(73, 10, '2012-03-17', 1),
(74, 10, '2012-03-17', 19),
(75, 11, '2012-03-18', 12),
(76, 11, '2012-03-19', 100),
(77, 9, '2012-03-19', 12),
(78, 9, '2012-03-19', 40),
(79, 13, '2012-03-19', 2),
(80, 13, '2012-03-19', 2),
(81, 11, '2012-03-19', 2),
(82, 11, '2012-03-19', 1),
(83, 11, '2012-03-19', 1),
(84, 11, '2012-03-19', 1),
(85, 11, '2012-03-19', 1),
(86, 11, '2012-03-19', 1),
(87, 11, '2012-03-19', 1),
(88, 11, '2012-03-19', 1),
(89, 11, '2012-03-19', 1),
(90, 11, '2012-03-19', 1),
(91, 11, '2012-03-19', 1),
(92, 11, '2012-03-19', 1),
(93, 11, '2012-03-19', 1),
(94, 11, '2012-03-19', 1),
(95, 11, '2012-03-19', 1),
(96, 11, '2012-03-19', 1),
(97, 11, '2012-03-19', 1),
(98, 11, '2012-03-19', 1),
(99, 11, '2012-03-19', 1),
(100, 11, '2012-03-19', 1),
(101, 11, '2012-03-19', 1),
(102, 11, '2012-03-19', 1),
(103, 11, '2012-03-19', 1),
(104, 11, '2012-03-19', 1),
(105, 13, '2012-03-19', 8),
(106, 11, '2012-03-19', 12),
(107, 11, '2012-03-19', 2),
(108, 11, '2012-03-19', 1),
(109, 11, '2012-03-19', 60),
(110, 11, '2012-03-19', 50),
(111, 11, '2012-03-19', 650),
(112, 15, '2012-04-03', 20),
(113, 23, '2012-04-04', 12),
(114, 23, '2012-04-04', 2),
(115, 23, '2012-04-04', 2),
(116, 23, '2012-04-04', 2),
(117, 23, '2012-04-04', 2),
(118, 23, '2012-04-04', 2),
(119, 23, '2012-04-04', 2),
(120, 23, '2012-04-04', 2),
(121, 23, '2012-04-04', 2),
(122, 23, '2012-05-17', 2),
(123, 23, '2012-05-17', 2),
(124, 23, '2012-05-17', 2),
(125, 23, '2012-05-17', 2),
(126, 23, '2012-05-17', 2),
(127, 23, '2012-05-17', 2),
(128, 23, '2012-05-17', 2),
(129, 23, '2012-05-17', 2),
(130, 23, '2012-05-17', 2),
(131, 23, '2012-05-17', 2),
(132, 23, '2012-05-17', 2),
(133, 23, '2012-05-17', 2),
(134, 23, '2012-05-17', 2),
(135, 23, '2012-05-17', 2),
(136, 23, '2012-05-17', 2),
(137, 23, '2012-05-17', 2),
(138, 23, '2012-05-17', 2),
(139, 23, '2012-05-17', 2),
(140, 23, '2012-05-17', 2),
(141, 23, '2012-05-17', 2),
(142, 23, '2012-05-17', 2),
(143, 23, '2012-05-17', 2),
(144, 23, '2012-05-17', 2),
(145, 23, '2012-05-17', 2),
(146, 23, '2012-05-17', 2),
(147, 23, '2012-05-17', 2),
(148, 23, '2012-05-17', 2),
(149, 23, '2012-05-17', 2),
(150, 23, '2012-05-17', 2),
(151, 23, '2012-05-17', 2),
(152, 23, '2012-05-17', 2),
(153, 23, '2012-05-17', 2),
(154, 23, '2012-05-17', 2),
(155, 23, '2012-05-17', 2),
(156, 23, '2012-05-17', 2),
(157, 23, '2012-05-17', 2),
(158, 23, '2012-05-17', 2),
(159, 23, '2012-05-17', 2),
(160, 23, '2012-05-17', 2),
(161, 23, '2012-05-17', 2),
(162, 23, '2012-05-17', 2),
(163, 23, '2012-05-17', 2),
(164, 23, '2012-05-17', 2),
(165, 23, '2012-05-17', 2),
(166, 23, '2012-05-17', 2),
(167, 23, '2012-05-17', 2),
(168, 23, '2012-05-17', 2),
(169, 23, '2012-05-17', 2),
(170, 23, '2012-05-17', 2),
(171, 23, '2012-05-17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE IF NOT EXISTS `penalty` (
  `penalty_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL,
  `num_of_days` int(11) NOT NULL,
  `penalty_total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`penalty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `transaction_id`, `penalty_amount`, `num_of_days`, `penalty_total`, `status`, `balance`, `description`) VALUES
(7, 5, 12, 34, 408, 'paid', 0, 'overdue'),
(9, 2, 12, 65, 780, 'installment', 600, 'overdue'),
(10, 2, 12, 65, 780, 'paid', 0, 'overdue'),
(11, 8, 12, 76, 912, 'paid', 0, 'overdue'),
(13, 6, 12, 16, 192, 'installment', 180, 'overdue'),
(14, 0, 3, 0, 0, 'unpaid', 0, 'overdue'),
(15, 6, 3, 32, 96, 'installment', 76, 'overdue'),
(16, 4, 3, 62, 186, 'unpaid', 186, 'overdue'),
(17, 3, 3, 23, 69, 'unpaid', 69, 'overdue'),
(18, 2, 3, 93, 279, 'unpaid', 279, 'overdue'),
(19, 33, 3, 93, 279, 'unpaid', 279, 'overdue'),
(20, 25, 3, 93, 279, 'unpaid', 279, 'overdue'),
(21, 0, 0, 0, 0, 'unpaid', 0, 'lost'),
(22, 39, 3, 91, 273, 'unpaid', 273, 'overdue'),
(23, 47, 3, 91, 273, 'installment', 145, 'overdue'),
(24, 0, 0, 0, 500, 'unpaid', 500, 'lost'),
(25, 0, 0, 0, 0, 'unpaid', 0, 'lost'),
(26, 0, 0, 0, 0, 'unpaid', 0, 'lost'),
(27, 0, 0, 0, 0, 'unpaid', 0, 'lost');

-- --------------------------------------------------------

--
-- Table structure for table `penalty_amount`
--

CREATE TABLE IF NOT EXISTS `penalty_amount` (
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty_amount`
--

INSERT INTO `penalty_amount` (`amount`) VALUES
(5);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id_num` varchar(50) NOT NULL,
  `book_id` varchar(150) NOT NULL,
  `date_requested` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `student_id_num`, `book_id`, `date_requested`, `state`) VALUES
(1, 'CP0023', '1', '2012-05-16', ''),
(2, 'CP0023', '2', '2012-05-16', ''),
(3, 'CP0023', '3', '2012-05-16', ''),
(4, 'CP0023', '1', '2012-05-16', ''),
(5, 'CP0023', '2', '2012-05-16', ''),
(6, 'CP0023', '3', '2012-05-16', ''),
(7, 'CP0023', '1', '2012-05-16', ''),
(8, 'CP0023', '2', '2012-05-16', ''),
(9, 'CP0023', '3', '2012-05-16', ''),
(10, 'CP0023', '1', '2012-05-16', ''),
(11, 'CP0023', '2', '2012-05-16', ''),
(12, 'CP0023', '3', '2012-05-16', ''),
(13, 'CP0023', '1', '2012-05-16', ''),
(14, 'CP0023', '2', '2012-05-16', ''),
(15, 'CP0023', '3', '2012-05-16', ''),
(16, 'CP0023', '1', '2012-05-16', ''),
(17, 'CP0023', '2', '2012-05-16', ''),
(18, 'CP0023', '3', '2012-05-16', ''),
(19, 'CP0023', '1', '2012-05-16', ''),
(20, 'CP0023', '2', '2012-05-16', ''),
(21, 'CP0023', '3', '2012-05-16', ''),
(22, 'CP0023', '1', '2012-05-16', ''),
(23, 'CP0023', '2', '2012-05-16', ''),
(24, 'CP0023', '3', '2012-05-16', ''),
(25, 'CP0023', '1', '2012-05-16', ''),
(26, 'CP0023', '2', '2012-05-16', ''),
(27, 'CP0023', '3', '2012-05-16', ''),
(28, 'CP0023', '1', '2012-05-16', ''),
(29, 'CP0023', '2', '2012-05-16', ''),
(30, 'CP0023', '3', '2012-05-16', ''),
(31, 'CP0023', '1', '2012-05-16', ''),
(32, 'CP0023', '2', '2012-05-16', ''),
(33, 'CP0023', '3', '2012-05-16', ''),
(34, 'CP0023', '1', '2012-05-16', ''),
(35, 'CP0023', '2', '2012-05-16', ''),
(36, 'CP0023', '3', '2012-05-16', ''),
(37, 'CP0023', '1', '2012-05-16', ''),
(38, 'CP0023', '2', '2012-05-16', ''),
(39, 'CP0023', '3', '2012-05-16', ''),
(40, 'CP0023', '1', '2012-05-16', ''),
(41, 'CP0023', '2', '2012-05-16', ''),
(42, 'CP0023', '3', '2012-05-16', ''),
(43, 'CP0023', '1', '2012-05-16', ''),
(44, 'CP0023', '2', '2012-05-16', ''),
(45, 'CP0023', '3', '2012-05-16', ''),
(46, 'CP0023', '1', '2012-05-16', ''),
(47, 'CP0023', '2', '2012-05-16', ''),
(48, 'CP0023', '3', '2012-05-16', ''),
(49, 'CP0023', '1', '2012-05-16', ''),
(50, 'CP0023', '2', '2012-05-16', ''),
(51, 'CP0023', '3', '2012-05-16', ''),
(52, 'CP0023', '1', '2012-05-16', ''),
(53, 'CP0023', '2', '2012-05-16', ''),
(54, 'CP0023', '3', '2012-05-16', ''),
(55, 'CP0023', '1', '2012-05-16', ''),
(56, 'CP0023', '2', '2012-05-16', ''),
(57, 'CP0023', '3', '2012-05-16', ''),
(58, 'CP0023', '1', '2012-05-16', ''),
(59, 'CP0023', '2', '2012-05-16', ''),
(60, 'CP0023', '3', '2012-05-16', ''),
(61, 'CP0023', '1', '2012-05-16', ''),
(62, 'CP0023', '2', '2012-05-16', ''),
(63, 'CP0023', '3', '2012-05-16', ''),
(64, 'CP0023', '1', '2012-05-16', ''),
(65, 'CP0023', '2', '2012-05-16', ''),
(66, 'CP0023', '3', '2012-05-16', ''),
(67, 'CP0023', '1', '2012-05-16', ''),
(68, 'CP0023', '2', '2012-05-16', ''),
(69, 'CP0023', '3', '2012-05-16', ''),
(70, 'CP0023', '1', '2012-05-16', ''),
(71, 'CP0023', '2', '2012-05-16', ''),
(72, 'CP0023', '3', '2012-05-16', ''),
(73, 'CP0023', '1', '2012-05-16', ''),
(74, 'CP0023', '2', '2012-05-16', ''),
(75, 'CP0023', '3', '2012-05-16', ''),
(76, 'CP0023', '1', '2012-05-16', ''),
(77, 'CP0023', '2', '2012-05-16', ''),
(78, 'CP0023', '3', '2012-05-16', ''),
(79, 'CP0023', '1', '2012-05-16', ''),
(80, 'CP0023', '2', '2012-05-16', ''),
(81, 'CP0023', '3', '2012-05-16', ''),
(82, 'CP0023', '1', '2012-05-16', ''),
(83, 'CP0023', '2', '2012-05-16', ''),
(84, 'CP0023', '3', '2012-05-16', ''),
(85, 'CP0023', '1', '2012-05-16', ''),
(86, 'CP0023', '2', '2012-05-16', ''),
(87, 'CP0023', '3', '2012-05-16', ''),
(88, 'CP0023', '1', '2012-05-16', ''),
(89, 'CP0023', '2', '2012-05-16', ''),
(90, 'CP0023', '3', '2012-05-16', ''),
(91, 'CP0023', '1', '2012-05-16', ''),
(92, 'CP0023', '2', '2012-05-16', ''),
(93, 'CP0023', '3', '2012-05-16', ''),
(94, 'CP0023', '1', '2012-05-16', ''),
(95, 'CP0023', '2', '2012-05-16', ''),
(96, 'CP0023', '3', '2012-05-16', ''),
(97, 'CP0023', '1', '2012-05-16', ''),
(98, 'CP0023', '2', '2012-05-16', ''),
(99, 'CP0023', '3', '2012-05-16', ''),
(100, 'CP0023', '1', '2012-05-16', ''),
(101, 'CP0023', '2', '2012-05-16', ''),
(102, 'CP0023', '3', '2012-05-16', ''),
(103, 'CP0023', '1', '2012-05-16', ''),
(104, 'CP0023', '2', '2012-05-16', ''),
(105, 'CP0023', '3', '2012-05-16', ''),
(106, 'CP0023', '1', '2012-05-16', ''),
(107, 'CP0023', '2', '2012-05-16', ''),
(108, 'CP0023', '3', '2012-05-16', ''),
(109, 'CP0023', '1', '2012-05-16', ''),
(110, 'CP0023', '2', '2012-05-16', ''),
(111, 'CP0023', '3', '2012-05-16', ''),
(112, 'CP0023', '1', '2012-05-16', ''),
(113, 'CP0023', '2', '2012-05-16', ''),
(114, 'CP0023', '3', '2012-05-16', ''),
(115, 'CP0023', '1', '2012-05-16', ''),
(116, 'CP0023', '2', '2012-05-16', ''),
(117, 'CP0023', '3', '2012-05-16', ''),
(118, 'CP0023', '1', '2012-05-16', ''),
(119, 'CP0023', '2', '2012-05-16', ''),
(120, 'CP0023', '3', '2012-05-16', ''),
(121, 'CP0023', '1', '2012-05-16', ''),
(122, 'CP0023', '2', '2012-05-16', ''),
(123, 'CP0023', '3', '2012-05-16', ''),
(124, 'CP0023', '1', '2012-05-16', ''),
(125, 'CP0023', '2', '2012-05-16', ''),
(126, 'CP0023', '3', '2012-05-16', ''),
(127, 'CP0023', '1', '2012-05-16', ''),
(128, 'CP0023', '2', '2012-05-16', ''),
(129, 'CP0023', '3', '2012-05-16', ''),
(130, 'CP0023', '1', '2012-05-16', ''),
(131, 'CP0023', '2', '2012-05-16', ''),
(132, 'CP0023', '3', '2012-05-16', ''),
(133, 'CP0023', '1', '2012-05-16', ''),
(134, 'CP0023', '2', '2012-05-16', ''),
(135, 'CP0023', '3', '2012-05-16', ''),
(136, 'CP0023', '1', '2012-05-16', ''),
(137, 'CP0023', '2', '2012-05-16', ''),
(138, 'CP0023', '3', '2012-05-16', ''),
(139, 'CP0023', '1', '2012-05-16', ''),
(140, 'CP0023', '2', '2012-05-16', ''),
(141, 'CP0023', '3', '2012-05-16', ''),
(142, 'CP0023', '1', '2012-05-16', ''),
(143, 'CP0023', '2', '2012-05-16', ''),
(144, 'CP0023', '3', '2012-05-16', ''),
(145, 'CP0023', '1', '2012-05-16', ''),
(146, 'CP0023', '2', '2012-05-16', ''),
(147, 'CP0023', '3', '2012-05-16', ''),
(148, 'CP0023', '1', '2012-05-16', ''),
(149, 'CP0023', '2', '2012-05-16', ''),
(150, 'CP0023', '3', '2012-05-16', ''),
(151, 'CP0023', '1', '2012-05-16', ''),
(152, 'CP0023', '2', '2012-05-16', ''),
(153, 'CP0023', '3', '2012-05-16', ''),
(154, 'CP0023', '1', '2012-05-16', ''),
(155, 'CP0023', '2', '2012-05-16', ''),
(156, 'CP0023', '3', '2012-05-16', ''),
(157, 'CP0023', '1', '2012-05-16', ''),
(158, 'CP0023', '2', '2012-05-16', ''),
(159, 'CP0023', '3', '2012-05-16', ''),
(160, 'CP0023', '1', '2012-05-16', ''),
(161, 'CP0023', '2', '2012-05-16', ''),
(162, 'CP0023', '3', '2012-05-16', ''),
(163, 'CP0023', '1', '2012-05-16', ''),
(164, 'CP0023', '2', '2012-05-16', ''),
(165, 'CP0023', '3', '2012-05-16', ''),
(166, 'CP0023', '1', '2012-05-16', ''),
(167, 'CP0023', '2', '2012-05-16', ''),
(168, 'CP0023', '3', '2012-05-16', ''),
(169, 'CP0023', '1', '2012-05-17', ''),
(170, 'CP0023', '2', '2012-05-17', ''),
(171, 'CP0023', '3', '2012-05-17', ''),
(172, 'CP0023', '1', '2012-05-17', ''),
(173, 'CP0023', '2', '2012-05-17', ''),
(174, 'CP0023', '1', '2012-05-17', ''),
(175, 'CP0023', '1', '2012-05-17', ''),
(176, 'CP0023', '2', '2012-05-17', ''),
(177, 'CP0023', '3', '2012-05-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_access_num` varchar(20) NOT NULL,
  `date_issue` varchar(25) NOT NULL,
  `date_due` varchar(25) NOT NULL,
  `date_returned` varchar(25) NOT NULL,
  `borrowers_id` varchar(100) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `book_access_num`, `date_issue`, `date_due`, `date_returned`, `borrowers_id`) VALUES
(2, '', '2012-1-1', '2012-1-1', '2012-04-03', 'CP001'),
(3, '', '2012-2-3', '2012-3-11', '2012-04-03', 'CP002'),
(4, '', '2012-2-18', '2012-2-1', '2012-04-03', 'CP003'),
(6, '', '2011-4-19', '2012-3-2', '2012-04-03', 'CP004'),
(8, '', '2012-1-1', '2012-1-1', '2012-03-19', 'CP005'),
(22, '', '2012-1-1', '2012-1-1', '', 'ABC123'),
(23, '', '2012-1-1', '2012-1-1', '', '100503002000099'),
(24, '2556', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(25, '2556', '2012-1-1', '2012-1-1', '2012-04-03', '10-05-03-0020-00099'),
(26, '2556', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(27, '2554', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(28, '2557', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(29, '2557', '2012-1-1', '2012-1-1', '', 'oil;kl'),
(30, '2557', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(31, '2557', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(32, '2560', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(33, '2560', '2012-1-1', '2012-1-1', '2012-04-03', '10-05-03-0020-00099'),
(34, '2560', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(35, '2560', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(36, '2560', '2012-1-1', '2012-1-1', '', 'cp98908'),
(37, 'oioii', '2012-1-1', '2012-1-1', '', 'oioi'),
(38, '2557', '2012-1-1', '2012-1-1', '', 'jjhj'),
(39, '2558', '2012-1-1', '2012-1-3', '2012-04-03', '10-05-03-0020-00099'),
(40, '2557', '2012-1-1', '2012-1-5', '', '10-05-03-0020-00099'),
(41, '', '2012-1-1', '2012-1-1', '', ''),
(42, '', '2012-1-1', '2012-1-1', '', '10-05-03-0020-00099'),
(43, '2557', '2012-1-1', '2012-1-4', '', '10-05-03-0020-00099'),
(44, '2560', '2012-1-1', '2012-7-1', '', '10-05-03-0020-00098'),
(45, '2554', '2012-1-1', '2012-1-5', '', '10-05-03-0020-00099'),
(46, '2556', '2012-1-1', '2012-1-9', '', '10-05-03-0020-00097'),
(47, '2559', '2012-1-1', '2012-1-4', '2012-04-04', 'CP001'),
(48, '2556', '2012-1-1', '2012-1-10', '', 'CP001'),
(49, '2558', '2012-1-1', '2012-1-16', '', 'CP001');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `firstname`, `lastname`, `username`, `email`, `password`, `course`, `address`, `contact`, `level`) VALUES
(1, '', 'Gilbert', 'Fruel', 'admin', 'gilbert@yahoo.com', 'f2b14f68eb995facb3a1c35287b778d5bd785511', '1st Year	-  International Cookery', 'Bulacan', '098377778977', 'admin'),
(2, '10-05-03-0020-00099', 'Monaliza', 'Estrella', 'monster', 'mona@yahoo.com', '7b882a21853f0b63d69e7564a062620ed975f9bb', '2nd Year	-  Computer Programming', 'Guiguinto, Bulacan', '09265836553', 'student'),
(6, '10-05-03-0020-00098', 'Rachele Ann', 'jhkhjk', 'jlkjlkkljkl', 'juan@yahoo.com', 'b0399d2029f64d445bd131ffaa399a42d2f8e7dc', '1st Year	-  AB Broadcasting', 'nkjhkjhk', 'kjkjkjk', 'student'),
(7, '10-05-03-0020-00097', 'mksks', 'jjkkdjlkjsdk', 'koko', 'koko@yahoo.com', 'e3f10b139492bb24516699d94afab5e8546e6880', '', 'kokokoko', '08098', 'student'),
(8, 'CP001', 'Dennis', 'Almazora', 'densho', 'dennis@yahoo.com', '7965a665163253a12f43312bf69d07012a113a2a', '2nd Year	-  Computer Programming', '', '09899', 'student'),
(9, 'CP0023', 'Eunice', 'Orozco', 'eunice', 'loveunice979@gmail.com', '0755d900a39f31b9c5856c33e38f185ba73f0acb', '2nd Year	-  Computer Programming', 'Ramada, Maria Aurora, Aurora', '09387321241', 'student'),
(10, 'CP003', 'Zandy', 'Tacuel', 'zandy', 'zandytacuel@gmail.com', '1ebb501b9f7d458ed9ad933678a3c0aeb6a85cb5', '2nd Year	-  Computer Programming', 'tarlac', '09384069024', 'student');
