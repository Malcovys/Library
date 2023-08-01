<?php
namespace App\Lib;

class Router {

    public static function route(string $path, callable $callback) {
        global $routes;
        $routes[$path] = $callback;
    }

    public static function run() {
        global $routes;
        $uri = $_SERVER['REQUEST_URI'];
        $found = false;
    
        foreach ($routes as $path => $callback) {
            if ($path !== $uri) continue;
    
            $found = true;
            $callback();
        }
        if (!$found) {
            $notFoundCallback = $routes['/404'];
            $notFoundCallback();
        }
    }
}