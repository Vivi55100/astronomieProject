-- BDD Astronomie Project --

CREATE DATABASE IF NOT EXISTS `Astronomie_DB`;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`(
    `id_user` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `last_name` VARCHAR(50) COLLATE `utf8mb4_general_ci` NOT NULL,
    `first_name` VARCHAR(50) COLLATE `utf8mb4_general_ci` NOT NULL,
    `avatar` TEXT COLLATE `utf8mb4_general_ci`,
    `username` VARCHAR(50) COLLATE `utf8mb4_general_ci` NOT NULL,
    `password` VARCHAR(96) COLLATE `utf8mb4_general_ci` NOT NULL,
    `mail` VARCHAR(255) COLLATE `utf8mb4_general_ci` NOT NULL,
    `role` VARCHAR(6) COLLATE `utf8mb4_general_ci` NOT NULL
);

DROP TABLE IF EXISTS `Type`;
CREATE TABLE `Type`(
    `id_type` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `type_content` VARCHAR(50) COLLATE `utf8mb4_general_ci` NOT NULL
);

DROP TABLE IF EXISTS `Quiz`;
CREATE TABLE `Quiz`(
    `id_quiz` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `quiz_name` VARCHAR(50) COLLATE `utf8mb4_general_ci` NOT NULL
);

DROP TABLE IF EXISTS `Difficulty`;
CREATE TABLE `Difficulty`(
    `id_difficulty` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `difficulty_name` VARCHAR(9) COLLATE `utf8mb4_general_ci` NOT NULL
);

DROP TABLE IF EXISTS `Astre`;
CREATE TABLE `Astre`(
    `id_astre` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `astre_name` VARCHAR(50) COLLATE `utf8mb4_general_ci` NOT NULL,
    `size` VARCHAR(255) COLLATE `utf8mb4_general_ci` NOT NULL,
    `distance_to_earth` VARCHAR(255) COLLATE `utf8mb4_general_ci` NOT NULL,
    `date_of_discovery` DATETIME,
    `name_of_discoverer` DATETIME,
    `astre_image` VARCHAR(255) COLLATE `utf8mb4_general_ci` NOT NULL,
    `id_type` INT NOT NULL,
    CONSTRAINT `FK_Type_Astre` FOREIGN KEY (`id_type`)
    REFERENCES `Type`(`id_type`)
);

DROP TABLE IF EXISTS `Proposition_Astre`;
CREATE TABLE `Proposition_Astre`(
    `id_proposition_astre` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `description` TEXT COLLATE `utf8mb4_general_ci` NOT NULL,
    `date_validation_start` DATETIME NOT NULL,
    `date_validation_end` DATETIME NOT NULL,
    `score_validation` INT NOT NULL,
    `id_astre` INT NOT NULL,
    `id_user` INT NOT NULL,
    CONSTRAINT `FK_Astre_Proposition_Astre` FOREIGN KEY (`id_astre`)
    REFERENCES `Astre`(`id_astre`),
    CONSTRAINT `FK_User_Proposition_Astre` FOREIGN KEY (`id_user`)
    REFERENCES `User`(`id_user`)
);

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE `Comment`(
    `id_comment` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `comment_content` TEXT COLLATE `utf8mb4_general_ci` NOT NULL,
    `date_comment` DATETIME NOT NULL,
    `number_like_comment` INT NOT NULL,
    `id_user` INT NOT NULL,
    `id_astre` INT NOT NULL,
    CONSTRAINT `FK_User_Comment` FOREIGN KEY (`id_user`)
    REFERENCES `User`(`id_user`),
    CONSTRAINT `FK_Comment_Astre` FOREIGN KEY (`id_astre`)
    REFERENCES `Astre`(`id_astre`)
);

DROP TABLE IF EXISTS `Question`;
CREATE TABLE `Question`(
    `id_question` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `question_content` TEXT COLLATE `utf8mb4_general_ci` NOT NULL,
    `id_difficulty` INT NOT NULL,
    CONSTRAINT `FK_Difficulty_Question` FOREIGN KEY (`id_difficulty`)
    REFERENCES `Difficulty`(`id_difficulty`)
);

DROP TABLE IF EXISTS `Quiz_Question`;
CREATE TABLE `Quiz_Question`(
    `id_quiz_question` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `id_question` INT NOT NULL,
    `id_quiz` INT NOT NULL,
    CONSTRAINT `FK_Quiz_Quiz_Question` FOREIGN KEY (`id_quiz`)
    REFERENCES `Quiz`(`id_quiz`),
    CONSTRAINT `FK_Question_Quiz_Question` FOREIGN KEY (`id_question`)
    REFERENCES `Question`(`id_question`)
);

DROP TABLE IF EXISTS `Response`;
CREATE TABLE `Response`(
    `id_response` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `response_content` TEXT COLLATE `utf8mb4_general_ci` NOT NULL,
    `id_user` INT NOT NULL,
    `id_quiz` INT NOT NULL,
    CONSTRAINT `FK_User_Response` FOREIGN KEY (`id_user`)
    REFERENCES `User`(`id_user`),
    CONSTRAINT `FK_Quiz_Response` FOREIGN KEY (`id_quiz`)
    REFERENCES `Quiz`(`id_quiz`)
);
