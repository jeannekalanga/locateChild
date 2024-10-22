<?php

    namespace App\Models;
    use PDO;
class GpsModel {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Connexion à la base de données
    }

    // Méthode pour stocker les données GPS dans la base de données
    public function storeGpsData($chil_id, $latitude, $longitude) {
        $sql = "INSERT INTO positions (chil_id, latitude, longitude) VALUES (:chil_id, :latitude, :longitude)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':chil_id', $chil_id);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        return $stmt->execute();
    }

    // Méthode pour obtenir la dernière position GPS d'un enfant
    public function getLastGpsPosition($chil_id) {
        $sql = "SELECT latitude, longitude FROM positions WHERE chil_id = :chil_id ORDER BY time DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':chil_id', $chil_id);
        $stmt->execute();
        return $stmt->fetch();
    }
}
