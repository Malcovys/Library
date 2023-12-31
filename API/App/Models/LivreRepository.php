<?php

class LivreRepository {

    public DatabaseConnection $connection;

    public function create(Livre $livre, int $id_maisonEditon){
        
        $query = "INSERT INTO `livre` (`isbn`, `titre`, `description`, `note`, `nombre_page`, `num_maison`, `categorie`, `quantite`, `date_publication`, `img`) 
            VALUES (:isbn, :titre, :description, :note, :page, :num_maison, :categorie, :quantite, :date_publication, :img) ";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                ':isbn' => $livre->isbn,
                ':titre' => $livre->titre,
                ':description' => $livre->description,
                ':note' => $livre->note,
                ':page' => $livre->nombre_page,
                ':num_maison' => $id_maisonEditon,
                ':categorie' => $livre->categorie,
                ':quantite' => $livre->quantite,
                ':date_publication' => $livre->publication_date,
                ':img' => $livre->img
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

    public function updateQuantiteLivre(int $quantite, string $isbn) {

        $query = "UPDATE `livre` SET `quantite` = `quantite`+:newQte WHERE `livre`.`isbn` = :isbn ";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn,
            'newQte' =>$quantite
        ]);
    
        return  true;
    }

    public function getLivre(string $isbn) {
        $query = "SELECT * FROM `livre` WHERE `isbn` = :isbn";
    
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'isbn' => $isbn
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getInfos() {
        $query = "SELECT `titre`, `isbn`, `img`, `nombre_page`, `note` FROM `livre`";
    
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}