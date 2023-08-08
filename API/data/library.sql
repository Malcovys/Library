CREATE TABLE `auteur` (
  `num_auteur` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom_auteur` VARCHAR(30) NOT NULL
);

CREATE TABLE `ouvrage` (
  `num_ouvrage` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `isbn` VARCHAR(20) NOT NULL,
  `num_auteur` INT NOT NULL
);

CREATE TABLE `livre` (
  `isbn` VARCHAR(20) PRIMARY KEY NOT NULL,
  `tire` VARCHAR(30) NOT NULL,
  `num_maison` INT NOT NULL,
  `categorie` VARCHAR(15) NOT NULL,
  `quantite` INT NOT NULL,
  `date_edition` DATE NOT NULL
);

CREATE TABLE `maison` (
  `num_maison` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom_maison` VARCHAR(30) NOT NULL
);

CREATE TABLE `exemplaire` (
  `num_exemplaire` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `isbn` VARCHAR(20) NOT NULL,
  `date_enregistrement` DATE NOT NULL,
  `statut_exemplaire` BOOLEAN NOT NULL DEFAULT 1
);

CREATE TABLE `adherent` (
  `id_adherent` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `mail` VARCHAR(200) NOT NULL,
  `adresse` VARCHAR(50) NOT NULL,
  `date_admission` DATE NOT NULL,
  `abonement` INT,
  `type_compte` CHAR(3) NOT NULL DEFAULT 'ADR',
  `mdp` VARCHAR(255) NOT NULL,
  `statut_adherent` BOOLEAN NOT NULL DEFAULT 1,
  `token` VARCHAR(255)
);

CREATE TABLE `emprunt` (
  `num_emprunt` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_adherent` INT NOT NULL,
  `num_exemplaire` INT NOT NULL,
  `date_emprunt` DATE NOT NULL,
  `date_echeance` DATE NOT NULL,
  `date_retour` DATE
);

CREATE TABLE `penalite` (
  `num_sanction` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_adherent` INT NOT NULL,
  `type_sanction` Char(2) NOT NULL,
  `sanction` VARCHAR(5) NOT NULL
);

CREATE TABLE `avis` (
  `num_avis` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `isbn` VARCHAR(20) NOT NULL,
  `id_adherent` INT NOT NULL,
  `commentaire` VARCHAR(255) NOT NULL
);

ALTER TABLE `penalite` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);

ALTER TABLE `exemplaire` ADD FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

ALTER TABLE `avis` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);

ALTER TABLE `avis` ADD FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

ALTER TABLE `livre` ADD FOREIGN KEY (`num_maison`) REFERENCES `maison` (`num_maison`);

ALTER TABLE `ouvrage` ADD FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`);

ALTER TABLE `ouvrage` ADD FOREIGN KEY (`num_auteur`) REFERENCES `auteur` (`num_auteur`);

ALTER TABLE `emprunt` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);

ALTER TABLE `emprunt` ADD FOREIGN KEY (`num_exemplaire`) REFERENCES `exemplaire` (`num_exemplaire`);