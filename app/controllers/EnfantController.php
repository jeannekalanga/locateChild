<?php

namespace App\Controllers;

use App\models\EnfantModel;

class EnfantController {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Initialiser la connexion à la base de données
    }

    public function ajouterEnfant() {
        // Récupérer les données POST
        $nom_complet_enfant = $_POST['nom_complet_enfant'] ?? '';
        $idEcole = $_POST['idEcole'] ?? '';
        $adresseMaison = $_POST['adresseMaison'] ?? '';
        $idParent = $_POST['idParent'] ?? ''; // Cet idParent doit être passé dynamiquement après la connexion du parent

        // Vérifier que tous les champs requis sont fournis
        if (!empty($nom_complet_enfant) && !empty($idEcole) && !empty($adresseMaison) && !empty($idParent)) {
            // Instancier le modèle Enfant
            $enfantModel = new EnfantModel($this->db);
            
            // Appeler la méthode createEnfant pour ajouter l'enfant dans la base de données
            $isEnfantCreated = $enfantModel->createEnfant($nom_complet_enfant, $adresseMaison, $idParent, $idEcole);
            
            // Si l'enfant est ajouté avec succès
            if ($isEnfantCreated) {
                // On stocke le message de succès dans une session
                echo "enfant ajouté avec succès";
                
                // Redirection vers la page d'accueil
                echo " <br> <a href=\"?route=accueil\"> cliquer pour rentrer en arrière </a>" ;
                exit();
            } else {
                // Gestion de l'erreur
                echo "Erreur lors de l'ajout de l'enfant. Veuillez réessayer.";
            }
        } else {
            // Gestion du cas où les champs ne sont pas remplis
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }

    // Vous pouvez ajouter d'autres méthodes ici (editEnfant, deleteEnfant, etc.)
}
