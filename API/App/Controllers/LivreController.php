<?php

function ajouterLivre() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ["message" => "Mauvaise requête"];
    }

    if (!$data = json_decode(file_get_contents('php://input'), true)){
        return ['message' => 'parametres manquant'];;
    }

    $description = "An aviator whose plane is forced down in the Sahara Desert encounters a little prince from a small planet who relates his adventures in seeking the secret of what is important in life. Howard's new translation of this beloved classic beautifully reflects Saint-Exupery's unique, gifted style. Color and b&w illustrations.";
    $img = "https://books.google.com/books/content?id=vlr0uqedlWcC&printsec=frontcover&img=1&zoom=1&source=gbs_api";
    $note = "The definitive edition of a worldwide classic, it will capture the hearts of readers of all ages.";
    $data = [
        'livre' => [
            'img' => $img,
            'titre' => 'The Little Prince',
            'auteur' => 'Antoine de Saint-Exupéry',
            'date_publication' => '2000',
            'note' => $note,
            'description' => $description,
            'categorie' => 'Young Adult Fiction',
            'maison_edition' => 'Houghton Mifflin Harcourt',
            'isbn' => '9780156012195',
            'quantite' => 1
        ],
        'staff' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY'
    ];

    $satff = decodeToken($data['staff']);

    if (!$satff->id || !$satff->type_compte) {
        return ['message' => 'Données du personnel manquantes'];
    }

    if ($satff->type_compte !== 'ADM' || !verifieStaff($satff->id, $satff->type_compte)) {
        return ['message' => 'Personnel inexistant ou non autorisé'];
    }

    $livre_array = $data['livre'];

    $livre = new Livre($livre_array['img'],
        $livre_array['titre'], 
        $livre_array['auteur'], 
        $livre_array['date_publication'],
        $livre_array['description'],
        $livre_array['categorie'],
        $livre_array['maison_edition'],
        $livre_array['isbn'],
        $livre_array['quantite'],
        $livre_array['note']
    );

    $maisonEditionRepositoy = new MaisonEditionRepositoy();
    $maisonEditionRepositoy->connection = new DatabaseConnection;

    if (!$maisonEditionRepositoy->verifieHouse($livre->maison)) {
        if (!$maisonEditionRepositoy->create($livre->maison)) {
            return ["message" => "Maison d'édition non enregistrée"];
        }
    }
    

    $livreRepository = new LivreRepository();
    $livreRepository->connection = new DatabaseConnection;

    if (!$livreRepository->verifieLivre($livre->isbn)) {

        $id_maison = $maisonEditionRepositoy->getID($livre->maison);

        if (!$livreRepository->create($livre, $id_maison)) {

            return ['message' => 'Livre non enregistré'];

        }
    } else {

        if (!$livreRepository->updateQuantiteLivre($livre->quantite, $livre->isbn)) {
            return ["message" => "Échec de la mise à jour du nombre d'exemplaire"];
        }
    }

    $exemplaireRepository = new ExemplaireRepository();
    $exemplaireRepository->connection = new DatabaseConnection;

    
    if (!$exemplaireRepository->create($livre->isbn, date('Y-m-d'))) {
        return ['message' => 'Exemplaire non enregistré'];
    }

    if ($livre->auteur !== '') {

        $auteurRepository = new AuteurRepository();
        $auteurRepository->connection = new DatabaseConnection;

        if (!$auteurRepository->verifieAutor($livre->auteur)) {
            if (!$auteurRepository->create($livre->auteur)) {
                return ['message' => 'Auteur non enregistré'];
            }
        }

        $id_auteur = $auteurRepository->getID($livre->auteur);  

        $ouvrageRepository = new OuvrageRepository();
        $ouvrageRepository->connection = new DatabaseConnection;

        if (!$ouvrageRepository->verifieOuvrage($livre->isbn)) {
            if (!$ouvrageRepository->create($livre->isbn, $id_auteur)) {
                return ['message' => 'Ouvrage non enregistré'];
            }
        }
    }

    return ["code" => "201"];
}

function LivreInfos() {

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return ["message" => "Mauvaise requête"];
    }

    if (empty($_GET['isbn']) && empty($_GET['token'])) {
        return ['message' => 'Paramaètres manquants'];
    }

    $isbn = $_GET['isbn'];
    $token = $_GET['token'];

    // $isbn ='9780156012195';
    // $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY';
    
    $user = decodeToken($token);
    
    if (!$user->id) {
        return ['message' => 'Données du personnel manquantes'];
    }

    if(!verifieUser($user->id)) {
        return ['message' => 'Utilisateur inconnu.'];
    }
    
    $livreRepository = new LivreRepository();
    $livreRepository->connection = new DatabaseConnection;
    $livre = $livreRepository->getLivre($isbn);

    return $livre;
}