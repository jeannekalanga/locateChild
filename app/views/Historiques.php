<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localisation en temps réel</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <!-- Leaflet Routing Machine JS -->

    <!-- Ton fichier CSS principal (inclus une seule fois) -->
    <link href="css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: white;
        }
        body {
            top : 0px; 
        }
        /* Styles pour les boutons */
        .btn {
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.2s;
        }

        /* Style pour le bouton Itinéraire */
        #routeButton {
            background-color: black;
            color: white;
        }

        /* Effet de survol pour le bouton Itinéraire */
        #routeButton:hover {
            background-color: #333;
            color: #f1f1f1;
            transform: scale(1.05);
        }

        /* Style pour le bouton Commander */
        #orderButton {
            background-color: #FFFF00;
            color: black;
            border: 2px solid #000;
        }

        /* Effet de survol pour le bouton Commander */
        #orderButton:hover {
            background-color: #f1f1f1;
            color: #000;
            transform: scale(1.05);
        }

        #map {
            height: 400px;
            z-index: 0;
        }
        .leaflet-routing-container.leaflet-control-custom {
            position: absolute;
            top: 20px; /* Ajustez cette valeur pour positionner la boîte verticalement */
            right: 20px; /* Ajustez cette valeur pour positionner la boîte horizontalement */
            z-index: 1000; /* Assurez-vous que la boîte est bien au-dessus de la carte */
            background: white;
            padding: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
            border-radius: 5px;
            max-width: 300px; /* Limitez la largeur si nécessaire */
        }
        #controls {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        #controls label {
            margin-right: 10px;
        }
        #controls input,
        #controls button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        #routeButton, #orderButton {
            border: none;
            cursor: pointer;
            flex-grow: 1;
            width: 48%;
            display: inline-block;
        }
        #routeButton {
            background-color: #007bff;
            color: white;
        }
        #routeButton:hover {
            background-color: #0056b3;
        }
        #orderButton {
            background-color: #ffc107;
            color: white;
        }
        #orderButton:hover {
            background-color: #e0a800;
        }
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border-left-color: #000;
            animation: spin 1s infinite linear;
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        #loadingOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            visibility: hidden;
        }
        #loadingMessage {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        @media (min-width: 768px) {
            #controls {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
            #controls .form-group {
                flex-grow: 1;
                margin-right: 10px;
            }
            #controls button {
                width: auto;
                margin-top: 0;
            }
            .leaflet-control-custom {
                position: fixed;
                top: 232px;
                right: 70px;
                background: white;
                padding: 20px;
                box-shadow: 0 0 15px rgba(0,0,0,0.5);
                z-index: 1000;
                color: black;
            }
        }
    </style>

</head>
<body>



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
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <p class="sidebar-brand">
                    <span class="align-middle">LocateChild</span>
                </p>
                <ul class="sidebar-nav">
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="?route=accueil">
                            <i class="align-middle" data-feather="sliders"></i>
                            <span class="align-middle">Page d'accueil</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?route=ajouterEnfant">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Ajouter enfant</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="?route=localiser">
                            <i class="align-middle" data-feather="log-in"></i>
                            <span class="align-middle">Localiser</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="?route=historique">
                            <i class="align-middle" data-feather="user-plus"></i>
                            <span class="align-middle">Consulter historique</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?route=notification">
                            <i class="align-middle" data-feather="book"></i>
                            <span class="align-middle">Voir toutes les notifications</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?route=gererCompte">
                            <i class="align-middle" data-feather="align-left"></i>
                            <span class="align-middle">Mon compte</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <button class="btn btn-primary" style="height: 40px; width: 100%" onclick="actualiserCarte()">Actualiser la carte</button>
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                    <div class="position-relative">
                                        <i class="align-middle" data-feather="bell"></i>
                                        <span class="indicator">0</span>
                                    </div>
                                </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    Aucune notification jusque là
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger" data-feather="alert-circle"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Restez connecter pour plus d'infos</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="notification.php" class="text-muted">voir toutes les notifications</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1>Consulter l'historique des localisations en fonction du Jour</h1>
                    <div id="gps-data">Chargement des données...</div>
                    <button class="btn btn-primary" style="height: 40px; width: 100%" onclick="actualiserCarte()"> Historique du </button>
                    
                </div>
            </main>
            
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <span class="text-muted"><strong>LocateChild  </strong></span><span class="text-muted"><strong>  Kalanga Muwaya Jeanne</strong></span>								&copy;
                            </p>
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/app.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialisation de la carte
        const map = L.map('map').setView([-11.676368, 27.480601], 15); // Coordonnées initiales

        // Ajout de la couche de tuiles (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Création du marqueur
        const marker = L.marker([-11.6696, 27.47896]).addTo(map);

        // Variables pour stocker les anciennes coordonnées
        let oldLatitude = -11.676368;
        let oldLongitude = 27.480601;

        // Fonction pour rafraîchir les données
        function refreshData() {
            fetch('http://localhost/locateChild/app/views/get_gps_data.php')
                .then(response => response.text())
                .then(data => {
                    const coords = data.split(',');
                    const latitude = parseFloat(coords[0].trim());
                    const longitude = parseFloat(coords[1].trim());

                    // Vérifier si les coordonnées ont changé
                    if (latitude !== oldLatitude || longitude !== oldLongitude) {
                        // Mise à jour du texte et du marqueur
                        document.getElementById('gps-data').innerText = `Coordonnées : ${data}`;
                        marker.setLatLng([latitude, longitude]); // Déplacer le marqueur
                        map.panTo([latitude, longitude]); // Centrer sans changer le zoom

                        // Mettre à jour les anciennes coordonnées
                        oldLatitude = latitude;
                        oldLongitude = longitude;
                        console.log("Latitude : " + oldLatitude)
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
            console.log(coords)
        }

        // Appeler la fonction toutes les 5 secondes
        setInterval(refreshData, 2000);
    </script>
</body>
</html>
