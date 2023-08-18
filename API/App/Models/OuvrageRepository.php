<?php

class OuvrageRepository
{
    public DatabaseConnection $connection;

    public function create(string $isbn, int $id_auteur) {
        $query = "INSERT INTO `ouvrage` (`isbn`, `num_auteur`) VALUES (:isbn, :auteur)";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'isbn' => $isbn,
                'auteur' => $id_auteur,
            ]);

            return true;

        } catch (PDOException $e) {

            return false;
        }
    }

    public function verifieOuvrage(string $isbn) {

        $query = "SELECT `isbn` FROM `ouvrage` WHERE `isbn` = :isbn";
    
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn
        ]);
    
        if ($statement->fetchColumn()) {
            
            return true;
        }
    
        return false;
    }

    public function getAuteurId(string $isbnLivre) {
        $query = "SELECT `num_auteur` FROM `ouvrage` WHERE `isbn` = :isbn";
    
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbnLivre
        ]);
    
        return $statement->fetchColumn() ;
    }

}