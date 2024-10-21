<?php

function dispatch($route)
{
    $db = new PDO("mysql:host=localhost;dbname=locatechild", "root", "");

    if ($route === '/') {
        (new \App\Controllers\HomeController())->index();
    } elseif ($route === 'about') {
       (new \App\Controllers\HomeController())->about();
    } elseif($route === 'creerCompte'){
        $authController = new \App\Controllers\AuthController($db);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $authController->register();
        }else{
            (new \App\Controllers\HomeController())->creerCompte();
        }
    } elseif ($route === 'seConnecter'){
        $authController = new \App\Controllers\AuthController($db);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $authController->login();
        }else{
            (new \App\controllers\HomeController())->seConnecter();
        }
    } elseif($route === 'accueil') {
        (new \App\Controllers\HomeController())->accueil();
    } elseif($route === 'localiser') {
        (new \App\Controllers\HomeController())->localiser();
    }elseif ($route === 'ajouterEnfant') {
        $enfantContoller = new \App\Controllers\EnfantController($db);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si la requête est en POST, on ajoute l'enfant
            $enfantContoller->ajouterEnfant();
        } else {
            // Si la requête est en GET, on affiche le formulaire d'ajout
            (new \App\Controllers\HomeController())->ajouterEnfant();
        }
    } else {


    }
}

dispatch($_SERVER['REQUEST_URI']);