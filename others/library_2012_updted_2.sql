-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2012 at 07:11 AM
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
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`) VALUES
(1, 'Jose', 'Rizal'),
(2, 'Andres', 'Boni'),
(3, 'Andres', 'Boni'),
(4, 'Andres', 'Boni'),
(5, 'Pauline', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `copyright`, `publisher`, `page_number`, `classification_id`, `author_id`, `description`, `unit_price`, `original_stock`, `remaining_stock`, `location`) VALUES
(1, 'Mga Halaman-Kahangahangang Pampagaling', 'c1989', 'Philippine Publishing House', '157', 1, 1, '', 500, 1, 0, ''),
(2, 'Applied Consumer Psychology', 'c2005', 'Rex Bookstore', 'iii-243\r', 1, 1, '', 0, 1, 0, ''),
(3, 'Basic Nutrition for Filipinos-4th Edition', 'c1996', 'Meriam Webster Book Store', '470\r', 1, 1, '', 0, 1, 0, ''),
(4, 'Zoology Laboratory Manual', 'c2005', 'Anvil Publication', '185\r', 1, 1, '', 0, 2, 2, ''),
(5, 'Invitation To Wonder(An introduction to Philosophical Thought)', 'c1989', 'Solar Publishing Corp.', '253\r', 1, 1, '', 0, 1, 0, ''),
(6, 'English Proficiency Instruction for Effective Communication', '-', '-', '190\r', 1, 1, '', 0, 2, 0, ''),
(7, 'Design of Machine Members', 'c1978', 'McGraw Hill Book Company', 'v-520\r', 1, 1, '', 0, 1, 0, ''),
(8, 'Trigonometry, Plain and Spherical', 'c1963', 'Royal Publishing House Inc.', 'v-103\r', 1, 1, '', 0, 1, 0, ''),
(9, 'MAKAMISA The search for Rizal''s Third Novel', 'c2008', 'Anvil Publication', '5-152\r', 1, 1, '', 0, 4, 0, ''),
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
(48, 'gadgafg', '123df', 'fgdf', '123444', 1, 3, '', 1111, 1, 1, 'sdfsg geg');

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
(1, 2556, 'out'),
(2, 2557, 'out'),
(3, 2558, 'out'),
(4, 2559, 'in'),
(4, 2560, 'in'),
(5, 2561, 'out'),
(6, 2562, 'out'),
(7, 2563, 'out'),
(8, 2564, 'out'),
(9, 2565, 'out'),
(9, 2566, 'out'),
(9, 2567, 'out'),
(9, 2568, 'out'),
(9, 2569, 'out');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE IF NOT EXISTS `borrowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lname` varchar(1000) NOT NULL,
  `course` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `student_id_2` (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `student_id`, `name`, `lname`, `course`, `address`, `contact`) VALUES
(7, 11009543, 'Pauline', 'Maunes', 'Com prog', 'Paco', '09103283132'),
(6, 11009547, 'Zandy', 'Tinacuel', 'Com prog', 'Tarlac', '09103283135'),
(5, 11009546, 'Vanessa', 'Hudgins', 'Mass Com', 'Pangasinan', '09384069024'),
(8, 11009544, 'Eunice', 'Orozco', 'Com prog', 'Aurora', '09303417585'),
(9, 11009542, 'Monaliza', 'Estrella', 'Com prog', 'Bulacan', '09103283100');

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE IF NOT EXISTS `classification` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `class_code` varchar(10) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`id`, `class_code`, `class_name`, `class_description`) VALUES
(1, '000-099', 'Computer Science, information and general works', 'This class includes Computer Science, knowledge and systems, Bibliographies, Library & information sciences, Encyclopedias & books of facts, formerly collected essays by language, Magazines, journals & serials, Associations, organizations & museums, News media, journalism & publishing, General collections, Manuscripts & rare books.'),
(2, '100-199', 'Philosophy and Psychology', 'This class includes Philosophy, Metaphysics, Epistemology, Parapsychology & occultism, Philosophical schools of thought, Psychology, Logic, Ethics (Moral Philosophy), Ancient, medieval & Eastern Philosophy and Modern Western Philosophy books '),
(3, '200-299', 'Religion', 'This class includes the Religion, Natural Theology, Bible, Christian Theology, Christian Moral & devotional theology, Christian orders & local church, Christian social theology, Christian church history, Christian denominations & sects, and other comparative religions related books'),
(4, '300-399', 'Social Sciences', 'This class includes the Social sciences, sociology & anthropology, General Statistics, Political Science , Economics, Law, Public Administration, Social Services, Education, Commerce, communications, transport, Customs, Etiquette, and Folklore books'),
(5, '400-499', 'Language', 'This class includes Language, Linguistics, English & Old English, German Languages, Romance Languages, French, Italian, Romanian, Rhaeto-Romanic, Spanish, Portuguese,Italic, Latin, Hellenic, Classical Greek, and other languages books. '),
(6, '500-599', 'Science', 'This class includes Sciences, Mathematics, Astronomy & allied sciences, Physics, Chemistry & allied sciences, Earth sciences, Paleontology, Paleozoology, Life Sciences, Plants, and  Zoological sciences/Animals related books.'),
(7, '600-699', 'Technology', 'This class includes the Technology(Applied Sciences), Medical Sciences, Medicine, Engineering & applied operations, Agriculture, Home Economics & family living, Management & auxiliary services, Chemical Engineering, Manufacturing, Manufacture for specific uses, and Buildings related books.'),
(8, '700-799', 'Arts', 'This class includes Arts, Civic & landscape art, Architecture, Plastic Arts, Sculpture, Drawing & decorative arts, Painting & Paintings, Graphic arts, Printmaking & prints,Photography & photographs, Music, Recreational and performing arts related books.'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(23, 10, '2012-03-06', 100);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `transaction_id`, `penalty_amount`, `num_of_days`, `penalty_total`, `status`, `balance`, `description`) VALUES
(1, 1, 10, 12, 120, 'paid', 0, 'overdue'),
(7, 5, 12, 34, 408, 'installment', 80, 'overdue'),
(8, 6, 0, 0, 0, 'unpaid', 0, 'lost'),
(9, 2, 12, 65, 780, 'unpaid', 780, 'overdue'),
(10, 2, 12, 65, 780, 'installment', 260, 'overdue');

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
(12);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_access_num` varchar(255) NOT NULL,
  `borrowers_id` int(11) NOT NULL,
  `date_issue` varchar(25) NOT NULL,
  `date_due` varchar(25) NOT NULL,
  `date_returned` varchar(25) NOT NULL,
  PRIMARY KEY (`trans_id`),
  UNIQUE KEY `ISBN` (`book_access_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `book_access_num`, `borrowers_id`, `date_issue`, `date_due`, `date_returned`) VALUES
(1, '2562', 11009542, '2012-02-25', '2012-1-1', '2012-02-25'),
(2, '2556', 11009544, '2012-02-25', '2012-1-1', '2012-03-06'),
(3, '2559', 11009544, '2012-03-06', '2012-1-1', '2012-03-06'),
(4, '2560', 11009544, '2012-03-06', '2012-1-1', '2012-03-06'),
(5, '2561', 11009543, '2012-03-06', '2012-2-1', '2012-03-06'),
(6, '2563', 11009546, '2012-03-06', '2012-3-1', ''),
(7, '2566', 11009544, '2012-03-06', '2012-1-1', ''),
(8, '2568', 11009547, '2012-03-06', '2012-1-1', '');
