-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 18 avr. 2024 à 08:34
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
-- Base de données : `Astronomie_DB`
--

-- --------------------------------------------------------

--
-- Structure de la table `Astre`
--

CREATE TABLE `Astre` (
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
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `id_comment` int NOT NULL,
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_comment` datetime NOT NULL,
  `number_like_comment` int NOT NULL,
  `id_user` int NOT NULL,
  `id_astre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Difficulty`
--

CREATE TABLE `Difficulty` (
  `id_difficulty` int NOT NULL,
  `difficulty_name` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Proposition_Astre`
--

CREATE TABLE `Proposition_Astre` (
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
-- Structure de la table `Question`
--

CREATE TABLE `Question` (
  `id_question` int NOT NULL,
  `question_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_difficulty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Quiz`
--

CREATE TABLE `Quiz` (
  `id_quiz` int NOT NULL,
  `quiz_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Quiz_Question`
--

CREATE TABLE `Quiz_Question` (
  `id_quiz_question` int NOT NULL,
  `id_question` int NOT NULL,
  `id_quiz` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Response`
--

CREATE TABLE `Response` (
  `id_response` int NOT NULL,
  `response_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_quiz` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Type`
--

CREATE TABLE `Type` (
  `id_type` int NOT NULL,
  `type_content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id_user` int NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Astre`
--
ALTER TABLE `Astre`
  ADD PRIMARY KEY (`id_astre`),
  ADD KEY `FK_Type_Astre` (`id_type`);

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_User_Comment` (`id_user`),
  ADD KEY `FK_Comment_Astre` (`id_astre`);

--
-- Index pour la table `Difficulty`
--
ALTER TABLE `Difficulty`
  ADD PRIMARY KEY (`id_difficulty`);

--
-- Index pour la table `Proposition_Astre`
--
ALTER TABLE `Proposition_Astre`
  ADD PRIMARY KEY (`id_proposition_astre`),
  ADD KEY `FK_Astre_Proposition_Astre` (`id_astre`),
  ADD KEY `FK_User_Proposition_Astre` (`id_user`);

--
-- Index pour la table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `FK_Difficulty_Question` (`id_difficulty`);

--
-- Index pour la table `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Index pour la table `Quiz_Question`
--
ALTER TABLE `Quiz_Question`
  ADD PRIMARY KEY (`id_quiz_question`),
  ADD KEY `FK_Quiz_Quiz_Question` (`id_quiz`),
  ADD KEY `FK_Question_Quiz_Question` (`id_question`);

--
-- Index pour la table `Response`
--
ALTER TABLE `Response`
  ADD PRIMARY KEY (`id_response`),
  ADD KEY `FK_User_Response` (`id_user`),
  ADD KEY `FK_Quiz_Response` (`id_quiz`);

--
-- Index pour la table `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Astre`
--
ALTER TABLE `Astre`
  MODIFY `id_astre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Difficulty`
--
ALTER TABLE `Difficulty`
  MODIFY `id_difficulty` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Proposition_Astre`
--
ALTER TABLE `Proposition_Astre`
  MODIFY `id_proposition_astre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Question`
--
ALTER TABLE `Question`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Quiz`
--
ALTER TABLE `Quiz`
  MODIFY `id_quiz` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Quiz_Question`
--
ALTER TABLE `Quiz_Question`
  MODIFY `id_quiz_question` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Response`
--
ALTER TABLE `Response`
  MODIFY `id_response` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Type`
--
ALTER TABLE `Type`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Astre`
--
ALTER TABLE `Astre`
  ADD CONSTRAINT `FK_Type_Astre` FOREIGN KEY (`id_type`) REFERENCES `Type` (`id_type`);

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_Comment_Astre` FOREIGN KEY (`id_astre`) REFERENCES `Astre` (`id_astre`),
  ADD CONSTRAINT `FK_User_Comment` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Proposition_Astre`
--
ALTER TABLE `Proposition_Astre`
  ADD CONSTRAINT `FK_Astre_Proposition_Astre` FOREIGN KEY (`id_astre`) REFERENCES `Astre` (`id_astre`),
  ADD CONSTRAINT `FK_User_Proposition_Astre` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `FK_Difficulty_Question` FOREIGN KEY (`id_difficulty`) REFERENCES `Difficulty` (`id_difficulty`);

--
-- Contraintes pour la table `Quiz_Question`
--
ALTER TABLE `Quiz_Question`
  ADD CONSTRAINT `FK_Question_Quiz_Question` FOREIGN KEY (`id_question`) REFERENCES `Question` (`id_question`),
  ADD CONSTRAINT `FK_Quiz_Quiz_Question` FOREIGN KEY (`id_quiz`) REFERENCES `Quiz` (`id_quiz`);

--
-- Contraintes pour la table `Response`
--
ALTER TABLE `Response`
  ADD CONSTRAINT `FK_Quiz_Response` FOREIGN KEY (`id_quiz`) REFERENCES `Quiz` (`id_quiz`),
  ADD CONSTRAINT `FK_User_Response` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
