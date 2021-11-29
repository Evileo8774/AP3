-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 oct. 2021 à 11:33
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
-- Base de données : `ap`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `numAgence` int(11) NOT NULL AUTO_INCREMENT,
  `nomAgence` varchar(50) NOT NULL,
  `adresseAgence` varchar(100) NOT NULL,
  `telAgence` varchar(15) NOT NULL,
  `mailAgence` varchar(100) NOT NULL,
  PRIMARY KEY (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSociale` varchar(20) NOT NULL,
  `numSiren` int(11) NOT NULL,
  `codeApe` char(5) NOT NULL,
  `adressePostale` varchar(100) NOT NULL,
  `numTel` varchar(15) NOT NULL,
  `numTelecopie` varchar(10) NOT NULL,
  `eMail` varchar(100) DEFAULT NULL,
  `numAgence` int(11) NOT NULL,
  PRIMARY KEY (`numClient`),
  KEY `client_agence_FK` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `numContrat` int(11) NOT NULL AUTO_INCREMENT,
  `dateSignature` date NOT NULL,
  `dateEcheance` date NOT NULL,
  `numSerie` char(10) NOT NULL,
  PRIMARY KEY (`numContrat`),
  KEY `contratMaintenance_materiel_FK` (`numSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

DROP TABLE IF EXISTS `fiche`;
CREATE TABLE IF NOT EXISTS `fiche` (
  `numFiche` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSocialeClient` varchar(20) NOT NULL,
  `adresseClient` varchar(100) NOT NULL,
  `dateHeureVisite` datetime NOT NULL,
  `numClient` int(11) NOT NULL,
  `numSerie` char(10) NOT NULL,
  PRIMARY KEY (`numFiche`),
  KEY `Fiche_client_FK` (`numClient`),
  KEY `Fiche_materiel0_FK` (`numSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ficheintervention`
--

DROP TABLE IF EXISTS `ficheintervention`;
CREATE TABLE IF NOT EXISTS `ficheintervention` (
  `numFiche_ficheIntervention` int(11) NOT NULL,
  `numGerantTechnicien` int(11) NOT NULL,
  `numFiche` int(11) NOT NULL,
  `matriculeTechnicien` int(11) NOT NULL,
  PRIMARY KEY (`numFiche_ficheIntervention`,`numGerantTechnicien`),
  KEY `ficheIntervention_technicienGerant0_FK` (`numGerantTechnicien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `numSerie` char(10) NOT NULL,
  `dateVente` date NOT NULL,
  `dateInstall` date NOT NULL,
  `prixVente` double NOT NULL,
  `emplacement` varchar(100) NOT NULL,
  `typeMateriel` varchar(20) NOT NULL,
  `refMateriel` varchar(50) NOT NULL,
  `libelleType` varchar(50) NOT NULL,
  PRIMARY KEY (`numSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `procedurerenouvellement`
--

DROP TABLE IF EXISTS `procedurerenouvellement`;
CREATE TABLE IF NOT EXISTS `procedurerenouvellement` (
  `numRenouv` int(11) NOT NULL AUTO_INCREMENT,
  `dateRenouvellement` date NOT NULL,
  `dateNouvelleEcheance` date NOT NULL,
  `datePremiereSiganture` date NOT NULL,
  `numContrat` int(11) NOT NULL,
  PRIMARY KEY (`numRenouv`),
  KEY `procedureRenouvellement_contratMaintenance_FK` (`numContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `techniciengerant`
--

DROP TABLE IF EXISTS `techniciengerant`;
CREATE TABLE IF NOT EXISTS `techniciengerant` (
  `numGerantTechnicien` int(11) NOT NULL AUTO_INCREMENT,
  `nomGT` varchar(50) NOT NULL,
  `prenomGT` varchar(50) NOT NULL,
  `adresseGT` varchar(100) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `qualifTechnicien` varchar(30) DEFAULT NULL,
  `dateObtention` date DEFAULT NULL,
  `mailTechnicien` varchar(100) DEFAULT NULL,
  `telTechnicien` varchar(15) DEFAULT NULL,
  `numAgence` int(11) NOT NULL,
  PRIMARY KEY (`numGerantTechnicien`),
  KEY `technicienGerant_agence_FK` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_agence_FK` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`);

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `contratMaintenance_materiel_FK` FOREIGN KEY (`numSerie`) REFERENCES `materiel` (`numSerie`);

--
-- Contraintes pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD CONSTRAINT `Fiche_client_FK` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `Fiche_materiel0_FK` FOREIGN KEY (`numSerie`) REFERENCES `materiel` (`numSerie`);

--
-- Contraintes pour la table `ficheintervention`
--
ALTER TABLE `ficheintervention`
  ADD CONSTRAINT `ficheIntervention_Fiche_FK` FOREIGN KEY (`numFiche_ficheIntervention`) REFERENCES `fiche` (`numFiche`),
  ADD CONSTRAINT `ficheIntervention_technicienGerant0_FK` FOREIGN KEY (`numGerantTechnicien`) REFERENCES `techniciengerant` (`numGerantTechnicien`);

--
-- Contraintes pour la table `procedurerenouvellement`
--
ALTER TABLE `procedurerenouvellement`
  ADD CONSTRAINT `procedureRenouvellement_contratMaintenance_FK` FOREIGN KEY (`numContrat`) REFERENCES `contratmaintenance` (`numContrat`);

--
-- Contraintes pour la table `techniciengerant`
--
ALTER TABLE `techniciengerant`
  ADD CONSTRAINT `technicienGerant_agence_FK` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
