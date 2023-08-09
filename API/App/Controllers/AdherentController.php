<?php

function auth() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [];
        $data = json_decode(file_get_contents('php://input'), true);
        // $data = ['email' => 'malcovys@gmail.com', 'password' => 'LVEsp5Xv8h'];

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

        return ['400' => 'Mauvaise requette'];
    
    }
}

function inscription() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = [];
        $data = json_decode(file_get_contents('php://input'), true);

        $password = generatePassword(10);

        // $data = [
        //     'nom' => 'BEANJARA',
        //     'prenom' => 'Malcovys',
        //     'email' => 'malcovys@gmail.com',
        //     'adresse' => 'IIM 45 ABC, Androhibe',
        //     'abonement' => 12,
        // ];

        $adherent = new Adherent($data['nom'], 
            $data['prenom'], $data['email'], 
            $data['adresse'], $data['abonement'], 
            date("Y-m-d"), $password
        );

        $adherentRepository = new AdherentRepository();
        $adherentRepository->connection = new DatabaseConnection();

        if ($adherentRepository->create($adherent)) {

            return [
                'nom' => 'BEANJARA',
                'prenom' => 'Malcovys',
                'email' => 'malcovys@gmail.com',
                'adresse' => 'IIM 45 ABC, Androhibe',
                'abonement' => 12,
                'password' => $password
            ];

        } else {

            return ["message" => "Non engerister"];

        }
    }
}
        