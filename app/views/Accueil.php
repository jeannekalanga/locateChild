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

    <title>Peut être sujet défense</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-sA+4oVdXCF+qq3P3FN9k+j3Wd3GZjfNVnq6bRSLt6KA="
        crossorigin=""/>

    <!-- Ton fichier CSS principal (inclus une seule fois) -->
    <link href="css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-blank.html">
                            <i class="align-middle" data-feather="book"></i> 
                            <span class="align-middle">Blank</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="ui-typography.html">
                            <i class="align-middle" data-feather="align-left"></i> 
                            <span class="align-middle">Typography</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="maps-google.html">
                            <i class="align-middle" data-feather="map"></i> 
                            <span class="align-middle">Maps</span>
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
            
                    <div class="row">
                        <!-- Real-Time Section -->
                        <div class="col-12 col-md-12 col-xxl-6 d-flex">
                            <div class="card flex-fill w-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Real-Time</h5>
                                </div>
                                <div class="card-body px-4">
                                    <!-- Nouvelle div pour Leaflet -->
                                    <div id="world_map" style="height:350px;"></div>

                                   

                                </div>
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
