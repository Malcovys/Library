<?php


function emprunter() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ["message" => "Mauvaise requête"];
    }

    if (!$data = json_decode(file_get_contents('php://input'), true)){
        return ['message' => 'parametres manquant'];
    }

    // $data = [
    //     'emprunt' => [
    //         'num_exemplaire' => 6,
    //         'id_adherent' => 9,
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

    if (!$exemplaireRepository->verifieState($emprunt->num_exemplaire)) {
        return ['message' => 'Exemplaire indisponible'];
    }

    if (!$exemplaireRepository->updateState($emprunt->num_exemplaire)) {
        return ['message' => "Impossible de mettre à jour le statut de l'exemplaire"];
    }

    $empruntRepository = new EmpruntRepository();
    $empruntRepository->connection = new DatabaseConnection;

    if(!$empruntRepository->create($emprunt)){
        return ['message' => "Echec de l'operation"];
    };

    return ["message" => "Prêt enregistrer"];
}

function rendre() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ["message" => "Mauvaise requête"];
    }

    if (!$data = json_decode(file_get_contents('php://input'), true)){
        return ['message' => 'parametres manquant'];
    }

    // $data = [
    //     'retour' => [
    //         'num_exemplaire' => 10,
    //         'num_emprunt' => 2,
    //         'id_adherent' => 12,
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

    $retour = $data['retour'];

    if($satff->id == $retour['id_adherent']) {
        return ['message' => 'Opération non autoriser'];
    }

    if (!verifieUser($retour['id_adherent'])) {
        return ['message' => 'Membre innexistant dans la base de donnée'];
    }

    $exemplaireRepository = new ExemplaireRepository();
    $exemplaireRepository->connection = new DatabaseConnection;

    if (!$exemplaireRepository->verifieExemplaire($retour['num_exemplaire'])) {
        return ['message' => 'Exemplaire innexistant dans la base de donnée'];
    }

    $empruntRepository = new EmpruntRepository();
    $empruntRepository->connection = new DatabaseConnection;

    if(!$empruntRepository->insertDateRetour($retour['num_emprunt'], date('Y-m-d'))) {
        return ['message' => "Impossible d'enregister le retour"];
    }

    if (!$exemplaireRepository->updateState($retour['num_exemplaire'])) {
        return ['message' => "Impossible de mettre à jour le statut de l'exemplaire"];
    }

    return ["message" => "Livre rendu"];

}

function feuilleEmprunt() {

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return ["message" => "Mauvaise requête"];
    }

    if (empty($_GET['isbn']) && empty($_GET['token'])) {
        return ['message' => 'Paramaètres manquants'];
    }

    $isbn = $_GET['isbn'];
    $token = $_GET['token'];

    $user = decodeToken($token);
    
    if (!$user->id) {
        return ['message' => 'Données personnel manquantes'];
    }

    if(!verifieUser($user->id)) {
        return ['message' => 'Utilisateur inconnu.'];
    }

    # get all num livre where isbn = isbn
    # boucle num livre pour get emprunt where num_livre = num livre -> array

    $exemplaireRepository = new ExemplaireRepository();
    $exemplaireRepository->connection = new DatabaseConnection;

    $exemplaireIdis = $exemplaireRepository->getIds($isbn);

    $empruntHistory = array();
    $end = count($exemplaireIdis);

    $empruntRepository = new EmpruntRepository();
    $empruntRepository->connection = new DatabaseConnection;

    $adherentRepository = new AdherentRepository();
    $adherentRepository->connection = new DatabaseConnection;

    for($i=0; $i<$end; $i++) {
        if($history=$empruntRepository->get($exemplaireIdis[$i])){
            $history += ['prenom_adherent' => $adherentRepository->getLastName($history['id_adherent'])];
            array_push($empruntHistory, $history);
        }
    }

    return $empruntHistory;
}