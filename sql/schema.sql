-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Septembre 2018 à 17:30
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  'projetp1v2'
--

-- --------------------------------------------------------

--
-- Structure de la table 'classe'
--

CREATE TABLE classes (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  anneeDebut year(4) NOT NULL,
  anneeFin year(4) NOT NULL,
  idDepartement int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_classe_departement (idDepartement)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'cours'
--

CREATE TABLE cours (
  id int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  heureDebut time NOT NULL,
  heureFin time NOT NULL,
  idMatiere int(11) NOT NULL,
  idSalle int(11) NOT NULL,
  idTD int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_cours_matiere (idMatiere),
  KEY fk_cours_salle (idSalle),
  KEY fk_cours_groupe (idTD)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'departement'
--

CREATE TABLE departements (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'donnecours'
--

CREATE TABLE donnecours (
  idProfesseur int(11) NOT NULL,
  idCours int(11) NOT NULL,
  PRIMARY KEY (idProfesseur,idCours),
  KEY fk_donnecours_cours (idCours)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'enseigne'
--

CREATE TABLE enseignes (
  idProfesseur int(11) NOT NULL,
  idDepartement int(11) NOT NULL,
  PRIMARY KEY (idProfesseur,idDepartement),
  KEY fk_enseigne_dep (idDepartement)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'etudiants'
--

CREATE TABLE etudiants (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  login varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  idTD int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_etudiants_groupe (idTD)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'TD'
--

CREATE TABLE TD (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  idClasse int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_groupe_classe (idClasse)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'TP'
--

CREATE TABLE TP (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  idTD int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_groupe_classe (idTD)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'matiere'
--

CREATE TABLE matieres (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(255) NOT NULL,
  idCouleur int(11) NOT NULL,
  idTypeMatiere int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_matieres_typeMatiere (idTypeMatiere),
  KEY fk_matieres_couleur (idCouleur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'professeurs'
--

CREATE TABLE professeurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  login varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'salle'
--

CREATE TABLE salles (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  idDepartement int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_salles_departements (idDepartement)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'typeMatieres'
--

CREATE TABLE typeMatieres (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- STRUCTURE DE LA TABLE COULEUR
--
CREATE TABLE couleur (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table classe
--
ALTER TABLE classes ADD CONSTRAINT fk_classe_departement FOREIGN KEY (idDepartement) REFERENCES departements (id);

--
-- Contraintes pour la table cours
--
ALTER TABLE cours ADD CONSTRAINT fk_cours_td FOREIGN KEY (idTD) REFERENCES TD (id);
ALTER TABLE cours ADD CONSTRAINT fk_cours_matiere FOREIGN KEY (idMatiere) REFERENCES matieres (id);
ALTER TABLE cours ADD CONSTRAINT fk_cours_salle FOREIGN KEY (idSalle) REFERENCES salles (id);

--
-- Contraintes pour la table donnecours
--
ALTER TABLE donnecours ADD CONSTRAINT fk_donnecours_cours FOREIGN KEY (idCours) REFERENCES cours (id);
ALTER TABLE donnecours ADD CONSTRAINT fk_donnecours_prof FOREIGN KEY (idProfesseur) REFERENCES professeurs (id);

--
-- Contraintes pour la table enseigne
--
ALTER TABLE enseignes ADD CONSTRAINT fk_enseigne_dep FOREIGN KEY (idDepartement) REFERENCES departements (id);
ALTER TABLE enseignes ADD CONSTRAINT fk_enseigne_prof FOREIGN KEY (idProfesseur) REFERENCES professeurs (id);

--
-- Contraintes pour la table etudiants
--
ALTER TABLE etudiants ADD CONSTRAINT fk_etudiants_td FOREIGN KEY (idTD) REFERENCES TD (id);

--
-- Contraintes pour la table matieres
--
ALTER TABLE matieres ADD CONSTRAINT fk_matieres_typeMatiere FOREIGN KEY (idTypeMatiere) REFERENCES typeMatieres (id);
ALTER TABLE matieres ADD CONSTRAINT fk_matieres_couleur FOREIGN KEY (idCouleur) REFERENCES couleur (id);

--
-- Contraintes pour la table TD
--
ALTER TABLE TD ADD CONSTRAINT fk_TD_classe FOREIGN KEY (idClasse) REFERENCES classes (id);

--
-- Contraintes pour la table TP
--
ALTER TABLE TP ADD CONSTRAINT fk_TP_TD FOREIGN KEY (idTD) REFERENCES TD (id);

--
-- Contraintes pour la tables salles
--
ALTER TABLE salles ADD CONSTRAINT fk_salles_departement FOREIGN KEY (idDepartement) REFERENCES departements (id);

--
-- Unicité du login
--
ALTER TABLE etudiants ADD CONSTRAINT u_etudiant UNIQUE (login);

ALTER TABLE professeurs ADD CONSTRAINT u_professeur UNIQUE (login);

--
-- DONNEES
--

--
-- DONNÉES PROFS
--
INSERT INTO professeurs(nom, prenom, login, password)
VALUES ('Iksal', 'Sebastien', 'siksal', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Guntz', 'Fabien', 'fguntz', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Pirolli', 'Raphaelle', 'rpirolli', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Puizillout', 'Anne-Marie', 'ampuizillout', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Jaffrennou', 'Gildas', 'gjaffrennou', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Logeais', 'Jerome', 'jlogeais', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Buchet', 'Bruno', 'bbuchet', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('koumtani', 'Mohamed', 'mkoumtani', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Houliere', 'Eric', 'ehouliere', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Coiffard', 'Laurence', 'lcoiffard', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Corbiere', 'Alain', 'acorbiere', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Khouvilay', 'Eric', 'ekhouvilay', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Chevalier', 'Manuel', 'mchevalier', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
       ('Habault', 'Jean-Christophe', 'jchabault', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17');


--
-- DONNEES DEPARTEMENTS
--
INSERT INTO departements(intitule)
VALUES ('MMI'),
       ('GB'),
       ('INFO'),
       ('TC');

--
-- DONNEES SALLES
--
INSERT INTO salles (intitule, idDepartement)
VALUES ('TD1-MMI', 1),
       ('TD4-MMI', 1),
       ('Amphi 3', 1),
       ('Rock-MMI', 1),
       ('Amphi 1', 1),
       ('Tango-MMI', 1),
       ('TD2-MMI', 1),
       ('MAMBO-MMI', 1),
       ('Labo multimédia TC', 1),
       ('JAVA-MMI', 1);
--
-- DONNEES CLASSES
--
INSERT INTO classes(intitule, anneeDebut, anneeFin, idDepartement)
VALUES ('MMI1', '2018', '2019', '1'),
       ('MMI2', '2018', '2019', '1'),
       ('LP DIWA', '2018', '2019', '1');

--
-- DONNEES TD
--
INSERT INTO TD(intitule, idClasse)
VALUES ('TD11', 1),
       ('TD12', 1),
       ('LPDIWA', 1),
       ('TD13', 1);

--
-- DONNEES TP
--
INSERT INTO TP(intitule, idTD)
VALUES ('11-A', 1),
       ('11-B', 1),
       ('LPDIWA-ALT', 3);

--
-- DONNEES ETUDIANTS
--
INSERT INTO etudiants(nom, prenom, login, password, idTD)
VALUES ('Leray', 'Thomas', 'i161878', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17', 3),
       ('Dujardin', 'Charlotte', 'i181855', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17', 3),
       ('Boulard', 'Vincent', 'i181561', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17', 3);

--
-- DONNEES ENSEIGNER
--
INSERT INTO enseignes
VALUES (1, 1),
       (2, 1),
       (3, 1),
       (4, 1),
       (5, 1),
       (6, 1),
       (7, 1),
       (8, 1),
       (9, 1),
       (10, 1),
       (11, 1),
       (12, 1),
       (13, 1),
       (14, 1);

--
-- DONNEES TYPEMATIERE
--
INSERT INTO typeMatieres (intitule)
VALUES ('CM'),
       ('TD'),
       ('TD machines'),
       ('TP'),
       ('TP autonome'),
       ('Réunion');

--
-- DONNEES COULEUR
--
INSERT INTO couleur (intitule)
VALUES ('turquoise'),
       ('darkTurquoise'),
       ('green'),
       ('darkGreen'),
       ('blue'),
       ('darkBlue'),
       ('purple'),
       ('darkPurple'),
       ('marine'),
       ('darkMarine'),
       ('yellow'),
       ('darkYellow'),
       ('orange'),
       ('darkOrange'),
       ('red'),
       ('darkRed'),
       ('grey'),
       ('darkGrey');

--
-- DONNEES MATIERES
--
INSERT INTO matieres(intitule, idCouleur, idTypeMatiere)
VALUES ('introduction aux théories de l\'infoCom', 1, 1),
       ('introduction aux théories de l\'infoCom', 1, 2),
       ('introduction aux théories de l\'infoCom', 1, 4),
       ('Algorythmique et programmation', 2, 4),
       ('histoire de l\'art et création artistique', 2, 1),
       ('Environnement logiciel et technique', 3, 2),
       ('Anglais', 4, 1),
       ('Mathématiques pour le signal', 5, 2),
       ('Analyse photographique et filmique', 6, 1),
       ('Projet Professionnel Personnalisé', 7, 5),
       ('infrastructure des réseaux', 8, 1),
       ('intégration web', 9, 3),
       ('Outils de la gestion de projet', 10, 1);
