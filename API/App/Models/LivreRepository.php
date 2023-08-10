<?php

class LivreRepository {

    public DatabaseConnection $connection;

    public function create(Livre $livre){
        
        $query = "INSERT INTO `livre` (`isbn`, `tire`, `num_maison`, `categorie`, `quantite`, `date_edition`) 
            VALUES (:isbn, :titre, :maison, :categorie, :quantite, :date_edition)";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'isbn' => $livre->isbn,
                'titre' => $livre->titre,
                'maison' => $livre->id_maison,
                'categorie' => $livre->categorie,
                'quantite' => $livre->quantite,
                'date_edition' => $livre->date_edition
            ]);
        
            return true;

        } catch (PDOException $e) {

            return false;
        }
        

    }

    public function verifieLivre(string $isbn) {

        $query = "SELECT `isbn` FROM `livre` WHERE `isbn` = :isbn";
    
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn
        ]);
    
        if ($statement->fetchColumn()) {
            
            return true;
        }
    
        return false;
    }

    public function updateLivre(int $quantite, string $isbn) {

        $query = "UPDATE `livre` SET `quantite` = `quantite`+:newQte WHERE `livre`.`isbn` = :isbn ";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn,
            'newQte' =>$quantite
        ]);
    
        return  true;
    }
}