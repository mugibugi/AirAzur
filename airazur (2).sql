-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 30 Septembre 2017 à 18:45
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `airazur`
--

-- --------------------------------------------------------

--
-- Structure de la table `aeroport`
--

CREATE TABLE `aeroport` (
  `numAero` int(50) NOT NULL,
  `nomAero` varchar(255) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `aeroport`
--

INSERT INTO `aeroport` (`numAero`, `nomAero`, `pays`) VALUES
(1, 'Paris CGG', 'France'),
(2, 'Dakar', 'Sénégal');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `numResa` int(50) NOT NULL,
  `nomClient` varchar(255) DEFAULT NULL,
  `prenomClient` varchar(50) DEFAULT NULL,
  `numVol` varchar(50) DEFAULT NULL,
  `nbPlace` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`numResa`, `nomClient`, `prenomClient`, `numVol`, `nbPlace`) VALUES
(1, 'Esperance', 'Mamadou', 'AIR5007', 3);

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `numero` varchar(255) NOT NULL,
  `depart` int(50) DEFAULT NULL,
  `arrivee` int(50) DEFAULT NULL,
  `dateDepart` date DEFAULT NULL,
  `heureDepart` time DEFAULT NULL,
  `dateArrivee` date DEFAULT NULL,
  `heureArrivee` time DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `places` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`numero`, `depart`, `arrivee`, `dateDepart`, `heureDepart`, `dateArrivee`, `heureArrivee`, `prix`, `places`) VALUES
('AIR5007', 1, 2, '2011-04-22', '12:00:00', '2011-04-22', '17:00:00', 560, 120),
('AIR5108', 1, 2, '2011-04-23', '13:00:00', '2011-04-23', '18:20:00', 600, 120);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aeroport`
--
ALTER TABLE `aeroport`
  ADD PRIMARY KEY (`numAero`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numResa`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `fk_Tab_AeroD` (`depart`),
  ADD KEY `fk_Tab_AeroA` (`arrivee`),
  ADD KEY `depart` (`depart`,`arrivee`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `aeroport`
--
ALTER TABLE `aeroport`
  MODIFY `numAero` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numResa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `aeroport` (`numAero`),
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`arrivee`) REFERENCES `aeroport` (`numAero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
