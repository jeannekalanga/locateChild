<?php

// Importation de controllers
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/models/ParentModel.php';

require '../routes/web.php';


// Exemple d'initialisation de l'application
$route = $_GET['route'] ?? '/';
dispatch($route);