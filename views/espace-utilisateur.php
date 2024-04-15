<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$user = isset($_SESSION['utilisateurConnecte']) ? $_SESSION['utilisateurConnecte'] : 'user_disconnected';
if($user == 'user_disconnected'){
	header('Location: /');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Utilisateur</title>
    <link rel="stylesheet" href="../styles/espace.css"></link>
    <link rel="stylesheet" href="../styles/footer.css"></link>
</head>
	<body>
	    <header>
	        <h1>Bienvenue dans votre Espace Client Gasy</h1>
	        <a href="/php/controllers/utilisateur.php?action=logout">Deconnexion</a>
	    </header>
	    <nav>
	        <ul>
	            <li><a href="/views/reservation.php">Réserver une table</a></li>
	            <li><a href="/views/reservation-modifier.php">Modifier votre réservation</a></li>
	            <li><a href="/views/reservation-annuler.php">Annuler une réservation</a></li>
	        </ul>
	    </nav>
	    <main>
	        <section>
	            <h2>Votre confort, notre priorité</h2>
	            <p>Profitez d'une expérience personnalisée et gérez vos réservations en toute simplicité. Que vous planifiez un dîner romantique ou une grande célébration, votre espace client est là pour assurer que tout se passe comme prévu.</p>
	        	<div class="left"></div>
	        </section>
	        <section>
	        	<div class="right"></div>
	            <h2>Flexibilité et contrôle</h2>
	            <p>Changements de dernière minute ? Pas de problème. Avec quelques clics, ajustez vos plans et continuez à profiter des meilleurs moments chez Gasy sans souci.</p>
	        </section>
	    </main>
	    <footer>
	        <p>© 2024 Gestion de Réservations chez Gasy. Tous droits réservés.</p>
	    </footer>
	</body>
</html>
