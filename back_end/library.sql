-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 31 juil. 2023 à 13:59
-- Version du serveur : 8.0.34
-- Version de PHP : 8.1.12-1ubuntu4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int NOT NULL,
  `nom_adherent` varchar(50) NOT NULL,
  `mail_adherent` varchar(60) NOT NULL,
  `adresse_adherent` varchar(50) NOT NULL,
  `date_admission` date NOT NULL,
  `validite_adherent` int NOT NULL,
  `mpd` varchar(255) NOT NULL,
  `statut_adherent` tinyint(1) NOT NULL DEFAULT '1',
  `type_compte` varchar(3) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `num_auteur` int NOT NULL,
  `nom_auteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` varchar(255) NOT NULL,
  `id_adherent` int NOT NULL,
  `num_livre` int NOT NULL,
  `avis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `num_emprunt` int NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_echeance` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `id_adherent` int NOT NULL,
  `id_staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `isbn` varchar(20) NOT NULL,
  `num_livre` int NOT NULL,
  `date_enregistrement` date NOT NULL,
  `statut_livre` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `num_livre` int NOT NULL,
  `titre_livre` varchar(30) NOT NULL,
  `categorie_livre` varchar(15) NOT NULL,
  `quantite_livre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `num_livre` int NOT NULL,
  `num_auteur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sanction`
--

CREATE TABLE `sanction` (
  `num_sanction` int NOT NULL,
  `id_adherent` int NOT NULL,
  `type_sanction` varchar(2) NOT NULL,
  `sanction` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int NOT NULL,
  `id_adherent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`num_auteur`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `num_livre` (`num_livre`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`num_emprunt`),
  ADD KEY `isbn` (`isbn`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `num_livre` (`num_livre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`num_livre`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`num_livre`),
  ADD KEY `num_auteur` (`num_auteur`);

--
-- Index pour la table `sanction`
--
ALTER TABLE `sanction`
  ADD PRIMARY KEY (`num_sanction`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `num_auteur` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `num_emprunt` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sanction`
--
ALTER TABLE `sanction`
  MODIFY `num_sanction` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num_livre`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `exemplaire` (`isbn`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`),
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num_livre`);

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num_livre`),
  ADD CONSTRAINT `ouvrage_ibfk_2` FOREIGN KEY (`num_auteur`) REFERENCES `auteur` (`num_auteur`);

--
-- Contraintes pour la table `sanction`
--
ALTER TABLE `sanction`
  ADD CONSTRAINT `sanction_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
