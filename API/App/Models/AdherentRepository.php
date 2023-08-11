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
        
        return $statement->fetch();  
    }

    public function create(Adherent $adherent) {
        $query = "INSERT INTO `adherent` (`nom`, `prenom`, `mail`, `adresse`, `date_admission`, `abonement`, `type_compte`, `mdp`)
            VALUES (:nom, :prenom, :email, :adresse, :admission, :abonement, :compte, :psswrd)";

        try {
            $statement = $this->connection->getConnection()->prepare($query);
            $statement->execute([
                'nom' => $adherent->nom,
                'prenom' => $adherent->prenom,
                'email' => $adherent->mail,
                'adresse' => $adherent->adresse,
                'admission' => $adherent->date_admission,
                'abonement' => $adherent->abonement,
                'compte' => $adherent->type_compte,
                'psswrd' => password_hash($adherent->password, PASSWORD_DEFAULT, ['cost' => 14]),
            ]);

            return true;

        } catch (PDOException $e) {

            return false;
        }
        
    }

    public function getPassword(string $email) {

        $query = "SELECT `mdp` FROM `adherent` WHERE `mail` = :mail";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'mail' => $email
        ]);
        
        return $statement->fetchColumn(); 
    }

    public function getUser(string $email, string $password) {

        $query = "SELECT `id_adherent`, `date_admission`, `abonement`, `type_compte`
             FROM `adherent` WHERE `mail` = :mail AND `mdp` = :password";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'mail' => $email,
            'password' => $password
        ]);
        
        return $statement->fetch();

    }

    public function getStaff(int $id, string $compte) {
        $query = "SELECT `id_adherent`, `type_compte`
             FROM `adherent` WHERE `id_adherent` = :id AND `type_compte` = :compte";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id,
            'compte' => $compte
        ]);
        
        return $statement->fetchColumn();
    }

    public function getAdherentIDByID(int $id) {

        $query = "SELECT `id_adherent` FROM `adherent` WHERE `id_adherent` = :id";

        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);
        
        return $statement->fetchColumn();
    }

}