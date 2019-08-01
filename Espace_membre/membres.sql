-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 01 août 2019 à 18:38
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `Admin` int(11) NOT NULL DEFAULT '0',
  `Users` int(11) NOT NULL DEFAULT '9'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mmembers`
--

DROP TABLE IF EXISTS `mmembers`;
CREATE TABLE IF NOT EXISTS `mmembers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_groups` int(11) NOT NULL DEFAULT '9',
  `usrname` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `subscribe_date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mmembers`
--

INSERT INTO `mmembers` (`ID`, `ID_groups`, `usrname`, `pass`, `mail`, `subscribe_date`) VALUES
(1, 0, 'Admin', 'Test', 'test@test.com', '2018-11-21'),
(40, 9, 'Popi', '$2y$10$oDJvBFlTqShudvVIE3zGMe0FdrGbpbwyGCdi9F6YoFqB5XYlFTRIO', 'popi@popi.fr', '2018-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `moredesc` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
