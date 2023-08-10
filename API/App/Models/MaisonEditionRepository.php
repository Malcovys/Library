<?php

class MaisonEditionRepositoy {

    public DatabaseConnection $connection;

    public function create(string $editionHouse) {

        $query = "INSERT INTO `maison` (`nom_maison`) VALUES (:maison)";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'maison' => $editionHouse
            ]);

            return true;

        } catch (PDOException $e) {

            return false;
        }
    }

    public function verifieHouse(string $name) {

        $query = "SELECT `nom_maison` FROM `maison` WHERE `nom_maison` = :name";

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
        $query = "SELECT `num_maison` FROM `maison` WHERE `nom_maison` = :name";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'name' => $name
        ]);

        return $statement->fetchColumn();
    }
}