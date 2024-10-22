<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localisation en temps réel</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
</head>
<body>

<div id="map" style="height: 400px;"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Vérifiez si les données GPS sont présentes
    var latitude = <?= json_encode($gpsData['latitude']) ?>;
    var longitude = <?= json_encode($gpsData['longitude']) ?>;
    
    // Vérifiez que vous obtenez bien des valeurs pour latitude et longitude
    if (latitude && longitude) {
        var map = L.map('map').setView([latitude, longitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([latitude, longitude]).addTo(map);
        marker.bindPopup("Position actuelle de l'enfant").openPopup();
    } else {
        console.error("Données GPS manquantes");
    }
</script>


</body>
</html>
