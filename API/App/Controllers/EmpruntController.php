<?php


function emprunter() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ["message" => "Mauvaise requête"];
    }

    if (!$data = json_decode(file_get_contents('php://input'), true)){
        return ['message' => 'parametres manquant'];;
    }

    // $data = [
    //     'emprunt' => [
    //         'num_exemplaire' => 9,
    //         'id_adherent' => 12,
    //         'date_echeance' => '2023-08-15'
    //     ],
    //     'staff' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY'
    // ];

    $satff = decodeToken($data['staff']);

    if (!$satff->id || !$satff->type_compte) {
        return ['message' => 'Données du personnel manquantes'];
    }

    if ($satff->type_compte !== 'ADM' || !verifieStaff($satff->id, $satff->type_compte)) {
        return ['message' => 'Personnel inexistant ou non autorisé'];
    }

    $emprunt = new Emprunt(
        $data['emprunt']['id_adherent'], 
        $data['emprunt']['num_exemplaire'], 
        date('Y-m-d'),
        $data['emprunt']['date_echeance']
    );

    if($satff->id == $emprunt->id_adherent) {
        return ['message' => 'Opération non autoriser'];
    }

    if (!verifieUser($emprunt->id_adherent)) {
        return ['message' => 'Membre innexistant dans la base de donnée'];
    }

    $exemplaireRepository = new ExemplaireRepository();
    $exemplaireRepository->connection = new DatabaseConnection;

    if (!$exemplaireRepository->verifieExemplaire($emprunt->num_exemplaire)) {
        return ['message' => 'Exemplaire innexistant dans la base de donnée'];
    }

    $empruntRepository = new EmpruntRepository();
    $empruntRepository->connection = new DatabaseConnection;

    if(!$empruntRepository->create($emprunt)){
        return ['message' => "Echec de l'operation"];
    };

    return ["message" => "Prêt enregistrer"];
}