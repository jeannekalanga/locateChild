<?php

// Chemin vers le fichier contenant les données GPS
$gps_file = 'C:/xampp/htdocs/locateChild/scripts/gps_data_temp.txt';
header("Access-Control-Allow-Origin: *");
// Vérification si le fichier existe et s'il contient des données
if (file_exists($gps_file)) {
    // Lecture du contenu du fichier
    $gps_data = file_get_contents($gps_file);

    // Vérification que le fichier n'est pas vide
    if ($gps_data) {
        // Extraction de la latitude et de la longitude avec regex
        preg_match('/Latitude\s*:\s*([0-9.]+)\s*([NS])\s*,\s*Longitude\s*:\s*([0-9.]+)\s*([EW])/', $gps_data, $matches);

        if ($matches) {
            // Extraction des valeurs
            $latRaw = (float)$matches[1];
            $latDirection = $matches[2];
            $longRaw = (float)$matches[3];
            $longDirection = $matches[4];

            // Conversion en degrés, minutes et secondes
            function convertToDecimal($raw)
            {
                $degrees = floor($raw / 100); // Partie entière
                $minutes = $raw - ($degrees * 100); // Partie fractionnaire en minutes
                return $degrees + ($minutes / 60); // Conversion en décimal
            }

            $latitudeDecimal = convertToDecimal($latRaw);
            $longitudeDecimal = convertToDecimal($longRaw);

            // Appliquer la direction
            if ($latDirection === 'S') $latitudeDecimal *= -1;
            if ($longDirection === 'W') $longitudeDecimal *= -1;

            // Formatage final des coordonnées
            echo number_format($latitudeDecimal, 6, '.', '') . ', ' . number_format($longitudeDecimal, 6, '.', '');

            // Affichage des coordonnées

        } else {
            echo "Coordonnées GPS non disponibles.";
        }
    } else {
        echo "Aucune donnée GPS disponible.";
    }
} else {
    echo "Fichier de données GPS introuvable.";
}

