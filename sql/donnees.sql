-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 05 Octobre 2018 à 12:48
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetp1`
--

--
-- Vider la table avant d'insérer `classes`
--

TRUNCATE TABLE `classes`;
--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id`, `intitule`, `anneeDebut`, `anneeFin`, `idDepartement`) VALUES
(1, 'MMI1', 2018, 2019, 1),
(2, 'MMI2', 2018, 2019, 1),
(3, 'LP DIWA', 2018, 2019, 1);

--
-- Vider la table avant d'insérer `couleur`
--

TRUNCATE TABLE `couleur`;
--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`id`, `intitule`) VALUES
(1, 'turquoise'),
(2, 'darkTurquoise'),
(3, 'green'),
(4, 'darkGreen'),
(5, 'blue'),
(6, 'darkBlue'),
(7, 'purple'),
(8, 'darkPurple'),
(9, 'marine'),
(10, 'darkMarine'),
(11, 'yellow'),
(12, 'darkYellow'),
(13, 'orange'),
(14, 'darkOrange'),
(15, 'red'),
(16, 'darkRed'),
(17, 'grey'),
(18, 'darkGrey');

--
-- Vider la table avant d'insérer `cours`
--

TRUNCATE TABLE `cours`;
--
-- Contenu de la table `cours`
--

INSERT INTO cours (id, date, heureDebut, heureFin, idMatiere, idSalle, idTD) VALUES
(121, '2018-10-01', '11:30:00', '12:30:00', 18, 3, 5),
(122, '2018-10-02', '15:00:00', '16:30:00', 18, 1, 1),
(123, '2018-10-01', '10:30:00', '11:30:00', 18, 3, 5),
(124, '2018-10-04', '13:30:00', '16:30:00', 18, 3, 6),
(125, '2018-10-05', '13:30:00', '16:30:00', 25, 10, 1),
(126, '2018-10-01', '16:30:00', '18:00:00', 16, 1, 1),
(127, '2018-10-07', '14:45:00', '16:15:00', 16, 6, 1),
(128, '2018-10-01', '09:00:00', '10:30:00', 17, 2, 1),
(129, '2018-10-04', '11:00:00', '12:30:00', 17, 1, 1),
(130, '2018-10-01', '15:00:00', '16:30:00', 19, 4, 1),
(131, '2018-10-03', '13:30:00', '15:00:00', 22, 4, 1),
(132, '2018-10-01', '18:00:00', '19:30:00', 21, 2, 1),
(133, '2018-10-03', '09:30:00', '11:00:00', 23, 2, 1),
(134, '2018-10-05', '10:30:00', '12:00:00', 26, 6, 1),
(135, '2018-10-02', '09:30:00', '10:30:00', 16, 5, 5),
(136, '2018-10-04', '08:00:00', '11:00:00', 16, 5, 7),
(137, '2018-10-03', '11:00:00', '12:30:00', 17, 7, 1);

--
-- Vider la table avant d'insérer `departements`
--

TRUNCATE TABLE `departements`;
--
-- Contenu de la table `departements`
--

INSERT INTO `departements` (`id`, `intitule`) VALUES
(1, 'MMI'),
(2, 'GB'),
(3, 'INFO'),
(4, 'TC');

--
-- Vider la table avant d'insérer `donnecours`
--

TRUNCATE TABLE `donnecours`;
--
-- Vider la table avant d'insérer `enseignes`
--

TRUNCATE TABLE `enseignes`;
--
-- Contenu de la table `enseignes`
--

INSERT INTO `enseignes` (`idProfesseur`, `idDepartement`) VALUES
(1, 1),
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
-- Vider la table avant d'insérer `etudiants`
--

