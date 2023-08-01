CREATE TABLE `auteur` (
  `num_auteur` integer PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nom_auteur` varchar(20) NOT NULL
);

CREATE TABLE `livre` (
  `num_livre` integer PRIMARY KEY NOT NULL,
  `titre_livre` varchar(30) NOT NULL,
  `categorie_livre` varchar(15) NOT NULL,
  `quantite_livre` integer NOT NULL
);

CREATE TABLE `ouvrage` (
  `num_livre` integer PRIMARY KEY NOT NULL,
  `num_auteur` integer NOT NULL
);

CREATE TABLE `exemplaire` (
  `isbn` varchar(20) PRIMARY KEY NOT NULL,
  `num_livre` integer NOT NULL,
  `date_enregistrement` date NOT NULL,
  `statut_livre` boolean DEFAULT 1 NOT NULL
);

CREATE TABLE `adherent` (
  `id_adherent` integer PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nom_adherent` varchar(50) NOT NULL,
  `mail_adherent` varchar(60) NOT NULL,
  `adresse_adherent` varchar(50) NOT NULL,
  `date_admission` date NOT NULL,
  `validite_adherent` integer NOT NULL,
  `mpd` varchar(255) NOT NULL,
  `statut_adherent` boolean DEFAULT 1 NOT NULL,
  `type_compte` varchar(3) NOT NULL
);

CREATE TABLE `staff` (
  `id_staff` integer PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_adherent` integer NOT NULL
);

CREATE TABLE `emprunt` (
  `num_emprunt` integer PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_echeance` date NOT NULL,
  `date_retour` date,
  `isbn` varchar(20) NOT NULL,
  `id_adherent` integer NOT NULL,
  `id_staff` integer NOT NULL
);

CREATE TABLE `sanction` (
  `num_sanction` integer PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_adherent` integer NOT NULL,
  `type_sanction` varchar(2) NOT NULL,
  `sanction` varchar(4) NOT NULL
);

CREATE TABLE `commentaire` (
  `id_commentaire` varchar(255) PRIMARY KEY NOT NULL,
  `id_adherent` integer NOT NULL,
  `num_livre` integer NOT NULL,
  `avis` varchar(255) NOT NULL
);

ALTER TABLE `ouvrage` ADD FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num_livre`);
ALTER TABLE `ouvrage` ADD FOREIGN KEY (`num_auteur`) REFERENCES `auteur` (`num_auteur`);
ALTER TABLE `exemplaire` ADD FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num_livre`);
ALTER TABLE `staff` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
ALTER TABLE `emprunt` ADD FOREIGN KEY (`isbn`) REFERENCES `exemplaire` (`isbn`);
ALTER TABLE `emprunt` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
ALTER TABLE `emprunt` ADD FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);
ALTER TABLE `sanction` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
ALTER TABLE `commentaire` ADD FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
ALTER TABLE `commentaire` ADD FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num_livre`);
