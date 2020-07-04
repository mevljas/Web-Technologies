drop database if exists security_examples;
create database security_examples;
use security_examples;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE `user1` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `user1` VALUES 
(1,'user', 'password'), 
(2,'student', 'vaje'),
(3,'asistent', 'vaje');

CREATE TABLE `user2` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `user2` VALUES 
(1,'user', '$2y$10$6QZqRs9p/3mOUEVSnu60MuVBeYa24mt945zAIZaWj0amcNwsw7uxC'),     -- password
(2,'student', '$2y$10$r0PrTFgj8yFPYy1VwvIoj.309SYaXqDaF/EJARooyhat/1gPw0zo2'),  -- vaje
(3,'asistent', '$2y$10$xXvdnL5FadXAwctopETgZu.TIUcLGyNQUajTHLPIwA0.Q3C9ouoaW'); -- vaje

CREATE TABLE `jokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joke_text` text,
  `joke_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- vnosi v tabelo
INSERT INTO `jokes` (joke_text, joke_date) VALUES ('Chuck Norris can write infinite recursion functions ... and have them return.', NOW());
INSERT INTO `jokes` (joke_text, joke_date) VALUES ('Chuck can hit you so hard your web app will turn into swing application.', NOW());
INSERT INTO `jokes` (joke_text, joke_date) VALUES ('The functions Chuck Norris writes have no arguments, because nobody argues with Chuck Norris.', NOW());

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
