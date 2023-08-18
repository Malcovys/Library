<?php

function auth() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['message' => 'Mauvaise requette'];
    }

    $data = json_decode(file_get_contents('php://input'), true);
    // $data = ['email' => 'malcovys@gmail.com', 'password' => 'x2SQRGzLbV'];
        // $mamitihana = auPrMUwQC9

    if (empty($data['password'])) {
        return ["message" => "Mot de passe requis"];
    }

    if (empty($data['email'])) {
        return ["message" => "Email requis"];
    }

    $email = $data['email'];
    $password = $data['password'];

    $adherentRepository = new AdherentRepository();
    $adherentRepository->connection = new DatabaseConnection();

    if(!$passwordHashed = $adherentRepository->getPassword($email)) {
        return ["message" => "Email incorret"];
    };

    if (!password_verify($password, $passwordHashed)) {
        return ['message' => 'Mot de passe incorrect'];
    }

    $adherent = [];
    $adherent = $adherentRepository->getUser($email, $passwordHashed);

    $token =  [generateToken(
        $adherent['id_adherent'],
        $adherent['prenom'],
        ($adherent['abonement']) ? $adherent['abonement'] : 0,
        $adherent['date_admission'],
        $adherent['type_compte']
    )];
    
    $isAdmin = false;
    if ($adherent['type_compte'] == "ADM") {
        $isAdmin = true;
    }


    return [
        'user' => $adherent['prenom'], 
        'isAdmin' => $isAdmin, 
        'token' => $token[0]['token']
    ];
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
        
                    return ['password' => $password];
        
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

    return ['message' => 'Mauvaise requête'];

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

function adherentInfo() {

    $verifiedRequest = validateGetRequest(['token']);
    if($verifiedRequest !== true) {
        return $verifiedRequest;
   } 

   $token = $_GET['token'];
   $user = decodeToken($token);
    if (!$user->id) {
        return ['message' => 'utilisateur vide.'];
    }
    if(!verifieUser($user->id)) {
        return ['message' => 'Utilisateur inconnu.'];
    }

    $adherentRepository = new AdherentRepository();
    $adherentRepository->connection = new DatabaseConnection();

    $user = $adherentRepository->getById($user->id);

    if (!$user) {
        return ['message' => 'Unkwon'];
    }

    return ['user' => $user];

}