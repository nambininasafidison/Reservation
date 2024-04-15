<?php
require_once '/php/Dao/utilisateur_dao.php';
require_once '/php/models/Utilisateur.php';

session_start();
$utilisateurDao = new UtilisateurDao();

function processRequest() {
    $action = $_GET['action'] ?? $_POST['action'];
    if ($action == 'register') {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $motDePasse = $_POST['motDePasse'];

        $utilisateur = new Utilisateur();
        $utilisateur->setNom($nom);
        $utilisateur->setEmail($email);
        $utilisateur->setMotDePasse($motDePasse);
        $utilisateurDao->enregistrerUtilisateur($utilisateur);

        header('Location: /views/inscription-reussie.php');
        exit();
    } elseif ($action == 'login') {
        $email = $_POST['email'];
        $motDePasse = $_POST['motDePasse'];

        $utilisateur = $utilisateurDao->obtenirUtilisateur($email, $motDePasse);
        if ($utilisateur != null) {
            $_SESSION['utilisateurConnecte'] = $utilisateur;
            header('Location: /views/espace-utilisateur.php');
            exit();
        } else {
            $_SESSION['error'] = "Identifiants ou mot de passe invalides ou utilisateur non trouvé";
            header('Location: /views/erreur-connection.php');
            exit();
        }
    } elseif ($action == 'logout') {
        unset($_SESSION['utilisateurConnecte']);
        header('Location: /');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    processRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    processRequest();
}
?>
