-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 mars 2021 à 10:17
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(140) CHARACTER SET utf8 NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(21, 'J\'adore le nouveau rog astrix', 4, '2020-12-15 16:21:41'),
(22, 'J\'adore le nouveau rog astrix', 4, '2020-12-15 16:21:44'),
(23, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 4, '2021-01-04 14:53:13'),
(24, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 4, '2021-01-04 14:53:18'),
(25, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 4, '2021-01-04 14:54:39'),
(26, 'j\'adore le saucisson', 7, '2021-01-06 15:18:05'),
(27, 'j\'adore le saucisson', 7, '2021-01-06 15:18:08'),
(28, 'trouduzhdad', 4, '2021-01-06 22:44:12'),
(29, 'tttttttttttttttttttttttttt', 4, '2021-01-06 22:55:13'),
(30, 'gggggggggggggggggggggggggg', 4, '2021-01-06 23:07:00'),
(31, 'fefefefefe', 7, '2021-01-06 23:09:44'),
(32, 'fefefefefe', 7, '2021-01-06 23:46:37'),
(33, 'drrddrdrrdrr', 7, '2021-01-07 00:17:54'),
(34, 'je suis pas un hero', 7, '2021-01-07 01:23:48'),
(35, 'hhhhhhhhhhhh', 4, '2021-01-07 01:32:23'),
(36, 'j\'ai bientot besoin dun nouveau casque lequel je peux prendre', 8, '2021-01-07 01:38:41'),
(37, 'ffffffffffffffffffffffffffffffffffffffffvvvvvvvvvvvvvvssssssssssssvvvvvvvvvvvvv', 8, '2021-01-07 01:42:24'),
(38, 'fvfvfvfvfvfvfvfvfvfvf vfvfvfvfvvvvvvvvvvv  vfvfvvvvv vfvfvf fv f', 8, '2021-01-07 01:47:09'),
(39, 'xssxxsxxsssjxisjxisjxxiss', 7, '2021-01-08 16:13:22');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'mathissss', '$2y$10$6NS/4OEXEdbQzH269d13OOVKZl4gTk0O406qgERJZNAKzbLo31UtW'),
(2, 'ouististi', '123123'),
(4, 'shunlass', '$2y$10$2/T2mxrr2HE5VE2klxhXw.MbPqCgnYwyHVNRNQYoZhfuygVTpeOdq'),
(3, 'etiennee', '$2y$10$/pUiDwGfsPEMxf5F7U4wKONfduh06zFgDfsfzhdTm3ZsJ51Or0Tjm'),
(5, 'mathis12', '$2y$10$Fk0vsxyj7An3qAlLWeYENO1b2UxhA2Wh9PjuKIEcS4XpfzZjy2R9.'),
(6, 'emma13', '$2y$10$Q0UHCL9b7o/nQR9ld8jIhu.np49poHOy1z0Ph3OTGiUnRU0qLg6GC'),
(7, 'justinbridou', '$2y$10$zdNWzOIUpWBBGaLE1F3Kue7ZhyrAJCPcn.p4/ekMY41yIlaC31pPi'),
(8, 'clement', '$2y$10$Azo0eewTxCk/9TGCaZWnT.7Mo/2/nsazV4ZZ0oWhHSfp8XQTL3.jK'),
(9, 'kiki13', '$2y$10$ZtIFIYoLKVkGFh2pPhFxee6VWywTzmEy1DzRsSCJhai6jqQV8Gyn.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
