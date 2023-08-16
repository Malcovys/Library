-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 16 août 2023 à 12:26
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
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_admission` date NOT NULL,
  `abonement` int DEFAULT NULL,
  `type_compte` char(3) NOT NULL DEFAULT 'ADR',
  `mdp` varchar(255) NOT NULL,
  `statut_adherent` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `prenom`, `mail`, `adresse`, `date_admission`, `abonement`, `type_compte`, `mdp`, `statut_adherent`, `token`) VALUES
(9, 'Anicet', 'Jonhia', 'anicetjonhia@gmail.com', 'IIM 45 ABC, Androhibe', '2023-08-09', 12, 'ADR', '$2y$14$TfIaMOh1UrkkJ2zXINK9u.wJjSb/n1Xt.flebCB.NPL6S4Ytv/hb2', 1, NULL),
(10, 'Admin', 'Admin', 'admin@gmail.com', 'IIM45 ABC, Androhibe', '2023-08-09', NULL, 'ADM', 'Admin', 1, NULL),
(11, 'Malcovys', 'Bonely', 'malcovys@gmail.com', 'IIM 45 ABC, Androhibe', '2023-08-09', 12, 'ADM', '$2y$14$BdS9aJG8o9L.vbPXnnwtG.uG9hPOUtfnfBWSrAI5kjNpo7glRvf1W', 1, NULL),
(12, 'Lyden', 'Mamitihana', 'mamitihana@gmail.com', 'IIM 45 ABC, Androhibe', '2023-08-09', 12, 'ADM', '$2y$14$K9B67rvLxkvDUxlx9XUIOOPx92q7YTR/EGa5PqX63zQaSfD3S5Eai', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `num_auteur` int NOT NULL,
  `nom_auteur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`num_auteur`, `nom_auteur`) VALUES
(2, 'Antoine de Saint-Exupéry');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `num_avis` int NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `id_adherent` int NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `num_emprunt` int NOT NULL,
  `id_adherent` int NOT NULL,
  `num_exemplaire` int NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_echeance` date NOT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`num_emprunt`, `id_adherent`, `num_exemplaire`, `date_emprunt`, `date_echeance`, `date_retour`) VALUES
(1, 12, 10, '2023-08-11', '2023-08-15', NULL),
(2, 12, 9, '2023-08-11', '2023-08-15', '2023-08-11'),
(3, 9, 6, '2023-08-11', '2023-08-15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `num_exemplaire` int NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `date_enregistrement` date NOT NULL,
  `statut_exemplaire` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`num_exemplaire`, `isbn`, `date_enregistrement`, `statut_exemplaire`) VALUES
(6, '9780156012195', '2023-08-06', 0),
(7, '9780156012195', '2023-08-11', 1),
(8, '9780156012195', '2023-08-11', 1),
(9, '9780156012195', '2023-08-11', 0),
(10, '9780156012195', '2023-08-03', 1),
(11, '9780156012195', '2023-08-02', 1),
(12, '9780156012195', '2023-08-11', 1),
(13, '9780156012195', '2023-08-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `isbn` varchar(20) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `note` varchar(255) NOT NULL,
  `nombre_page` int NOT NULL,
  `num_maison` int NOT NULL,
  `categorie` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantite` int NOT NULL,
  `date_publication` year NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`isbn`, `titre`, `description`, `note`, `nombre_page`, `num_maison`, `categorie`, `quantite`, `date_publication`, `img`) VALUES
('9780156012195', 'The Little Prince', 'An aviator whose plane is forced down in the Sahara Desert encounters a little prince from a small planet who relates his adventures in seeking the secret of what is important in life. Howard\'s new translation of this beloved classic beautifully reflects Saint-Exupery\'s unique, gifted style. Color and b&w illustrations.', 'The definitive edition of a worldwide classic, it will capture the hearts of readers of all ages.', 100, 2, 'Young Adult Fiction', 8, '2000', 'https://books.google.com/books/content?id=vlr0uqedlWcC&printsec=frontcover&img=1&zoom=1&source=gbs_api');

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `num_maison` int NOT NULL,
  `nom_maison` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`num_maison`, `nom_maison`) VALUES
(2, 'Houghton Mifflin Harcourt');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `num_ouvrage` int NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `num_auteur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`num_ouvrage`, `isbn`, `num_auteur`) VALUES
(2, '9780156012195', 2);

-- --------------------------------------------------------

--
-- Structure de la table `penalite`
--

CREATE TABLE `penalite` (
  `num_sanction` int NOT NULL,
  `id_adherent` int NOT NULL,
  `type_sanction` char(2) NOT NULL,
  `sanction` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`num_auteur`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`num_avis`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `isbn` (`isbn`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`num_emprunt`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `num_exemplaire` (`num_exemplaire`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`num_exemplaire`),
  ADD KEY `isbn` (`isbn`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `num_maison` (`num_maison`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`num_maison`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`num_ouvrage`),
  ADD KEY `isbn` (`isbn`),
  ADD KEY `num_auteur` (`num_auteur`);

--
-- Index pour la table `penalite`
--
ALTER TABLE `penalite`
  ADD PRIMARY KEY (`num_sanction`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `num_auteur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `num_avis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `num_emprunt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `num_exemplaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `num_maison` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `num_ouvrage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `penalite`
--
ALTER TABLE `penalite`
  MODIFY `num_sanction` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`num_exemplaire`) REFERENCES `exemplaire` (`num_exemplaire`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`num_maison`) REFERENCES `maison` (`num_maison`);

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `ouvrage_ibfk_2` FOREIGN KEY (`num_auteur`) REFERENCES `auteur` (`num_auteur`);

--
-- Contraintes pour la table `penalite`
--
ALTER TABLE `penalite`
  ADD CONSTRAINT `penalite_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
