<?php
namespace API\Lib;

class DatabaseConnection
{
    public ?\PDO $database = null;

    function getConnection(): \PDO
    {
        if ($this->database === null) {

            $file = file_get_contents('config.json');
            $data = json_decode($file, true);
            $db = $data['database'];

            $this->database = new \PDO(
                'mysql:host='.$db['host'].';dbname='.$db['name'].';charset=utf8',
                $db['user'],
                $db['password']
            );
        }

        return $this->database;
    }
}