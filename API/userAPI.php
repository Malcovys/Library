<?php

// Liste des domaines autorisés
$allowedOrigins = "http://localhost:5173, http://127.0.0.1";

// Vérifier si l'origine de la requête est dans la liste des domaines autorisés
// if (array_key_exists('HTTP_ORIGIN', $_SERVER) && in_array($_SERVER["HTTP_ORIGIN"], explode(", ", $allowedOrigins))) {
//     // Autoriser l'accès depuis l'origine spécifique
//     header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
// }

header("Access-Control-Allow-Origin: *");

// Autoriser les méthodes HTTP spécifiques depuis l'origine de la requête
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Autoriser les en-têtes personnalisés dans la requête
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Définir l'en-tête Cache-Control pour désactiver la mise en cache (facultatif)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
