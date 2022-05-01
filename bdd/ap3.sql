-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 01 mai 2022 à 07:11
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`num`, `nom`, `adresse`, `tel`) VALUES
(1, 'Lille', '207 rue Anatole France, Lille, 59000', '0351525354'),
(2, 'Marseille', '1 rue de la liberté', '0812121212');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numClient`, `raisonSociale`, `siren`, `codeApe`, `adresse`, `tel`, `email`, `dureeDeplacement`, `distanceKM`, `num`) VALUES
(1, 'Vitalito', '12345678A', 'A1234', '1 Rue des Sables, Caillouel', '0606060606', 'vitalito@gmail.com', '01:30:00', 100, 1),
(2, 'Karmineeeee', '11111111A', 'A1111', '10 rue des muguets, Lille', '1111111111', 'karmina@korpa.com', '00:45:00', 30, 1),
(3, 'Marsouille', '11111151A', 'A1112', 'Stage Vélodrome, Marseille', '0812121213', 'marsouille@om.com', '00:10:00', 9, 2);

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
  `mdp` varchar(100) NOT NULL,
  `agence` int(11) NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `agence` (`agence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`matricule`, `nom`, `prenom`, `adresse`, `dateEmbauche`, `mdp`, `agence`) VALUES
('CPL0104201', 'Perrin', 'Claudine', '969 Rue du N, Lille, 59800', '2020-04-01', '7fed5d2eb677f1763acb5676edce4b9add6a8e405373386470a423141c8872da', 1),
('JVL1012191', 'Valjean', 'Jean', '28 Rue Dupuytren, Lille, 59800', '2019-12-10', '2f3436192600097fc102cac50360e72a59384efcfd2d5b04fcbf330581198eee', 1),
('test', 'test', 'test', 'test', '2022-04-05', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 2),
('test2', 'test2', 'test2', 'test2@gmail.com', '2022-04-28', '60303ae22b998861bce3b28f33eec1be758a213c86c93c076dbe9f558c11c752', 1);

--
-- Déclencheurs `employe`
--
DROP TRIGGER IF EXISTS `before_insert_employe`;
DELIMITER $$
CREATE TRIGGER `before_insert_employe` BEFORE INSERT ON `employe` FOR EACH ROW BEGIN

SET new.mdp = SHA2(new.mdp, 256);

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_employe`;
DELIMITER $$
CREATE TRIGGER `before_update_employe` BEFORE UPDATE ON `employe` FOR EACH ROW BEGIN

IF(SHA2(new.mdp, 256) <> SHA2(old.mdp, 256))
THEN
SET new.mdp = SHA2(new.mdp, 256);
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `dateVisite` date DEFAULT NULL,
  `heureVisite` time DEFAULT NULL,
  `numClient` int(11) NOT NULL,
  `matricule` varchar(10) DEFAULT NULL,
  `faite` char(3) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `numClient` (`numClient`,`matricule`),
  KEY `intervention_technicien0_FK` (`matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`num`, `dateVisite`, `heureVisite`, `numClient`, `matricule`, `faite`) VALUES
(1, '2021-12-09', '20:52:00', 1, 'JVL1012191', 'non'),
(2, '2022-04-28', '20:19:00', 2, 'JVL1012191', 'non'),
(4, '2022-05-12', '14:30:00', 2, 'JVL1012191', 'non'),
(5, '2022-05-19', '09:09:00', 3, NULL, 'non');

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
('JVL1012191', '0617273747', 'Diplômé du BTP de l\'école PoudreLard', '2018-09-12', 'Valjean', 'Jean', '28 Rue Dupuytren, Lille, 59800', '2019-12-10', 1),
('test', '1111111111', 'ezrferfg', '2022-04-07', 'test', 'test', 'test', '2022-04-07', 1);

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
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `agence_FK` FOREIGN KEY (`agence`) REFERENCES `agence` (`num`);

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
