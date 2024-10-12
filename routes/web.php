<?php
function dispatch($route)
{
    if ($route === '/') {
        (new \App\Controllers\HomeController())->index();
    } elseif ($route === 'about') {
       (new \App\Controllers\HomeController())->about();
    } elseif($route ==='creerCompte'){
        (new \App\Controllers\HomeController())->creerCompte(); 
    }elseif ($route ==='seConnecter'){
        (new \App\controllers\HomeController())->seConnecter();
    }

    else {
        echo "404 - Page not found";
    }
}