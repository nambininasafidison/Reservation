<?php
require_once '../utils/Database_connection.php';

class UtilisateurDao {
    public function enregistrerUtilisateur($utilisateur) {
        $status = 0;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("INSERT INTO users (nom, email, motDePasse) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $utilisateur->getNom(), PDO::PARAM_STR);
            $stmt->bindParam(2, $utilisateur->getEmail(), PDO::PARAM_STR);
            $stmt->bindParam(3, $utilisateur->getMotDePasse(), PDO::PARAM_STR);
            $status = $stmt->execute();
            $stmt = null;
            $conn = null;
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return $status;
    }
    
    public function obtenirUtilisateur($email, $motDePasse) {
        $utilisateur = null;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND motDePasse = ?");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->bindParam(2, $motDePasse, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            if (!empty($result)) {
                $row = $result[0]; 
                $utilisateur = new Utilisateur();
                $utilisateur->setId($row['id']);
                $utilisateur->setNom($row['nom']);
                $utilisateur->setEmail($row['email']);
                $utilisateur->setMotDePasse($row['motDePasse']);
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $utilisateur;
    }
    
}
?>
