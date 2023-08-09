<?php

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/auth' => 'auth',
    '/inscription' => 'inscription',
    '/test' => 'test',
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

routeToController($uri, $routes);