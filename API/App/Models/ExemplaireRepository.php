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

    public function verifieExemplaire(int $id) {

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

    public function updateState(int $id) {
        
        $query = "UPDATE `exemplaire` SET `statut_exemplaire` = CASE WHEN `statut_exemplaire` = 0 THEN 1 ELSE 0 END
            WHERE `num_exemplaire` = :id";

        try {

            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute(['id' => $id]);

            return true;

        } catch(PDOException $e) {
            return false;
        }
    }

    public function verifieState(int $id) {

        $query = "SELECT `statut_exemplaire` FROM `exemplaire` WHERE `num_exemplaire` = :id";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->fetchColumn();
    }

    public function getIds(string $isbn) {

        $query = "SELECT `num_exemplaire` FROM `exemplaire` WHERE `isbn` = :isbn";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn
        ]);

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
}