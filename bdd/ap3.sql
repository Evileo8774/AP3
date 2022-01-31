-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 nov. 2021 à 13:53
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
-- Base de données : `ap3`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` char(10) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`num`, `nom`, `adresse`, `tel`) VALUES
(1, 'Lille', '207 rue Anatole France, Lille, 59000', '0351525354');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSociale` varchar(50) NOT NULL,
  `siren` char(9) NOT NULL,
  `codeApe` char(5) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dureeDeplacement` time NOT NULL,
  `distanceKM` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`numClient`),
  KEY `client_agence_FK` (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `raisonSociale`, `siren`, `codeApe`, `adresse`, `tel`, `email`, `dureeDeplacement`, `distanceKM`, `num`) VALUES
(1, 'Vitalito', '359400782', '4569B', '27 Place Marc Seguin, Lille, 59800', '0633333333', 'user@vitalito.xyz', '00:30:00', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `numContrat` int(11) NOT NULL AUTO_INCREMENT,
  `dateSignature` date NOT NULL,
  `dateEcheance` date NOT NULL,
  `numClient` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  PRIMARY KEY (`numContrat`),
  UNIQUE KEY `contratMaintenance_client_AK` (`numClient`),
  KEY `contratMaintenance_typeContrat0_FK` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `numSerie` varchar(15) NOT NULL,
  `num` int(11) NOT NULL,
  `tempsPasse` time NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  PRIMARY KEY (`numSerie`,`num`),
  KEY `controler_intervention0_FK` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controler`
--

INSERT INTO `controler` (`numSerie`, `num`, `tempsPasse`, `commentaire`) VALUES
('73AA10', 1, '00:45:00', '*insérer commentaires*');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `matricule` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `dateEmbauche` date NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`matricule`, `nom`, `prenom`, `adresse`, `dateEmbauche`) VALUES
('CPL0104201', 'Perrin', 'Claudine', '969 Rue du N, Lille, 59800', '2020-04-01'),
('JVL1012191', 'Valjean', 'Jean', '28 Rue Dupuytren, Lille, 59800', '2019-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `dateVisite` date NOT NULL,
  `heureVisite` time NOT NULL,
  `numClient` int(11) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `numClient` (`numClient`,`matricule`),
  KEY `intervention_technicien0_FK` (`matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`num`, `dateVisite`, `heureVisite`, `numClient`, `matricule`) VALUES
(1, '2021-12-06', '14:48:00', 1, 'JVL1012191');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `numSerie` varchar(15) NOT NULL,
  `dateVente` date NOT NULL,
  `dateInstall` date NOT NULL,
  `prixVente` float NOT NULL,
  `emplacement` varchar(15) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `numClient` int(11) NOT NULL,
  PRIMARY KEY (`numSerie`),
  KEY `materiel_typeMateriel_FK` (`ref`),
  KEY `materiel_client0_FK` (`numClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`numSerie`, `dateVente`, `dateInstall`, `prixVente`, `emplacement`, `ref`, `numClient`) VALUES
('73AA10', '2021-11-01', '2021-11-07', 599.99, 'carton 4', 'CE001', 1);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `matricule` varchar(10) NOT NULL,
  `tel` char(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `dateObtention` date NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `technicien_agence0_FK` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`matricule`, `tel`, `qualification`, `dateObtention`, `nom`, `prenom`, `adresse`, `dateEmbauche`, `num`) VALUES
('JVL1012191', '0617273747', 'Diplômé du BTP de l\'école PoudreLard', '2018-09-12', 'Valjean', 'Jean', '28 Rue Dupuytren, Lille, 59800', '2019-12-10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

DROP TABLE IF EXISTS `typecontrat`;
CREATE TABLE IF NOT EXISTS `typecontrat` (
  `ref` varchar(10) NOT NULL,
  `delaiIntervention` varchar(100) NOT NULL,
  `tauxApplicable` float NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typecontrat`
--

INSERT INTO `typecontrat` (`ref`, `delaiIntervention`, `tauxApplicable`) VALUES
('arrzea3773', 'Intervention pour un frigidaire samsung\r\n', 10);

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `ref` varchar(10) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typemateriel`
--

INSERT INTO `typemateriel` (`ref`, `libelle`) VALUES
('CE001', 'Caisse enregistreuse sur batterie');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_agence_FK` FOREIGN KEY (`num`) REFERENCES `agence` (`num`);

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `contratMaintenance_client_FK` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `contratMaintenance_typeContrat0_FK` FOREIGN KEY (`ref`) REFERENCES `typecontrat` (`ref`);

--
-- Contraintes pour la table `controler`
--
ALTER TABLE `controler`
  ADD CONSTRAINT `controler_intervention0_FK` FOREIGN KEY (`num`) REFERENCES `intervention` (`num`),
  ADD CONSTRAINT `controler_materiel_FK` FOREIGN KEY (`numSerie`) REFERENCES `materiel` (`numSerie`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `intervention_client_FK` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `intervention_technicien0_FK` FOREIGN KEY (`matricule`) REFERENCES `technicien` (`matricule`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_client0_FK` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`),
  ADD CONSTRAINT `materiel_typeMateriel_FK` FOREIGN KEY (`ref`) REFERENCES `typemateriel` (`ref`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `technicien_agence0_FK` FOREIGN KEY (`num`) REFERENCES `agence` (`num`),
  ADD CONSTRAINT `technicien_employe_FK` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
