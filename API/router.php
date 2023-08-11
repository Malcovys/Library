<?php

$uri = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI'];



$routes = [
    '/' => 'test',
    '/adherent/auth' => 'auth',
    '/adherent/inscription' => 'inscription',
    '/livre/ajout' => 'ajouterLivre',   
    '/livre/infos' => 'LivreInfos',
    '/livre/empreunt' => 'fuilleEmprunt',
    '/adherent/post/avis' => 'posterAvis',
    '/livre/populaire' => 'livrePopulaire',
    '/livre/arrivage' => 'arriageLivre',
    '/livre/avis' => 'livreAvis',
    '/adherent/calendrier' => 'calandarAdherent',
    '/adherent/retourner' => 'returnedBook',
    '/adherent/carte' => 'cardAdherent',
    '/activite/emprunt' => 'empruntActivity',
    '/activite/adherent' => 'adherentActivity',
];

function routeToController($uri, $routes) {

    header("Content-Type: application/json");

    if (array_key_exists($uri, $routes)) {
        $controller = $routes[$uri];

        $response = $controller();

        echo json_encode($response);

    } else {
        abort();
    }
}

function abort($code = 404, $message = 'Page introuvable') {
    
    echo json_encode([$code => $message], JSON_PRETTY_PRINT);

    die();
}

routeToController($uri, $routes);;