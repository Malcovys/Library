<?php

function auth() {
    $adherentRepository = new AdherentRepository();
    $adherentRepository->connection = new DatabaseConnection();
    
    $id = $adherentRepository->getID('malcovys22.aps@gmail.com', 'Malcovys');

    if ($id) {
        
    }

    echo json_encode($id, JSON_PRETTY_PRINT);

    die();
    
}