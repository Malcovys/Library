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

function generateToken(int $id, string $prenom, int $abonement,string $admissionDate, string $type_compte) {

    $file = file_get_contents('config.json');
    $data = json_decode($file, true);

    $apiKey = $data['api']['key'];
    $alg = $data['api']['jwt_alg'];

    $playload = array(
        'id' => $id,
        'prenom' => $prenom,
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

function removeDuplicatedItems(array $array, string $target) {

    $uniqueItems = array();

    foreach ($array as $exemplaire) {
        $key = $exemplaire[$target];

        if (!isset($uniqueItems[$key])) {
            $uniqueItems[$key] = $exemplaire;
        }
    }

    return array_values($uniqueItems);
}


function validateGetRequest(array $keys) {

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return ["message" => "Mauvaise requête"];
    }

    $missingKeys = array();

    foreach ($keys as $key) {
        if (empty($_GET[$key])) {
            $missingKeys[] = $key;
        }
    }

    if (!empty($missingKeys)) {
        return ['message' => 'Paramètres manquants', 'missing_keys' => $missingKeys];
    }

    return true;
}

function filterAssociativeArrays($array) {
    $filteredArray = array();

    foreach ($array as $key => $value) {
        if (is_array($value) && $value === array_values($value)) {
            // Si la valeur est un tableau indexé, la conserver
            $filteredArray[$key] = $value;
        } elseif (is_array($value)) {
            // Si la valeur est un tableau associatif, filtrer récursivement
            $filteredValue = filterAssociativeArrays($value);
            if (!empty($filteredValue)) {
                $filteredArray[$key] = $filteredValue;
            }
        }
    }

    return $filteredArray;
}

function countOccurrences($array) {
    $occurrences = array();
    
    foreach ($array as $item) {
        if (isset($occurrences[$item])) {
            $occurrences[$item]++;
        } else {
            $occurrences[$item] = 1;
        }
    }
    
    return $occurrences;
}