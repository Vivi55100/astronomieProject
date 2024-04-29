-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 29 avr. 2024 à 07:22
-- Version du serveur : 8.0.36-0ubuntu0.22.04.1
-- Version de PHP : 8.3.6

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

CREATE TABLE `astre` (
  `id_astre` int NOT NULL,
  `astre_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `distance_to_earth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_discovery` datetime DEFAULT NULL,
  `name_of_discoverer` datetime DEFAULT NULL,
  `astre_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int NOT NULL,
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_comment` datetime NOT NULL,
  `number_like_comment` int NOT NULL,
  `id_user` int NOT NULL,
  `id_astre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `difficulty`
--

CREATE TABLE `difficulty` (
  `id_difficulty` int NOT NULL,
  `difficulty_name` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `difficulty`
--

INSERT INTO `difficulty` (`id_difficulty`, `difficulty_name`) VALUES
(1, 'Facile'),
(2, 'Moyen'),
(3, 'Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `proposition_astre`
--

CREATE TABLE `proposition_astre` (
  `id_proposition_astre` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_validation_start` datetime NOT NULL,
  `date_validation_end` datetime NOT NULL,
  `score_validation` int NOT NULL,
  `id_astre` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int NOT NULL,
  `question_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_difficulty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question_content`, `id_difficulty`) VALUES
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
(20, 'Quel est le nom de l\'étoile polaire ?', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int NOT NULL,
  `quiz_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `quiz_name`) VALUES
(1, 'Mon premier quiz');

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

CREATE TABLE `response` (
  `id_response` int NOT NULL,
  `response_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint NOT NULL,
  `id_question` int NOT NULL,
  `id_quiz` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(80, 'Doris', 0, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int NOT NULL,
  `type_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `last_name`, `first_name`, `avatar`, `username`, `password`, `mail`, `role`, `delete_date`) VALUES
(1, 'Halliez', 'Steven', 'assets/img/avatarUpload/662a2ac97b86c1714039497.avif', 'vivi', '$argon2i$v=19$m=65536,t=4,p=1$QXdWMmJBZjNkRDE2amRNVQ$l6DDSSFfgBMaffbFSFcNDFgFYLSs0IqWlgBOtBOGxvg', 'steven.halliez@hotmail.fr', '2', NULL),
(2, 'Illuvatar', 'Eru', 'assets/img/static/iconUser.png', 'eru', '$argon2i$v=19$m=65536,t=4,p=1$bmRqYzdhT2FCay50N2ljSw$xfgAOfZuSRDuHnpMGaIfOhICgSRkumyStqqeBUj1yEE', 'eruIlluvatar@ea.com', '1', NULL),
(3, 'Lenclume', 'Jordan', 'assets/img/static/iconUser.png', 'nika', '$argon2i$v=19$m=65536,t=4,p=1$N01qbWUxeVZyZ0Y5TlZLcw$ASRCq+Tqbbt34WtxL5jbGo6k9au0NZ1Vmn/A/7lasYc', 'jordan.com', '1', '2024-04-23 12:02:06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `astre`
--
ALTER TABLE `astre`
  ADD PRIMARY KEY (`id_astre`),
  ADD KEY `FK_Type_Astre` (`id_type`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_User_Comment` (`id_user`),
  ADD KEY `FK_Comment_Astre` (`id_astre`);

--
-- Index pour la table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id_difficulty`);

--
-- Index pour la table `proposition_astre`
--
ALTER TABLE `proposition_astre`
  ADD PRIMARY KEY (`id_proposition_astre`),
  ADD KEY `FK_Astre_Proposition_Astre` (`id_astre`),
  ADD KEY `FK_User_Proposition_Astre` (`id_user`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `FK_Difficulty_Question` (`id_difficulty`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Index pour la table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id_response`),
  ADD KEY `FK_Quiz_Response` (`id_quiz`),
  ADD KEY `FK_Question_Response` (`id_question`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `astre`
--
ALTER TABLE `astre`
  MODIFY `id_astre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id_difficulty` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `proposition_astre`
--
ALTER TABLE `proposition_astre`
  MODIFY `id_proposition_astre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `response`
--
ALTER TABLE `response`
  MODIFY `id_response` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Contraintes pour la table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `FK_Question_Response` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Quiz_Response` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
