-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 04 nov. 2018 à 01:02
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
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` text,
  `date_tim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`ID`, `pseudo`, `message`, `date_tim`) VALUES
(42, 'Admin', 'Vous pouvez vous amuser à insérer de nouveaux messages, c\'est très rapide et sans erreurs depuis Firefox !', '2018-11-04 01:39:01'),
(41, 'Admin', 'Si les messages sont courts, l\'affichage n\'est pas le même.', '2018-11-04 01:37:25'),
(40, 'Admin', 'Le pseudo reste 3 minutes en mémoire via cookies, puis si il n\'y a pas eu d\'entrée,se remet à zéro.\r\n\r\nLa page se recharge toutes les 20 secondes afin de vérifier si d\'autres messages sont postés.', '2018-11-04 01:36:37'),
(39, 'Admin', 'Bonjour, bienvenue sur le minichat amélioré !\r\n\r\nJe vous invite à compléter la base en inserant différents messages et pseudo, vous pourrez vérifier ainsi, l\'incrémentation des messages et la disposition sommaire mais efficace de ce minichat !! C\'est parti ', '2018-11-04 01:34:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
