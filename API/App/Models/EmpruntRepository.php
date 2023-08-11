<?php

class EmpruntRepository {
    public DatabaseConnection $connection;

    public function create(Emprunt $emprunt) {
        $query = "INSERT INTO `emprunt` (`id_adherent`, `num_exemplaire`, `date_emprunt`, `date_echeance`)
            VALUES (:id_adherent, :num_exemplaire, :date_emprunt, :date_echeance)";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'id_adherent' => $emprunt->id_adherent,
                'num_exemplaire' => $emprunt->num_exemplaire,
                'date_emprunt' => $emprunt->date_emprunt,
                'date_echeance' => $emprunt->date_echeance,
            ]);

            return true;

        } catch (PDOException $e) {

            return false;
        }
    }
    
    public function insertDateRetour(int $emprunt, string $date) {
        
        $query = "UPDATE `emprunt` SET `date_retour` = :date WHERE `num_emprunt` = :emprunt";

        try {

            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'date' => $date,
                'emprunt' => $emprunt
            ]);

            return true;

        } catch(PDOException $e) {
            return false;
        }

    }
}