<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="../styles/connection.css"></link>
    <link rel="stylesheet" href="../styles/input.css"></link>
    <link rel="stylesheet" href="../styles/footer.css"></link>
</head>
<body>
	<a href="/index.php">Accueil</a>
    <form action="/php/controllers/utilisateur.php?action=login" method="post">
    	<div class="input">
    		<label>Email:</label>
	         <input type="email" name="email" required>
    	</div>
    	<div class="input">
    		<label>Mot de passe:</label>
	         <input type="password" name="motDePasse" required>
    	</div>
        <input class="submit" type="submit" value="Se connecter">
    </form>
    <footer>
        <p>© 2024 Gestion de Réservations chez Gasy. Tous droits réservés.</p>
    </footer>
</body>
</html>