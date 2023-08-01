<?php

namespace App;

class Autoloader
{
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoloade'));
    }

    static function autoloade($class) {
        if (strpos($class, __NAMESPACE__.'\\') === 0) {
            # Replace \ -> / (linux)
            $class = str_replace('\\', '/', $class);
            # Call directory
            require $class.'.php'; 
        }    
    }
}