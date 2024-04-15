<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$user = isset($_SESSION['utilisateurConnecte']) ? $_SESSION['utilisateurConnecte'] : 'user_disconnected';
if($user == 'user_disconnected'){
	header('Location: /');
}
$id = isset($_SESSION['id']) ? $_SESSION['id'] : 'id_non_défini';
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : 'nom_non_défini';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Réservation Confirmée</title>
    <link rel="stylesheet" href="../styles/annulee.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>
    <section>
        <h1>Votre réservation a été annulée !</h1>
        <p>La réservation qui porte l'identifiant <strong><?=$id?></strong> de Mme/Mr <strong><?=$nom?></strong> a été annulée avec succes</p>
        <a href="/views/espace-utilisateur.php">Retour à l'accueil</a>
        <a href="/php/controllers/utilisateur.php?action=logout">Deconnexion</a>
    </section>
    <footer>
        <p>© 2024 Gestion de Réservations chez Gasy. Tous droits réservés.</p>
    </footer>
</body>
</html>
