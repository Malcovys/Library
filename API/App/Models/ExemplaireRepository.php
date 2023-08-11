<?php 

class ExemplaireRepository
{
    public DatabaseConnection $connection;

    public function create(string $isbn, string $enregistrement) {

        $query = "INSERT INTO `exemplaire` (`isbn`, `date_enregistrement`) VALUES (:isbn, :enregistrement) ";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'isbn' => $isbn,
                'enregistrement' => $enregistrement
            ]);

            $id = $this->connection->getConnection()->lastInsertId();

            return $id;

        } catch (PDOException $e) {

            return false;
        }
    }

    public function verifieExemplaire(string $id) {

        $query = "SELECT `num_exemplaire` FROM `exemplaire` WHERE `num_exemplaire` = :id";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);

        if ($statement->fetchColumn()) {

            return true;
        }

        return false;
    }
}