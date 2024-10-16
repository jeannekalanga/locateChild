<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Locate Child</title>

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
            padding-top: 70px;
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
    
    <div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          			<span class="align-middle">LocateChild</span>
        		</a> 
				<ul class="sidebar-nav">
					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.html">
							<i class="align-middle" data-feather="sliders"></i> 
                            <i class="align-middle" data-feather="sliders"></i> 
                            <span class="align-middle">Page_Accueil</span> 
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-profile.html">
                            <i class="align-middle" data-feather="user"></i> 
                            <span class="align-middle">Mon compte</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-sign-in.html">
                            <i class="align-middle" data-feather="log-in"></i>
                            <span class="align-middle">Se connecter</span>
                        </a>
                    </li>
                        
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-sign-up.html">
                            <i class="align-middle" data-feather="user-plus"></i> 
                            <span class="align-middle">Créer compte</span>
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
                                    <!-- Nouvelle div pour Leaflet -->
                                    <div id="map" style="width: 100%; height: 600px;"></div>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>

                                    <script>
                                        const map = L.map('map').setView([-11.6647, 27.4794], 13);
                                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            maxZoom: 19,
                                            attribution: '© OpenStreetMap'
                                        }).addTo(map);

                                        const API_KEY = '4948b4ccd6a84509857ce4712d71329a';
                                            function actualiserCarte() {

                                            // Par exemple, si vous utilisez une API de carte comme Leaflet ou Google Maps,
                                            // vous pouvez rafraîchir la carte ici.
                                        }
                                        function geocodeAddress(address, callback) {
                                            fetch(`https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(address)}, Lubumbashi&key=${API_KEY}&language=fr`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.results.length > 0) {
                                                        const { lat, lng } = data.results[0].geometry;
                                                        callback([parseFloat(lat), parseFloat(lng)]);
                                                    } else {
                                                        alert("Adresse non trouvée : " + address);
                                                    }
                                                })
                                                .catch(err => {
                                                    alert("Erreur de géocodage : " + err);
                                                });
                                        }

                                        let routeDetails = {}; // Variable globale pour stocker les détails de l'itinéraire

                                        function showRoute(startCoords, endCoords, startAddress, endAddress) {
                                            // Supprimer la route précédente si elle existe
                                            if (window.routeControl) {
                                                map.removeControl(window.routeControl);
                                                window.routeControl = null;
                                            }

                                            // Ajouter les marqueurs de départ et de destination
                                            const startMarker = L.marker(startCoords).addTo(map)
                                                .bindPopup('Point de départ: ' + startAddress)
                                                .openPopup();
                                            const endMarker = L.marker(endCoords).addTo(map)
                                                .bindPopup('Destination: ' + endAddress);

                                            // Centrer la carte entre les deux points
                                            const centerLat = (startCoords[0] + endCoords[0]) / 2;
                                            const centerLng = (startCoords[1] + endCoords[1]) / 2;
                                            map.setView([centerLat, centerLng], 13);

                                            // Ajouter la route sur la carte
                                            window.routeControl = L.Routing.control({
                                                waypoints: [
                                                    L.latLng(startCoords[0], startCoords[1]),
                                                    L.latLng(endCoords[0], endCoords[1])
                                                ],
                                                routeWhileDragging: true,
                                                router: L.routing.osrmv1({
                                                    serviceUrl: 'https://router.project-osrm.org/route/v1'
                                                }),
                                                createMarker: function() { return null; },
                                                show: false,
                                                addWaypoints: false,
                                                draggableWaypoints: false,
                                            }).on('routesfound', function(e) {
                                                const routes = e.routes;
                                                const summary = routes[0].summary;

                                                // Stocker les détails de l'itinéraire dans la variable globale
                                                routeDetails = {
                                                    startAddress,
                                                    endAddress,
                                                    startCoords,
                                                    endCoords,
                                                    distanceInKm: (summary.totalDistance / 1000).toFixed(2),
                                                    timeInMinutes: Math.round(summary.totalTime / 60),
                                                    price: ((summary.totalDistance / 1000) * 1500).toFixed(2)
                                                };

                                                document.getElementById('formStart').value = startAddress;
                                                document.getElementById('formEnd').value = endAddress;
                                                document.getElementById('formStartCoords').value = startCoords;
                                                document.getElementById('formEndCoords').value = endCoords;
                                                document.getElementById('formDistance').value = routeDetails.distanceInKm;
                                                document.getElementById('formDuration').value = routeDetails.timeInMinutes;
                                                document.getElementById('formPrice').value = routeDetails.price;

                                                // Créer la boîte de dialogue personnalisée
                                                const routeInfo = `
            <div class="route-info card leaflet-routing-container leaflet-control leaflet-control-custom">
                <div class="card-body">
                    <h3 class="card-title">Information de l'itinéraire</h3>
                    <p><strong>Point de départ :</strong> ${startAddress}</p>
                    <p><strong>Destination :</strong> ${endAddress}</p>
                    <p><strong>Distance :</strong> ${routeDetails.distanceInKm} km</p>
                    <p><strong>Durée estimée :</strong> ${routeDetails.timeInMinutes} minutes</p>
                    <p><strong>Prix :</strong> ${routeDetails.price} FC</p>
                    <button class="btn btn-danger" onclick="closeRouteInfo()">Fermer</button>
                </div>
            </div>
        `;

                                                const routeInfoContainer = document.createElement('div');
                                                routeInfoContainer.innerHTML = routeInfo;
                                                document.getElementById('map').appendChild(routeInfoContainer);
                                            }).addTo(map);
                                        }


                                        // Fonction pour fermer la boîte de dialogue personnalisée
                                        function closeRouteInfo() {
                                            const routeInfoContainer = document.querySelector('.leaflet-control-custom');
                                            if (routeInfoContainer) {
                                                routeInfoContainer.remove();
                                            }
                                        }




                                        document.getElementById('routeButton').addEventListener('click', function () {
                                            const start = document.getElementById('start').value;
                                            const end = document.getElementById('end').value;

                                            if (start && end) {
                                                geocodeAddress(start, function(startCoords) {
                                                    geocodeAddress(end, function(endCoords) {
                                                        showRoute(startCoords, endCoords, start, end);
                                                    });
                                                });
                                            } else {
                                                alert("Veuillez entrer des noms d'avenues pour les deux points.");
                                            }
                                        });
                                    </script>

                                </div>
                        </div>

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

    <!-- Ton fichier JS principal -->
    <script src="js/app.js"></script>
    
    <!-- Leaflet JS (inclus une seule fois) -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-o9N1jv+VbXv8L+ALq22nMKPS1C6R6kf0D6i6Xw+arYQ="
        crossorigin=""></script>

   
    <!-- Script d'initialisation de Leaflet.js -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialiser la carte et la centrer sur Lubumbashi
            var map = L.map('map').setView([-11.6604, 27.4796], 13); // Coordonnées de Lubumbashi

            // Ajouter une couche de carte de base (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Liste des communes avec leurs coordonnées
            var communes = [
                { name: "Lubumbashi", coords: [-11.6604, 27.4796] },
                { name: "Katuba", coords: [-11.6842, 27.4769] },
                { name: "Kenya", coords: [-11.6700, 27.4650] },
                { name: "Kamalondo", coords: [-11.6650, 27.4950] },
                { name: "Rwashi", coords: [-11.6167, 27.4333] },
                { name: "Annexe", coords: [-11.6833, 27.4167] },
                { name: "Kialunda", coords: [-11.6500, 27.5000] },
                { name: "Kayembe", coords: [-11.7000, 27.4500] }
                // Ajoute d'autres communes si nécessaire
            ];

            // Ajouter des marqueurs pour chaque commune
            communes.forEach(function(commune) {
                L.marker(commune.coords).addTo(map)
                    .bindPopup('<b>' + commune.name + '</b>');
            });
        });
    </script>

    
    <!-- Tes autres scripts de graphiques restent inchangés -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>


</body>

</html>
