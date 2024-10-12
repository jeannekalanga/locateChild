<?php
    namespace App\Models;
class ParentModel
{
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function createUser($nom, $postnom, $prenom, $email, $password){
        $sql = "INSERT INTO users (nom, postnom, prenom, email, password) VALUES (:nom, :postnom, :prenom, :email, :password)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':postnom', $postnom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));

        return $stmt->execute();

    }
}