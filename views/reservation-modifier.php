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
    <title>Modifier Réservation</title>
    <link rel="stylesheet" href="../styles/modifier.css"></link>
    <link rel="stylesheet" href="../styles/input.css"></link>
    <link rel="stylesheet" href="../styles/logout.css"></link>
    <link rel="stylesheet" href="../styles/footer.css"></link>
</head>
<body>
    <h2>Modifier votre réservation</h2>
    <form action="/php/controllers/reservation.php?action=update" method="post">
    	<div class="input">
    		<label>ID de réservation:</label>
	        <input type="text" name="id" required>
    	</div>
    	<div class="input">
    		<label>Nom du client:</label>
	         <input type="text" name="clientName" required>
    	</div>
    	<div class="input">
    		<label>Date de réservation:</label>
	         <input type="date" name="reservationDate" required>
    	</div>
    	<div class="input">
    		<label>Heure de réservation:</label>
	         <input type="time" name="reservationTime" required>
    	</div>
        <input class="submit" type="submit" value="Mettre à jour">
    </form>
    <a href="/php/controllers/utilisateur.php?action=logout">Deconnexion</a>
    <footer>
        <p>© 2024 Gestion de Réservations chez Gasy. Tous droits réservés.</p>
    </footer>
</body>
</html>
