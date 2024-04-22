-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 avr. 2024 à 14:54
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `astronomie_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `astre`
--

DROP TABLE IF EXISTS `astre`;
CREATE TABLE IF NOT EXISTS `astre` (
  `id_astre` int NOT NULL AUTO_INCREMENT,
  `astre_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `distance_to_earth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_discovery` datetime DEFAULT NULL,
  `name_of_discoverer` datetime DEFAULT NULL,
  `astre_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_type` int NOT NULL,
  PRIMARY KEY (`id_astre`),
  KEY `FK_Type_Astre` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_comment` datetime NOT NULL,
  `number_like_comment` int NOT NULL,
  `id_user` int NOT NULL,
  `id_astre` int NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `FK_User_Comment` (`id_user`),
  KEY `FK_Comment_Astre` (`id_astre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `difficulty`
--

DROP TABLE IF EXISTS `difficulty`;
CREATE TABLE IF NOT EXISTS `difficulty` (
  `id_difficulty` int NOT NULL AUTO_INCREMENT,
  `difficulty_name` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_difficulty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proposition_astre`
--

DROP TABLE IF EXISTS `proposition_astre`;
CREATE TABLE IF NOT EXISTS `proposition_astre` (
  `id_proposition_astre` int NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_validation_start` datetime NOT NULL,
  `date_validation_end` datetime NOT NULL,
  `score_validation` int NOT NULL,
  `id_astre` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_proposition_astre`),
  KEY `FK_Astre_Proposition_Astre` (`id_astre`),
  KEY `FK_User_Proposition_Astre` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int NOT NULL AUTO_INCREMENT,
  `question_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_difficulty` int NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `FK_Difficulty_Question` (`id_difficulty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` int NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quiz_question`
--

DROP TABLE IF EXISTS `quiz_question`;
CREATE TABLE IF NOT EXISTS `quiz_question` (
  `id_quiz_question` int NOT NULL AUTO_INCREMENT,
  `id_question` int NOT NULL,
  `id_quiz` int NOT NULL,
  PRIMARY KEY (`id_quiz_question`),
  KEY `FK_Quiz_Quiz_Question` (`id_quiz`),
  KEY `FK_Question_Quiz_Question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `id_response` int NOT NULL AUTO_INCREMENT,
  `response_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_quiz` int NOT NULL,
  PRIMARY KEY (`id_response`),
  KEY `FK_User_Response` (`id_user`),
  KEY `FK_Quiz_Response` (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int NOT NULL AUTO_INCREMENT,
  `type_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `last_name`, `first_name`, `avatar`, `username`, `password`, `mail`, `role`, `delete_date`) VALUES
(1, 'Halliez', 'Steven', 'assets/img/upload/autruche-deadpool.jpeg', 'vivi', '$argon2i$v=19$m=65536,t=4,p=1$QXdWMmJBZjNkRDE2amRNVQ$l6DDSSFfgBMaffbFSFcNDFgFYLSs0IqWlgBOtBOGxvg', 'steven.halliez@hotmail.fr', '2', NULL),
(2, 'Illuvatar', 'Eru', NULL, 'eru', '$argon2i$v=19$m=65536,t=4,p=1$bmRqYzdhT2FCay50N2ljSw$xfgAOfZuSRDuHnpMGaIfOhICgSRkumyStqqeBUj1yEE', 'eruIlluvatar@ea.com', '1', NULL),
(3, 'Moizet', 'Geraldine', NULL, 'gege', '$argon2i$v=19$m=65536,t=4,p=1$U0NIMEI2UGQwSHlTYUdORQ$nLC8ymsFmZO7oydSVIkdDOZNqU+4CsSyTZOoA8iC/JY', 'maman.com', '1', NULL),
(4, 'Halliez', 'Brandon', 'assets/img/upload/FG4_3340__F-G_Grandin_MNHN.jpeg', 'koba', '$argon2i$v=19$m=65536,t=4,p=1$MEVzdzNLSHhmMEEyTXMuMw$wzyHsu0iFtbXFc6vz0VuACzuu7kmvl3Zb/zjgm/tQys', 'brandon.com', '1', NULL),
(5, 'Betrancourt-Moizet', 'Dany', NULL, 'dany', '$argon2i$v=19$m=65536,t=4,p=1$M1ZaVE8wTExBaXBEQm4zYw$4MilDEDk+wDGyQmuDlNDhfkI6Jjg3+WQvhWxBw47MGw', 'dany.com', '1', NULL),
(6, 'Lenclume', 'Jordan', NULL, 'nika', '$argon2i$v=19$m=65536,t=4,p=1$N01qbWUxeVZyZ0Y5TlZLcw$ASRCq+Tqbbt34WtxL5jbGo6k9au0NZ1Vmn/A/7lasYc', 'jordan.com', '1', '2024-04-22 10:54:56'),
(7, 'Lenclume', 'Maude', 'assets/img/upload/elfette.jpg', 'maudus', '$argon2i$v=19$m=65536,t=4,p=1$Ui5la1VGQ1Q4OWxZQVR0VQ$zi96fO2ILaTr8PjGc/3Kx6NeX52LvInYJuMWawv+I/Y', 'maude.com', '1', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `astre`
--
ALTER TABLE `astre`
  ADD CONSTRAINT `FK_Type_Astre` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_Comment_Astre` FOREIGN KEY (`id_astre`) REFERENCES `astre` (`id_astre`),
  ADD CONSTRAINT `FK_User_Comment` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `proposition_astre`
--
ALTER TABLE `proposition_astre`
  ADD CONSTRAINT `FK_Astre_Proposition_Astre` FOREIGN KEY (`id_astre`) REFERENCES `astre` (`id_astre`),
  ADD CONSTRAINT `FK_User_Proposition_Astre` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_Difficulty_Question` FOREIGN KEY (`id_difficulty`) REFERENCES `difficulty` (`id_difficulty`);

--
-- Contraintes pour la table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD CONSTRAINT `FK_Question_Quiz_Question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `FK_Quiz_Quiz_Question` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`);

--
-- Contraintes pour la table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `FK_Quiz_Response` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`),
  ADD CONSTRAINT `FK_User_Response` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
