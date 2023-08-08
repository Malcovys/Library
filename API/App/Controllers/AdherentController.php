<?php

function auth() {

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // $data = json_decode(file_get_contents('php://input'), true);
        $data = ['email' => 'malcovys22.aps@gmail.com', 'password' => 'Malcovys'];

        if ( !empty($data['email']) && !empty($data['password'])) {

            $email = $data['email'];
            $password = $data['password'];

            $adherentRepository = new AdherentRepository();
            $adherentRepository->connection = new DatabaseConnection();
        
            $id = $adherentRepository->getID($email, $password);

            if ($id) {
                return $id;
            }

            return ['message' => 'Mot de passe ou email incorrect'];
    
        }

        return ['message' => 'Mauvaise requette'];
    
    }
// }
        