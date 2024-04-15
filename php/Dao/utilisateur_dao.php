<?php
require_once '/php/utils/Database_connection.php';

class UtilisateurDao {
    public function enregistrerUtilisateur($utilisateur) {
        $status = 0;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("INSERT INTO users (nom, email, motDePasse) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $utilisateur->getNom(), $utilisateur->getEmail(), $utilisateur->getMotDePasse());
            $status = $stmt->execute();
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $status;
    }
    
    public function obtenirUtilisateur($email, $motDePasse) {
        $utilisateur = null;
        try {
            $conn = DatabaseConnection::getConnection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND motDePasse = ?");
            $stmt->bind_param("ss", $email, $motDePasse);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $utilisateur = new Utilisateur();
                $utilisateur->setId($row['id']);
                $utilisateur->setNom($row['nom']);
                $utilisateur->setEmail($row['email']);
                $utilisateur->setMotDePasse($row['motDePasse']);
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return $utilisateur;
    }
}
?>
