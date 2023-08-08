<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'nothing',
    '/login' => 'Hey',
    '/auth' => auth(),
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    die();
}

routeToController($uri, $routes);