-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lats_name` varchar(70) NOT NULL,
  `first_name` varchar(70) DEFAULT NULL,
  `pseudo` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `authors` (`id`, `lats_name`, `first_name`, `pseudo`) VALUES
(1,	'PIEKNY',	'Marlène',	'Pieknouche'),
(2,	'MARTINET',	'Pierrick',	'Piouk'),
(3,	'BOTELLA',	'Steve',	'Yves'),
(4,	'ZIDANE',	'Valentine',	'Valentine'),
(5,	'DURAND',	NULL,	'Matéo');

DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `Categories` (`id`, `name`) VALUES
(1,	'Loisirs');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `authors_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_authors_idx` (`authors_id`),
  KEY `fk_comments_posts1_idx` (`posts_id`),
  CONSTRAINT `fk_comments_authors` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `text`, `comment_date`, `authors_id`, `posts_id`) VALUES
(1,	'trop cool !',	'2021-01-21 13:33:02',	5,	1),
(2,	'Bravo',	'2021-01-21 13:35:05',	3,	2),
(3,	'Sans avis',	'2021-01-21 13:35:05',	1,	1);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `text` varchar(150) NOT NULL,
  `publication_date` datetime NOT NULL,
  `end_publication_date` datetime NOT NULL,
  `degrees_importance` int(11) NOT NULL DEFAULT 0,
  `authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_authors1_idx` (`authors_id`),
  CONSTRAINT `fk_posts_authors1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `text`, `publication_date`, `end_publication_date`, `degrees_importance`, `authors_id`) VALUES
(1,	'Un sport de glisse incroyable',	'Le biathlon c\'est formidable',	'2021-01-21 13:18:51',	'2021-01-28 13:18:51',	2,	5),
(2,	'Un sport tout en glissage',	'Je me suis boité en biathlon, ça fait hyper mal !',	'2021-01-21 13:21:35',	'2021-01-28 13:21:35',	3,	1);

DROP TABLE IF EXISTS `posts_has_Categories`;
CREATE TABLE `posts_has_Categories` (
  `posts_id` int(11) NOT NULL,
  `Categories_id` int(11) NOT NULL,
  PRIMARY KEY (`posts_id`,`Categories_id`),
  KEY `fk_posts_has_Categories_Categories1_idx` (`Categories_id`),
  KEY `fk_posts_has_Categories_posts1_idx` (`posts_id`),
  CONSTRAINT `fk_posts_has_Categories_Categories1` FOREIGN KEY (`Categories_id`) REFERENCES `Categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_has_Categories_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-01-25 10:33:03
