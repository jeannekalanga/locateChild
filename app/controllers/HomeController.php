<?php

namespace App\controllers;

class HomeController{
    public function index(){
        require '../app/views/Home.php';
    }

    public function about(){
        require '../app/views/About.php';
    }
    public function creerCompte(){
        require '../app/views/CreerCompte.php';
    }

    public function seConnecter(){
        require '../app/views/SeConnecter.php';
    }
}