<?php

// Importation des controllers et modèles
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/EnfantController.php';
require_once '../app/controllers/GpsController.php';
require_once '../app/models/ParentModel.php';
require_once '../app/models/EnfantModel.php';
require_once '../app/models/GpsModel.php';

// Importation du fichier de routes
require_once '../routes/web.php';

// Récupération de la route demandée
$route = $_GET['route'] ?? '/'; // Si la route est vide, on charge la page principale

// Dispatch de la route
dispatch($route);
