-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 01 avr. 2026 à 14:50
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionclinique`
--

-- --------------------------------------------------------

--
-- Structure de la table `cliniques`
--

CREATE TABLE `cliniques` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(50) NOT NULL,
  `codePostal` varchar(7) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `courriel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cliniques`
--

INSERT INTO `cliniques` (`id`, `nom`, `adresse`, `ville`, `province`, `codePostal`, `telephone`, `courriel`) VALUES
(6, 'Au pays des clowns', '12 rue Albert', 'St-Antonin', 'Québec', 'G5R7T5', '111-222-3333', 'aaa@aaa.aaa'),
(7, 'La belle étoile', '34 rue St-Jean', 'Rivière-du-Loup', 'Québec', 'G4W3R5', '444-555-6666', 'eee@eee.eee');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int NOT NULL,
  `noDossier` int NOT NULL,
  `noAssuranceMaladie` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(50) NOT NULL,
  `codePostal` varchar(7) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `courriel` varchar(150) NOT NULL,
  `idClinique` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `noDossier`, `noAssuranceMaladie`, `nom`, `prenom`, `adresse`, `ville`, `province`, `codePostal`, `telephone`, `courriel`, `idClinique`) VALUES
(1, 1001, 12345678, 'Martin', 'Sophie', '45 rue des Lilas', 'St-Antonin', 'Québec', 'G5R7T5', '418-555-1001', 'sophie.martin@example.com', 6),
(2, 1002, 98765432, 'Tremblay', 'Lucas', '89 chemin du Parc', 'St-Antonin', 'Québec', 'G5R7T5', '418-555-1002', 'lucas.tremblay@example.com', 6),
(3, 1003, 45678912, 'Roy', 'Émilie', '12 rue des Pins', 'St-Antonin', 'Québec', 'G5R7T5', '418-555-1003', 'emilie.roy@example.com', 6),
(4, 1004, 74125896, 'Gagnon', 'Thomas', '77 avenue du Lac', 'St-Antonin', 'Québec', 'G5R7T5', '418-555-1004', 'thomas.gagnon@example.com', 6),
(5, 1005, 15975348, 'Bouchard', 'Camille', '23 rue des Érables', 'St-Antonin', 'Québec', 'G5R7T5', '418-555-1005', 'camille.bouchard@example.com', 6),
(6, 2001, 85296374, 'Lavoie', 'Jade', '14 rue du Moulin', 'Rivière-du-Loup', 'Québec', 'G4W3R5', '418-555-2001', 'jade.lavoie@example.com', 7),
(7, 2002, 36925814, 'Pelletier', 'Antoine', '56 boulevard Cartier', 'Rivière-du-Loup', 'Québec', 'G4W3R5', '418-555-2002', 'antoine.pelletier@example.com', 7),
(8, 2003, 14725836, 'Ouellet', 'Mia', '98 rue des Fleurs', 'Rivière-du-Loup', 'Québec', 'G4W3R5', '418-555-2003', 'mia.ouellet@example.com', 7),
(9, 2004, 25814796, 'Fortin', 'Noah', '33 rue du Quai', 'Rivière-du-Loup', 'Québec', 'G4W3R5', '418-555-2004', 'noah.fortin@example.com', 7),
(10, 2005, 75395148, 'Dubé', 'Léa', '61 rue du Collège', 'Rivière-du-Loup', 'Québec', 'G4W3R5', '418-555-2005', 'lea.dube@example.com', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cliniques`
--
ALTER TABLE `cliniques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_noDossier` (`noDossier`),
  ADD UNIQUE KEY `unique_noAssuranceMaladie` (`noAssuranceMaladie`),
  ADD KEY `fk_patient_clinique` (`idClinique`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cliniques`
--
ALTER TABLE `cliniques`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `fk_patient_clinique` FOREIGN KEY (`idClinique`) REFERENCES `cliniques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
