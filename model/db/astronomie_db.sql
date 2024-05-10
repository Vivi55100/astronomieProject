-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 mai 2024 à 10:22
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
  `id_quiz` int NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `FK_Difficulty_Question` (`id_quiz`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question_content`, `id_quiz`) VALUES
(1, 'Quelle est la planète la plus proche du Soleil ?', 1),
(2, 'Quelle est la planète la plus grande du système solaire ?', 1),
(3, 'Quel est le nom de notre galaxie ?', 1),
(4, 'Combien de planètes composent notre système solaire ?', 1),
(5, 'Quel est le nom de l\'étoile autour de laquelle la Terre orbite ?', 1),
(6, 'Quel est le satellite principal naturel de la Terre ?', 1),
(7, 'Quelle est la planète connue pour ses anneaux ?', 1),
(8, 'Quel est le nom de la première personne à avoir marché sur la Lune ?', 1),
(9, 'Quelle est la planète connue comme la \"planète rouge\" ?', 1),
(10, 'Quel est le plus grand satellite de Jupiter ?', 1),
(11, 'Quelle est la planète la plus éloignée du Soleil ?', 1),
(12, 'Quel est le nom de la comète la plus célèbre qui revient tout les 76 ans près de la Terre ?', 1),
(13, 'Quel sont les noms des satellites naturels de Mars ?', 1),
(14, 'Combien d\'Hommes ont marché sur la Lune ?', 1),
(15, 'Quel astre s\'est vu retrograder par l\'UAI en 2006 ?', 1),
(16, 'Quel est le nom du premier homme à aller dans l\'espace ?', 1),
(17, 'Quel est le nom de la 3e planète orbitant le soleil ?', 1),
(18, 'Quels sont les noms des 2 galaxies satellites les plus connus de la Voie Lactée ?', 1),
(19, 'Quel est le nom du premier satellite artificiel de la Terre ?', 1),
(20, 'Quel est le nom de l\'étoile polaire ?', 1),
(21, 'Quelle est la distance moyenne entre la Terre et le Soleil ?', 2),
(22, 'Qu\'est-ce qu\'une supernova ?', 2),
(23, 'Qu\'est-ce qu\'une année lumière et quelle est sa distance approximative en kilomètres ?', 2),
(24, 'Qu\'est-ce qu\'un trou noir ?', 2),
(25, 'Quelle est la théorie actuelle sur l\'origine de l\'Univers ?', 2),
(26, 'Quelles sont les 4 forces fondamentales ?', 2),
(27, 'Qu\'est-ce qu\'une planète naine ?', 2),
(28, 'Qu\'est-ce qu\'une météorite ?', 2),
(29, 'Qu\'est-ce qu\'une étoile géante rouge ?', 2),
(30, 'Qu\'est-ce que la ceinture de Kuiper ?', 2),
(31, 'Qu\'est-ce qu\'une galaxie spirale ?', 2),
(32, 'Quelle est la théorie actuelle sur la formation de la Lune ?', 2),
(33, 'Qu\'est-ce qu\'un pulsar ?', 2),
(34, 'Quelle est la différence entre une planète tellurique et une planète gazeuse ?', 2),
(35, 'Qu\'est-ce qu\'une exoplanète ?', 2),
(36, 'Qu\'est-ce que la ceinture d\'astéroïdes ?', 2),
(37, 'Qu\'est-ce que la magnétosphère d\'une planète ?', 2),
(38, 'Quelle est la différence entre un astéroïde et une météorite ?', 2),
(39, 'Qu\'est-ce que le phénomène des aurores polaires et comment se produisent-elles ?', 2),
(40, 'Qu\'est-ce que la période de révolution d\'une planète ?', 2),
(41, 'Quelle est la sonde spatiale qui a réalisé le premier survol de Pluton en juillet 2015 ?', 3),
(42, 'Quel est le nom de la première femme astronaute à avoir effectué une sortie extravéhiculaire dans l\'espace ?', 3),
(43, 'Quelle est la mission de la NASA qui a permis de découvrir les lunes de glace autour de Jupiter, notamment Europe, Ganymède et Callisto ?', 3),
(44, 'Quel est le nom de la sonde spatiale de la NASA lancée en 2018 pour étudier l\'atmosphère du Soleil de plus près que jamais ?', 3),
(45, 'Quel est le nom de la première station spatiale permanente lancée par l\'Union soviétique en 1971 ?', 3),
(46, 'Quelle est la première loi de Kepler ?', 3),
(47, 'Quel est le nom du scientifique qui a formulé la théorie des trous noirs et a découvert les radiations émises par eux ?', 3),
(48, 'Quelle est la distance moyenne entre la Terre et la Lune en kilomètres ?', 3),
(49, 'Quelle est la mission spatiale de l\'ESA (Agence spatiale européenne) qui a permis de cartographier plus d\'un milliard d\'étoiles dans notre galaxie, la Voie lactée ?', 3),
(50, 'Qu\'est-ce que l\'effet de lentille gravitationnelle et comment est-il utilisé en astronomie ?', 3),
(51, 'De quels gaz est majoritairement constituée la planète Jupiter ?', 3),
(52, 'Quel est le nom de l\'agence spatiale indienne ?', 3),
(53, 'Quelle est la mission de la NASA qui a permis de poser le rover Spirit sur la surface de Mars en 2004 ?', 3),
(54, 'Quelle est la mission spatiale de l\'ESA qui a permis de poser le module Philae sur la surface de la comète 67P/Churyumov-Gerasimenko en 2014 ?', 3),
(55, 'Qu\'est-ce que le Grand Nuage de Magellan ?', 3),
(56, 'Quelle est la mission spatiale de la NASA qui a permis de poser le rover Sojourner sur la surface de Mars en 1997 ?', 3),
(57, 'Qu\'est-ce qu\'un trou noir supermassif et où se trouve le trou noir supermassif le plus proche de la Terre ?', 3),
(58, 'Quelle est la théorie qui décrit l\'expansion accélérée de l\'univers et qui a valu le prix Nobel de physique en 2011 à ses découvreurs ?', 3),
(59, 'Qu\'est-ce que la mission STEREO de la NASA ?', 3),
(60, 'Qu\'est-ce que la mission TESS de la NASA ?', 3),
(61, 'Que signifie cet acronyme : ISS ?', 1),
(62, 'Comment se nomme la sonde la plus éloignée de la planète Terre ?', 1),
(63, 'Qu\'est-ce qu\'une éclipse solaire ?', 1),
(64, 'Quelle est la période de révolution de la Terre autour du Soleil ?', 1),
(65, 'Quelle est la période de rotation de la Terre sur son propre axe ?', 1),
(66, 'Quelle est la 2e planète en partant du Soleil ?', 1),
(67, 'Quelle est la 4e planète en partant du Soleil ?', 1),
(68, 'Quelle est la 5e planète en partant du Soleil ?', 1),
(69, 'Quelle est la 6e planète en partant du Soleil ?', 1),
(70, 'Quelle est la 7e planète en partant du Soleil ?', 1),
(71, 'Quelle est la 8e planète en partant du Soleil ?', 1),
(72, 'Quelle est la 9e planète en partant du Soleil ?', 1),
(73, 'De quelle forme est la Terre ?', 1),
(74, 'Quelle est la planète la plus massive du système solaire ?', 1),
(75, 'Quelle est la planète la plus brillante dans le ciel nocturne après la Lune ?', 1),
(76, 'Quelle est la constellation qui contient l\'étoile Polaire ?', 1),
(77, 'Quel est le nom du plus grand volcan connu dans le système solaire, situé sur Mars ?', 1),
(78, 'Quel est le nom de l\'anneau de débris qui orbite autour de la 6e planète ?', 1),
(79, 'Comment se nomme le programme initié par la NASA, qui a posé l\'Homme sur la lune ?', 1),
(80, 'Quelle est la couleur apparente de la planète Mars ?', 1),
(81, 'Quel est le nom du célèbre télescope spatial lancé par la NASA en 1990 ?', 2),
(82, 'Quel est le nom de l\'astronaute qui a passé le plus de temps dans l\'espace en une seule mission ?', 2),
(83, 'Quelle est la planète la plus chaude du système solaire ?', 2),
(84, 'Quel est le nom de la plus grande lune de Neptune ?', 2),
(85, 'Quel est le nom de la première mission spatiale habitée à avoir atteint la Lune ?', 2),
(86, 'Quelle est la durée moyenne d\'une journée sur Mars ?', 2),
(87, 'Quelle est la période orbitale de la planète Jupiter ?', 2),
(88, 'Quelle est la période orbitale de la planète Saturne ?', 2),
(89, 'Quelle est la période orbitale de la planète Mercure ?', 2),
(90, 'Quelle est la période de rotation de Mercure sur son propre axe ?', 2),
(91, 'Quelle est la période de rotation de Vénus sur son propre axe ?', 2),
(92, 'Quelle est la période de rotation de Mars sur son propre axe ?', 2),
(93, 'Quelle est la période de rotation de Jupiter sur son propre axe ?', 2),
(94, 'Quelle est la période de rotation de Saturne sur son propre axe ?', 2),
(95, 'Quelle est la période de rotation d\'Uranus sur son propre axe ?', 2),
(96, 'Quelle est la période de rotation de Neptune sur son propre axe ?', 2),
(97, 'Quelle est la période orbitale de la planète Vénus ?', 2),
(98, 'Quelle est la période orbitale de la planète Uranus ?', 2),
(99, 'Quelle est la période orbitale de la planète Neptune ?', 2),
(100, 'Quelle est la période orbitale de la planète Mars ?', 2),
(101, 'Quelle est la distance approximative entre la Terre et la planète la plus proche située en dehors de notre système solaire ?', 3),
(102, 'Quelle est la masse approximative de la Voie lactée en termes de masse solaire ?', 3),
(103, 'Quelle est la période orbitale de la planète naine Pluton ?', 3),
(104, 'Quelle est la température moyenne à la surface de Vénus ?', 3),
(105, 'Quelle est la vitesse approximative à laquelle la Terre orbite autour du Soleil ?', 3),
(106, 'Quel est le nom de l\'événement observé par les astronomes chinois et japonais en 1054 ?', 3),
(107, 'Quelle est la masse approximative du trou noir supermassif situé au centre de la Voie lactée, appelé Sagittaire A* ?', 3),
(108, 'Quelle est la vitesse de la lumière dans le vide en mètres par seconde ?', 3),
(109, 'Quelle est la distance approximative entre la Terre et le centre de la Voie lactée ?', 3),
(110, 'Quelle est la première mission spatiale à avoir atteint la surface d\'un astéroïde et à en avoir ramené des échantillons sur Terre ?', 3),
(111, 'Quelle est la température approximative à la surface de Mercure pendant le jour ?', 3),
(112, 'Quelle est la distance approximative entre la Terre et la Lune en années-lumière ?', 3),
(113, 'Quelle est la distance approximative entre la Terre et le Soleil en unités astronomiques ?', 3),
(114, 'Quelle est la masse approximative de la planète Jupiter en termes de masses terrestres ?', 3),
(115, 'Quelle est la vitesse de libération nécessaire pour quitter la gravité de la Terre en kilomètres par seconde ?', 3),
(116, 'Quel est le nom du premier trou noir jamais imagé ?', 3),
(117, 'Quelle est la période orbitale de la première exoplanète jamais découverte ?', 3),
(118, 'Quel est le nom de l\'objet transneptunien au-delà de Pluton qui possède une lune appelée Dysnomie ?', 3),
(119, 'Quel est le nom de la 1re naine brune observée ?', 3),
(120, 'Quelle est la théorie qui propose que l\'univers a connu une expansion très rapide dans les premières fractions de seconde après le Big Bang ?', 3);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` int NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `quiz_name`) VALUES
(1, 'Quiz de niveau Facile'),
(2, 'Quiz de niveau Moyen'),
(3, 'Quiz de niveau Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `id_response` int NOT NULL AUTO_INCREMENT,
  `response_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint NOT NULL,
  `id_question` int NOT NULL,
  `id_quiz` int DEFAULT NULL,
  PRIMARY KEY (`id_response`),
  KEY `FK_Quiz_Response` (`id_quiz`),
  KEY `FK_Question_Response` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=481 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `response`
--

INSERT INTO `response` (`id_response`, `response_content`, `is_correct`, `id_question`, `id_quiz`) VALUES
(1, 'Mercure', 1, 1, 1),
(2, 'Jupiter', 0, 1, 1),
(3, 'Venus', 0, 1, 1),
(4, 'Ceres', 0, 1, 1),
(5, 'Jupiter', 1, 2, 1),
(6, 'Andromède', 0, 2, 1),
(7, 'La lune', 0, 2, 1),
(8, 'Saturne', 0, 2, 1),
(9, 'La voie lactée', 1, 3, 1),
(10, 'Proxima', 0, 3, 1),
(11, 'Vega', 0, 3, 1),
(12, 'Andomède', 0, 3, 1),
(13, 'Huit', 1, 4, 1),
(14, 'Neuf', 0, 4, 1),
(15, 'Sept', 0, 4, 1),
(16, 'Douze', 0, 4, 1),
(17, 'Sol', 1, 5, 1),
(18, 'Proxima du centaure', 0, 5, 1),
(19, 'Sirus', 0, 5, 1),
(20, 'Arcturus', 0, 5, 1),
(21, 'Terre 1', 1, 6, 1),
(22, 'Sol 3', 0, 6, 1),
(23, 'Ganymède', 0, 6, 1),
(24, 'Charon', 0, 6, 1),
(25, 'Saturne', 1, 7, 1),
(26, 'Uranus', 0, 7, 1),
(27, 'Neptune', 0, 7, 1),
(28, 'Vesta', 0, 7, 1),
(29, 'Neil Armstrong', 1, 8, 1),
(30, 'Eugene Cernan', 0, 8, 1),
(31, 'Buzz Aldrin', 0, 8, 1),
(32, 'Aya Nakamura', 0, 8, 1),
(33, 'Mars', 1, 9, 1),
(34, 'La Terre', 0, 9, 1),
(35, 'Neptune', 0, 9, 1),
(36, 'Orion', 0, 9, 1),
(37, 'Ganymède', 1, 10, 1),
(38, 'Europe', 0, 10, 1),
(39, 'Charon', 0, 10, 1),
(40, 'La lune', 0, 10, 1),
(41, 'Neptune', 1, 11, 1),
(42, 'Pluton', 0, 11, 1),
(43, 'Mercure', 0, 11, 1),
(44, 'Mars', 0, 11, 1),
(45, ' La comète de Halley', 1, 12, 1),
(46, 'La ceinture d\'asteroïde', 0, 12, 1),
(47, 'Sirus', 0, 12, 1),
(48, 'Le nébuleuse du crabe', 0, 12, 1),
(49, 'Phobos et Deimos', 1, 13, 1),
(50, 'Hades et Promethée', 0, 13, 1),
(51, 'Narsil et Anduril', 0, 13, 1),
(52, 'Scooby et Samy', 0, 13, 1),
(53, '12', 1, 14, 1),
(54, '2', 0, 14, 1),
(55, '152', 0, 14, 1),
(56, '0 parce que la Terre est plate et personne n\'a réellement dépassé le dôme', 0, 14, 1),
(57, 'Pluton', 1, 15, 1),
(58, 'Ceres', 0, 15, 1),
(59, 'Les anneaux de Saturne', 0, 15, 1),
(60, 'Jupiter', 0, 15, 1),
(61, 'Youri Gagarine', 1, 16, 1),
(62, 'Neil Armstrong', 0, 16, 1),
(63, 'Thomas Pesquet', 0, 16, 1),
(64, 'Jackie Kennedy', 0, 16, 1),
(65, 'La Terre', 1, 17, 1),
(66, 'Pluton', 0, 17, 1),
(67, 'Mars', 0, 17, 1),
(68, 'Saturne', 0, 17, 1),
(69, 'Le grand et le petit nuage de Magellan', 1, 18, 1),
(70, 'Andromède', 0, 18, 1),
(71, 'Galaxie du cigare', 0, 18, 1),
(72, 'Galaxie du Sombrero', 0, 18, 1),
(73, 'Spoutnik 1', 1, 19, 1),
(74, 'Elvis 3', 0, 19, 1),
(75, 'Apollo 8', 0, 19, 1),
(76, 'Fallout 76', 0, 19, 1),
(77, 'Polaris', 1, 20, 1),
(78, 'Stellaris', 0, 20, 1),
(79, 'Apis', 0, 20, 1),
(80, 'Doris', 0, 20, 1),
(81, 'Environ 150 millions de kilomètres.', 1, 21, 2),
(82, 'Environ 5 milliards de kilomètres.', 0, 21, 2),
(83, 'Environ 1500 millions de kilomètres.', 0, 21, 2),
(84, 'Environ 15 années-lumière', 0, 21, 2),
(85, 'Une explosion cataclysmique d\'une étoile en fin de vie', 1, 22, 2),
(86, 'Un saut sur fornite', 0, 22, 2),
(87, 'Une danse traditionnelle pratiquée par les étoiles lorsqu\'elles sont particulièrement excitées.', 0, 22, 2),
(88, 'Une supernova est une comète géante qui traverse le cosmos, illuminant le ciel nocturne de sa traînée lumineuse et laissant derrière elle un sillage de poussière stellaire.', 0, 22, 2),
(89, 'Une année lumière est la distance que parcourt la lumière en une année. Cela équivaut à environ 9,46 billions de kilomètres.', 1, 23, 2),
(90, 'Une année-lumière est la distance que parcourt la Terre autour du Soleil en une année, ce qui correspond à environ 950 millions de kilomètres.', 0, 23, 2),
(91, 'Une année-lumière est en réalité une unité de mesure de la luminosité des étoiles, indiquant la quantité de lumière qu\'une étoile émet en une année. Sa distance approximative en kilomètres est d\'environ 95,746 milliards de kilomètres.', 0, 23, 2),
(92, '42', 0, 23, 2),
(93, 'Un trou noir est une région de l\'espace où la gravité est si intense que rien, pas même la lumière, ne peut s\'en échapper.', 1, 24, 2),
(94, 'Un trou noir est un aspirateur cosmique géant qui absorbe tout ce qui se trouve à proximité, y compris la lumière, et le convertit en énergie pour alimenter les étoiles voisines.', 0, 24, 2),
(95, 'Un trou noir est une légende urbaine dans l\'univers', 0, 24, 2),
(96, 'Un trou noir est simplement une illusion d\'optique causée par la distorsion de la lumière lorsqu\'elle traverse des champs magnétiques intenses dans l\'espace', 0, 24, 2),
(97, 'La théorie du Big Bang, qui postule que l\'Univers a commencé à partir d\'un état de très haute densité et de température il y a environ 13,8 milliards d\'années.', 1, 25, 2),
(98, 'Selon la théorie de la \"Pancréation\", l\'Univers a émergé d\'une collision cosmique entre deux dimensions parallèles, créant ainsi un équilibre subtil entre la matière et l\'antimatière.', 0, 25, 2),
(99, 'La théorie \"Renaissance Cosmique\" suggère que l\'Univers est le résultat cyclique de l\'expansion et de la contraction éternelles d\'un cosmos infini, chaque \"Big Bang\" étant suivi d\'un \"Big Crunch\" ultérieur.', 0, 25, 2),
(100, 'La \"Théorie de la Fracturation Cosmique\" avance que l\'Univers a été formé par la fragmentation d\'un super-univers primitif, chaque fragment donnant naissance à une dimension différente de l\'Univers observable.', 0, 25, 2),
(101, 'Les 4 forces fondamentales sont : l\'interaction nucleaire forte, l\'interaction nucleaire faible, la force électromagnétique et la force gravitationnelle', 1, 26, 2),
(102, 'Les 4 forces fondamentales sont : la force temporelle, la force universelle, la force tellurique,  la force galactique', 0, 26, 2),
(103, 'Les 4 forces fondamentales sont : l\'interaction éthérique, la force celeste, l\'interaction physico-quantique, la force dynamique', 0, 26, 2),
(104, 'Les 4 forces fondamentales sont : la force harmonique, la force psionique, la force d\'ubiquité, la force fractale', 0, 26, 2),
(105, 'Un objet céleste qui orbite autour du Soleil et qui a une masse suffisante pour être presque sphérique, mais qui n\'a pas dégagé son orbite des autres objets voisins.', 1, 27, 2),
(106, 'Une planète naine n\'est rien de plus qu\'un amas de poussière, et de glace, orbitant une autre planète.', 0, 27, 2),
(107, 'Une planète naine est une planète en tout point semblable aux autres.', 0, 27, 2),
(108, 'Une planète naine est un corps céleste de faible densité, mais d\'une gravité extrême.', 0, 27, 2),
(109, 'Un fragment de roche ou de métal provenant de l\'espace qui survit à son passage à travers l\'atmosphère terrestre et atteint la surface de la Terre.', 1, 28, 2),
(110, 'Une météorite est un objet qui frôle la planète lors de sa course.', 0, 28, 2),
(111, 'Une météorite est une comète qui a laissé derrière elle une immense traînée de glace.', 0, 28, 2),
(112, 'Une météorite est une lune artificielle orbitant le soleil, croisant occasionnellement le chemin que prend la Terre.', 0, 28, 2),
(113, 'Une étoile en fin de vie, de masse moyenne à élevée, qui a épuisé son stock d\'hydrogène dans son noyau et qui a commencé à fusionner de l\'hélium.', 1, 29, 2),
(114, 'Une planète de couleur rouge semblable à la planète Mars.', 0, 29, 2),
(115, 'Une étoile géante rouge est une étoile dont la couleur rouge provient de sa capacité à absorber sélectivement la lumière bleue dans son atmosphère, lui donnant ainsi une teinte rougeâtre distincte.', 0, 29, 2),
(116, 'Une étoile géante rouge est une étoile massive ayant atteint la moitié de sa vie, caractérisée par sa propension à émettre des éruptions solaires spectaculaires qui la font briller intensément en rouge dans le ciel nocturne.', 0, 29, 2),
(117, 'Une région du système solaire au-delà de l\'orbite de Neptune, contenant de nombreux petits corps glacés, y compris la planète naine Pluton.', 1, 30, 2),
(118, 'Une ceinture de planètes errante hors du système solaire.', 0, 30, 2),
(119, 'Un amas de galaxies en formation.', 0, 30, 2),
(120, 'Une nébuleuse qui d\'un point de vue de le Terre est plate telle une ceinture, d\'où la raison de cette appellation.', 0, 30, 2),
(121, 'Une galaxie avec des bras spiraux distincts contenant des étoiles, du gaz et de la poussière, comme la Voie lactée.', 1, 31, 2),
(122, 'Une galaxie sans bras spiraux, contenant uniquement de la poussière.', 0, 31, 2),
(123, 'Une galaxie spirale est une sorte de phénomène météorologique se produisant dans les régions galactiques, caractérisée par des vents stellaires en spirale qui soufflent à travers l\'espace, créant des formations nuageuses en forme de spirale.', 0, 31, 2),
(124, 'Une galaxie spirale est une organisation sociale extraterrestre où les habitants vivent en communauté dans des habitats en forme de spirale, se déplaçant le long des bras spiraux de leur galaxie d\'origine.', 0, 31, 2),
(125, 'La théorie de l\'impact géant, selon laquelle la Lune s\'est formée à la suite de la collision entre la Terre primitive et un objet de la taille de Mars appelée Théïa.', 1, 32, 2),
(126, 'La théorie de la \"Récolte Céleste\" suggère que la Lune est le résultat de la capture accidentelle d\'un gigantesque morceau de fromage lunaire par la gravité terrestre lors d\'un banquet céleste organisé par les dieux.', 0, 32, 2),
(127, 'Selon la théorie de la \"Résonance Cosmique\", la Lune est le produit d\'une collision cataclysmique entre la Terre et une comète géante, dont les débris se sont agglomérés pour former notre satellite naturel.', 0, 32, 2),
(128, 'Selon la théorie du « Nuage de Troie », la Lune s\'est formée à partir de débris laissés par une collision entre la Terre et un nuage de matière solide, semblable à celui qui aurait pu coexister avec le système solaire primitif.', 0, 32, 2),
(129, 'Une étoile à neutrons en rotation rapide émettant des faisceaux de rayonnement électromagnétique à intervalles réguliers.', 1, 33, 2),
(130, 'Un pulsar est une sorte de phénomène atmosphérique se produisant dans les régions les plus éloignées de l\'espace interstellaire, où des vents stellaires intenses génèrent des pulsations lumineuses rythmiques dans l\'atmosphère des étoiles.', 0, 33, 2),
(131, 'Selon la théorie de la \"Marée Galactique\", un pulsar est une zone de forte gravité située au centre des galaxies, où les marées gravitationnelles déforment l\'espace-temps et créent des ondes de choc périodiques.', 0, 33, 2),
(132, 'Un pulsar est une forme exotique de vie extraterrestre, hypothétiquement capable de communiquer avec d\'autres espèces à travers l\'émission de signaux lumineux pulsés, comme un moyen de navigation interstellaire, le premier pulsar découvert se nomme LGM2.', 0, 33, 2),
(133, 'Une planète tellurique est principalement constituée de roche et de métal, tandis qu\'une planète gazeuse est principalement composée d\'hydrogène et d\'hélium sous forme gazeuse.', 1, 34, 2),
(134, 'Il n\'y a qu\'une différence minime entre les planètes tellurique et les planètes gazeuses, cette différence se caractérise par la densité de gaz présent dans leurs atmosphères respective.', 0, 34, 2),
(135, 'La différence fondamentale entre une planète tellurique et une planète gazeuse réside dans leur taille. Les planètes telluriques sont généralement plus petites que les planètes gazeuses, ce qui les rend plus denses et plus solides.', 0, 34, 2),
(136, 'La principale différence entre une planète tellurique et une planète gazeuse est leur position dans le système solaire. Les planètes telluriques se trouvent plus près du Soleil, tandis que les planètes gazeuses se trouvent plus loin.', 0, 34, 2),
(137, 'Une planète qui orbite autour d\'une étoile autre que le Soleil.', 1, 35, 2),
(138, 'Une planète qui n\'a pas encore été découverte et qui orbite autour du soleil.', 0, 35, 2),
(139, 'Une planète qui orbite une autre planète.', 0, 35, 2),
(140, 'Une planète recouverte de plantes exotiques.', 0, 35, 2),
(141, 'Une région du système solaire située entre les orbites de Mars et Jupiter, contenant de nombreux petits corps rocheux appelés astéroïdes.', 1, 36, 2),
(142, 'Une ceinture de nébuleuses contenant suffisamment de poussières et d\'étoiles, pour briller et refléter sa propre lumière.', 0, 36, 2),
(143, 'Une région de l\'espace entièrement vide.', 0, 36, 2),
(144, 'La ceinture d\'astéroïdes est une barrière naturelle formée par une série de champs magnétiques autour des planètes telluriques du système solaire, agissant comme un bouclier protecteur contre les radiations cosmiques nocives.', 0, 36, 2),
(145, 'La région de l\'espace autour d\'une planète où le champ magnétique de la planète domine l\'influence du vent solaire, protégeant ainsi la planète et son atmosphère des particules solaires chargées.', 1, 37, 2),
(146, 'La magnétosphère d\'une planète est une zone de l\'espace interstellaire où les forces gravitationnelles de la planète sont si faibles que les objets peuvent flotter en apesanteur, semblable à une zone de microgravité comme celle de la Station spatiale internationale.', 0, 37, 2),
(147, 'La magnétosphère est une région située entre l\'atmosphère d\'une planète et l\'espace intersidéral, qui protège la planète des géocroiseurs.', 0, 37, 2),
(148, 'Contrairement à son appellation, la magnétosphère d\'une planète est une région située entre deux galaxies, elle fait le lien entre les deux galaxies afin de ne pas les laisser se distancer entre elles et ainsi déchirer le tissu de l\'espace-temps.', 0, 37, 2),
(149, 'Un astéroïde est un petit corps rocheux qui orbite autour du Soleil, généralement situé dans la ceinture d\'astéroïdes ou au-delà. Une météorite est un fragment d\'astéroïde ou de comète qui a survécu à son entrée dans l\'atmosphère terrestre et a atteint la surface de la Terre.', 1, 38, 2),
(150, 'Une météorite frôle la planète tandis qu\'un astéroïde ira se crasher sur celle-ci, ne laissant aucune trace.', 0, 38, 2),
(151, 'La principale différence entre un astéroïde et une météorite réside dans leur origine : les astéroïdes proviennent généralement de l\'espace interstellaire, tandis que les météorites sont formées à partir de débris terrestres.', 0, 38, 2),
(152, 'La différence entre un astéroïde et une météorite réside dans leur composition chimique : les astéroïdes sont principalement composés de glace et de poussière, tandis que les météorites sont principalement composées de métal et de roche.', 0, 38, 2),
(153, 'Les aurores polaires sont des lumières colorées qui apparaissent dans le ciel nocturne près des pôles nord et sud. Elles sont causées par l\'interaction entre les particules solaires chargées et les atomes dans la haute atmosphère terrestre.', 1, 39, 2),
(154, 'Les aurores polaires sont le résultat de l\'émission de lumière par des créatures lumineuses vivant dans les profondeurs des océans polaires. Elles se produisent lorsque ces créatures remontent à la surface et illuminent le ciel nocturne avec leurs éclats bioluminescents.', 0, 39, 2),
(155, 'Les aurores polaires sont causées par la réflexion de la lumière des étoiles dans l\'atmosphère terrestre. Elles se produisent lorsque la lumière stellaire est piégée dans les couches supérieures de l\'atmosphère et se diffuse dans le ciel nocturne, créant des lumières colorées.', 0, 39, 2),
(156, 'Les aurores polaires sont des phénomènes naturels qui se produisent lors de lancement de fusées spatiales près des pôles, les composants rejetés par le lanceur et les particules de l\'atmosphère se mélangent, fusionnent ce qui déclenche un rejet énergétique sous forme de photons desquels ressortent de multiples couleurs.', 0, 39, 2),
(157, 'La période de révolution d\'une planète est le temps nécessaire à cette planète pour effectuer une orbite complète autour de son étoile.', 1, 40, 2),
(158, 'La période de révolution d\'une planète est la durée pendant laquelle elle tourne sur elle-même autour de son axe, déterminant ainsi la longueur de ses journées et de ses nuits.', 0, 40, 2),
(159, 'La période de révolution d\'une planète est le temps nécessaire pour qu\'elle effectue une orbite complète autour de son satellite naturel, comme la Lune pour la Terre.', 0, 40, 2),
(160, 'La période de révolution d\'une planète est la période de temps pendant laquelle elle est en rétrogradation, c\'est-à-dire en mouvement rétrograde par rapport à la direction de son orbite habituelle autour du Soleil.', 0, 40, 2),
(161, 'New Horizons (NASA).', 1, 41, 3),
(162, 'Chang\'e 4 (CNSA).', 0, 41, 3),
(163, 'Cassini-Huygens (NASA, ESA).', 0, 41, 3),
(164, 'Mars Orbiter Mission (ISRO).', 0, 41, 3),
(165, 'Svetlana Savitskaya (URSS).', 1, 42, 3),
(166, 'Sally Ride (États-Unis)', 0, 42, 3),
(167, 'Claudie Haigneré (France)', 0, 42, 3),
(168, 'Liu Yang (Chine)', 0, 42, 3),
(169, 'Mission Galileo.', 1, 43, 3),
(170, 'Mission Rosetta.', 0, 43, 3),
(171, 'Mission Vostok.', 0, 43, 3),
(172, 'Mission Chandrayaan.', 0, 43, 3),
(173, 'Parker Solar Probe.', 1, 44, 3),
(174, 'Picard Solar Probe.', 0, 44, 3),
(175, 'Hélios Solaris Probe.', 0, 44, 3),
(176, 'Icarus Solis Probe.', 0, 44, 3),
(177, 'Saliout 1.', 1, 45, 3),
(178, 'ISS.', 0, 45, 3),
(179, 'Skylab.', 0, 45, 3),
(180, 'Mir.', 0, 45, 3),
(181, 'Les planètes du système solaire décrivent des trajectoires elliptiques, dont le Soleil occupe l\'un des foyers.', 1, 46, 3),
(182, 'La vitesse de déplacement d\'une planète varie au cours de son orbite : elle est plus rapide lorsque la planète est plus proche du Soleil et plus lente lorsqu\'elle est plus éloignée.', 0, 46, 3),
(183, 'Chaque particule de matière est attirée par chaque autre particule de matière avec une force proportionnelle au produit de leurs masses et inversement proportionnelle au carré de la distance qui les sépare.', 0, 46, 3),
(184, 'Les lois de la physique sont les mêmes pour tous les observateurs inertiels et que la vitesse de la lumière dans le vide est constante et indépendante de la vitesse de la source ou de l\'observateur.', 0, 46, 3),
(185, 'Stephen Hawking.', 1, 47, 3),
(186, 'Albert Einstein.', 0, 47, 3),
(187, 'Neil deGrasse Tyson.', 0, 47, 3),
(188, 'Subrahmanyan Chandrasekhar.', 0, 47, 3),
(189, 'En moyenne 384 400 kilomètres.', 1, 48, 3),
(190, 'En moyenne 38 440 462 kilomètres.', 0, 48, 3),
(191, 'En moyenne 38 440 kilomètres.', 0, 48, 3),
(192, 'En moyenne 38 UA.', 0, 48, 3),
(193, 'Mission Gaia.', 1, 49, 3),
(194, 'Mission Rosetta.', 0, 49, 3),
(195, 'Mission Artemis.', 0, 49, 3),
(196, 'Mission Magellan.', 0, 49, 3),
(197, 'L\'effet de lentille gravitationnelle est la courbure de la lumière par la gravité d\'un objet massif, utilisé pour étudier les objets distants et sombres qui ne peuvent pas être observés directement.', 1, 50, 3),
(198, 'L\'effet d\'une lentille gravitationnelle est un phénomène où les planètes agissent comme des lentilles optiques, concentrant la lumière des étoiles lointaines et produisant ainsi des images agrandies dans le ciel nocturne.', 0, 50, 3),
(199, 'L\'effet d\'une lentille gravitationnelle est un phénomène dans lequel les rayons lumineux d\'une source lointaine sont réfractés par l\'atmosphère terrestre, produisant des images déformées de la source lorsqu\'elle est observée depuis la surface de la Terre.', 0, 50, 3),
(200, 'L\'effet d\'une lentille gravitationnelle est un phénomène où les corps célestes, tels que les comètes et les astéroïdes, agissent comme des lentilles optiques naturelles, modifiant la trajectoire de la lumière des étoiles lointaines et produisant des effets de mirage dans le ciel.', 0, 50, 3),
(201, 'Son atmosphère est principalement composée de : Dihydrogène (H2) à 86 % et Hélium (He) à environ 13 %.', 1, 51, 3),
(202, 'Son atmosphère est principalement composée de :  Oxygène (O) à 40%,  Azote (N) à 30%, Hydrogène (H) à 25% et Hélium (He) à 5%.', 0, 51, 3),
(203, 'Son atmosphère est principalement composée de : Dihydrogène (H2) à 60%, Hélium (He) à 20%, Argon (Ar) à 10%, Néon (Ne) à 5% et Dioxygène (O2) à 5%.', 0, 51, 3),
(204, 'Son atmosphère est principalement composée de :  Krypton (Kr) à 50%, Argon (Ar) à 20%, Méthane (CH4) à 10%, Hélium (He) à 10% et Diazote (N2) à 10%.', 0, 51, 3),
(205, 'ISRO', 1, 52, 3),
(206, 'ESA ', 0, 52, 3),
(207, 'NASA', 0, 52, 3),
(208, 'CNSA', 0, 52, 3),
(209, 'Mission Mars Exploration Rover.', 1, 53, 3),
(210, 'Mission Mars 2020.', 0, 53, 3),
(211, 'Mission Mars Spirit.', 0, 53, 3),
(212, 'Mission Martianaut Exploration Project.', 0, 53, 3),
(213, 'Mission Rosetta.', 1, 54, 3),
(214, 'Mission New Horizon.', 0, 54, 3),
(215, 'Mission Juno.', 0, 54, 3),
(216, 'Mission Cassini-Huygens.', 0, 54, 3),
(217, 'Une galaxie naine satellite de la Voie lactée, visible depuis l\'hémisphère sud.', 1, 55, 3),
(218, 'Une galaxie visible dans la constellation de la Lyre, visible depuis l\'hémisphère nord.', 0, 55, 3),
(219, 'Une galaxie visible dans la constellation d\'Andromède, visible depuis l\'hémisphère nord.', 0, 55, 3),
(220, 'Une nébuleuse orbitant autour de la voie lactée. Visible depuis l\'hémisphère sud.', 0, 55, 3),
(221, 'Mission Mars Pathfinder.', 1, 56, 3),
(222, 'Mission Red Planet Discovery.', 0, 56, 3),
(223, 'Mission Mars Expedition Opportunity.', 0, 56, 3),
(224, 'Mission Martian Rover Discovery.', 0, 56, 3),
(225, 'Un trou noir supermassif est un trou noir dont la masse est des millions voire des milliards de fois celle du Soleil, situé généralement au centre des galaxies. Le trou noir supermassif le plus proche de la Terre est Sagittarius A*, au centre de notre propre Voie lactée.', 1, 57, 3),
(226, 'Un trou noir supermassif est une région de l\'espace où la gravité est si forte que même la lumière ne peut pas s\'échapper, et le trou noir supermassif le plus proche de la Terre se trouve dans le système solaire de Proxima Centauri.', 0, 57, 3),
(227, 'Un trou noir supermassif est une planète géante qui a englouti toutes les autres planètes de son système solaire, et le trou noir supermassif le plus proche de la Terre se trouve dans le nuage de Oort.', 0, 57, 3),
(228, 'Un trou noir supermassif est un amas d\'étoiles très dense, et le trou noir supermassif le plus proche de la Terre se trouve dans la nébuleuse d\'Orion.', 0, 57, 3),
(229, 'La théorie de l\'énergie sombre.', 1, 58, 3),
(230, 'La théorie de la relativité restreinte.', 0, 58, 3),
(231, 'La théorie des Cordes.', 0, 58, 3),
(232, 'Théorie des Supersymétries.', 0, 58, 3),
(233, 'La mission STEREO est une mission spatiale en cours qui a pour objectif l\'étude du Soleil en trois dimensions, notamment des éruptions solaires et des tempêtes magnétiques, à l\'aide de deux sondes spatiales identiques placées sur des orbites différentes autour du Soleil.', 1, 59, 3),
(234, 'Projet de Recherche des Transferts Énergétiques et des Ondes Sonores dans l\'Espace, cette mission a pour but de faire l\'étude des transferts d\'énergie entre deux corps distants grâce aux ondes radio qui se propage dans le vide de l\'espace, ce projet a pour but de pouvoir capturer et restituer de l\'énergie à un faible coût, nous rendant moins dépendant des ressources terrestre en déclins.', 0, 59, 3),
(235, 'Programme d\'Exploration Scientifique pour la Recherche et l\'Observation : Une mission visant à explorer les planètes du système solaire et à observer les phénomènes cosmiques à l\'aide de télescopes spatiaux et de sondes spatiales.', 0, 59, 3),
(236, 'Projet d\'Étude des Terres et des Écosystèmes par Observation Satellitaire : Une mission visant à surveiller les changements environnementaux sur Terre à l\'aide de satellites équipés de capteurs optiques et thermiques.', 0, 59, 3),
(237, 'La mission TESS est une mission spatiale en cours qui a pour objectif de rechercher des exoplanètes en utilisant la méthode de transit, en observant les changements de luminosité des étoiles lorsqu\'une planète passe devant elles.', 1, 60, 3),
(238, 'Projet d\'Étude des Tempêtes et des Éruptions Solaires : Une mission visant à étudier les phénomènes météorologiques extrêmes et les éruptions solaires à l\'aide de télescopes spatiaux et de satellites.', 0, 60, 3),
(239, 'Système de Surveillance et d\'Exploration des Sites de Satellites : Une mission visant à surveiller les emplacements des satellites en orbite terrestre pour prévenir les collisions et garantir la sécurité des missions spatiales.', 0, 60, 3),
(240, 'Service de Télédétection et d\'Étude des Surfaces Subaquatiques : Une mission visant à cartographier et à étudier les fonds marins et les environnements aquatiques sur Terre à l\'aide de satellites équipés de sonars et de capteurs acoustiques.', 0, 60, 3),
(241, 'Station Spatiale Internationale', 1, 61, 1),
(242, 'Imbrication de Super Structures', 0, 61, 1),
(243, 'Invitation Spéciale Solaire', 0, 61, 1),
(244, 'Sa veu r1 dir', 0, 61, 1),
(245, 'Voyager 1', 1, 62, 1),
(246, 'Cassini-Huygens', 0, 62, 1),
(247, 'Mariner 4', 0, 62, 1),
(248, 'Parker solar probe', 0, 62, 1),
(249, 'Quand la Lune passe entre la Terre et le Soleil', 1, 63, 1),
(250, 'Quand la Terre passe entre le Soleil et Mars', 0, 63, 1),
(251, 'Quand Mars passe devant le Soleil', 0, 63, 1),
(252, 'Quand Jupiter cache le Soleil', 0, 63, 1),
(253, 'Environ 365 jours', 1, 64, 1),
(254, 'Environ 3650 jours', 0, 64, 1),
(255, 'Environ 30 ans', 0, 64, 1),
(256, 'Environ 300 mois', 0, 64, 1),
(257, 'Environ 24 heures', 1, 65, 1),
(258, 'Environ 24 minutes', 0, 65, 1),
(259, 'Environ 24 ans', 0, 65, 1),
(260, 'Environ 24 mois', 0, 65, 1),
(261, 'Venus', 1, 66, 1),
(262, 'Pluton', 0, 66, 1),
(263, 'Uranus', 0, 66, 1),
(264, 'Ceres', 0, 66, 1),
(265, 'Mars', 1, 67, 1),
(266, 'Mercure', 0, 67, 1),
(267, 'Saturne', 0, 67, 1),
(268, 'Vesta', 0, 67, 1),
(269, 'Jupiter', 1, 68, 1),
(270, 'Saturne', 0, 68, 1),
(271, 'Mars', 0, 68, 1),
(272, 'La Terre', 0, 68, 1),
(273, 'Saturne', 1, 69, 1),
(274, 'Uranus', 0, 69, 1),
(275, 'Pluton', 0, 69, 1),
(276, 'Mercure', 0, 69, 1),
(277, 'Uranus', 1, 70, 1),
(278, 'Jupiter', 0, 70, 1),
(279, 'La Terre', 0, 70, 1),
(280, 'Phobos', 0, 70, 1),
(281, 'Neptune', 1, 71, 1),
(282, 'Mercure', 0, 71, 1),
(283, 'Mars', 0, 71, 1),
(284, 'Venus', 0, 71, 1),
(285, 'Question piège, il n\'y a pas de 9e planète à l\'heure actuelle', 1, 72, 1),
(286, 'Pluton', 0, 72, 1),
(287, 'Makémaké', 0, 72, 1),
(288, 'Saturne', 0, 72, 1),
(289, 'Ellipsoïdal', 1, 73, 1),
(290, 'Plate', 0, 73, 1),
(291, 'Parfaitement ronde', 0, 73, 1),
(292, 'Plate mais bombée', 0, 73, 1),
(293, 'Jupiter', 1, 74, 1),
(294, 'Saturne', 0, 74, 1),
(295, 'La Terre', 0, 74, 1),
(296, 'Neptune', 0, 74, 1),
(297, 'Venus', 1, 75, 1),
(298, 'Mars', 0, 75, 1),
(299, 'Jupiter', 0, 75, 1),
(300, 'Uranus', 0, 75, 1),
(301, 'La Petite Ourse', 1, 76, 1),
(302, 'Orion', 0, 76, 1),
(303, 'Cassiopée', 0, 76, 1),
(304, 'La nébuleuse du crabe', 0, 76, 1),
(305, 'Olympus Mons', 1, 77, 1),
(306, 'Krakatoa', 0, 77, 1),
(307, 'Le mont Vésuve', 0, 77, 1),
(308, 'Piton des neiges', 0, 77, 1),
(309, 'Les anneaux de Saturne', 1, 78, 1),
(310, 'Le Seigneur des Anneaux', 0, 78, 1),
(311, 'Le silence des agneaux', 0, 78, 1),
(312, 'Les anneaux de Neptune', 0, 78, 1),
(313, 'Le programme Apollo', 1, 79, 1),
(314, 'Le programme Chang e', 0, 79, 1),
(315, 'Le programme Apollo-Soyouz', 0, 79, 1),
(316, 'La mission Lunar Sample Return', 0, 79, 1),
(317, 'Rouge', 1, 80, 1),
(318, 'Bleu', 0, 80, 1),
(319, 'Grise', 0, 80, 1),
(320, 'Jaunâtre', 0, 80, 1),
(321, 'Hubble', 1, 81, 2),
(322, 'Kepler', 0, 81, 2),
(323, 'Chandra', 0, 81, 2),
(324, 'Spitzer', 0, 81, 2),
(325, 'Valeri Polyakov', 1, 82, 2),
(326, 'Scott Kelly', 0, 82, 2),
(327, 'Yuri Malenchenko', 0, 82, 2),
(328, 'John Glenn', 0, 82, 2),
(329, 'Vénus', 1, 83, 2),
(330, 'Mercure', 0, 83, 2),
(331, 'Jupiter', 0, 83, 2),
(332, 'Io', 0, 83, 2),
(333, 'Triton', 1, 84, 2),
(334, 'Miranda', 0, 84, 2),
(335, 'Ariel', 0, 84, 2),
(336, 'Umbriel', 0, 84, 2),
(337, 'Apollo 8', 1, 85, 2),
(338, 'Apollo 11', 0, 85, 2),
(339, 'Apollo 1', 0, 85, 2),
(340, 'Apollo 9', 0, 85, 2),
(341, 'Environ 24 heures et 37 minutes.', 1, 86, 2),
(342, 'Environ 26 heures et 17 minutes.', 0, 86, 2),
(343, 'Environ 14 heures et 32 minutes.', 0, 86, 2),
(344, 'Environ 9 heures et 22 minutes.', 0, 86, 2),
(345, 'Environ 12 ans', 1, 87, 2),
(346, 'Environ 20 ans', 0, 87, 2),
(347, 'Environ 9 ans', 0, 87, 2),
(348, 'Environ 70 ans', 0, 87, 2),
(349, 'Environ 29,5 ans', 1, 88, 2),
(350, 'Environ 23 ans', 0, 88, 2),
(351, 'Environ 65 ans', 0, 88, 2),
(352, 'Environ 36,3 ans', 0, 88, 2),
(353, 'Environ 88 jours', 1, 89, 2),
(354, 'Environ 65 jours', 0, 89, 2),
(355, 'Environ 230 jours', 0, 89, 2),
(356, 'Environ 305 jours', 0, 89, 2),
(357, 'Environ 59 jours', 1, 90, 2),
(358, 'Environ 85 jours', 0, 90, 2),
(359, 'Environ 19 jours', 0, 90, 2),
(360, 'Environ 46 jours', 0, 90, 2),
(361, 'Environ 243 jours', 1, 91, 2),
(362, 'Environ 325 jours', 0, 91, 2),
(363, 'Environ 216 jours', 0, 91, 2),
(364, 'Environ 426 jours', 0, 91, 2),
(365, 'Environ 24 heures et 40 minutes', 1, 92, 2),
(366, 'Environ 23 heures et 20 minutes', 0, 92, 2),
(367, 'Environ 35 heures et 02 minutes', 0, 92, 2),
(368, 'Environ 48 heures et 36 minutes', 0, 92, 2),
(369, 'Environ 10 heures', 1, 93, 2),
(370, 'Environ 20 heures', 0, 93, 2),
(371, 'Environ 5 heures', 0, 93, 2),
(372, 'Environ 16 heures', 0, 93, 2),
(373, 'Environ 10 heures et 33 minutes', 1, 94, 2),
(374, 'Environ 9 heures et 56 minutes', 0, 94, 2),
(375, 'Environ 23 heures et 03 minutes', 0, 94, 2),
(376, 'Environ 17 heures et 14 minutes', 0, 94, 2),
(377, 'Environ 17 heures et 14 minutes', 1, 95, 2),
(378, 'Environ 23 heures et 49 minutes', 0, 95, 2),
(379, 'Environ 36 heures et 44 minutes', 0, 95, 2),
(380, 'Environ 27 heures et 37 minutes', 0, 95, 2),
(381, 'Environ 16 heures et 06 minutes', 1, 96, 2),
(382, 'Environ 20 heures et 40 minutes', 0, 96, 2),
(383, 'Environ 19 heures et 32 minutes', 0, 96, 2),
(384, 'Environ 12 heures et 12 minutes', 0, 96, 2),
(385, 'Environ 225 jours', 1, 97, 2),
(386, 'Environ 323 jours', 0, 97, 2),
(387, 'Environ 410 jours', 0, 97, 2),
(388, 'Environ 165 jours', 0, 97, 2),
(389, 'Environ 84 ans', 1, 98, 2),
(390, 'Environ 65 ans', 0, 98, 2),
(391, 'Environ 98 ans', 0, 98, 2),
(392, 'Environ 126 ans', 0, 98, 2),
(393, 'Environ 165 ans', 1, 99, 2),
(394, 'Environ 132 ans', 0, 99, 2),
(395, 'Environ 205 ans', 0, 99, 2),
(396, 'Environ 283 ans', 0, 99, 2),
(397, 'Environ 687 jours', 1, 100, 2),
(398, 'Environ 365 jours', 0, 100, 2),
(399, 'Environ 523 jours', 0, 100, 2),
(400, 'Environ 1056 jours', 0, 100, 2),
(401, 'Environ 4,2 années-lumière', 1, 101, 3),
(402, 'Environ 152 années-lumière', 0, 101, 3),
(403, 'Environ 42 années-lumière', 0, 101, 3),
(404, 'Environ 6,67 années-lumière', 0, 101, 3),
(405, 'Environ 2300 milliards de masses solaires estimées en septembre 2023', 1, 102, 3),
(406, 'Environ 5630 milliards de masses solaires estimées en septembre 2023', 0, 102, 3),
(407, 'Environ 1235 milliards de masses solaires estimées en septembre 2023', 0, 102, 3),
(408, 'Environ 3692 milliards de masses solaires estimées en septembre 2023', 0, 102, 3),
(409, 'Environ 248 années terrestres', 1, 103, 3),
(410, 'Environ 200 années terrestres', 0, 103, 3),
(411, 'Environ 404 années terrestres', 0, 103, 3),
(412, 'Environ 303 années terrestres', 0, 103, 3),
(413, 'En moyenne 462° celsius', 1, 104, 3),
(414, 'En moyenne 662° celsius', 0, 104, 3),
(415, 'En moyenne 962° celsius', 0, 104, 3),
(416, 'En moyenne 262° celsius', 0, 104, 3),
(417, 'Environ 30 km/s', 1, 105, 3),
(418, 'Environ 50 km/s', 0, 105, 3),
(419, 'Environ 20 km/s', 0, 105, 3),
(420, 'Environ 60 km/s', 0, 105, 3),
(421, 'SN 1054', 1, 106, 3),
(422, 'NGC 1054', 0, 106, 3),
(423, 'M1054', 0, 106, 3),
(424, 'IC 1054', 0, 106, 3),
(425, 'Environ 4 millions de masses solaires', 1, 107, 3),
(426, 'Environ 3 millions de masses solaires', 0, 107, 3),
(427, 'Environ 5 millions de masses solaires', 0, 107, 3),
(428, 'Environ 2 millions de masses solaires', 0, 107, 3),
(429, 'Environ 299 792 458 m/s', 1, 108, 3),
(430, 'Environ 296 172 931 m/s', 0, 108, 3),
(431, 'Environ 300 256 941 m/s', 0, 108, 3),
(432, 'Environ 142 442 942 m/s', 0, 108, 3),
(433, 'Environ 27 000 années-lumière du centre de la Voie lactée', 1, 109, 3),
(434, 'Environ 12 000 années-lumière du centre de la Voie lactée', 0, 109, 3),
(435, 'Environ 34 000 années-lumière du centre de la Voie lactée', 0, 109, 3),
(436, 'Environ 100 000 années-lumière du centre de la Voie lactée', 0, 109, 3),
(437, 'Hayabusa', 1, 110, 3),
(438, 'Rosetta', 0, 110, 3),
(439, 'Dawn', 0, 110, 3),
(440, 'OSIRIS-REx', 0, 110, 3),
(441, 'Environ 430° celsius', 1, 111, 3),
(442, 'Environ 330° celsius', 0, 111, 3),
(443, 'Environ 530° celsius', 0, 111, 3),
(444, 'Environ 230° celsius', 0, 111, 3),
(445, 'Environ 0, 000 000 384 années-lumière', 1, 112, 3),
(446, 'Environ 0, 000 384 années-lumière', 0, 112, 3),
(447, 'Environ 384 années-lumière', 0, 112, 3),
(448, 'Environ 0,384 années-lumière', 0, 112, 3),
(449, 'Environ 1 unité astronomique', 1, 113, 3),
(450, 'Environ 0.1 unité astronomique', 0, 113, 3),
(451, 'Environ 10 unité astronomique', 0, 113, 3),
(452, 'Environ 11.1 unité astronomique', 0, 113, 3),
(453, 'Environ 518 fois la masse de la Terre', 1, 114, 3),
(454, 'Environ 658 fois la masse de la Terre', 0, 114, 3),
(455, 'Environ 738 fois la masse de la Terre', 0, 114, 3),
(456, 'Environ 428 fois la masse de la Terre', 0, 114, 3),
(457, 'Environ 11,2 km/s', 1, 115, 3),
(458, 'Environ 12,5 km/s', 0, 115, 3),
(459, 'Environ 15,25km/s', 0, 115, 3),
(460, 'Environ 7,9 km/s', 0, 115, 3),
(461, 'M87*', 1, 116, 3),
(462, 'M81*', 0, 116, 3),
(463, 'M57*', 0, 116, 3),
(464, 'Sagittarius A*', 0, 116, 3),
(465, '51 Pegasi b, avec une période de 4,23 jours terrestres', 1, 117, 3),
(466, 'HD 209458 b, avec une période de 3,52 jours terrestres', 0, 117, 3),
(467, '55 Cancri e, avec une période de 17,7 jours terrestres', 0, 117, 3),
(468, ' Tau Bootis b, avec une période de 3,31 jours terrestres', 0, 117, 3),
(469, 'Éris', 1, 118, 3),
(470, 'Sedna', 0, 118, 3),
(471, 'Makémaké', 0, 118, 3),
(472, 'Orcus', 0, 118, 3),
(473, 'Teide 1', 1, 119, 3),
(474, 'Gliese 229', 0, 119, 3),
(475, 'HD 38529 A', 0, 119, 3),
(476, 'HW Virginis', 0, 119, 3),
(477, 'L\'inflation cosmique', 1, 120, 3),
(478, 'La théorie de l\'état stationnaire', 0, 120, 3),
(479, 'La théorie des cordes', 0, 120, 3),
(480, 'La lithopanspermie', 0, 120, 3);

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
(1, 'Halliez', 'Steven', 'assets/img/avatarUpload/AVATAR_663cebdbc17b30.901484211715268571.avif', 'vivi', '$argon2i$v=19$m=65536,t=4,p=1$QXdWMmJBZjNkRDE2amRNVQ$l6DDSSFfgBMaffbFSFcNDFgFYLSs0IqWlgBOtBOGxvg', 'steven.halliez@hotmail.fr', '2', NULL),
(2, 'Illuvatar', 'Eru', 'assets/img/static/iconUser.png', 'eru', '$argon2i$v=19$m=65536,t=4,p=1$bm5xY0xRSklsRi5DbGc3aw$5fNevDAopTXknGiepZjD0D2sdEdFjQFFmHKZmzB+4hs', 'eruIlluvatar@ea.fr', '1', NULL),
(3, 'Lenclume', 'Jordan', 'assets/img/static/iconUser.png', 'nika', '$argon2i$v=19$m=65536,t=4,p=1$N01qbWUxeVZyZ0Y5TlZLcw$ASRCq+Tqbbt34WtxL5jbGo6k9au0NZ1Vmn/A/7lasYc', 'jordan.fr', '1', NULL);

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
  ADD CONSTRAINT `FK_Quiz_Question` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `FK_Question_Response` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Quiz_Response` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
