<?php

function auth() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = json_decode(file_get_contents('php://input'), true);
        // $data = ['email' => 'malcovys@gmail.com', 'password' => 'x2SQRGzLbV'];
            // $mamitihana = auPrMUwQC9

        if ( !empty($data['email']) && !empty($data['password'])) {

            $email = $data['email'];
            $password = $data['password'];

            $adherentRepository = new AdherentRepository();
            $adherentRepository->connection = new DatabaseConnection();
        
            $passwordHashed = $adherentRepository->getPassword($email);

            if (password_verify($password, $passwordHashed)) {
                $adherent = [];
                $adherent = $adherentRepository->getUser($email, $passwordHashed);

                return generateToken(
                    $adherent['id_adherent'],
                    ($adherent['abonement']) ? $adherent['abonement'] : 0,
                    $adherent['date_admission'],
                    $adherent['type_compte']
                );
               
            }

            return ['404' => 'Mot de passe ou email incorrect'];
    
        }
    
    }

    return ['400' => 'Mauvaise requette'];
}

function inscription() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = json_decode(file_get_contents('php://input'), true);

        // $data = [
        //     'adherent' => ['nom' => 'Lyden',
        //         'prenom' => 'Mamitihana',
        //         'email' => 'mamitihana@gmail.com',
        //         'adresse' => 'IIM 45 ABC, Androhibe',
        //         'abonement' => 12,
        //         'type_compte' => 'ADM'],
        //     'staff' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY'
        // ];
        
        $satff = decodeToken($data['staff']);

        if ( $satff->id && $satff->type_compte) {

            if ( $satff->type_compte == 'ADM' && verifieStaff($satff->id, $satff->type_compte)) {

                $password = generatePassword(10);
    
                $adherent = new Adherent($data['adherent']['nom'], 
                    $data['adherent']['prenom'], $data['adherent']['email'], 
                    $data['adherent']['adresse'], $data['adherent']['abonement'], 
                    date("Y-m-d"), $password, $data['adherent']['type_compte']
                );
        
                $adherentRepository = new AdherentRepository();
                $adherentRepository->connection = new DatabaseConnection();
        
                if ($adherentRepository->create($adherent)) {
        
                    return [
                        'infos' => $data['adherent'],
                        'password' => $password
                    ];
        
                } else {
        
                    return ["message" => "Échec de l'enregistrement"];
        
                }
            } else {
        
                    return ["message" => "Personnel inexistant ou non autorisé"];
        
            }
                
        } else {

                return ['message' => 'Données du personnel manquantes'];
        }
    }

    return ['400' => 'Mauvaise requête'];

}

function verifieStaff(int $id, $type_compte) {

    $adherentRepository = new AdherentRepository();
    $adherentRepository->connection = new DatabaseConnection();

    if($adherentRepository->getStaff($id, $type_compte)) {

        return true;

    } else {

        return false;
        
    }
}

function verifieUser(int $id) {

    $adherentRepository = new AdherentRepository();
    $adherentRepository->connection = new DatabaseConnection();

    if($adherentRepository->getAdherentIDByID($id)) {

        return true;

    }

    return false;
    
}