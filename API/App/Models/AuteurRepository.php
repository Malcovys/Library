<?php

class AuteurRepository 
{
     public DatabaseConnection $connection;

     public function create(string $nom) {

        $query = "INSERT INTO `auteur` (`nom_auteur`) VALUES (:nom)";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'nom' => $nom,
            ]);
        
            return true;

        } catch (PDOException $e) {

            return false;
        }

    }

    public function verifieAutor(string $name) {

        $query = "SELECT `nom_auteur` FROM `auteur` WHERE `nom_auteur` = :name";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'name' => $name
        ]);

        if ($statement->fetchColumn()) {
            return true;
        }

        return false;
    }

    public function getID(string $name) {
        $query = "SELECT `num_auteur` FROM `auteur` WHERE `nom_auteur` = :name";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'name' => $name
        ]);

        return $statement->fetchColumn();
    }
}