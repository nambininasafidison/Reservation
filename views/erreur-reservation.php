<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$user = isset($_SESSION['utilisateurConnecte']) ? $_SESSION['utilisateurConnecte'] : 'user_disconnected';
if($user == 'user_disconnected'){
	header('Location: /');
}
$error = isset($_SESSION['error']) ? $_SESSION['error'] : 'erreur_non_défini';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Erreur de Réservation</title>
    <link rel="stylesheet" href="../styles/erreur.css"></link>
    <link rel="stylesheet" href="../styles/footer.css"></link>
</head>
<body>
	<section>
	    <h1>Erreur lors de la réservation</h1>
	    <p><?=$error?></p>
	    <div>
		    <a href="/views/reservation.php">Retour au formulaire de réservation</a>
		    <a href="/php/controllers/utilisateur.php?action=logout">Deconnexion</a>
	    </div>
	</section>
	<footer>
        <p>© 2024 Gestion de Réservations chez Gasy. Tous droits réservés.</p>
    </footer>
</body>
</html>
