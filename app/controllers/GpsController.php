<?php

namespace App\Controllers;

use App\Models\GpsModel;

class GpsController {
    private $gpsModel;

    public function __construct() {
        $this->gpsModel = new GpsModel();
    }

    public function storeGpsData() {
        if (isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['chil_id'])) {
            $chil_id = $_POST['chil_id'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];

            // Stockage des données GPS dans la base de données
            $this->gpsModel->storeGpsData($chil_id, $latitude, $longitude);
            echo "Données GPS enregistrées avec succès.";
        } else {
            echo "Données manquantes.";
        }
    }
}
