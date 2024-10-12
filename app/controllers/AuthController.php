<?php
namespace App\controllers;
use App\Models\ParentModel;

use PDO;

class AuthController{
    private $userModel;
    public function __construct(PDO $db)
    {
        // Modèle User qui interagit avec la base de données
        $this->userModel = new ParentModel($db);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $postnom = $_POST['postnom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->createUser($nom, $postnom, $prenom, $email, $password)) {
                header('Location: /login');
                exit();
            } else {
                echo "Erreur lors de la création du compte.";
            }
        }
        require __DIR__ . '../views/CreerCompte.php';
    }
}
