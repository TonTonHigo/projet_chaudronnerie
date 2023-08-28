CREATE DATABASE bdd_chaudronnerie;
USE bdd_chaudronnerie;

CREATE TABLE `Role` (
	`id_role` INT NOT NULL AUTO_INCREMENT,
	`type` varchar(20) NOT NULL,
	PRIMARY KEY (`id_role`)
);

CREATE TABLE `Article` (
	`id_article` INT NOT NULL AUTO_INCREMENT,
	`titre` INT NOT NULL,
	`contenu` INT NOT NULL,
	`image` INT NOT NULL,
	PRIMARY KEY (`id_article`)
);

CREATE TABLE `Galerie` (
	`id_galerie` INT NOT NULL AUTO_INCREMENT,
	`photo` varchar(100) NOT NULL,
	`descriptif` TEXT(1000) NOT NULL,
	PRIMARY KEY (`id_galerie`)
);

CREATE TABLE `Contact` (
	`id_contact` INT NOT NULL AUTO_INCREMENT,
	`pseudonyme` varchar(30) NOT NULL,
	`email` varchar(30) NOT NULL,
	`sujet` varchar(50) NOT NULL,
	`message` TEXT(5000) NOT NULL,
	`id_utilisateur` INT NOT NULL,
	PRIMARY KEY (`id_contact`)
);

CREATE TABLE `Utilisateur` (
	`id_utilisateur` INT NOT NULL AUTO_INCREMENT,
	`pseudonyme` varchar(30) NOT NULL,
	`email` varchar(30) NOT NULL,
	`mdp` varchar(100) NOT NULL,
	`id_role` INT NOT NULL,
	PRIMARY KEY (`id_utilisateur`)
);

CREATE TABLE `Commentaire` (
	`id_commentaire` INT NOT NULL AUTO_INCREMENT,
	`message` INT NOT NULL,
	`id_article` INT NOT NULL,
	`id_utilisateur` INT NOT NULL,
	PRIMARY KEY (`id_commentaire`)
);

CREATE TABLE `Tutoriel` (
	`id_tutoriel` INT NOT NULL AUTO_INCREMENT,
	`id_tutoriel` INT NOT NULL AUTO_INCREMENT,
	`titre` varchar(100) NOT NULL,
	`contenu` TEXT(5000) NOT NULL,
	`image` varchar(200) NOT NULL,
	`image2` varchar(200) NOT NULL,
	PRIMARY KEY (`id_tutoriel`,`id_tutoriel`)
);

CREATE TABLE `Commentaire_1` (
	`id_commentaire` INT NOT NULL AUTO_INCREMENT,
	`id_commentaire` INT NOT NULL AUTO_INCREMENT,
	`message` INT NOT NULL,
	`id_tutoriel` INT NOT NULL,
	`id_utilisateur` INT NOT NULL,
	PRIMARY KEY (`id_commentaire`,`id_commentaire`)
);

ALTER TABLE `Contact` ADD CONSTRAINT `Contact_fk0` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur`(`id_utilisateur`);

ALTER TABLE `Utilisateur` ADD CONSTRAINT `Utilisateur_fk0` FOREIGN KEY (`id_role`) REFERENCES `Role`(`id_role`);

ALTER TABLE `Commentaire` ADD CONSTRAINT `Commentaire_fk0` FOREIGN KEY (`id_article`) REFERENCES `Article`(`id_article`);

ALTER TABLE `Commentaire` ADD CONSTRAINT `Commentaire_fk1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur`(`id_utilisateur`);

ALTER TABLE `Commentaire_1` ADD CONSTRAINT `Commentaire_1_fk0` FOREIGN KEY (`id_tutoriel`) REFERENCES `Tutoriel`(`id_tutoriel`);

ALTER TABLE `Commentaire_1` ADD CONSTRAINT `Commentaire_1_fk1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur`(`id_utilisateur`);









