<?php namespace App\controllers;

use App\Models\GpsModel;

class HomeController {
    private $gpsModel;
    private $db;  // Ajout d'une variable pour la connexion à la base de données

    public function __construct($db) {
        $this->db = $db;  // Stocke la connexion à la base de données
        $this->gpsModel = new GpsModel($this->db);  // Passe la connexion à GpsModel
    }

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

    public function accueil(){
        require '../app/views/Accueil.php';
    }

    public function localiser($chil_id) {
        //$position = $this->gpsModel->getLastGpsPosition($chil_id);  // Récupère la dernière position
        require '../app/views/Localiser.php';  // Affiche la page de localisation
    }

    public function ajouterEnfant(){
        require ('../app/views/AjouterEnfant.php');
    }

    public function historique(){
        require '../app/views/Historiques.php';
    }
}
?>