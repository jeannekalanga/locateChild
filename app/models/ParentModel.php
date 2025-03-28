<?php
    namespace App\Models;

    use PDO;
class ParentModel
{
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function createUser($nom, $postnom, $prenom, $email, $password){
        $sql = "INSERT INTO parent (nomParent, post_nom, prenom, adresseMail, motDePasse) VALUES (:nom, :postnom, :prenom, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':postnom', $postnom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();

    }
    // ce code recupere le parent par email
    public function getUserByEmail($email){
        $stmt = $this->db->prepare('SELECT * FROM parent WHERE adresseMail = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}