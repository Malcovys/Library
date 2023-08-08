<?php

class AdherentRepository {

    public DatabaseConnection $connection;

    public function getID(string $mail, string $password) {
        $query = "SELECT `id_adherent` FROM `adherent` WHERE `mail` = :mail AND `mdp` = :password";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'mail' => $mail,
            'password' => $password
        ]);
        
        return $statement->fetch(PDO::FETCH_ASSOC);  
    }

    public function create(Adherent $adherent) {
        
    }

}