TRUNCATE TABLE `etudiants`;
--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `login`, `password`, `idTD`) VALUES
(4, 'Leray', 'Thomas', 'i161878', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17', 3),
(5, 'Dujardin', 'Charlotte', 'i181855', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17', 3),
(6, 'Boulard', 'Vincent', 'i181561', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17', 3);

--
-- Vider la table avant d'insérer `matieres`
--

TRUNCATE TABLE `matieres`;
--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id`, `intitule`, `idCouleur`, `idTypeMatiere`) VALUES
(14, 'Introduction aux théories de l\'infoCom', 1, 1),
(15, 'Introduction aux théories de l\'infoCom', 1, 2),
(16, 'Introduction aux théories de l\'infoCom', 1, 4),
(17, 'Algorithmique et programmation', 2, 4),
(18, 'Histoire de l\'art et création artistique GJ', 2, 1),
(19, 'Environnement logiciel et technique', 3, 2),
(20, 'Anglais', 4, 1),
(21, 'Mathématiques pour le signal', 5, 2),
(22, 'Analyse photographique et filmique', 6, 1),
(23, 'Projet Professionnel Personnalisé', 7, 5),
(24, 'Infrastructure des réseaux', 8, 1),
(25, 'Intégration web', 9, 3),
(26, 'Outils de la gestion de projet', 10, 1);

--
-- Vider la table avant d'insérer `professeurs`
--

TRUNCATE TABLE `professeurs`;
--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'Iksal', 'Sebastien', 'siksal', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(2, 'Guntz', 'Fabien', 'fguntz', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(3, 'Pirolli', 'Raphaelle', 'rpirolli', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(4, 'Puizillout', 'Anne-Marie', 'ampuizillout', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(5, 'Jaffrennou', 'Gildas', 'gjaffrennou', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(6, 'Logeais', 'Jerome', 'jlogeais', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(7, 'Buchet', 'Bruno', 'bbuchet', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(8, 'koumtani', 'Mohamed', 'mkoumtani', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(9, 'Houliere', 'Eric', 'ehouliere', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(10, 'Coiffard', 'Laurence', 'lcoiffard', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(11, 'Corbiere', 'Alain', 'acorbiere', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(12, 'Khouvilay', 'Eric', 'ekhouvilay', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(13, 'Chevalier', 'Manuel', 'mchevalier', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17'),
(14, 'Habault', 'Jean-Christophe', 'jchabault', 'F4F263E439CF40925E6A412387A9472A6773C2580212A4FB50D224D3A817DE17');

--
-- Vider la table avant d'insérer `salles`
--

TRUNCATE TABLE `salles`;
--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`id`, `intitule`, `idDepartement`) VALUES
(1, 'TD1-MMI', 0),
(2, 'TD4-MMI', 0),
(3, 'Amphi 3', 0),
(4, 'Rock-MMI', 0),
(5, 'Amphi 1', 0),
(6, 'Tango-MMI', 0),
(7, 'TD2-MMI', 0),
(8, 'MAMBO-MMI', 0),
(9, 'Labo multimédia TC', 0),
(10, 'JAVA-MMI', 0);

--
-- Vider la table avant d'insérer `td`
--

TRUNCATE TABLE TD;
--
-- Contenu de la table `td`
--

INSERT INTO `TD` (`id`, `intitule`, `idClasse`) VALUES
(1, 'TD11', 1),
(2, 'TD12', 1),
(3, 'LPDIWA', 1),
(4, 'TD13', 1),
(5, 'DUT MMI1', 1),
(6, '11A', 1),
(7, '11B', 1);

--
-- Vider la table avant d'insérer `tp`
--

TRUNCATE TABLE `TP`;
--
-- Contenu de la table `tp`
--

INSERT INTO `TP` (`id`, `intitule`, `idTD`) VALUES
(1, '11-A', 1),
(2, '11-B', 1),
(3, 'LPDIWA-ALT', 3);

--
-- Vider la table avant d'insérer `typematieres`
--

TRUNCATE TABLE `typeMatieres`;
--
-- Contenu de la table `typematieres`
--

INSERT INTO `typeMatieres` (`id`, `intitule`) VALUES
(1, 'CM'),
(2, 'TD'),
(3, 'TD machines'),
(4, 'TP'),
(5, 'TP autonome'),
(6, 'Réunion');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
