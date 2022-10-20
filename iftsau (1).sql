-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 21 sep. 2022 à 23:44
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `iftsau`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `promotion` varchar(20) DEFAULT NULL,
  `semestre` varchar(10) DEFAULT NULL,
  `justification` varchar(10) DEFAULT NULL,
  `motif` text,
  PRIMARY KEY (`id_absence`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `code`, `date`, `matiere`, `promotion`, `semestre`, `justification`, `motif`) VALUES
(47, '1/17', '2022-09-06', 'FranÃ§ais', '6', 'semestre_1', 'oui', ''),
(46, '1/17', '2022-08-26', 'FranÃ§ais', '5', 'semestre_1', 'oui', ''),
(42, '1/17', '2022-08-10', 'FranÃ§ais', '5', 'semestre_1', 'non', ''),
(43, '1/17', '2022-08-10', 'FranÃ§ais', '5', 'semestre_1', 'non', ''),
(44, '1/17', '1010-10-10', 'FranÃ§ais', '5', 'semestre_1', 'non', ''),
(45, '1/17', '2022-08-25', 'FranÃ§ais', '5', 'semestre_1', 'non', '');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin@gmail.com', '@admin123');

-- --------------------------------------------------------

--
-- Structure de la table `assiduite`
--

DROP TABLE IF EXISTS `assiduite`;
CREATE TABLE IF NOT EXISTS `assiduite` (
  `id_assiduite` int(11) NOT NULL AUTO_INCREMENT,
  `code_etudiant` varchar(50) DEFAULT NULL,
  `semestre` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `motif` text,
  PRIMARY KEY (`id_assiduite`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assiduite`
--

INSERT INTO `assiduite` (`id_assiduite`, `code_etudiant`, `semestre`, `date`, `type`, `motif`) VALUES
(8, '1/17', 'semestre_1', '2022-08-20', 'avertissement', ''),
(7, '1/17', 'semestre_1', '2022-08-19', 'avertissement', ''),
(6, '1/17', 'semestre_1', '2022-08-18', 'avertissement', '');

-- --------------------------------------------------------

--
-- Structure de la table `bulletins`
--

DROP TABLE IF EXISTS `bulletins`;
CREATE TABLE IF NOT EXISTS `bulletins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_semestre_1` double NOT NULL,
  `note_semestre_2` double NOT NULL,
  `note_semestre_3` double NOT NULL,
  `note_semestre_4` double NOT NULL,
  `note_generale_1` double NOT NULL,
  `note_generale_2` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(80) DEFAULT NULL,
  `n_apogee` varchar(30) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nomarab` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prenomarab` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_naissance` varchar(100) DEFAULT NULL,
  `lieu_naissance` text,
  `CIN` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tele` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `adresse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `sexe` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `RIB` varchar(50) DEFAULT NULL,
  `code_massar` varchar(80) DEFAULT NULL,
  `type_bac` varchar(50) DEFAULT NULL,
  `moyenne_bac` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `nom_tuteur` varchar(50) DEFAULT NULL,
  `tele_tuteur` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `nationalite` varchar(70) DEFAULT NULL,
  `n_sejour` varchar(70) DEFAULT NULL,
  `tele_urgence` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `promotion` varchar(20) DEFAULT NULL,
  `semestre` varchar(20) DEFAULT NULL,
  `etat` varchar(20) DEFAULT NULL,
  `date_d'inscription` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `datefin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `annee` varchar(100) DEFAULT NULL,
  `anne acad_1` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `anne acad_2` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `photo`, `n_apogee`, `nom`, `prenom`, `nomarab`, `prenomarab`, `date_naissance`, `lieu_naissance`, `CIN`, `email`, `tele`, `adresse`, `sexe`, `RIB`, `code_massar`, `type_bac`, `moyenne_bac`, `nom_tuteur`, `tele_tuteur`, `nationalite`, `n_sejour`, `tele_urgence`, `promotion`, `semestre`, `etat`, `date_d'inscription`, `datefin`, `annee`, `anne acad_1`, `anne acad_2`) VALUES
(1, 'default.png', '1/17', 'ABDREZAK ', 'MARWAN', NULL, NULL, '1999-01-18', '', 'T7781154', 'maxx_xx@hotmail.com', '0649997735', 'HAY EL MANAR OUJDA', 'FEMININ', '', '128627', '', '', '', '', 'MAROCAINE', '', '', '1', 'Semestre_4', 'L\'aureat', '', '', 'Deuxieme annee', '', ''),
(2, 'default.png', '2/17', 'ACHO ', 'JALAL', NULL, NULL, '1996-09-28', '', 'HY656273', 'achxxxr.xxx98@gmail.com', '079992328', ' EL WIFAQ ZOUAGHA HAUT FES', 'FEMININ', '', 'N13735255', '', '', '', '', 'MAROCAINE', '', '', '1', 'Semestre_4', 'L\'aureat', '', '', 'Deuxieme annee', '', ''),
(3, '62f6ba2fbd5ef5.08512901.jpg', '3/17', 'AZMAM ', 'NOUHAYLA', NULL, NULL, '1996-12-01', '', 'CO0885593', 'Nouxxxxxxxx@gmail.com', '0771970975', ' CGI OUJDA', 'FEMININ', '', 'N136310899', '', '', '', '', 'MAROCAINE', '', '', '1', 'Semestre_4', 'L\'aureat', '', '', 'Deuxieme annee', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_matiere` varchar(30) DEFAULT NULL,
  `intitule_matiere` varchar(50) DEFAULT NULL,
  `coef` int(30) DEFAULT NULL,
  `nb_heure` int(50) DEFAULT NULL,
  `semestre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `code_matiere`, `intitule_matiere`, `coef`, `nb_heure`, `semestre`) VALUES
(46, 'FRT1', 'FranÃ§ais Technique I', 3, 45, 'semestre_1/semestre_2'),
(21, 'DRA1', 'Droit Administratif', 2, 45, 'semestre_1/semestre_2'),
(22, 'HIA1', 'Histoire d Architecture', 5, 45, 'semestre_1/semestre_2'),
(17, 'ART1', 'Arabe Technique I', 3, 45, 'semestre_1/semestre_2'),
(45, 'DEA1', 'Dessin d Architecture ', 5, 90, 'semestre_1/semestre_2'),
(44, 'REG1', 'RÃ¨glement d Urbanisme', 3, 45, 'semestre_1/semestre_2'),
(24, 'URB1', 'Urbanisme', 5, 45, 'semestre_1/semestre_2'),
(43, 'MET1', 'MÃ©trÃ© I', 3, 45, 'semestre_1/semestre_2'),
(42, 'REM1', 'RÃ©sistance des MatÃ©riaux', 4, 90, 'semestre_1/semestre_2'),
(41, 'TMC1', 'Techniques & MatÃ©riaux de Construction', 4, 60, 'semestre_1/semestre_2'),
(29, 'VUA1', 'Voirie urbaine & Assainissement', 4, 60, 'semestre_1/semestre_2'),
(30, 'AUT1', 'Informatique Autocad ', 3, 45, 'semestre_1/semestre_2'),
(31, 'ARP1', 'Art Plastique I', 4, 60, 'semestre_1/semestre_2'),
(32, 'CAT1', 'Cartographie & Topographie', 5, 45, 'semestre_1/semestre_2'),
(40, 'ASC1', 'AssiduitÃ© et Conduite I', 2, 0, 'semestre_1/semestre_2'),
(39, 'FRT2', 'FranÃ§ais Technique II', 3, 45, 'semestre_3/semestre_4'),
(38, 'CMP2', 'ComptabilitÃ© et Management de Projet', 3, 45, 'semestre_3/semestre_4'),
(47, 'GED1', 'GÃ©omÃ©trie Descriptive', 3, 45, 'semestre_1/semestre_2'),
(48, 'STA1', 'Statistique AppliquÃ©e', 2, 45, 'semestre_1/semestre_2'),
(49, 'BAR2', 'Beton ArmÃ©', 4, 90, 'semestre_3/semestre_4'),
(50, 'ARP2', 'Art Plastique II', 4, 90, 'semestre_3/semestre_4'),
(51, 'PRA2', 'Projet d Architecture ', 6, 90, 'semestre_3/semestre_4'),
(52, 'PFE2', 'Projet de Fin d Etudes', 6, 0, 'semestre_3/semestre_4'),
(53, 'VUA2', 'Voirie Urbaine  Assainissement', 4, 45, 'semestre_3/semestre_4'),
(54, 'CON2', 'Techniques de Construction', 4, 45, 'semestre_3/semestre_4'),
(55, 'TOP2', 'Topographie - Photogrammetrie', 5, 45, 'semestre_3/semestre_4'),
(56, 'PRU2', 'Projet d Urbanisme ', 5, 45, 'semestre_3/semestre_4'),
(57, 'TTB2', 'Technologie Thermique du Batiment', 3, 45, 'semestre_3/semestre_4'),
(58, 'COV2', 'COVADIS', 4, 90, 'semestre_3/semestre_4'),
(59, 'AUT2', 'Autocad', 3, 30, 'semestre_3/semestre_4'),
(60, 'ARC2', 'Archicad', 3, 30, 'semestre_3/semestre_4'),
(61, 'PHO2', 'Photoshop', 2, 30, 'semestre_3/semestre_4'),
(62, 'STI2', 'Stage d Initiation', 4, 0, 'semestre_3/semestre_4'),
(63, 'ASC2', 'Assiduite et Conduite  II', 2, 0, 'semestre_3/semestre_4'),
(64, 'MET2', 'MÃ©trÃ©', 3, 45, 'semestre_3/semestre_4');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_apogee` varchar(50) DEFAULT NULL,
  `code_matiere` varchar(50) DEFAULT NULL,
  `note semestre` varchar(70) DEFAULT NULL,
  `note ratt` varchar(70) DEFAULT NULL,
  `note exam` varchar(70) DEFAULT NULL,
  `semestre` varchar(10) DEFAULT NULL,
  `promotion` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;




-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `CIN_etudiant` varchar(50) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  `add` text NOT NULL,
  `periode` varchar(50) NOT NULL,
  `encadrant` varchar(50) NOT NULL,
  `date_soutenance` date NOT NULL,
  `jures` varchar(50) NOT NULL,
  `coeficient` int(10) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `total_absence`
--

DROP TABLE IF EXISTS `total_absence`;
CREATE TABLE IF NOT EXISTS `total_absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `promotion` int(30) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  `nb_total` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `total_absence`
--

INSERT INTO `total_absence` (`id`, `code`, `promotion`, `semestre`, `nb_total`) VALUES
(9, '1/17', 5, 'semestre_1', 2),
(10, '2/17', 5, 'semestre_1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vacataire`
--

DROP TABLE IF EXISTS `vacataire`;
CREATE TABLE IF NOT EXISTS `vacataire` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `CIN_vacataire` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tele` int(90) DEFAULT '0',
  `fonction` varchar(80) DEFAULT NULL,
  `grade_professionnel` varchar(60) DEFAULT NULL,
  `code_matiere1` varchar(50) DEFAULT NULL,
  `code_matiere2` varchar(50) DEFAULT NULL,
  `code_matiere3` varchar(50) DEFAULT NULL,
  `code_matiere4` varchar(50) DEFAULT NULL,
  `code_matiere5` varchar(30) DEFAULT NULL,
  `code_matiere6` varchar(30) DEFAULT NULL,
  `etat` varchar(50) NOT NULL,
  `periode_debut` date DEFAULT NULL,
  `periode_fin` date DEFAULT NULL,
  `RIB` varchar(60000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vacataire`
--

INSERT INTO `vacataire` (`id`, `CIN_vacataire`, `nom`, `prenom`, `email`, `tele`, `fonction`, `grade_professionnel`, `code_matiere1`, `code_matiere2`, `code_matiere3`, `code_matiere4`, `code_matiere5`, `code_matiere6`, `etat`, `periode_debut`, `periode_fin`, `RIB`) VALUES
(12, 'F346999', 'XXXXX', 'NADIA', 'nad@Outlook.fr', 662999921, 'Fonctionnaire', NULL, 'DEA1', 'PRA2', NULL, NULL, NULL, NULL, 'Actif', '2017-10-01', '2017-10-01', '22557004501010721'),
(13, 'F399970', 'XXXXX', 'MOHAMMED', NULL, 661000087, 'Fonctionnaire', NULL, 'ARP1', 'ARP2', NULL, NULL, NULL, NULL, 'Actif', '2017-10-01', '2017-10-01', '011570000016794'),
(14, 'F999058', 'EL HAYEJ ', 'XXXXX', 'elhayej@gmail.com', 6300049999, 'Fonctionnaire', NULL, 'COV2', NULL, NULL, NULL, NULL, NULL, 'Actif', '2017-10-01', '2017-10-01', '0075700030067119'),
(15, 'F299999', 'XXXX', 'MOSTAFA', 'wda@gmail.com', 661000019, 'Fonctionnaire', NULL, 'MET1', 'MET2', NULL, NULL, NULL, NULL, 'Actif', '2017-10-01', '2017-10-01', '0215742794');

-- --------------------------------------------------------

--
-- Structure de la table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
CREATE TABLE IF NOT EXISTS `vacation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_vacataire` varchar(50) NOT NULL,
  `id_matiere` varchar(30) NOT NULL,
  `semestre` varchar(11) DEFAULT NULL,
  `seance` varchar(50) DEFAULT NULL,
  `type_seance` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `duree` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vacation`
--

INSERT INTO `vacation` (`id`, `date`, `id_vacataire`, `id_matiere`, `semestre`, `seance`, `type_seance`, `action`, `duree`) VALUES
(37, '2022-08-13', 'F346999', 'DEA1', 'semestre_1', '10-12h', 'cours/TD', 'effectuer', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
