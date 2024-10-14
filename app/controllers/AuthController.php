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
    // la methode ^pour la creation du compte parent
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $postnom = $_POST['postnom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->createUser($nom, $postnom, $prenom, $email, $password)) {
                header('Location: ?route=seConnecter');
                exit();
            } else {
                echo "Erreur lors de la création du compte.";
            }
        }
        require __DIR__ . '../views/CreerCompte.php';
    }
    // la methode de connexion au compte parent
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];


            // Recherche de l'utilisateur dans la base de données
            $parent = $this->userModel->getUserByEmail($email);



            // Si l'utilisateur existe et le mot de passe correspond
            if ($parent && password_verify($password, $parent['motDePasse'])) {

                // Démarrer une session et enregistrer les informations utilisateur
                session_start();
                $_SESSION['user_id'] = $parent['id'];
                $_SESSION['user_name'] = $parent['nom'];

                // Rediriger l'utilisateur vers la page d'accueil ou une autre page
                header('Location: ?route=accueil');
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
        require __DIR__ . '../views/SeConnecter.php';
    }

    public function logout()
    {
        // Détruire la session pour déconnecter l'utilisateur
        session_start();
        session_unset();
        session_destroy();
        header('Location: ?route=seConnecter');
        exit();
    }
}
