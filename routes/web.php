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
        (new \App\controllers\HomeController())->seConnecter();
    }  else {

    }
}

dispatch($_SERVER['REQUEST_URI']);