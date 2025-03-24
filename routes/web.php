<?php

function dispatch($route)
{
     // Connexion à la base de données
     $db = new PDO("mysql:host=localhost;dbname=locatechild", "root", "");

     // Route principale
     if ($route === '/') {
         (new \App\Controllers\HomeController($db))->index();  // Passe $db à HomeController
     } 
     elseif ($route === 'about') {
         (new \App\Controllers\HomeController($db))->about();  // Passe $db à HomeController
     }
     elseif ($route === 'creerCompte'){
         $authController = new \App\Controllers\AuthController($db);
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $authController->register();
         } else {
             (new \App\Controllers\HomeController($db))->creerCompte();
         }
     } 
    elseif ($route === 'seConnecter'){
        $authController = new \App\Controllers\AuthController($db);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $authController->login();
        } else {
            (new \App\Controllers\HomeController($db))->seConnecter();
        }
    } 
    elseif ($route === 'accueil') {
        (new \App\Controllers\HomeController($db))->accueil();
    } 
    // Route pour localiser l'enfant
    elseif ($route === 'localiser') {
        $chil_id = 1; // Récupère l'ID de l'enfant
        if ($chil_id) {
            (new \App\Controllers\HomeController($db))->localiser($chil_id); // Passe la connexion et l'ID
        } else {
            echo "ID de l'enfant manquant";
        }
    }
    // Route pour recevoir les données GPS depuis Arduino
    elseif ($route === 'receiveGpsData') {
        (new \App\Controllers\GpsController($db))->storeGpsData(); // Passe la connexion à GpsController
    } 
    elseif ($route === 'ajouterEnfant') {
        $enfantController = new \App\Controllers\EnfantController($db); // Passe la connexion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $enfantController->ajouterEnfant();
        } else {
            (new \App\Controllers\HomeController($db))->ajouterEnfant(); // Formulaire d'ajout d'enfant
        }
    } elseif($route === 'historique'){
        (new \App\controllers\HomeController($db))->historique();
    }
    else {
    }
}

dispatch($_SERVER['REQUEST_URI']);
