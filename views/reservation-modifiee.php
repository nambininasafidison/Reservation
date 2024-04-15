<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$user = isset($_SESSION['utilisateurConnecte']) ? $_SESSION['utilisateurConnecte'] : 'user_disconnected';
if($user == 'user_disconnected'){
	header('Location: /');
}
$id = isset($_SESSION['id']) ? $_SESSION['id'] : 'id_non_défini';
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : 'nom_non_défini';
$date = isset($_SESSION['date']) ? $_SESSION['date'] : 'date_non_défini';
$heure = isset($_SESSION['heure']) ? $_SESSION['heure'] : 'heure_non_défini';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'email_non_défini';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Réservation Confirmée</title>
    <link rel="stylesheet" href="../styles/modifiee.css"></link>
    <link rel="stylesheet" href="../styles/footer.css"></link>
</head>
	<body>
		<section>
		    <h1>Votre réservation a été modifiée !</h1>
		    <p>Merci, <strong><?=$nom?></strong>, pour votre modification de la réservation d'identifiant <strong><?=$id?></strong>.</p>
		    <p>Nous avons bien reçu votre modification pour le <strong><?=$date?></strong> à <strong><?=$heure?></strong>.</p>
		    <p>Un email de confirmation a été envoyé à <strong><?=$email?></strong>.</p>
		    <a href="/views/espace-utilisateur.php">Retour à l'accueil</a>
		    <a href="/php/controllers/utilisateur.php?action=logout">Deconnexion</a>
		</section>
		<footer>
	        <p>© 2024 Gestion de Réservations chez Gasy. Tous droits réservés.</p>
	    </footer>
	</body>
</html>
