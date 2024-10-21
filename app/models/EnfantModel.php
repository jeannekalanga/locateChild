<?php

namespace App\Models;

use PDO;

class EnfantModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createEnfant($nom_complet_enfant, $adresseMaison, $idParent, $idEcole) {
        // Préparation de la requête SQL
        $sql = "INSERT INTO enfant (nom_complet_enfant, adresseMaison, idParent, idEcole) VALUES (:nom_complet_enfant, :adresseMaison, :idParent, :idEcole)";
        $stmt = $this->db->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom_complet_enfant', $nom_complet_enfant);
        $stmt->bindParam(':adresseMaison', $adresseMaison);
        $stmt->bindParam(':idParent', $idParent);
        $stmt->bindParam(':idEcole', $idEcole);

        // Exécution de la requête et retour du résultat
        if ($stmt->execute()) {
            return true; // Enfant ajouté avec succès
        } else {
            // Si l'exécution échoue,  afficher l'erreur pour le débogage
            echo "Erreur : " . implode(", ", $stmt->errorInfo());
            return false; // Échec de l'ajout de l'enfant
        }
    }

    // Fonction pour récupérer les enfants d'un parent
    public function getEnfantsByParent($idParent) {
        $stmt = $this->db->prepare('SELECT * FROM enfant WHERE idParent = :idParent');
        $stmt->bindParam(':idParent', $idParent);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour récupérer un enfant par ID
    public function getEnfantById($idEnfant) {
        $stmt = $this->db->prepare('SELECT * FROM enfant WHERE idEnfant = :idEnfant');
        $stmt->bindParam(':idEnfant', $idEnfant);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
