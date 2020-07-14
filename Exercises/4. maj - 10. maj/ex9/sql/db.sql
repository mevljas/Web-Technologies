drop database if exists bookstore;
create database bookstore;
use bookstore;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `description` text COLLATE utf8_slovenian_ci,
  `price` float NOT NULL DEFAULT '0',
  `year` int(4) NOT NULL,
  `quantity` int(11) unsigned NOT NULL DEFAULT '10'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE `user` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `book` (`id`, `author`, `title`, `description`, `price`, `year`, `quantity`) VALUES
(1, 'Ivan Bratko', 'Prolog Programming for Artificial Intelligence', 'This best-selling guide to Prolog and Artificial Intelligence, which has been updated to include key developments in the field, concentrates on the art of using the basic mechanisms of Prolog to solve interesting AI problems.', 70, 2011, 5),
(2, 'Dušan Kodek', 'Arhitektura računalniških sistemov', 'Knjiga Arhitektura in Organizacija Računalniških Sistemov prinaša znanja, ki so potrebna za razumevanje in uporabo današnjih računalnikov. V prvi vrsti je namenjena študentom računalništva in informatike; zanje je razumevanje dogajanja v strojih, ki jim pravimo računalniki, potreba in sestavni del študija. Knjiga bo koristna tudi za vse, ki že dolgo delajo z računalniki in bi radi bolje razumeli dogajanje v njih. Posebno zanimiva bo za sistemske programerje, ki delajo na prevajalnikih in operacijskih sistemih, in ki brez razumevanja pogosto zapletenih podrobnosti v delovanju, ne morejo dobro opraviti svojega dela.', 85, 2008, 5),
(3, 'Denis Trček', 'Managing Information Systems Security and Privacy', 'The book deals with the management of information systems security and privacy, based on a model that covers technological, organizational and legal views. This is the basis for a focused and methodologically structured approach that presents "the big picture" of information systems security and privacy, while targeting managers and technical profiles. The book addresses principles in the background, regardless of a particular technology or organization. It enables a reader to suit these principles to an organization''s needs and to implement them accordingly by using explicit procedures from the book. Additionally, the content is aligned with relevant standards and the latest trends. Scientists from social and technical sciences are supposed to find a framework for further research in this broad area, characterized by a complex interplay between human factors and technical issues.', 128, 2006, 5),
(4, 'FRI', 'Študijski koledar', '', 10, 2015, 1000);

ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD FULLTEXT KEY `author` (`author`,`title`,`description`);


ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

INSERT INTO `user` VALUES 
(1,'user', 'password'), 
(2,'student', 'vaje');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
