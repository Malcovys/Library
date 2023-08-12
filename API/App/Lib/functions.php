<?php

require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo "</pre>";

    die();
    
}

function generatePassword($length = 255) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $apiKey = '';
    
    for ($i = 0; $i < $length; $i++) {

        $apiKey .= $characters[rand(0, strlen($characters) - 1)];

    }
    
    return $apiKey;

}

function generateToken(int $id, int $abonement,string $admissionDate, string $type_compte) {

    $file = file_get_contents('config.json');
    $data = json_decode($file, true);

    $apiKey = $data['api']['key'];
    $alg = $data['api']['jwt_alg'];

    $playload = array(
        'id' => $id,
        'abonement' => $abonement,
        'admission' => $admissionDate,
        'type_compte' => $type_compte
    );

    $encode = JWT::encode($playload, $apiKey, $alg);

    return ['token' => $encode];

    // $header = apache_request_headers();
    // dd(['header' => $header['Authorization'], 'encode' => $encode]);
    // $decode = JWT::decode($header['Authorization'], new Key($sec_key, 'HS256'));
    // dd($decode);
}

function decodeToken(string $token) {

    $file = file_get_contents('config.json');
    $data = json_decode($file, true);

    $sec_key = $data['api']['key'];
    $alg = $data['api']['jwt_alg'];

    return JWT::decode($token, new Key($sec_key, $alg));
}

function test() {
    return ['message' => 'Salut'];
}

function unsetIndexedItems(array $array) {

    $arraylenght = count($array);
    for($i=0; $i <= $arraylenght; $i++) {
        unset($array[$i]);
    }

    return $array;

}