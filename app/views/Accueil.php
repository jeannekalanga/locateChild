<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    
    <link rel="stylesheet" href="../public/css/accueil.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>LocateChild</title>
    <!-- Ton fichier CSS principal (inclus une seule fois) -->
    <link href="css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    
    <div class="wrapper">
        <!-- La barre de navigation latérale -->
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <p class="sidebar-brand">
                    <span class="align-middle">LocateChild</span>
                </p> 
                <ul class="sidebar-nav">
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="?route=accueil">
                            <i class="align-middle" data-feather="sliders"></i> 
                            <span class="align-middle">Page_Accueil</span> 
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?route=ajouterEnfant">
                            <i class="align-middle" data-feather="user"></i> 
                            <span class="align-middle">Ajouter enfant</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?route=localiser">
                            <i class="align-middle" data-feather="log-in"></i>
                            <span class="align-middle">Localiser</span>
                        </a>
                    </li>
                        
                    <li class="sidebar-item">
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
        <!-- Fin de la barre de navigation latérale -->
        <div class="main">
             <!-- Vérifiez s'il y a un message de succès dans la session -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success" role="alert">
                <?php
                    // Affichez le message de succès
                    echo $_SESSION['success_message'];
                    
                    // Supprimez le message après l'affichage
                    unset($_SESSION['success_message']);
                ?>
            </div>
        <?php endif; ?>
            <!-- La barre de navigation supérieure -->
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
                                </div>
                            </a>
                            <!-- Dropdown des alertes peut être ajouté ici -->
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>		
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger" style="height: 40px; width: 100%" onclick="Deconnecter()">Déconnecter</button>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Fin de la barre de navigation supérieure -->

            <!-- Le contenu principal -->
            <main class="content">
                <div class="container-fluid p-0 d-flex flex-column h-100">
            
                    <!-- Conteneur des boutons -->
                    <div class="row flex-grow-1">
                        <!-- Première colonne de boutons -->
                        <div class="col-12 col-md-6 d-flex mb-3">
                            <a href="?route=localiser" class="btn bg-primary w-100 d-flex align-items-center justify-content-center" style="height: 100%;">
                                <i class="align-middle me-2" data-feather="check-circle" style="height: 40px; width: 40px;"></i>
                                <span>Localiser enfant</span>
                            </a>
                        </div>
                        <!-- Deuxième colonne de boutons -->
                        <div class="col-12 col-md-6 d-flex mb-3">
                            <a href="?route=notification" class="btn bg-secondary w-100 d-flex align-items-center justify-content-center" style="height: 100%;">
                                <i class="align-middle me-2" data-feather="bell" style="height: 40px; width: 40px;"></i>
                                <span>Voir notification</span>
                            </a>
                        </div>
                    </div>

                    <div class="row flex-grow-1">
                        <!-- Troisième colonne de boutons -->
                        <div class="col-12 col-md-6 d-flex mb-3">
                        <a href="?route=gererCompte" class="btn bg-secondary w-100 d-flex align-items-center justify-content-center" style="height: 100%;">
                                <i class="align-middle me-2" data-feather="book-open" style="height: 40px; width: 40px;"></i>
                                <span>Consulter historique</span>
                            </a>
                        </div>
                        <!-- Quatrième colonne de boutons -->
                        <div class="col-12 col-md-6 d-flex mb-3">
                            <a href="?route=gererCompte" class="btn bg-secondary w-100 d-flex align-items-center justify-content-center" style="height: 100%; background-color : #344D59">
                                <i class="align-middle me-2" data-feather="settings" style="height: 40px; width: 40px; "></i>
                                <span>Gérer compte</span>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Fin du contenu principal -->
            
            <!-- Le pied de page -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <span class="text-muted"><strong>LocateChild</strong></span>
                                <span class="text-muted"><strong> Kalanga Muwaya Jeanne</strong></span> &copy;
                            </p>
                        </div>
                        
                    </div>
                </div>
            </footer>
            <!-- Fin du pied de page -->
        </div>
    </div>

    <!-- Scripts nécessaires (Bootstrap, Feather Icons, etc.) -->
    <script src="js/app.js"></script>
    <script>
        // Initialiser Feather Icons
        feather.replace()

        // Fonction de déconnexion (à définir)
        function Deconnecter() {
            // Ajoutez ici votre logique de déconnexion
            alert('Déconnecté avec succès!');
            // Exemple de redirection après déconnexion
            window.location.href = '?route=accueil';
        }
    </script>
</body>

</html>
