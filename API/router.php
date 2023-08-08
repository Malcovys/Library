<?php

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/auth' => 'auth',
];

function routeToController($uri, $routes) {

    if (array_key_exists($uri, $routes)) {
        $controller = $routes[$uri];

        $response = $controller();

        header("Content-Type: application/json");
        
        echo json_encode($response, JSON_PRETTY_PRINT);

    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    die();
}

routeToController($uri, $routes);