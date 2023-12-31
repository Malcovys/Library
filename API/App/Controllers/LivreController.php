<?php


function ajouterLivre() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ["message" => "Mauvaise requête"];
    }

    if (!$data = json_decode(file_get_contents('php://input'), true)){
        return ['message' => 'parametres manquant'];
    }

    // $description = "An aviator whose plane is forced down in the Sahara Desert encounters a little prince from a small planet who relates his adventures in seeking the secret of what is important in life. Howard's new translation of this beloved classic beautifully reflects Saint-Exupery's unique, gifted style. Color and b&w illustrations.";
    // $img = "https://books.google.com/books/content?id=vlr0uqedlWcC&printsec=frontcover&img=1&zoom=1&source=gbs_api";
    // $note = "The definitive edition of a worldwide classic, it will capture the hearts of readers of all ages.";
    // $data = [
    //     'livre' => [
    //         'img' => $img,
    //         'titre' => 'The Little Prince',
    //         'auteur' => 'Antoine de Saint-Exupéry',
    //         'date_publication' => '2000',
    //         'note' => $note,
    //         'description' => $description,
    //         'categorie' => 'Young Adult Fiction',
    //         'maison_edition' => 'Houghton Mifflin Harcourt',
    //         'isbn' => '97801',
    //         'nombre_page' => 100,
    //         'quantite' => 1
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

    $livre_array = $data['livre'];

    # On n'enregiste que l'année dans la base
    $annee_pulication = date('Y', strtotime($livre_array['date_publication']));
    
    # La reaison de la dernière erreur est : $livre_array['auteur'] est un tableau
    $livre = new Livre(
        $livre_array['img'],
        $livre_array['titre'], 
        $livre_array['auteur'][0], 
        $annee_pulication,
        $livre_array['description'],
        $livre_array['categorie'],
        $livre_array['maison_edition'],
        $livre_array['isbn'],
        $livre_array['quantite'],
        $livre_array['note'],
        $livre_array['nombre_page']
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

    $exemplairesId = [];
    for($i=0; $i < $livre->quantite; $i++) {
        if (!$num_exemplaire = $exemplaireRepository->create($livre->isbn, date('Y-m-d'))) {
            return ['message' => 'Exemplaire non enregistré'];
        }
        array_push($exemplairesId, $num_exemplaire);
    }

    if ($livre->auteur !== '') {

        $auteurRepository = new AuteurRepository();
        $auteurRepository->connection = new DatabaseConnection;

        if (!$auteurRepository->verifieAutor($livre->auteur)) {
            if (!$auteurRepository->create($livre->auteur)) {
                return ['message' => 'Auteur non enregister.'];
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

    return ["new" => $exemplairesId];
}

function livreInfos() {

   $verifiedRequest = validateGetRequest(['isbn','token']);

   if($verifiedRequest !== true) {
        return $verifiedRequest;
   }

    $isbn = $_GET['isbn'];
    $token = $_GET['token'];

    // $isbn ='9780156012195';
    // $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTEsImFib25lbWVudCI6MTIsImFkbWlzc2lvbiI6IjIwMjMtMDgtMDkiLCJ0eXBlX2NvbXB0ZSI6IkFETSJ9.Rcaqs5jDujKMEg9YgiBMdbO2F0NXvnEpltEy8cf0GDY';
    
    $user = decodeToken($token);
    
    if (!$user->id) {
        return ['message' => 'utilisateur vide.'];
    }

    if(!verifieUser($user->id)) {
        return ['message' => 'Utilisateur inconnu.'];
    }
    
    $livreRepository = new LivreRepository();
    $livreRepository->connection = new DatabaseConnection;
    $livre = $livreRepository->getLivre($isbn);

    if(!$livre) {
        return ["message" => 'not Found'];
    }

    $maison_edition_id = $livre['num_maison'];
    unset($livre['num_maison']);

    $maisonEditionRepositoy = new MaisonEditionRepositoy();
    $maisonEditionRepositoy->connection = new DatabaseConnection;
    $maison_edition = $maisonEditionRepositoy->getMaison($maison_edition_id);

    $livre += ['maison_edition' => $maison_edition];

    $ouvrageRepository = new OuvrageRepository();
    $ouvrageRepository->connection = new DatabaseConnection();
    $idAuteur = $ouvrageRepository->getAuteurId($livre['isbn']);

    $auteurRepository = new AuteurRepository();
    $auteurRepository->connection = new DatabaseConnection();
    $auteur = $auteurRepository->getName($idAuteur);

    $livre += ['nom_auteur' => $auteur];

    return $livre;
    
}

function arriageLivre() {

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

    $exemplaireRepository = new ExemplaireRepository();
    $exemplaireRepository->connection = new DatabaseConnection();

    $duplicatedISBNInArray = $exemplaireRepository->getOneWeekInterval();

    $arrivage = removeDuplicatedItems($duplicatedISBNInArray, 'isbn');

    $livreRepository = new LivreRepository();
    $livreRepository->connection = new DatabaseConnection();
    $nouveauLivre = array();
    foreach($arrivage as $item) {
        $livre = $livreRepository->getLivre($item['isbn']);
        $nouveauLivre[] = [
            'isbn' => $livre['isbn'],
            'titre' => $livre['titre'],
            'nombre_page' => $livre['nombre_page'],
            'imglink' => $livre['img']
        ];
    }   

    return ['items' => array_reverse($nouveauLivre)];
}

function livrePopulaire() {

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

    $empruntRepository = new EmpruntRepository();
    $empruntRepository->connection = new DatabaseConnection();

    # Prend les num_exemplaires emprent de d'une interval d'une semaine
    if(!$exemplairesId= $empruntRepository->getIntervalOneMoth()) {
        return ['message' => 'Not popular book this month'];
    }

    $exemplaireRepository = new ExemplaireRepository();
    $exemplaireRepository->connection = new DatabaseConnection();

    # prend l'isbn correspondant à chaque num_exemplaire
    $exemplaires = array();
    foreach($exemplairesId as $id) {
        $isbn = $exemplaireRepository->getIsbn($id);
        array_push($exemplaires, $isbn[0]);
    }

    # compte le nombre de repetition de chaque isbn
    $isbnOccurence = countOccurrences($exemplaires);

    # filtre le resutlat
    $moyenne = count($exemplaires)/2;
    $populaireIsbn = array_filter($isbnOccurence, function($value) use ($moyenne) {
        return $value >= $moyenne;
    });

    $livreRepository = new LivreRepository();
    $livreRepository->connection = new DatabaseConnection();

    # Prendre les informations sur les isbn
    $livrePopulaire = array();
    foreach($populaireIsbn as $item => $occurence) {
        $livre = $livreRepository->getLivre($item);
        $livrePopulaire[] = [
            'isbn' => $livre['isbn'],
            'titre' => $livre['titre'],
            'imglink' => $livre['img']
        ];
    } 

    return ['items' => $livrePopulaire];
    
}

function listLivre() {

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

    $livreRepository = new LivreRepository();
    $livreRepository->connection = new DatabaseConnection();
    $listLivre = $livreRepository->getInfos();

    return $listLivre;
}


function aleatoireLivre() {

    $listLivre = listLivre();

    if(!empty($listLivre['message'])) {
        return $listLivre['message'];
    }

    $livreSelectionner = $listLivre[array_rand($listLivre)];

    return $livreSelectionner;
}