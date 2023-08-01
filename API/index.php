<?php
require_once('App/Autoloader.php');
\App\Autoloader::register();

use App\Lib\Router;


$routes = [];

Router::route('/', function () {
    echo "Home Page";
});

Router::run();