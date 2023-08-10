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

            return true;

        } catch (PDOException $e) {

            return false;
        }
    }

    public function verifieExemplaire(string $isbn) {

        $query = "SELECT `isbn` FROM `exemplaire` WHERE `isbn` = :isbn";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn
        ]);

        if ($statement->fetchColumn()) {

            return true;
        }

        return false;
    }
}